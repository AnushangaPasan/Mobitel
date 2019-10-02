<?php include("db.php"); ?>

<?php
$txtInCode = $txtInName = $txtLocation = $msg = $msger = "";
$InstituteCode_err=$InstituteName_err=$InstituteLoc_err=$contact_err=$designation_err=$Ins_Coordinator_err="";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_institute WHERE tblTrainingInstituteID='" . $_GET['id'] . "' ";
    $institute_data = $con->query($sql);

    if ($institute_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($institute_data);
        $txtInCode = $row['TrainingInstitute_Code'];
        $txtInName = $row['TrainingInstitute_Name'];
        $txtLocation = $row['Location'];
        $txtCoordinator=$row['Coordinator'];
        $textDesigantion=$row['Designation'];
        $txtContact=$row['Contact'];
        $txtStatus = $row['flag'];

    }
}

if (isset($_GET["idStatus"])) {


    $sql = "UPDATE tbl_institute SET flag='" . "INACTIVE" . "' WHERE tblTrainingInstituteID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactived";
        header("Location:instituteMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}

if (isset($_GET["idStatus1"])) {


    $sql = "UPDATE tbl_institute SET flag='" . "ACTIVE" . "' WHERE tblTrainingInstituteID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:instituteMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}


if (isset($_POST["btnSubmit"])) {

    $Institute_id = $_POST["v_Institute_Code"];
    $ins_Name = $_POST["v_Institute_Name"];
    $Ins_Loc = $_POST["v_Location"];
    $Ins_Coordinator=$_POST['v_Coordinator'];
    $designation=$_POST['v_Designation'];
    $contact=$_POST['v_Contact'];

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    echo $_POST["v_Institute_Code"];
    echo $_GET["id"];

    if (empty($Institute_id)) {
                $InstituteCode_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $Institute_id)) {

       $InstituteCode_err = "Invalid Institute Code";

    }else{
      $Institute_id = $_POST["v_Institute_Code"];
    }

    if (empty($ins_Name)) {
                $InstituteName_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $ins_Name)) {

        $InstituteName_err = "Invalid Institute Name";
    }else{
          $ins_Name = $_POST["v_Institute_Name"];
    } 

    if (empty($Ins_Loc)) {
                $InstituteLoc_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $Ins_Loc)) {

        $InstituteLoc_err ='Invalid Institute Location (eg.a-zA-Z " '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else{
         $Ins_Loc = $_POST["v_Location"];
    }

    if (empty($Ins_Coordinator)) {
                $Ins_Coordinator_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $Ins_Coordinator)) {

        $Ins_Coordinator_err = 'Invalid Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    }else{
          $Ins_Coordinator = $_POST["v_Coordinator"];
    }

    if (empty($designation)) {
                $designation_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $designation)) {

        $designation_err = 'Invalid designation (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    }else{
          $designation = $_POST["v_Designation"];
    }

    if (empty($contact)) {
                $contact_err = "This value is required.";
    } else if (!preg_match('/^[0-9]{10}+$/', $contact)) {

        $contact_err = 'Invalid Contact Number (eg.a-zA-Z " '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else{
        $contact = $_POST["v_Contact"];
    }

    if (empty($InstituteCode_err) && empty($InstituteName_err) && empty($InstituteLoc_err) && empty($Ins_Coordinator_err) && empty($designation_err) && empty($contact_err)) {

    $sql = "UPDATE tbl_institute SET TrainingInstitute_Code='" . $_POST["v_Institute_Code"] . "',   TrainingInstitute_Name='" . $_POST["v_Institute_Name"] . "', Location='" . $_POST["v_Location"] . "' , Coordinator='" . $_POST["v_Coordinator"] . "' , Designation='" . $_POST["v_Designation"] . "' , Contact='" . $_POST["v_Contact"] . "' WHERE tblTrainingInstituteID ='" . $_GET["id"] . "' ";

        if ($con->query($sql) === TRUE) {

             $msg = "Successfully updated";
                header("Location:instituteMaintenance.php");

        }
    }

} else {
    $msger = "Some error occured. Please try again";
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Institute</title>

     <?php include("header.php") ?> 

</head>


<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>Institute Maintenance</h2>
    </center>
</div>


<center>

    <form class="form-horizontal" method="post" action="">
        <!-- Add Institute -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Institute details</h4>
                    </div>

                    <?php if (isset($_POST["btnSubmit"])) { ?>

                <?php if (!empty($error)) { ?>
                    <div class="col-sm-12 alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>

                <?php if (!empty($error1)) { ?>
                    <div class="col-sm-12 alert alert-success" role="alert">
                        <?php echo $$msger ?>
                    </div>
                <?php } ?>

            <?php } ?>


                    <div class="panel-body">


                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Institute Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Institute_Code"
                                       id="v_Institute_Code"
                                       placeholder="Enter Institute Short Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtInCode; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteCode_err; ?></span>

                                                <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Institute Name </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Institute_Name"
                                       id="v_Institute_Name"
                                       placeholder="Enter Institute Name" onblur="this.value=this.value.toUpperCase()" value="<?php echo $txtInName; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteName_err; ?></span>

                                                <?php } ?>
                            </div>
                             
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Location</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Location" id="v_Location"
                                       placeholder="Enter Institute Location" onblur="this.value=this.value.toLocaleUpperCase()"  value="<?php echo $txtLocation; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteLoc_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>


                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Coordinator</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Coordinator" id="v_Coordinator"
                                       placeholder="Enter University / Institute Coordinator Name" onblur="this.value=this.value.toLocaleUpperCase()" value="<?php echo $txtCoordinator; ?>" >

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Ins_Coordinator_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Designation</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Designation" id="v_Designation"
                                       placeholder="Enter Designation" onblur="this.value=this.value.toLocaleUpperCase()"  value="<?php echo $textDesigantion; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $designation_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Contact" id="v_Contact"
                                       placeholder="Enter Contact" onblur="this.value=this.value.toLocaleUpperCase()"  value="<?php echo $txtContact; ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $contact_err; ?></span>

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
         
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
            <br>
    </form>
</center>



</form>

</div>
</div>


</body>
</html>