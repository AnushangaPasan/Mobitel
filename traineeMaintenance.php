<?php include("db.php"); ?>

<?php
$txtInCode = $txtInName = $txtLocation = $msg = $msger = "";
$InstituteCode_err=$InstituteName_err=$InstituteLoc_err=$contact_err=$designation_err=$Ins_Coordinator_err="";

if (isset($_GET["idStatus"])) {


    $sql = "UPDATE tbl_trainee SET flag='" . "INACTIVE" . "' WHERE Trainee_ID ='" . $_GET["idStatus"] . "' ";
    $sql1 = "UPDATE tbl_rfid SET flag ='" . "INACTIVE" . "' WHERE rfid_user_ID ='" . $_GET["idStatus"] . "' ";
    if (($con->query($sql) === TRUE) AND ($con->query($sql1) === TRUE)) {

        $msg = "Successfully inactived";
        header("Location:rptTraineeUpdateSearch.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}

if (isset($_GET["idStatus1"])) {


    $sql = "UPDATE tbl_trainee SET flag='" . "ACTIVE" . "' WHERE tblTraineeID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:rptTraineeUpdateSearch.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}
