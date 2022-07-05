<?php

namespace App\Repository;

use App\Entity\HashGerada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HashGerada|null find($id, $lockMode = null, $lockVersion = null)
 * @method HashGerada|null findOneBy(array $criteria, array $orderBy = null)
 * @method HashGerada[]    findAll()
 * @method HashGerada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HashGeradaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HashGerada::class);
    }

    // /**
    //  * @return HashGerada[] Returns an array of HashGerada objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HashGerada
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
