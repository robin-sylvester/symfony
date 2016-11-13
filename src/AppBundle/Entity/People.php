<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * People
 *
 * @ORM\Table(name="people")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PeopleRepository")
 */
class People
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
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\OneToMany(targetEntity="Combined", mappedBy="people")
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return People
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return People
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return People
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
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
     * @return People
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
