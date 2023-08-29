<?php

namespace App\Repository;

use App\Entity\SecteurActivites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecteurActivites>
 *
 * @method SecteurActivites|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecteurActivites|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecteurActivites[]    findAll()
 * @method SecteurActivites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecteurActivitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecteurActivites::class);
    }

//    /**
//     * @return SecteurActivites[] Returns an array of SecteurActivites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SecteurActivites
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
