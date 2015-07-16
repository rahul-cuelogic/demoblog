<?php

namespace App\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageControllerTest extends WebTestCase
{
    public function testindex()
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/');

        $blogs = $client->getContainer()->get('doctrine')
                        ->getRepository('AppBlogBundle:Blog')->getAllBlogs();

        foreach ($blogs as $blog) {
            //Assert Blog Post exists on page
            $this->assertTrue($crawler->filter(
                sprintf('html:contains("%s")', $blog->getTitle()))->count() > 0
            );
            
            //Find Blog Link
            $link = $crawler->filter(
                sprintf('a:contains("%s")', $blog->getTitle())
            )->first()->link();
            
            //Crawle to post
            $otherPage = $client->click($link);
            
            $this->assertEquals($blog->getTitle(), $otherPage->filter(
                    sprintf('h2:contains("%s")', $blog->getTitle())
            )->first()->text());
        }

        //Checking for Header Menus
        $this->assertTrue($crawler->filter('html:contains("Home")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("About")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Contact")')->count() > 0);

        unset($client, $crawler, $blogs);
    }
}
