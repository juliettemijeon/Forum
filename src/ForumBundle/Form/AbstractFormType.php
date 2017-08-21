<?php

namespace ForumBundle\Form;

//voir comment faire pour que l'abstract soit agnostique de l'entity - initialisation de l'entity dans un constructeur?
use ForumBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;

class AbstractFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('categoryName',TextType::class)
        ->add('description',TextType::class)
        ->add('Enregistrer',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ""//Faire en sorte que l'entity soit initialisée à la volée
        ));

    }
}
