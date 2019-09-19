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
	<form method="POST" action="">
		<div id="chart-container" >
			<div>
				<center>
					<h3>Category vs Trainee Graph</h3>
				</center>
			</div>
			<canvas id="mycanvas"></canvas>

				<button id="save-btn" style="background-color: yellow">Save chart</button>
</br></br>
		</div>
	</form>
	<center >
		<table style="border: 1px solid black; border-collapse: collapse; width: 80%;">
			<tr style="border: 1px solid black; ">
				<th style="border: 1px solid black; background-color: #4CAF50;
				color: white; " >#</th>
				<th style="border: 1px solid black;  background-color: #4CAF50;
    color: white;" >Year</th>
				<th style="border: 1px solid black;  background-color: #4CAF50;
    color: white;" >Total</th>
				

			</tr>

			<?php
			define('DB_HOST', 'localhost');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', '');
			define('DB_NAME', 'ims_inoc');

//get connection
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if(!$mysqli){
				die("Connection failed: " . $mysqli->error);
			}

			$sql="SELECT jdate, 
			COUNT(tblTraineeID) AS type1,
			COUNT(IF(job_type ='GENERAL', tblTraineeID, NULL)) AS type2,
			COUNT(IF(job_type ='ON JOB', tblTraineeID, NULL)) AS type3  
			FROM tbl_trainee 
			GROUP BY YEAR(jdate);"; 



			$result = $mysqli->query($sql);
			$response = array();
//the array that will hold the titles and links
			$data = array();
			$count=1;
			if ($result->num_rows > 0) {
    // output data of each row
				while($row = $result->fetch_assoc()) {


					$type=$row['jdate'];
					$type1=$row['type1'];
					$date=explode(" ",$type);
					$year=explode('-',$date[0]);
					$type2=$row['type2'];
					$type3=$row['type3'];

					?>
					<tr style="border: 1px solid black; ">
						<td style="border: 1px solid black; "><?php echo $count++ ?></td>
						<td style="border: 1px solid black; "><?php echo $year[0]?></td>
						<td style="border: 1px solid black; "><?php echo $type1?></td>
						


					</tr>
					<?php
				}
			} else {

			}
			?>

		</table>
	</center>
	<!-- javascript -->
	<script type="text/javascript" src="bar_chart/jquery.min.js"></script>
	<script type="text/javascript" src="bar_chart/Chart.min.js"></script>
	<script type="text/javascript" src="bar/total_trainee1.js"></script>
	<script type="text/javascript" src="mjs/FileSaver.min.js"></script>
	<script type="text/javascript" src="mjs/canvas-toBlob.js"></script>
	<script type="text/javascript">
		$("#save-btn").click(function() {
			$("#mycanvas").get(0).toBlob(function(blob) {
				saveAs(blob, "chart_1.png");
			});
		});

	</script>
</body>
</html>