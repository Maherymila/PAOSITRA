<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    // /**
    //  * @return Produits[] Returns an array of Produits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findProCat()
    {
        $rawSQL = "SELECT pd.NomProduits, SUM (mv.Quantiter) As StockageProduit FROM App\Entity\Mouvements mv INNER JOIN App\Entity\Produits pd WITH pd.id=mv.Produits  GROUP BY pd.NomProduits";
        $stmt = $this->getEntityManager()->createQuery($rawSQL);

        return $stmt->execute();
    }

    public function findProd()
    {
        $rawSQL = "SELECT pd.NomProduits, mv.Quantiter FROM App\Entity\Mouvements mv INNER JOIN App\Entity\Produits pd WITH pd.id=mv.Produits WHERE  mv.Action=3";
        $stmt = $this->getEntityManager()->createQuery($rawSQL);

        return $stmt->execute();
    }

    public function findEntrerPro()
    {
        $rawSQL = "SELECT pd.NomProduits, mv.Quantiter FROM App\Entity\Mouvements mv INNER JOIN App\Entity\Produits pd WITH pd.id=mv.Produits WHERE  mv.Action=2";
        $stmt = $this->getEntityManager()->createQuery($rawSQL);

        return $stmt->execute();
    }

    /*
    public function findOneBySomeField($value): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
