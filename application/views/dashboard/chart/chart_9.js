

function chart_9()
{
	var dataset9 = [];
	var datakec9 =[];
	$.ajax({
		type: "GET",
		url: "https://sitri-jaktim.com/index.php/Api/chart9",
		
		success: function(respond9){
		datakec9 = respond9;
		for(var i=0;i<datakec9.length;i++){
			var dats9 = [];
			var apalah = parseInt(datakec9[i].jumlah,10);
			dats9.push(apalah);
			dataset9.push({"name" : datakec9[i].Nama_Kecamatan, "data" : dats9});
		}

		$('#chart_9').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Coverage RW (Dapil DPR-RI)'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories: [
					'Nama Kecamatan'
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Total'
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: dataset9
		});
		}
		})

}