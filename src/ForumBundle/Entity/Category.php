<?php

namespace ForumBundle\Entity;

/**
 * Category
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
}

