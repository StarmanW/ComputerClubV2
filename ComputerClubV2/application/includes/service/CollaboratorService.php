<?php
/**
 * User: StarmanW
 * Date: 28-Jan-18
 * Time: 10:34 PM
 */

require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/includes/entity/Collaborator.php';

class CollaboratorService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to retrieve a specific collaborator
    public function getCollaboratorByID($collabID) {
        $collabID = $this->em->getRepository(Entity\Collaborator::class)->findOneBy(array('collabID' => $collabID));
        return $collabID === null ? 0 : $collabID;
    }

    //Method to retrieve all Collaborators
    public function getAllCollaborators() {
        $collabs = $this->em->getRepository(Entity\Collaborator::class)->findAll();
        return $collabs === null ? 0 : $collabs;
    }

    //Method to create new collaborator record
    public function createCollaborator($collab) {
        $successInsert = false;

        if ($this->getCollaboratorByID($collab->getCollaboratorID()) !== 0) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->beginTransaction();
                $this->em->persist($collab);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (\Doctrine\ORM\OptimisticLockException $e) {
                $this->em->rollback();
            }
        }
        return $successInsert;
    }

    //Method to update collaborator record
    public function updateCollaborator($collab) {
        $successUpdate = false;

        if ($this->getCollaboratorByID($collab->getCollaboratorID()) !== 0) {
            try {
                $this->em->beginTransaction();
                $this->em->merge($collab);
                $this->em->commit();
                $this->em->flush();
                $successUpdate = true;
            } catch (Exception $e) {
                $this->em->rollback();
            }
        }
        return $successUpdate;
    }

    //Method to delete collaborator
    public function deleteCollaborator($collab) {
        $successDelete = false;

        if ($this->getCollaboratorByID($collab->getCollaboratorID()) !== 0) {
            try {
                $this->em->beginTransaction();
                $this->em->remove($collab);
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