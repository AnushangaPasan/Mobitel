<?php include("db.php"); ?>

<?php
$txtInCode = $txtInName = $txtLocation = $msg = $msger =$crs_Name= "";
$InstituteCode_err=$CrsName_err=$CrsCode_err="";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_course WHERE tblCourseID='" . $_GET['id'] . "' ";
    $course_data = $con->query($sql);

    if ($course_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($course_data);
        $txtInsCode = $row['tblTrainingInstituteID'];
        $txtCrsCode = $row['Course_Code'];
        $txtCrsName = $row['Course_Name'];
        $flag= $row['flag'];



    }
}

if (isset($_GET["idStatus"])) {


    $sql = "UPDATE tbl_course SET flag='" . "INACTIVE" . "' WHERE tblCourseID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactived";
        header("Location:courseMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}

if (isset($_GET["idStatus1"])) {


    $sql = "UPDATE tbl_course SET flag='" . "ACTIVE" . "' WHERE tblCourseID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:courseMaintenance.php");
    }


} else {
    $msger = "Some error occured. Please try again";
}


if (isset($_POST["btnSubmit"])) {


    $crs_Name = $_POST["v_CourseName"];
    $crs_Code = $_POST["v_CourseCode"];

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


    if (empty($crs_Name)) {
                $CrsName_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $crs_Name)) {

        $CrsName_err ='Invalid Programme Name(eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else{
         $crs_Name = $_POST["v_Course_Name"];
    }


     if (empty($crs_Code)) {
                $CrsCode_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\/\,]+$/", $crs_Code)) {

        $CrsCode_err = 'Invalid Programme Code(eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else{
            $crs_Code = $_POST["v_CourseCode"];
    }

      if (empty($CrsName_err) && empty($CrsCode_err) ) {



            $sql = "UPDATE tbl_course SET tblTrainingInstituteID='" . $txtInsCode. "',   Course_Code='" . $_POST["v_CourseCode"] . "', Course_Name='" . $_POST["v_CourseName"] . "' WHERE tblCourseID ='" . $_GET["id"] . "' ";
            if ($con->query($sql) === TRUE) {

                $msg = "Successfully updated";
                header("Location:courseMaintenance.php");

            }
    }

} else {
    $msger = "Some error occured. Please try again";
}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Program Update</title>

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

    <form class="form-horizontal" method="post" action="">
        <!-- Add Institute -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Programme details</h4>
                    </div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">University / Institute Name</label>
                            <div class="col-sm-8">
                                <?php 
                                    $sql="SELECT * FROM `tbl_institute` WHERE tblTrainingInstituteID='".$txtInsCode."' ";
                                            $resultSet= $con->query($sql);

                                            if ($resultSet->num_rows >=1){
                                                $row = mysqli_fetch_assoc($resultSet);
                                                $crs_Name=$row['TrainingInstitute_Name'];
                   
                                            }
                                 ?>

                               <input type="text" class="form-control" name="v_CourseId" id="v_CourseId"
                                       placeholder="Enter Programme Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $crs_Name; ?>" disabled="disabled">
                           
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Programme Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_CourseName" id="v_CourseName"
                                       placeholder="Enter Programme Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtCrsName; ?>">
                                       
                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $CrsName_err; ?></span>

                                                <?php } ?>
                            </div>
                             
                           
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Programme Code </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_CourseCode"
                                       id="v_CourseCode"
                                       placeholder="Enter Programme Code" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtCrsCode; ?>">
                                      
                                      <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $CrsCode_err; ?></span>

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