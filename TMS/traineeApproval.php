<?php include("db.php"); ?>
<?php


//for error msgs
$allerror = $T_id_err = $Title_err = $Full_Name_err = $Name_with_Initials_err = $NIC_err = $Age_err = $Gender_err = $DOB_err = $Add_Line1_err = $Add_Line2_err = $Add_Line3_err = $Temp_Add_Line1_err = $Temp_Add_Line2_err = $Temp_Add_Line3_err = $Contact_Number1_err = $Contact_Number2_err = $E_Mail_err = $tblTrainingInstituteID_err = $ProgramName_err = $tblCourseID_err = $Batch_err = $Year_err = $Contact_Person_err = $Contact_number_err = $Relationship_err = $Address_err = $tblBankID_err = $Name_as_Bank_err = $Bank_Account_number_err = $flag_err = $branch_err = $joinDate_err = $endDate_err = $salary_err =$error=$error4= "";


$T_id = $division = $Title = $Full_Name = $Name_with_Initials = $NIC = $Age = $Gender = $DOB = $Add_Line1 = $Add_Line2 = $Add_Line3 = $Temp_Add_Line1 = $Temp_Add_Line2 = $Temp_Add_Line3 = $Contact_Number1 = $Contact_Number2 = $E_Mail = $tblTrainingInstituteID = $tblCourseID = $Batch = $Year = $Contact_Person = $Contact_number = $Relationship = $Address = $tblBankID = $Name_as_Bank = $Bank_Account_number = $flag = $jdate = $edate = $salary = $programName = $branch = "";


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$sql = "SELECT * FROM tbl_trainee WHERE flag!='PENDING' ";
$result = mysqli_query($con, $sql);
$count1 = mysqli_num_rows($result)+4942;
$nextID = ++$count1;
$T_id_app = 'MOB/TR/' . $nextID;


$sql = "SELECT *  FROM tbl_trainee WHERE tblTraineeID='" . $_GET['id'] . "' ";
$traineeTemp_data = $con->query($sql);

if ($traineeTemp_data->num_rows == 1) {
    $row = mysqli_fetch_assoc($traineeTemp_data);

    $T_id = $row['tblTraineeID'];
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

    $jdate1= $row['jdate'];
    $jdate2=explode(" ", $jdate1);
    $jdate=$jdate2[0];

    $edate1= $row['edate'];
    $edate2=explode(" ", $edate1);
    $edate=$edate2[0];
}

