<?php
    $pageTitle = "Register Member";
    include "../../templates/header.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClubV2/application/includes/service/ProgrammeService.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/ComputerClubV2/application/includes/service/MemberService.php";
    $programmeService = new ProgrammeService();
    $memberService = new MemberService();
    $programmes = $programmeService->getAllProgrammes();
    $member = $memberService->getMemberByID($_GET['studID']);
?>
<section class="cid-qECj4TnJzd mbr-fullscreen mbr-parallax-background" id="header2-14" data-rv-view="3093">
    <div class="container align-center">
        <br />
        <br />
        <div class="form-container">
            <h1 class="well">Update Member <?php $_GET['studID']?> Details</h1>
            <hr style="border-top:1px solid gray;" />
            <div class="col-lg-12 well">
                <div class="row">
                    <form method="post" action="../../includes/controller/updateMember.php">
                        <p style="color:red; float: left;">"*" Required fields</p>
                        <br />
                        <br />
                        <?php if (isset($_SESSION['invalidMemMsg'])): ?>
                        <p style="color:red"><?php echo $_SESSION['invalidMemMsg']?></p>
                        <?php elseif (isset($_SESSION['emptyMemMsg'])): ?>
                        <p style="color:red"><?php echo $_SESSION['emptyMemMsg']?></p>
                        <?php endif; ?>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>First Name</label>
                                    <input type="text" name="fName" value="<?php echo $member->getFirstName();?>" placeholder="John" class="form-control" pattern="[A-Za-z\-@ ]{2,}" title="Alphabetic, @ and - symbols only. E.g. - John" required="required">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Last Name</label>
                                    <input type="text" name="lName" value="<?php echo $member->getLastName();?>" placeholder="Doe" class="form-control" pattern="[A-Za-z\-@ ]{2,}" title="Alphabetic, @ and - symbols only. E.g. - Smith" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>IC Number</label>
                                    <input type="text" name="icNum" value="<?php echo $member->getMemberIC();?>" placeholder="981213125523" class="form-control" pattern="\d{12}" maxlength="12" title="Numeric only. E.g. 985564127789" required="required">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Member ID</label>
                                    <input type="text" name="memID" value="<?php echo $member->getMemberID();?>" placeholder="16SMD00990" class="form-control" pattern="^\d{2}[A-Z]{3}\d{5}$" title="E.g. 16SMD00990" maxlength="10" required="required" onkeyup="memIDUpperCase();">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Contact Number</label>
                                    <input type="text" name="contactNo" value="<?php echo $member->getMemberContact();?>" placeholder="0195421325" class="form-control" pattern="([0-9]|[0-9\-]){3,20}" maxlength="20" title="Numeric and '-' symbols only. E.g. 014-8897875" required="required">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Email</label>
                                    <input type="email" name="email" value="<?php echo $member->getMemberEmail();?>" placeholder="email@hotmail.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="E.g. - cisco@business.co.uk" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Programme ID</label>
                                    <select name="progID" class="form-control" required="required">
                                        <option disabled selected value>Select programme ID</option>
                                        <?php for ($i = 0; $i < sizeof($programmes); $i++):?>
                                            <option value="<?php echo $programmes[$i]->getProgID() ?>" <?php if ($member->getProgramme()->getProgID() === $programmes[$i]->getProgID())  echo "selected" ?>><?php echo $programmes[$i]->getProgID() ?></option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Academic Year</label>
                                    <select name="academicYear" class="form-control" required="required">
                                        <option disabled selected value>Select academic year</option>
                                        <?php
                                        $year = date('Y');
                                        for ($i = 0; $i < 5; $i++):
                                            if ($i == 0):
                                                ?>
                                                <option value="<?php echo $year - 2 ?>/<?php echo $year - 1 ?>" <?php if ($member->getAcademicYear() === ($year-2).'/'.($year-1)) echo "selected" ?>><?php echo $year - 2 ?>/<?php echo $year - 1 ?></option>
                                            <?php elseif ($i == 1): ?>
                                                <option value="<?php echo $year - 1 ?>/<?php echo $year ?>" <?php if ($member->getAcademicYear() === ($year-1).'/'.($year)) echo "selected" ?>><?php echo $year - 1 ?>/<?php echo $year ?></option>
                                            <?php elseif ($i == 2): ?>
                                                <option value="<?php echo $year ?>/<?php echo $year + 1 ?>" <?php if ($member->getAcademicYear() === ($year).'/'.($year+1)) echo "selected" ?>><?php echo $year ?>/<?php echo $year + 1 ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $year + $i - 2 ?>/<?php echo $year + $i - 1 ?>" <?php if ($member->getAcademicYear() === ($year+$i-2).'/'.($year-1)) echo "selected" ?>><?php echo $year + $i - 2 ?>/<?php echo $year + $i - 1 ?></option>
                                            <?php endif; endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Gender:</label>
                                    <br/>
                                    <input type="radio" name="gender" value="M" required="required" <?php if ($member->getGender() === "M") echo "checked"?>> Male &nbsp;
                                    <input type="radio" name="gender" value="F" <?php if ($member->getGender() === "F") echo "checked"?>> Female
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label><span style="color:red;">*</span>Membership Fee Status:</label>
                                    <br/>
                                    <input type="radio" name="memFeeStats" value="false" required="required" <?php if ($member->getFeeStatus() === "Pending") echo "checked"?>> Pending &nbsp;
                                    <input type="radio" name="memFeeStats" value="true" <?php if ($member->getFeeStatus() === "Paid") echo "checked"?>> Paid
                                </div>
                            </div>
                            <div class="row" style="margin:auto">
                                <label><span style="color:red;">*</span>Position</label>
                                <select name="position" class="form-control" required="required">
                                    <option disabled selected value>Select member position</option>
                                    <option value="5" <?php if ($member->getPosition() === 5) echo "selected" ?>>President</option>
                                    <option value="4" <?php if ($member->getPosition() === 4) echo "selected" ?>>Vice President</option>
                                    <option value="3" <?php if ($member->getPosition() === 3) echo "selected" ?>>Secretary</option>
                                    <option value="2" <?php if ($member->getPosition() === 2) echo "selected" ?>>Treasurer</option>
                                    <option value="1" <?php if ($member->getPosition() === 1) echo "selected" ?>>Member</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="submit-button">
                            <button type="submit" name="submitUpdtMem" class="btn btn-lg btn-info">Submit</button>
                            <button type="reset" name="reset" class="btn btn-lg btn-info" onclick="$(':input').val(''); return false;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../assets/js/upperCase.js"></script>
<?php
    if (isset($_SESSION['$updtMemStatus']) and $_SESSION['$updtMemStatus'] === 1) {
        echo "<script>" . "window.alert('Member details successfully updated!')" . "</script>";
    } else if (isset($_SESSION['$updtMemStatus']) and $_SESSION['$updtMemStatus'] === 0) {
        echo "<script>" . "window.alert('Oh no! An error has occurred, please contact the system administrator.')" . "</script>";
    }
    unset($_SESSION['$updtMemStatus']);
    unset($_SESSION['updtMemData']);
    unset($_SESSION['emptyMemMsg']);
    unset($_SESSION['invalidMemMsg']);
    include "../../templates/footer.php";
?>