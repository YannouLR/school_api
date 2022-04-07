<?php

namespace App\Repository;

use App\Entity\NoteMatiereStudent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteMatiereStudent|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteMatiereStudent|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteMatiereStudent[]    findAll()
 * @method NoteMatiereStudent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteMatiereStudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteMatiereStudent::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(NoteMatiereStudent $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(NoteMatiereStudent $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return NoteMatiereStudent[] Returns an array of NoteMatiereStudent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoteMatiereStudent
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
