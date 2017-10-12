<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EasySlugger\Slugger;

/**
 * Topic
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="topicName",type="string")
     */
    private $topicName;

    /**
     * @ORM\Column(name="description",type="string")
     */
    private $description;

    /**
     * @ORM\Column,(name="slug", type="string")
     */
    private $slug;
    
    /**
     * @var SubCategory
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\SubCategory",inversedBy="topics")
     * @ORM\JoinColumn(name="subCategory_id",referencedColumnName="id")
     */
    private $subCategory;

    /**
     * les messages rattachés au topic
     *
     * @var Message[]
     * 
     * @ORM\OneToMany(targetEntity="ForumBundle\Entity\Message",mappedBy="topic")
     */
    private $messages;

    /**
     * Constructeur permettant de forcer l'utilisation d'une ArrayCollection pour le champ messages
     */
    public function __construct(){
        $this->messages=new ArrayCollection();
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
     * Set topicName
     *
     * @param string $topicName
     *
     * @return Topic
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;

        return $this;
    }

    /**
     * Get topicName
     *
     * @return string
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Topic
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
     * set slug
     *
     * @ORM\PrePersist
     * @param string $topicName
     * @return void
     */
    public function setSlug()
    {
        $topicName = $this->getTopicName();
        $this->slug = Slugger::uniqueSlugify($topicName);
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
     * Set subcategory
     *
     * @param string $subCategory
     *
     * @return Topic
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return string
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * @param Message[] $messages
     * @return Topic
     */
    public function setMessages($messages){
        $this->messages=$messages;
        return $this;
    }

    /**
     * récupération des messages liés au topic
     *
     * @return void
     */
    public function getMessages(){
        return $this->messages;
    }
}

