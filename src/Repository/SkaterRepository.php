<?php

namespace App\Repository;

use App\Entity\Skater;
use App\Factory\SkaterFactory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Skater>
 */
class SkaterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skater::class);
    }

    public function findNamesByFavoriteTrick(string $favoriteTrick): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.favoriteTrick = :favorite_trick')
            ->setParameter('favorite_trick', $favoriteTrick)
            ->getQuery()
            ->getResult();
    }
}
