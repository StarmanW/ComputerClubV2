<?php
/**
 * User: StarmanW
 * Date: 25-Jan-18
 * Time: 8:39 PM
 */
require_once 'DB.php';
require_once '../entity/Programme.php';

class ProgrammeService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to find programme
    private function getProgramme($progID) {
        $progExist = $this->em->getRepository('Programme')->findOneBy(array('progID' => $progID));
        return $progExist === null ? 0 : 1;
    }

    //Method to retrieve a specific programme
    public function getProgrammeByID($progID) {
        $programme = $this->em->getRepository('Programme')->findOneBy(array('progID' => $progID));
        return $programme === null ? 0 : $programme;
    }

    //Method to retrieve all Programmes
    public function getAllProgrammes() {
        return $this->em->getRepository('Programme')->findAll();
    }

    //Method to create new programme record
    public function createProgramme($programme) {
        $successInsert = false;

        if ($this->getProgramme($programme->getProgID())) {
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

        if ($this->getProgramme($programme->getProgID())) {
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
}