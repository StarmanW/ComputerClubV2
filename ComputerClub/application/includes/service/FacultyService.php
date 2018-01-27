<?php
/**
 * User: StarmanW
 * Date: 25-Jan-18
 * Time: 8:38 PM
 */
require_once 'DB.php';
require_once '../entity/Faculty.php';

class FacultyService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to find faculty
    private function getFaculty($facultyID) {
        $facultyExist = $this->em->getRepository('Faculty')->findOneBy(array('facultyID' => $facultyID));
        return $facultyExist === null ? 0 : 1;
    }

    //Method to retrieve a specific faculty
    public function getFacultyByID($facultyID) {
        $faculty = $this->em->getRepository('Faculty')->findOneBy(array('facultyID' => $facultyID));
        return $faculty === null ? 0 : $faculty;
    }

    //Method to retrieve all Faculty
    public function getAllFaculties() {
        return $this->em->getRepository('Faculty')->findAll();
    }

    //Method to create new faculty record
    public function createFaculty($faculty) {
        $successInsert = false;

        if ($this->getFaculty($faculty->getFacultyID())) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->beginTransaction();
                $this->em->persist($faculty);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (\Doctrine\ORM\OptimisticLockException $e) {
                $this->em->rollback();
            }
        }
        return $successInsert;
    }

    //Method to update faculty record
    public function updateFaculty($faculty) {
        $successUpdate = false;

        if ($this->getFaculty($faculty->getFacultyID())) {
            try {
                $this->em->beginTransaction();
                $this->em->merge($faculty);
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