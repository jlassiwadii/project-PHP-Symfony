<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="designation", type="string", length=50)
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="nbHeure", type="integer")
     */
    private $nbHeure;

    /**
     * @var int
     *
     * @ORM\Column(name="nbChapitre", type="integer")
     */
    private $nbChapitre;


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
     * Set designation
     *
     * @param string $designation
     *
     * @return Cours
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set nbHeure
     *
     * @param integer $nbHeure
     *
     * @return Cours
     */
    public function setNbHeure($nbHeure)
    {
        $this->nbHeure = $nbHeure;

        return $this;
    }

    /**
     * Get nbHeure
     *
     * @return int
     */
    public function getNbHeure()
    {
        return $this->nbHeure;
    }

    /**
     * Set nbChapitre
     *
     * @param integer $nbChapitre
     *
     * @return Cours
     */
    public function setNbChapitre($nbChapitre)
    {
        $this->nbChapitre = $nbChapitre;

        return $this;
    }

    /**
     * Get nbChapitre
     *
     * @return int
     */
    public function getNbChapitre()
    {
        return $this->nbChapitre;
    }
}

