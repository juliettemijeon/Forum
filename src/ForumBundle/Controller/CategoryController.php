<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function viewCategoriesAction()
    {
        return $this->render('ForumBundle:Category:view_categories.html.twig', array(
            // ...
        ));
    }

    public function createCategoryAction()
    {
        return $this->render('ForumBundle:Category:create_category.html.twig', array(
            // ...
        ));
    }

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
