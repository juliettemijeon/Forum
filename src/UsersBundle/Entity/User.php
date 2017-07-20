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

    protected function getId(){
        return $id;
    }

    protected function getFirstName(){
        return $firstName;
    }

    protected function getLastName(){
        return $lastName;
    }

    protected function setFirstName($firstName){
        return $this->firstName = $firstName;
    }

    protected function setLastName($lastName){
        return $this->lastName = $lastName; 
    }
}