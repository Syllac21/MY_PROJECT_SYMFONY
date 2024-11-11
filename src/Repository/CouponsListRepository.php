<?php

namespace App\Repository;

use App\Entity\CouponsList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CouponsList>
 *
 * @method CouponsList|null find($id, $lockMode = null, $lockVersion = null)
 * @method CouponsList|null findOneBy(array $criteria, array $orderBy = null)
 * @method CouponsList[]    findAll()
 * @method CouponsList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CouponsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CouponsList::class);
    }

//    /**
//     * @return CouponsList[] Returns an array of CouponsList objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CouponsList
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
