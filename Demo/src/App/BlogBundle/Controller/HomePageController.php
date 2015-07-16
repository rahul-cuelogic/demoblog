<?php

namespace App\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()
                   ->getEntityManager();

        $blogs = $em->getRepository('AppBlogBundle:Blog')->getAllBlogs();

        return $this->render('AppBlogBundle:HomePage:index.html.twig', array(
            'blogs' => $blogs
        ));
       
    }
}