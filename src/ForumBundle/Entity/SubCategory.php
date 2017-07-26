<?php

namespace ForumBundle\Entity;

/**
 * SubCategory
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
}

