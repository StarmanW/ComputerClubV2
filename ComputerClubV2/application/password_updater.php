<?php
/**
 * User: StarmanW
 * Date: 13-Feb-18
 * Time: 1:23 AM
 */

include $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/MemberService.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/PasswordHandler.php';

$memberService = new MemberService();
$passHandler = new PasswordHandler();
$members = $memberService->getAllMembers();

for ($i = 0; $i < sizeof($members); $i++) {
    $members[$i]->setPassword($passHandler->hashPass($members[$i]->getMemberIC()));
    echo $members[$i]->getPassword();
    $memberService->updateMember($members[$i]);
    echo "<br>";
}
