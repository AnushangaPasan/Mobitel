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

            $msg_success = $error="";
//for error msgs
            $T_id_err = $Title_err = $Full_Name_err = $Name_with_Initials_err = $NIC_err = $Age_err = $Gender_err = $DOB_err = $Add_Line1_err = $Add_Line2_err = $Add_Line3_err = $Temp_Add_Line1_err = $Temp_Add_Line2_err = $Temp_Add_Line3_err = $Contact_Number1_err = $Contact_Number2_err = $E_Mail_err = $tblTrainingInstituteID_err = $tblCourseID_err = $Batch_err = $Year_err = $Contact_Person_err = $Contact_number_err = $Relationship_err = $Address_err = $tblBankID_err = $Name_as_Bank_err = $Bank_Account_number_err = $flag_err = "";
//data catchiing
            $T_id = $Title = $Full_Name = $Name_with_Initials = $NIC = $Age = $Gender = $DOB = $Add_Line1 = $Add_Line2 = $Add_Line3 = $Temp_Add_Line1 = $Temp_Add_Line2 = $Temp_Add_Line3 = $Contact_Number1 = $Contact_Number2 = $E_Mail = $tblTrainingInstituteID = $tblCourseID = $Batch = $Year = $Contact_Person = $Contact_number = $Relationship = $Address = $tblBankID = $Name_as_Bank = $Bank_Account_number = $flag = "";

            if (empty($_POST["v_trainee_ID"])) {
                $T_id_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z/0-9]+$/", $_POST["v_trainee_ID"])) {
                $T_id_err = "This value should be number.";
            } else if (strlen($_POST["v_trainee_ID"]) > 15) {
                $err_comment = "Id too long. It should less than 15 characters.";
            } else {
                $T_id = $_POST["v_trainee_ID"];
            }
			
 			$selectOption = $_POST['v_title'];
 
            if ($selectOption==0) {
                $Title_err = "Please select title .";
            } else if ($selectOption==1) {
                $Title = 'Mr.';
            } else if ($selectOption==2) {
                $Title = 'Miss.';
            } else if ($selectOption==3) {
                $Title = 'Mrs.';
            }

            if (empty($_POST["v_fname"])) {
                $Full_Name_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]{2,250}$/", $_POST["v_fname"])) {
                $Full_Name_err = "This value should be alphanumeric.";
            } else if (strlen($_POST["v_title"]) > 6) {
                $err_comment = "Id too long. It should less than 6 characters.";
            } else {
                $Full_Name = $_POST["v_fname"];

            }

            if (empty($_POST["v_initials"])) {
                $Name_with_Initials_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z.]+$/", $_POST["v_initials"])) {
                $Name_with_Initials_err = "This value should be alphanumeric.";
            } else {
                $Name_with_Initials = $_POST["v_initials"];

            }

            if (empty($_POST["v_nic"])) {
                $NIC_err = "This value is required.";
            } else if(!preg_match("/^[0-9]{9}[x|X|v|V]$/", $_POST["v_nic"])) {
         $NIC_err = "Please Enter valid NIC.";
        }  else {
                $NIC = $_POST["v_nic"];

            }

            if (empty($_POST["v_age"])) {
                $Age_err = "This value is required.";
            } else if (!preg_match("/^[0-9]+$/", $_POST["v_age"])) {
                $Age_err = "This value should be number.";
            } else if (!preg_match("/^[0-9]{2,3}$/", $_POST["v_age"])) {
                $Age_err = "Age wrong";
            }else {
                $Age = $_POST["v_age"];

            }



            if (empty($_POST["v_dob"])) {
                $DOB_err = "This value is required.";
            } else {
                $DOB = $_POST["v_dob"];
            }

            if (empty($_POST["v_add1"])) {
                $Add_Line1_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_add1"])) {
                $Add_Line1_err = "This value should be alphanumeric.";
            } else {
                $Add_Line1 = $_POST["v_add1"];

            }

            if (empty($_POST["v_add2"])) {
                $Add_Line2_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_add2"])) {
                $Add_Line2_err = "This value should be alphanumeric.";
            } else {
                $Add_Line2 = $_POST["v_add2"];

            }

            if (empty($_POST["v_add3"])) {
                $Add_Line3_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_add3"])) {
                $Add_Line3_err = "This value should be alphanumeric.";
            } else {
                $Add_Line3 = $_POST["v_add3"];

            }

            if (empty($_POST["v_tadd1"])) {
                $Temp_Add_Line1_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_tadd1"])) {
                $Temp_Add_Line1_err = "This value should be alphanumeric.";
            } else {
                $Temp_Add_Line1 = $_POST["v_tadd1"];

            }

            if (empty($_POST["v_tadd2"])) {
                $Temp_Add_Line2_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_tadd2"])) {
                $Temp_Add_Line2_err = "This value should be alphanumeric.";
            } else {
                $Temp_Add_Line2 = $_POST["v_tadd2"];

            }

            if (empty($_POST["v_tadd3"])) {
                $Temp_Add_Line3_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_tadd3"])) {
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
            } else if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST["v_batch"])) {
                $Batch_err = "This value should be alphanumeric.";
            } else {
                $Batch = $_POST["v_batch"];

            }

            if (empty($_POST["v_year"])) {
                $Year_err = "This value is required.";
            } else if (!preg_match("/^[0-9]+$/", $_POST["v_year"])) {
                $Year_err = "This value should be alphanumeric.";
            } else {
                $Year = $_POST["v_year"];

            }

            if (empty($_POST["v_con"])) {
                $Contact_Person_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_con"])) {
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
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_conRel"])) {
                $Relationship_err = "This value should be alphanumeric.";
            } else {
                $Relationship = $_POST["v_conRel"];

            }

            if (empty($_POST["v_conAdd"])) {
                $Address_err = "This value is required.";
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_conAdd"])) {
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
            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]+$/", $_POST["v_nameBank"])) {
                $Name_as_Bank_err = "This value should be alphanumeric.";
            } else {
                $Name_as_Bank = $_POST["v_nameBank"];

            }

            if (empty($_POST["v_accNO"])) {
                $Bank_Account_number_err = "This value is required.";
            } else if (!preg_match("/^[0-9]+$/", $_POST["v_accNO"])) {
                $Bank_Account_number_err = "This value should be alphanumeric.";
            } else {
                $Bank_Account_number = $_POST["v_accNO"];

            }

            $flag = "PENDING";
            $image = $image1= $target =$target1="";
            /*Img upload*/
            $maxsize = 2097152;

            $fileName = $_FILES['image']['name'];
            $fileTmpLoc = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $fileSize = $_FILES['image']['size'];
            $fileErrorMsg = $_FILES["image"]['error'];

            if ($fileSize >= $maxsize || $fileSize == 0) {

                if ($fileSize >= $maxsize) {
                    $error = "Your image file was larger than 2MB";
                }

                if ($fileSize == 0) {
                    $error = "Please select image";
                }

            } else if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
                $error = "Your image file was not jpg, jpeg, gif or png type";

            } else if (strlen($fileName) >= 50) {
                $error = "File name less than 50 character";

            } else if (!preg_match("/^[a-zA-Z0-9\.\_\s\-]+$/", $fileName)) {
                $error = "Invalid file name";

            } else {

                $image = $_FILES['image']['name'];
                $target = "images/" . basename($_FILES['image']['name']);

            }


            $fileName1 = $_FILES['image1']['name'];
            $fileTmpLoc1 = $_FILES['image1']['tmp_name'];
            $fileType1 = $_FILES['image1']['type'];
            $fileSize1 = $_FILES['image1']['size'];
            $fileErrorMsg1 = $_FILES["image1"]['error'];

            if ($fileSize1 >= $maxsize || $fileSize1 == 0) {

                if ($fileSize1 >= $maxsize) {
                    $error = "Your image file was larger than 2MB";
                }

                if ($fileSize1 == 0) {
                    $error = "Please select image";
                }

            } else if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName1)) {
                $error = "Your image file was not jpg, jpeg, gif or png type";

            } else if (strlen($fileName1) >= 50) {
                $error = "File name less than 50 character";

            } else if (!preg_match("/^[a-zA-Z0-9\.\_\s\-]+$/", $fileName1)) {
                $error = "Invalid file name";

            } else {

                $image1 = $_FILES['image1']['name'];
                $target1 = "images/" . basename($_FILES['image1']['name']);


            }


    //     if (empty($T_id_err) && empty($Full_Name_err) && empty($Name_with_Initials_err) && empty($NIC_err) && empty($Age_err) && empty($Gender_err) && empty($DOB_err) && empty($Add_Line1_err) && empty($Add_Line2_err) && empty($Add_Line3_err) && empty($Temp_Add_Line1_err) && empty($Temp_Add_Line2_err) && empty($Temp_Add_Line3_err) && empty($Contact_Number1_err) && empty($Contact_Number2_err) && empty($E_Mail_err) && empty($tblTrainingInstituteID_err) && empty($tblCourseID_err) && empty($Batch_err) && empty($Year_err) && empty($Contact_Person_err) && empty($Contact_number_err) && empty($Relationship_err) && empty($Address_err) && empty($tblBankID_err) && empty($Name_as_Bank_err) && empty($Bank_Account_number_err)) {

            $sql = "INSERT INTO tbl_trainee (Title, Full_Name, Name_with_Initials, NIC, Age, Gender, Date_of_Birth, Add_Line1, Add_Line2, Add_Line3, Temp_Add_Line1, Temp_Add_Line2, Temp_Add_Line3, Contact_Number1, Contact_Number2, E_Mail, tblTrainingInstituteID, tblCourseID, Batch, tYear, Contact_Person, Contact_number, Relationship, Address, tblBankID, Name_as_Bank, Bank_Account_number, flag,profile_img,cv_img)
            VALUES('$Title','$Full_Name','$Name_with_Initials','$NIC','$Age','$Gender','$DOB','$Add_Line1','$Add_Line2','$Add_Line3','$Temp_Add_Line1','$Temp_Add_Line2','$Temp_Add_Line3','$Contact_Number1','$Contact_Number2','$E_Mail','$tblTrainingInstituteID','$tblCourseID','$Batch','$Year','$Contact_Person','$Contact_number','$Relationship','$Address','$tblBankID','$Name_as_Bank','$Bank_Account_number','$flag','$image','$image1')";

            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg_success = "Image uploaded successfully";
                }
                if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1)) {
                    $msg_success = "Image uploaded successfully";
                }

            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

            $con->close();


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
                <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
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
                                            <label for="inputText2" class="col-sm-4 control-label">Title </label>
                                            <div class="col-sm-8">
                                            
                                            <select class="form-control" name="v_title" id="v_title">
                                        	<option value="0">SELECT</option>
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

                                            <span class="text-danger"><?php echo $Age_err; ?></span>

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

                                    <span class="text-danger"><?php echo $Add_Line1_err; ?></span>

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
                                    <select class="form-control" name="v_institute" id="v_institute">
                                        <?php
                                        $sql = "SELECT *  FROM tbl_institute ";
                                        $institute_data = $con->query($sql);
                                        if ($institute_data->num_rows >= 1) :
                                            while ($row = mysqli_fetch_assoc($institute_data)) :?>
                                            <option value="<?=$row["tblTrainingInstituteID"]?>"><?=$row["TrainingInstitute_Name"]?></option>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <?php
                            if (isset($_POST["btnSubmit"])) { ?>

                            <span class="text-danger"><?php echo $tblTrainingInstituteID_err; ?></span>

                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Course Name </label>
                            <div class="col-sm-8">
                                    <select class="form-control" name="v_course" id="v_course">
                                        <?php
                                        $sql = "SELECT *  FROM tbl_course ";
                                        $course_data = $con->query($sql);
                                        if ($course_data->num_rows >= 1) :
                                            while ($row = mysqli_fetch_assoc($course_data)) :?>
                                            <option value="<?=$row["tblCourseID"]?>"><?=$row["Course_Name"]?></option>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </select>
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
                                <input type="text" class="form-control" name="v_year" id="v_year"
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
                    <a data-toggle="collapse" href="#collapse5">Image
                    Details</a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
                <div class="panel-body">

                    <?php if (!empty($msg_success)) { ?>
                    <div class="col-sm-12 alert alert-success" role="alert">
                        <?php echo $msg_success ?>
                    </div>
                    <?php } ?>

                    <?php if (!empty($error)) { ?>
                    <div class="col-sm-12 alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php } ?>
                    <div class="row" style="margin-top: 30px;">

                        <div class="col-sm-12" >
                            Profile<input type="file" name="image" class="btn btn-info waves-effect waves-light m-b-5"/>
                        </div>

                        <div class="col-sm-12" style="margin-top: 10px;">
                            CV <input type="file" name="image1" class="btn btn-info waves-effect waves-light m-b-5"/>
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
                    <a data-toggle="collapse" href="#collapse4">Bank Details</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputText2" class="col-sm-4 control-label">Bank Name </label>
                        <div class="col-sm-8">
                            <select class="form-control" name="v_bank" id="v_bank">
                                <?php
                                $sql = "SELECT *  FROM tbl_bank ";
                                $bank_data = $con->query($sql);
                                if ($bank_data->num_rows >= 1) :
                                    while ($row = mysqli_fetch_assoc($bank_data)) :?>
                                    <option value="<?=$row["tblBankID"]?>"><?=$row["Bank_Name"]?></option>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </select>
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
