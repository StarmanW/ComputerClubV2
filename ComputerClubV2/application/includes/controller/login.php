<?php
/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 9:13 PM
 */

include $_SERVER['DOCUMENT_ROOT'] . '/includes/service/MemberService.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/service/PasswordHandler.php';

if (isset($_POST['submitLgn']) and isset($_POST['password']) and isset($_POST['userID'])) {
    //Validate empty fields
    if (empty($_POST['password']) or empty($_POST['userID'])) {
        header("Location: ../../index.php?empty");
    } else {
        //Creating objects required for verification
        $memberService = new MemberService();
        $passHandler = new PasswordHandler();

        //Get member by ID entered
        $member = $memberService->getMemberByID($_POST['userID']);
        if ($member === 0) {
            header("Location: ../../index.php?invalid");
            exit();
        } elseif ($member->getMemberID() === $_POST['userID'] && $passHandler->verifyPass($_POST['password'], $member->getPassword()) === true) {
            //Set sessions
            session_name("xg-ai");
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['uAgent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['uName'] = $member->getFirstName();

            if ($member->getPosition() === 1) {
                $_SESSION['uRights'] = 0;   //Member
                header("Location: ../../member/homepage.php");
                exit();
            } else if ($member->getPosition() > 1 and $member->getPosition() <= 5) {
                $_SESSION['uRights'] = 1;   //Exco-member
                header("Location: ../../admin/homepage.php");
                exit();
            }
        }
    }
} else {
    header("Location: ../../index.php");
}