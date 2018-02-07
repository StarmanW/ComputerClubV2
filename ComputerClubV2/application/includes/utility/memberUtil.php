<?php
/**
 * User: StarmanW
 * Date: 06-Feb-18
 * Time: 2:19 PM
 */

//Function to validate non-empty data
function validateEmptyData($registerMemData, $pageURL) {
    $nonEmptyData = false;
    $emptyMsg = true;

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
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['fName'];
    } else if ($registerMemData['lName'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['lName'];
    } else if ($registerMemData['icNum'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['icNum'];
    } else if ($registerMemData['memID'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['memID'];
    } else if ($registerMemData['contactNo'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['contactNo'];
    } else if ($registerMemData['email'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['email'];
    } else if ($registerMemData['progID'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['progID'];
    } else if ($registerMemData['academicYear'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['academicYear'];
    } else if ($registerMemData['gender'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['gender'];
    } else if ($registerMemData['memFeeStats'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['memFeeStats'];
    } else if ($registerMemData['position'] === '') {
        $_SESSION['emptyMemMsg'] = $emptyDataErrMsg['position'];
    } else {
        $emptyMsg = false;
        $nonEmptyData = true;
    }

    if ($nonEmptyData === false and $emptyMsg === true) {
        header('Location: ../../admin/member/' . $pageURL . '.php');
    }

    return $nonEmptyData;
}

//Function to validate data
function validateData($registerMemData, $pageURL) {
    $validData = false;
    $invalidMsg = true;

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
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['fName'];
    } else if (!preg_match("/^[a-zA-z\-@ ]{2,}$/", $registerMemData['lName'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['lName'];
    } else if (!preg_match("/^\d{12}$/", $registerMemData['icNum'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['icNum'];
    } else if (!preg_match("/^\d{2}[A-Z]{3}\d{5}$/", $registerMemData['memID'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['memID'];
    } else if (!preg_match("/([0-9]|[0-9\-]){3,20}/", $registerMemData['contactNo'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['contactNo'];
    } else if (!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/", $registerMemData['email'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['email'];
    } else if (!preg_match("/^(DIA|DHM|DBU|DMK|DAC)$/", $registerMemData['progID'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['progID'];
    } else if (!preg_match("/^20\d{2}\/20\d{2}$/", $registerMemData['academicYear'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['academicYear'];
    } else if (!preg_match("/^(M|F)$/", $registerMemData['gender'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['gender'];
    } else if (!preg_match("/^(true|false)$/", $registerMemData['memFeeStats'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['memFeeStats'];
    } else if (!preg_match("/^[1-5]{1}$/", $registerMemData['position'])) {
        $_SESSION['invalidMemMsg'] = $invalidDataErrMsg['position'];
    } else {
        $invalidMsg = false;
        $validData = true;
    }

    if ($validData === false and $invalidMsg === true) {
        header('Location: ../../admin/member/' . $pageURL . '.php');
    }

    return $validData;
}