if (isset($_POST["btnSubmit"])) {

//-------------------------------------------------------------------------------------------------------------------------
$division= $_POST['ID_number'];

$sql1 = " UPDATE `new_idcaed` SET `Trainee_ID`='$T_id',`isactive`='notactive'WHERE ID_number = '$division' ";

            

           if ($con->query($sql1) === TRUE) {
                   echo "New record created successfully";}

else echo "successfully F***";

//------------------------------------------------------------------------------------------------------------------------

    //	if (empty($_POST["v_trainee_ID"])) {
//                $T_id_err = "This value is required.";
//            } else if (!preg_match("/^\w+( \w+)*[a-zA-Z/0-9]+$/", $_POST["v_trainee_ID"])) {
//                $T_id_err = "This value should be number.";
//            } else if (strlen($_POST["v_trainee_ID"]) > 15) {
//                $err_comment = "Id too long. It should less than 15 characters.";
//            } else {
//                $T_id = $_POST["v_trainee_ID"];
//            }

    $selectOption = $_POST['v_title'];
    if ($selectOption == "--SELECT--") {
        $Title_err = "Please select title .";
    } else if ($selectOption == "MR") {
        $Title = 'MR';
    } else if ($selectOption == "MISS") {
        $Title = 'MISS';
    } else if ($selectOption == "MRS") {
        $Title = 'MRS';
    }

    if (empty($_POST["v_fname"])) {
        $Full_Name_err = "Full name is required.";
    } 
	/*else if (!preg_match("/^\w+( \w+)*[a-zA-Z]{2,255}$/", $_POST["v_fname"])) {
        $Full_Name_err = "full name is not less than 3 characters.";
    } else if (!preg_match("/^\w+( \w+)*[a-zA-Z]$/", $_POST["v_fname"])) {
        $Full_Name_err = "Invalid format.";
    } 
	*/else {
        $Full_Name = $_POST["v_fname"];

    }

    if (empty($_POST["v_initials"])) {
        $Name_with_Initials_err = "Name with initials is required.";
    } 
/*	else if (!preg_match("/^\w+( \w+)*[a-zA-Z.]+$/", $_POST["v_initials"])) {
        $Name_with_Initials_err = "Invalid format.(eg. A.B.Johon).";
    }
	*/else {
        $Name_with_Initials = $_POST["v_initials"];

    }

     if (empty($_POST["v_nic"])) {
        $NIC_err = "NIC number is required.";
    } 
	/*else if (!preg_match("/^[0-9]{9}[x|X|v|V]$/", $_POST["v_nic"])) {
        $NIC_err = "Please Enter valid NIC.";
    }*/ 
	else {
        $NIC = $_POST["v_nic"];

    }

    if (empty($_POST["v_age"])) {
        $Age_err = "Age is required.";
    } else if (!preg_match("/^[0-9]+$/", $_POST["v_age"])) {
        $Age_err = "Invalid format,should be number.";
    } else if (!preg_match("/^[0-9]{2,3}$/", $_POST["v_age"])) {
        $Age_err = "Invalid age";
    } else {
        $Age = $_POST["v_age"];

    }

    $Gender = $_POST["v_gender"];

     if (empty($_POST["v_dob"])) {
        $DOB_err = "Birthday is required.";
    } else {
        $DOB = $_POST["v_dob"];
    }

    if (empty($_POST["v_add1"])) {
        $Add_Line1_err = "Address line 1 is required.";
    } else if (!preg_match('/^[A-z0-9\.\,\/\s]+$/', $_POST["v_add1"])) {
        $Add_Line1_err = "Cann't use " . " ' " . $_POST["v_add3"] . " '";
    } else {
        $Add_Line1 = $_POST["v_add1"];

    }

    if (empty($_POST["v_add2"])) {
        $Add_Line2_err = "Address line 2 is required.";
    } else if (!preg_match('/^[A-z0-9\.\,\/\s]+$/', $_POST["v_add2"])) {
        $Add_Line2_err = "Cann't use " . " ' " . $_POST["v_add3"] . " '";
    } else {
        $Add_Line2 = $_POST["v_add2"];

    }

    if (empty($_POST["v_add3"])) {
        $Add_Line3_err = "Address line 3 is required.";
    } else if (!preg_match('/^[A-z0-9\.\,\/\s]+$/', $_POST["v_add3"])) {
        $Add_Line3_err = "Cann't use " . " ' " . $_POST["v_add3"] . " '";
    } else {
        $Add_Line3 = $_POST["v_add3"];

    }

    if (!empty($_POST["v_tadd1"])) {

        if (!preg_match("/^\w+( \w+)*[a-zA-Z0-9\,\.\-\/\s]+$/", $_POST["v_tadd1"])) {
            $Temp_Add_Line1_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line1 = $_POST["v_tadd1"];

        }

    }

    if (!empty($_POST["v_tadd2"])) {

        if (!preg_match("/^\w+( \w+)*[a-zA-Z0-9\.\,\-\/\s]+$/", $_POST["v_tadd2"])) {
            $Temp_Add_Line2_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line2 = $_POST["v_tadd2"];

        }
    }

    if (!empty($_POST["v_tadd3"])) {

        if (!preg_match("/^\w+( \w+)*[a-zA-Z0-9\,\.\-\/\s]+$/", $_POST["v_tadd3"])) {
            $Temp_Add_Line3_err = "This value should be alphanumeric.";
        } else {
            $Temp_Add_Line3 = $_POST["v_tadd3"];

        }
    }


     if (empty($_POST["v_mob1"])) {
        $Contact_Number1_err = "Number is required.";
    } else if (!preg_match('/^[0-9]+$/', $_POST["v_mob1"]) == 1) {
        $Contact_Number1_err = "This value should be number.";
    } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_mob1"]) == 1) {
        $Contact_Number1_err = "This value should be 10 digits.";
    } else {
        $Contact_Number1 = $_POST["v_mob1"];

    }

    if (!empty($_POST["v_fno"])) {

        if (!preg_match('/^[0-9]+$/', $_POST["v_fno"]) == 1) {
            $Contact_Number2_err = "This value should be number.";
        } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_fno"]) == 1) {
            $Contact_Number2_err = "This value should be 10 digits.";
        } else {
            $Contact_Number2 = $_POST["v_fno"];

        }
    }


    if (empty($_POST["v_email"])) {
        $E_Mail_err = "Email value is required.";
    } else {
        $E_Mail = $_POST["v_email"];

    }

    if ($_POST["v_institute"] == 0) {
        $tblTrainingInstituteID_err = "Please select institute";
    } else {
        $tblTrainingInstituteID = $_POST["v_institute"];
    }

    if ($_POST["v_program"] == "--SELECT--") {
        $ProgramName_err = "Please select Program";
    } else if ($_POST["v_program"] == "CERTIFICATE") {
        $programName = "CERTIFICATE";
    } else if ($_POST["v_program"] == "DIPLOMA") {
        $programName = "DIPLOMA";
    } else if ($_POST["v_program"] == "DEGREE")  {
        $programName = "DEGREE";
    }


    if ($_POST["v_course"] == 0) {
        $tblCourseID_err = "Please select Course";
    } else {
        $tblCourseID = $_POST["v_course"];

    }


     if (empty($_POST["v_batch"])) {
        $Batch_err = "Batch is required.";
    } else if (!preg_match("/^[a-zA-Z0-9.]+$/", $_POST["v_batch"])) {
        $Batch_err = "Invalid format.";
    } else {
        $Batch = $_POST["v_batch"];

    }

    if (empty($_POST["v_year"])) {
        $Year_err = "Year is required.";
    } else if (!preg_match("/^[0-9]+$/", $_POST["v_year"])) {
        $Year_err = "This value should be number.";
    } else if (!preg_match("/^[0-9]{4}+$/", $_POST["v_year"])) {
        $Year_err = "This value should be 4 digits(eg.2017).";
    } else {
        $Year = $_POST["v_year"];

    }

    if (empty($_POST["v_con"])) {
        $Contact_Person_err = "Contact person is required.";
    } else if (!preg_match("/^\w+( \w+)*[a-zA-Z\.\,]+$/", $_POST["v_con"])) {
        $Contact_Person_err = "Invalid format.";
    } else {
        $Contact_Person = $_POST["v_con"];

    }

    if (empty($_POST["v_conNo"])) {
        $Contact_number_err = "Contact number is required.";
    } else if (!preg_match('/^[0-9]+$/', $_POST["v_conNo"]) == 1) {
        $Contact_number_err = "This value should be number.";
    } else if (!preg_match('/^[0-9]{10}+$/', $_POST["v_conNo"]) == 1) {
        $Contact_number_err = "This value should be 10 digits.";
    } else {
        $Contact_number = $_POST["v_conNo"];

    }


    if (empty($_POST["v_conRel"])) {
        $Relationship_err = "Relationship is required.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $_POST["v_conRel"])) {
        $Relationship_err = "Invalid format.";
    } else {
        $Relationship = $_POST["v_conRel"];

    }

    if (empty($_POST["v_conAdd"])) {
        $Address_err = "Address is required.";
    } else if (!preg_match("/^\w+( \w+)*[a-zA-Z0-9\,\.\\s\/]+$/", $_POST["v_conAdd"])) {
        $Address_err = "Invalid format.";
    } else {
        $Address = $_POST["v_conAdd"];

    }

    if ($_POST["v_bank"] == 0) {
        $tblBankID_err = "Please select Bank";
    } else {
        $tblBankID = $_POST["v_bank"];

    }

    if (empty($_POST["v_branch"])) {
        $branch_err = "Branch name is required.";
    } else if (!preg_match("/^\w+( \w+)*[a-zA-Z\s]+$/", $_POST["v_branch"])) {
        $branch_err = "This value should be alphanumeric.";
    } else {
        $branch = $_POST["v_branch"];

    }

    if (empty($_POST["v_nameBank"])) {
        $Name_as_Bank_err = "Name as bank is required.";
    } else if (!preg_match("/^\w+( \w+)*[a-zA-Z.\s]+$/", $_POST["v_nameBank"])) {
        $Name_as_Bank_err = "Invalid format.";
    } else {
        $Name_as_Bank = $_POST["v_nameBank"];

    }

    if (empty($_POST["v_accNO"])) {
        $Bank_Account_number_err = "Account number is required.";
    } else if (!preg_match('/^[A-z0-9\/\-\s]+$/', $_POST["v_accNO"])) {
        $Bank_Account_number_err = "Invalid account number.";
    } else {
        $Bank_Account_number = $_POST["v_accNO"];

    }


    if (empty($_POST["v_jdate"])) {
        $joinDate_err = "This value is required.";
    } else {
        $jdate = $_POST["v_jdate"];
    }

    if (empty($_POST["v_edate"])) {
        $endDate_err = "This value is required.";
    } else {
        $edate = $_POST["v_edate"];
    }

    if (empty($_POST["v_salary"])) {
        $salary_err = "This value is required.";
    } else if (!preg_match("/^[0-9.]+$/", $_POST["v_salary"])) {
        $salary_err = "This value should be alphanumeric.";
    } else {
        $salary = $_POST["v_salary"];

    }

    //$flag = "PENDING";
