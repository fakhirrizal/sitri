

function chart_10()
{
	var dataset10 = [];
	var datakec10 =[];
	$.ajax({
		type: "GET",
		url: "https://sitri-jaktim.com/index.php/Api/chart10",
		
		success: function(respond10){
		datakec10 = respond10;
		for(var i=0;i<datakec10.length;i++){
			var dats10 = [];
			var apalah10 = parseInt(datakec10[i].jumlah,10);
			dats10.push(apalah10);
			dataset10.push({"name" : datakec10[i].Nama_Kecamatan, "data" : dats10});
		}

		$('#chart_10').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Coverage RW (Dapil DPRD Provinsi)'
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
			series: dataset10
		});
		}
		})

}