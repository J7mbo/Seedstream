<?php

namespace Server\Action;

use App\Model\Mapper\DownloadToTorrentMapper,
    TorrentPHP\ClientException,
    App\Model\Entity\User;
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
     * @var DownloadToTorrentMapper
     */
    private $mapper;

    /**
     * @var User
     */
    private $user;

    /**
     * @constructor
     *
     * @param User                    $user   This is provided at runtime by ActionFactory::build()
     * @param DownloadToTorrentMapper $mapper This is provided automatically by the Auryn DiC
     */
    public function __construct(User $user, DownloadToTorrentMapper $mapper)
    {
        $this->mapper = $mapper;
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ClientException When data retrieval goes wrong
     */
    public function handle()
    {
        $downloads = $this->user->getDownloads()->toArray();

        $torrents = $this->mapper->map($downloads);

        return $torrents;
    }
} 