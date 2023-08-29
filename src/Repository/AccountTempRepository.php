<?php

namespace App\Repository;

use App\Entity\AccountTemp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AccountTemp>
 *
 * @method AccountTemp|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountTemp|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountTemp[]    findAll()
 * @method AccountTemp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountTempRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountTemp::class);
    }

//    /**
//     * @return AccountTemp[] Returns an array of AccountTemp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AccountTemp
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
