<?php

namespace ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubCategoryController extends Controller
{
    public function viewSubCategoryAction()
    {
        return $this->render('ForumBundle:SubCategory:view_sub_category.html.twig', array(
            // ...
        ));
    }

    public function createSubCategoryAction()
    {
        return $this->render('ForumBundle:SubCategory:create_sub_category.html.twig', array(
            // ...
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
