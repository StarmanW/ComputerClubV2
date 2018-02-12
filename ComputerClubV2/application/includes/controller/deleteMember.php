<?php
/**
 * User: StarmanW
 * Date: 07-Feb-18
 * Time: 9:30 PM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/MemberService.php';

//TODO - Add login session check once finished
if (isset($_POST['deleteMem'])) {
    session_name("xg-ai");
    session_start();

    //Creating objects requried for operation
    $studID = $_SESSION['delStudID'];
    $memberService = new MemberService();
    $member = $memberService->getMemberByID($studID);

    //Remove member object and session data
    $delMemStatus = $memberService->deleteMember($member);
    unset($_SESSION['delStudID']);

    if ($delMemStatus === true) {
        $_SESSION['delMemStatus'] = 1;
    } elseif ($delMemStatus === false) {
        $_SESSION['delMemStatus'] = 0;
    }
    header("Location: ../../admin/deleteMember.php?studID=" . $studID);
} else {
    header("Location: ../../index.php");
    exit();
}