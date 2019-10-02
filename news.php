<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Training Programms</title>

    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br><br>
    <div>
        <center>
            <h2>Training Programms</h2>
            <br>
        </center>
    </div>

    <div class="container col-md-10 col-md-offset-1">
        <table class="table table-hover table-bordered ">
            <tr>
                <th>#</th>
                <th>Event ID</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Venue</th>
                <th>Division</th>
                <th>Presenter</th>
            </tr>

            <tbody>

              <?php
               $today = date('Y-m-d 00:00:00');
               $to = date('2100-01-01 00:00:00');
                $rowcount=1;
              $sql = "SELECT *  FROM tbl_event WHERE flag='ACTIVE' AND (SDate BETWEEN '".$today."' AND '".$to."' )    ";
              $event_data = $con->query($sql);


              if ($event_data->num_rows >= 1) {
                while ($row = mysqli_fetch_assoc($event_data)) :?>
                <tr>
                    <td><?php echo $rowcount++; ?></td>
                    <td><?php echo  $row['EventID']; ?></td>
                    <td><?php echo  $row['SDate']; ?></td>
                    <td><?php echo  $row['STime']; ?></td>
                    <td><?php echo  $row['ETime']; ?></td>
                    <td><?php echo  $row['Venue']; ?></td>
                    <td><?php echo  $row['Division']; ?></td>
                    <td><?php echo  $row['Presenter']; ?></td>

                   
                 </tr>
                 <?php
             endwhile;
         } ?>



     </tbody>
 </table>
</div>

</center>

</body>
</html>