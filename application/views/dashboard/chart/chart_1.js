

function chart_1()
{
	var dataset = [];
	var datakec =[];
	$.ajax({
		type: "GET",
		url: "https://sitri-jaktim.com/index.php/Api/chart1",
		success: function(respond){
		datakec = respond;
		for(var i=0;i<datakec.length;i++){
			var dats = [];
			var apalah = parseInt(datakec[i].Jumlah,10);
			dats.push(apalah);
			dataset.push({"name" : datakec[i].Segmentasi, "data" : dats});
		}
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: 'GrafikPie3',
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			credits: { enabled: false },title: {
				text: 'Rekap Segmentasi Semua Kegiatan'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						enabled: true,
						format: '{point.name}'
					}
				}
			},
			series: dataset
		});
		}
		})
}