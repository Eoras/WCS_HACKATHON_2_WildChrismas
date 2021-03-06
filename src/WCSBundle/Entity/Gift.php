<?php

namespace WCSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gift
 *
 * @ORM\Table(name="gift")
 * @ORM\Entity(repositoryClass="WCSBundle\Repository\giftRepository")
 */
class Gift
{

    /**
     * @ORM\ManyToOne(targetEntity="WCSBundle\Entity\Child", inversedBy="gifts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;

    // symfony


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
     * @var bool
     *
     * @ORM\Column(name="build", type="boolean")
     *
     */
    private $build = false;


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
     * @return gift
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
     * Set build
     *
     * @param boolean $build
     *
     * @return gift
     */
    public function setBuild($build)
    {
        $this->build = $build;

        return $this;
    }

    /**
     * Get build
     *
     * @return bool
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * Set child
     *
     * @param \WCSBundle\Entity\Child $child
     *
     * @return Gift
     */
    public function setChild(\WCSBundle\Entity\Child $child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return \WCSBundle\Entity\Child
     */
    public function getChild()
    {
        return $this->child;
    }
}
