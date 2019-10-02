<?php include("db.php"); ?>
 
<?php

$error = $error1 = "";
$Bank_Code_err = $Bank_Name_err = "";

if (isset($_POST["btnSubmit"])) {

    // set parameters and execute
    $RFID = $_POST["v_RFID"];
    $Trainee_ID = $_POST["v_Trainee_ID"];
    $flag = "ACTIVE";
    $T_id_a = 'MOB/TR/'. +$Trainee_ID;

    $sql = "SELECT * FROM `tbl_rfid` WHERE rfid_Code='" . $RFID. "'";
    $resultSet = $con->query($sql);


    if (empty($RFID)) {
        $Bank_Code_err = "This value is required.";
    } else if (!preg_match("/^[0-9]+$/", $RFID)) {

        $Bank_Code_err ='Invalid RFID (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else {
        $RFID = $_POST["v_RFID"];
    }

    if (empty($Trainee_ID)) {
        $Bank_Name_err = "This value is required.";
    } else if (!preg_match("/^[0-9]+$/", $Trainee_ID)) {

        $Bank_Name_err ='Invalid Trainee ID (eg." |;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else {
        $Trainee_ID = $_POST["v_Trainee_ID"];
    }

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


    if (empty($Bank_Code_err) && empty($Bank_Name_err)) {
        if ($resultSet->num_rows >= 1) {
            $error = "RFID already exist";

        } else {

            // prepare and bind
            $stmt = $con->prepare("INSERT INTO tbl_rfid( rfid_Code, rfid_user_ID,flag) VALUES ( ?,?,? ) ");

            $stmt->bind_param("sss", $RFID,  $T_id_a, $flag);

            $stmt->execute();

            $error1 = "New RFID added successfully";

            $stmt->close();
            $con->close();

        }

    }

}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>RFID Maintenance</title>
    <?php include("header.php") ?>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>RFID Maintenance</h2>
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
                            NEW RFID
                        </h4>
                    </div>
                    <div>
                        <div class="panel-body">

                            <!--                            --><?php //if (!empty($error)) { ?>
                            <!--                                --><?php //echo $error; ?><!----><?php //} ?>

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
                                <label for="inputText2" class="col-sm-4 control-label">RFID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_RFID"
                                           id="v_RFID"
                                           placeholder="Enter New RFID" onblur="this.value=this.value.toUpperCase()" autofocus="autofocus"
                                           value=<?php if (isset($_POST['btnSubmit'])) {
                                               echo $_POST['v_RFID'];
                                           } ?>>

                                           <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Bank_Code_err; ?></span>

                                <?php } ?>

                                </div>
                                
                            </div>


                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Trainee ID </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Trainee_ID"
                                           id="v_Trainee_ID"
                                           placeholder="Enter Trainee ID" onblur="this.value=this.value.toUpperCase()" value="<?php if (isset($_POST['btnSubmit'])) {
                                        echo $_POST['v_Trainee_ID'];
                                    } ?>">

                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Bank_Name_err; ?></span>

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

        </div>
    </form>
</center>


<form action="RegisterAction">
    <div class="container col-md-8 col-md-offset-2">
        <br>
        <br>

        <table class="table table-hover table-bordered ">
            <tr>
                <th>#</th>
                <th>RFID</th>
                <th>Trainee ID</th>
                <th>Status</th>
                <th>Update</th>


            </tr>

            <?php
            $sql = "SELECT * FROM tbl_rfid";
            $bank_data = $con->query($sql);

            if ($bank_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($bank_data)) :?>
                    <tr>
                        <td><?php echo $row['tblrfidID']; ?></td>
                        <td><?php echo $row['rfid_Code']; ?></td>
                        <td><?php echo $row['rfid_user_ID']; ?></td>
                        <td><?php echo $row['flag']; ?></td>

                       
                        <td>
                            <a href='rfidMaintenanceUpdate.php?idStatus=<?php echo $row["tblrfidID"] ?>'
                               class="btn btn-danger btn-xs">deactive</a>
                        </td>
                        <td>
                            <a href='rfidMaintenanceUpdate.php?idStatus1=<?php echo $row["tblrfidID"] ?>'
                               class="btn btn-success btn-xs">ReActive</a>
                        </td>
                    </tr>
                    <?php
                endwhile;
            } ?>
        </table>


    </div>
</form>

</body>
</html>