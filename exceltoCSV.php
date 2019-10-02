<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
				</tr>


			</thead>
			<tbody>
				<tr><td>1</td><td>sandun</td></tr>
				<tr><td>1</td><td>sandun</td></tr>
				<tr><td>1</td><td>sandun</td></tr>
				<tr><td>1</td><td>sandun</td></tr>
				<tr><td>1</td><td>sandun</td></tr>
				<tr><td>1</td><td>sandun</td></tr>


			</tbody>
			<!-- <tfoot class="noExl">
				<tr>
					<th>ID</th>
					<th>Name</th>
				</tr>


			</tfoot>
 -->		</table>
		<button id="excel" class="btn btn-success">Export</button>
	</div>
	<script src="JQuery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="JQuery/jquery.table2excel.js"></script>

	<script type="text/javascript">
		$('#excel').click(function(){
			$('.table').table2excel({
				exclude: ".noExl",
				name: "trainee",
				filename: "traineeData",
			});

		});

	</script>


</div>







</body>
</html>