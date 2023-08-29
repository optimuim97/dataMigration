<?php

namespace App\Repository;

use App\Entity\LoopLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoopLog>
 *
 * @method LoopLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoopLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoopLog[]    findAll()
 * @method LoopLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoopLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoopLog::class);
    }

//    /**
//     * @return LoopLog[] Returns an array of LoopLog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LoopLog
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
