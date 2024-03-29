<?php

namespace App\Repository;

use App\Entity\Inscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Inscription>
 *
 * @method Inscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscription[]    findAll()
 * @method Inscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscription::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Inscription $entity, bool $flush = true): void
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
    public function remove(Inscription $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

     /**
     * @return Inscription[] Returns an array of Inscription objects
      */
    
    public function findBySexe($genre)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.genre = :genre')
            ->setParameter('genre', $genre)
            ->orderBy('i.id', 'ASC')
            //->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    //  public function findBypersonne($genre, $ville )
    //  {
    //      return $this->createQueryBuilder('i')
    //         ->andWhere('i.genre = :genre and i.ville = :ville ')
    //         ->setParameters(['genre'=>$genre,'ville'=>$ville ])
    //         ->orderBy('i.id', 'ASC')
    //        //->setMaxResults(1)
    //         ->getQuery()
    //         ->getResult()
    //      ;
    //  }

     public function findByville($ville )
     {
         return $this->createQueryBuilder('i')
            ->andWhere('i.ville = :ville ')
            ->setParameters('ville',$ville)
            ->orderBy('i.id', 'ASC')
           //->setMaxResults(1)
            ->getQuery()
            ->getResult()
         ;
     }
    
    

    
    // public function findOneBySomeField($value): ?Inscription
    // {
    //     return $this->createQueryBuilder('i')
    //         ->andWhere('i.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }

}
