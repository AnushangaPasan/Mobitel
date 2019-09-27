    <?php include("db.php"); ?>

    <?php $rowcount2=1; $countsss=""; ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Attendance Report</title>
        <?php include("header.php") ?>
    </head>
    <body> 

        <br><br><br>   
        <center>
            <h2>Trainee Attendance Details</h2>
        </center>
        <div class="container col-md-10 col-md-offset-1 ">

            <h2>Attendance Report</h2>

            <table >
                <form action="" method="post" class="form-horizontal">
                    <tr>
                     <th><label>From Date</label></th>
                     <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><input type="Date" name="fDate2" id="fDate2" class="form-control"> </td>
                     <th><td></td></th>
                     <th><label>To Date</label></th>
                     <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><input type="Date" name="tDate2" id="tDate2" class="form-control"></td>
                     <th><label>Trainee ID</label></th>
                     <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><select class="form-control" name="v_TID" id="v_TID">
                        <option>--SELECT--</option>
                        <?php
                        $sql = "SELECT *  FROM tbl_trainee WHERE flag!='PENDING' ";
                        $trainee_data = $con->query($sql);
                        if ($trainee_data->num_rows >= 1) :

                            while ($row = mysqli_fetch_assoc($trainee_data)) :?>
                            <option value="<?php echo $row["Trainee_ID"]?>"><?php echo $row["Trainee_ID"]?></option>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </select></td>

                <th><label>NIC</label></th>
                <td style="width: 200px; padding-right: 30px;padding-left: 10px;"><select class="form-control" name="v_NIC" id="v_NIC">
                    <option>--SELECT--</option>
                    <?php
                    $sql = "SELECT *  FROM tbl_trainee WHERE flag!='PENDING' ORDER BY NIC  ";
                    $trainee_data = $con->query($sql);
                    if ($trainee_data->num_rows >= 1) :

                        while ($row = mysqli_fetch_assoc($trainee_data)) :?>
                        <option value="<?php echo $row["tblTraineeID"]?>"><?php echo $row["NIC"]?></option>
                        <?php
                    endwhile;
                endif;
                ?>
            </select></td>




        </tr>
        <td style="padding-top: 30px; padding-bottom: 30px"><input type="submit" name="btnAttendance" class="btn btn-success" value="View Data"></td>

    </form>
</table>

<div>
    <br>




