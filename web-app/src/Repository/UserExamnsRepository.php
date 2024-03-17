<?php

namespace App\Repository;

use App\Entity\UserExamns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserExamns>
 *
 * @method UserExamns|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserExamns|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserExamns[]    findAll()
 * @method UserExamns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserExamnsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserExamns::class);
    }

    //    /**
    //     * @return UserExamns[] Returns an array of UserExamns objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserExamns
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
