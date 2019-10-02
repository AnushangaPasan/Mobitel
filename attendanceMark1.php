<?php include("db.php");
 ?>
<?php
//set current date and time
$date = new DateTime(null, new DateTimeZone('Asia/Colombo'));
$d = $date->format('Y-m-d') . "\n";
$time = $date->format('H:i:s') . "\n";

?>
<?php

//variables
$traineeId1 = $name = $add1 = $add2 = $add3 = $NIC = $DivID = $row= "";

if (isset($_POST['btnSubmit'])) {
//error variables
    $trainee_id_error = $NIC_error = "";

//for data catching
    $search_traineeId1 = $search_traineeId = $search_NIC = "";

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {

        if (empty($_POST["f_NIC"]) && empty($_POST["f_traineeId"])) {
            $error = "Please enter trainee id or NIC number.";

        } else {

            if (!empty($_POST["f_traineeId"]) || !empty($_POST["f_NIC"])) {

                if (!empty($_POST["f_traineeId"])) {
                  
                    if (!preg_match("/^[0-9]+$/", $_POST["f_traineeId"])) {
                        $trainee_id_error = "This value should be number.";
                    } else {
                        $search_traineeId = $_POST["f_traineeId"];
                        $search_traineeId1 = 'MOB/TR/' . $search_traineeId;
                       
                    }
                }

                if (!empty($_POST["f_NIC"])) {

                    if (!preg_match("/^[0-9]{9}[x|X|v|V]$/", $_POST["f_NIC"])) {
                        $NIC_error = "Please enter valid NIC number.";

                    } else {
                        $search_NIC = $_POST["f_NIC"];

                    }

                }


            }
        }

        if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) {

            $search_traineeId = $_POST['f_traineeId'];
            $search_NIC = $_POST['f_NIC'];

            if (empty($search_NIC)) {
               
                $sql = "SELECT * FROM `tbl_trainee` WHERE `Trainee_ID`='$search_traineeId1' ";

            $resultSet = $con->query($sql);

            if ($resultSet->num_rows == 1) {

                    $rows = mysqli_fetch_assoc($resultSet);
                    $traineeId1 = $rows['Trainee_ID'];

                    $name = $rows['Full_Name'];

                    $NIC = $rows['NIC'];
                    $DivID = $rows['tblDivisionID'];
             

                
            }else{
                $error = "Cann't find Trainee ";

            }

            }else if (empty($search_traineeId)) {
               
                 $sql = "SELECT * FROM `tbl_trainee` WHERE `NIC`='$search_NIC'  ";

            $resultSet = $con->query($sql);

            if ($resultSet->num_rows == 1) {

                    $rows = mysqli_fetch_assoc($resultSet);
                    $traineeId1 = $rows['Trainee_ID'];

                    $name = $rows['Full_Name'];

                    $NIC = $rows['NIC'];
                    $DivID = $rows['tblDivisionID'];
                   // echo "id" . $DivID;

                
            }else{
                $error = "Cann't find Trainee ";
            }

            }elseif (!empty($search_traineeId) && !empty($search_NIC) ) {
                
                $error = "Please select Trainee ID or NIC number";
            }

        $con->close();
        }

    }
}


