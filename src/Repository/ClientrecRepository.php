<?php


namespace App\Repository;

use App\Entity\Clientrec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Clientrec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clientrec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clientrec[]    findAll()
 * @method Clientrec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ClientrecRepository extends ServiceEntityRepository
{


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clientrec::class);
    }
}
/*
class ClientrecRepository extends  ServiceEntityRepository
{

    public function findEntitiesByString($str){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT *
                FROM clientrec 
                WHERE nom LIKE ?'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }
}
/*
    public function findEntitiesByString($str)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT * FROM clientrec WHERE nom like ?')
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }
    // /**
    //  * @return Reclamation[] Returns an array of Reclamation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reclamation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

