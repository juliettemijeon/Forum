<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FormuBundle\Entity\Category;
use ForumBundle\Entity\SubCategory;
use ForumBundle\Form\SubCategoryType;
use ForumBundle\Form\SubCategoryEditType;
use Symfony\Component\VarDumper\VarDumper;

class SubCategoryController extends Controller
{
    /**
     * @Route("/categories/{slug}/subcategories",name="view_subcategories")
     * 
     * @Method("GET")
     *
     * @return void
     */
    public function viewSubCategoryAction($slug)
    {
        //recup de la category grâce au slug, puis recup de la subcategory grâce à l'id de la category
        $category = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->findBySlug($slug);
        $subcategories = $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->findBy(array('category'=>$category->getId()));

        return $this->render('ForumBundle:SubCategory:view_subcategories.html.twig', array(
            'category'=>$category,
            'subcategories'=>$subcategories,
        ));
    }

    /**
     * @Route("/categories/{id}/subcategories/create",name="create_subcategory")
     * 
     * @Method("POST")
     *
     * @return void
     */
    public function createSubCategoryAction(Request $request,$id)
    {   
        $subcategory = new SubCategory();
        //création du formulaire
        $form = $this->get('form.factory')->create(SubCategoryType::class,$subcategory);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            //on ajoute la category
            $subcategory->setCategory($id);
            $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->addSubCategory($subcategory);
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_subcategories', array('id' => $subcategory->getCategory()));
        }

        return $this->render('ForumBundle:SubCategory:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/categories/{slug}/subcategories/{subCatSlug}",name="update_subcategory")
     *
     * @Method("PUT")
     * 
     * @return void
     */
    public function updateSubCategoryAction(Request $request,$subCatSlug)
    {
        //$subcategory = $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->find($subCatId);
        $subcategory = $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->findBySlug($subCatSlug);
        //création du formulaire
        $form = $this->get('form.factory')->create(SubCategoryEditType::class,$subcategory);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
            $em = $this->getDoctrine()->getManager();
            //à refact via une méthode de repository
            $em->persist($subcategory);
            $em->flush(); 
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_subcategories', array('id' => $subcategory->getCategory()));
        }

        return $this->render('ForumBundle:SubCategory:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteSubCategoryAction()
    {
        return $this->render('ForumBundle:SubCategory:delete_sub_category.html.twig', array(
            // ...
        ));
    }

}
