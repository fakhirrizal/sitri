<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="<?=base_url('application/views/dashboard/chart/chart_full.js');?>" type="text/javascript"></script>
						<script>
						$(document).ready(function(){
                            $("#radio15").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').show('fast');
									$('#pilihan21').show('fast');
									$('#pilihan3').hide('fast');
									$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio16").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').hide('fast');
									$('#pilihan21').hide('fast');
									$('#pilihan3').show('fast');
									$('#pilihan31').show('fast');
                            });
                        });
						</script>
						<script type="text/javascript">

						$(function(){

						$.ajaxSetup({
						type:"POST",
						url: "<?php echo site_url('Beranda/filter_laporan')?>",
						cache: false,
						});

						$("#country_list").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'tingkat_pemilihan'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})


						});
						$("#pilihandapil").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'dapil'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})
						});
						$("#kabupaten").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'listkecamatan'},
						success: function(respond){
						$("#kecamatan").html(respond);
						}
						})


						});
						$("#tingkat_dapil").change(function(){
						var value=$(this).val();
						$.ajax({
						data:{id:value,modul:'pilihandapil'},
						success: function(respond){
						$("#pilihandapil").html(respond);
						}
						})
						});
						$("#kec_pilih").change(function(){
						var value=$(this).val();
						$.ajax({
						data:{id:value,modul:'laporanperkecamatan'},
						success: function(respond){
						$("#id_ajax").html(respond);
						}
						})
						});
						})

						</script>
						<ul class="page-breadcrumb breadcrumb"> 
                            <li>
                                <a href="javascript:;">Dashboard</a>
                                <i class="fa fa-circle"></i>
							</li>
							<li>
                                <a href="javascript:;">Beranda</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Grafik 2</span>
                            </li>
                        </ul>

                        <!--===============================================================================================-->
                            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/comingsoon/css/util.css');?>">
                            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/comingsoon/css/main.css');?>">
                        <!--===============================================================================================-->
                        <style>
                            .tes {
                                opacity: 1;
                                filter: alpha(opacity=50); /* For IE8 and earlier */
                            }
                        </style>
                        <?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
										
			
										<style>
											* {box-sizing: border-box}
											body {font-family: Verdana, sans-serif; margin:0}
											.mySlides2 {display: none}
											img {vertical-align: middle;}

											/* Slideshow container */
											.slideshow-container2 {
											max-width: 1000px;
											position: relative;
											margin: auto;
											}

											/* Next & previous buttons */
											.prev2, .next2 {
											cursor: pointer;
											position: absolute;
											top: 50%;
											width: auto;
											padding: 16px;
											margin-top: -22px;
											color: white;
											font-weight: bold;
											font-size: 18px;
											transition: 0.6s ease;
											border-radius: 0 3px 3px 0;
											user-select: none;
											}

											/* Position the "next button" to the right */
											.next2 {
											right: 0;
											border-radius: 3px 0 0 3px;
											}

											/* On hover, add a black background color with a little bit see-through */
											.prev2:hover, .next2:hover {
											background-color: rgba(0,0,0,0.8);
											}

											/* Caption text */
											.text2 {
											color: #f2f2f2;
											font-size: 15px;
											padding: 8px 12px;
											position: absolute;
											bottom: 8px;
											width: 100%;
											text-align: center;
											}

											/* Number text (1/3 etc) */
											.numbertext2 {
											color: #f2f2f2;
											font-size: 12px;
											padding: 8px 12px;
											position: absolute;
											top: 0;
											}

											/* The dots/bullets/indicators */
											.dot2 {
											cursor: pointer;
											height: 15px;
											width: 15px;
											margin: 0 2px;
											background-color: #bbb;
											border-radius: 50%;
											display: inline-block;
											transition: background-color 0.6s ease;
											}

											.active2, .dot2:hover {
											background-color: #717171;
											}

											/* On smaller screens, decrease text size */
											@media only screen and (max-width: 300px) {
											.prev2, .next2,.text2 {font-size: 11px}
											}
										</style>

										<div class="slideshow-container2">

											<div class="mySlides2">
												<div class="numbertext2">1 / 2</div>
												<div class="row">
													<div class="col-md-6">
														
														<script type="text/javascript">
															$(function(){
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
																	type: 'pie',
																	name: 'Persentase',
																	data: [<?php
																	$arrayPie5 = array();
																	$url0 = 'https://andro.sitri.online/api/calegtask/nama';
																	$instruksi_caleg = $this->Main_model->getAPI($url0);
																	$url1 = 'https://andro.sitri.online/api/strtask/nama';
																	$instruksi_str = $this->Main_model->getAPI($url1);
																	$url2 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																	$mandiri_str = $this->Main_model->getAPI($url2);
																	$url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																	$mandiri_caleg = $this->Main_model->getAPI($url3);
																	$kategori_keperluan5 = array(
																		$array_l = array(
																			'Keterangan' => 'Instruksi Caleg',
																			'Jumlah' => count($instruksi_caleg),
																		),
																		$array_l = array(
																			'Keterangan' => 'Instruksi Struktur',
																			'Jumlah' => count($instruksi_str),
																		),
																		$array_l = array(
																			'Keterangan' => 'Kegiatan Mandiri Caleg',
																			'Jumlah' => count($mandiri_caleg),
																		),
																		$array_l = array(
																			'Keterangan' => 'Kegiatan Mandiri Struktur',
																			'Jumlah' => count($mandiri_str),
																		),
																	);
																	//print_r($kategori_keperluan5);
																		foreach ($kategori_keperluan5 as $key => $row) {
																			//$arrayPie5[] =  "["."'".$row['Keterangan']."'".",".$row['Jumlah']."]";
																			echo "{ name: '".$row['Keterangan']."',y: ".$row['Jumlah']."},";
																		}
																	?>],
																}]
															});
															});
														</script>
														<div id="chart_5"></div>
													</div>
													<div class="col-md-6">
														<?php
														$arrayPie6 = array();
														$suara0 = 0;
														$suara1 = 0;
														$suara2 = 0;
														$suara3 = 0;
														$suara4 = 0;
														$url4 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
														$task_caleg = $this->Main_model->getAPI($url4);
														foreach ($task_caleg as $key => $value) {
															$suara0 += $value['Jumlah_M'];
															$suara1 += $value['Jumlah_CM'];
															$suara2 += $value['Jumlah_O'];
															$suara3 += $value['Jumlah_T'];
															$suara4 += $value['Jumlah_BJ'];
														}
														$url5 = 'https://andro.sitri.online/api/strtask/all/asc';
														$task_str = $this->Main_model->getAPI($url5);
														foreach ($task_str as $key => $value) {
															$suara0 += $value['Jumlah_M'];
															$suara1 += $value['Jumlah_CM'];
															$suara2 += $value['Jumlah_O'];
															$suara3 += $value['Jumlah_T'];
															$suara4 += $value['Jumlah_BJ'];
														}
														$url2 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
														$mandiri_str = $this->Main_model->getAPI($url2);
														foreach ($mandiri_str as $key => $value) {
															$suara0 += $value['Jumlah_M'];
															$suara1 += $value['Jumlah_CM'];
															$suara2 += $value['Jumlah_O'];
															$suara3 += $value['Jumlah_T'];
															$suara4 += $value['Jumlah_BJ'];
														}
														$url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
														$mandiri_caleg = $this->Main_model->getAPI($url3);
														foreach ($mandiri_caleg as $key => $value) {
															$suara0 += $value['Jumlah_M'];
															$suara1 += $value['Jumlah_CM'];
															$suara2 += $value['Jumlah_O'];
															$suara3 += $value['Jumlah_T'];
															$suara4 += $value['Jumlah_BJ'];
														}
														$kategori_keperluan6 = array(
															$array_l = array(
																'Keterangan' => 'Suara Memilih',
																'Jumlah' => $suara0,
															),
															$array_l = array(
																'Keterangan' => 'Cenderung Memilih',
																'Jumlah' => $suara1,
															),
															$array_l = array(
																'Keterangan' => 'Oportunis',
																'Jumlah' => $suara2,
															),
															$array_l = array(
																'Keterangan' => 'Menolak',
																'Jumlah' => $suara3,
															),
															$array_l = array(
																'Keterangan' => 'Belum Jelas',
																'Jumlah' => $suara4,
															),
														);
														//print_r($kategori_keperluan6);
															foreach ($kategori_keperluan6 as $key => $row) {
																$arrayPie6[] =  "["."'".$row['Keterangan']."'".",".$row['Jumlah']."]";
															}
														?>
														<script type="text/javascript">
															$(function(){
															var chart = new Highcharts.Chart({
																chart: {
																	renderTo: 'GrafikPie6',
																	type: 'pie',
																	options3d: {
																		enabled: true,
																		alpha: 45,
																		beta: 0
																	}
																},
																credits: { enabled: false },title: {
																	text: 'Jenis Pemilih'
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
																	type: 'pie',
																	name: 'Persentase',
																	data: [<?= join($arrayPie6,",") ?>],
																}]
															});
															});
														</script>
														<div id="GrafikPie6"></div>
													</div>
												</div>
											</div>

											<div class="mySlides2">
												<div class="numbertext2">2 / 2</div>
												<div class="row">
													
													<div class="col-md-12">
														<div id="chart_8" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

									

											<a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
											<a class="next2" onclick="plusSlides2(1)">&#10095;</a>

										</div>
										<br>

										<div style="text-align:center">
											<span class="dot2" onclick="currentSlide2(1)"></span> 
											<span class="dot2" onclick="currentSlide2(2); chart_8();"></span>
										
										</div>

										<script>
											var slideIndex2 = 1;
											showSlides2(slideIndex2);

											function plusSlides2(n) {
											showSlides2(slideIndex2 += n);
											}

											function currentSlide2(n) {
											showSlides2(slideIndex2 = n);
											}

											function showSlides2(n) {
											var i;
											var slides2 = document.getElementsByClassName("mySlides2");
											var dots2 = document.getElementsByClassName("dot2");
											if (n > slides2.length) {slideIndex2 = 1}    
											if (n < 1) {slideIndex2 = slides2.length}
											for (i = 0; i < slides2.length; i++) {
												slides2[i].style.display = "none";  
											}
											for (i = 0; i < dots2.length; i++) {
												dots2[i].className = dots2[i].className.replace(" active", "");
											}
											slides2[slideIndex2-1].style.display = "block";  
											dots2[slideIndex2-1].className += " active";
											}
										</script>
				
										<br>
										<br>
										
										</div>
										</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>