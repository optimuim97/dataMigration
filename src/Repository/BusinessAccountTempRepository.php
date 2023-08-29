<?php

namespace App\Repository;

use App\Entity\BusinessAccountTemp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BusinessAccountTemp>
 *
 * @method BusinessAccountTemp|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessAccountTemp|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessAccountTemp[]    findAll()
 * @method BusinessAccountTemp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessAccountTempRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessAccountTemp::class);
    }

//    /**
//     * @return BusinessAccountTemp[] Returns an array of BusinessAccountTemp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BusinessAccountTemp
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
