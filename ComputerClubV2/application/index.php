<?php
    session_name("xg-ai");
    session_start();
    if (isset($_SESSION['loggedIn']) and isset($_SESSION['uRights']) and $_SESSION['uRights'] === 0) {
        header("Location: member/homepage.php");
    } elseif (isset($_SESSION['loggedIn']) and isset($_SESSION['uRights']) and $_SESSION['uRights'] === 1) {
        header("Location: admin/homepage.php");
    } else {
        $pageTitle = "Login";
        include "templates/header.php";
    }
?>
<section class="header8 cid-qEC5OqO45Z mbr-fullscreen mbr-parallax-background" id="header8-p" data-rv-view="11520">
    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2 id="login_header">Log In</h2>
            </div>
            <?php
                if (isset($_GET["invalid"])) {
                    echo "<p><span style=\"color:red;font-weight: bold;font-size: 18px\">Invalid username or password, please try again.</span></p>";
                } else if (isset($_GET["empty"])) {
                    echo "<p><span style=\"color:red;font-weight: bold;font-size: 18px\">Please ensure the fields are not left blank.</span></p>";
                }
            ?>
            <form method="POST" action="includes/controller/login.php">
                <label for="userID">User ID</label>
                <br/>
                <input type="text" name="userID" id="userID" onkeyup="userIDUpperCase();">
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" name="password" id="password">
                <br/>
                <button type="submit" name="submitLgn">Login</button>
                <br/>
            </form>
        </div>
    </div>
</section>
<script src="assets/js/upperCase.js"></script>
<?php include "templates/footer.php"; ?>