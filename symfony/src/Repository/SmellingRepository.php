<?php

namespace App\Repository;

use App\Entity\Smelling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Smelling|null find($id, $lockMode = null, $lockVersion = null)
 * @method Smelling|null findOneBy(array $criteria, array $orderBy = null)
 * @method Smelling[]    findAll()
 * @method Smelling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmellingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Smelling::class);
    }

    // /**
    //  * @return Smelling[] Returns an array of Smelling objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Smelling
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
