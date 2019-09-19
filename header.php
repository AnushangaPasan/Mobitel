<?php include("db.php"); ?>
<?php
$msg = $msger = "";

$sql = "SELECT * FROM tbl_trainee WHERE flag='"."PENDING"."' " ;
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

@session_start();
$id_user = "";
if (empty($_SESSION["user_id"])) {
    header("Location:index.php");
}else{
    $id_user = $_SESSION["user_id"];
}


$sql = "SELECT * FROM tbl_accesspoint WHERE id_user='$id_user' ";
$accesspoint_data = $con->query($sql);
$access_point_db="";
if ($accesspoint_data->num_rows >= 1) {
    while ($row = mysqli_fetch_assoc($accesspoint_data)){
        $access_point_db =$row['access_point'];

    }
}   
?>



<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="JQuery/jquery-3.2.1.min.js"></script>


    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="bootstrap/js/bootstrap-timepicker.min.js"></script>


</head>
<body>


    <nav class="navbar navbar-default navbar-fixed-top " color="red">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="mobitel.php">Mobitel</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li><a href="index1.php">Home <span class="sr-only">(current)</span></a></li>
                <?php 
                $access_point = explode(",",$access_point_db);
                if(in_array("5", $access_point)):?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Trainee<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="traineeRegister.php">Register</a></li>
						<li><a href="Evaluation.php">Evaluation</a></li>

                    </ul>
                </li>
                <?php 
                else:?>

                <li class="dropdown" style="display: none;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Trainee<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="traineeRegister.php">Register</a></li>
						

                    </ul>
                </li>
            <?php endif;
            ?>
            <?php 
            $access_point = explode(",",$access_point_db);
            if(in_array("6", $access_point)):?>
            <li><a href="attendanceMark.php">Attendance</a></li>
            <?php 
            else:?>
            <li><a href="attendanceMark.php" style="display: none;">Attendance</a></li>
        <?php endif;?>

        <?php 
        $access_point = explode(",",$access_point_db);
        if(in_array("7", $access_point)):?>
        <li><a href="approvals.php">Approvals <span class="badge"><?php echo $count; ?></span></a></li>
        <?php 
        else:?>
        <li><a href="approvals.php" style="display: none;">Approvals <span class="badge"><?php echo $count; ?></span></a></li>
    <?php endif;?>

    <?php 
    $access_point = explode(",",$access_point_db);
    if(in_array("8", $access_point)):?>

    <li class="dropdown">
        <a href="rptTrainee.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
        aria-expanded="false">Reports<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="rptTrainee.php">Trainee Report</a></li>
            <li><a href="rptAttendance.php">Attendance Report</a></li>
            <li><a href="visualization.php">Visualization</a></li>
            <li><a href="feedback.php">feedback</a></li>
            <li><a href="allowance.php">allowance</a></li>
            <li><a href="apply.php">appyly</a></li>

        </ul>
    </li>

    <?php 
    else:?>

    <li class="dropdown" style="display: none;">
        <a href="rptTrainee.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
        aria-expanded="false">Reports<span class="caret"></span></a>

    </li>

<?php endif;?>

<?php 
$access_point = explode(",",$access_point_db);
if(in_array("9", $access_point)):?>
<li><a href="news.php">Training Programms</a></li>
<?php 
else:?>
<li><a href="news.php" style="display: none;">Training Programms</a></li>
<?php endif;?>

<?php 
$access_point = explode(",",$access_point_db);
if(in_array("10", $access_point)):?>
<li><a href="gallery.php">Gallery</a></li>
<?php 
else:?>
<li><a href="gallery.php" style="display: none;">Gallery</a></li>
<?php endif;?>

