<?php

namespace App\Repository;

use App\Entity\Skater;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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

    public function findSkatersYoungerThanAge(int $age): array
    {
        $actualYear = (int) new \DateTimeImmutable('now')->format('Y');
        $limitYear = $actualYear - $age;

        return $this->createQueryBuilder('s')
            ->where('s.birthyear >= :limitYear')
            ->setParameter('limitYear', $limitYear)
            ->getQuery()
            ->getResult();
    }

    public function findSkatersByCountry(string $country): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.nationality = :country')
            ->setParameter('country', $country)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array<string>
     */
    public function getDistinctTrick(): array
    {
        return $this->createQueryBuilder('s')
            ->select('DISTINCT s.favoriteTrick')
            ->getQuery()
            ->getResult();
    }
}
