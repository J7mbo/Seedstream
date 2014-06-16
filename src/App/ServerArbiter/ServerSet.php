<?php

namespace App\ServerArbiter;

use App\Model\Entity\Server;

/**
 * Class ServerSet
 *
 * @package App\ServerArbiter
 */
class ServerSet implements \Iterator, \Countable
{
    /**
     * @var Server[] An array of Server objects
     */
    private $servers;

    /**
     * @var int Iterator position key
     */
    private $position = 0;

    /**
     * Add a Server to the ServerSet
     *
     * @param Server $server
     */
    public function addServer(Server $server)
    {
        if (!in_array($server, $this->servers))
        {
            $this->servers[] = $server;
        }
    }

    /**
     * Remove a Server from the ServerSet by it's key
     *
     * @param int $serverKey The numeric key within the servers array to unset
     *
     * @throws \OutOfBoundsException     When a non-existant key is provided
     * @throws \InvalidArgumentException When a non-integer parameter is provided
     */
    public function removeServer($serverKey)
    {
        if (is_int($serverKey))
        {
            if (array_key_exists($serverKey, $this->servers))
            {
                unset($this->servers[$serverKey]);
            }
            else
            {
                throw new \OutOfBoundsException(sprintf(
                    "%s was passed a out of bounds array key: %s does not exist in this serverset", __METHOD__, $serverKey
                ));
            }
        }
        else
        {
            throw new \InvalidArgumentException(sprintf(
                "%s expected an integer serverKey parameter, got: '%s' instead", __METHOD__, $serverKey
            ));
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return Server
     */
    public function current()
    {
        return $this->servers[$this->position];
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->servers[$this->position]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->servers);
    }
}