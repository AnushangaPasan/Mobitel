$(document).ready(function(){
	$.ajax({
		url: "bar/data.php",
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
						label: 'Total Trainee',
						data: type1,
						backgroundColor: "rgba(150, 10, 150, 0.05)",
						borderColor: "rgba(150, 10, 150, 0.05)",
						borderWidth: 1
					}
					
					
					
				]
			};
			
			


			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdatanew
			options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
		},
		error: function(data) {
			console.log(data);
		}
	});
});