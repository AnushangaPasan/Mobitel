<?php include("db.php"); ?>
<?php

$msg = $msger = "";


$sql = "SELECT * FROM tbl_trainee WHERE flag!='PENDING' ";
$result = mysqli_query($con, $sql);
$count1 = mysqli_num_rows($result)+4943;
$T_id_app = 'MOB/TR/' . ++$count1;

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Approvals</title>

    <?php include("header.php");
    ?>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<br><br><br>
<div>
    <center>
        <h2>Trainee Approvals</h2>
        <div class="input-group">
            <div class="alert alert-info " role="alert"><label>Next availabel ID :
                    &nbsp;</label></label><?php echo $T_id_app ?></div>
        </div>

    </center>
</div>

<center>
    <form action="traineeApproval.php">
        <div class="container col-md-10 col-md-offset-1">

            <table class="table table-hover table-bordered ">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                    <th>Institute Name</th>
                    <th>Contact No</th>
                    <th>Approve</th>
                    <th>Decline</th>


                </tr>
                <tbody>

                <?php
                $sql = "SELECT *  FROM tbl_trainee WHERE flag='" . "PENDING" . "' ";

                $aprrove_data = $con->query($sql);


                if ($aprrove_data->num_rows >= 1) {
                    while ($row = mysqli_fetch_assoc($aprrove_data)) :?>
                        <tr>
                            <td><?php echo $row['tblTraineeID']; ?></td>
                            <td><?php echo $row['Name_with_Initials']; ?></td>
                            <td><?php echo $row['NIC']; ?></td>
                            <td><?php echo $row['Add_Line3']; ?></td>
                            <td><?php $tblTrainingInstituteID=$row['tblTrainingInstituteID']; 

                                $sql1 = "SELECT *  FROM tbl_institute WHERE tblTrainingInstituteID='$tblTrainingInstituteID' ";
                                        $instituteTemp_data = $con->query($sql1);

                                                if ($instituteTemp_data->num_rows == 1) {
                                                    $row1 = mysqli_fetch_assoc($instituteTemp_data);

                                                 echo $row1['TrainingInstitute_Name'];
                                                }


                            ?></td>
                            <td><?php echo $row['Contact_Number1']; ?></td>


                            <td>
                                <a href='traineeApproval.php?id=<?php echo $row["tblTraineeID"] ?>'
                                   class="btn btn-primary btn-xs">Click Here</a>
                            </td>
                            <td>
                                <a href='traineeApproval.php?idDec=<?php echo $row["tblTraineeID"] ?>'
                                   class="btn btn-danger btn-xs">Click Here</a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                } ?>

                </tbody>

            </table>
        </div>
    </form>
</center>


</body>
</html>