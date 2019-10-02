<?php include("db.php"); ?>

<?php

if (isset($_POST["btnSubmit"])) {


// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


// prepare and bind
/*    $stmt = $con->prepare(" INSERT INTO tbl_trainee(Trainee_ID, Title, Full_Name, Name_with_Initials, NIC, Age, Gender, Date_of_Birth,Add_Line1, Add_Line2, Add_Line3,
  Temp_Add_Line1, Temp_Add_Line2, Temp_Add_Line3, Contact_Number1, Contact_Number2, E_Mail, tblTrainingInstituteID,tblCourseID, Batch, tYear, Contact_Person, Contact_number,
  Relationship, Address, tblBankID, Name_as_Bank, Bank_Account_number,flag)  
 VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");

    $stmt->bind_param("sssssissssssssissiisissssiss", $T_id, $Title, $Full_Name, $Name_with_Initials, $NIC, $Age, $Gender, $DOB, $Add_Line1, $Add_Line2, $Add_Line3,
        $Temp_Add_Line1, $Temp_Add_Line2, $Temp_Add_Line3, $Contact_Number1, $Contact_Number2, $E_Mail, $tblTrainingInstituteID, $tblCourseID
        , $Batch, $Year, $Contact_Person, $Contact_number, $Relationship, $Address, $tblBankID, $Name_as_Bank, $Bank_Account_number, $flag);*/

    // set parameters and execute
        
        
//for error msgs
        $T_id_err=$Title_err =$Full_Name_err=$Name_with_Initials_err=$NIC_err=$Age_err=$Gender_err=$DOB_err=$Add_Line1_err=$Add_Line2_err=$Add_Line3_err=$Temp_Add_Line1_err=$Temp_Add_Line2_err=$Temp_Add_Line3_err=$Contact_Number1_err=$Contact_Number2_err=$E_Mail_err=$tblTrainingInstituteID_err=$tblCourseID_err=$Batch_err=$Year_err=$Contact_Person_err=$Contact_number_err=$Relationship_err=$Address_err=$tblBankID_err=$Name_as_Bank_err=$Bank_Account_number_err=$flag_err="";
//data catchiing
        $T_id= $Title =$Full_Name=$Name_with_Initials=$NIC=$Age=$Gender=$DOB=$Add_Line1=$Add_Line2=$Add_Line3=$Temp_Add_Line1=$Temp_Add_Line2=$Temp_Add_Line3=$Contact_Number1=$Contact_Number2=$E_Mail=$tblTrainingInstituteID=$tblCourseID=$Batch=$Year=$Contact_Person=$Contact_number=$Relationship=$Address=$tblBankID=$Name_as_Bank=$Bank_Account_number=$flag="";

        if (empty($_POST["v_trainee_ID"])) {
            $T_id_err = "This value is required.";
        } else if (!preg_match("/^[0-9]+$/", $_POST["v_trainee_ID"])) {
            $T_id_err = "This value should be number.";
        } else {
            $T_id = $_POST["v_trainee_ID"];
        }

        if (empty($_POST["v_title"])) {
            $Title_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_title"])) {
            $Title_err = "This value should be alphanumeric.";
        } else {
            $Title = $_POST["v_title"];
        
        }

        if (empty($_POST["v_fname"])) {
            $Full_Name_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_fname"])) {
            $Full_Name_err = "This value should be alphanumeric.";
        } else {
            $Full_Name = $_POST["v_fname"];
        
        }

        if (empty($_POST["v_initials"])) {
            $Name_with_Initials_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_initials"])) {
            $Name_with_Initials_err = "This value should be alphanumeric.";
        } else {
            $Name_with_Initials = $_POST["v_initials"];
        
        }

        if (empty($_POST["v_nic"])) {
            $NIC_err = "This value is required.";
        } else if(!preg_match("/^[0-9]{9}[x|X|v|V]$/", $_POST["v_nic"])) {
         $NIC_err = "Please Enter valid NIC.";
        } else {
            $NIC = $_POST["v_nic"];
        
        }

        if (empty($_POST["v_age"])) {
            $Age_err = "This value is required.";
        } else if (!preg_match("/^[0-9]+$/", $_POST["v_age"])) {
            $Age_err = "This value should be number.";
        } else {
            $Age = $_POST["v_age"];
        
        }

        if (empty($Gender)) {
            $Gender_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $Gender)) {
            $Gender_err = "This value should be alphanumeric.";
        } else {
            $Gender = "M";
        
        }

        if (empty($_POST["v_dob"])) {
            $DOB_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_dob"])) {
            $DOB_err = "This value should be alphanumeric.";
        } else {
           $DOB = $_POST["v_dob"];
       
        }

        if (empty($_POST["v_add1"])) {
            $Add_Line1_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_add1"])) {
            $Add_Line1_err = "This value should be alphanumeric.";
        } else {
             $Add_Line1 = $_POST["v_add1"];
        
        }

        if (empty($_POST["v_add2"])) {
            $Add_Line2_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_add2"])) {
            $Add_Line2_err = "This value should be alphanumeric.";
        } else {
            $Add_Line2 = $_POST["v_add2"];
        
        }

        if (empty($_POST["v_add3"])) {
            $Add_Line3_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_add3"])) {
            $Add_Line3_err = "This value should be alphanumeric.";
        } else {
            $Add_Line3 = $_POST["v_add3"];
        
        }

        if (empty($_POST["v_tadd1"])) {
            $Temp_Add_Line1_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_tadd1"])) {
            $Temp_Add_Line1_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line1 = $_POST["v_tadd1"];
        
        }

        if (empty($_POST["v_tadd2"])) {
            $Temp_Add_Line2_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_tadd2"])) {
            $Temp_Add_Line2_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line2 = $_POST["v_tadd2"];
        
        }

        if (empty($_POST["v_tadd3"])) {
            $Temp_Add_Line3_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_tadd3"])) {
            $Temp_Add_Line3_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line3 = $_POST["v_tadd3"];
        
        }

        if (empty($_POST["v_mob1"])) {
            $Contact_Number1_err = "This value is required.";
        } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_mob1"]) == 1) {
            $Contact_Number1_err = "This value should be number.";
        } else {
            $Contact_Number1 = $_POST["v_mob1"];
        
        }

        if (empty($_POST["v_fno"])) {
            $Contact_Number2_err = "This value is required.";
        } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_fno"]) == 1) {
            $Contact_Number2_err = "This value should be number.";
        } else {
            $Contact_Number2 = $_POST["v_fno"];
        
        }

        if (empty($_POST["v_email"])) {
            $E_Mail_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_email"])) {
            $E_Mail_err = "This value should be alphanumeric.";
        } else {
            $E_Mail = $_POST["v_email"];
        
        }

        if (empty($_POST["v_institute"])) {
            $tblTrainingInstituteID_err = "This value is required.";
        } else if (!preg_match("/^[0-9]+$/", $_POST["v_institute"])) {
            $tblTrainingInstituteID_err = "This value should be number.";
        } else {
            $tblTrainingInstituteID = $_POST["v_institute"];
        
        }

        if (empty($_POST["v_course"])) {
            $tblCourseID_err = "This value is required.";
        } else if (!preg_match("/^[0-9]+$/", $_POST["v_course"])) {
            $tblCourseID_err = "This value should be number.";
        } else {
            $tblCourseID = $_POST["v_course"];
        
        }

        if (empty($_POST["v_batch"])) {
            $Batch_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_batch"])) {
            $Batch_err = "This value should be alphanumeric.";
        } else {
            $Batch = $_POST["v_batch"];
        
        }

        if (empty($_POST["v_year"])) {
            $Year_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_year"])) {
            $Year_err = "This value should be alphanumeric.";
        } else {
           $Year_err = $_POST["v_year"];
        
        }

        if (empty($_POST["v_con"])) {
            $Contact_Person_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_con"])) {
            $Contact_Person_err = "This value should be alphanumeric.";
        } else {
            $Contact_Person = $_POST["v_con"];
        
        }

        if (empty($_POST["v_conNo"])) {
            $Contact_number_err = "This value is required.";
        } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_conNo"]) == 1) {
            $Contact_number_err = "This value should be number.";
        } else {
            $Contact_number = $_POST["v_conNo"];
        
        }

        if (empty($_POST["v_conRel"])) {
            $Relationship_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_conRel"])) {
            $Relationship_err = "This value should be alphanumeric.";
        } else {
            $Relationship = $_POST["v_conRel"];
        
        }

        if (empty($_POST["v_conAdd"])) {
            $Address_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_conAdd"])) {
            $Address_err = "This value should be alphanumeric.";
        } else {
            $Address = $_POST["v_conAdd"];
        
        }

        if (empty($_POST["v_bank"])) {
            $tblBankID_err = "This value is required.";
        } else if (!preg_match("/^[0-9]+$/", $_POST["v_bank"])) {
            $tblBankID_err = "This value should be number.";
        } else {
            $tblBankID = $_POST["v_bank"];
        
        }

        if (empty($_POST["v_nameBank"])) {
            $Name_as_Bank_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_nameBank"])) {
            $Name_as_Bank_err = "This value should be alphanumeric.";
        } else {
            $Name_as_Bank = $_POST["v_nameBank"];
        
        }

        if (empty($_POST["v_accNO"])) {
            $Bank_Account_number_err = "This value is required.";
        } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_accNO"])) {
            $Bank_Account_number_err = "This value should be alphanumeric.";
        } else {
            $Bank_Account_number = $_POST["v_accNO"];
        
        }

            $flag = "ACTIVE";
        

        if (empty($T_id_err) && empty($Full_Name_err) && empty($Name_with_Initials_err) && empty($NIC_err) && empty($Age_err) && empty($Gender_err) && empty($DOB_err) && empty($Add_Line1_err) && empty($Add_Line2_err) && empty($Add_Line3_err) && empty($Temp_Add_Line1_err) && empty($Temp_Add_Line2_err) && empty($Temp_Add_Line3_err) && empty($Contact_Number1_err) && empty($Contact_Number2_err) && empty($E_Mail_err) && empty($tblTrainingInstituteID_err) && empty($tblCourseID_err) && empty($Batch_err) && empty($Year_err) && empty($Contact_Person_err) && empty($Contact_number_err) && empty($Relationship_err) && empty($Address_err) && empty($tblBankID_err) && empty($Name_as_Bank_err) && empty($Bank_Account_number_err)) {

            $sql = "INSERT INTO tbl_trainee (Trainee_ID, Title, Full_Name, Name_with_Initials, NIC, Age, Gender, Date_of_Birth, Add_Line1, Add_Line2, Add_Line3, Temp_Add_Line1, Temp_Add_Line2, Temp_Add_Line3, Contact_Number1, Contact_Number2, E_Mail, tblTrainingInstituteID, tblCourseID, Batch, tYear, Contact_Person, Contact_number, Relationship, Address, tblBankID, Name_as_Bank, Bank_Account_number, flag)VALUES('$T_id','$Title','$Full_Name','$Name_with_Initials','$NIC','$Age','$Gender','$DOB','$Add_Line1','$Add_Line2','$Add_Line3','$Temp_Add_Line1','$Temp_Add_Line2','$Temp_Add_Line3','$Contact_Number1','$Contact_Number2','$E_Mail','$tblTrainingInstituteID','$tblCourseID','$Batch','$Year','$Contact_Person','$Contact_number','$Relationship','$Address','$tblBankID','$Name_as_Bank','$Bank_Account_number','$flag')";
            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

            $con->close();

        }

    }

    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Home</title>

        <?php include_once("header.php") ?>

    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <br><br><br>
        <div>
            <center>
                <h2>Trainee Registration</h2>
            </center>
        </div>

        <center>
            <form class="form-horizontal" method="post" action="#">
                <!-- personal details -->

                <div class="container col-md-6 col-md-offset-3 ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title ">
                                    <a data-toggle="collapse" href="#collapse1">Personal Details</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">


                                    <div class="form-group">
                                        <label for="inputText1" class="col-sm-4 control-label">Trainee ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="v_trainee_ID" id="v_Trainee_ID"
                                            placeholder="MOB/INOC/">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $T_id_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Title </label>
                                        <div class="col-sm-8">
                                        <select class="form-control" name="v_title" id="v_title">
                                        	<option value="0">SElECT</option>
                                            <option value="1">Mr.</option>
                                            <option value="2">Miss.</option>
                                            <option value="3">Mrs.</option>
                                        </select>
                                            <!--<input type="text" class="form-control" name="v_title" id="v_title"
                                            placeholder="Title">-->
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $Title_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText1" class="col-sm-4 control-label">Full Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="v_fname" id="v_Fname"
                                            placeholder="Full Name">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $Full_Name_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Name with initials </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="v_initials" id="v_initials"
                                            placeholder="Name with initials">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $Name_with_Initials_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText1" class="col-sm-4 control-label">NIC Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="v_nic" id="v_nic"
                                            placeholder="NIC Number">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $NIC_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Date of birth </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="v_dob" id="v_dob"
                                            placeholder="Date of birth">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo $DOB_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Age </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="v_age" id="v_age" placeholder="Age ">
                                        </div>
                                        <?php if (isset($_POST["btnSubmit"])) { ?>

                                        <span class="text-danger"><?php echo  $Age_err; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText2" class="col-sm-4 control-label">Gender </label>
                                        <div class="col-sm-8">
                                            <label>Male </label><input type="radio" name="v_gender" value="M">
                                    <!--                                    <label for="inputText2" class="col-sm-4 control-label">Male </label>

                                        <label for="inputText2" class="col-sm-4 control-label">Female </label>-->
                                        <label>Female </label> <input type="radio" name="v_gender" value="F">

                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Gender_err; ?></span>

                                    <?php } ?>
                                </div>

                                
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Address Line 1 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_add1" id="v_add1"
                                        placeholder="Address Line 1">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Add_Line1_err;?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Address Line 2 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_add2" id="v_add2"
                                        placeholder="Address Line 2">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Add_Line2_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Address Line 3 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_add3" id="v_add3"
                                        placeholder="Address Line 3">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Add_Line3_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 1 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_tadd1" id="v_tadd1"
                                        placeholder="Temp. Address Line 1">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Temp_Add_Line1_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 2 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_tadd2" id="v_tadd2"
                                        placeholder="Temp. Address Line 2">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Temp_Add_Line2_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 3 </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_tadd3" id="v_tadd3"
                                        placeholder="Temp. Address Line 3">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Temp_Add_Line3_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Mobile Number </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_mob1" id="v_mob1"
                                        placeholder="Mobile Number">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Contact_Number1_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">Fixed Number </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="v_fno" id="v_fno"
                                        placeholder="Fixed Number">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $Contact_Number2_err; ?></span>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputText2" class="col-sm-4 control-label">E-mail </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="v_email" id="v_email"
                                        placeholder="E-mail">
                                    </div>
                                    <?php if (isset($_POST["btnSubmit"])) { ?>

                                    <span class="text-danger"><?php echo $E_Mail_err; ?></span>

                                    <?php } ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container col-md-6 col-md-offset-3">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2">Educational
                            Details</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">


                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Institute Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_institute" id="v_institute"
                                    placeholder=" Institute Name">
                                </div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                <span class="text-danger"><?php echo $tblTrainingInstituteID_err; ?></span>

                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Course Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_course" id="v_course"
                                    placeholder="Course Name">
                                </div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                <span class="text-danger"><?php echo $tblCourseID_err; ?></span>

                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Batch </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_batch" id="v_batch"
                                    placeholder="Batch">
                                </div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                <span class="text-danger"><?php echo $Batch_err; ?></span>

                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="inputText2" class="col-sm-4 control-label">Year </label>
                                <div class="col-sm-8">
                                    <input type="month" class="form-control" name="v_year" id="v_year"
                                    placeholder="Year">
                                </div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                <span class="text-danger"><?php echo $Year_err; ?></span>

                                <?php } ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container col-md-6 col-md-offset-3">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse3">Emergency Contact
                        Details</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Person </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_con" id="v_con"
                                placeholder="Contact Person">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Contact_Person_err; ?></span>

                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conNo" id="v_conNo"
                                placeholder="Contact Number">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Contact_number_err; ?></span>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Realationship </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conRel" id="v_conRel"
                                placeholder="Realationship">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Relationship_err; ?></span>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Address </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conAdd" id="v_conAdd"
                                placeholder="Address">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Address_err; ?></span>

                            <?php } ?>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="container col-md-6 col-md-offset-3">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse4">Bank Details</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Bank Name </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_bank" id="v_bank"
                                placeholder="Bank Name">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $tblBankID_err; ?></span>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Name As Bank </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_nameBank" id="v_nameBank"
                                placeholder="Name As Bank">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Name_as_Bank_err; ?></span>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Account Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_accNO" id="v_accNO"
                                placeholder="Account Number">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $Bank_Account_number_err; ?></span>

                            <?php } ?>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <div>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">


    </form>
</center>

</body>
</html>
