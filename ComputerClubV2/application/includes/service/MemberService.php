<?php
/**
 * User: StarmanW
 * Date: 25-Jan-18
 * Time: 8:39 PM
 */

require_once 'DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Member.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Faculty.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/entity/Programme.php';
require_once 'EventMemberService.php';

class MemberService extends DB {

    //Constructor method
    public function __construct() {
        parent::__construct();
        $this->em->beginTransaction();
    }

    //Method to retrieve a specific member
    public function getMemberByID($memberID) {
        try {
            $member = $this->em->find(\Entity\Member::class, $memberID);
            $this->em->flush();
        } catch (Exception $e) {
            $this->em->rollback();
        }
        return $member === null ? 0 : $member;
    }

    //Method to retrieve all Members
    public function getAllMembers() {
        try {
            $members = $this->em->getRepository(Entity\Member::class)->findAll();
            $this->em->flush();
        } catch (Exception $e) {
            $this->em->rollback();
        }
        return $members === null ? 0 : $members;
    }

    //Method to create new member record
    public function createMember($member) {
        $successInsert = false;

        if ($this->getMemberByID($member->getMemberID()) !== 0) {
            $successInsert = -1;        //-1 for duplicated record
        } else {
            try {
                $this->em->merge($member);
                $this->em->commit();
                $this->em->flush();
                $successInsert = true;
            } catch (Exception $e) {
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
                $this->em->clear(\Entity\Member::class);
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

    //Method to delete member
    public function deleteMember($member) {
        $successDelete = false;

        if ($this->getMemberByID($member->getMemberID()) !== 0) {
            try {
                $emServ = new EventMemberService();

                $members = $emServ->getRecords("member", $member->getMemberID());
                for ($i = 0; $i < sizeof($members); $i++) {
                    $emServ->deleteEventMember($members[$i]);
                }

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
}