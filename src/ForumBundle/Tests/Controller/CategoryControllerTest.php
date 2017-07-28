<?php

namespace ForumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testViewcategories()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categories');
    }

    public function testCreatecategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categories');
    }

    public function testUpdatecategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categories');
    }

    public function testDeletecategories()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/categories');
    }

}
