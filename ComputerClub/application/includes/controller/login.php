<?php
/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 9:13 PM
 */

if (isset($_POST['login']) and isset($_POST['password']) and isset($_POST['username'])) {

    //Validate empty fields
    if (empty($_POST['password']) or empty($_POST['username'])) {
        header("Location: ../../index.php?empty");
    }
} else {
    header("Location: ../../index.php");
}