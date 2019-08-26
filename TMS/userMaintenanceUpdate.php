<?php include("db.php"); ?>

<?php
$txtBankCode = $txtBankName = $msg = $msger = "";

$sql = "SELECT * FROM tbl_user WHERE tbl_userID='" . $_GET['id'] . "'";
$trainee_data = $con->query($sql);

if ($trainee_data->num_rows == 1) {
    $row = mysqli_fetch_assoc($trainee_data);
    $txtID = $row['userID'];
    $txtUName = $row['username'];
    $txtUType = $row['user_type'];
    $txtStatus = $row['flag'];

}

if (isset($_GET["idStatus"])) {

    $sql = "UPDATE tbl_user SET flag='" . "INACTIVE" . "'WHERE tbl_userID ='" . $_GET["idStatus"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactive";
        header("Location:userMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_GET["idStatus1"])) {

    $sql = "UPDATE tbl_user SET flag='" . "ACTIVE" . "'WHERE tbl_userID ='" . $_GET["idStatus1"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully inactive";
        header("Location:userMaintenance.php");

    } else {
        $msger = "Some error occured. Please try again";
    }
}


if (isset($_POST["btnSubmit"])) {

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    echo $_POST["v_Bank_Code"];
    echo $_GET["id"];

    $sql = "UPDATE tbl_user SET username='" . $_POST["v_UName"] . "',new_password='" . $_POST["v_NewPass"] . "' , old_password='" . $_POST["v_OldPass"] . "' 
      , user_type='" . $_POST["v_UType"] . "'  WHERE tbl_userID ='" . $_GET["id"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully updated";


    } else {
        $msger = "Some error occured. Please try again";
    }

}

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>User Maintenance</title>


    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>User Maintenance</h2>
    </center>
</div>


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
                            <label for="inputText2" class="col-sm-4 control-label">User Id</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_Uid" id="v_Uid">
                                    <option value="" selected="selected"><?php echo $txtID; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                                <input type="pass" class="form-control" name="v_UName" id="v_UName"
                                       placeholder="Enter User name" value="<?php echo $txtUName; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="v_OldPass" id="v_OldPass"
                                       placeholder="Enter Old Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="v_NewPass" id="v_NewPass"
                                       placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">User Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_UType" id="v_UType">
                                    <option value="" selected="selected"><?php echo $txtUType; ?></option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div>
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">

        </div>
    </form>

</center>
</body>
</html>