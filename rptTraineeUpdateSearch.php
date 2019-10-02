<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Trainee Report</title>
  <?php include("header.php") ?>
</head>
<body> 

  <br><br><br>   
  <center>
    <h2>Trainee Details</h2>
  </center>
  <div class="container col-md-11 col-md-offset-1 form-horizontal ">
    <h2>Trainee Report</h2>
    <div class="container col-md-12">
      <table  >
        <form action="" method="post" class="form-horizontal">
          <tr>
            <th><label>From Date</label>
             <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><input type="Date" name="fDate" class="form-control"> </td></th>
             <th><label>To Date</label>
               <td  style="width: 200px; padding-right: 30px;padding-left: 10px;"><input type="Date" name="tDate" class="form-control"></td></th>
               <th><label>Institute</label>
                 <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><select class="form-control" name="v_institute" id="v_institute">
                  <option>--SELECT--</option>
                  <?php
                  $sql = "SELECT *  FROM tbl_institute ORDER BY TrainingInstitute_Name ";
                  $institute_data = $con->query($sql);
                  if ($institute_data->num_rows >= 1) :

                    while ($row = mysqli_fetch_assoc($institute_data)) :?>
                    <option value="<?=$row["tblTrainingInstituteID"]?>"><?php echo $row["TrainingInstitute_Name"]?></option>
                    <?php
                  endwhile;
                endif;
                ?>
              </select></td></th>


              <th>

                                <label>Trainee ID</label>
                                <td>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_Trainee_ID" id="v_Trainee_ID"
                                           placeholder="Trainee ID" value="<?php if (isset($_POST['btnTrainee'])) {



                                        echo $_POST['v_Trainee_ID'];
                                    } ?>">
                                </div></td>
                                <?php if (isset($_POST["btnTrainee"])) { ?>

                                    <span class="text-danger"></span>

                                <?php } ?>
                            


              </th>






            <!--  <th><label>Trainee ID</label>
               <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><select class="form-control" name="v_Trainee_ID" id="v_Trainee_ID">
                <option>--SELECT--</option>
                <?php
                $sql = "SELECT *  FROM tbl_trainee WHERE flag!='PENDING' ";
                $TID_data = $con->query($sql);
                if ($TID_data->num_rows >= 1) :

                  while ($row = mysqli_fetch_assoc($TID_data)) :?>
                  <option value="<?=$row["Trainee_ID"]?>"><?php echo $row["Trainee_ID"]?></option>
                  <?php
                endwhile;
              endif;
              ?>
            </select></td></th> -->
            


          </tr><tr></tr><tr>



              <th>

                                <label>NIC</label>
                                <td>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_NIC2" id="v_NIC2"
                                           placeholder="NIC" value="<?php if (isset($_POST['btnTrainee'])) {
                                        echo $_POST['v_NIC2'];
                                    } ?>">
                                </div></td>
                                <?php if (isset($_POST["btnTrainee"])) { ?>

                                    <span class="text-danger"></span>

                                <?php } ?>
                            


              </th>

            <!--
           <th style="padding-top: 20px;"><label>NIC </label>
             <td style="width: 200px; padding-right: 30px;padding-top: 20px;padding-left: 10px;"><select class="form-control" name="v_NIC2" id="v_NIC2">
              <option>--SELECT--</option>
              <?php
              $sql = "SELECT *  FROM tbl_trainee WHERE flag!='PENDING' ORDER BY NIC ";
              $NIC_data = $con->query($sql);
              if ($NIC_data->num_rows >= 1) :

                while ($row = mysqli_fetch_assoc($NIC_data)) :?>
                <option value="<?=$row["NIC"]?>"><?php echo $row["NIC"]?></option>
                <?php
              endwhile;
            endif;
            ?>
          </select>

            -->
          </td></th>
          
          <th style="padding-top: 20px;"><label>Status</label>
            <td style="width: 200px; padding-right: 30px;padding-top: 20px;padding-left: 10px;"><select class="form-control" name="v_flag">
              <option>--SELECT--</option>
              <option value="ACTIVE">ACTIVE</option>
              <option value="INACTIVE">INACTIVE</option>
            </select></td></th>
            <th style="padding-top: 20px;"><label>Division</label>
              <td style="width: 200px; padding-right: 30px;padding-top: 20px;padding-left: 10px;"><select class="form-control" name="v_divi" id="v_divi">
                <option>--SELECT--</option>
                <?php
                $sql = "SELECT *  FROM tbl_division ";
                $division_data = $con->query($sql);
                if ($division_data->num_rows >= 1) :

                  while ($row = mysqli_fetch_assoc($division_data)) :?>
                  <option value="<?=$row["tblDivisionID"]?>"><?php echo $row["Name"]?></option>
                  <?php
                endwhile;
              endif;
              ?>
            </select></td></th>

            <th style="padding-top: 20px;"><label>Job Type</label>
              <td style="width: 200px; padding-right: 30px;padding-top: 20px;padding-left: 10px; "><select class="form-control" name="v_job">
                <option>--SELECT--</option>
                <option value="ON JOB">ON JOB</option>
                <option value="GENERAL">GENERAL</option>
              </select></td></th>
            </tr>

             <td style="padding-top: 30px; padding-bottom: 30px"><input type="submit" name="btnTrainee" class="btn btn-success" value="View Data"></td>
          </table>

        </form>

      </div>

      <div>

        <table class="table table-bordered " id="tblTrainee">


    
          <th>#</th>
          <th>Trainee ID</th>
          <th>Title</th>
          <th>Name</th>
          <th>Mobile</th>
          <th>NIC</th>
          <th>Address</th>
          <th>Institute</th>
          <th>Join Date</th>
          <th>End Date</th>
          <th>Job Type</th>
          <th>Bank</th>
          <th>Branch</th>
          <th>Acc No.</th>
          <th>View</th>



          <tbody>
            

