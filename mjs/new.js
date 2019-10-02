$(document).ready(function(){
	$.ajax({
		url : "http://localhost/aa/mjs/mdata.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var date = [];
			var type1_v = [];
			var type2_v = [];
			var type3_v = [];
			var type4_v = [];
			var type5_v = [];
			var type6_v = [];
			var type7_v = [];
			
			
			for(var i in data) {
				date.push(data[i].Type);
				type1_v.push(data[i].type1);
				type2_v.push(data[i].type2);
				type3_v.push(data[i].type3);
				type4_v.push(data[i].type4);
				type5_v.push(data[i].type5);
				type6_v.push(data[i].type6);
				type7_v.push(data[i].type7);
		
			}

			var chartdata = {
				labels: date,
				datasets: [
					{
						label:"2G",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: type1_v
					},
					{
						label: "3G",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: type2_v
					},
					{
						label: "LTE",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: type3_v
					},
					{
						label: "Pico-2G",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "green",
						borderColor: "green",
						pointHoverBackgroundColor: "rgba(59, 255, 152, 1)",
						pointHoverBorderColor: "rgba(59, 255, 152, 1)",
						data: type4_v
					},
					{
						label: "Pico-3G",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(255, 150, 255, 0.75)",
						borderColor: "rgba(255, 150, 255, 1)",
						pointHoverBackgroundColor: "rgba(255, 150, 255, 1)",
						pointHoverBorderColor: "rgba(255, 150, 255, 1)",
						data: type5_v
					},
					{
						label: "Pico",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgb(255, 197, 0)",
						borderColor: "rgb(244, 185, 66)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: type6_v
					},
					{
						label: "Total",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(150, 72, 200, 0.75)",
						borderColor: "rgba(150, 72, 200, 1)",
						pointHoverBackgroundColor: "rgba(150, 72, 200, 1)",
						pointHoverBorderColor: "rgba(150, 72, 200, 1)",
						data: type7_v
					}
					
					
					
				
				]	
			};
			
			

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});