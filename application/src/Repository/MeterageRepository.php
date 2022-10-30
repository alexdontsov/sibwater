<?php

namespace App\Repository;

use App\Entity\Meterage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Meterage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Meterage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Meterage[]    findAll()
 * @method Meterage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeterageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Meterage::class);
    }

    public function findByFilter(
        $parameter
    )
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.parameter = :parameter')
            ->setParameter('parameter', $parameter)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Meterage
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
