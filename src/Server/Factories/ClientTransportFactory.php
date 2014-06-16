<?php

namespace Server\Factories;

use TorrentPHP\Client\Transmission\ConnectionConfig,
    TorrentPHP\Client\Transmission\ClientTransport,
    Artax\Client,
    Artax\Request;

/**
 * Class ClientTransportFactory
 *
 * Allows the instantiation of the Transmission ClientTransport to be delayed - this is DI'd by Auryn into ActionFactory
 *
 * @package Server\Factories
 */
class ClientTransportFactory
{
    /**
     * Construct the ClientTransport object
     *
     * @param Client           $client
     * @param Request          $request
     * @param ConnectionConfig $config
     *
     * @return ClientTransport
     */
    public function build(Client $client, Request $request, ConnectionConfig $config)
    {
        return new ClientTransport($client, $request, $config);
    }
} 