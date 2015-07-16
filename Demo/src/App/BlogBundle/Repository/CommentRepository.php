<?php

namespace App\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use App\BlogBundle\Repository\CommentRepositoryAbstraction;


//TO-DO add absctraction for this repository

class CommentRepository extends EntityRepository implements CommentRepositoryAbstraction
{

    
    public function getCommentsForBlog($blogId, $showActive = 1)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.postid = :blogId')
                   ->addOrderBy('c.createdon')
                   ->setParameter('blogId', $blogId);

        if ($showActive)
            $qb->andWhere('c.isactive = :showActive')
               ->setParameter('showActive', $showActive);

        return $qb->getQuery()
                  ->getResult();
    }

}
