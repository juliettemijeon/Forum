<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ForumBundle\Entity\Category;
use EasySlugger\Slugger;

/**
 * SubCategory
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class SubCategory
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * nom de la subcategory
     * 
     * @ORM\Column(name="subCategoryName",type="string")
     */
    private $subCategoryName;

    /**
     * description de la subcategory
     * 
     * @ORM\Column(name="description",type="string")
     */
    private $description;

    /**
     * slug de la subcategory
     * 
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
    * @var Category 
    * 
    * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Category",inversedBy="subcategories")
    * @ORM\JoinColumn(name="category_id",referencedColumnName="id")
    */
    private $category;

    /**
     * @var Topic[]
     * 
     * @ORM\OneToMany(targetEntity="ForumBundle\Entity\Topic", mappedBy="subCategory")
     */
    private $topics;

    /**
     * Constructeur permettant de forcer l'utilisation d'une ArrayCollection pour le champ topics
     */
    public function __construct(){
        $this->topics=new ArrayCollection();
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
     * Set subCategoryName
     *
     * @param string $subCategoryName
     *
     * @return SubCategory
     */
    public function setSubCategoryName($subCategoryName)
    {
        $this->subCategoryName = $subCategoryName;

        return $this;
    }

    /**
     * Get subCategoryName
     *
     * @return string
     */
    public function getSubCategoryName()
    {
        return $this->subCategoryName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return SubCategory
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
     * Set category
     *
     * @param int $category
     *
     * @return SubCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * set slug
     *
     * @ORM\PrePersist
     * @return void
     */
    public function setSlug()
    {
        $subCategoryName = $this->getSubCategoryName();
        $this->slug = Slugger::uniqueSlugify($subCategoryName);
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
     * set topics
     *
     * @param Topic[] $topics
     * @return void
     */
    public function setTopics($topics){
        $this->topics=$topics;
    }

    /**
     * get topics
     *
     * @return Topic[]
     */
    public function getTopics(){
        return $this->topics;
    }

}

