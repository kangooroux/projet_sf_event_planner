<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DateTime;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    // /**
    //  * @return Event[] Returns an array of Event objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findEventsFromNow()
    {

        $value = new DateTime('now');
        return $this->createQueryBuilder('e')
            ->andWhere('e.date > :val')
            ->setParameter('val', $value)
            ->orderBy('e.date', 'ASC')
            ->setMaxResults(null)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findEventsFromUser()
    {

        $value = new DateTime('now');
        return $this->createQueryBuilder('e')
            ->andWhere('e.date > :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'DESC')
            ->setMaxResults(null)
            ->getQuery()
            ->getResult()
            ;
    }
}
