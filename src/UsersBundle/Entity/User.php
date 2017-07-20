<?php
// src/UsersBundle/Entity/User.php

namespace UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /*
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /*
     * @ORM\Column(type="string")
     */
    protected $lastName;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setFirstName($firstName){
        return $this->firstName = $firstName;
    }

    public function setLastName($lastName){
        return $this->lastName = $lastName; 
    }
}