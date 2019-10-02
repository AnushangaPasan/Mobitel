$(document).ready(function(){
	$.ajax({
		url: "http://localhost/TMS_Mobitel/mjs/data2.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var type = [];
			var type1 = [];
			

			for(var i in data) {
				type.push(data[i].type);
				type1.push(data[i].type1);
				
			}

			var chartdatanew = {
				labels: type,
				datasets : [
					{
						label: 'Count',
						data: type1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
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