<?php

namespace Server\Factories;

use TorrentPHP\Client\Transmission\ConnectionConfig;

/**
 * Class ConnectionConfigFactory
 *
 * Allows the instantiation of the Transmission ConnectionConfig to be delayed - this is DI'd by Auryn into ActionFactory
 *
 * @package Server
 */
class ConnectionConfigFactory
{
    /**
     * Build the ConnectionConfig object
     *
     * @param array $params
     *
     * @return ConnectionConfig
     */
    public function build(array $params)
    {
        return new ConnectionConfig($params);
    }
} 