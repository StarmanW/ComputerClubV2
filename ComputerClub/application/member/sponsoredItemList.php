<?php
    $pageTitle = "Sponsored Item List";
    include "header.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClub/application/includes/service/ItemService.php";
    $items = new ItemService();
    $items = $items->getAllItems();
?>
<section class="section-table cid-qFp8UAA2m0 mbr-parallax-background" id="table1-1f" data-rv-view="1776">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container container-table">
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-1"><br><strong>SponsoreD List</strong><strong><br></strong></h2>
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
                                <th class="head-item mbr-fonts-style display-7">Item ID</th>
                                <th class="head-item mbr-fonts-style display-7">Item Name</th>
                                <th class="head-item mbr-fonts-style display-7">Item Quantity</th>
                                <th class="head-item mbr-fonts-style display-7">Item Type</th>
                                <th class="head-item mbr-fonts-style display-7">Sponsored By</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($items); $i++):?>
                            <tr>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $items[$i]->getItemID()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $items[$i]->getItemName()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $items[$i]->getQuantity()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $items[$i]->getItemTypeString()?></td>
                                <td class="body-item mbr-fonts-style display-7"><?php echo $items[$i]->getCollaborator()?></td>
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

