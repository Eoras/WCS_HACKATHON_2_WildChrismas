<?php

namespace WCSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="WCSBundle\Repository\countryRepository")
 */
class Country
{
    public function __toString()
    {
      return $this->getName();
    }

    /**
     *
     *@ORM\OneToMany(targetEntity="WCSBundle\Entity\Child", mappedBy="child")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="WCSBundle\Entity\Continent", inversedBy="countries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $continent;
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
     * @return country
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
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add child
     *
     * @param \WCSBundle\Entity\Child $child
     *
     * @return Country
     */
    public function addChild(\WCSBundle\Entity\Child $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \WCSBundle\Entity\Child $child
     */
    public function removeChild(\WCSBundle\Entity\Child $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set continent
     *
     * @param \WCSBundle\Entity\Continent $continent
     *
     * @return Country
     */
    public function setContinent(\WCSBundle\Entity\Continent $continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return \WCSBundle\Entity\Continent
     */
    public function getContinent()
    {
        return $this->continent;
    }
}
