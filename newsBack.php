<?php include("db.php"); ?>

<?php


$error = $msg_success = "";
$Event_ID_err=$Event_Date_err=$Event_STime_err=$Event_ETime_err=  $Event_Venue_err= $Event_Division_err= $Event_Presenter_err="";
$sql = "SELECT * FROM tbl_event";
$result = mysqli_query($con, $sql);
$count1 = mysqli_num_rows($result);
$EvtID=++$count1;


if (isset($_POST["btnSubmit"])) {

    // set parameters and execute
    //$Event_ID = $_POST['v_EventID'];
    $Event_Date = $_POST["v_Date"];
    $Event_STime = $_POST["v_STime"];
    $Event_ETime = $_POST["v_ETime"];
    $Event_Venue = $_POST["v_Venue"];
    $Event_Division = $_POST["v_Divi"];
    $Event_Presenter = $_POST["v_Presenter"];


    $flag = "ACTIVE";

    $sql="SELECT * FROM `tbl_event` WHERE EventID='".$EvtID."'";
    $resultSet= $con->query($sql);


    if (empty($Event_Date)) {
        $Event_Date_err = "This value is required.";
    }else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Date)) {

        $Event_Date_err = "Invalid Date";

    } else{
      $Event_Date = $_POST["v_Date"];

  }

  if (empty($Event_STime)) {
    $Event_STime_err = "Start time is required.";
} else{
   $Event_STime = $_POST["v_STime"];
}


if (empty($Event_ETime)) {
    $Event_ETime_err = "End time is required.";
}else{
   $Event_ETime = $_POST["v_ETime"];
}

if (empty($Event_Venue)) {
    $Event_Venue_err = "This value is required.";
}else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Venue)) {

    $Event_Venue_err = 'Invalid Venue (eg." |;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

} else{
   $Event_Venue = $_POST["v_Venue"];
}


if (empty($Event_Division)) {
    $Event_Division_err = "This value is required.";
}else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Division)) {

    $Event_Division_err = "Invalid Division";

} else{
   $Event_Division = $_POST["v_Divi"];
}


if (empty($Event_Presenter)) {
    $Event_Presenter_err = "This value is required.";
}else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Presenter)) {

    $Event_Presenter_err = "Invalid Prsenter Name";

} else {
   $Event_Presenter = $_POST["v_Presenter"];
}


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



