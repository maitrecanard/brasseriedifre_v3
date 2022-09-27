<?php

namespace App\Repository;

use App\Entity\QuantityPrix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuantityPrix>
 *
 * @method QuantityPrix|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuantityPrix|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuantityPrix[]    findAll()
 * @method QuantityPrix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantityPrixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuantityPrix::class);
    }

    public function add(QuantityPrix $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(QuantityPrix $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return QuantityPrix[] Returns an array of QuantityPrix objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuantityPrix
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
