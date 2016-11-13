<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 */
class Role
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
     * @ORM\Column(name="name_of_role", type="string", length=255)
     */
    private $nameOfRole;

    /**
     * @ORM\OneToMany(targetEntity="Combined", mappedBy="role")
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
     * Set nameOfRole
     *
     * @param string $nameOfRole
     *
     * @return Role
     */
    public function setNameOfRole($nameOfRole)
    {
        $this->nameOfRole = $nameOfRole;

        return $this;
    }

    /**
     * Get nameOfRole
     *
     * @return string
     */
    public function getNameOfRole()
    {
        return $this->nameOfRole;
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
     * @return Role
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
