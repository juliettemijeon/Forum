<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasySlugger\Slugger;
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
            $topic->setSlug(Slugger::uniqueSlugify($form->get('topicName')->getData()));
            $this->getDoctrine()->getManager()->getRepository('ForumBundle:Topic')->addTopic($topic);
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_topics', array('id' => $id,'subCatId'=>$subCatId));
        }

        return $this->render('ForumBundle:Topic:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/categories/{id}/subcategories/{subCatId}/topics/{topicId}",name="update_topic")
     * 
     * @Method("PUT")
     *
     * @return void
     */
    public function updateTopicAction(Request $request,$id,$subCatId,$topicId)
    {
        $topic = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Topic')->find($topicId);
        
        $form = $this->get('form.factory')->create(TopicEditType::class,$topic);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($topic);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_topics', array('id' => $id,'subCatId'=>$subCatId));
        }

        return $this->render('ForumBundle:Topic:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteTopicAction()
    {
        return $this->render('ForumBundle:Topic:delete_topic.html.twig', array(
            // ...
        ));
    }

}
