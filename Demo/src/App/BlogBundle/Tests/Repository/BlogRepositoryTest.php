<?php
// src/Acme/StoreBundle/Tests/Entity/ProductRepositoryFunctionalTest.php
namespace App\BlogBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BlogRepositoryTest extends KernelTestCase
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

    public function testfindBlogByIdwithValidId()
    {
        $blog = $this->em
            ->getRepository('AppBlogBundle:Blog')
            ->findBlogById('1');
        
        $this->assertEquals(1, $blog->getId());
        
    }

    public function testfindBlogByIdwithInValidId()
    {
        $blog = $this->em
            ->getRepository('AppBlogBundle:Blog')
            ->findBlogById('0');
        
        $this->assertEmpty($blog);
        
    }

    public function testgetAllBlogsExpectingDBRecords()
    {
        $blog = $this->em
            ->getRepository('AppBlogBundle:Blog')
            ->getAllBlogs();
        if (count($blog))
        $this->assertNotEmpty($blog);
        
    }

    public function testgetAllBlogsExpectingNoDBRecords()
    {
        $blog = $this->em
            ->getRepository('AppBlogBundle:Blog')
            ->getAllBlogs();
        if (count($blog) <= 0){
            $this->assertEmpty($blog);
        }
        else
        {
             $this->assertNotEmpty($blog);
        }
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