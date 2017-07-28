<?php

namespace ForumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TopicControllerTest extends WebTestCase
{
    public function testViewtopics()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/topics');
    }

    public function testCreatetopic()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/topics');
    }

    public function testUpdatetopic()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/topic');
    }

    public function testDeletetopic()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/topic');
    }

}