/*
    $image = $image1= $target =$target1="";
            /*Img upload*/
 /*           $maxsize = 2097152;

            $fileName = $_FILES['image']['name'];
            $fileTmpLoc = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $fileSize = $_FILES['image']['size'];
            $fileErrorMsg = $_FILES["image"]['error'];

            if ($fileSize >= $maxsize || $fileSize == 0) {

                if ($fileSize >= $maxsize) {
                    $error4 = "Your image should less than 2MB";
                }

               

            } else if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
                $error4 = "Your image file was not jpg, jpeg, gif or png type";

            } else if (strlen($fileName) >= 50) {
                $error4 = "File name less than 50 character";

            } else if (!preg_match("/^[a-zA-Z0-9\.\_\s\-]+$/", $fileName)) {
                $error4 = "Invalid file name";

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
                    $error4 = "Your image file was larger than 2MB";
                }


            } else if (!preg_match("/\.(pdf)$/i", $fileName1)) {
                $error4 = "Your image file was not pdf type";

            } else if (strlen($fileName1) >= 50) {
                $error4 = "File name less than 50 character";

            } else if (!preg_match("/^[a-zA-Z0-9\.\_\s\-]+$/", $fileName1)) {
                $error4 = "Invalid file name";

            } else {

                $image1 = $_FILES['image1']['name'];
                $target1 = "CVs/" . basename($_FILES['image1']['name']);
            }
*/

    $jdate = $_POST["v_jdate"] . " " . "00:00:00";
    $edate = $_POST["v_edate"] . " " . "23:59:59";

    if (empty($Title_err) && empty($Full_Name_err) && empty($Name_with_Initials_err) && empty($NIC_err) && empty($Age_err) && empty($Gender_err) && empty($DOB_err) && empty($Add_Line1_err) && empty($Add_Line2_err) && empty($Add_Line3_err) && empty($Temp_Add_Line1_err) && empty($Temp_Add_Line2_err) && empty($Temp_Add_Line3_err) && empty($Contact_Number1_err) && empty($Contact_Number2_err) && empty($E_Mail_err) && empty($tblTrainingInstituteID_err) && empty($ProgramName_err) && empty($tblCourseID_err) && empty($Batch_err) && empty($Year_err) && empty($Contact_Person_err) && empty($Contact_number_err) && empty($Relationship_err) && empty($Address_err) && empty($tblBankID_err) && empty($Name_as_Bank_err) && empty($Bank_Account_number_err) && empty($flag_err) && empty($branch_err) && empty($joinDate_err) && empty($endDate_err) && empty($salary_err)&& empty($error) && empty($error4) && empty($error) && empty($error)) {

        $sql = "UPDATE `tbl_trainee` SET `Trainee_ID`='" . $T_id_app . "',`Title`='" . $Title . "',`Full_Name`='" . $_POST["v_fname"] . "',`Name_with_Initials`='" . $_POST["v_initials"] . "',`NIC`='" . $_POST["v_nic"] . "',`Age`='" . $_POST["v_age"] . "',`Gender`='" . $_POST["v_gender"] . "',`Date_of_Birth`='" . $_POST["v_dob"] . "',`Add_Line1`='" . $_POST["v_add1"] . "',`Add_Line2`='" . $_POST["v_add2"] . "',`Add_Line3`='" . $_POST["v_add3"] . "',`Temp_Add_Line1`='" . $_POST["v_tadd1"] . "',`Temp_Add_Line2`='" . $_POST["v_tadd2"] . "',`Temp_Add_Line3`='" . $_POST["v_tadd3"] . "',`Contact_Number1`='" . $_POST["v_mob1"] . "',`Contact_Number2`='" . $_POST["v_fno"] . "',`E_Mail`='" . $_POST["v_email"] . "',`tblTrainingInstituteID`='" . $_POST["v_institute"] . "',`programName`='" . $programName . "',`tblCourseID`='" . $tblCourseID . "',`Batch`='" . $_POST["v_batch"] . "',`tYear`='" . $_POST["v_year"] . "',`Contact_Person`='" . $_POST["v_con"] . "',`Contact_number`='" . $_POST["v_conNo"] . "',`Relationship`='" . $_POST["v_conRel"] . "',`Address`='" . $_POST["v_conAdd"] . "',`tblBankID`='" . $tblBankID . "',`bankBranch`='" . $_POST['v_branch'] . "',`Name_as_Bank`='" . $_POST["v_nameBank"] . "',`Bank_Account_number`='" . $_POST["v_accNO"] . "',`flag`='" . "ACTIVE" . "',`job_type`='" . $_POST["v_JobType"] . "',`salary`='" . $_POST["v_salary"] . "',`jdate`='" . $jdate . "',`edate`='" . $edate . "',`tblDivisionID`='" . $_POST["v_department"] . "'WHERE tblTraineeID = '" . $_GET["id"] . "' ";


        //$sql = "UPDATE tbl_trainee SET Trainee_ID='".$T_id_app."', Title='".$_POST["v_title"]."', Full_Name='".$_POST["v_fname"]."', Name_with_Initials='".$_POST["v_initials"]."', NIC='".$_POST["v_nic"]."', Age='".$_POST["v_age"]."', Gender='".$_POST["v_gender"]."', Date_of_Birth='".$_POST["v_dob"]."', Add_Line1='".$_POST["v_add1"]."', Add_Line2='".$_POST["v_add2"]."', Add_Line3='".$_POST["v_add3"]."', Temp_Add_Line1='".$_POST["v_tadd1"]."', Temp_Add_Line2='".$_POST["v_tadd2"]."', Temp_Add_Line3='".$_POST["v_tadd3"]."', Contact_Number1='".$_POST["v_mob1"]."', Contact_Number2='".$_POST["v_fno"]."', E_Mail='".$_POST["v_email"]."', tblTrainingInstituteID='".$_POST["v_institute"]."', tblCourseID='".$_POST["v_course"]."', Batch='".$_POST["v_batch"]."', tYear='".$_POST["v_year"]."', Contact_Person='".$_POST["v_con"]."', Contact_number='".$_POST["v_conNo"]."', Relationship='".$_POST["v_conRel"]."', Address='".$_POST["v_conAdd"]."', tblBankID='".$_POST["v_bank"]."', Name_as_Bank='".$_POST["v_nameBank"]."', Bank_Account_number='".$_POST["v_accNO"]."', flag='"."ACTIVE"."', job_type='".$_POST["v_JobType"]."', salary='".$_POST["v_salary"]."', jdate='".$jdate."', edate='".$edate."', tblDivisionID='".$_POST["v_department"]."', WHERE tblTraineeID = '".$_GET["id"]."' ";
        if ($con->query($sql) === TRUE) {

            $error = "Successfully Updated";

             if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg_success = "Image uploaded successfully";
                }

                if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1)) {
                    $msg_success = "Image uploaded successfully";
                }

            header("Location:approvals.php");

        } else {
            $error = "Some error occured" . $sql . " Please try again";

        }


    }


}


