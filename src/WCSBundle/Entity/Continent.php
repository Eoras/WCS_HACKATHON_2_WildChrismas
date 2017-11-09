<?php

namespace WCSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * continent
 *
 * @ORM\Table(name="continent")
 * @ORM\Entity(repositoryClass="WCSBundle\Repository\continentRepository")
 */
class Continent
{
    /**
     * @ORM\OneToMany(targetEntity="WCSBundle\Entity\Country", mappedBy="country")
     */
    private $countries;

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
     * @return continent
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
        $this->countries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add country
     *
     * @param \WCSBundle\Entity\Country $country
     *
     * @return Continent
     */
    public function addCountry(\WCSBundle\Entity\Country $country)
    {
        $this->countries[] = $country;

        return $this;
    }

    /**
     * Remove country
     *
     * @param \WCSBundle\Entity\Country $country
     */
    public function removeCountry(\WCSBundle\Entity\Country $country)
    {
        $this->countries->removeElement($country);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
