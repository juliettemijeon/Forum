<?php

namespace ForumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SubCategoryControllerTest extends WebTestCase
{
    public function testViewsubcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/subcategory');
    }

    public function testCreatesubcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/subcategory');
    }

    public function testUpdatesubcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/subcategory');
    }

    public function testDeletesubcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/subcategory');
    }

}
