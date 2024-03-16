<?php

namespace App\Repository;

use App\Entity\ExamnsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamnsType>
 *
 * @method ExamnsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamnsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamnsType[]    findAll()
 * @method ExamnsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamnsTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamnsType::class);
    }

    //    /**
    //     * @return ExamnsType[] Returns an array of ExamnsType objects
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

    //    public function findOneBySomeField($value): ?ExamnsType
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
