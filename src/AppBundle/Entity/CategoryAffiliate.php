<?php
/**
 * Created by PhpStorm.
 * User: artio
 * Date: 11/11/2017
 * Time: 9:31 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections;

/**
 * Class CategoryAffiliate
 * @ORM\Table(name="category_affiliate")
 * @ORM\Entity
 */
class CategoryAffiliate
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Category
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Category", inversedBy="category_affiliates")
     * @ORM\JoinColumns({*@ORM\JoinColumn(name="category_id", referencedColumnName="id")*})
     */
    private $category;

    /**
     * @var \AppBundle\Entity\Affiliate
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Affiliate", inversedBy="category_affiliates")
     * @ORM\JoinColumns({*@ORM\JoinColumn(name="affiliate_id", referencedColumnName="id")*})
     */
    private $affiliate;

    /**
     * Get Id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Category
     * @param \AppBundle\Entity\Category $category
     * @return CategoryAffiliate
     */
    public function setCategory(Category $category)
    {
        $this->category=$category;
        return $this;
    }

    /**
     * Get Category
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set Affiliate
     * @param \AppBundle\Entity\Affiliate $affiliate
     * @return CategoryAffiliate
     */
    public function setAffiliate(Affiliate $affiliate)
    {
        $this->affiliate=$affiliate;
        return $this;
    }

    /**
     * Get Affiliate
     * @return \AppBundle\Entity\Affiliate
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }

}