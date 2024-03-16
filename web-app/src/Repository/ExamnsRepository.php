<?php

namespace App\Repository;

use App\Entity\Examns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Examns>
 *
 * @method Examns|null find($id, $lockMode = null, $lockVersion = null)
 * @method Examns|null findOneBy(array $criteria, array $orderBy = null)
 * @method Examns[]    findAll()
 * @method Examns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamnsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Examns::class);
    }

    //    /**
    //     * @return Examns[] Returns an array of Examns objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Examns
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
