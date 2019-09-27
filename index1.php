<?php include("db.php");

$sql="SELECT tblDivisionID,COUNT(tblDivisionID) FROM tbl_division GROUP BY tblDivisionID";
$divisionid="";
$resultSet= $con->query($sql);
$tblDivisionID1="";
if ($resultSet->num_rows >=1){

    while( $rows = $resultSet-> fetch_assoc()){
       //print_r($rows);
       $tblDivisionID=$rows["tblDivisionID"];
       $tblDivisionID1=$rows["COUNT(tblDivisionID)"];
      // echo $tblDivisionID."=>".$tblDivisionID1."<br>";
   }
 //  echo $tblDivisionID1-1;;
}

?>


<html>
<title>Home</title>
<head>

    <?php 
    include("header.php");
    if (empty($_SESSION["user_id"])) {
        header("Location:index.php");
    }
    ?>
</head>
<body>
    <center>
        <br><br><br>
        <h2>Daily Attendance Summary</h2>

        <div class="container col-md-8 col-md-offset-2">
            <form action="RegisterAction">
                <br>
                <br>
                <table class="table table-borderd table-responsive " style=" color: black;" BORDER=1 BORDERCOLOR=GReen >
                    <thead >
                        <tr bgcolor="#3498DB">
                            <th style=" color: white;">#</th>
                            <th style=" color: white;">Name</th>
                            <th style=" color: white;">Total</th>
                            <th style=" color: white;">Present</th>
                            <th style=" color: white;">Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rowcount=1;


                        $sql="SELECT tblDivisionID,COUNT(tblDivisionID) FROM tbl_trainee  WHERE  flag='ACTIVE' GROUP BY tblDivisionID" ;
                        $divisionid="";
                        $resultSet= $con->query($sql);
                        $tblDivisionID1=$present_count=$tota_count="";
                        $tot_present_count=$total_count=$tot_absent=0;
                        if ($resultSet->num_rows >=1):

                            while( $rows = $resultSet-> fetch_assoc()):?>
                            <tr style=" color: black;"> 

                                <td><?php echo $rowcount++; ?></td>
                                <td><?php 

                                $sql1="SELECT * FROM tbl_division WHERE tblDivisionID='".$rows["tblDivisionID"]."' ";
                                $resultSet1= $con->query($sql1);
                                if ($resultSet1->num_rows >=1){
                                    while( $rows1 = $resultSet1-> fetch_assoc()){
                                        echo $rows1["Name"];
                                    }
                                } ?>   
                            </td>
                            <td><?php 
                            echo $rows["COUNT(tblDivisionID)"];
                            $tota_count = $rows["COUNT(tblDivisionID)"];
                            $total_count = $total_count + $tota_count;
                            ?>  
                        </td>
                        <td><?php 
                        $date = date('Y-m-d')." ".'08:00:00';
                        $sql2="SELECT COUNT(tblDivisionID) FROM tbl_attendence WHERE tblDivisionID='".$rows["tblDivisionID"]."' AND CurrentDate='".$date."' ";
                        $resultSet2= $con->query($sql2);
                        if ($resultSet2->num_rows >=1){
                            while( $rows2 = $resultSet2-> fetch_assoc()){
                                echo $rows2["COUNT(tblDivisionID)"];
                                $present_count = $rows2["COUNT(tblDivisionID)"];
                                $tot_present_count = $tot_present_count+$present_count;
                            }
                        }
                        ?>

                    </td>
                    <td><?php echo $tota_count-$present_count;
                    $tot_absent = $tot_absent +($tota_count-$present_count);
                    ?></td>
                </tr>
            <?php endwhile;
        endif;
        ?>
        <tr>
            <td colspan="2" style=" color: black;font-size: 20px;">Total Count</td>
            <td style=" color: black;font-size: 20px; font-weight: bold;"><?php echo $total_count; ?></td>
            <td style=" color: black;font-size: 20px; font-weight: bold;"><?php echo $tot_present_count; ?></td>
            <td style=" color: black;font-size: 20px; font-weight: bold;"><?php echo $tot_absent; ?></td>
        </tr>
    </tbody>

</table>

</form>
</div>

</center>

</body>


</html>