if (empty($Event_Date_err) && empty($Event_STime_err) && empty($Event_ETime_err) && empty($Event_Venue_err) && empty($Event_Division_err) && empty($Event_Presenter_err)) {

    if ($resultSet->num_rows >=1){
        $error="Training programme already exist";

    }else{

                // prepare and bind
        $stmt = $con->prepare("INSERT INTO `tbl_event`(`EventID`, `SDate`, `STime`, `ETime`, `Venue`, `Division`, `Presenter`, `flag`)VALUES ( ?,?,?,?,?,?,?,?) ");

        $stmt->bind_param("ssssssss", $EvtID, $Event_Date, $Event_STime, $Event_ETime, $Event_Venue, $Event_Division, $Event_Presenter,$flag);

        $stmt->execute();

        $error1="New programme created successfully";
        $_POST["v_Date"]="";
        $_POST["v_STime"]="";
        $_POST["v_ETime"]="";
        $_POST["v_Venue"]="";
        $_POST["v_Divi"]="";
        $_POST["v_Presenter"]="";




        $stmt->close();
        $con->close();
    }

}


}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Training Programme</title>

    <link rel="stylesheet" type="text/css" href="Headings.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"
    type="text/css"/>
    <script type="text/javascript" src="jQuery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br><br>
    <div>
        <center>
            <h2>Create Training Programme</h2>
        </center>
    </div>


    <!-- Add Bank -->
    <center>
        <form class="form-horizontal" method="post" action="#">
            <div class="container col-md-6 col-md-offset-3 ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title ">
                                Create Training Programme
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


                                <?php 

                                $sql = "SELECT * FROM tbl_event";
                                $result = mysqli_query($con, $sql);
                                $count1 = mysqli_num_rows($result);
                                $EvtID=++$count1;

                                ?>

                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Progeamme ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_EventID"
                                        id="v_EventID"
                                        placeholder="Event ID" value=<?php echo $EvtID++; ?> disabled>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="v_Date"
                                        id="v_Date"
                                        placeholder="dd/mm/yyyy" value="<?php if(isset($_POST['btnSubmit'])){
                                            echo $_POST['v_Date'];} ?>" style="text-transform:uppercase">
                                            <!--  <?php echo $Event_Date; ?> -->
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $Event_Date_err; ?></span>

                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Start Time</label>
                                        <div class="col-sm-8">
                                            <input type="Time" class="form-control" name="v_STime" id="v_STime"
                                            placeholder="Enter Start Time" value="<?php if(isset($_POST['btnSubmit'])){
                                                echo $_POST['v_STime'];} ?>" style="text-transform:uppercase">
                                                <!--  <?php echo $Event_STime; ?> -->
                                            </div>
                                            <?php if (isset($_POST["btnSubmit"])) { ?>

                                            <span class="text-danger"><?php echo $Event_STime_err; ?></span>

                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText2" class="col-sm-4 control-label">End Time</label>
                                            <div class="col-sm-8">
                                                <input type="Time" class="form-control" name="v_ETime" id="v_ETime"
                                                placeholder="Enter End Time" value="<?php if(isset($_POST['btnSubmit'])){
                                                    echo $_POST['v_ETime'];} ?>" style="text-transform:uppercase">
                                                    <!--  <?php echo $Event_ETime; ?> -->
                                                </div>
                                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_ETime_err; ?></span>

                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText2" class="col-sm-4 control-label">Venue</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="v_Venue" id="v_Venue"
                                                    placeholder="Enter Venue" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                                        echo $_POST['v_Venue'];} ?>">
                                                    </div>
                                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                                    <span class="text-danger"><?php echo $Event_Venue_err; ?></span>

                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText2" class="col-sm-4 control-label">Division</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="v_Divi" id="v_Divi"
                                                        placeholder="Enter Division" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                                            echo $_POST['v_Divi'];} ?>" >
                                                        </div>
                                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                        <span class="text-danger"><?php echo $Event_Division_err; ?></span>

                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputText2" class="col-sm-4 control-label">Presented By</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="v_Presenter" id="v_Presenter"
                                                            placeholder="Enter Presenter Name" onblur="this.value=this.value.toUpperCase()"  value="<?php if(isset($_POST['btnSubmit'])){
                                                                echo $_POST['v_Presenter'];} ?>"  >
                                                            </div>
                                                            <?php if (isset($_POST["btnSubmit"])) { ?>

                                                            <span class="text-danger"><?php echo $Event_Presenter_err; ?></span>

                                                            <?php } ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
                                        <br><br>

                                    </div>
                                </form>
                            </center>


                            <br>
                            <br>

                            <div class="container col-md-10 col-md-offset-1">


                                <table class="table table-hover table-bordered ">
                                    <tr>
                                        <th>#</th>
                                        <th>Prog. ID</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Venue</th>
                                        <th>Division</th>
                                        <th>Conducted By</th>
                                        <th>Status</th>
                                        <th>Update</th>



                                        <tbody>

                                            <?php
                                            $sql = "SELECT *  FROM tbl_event";
                                            $event_data = $con->query($sql);

                                            if ($event_data->num_rows >= 1) {
                                                while ($row = mysqli_fetch_assoc($event_data)) :?>
                                                <tr>
                                                    <td><?php echo $row['tbl_eventID']; ?></td>
                                                    <td><?php echo $row['EventID']; ?></td>
                                                    <td><?php echo $row['SDate']; ?></td>
                                                    <td><?php echo $row['STime']; ?></td>
                                                    <td><?php echo $row['ETime']; ?></td>
                                                    <td><?php echo $row['Venue']; ?></td>
                                                    <td><?php echo $row['Division']; ?></td>
                                                    <td><?php echo $row['Presenter']; ?></td>
                                                    <td><?php echo $row['flag']; ?></td>


                                                    <td>
                                                        <a href='newsBackUpdate.php?id=<?php echo $row["tbl_eventID"] ?>'
                                                         class="btn btn-primary btn-xs">Click Here</a>
                                                     </td>
                                                     <td>
                                                        <a href='newsBackUpdate.php?idStatus=<?php echo $row["tbl_eventID"] ?>'
                                                         class="btn btn-danger btn-xs">Inactive</a>
                                                     </td>
                                                     <td>
                                                        <a href='newsBackUpdate.php?idStatus1=<?php echo $row["tbl_eventID"] ?>'
                                                         class="btn btn-success btn-xs">Active</a>
                                                     </td>
                                                 </tr>
                                                 <?php
                                             endwhile;
                                         } ?>

                                     </tbody>


                                 </table>


                             </div>

                             <script type="text/javascript">
                                $(function () {
                                    $('#TimeFrom').datetimepicker({
                                        format: 'LT'
                                    });
                                });
                            </script>
                            <script type="text/javascript">
                                $(function () {
                                    $('#TimeTo').datetimepicker({
                                        format: 'LT'
                                    });
                                });
                            </script>

                        </body>
                        </html>