<?php

namespace Server\Request;

use Server\Request\Validator\ValidatorInterface,
    Ratchet\AbstractConnectionDecorator,
    Ratchet\Wamp\WampConnection,
    Ratchet\Wamp\Topic;

/**
 * Class AbstractRequest
 *
 * Usually a request over the websocket protocol will be a Subscription or Call request. These requests extend this
 * class to gain validation abilities and also encapsulates all of the request data.
 *
 * @package Server\Request
 */
class AbstractRequest implements RequestInterface
{
    /**
     * Constant designating a request type as a subscription
     */
    const TYPE_SUB = "subscription";

    /**
     * Constant designating a request type as a call
     */
    const TYPE_CALL = "call";

    /**
     * @var ValidatorInterface Object performing validation
     */
    protected $validator;

    /**
     * @var Topic The original data of the request
     */
    protected $original;

    /**
     * @var array Required values that websocket json MUST contain
     */
    protected $required = ['topic', 'userId', 'token'];

    /**
     * @var string The supposed (unverified) user id the request originated from
     */
    protected $userId;

    /**
     * @var string The websocket subscription topic
     */
    protected $topic;

    /**
     * @var string The websocket request token
     */
    protected $token;

    /**
     * @var array Validated request data
     */
    protected $data = [];

    /**
     * @var string Unique identifier for the request
     */
    protected $id;

    /**
     * @var string IP address of the request
     */
    protected $ip;

    /**
     * @var AbstractConnectionDecorator
     */
    private $connection;

    /**
     * Setter for Request::$required
     *
     * @param array $array The array
     */
    public function setRequired(array $array)
    {
        $this->required = $array;
    }

    /**
     * Getter for Request::$required
     *
     * @return array The array of required keys in the json string
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Get the request id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the request ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the original data from the request
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Getter for Request::$data
     *
     * @return mixed Returns false if data not validated, Request::$data if okay
     */
    public function getData()
    {
        return (!empty($this->data)) ? $this->data : false;
    }

    /**
     * Get the request token
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the request topic
     *
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Get the request user id
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * {@inheritdoc}
     */
    public function __construct(WampConnection $conn, Topic $data, ValidatorInterface $validator)
    {
        $this->validator  = $validator;
        $this->connection = $conn;
        $this->original   = $data;
    }

    /**
     * {@inheritdoc}
     *
     * Classes inheriting this method should be aware that they are responsible for populating class members (topic,
     * userId, token at minimum) and also any other members they wish to use. When extending this class, you should call
     * parent::isValid() when overriding this method, then performing any of your custom request validation
     */
    public function isValid()
    {
        if ($data = $this->validator->validate($this->original->getId()))
        {
            foreach ($this->required as $key)
            {
                if (array_key_exists($key, $data))
                {
                    $this->$key = $data[$key];
                }
                else
                {
                    return false;
                }
            }

            $this->id = $this->connection->resourceId;
            $this->ip = $this->connection->remoteAddress;

            $this->data = $data;

            return true;
        }
        else
        {
            return false;
        }
    }
}