<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\Response;
use Forum\ForumBundle\Entity\Category;

class CategoryController extends Controller
{
    /**
     * @Route("/categories",name="view_categories")
     * @method mixed $viewCategoryAction()
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
     * @Route("/categories/create",name="create_categories")
     * 
     * @method mixed $createCategoryAction
     *
     * @return void
     */
    public function createCategoryAction(Request $request)
    {   
        echo("request" .$request);
        //création du formulaire
        $form = $this->createForm(Category::class);
        $form->submit($request->request->all());
        //Si les données du formulaire sont valides on fait appel à la méthode du repository pour l'envoi en BDD
        if($form->isValid()){
            // /!\ penser à déclarer le repository en tant que service
            return $this->get('app.category_repository')->addCategory($form->getData());
        }
        //return
        /* return $this->render('ForumBundle:Category:create_category.html.twig', array(
            // ...
        )); */
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function updateCategoryAction()
    {
        return $this->render('ForumBundle:Category:update_category.html.twig', array(
            // ...
        ));
    }

    public function deleteCategoriesAction()
    {
        return $this->render('ForumBundle:Category:delete_categories.html.twig', array(
            // ...
        ));
    }

}
