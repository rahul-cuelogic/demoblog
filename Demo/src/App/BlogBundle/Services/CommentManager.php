<?php
	namespace App\BlogBundle\Services;
	use App\BlogBundle\Entity\Comment;
	use App\BlogBundle\Entity\Blog;

	class CommentManager
	{
		
	    protected $em;
	   	    
	    public function __construct($em)
	    {
	        $this->em = $em;
	        	        
	    }

	 
	    public function addComment($blogId,$commentText,$role)
	    {
	    	
	    	$blog = $this->em->getRepository('AppBlogBundle:Blog')->findBlogById($blogId);
	    	$comment = new Comment;
	    	$comment->setPostid($blog);
	    	$comment->setText($commentText);
	    	$comment->setCreatedon(new \DateTime());
	    	$comment->setupdatedon(new \DateTime());
	    	$comment->setAuthor($this->em->getRepository('AppBlogBundle:User')->find($role));
	    	$comment->setIsactive(1);
	    	$this->em->persist($comment);
            $this->em->flush();

            return $comment->getId();
	    }
	}    


?>