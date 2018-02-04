<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity="Entity\Event", inversedBy="eventID")
     * @ORM\JoinColumn(name="EVENTID", referencedColumnName="EVENTID")
     */
    private $event;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Item", inversedBy="itemID")
     * @ORM\JoinColumn(name="ITEMID", referencedColumnName="ITEMID")
     */
    private $item;

    /**
     * EventItem constructor.
     */
    public function __construct() {
        $this->event = new ArrayCollection();
        $this->item = new ArrayCollection();
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