<?php include("db.php"); ?>

<?php

$error = $error_success = "";
$Institute_id=$crs_Name=$crs_Code =$flag="";

$InstituteCode_err=$CrsName_err=$CrsCode_err="";

if (isset($_POST["btnSubmit"])) {

   

// set parameters and execute
    $Institute_id = $_POST["v_Institute_Code"];
    $crs_Name = $_POST["v_Course_Name"];
    $crs_Code = $_POST["v_Course_code"];
    $flag = "ACTIVE";

     $sql="SELECT * FROM `tbl_course` WHERE tblTrainingInstituteID='".$Institute_id."' &&  Course_Name='".$crs_Name."' ";
    $resultSet= $con->query($sql);


    // echo $Institute_id;
    // echo $crs_Name;
    // echo $crs_Code;
    // echo $flag;


   // if ($_POST['v_Institute_Code']==0) {
   //      $InstituteCode_err = "Please select University / Institute.";
   // }else{
   //      $Institute_id = $_POST["v_Institute_Code"];
   // }


     if (empty($crs_Name)) {
                $CrsName_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $crs_Name)) {

        $CrsName_err ='Invalid Programme Name (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else{
         $crs_Name = $_POST["v_Course_Name"];
    }


   //  if (empty($crs_Code)) {
    //            $CrsCode_err = "This value is required.";
    //} else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $crs_Code)) {

    //    $CrsCode_err = 'Invalid Programme Code (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    //} else{
    //        $crs_Code = $_POST["v_Course_code"];
    //} 

// Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }



        if (empty($InstituteCode_err) && empty($CrsName_err) && empty($CrsCode_err) ) {
             if ($resultSet->num_rows >=1){
                    $error="Programme already exist";
                   
            }else{

// prepare and bind
        $stmt = $con->prepare(" INSERT INTO tbl_course (tblTrainingInstituteID,Course_Code,Course_Name) VALUES ( ?,?,? ) ");

        $stmt->bind_param("sss", $Institute_id, $crs_Code,$crs_Name);


        $stmt->execute();
        $error1 = "New programme added successfully";


        $stmt->close();
            }
        }


    
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Programme Maintenance</title>

    <?php include("header.php") ?>

</head>


<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br><br>
    <div>
        <center>
            <h2>Programme Maintenance</h2>
        </center>
    </div>


    <center>

        <form class="form-horizontal" method="post" action="#">


            <div class="container col-md-6 col-md-offset-3 ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title ">
                               Programme Details
                            </h4>
                        </div>

                        <div >
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
                                    <label for="inputText2" class="col-sm-4 control-label">University / Institute Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="v_Institute_Code" id="v_Institute_Code" autofocus="autofocus">
                                            <option value="0">--SELECT--</option>
                                            <?php
                                            $sql = "SELECT *  FROM tbl_institute ";
                                            $institute_data = $con->query($sql);
                                            if ($institute_data->num_rows >= 1) :

                                                while ($row = mysqli_fetch_assoc($institute_data)) :?>
                                                    <option value="<?php echo $row["tblTrainingInstituteID"]?>" <?php if ($row["tblTrainingInstituteID"]==$Institute_id): ?> selected="selected";
                                                    <?php endif ?>>
                                                        <?php echo $row["TrainingInstitute_Name"] ?> 
                                                    </option>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?> 
                                    </select>

                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $InstituteCode_err; ?></span>

                                                <?php } ?>


                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Programme Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Course_Name"
                                    id="v_Institute_Name"
                                    placeholder="Enter Course Name" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Course_Name'];} ?>" >

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $CrsName_err; ?></span>

                                                <?php } ?>



                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Programme Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Course_code" id="v_Course_code"
                                    placeholder="Enter Course code" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['v_Course_code'];} ?>" >

                                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $CrsCode_err; ?></span>

                                                <?php } ?>

                                </div>
                                
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div>
            </div>


            <br>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">


        </form>
    </center>

    <br>


    <form action="RegisterAction">
        <div class="container col-md-8 col-md-offset-2">

            <br>
            <br>

            <table class="table table-hover table-bordered ">
                <tr>
                    <th>#</th>
                    <th>Institute Name</th>
                    <th>Programme Name</th>
                    <th>Programme Code</th>
                    <th>Status</th>
                    <th>Update</th>


                </tr>
                <tbody>

                    <?php
                    $rowcount2=1;
                    $sql = "SELECT *  FROM tbl_course";
                    $course_data = $con->query($sql);

                    if ($course_data->num_rows >= 1) {
                        while ($row = mysqli_fetch_assoc($course_data)) :?>

                        <tr>

                            <td><?php echo $rowcount2++; ?></td>
                            <td>
                               <?php

                               $InsID= $row['tblTrainingInstituteID'];
                               $sql = "SELECT *  FROM tbl_institute WHERE tblTrainingInstituteID='".$InsID."'  ";
                               $institute_data = $con->query($sql);
                               if ($institute_data->num_rows >= 1) :

                                while ($row2 = mysqli_fetch_assoc($institute_data)) :?>

                                <?php echo $row2["TrainingInstitute_Name"]?>
                                <?php
                            endwhile;
                        endif;
                        ?>


                    </td>
                    <td><?php echo $row['Course_Name']; ?></td>
                    <td><?php echo $row['Course_Code']; ?></td>
                    <td><?php echo $row['flag']; ?></td>


                    <td>
                        <a href='courseMaintenanceUpdate.php?id=<?php echo $row["tblCourseID"] ?>'
                         class="btn btn-primary btn-xs">Click Here</a>
                     </td>
                     <td>
                        <a href='courseMaintenanceUpdate.php?idStatus=<?php echo $row["tblCourseID"] ?>'
                         class="btn btn-danger btn-xs">Inactive</a>
                     </td>
                     <td>
                        <a href='courseMaintenanceUpdate.php?idStatus1=<?php echo $row["tblCourseID"] ?>'
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