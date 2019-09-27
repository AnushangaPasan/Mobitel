<?php include("db.php"); ?>

<?php
$txtInCode = $txtInName = $txtLocation = $msg = $msger = $diviID="";
$DivName_err=$DivHead_err=$DivCon_err=$DivLoc_err=$DivMail_err="";
$DivName=$DivHead=$DivCon=$DivLoc=$DivMail="";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_division WHERE tblDivisionID='" . $_GET['id'] . "' ";
    $divi_data = $con->query($sql);

    if ($divi_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($divi_data);
        $DivName = $row["Name"];
        $DivHead = $row["Division_Head"];
        $DivCon = $row["Contact_Number"];
        $DivMail = $row["Email"];
        $DivLoc = $row["Location"];

    }
}

if (isset($_GET["idStatus"])) {


    $sql = "UPDATE tbl_division SET flag='" . "INACTIVE" . "' WHERE tblDivisionID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactived";
        header("Location:divisionMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}

if (isset($_GET["idStatus1"])) {


    $sql = "UPDATE tbl_division SET flag='" . "ACTIVE" . "' WHERE tblDivisionID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:divisionMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}


if (isset($_POST["btnSubmit"])) {

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    //echo $_POST["v_Institute_Code"];
    $diviID= $_GET["id"];


    // set parameters and execute
     $DivName = $_POST["v_Name"];
     $DivHead = $_POST["v_DiviHead"];
     $DivCon = $_POST["v_Number"];
    $DivMail = $_POST["v_Email"];
    $DivLoc = $_POST["v_Location"];

    $sql="SELECT * FROM `tbl_division` WHERE Name='".$DivName."'";
    $resultSet= $con->query($sql);

   

     if (empty($DivName)) {
                $DivName_err = "Name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $DivName)) {

        $DivName_err ='Invalid Division Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    }else {
         $DivName = $_POST["v_Name"];
    } 


    if (empty($DivHead)) {
                $DivHead_err = "Head is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $DivHead)) {

        $DivHead_err = 'Invalid Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    }else{
         $DivHead = $_POST["v_DiviHead"];
    }


     if (empty($DivCon)) {
                $DivCon_err = "Contact number is required.";
    } else if (!preg_match('/^[0-9]{10}+$/', $DivCon)) {

        $DivCon_err = 'Invalid Contact Number (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else{
        $DivCon = $_POST["v_Number"];
    }


    if (empty($DivMail)) {
                $DivMail_err = "Email is required.";
    } else{
        $DivMail = $_POST["v_Email"];
    }

     
     if (empty($DivLoc)) {
                $DivLoc_err = "Location is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $DivLoc)) {

        $DivLoc_err = 'Invalid Location (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else {
            $DivLoc = $_POST["v_Location"];
        }

    if (empty($DivName_err) && empty($DivHead_err) && empty($DivCon_err) && empty($DivMail_err) && empty($DivLoc_err)) {

    $sql = "UPDATE tbl_division SET Name='" . $_POST["v_Name"] . "',   Division_Head='" . $_POST["v_DiviHead"] . "', Contact_Number='" . $_POST["v_Number"] . "',
     Email='" . $_POST["v_Email"] . "',Location='" . $_POST["v_Location"] . "'  WHERE tblDivisionID ='" . $diviID . "' ";

    if ($con->query($sql) === TRUE) {

        $msg = "Successfully updated";
        header("Location:divisionMaintenance.php");

    }else{
         $msg = "Not updated";
    }
}

} else {
    $msger = "Some error occured. Please try again";
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Division Update</title>

 <?php include("header.php") ?>

</head>


<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>Division Maintenance</h2>
    </center>
</div>


<center>

    <form class="form-horizontal" method="post" action="">
        <!-- Add Institute -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Division details</h4>
                    </div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Division Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Name"
                                       id="v_Name"
                                       placeholder="Enter Institute Short Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $DivName; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivName_err; ?></span>

                                                <?php } ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Division Head </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_DiviHead"
                                       id="v_DiviHead"
                                       placeholder="Enter Institute Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $DivHead; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivHead_err; ?></span>

                                                <?php } ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Number" id="v_Number"
                                       placeholder="Enter Institute Location" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $DivCon; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivCon_err; ?></span>

                                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Email" id="v_Email"
                                       placeholder="Enter Institute Location" value="<?php echo $DivMail; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivMail_err; ?></span>

                                                <?php } ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Locatioon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Location" id="v_Location"
                                       placeholder="Enter Institute Location" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $DivLoc; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivLoc_err; ?></span>

                                                <?php } ?>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div>
            </div>


            <?php if (isset($_POST["btnSubmit"])) { ?>

                <?php if (!empty($msg)) { ?>
                    <div class="col-sm-12 alert alert-success" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>

                <?php if (!empty($msger)) { ?>
                    <div class="col-sm-12 alert alert-danger" role="alert">
                        <?php echo $msger ?>
                    </div>
                <?php } ?>

            <?php } ?>
            <br>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
            <br>
    </form>
</center>

<br>

</form>

</div>
</div>


</body>
</html>