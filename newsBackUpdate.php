<?php include("db.php"); ?>

<?php

$txtBankCode = $txtBankName = $msg = $msger = "";
$Event_ID_err=$Event_Date_err=$Event_STime_err=$Event_ETime_err=  $Event_Venue_err= $Event_Division_err= $Event_Presenter_err="";

if (isset($_GET["id"])) {
    $sql = "SELECT * FROM tbl_event WHERE tbl_eventID='" . $_GET['id'] . "'";
    $event_data = $con->query($sql);

    if ($event_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($event_data);
        $txtEvntID = $row['EventID'];
        $txtEvntSDate = $row['SDate'];
        $txtEvntStime = $row['STime'];
        $txtEvntETime = $row['ETime'];
        $txtEvntVenue = $row['Venue'];
        $txtEvntDivi = $row['Division'];
        $txtEvntPresen = $row['Presenter'];


    }
}

if (isset($_GET["idStatus"])) {

    $sql = "UPDATE tbl_event SET flag='" . "INACTIVE" . "'WHERE tbl_eventID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactived";
        header("Location:newsBack.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_GET["idStatus1"])) {

    $sql = "UPDATE tbl_event SET flag='" . "ACTIVE" . "'WHERE tbl_eventID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully actived";
        header("Location:newsBack.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_POST["btnSubmit"])) {

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $Event_ID = $_POST['v_EventID'];
    $Event_Date = $_POST["v_Date"];
    $Event_STime = $_POST["v_STime"];
    $Event_ETime = $_POST["v_ETime"];
    $Event_Venue = $_POST["v_Venue"];
    $Event_Division = $_POST["v_Divi"];
    $Event_Presenter = $_POST["v_Presenter"];


    if (empty($Event_Date)) {
                $Event_Date_err = "Date is required.";
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
                $Event_Venue_err = "Venue is required.";
    }else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Venue)) {

        $Event_Venue_err = "Invalid Venue";

    } else{
         $Event_Venue = $_POST["v_Venue"];
    }


    if (empty($Event_Division)) {
                $Event_Division_err = "Division value is required.";
    }else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Division)) {

        $Event_Division_err = "Invalid Division";

    } else{
         $Event_Division = $_POST["v_Divi"];
    }


    if (empty($Event_Presenter)) {
                $Event_Presenter_err = "Prsenter name is required.";
    }else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-]+$/", $Event_Presenter)) {

        $Event_Presenter_err = "Invalid Prsenter Name";

    } else {
         $Event_Presenter = $_POST["v_Presenter"];
    }

// prepare and bind


    if (empty($Event_Date_err) && empty($Event_STime_err) && empty($Event_ETime_err) && empty($Event_Venue_err) && empty($Event_Division_err) && empty($Event_Presenter_err)) {

            $sql = "UPDATE tbl_event SET  SDate='" . $_POST["v_Date"] . "', STime='" . $_POST["v_STime"] . "'
             ,   ETime='" . $_POST["v_ETime"] . "',   Venue='" . ucwords($Event_Venue). "',  Division='" . $_POST["v_Divi"] . "' ,   Presenter='" . $_POST["v_Presenter"] . "' 
             WHERE tbl_eventID ='" . $_GET["id"] . "' ";

            if ($con->query($sql) === TRUE) {

                $msg = "Successfully updated";
                 header("Location:news.php");

            } else {
                $msger = "Some error occured. Please try again";
            }
    }

}


?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Training Programme Update</title>

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
        <h2>Training Programme Maintenance</h2>
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
                            Update Details
                        </h4>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Event ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_EventID"
                                       id="v_EventID"
                                       placeholder="Event ID" value="<?php echo $txtEvntID; ?>" disabled="disabled">

                                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="v_Date"
                                       id="v_Date"
                                       placeholder="dd/mm/yyyy" value="<?php echo $txtEvntSDate; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_Date_err; ?></span>

                                                <?php } ?>

                                      
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Start Time</label>
                            <div class="col-sm-8">
                                <input type="Time" class="form-control" name="v_STime" id="v_STime"
                                       placeholder="Enter Start Time" value="<?php echo $txtEvntStime; ?>" autofocus>

                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_STime_err; ?></span>

                                                <?php } ?>

                                       
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">End Time</label>
                            <div class="col-sm-8">
                                <input type="Time" class="form-control" name="v_ETime" id="v_ETime"
                                       placeholder="Enter End Time" value="<?php echo $txtEvntETime; ?>" >

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_ETime_err; ?></span>

                                                <?php } ?>

                                       
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Venue</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Venue" id="v_Venue"
                                       placeholder="Enter Venue" onblur="this.value=this.value.toUpperCase()"   value="<?php echo $txtEvntVenue; ?>" >

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_Venue_err; ?></span>

                                                <?php } ?>

                                       
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Division</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Divi" id="v_Divi"
                                       placeholder="Enter Division" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtEvntDivi; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_Division_err; ?></span>

                                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Presented By</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_Presenter" id="v_Presenter"
                                       placeholder="Enter Presenter Name" onblur="this.value=this.value.toUpperCase()"  value="<?php echo $txtEvntPresen; ?>">

                                       <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $Event_Presenter_err; ?></span>

                                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <br> 
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