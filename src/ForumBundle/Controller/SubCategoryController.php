<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ForumBundle\Entity\SubCategory;
use ForumBundle\Form\SubCategoryType;
use ForumBundle\Form\SubCategoryEditType;
use Symfony\Component\VarDumper\VarDumper;

class SubCategoryController extends Controller
{
    /**
     * @Route("/categories/{id}/subcategories",name="view_subcategories")
     * 
     * @Method("GET")
     *
     * @return void
     */
    public function viewSubCategoryAction($id)
    {
        //mettre à jour le routing
        $subcategories = $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->findBy(array('category'=>$id));

        return $this->render('ForumBundle:SubCategory:view_subcategories.html.twig', array(
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
    {   VarDumper::dump($request);
        $subcategory = new SubCategory();
        //création du formulaire
        $form = $this->get('form.factory')->create(SubCategoryType::class,$subcategory);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $subcategory->setCategory($id);
            $this->getDoctrine()->getManager()->getRepository('ForumBundle:SubCategory')->addSubCategory($subcategory);
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_subcategories', array('id' => $subcategory->getCategory()));
        }

        return $this->render('ForumBundle:SubCategory:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function updateSubCategoryAction()
    {
        return $this->render('ForumBundle:SubCategory:update_sub_category.html.twig', array(
            // ...
        ));
    }

    public function deleteSubCategoryAction()
    {
        return $this->render('ForumBundle:SubCategory:delete_sub_category.html.twig', array(
            // ...
        ));
    }

}
