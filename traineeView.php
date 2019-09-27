<?php include("db.php"); ?>
<?php


//for error msgs
$allerror=$T_id_err = $Title_err = $Full_Name_err = $Name_with_Initials_err = $NIC_err = $Age_err = $Gender_err = $DOB_err = $Add_Line1_err = $Add_Line2_err = $Add_Line3_err = $Temp_Add_Line1_err = $Temp_Add_Line2_err = $Temp_Add_Line3_err = $Contact_Number1_err = $Contact_Number2_err = $E_Mail_err = $tblTrainingInstituteID_err = $ProgramName_err = $tblCourseID_err = $Batch_err = $Year_err = $Contact_Person_err = $Contact_number_err = $Relationship_err = $Address_err = $tblBankID_err = $Name_as_Bank_err = $Bank_Account_number_err = $flag_err =$Branch_err=$joinDate_err=$endDate_err=$salary_err="";


$T_id = $Title = $Full_Name = $Name_with_Initials = $NIC = $Age = $Gender = $DOB = $Add_Line1 = $Add_Line2 = $Add_Line3 = $Temp_Add_Line1 = $Temp_Add_Line2 = $Temp_Add_Line3 = $Contact_Number1 = $Contact_Number2 = $E_Mail = $tblTrainingInstituteID = $tblCourseID = $Batch = $Year = $Contact_Person = $Contact_number = $Relationship = $Address = $tblBankID = $Name_as_Bank = $Bank_Account_number = $flag =$jdate=$edate=$salary= "";



// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}



$sql = "SELECT * FROM tbl_trainee";
$result = mysqli_query($con, $sql);
$count1 = mysqli_num_rows($result);
$nextID = ++$count1;
$T_id_app = 'MOB/TR/' . $nextID;


$sql = "SELECT *  FROM tbl_trainee WHERE tblTraineeID='" . $_GET['id'] . "' ";
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
  $programName=$row['programName'];
  $image=$row['profile_img'];
  $image1=$row['cv_img'];
  $job=$row['job_type'];
  $jdate=$row['jdate'];
  $jdate1=explode(" ", $jdate);
  $jdate2=$jdate1[0];

  $edate=$row['edate'];
  $edate1=explode(" ", $edate);
  $edate2=$edate1[0];

  $tblDivisionID=$row['tblDivisionID'];



}

if (isset($_POST["btnSubmit"])) {


  header("Location:rptTrainee.php");


}

