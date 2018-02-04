<?php
/**
 * User: StarmanW
 * Date: 05-Feb-18
 * Time: 1:55 AM
 */


require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Programme.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Member.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Faculty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Event.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/EventMember.php';

class EventMemberService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to retrieve a specific event collaborator by event ID
    public function getMembersByEventID($eventID) {
        $eventCollab = $this->em->getRepository(Entity\EventMember::class)->findBy(array('event' => $eventID));
        return $eventCollab === null ? 0 : $eventCollab;
    }

    //Method to retrieve all Event Collaborators
    public function getAllRecords() {
        $eventCollabs = $this->em->getRepository(Entity\EventMember::class)->findAll();
        return $eventCollabs === null ? 0 : $eventCollabs;
    }

    //Method to add new event collaborator record
    public function addEventMember($eventCollab) {
        $successInsert = false;

        try {
            $this->em->beginTransaction();
            $this->em->persist($eventCollab);
            $this->em->commit();
            $this->em->flush();
            $successInsert = true;
        } catch (\Doctrine\ORM\OptimisticLockException $e) {
            $this->em->rollback();
        }
        return $successInsert;
    }

    //Method to update event collaborator record
    public function updateEventMember($eventCollab) {
        $successUpdate = false;

        try {
            $this->em->beginTransaction();
            $this->em->merge($eventCollab);
            $this->em->commit();
            $this->em->flush();
            $successUpdate = true;
        } catch (Exception $e) {
            $this->em->rollback();
        }
        return $successUpdate;
    }

    //Method to delete event collaborator record
    public function deleteEventMember($eventCollab) {
        $successDelete = false;

        try {
            $this->em->beginTransaction();
            $this->em->remove($eventCollab);
            $this->em->commit();
            $this->em->flush();
            $successDelete = true;
        } catch (Exception $e) {
            $this->em->rollback();
        }
        return $successDelete;
    }
}