$(document).ready(function(){
	$.ajax({
		url : "http://localhost/aa/mjs/mdata.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var date = [];
			var type1_v = [];
			var type2_v= [];
			var type3_v = [];
			
			for(var i in data) {
				date.push(data[i].Type);
				type1_v.push(data[i].type1);
				type2_v.push(data[i].type2);
				type3_v.push(data[i].type3);
				
					
			}

			var chartdata = {
				labels: date,
				datasets: [
					{
						label: "Huawei",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: type1_v
					},
					
					{
						label: "LTE",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 8255, 152, 0.75)",
						borderColor: "rgba(59, 255, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 255, 152, 1)",
						pointHoverBorderColor: "rgba(59, 255, 152, 1)",
						data: type2_v
					},
					{
						label: "ZTE",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: type3_v
					},
					
				
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