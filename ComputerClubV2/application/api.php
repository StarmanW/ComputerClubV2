<?php
header("Content-Type: application/json; charset=UTF-8");
include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClubV2/application/includes/service/MemberService.php";
$members = new MemberService();
$members = $members->getAllMembers();
$membersArr = array();
for ($i = 0; $i < sizeof($members); $i++) {
    $membersArr[$i] = array(
        'memberID' => $members[$i]->getMemberID(),
        'name' => $members[$i]->getFirstName() . ' ' . $members[$i]->getLastName(),
        'gender' => $members[$i]->getGender(),
        'programme' => $members[$i]->getProgramme()->getProgID(),
        'email' => $members[$i]->getMemberEmail(),
        'position' => $members[$i]->getPositionString(),
        'academicYear' => $members[$i]->getAcademicYear(),
    );
}
echo json_encode($membersArr, JSON_PRETTY_PRINT);

