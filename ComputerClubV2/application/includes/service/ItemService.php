<?php
/**
 * User: StarmanW
 * Date: 28-Jan-18
 * Time: 10:33 PM
 */

require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Item.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Collaborator.php';

class ItemService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
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

        if ($this->getItemByID($item->getItemID()) !== 0) {
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

        if ($this->getItemByID($item->getItemID()) !== 0) {
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

        if ($this->getItemByID($item->getItemID()) !== 0) {
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