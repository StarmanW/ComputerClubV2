<?php
    $pageTitle = "Login";
    include "header.php";
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
                <label for="username">Username</label>
                <br/>
                <input type="text" name="username" id="username">
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" name="password" id="password">
                <br/>
                <button type="submit" name="login">Login</button>
                <br/>
            </form>
        </div>
    </div>
</section>
</section>
<?php include "footer.php"; ?>