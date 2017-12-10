<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use EasySlugger\Slugger;

/**
 * Category
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="categoryName",type="string")
     */
    private $categoryName;

    /**
     * @ORM\Column(name="description",type="string")
     */
    private $description;

    /**
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var Subcategory[]
     * 
     * @ORM\OneToMany(targetEntity="SubCategory",mappedBy="category")
     */
    private $subcategories;

    /**
     * Constructeur permettant de forcer l'utilisation d'une ArrayCollection pour le champ subcategories
     */
    public function __construct(){
        $this->subcategories=new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return Category
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @ORM\PrePersist
     * @param string $categoryName
     * @return void
     */
    public function createSlug()
    {
        $categoryName = $this->getCategoryName();
        $slug = Slugger::uniqueSlugify($categoryName);
        
        $this->setSlug($slug);
    }

    /**
     * set slug
     * 
     * @param string $slug
     * @return void
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Récupération des sous-catégories enfants de la catégorie
     *
     * @return Subcategory[]
     */
    public function getSubcategories(){
        return $this->subcategories;
    }

    /**
     * @param Subcategory[]
     *
     * @return void
     */
    public function setSubcategories($subcategories){
        $this->subcategories=$subcategories;
    }
}

