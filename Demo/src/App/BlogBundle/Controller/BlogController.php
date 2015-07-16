<?php

namespace App\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('AppBlogBundle:Blog')->findBlogById($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
            //throw new Exception("Error Processing Request", 1);
            
        }

        $comments = $em->getRepository('AppBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

        $role = 'anonymous';

        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
        
            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                // the user has the ROLE_BRAND role, so act accordingly
                $role = 'editor';

            } else if ($this->get('security.context')->isGranted('ROLE_USER')) {

                $role = 'user';
            }
        }           

        return $this->render('AppBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments,
            'role'      => $role
        ));
    }

    public function newAction()
    {

        //just render blog add form 
        return $this->render('AppBlogBundle:Blog:new.html.twig');
    }

    public function addAction(Request $Request)
    {

      //validation & pesistance through blogManager service
        
        return $this->redirect($this->generateUrl('app_blog_show', array(
                'id' => $blogId))
            );
    }
}