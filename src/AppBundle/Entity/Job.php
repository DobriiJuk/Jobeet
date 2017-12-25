<?php
/**
 * Created by PhpStorm.
 * User: artio
 * Date: 11/6/2017
 * Time: 6:52 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Job
 * @package AppBundle\Entity
 * @ORM\Table(name="job")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Job
{
    /**
     * @var integer
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;
    /**
     * @var string
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @var string
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="how_to_apply", type="text")
     */
    private $how_to_apply;
    /**
     * @var string
     * @ORM\Column(name="token", type="string", length=255, unique=true)
     */
    private $token;

    /**
     * @var boolean
     * @ORM\Column(name="is_public", type="boolean", nullable=true)
     */
    private $is_public;

    /**
     * @var boolean
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $is_active;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(name="expires_at", type="datetime")
     */
    private $expires_at;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", inversedBy="jobs", cascade={"persist"})
     */

    private $categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
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
     * Get Type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     * @param string $type
     * @return Job
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set Company
     * @param string $company
     * @return Job
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Get Company
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set Logo
     * @param string $logo
     * @return Job
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Get Logo
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set Url
     * @param string $url
     * @return Job
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * Set Position
     * @param string $position
     * @return Job
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get Position
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set Location
     * @param string $location
     * @return Job
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get Location
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set Description
     * @param string $description
     * @return Job
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get Description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set HowToApply
     * @param string $howToApply
     * @return Job
     */
    public function setHowToApply($howToApply)
    {
        $this->how_to_apply = $howToApply;
        return $this;
    }

    /**
     * Get HowToApply
     * @return string
     */
    public function getHowToApply()
    {
        return $this->how_to_apply;
    }

    /**
     * Set IsPublic
     * @param boolean $isPublic
     * @return Job
     */
    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;
        return $this;
    }

    /**
     * Get IsPublic
     * @return boolean
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }

    /**
     * Set IsActive
     * @param boolean $isActive
     * @return Job
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
        return $this;
    }

    /**
     * Get IsActive
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set Email
     * @param string $email
     * @return Job
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get Email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set Token
     * @param string $token
     * @return string
     */
    public function setToken($token)
    {
        $this->token = $token;
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
     * @return Job
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
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
     * Set ExpiresAt
     * @param \DateTime $expiresAt
     * @return Job
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;
        return $this;
    }

    /**
     * Get ExpiresAt
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set UpdatedAt
     * @param \DateTime $updatedAt
     * @return Job
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get UpdatedAt
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }



    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime;
    }

    /**
     * @ORM\PreUpdate
     *
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime;
    }

    /**
     * Get Categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param \AppBundle\Entity\Category $category
     * @return Job
     */

    public function addCategory(Category $category )
    {
        if($this->categories->contains($category)){
            return;
        }
        $category ->addJob($this);
        $this->categories->add($category);
    }

    /**
     * @param \AppBundle\Entity\Category $category
     * @return Job
     */

    public function removeCategory(Category $category)
    {
        if(!$this->categories->contains($category)){
            return;
        }
        $this->categories->removeElement($category);
        $category->removeElement($this);
    }

}