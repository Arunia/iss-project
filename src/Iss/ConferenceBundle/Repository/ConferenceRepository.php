<?php

namespace Iss\ConferenceBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ConferenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConferenceRepository extends EntityRepository
{
    public function getConferencesForUser($user_id = null)
    {
        $qb = $this->createQueryBuilder('c');

        if ($user_id) {
            $qb->andWhere('c.owner = :user_id')
                ->setParameter('user_id', $user_id);
        }

        $query = $qb->getQuery();

        return $query->getResult();
    }
}