if (isset($_GET["idDec"])) {


    $sql = "DELETE FROM tbl_trainee WHERE tblTraineeID ='" . $_GET["idDec"] . "' ";
    if ($con->query($sql) === TRUE) {

        $msg = "Successfully Rejected";
        header("Location:approvals.php");
    }


}


$con->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include_once("header.php") ?>
    <title>Trainee Approval</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br>
<br>
<br>
<div>
    <center>
        <h2>Trainee Approval</h2>
    </center>
</div>
<center>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <!-- personal details -->


        <div class="container col-md-6 col-md-offset-3 ">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title "> Personal Details </h4>
                    </div>

                    <?php
            $result = $con->query(" SELECT * FROM tbl_trainee WHERE tblTraineeID='$T_id' ");

            while ($row = $result->fetch_assoc()) { ?>
            <img src="<?php echo "Images/" . $row['profile_img']; ?>"
            class="img-thumbnail thumb-xl img-thumbnail m-b-10"
            alt="profile-image" style="height: 150px; width: 130px; margin-top: 20px;"/>
            <?php } ?>

            




                    <?php if (isset($_POST["btnSubmit"])) { ?>
                        <?php if (!empty($error)) { ?>
                            <div class="col-sm-8 col-sm-offset-2 text-center alert alert-success"
                                 role="alert"> <?php echo $error; ?> </div>

                        <?php }
                    } ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText1" class="col-sm-4 control-label">Trainee ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_trainee_ID" id="v_Trainee_ID"
                                       placeholder="MOB/INOC/" value="<?php echo $T_id; ?>" disabled>
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $T_id_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Title </label>
                            <div class="col-sm-8">

                                <select class="form-control" name="v_title" id="v_title" autofocus="autofocus">

                                        <option value="--SELECT--">--SELECT--</option>
                                        <option value='MR' <?=$Title == 'MR' ? ' selected="selected"' : '';?>>MR</option>
                                        <option value="MISS"<?=$Title == 'MISS' ? ' selected="selected"' : '';?>>MISS</option>
                                        <option value="MRS" <?=$Title== 'MRS' ? ' selected="selected"' : '';?>>MRS</option>
                                    
                                    </select>



                                    <script type="text/javascript">
                                      document.getElementById('v_title').value = "<?php echo $_POST['v_title'];?>";
                                    </script>


                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Title_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText1" class="col-sm-4 control-label">Full Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_fname" id="v_Fname"
                                       placeholder="Full Name" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Full_Name; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Full_Name_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Name with initials </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_initials" id="v_initials"
                                       placeholder="Name with initials" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Name_with_Initials; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Name_with_Initials_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText1" class="col-sm-4 control-label">NIC Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_nic" id="v_nic"
                                       placeholder="NIC Number" onblur="this.value=this.value.toUpperCase()" value="<?php echo $NIC; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $NIC_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Date of birth </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_dob" id="v_dob"
                                       placeholder="Date of birth" value="<?php echo $DOB; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $DOB_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Age </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_age" id="v_age" placeholder="Age " onblur="this.value=this.value.toUpperCase()"
                                       value="<?php echo $Age; ?>"">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Age_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Gender </label>
                            <div class="col-sm-3">

                                <?php if ($Gender == "M") { ?>
                                    <label>Male </label>
                                    <input type="radio" name="v_gender" value="M" checked>
                                    <label>Female </label>
                                    <input type="radio" name="v_gender" value="F">

                                <?php } else if ($Gender == "F") { ?>
                                    <label>Male </label>
                                    <input type="radio" name="v_gender" value="M"><br>
                                    <label>Female </label>
                                    <input type="radio" name="v_gender" value="F" checked>
                                <?php } ?>


                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Gender_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Address Line 1 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_add1" id="v_add1"
                                       placeholder="Address Line 1" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Add_Line1; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Add_Line1_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Address Line 2 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_add2" id="v_add2"
                                       placeholder="Address Line 2" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Add_Line2; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Add_Line2_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Address Line 3 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_add3" id="v_add3"
                                       placeholder="Address Line 3" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Add_Line3; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Add_Line3_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 1 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_tadd1" id="v_tadd1"
                                       placeholder="Temp. Address Line 1" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Temp_Add_Line1; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Temp_Add_Line1_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 2 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_tadd2" id="v_tadd2"
                                       placeholder="Temp. Address Line 2" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Temp_Add_Line2; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Temp_Add_Line2_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 3 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_tadd3" id="v_tadd3"
                                       placeholder="Temp. Address Line 3" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Temp_Add_Line3; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Temp_Add_Line3_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Mobile Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_mob1" id="v_mob1"
                                       placeholder="Mobile Number" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Contact_Number1; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Contact_Number1_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Fixed Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_fno" id="v_fno"
                                       placeholder="Fixed Number" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Contact_Number2; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Contact_Number2_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">E-mail </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="v_email" id="v_email"
                                       placeholder="E-mail" value="<?php echo $E_Mail; ?>">
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
                        <h4 class="panel-title"> Educational Details </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Institute Name </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_institute" id="v_institute"
                                        value="<?php if (isset($_POST['btnSubmit'])) {
                                            echo $_POST['v_institute'];
                                        } ?>">
                                    <option value="--SELECT--">--SELECT--</option>
                                    <?php
                                    $sql = "SELECT *  FROM tbl_institute ";
                                    $institute_data = $con->query($sql);
                                    if ($institute_data->num_rows >= 1) :
                                        while ($row = mysqli_fetch_assoc($institute_data)) :?>
                                            <option value="<?php echo  $row["tblTrainingInstituteID"]?>"<?php if ($row["tblTrainingInstituteID"]== $tblTrainingInstituteID): ?> selected="selected";
                                                    <?php endif ?>><?php echo $row["TrainingInstitute_Name"] ?></option>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $tblTrainingInstituteID_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Program Type</label>
                            <div class="col-sm-8">

                                 <select class="form-control" name="v_program" id="v_program"
                                            value="<?php if (isset($_POST['btnSubmit'])) {
                                                echo $_POST['v_program'];
                                            } ?>">
                                        <option value="--SELECT--"  <?=$programName == '--SELECT--' ? ' selected="selected"' : '';?>>--SELECT--</option>

                                        <option value="CERTIFICATE" <?=$programName == 'CERTIFICATE' ? ' selected="selected"' : '';?>>CERTIFICATE</option>

                                        <option value="DIPLOMA" <?=$programName == 'DIPLOMA' ? ' selected="selected"' : '';?>>DIPLOMA</option>

                                        <option value="DEGREE" <?=$programName == 'DEGREE' ? ' selected="selected"' : '';?>>DEGREE</option>
                                    </select>


                                    <script type="text/javascript">
                                      document.getElementById('v_program').value = "<?php echo $_POST['v_program'];?>";
                                    </script>

                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $ProgramName_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Course Name </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_course" id="v_course"
                                        value="<?php if (isset($_POST['btnSubmit'])) {
                                            echo $_POST['v_course'];
                                        } ?>">
                                    <option value="0">--SELECT--</option>
                                    <?php
                                    $sql = "SELECT *  FROM tbl_course ";
                                    $course_data = $con->query($sql);
                                    if ($course_data->num_rows >= 1) :
                                        while ($row = mysqli_fetch_assoc($course_data)) :?>
                                            <option value="<?php echo  $row["tblCourseID"] ?>" <?php if ($row["tblCourseID"]== $tblCourseID): ?> selected="selected";
                                                    <?php endif ?>><?php echo  $row["Course_Name"] ?></option>
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
                                       placeholder="Batch" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Batch; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Batch_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Year </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_year" id="v_year"
                                       placeholder="Year" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Year; ?>">
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

