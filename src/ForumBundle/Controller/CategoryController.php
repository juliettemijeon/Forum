<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\VarDumper\VarDumper;
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
        return $this->render('ForumBundle:Category:view_categories.html.twig', array(
            // ...
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
            $em = $this->getDoctrine()->getManager();
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
     * @Route("/categories/{id}",name="update_category")
     * 
     * @Method("PUT")
     * 
     * @return void
     */
    public function updateCategoryAction(Request $request,$id)
    {
        //VarDumper::dump($request);
        //null : var_dump($request->get('attributes');
        //var_dump($request);
        //récupération de la catégorie à modifier
        $category = $this->getDoctrine()->getManager()->getRepository('ForumBundle:Category')->find($id);
        //var_dump($category);

        $form = $this->get('form.factory')->create(CategoryEditType::class,$category);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            var_dump($form);
            $em = $this->getDoctrine()->getManager();
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
     * Undocumented function
     * @Method("DELETE")
     * @return void
     */
    public function deleteCategoriesAction()
    {
        return $this->render('ForumBundle:Category:delete_categories.html.twig', array(
            // ...
        ));
    }

}
