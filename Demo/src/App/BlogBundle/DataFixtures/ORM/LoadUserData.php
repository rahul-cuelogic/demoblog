<?php
namespace App\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\BlogBundle\Entity\User;
use App\BlogBundle\Entity\Blog;
use App\BlogBundle\Entity\Comment;
use App\BlogBundle\Entity\Blogstatus;


class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //load blog status

        $statusPublished = new Blogstatus();
        $statusPublished->setName('published');
        $manager->persist($statusPublished);
        $manager->flush();

        $statusUnpublished = new Blogstatus();
        $statusUnpublished->setName('unpublished');
        $manager->persist($statusUnpublished);
        $manager->flush();

        $statusDeleted = new Blogstatus();
        $statusDeleted->setName('deleted');
        $manager->persist($statusDeleted);
        $manager->flush();


        $guestUser = new User();
        $guestUser->setFirstname('ryan');
        $guestUser->setLastname('smith');
        $guestUser->setRole('user');
        $guestUser->setEmail('ryan.smith@test.com');
        $guestUser->setCreatedon(new \DateTime());
        $guestUser->setUpdatedon(new \DateTime());

        $manager->persist($guestUser);
        $manager->flush();

        $guestUser = new User();
        $guestUser->setFirstname('guest');
        $guestUser->setLastname('guest');
        $guestUser->setRole('guest');
        $guestUser->setEmail('guest@test.com');
        $guestUser->setCreatedon(new \DateTime());
        $guestUser->setUpdatedon(new \DateTime());
        

        $manager->persist($guestUser);
        $manager->flush();

        $guestUser = new User();
        $guestUser->setFirstname('admin');
        $guestUser->setLastname('admin');
        $guestUser->setRole('admin');
        $guestUser->setEmail('admin@test.com');
        $guestUser->setCreatedon(new \DateTime());
        $guestUser->setUpdatedon(new \DateTime());
        
        $manager->persist($guestUser);
        $manager->flush();



        
        $blog = new Blog();
        $blog->setTitle('First Blog');
        $blog->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $blog->setCreatedon(new \DateTime());
        $blog->setUpdatedon(new \DateTime());
        $blog->setStatus($statusPublished);
        $blog->setAuthor($guestUser);

        $manager->persist($blog);
        $manager->flush();


        $blog = new Blog();
        $blog->setTitle('Second Blog');
        $blog->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $blog->setCreatedon(new \DateTime());
        $blog->setUpdatedon(new \DateTime());
        $blog->setStatus($statusPublished);
        $blog->setAuthor($guestUser);
        $manager->persist($blog);
        $manager->flush();

        $blog = new Blog();
        $blog->setTitle('Third Blog');
        $blog->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $blog->setCreatedon(new \DateTime());
        $blog->setUpdatedon(new \DateTime());
        $blog->setStatus($statusPublished);
        $blog->setAuthor($guestUser);
        $manager->persist($blog);
        $manager->flush();

    }
}

?>