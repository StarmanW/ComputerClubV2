<?php
$pageTitle = "Delete Member " . $_GET['studID'];
include "../templates/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/service/MemberService.php";
$members = new MemberService();
$members = $members->getMemberByID($_GET['studID']);
$_SESSION['delStudID'] = $_GET['studID'];
?>
<section class="cid-qECj4TnJzd mbr-fullscreen mbr-parallax-background" id="header2-14" data-rv-view="3093">
    <div class="container align-center">
        <br />
        <br />
        <div class="form-container">
            <h1 class="well">
                <?php if (isset($_SESSION['delMemStatus'])):?>
                Deletion Status
                <?php else:?>
                Confirm Delete Member <?php echo $_GET['studID']?>
                <?php endif;?>
            </h1>
            <hr style="border-top:1px solid gray;" />

            <div class="col-lg-12 well">
                <div class="row">
                    <?php if (isset($_SESSION['delMemStatus'])):?>
                    <div class="row" style="margin:auto">
                    <?php if ($_SESSION['delMemStatus'] === 1):?>
                        <h5>Member <?php echo $_GET['studID']?> has been successfully deleted.</h5>
                    <?php elseif ($_SESSION['delMemStatus'] === 0):?>
                        <h5>An error has occurred while deleting <?php echo $_GET['studID']?><br />
                    <?php endif;?>
                    </div>
                    <br />
                    <div class="submit-button">
                        <a href="memberList.php"><button type="button" class="btn btn-lg btn-info">Back to list</button></a>
                    </div>
                    <?php else:?>
                        <form method="post" action="../includes/controller/deleteMember.php">
                            <div class="row" style="margin: auto">
                                <h5>Confirm delete member <?php echo $_GET['studID'] . ' (' . $members->getFullName() . ')'?> details?
                                    <br/><br/><span style="color:red">*Please note that this action cannot be undone.</span></h5>
                                <div class="submit-button">
                                    <button type="submit" name="deleteMem" class="btn btn-lg btn-info">Confirm Delete</button>
                                    <a href="memberList.php"><button type="button" class="btn btn-lg btn-info">Back</button></a>
                                </div>
                            </div>
                            <br />
                        </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "../templates/footer.php";
unset($_SESSION['delMemStatus']);
?>

