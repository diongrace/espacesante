<?php

namespace App\Repository;

use App\Entity\HistoriqueHospitalisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoriqueHospitalisation>
 *
 * @method HistoriqueHospitalisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueHospitalisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueHospitalisation[]    findAll()
 * @method HistoriqueHospitalisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueHospitalisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueHospitalisation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(HistoriqueHospitalisation $entity, bool $flush = true): void
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
    public function remove(HistoriqueHospitalisation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return HistoriqueHospitalisation[] Returns an array of HistoriqueHospitalisation objects
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
    public function findOneBySomeField($value): ?HistoriqueHospitalisation
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
