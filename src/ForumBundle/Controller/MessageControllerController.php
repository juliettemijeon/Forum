<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageControllerController extends Controller
{
    public function viewMessagesAction()
    {
        return $this->render('ForumBundle:MessageController:view_messages.html.twig', array(
            // ...
        ));
    }

    public function createMessageAction()
    {
        return $this->render('ForumBundle:MessageController:create_message.html.twig', array(
            // ...
        ));
    }

    public function updateMessageAction()
    {
        return $this->render('ForumBundle:MessageController:update_message.html.twig', array(
            // ...
        ));
    }

    public function deleteMessageAction()
    {
        return $this->render('ForumBundle:MessageController:delete_message.html.twig', array(
            // ...
        ));
    }

}
