<?php
    $pageTitle = "Event List";
    include "header.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClub/application/includes/service/EventService.php";
    $events = new EventService();
    $events = $events->getAllEvents();
?>
<section class="section-table cid-qECfQou8Ns mbr-parallax-background" id="table1-w" data-rv-view="3875">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container container-table">
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-1"><br><strong>Event List</strong><strong><br></strong></h2>
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
                            <th class="head-item mbr-fonts-style display-7">Event ID</th>
                            <th class="head-item mbr-fonts-style display-7">Event Name</th>
                            <th class="head-item mbr-fonts-style display-7">Event Category</th>
                            <th class="head-item mbr-fonts-style display-7">Event Date</th>
                            <th class="head-item mbr-fonts-style display-7">Event Time</th>
                            <th class="head-item mbr-fonts-style display-7">Event Location</th>
                            <th class="head-item mbr-fonts-style display-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($events); $i++):?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventID()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventName()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventTypeString()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventDate()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventStartTime().' - '.$events[$i]->getEventEndTime()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $events[$i]->getEventLocation()?></td>
                                <td class="body-item mbr-fonts-style display-7">
                                    <a href="eventInfo.php?eventID=<?php echo $events[$i]->getEventID()?>"><button type="button" name="edit" class="edit-button"><img src="../assets/images/info.svg" /></button></a>
                                </td>
                            </tr>
                        <?php endfor; ?>
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
        </div>
    </div>
</section>
<?php include "../templates/footer.php"; ?>

