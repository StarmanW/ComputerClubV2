<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 7:54 PM
 *
 * @ORM\Entity
 * @ORM\Table(name="collaborator")
 */

class Collaborator {

    /**
     * @ORM\Id()
     * @ORM\OneToMany(targetEntity="EventCollaborator", mappedBy="collaborator")
     * @ORM\Column(type="string", name="COLLABID", nullable=false, unique=true, length=10)
     */
    private $collabID;
    /**
     * @ORM\Column(type="string", name="COLLABNAME", length=255)
     */
    private $collabName;
    /**
     * @ORM\Column(type="integer", name="COLLABTYPE")
     */
    private $collabType;
    /**
     * @ORM\Column(type="string", name="COLLABCONTACT", length=20)
     */
    private $collabContact;
    /**
     * @ORM\Column(type="string", name="COLLABEMAIL", length=255)
     */
    private $collabEmail;
    /**
     * @ORM\Column(type="string", name="ADDITIONALNOTES", length=255)
     */
    private $additionalNotes;

    /**
     * Collaborator constructor.
     */
    public function __construct($collabID, $collabName, $collabType, $collabContact, $collabEmail, $additionalNotes) {
        $this->collabID = $collabID;
        $this->collabName = $collabName;
        $this->collabType = $collabType;
        $this->collabContact = $collabContact;
        $this->collabEmail = $collabEmail;
        $this->additionalNotes = $additionalNotes;
    }

    //Getters
    public function getCollabID() {
        return $this->collabID;
    }

    public function getCollabName() {
        return $this->collabName;
    }

    public function getCollabType() {
        return $this->collabType;
    }

    public function getCollabTypeString() {
        $collabTypeString = null;

        switch($this->collabType) {
            case 1:
                $collabTypeString = "Company";
                break;
            case 2:
                $collabTypeString = "Individual";
                break;
        }

        return $collabTypeString;
    }

    public function getCollabContact() {
        return $this->collabContact;
    }

    public function getCollabEmail() {
        return $this->collabEmail;
    }

    public function getAdditionalNotes() {
        return $this->additionalNotes;
    }

    //Setters
    public function setCollabID($collabID) {
        $this->collabID = $collabID;
    }

    public function setCollabName($collabName) {
        $this->collabName = $collabName;
    }

    public function setCollabType($collabType) {
        $this->collabType = $collabType;
    }

    public function setCollabContact($collabContact) {
        $this->collabContact = $collabContact;
    }

    public function setCollabEmail($collabEmail) {
        $this->collabEmail = $collabEmail;
    }

    public function setAdditionalNotes($additionalNotes) {
        $this->additionalNotes = $additionalNotes;
    }
}