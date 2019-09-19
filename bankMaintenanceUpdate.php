<?php include("db.php"); ?>

<?php
$txtBankCode = $txtBankName = $msg = $msger = "";
$Bank_Code_err = $Bank_Name_err = "";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_bank WHERE tblBankID='" . $_GET['id'] . "'";
    $bank_data = $con->query($sql);

    if ($bank_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($bank_data);
        $txtBankCode = $row['Bank_Code'];
        $txtBankName = $row['Bank_Name'];
        $txtBankStatus = $row['flag'];


    }
}

if (isset($_GET["idStatus"])) {

    $sql = "UPDATE tbl_bank SET flag='" . "INACTIVE" . "'WHERE tblBankID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactived";
        header("Location:bankMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_GET["idStatus1"])) {

    $sql = "UPDATE tbl_bank SET flag='" . "ACTIVE" . "'WHERE tblBankID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:bankMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_POST["btnSubmit"])) {

    $Bank_Code = $_POST["v_Bank_Code"];
    $Bank_Name = $_POST["v_Bank_Name"];
// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if (empty($Bank_Code)) {
        $Bank_Code_err = "Bank code is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\,\/]+$/", $Bank_Code)) {

        $Bank_Code_err ='Invalid Bank Code (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else {
        $Bank_Code = $_POST["v_Bank_Code"];
    }

    if (empty($Bank_Name)) {
        $Bank_Name_err = "Bank name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\,\'\/]+$/", $Bank_Name)) {

        $Bank_Name_err = 'Invalid Bank Name (eg." |;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else {
        $Bank_Name = $_POST["v_Bank_Name"];
    }

    if (empty($Bank_Code_err) && empty($Bank_Name_err)) {

        $stmt = $con->prepare("UPDATE tbl_bank SET Bank_Code=?,Bank_Name=? WHERE tblBankID =? ");

        $stmt->bind_param("sss", $_POST["v_Bank_Code"] , $_POST["v_Bank_Name"] , $_GET["id"]);

        $stmt->execute();

        $stmt->close();
        $con->close();
        header("Location:bankMaintenance.php");



    }
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Bank Update</title>
    <?php include("header.php") ?>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>Bank Maintenance</h2>
    </center>
</div>


<!-- Add Bank -->
<center>
    <form class="form-horizontal" method="post" action="#">


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h4>Bank Details</h4>
                    </div>
                    <div class="panel-body">

                        <?php if (!empty($error)) { ?>
                            <?php echo $error; ?><?php } ?>


                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Bank Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Bank_Code"
                                       id="v_Bank_Code"
                                       placeholder="Enter Bank Short Name" onblur="this.value=this.value.toUpperCase()" style="text-transform: uppercase;" value="<?php echo $txtBankCode; ?>" >

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Bank_Code_err; ?></span>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Bank Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Bank_Name"
                                       id="v_Bank_Name"
                                       placeholder="Bank Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtBankName;?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Bank_Name_err; ?></span>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <br> <br>
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
                <br>
                <?php if (isset($_POST["btnSubmit"])) { ?>

                    <?php if (!empty($msg)) { ?>
                        <div class="col-md-12 alert alert-success" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($msger)) { ?>
                        <div class="col-md-12 alert alert-danger" role="alert">
                            <?php echo $msger ?>
                        </div>
                    <?php } ?>

                <?php } ?>
            </div>
    </form>
</center>


</body>
</html>