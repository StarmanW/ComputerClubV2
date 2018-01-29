<?php
    $pageTitle = "Event List";
    include "header.php";

?>
<section class="cid-qEH6htC0aL mbr-fullscreen mbr-parallax-background" id="header2-19" data-rv-view="3101">
    <div class="container align-center">
        <br />
        <br />
        <div class="form-container">
            <h1 class="well">Information for Event <?php echo $_GET['eventID']?></h1>

            <hr style="border-top:1px solid gray;" />
            <div class="col-lg-12 well" style="margin:auto; width:90%;">
                <div class="row">
                    <div class="form-group" style=" margin: auto; width: 60%">
                        <a href="listEventCollaborators.php?eventID=<%=event.getEventID()%>"><button type="button" class="btn btn-sm btn-primary">List Collaborators</button></a>
                        <a href="listEventSponsoredItems.php?eventID=<%=event.getEventID()%>"><button type="button" class="btn btn-sm btn-primary">List Sponsored Items</button></a>
                        <a href="listEventParticipants.php?eventID=<%=event.getEventID()%>"><button type="button" class="btn btn-sm btn-primary">List Participants</button></a>
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
    <!-- /.container -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
</section>
<?php include "../templates/footer.php"; ?>
