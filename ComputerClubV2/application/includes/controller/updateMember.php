<?php
/**
 * User: StarmanW
 * Date: 07-Feb-18
 * Time: 9:21 AM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/includes/service/MemberService.php';
require $_SERVER['DOCUMENT_ROOT'] . "/includes/service/ProgrammeService.php";
require $_SERVER['DOCUMENT_ROOT'] . '/includes/service/PasswordHandler.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/utility/memberUtil.php';

//TODO - Add login session check once finished
if (isset($_POST['submitUpdtMem'])) {
    session_name("xg-ai");
    session_start();

    //Get all data and set it into a session
    $_SESSION['updtMemData'] = array(
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

    $nonEmptyData = validateEmptyData($_SESSION['updtMemData'], "updateMember");
    $validData = validateData($_SESSION['updtMemData'], "updateMember");

    if ($nonEmptyData === true and $validData === true) {
        //Creating objects requried for operation
        $memberService = new MemberService();
        $programmeService = new ProgrammeService();
        $member = $memberService->getMemberByID($_SESSION['updtMemData']['memID']);

        //Update member data
        $member->setFirstName($_SESSION['updtMemData']['fName']);
        $member->setLastName($_SESSION['updtMemData']['lName']);
        $member->setMemberIC($_SESSION['updtMemData']['icNum']);
        $member->setMemberID($_SESSION['updtMemData']['memID']);
        $member->setMemberContact($_SESSION['updtMemData']['contactNo']);
        $member->setMemberEmail($_SESSION['updtMemData']['email']);
        $member->setAcademicYear($_SESSION['updtMemData']['academicYear']);
        $member->setProgramme($programmeService->getProgrammeByID($_SESSION['updtMemData']['progID']));
        $member->setGender($_SESSION['updtMemData']['gender']);
        $member->setFeeStatus($_SESSION['updtMemData']['memFeeStats']);
        $member->setPosition($_SESSION['updtMemData']['position']);

        //Persist updated member object
        $updtMemStatus = $memberService->updateMember($member);
        if ($updtMemStatus === true) {
            $_SESSION['updtMemStatus'] = 1;
        } elseif ($updtMemStatus === false) {
            $_SESSION['updtMemStatus'] = 0;
        }
        header("Location: ../../admin/updateMember.php?studID=".$member->getMemberID());
    }
} else {
    header("Location: ../../index.php");
    exit();
}