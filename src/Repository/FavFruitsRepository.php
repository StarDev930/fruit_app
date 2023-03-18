<?php

namespace App\Repository;

use App\Entity\FavFruits;
use App\Entity\Fruits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FavFruits>
 *
 * @method FavFruits|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavFruits|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavFruits[]    findAll()
 * @method FavFruits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavFruitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FavFruits::class);
    }

    public function add(FavFruits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FavFruits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FavFruits[] Returns an array of FavFruits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    // public function findAllBy(): array
    // {
    //     return $this->createQueryBuilder('f')
    //         ->orderBy('f.id', 'DESC')
    //         ->leftJoin('Fruits:ChildOne', 'f', 'WITH', 'f.id = f.fruit_id')
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

//    public function findOneBySomeField($value): ?FavFruits
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
