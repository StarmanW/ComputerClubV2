<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:47 PM
 * @ORM\Entity
 * @ORM\Table(name="programme")
 */

class Programme {

    /**
     * @ORM\Id()
     * @ORM\OneToMany(targetEntity="Member", mappedBy="programme")
     * @ORM\Column(type="string", name="PROGID", nullable=false, length=3)
     */
    private $progID;
    /**
     * @ORM\Column(type="string", name="PROGNAME", nullable=false, length=200)
     */
    private $progName;
    /**
     * @ORM\Column(type="string", name="FACULTYID", nullable=false, length=4)
     * @ORM\ManyToOne(targetEntity="Faculty", inversedBy="facultyID")
     * @ORM\JoinColumn(name="FACULTYID", referencedColumnName="FACULTYID")
     */
    private $faculty;

    /**
     * Programme constructor.
     */
    public function __construct($progID, $progName, $faculty) {
        $this->progID = $progID;
        $this->progName = $progName;
        $this->faculty = $faculty;
    }

    //Getters
    public function getProgID() {
        return $this->progID;
    }

    public function getProgName() {
        return $this->progName;
    }

    public function getFaculty() {
        return $this->faculty;
    }

    //Setters
    public function setProgID($progID) {
        $this->progID = $progID;
    }

    public function setProgName($progName) {
        $this->progName = $progName;
    }

    public function setFaculty($faculty) {
        $this->faculty = $faculty;
    }
}