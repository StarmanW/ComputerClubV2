<?php
    $pageTitle = "Event List";
    include "../templates/header.php";
    if (!isset($_GET['e']) or !preg_match("/^E\d{4}$/", $_GET['e'])) {
        header("Location: eventList.php");
        exit();
    }
?>
<section class="cid-qEH6htC0aL mbr-fullscreen mbr-parallax-background" id="header2-19" data-rv-view="3101">
    <div class="container align-center">
        <br />
        <br />
        <div class="form-container">
            <h1 class="well">Information for Event <?php echo $_GET['e']?></h1>

            <hr style="border-top:1px solid gray;" />
            <div class="col-lg-12 well" style="margin:auto; width:90%;">
                <div class="row">
                    <div class="form-group" style=" margin: auto; width: 60%">
                        <a href="listEventCollaborators.php?e=<?php echo $_GET['e']?>"><button type="button" class="btn btn-sm btn-primary">List Collaborators</button></a>
                        <a href="listEventSponsoredItems.php?e=<?php echo $_GET['e']?>"><button type="button" class="btn btn-sm btn-primary">List Sponsored Items</button></a>
                        <a href="listEventParticipants.php?e=<?php echo $_GET['e']?>"><button type="button" class="btn btn-sm btn-primary">List Participants</button></a>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <a href="eventList.php"><button type="button" class="btn btn-lg btn-info">Back</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php include "../templates/footer.php"; ?>
