<?php

namespace App\ServerArbiter\Rules;

use App\ServerArbiter\Rules\Supporting\ServerDownloadsCountFetcher,
    App\ServerArbiter\ServerSet,
    App\Model\Entity\Server;

/**
 * Class ServerDownloadsComparisonRule
 *
 * Returns that the server has the lowest download count
 *
 * @package App\ServerArbiter\Rules
 */
class ServerDownloadsComparisonRule implements Rule
{
    /**
     * @var ServerSet
     */
    private $serverSet;

    /**
     * @var ServerDownloadsCountFetcher
     */
    private $countFetcher;

    /**
     * @constructor
     *
     * @param ServerDownloadsCountFetcher $countFetcher The object to perform the torrent count data retrieval
     * @param ServerSet                   $serverSet    A set of Servers
     */
    public function __construct(ServerDownloadsCountFetcher $countFetcher, ServerSet $serverSet)
    {
        $this->serverSet = $serverSet;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Server $server)
    {
        $lowest = true;

        try
        {
            $serverDownloadCount = $this->countFetcher->getDownloadCount($server);

            foreach ($this->serverSet as $otherServer)
            {
                $otherServerDownloadCount = $this->countFetcher->getDownloadCount($otherServer);

                if ($otherServerDownloadCount <= $serverDownloadCount)
                {
                    $lowest = false;
                    break;
                }
            }
        }
        catch (\RuntimeException $e)
        {
            $lowest = false;
        }

        return $lowest;
    }
}