<!--  <div class="container col-md-6 col-md-offset-3">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Image
                    Details
                </h4>
            </div>
            <div>
                <div class="panel-body">

                    <?php if (!empty($msg_success)) { ?>

                    <div class="col-sm-12 alert alert-success" role="alert">
                        <?php echo $msg_success ?>
                    </div>
                    <?php } ?>

                    <?php if (!empty($error4)) { ?>
                    <div class="col-sm-12 alert alert-danger" role="alert">
                        <?php echo $error4 ?>
                    </div>
                    <?php } ?>


                        <div class="form-group">
                             <label for="inputText2" class="col-sm-4 control-label">Profile Image </label><input type="file" name="image" id="image" class="btn btn-info waves-effect waves-light m-b-5"  value="<?php echo "Images/" . $row['profile_img']; ?>" multiple>


                        

                        </div>

                        <div  class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Upload CV</label> <input type="file" name="image1" class="btn btn-info waves-effect waves-light m-b-5" value="<?php echo "CVs/" . $row['cv_img']; ?>" multiple>
                        </div>



                </div>

            </div>

        </div>
    </div>
</div>  -->
        <div class="container col-md-6 col-md-offset-3">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> Emergency Contact Details </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Person </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_con" id="v_con"
                                       placeholder="Contact Person" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Contact_Person; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Contact_Person_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Contact Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conNo" id="v_conNo"
                                       placeholder="Contact Number" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Contact_number; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Contact_number_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Realationship </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conRel" id="v_conRel"
                                       placeholder="Relationship" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Relationship; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Relationship_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Address </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_conAdd" id="v_conAdd"
                                       placeholder="Address" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Address; ?>">
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
                        <h4 class="panel-title"> Bank Details </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Bank Name </label>
                            <div class="col-sm-8">
                                <!--  <input type="text" class="form-control" name="v_bank" id="v_bank"
                        placeholder="Bank Name" value="<?php echo $tblBankID; ?>">-->
                                <select class="form-control" name="v_bank" id="v_bank"
                                        value="<?php if (isset($_POST['btnSubmit'])) {
                                            echo $_POST['v_bank'];
                                        } ?>">
                                    <option value="0">--SELECT--</option>
                                    <?php
                                    $sql = "SELECT *  FROM tbl_bank ";
                                    $bank_data = $con->query($sql);
                                    if ($bank_data->num_rows >= 1) :
                                        while ($row = mysqli_fetch_assoc($bank_data)) :?>
                                            <option value="<?php echo $row["tblBankID"] ?>" <?php if ($row["tblBankID"]== $tblBankID): ?> selected="selected";
                                                    <?php endif ?>><?php echo $row["Bank_Name"] ?></option>
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
                            <label for="inputText2" class="col-sm-4 control-label">Branch </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_branch" id="v_branch"
                                       placeholder="Branch" onblur="this.value=this.value.toUpperCase()" value="<?php echo $branch ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>

                                <span class="text-danger"><?php echo $branch_err; ?></span>

                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Name As Bank </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_nameBank" id="v_nameBank"
                                       placeholder="Name As Bank" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Name_as_Bank; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Name_as_Bank_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Account Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="v_accNO" id="v_accNO"
                                       placeholder="Account Number" onblur="this.value=this.value.toUpperCase()" value="<?php echo $Bank_Account_number; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $Bank_Account_number_err; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> General Details </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Join date </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="v_jdate" id="v_jdate"
                                       placeholder="Join date" value="<?php echo $jdate; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $joinDate_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">End date </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="v_edate" id="v_edate"
                                       placeholder="End date" value="<?php echo $edate; ?>">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $endDate_err; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_JobType" id="v_JobType">

                                    <option value='ON JOB'>ON JOB</option>
                                    <option value='GENERAL' selected>GENERAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Division</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="v_department" id="v_department">
                                    <?php
                                    $sql = "SELECT *  FROM tbl_division ";
                                    $department_data = $con->query($sql);
                                    if ($department_data->num_rows >= 1) :
                                        while ($row = mysqli_fetch_assoc($department_data)) :?>
                                            <option value="<?php echo $row["tblDivisionID"] ?>">
                                                <?php echo $row["Name"] ?>
                                            </option>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-4 control-label">Salary</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" onblur="this.value=this.value.toUpperCase()" value="5000.00" name="v_salary" id="v_salary">
                            </div>
                            <?php if (isset($_POST["btnSubmit"])) { ?>
                                <span class="text-danger"><?php echo $salary_err; ?></span>
                            <?php } ?>
                        </div>


    <!-- New ID select.................................................  -->



 <th style="padding-top: 20px;"><label>NEW ID Number</label>
              <td style="width: 200px; padding-right: 30px;padding-top: 20px;padding-left: 10px;"><select class="form-control" name="ID_number" id="ID_number">
                <option>--SELECT--</option>
                <?php
                $sql = "SELECT *  FROM new_idcaed WHERE isactive = 'active' ";
                $division_data = $con->query($sql);
                if ($division_data->num_rows >= 1) :

                  while ($row = mysqli_fetch_assoc($division_data)) :?>
                  <option value="<?php echo $row["ID_number"]?>"><?php echo $row["ID_number"]?></option>
                  <?php
                endwhile;
              endif;

               ?>
              
            </select></td></th>


 

    <!-- New Id Select.................................................  -->














































                    </div>
                </div>
                <br/>
                <input type="submit" class="btn btn-warning btn-lg btn-block" name="btnSubmit" value="Approve">
            </div>
    </form>
</center>
</body>
</html>