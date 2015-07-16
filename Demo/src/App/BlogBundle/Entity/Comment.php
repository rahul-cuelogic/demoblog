<?php
namespace App\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Application\PLibBundle\Entity\Comment
 */
class Comment
{

     /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $createdon;

    /**
     * @var \DateTime
     */
    private $updatedon;

    /**
     * @var boolean
     */
    private $isactive;

    /**
     * @var \App\BlogBundle\Entity\Blog
     */
    private $postid;

    /**
     * @var \App\BlogBundle\Entity\User
     */
    private $author;


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
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdon
     *
     * @param \DateTime $createdon
     * @return Comment
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
     * @return Comment
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
     * Set isactive
     *
     * @param boolean $isactive
     * @return Comment
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean 
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set postid
     *
     * @param \App\BlogBundle\Entity\Blog $postid
     * @return Comment
     */
    public function setPostid(\App\BlogBundle\Entity\Blog $postid = null)
    {
        $this->postid = $postid;

        return $this;
    }

    /**
     * Get postid
     *
     * @return \App\BlogBundle\Entity\Blog 
     */
    public function getPostid()
    {
        return $this->postid;
    }

    /**
     * Set author
     *
     * @param \App\BlogBundle\Entity\User $author
     * @return Comment
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

    public function __toString()
    {
        return $this->text;
    }
}
