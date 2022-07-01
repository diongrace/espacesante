<?php

namespace App\Repository;

use App\Entity\Hospitalisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hospitalisation>
 *
 * @method Hospitalisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hospitalisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hospitalisation[]    findAll()
 * @method Hospitalisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HospitalisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hospitalisation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Hospitalisation $entity, bool $flush = true): void
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
    public function remove(Hospitalisation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Hospitalisation[] Returns an array of Hospitalisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hospitalisation
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
