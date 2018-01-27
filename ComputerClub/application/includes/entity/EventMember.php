<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:51 PM
 * @ORM\Entity
 * @ORM\Table(name="eventmember")
 */

class EventMember {

    //Data fields
    /**
     * @ORM\Column(type="string", name="EVENTMEMBERID", length=10, nullable=false)
     */
    private $eventMemberID;
    /**
     * @ORM\Column(type="string", name="EVENTID", length=10, nullable=false)
     */
    private $event;
    /**
     * @ORM\Column(type="string", name="MEMBERID", length=10, nullable=false)
     */
    private $member;

    /**
     * EventMember constructor.
     */
    public function __construct($eventMemberID, $event, $member) {
        $this->eventMemberID = $eventMemberID;
        $this->event = $event;
        $this->member = $member;
    }

    //Getters
    public function getEventMemberID() {
        return $this->eventMemberID;
    }

    public function getEvent() {
        return $this->event;
    }

    public function getMember() {
        return $this->member;
    }

    //Setters
    public function setEventMemberID($eventMemberID) {
        $this->eventMemberID = $eventMemberID;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setMember($member) {
        $this->member = $member;
    }
}