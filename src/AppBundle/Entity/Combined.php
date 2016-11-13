<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Combined
 *
 * @ORM\Table(name="combined")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CombinedRepository")
 */
class Combined
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
     * @ORM\ManyToOne(targetEntity="Movie",inversedBy="combined")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id", nullable=true)
     */
    private $movie;

    /**
     * @ORM\ManyToOne(targetEntity="People",cascade={"persist","remove"},inversedBy="combined")
     * @ORM\JoinColumn(name="people_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $people;

    /**
     * @ORM\ManyToOne(targetEntity="Role",cascade={"persist"},inversedBy="combined")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    public function __construct($movie)
    {
        $this->movie = $movie;
        $this->people = new ArrayCollection();
        $this->role = new ArrayCollection();
    }

    /**
     * Set movie
     *
     * @param \AppBundle\Entity\Movie $movie
     *
     * @return Combined
     */
    public function setMovie(\AppBundle\Entity\Movie $movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \AppBundle\Entity\Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set people
     *
     * @param \AppBundle\Entity\People $people
     *
     * @return Combined
     */
    public function setPeople(\AppBundle\Entity\People $people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return \AppBundle\Entity\People
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set role
     *
     * @param \AppBundle\Entity\Role $role
     *
     * @return Combined
     */
    public function setRole(\AppBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \AppBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
