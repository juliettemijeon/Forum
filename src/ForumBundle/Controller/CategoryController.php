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
        //Aller les chercher toutes les catégories
        return $this->render('ForumBundle:Category:view_categories.html.twig', array(
            // ...
        ));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function createCategoryAction()
    {
        return $this->render('ForumBundle:Category:create_category.html.twig', array(
            // ...
        ));
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
