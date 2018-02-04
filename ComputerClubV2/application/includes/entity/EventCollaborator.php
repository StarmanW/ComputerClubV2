<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:51 PM
 * @ORM\Entity
 * @ORM\Table(name="eventcollaborator")
 */

class EventCollaborator {

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="EVENTCOLLABID", length=10, nullable=false)
     */
    private $eventCollabID;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Event", inversedBy="eventID")
     * @ORM\JoinColumn(name="EVENTID", referencedColumnName="EVENTID")
     */
    private $event;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Collaborator", inversedBy="collabID")
     * @ORM\JoinColumn(name="COLLABID", referencedColumnName="COLLABID")
     */
    private $collaborator;

    /**
     * EventCollaborator constructor.
     */
    public function __construct() {
        $this->event = new ArrayCollection();
        $this->collaborator = new ArrayCollection();
    }

    //Getters
    public function getEventCollabID() {
        return $this->eventCollabID;
    }

    public function getEvent() {
        return $this->event;
    }

    public function getCollaborator() {
        return $this->collaborator;
    }

    //Setters
    public function setEventCollabID($eventCollabID) {
        $this->eventCollabID = $eventCollabID;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setCollaborator($collaborator) {
        $this->collaborator = $collaborator;
    }
}