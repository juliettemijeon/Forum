<?php

namespace ForumBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use ForumBundle\Entity\Category;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Ajout d'une category
     *
     * @param ForumBundle\Entity\Category $category
     * @return category
     */
    public function addCategory(Category $category){
        $this->_em->persist($category);
        $this->_em->flush();
        return $category;
    }
}
