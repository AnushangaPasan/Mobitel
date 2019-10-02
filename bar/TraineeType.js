$(document).ready(function(){
	$.ajax({
		url: "bar/SamuraiData.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var type = [];
			var type20 = [];
			var type30 = [];
			var type40 = [];

			for(var i in data) {
				type.push(data[i].type);
				type20.push(data[i].type20);
				type30.push(data[i].type30);
				type40.push(data[i].type40);
			}

			var chartdatanew = {
				labels: type,
				datasets : [
					{
						label: 'Diploma',
						data: type20,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						borderWidth: 1
					},
					
					{
								label: 'CERTIFICATE',
								data: type30,
								 backgroundColor:"rgb(255, 197, 0)",
								orderColor:  "rgb(244, 185, 66)",
								borderWidth: 1
	
					},
					
					{
								label: 'DEGREE',
								data: type40,
								 backgroundColor:"rgba(211, 72, 54, 0.75)",
								orderColor:  "rgba(211, 72, 54, 1)",
								borderWidth: 1
	
					}
					
					
				]
			};
			
			


			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdatanew
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});