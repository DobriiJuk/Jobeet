<?php
/**
 * Created by PhpStorm.
 * User: artio
 * Date: 11/9/2017
 * Time: 8:36 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 *Affiliate
 * @ORM\Table(name="affiliate")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Affiliate
{
  /**
   * @var integer
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="IDENTITY")
   */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="url", type="string",length=255)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255,unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CategoryAffiliate", mappedBy="affiliate")
     */
    private $category_affiliates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category_affiliates=new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set Url
     * @param string $url
     * @return Affiliate
     */
    public function setUrl($url)
    {
        $this->url=$url;
        return $this;
    }

    /**
     * Get Url
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set Email
     * @param string $email
     * @return Affiliate
     */
    public function setEmail($email)
    {
         $this->email=$email;
        return $this;
    }

    /**
     * Get Email
     * @return string
     */
    public function getEmail()
    {
        return$this->email;
    }

    /**
     * set token
     * @param string $token
     * @return Affiliate
     */
    public function setToken($token)
    {
        $this->token=$token;
        return $this;
    }

    /**
     * Get Token
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set CreatedAt
     * @param \DateTime $createdAt
     * @return Affiliate
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at=$createdAt;
        return $this;
    }

    /**
     * Get CreatedAt
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add CategoryAffiliate
     * @param \AppBundle\Entity\CategoryAffiliate $categoryAffiliate
     * @return Affiliate
     */
    public function addCategoryAffiliate(\AppBundle\Entity\CategoryAffiliate $categoryAffiliate)
    {
        $this->category_affiliates[]=$categoryAffiliate;
        return $this;
    }

    /**
     * Remove CategoryAffilate
     * @param \AppBundle\Entity\CategoryAffiliate $categoryAffiliate
     */
    public function removeCategoryAffiliate(\AppBundle\Entity\CategoryAffiliate $categoryAffiliate)
    {
        $this->category_affiliates->removeElement($categoryAffiliate);
    }

    /**
     * Get Category Affiliate
     * @return Affiliate
     */
    public function getCategoryAffiliate()
    {
        return $this->category_affiliates;
    }

    /**
     * Set CreatedAtValue
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at=new \DateTime();
    }

}