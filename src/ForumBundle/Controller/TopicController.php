<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ForumBundle\Entity\SubCategory;
use ForumBundle\Entity\Topic;
use ForumBundle\Form\TopicType;
use ForumBundle\Form\TopicEditType;
use Symfony\Component\VarDumper\VarDumper;

class TopicController extends Controller
{
    /**
     * @Route("/categories/{id}/subcategories/{subCatId}/topics",name="view_topics")
     * 
     * @Method("GET")
     *
     * @return void
     */
    public function viewTopicsAction($id,$subCatId)
    {
        VarDumper::dump($id);
        VarDumper::dump($subCatId);
        $topics = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Topic')->findBy(array('subCategory'=>$subCatId));
        return $this->render('ForumBundle:Topic:view_topics.html.twig', array(
            'topics'=>$topics
        ));
    }

    /**
     * @Route("/categories/{id}/subcategories/{subCatId}/topics/create",name="create_topic")
     * 
     * @Method("POST")
     *
     * @return void
     */
    public function createTopicAction(Request $request,$id,$subCatId)
    {
        $topic = new Topic();
        //création du formulaire
        $form = $this->get('form.factory')->create(TopicType::class,$topic);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            //on ajoute la subCategory
            $topic->setSubCategory($subCatId);
            $this->getDoctrine()->getManager()->getRepository('ForumBundle:Topic')->addTopic($topic);
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            //trouver comment récupérer l'id de la categorie
            return $this->redirectToRoute('view_topics', array('id' => $subcategory->getCategory(),'subCatId'=>$topic->getId()));
        }

        return $this->render('ForumBundle:Topic:form.html.twig', array(
            'form' => $form->createView(),
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
