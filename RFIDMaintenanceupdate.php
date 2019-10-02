<?php include("db.php"); ?>

<?php
$txtBankCode = $txtBankName = $msg = $msger = "";
$Bank_Code_err = $Bank_Name_err = "";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_rfid WHERE tblBankID='" . $_GET['id'] . "'";
    $bank_data = $con->query($sql);

    if ($bank_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($bank_data);
        $txtBankCode = $row['Bank_Code'];
        $txtBankName = $row['Bank_Name'];
        $txtBankStatus = $row['flag'];


    }
}

if (isset($_GET["idStatus"])) {

    $sql = "UPDATE tbl_rfid SET flag='" . "DIACTIVE" . "'WHERE tblrfidID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully diactived";
        header("Location:RFIDMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_GET["idStatus1"])) {

    $sql = "UPDATE tbl_rfid SET flag='" . "INACTIVE" . "'WHERE tblrfidID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:RFIDMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


?>