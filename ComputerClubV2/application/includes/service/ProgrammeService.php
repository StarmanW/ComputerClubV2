<?php
/**
 * User: StarmanW
 * Date: 25-Jan-18
 * Time: 8:39 PM
 */
require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Faculty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Programme.php';

class ProgrammeService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to retrieve a specific programme
    public function getProgrammeByID($progID) {
        try {
            $programme = $this->em->getRepository(Entity\Programme::class)->findOneBy(array('progID' => $progID));
            $this->em->flush();
        } catch (\Doctrine\ORM\OptimisticLockException $e) {
            $this->em->rollback();
        }
        return $programme === null ? 0 : $programme;
    }

    //Method to retrieve all Programmes
    public function getAllProgrammes() {
        try {
            $programes = $this->em->getRepository(Entity\Programme::class)->findAll();
            $this->em->flush();
        } catch (\Doctrine\ORM\OptimisticLockException $e) {
            $this->em->rollback();
        }
        return $programes === null ? 0 : $programes;
    }

    //Method to create new programme record
    public function createProgramme($programme) {
        $successInsert = false;

        if ($this->getProgrammeByID($programme->getProgID()) !== 0) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->beginTransaction();
                $this->em->persist($programme);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (\Doctrine\ORM\OptimisticLockException $e) {
                $this->em->rollback();
            }
        }
        return $successInsert;
    }

    //Method to update programme record
    public function updateProgramme($programme) {
        $successUpdate = false;

        if ($this->getProgrammeByID($programme->getProgID()) !== 0) {
            try {
                $this->em->beginTransaction();
                $this->em->merge($programme);
                $this->em->commit();
                $this->em->flush();
                $successUpdate = true;
            } catch (Exception $e) {
                $this->em->rollback();
            }
        }
        return $successUpdate;
    }

    //Method to delete programme
    public function deleteProgramme($programme) {
        $successDelete = false;

        if ($this->getProgrammeByID($programme->getProgID()) !== 0) {
            try {
                $this->em->beginTransaction();
                $this->em->remove($programme);
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