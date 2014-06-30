<?php

namespace App\Model\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ServerRepository
 *
 * @package App\Model\Repository
 */
class ServerRepository extends EntityRepository
{
    public function findByIds(array $ids)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $servers = $qb->select('s')
            ->from('Server', 's')
            ->where($qb->expr()->in('s.id', $ids))
            ->getQuery()
            ->getResult();

        return $servers;
    }
}
