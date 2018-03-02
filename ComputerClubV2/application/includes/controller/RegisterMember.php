<?php
/**
 * User: StarmanW
 * Date: 06-Feb-18
 * Time: 1:29 AM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/includes/service/MemberService.php';
require $_SERVER['DOCUMENT_ROOT'] . "/includes/service/ProgrammeService.php";
require $_SERVER['DOCUMENT_ROOT'] . '/includes/service/PasswordHandler.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/utility/memberUtil.php';

//TODO - Add login session check once finished
if (isset($_POST['submitRegMem'])) {
    session_name("xg-ai");
    session_start();

    //Get all data and set it into a session
    $_SESSION['regMemData'] = array(
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

    $nonEmptyData = validateEmptyData($_SESSION['regMemData'], "registerMember");
    $validData = validateData($_SESSION['regMemData'], "registerMember");

    if ($nonEmptyData === true and $validData === true) {
        //Creating objects requried for operation
        $memberService = new MemberService();
        $programmeService = new ProgrammeService();
        $member = new \Entity\Member();
        $passHandler = new PasswordHandler();

        //Set new member data
        $member->setFirstName($_SESSION['regMemData']['fName']);
        $member->setLastName($_SESSION['regMemData']['lName']);
        $member->setMemberIC($_SESSION['regMemData']['icNum']);
        $member->setMemberID($_SESSION['regMemData']['memID']);
        $member->setMemberContact($_SESSION['regMemData']['contactNo']);
        $member->setMemberEmail($_SESSION['regMemData']['email']);
        $member->setAcademicYear($_SESSION['regMemData']['academicYear']);
        $member->setProgramme($programmeService->getProgrammeByID($_SESSION['regMemData']['progID']));
        $member->setGender($_SESSION['regMemData']['gender']);
        $member->setFeeStatus($_SESSION['regMemData']['memFeeStats']);
        $member->setPosition($_SESSION['regMemData']['position']);
        $member->setPassword($passHandler->hashPass($_SESSION['regMemData']['icNum']));

        //Persist new member object
        $regMemStatus = $memberService->createMember($member);
        if ($regMemStatus === true) {
            $_SESSION['regMemStatus'] = 1;
        } elseif ($regMemStatus === -1) {
            $_SESSION['regMemStatus'] = -1;
        } elseif ($regMemStatus === false) {
            $_SESSION['regMemStatus'] = 0;
        }
        header("Location: ../../admin/registerMember.php");
    }
} else {
    header("Location: ../../index.php");
    exit();
}
