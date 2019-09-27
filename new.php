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






            

             <td style="padding-top: 30px; padding-bottom: 30px"><input type="submit" name="btnTrainee" class="btn btn-success" value="View Data"></td>
          </table>

        </form>

      </div>

      <div>

        <table class="table table-bordered " id="tblTrainee">


    
         <tr>
                    <th>#</th>
                    <th>TraineeID</th>
                    <th>Name</th>
                    <th>In time</th>
                    <th>Out time</th>


                </tr>



          <tbody>
            

</div> 
            <?php
            $rowcount=1;
            date_default_timezone_set('Asia/Colombo');
            $time = date('H:i:s');
            if(isset($_POST["btnTrainee"])):
              $from = $_POST["fDate"]." "."00:00:00";
              $to = $_POST["tDate"]." "."23:59:59";
              
              $TID= 'MOB/TR/' . $_POST['v_Trainee_ID'];
             

                



                if($TID!=="MOB/TR/"){

                  $sql1 = "SELECT *  FROM tbl_attendence WHERE  MONTH(CurrentDate)='09' AND Trainee_ID='".$TID."  ";
                //  $sql1="SELECT *FROM tbl_attendence WHERE (CurrentDate BETWEEN '".$from."' AND '".$to."' ) AND Trainee_ID='".$TID."' ";
                  $sql="SELECT *FROM tbl_trainee WHERE Trainee_ID='".$TID."' ";
                    //  echo "01";

                }


                $trainee_data = $con->query($sql1);
               // $trainee_data1 = $con->query($sql1);

                if(mysqli_num_rows($trainee_data)>0):

                    $InsID= $row['tblTrainingInstituteID'];
                    $BankID= $row['tblBankID'];

                    $JoinD=$row['jdate'];
                   // $JoinDate= explode(" ", $JoinD);
                   // $J1=$JoinDate[0];
                   // $J2=explode("-", $J1);
                  //  $Y=$J2[0].'<br>';
                  //  $M=$J2[1];
                   // $D=$J2[2];
                   // $StartDate=$D.".".$M.".".$Y;
                    
                   // $EndD=$row['edate'];
                   // $EndDate= explode(" ", $EndD);
                   // $E1=$EndDate[0];
                   //// $E2=explode("-", $E1);
                   // $EY=$J2[0].'<br>';
                  //  $EM=$J2[1];
                  //  $ED=$J2[2];
                   // $End_Date=$ED.".".$EM.".".$EY;
                     //$sql1="SELECT * FROM tbl_attendence WHERE (MOUNT(CurrentDate) = '09') AND Trainee_ID='".$TID."' ";
                


                //$trainee_data1 = $con->query($sql1);
                    


                 //   if(mysqli_num_rows($trainee_data1)):
                      while($row=mysqli_fetch_array($trainee_data)):


                    ?>
                    <tr> 
                      <td><?php echo $rowcount2++; ?></td>
                            <td><?php echo $row['tblTraineeID']; ?></td>
                            <td><?php echo $title.'.'.$name ?></td>
                            <td><?php echo $row['In_Time']; ?></td>
                            <td><?php echo $row['Out_Time']; ?></td> 
                </tr>
                <?php

              endwhile;
            endif;
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