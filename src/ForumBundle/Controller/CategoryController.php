<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ForumBundle\Entity\Category;
use ForumBundle\Form\CategoryType;
use ForumBundle\Form\CategoryEditType;

class CategoryController extends Controller
{
    /**
     * @Route("/categories",name="view_categories")
     * 
     * @Method("GET")
     *  
     * @return Response
     */
    public function viewCategoriesAction()
    {
        //Aller chercher toutes les catégories
        $categories = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->findAll();

        return $this->render('ForumBundle:Category:view_categories.html.twig', array(
             'categories'=>$categories, 
        ));
    }

    /**
     * @Route("/categories/create",name="create_category")
     * 
     * @Method("POST")
     *
     * @return void
     */
    public function createCategoryAction(Request $request)
    {   
        $category = new Category();
        //création du formulaire
        $form = $this->get('form.factory')->create(CategoryType::class,$category);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
            $this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->addCategory($category);
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_categories', array('id' => $category->getId()));
        }

        return $this->render('ForumBundle:Category:form.html.twig', array(
            'form' => $form->createView(),
        ));  
    }

    /**
     * @Route("/categories/{id}",name="update_category")
     * 
     * @Method("PUT")
     * 
     * @return void
     */
    public function updateCategoryAction(Request $request,$id)
    {
        //récupération de la catégorie à modifier
        $category = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->find($id);

        $form = $this->get('form.factory')->create(CategoryEditType::class,$category);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            //$this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->addCategory($category);
            $em->persist($category);
            $em->flush(); 

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_categories', array('id' => $category->getId()));
        }

        return $this->render('ForumBundle:Category:form.html.twig', array(
            'form' => $form->createView(),
        )); 
    }

    /**
     * @Route("/categories/{id}",name="delete_category")
     * 
     * @Method("DELETE")
     * 
     * @return void
     */
    public function deleteCategoriesAction()
    {
        //à gérer dans le front du forum ou dans le backoffice?
        return $this->render('ForumBundle:Category:delete_categories.html.twig', array(
            // ...
        ));
    }

}
