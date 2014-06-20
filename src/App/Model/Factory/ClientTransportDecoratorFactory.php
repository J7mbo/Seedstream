<?php

namespace App\Model\Factory;

use TorrentPHP\Client\Transmission\ConnectionConfig,
    App\Model\Service\ClientTransportDecorator,
    Artax\Request,
    Artax\Client;

/**
 * Class ClientTransportDecoratorFactory
 *
 * @package App\Model\Factory
 */
class ClientTransportDecoratorFactory
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Request
     */
    private $request;

    /**
     * @constructor
     *
     * @param Client  $client
     * @param Request $request
     */
    public function __construct(Client $client, Request $request)
    {
        $this->request = $request;
        $this->client = $client;
    }

    /**
     * Build the relevant ClientTransportDecorator object via a ConnectionConfig
     *
     * @param ConnectionConfig $config
     * @param string           $type
     *
     * @return ClientTransportDecorator
     *
     * @todo Currently tied to a Transmission-specific ConnectionConfig and ClientTransportDecorator
     */
    public function buildWithConnectionConfig(ConnectionConfig $config, $type = 'transmission')
    {
        return new ClientTransportDecorator($this->client, $this->request, $config, $type /** Not used yet **/);
    }
} 