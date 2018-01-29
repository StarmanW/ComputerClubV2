<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:51 PM
 * @ORM\Entity
 * @ORM\Table(name="eventitem")
 */

class EventItem {

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="EVENTITEMID", length=10, nullable=false)
     */
    private $eventItemID;
    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="eventID")
     * @ORM\JoinColumn(name="EVENTID", referencedColumnName="EVENTID")
     * @ORM\Column(type="string", name="EVENTID", length=10, nullable=false)
     */
    private $event;
    /**
     * @ORM\ManyToOne(targetEntity="Item", inversedBy="itemID")
     * @ORM\JoinColumn(name="ITEMID", referencedColumnName="ITEMID")
     * @ORM\Column(type="string", name="ITEMID", length=10, nullable=false)
     */
    private $item;

    /**
     * EventItem constructor.
     */
    public function __construct($eventItemID, $event, $item) {
        $this->eventItemID = $eventItemID;
        $this->event = $event;
        $this->item = $item;
    }

    //Getters
    public function getEventItemID() {
        return $this->eventItemID;
    }

    public function getEvent() {
        return $this->event;
    }

    public function getItem() {
        return $this->item;
    }

    //Setters
    public function setEventItemID($eventItemID) {
        $this->eventItemID = $eventItemID;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setItem($item) {
        $this->item = $item;
    }
}