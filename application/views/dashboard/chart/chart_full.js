function chart_1()
{
	var dataset = [];
	var datakec =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart1",
		success: function(respond){
		datakec = respond;
		for(var i=0;i<datakec.length;i++){
			var dats = [];
			var apalah = parseInt(datakec[i].Jumlah,10);
			dats.push(apalah);
			dataset.push({"name" : datakec[i].Segmentasi, "y" : dats});
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
			series: [{
				data: dataset,
			}]
		});
		}
		})
}

function chart_5()
{
	var dataset5 = [];
	var datakec5 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart5",
		success: function(respond5){
		datakec5 = respond5;
		for(var i=0;i<datakec5.length;i++){
			var dats5 = [];
			var apalah5 = parseInt(datakec5[i].Jumlah,10);
			dats5.push(apalah5);
			dataset5.push({"name" : datakec5[i].Keterangan, "y" : apalah5}+",");
		}
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart_5',
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			credits: { enabled: false },title: {
				text: 'Rekap Kegiatan'
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
			series: [{
				data: [dataset5],
			}]
		});
		}
		})
}

function chart_8()
{
	var dataset8 = [];
	var datakec8 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart8",
		
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
				text: 'Coverage RW Total'
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

function chart_9()
{
	var dataset9 = [];
	var datakec9 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart9",
		
		success: function(respond9){
		datakec9 = respond9;
		for(var i=0;i<datakec9.length;i++){
			var dats9 = [];
			var apalah9 = parseInt(datakec9[i].jumlah9,10);
			dats9.push(apalah9);
			dataset9.push({"name" : datakec9[i].Nama_Kecamatan9, "data" : dats9});
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

function chart_10()
{
	var dataset10 = [];
	var datakec10 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart10",
		
		success: function(respond10){
		datakec10 = respond10;
		for(var i=0;i<datakec10.length;i++){
			var dats10 = [];
			var apalah10 = parseInt(datakec10[i].jumlah10,10);
			dats10.push(apalah10);
			dataset10.push({"name" : datakec10[i].Nama_Kecamatan10, "data" : dats10});
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

function chart_11()
{
	var dataset11 = [];
	var datakec11 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart11",
		
		success: function(respond11){
		datakec11 = respond11;
		for(var i=0;i<datakec11.length;i++){
			var dats11 = [];
			var apalah11 = parseInt(datakec11[i].suara,10);
			dats11.push(apalah11);
			dataset11.push({"name" : datakec11[i].kecamatan, "data" : dats11});
		}

		$('#chart_11').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Suara (Dapil DPR-RI)'
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
			series: dataset11
		});
		}
		})

}

function chart_12()
{
	var dataset12 = [];
	var datakec12 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart12",
		
		success: function(respond11){
		datakec12 = respond11;
		for(var i=0;i<datakec12.length;i++){
			var dats12 = [];
			var apalah12 = parseInt(datakec12[i].suara12,10);
			dats12.push(apalah12);
			dataset12.push({"name" : datakec12[i].kecamatan12, "data" : dats12});
		}

		$('#chart_12').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Suara (Dapil DPRD Provinsi)'
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
			series: dataset12
		});
		}
		})

}

function chart_13()
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart13",
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan, "data" : dats13});
		}

		$('#chart_13').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Kegiatan (Dapil DPR-RI)'
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
			series: dataset13
		});
		}
		})

}

function chart_14()
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart14",
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan2,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan2, "data" : dats13});
		}

		$('#chart_14').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Kegiatan (Dapil DPRD Provinsi)'
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
			series: dataset13
		});
		}
		})

}

function chart_15()
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart15",
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan3,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan3, "data" : dats13});
		}

		$('#chart_15').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Jumlah Kehadiran CAD (Dapil DPR-RI)'
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
			series: dataset13
		});
		}
		})

}

function chart_16()
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart16",
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan4,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan4, "data" : dats13});
		}

		$('#chart_16').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Jumlah Kehadiran CAD (Dapil DPRD Provinsi)'
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
			series: dataset13
		});
		}
		})

}

