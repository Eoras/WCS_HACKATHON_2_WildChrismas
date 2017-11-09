<?php

namespace WCSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Child
 *
 * @ORM\Table(name="child")
 * @ORM\Entity(repositoryClass="WCSBundle\Repository\ChildRepository")
 */
class Child
{
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @ORM\ManyToOne(targetEntity="WCSBundle\Entity\Country", inversedBy="countries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="WCSBundle\Entity\Gift", mappedBy="gift")
     */
    private $gifts;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="text")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text",  nullable=true)
     */
    private $comment;

    /**
     * @var bool
     *
     * @ORM\Column(name="ship", type="boolean")
     */
    private $ship;

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
     * Set name
     *
     * @param string $name
     *
     * @return Child
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gifts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Child
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Child
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Child
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Child
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set ship
     *
     * @param boolean $ship
     *
     * @return Child
     */
    public function setShip($ship)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return boolean
     */
    public function getShip()
    {
        return $this->ship;
    }

    /**
     * Add gift
     *
     * @param \WCSBundle\Entity\Gift $gift
     *
     * @return Child
     */
    public function addGift(\WCSBundle\Entity\Gift $gift)
    {
        $this->gifts[] = $gift;

        return $this;
    }

    /**
     * Remove gift
     *
     * @param \WCSBundle\Entity\Gift $gift
     */
    public function removeGift(\WCSBundle\Entity\Gift $gift)
    {
        $this->gifts->removeElement($gift);
    }

    /**
     * Get gifts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGifts()
    {
        return $this->gifts;
    }

    /**
     * Set country
     *
     * @param \WCSBundle\Entity\Country $country
     *
     * @return Child
     */
    public function setCountry(\WCSBundle\Entity\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \WCSBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
