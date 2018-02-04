<?php
    $pageTitle = "Collaborator List";
    include "../templates/header.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClubV2/application/includes/service/CollaboratorService.php";
    $collaborators = new CollaboratorService();
    $collaborators = $collaborators->getAllCollaborators();
?>
<section class="section-table cid-qEChLAALjA mbr-parallax-background" id="table1-z" data-rv-view="3793">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container container-table">
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-1"><br><strong>Collaborator List</strong><strong><br></strong></h2>
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
                                <th class="head-item mbr-fonts-style display-7">Collaborator ID</th>
                                <th class="head-item mbr-fonts-style display-7">Collaborator Name</th>
                                <th class="head-item mbr-fonts-style display-7">Collaborator Type</th>
                                <th class="head-item mbr-fonts-style display-7">Contact No.</th>
                                <th class="head-item mbr-fonts-style display-7">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            for ($i = 0; $i < sizeof($collaborators); $i++):?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $collaborators[$i]->getCollabID()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $collaborators[$i]->getCollabName()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $collaborators[$i]->getCollabTypeString()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $collaborators[$i]->getCollabContact()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $collaborators[$i]->getCollabEmail()?></td>
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

