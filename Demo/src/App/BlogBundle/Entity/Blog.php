<?php
namespace App\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Application\PLibBundle\Entity\Blog
 */
class Blog
{

    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $createdon;

    /**
     * @var \DateTime
     */
    private $updatedon;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Blog
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdon
     *
     * @param \DateTime $createdon
     * @return Blog
     */
    public function setCreatedon($createdon)
    {
        $this->createdon = $createdon;

        return $this;
    }

    /**
     * Get createdon
     *
     * @return \DateTime 
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * Set updatedon
     *
     * @param \DateTime $updatedon
     * @return Blog
     */
    public function setUpdatedon($updatedon)
    {
        $this->updatedon = $updatedon;

        return $this;
    }

    /**
     * Get updatedon
     *
     * @return \DateTime 
     */
    public function getUpdatedon()
    {
        return $this->updatedon;
    }
    /**
     * @var \App\BlogBundle\Entity\Blogstatus
     */
    private $status;

    /**
     * @var \App\BlogBundle\Entity\User
     */
    private $author;


    /**
     * Set status
     *
     * @param \App\BlogBundle\Entity\Blogstatus $status
     * @return Blog
     */
    public function setStatus(\App\BlogBundle\Entity\Blogstatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \App\BlogBundle\Entity\Blogstatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set author
     *
     * @param \App\BlogBundle\Entity\User $author
     * @return Blog
     */
    public function setAuthor(\App\BlogBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \App\BlogBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
