<?php

namespace App\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use App\BlogBundle\Repository\BlogRepositoryAbstraction;


//TO-DO add absctraction for this repository

class BlogRepository extends EntityRepository implements BlogRepositoryAbstraction
{

    
    public function findBlogById($id)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $query = $queryBuilder
                ->select("blog")
                ->from('AppBlogBundle:Blog', 'blog')
                ->where('blog.id = :id')
                ->setParameter('id', $id)
                ->getQuery();

        $result = $query->getOneOrNullResult();

        return ($result == null) ? array() : $result;
    }

    public function getAllBlogs()
    {

        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        
        $blogs = $queryBuilder
                    ->select('b')
                    ->from('AppBlogBundle:Blog',  'b')
                    ->addOrderBy('b.id', 'DESC')
                    ->getQuery()
                    ->getResult();
        return $blogs;
    }

}
