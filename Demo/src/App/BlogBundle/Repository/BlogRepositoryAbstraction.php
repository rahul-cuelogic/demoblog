<?php

namespace App\BlogBundle\Repository;


interface BlogRepositoryAbstraction
{
    
    public function findBlogById($id);

    public function getAllBlogs();

}

?>