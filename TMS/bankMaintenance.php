<?php include("db.php"); ?>
 
<?php

$error = $error1 = "";
$Bank_Code_err = $Bank_Name_err = "";

if (isset($_POST["btnSubmit"])) {

    // set parameters and execute
    $Bank_Code = $_POST["v_Bank_Code"];
    $Bank_Name = $_POST["v_Bank_Name"];
    $flag = "ACTIVE";

    $sql = "SELECT * FROM `tbl_bank` WHERE Bank_Name='" . $Bank_Name . "'";
    $resultSet = $con->query($sql);


    if (empty($Bank_Code)) {
        $Bank_Code_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\,\/]+$/", $Bank_Code)) {

        $Bank_Code_err ='Invalid Bank Code (eg." '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } else {
        $Bank_Code = $_POST["v_Bank_Code"];
    }

    if (empty($Bank_Name)) {
        $Bank_Name_err = "This value is required.";
    } else if (!preg_match("/^[a-zA-Z0-9\(\)\.\_\s\-\,\'\/]+$/", $Bank_Name)) {

        $Bank_Name_err ='Invalid Bank Name (eg." |;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';
    } else {
        $Bank_Name = $_POST["v_Bank_Name"];
    }

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


    if (empty($Bank_Code_err) && empty($Bank_Name_err)) {
        if ($resultSet->num_rows >= 1) {
            $error = "Bank already exist";

        } else {

            // prepare and bind
            $stmt = $con->prepare("INSERT INTO tbl_bank( Bank_Code, Bank_Name,flag) VALUES ( ?,?,? ) ");

            $stmt->bind_param("sss", $Bank_Code, $Bank_Name, $flag);

            $stmt->execute();

            $error1 = "New bank added successfully";

            $stmt->close();
            $con->close();

        }

    }

}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Bank Maintenance</title>
    <?php include("header.php") ?>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
<div>
    <center>
        <h2>Bank Maintenance</h2>
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
                            Bank Details
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
                                <label for="inputText2" class="col-sm-4 control-label">Bank Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Bank_Code"
                                           id="v_Bank_Code"
                                           placeholder="Enter Bank Short Name" onblur="this.value=this.value.toUpperCase()" autofocus="autofocus"
                                           value=<?php if (isset($_POST['btnSubmit'])) {
                                               echo $_POST['v_Bank_Code'];
                                           } ?>>

                                           <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Bank_Code_err; ?></span>

                                <?php } ?>

                                </div>
                                
                            </div>


                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Bank Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Bank_Name"
                                           id="v_Bank_Name"
                                           placeholder="Enter Bank Name" onblur="this.value=this.value.toUpperCase()" value="<?php if (isset($_POST['btnSubmit'])) {
                                        echo $_POST['v_Bank_Name'];
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
                <th>Bank Code</th>
                <th>Bank Name</th>
                <th>Status</th>
                <th>Update</th>


            </tr>

            <?php
            $sql = "SELECT * FROM tbl_bank";
            $bank_data = $con->query($sql);

            if ($bank_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($bank_data)) :?>
                    <tr>
                        <td><?php echo $row['tblBankID']; ?></td>
                        <td><?php echo $row['Bank_Code']; ?></td>
                        <td><?php echo $row['Bank_Name']; ?></td>
                        <td><?php echo $row['flag']; ?></td>

                        <td>
                            <a href='bankMaintenanceUpdate.php?id=<?php echo $row["tblBankID"] ?>'
                               class="btn btn-primary btn-xs">&nbsp;Click Here</a>
                        </td>
                        <td>
                            <a href='bankMaintenanceUpdate.php?idStatus=<?php echo $row["tblBankID"] ?>'
                               class="btn btn-danger btn-xs">Inactive</a>
                        </td>
                        <td>
                            <a href='bankMaintenanceUpdate.php?idStatus1=<?php echo $row["tblBankID"] ?>'
                               class="btn btn-success btn-xs">Active</a>
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