if (isset($_POST['btnMark'])) {

    $traineeID = $_POST['traineeIdinoc'];
    $date = $_POST['date'];
    $date1 = $_POST['date1'];
    $selectOption = $_POST['inOutType'];
    $DivID = $_POST["Divi"];

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {


        if (!empty($traineeID)) {


            if ($selectOption == 0) {
                $error2 = "Please select Type";
            } else {

                if ($selectOption == 1) {
                    //in time
                    $Null = 'N/A';

                    $today = date('Y-m-d 08:00:00');


                    $stmt = $con->prepare("INSERT IGNORE INTO `tbl_attendence`(`tblTraineeID`, `CurrentDate`, `In_Time`, `Out_Time`,`tblDivisionID`) VALUES (?,?,?,?,?)");

                    $stmt->bind_param("sssss", $traineeID, $today, $date1, $Null, $DivID);

                    $stmt->execute();

                    $error1 = "Welcome...! " . $traineeID;

                    $stmt->close();


                } else if ($selectOption == 2) {

                    ////update out time////////////
                    $sql = "UPDATE `tbl_attendence` SET `Out_Time`=? WHERE `tblTraineeID`=? AND `CurrentDate`=?";

                    $stmt = $con->prepare($sql);
                    $s = date('Y-m-d 08:00:00');
                    $stmt->bind_param('sss', $date1, $traineeID, $s);
                    $stmt->execute();


                    if ($stmt->errno) {
                        $error3 = "FAILURE!!! " . $stmt->error;
                    } else {
                        $error1 = "Good Bye...! " . $traineeID;
                    }
                    $stmt->close();
                }
            }
        } else {
            $error3 = "Please search Trainee";
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Attendance</title>
    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br>
<br>
<br>
<div>

</div>
<center>
    <form class="form-horizontal" action="#" method="post">
        <div class="container col-md-8 col-md-offset-1 col-md-push-1">
            <div class="panel-group"></div>

<?php if (isset($_POST["btnSubmit"])) { ?>
                <?php if (!empty($error)) { ?>
                    <div class="col-sm-8 col-sm-offset-2 alert alert-danger" role="alert"> <?php echo $error; ?> </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($_POST["btnMark"])) { ?>
                <?php if (!empty($error1)) { ?>
                    <div class="col-sm-8 col-sm-offset-2 alert alert-success"
                         role="alert"> <?php echo $error1; ?> </div>
                <?php } elseif (!empty($error2)) { ?>
                    <div class="col-sm-8 col-sm-offset-2 alert alert-danger" role="alert"> <?php echo $error2; ?> </div>
                <?php } elseif (!empty($error3)) { ?>
                    <div class="col-sm-8 col-sm-offset-2 alert alert-danger" role="alert"> <?php echo $error3; ?> </div>
                <?php } ?>
            <?php } ?>
            <div class="container col-md-8 col-md-offset-2 ">
                <div class="panel-group">

                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <h2 class="panel-title ">Daily Attendance
                            </h2>
                        </div>

            

                        <div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="inputText1" class="col-sm-4 control-label">Search By Trainee ID</label>
                                    <div class="input-group">
                        <span class="input-group-addon" id="btnGroupAddon">MOB/TR/</span>
                                        <input type="text" class="form-control" name="f_traineeId" id="inputPassword3"
                                               placeholder="Trainee ID" autofocus="autofocus" style="width: 200px">
                                        <?php if (isset($_POST["btnSubmit"])) { ?>
                                            <span class="text-danger"><?php echo $trainee_id_error; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Search By NIC</label>
                                    <div class="col-md-8" style="padding-right: 190px">
                                        <input type="text" name="f_NIC" class="form-control" id="inputPassword3"
                                               placeholder="XXXXXXXXXV" style="width: 270px;">
                                        <?php if (isset($_POST["btnSubmit"])) { ?>
                                            <span class="text-danger"><?php echo $NIC_error; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <input type="submit" name="btnSubmit" value="Search"
                                       class="btn btn-primary btn-lg btn-success" onclick="myFunction();currentTime();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </form>
<div class="container col-md-3 col-md-pull-1">
    <!-- start image validation -->
    <?php

            if (isset($_POST['btnSubmit'])) {
                
            
            $result = $con->query(" SELECT * FROM tbl_trainee WHERE Trainee_ID='$search_traineeId1' OR NIC='$NIC' ");

            while ($row = $result->fetch_assoc()) { 

                    $image_path=$row['profile_img'];

                    if (!empty($trainee_id_error) || !empty($NIC_error) || !empty($error)) {?>
                         <img name="imgProfile" hidden="hidden" />
                  <?php  }else{ ?>

<img name="imgProfile" src="<?php echo "Images/" . $image_path;  ?>"
            class="img-thumbnail thumb-xl img-thumbnail m-b-10"
            alt="profile-image" style="height: 150px; width: 130px; margin-top: 70px;"/>
            <?php
                    }
                 }
             }?>

<!-- end image validation -->       


</div>




    <div id="myDIV">
        <form action="#" method="post">
            <div class="form-group">
                <div class="container col-md-10 col-md-offset-1">
                    <br>
                    <br>
                    <table width="350" border="1px"
                           class="table table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th class="col-md-2">Trainee ID</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">NIC Number</th>
                            <th class="col-md-2">Select IN/OUT</th>
                            <th class="col-md-3">Date & Time</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <div class="col-sm-2">
                                <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                                    <td><input type="text" class="form-control" name="traineeIdinoc"
                                               value='<?php echo $traineeId1; ?>'/></td>
                                <?php } ?>
                            </div>
                            <div class="col-sm-5">
                                <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                                    <td><input type="text" class="form-control" name="name" value='<?php echo $name ?>'>
                                    </td>
                                <?php } ?>
                            </div>

                            <div class="col-sm-4">
                                <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                                    <td><input type="text" class="form-control" name="NIC1" value='<?php echo $NIC ?>'>
                                    </td>
                                <?php } ?>
                            </div>
                            <td>
                                <div class="col-md-12 col-sm-4">
                                    <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                                    <select class="form-control col-md-12" name="inOutType">
                                        <option value="1" selected="1">IN</option>
                                        <option value="2">OUT</option>
                                    </select>

                                    <!--  <input type="datetime" class="form-control" name="inTime"
                                 id="inTime" value="<?php echo $d . ' ' . $time ?>" > -->
                                </div>
                                <?php } ?></td>
                </div>


                <td>
                    <div class="col-md-12 col-sm-4">
                        <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                        <input type="datetime" class="form-control" name="outTime"
                               id="outTime" value="<?php echo $d . ' ' . $time ?>">
                    </div>
                    <?php } ?>
            </div>

            </td>
            

            <td>
                <div>
                    <?php if (empty($trainee_id_error) && empty($NIC_error) && empty($error)) { ?>
                    <input type="submit" name="btnMark" value="Mark" class="btn btn-primary">
                </div>
                <?php } ?>
                <input type="hidden" name="Divi" value="<?php echo $DivID ?>">
                <input type="hidden" name="date" value="<?php echo $d ?>">
                <input type="hidden" name="date1" value="<?php echo $time ?>">
                <input type="hidden" name="selected_text" id="selected_text" value=""/></td>
            </tr>
            </tbody>

            </table>






        </form>

    </div>
    
   
</center>





</body>
<script type="text/javascript" src="JQuery/jquery-3.2.1.min.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
</html>