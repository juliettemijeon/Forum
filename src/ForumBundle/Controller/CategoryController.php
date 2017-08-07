<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ForumBundle\Entity\Category;
use ForumBundle\Form\CategoryType;

class CategoryController extends Controller
{
    /**
     * @Route("/categories",name="view_categories")
     * @Method("GET")
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
     * @Route("/categories/create",name="create_categories")
     * 
     * @Method("POST")
     *
     * @return void
     */
    public function createCategoryAction(Request $request)
    {   
        $category = new Category();
        //création du formulaire
        //$form = $this->createForm('ForumBundle\Entity\Category');
        $form = $this->get('form.factory')->create(CategoryType::class,$category);
        //tester avec handleRequest?
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('view_categories', array('id' => $category->getId()));
        }
        var_dump($category);

        return $this->render('ForumBundle:Category:form.html.twig', array(
            'form' => $form->createView(),
        ));  
    }

    /**
     * Undocumented function
     * @Method("PUT")
     * @return void
     */
    public function updateCategoryAction()
    {
        return $this->render('ForumBundle:Category:update_category.html.twig', array(
            // ...
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
