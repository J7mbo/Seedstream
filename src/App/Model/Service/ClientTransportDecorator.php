<?php

namespace App\Model\Service;

use TorrentPHP\Client\Transmission\ClientTransport,
    Artax\ClientException as HTTPException,
    TorrentPHP\ClientException;

/**
 * Class ClientTransportDecorator
 *
 * @package App\Model\Service
 *
 * @todo Stop this from being tied to Transmission
 */
class ClientTransportDecorator extends ClientTransport
{
    /**
     * Method for the RPC call to get client stats (used for torrent count)
     */
    const METHOD_STATS = 'session-stats';

    /**
     * Get the number of downloads (either active or total) from the client
     *
     * @param boolean $active True to return a count of only active torrents, false for the total count
     *
     * @throws ClientException
     *
     * @return int The total number of downloads
     */
    public function getDownloadCount($active = false)
    {
        $method = self::METHOD_STATS;
        $args   = [];

        $key = ($active === true) ? 'activeTorrentCount' : 'torrentCount';

        try
        {
            return json_decode($this->performRPCRequest($method, $args)->getBody())->arguments->{$key};
        }
        catch(HTTPException $e)
        {
            throw new ClientException($e->getMessage());
        }
    }
}