</div> 
            <?php
            $rowcount=1;
            date_default_timezone_set('Asia/Colombo');
            $time = date('H:i:s');
            if(isset($_POST["btnTrainee"])):
              $from = $_POST["fDate"]." "."00:00:00";
              $to = $_POST["tDate"]." "."23:59:59";
              $flag= $_POST['v_flag'];
              $jtype= $_POST['v_job'];
              $institute= $_POST['v_institute'];
              $division= $_POST['v_divi'];
              $TID= 'MOB/TR/' . $_POST['v_Trainee_ID'];
              $NIC2=$_POST['v_NIC2'];




/*                echo $from."<br>";
                echo $to."<br>";
                echo $institute."<br>";
                echo $division."<br>";
                echo $flag."<br>";
                echo $jtype."<br>";
                echo $TID;
                echo $NIC2;*/

                



                if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND flag='".$flag."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "01";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND tblTrainingInstituteID='".$institute."' AND flag='".$flag."' AND flag!='PENDING' AND job_type='".$jtype."' ";
                    //  echo "02";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND flag='".$flag."' AND flag!='PENDING'  ";
                    //  echo "03";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "04";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND flag='".$flag."' AND tblDivisionID='".$division."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "05";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE flag='".$flag."' AND tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "06";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND flag='".$flag."' AND tblTrainingInstituteID='".$institute."' AND flag!='PENDING' ";
                    //  echo "07";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND tblTrainingInstituteID='".$institute."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "08";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND flag!='PENDING' ";
                    //  echo "09";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND flag='".$flag."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "10";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND flag='".$flag."' AND tblDivisionID='".$division."' AND flag!='PENDING' ";
                    //  echo "11";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' )  AND job_type='".$jtype."' AND tblDivisionID='".$division."'  AND flag!='PENDING' ";
                    //  echo "12";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE job_type='".$jtype."' AND flag='".$flag."' AND tblTrainingInstituteID='".$institute."' AND flag!='PENDING' ";
                    //  echo "13";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblDivisionID='".$division."' AND flag='".$flag."' AND tblTrainingInstituteID='".$institute."' AND flag!='PENDING' ";
                    //  echo "14";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE job_type='".$jtype."' AND tblDivisionID='".$division."' AND tblTrainingInstituteID='".$institute."' AND flag!='PENDING'  ";
                    //  echo "15";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE job_type='".$jtype."' AND tblDivisionID='".$division."' AND flag='".$flag."'  AND flag!='PENDING' ";
                    //  echo "16";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND  tblTrainingInstituteID='".$institute."' AND flag!='PENDING' ";
                    // echo "17";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND flag='".$flag."' AND flag!='PENDING' ";
                    //  echo "18";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "19";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' ) AND tblDivisionID='".$division."' AND flag!='PENDING'";
                    //  echo "20";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE flag='".$flag."' AND tblTrainingInstituteID='".$institute."' AND flag!='PENDING'";
                    //  echo "21";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblTrainingInstituteID='".$institute."' AND job_type='".$jtype."' AND flag!='PENDING'";
                    //  echo "22";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblTrainingInstituteID='".$institute."' AND tblDivisionID='".$division."' AND flag!='PENDING'";
                    //  echo "23";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="" && $flag!="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE job_type='".$jtype."' AND flag='".$flag."' AND flag!='PENDING'";
                    //  echo "24";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblDivisionID='".$division."' AND flag='".$flag."' AND flag!='PENDING'";
                    //  echo "25";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblDivisionID='".$division."' AND job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "26";

                }else if($from!=" 00:00:00" && $to!=" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE (jdate BETWEEN '".$from."' AND '".$to."' AND flag!='PENDING' )";
                    //  echo "27";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute!="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE tblTrainingInstituteID='".$institute."' AND flag!='PENDING' ";
                    //  echo "28";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag!="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE flag='".$flag."'  AND flag!='PENDING'";
                    //  echo "29";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype!="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE  job_type='".$jtype."' AND flag!='PENDING' ";
                    //  echo "30";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division!="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee WHERE  tblDivisionID='".$division."' AND flag!='PENDING' ";
                    //  echo "31";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/" && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee  WHERE flag!='PENDING' ";
                     // echo "32";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID!="MOB/TR/"  && $NIC2==""){
                  $sql="SELECT *FROM tbl_trainee  WHERE Trainee_ID='".$TID."' ";
                      //echo "33";

                }else if($from==" 00:00:00" && $to==" 23:59:59" && $institute=="--SELECT--" && 
                 $division=="--SELECT--" && $flag=="--SELECT--" && $jtype=="--SELECT--" && $TID=="MOB/TR/"  && $NIC2!=""){
                  $sql="SELECT *FROM tbl_trainee  WHERE NIC='".$NIC2."' ";
                  //echo "34";

                }else if($from!=" 00:00:00" && $to==" 23:59:59"){
                  $sql="SELECT *FROM tbl_trainee  WHERE jdate= '".$from."' ";
                 // echo "Select data range...!";

                }else if($from==" 00:00:00" && $to!=" 23:59:59"){
                  $sql="SELECT *FROM tbl_trainee  WHERE edate= '".$to."' ";
                 // echo "Select data range...!";

                }else if($TID!="MOB/TR/"  && $NIC2!=""){
                $sql="SELECT *FROM tbl_trainee  WHERE Trainee_ID='".$TID."' ";
                 // echo "37";

                }else if($TID!="MOB/TR/"  && $NIC2==""){
                $sql="SELECT *FROM tbl_trainee  WHERE Trainee_ID='".$TID."' ";
                 // echo "38";

                }else if($TID=="MOB/TR/"  && $NIC2!=""){
                $sql="SELECT *FROM tbl_trainee  WHERE NIC='".$NIC2."' ";
                 // echo "39";

                }


                $trainee_data = $con->query($sql);
                if(mysqli_num_rows($trainee_data)>0):


                  while($row=mysqli_fetch_array($trainee_data)):

                    $InsID= $row['tblTrainingInstituteID'];
                    $BankID= $row['tblBankID'];

                    $JoinD=$row['jdate'];
                    $JoinDate= explode(" ", $JoinD);
                    $J1=$JoinDate[0];
                    $J2=explode("-", $J1);
                    $Y=$J2[0].'<br>';
                    $M=$J2[1];
                    $D=$J2[2];
                    $StartDate=$D.".".$M.".".$Y;
                    
                    $EndD=$row['edate'];
                    $EndDate= explode(" ", $EndD);
                    $E1=$EndDate[0];
                    $E2=explode("-", $E1);
                    $EY=$J2[0].'<br>';
                    $EM=$J2[1];
                    $ED=$J2[2];
                    $End_Date=$ED.".".$EM.".".$EY;
                    



                    ?>
                    <tr> 
                      <td><?php echo $rowcount++; ?></td>
                      <td><?php echo $row['Trainee_ID']?></td>
                      <td><?php echo  $row['Title']?></td>
                      <td><?php echo  $row['Name_with_Initials']?></td>
                      <td><?php echo $row['Contact_Number1']?></td>
                      <td><?php echo $row['NIC']?></td>
                      <td><?php echo $row['Add_Line1']?><?php echo ","?>
                        <?php echo $row['Add_Line2']?><?php echo ","?>
                        <?php echo $row['Add_Line3']?></td>
                        <td>
                         <?php
                         $sql = "SELECT *  FROM tbl_institute WHERE tblTrainingInstituteID= '".$InsID."'  ";
                         $institute_data = $con->query($sql);
                         if ($institute_data->num_rows >= 1) :

                          while ($row1 = mysqli_fetch_assoc($institute_data)) :?>
                          <?php echo $row1['TrainingInstitute_Name']?>
                          <?php
                        endwhile;
                      endif;
                      ?>

                    </td> 
                    <td><?php echo $JoinD ?></td>
                    <td><?php echo $EndD ?></td>
                    <td><?php echo $row['job_type']?></td>
                    <td>
                      <?php
                      $sql = "SELECT *  FROM tbl_bank WHERE tblBankID= '".$BankID."'  ";
                      $bank_data = $con->query($sql);
                      if ($bank_data->num_rows >= 1) :
                        while ($row2 = mysqli_fetch_assoc($bank_data)) :?>
                        <?php echo $row2['Bank_Name']?>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </td> 
                  <td><?php echo $row['bankBranch']?></td>
                  <td><?php echo $row['Bank_Account_number']?></td>
                  <td><?php echo $row['flag']?></td>

                  <td>
                    <a href='traineeProfileUpdate.php?id=<?php 
                    echo $row["tblTraineeID"] ?>'
                    class="btn btn-primary btn-xs">Click Here</a>
                  </td>

				    <td>
                            <a href='traineeMaintenance.php?idStatus=<?php echo $row["Trainee_ID"] ?>'
                               class="btn btn-danger btn-xs">Inactive</a>
                        </td>
                        <td>
                            <a href='traineeMaintenance.php?idStatus1=<?php echo $row["tblTraineeID"] ?>'
                               class="btn btn-success btn-xs">Active</a>
                        </td>
				  
                </tr>
                <?php

              endwhile;
            endif;
          endif;
          ?>
        </tbody>
      </table> 
    </div>

<div>


     <td><input type="submit" name="btnExcel" id="btnExcel" class="btn btn-danger" value="Export Excel"></td><div class="label"><?php echo "Total count: ".--$rowcount; ?></div>
     <script src="JQuery/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="JQuery/jquery.table2excel.js"></script>

     <script type="text/javascript">
      $('#btnExcel').click(function(){
        $('.table').table2excel({
          name: "trainee",
          filename: "traineeData",
        });

      });

    </script>
  </div>
<script type="text/javascript">
  $(function() {
    $('a[data-toggle="tab"]').on('click', function(e) {
      window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = window.localStorage.getItem('activeTab');
    if (activeTab) {
      $('#myTab a[href="' + activeTab + '"]').tab('show');
      window.localStorage.removeItem("activeTab");
    }
  });

</script>

</body>
</html>