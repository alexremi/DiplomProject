<?php

namespace App\Repository;

use App\Entity\Image2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Image2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image2[]    findAll()
 * @method Image2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Image2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Image2::class);
    }

    // /**
    //  * @return Image2[] Returns an array of Image2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Image2
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
