<?php
/**
 * User: StarmanW
 * Date: 06-Feb-18
 * Time: 1:29 AM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/MemberService.php';
include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClubV2/application/includes/service/ProgrammeService.php";
require $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/PasswordHandler.php';
require $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/utility/memberUtil.php';
//include $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/entity/Member.php';

if (isset($_POST['submitRegMem'])) {
    session_start();

    //Get all data and set it into a session
    $_SESSION['regMemberData'] = array(
        'fName' => $_POST['fName'],
        'lName' => $_POST['lName'],
        'icNum' => $_POST['icNum'],
        'memID' => $_POST['memID'],
        'contactNo' => $_POST['contactNo'],
        'email' => $_POST['email'],
        'progID' => $_POST['progID'],
        'academicYear' => $_POST['academicYear'],
        'gender' => $_POST['gender'],
        'memFeeStats' => $_POST['memFeeStats'],
        'position' => $_POST['position']
    );

    $nonEmptyData = validateEmptyData($_SESSION['regMemberData']);
    $validData = validateData($_SESSION['regMemberData']);

    if ($nonEmptyData === true and $validData === true) {
        //Creating objects requried for operation
        $memberService = new MemberService();
        $programmeService = new ProgrammeService();
        $member = new \Entity\Member();
        $passHandler = new PasswordHandler();

        //Set new member data
        $member->setFirstName($_SESSION['regMemberData']['fName']);
        $member->setLastName($_SESSION['regMemberData']['lName']);
        $member->setMemberIC($_SESSION['regMemberData']['icNum']);
        $member->setMemberID($_SESSION['regMemberData']['memID']);
        $member->setMemberContact($_SESSION['regMemberData']['contactNo']);
        $member->setMemberEmail($_SESSION['regMemberData']['email']);
        $member->setAcademicYear($_SESSION['regMemberData']['academicYear']);
        $member->setProgramme($programmeService->getProgrammeByID($_SESSION['regMemberData']['progID']));
        $member->setGender($_SESSION['regMemberData']['gender']);
        $member->setFeeStatus($_SESSION['regMemberData']['memFeeStats']);
        $member->setPosition($_SESSION['regMemberData']['position']);
        $member->setPassword($passHandler->hashPass($_SESSION['regMemberData']['icNum']));

        //Persist new member object
        if ($memberService->createMember($member) === true) {
            header("Location: ../../admin/member/registerMember.php?success");
        } else {
            header("Location: ../../admin/member/registerMember.php?error");
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
