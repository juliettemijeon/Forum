<?php

namespace ForumBundle\Entity;

/**
 * Message
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="body",type="string")
     */
    private $body;

    /**
     * @ORM\OneToMany(targetEntity="UsersBundle\Entity\User", mappedBy="id") 
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date",type="dateTime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="ForumBundle/Entity/Message", mappedBy="id")
     */
    private $isAnswerTo;


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
     * Set body
     *
     * @param string $body
     *
     * @return Message
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set author
     *
     * @param \stdClass $author
     *
     * @return Message
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \stdClass
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set isAnswerTo
     *
     * @param \stdClass $isAnswerTo
     *
     * @return Message
     */
    public function setIsAnswerTo($isAnswerTo)
    {
        $this->isAnswerTo = $isAnswerTo;

        return $this;
    }

    /**
     * Get isAnswerTo
     *
     * @return \stdClass
     */
    public function getIsAnswerTo()
    {
        return $this->isAnswerTo;
    }
}

