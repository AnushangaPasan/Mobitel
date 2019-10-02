$(document).ready(function(){
	$.ajax({
		url : "http://localhost/aa/mjs/mdata1.php",
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
				date.push(data[i].Typerr);
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
						label:"ssssss",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: type1_v
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