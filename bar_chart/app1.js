$(document).ready(function(){
	$.ajax({
		url: "http://localhost/aa/bar_chart/data1.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var type = [];
			var type1 = [];
			var type2 = [];
			var type3 = [];
			var type4 = [];

			for(var i in data) {
				type.push(data[i].type);
				type1.push(data[i].type1);
				type2.push(data[i].type2);
				type3.push(data[i].type3);
				type4.push(data[i].type4);
			}

			var chartdata = {
				labels: type,
				datasets : [
					{
						label: '2G',
						data: type1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						borderWidth: 1
					},
					
					{
								label: '3G',
								data: type2,
								 backgroundColor:"rgb(255, 197, 0)",
								orderColor:  "rgb(244, 185, 66)",
								borderWidth: 1
	
					},
					
					{
								label: 'LTE',
								data: type3,
								 backgroundColor:"rgba(211, 72, 54, 0.75)",
								orderColor:  "rgba(211, 72, 54, 1)",
								borderWidth: 1
	
					},
					{
								label: 'Small sites',
								data: type4,
								 backgroundColor:"green",
								orderColor:  "rgba(211, 72, 54, 1)",
								borderWidth: 1
	
					}
					
					
				]
			};
			
			


			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});