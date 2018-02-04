<?php
/**
 * User: StarmanW
 * Date: 28-Jan-18
 * Time: 10:33 PM
 */

require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Item.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Collaborator.php';

class ItemService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to find item
    private function getItem($itemID) {
        $itemExist = $this->em->getRepository(Entity\Item::class)->findOneBy(array('itemID' => $itemID));
        return $itemExist === null ? 0 : 1;
    }

    //Method to retrieve a specific item
    public function getItemByID($itemID) {
        $itemID = $this->em->getRepository(Entity\Item::class)->findOneBy(array('itemID' => $itemID));
        return $itemID === null ? 0 : $itemID;
    }

    //Method to retrieve all Items
    public function getAllItems() {
        $items = $this->em->getRepository(Entity\Item::class)->findAll();
        return $items === null ? 0 : $items;
    }

    //Method to create new item record
    public function createItem($item) {
        $successInsert = false;

        if ($this->getItem($item->getItemID())) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->beginTransaction();
                $this->em->persist($item);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (\Doctrine\ORM\OptimisticLockException $e) {
                $this->em->rollback();
            }
        }
        return $successInsert;
    }

    //Method to update item record
    public function updateItem($item) {
        $successUpdate = false;

        if ($this->getItem($item->getItemID())) {
            try {
                $this->em->beginTransaction();
                $this->em->merge($item);
                $this->em->commit();
                $this->em->flush();
                $successUpdate = true;
            } catch (Exception $e) {
                $this->em->rollback();
            }
        }
        return $successUpdate;
    }

    //Method to delete item
    public function deleteItem($item) {
        $successDelete = false;

        if ($this->getItem($item->getItemID())) {
            try {
                $this->em->beginTransaction();
                $this->em->remove($item);
                $this->em->commit();
                $this->em->flush();
                $successDelete = true;
            } catch (Exception $e) {
                $this->em->rollback();
            }
        }
        return $successDelete;
    }
}