<?php 
$access_point = explode(",",$access_point_db);
if(in_array("11", $access_point)):?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
    aria-expanded="false">Admin<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="instituteMaintenance.php">Institute Maintenance</a></li>
        <li><a href="courseMaintenance.php">Programme Maintenance</a></li>
        <li><a href="divisionMaintenance.php">Division Maintenance</a></li>
        <li><a href="bankMaintenance.php">Bank Maintenance</a></li>
        <li><a href="newsBack.php">Training Programme Maintenance</a></li>
        <li><a href="galleryMaintenance.php">Gallery Maintenance</a></li>
        <li><a href="userMaintenance.php">User Maintenance</a></li>
        <li><a href="changePasswordAll.php">Password Manager</a></li>
          <li><a href="rptTraineeUpdateSearch.php">Update Trainee Profile</a></li>

    </ul>
</li>
<?php 
else:?>
<li class="dropdown" style="display: none;>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
aria-expanded="false">Admin<span class="caret"></span></a>
<ul class="dropdown-menu">
    <li><a href="instituteMaintenance.php">Institute Maintenance</a></li>
    <li><a href="courseMaintenance.php">Programme Maintenance</a></li>
    <li><a href="divisionMaintenance.php">Division Maintenance</a></li>
    <li><a href="bankMaintenance.php">Bank Maintenance</a></li>
    <li><a href="newsBack.php">Event Maintenance</a></li>
    <li><a href="galleryBack.php">Gallery Maintenance</a></li>
    <li><a href="userMaintenance.php">User Maintenance</a></li>
    <li><a href="changePasswordAll.php">Password Manager</a></li>
    <li><a href="rptTraineeUpdateSearch.php">Update Trainee Profile</a></li>


</ul>
</li>
<?php endif;?>

<?php 
$access_point = explode(",",$access_point_db);
if(in_array("12", $access_point)):?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
    aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
    <ul class="dropdown-menu">
            <li><a href="changePassword.php">Change Password</a></li>
        </ul>
    </li>
</li>
<?php 
else:?>
<li class="dropdown" style="display: none;>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
<ul class="dropdown-menu">
            <li><a href="changePassword.php">Change Password</a></li>
        </ul>
    </li>
<?php endif;?>

    <li><a href="Logout.php">Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"/> </a></li>


</ul>


            <!--            <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>-->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


<!--

    <nav class="navbar navbar-default navbar-static-top" data-spy="affix"
        data-offset-top="197">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false"></button>
            <a class="navbar-brand" href="#">Mobitel</a>
        </div>

        <div class="collapse navbar-collapse"
            id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="#">Trainee</a>
                    <div class="dropdown-content">
                        <a href="trainee_register.php">Register</a>
                    </div></li>
                <li><a href="attendanceMark.php">Attendance</a></li>
                <li role="presentation"><a href="approvals.php">Approvals <span
                        class="badge">4</span>
                </a></li>

                <li class="dropdown"><a href="deleteBook.php">Reports</a>

                    <div class="dropdown-content">
                        <a href="#">Report 1</a> <a href="#">Report 2</a> <a href="#">Report
                            3</a>
                    </div></li>


                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>

                <li class="dropdown"><a href="#">Admin</a>


                    <div class="dropdown-content">
                        <a href="traineeUpdate.php">Trainee Maintenance</a> <a
                            href="userMaintenance.php">User Maintenance</a> <a
                            class=".dropdown-submenu a.test dropdown-toggle"
                            data-toggle="dropdown" tabindex="-1" href="#"> Event
                            Management<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="instituteMaintenance.php">News
                                    Update</a></li>
                            <li><a tabindex="-1" href="bankMaintenance.php">Gallery
                                    Update</a></li>


                        </ul>

                        <a class=".dropdown-submenu a.test dropdown-toggle"
                            data-toggle="dropdown" tabindex="-1" href="#"> General
                            Maintenance<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="instituteMaintenance.php">Institute
                                    Maintenance</a></li>
                            <li><a tabindex="-1" href="bankMaintenance.php">Bank
                                    Maintenance</a></li>


                        </ul>

                    </div></li>


                <li><a href="deleteBook.php">Logout <span
                        class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>



            </ul>

        </div>
        
    </div>-->


</body>
</html>