<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:51 PM
 * @ORM\Entity
 * @ORM\Table(name="eventmember")
 */

class EventMember {

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="EVENTMEMBERID", length=10, nullable=false)
     */
    private $eventMemberID;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Event", inversedBy="eventID")
     * @ORM\JoinColumn(name="EVENTID", referencedColumnName="EVENTID")
     */
    private $event;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Member", inversedBy="memberID")
     * @ORM\JoinColumn(name="MEMBERID", referencedColumnName="MEMBERID", onDelete="CASCADE")
     */
    private $member;

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