<?php
/**
 * User: StarmanW
 * Date: 06-Feb-18
 * Time: 2:19 PM
 */

//Function to validate non-empty data
function validateEmptyData($registerMemData) {
    $nonEmptyData = false;

    $emptyDataErrMsg = array(
        'fName' => "Please enter the first name fields.",
        'lName' => "Please enter the last name fields.",
        'icNum' => "Please enter the IC number fields.",
        'memID' => "Please enter the member ID fields.",
        'contactNo' => "Please enter the contact number fields.",
        'email' => "Please enter the email fields.",
        'progID' => "Please select the programme.",
        'academicYear' => "Please select the academic year.",
        'gender' => "Please select the gender.",
        'memFeeStats' => "Please select the fee status.",
        'position' => "Please select the position."
    );

    if ($registerMemData['fName'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['fName'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['lName'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['lName'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['icNum'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['icNum'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['memID'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['memID'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['contactNo'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['contactNo'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['email'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['email'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['progID'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['progID'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['academicYear'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['academicYear'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['gender'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['gender'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['memFeeStats'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['memFeeStats'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else if ($registerMemData['position'] === '') {
        $_SESSION['emptyRegMemMsg'] = $emptyDataErrMsg['position'];
        header('Location: ../../admin/member/registerMember.php?empty');
    } else {
        $nonEmptyData = true;
    }

    return $nonEmptyData;
}

//Function to validate data
function validateData($registerMemData) {
    $validData = false;

    $invalidDataErrMsg = array(
        'fName' => "Invalid first name format, please ensure the correct format is entered.",
        'lName' => "Invalid last name format, please ensure the correct format is entered.",
        'icNum' => "Invalid IC number, please ensure the correct format is entered.",
        'memID' => "Invalid Member ID, please ensure the correct format is entered.",
        'contactNo' => "Invalid contact number, please ensure the correct format is entered.",
        'email' => "Invalid email, please ensure the correct email format is entered.",
        'progID' => "Invalid programme, please ensure the correct programme is selected.",
        'academicYear' => "Invalid academic year, please ensure the correct academic year is selected.",
        'gender' => "Invalid gender, please ensure the correct gender is selected.",
        'memFeeStats' => "Invalid member fee status, please ensure the correct member fee status is selected.",
        'position' => "Invalid position, please ensure the correct position is selected."
    );

    if (!preg_match("/^[a-zA-z\-@ ]{2,}$/", $registerMemData['fName'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['fName'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^[a-zA-z\-@ ]{2,}$/", $registerMemData['lName'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['lName'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^\d{12}$/", $registerMemData['icNum'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['icNum'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^\d{2}[A-Z]{3}\d{5}$/", $registerMemData['memID'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['memID'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/([0-9]|[0-9\-]){3,20}/", $registerMemData['contactNo'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['contactNo'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/", $registerMemData['email'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['email'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^(DIA|DHM|DBU|DMK|DAC)$/", $registerMemData['progID'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['progID'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^20\d{2}\/20\d{2}$/", $registerMemData['academicYear'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['academicYear'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^(M|F)$/", $registerMemData['gender'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['gender'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^(true|false)$/", $registerMemData['memFeeStats'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['memFeeStats'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else if (!preg_match("/^[1-5]{1}$/", $registerMemData['position'])) {
        $_SESSION['invalidRegMemMsg'] = $invalidDataErrMsg['position'];
        header('Location: ../../admin/member/registerMember.php?invalid');
    } else {
        $validData = true;
    }

    return $validData;
}
