<?php

namespace App\Model\Service;

use App\Model\Factory\ClientTransportDecoratorFactory,
    Server\Factories\ConnectionConfigFactory,
    App\Model\Entity\Server;

/**
 * Class ServerDownloadsCountFetcher
 *
 * This makes calls to the client server each time it is used, so enabling apc cache is highly encouraged
 *
 * @package App\Model\Service
 */
class ServerDownloadsCountFetcher
{
    /**
     * @var int The timeout for holding cached counts (to prevent excessive requests), in seconds
     */
    private $cacheTimeout = 120;

    /**
     * @var ClientTransportDecoratorFactory
     */
    private $retrieverFactory;

    /**
     * @var ConnectionConfigFactory
     */
    private $configFactory;

    /**
     * @constructor
     *
     * @param ClientTransportDecoratorFactory $retrieverFactory
     * @param ConnectionConfigFactory         $configFactory
     */
    public function __construct(ClientTransportDecoratorFactory $retrieverFactory, ConnectionConfigFactory $configFactory)
    {
        $this->retrieverFactory = $retrieverFactory;
        $this->configFactory    = $configFactory;
    }

    /**
     * Change the APC cache timeout (defaults to 120 seconds)
     *
     * @param int $timeoutInSeconds A non-negative integer, greater than 0 and less than 3600 (1 hour)
     *
     * @throws \InvalidArgumentException When a negative or non-integer parameter is provided
     */
    public function changeCacheTimeout($timeoutInSeconds)
    {
        if (is_int($timeoutInSeconds) && $timeoutInSeconds >= 0 && $timeoutInSeconds <= 3600)
        {
            $this->cacheTimeout = $timeoutInSeconds;
        }
        else
        {
            throw new \InvalidArgumentException(sprintf(
                "Cache timeout must be a non-negative integer less than 3600 (one hour), %s provided", $timeoutInSeconds
            ));
        }
    }

    /**
     * Attempt to get the download count from the server via an RPC call
     *
     * @param Server $server The server to get the download count of
     *
     * @throws \RuntimeException When the data can't be retrieved, either due to a HTTP error, auth error or otherwise
     *
     * @return int The download count
     */
    public function getDownloadCount(Server $server)
    {
        $ipAddress = $server->getIpAddress();

        /** Can we get a cached version? **/
        if ($this->checkApcCache($ipAddress))
        {
            return $this->fetchFromApcCache($ipAddress);
        }

        $serverClients = $server->getClients();
        $serverDownloadCount = 0;

        /** Get the download count from each client on the server and add it **/
        foreach ($serverClients as $serverClient)
        {
            /** @var \App\Model\Entity\Client $serverClient */
            $port         = $serverClient->getPort();
            $type         = $serverClient->getType();
            $authUsername = $serverClient->getAuthUsername();
            $authPassword = $serverClient->getAuthPassword();

            $config = $this->configFactory->build([
                'host' => $ipAddress,
                'port' => $port,
                'username' => $authUsername,
                'password' => $authPassword
            ]);

            $countRetriever = $this->retrieverFactory->buildWithConnectionConfig($config, $type);

            $serverDownloadCount += $countRetriever->getDownloadCount();
        }

        /** Can we cache the download count? **/
        if ($this->checkCanCacheWithApc())
        {
            $this->storeInApcCache($ipAddress, $serverDownloadCount);
        }

        return $serverDownloadCount;
    }

    /**
     * Helper to check if apc caching is enabled
     *
     * @return boolean
     */
    private function checkCanCacheWithApc()
    {
        return extension_loaded('apc') && ini_get('apc.enabled');
    }

    /**
     * Helper to retrieve data from apc cache, if apc is enabled and if it exists
     *
     * @param string $ipAddress
     *
     * @return boolean
     */
    private function checkApcCache($ipAddress)
    {
        return ($this->checkCanCacheWithApc()) ? apc_exists($ipAddress) : false;
    }

    /**
     * Helper to fetch data from apc cache
     *
     * @param string $ipAddress
     *
     * @return int The server download count stored against the ipAddress given
     */
    private function fetchFromApcCache($ipAddress)
    {
        return apc_fetch($ipAddress);
    }

    /**
     * Helper to store data in the apc cache
     *
     * @param string $ipAddress
     * @param int    $serverDownloadCount
     */
    private function storeInApcCache($ipAddress, $serverDownloadCount)
    {
        apc_store($ipAddress, $serverDownloadCount, $this->cacheTimeout);
    }
}