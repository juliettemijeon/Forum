<?php

namespace ForumBundle\Entity;

/**
 * Topic
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
}

