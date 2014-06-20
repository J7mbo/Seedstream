<?php

namespace App\Model\Service\Statistics;

use Symfony\Component\Security\Core\SecurityContext,
    App\Model\Mapper\DownloadToTorrentMapper,
    App\Model\Repository\UserRepository,
    TorrentPHP\Torrent;

/**
 * Class ActiveDownloadsStatistic
 *
 * Gets the number of active downloads for the logged-in user
 *
 * @package App\Model\Service\Statistics
 */
class ActiveDownloadsStatistic
{
    /**
     * @var DownloadToTorrentMapper
     */
    private $downloadToTorrentMapper;

    /**
     * @var SecurityContext
     */
    private $securityContext;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @constructor
     *
     * @param SecurityContext         $securityContext
     * @param UserRepository          $userRepository
     * @param DownloadToTorrentMapper $mapper
     */
    public function __construct(
        SecurityContext         $securityContext,
        UserRepository          $userRepository,
        DownloadToTorrentMapper $mapper
    )
    {
        $this->downloadToTorrentMapper = $mapper;
        $this->securityContext = $securityContext;
        $this->userRepository  = $userRepository;
    }

    /**
     * Get the number of active downloads
     *
     * @return int
     */
    public function getStatistic()
    {
        $userId    = $this->securityContext->getToken()->getUser()->getId();
        $user      = $this->userRepository->loadUserById($userId);
        $downloads = $user->getDownloads()->toArray();

        $active = array_filter($this->downloadToTorrentMapper->map($downloads), function($torrent) {
            /** @var Torrent $torrent **/
            return $torrent->getStatus() === Torrent::STATUS_DOWNLOADING;
        });

        return count($active);
    }
} 