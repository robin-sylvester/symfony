<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MovieRepository")
 */
class Movie
{
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
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="datetime")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Combined", mappedBy="movie")
     * @ORM\JoinColumn(name="combined_id", referencedColumnName="id")
     */
    private $combined;

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
     * @return Movie
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
     * Set year
     *
     * @param \DateTime $year
     *
     * @return Movie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Movie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->combined = new ArrayCollection();
    }

    /**
     * Add combined
     *
     * @param \AppBundle\Entity\Combined $combined
     *
     * @return Movie
     */
    public function addCombined(\AppBundle\Entity\Combined $combined)
    {
        $this->combined[] = $combined;

        return $this;
    }

    /**
     * Remove combined
     *
     * @param \AppBundle\Entity\Combined $combined
     */
    public function removeCombined(\AppBundle\Entity\Combined $combined)
    {
        $this->combined->removeElement($combined);
    }

    /**
     * Get combined
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCombined()
    {
        return $this->combined;
    }
}
