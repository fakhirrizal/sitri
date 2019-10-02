

function test_chart()
{
	var dataset = [];
	var datakec =[];
	$.ajax({
		type: "GET",
		url: "https://sitri.online/index.php/Beranda/tes_ajax",
		
		success: function(respond){
		datakec = respond;
		for(var i=0;i<datakec.length;i++){
			var dats = [];
			var apalah = parseInt(datakec[i].Id_Rw,10);
			dats.push(apalah);
			dataset.push({"name" : datakec[i].Nomor_Rw, "data" : dats});
		}

		$('#suara').highcharts({
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
			series: dataset
		});
		}
		})

}