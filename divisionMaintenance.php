<?php include("db.php"); ?>

<?php

$error = $error1 = "";
$DivName_err=$DivHead_err=$DivCon_err=$DivLoc_err=$DivMail_err="";
$DivName=$DivHead=$DivCon=$DivLoc=$DivMail="";

if (isset($_POST["btnSubmit"])) {

// set parameters and execute
     $DivName = $_POST["v_Division"];
     $DivHead = $_POST["v_Head_Name"];
     $DivCon = $_POST["v_Contact"];
    $DivMail = $_POST["v_Email"];
    $DivLoc = $_POST["v_Location"];

    $sql="SELECT * FROM `tbl_division` WHERE Name='".$DivName."'";
    $resultSet= $con->query($sql);

   

     if (empty($DivName)) {
                $DivName_err = "Name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $DivName)) {

        $DivName_err ='Invalid Division Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    }else {
         $DivName = $_POST["v_Division"];
    } 


    if (empty($DivHead)) {
                $DivHead_err = "Head name is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $DivHead)) {

        $DivHead_err = 'Invalid Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    }else{
         $DivHead = $_POST["v_Head_Name"];
    }


     if (empty($DivCon)) {
                $DivCon_err = "Contact number is required.";
    } else if (!preg_match('/^[0-9]{10}+$/', $DivCon)) {

        $DivCon_err = 'Invalid Contact Number (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else{
        $DivCon = $_POST["v_Contact"];
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

 // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

if (empty($DivName_err) && empty($DivHead_err) && empty($DivCon_err) && empty($DivMail_err) && empty($DivLoc_err)  ) {

             if ($resultSet->num_rows >=1){
                    $error="Division already exist";
                   
            }else{

// prepare and bind
        $stmt = $con->prepare(" INSERT INTO `tbl_division`(`Name`, `Division_Head`, `Contact_Number`, `Email`, `Location`) VALUES ( ?,?,?,?,? ) ");

        $stmt->bind_param("sssss", $DivName, $DivHead, $DivCon, $DivMail, $DivLoc);


        $stmt->execute();

        $error1 = "New division created successfully";

        $stmt->close();

            }

    }
    
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Division Maintenance</title>

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

    <form class="form-horizontal" method="post" action="#">
        <!-- Add Institute -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title ">
                            Division Details
                        </h4>
                    </div>
                    <div>
                        <div class="panel-body">
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

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Division Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Division"
                                           id="v_Division"
                                           placeholder="Enter Division Name" autofocus="autofocus"onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Division'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivName_err; ?></span>

                                                <?php } ?>

                                </div>
                                 
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Division Head </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Head_Name"
                                           id="v_Head_Name"
                                           placeholder="Enter Head Name" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Head_Name'];} ?>">

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivHead_err; ?></span>

                                                <?php } ?>

                                </div>
                                    
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Contact Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Contact" id="v_Contact"
                                           placeholder="Enter Contact NUmber" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Contact'];} ?>">

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivCon_err; ?></span>

                                                <?php } ?>

                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="v_Email" id="v_Email"
                                           placeholder="Enter Email" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Email'];} ?>">

                                         <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivMail_err; ?></span>

                                                <?php } ?>

                                </div>
                               
                            </div>


                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Location" id="v_Location"
                                           placeholder="Enter Location" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Location'];} ?>">

                                         <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $DivLoc_err; ?></span>

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

        <br>
        

        <table class="table table-hover table-bordered ">
            <tr>
                <th>#</th>
                <th>Division Name</th>
                <th>Contact Person</th>
                <th>Number</th>
                <th>Email</th>
                <th>Location</th>
                <th>Update</th>
                <th>Status</th>


            </tr>
            <tbody>

            <?php
            $sql = "SELECT *  FROM tbl_division";
            $division_data = $con->query($sql);

            if ($division_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($division_data)) :?>
                    <tr>
                        <td><?php echo $row['tblDivisionID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Division_Head']; ?></td>
                        <td><?php echo $row['Contact_Number']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td>
                            <a href='divisionMaintenanceUpdate.php?id=<?php echo $row['tblDivisionID']; ?>'
                               class="btn btn-primary btn-xs">Click Here</a>
                        </td>
                        <td><?= $row['flag']; ?></td>

                        
                        <td>
                            <a href='divisionMaintenanceUpdate.php?idStatus=<?php echo $row["tblDivisionID"] ?>'
                               class="btn btn-danger btn-xs">Inactive</a>
                        </td>
                        <td>
                            <a href='divisionMaintenanceUpdate.php?idStatus1=<?php echo $row["tblDivisionID"] ?>'
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