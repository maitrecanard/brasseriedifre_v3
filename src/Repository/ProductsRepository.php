<?php

namespace App\Repository;

use App\Repository\HistoricMovementRepository;
use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Products>
 *
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    protected $historicMouvement;
    public function __construct(ManagerRegistry $registry, HistoricMovementRepository $historicMovementRepository)
    {
        parent::__construct($registry, Products::class);
        $this->historicMouvement = $historicMovementRepository;
    }

    public function add(Products $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Products $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function removeHistoricalProduct(Products $entity, bool $flush = false): void
    {
        $historical = $entity->getHistoricMovements()->getValues();

        foreach($historical AS $historic) {
            $this->getEntityManager()->remove($historic);
        }

        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

       /**
        * @return Products[] Returns an array of Products objects
        */
       public function findByOtherProduct($value): array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.id != :val')
               ->setParameter('val', $value)
               ->setMaxResults(4)
               ->getQuery()
               ->getResult()
           ;
       }

//    public function findOneBySomeField($value): ?Products
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
