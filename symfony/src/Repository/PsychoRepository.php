<?php

namespace App\Repository;

use App\Entity\Psycho;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Psycho|null find($id, $lockMode = null, $lockVersion = null)
 * @method Psycho|null findOneBy(array $criteria, array $orderBy = null)
 * @method Psycho[]    findAll()
 * @method Psycho[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsychoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Psycho::class);
    }

    // /**
    //  * @return Psycho[] Returns an array of Psycho objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Psycho
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
