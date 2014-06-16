<?php

namespace App\ServerArbiter\Rules\Supporting;

use App\Model\Entity\Server,
    Artax\Request,
    Artax\Client;

/**
 * Class ServerDownloadsCountFetcher
 *
 * @package App\ServerArbiter\Rules\Supporting
 */
class ServerDownloadsCountFetcher
{
    /**
     * The method to call to get session statistics (including the count)
     */
    const METHOD_STATS = 'session-stats';

    /**
     * @var int The timeout for holding cached counts (to prevent excessive requests), in seconds
     */
    private $cacheTimeout = 120;

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
        $client = clone $this->client;
        $request = clone $this->request;

        $ipAddress = $server->getIpAddress();

        if (extension_loaded('apc') && ini_get('apc.enabled'))
        {
            if (apc_exists($ipAddress))
            {
                return apc_fetch($ipAddress);
            }
        }

        $port = $server->getClient()->getPort();
        $endpoint = $server->getClient()->getEndPoint();
        $authUsername = $server->getClient()->getAuthUsername();
        $authPassword = $server->getClient()->getAuthPassword();

        $request->setUri(sprintf('http://%s:%s/%s', $ipAddress, $port, $endpoint));
        $request->setMethod('GET');
        $request->setAllHeaders(array(
            'Content-Type'  => 'application/json; charset=utf-8',
            'Authorization' => sprintf('Basic %s', base64_encode(
                sprintf('%s:%s', $authUsername, $authPassword)
            ))
        ));

        /** Let's not lag this up now! **/
        $client->setOption('connectTimeout', 5);
        $client->setOption('transferTimeout', 5);

        $response = $client->request($request);

        if ($response->hasHeader('X-Transmission-Session-Id'))
        {
            $sessionId = $client->request($request)->getHeader('X-Transmission-Session-Id');

            $request->setMethod('POST');
            $request->setHeader('X-Transmission-Session-Id', $sessionId);
            $request->setBody(json_encode(array(
                'method'    => self::METHOD_STATS
            )));

            $response = $client->request($request);

            if ($response->getStatus() === 200)
            {
                $body = $response->getBody();

                $isJson = function() use ($body) {
                    json_decode($body);
                    return (json_last_error() === JSON_ERROR_NONE);
                };

                if ($isJson())
                {
                    $data = json_decode($body);

                    if (isset($data->arguments->torrentCount))
                    {
                        if (extension_loaded('apc') && ini_get('apc.enabled'))
                        {
                            apc_store($ipAddress, (int)$data->arguments->torrentCount, $this->cacheTimeout);
                        }

                        return (int)$data->arguments->torrentCount;
                    }
                    else
                    {
                        throw new \RuntimeException(sprintf(
                            '"%s" did not get back sessionCount key (torrent count), got "%s" instead',
                            self::METHOD_STATS, print_r($response->getBody(), true)
                        ));
                    }
                }
                else
                {
                    throw new \RuntimeException(sprintf(
                        '"%s" did not get back a JSON response body, got "%s" instead',
                        self::METHOD_STATS, print_r($response->getBody(), true)
                    ));
                }
            }
            else
            {
                throw new \RuntimeException(sprintf(
                    '"%s" expected 200 response, got "%s" instead, reason: "%s"',
                    self::METHOD_STATS, $response->getStatus(), $response->getReason()
                ));
            }
        }
        else
        {
            throw new \RuntimeException("Response from torrent client did not return an X-Transmission-Session-Id header");
        }
    }
} 