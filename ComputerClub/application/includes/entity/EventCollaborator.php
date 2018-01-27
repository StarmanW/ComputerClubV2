<?php

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
     * @ORM\Column(type="string", name="EVENTID", length=10, nullable=false)
     */
    private $event;
    /**
     * @ORM\Column(type="string", name="COLLABID", length=10, nullable=false)
     */
    private $collaborator;

    /**
     * EventCollaborator constructor.
     */
    public function __construct($eventCollabID, $event, $collaborator) {
        $this->eventCollabID = $eventCollabID;
        $this->event = $event;
        $this->collaborator = $collaborator;
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