<?php
    if (!isset($_SESSION['loggedIn']) or empty($_SESSION['loggedIn'])) {
        header("Location: /ComputerClubV2/application/index.php");
        exit();
    }
?>