$con->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View trainee</title>
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
            <div class="col-sm-8 col-sm-offset-2 text-center alert alert-success" role="alert"> <?php echo $error; ?> </div>

            <?php }} ?>
            <div class="panel-body">   
              <div class="form-group">
                <label for="inputText1" class="col-sm-4 control-label">Trainee ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="v_trainee_ID" id="v_Trainee_ID"
                  placeholder="MOB/INOC/" value="<?php echo $T_id2; ?>" disabled>
                </div>
                <?php if (isset($_POST["btnSubmit"])) { ?>
                <span class="text-danger"><?php echo $T_id_err; ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="inputText2" class="col-sm-4 control-label">Title </label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" name="v_title" id="v_title"
                 value="<?php echo $Title; ?>" disabled>
               </div>
             </div>
             <?php if (isset($_POST["btnSubmit"])) { ?>
             <span class="text-danger"><?php echo $Title_err; ?></span>
             <?php } ?>

             <div class="form-group">
              <label for="inputText1" class="col-sm-4 control-label">Full Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="v_fname" id="v_Fname"
                placeholder="Full Name" value="<?php echo $Full_Name; ?>" disabled>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $Full_Name_err; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Name with initials </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="v_initials" id="v_initials"
                placeholder="Name with initials" value="<?php echo $Name_with_Initials; ?>" disabled>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $Name_with_Initials_err; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText1" class="col-sm-4 control-label">NIC Number</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="v_nic" id="v_nic"
                placeholder="NIC Number" value="<?php echo $NIC; ?>" disabled>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $NIC_err; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Date of birth </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="v_dob" id="v_dob"
                placeholder="Date of birth" value="<?php echo $DOB; ?>" disabled>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $DOB_err; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Age </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="v_age" id="v_age" placeholder="Age "
                value="<?php echo $Age; ?>" disabled>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $Age_err; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Gender </label>
              <div class="col-sm-3">

               <?php if($Gender=="M"){?>
               <label>Male </label>
               <input type="radio" name="v_gender" value="M" checked >
               <label>Female </label>
               <input type="radio" name="v_gender" value="F" disabled >

               <?php }else if($Gender=="F"){ ?>
               <label>Male </label>
               <input type="radio" name="v_gender" value="M" disabled>
               <label>Female </label>
               <input type="radio" name="v_gender" value="F" checked >
               <?php }?>


             </div>
             <?php if (isset($_POST["btnSubmit"])) { ?>
             <span class="text-danger"><?php echo $Gender_err; ?></span>
             <?php } ?>
           </div>
           <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Address Line 1 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_add1" id="v_add1"
              placeholder="Address Line 1" value="<?php echo $Add_Line1; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Add_Line1_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Address Line 2 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_add2" id="v_add2"
              placeholder="Address Line 2" value="<?php echo $Add_Line2; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Add_Line2_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Address Line 3 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_add3" id="v_add3"
              placeholder="Address Line 3" value="<?php echo $Add_Line3; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Add_Line3_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 1 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_tadd1" id="v_tadd1"
              placeholder="Temp. Address Line 1" value="<?php echo $Temp_Add_Line1; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Temp_Add_Line1_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 2 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_tadd2" id="v_tadd2"
              placeholder="Temp. Address Line 2" value="<?php echo $Temp_Add_Line2; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Temp_Add_Line2_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Temp. Address Line 3 </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_tadd3" id="v_tadd3"
              placeholder="Temp. Address Line 3" value="<?php echo $Temp_Add_Line3; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Temp_Add_Line3_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Mobile Number </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_mob1" id="v_mob1"
              placeholder="Mobile Number" value="<?php echo $Contact_Number1; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Contact_Number1_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">Fixed Number </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="v_fno" id="v_fno"
              placeholder="Fixed Number" value="<?php echo $Contact_Number2; ?>" disabled>
            </div>
            <?php if (isset($_POST["btnSubmit"])) { ?>
            <span class="text-danger"><?php echo $Contact_Number2_err; ?></span>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="inputText2" class="col-sm-4 control-label">E-mail </label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="v_email" id="v_email"
              placeholder="E-mail" value="<?php echo $E_Mail; ?>" disabled>
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

            <select class="form-control" name="v_institute" id="v_institute" disabled>
              <?php
              $sql = "SELECT *  FROM tbl_institute ";
              $institute_data = $con->query($sql);
              if ($institute_data->num_rows >= 1) :
                while ($row = mysqli_fetch_assoc($institute_data)) :?>
                <option value="<?php echo $row["tblTrainingInstituteID"]?>" <?php if ($row["tblTrainingInstituteID"]==$tblTrainingInstituteID): ?>
                  selected="selected";
                <?php endif ?>>
                <?php echo $row["TrainingInstitute_Name"]?>

              </option>

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

       <select class="form-control" name="v_program" id="v_program" disabled>
                                            value="<?php if (isset($_POST['btnSubmit'])) {
                                                echo $_POST['v_program'];
                                            } ?>" >
                                        <option value="--SELECT--"  <?=$programName == '--SELECT--' ? ' selected="selected"' : '';?>--SELECT--</option>
                                        <option value="CERTIFICATE" <?=$programName == 'CERTIFICATE' ? ' selected="selected"' : '';?>CERTIFICATE</option>
                                        <option value="DIPLOMA" <?=$programName == 'DIPLOMA' ? ' selected="selected"' : '';?>DIPLOMA</option>
                                        <option value="DEGREE" <?=$programName == 'DEGREE' ? ' selected="selected"' : '';?>DEGREE</option>
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
           <select class="form-control" name="v_course" id="v_course" disabled>
            <?php
            $sql = "SELECT *  FROM tbl_course ";
            $course_data = $con->query($sql);
            if ($course_data->num_rows >= 1) :
              while ($row = mysqli_fetch_assoc($course_data)) :?>
              <option value="<?php echo $row["tblCourseID"]?>" <?php if ($row["tblCourseID"]==$tblCourseID): ?>
                selected="selected";
              <?php endif ?>>
              <?php echo $row["Course_Name"]?>

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
        placeholder="Batch" value="<?php echo $Batch; ?>" disabled>
      </div>
      <?php if (isset($_POST["btnSubmit"])) { ?>
      <span class="text-danger"><?php echo $Batch_err; ?></span>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="inputText2" class="col-sm-4 control-label">Intake Year </label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="v_year" id="v_year"
        placeholder="Year" value="<?php echo $Year; ?>" disabled>
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
        <h4 class="panel-title"> Emergency Contact Details </h4>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Contact Person </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_con" id="v_con"
            placeholder="Contact Person" value="<?php echo $Contact_Person; ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $Contact_Person_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Contact Number </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_conNo" id="v_conNo"
            placeholder="Contact Number" value="<?php echo $Contact_number; ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $Contact_number_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Realationship </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_conRel" id="v_conRel"
            placeholder="Realationship" value="<?php echo $Relationship; ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $Relationship_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Address </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_conAdd" id="v_conAdd"
            placeholder="Address" value="<?php echo $Address; ?>" disabled>
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
              <select class="form-control" name="v_bank" id="v_bank" disabled >  
                <?php
                $sql = "SELECT *  FROM tbl_bank ";
                $bank_data = $con->query($sql);
                if ($bank_data->num_rows >= 1) :
                  while ($row = mysqli_fetch_assoc($bank_data)) :?>
                  <option value="<?php echo $row["tblBankID"]?>" <?php if ($row["tblBankID"]==$tblBankID): ?>
                    selected="selected";
                  <?php endif ?>>
                  <?php echo $row["Bank_Name"]?>

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
            placeholder="Name As Bank"  value="<?php echo $branch ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>

          <span class="text-danger"><?php echo $Name_as_Bank_err; ?></span>

          <?php } ?>
        </div>

        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Name As Bank </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_nameBank" id="v_nameBank"
            placeholder="Name As Bank" value="<?php echo $Name_as_Bank; ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $Name_as_Bank_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Account Number </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_accNO" id="v_accNO"
            placeholder="Account Number" value="<?php echo $Bank_Account_number; ?>" disabled>
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
            <input type="text" class="form-control" name="v_jdate" id="v_jdate"
            placeholder="Join date" value="<?php echo $jdate2 ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $joinDate_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">End date </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_edate" id="v_edate"
            placeholder="End date" value="<?php echo $edate2 ?>" disabled>
          </div>
          <?php if (isset($_POST["btnSubmit"])) { ?>
          <span class="text-danger"><?php echo $endDate_err; ?></span>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Category</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="v_accNO" id="v_accNO"
            placeholder="Account Number" value="<?php echo $job; ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label for="inputText2" class="col-sm-4 control-label">Division</label>
          <div class="col-sm-8">
           <select class="form-control" name="v_department" id="v_department" disabled>
            <?php
            $sql = "SELECT *  FROM tbl_division ";
            $department_data = $con->query($sql);
            if ($department_data->num_rows >= 1) :
              while ($row = mysqli_fetch_assoc($department_data)) :?>
              <option value="<?php echo $row["tblDivisionID"]?>" <?php if ($row["tblDivisionID"]==$tblDivisionID): ?>
                selected="selected";
              <?php endif ?>>
              <?php echo $row["Name"]?>

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
        <input type="text" class="form-control" value="5000.00" name="v_salary" id="v_salary" disabled>
      </div>
      <?php if (isset($_POST["btnSubmit"])) { ?>
      <span class="text-danger"><?php echo $salary_err; ?></span>
      <?php } ?>
    </div>
  </div>
</div>
<br/>
<input type="submit" class="btn btn-warning btn-lg btn-block" name="btnSubmit" value="Back">
</div>
</form>
</center>
</body>
</html>