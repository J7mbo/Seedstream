<?php

namespace Server;

use Server\Request\Factory as RequestFactory,
    React\EventLoop\Timer\TimerInterface,
    App\Model\Repository\UserRepository,
    Server\Request\SubscriptionRequest,
    Ratchet\Wamp\WampServerInterface,
    Server\Request\AbstractRequest,
    React\EventLoop\LoopInterface,
    Server\Action\ActionException,
    Server\Action\ActionFactory,
    Ratchet\ConnectionInterface,
    Ratchet\Wamp\WampConnection,
    Doctrine\ORM\EntityManager,
    TorrentPHP\ClientException,
    Ratchet\Wamp\Topic,
    Monolog\Logger;

/**
 * Class EventHandler
 *
 * This is the object that gets hit on websocket events like "connect", "disconnect", "subscribe" etc
 *
 * @package Server
 */
class EventHandler implements WampServerInterface
{
    /**
     * How often to 'push' data to subscribed clients
     */
    const INTERVAL = 2;

    /**
     * @var array List of currently connected clients
     */
    private $clients = [];

    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @constructor
     *
     * @param Logger         $logger         For logging all the events that occur
     * @param LoopInterface  $loop           For settings timers in the loop on events occurring
     * @param RequestFactory $requestFactory Factory that builds and request objects
     * @param ActionFactory  $actionFactory  Factory that builds action handlers given a topic string
     * @param UserRepository $userRepo       Repository for getting the user details
     * @param EntityManager  $em             Entity Manager to get fresh entity data
     */
    public function __construct(
        Logger         $logger,
        LoopInterface  $loop,
        RequestFactory $requestFactory,
        ActionFactory  $actionFactory,
        UserRepository $userRepo,
        EntityManager  $em
    )
    {
        $this->requestFactory = $requestFactory;
        $this->actionFactory  = $actionFactory;
        $this->userRepo       = $userRepo;
        $this->logger         = $logger;
        $this->loop           = $loop;
        $this->em             = $em;
    }

    /**
     * {@inheritdoc}
     *
     * Hit when someone connects to the websocket server
     *
     * Add the connection to the internal list of connections and log it
     */
    public function onOpen(ConnectionInterface $conn)
    {
        /** @var WampConnection $conn */
        $this->clients[$conn->resourceId]['conn'] = $conn;
        $this->logger->addNotice(sprintf("Client Connected: %s", $conn->remoteAddress));
    }

    /**
     * {@inheritdoc}
     *
     * Hit when a user tries to subscribe to a topic
     */
    function onSubscribe(ConnectionInterface $conn, $topic)
    {
        /** @var Topic $topic */
        /** @var WampConnection $conn */
        /** @var SubscriptionRequest $request */
        /** Build a 'Request' object containing everything we need (topic, userid, token etc) **/
        $request = $this->requestFactory->build(AbstractRequest::TYPE_SUB, $conn, $topic);

        /** Have the request validator check that it's json **/
        if (!$request->isValid())
        {
            $this->logger->addWarning(sprintf(
                "Invalid websocket Request received from: %s: %s", $conn->remoteAddress, json_encode($request, true)
            ));
        }

        /** Check that the user actually exists against the user id given **/
        if (!($user = $this->userRepo->loadUserById($request->getUserId())))
        {
            $this->logger->addWarning(sprintf(
                "Invalid user id '%s' within websocket request received from: %s: %s",
                $request->getUserId(), $conn->remoteAddress, json_encode($request, true)
            ));
        }

        /** Refresh the user object because the token may have changed **/
        $this->userRepo->refreshWebsocketTokenDoctrineCacheForUser($user);

        /** Check that the token provided in the request matches the token in the database **/
        if (!$user->hasValidToken($request->getToken()))
        {
            $this->logger->addWarning(sprintf(
                "Invalid user token '%s' within websocket request received from: %s: %s",
                $request->getToken(), $conn->remoteAddress, json_encode($request, true)
            ));
        }

        $timer = $this->loop->addPeriodicTimer(self::INTERVAL, function() use ($user, $conn, $request, $topic)
        {
            /** Actually handle the action (topic, eg "torrents", "statistics" from the user) **/
            try
            {
                $data = $this->actionFactory->build($user, $request->getTopic())->handle();

                $this->clients[$conn->resourceId]['userId']   = $user->getId();
                $this->clients[$conn->resourceId]['username'] = $user->getUsername();
                $this->clients[$conn->resourceId]['topic']    = $request->getTopic();

                return $topic->broadcast($data);
            }
            catch (ActionException $e)
            {
                $this->logger->addWarning($e->getMessage());

                return false;
            }
            catch (ClientException $e)
            {
                $this->logger->addError("Something went wrong with the torrent client: " . $e->getMessage());

                return false;
            }
            catch (\Exception $e)
            {
                $this->logger->addError("Something else went wrong: " . $e->getMessage());

                return false;
            }
        });

        $this->clients[$conn->resourceId]['timer']    = $timer;
        $this->clients[$conn->resourceId]['userId']   = $user->getId();
        $this->clients[$conn->resourceId]['username'] = $user->getUsername();
        $this->clients[$conn->resourceId]['topic']    = $request->getTopic();

        $this->logger->addNotice(sprintf(
            "User %s (id: %d) subscribed to %s, from: %s",
            $user->getUsername(), $user->getId(), $request->getTopic(), $conn->remoteAddress
        ));
    }

    /**
     * {@inheritdoc}
     *
     * Hit when someone disconnects from the websocket server
     *
     * Cancel the timer loop and remove the connection from the internal list of connections and log it
     */
    public function onClose(ConnectionInterface $conn)
    {
        /** Calls do not have these settings **/
        /** @var WampConnection $conn */
        if (isset($this->clients[$conn->resourceId]['timer']))
        {
            if ($this->clients[$conn->resourceId]['timer'] instanceof TimerInterface)
            {
                $this->loop->cancelTimer($this->clients[$conn->resourceId]['timer']);
            }

            $username = $this->clients[$conn->resourceId]['username'];
            $userId = $this->clients[$conn->resourceId]['userId'];
            $topic = $this->clients[$conn->resourceId]['topic'];

            $this->logger->addNotice(sprintf(
                "User %s (id: %d) unsubscribed from %s, from: %s", $username, $userId, $topic, $conn->remoteAddress
            ));
        }
        else
        {
            $this->logger->addNotice(sprintf(
                "Client Disconnected: %s", $conn->remoteAddress
            ));
        }

        unset($this->clients[$conn->resourceId]);
    }

    /**
     * {@inheritdoc}
     */
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    /**
     * {@inheritdoc}
     */
    function onCall(ConnectionInterface $conn, $id, $topic, array $params)
    {
        // TODO: Implement onCall() method.
    }

    /**
     * {@inheritdoc}
     */
    function onUnSubscribe(ConnectionInterface $conn, $topic)
    {
        // TODO: Implement onUnSubscribe() method.
    }

    /**
     * {@inheritdoc}
     */
    function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible)
    {
        // TODO: Implement onPublish() method.
    }
}