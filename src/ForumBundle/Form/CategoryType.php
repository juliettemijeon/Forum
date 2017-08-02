<?php

namespace ForumBundle\Form;

use ForumBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;

class CategoryType extends AbstractType
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * ProductType constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('categoryName')
        ->add('description');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Category::class,
            'empty_data' => function(FormInterface $form) {
                $category = $this->em->getRepository('ForumBundle:Category')->createQueryBuilder('c')
                    ->where('c.categoryName LIKE (:categoryName)')
                    ->setParameter('categoryName',$form->get('categoryName')->getData())
                    ->getQuery()
                    ->getOneOrNullResult();

                if(!$category){
                    $category = new Category();
                    $category
                        ->setCategoryName($form->get('categoryName')->getData())
                        ->setDescription($form->get('description')->getData());
                } 
                return $category;
            }
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'forumbundle_category';
    }


}
