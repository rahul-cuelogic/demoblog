<?php
// src/Acme/StoreBundle/Tests/Entity/ProductRepositoryFunctionalTest.php
namespace App\BlogBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CommentRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testgetCommentsForBlog()
    {
        $comments = $this->em
            ->getRepository('AppBlogBundle:Comment')
            ->getCommentsForBlog('1');
        
        $this->assertNotEmpty($comments);
        
    }

    public function testgetCommentsForNonExistingBlog()
    {
        $comments = $this->em
            ->getRepository('AppBlogBundle:Comment')
            ->getCommentsForBlog('-1');
        
        $this->assertEmpty($comments);
        
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}

?>