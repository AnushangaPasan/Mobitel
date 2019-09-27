<?php include("db.php"); ?>

<?php

$error = $error1 = "";

$InstituteCode_err=$InstituteName_err=$InstituteLoc_err=$contact_err=$designation_err=$Ins_Coordinator_err="";


if (isset($_POST["btnSubmit"])) {

// set parameters and execute
    $Institute_id = $_POST["v_Institute_Code"];
    $ins_Name = $_POST["v_Institute_Name"];
    $Ins_Loc = $_POST["v_Location"];
    $Ins_Coordinator=$_POST['v_Coordinator'];
    $designation=$_POST['v_Designation'];
    $contact=$_POST['v_Contact'];
    $flag = "ACTIVE";

// Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql="SELECT * FROM `tbl_institute` WHERE TrainingInstitute_Name='".$ins_Name."'";
        $resultSet= $con->query($sql);


    if (empty($Institute_id)) {
                $InstituteCode_err = "Institute ID is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Institute_id)) {

       $InstituteCode_err = "Invalid Institute Code";

    }else{
      $Institute_id = $_POST["v_Institute_Code"];
    }

    if (empty($ins_Name)) {
                $InstituteName_err = "Name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $ins_Name)) {

        $InstituteName_err = "Invalid Institute Name";
    }else{
          $ins_Name = $_POST["v_Institute_Name"];
    } 

    if (empty($Ins_Loc)) {
                $InstituteLoc_err = "Location is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Ins_Loc)) {

        $InstituteLoc_err = "Invalid Institute Location";
    } else{
         $Ins_Loc = $_POST["v_Location"];
    }

    if (empty($Ins_Coordinator)) {
                $Ins_Coordinator_err = "Coordinator name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Ins_Coordinator)) {

        $Ins_Coordinator_err = "Invalid Institute Name";
    }else{
          $Ins_Coordinator = $_POST["v_Coordinator"];
    }

    if (empty($designation)) {
                $designation_err = "Designation is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $designation)) {

        $designation_err = "Invalid Institute Name";
    }else{
          $designation = $_POST["v_Designation"];
    }

    if (empty($contact)) {
                $contact_err = "Contact number is required.";
    } else if (!preg_match('/^[0-9]{10}+$/', $contact)) {

        $contact_err = 'Invalid Contact Number (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else{
        $contact = $_POST["v_Contact"];
    }


    //if (empty($InstituteCode_err) && empty($InstituteName_err) && empty($InstituteLoc_err) && empty($error) && empty($designation_err) && empty($Ins_Coordinator_err) && empty($contact)) {
            
            if ($resultSet->num_rows >=1){
                    $error="University / Institute already exist";
                   
            }else{

                // prepare and bind
             $stmt = $con->prepare("INSERT INTO tbl_institute (TrainingInstitute_Code, TrainingInstitute_Name, Location,Coordinator,Designation,Contact) VALUES ( ?,?,?,?,?,? ) ");

            $stmt->bind_param("ssssss", $Institute_id, $ins_Name, $Ins_Loc,$Ins_Coordinator,$designation,$contact);
		$sql = "INSERT INTO tbl_institute (TrainingInstitute_Code, TrainingInstitute_Name, Location,Coordinator,Designation,Contact) VALUES (  $Institute_id, $ins_Name, $Ins_Loc,$Ins_Coordinator,$designation,$contact ) ";
			echo $sql;
            $stmt->execute();

            $error1 = "New institute created successfully";

            $stmt->close();
        }

    
    //}
}
?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Institute Maintenance</title>

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

    <form class="form-horizontal" method="post" action="#">
        <!-- Add Institute -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h4 class="panel-title ">
                            Institute Details
                        </h4>

                    </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                <?php if (!empty($error)) { ?>
                    <div class="col-sm-12 alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <?php if (!empty($error1)) { ?>
                    <div class="col-sm-12 alert alert-success" role="alert">
                        <?php echo $error1 ?>
                    </div>
                <?php } ?>

            <?php } ?>
                    <div>
                        <div class="panel-body">


                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">University / Institute Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Institute_Code"
                                           id="v_Institute_Code" onblur="this.value=this.value.toUpperCase()"
                                           placeholder="Enter University / Institute Short Name" autofocus="autofocus" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Institute_Code'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteCode_err; ?></span>

                                                <?php } ?>
                                </div>
                                 
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">University / Institute Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Institute_Name"
                                           id="v_Institute_Name" onblur="this.value=this.value.toUpperCase()"
                                           placeholder="Enter University / Institute Name" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Institute_Name'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteName_err; ?></span>

                                                <?php } ?>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Location" id="v_Location"
                                           placeholder="Enter University / Institute Location" onblur="this.value=this.value.toUpperCase()" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Location'];} ?>" >

                                         <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteLoc_err; ?></span>

                                                <?php } ?>
                                </div>
                               
                            </div>


                            <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Coordinator</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Coordinator" id="v_Location"
                                       placeholder="Enter University / Institute Coordinator Name" onblur="this.value=this.value.toLocaleUpperCase()" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Coordinator'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Ins_Coordinator_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Designation</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Designation" id="v_Location"
                                       placeholder="Enter Designation" onblur="this.value=this.value.toLocaleUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Designation'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $designation_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Contact" id="v_Location"
                                       placeholder="Enter Contact" onblur="this.value=this.value.toLocaleUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Contact'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $contact_err; ?></span>

                                                <?php } ?>
                            </div>
                            
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            <div>
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
            

    </form>
</center>

<form action="RegisterAction">
    <div class="container col-md-10 col-md-offset-1">


        <table class="table table-hover table-bordered ">
            <tr>
                <th>#</th>
                <th>Institute Code</th>
                <th>Institute Name</th>
                <th>Location</th>
                <th>Coordinator</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Update</th>

            </tr>
            <tbody>

            <?php
             $rowcount2=1;
            $sql = "SELECT *  FROM tbl_institute";
            $institute_data = $con->query($sql);

            if ($institute_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($institute_data)) :?>
                    <tr>
                        <td><?php echo $rowcount2++; ?></td>
                        <td><?php echo $row['TrainingInstitute_Code']; ?></td>
                        <td><?php echo $row['TrainingInstitute_Name']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Coordinator']; ?></td>
                        <td><?php echo $row['Designation']; ?></td>
                        <td><?php echo $row['Contact']; ?></td>
                        <td><?php echo $row['flag']; ?></td>

                        <td>
                            <a href='instituteMaintenanceUpdate.php?id=<?php echo $row["tblTrainingInstituteID"] ?>'
                               class="btn btn-primary btn-xs">Click Here</a>
                        </td>
                        <td>
                            <a href='instituteMaintenanceUpdate.php?idStatus=<?php echo $row["tblTrainingInstituteID"] ?>'
                               class="btn btn-danger btn-xs">Inactive</a>
                        </td>
                        <td>
                            <a href='instituteMaintenanceUpdate.php?idStatus1=<?php echo $row["tblTrainingInstituteID"] ?>'
                               class="btn btn-success btn-xs">Active</a>
                        </td>
                    </tr>
                    <?php
                endwhile;
            } ?>

            </tbody>
        </table>

    </div>
</form>

</div>
</div>


</body>
</html>