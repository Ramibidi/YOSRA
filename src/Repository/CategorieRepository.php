<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }
/*
    public function getListAuthor($page=1, $maxperpage, $author)
    {
    	$query = $this->createQueryBuilder('p')
	    	->select('p')
    		->where('p.published = 1','p.author = :author')
    		->setParameter('author', $author)
    		
    		;
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return new Paginator($query);
    }
    public function countTotalAuthor($author)
    {
	 $query = $this->createQueryBuilder('p')
	    	->select('COUNT(p)')
    		->where('p.published = 1','p.author = :author')
    		->setParameter('author', $author)
		    ;
		return $count = $query->getQuery()->getSingleScalarResult();
    }
    */
}
