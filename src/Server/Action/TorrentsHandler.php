<?php

namespace Server\Action;

use App\Model\Repository\ServerRepository;
use Artax\Client;
use Artax\Request;
use Server\Factories\ClientTransportFactory;
use Server\Factories\ConnectionConfigFactory;
use App\Model\Entity\Server;
use Server\Factories\ClientAdapterFactory;
use TorrentPHP\Torrent;
use TorrentPHP\ClientException;

/**
 * Class TorrentsHandler
 *
 * Service to provide the torrent data to the EventHandler
 *
 * @see <https://github.com/J7mbo/TorrentPHP> for the torrent data retrieval
 * @see <https://github.com/rdlowrey/Artax> for the HTTP client used for the JSON-RPC requests
 *
 * @package Server\Action
 */
class TorrentsHandler implements ActionHandler
{
    /**
     * @var ServerRepository
     */
    private $serverRepo;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ConnectionConfigFactory
     */
    private $connectionConfigFactory;

    /**
     * @var ClientTransportFactory
     */
    private $clientTransportFactory;

    /**
     * @var ClientAdapterFactory
     */
    private $clientAdapterFactory;

    /**
     * @constructor
     *
     * @param ServerRepository        $sr
     * @param Client                  $cl
     * @param Request                 $re
     * @param ConnectionConfigFactory $ccf
     * @param ClientTransportFactory  $ctf
     * @param ClientAdapterFactory    $caf
     */
    public function __construct(ServerRepository $sr, Client $cl, Request $re, ConnectionConfigFactory $ccf, ClientTransportFactory $ctf, ClientAdapterFactory $caf)
    {
        $this->serverRepo = $sr;
        $this->client = $cl;
        $this->request = $re;
        $this->connectionConfigFactory = $ccf;
        $this->clientTransportFactory = $ctf;
        $this->clientAdapterFactory = $caf;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ClientException When data retrieval goes wrong (bu
     */
    public function handle()
    {
        $data = $this->getData();

        var_dump('OK, got data from TorrentsHandler (now what?!?!');
        var_dump($data);
    }

    /**
     * Actually get the data using the TorrentPHP and Artax libraries
     *
     * @return Torrent[]
     */
    private function getData()
    {
        /** @var Server[] $servers */
        $servers = $this->serverRepo->findAll();

        /** @var Torrent[] $torrents */
        $torrents = [];

        foreach ($servers as $server)
        {
            if ($server->isActive())
            {
                $client = $server->getclient();

                $config = $this->connectionConfigFactory->build([
                    'host'     => $server->getIpAddress(),
                    'port'     => $client->getPort(),
                    'username' => $client->getAuthUsername(),
                    'password' => $client->getAuthPassword()
                ]);

                $artaxClient = clone $this->client;
                $artaxRequest = clone $this->request;

                $transport = $this->clientTransportFactory->build($artaxClient, $artaxRequest, $config);
                $adapter   = $this->clientAdapterFactory->build($transport);

                $torrents[] = $adapter->getTorrents();
            }
        }

        return $torrents;
    }
} 