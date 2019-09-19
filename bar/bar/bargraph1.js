$(document).ready(function(){
	$.ajax({
		url: "bar/data1.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var type = [];
			var type1 = [];
			var type2 = [];
			var type3 = [];

			for(var i in data) {
				type.push(data[i].type);
				type1.push(data[i].type1);
				type2.push(data[i].type2);
				type3.push(data[i].type3);
			}

			var chartdatanew = {
				labels: type,
				datasets : [
					{
						label: 'Total',
						data: type1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						borderWidth: 1
					},
					
					{
								label: 'General',
								data: type2,
								 backgroundColor:"rgb(255, 197, 0)",
								orderColor:  "rgb(244, 185, 66)",
								borderWidth: 1
	
					},
					
					{
								label: 'On Job',
								data: type3,
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