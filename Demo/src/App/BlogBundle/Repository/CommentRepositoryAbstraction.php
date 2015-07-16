<?php

namespace App\BlogBundle\Repository;

interface CommentRepositoryAbstraction
{
    
    public function getCommentsForBlog($blogId, $showActive);

}

?>