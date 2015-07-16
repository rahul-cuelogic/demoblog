<?php
namespace App\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\BlogBundle\Entity\User;
use App\BlogBundle\Entity\Blog;
use App\BlogBundle\Entity\Comment;


class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $guestUser = new User();
        $guestUser->setFirstname('guest');
        $guestUser->setLastname('guest');
        $guestUser->setRole('guest');

        $manager->persist($guestUser);
        $manager->flush();

        
        $blog = new Blog();
        $blog->setTitle('First Blog');
        $blog->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $blog->setCreatedon(new \DateTime());
        $blog->setUpdatedon(new \DateTime());
        $blog->setStatus(1)

        $manager->persist($blog);
        $manager->flush();
    }
}

?>