function chart_17(nilai)
{
	var dataset8 = [];
	var datakec8 =[];
	var nilaii = parseInt(nilai);
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart17/"+nilaii,
		
		success: function(respond8){
		datakec8 = respond8;
		for(var i=0;i<datakec8.length;i++){
			var dats8 = [];
			var apalah = parseInt(datakec8[i].jumlah,10);
			dats8.push(apalah);
			dataset8.push({"name" : datakec8[i].Nama_Kecamatan, "data" : dats8});
		}

		$('#chart_17').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Coverage RW Total'
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

function chart_18(nilai)
{
	var dataset9 = [];
	var datakec9 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart18/"+nilai,
		
		success: function(respond9){
		datakec9 = respond9;
		for(var i=0;i<datakec9.length;i++){
			var dats9 = [];
			var apalah9 = parseInt(datakec9[i].jumlah9,10);
			dats9.push(apalah9);
			dataset9.push({"name" : datakec9[i].Nama_Kecamatan9, "data" : dats9});
		}

		$('#chart_18').highcharts({
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

function chart_19(nilaii)
{
	var dataset10 = [];
	var datakec10 =[];
	console.log(nilaii);
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart19/"+nilaii,
		
		success: function(respond10){
		datakec10 = respond10;
		for(var i=0;i<datakec10.length;i++){
			var dats10 = [];
			var apalah10 = parseInt(datakec10[i].jumlah10,10);
			dats10.push(apalah10);
			dataset10.push({"name" : datakec10[i].Nama_Kecamatan10, "data" : dats10});
		}

		$('#chart_19').highcharts({
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

function chart_20(nilai)
{
	var dataset11 = [];
	var datakec11 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart20/"+nilai,
		
		success: function(respond11){
		datakec11 = respond11;
		for(var i=0;i<datakec11.length;i++){
			var dats11 = [];
			var apalah11 = parseInt(datakec11[i].suara,10);
			dats11.push(apalah11);
			dataset11.push({"name" : datakec11[i].kecamatan, "data" : dats11});
		}

		$('#chart_20').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Suara (Dapil DPR-RI)'
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
			series: dataset11
		});
		}
		})

}

function chart_21(nilai)
{
	var dataset12 = [];
	var datakec12 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart21/"+nilai,
		
		success: function(respond11){
		datakec12 = respond11;
		for(var i=0;i<datakec12.length;i++){
			var dats12 = [];
			var apalah12 = parseInt(datakec12[i].suara12,10);
			dats12.push(apalah12);
			dataset12.push({"name" : datakec12[i].kecamatan12, "data" : dats12});
		}

		$('#chart_21').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Suara (Dapil DPRD Provinsi)'
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
			series: dataset12
		});
		}
		})

}

function chart_22(nilai)
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart22/"+nilai,
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan, "data" : dats13});
		}

		$('#chart_22').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Kegiatan (Dapil DPR-RI)'
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
			series: dataset13
		});
		}
		})

}

function chart_23(nilai)
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart23/"+nilai,
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan2,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan2, "data" : dats13});
		}

		$('#chart_23').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Rekapan Kegiatan (Dapil DPRD Provinsi)'
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
			series: dataset13
		});
		}
		})

}

function chart_24(nilai)
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart24/"+nilai,
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan3,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan3, "data" : dats13});
		}

		$('#chart_15').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Jumlah Kehadiran CAD (Dapil DPR-RI)'
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
			series: dataset13
		});
		}
		})

}

function chart_25(nilai)
{
	var dataset13 = [];
	var datakec13 =[];
	$.ajax({
		type: "GET",
		url: "http://sitri-jaktim.com/index.php/Api/chart25/"+nilai,
		
		success: function(respond13){
		datakec13 = respond13;
		for(var i=0;i<datakec13.length;i++){
			var dats13 = [];
			var apalah13 = parseInt(datakec13[i].kegiatan4,10);
			dats13.push(apalah13);
			dataset13.push({"name" : datakec13[i].nm_kecamatan4, "data" : dats13});
		}

		$('#chart_25').highcharts({
			credits: { enabled: false },chart: {
				type: 'column'
			},
			title: {
				text: 'Jumlah Kehadiran CAD (Dapil DPRD Provinsi)'
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
			series: dataset13
		});
		}
		})

}