<?php

namespace App\Model\Service\ServerArbiter;

use App\Model\Repository\ServerRepository;

/**
 * Class ServerSetMapper
 *
 * Uses the ServerRepository to map Server entities into a ServerSet
 *
 * This can be Dependency Injected around the applicaton to retrieve a ServerSet whenever it is required
 *
 * @package App\ServerArbiter
 */
class ServerSetMapper
{
    /**
     * @var ServerRepository
     */
    private $serverRepo;

    /**
     * @var ServerSet
     */
    private $serverSet;

    /**
     * @constructor
     *
     * @param ServerRepository $sr
     * @param ServerSet        $serverSet
     */
    public function __construct(ServerRepository $sr, ServerSet $serverSet)
    {
        $this->serverSet  = $serverSet;
        $this->serverRepo = $sr;
    }

    /**
     * Fetch a ServerSet given an array of ids
     *
     * @param array $serverIds Optional array of integer ids to create a ServerSet from
     *
     * @return ServerSet
     */
    public function fetchServerSet(array $serverIds = array())
    {
        $serverSet = $this->serverSet;

        $servers = (empty($serverIds)) ? $this->serverRepo->findAll() : $this->serverRepo->findByIds($serverIds);

        foreach ($servers as $server)
        {
            $serverSet->addServer($server);
        }

        return $serverSet;
    }
} 