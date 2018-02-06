<?php
/**
 * User: StarmanW
 * Date: 25-Jan-18
 * Time: 8:39 PM
 */

require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Member.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Faculty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Programme.php';

class MemberService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
    }

    //Method to retrieve a specific member
    public function getMemberByID($memberID) {
        $member = $this->em->getRepository(Entity\Member::class)->findOneBy(array('memberID' => $memberID));
        $this->em->clear();
        return $member === null ? 0 : $member;
    }

    //Method to retrieve all Members
    public function getAllMembers() {
        $members = $this->em->getRepository(Entity\Member::class)->findAll();
        return $members === null ? 0 : $members;
    }

    //Method to create new member record
    public function createMember($member) {
        $successInsert = false;

        if ($this->getMemberByID($member->getMemberID()) !== 0) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->beginTransaction();
                $this->em->merge($member);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (\Doctrine\ORM\OptimisticLockException $e) {
                $this->em->rollback();
            }
        }
        return $successInsert;
    }

    //Method to update member record
    public function updateMember($member) {
        $successUpdate = false;

        if ($this->getMemberByID($member->getMemberID()) !== 0) {
            try {
                $this->em->beginTransaction();
                $this->em->merge($member);
                $this->em->commit();
                $this->em->flush();
                $successUpdate = true;
            } catch (Exception $e) {
                $this->em->rollback();
            }
        }
        return $successUpdate;
    }

    /*
     * This method is for demo purpose, it is never used on this
     * project. This method performs deletion of a specific member
     * record from database.
     *
        //Method to delete member
        public function deleteMember($memberID) {
            $successDelete = false;

            if ($this->getMemberByID($member->getMemberID()) !== 0) {
                try {
                    $this->em->beginTransaction();
                    $this->em->remove($member);
                    $this->em->commit();
                    $this->em->flush();
                    $successDelete = true;
                } catch (Exception $e) {
                    $this->em->rollback();
                }
            }

            return $successDelete;
        }
    */
}