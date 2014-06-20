<?php

namespace App\Model\Mapper;

use TorrentPHP\Client\Transmission\ConnectionConfig,
    Server\Factories\ConnectionConfigFactory,
    Server\Factories\ClientTransportFactory,
    Server\Factories\ClientAdapterFactory,
    App\Model\Entity\Download,
    TorrentPHP\Torrent,
    Artax\Request,
    Artax\Client;

/**
 * Class DownloadToTorrentMapper
 *
 * @package App\Model\Mapper
 */
class DownloadToTorrentMapper
{
    /**
     * @var ClientTransportFactory
     */
    private $transportFactory;

    /**
     * @var ClientAdapterFactory
     */
    private $adapterFactory;

    /**
     * @var ConnectionConfigFactory
     */
    private $configFactory;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Client
     */
    private $client;

    /**
     * @constructor
     *
     * @param Client                  $client
     * @param Request                 $request
     * @param ConnectionConfigFactory $configFactory
     * @param CLientTransportFactory  $transportFactory
     * @param ClientAdapterFactory    $adapterFactory
     */
    public function __construct(
        Client                  $client,
        Request                 $request,
        ConnectionConfigFactory $configFactory,
        ClientTransportFactory  $transportFactory,
        ClientAdapterFactory    $adapterFactory
    )
    {
        $this->transportFactory = $transportFactory;
        $this->adapterFactory   = $adapterFactory;
        $this->configFactory    = $configFactory;
        $this->request          = $request;
        $this->client           = $client;
    }

    /**
     * Map Download objects to Torrent objects
     *
     * @param Download[] $downloads An array of Download objects
     *
     * @throws \RuntimeException
     *
     * @returns Torrent[] An array of Torrent objects
     */
    public function map(array $downloads)
    {
        $downloadsCount = count($downloads);

        $callsToMake = [];

        /** Object validation **/
        for ($i = 0; $i < $downloadsCount; $i++)
        {
            if (!($downloads[$i] instanceof Download))
            {
                throw new \RuntimeException(sprintf("%s expected an array of Download objects, %s given at key: %d",
                    __METHOD__, json_encode($downloads[$i]), $i
                ));
            }

            /** Grouping datum to lower total number of calls **/
            $client = $downloads[$i]->getClient();
            $server = $client->getServer();

            $ipAddress = $server->getIpAddress();
            $port      = $client->getPort();
            $authUser  = $client->getAuthUsername();
            $authPass  = $client->getAuthPassword();

            /** Currently the factory only returns instances of TorrentPHP\Client\Transmission\ConnectionConfig **/
            $config = $this->configFactory->build([
                'host'     => $ipAddress,
                'port'     => $port,
                'username' => $authUser,
                'password' => $authPass
            ]);

            /** Assumes that each server only has one type of the same client **/
            $callsToMake[$server->getId()][$client->getId()]['config'] = $config;
            $callsToMake[$server->getId()][$client->getId()]['hashes'][] = $downloads[$i]->getHashString();
        }

        $torrents = [];

        /** Make the calls **/
        foreach ($callsToMake as $serverClients)
        {
            foreach ($serverClients as $keys)
            {
                /** @var ConnectionConfig $clientConfig */
                $clientConfig = $keys['config'];

                /** Transport returns json **/
                $transport = $this->transportFactory->build($this->client, $this->request, $clientConfig);

                /** Adapter returns Torrent objects **/
                $adapter = $this->adapterFactory->build($transport);

                $torrents = array_merge($torrents, $adapter->getTorrents($keys['hashes']));
            }
        }

        return $torrents;
    }
} 