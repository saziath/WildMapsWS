<?php

namespace App\Repository;

use App\Entity\Itinairaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Itinairaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Itinairaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Itinairaire[]    findAll()
 * @method Itinairaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItinairaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Itinairaire::class);
    }

    // /**
    //  * @return Itinairaire[] Returns an array of Itinairaire objects
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
    public function findOneBySomeField($value): ?Itinairaire
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
