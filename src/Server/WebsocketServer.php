<?php

namespace Server;

use Ratchet\Http\HttpServer;
use Server\Action\ActionFactory;
use Server\Request\Factory as RequestFactory;
use App\Model\Repository\UserRepository;
use Monolog\Handler\StreamHandler;
use Ratchet\WebSocket\WsServer;
use Doctrine\ORM\EntityManager;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use React\EventLoop\Factory;
use React\Socket\Server;
use App\Application;
use Monolog\Logger;

/** @var boolean $cli If the bootstrap (/web/index.php) sees this variable, don't 'run' the HTTP front-controller */
$cli = true;

/** Get our already configured Silex application object **/
require_once __DIR__ . "/../../web/index.php";

/** Logging **/
$logger = new Logger('seedstream');
$logger->pushHandler(new StreamHandler('/var/log/seedstream/server.log'));

/** Set up error handler **/
register_shutdown_function(function() use ($logger, $cli)
{
    if (error_get_last())
    {
        $logger->addCritical(print_r(error_get_last(), true));

        /** It's a CLI program, so output to STDOUT **/
        var_dump(error_get_last());
    }
});

/** Create Event Loop **/
$loop = Factory::create();

/** @var Application $app The $app var will exist here, this is for the IDE */
/** @var EntityManager $orm */
$orm = $app['orm.em'];

/** @var UserRepository $userRepo */
$userRepo = $orm->getRepository('\App\Model\Entity\User');

/** Run the Event Loop **/
$webSock = new Server($loop);
$webSock->listen(8080, '0.0.0.0');
$logger->addNotice('Websocket Server Starting...');

/** Needed to set up DiC from config **/
$app->resolveAuryn();

new IoServer(
    new HttpServer(
        new WsServer(
            new WampServer(
                new EventHandler(
                    /** All the stuff our EventHandler needs DI'ing to do it's job for websocket requests **/
                    $logger, $loop, new RequestFactory, new ActionFactory($app->provider), $userRepo
                )
            )
        )
    ),
    $webSock
);

$loop->run();