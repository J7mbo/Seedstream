<?php

namespace Server\Factories;

use TorrentPHP\Client\Transmission\ClientTransport,
    TorrentPHP\Client\Transmission\ClientAdapter,
    TorrentPHP\TorrentFactory,
    TorrentPHP\FileFactory;

/**
 * Class ClientAdapterFactory
 *
 * Allows the instantiation of the Transmission ClientAdapter to be delayed - this is DI'd by Auryn into ActionFactory
 *
 * @package Server\Factories
 */
class ClientAdapterFactory
{
    /**
     * @constructor
     *
     * Why are these objects here? Because they're empty factories that can be auto DI'd by Auryn
     *
     * @param TorrentFactory $torrentFactory
     * @param FileFactory    $fileFactory
     */
    public function __construct(TorrentFactory $torrentFactory, FileFactory $fileFactory)
    {
        $this->torrentFactory = $torrentFactory;
        $this->fileFactory    = $fileFactory;
    }

    /**
     * Builds a ClientAdapter object
     *
     * @param ClientTransport $clientTransport
     *
     * @return ClientAdapter
     */
    public function build(ClientTransport $clientTransport)
    {
        return new ClientAdapter($clientTransport, $this->torrentFactory, $this->fileFactory);
    }
} 