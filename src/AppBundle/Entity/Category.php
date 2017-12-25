<?php
/**
 * Created by PhpStorm.
 * User: artio
 * Date: 11/4/2017
 * Time: 10:31 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="name",type="string",length=255)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Job", mappedBy="categories")
     */
    private $jobs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CategoryAffiliate", mappedBy="category")
     */
    private $category_affiliates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->category_affiliates = new ArrayCollection();
    }


    /**
     * Get Id
     * @return integer
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add jobs
     *
     * @param \AppBundle\Entity\Job $job
     * @return Category
     */
    public function addJob(\AppBundle\Entity\Job $job)
    {
        if(!$this->jobs->contains($job)){
            $this->jobs->add($job);
        }
    }

    /**
     * Remove job
     * @param \AppBundle\Entity\Job $job
     */
    public function removeJob(\AppBundle\Entity\Job $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get job
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJob()
    {
        return $this->jobs;
    }

    /**
     * Add CategoryAffiliate
     *
     * @param \AppBundle\Entity\CategoryAffiliate $categoryAffiliate
     * @return Category
     */
    public function addCategoryAffiliate(\AppBundle\Entity\CategoryAffiliate $categoryAffiliate)
    {
        $this->category_affiliates[] = $categoryAffiliate;
        return $this;
    }

    /**
     * Remove CategoryAffiliate
     *
     * @param \AppBundle\Entity\CategoryAffiliate $categoryAffiliate
     */
    public function removeCategoryAffiliate(\AppBundle\Entity\CategoryAffiliate $categoryAffiliate)
    {
        $this->category_affiliates->removeElement($categoryAffiliate);
    }

    /**
     * Get Category Affiliate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryAffiliate()
    {
        return $this->category_affiliates;
    }

}