<?php
    if (!isset($_SESSION['loggedIn']) or empty($_SESSION['loggedIn'])) {
        header("Location: ../../index.php");
        exit();
    }
?>