<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopicController extends Controller
{
    public function viewTopicsAction()
    {
        return $this->render('ForumBundle:Topic:view_topics.html.twig', array(
            // ...
        ));
    }

    public function createTopicAction()
    {
        return $this->render('ForumBundle:Topic:create_topic.html.twig', array(
            // ...
        ));
    }

    public function updateTopicAction()
    {
        return $this->render('ForumBundle:Topic:update_topic.html.twig', array(
            // ...
        ));
    }

    public function deleteTopicAction()
    {
        return $this->render('ForumBundle:Topic:delete_topic.html.twig', array(
            // ...
        ));
    }

}
