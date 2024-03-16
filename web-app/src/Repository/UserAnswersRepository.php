<?php

namespace App\Repository;

use App\Entity\UserAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserAnswers>
 *
 * @method UserAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAnswers[]    findAll()
 * @method UserAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAnswersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAnswers::class);
    }

    //    /**
    //     * @return UserAnswers[] Returns an array of UserAnswers objects
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

    //    public function findOneBySomeField($value): ?UserAnswers
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
