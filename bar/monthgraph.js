$(document).ready(function(){
	$.ajax({
		url: "bar/SamuraiData.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var type = [];
			var type0 = [];
			var type1 = [];
			var type2 = [];
			var type3 = [];
			var type4 = [];
			var type5 = [];
			var type6 = [];
			var type7 = [];
			var type8 = [];
			var type9 = [];
			var type10 = [];
			var type11 = [];
			var type12 = [];

			for(var i in data) {
				type.push(data[i].type);
				type0.push(data[i].type0);
				type1.push(data[i].type1);
				type2.push(data[i].type2);
				type3.push(data[i].type3);
				type4.push(data[i].type4);
				type5.push(data[i].type5);
				type6.push(data[i].type6);
				type7.push(data[i].type7);
				type8.push(data[i].type8);
				type9.push(data[i].type9);
				type10.push(data[i].type10);
				type11.push(data[i].type11);
				type12.push(data[i].type12);
			}

			var chartdatanew = {
				labels: type,
				datasets : [
					
					
					{
								label: 'Jan',
								data: type1,
								 backgroundColor:"rgba(255, 50, 0,0.9)",
								orderColor:  "rgba(255, 100, 0,1)",
								borderWidth: 1
	
					},
					
					{
								label: 'Feb',
								data: type2,
								 backgroundColor:"rgba(255, 50, 22,0.5)",
								orderColor:  "rgba(255, 100, 22,1)",
								borderWidth: 1
	
					},
					{
								label: 'Mar',
								data: type3,
								 backgroundColor:"rgba(255, 100, 44,0.5)",
								orderColor:  "rgba(255, 100, 44,1)",
								borderWidth: 1
	
					},
					{
								label: 'Apr',
								data: type4,
								 backgroundColor:"rgba(255, 100, 66,0.5)",
								orderColor:  "rgba(255, 100, 66,1)",
								borderWidth: 1
	
					},
					{
								label: 'May',
								data: type5,
								 backgroundColor:"rgba(255, 100, 88,0.5)",
								orderColor:  "rgba(255, 100, 88,1)",
								borderWidth: 1
	
					},
					{
								label: 'Jun',
								data: type2,
								 backgroundColor:"rgba(255, 100, 110,0.5)",
								orderColor:  "rgba(255, 100, 110,1)",
								borderWidth: 1
	
					},
					{
								label: 'Jul',
								data: type7,
								 backgroundColor:"rgba(255, 100, 132,0.5)",
								orderColor:  "rgba(255, 100, 132,1)",
								borderWidth: 1
	
					},
					{
								label: 'Augest',
								data: type8,
								 backgroundColor:"rgba(255, 100, 154,0.5)",
								orderColor:  "rgba(255, 100, 154,1)",
								borderWidth: 1
	
					},
					{
								label: 'Sep',
								data: type9,
								 backgroundColor:"rgba(255, 100, 176,0.5)",
								orderColor:  "rgba(255, 100, 176,1)",
								borderWidth: 1
	
					},
					{
								label: 'Oct',
								data: type10,
								 backgroundColor:"rgba(255, 100, 198,0.5)",
								orderColor:  "rgba(255, 100, 198,1)",
								borderWidth: 1
	
					},
					{
								label: 'Nov',
								data: type11,
								 backgroundColor:"rgba(255, 100, 220,0.5)",
								orderColor:  "rgba(255, 100, 220,1)",
								borderWidth: 1
	
					},
					{
								label: 'Dec',
								data: type12,
								 backgroundColor:"rgba(255, 100, 244,0.5)",
								orderColor:  "rgba(255, 100, 244,1)",
								borderWidth: 1
	
					},
					
					
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