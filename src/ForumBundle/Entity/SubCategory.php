<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\Column(name="subCategoryName",type="string")
     */
    private $subCategoryName;

    /**
     * @ORM\Column(name="description",type="string")
     */
    private $description;

    /**
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
    * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Category",inversedBy="id")
    */
    private $category;


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
     * @param string $subCategoryName
     * @return void
     */
    public function setSlug($subCategoryName)
    {
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
}

