<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 7:42 PM
 * @ORM\Entity
 * @ORM\Table(name="sponsoreditem")
 */
class Item {

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="ITEMID", nullable=false, length=10)
     */
    private $itemID;
    /**
     * @ORM\Column(type="string", name="COLLABID", length=10)
     */
    private $collaborator;
    /**
     * @ORM\Column(type="integer", name="ITEMTYPE")
     */
    private $itemType;
    /**
     * @ORM\Column(type="string", name="ITEMNAME", length=255)
     */
    private $itemName;
    /**
     * @ORM\Column(type="string", name="ITEMDESC", length=255)
     */
    private $itemDesc;
    /**
     * @ORM\Column(type="integer", name="ITEMQUANTITY")
     */
    private $quantity;

    /**
     * Item constructor.
     */
    public function __construct($itemID, $collaborator, $itemType, $itemName, $itemDesc, $quantity) {
        $this->itemID = $itemID;
        $this->collaborator = $collaborator;
        $this->itemType = $itemType;
        $this->itemName = $itemName;
        $this->itemDesc = $itemDesc;
        $this->quantity = $quantity;
    }

    //Getters
    public function getItemID() {
        return $this->itemID;
    }

    public function getCollaborator() {
        return $this->collaborator;
    }

    public function getItemType() {
        return $this->itemType;
    }

    public function getItemTypeString() {
        $itemTypeString = null;

        switch ($this->collabType) {
            case 1:
                $itemTypeString = "Others";
                break;
            case 2:
                $itemTypeString = "Funds";
                break;
            case 3:
                $itemTypeString = "Foods & drinks";
                break;
            case 4:
                $itemTypeString = "Certificates";
                break;
            case 5:
                $itemTypeString = "Equipments";
                break;
            case 6:
                $itemTypeString = "Trophy";
                break;
        }

        return $itemTypeString;
    }

    public function getItemName() {
        return $this->itemName;
    }

    public function getItemDesc() {
        return $this->itemDesc;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    //Setters
    public function setItemID($itemID) {
        $this->itemID = $itemID;
    }

    public function setCollaborator($collaborator) {
        $this->collaborator = $collaborator;
    }

    public function setItemType($itemType) {
        $this->itemType = $itemType;
    }

    public function setItemName($itemName) {
        $this->itemName = $itemName;
    }

    public function setItemDesc($itemDesc) {
        $this->itemDesc = $itemDesc;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}