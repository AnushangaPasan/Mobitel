<?php include("db.php"); ?>
<?php


//for error msgs
$allerror = $T_id_err = $Title_err = $Full_Name_err = $Name_with_Initials_err = $NIC_err = $Age_err = $Gender_err = $DOB_err = $Add_Line1_err = $Add_Line2_err = $Add_Line3_err = $Temp_Add_Line1_err = $Temp_Add_Line2_err = $Temp_Add_Line3_err = $Contact_Number1_err = $Contact_Number2_err = $E_Mail_err = $tblTrainingInstituteID_err = $ProgramName_err = $tblCourseID_err = $Batch_err = $Year_err = $Contact_Person_err = $Contact_number_err = $Relationship_err = $Address_err = $tblBankID_err = $Name_as_Bank_err = $Bank_Account_number_err = $flag_err = $Branch_err = $joinDate_err = $endDate_err = $salary_err = "";


$T_id = $Title = $Full_Name = $Name_with_Initials = $NIC = $Age = $Gender = $DOB = $Add_Line1 = $Add_Line2 = $Add_Line3 = $Temp_Add_Line1 = $Temp_Add_Line2 = $Temp_Add_Line3 = $Contact_Number1 = $Contact_Number2 = $E_Mail = $tblTrainingInstituteID = $tblCourseID = $Batch = $Year = $Contact_Person = $Contact_number = $Relationship = $Address = $tblBankID = $Name_as_Bank = $Bank_Account_number = $flag = $jdate = $edate = $salary = $v_Trainee_ID = $programName = $branch = $jdate2 = $edate2 = $job = $tblDivisionID = "";


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$sql = "SELECT * FROM tbl_trainee";
$result = mysqli_query($con, $sql);
$count1 = mysqli_num_rows($result);
$nextID = ++$count1;
$T_id_app = 'MOB/TR/' . $nextID;

$TIDnew = $_POST["v_Trainee_ID"];
if (isset($_POST["btnSearch"])) {
    $TIDnew = $_POST["v_Trainee_ID"];
    echo $TIDnew;

    $sql = "SELECT *  FROM tbl_trainee WHERE Trainee_ID='" . $TIDnew . "' ";
    $traineeTemp_data = $con->query($sql);

    if ($traineeTemp_data->num_rows == 1) {
        $row = mysqli_fetch_assoc($traineeTemp_data);

        $T_id = $row['tblTraineeID'];
        $T_id2 = $row['Trainee_ID'];
        $Title = $row['Title'];
        $Full_Name = $row['Full_Name'];
        $Name_with_Initials = $row['Name_with_Initials'];
        $NIC = $row['NIC'];
        $Age = $row['Age'];
        $Gender = $row['Gender'];
        $DOB = $row['Date_of_Birth'];
        $Add_Line1 = $row['Add_Line1'];
        $Add_Line2 = $row['Add_Line2'];
        $Add_Line3 = $row['Add_Line3'];
        $Temp_Add_Line1 = $row['Temp_Add_Line1'];
        $Temp_Add_Line2 = $row['Temp_Add_Line2'];
        $Temp_Add_Line3 = $row['Temp_Add_Line3'];
        $Contact_Number1 = $row['Contact_Number1'];
        $Contact_Number2 = $row['Contact_Number2'];
        $E_Mail = $row['E_Mail'];
        $tblTrainingInstituteID = $row['tblTrainingInstituteID'];
        $tblCourseID = $row['tblCourseID'];
        $Batch = $row['Batch'];
        $Year = $row['tYear'];
        $Contact_Person = $row['Contact_Person'];
        $Contact_number = $row['Contact_number'];
        $Relationship = $row['Relationship'];
        $Address = $row['Address'];
        $tblBankID = $row['tblBankID'];
        $Name_as_Bank = $row['Name_as_Bank'];
        $Bank_Account_number = $row['Bank_Account_number'];
        $flag = $row['flag'];
        $branch = $row['bankBranch'];
        $programName = $row['programName'];
        $image = $row['profile_img'];
        $image1 = $row['cv_img'];
        $job = $row['job_type'];
        $jdate = $row['jdate'];
        $jdate1 = explode(" ", $jdate);
        $jdate2 = $jdate1[0];

        $edate = $row['edate'];
        $edate1 = explode(" ", $edate);
        $edate2 = $edate1[0];

        $tblDivisionID = $row['tblDivisionID'];


    }


}


if (isset($_POST["btnSubmit"])) {


    header("Location:traineeApproval.php");


}

$con->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trainee update</title>
    <?php include_once("header.php") ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br>
<br>
<br>
<div>
    <center>
        <h2>View Trainee Details</h2>
    </center>
</div>
<center>
    <form class="form-horizontal" method="post" action="">
        <!-- personal details -->
        <div class="container col-md-6 col-md-offset-3">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Select Trainee ID</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Trainee ID </label>
                            <div class="col-sm-8">
                                <!--  <input type="text" class="form-control" name="v_bank" id="v_bank"
              placeholder="Bank Name" value="<?php echo $tblBankID; ?>">-->
                                <select class="form-control" name="v_Trainee_ID" id="v_Trainee_ID">
                                    <option>--SELECT--</option>
                                    <?php
                                    $sql = "SELECT *  FROM tbl_trainee WHERE flag='" . ACTIVE . "'  ORDER BY Trainee_ID ";
                                    $TID_data = $con->query($sql);
                                    if ($TID_data->num_rows >= 1) :

                                        while ($row = mysqli_fetch_assoc($TID_data)) :?>
                                            <option value="<?= $row["Trainee_ID"] ?>"><?= $row["Trainee_ID"] ?></option>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </select>

                            </div>
                            <!-- <?php if (isset($_POST["btnSubmit"])) { ?>
<span class="text-danger"><?php echo $tblBankID_err; ?></span>
<?php } ?> -->
                        </div>

                        <div class="form-group col-md-3 ">
                            <input class="btn btn-success btn-lg btn-block" type="submit" name="btnSearch"
                                   value="SEARCH">
                        </div>
                        <a href='traineeApproval.php?id=<?php echo $row["Trainee_ID"]; ?>'
                           class="btn btn-primary btn-xs">Click Here</a>
                    </div>


                </div>

            </div>
        </div>


    </form>


    <!-- <input type="submit" class="btn btn-success btn-lg btn-block" name="btnSubmit" value="UPDATE">
    -->
</center>
</body>
</html>