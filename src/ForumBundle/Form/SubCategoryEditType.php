<?php

namespace ForumBundle\Form;

use ForumBundle\Entity\SubCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;

class SubCategoryEditType extends AbstractType
{
    public function getParent(){
        return SubCategoryType::class;
    }
}
