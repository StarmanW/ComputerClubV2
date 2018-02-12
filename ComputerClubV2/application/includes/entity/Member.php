<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 7:07 PM
 * @ORM\Entity
 * @ORM\Table(name="members")
 */

class Member {

    /**
     * @ORM\Id()
     * @ORM\OneToMany(targetEntity="Entity\EventMember", mappedBy="member", cascade={"remove"})
     * @ORM\Column(type="string", name="MEMBERID", nullable=false, length=10)
     */
    private $memberID;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Programme", inversedBy="progID", cascade={"refresh"})
     * @ORM\JoinColumn(name="PROGID", referencedColumnName="PROGID")
     */
    private $programme;
    /**
     * @ORM\Column(type="string", name="FIRSTNAME", nullable=false, length=255)
     */
    private $firstName;
    /**
     * @ORM\Column(type="string", name="LASTNAME", nullable=false, length=255)
     */
    private $lastName;
    /**
     * @ORM\Column(type="string", name="STUDEMAIL", nullable=false, length=200)
     */
    private $memberEmail;
    /**
     * @ORM\Column(type="string", name="STUDCONTACT", nullable=false, length=20)
     */
    private $memberContact;
    /**
     * @ORM\Column(type="string", name="ICNUM", nullable=false, length=12)
     */
    private $memberIC;
    /**
     * @ORM\Column(type="string", name="GENDER", nullable=false, length=1)
     */
    private $gender;
    /**
     * @ORM\Column(type="boolean", name="MEMFEESTATS", nullable=false)
     */
    private $feeStatus;
    /**
     * @ORM\Column(type="integer", name="POSITION", nullable=false)
     */
    private $position;
    /**
     * @ORM\Column(type="string", name="ACADEMICYEAR", nullable=false, length=9)
     */
    private $academicYear;
    /**
     * @ORM\Column(type="string", name="PASSWORD", nullable=false, length=255)
     */
    private $password;

    /**
     * Member constructor.
     */
    public function __construct() {
        $this->memberID = new ArrayCollection();
    }

    //Getters
    public function getMemberID() {
        return $this->memberID;
    }

    public function getProgramme() {
        return $this->programme;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getMemberEmail() {
        return $this->memberEmail;
    }

    public function getMemberContact() {
        return $this->memberContact;
    }

    public function getMemberIC() {
        return $this->memberIC;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getFeeStatus() {
        if ($this->feeStatus === true) {
            return "Paid";
        } else {
            return "Pending";
        }
    }

    public function getPosition() {
        return $this->position;
    }

    public function getPositionString() {
        $positionTitle = null;

        switch($this->position) {
            case 1:
                $positionTitle = "Member";
                break;
            case 2:
                $positionTitle = "Treasurer";
                break;
            case 3:
                $positionTitle = "Secretary";
                break;
            case 4:
                $positionTitle = "Vice President";
                break;
            case 5:
                $positionTitle = "President";
                break;
        }

        return $positionTitle;
    }

    public function getAcademicYear() {
        return $this->academicYear;
    }

    public function getPassword() {
        return $this->password;
    }

    //Setters
    public function setMemberID($memberID) {
        $this->memberID = $memberID;
    }

    public function setProgramme($programme) {
        $this->programme = $programme;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setMemberEmail($memberEmail) {
        $this->memberEmail = $memberEmail;
    }

    public function setMemberContact($memberContact) {
        $this->memberContact = $memberContact;
    }

    public function setMemberIC($memberIC) {
        $this->memberIC = $memberIC;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setFeeStatus($feeStatus) {
        $this->feeStatus = $feeStatus;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setAcademicYear($academicYear) {
        $this->academicYear = $academicYear;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}