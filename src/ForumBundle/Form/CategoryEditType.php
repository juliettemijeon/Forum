<?php

namespace ForumBundle\Form;

use ForumBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;

class CategoryEditType extends AbstractType
{
    public function getParent(){
        return CategoryType::class;
    }
}
