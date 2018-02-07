<?php
/**
 * User: StarmanW
 * Date: 07-Feb-18
 * Time: 4:13 PM
 */

session_name("xg-ui");
session_start();

if (isset($_SESSION['loggedIn']) and isset($_SESSION['uRights']) and isset($_SESSION['uAgent'])) {
    $uRights = $_SESSION['uRights'];
    $_SESSION = array();
    session_destroy();
    if ($uRights === 0) {
        header("Location: ../index.php");
        exit();
    } elseif ($uRights === 1) {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../../index.php");
    exit();
}

