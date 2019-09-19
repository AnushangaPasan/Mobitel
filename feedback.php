<?php include("db.php"); ?>
<?php



if (isset($_POST["btnSubmit"])) {


// $sql2 = "INSERT INTO Pasan (pasan)
//  VALUES('1')";
 if ($con->query($sql1) === TRUE) {

    $error2 = "New Trainee added successfully";}
{
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
/*$sql = "SELECT * FROM tbl_trainee WHERE NIC='" . $_POST['v_nic'] . "'";*/
//$sql1 = "UPDATE * FROM feed1 ";
$sql1 = "SELECT * FROM feed1 WHERE Trainee_ID='0' ";


// set parameters and execute

$msg_success = $error =$error1 = $error2 = $error3 =$error4 =   "";
//for error msgs
$allerror = $T_id_err = $Title_err = $Full_Name_err = $Name_with_Initials_err = $NIC_err = $Age_err = $Gender_err = $DOB_err = $Add_Line1_err = $Add_Line2_err = $Add_Line3_err = $Temp_Add_Line1_err = $Temp_Add_Line2_err = $Temp_Add_Line3_err = $Contact_Number1_err = $Contact_Number2_err = $E_Mail_err = $tblTrainingInstituteID_err = $ProgramName_err = $tblCourseID_err = $Batch_err = $Year_err = $Contact_Person_err = $Contact_number_err = $Relationship_err = $Address_err = $tblBankID_err = $Name_as_Bank_err = $Bank_Account_number_err = $flag_err = $branch_err = "";
//data catchiing
$T_id = $Title = $Full_Name = $Name_with_Initials = $NIC = $Age = $Gender = $DOB = $Add_Line1 = $Add_Line2 = $Add_Line3 = $Temp_Add_Line1 = $Temp_Add_Line2 = $Temp_Add_Line3 = $Contact_Number1 = $Contact_Number2 = $E_Mail = $tblTrainingInstituteID = $ProgramName = $tblCourseID = $Batch = $Year = $Contact_Person = $Contact_number = $Relationship = $Address = $tblBankID = $Name_as_Bank = $Bank_Account_number = $flag = $branch ="";

if (empty($_POST["v_Trainee_ID"])) {
    $T_id_err = "This value is required.";
} else if (!preg_match("/^\w+( \w+)*[a-zA-Z/0-9]+$/", $_POST["v_Trainee_ID"])) {
    $T_id_err = "This value should be number.";
} else if (strlen($_POST["v_Trainee_ID"]) > 4) {
    $err_comment = "Id too long. It should less than 4 characters.";
} else {
    $T_id = $_POST["v_Trainee_ID"];
}








if (empty($T_id_err) && empty($Full_Name_err) && empty($Name_with_Initials_err) && empty($NIC_err) && empty($Age_err) && empty($Gender_err) && empty($DOB_err) && empty($Add_Line1_err) && empty($Add_Line2_err) && empty($Add_Line3_err) && empty($Temp_Add_Line1_err) && empty($Temp_Add_Line2_err) && empty($Temp_Add_Line3_err) && empty($Contact_Number1_err) && empty($Contact_Number2_err) && empty($E_Mail_err) && empty($tblTrainingInstituteID_err) && empty($ProgramName_err) && empty($tblCourseID_err) && empty($Batch_err) && empty($Year_err) && empty($Contact_Person_err) && empty($Contact_number_err) && empty($Relationship_err) && empty($Address_err) && empty($tblBankID_err) && empty($Name_as_Bank_err) && empty($Bank_Account_number_err) && empty($flag_err) && empty($Branch_err) && empty($error4) && empty($error) && empty($error) && empty($error)) {

    if ($resultSet->num_rows >= 1) {
        $error1 = "Trainee already exist";

    } else {
        //     if (empty($T_id_err) && empty($Full_Name_err) && empty($Name_with_Initials_err) && empty($NIC_err) && empty($Age_err) && empty($Gender_err) && empty($DOB_err) && empty($Add_Line1_err) && empty($Add_Line2_err) && empty($Add_Line3_err) && empty($Temp_Add_Line1_err) && empty($Temp_Add_Line2_err) && empty($Temp_Add_Line3_err) && empty($Contact_Number1_err) && empty($Contact_Number2_err) && empty($E_Mail_err) && empty($tblTrainingInstituteID_err) && empty($tblCourseID_err) && empty($Batch_err) && empty($Year_err) && empty($Contact_Person_err) && empty($Contact_number_err) && empty($Relationship_err) && empty($Address_err) && empty($tblBankID_err) && empty($Name_as_Bank_err) && empty($Bank_Account_number_err)) {

echo $ProgramName;

        $sql1 = "INSERT INTO feed1 (Trainee_ID)
        VALUES('$T_id')";

        if ($con->query($sql1) === TRUE) {

           $error2 = "New Trainee added successfully";

            

        } else {
            echo "Error: " . $sql1 . "<br>" . $con->error;
        }

        $con->close();

    }

}

}

}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Training Programms</title>

    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br><br>
    <div>
        <center>
            <h2>EVEALUTION OF TRAINING EFFECTIVENESS</h2></center>
            <br>
     
            
            
            <div class="panel-body" method="post">
                                    <div class="form-group">
                                        <label for="inputText1" >TRAINING PROGRAM ID </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">MOB/TR/</div>
                                            <input type="text" class="form-control" name="v_Trainee_ID" id="v_Trainee_ID"
                                            placeholder="Trainee ID" autofocus="autofocus" value="<?php if (isset($_POST['btnSubmit'])) {
                                        echo $_POST['v_Trainee_ID'];    } ?>">

