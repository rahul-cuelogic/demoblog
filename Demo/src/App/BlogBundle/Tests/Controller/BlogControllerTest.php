<?php

namespace App\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{

	public function testShow() {
        $client = static::createClient();

        $client->followRedirects(true);



        $blogs = $client->getContainer()->get('doctrine')
                        ->getRepository('AppBlogBundle:Blog')->getAllBlogs();

        if (!empty($blogs)) {
            $firstBlogPost = current($blogs);

            $crawler = $client->request('GET', sprintf("/%d", $firstBlogPost->getId()));


            $this->assertEquals($firstBlogPost->getTitle(), $crawler->filter(
                            sprintf('h2:contains("%s")', $firstBlogPost->getTitle())
                    )->first()->text());

            $this->assertEquals($firstBlogPost->getContent(), $crawler->filter(
                            sprintf('p:contains("%s")', $firstBlogPost->getContent())
                    )->first()->text());

            $comments = $client->getContainer()->get('doctrine')
                    ->getRepository('AppBlogBundle:Comment')
                    ->getCommentsForBlog($firstBlogPost->getId());

            foreach ($comments as $comment) {
                $this->assertEquals($comment->getText(), $crawler->filter(
                                sprintf('p:contains("%s")', $comment->getText())
                        )->first()->text());
            }


            //Checking for Header Menus
            $this->assertTrue($crawler->filter('html:contains("Home")')->count() > 0);
            $this->assertTrue($crawler->filter('html:contains("About")')->count() > 0);
            $this->assertTrue($crawler->filter('html:contains("Contact")')->count() > 0);

            unset($crawler, $firstBlogPost, $comments);
        }

        unset($client, $blogs);
    }
}
