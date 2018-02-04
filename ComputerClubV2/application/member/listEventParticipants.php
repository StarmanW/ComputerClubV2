<?php
$pageTitle = "Participant List for " . $_GET['e'];
include "../templates/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClub/application/includes/service/EventParticipantService.php";
//$eventCollabs = new EventCollaboratorService();
//$eventCollabs = $eventCollabs->getCollabByEventID($_GET['e']);
?>
<section class="section-table cid-qEC8mwEb5q mbr-parallax-background" id="table1-t" data-rv-view="4052">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container container-table">
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-1"><br><strong>Participant List for <?php echo $_GET['e']?></strong><strong><br></strong></h2>
        <div class="table-backpanel">
            <div class="table-wrapper">
                <div class="container">
                    <div class="row search">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="dataTables_filter">
                                <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                                <input class="form-control input-sm" disabled="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container scroll">
                    <table class="table isSearch" cellspacing="0">
                        <thead>
                        <tr class="table-heads ">
                            <th class="head-item mbr-fonts-style display-7">Name</th>
                            <th class="head-item mbr-fonts-style display-7">Member ID</th>
                            <th class="head-item mbr-fonts-style display-7">Position</th>
                            <th class="head-item mbr-fonts-style display-7">Gender</th>
                            <th class="head-item mbr-fonts-style display-7">Academic Year</th>
                            <th class="head-item mbr-fonts-style display-7">Programme</th>
                        </tr>
                        </thead>
                        <tbody>
<!--                        --><?php //for ($i = 0; $i < sizeof($eventCollabs); $i++): ?>
<!--                            <tr>-->
<!--                                <td class="body-item mbr-fonts-style display-7">--><?php //echo $eventCollabs[$i]->getCollaborator()->getCollabID(); ?><!--</td>-->
<!--                                <td class="body-item mbr-fonts-style display-7">--><?php //echo $eventCollabs[$i]->getCollaborator()->getCollabName(); ?><!--</td>-->
<!--                                <td class="body-item mbr-fonts-style display-7">--><?php //echo $eventCollabs[$i]->getCollaborator()->getCollabTypeString(); ?><!--</td>-->
<!--                                <td class="body-item mbr-fonts-style display-7">--><?php //echo $eventCollabs[$i]->getCollaborator()->getCollabContact(); ?><!--</td>-->
<!--                                <td class="body-item mbr-fonts-style display-7">--><?php //echo $eventCollabs[$i]->getCollaborator()->getCollabEmail(); ?><!--</td>-->
<!--                            </tr>-->
<!--                        --><?php //endfor; ?>
                        </tbody>
                    </table>
                </div>
                <div class="container table-info-container">
                    <div class="row info">
                        <div class="col-md-6">
                            <div class="dataTables_info mbr-fonts-style display-7">
                                <span class="infoBefore">Showing</span>
                                <span class="inactive infoRows"></span>
                                <span class="infoAfter">entries</span>
                                <span class="infoFilteredBefore">(filtered from</span>
                                <span class="inactive infoRows"></span>
                                <span class="infoFilteredAfter">total entries)</span>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin:auto; width:120px;">
                <a href="eventInfo.php?e=<?php echo $_GET['e']?>"><button type="button" class="btn btn-sm btn-primary">Back</button></a>
            </div>
        </div>
    </div>
</section>
<?php include "../templates/footer.php"; ?>
