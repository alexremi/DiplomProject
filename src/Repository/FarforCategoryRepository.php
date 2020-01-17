<?php

namespace App\Repository;

use App\Entity\FarforCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FarforCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FarforCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FarforCategory[]    findAll()
 * @method FarforCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarforCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FarforCategory::class);
    }

    // /**
    //  * @return FarforCategory[] Returns an array of FarforCategory objects
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
    public function findOneBySomeField($value): ?FarforCategory
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
