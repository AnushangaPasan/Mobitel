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
					<h3>Program vs Trainee Graph</h3>
				</center>
			</div>
			
			
			<canvas id="mycanvas"></canvas>
			<button id="save-btn" style="background-color: yellow">Save chart</button>
			
		</div>
	</form>
	<center >
		
	</center>

	<!-- javascript -->
	<script type="text/javascript" src="bar_chart/jquery.min.js"></script>
	<script type="text/javascript" src="bar_chart/Chart.min.js"></script>
	<script type="text/javascript" src="bar/TraineeType.js"></script>
	<script type="text/javascript" src="mjs/FileSaver.min.js"></script>
	<script type="text/javascript" src="mjs/canvas-toBlob.js"></script>
	<script type="text/javascript">
		$("#save-btn").click(function() {
			$("#mycanvas").get(0).toBlob(function(blob) {
				saveAs(blob, "program_graph.png");
			});
		});

	</script>
</body>
</html>