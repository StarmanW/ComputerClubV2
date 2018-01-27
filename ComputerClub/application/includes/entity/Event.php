<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 7:53 PM
 * @ORM\Entity
 * @ORM\Table(name="event")
 */

class Event {

    //Data fields
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="EVENTID", nullable=false, length=10)
     */
    private $eventID;
    /**
     * @ORM\Column(type="string", name="EVENTNAME", length=255)
     */
    private $eventName;
    /**
     * @ORM\Column(type="integer", name="EVENTTYPE")
     */
    private $eventType;
    /**
     * @ORM\Column(type="string", name="EVENTDATE", length=25)
     */
    private $eventDate;
    /**
     * @ORM\Column(type="string", name="EVENTSTARTTIME", length=20)
     */
    private $eventStartTime;
    /**
     * @ORM\Column(type="string", name="EVENTENDTIME", length=20)
     */
    private $eventEndTime;
    /**
     * @ORM\Column(type="string", name="EVENTLOCATION", length=255)
     */
    private $eventLocation;
    /**
     * @ORM\Column(type="string", name="EVENTDESC", length=255)
     */
    private $eventDesc;

    /**
     * Event constructor.
     */
    public function __construct($eventID, $eventName, $eventType, $eventDate, $eventStartTime, $eventEndTime, $eventLocation, $eventDesc) {
        $this->eventID = $eventID;
        $this->eventName = $eventName;
        $this->eventType = $eventType;
        $this->eventDate = $eventDate;
        $this->eventStartTime = $eventStartTime;
        $this->eventEndTime = $eventEndTime;
        $this->eventLocation = $eventLocation;
        $this->eventDesc = $eventDesc;
    }

    //Getters
    public function getEventID() {
        return $this->eventID;
    }

    public function getEventName() {
        return $this->eventName;
    }

    public function getEventType() {
        return $this->eventType;
    }

    public function getEventTypeString() {
        $eventTypeString = null;

        switch($this->collabType) {
            case 1:
                $eventTypeString = "Others";
                break;
            case 2:
                $eventTypeString = "Event Exhibition";
                break;
            case 3:
                $eventTypeString = "Workshop/Talk";
                break;
            case 4:
                $eventTypeString = "Educational Visit/Trip";
                break;
            case 5:
                $eventTypeString = "Competition";
                break;
        }

        return $eventTypeString;
    }

    public function getEventDate() {
        return $this->eventDate;
    }

    public function getEventStartTime() {
        return $this->eventStartTime;
    }

    public function getEventEndTime() {
        return $this->eventEndTime;
    }

    public function getEventLocation() {
        return $this->eventLocation;
    }

    public function getEventDesc() {
        return $this->eventDesc;
    }

    //Setters
    public function setEventID($eventID) {
        $this->eventID = $eventID;
    }

    public function setEventName($eventName) {
        $this->eventName = $eventName;
    }

    public function setEventType($eventType) {
        $this->eventType = $eventType;
    }

    public function setEventDate($eventDate) {
        $this->eventDate = $eventDate;
    }

    public function setEventStartTime($eventStartTime) {
        $this->eventStartTime = $eventStartTime;
    }

    public function setEventEndTime($eventEndTime) {
        $this->eventEndTime = $eventEndTime;
    }

    public function setEventLocation($eventLocation) {
        $this->eventLocation = $eventLocation;
    }

    public function setEventDesc($eventDesc) {
        $this->eventDesc = $eventDesc;
    }
}