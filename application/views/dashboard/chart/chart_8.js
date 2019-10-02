

function chart_8()
{
	var dataset8 = [];
	var datakec8 =[];
	$.ajax({
		type: "GET",
		url: "https://sitri-jaktim.com/index.php/Api/chart8",
		
		success: function(respond8){
		datakec8 = respond8;
		for(var i=0;i<datakec8.length;i++){
			var dats8 = [];
			var apalah = parseInt(datakec8[i].jumlah,10);
			dats8.push(apalah);
			dataset8.push({"name" : datakec8[i].Nama_Kecamatan, "data" : dats8});
		}

		$('#chart_8').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Coverage RW Caleg Total'
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
			series: dataset8
		});
		}
		})

}