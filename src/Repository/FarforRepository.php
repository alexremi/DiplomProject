<?php

namespace App\Repository;

use App\Entity\Farfor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Farfor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Farfor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Farfor[]    findAll()
 * @method Farfor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarforRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Farfor::class);
    }

    // /**
    //  * @return Farfor[] Returns an array of Farfor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Farfor
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
