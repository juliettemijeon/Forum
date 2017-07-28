<?php

namespace ForumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerControllerTest extends WebTestCase
{
    public function testViewmessages()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messages');
    }

    public function testCreatemessage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messages');
    }

    public function testUpdatemessage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messages');
    }

    public function testDeletemessage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messages');
    }

}
