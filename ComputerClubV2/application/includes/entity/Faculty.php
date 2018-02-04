<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 7:44 PM
 * @ORM\Entity
 * @ORM\Table(name="faculty")
 */

class Faculty {
    /**
     * @ORM\Id()
     * @ORM\OneToMany(targetEntity="Entity\Programme", mappedBy="faculty")
     * @ORM\Column(type="string", name="FACULTYID", nullable=false, length=4)
     */
    private $facultyID;
    /**
     * @ORM\Column(type="string", name="FACULTYNAME", nullable=false, length=200)
     */
    private $facultyName;

    /**
     * Faculty constructor.
     */
    public function __construct($facultyID, $facultyName) {
        $this->facultyID = $facultyID;
        $this->facultyName = $facultyName;
    }

    //Getters
    public function getFacultyID() {
        return $this->facultyID;
    }

    public function getFacultyName() {
        return $this->facultyName;
    }

    //Setters
    public function setFacultyID($facultyID) {
        $this->facultyID = $facultyID;
    }

    public function setFacultyName($facultyName) {
        $this->facultyName = $facultyName;
    }
}