</br></br>
<table class="table table-bordered " id="tblTrainee" style="padding-top: 100px">


    <th>#</th>
    <th>Trainee ID</th>
    <th>Full Name</th>
    <th>NIC</th>
    <th>Date</th>
    <th>In Time</th>
    <th>Out Time</th>
    <th>Division</th>
    <th>View</th>

    <tbody>
        <?php
        
        date_default_timezone_set('Asia/Colombo');
        $time = date('H:i:s');
        if(isset($_POST["btnAttendance"])):
            $from1 = $_POST["fDate2"]." "."00:00:00";
            $to1 = $_POST["tDate2"]." "."23:59:59";
            $TID= $_POST['v_TID'];
            $TNIC= $_POST['v_NIC'];


            $sql = "SELECT * FROM tbl_trainee WHERE tblTraineeID='".$TNIC."' ";
            $NIC_data = $con->query($sql);
            $TNIC_TID="";
            if ($NIC_data->num_rows >= 1) {
                while ($row4 = mysqli_fetch_assoc($NIC_data)){
                    $TNIC_TID =$row4['Trainee_ID'];

                }
            }   


    /*

                    echo $TNIC_TID."<br>";
                    echo $from1."<br>";
                    echo $to1."<br>";
                    echo $TID."<br>";
                    echo $TNIC."<br>";*/

                    if($from1!=" 00:00:00" && $to1!=" 23:59:59" && $TID=="--SELECT--" && 
                       $TNIC=="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence WHERE (CurrentDate BETWEEN '".$from1."' AND '".$to1."' ) ";
                     // echo "1";

                  }else if($from1!=" 00:00:00" && $to1!=" 23:59:59" && $TID!="--SELECT--" && 
                   $TNIC=="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence WHERE (CurrentDate BETWEEN '".$from1."' AND '".$to1."' AND tblTraineeID='".$TID."' ) ";
                    //  echo "2";

                  }else if($from1!=" 00:00:00" && $to1!=" 23:59:59" && $TID=="--SELECT--" && 
                   $TNIC!="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence WHERE(CurrentDate BETWEEN '".$from1."' AND '".$to1."' AND tblTraineeID='".$TNIC_TID."' ) ";
                     // echo "3";

                  }else if($from1==" 00:00:00" && $to1==" 23:59:59" && $TID!="--SELECT--" && 
                   $TNIC=="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence WHERE tblTraineeID='".$TID."' ";
                      //echo "4";

                  }else if($from1==" 00:00:00" && $to1==" 23:59:59" && $TID=="--SELECT--" && 
                   $TNIC!="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence WHERE tblTraineeID='".$TNIC_TID."' ";
                     // echo "5";

                  }else if($from1==" 00:00:00" && $to1==" 23:59:59" && $TID=="--SELECT--" && 
                   $TNIC=="--SELECT--"  ){
                      $sql="SELECT *FROM tbl_attendence ";
                     // echo "6";

                  }else if($TID!="--SELECT--"  && $TNIC!="--SELECT--"){
                    $sql="SELECT *FROM tbl_attendence  WHERE tblTraineeID='".$TID."' ";
                    //echo "37";

                }else if($TID!="--SELECT--"  && $TNIC=="--SELECT--"){
                    $sql="SELECT *FROM tbl_attendence  WHERE tblTraineeID='".$TID."' ";
                   // echo "38";

                }else if($TID=="--SELECT--"  && $TNIC!="--SELECT--"){
                    $sql="SELECT *FROM tbl_attendence  WHERE tblTraineeID='".$TNIC_TID."' ";
                   // echo "39";

                }



                $attendance_data = $con->query($sql);

                if(mysqli_num_rows($attendance_data)>0):

                    while($row=mysqli_fetch_array($attendance_data)):
                        $TraineeID = $DiviID ="";

                        $TraineeID= $row['tblTraineeID'];
                        $DiviID= $row['tblDivisionID'];
                        $row['CurrentDate'];
                        $countsss=$rowcount2;

                        ?>

                        <tr>
                            <td><?php echo $rowcount2++; ?></td> 
                            <td><?php echo $row['tblTraineeID']?></td>
                            <td> <?php
                            $sql = "SELECT * FROM tbl_trainee WHERE Trainee_ID= '".$TraineeID."' ";

                            $trainee_data = $con->query($sql);
                            if ($trainee_data->num_rows >= 1) :

                                while ($row3 = mysqli_fetch_assoc($trainee_data)) :?>
                                <?php echo $row3['Full_Name']?>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </td>

                    <td>  <?php
                    $sql = "SELECT *  FROM tbl_trainee WHERE Trainee_ID= '".$TraineeID."'  ";

                    $trainee_data = $con->query($sql);
                    if ($trainee_data->num_rows >= 1) :

                        while ($row3 = mysqli_fetch_assoc($trainee_data)) :?>
                        <?php echo $row3['NIC']?>
                        <?php
                    endwhile;
                endif;
                ?>
            </td>
            <?php 
            $AttDate=$row['CurrentDate'];
            $AttDate1=explode(" ", $AttDate);
            $dateAtt=$AttDate1[0];

            ?>

            <td><?php echo $dateAtt ?></td>

            <td><?php echo $row['In_Time']?></td>
            <td><?php echo $row['Out_Time']?></td>
            <td>
                <?php
                $sql = "SELECT *  FROM tbl_division WHERE tblDivisionID= '".$DiviID."'  ";

                $divi_data = $con->query($sql);
                if ($divi_data->num_rows >= 1) :

                    while ($row3 = mysqli_fetch_assoc($divi_data)) :?>
                    <?php echo $row3['Name']?>
                    <?php
                endwhile;
            endif;
            ?>

        </td>
        <td>
                    <a href='traineeView2.php?idatt=<?php 
                    echo $row["tblTraineeID"] ?>'
                    class="btn btn-primary btn-xs">Click Here</a>
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
    <input type="submit" name="btnExcelAttendance" id="btnExcelAttendance" class="btn btn-danger" value="Export Excel" > 
<div class="label"><?php echo "Total count: ".--$rowcount2; 

?></div>

<div>



 <script src="JQuery/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="JQuery/jquery.table2excel.js"></script>

 <script type="text/javascript">
    $('#btnExcelAttendance').click(function(){
        $('.table').table2excel({
            name: "attendance",
            filename: "attendanceData",
        });

    });

</script>
</div>

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