</div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Full_Name_err; ?></span>

                                <?php } ?>


                                            

                                        </div>
                                        </div></div>
                                        
    </div>

   
    <div class="panel-body" method="post">
                                    <div class="form-group">
                                        <label for="inputText1" >TRAINING PROGRAM DONE BY </label>
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control" name="f_traineeId" id="done"
                                             >


                                            

                                        </div>
                                        </div></div></div>
            <center>
            <h4>This questionnaire is given to you with the purpose of giving your training engineer a chance for assessing the effectiveness of training and to use for the improvement of the quality of the training .</h4>
            </center>
            <br>
            <center>
            <p>Rank each item using following scale:- 5 = strongly agree 4 = agree  3= don’t know (Neutral)    2 = disagree   1= strong disagree                    
                                                                                                         
</p>
</center>

    <div class="container col-md-10 col-md-offset-1" method="post">
        <table class="table table-hover table-bordered ">
            <tr>
                <th>Item No</th>
                <th>Item Description</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
                
            </tr>

            <tbody>

              <?php
                $rowcount=1;
              $sql = "SELECT *  FROM tbl_feed  ";
              $feed_data = $con->query($sql);


              if ($feed_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($feed_data)) :?>
                <tr>
                    <td><?php echo $rowcount++; ?></td>
                    <td><?php echo  $row['dis']; ?></td>
                    <td><input type="checkbox" class="btn btn-warning btn-lg btn-block" name="btnSubmit" value="<?php if (isset($_POST['btnSubmit'])) {
                                        echo $_POST['5'];
                                    } ?>">
                                      <?php if (isset($_POST["btnSubmit"])) { ?>

<span class="text-danger"><?php echo $Bank_Account_number_err; ?></span>

<?php } ?>
                                    
                                    </td>
                    <td><input type="checkbox" class="btn btn-warning btn-lg btn-block" name="1" value="Approve"></td>
                    <td><input type="checkbox" class="btn btn-warning btn-lg btn-block" name="btnSubmit1" value="Approve"></td>
                    <td><input type="checkbox" class="btn btn-warning btn-lg btn-block" name="btnSubmit1" value="Approve"></td>
                    <td><input type="checkbox" class="btn btn-warning btn-lg btn-block" name="btnSubmit1" value="Approve"></td>

                   
                 </tr>
                 <?php
             endwhile;
         } ?>



     </tbody>
 </table>
 <input type="submit" class="btn btn-warning btn-lg btn-block" name="btnSubmit" value="SUBMIT" >
 <br><br>
            <br>
</div>



</body>
</html>