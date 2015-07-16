<?php

namespace App\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\BlogBundle\Entity\Comment;
use App\BlogBundle\Form\CommentType;
use App\BlogBundle\Services;

class CommentController extends Controller
{
    public function newAction($blogId)
    {
        $blog = $this->getBlog($blogId);

        $comment = new Comment();
        $comment->setPostid($blog);
        $form   = $this->createForm(new CommentType(), $comment);

        return $this->render('AppBlogBundle:Comment:form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction($blogId)
    {
        $blog = $this->getBlog($blogId);
        $request = $this->getRequest();
        
        $blogId = $request->request->get('blogId');
        $comment = $request->request->get('commentText');
        
        $commentManager = $this->container->get('api.commentManager');

        //To-DO remove hard-code reference
        $role= '2';
        
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
        
            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
               
                $role = '3';

            } else if ($this->get('security.context')->isGranted('ROLE_USER')) {

                $role = '1';
            }
        } 



        if($commentManager->addComment($blogId,$comment, $role)) {
            return $this->redirect($this->generateUrl('app_blog_show', array(
                'id' => $blogId))
            );
        }
                
    }

   
    protected function getBlog($blogId)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $blog = $em->getRepository('AppBlogBundle:Blog')->findBlogById($blogId);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }
}