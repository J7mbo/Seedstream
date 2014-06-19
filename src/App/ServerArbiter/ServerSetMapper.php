<?php

namespace App\ServerArbiter;

use App\Model\Repository\ServerRepository,
    Doctrine\ORM\EntityManager;

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
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @constructor
     *
     * @param ServerRepository $sr
     * @param EntityManager    $em
     * @param ServerSet        $serverSet
     */
    public function __construct(ServerRepository $sr, EntityManager $em, ServerSet $serverSet)
    {
        $this->entityManager = $em;
        $this->serverSet     = $serverSet;
        $this->serverRepo    = $sr;
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

        if (empty($serverIds))
        {
            $servers = $this->serverRepo->findAll();
        }
        else
        {
            $qb = $this->entityManager->createQueryBuilder();

            $servers = $qb->select('s')
                          ->from('Server', 's')
                          ->where($qb->expr()->in('s.id', $serverIds))
                          ->getQuery()
                          ->getResult();
        }

        foreach ($servers as $server)
        {
            $serverSet->addServer($server);
        }

        return $serverSet;
    }
} 