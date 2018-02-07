<?php
    //TODO - Remove once finished
    if (!preg_match("/^index.php$/", basename($_SERVER['SCRIPT_NAME']))) {
        //include $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/application/includes/service/sessionCheck.php';
        session_name("xg-ai");
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.5.2, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/ComputerClubV2/application/assets/images/title%20bar%20logo.jpg" type="image/x-icon">
    <meta name="description" content="Main login page">
    <title><?php if (isset($pageTitle) and $pageTitle !== null) {
            echo $pageTitle;
        } else {
            echo "Computer Club";
        } ?>
    </title>

    <link rel="stylesheet" href="/ComputerClubV2/application/assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/tether/tether.min.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/datatables/data-tables.bootstrap4.min.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/theme/css/style.css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/css/hoverImage.css" type="text/css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/css/editDeleteBtn.css" type="text/css">
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/css/registerForm.css" type="text/css">
    <?php if (preg_match("/^index.php$/", basename($_SERVER['SCRIPT_NAME']))):?>
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/css/login.css" type="text/css">
    <?php elseif (preg_match("/^(list.*|.*List)\.php$/", basename($_SERVER['SCRIPT_NAME']))):?>
    <link rel="stylesheet" href="/ComputerClubV2/application/assets/css/lists.css" type="text/css">
    <?php endif;?>
</head>

<body>
<section class="menu cid-qDNS0J8sKR" once="menu" id="menu1-k" data-rv-view="2425">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-logo">
            <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="<?php if (basename($_SERVER["SCRIPT_NAME"]) === 'index.php') {
                                echo "index.php";
                            } else {
                                echo "homepage.php";
                            } ?>">
                                <img src="/ComputerClubV2/application/assets/images/logo-1-3508x2480.jpg" title="" media-simple="true" style="height: 4.5rem;">
                            </a>
                        </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="
                        <?php if (basename($_SERVER["SCRIPT_NAME"]) === 'index.php') {
                             echo "index.php";
                         } else {
                             echo "homepage.php";
                         } ?>">
                        COMPUTER CLUB
                    </a>
                </span>
            </div>
        </div>

        <?php if (isset($_SESSION['uRights']) and $_SESSION['uRights'] === 0):?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-white display-4" data-toggle="dropdown-submenu" aria-expanded="false">LIST</a>
                    <div class="dropdown-menu"><a class="dropdown-item text-white display-4" href="memberList.php">MEMBERS LIST</a><a class="dropdown-item text-white display-4" href="eventList.php">EVENTS LIST</a><a class="dropdown-item text-white display-4" href="collaboratorList.php">COLLABORATORS LIST</a><a class="dropdown-item text-white display-4" href="sponsoredItemList.php">SPONSORED ITEMS LIST</a></div>
                </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-4" href="../includes/controller/logout.php">
                    <span class="mbrib-lock mbr-iconfont mbr-iconfont-btn"></span>
                    LOGOUT
                </a>
            </div>
        </div>
        <?php elseif (isset($_SESSION['uRights']) and $_SESSION['uRights'] === 1):?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item dropdown open"><a class="nav-link link text-white dropdown-toggle display-4" aria-expanded="true" data-toggle="dropdown-submenu">REGISTER</a>
                    <div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="registerMember.php" aria-expanded="false">MEMBER</a><a class="text-white dropdown-item display-4" href="registerEvent.php" aria-expanded="false">EVENT</a></div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-white display-4" data-toggle="dropdown-submenu" aria-expanded="false">MANAGE</a>
                    <div class="dropdown-menu"><a class="dropdown-item text-white display-4" href="memberList.php">MEMBERS</a><a class="dropdown-item text-white display-4" href="eventList.php">EVENTS</a><a class="dropdown-item text-white display-4" href="collaboratorList.php">COLLABORATORS</a><a class="dropdown-item text-white display-4" href="sponsoredItemList.php">SPONSORED ITEMS</a></div>
                </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn">
                <form method="POST" action="../includes/controller/logout.php">
                    <button type="submit" class="btn btn-sm btn-primary display-4">
                        <span class="mbrib-lock mbr-iconfont mbr-iconfont-btn"></span>
                        LOGOUT
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </nav>
</section>