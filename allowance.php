<?php include("db.php"); ?>

<?php
if (isset($_POST["btnSubmit"])) {

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
/*$sql = "SELECT * FROM tbl_trainee WHERE NIC='" . $_POST['v_nic'] . "'";*/
$sql = "SELECT * FROM tbl_trainee WHERE NIC='0'";
$resultSet = $con->query($sql);












}
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Intern Allowance Sheet</title>

    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br><br>
    <div>
        <center>
            <h2>MOBITEL (PVT) LIMITED</h2>
            <h4>Intern Allowance Sheet</h4></center>
            <br>



            <!-- test -->
            <div class="container col-md-10 col-md-offset-1 ">



            <center>     <table >
                <form action="" method="post" class="form-horizontal">
                    <tr>
                     <th><label>Trainee ID</label>
               <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><select class="form-control" name="v_Trainee_ID" id="v_Trainee_ID">
                <option>--SELECT--</option>
                <?php
                $sql = "SELECT *  FROM tbl_trainee WHERE flag!='PENDING' ";
                $TID_data = $con->query($sql);
                if ($TID_data->num_rows >= 1) :

                  while ($row = mysqli_fetch_assoc($TID_data)) :?>
                  <option value="<?php echo $row["Trainee_ID"]?>"><?php echo $row["Trainee_ID"]?></option>
                  <?php
                endwhile;
              endif;
              ?>
            </select></td>

            



        </tr>
         <td style="padding-top: 30px; padding-bottom: 30px"><input type="submit" name="btnAttendance" class="btn btn-success" value="submit"></td>

    </form>
</table>
</center>
<div>
    <br>

     <!-- test -->

     <div class="container col-md-10 col-md-offset-1" method="post">
        <table class="table table-hover table-bordered ">
            <tr>
                <th>Date</th>
                
                <th>IN</th>
                <th>OUT</th>
                <th>No. Of Hours</th>
                
                
            </tr>

            <tbody>

            

        
         
              <?php
                $rowcount=1;
              $sql = "SELECT *  FROM tbl_attendence  ";
              $feed_data = $con->query($sql);


              if ($feed_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($feed_data)) :?>

                
                <tr>
                    <td><?php echo $rowcount++; ?></td>
                    <td><?php echo  $row['In_Time']; ?></td>
                    <td><?php echo  $row['Out_Time']; ?></td>
                    <!-- <td><input type="Time"  name="btnSubmit" value="<?php if (isset($_POST['btnSubmit'])) {
                                        echo $_POST['5'];
                                    } ?>">
                                      <?php if (isset($_POST["btnSubmit"])) { ?> -->



<?php } ?></td>
                    <td><input type="Text"  name="Hours" ></td>
                   
                    
                 </tr>
                 <?php
             endwhile;
         } ?>



     </tbody>
 </table>


 
 <div class="container col-md-10 col-md-offset-1" method="post">
        <table class="table table-hover table-bordered ">

        <tr>
                <th>Approvals</th>
                <th>Name</th>
                <th>Signature</th>
         
            </tr>

            <tbody>

  <tr><td>Line Manager/Supervisor/HOD</td><td>__________________________</td><td>_________________</td></tr>
      <tr><td>HR Verification</td><td>__________________________</td><td>_________________</td></tr>
      <tr><td>HR Approval</td><td>__________________________</td><td>_________________</td></tr>

</tbody>

        </table>
        </div>
 <input type="submit" class="btn btn-warning btn-lg btn-block" name="btnSubmit" value="SUBMIT" >
 <br><br>
            <br>
</div>

</body >

</html>