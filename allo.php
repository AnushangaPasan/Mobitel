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
                                           placeholder="Trainee ID" value="<?php if (isset($_POST['btnTrainee1'])) {



                                       // echo $_POST['v_Trainee_ID'];
                                    } ?>">
                                </div></td>
                                <?php if (isset($_POST["btnTrainee1"])) { ?>

                                    <span class="text-danger"></span>

                                <?php } ?>
                            


              </th>






            

             <td style="padding-top: 30px; padding-bottom: 30px"><input type="submit" name="btnTrainee1" class="btn btn-success" value="View Data"></td>


          </table>

        </form>

      </div>

          

                    <?php 
                    if(isset($_POST["btnTrainee1"])){
                    $rowcount2=1;
                    $today=date('Y-m-d');
                    $TID= 'MOB/TR/' . $_POST['v_Trainee_ID'];
                    $from = $_POST["fDate"]." "."00:00:00";
              $to = $_POST["tDate"]." "."23:59:59";


            $sql1 = "SELECT *  FROM tbl_attendence WHERE  (CurrentDate BETWEEN '".$from."' AND '".$to."' ) AND tblTraineeID='".$TID."' ";
             // $sql = "SELECT *  FROM tbl_attendence WHERE  MONTH(CurrentDate)='09' AND Trainee_ID='".$TID."  "
                   

                    ?>
                            <?php 
                            $tblTraineeID=$TID;
                            $sql = "SELECT * FROM `tbl_trainee` WHERE `Trainee_ID`='$tblTraineeID' ";

                            $resultSet = $con->query($sql);

                            if ($resultSet->num_rows == 1) {

                                $rows = mysqli_fetch_assoc($resultSet);
                                $title=$rows['Title'];
                                $name = $rows['Full_Name'];

                            }
?>
                              <table>
  <tr>
    <th>Name</th> <td><?php echo $title.'.'.$name ?></td>
       <th>TraineeID</th>   <td><?php echo $TID; ?></td>

  </tr>


</table>

  <table class="table table-hover table-bordered ">
                <tr>
                    <th>#</th>
                    <th> Date   </th>
                    <th> In time </th>
                    <th> Out time </th>


                </tr>
                <tbody>

<?Php
 $institute_data1 = $con->query($sql1);
                    if ($institute_data1->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($institute_data1)) :?>


                        <tr>

                            
                            

                            <td><?php echo $rowcount2++; ?></td>

                            <td><?php echo $row['CurrentDate']; ?></td>
                            <td><?php echo $row['In_Time']; ?></td>
                            <td><?php echo $row['Out_Time']; ?></td> 

                        </tr>
                        <?php
                    endwhile;






                    }
                } ?>

            </tbody>
        </table>




No of Days Worked <?php echo --$rowcount2; ?> 






    </form>













  </tr>
</form>
</table>
</div>
</div>
</body>
</html>