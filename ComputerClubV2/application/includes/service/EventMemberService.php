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

    //Method to retrieve a specific event member by event ID
    public function getRecords($colField, $value) {
        try {
            $eventCollab = $this->em->getRepository(Entity\EventMember::class)->findBy(array($colField => $value));
            $this->em->flush();
        } catch (Exception $e) {
            $this->em->rollback();
        }
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
            $this->em->clear(\Entity\EventMember::class);
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

    //Method to delete event member record
    public function deleteEventMember($eventMember) {
        $successDelete = false;

        try {
            $this->em->beginTransaction();
            $this->em->remove($eventMember);
            $this->em->commit();
            $this->em->flush();
            $successDelete = true;
        } catch (Exception $e) {
            $this->em->rollback();
        }
        return $successDelete;
    }
}