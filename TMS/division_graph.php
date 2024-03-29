

<!DOCTYPE html>
<html>
<head>
	<title>ChartJS - BarGraph</title>
	<style type="text/css">
	#chart-container {
		width: 640px;
		height: auto;
	}
</style>
</head>
<body>
	<form method="POST" action="trn_count1.php">
		<div id="chart-container" >
			<div>
				<center>
					<h3>Division vs Trainee Graph</h3>
				</center>
			</div>
			<canvas id="mycanvas"></canvas>
			<button  id="save-btn" style="background-color: yellow">Save chart</button>
			
		</div>
	</form>
	<center >
		<table style="border: 1px solid black; border-collapse: collapse; width: 80%;">
			<tr style="border: 1px solid black; ">
				<th style="border: 1px solid black;  background-color: #4CAF50;
    color: white; " >#</th>
				<th style="border: 1px solid black;  background-color: #4CAF50;
    color: white;" >Division Name</th>
				<th style="border: 1px solid black;  background-color: #4CAF50;
    color: white;" >Total</th>

			</tr>
			<?php
			define('DB_HOST', '172.19.10.20');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', 'inoc@123');
			define('DB_NAME', 'ims_inoc');

//get connection
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if(!$mysqli){
				die("Connection failed: " . $mysqli->error);
			}

			$sql="SELECT a.Name,b.tblDivisionID,count(b.tblTraineeID) as type1
			from tbl_division a, tbl_trainee b  
			where a.tblDivisionID=b.tblDivisionID and b.flag='ACTIVE'
			group by b.tblDivisionID;"; 

			$result = $mysqli->query($sql);
			$response = array();
			$count=1;
//the array that will hold the titles and links
			$data = array();
			if ($result->num_rows > 0) {
    // output data of each row
				while($row = $result->fetch_assoc()) {

					$type=$row['Name'];
					$type1=$row['type1'];
					?>

					<tr style="border: 1px solid black; ">
					<td style="border: 1px solid black; "><?php echo $count++ ?></td>
					<td style="border: 1px solid black; "><?php echo $type?></td>
					<td style="border: 1px solid black; "><?php echo $type1?></td>


				</tr>
				<?php

				//echo "Division name: ".$type." Count: ".$type1."<br>";
			}
		} else {

		}
		?>


		<!-- javascript -->
		<script type="text/javascript" src="bar_chart/jquery.min.js"></script>
		<script type="text/javascript" src="bar_chart/Chart.min.js"></script>
		<script type="text/javascript" src="bar/bargraph2.js"></script>
		<script type="text/javascript" src="mjs/FileSaver.min.js"></script>
		<script type="text/javascript" src="mjs/canvas-toBlob.js"></script>
		<script type="text/javascript">
			$("#save-btn").click(function() {
				$("#mycanvas").get(0).toBlob(function(blob) {
					saveAs(blob, "division_graph.png");
				});
			});

		</script>
	</body>
	</html>