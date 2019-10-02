<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
                                <span>Beranda</span>
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
                                    <!-- BEGIN ROW -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <!-- <i class="icon-bar-chart font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                                        <span class="caption-helper">column and line mix</span> -->
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
                                                    <div class="bg-img1 overlay1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('<?=base_url('assets/pks1.png');?>');">
                                                        <div class="wsize1">
                                                            <!-- <p class="txt-center p-b-23">
                                                                <i class="zmdi zmdi-card-giftcard cl0 fs-60"></i>
                                                            </p> -->

                                                            <!-- <h3 class="l1-txt1 txt-center p-b-22">
                                                                Coming Soon
                                                            </h3> -->
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
															<br>
                                                            <br>
                                                            <br>
															<br>
                                                            <br>
															<br>
                                                            <br>
                                                            <br>
                                                            <!-- <p class="txt-center m2-txt1 p-b-67" style='font-size: 40px'>
                                                                Our website is under construction, follow us for update now!
                                                                Menuju Pemilihan Umum 2019<br>17 April 2019
                                                                HARI LAGI MENUJU PEMILU
                                                            </p> -->
															<p style="text-align: center;"><br></p>
															<p style="text-align: center;"><br></p>
															<p style="text-align: center;"><br></p>
                                                            <div class="tes flex-w flex-sa-m cd100 bor1 p-t-42 p-b-22 p-l-50 p-r-50 respon1" >
																<br>
																<br>
                                                                <div class="flex-col-c-m wsize2 m-b-20">
                                                                    <span class="l1-txt2 p-b-4 days" style="color:black" id='hari'></span>
                                                                    <span class="m2-txt2" style="color:black">Hari</span>
                                                                </div>

                                                                <span class="l1-txt2 p-b-22" style="color:black">:</span>
                                                                
                                                                <div class="flex-col-c-m wsize2 m-b-20">
                                                                    <span class="l1-txt2 p-b-4 hours" style="color:black" id='jam'></span>
                                                                    <span class="m2-txt2" style="color:black">Jam</span>
                                                                </div>

                                                                <span class="l1-txt2 p-b-22 respon2" style="color:black">:</span>

                                                                <div class="flex-col-c-m wsize2 m-b-20">
                                                                    <span class="l1-txt2 p-b-4 minutes" style="color:black" id='menit'></span>
                                                                    <span class="m2-txt2" style="color:black">Menit</span>
                                                                </div>

                                                                <span class="l1-txt2 p-b-22" style="color:black">:</span>

                                                                <div class="flex-col-c-m wsize2 m-b-20">
                                                                    <span class="l1-txt2 p-b-4 seconds" style="color:black" id='detik'></span>
                                                                    <span class="m2-txt2" style="color:black">Detik</span>
                                                                </div>
                                                            </div>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END CHART PORTLET-->
                                        </div>
                                    </div>
                                    <!-- END ROW -->
									
                                    <!-- BEGIN ROW -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <!-- <i class="icon-bar-chart font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                                        <span class="caption-helper">column and line mix</span> -->
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
                                                    <div class="mt-element-card mt-card-round mt-element-overlay">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="mt-card-item">
                                                                    <div class="mt-card-avatar mt-overlay-1">
                                                                        <img src="https://image.flaticon.com/icons/svg/138/138323.svg" />
                                                                        <div class="mt-overlay">
                                                                            <ul class="mt-info">
                                                                                <li>
                                                                                    <a class="btn default btn-outline" href="<?=site_url('Beranda/peta_pemenangan');?>">
                                                                                        <i class="icon-action-redo"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <!-- <li>
                                                                                    <a class="btn default btn-outline" href="javascript:;">
                                                                                        <i class="icon-link"></i>
                                                                                    </a>
                                                                                </li> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-card-content">
                                                                        <h3 class="mt-card-name">Peta Pemenangan</h3>
                                                                        <!-- <p class="mt-card-desc font-grey-mint">Creative Director</p> -->
                                                                        <!-- <div class="mt-card-social">
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-facebook"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-twitter"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-dribbble"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="mt-card-item">
                                                                    <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                                                        <img src="https://www.flaticon.com/premium-icon/icons/svg/1165/1165725.svg" />
                                                                        <div class="mt-overlay mt-top">
                                                                            <ul class="mt-info">
                                                                                <!-- <li>
                                                                                    <a class="btn default btn-outline" href="javascript:;">
                                                                                        <i class="icon-magnifier"></i>
                                                                                    </a>
                                                                                </li> -->
                                                                                <li>
                                                                                    <a class="btn default btn-outline" href="<?=site_url('Laporan/kegiatan_caleg');?>">
                                                                                        <i class="icon-action-redo"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-card-content">
                                                                        <h3 class="mt-card-name">Dashboard CAD</h3>
                                                                        <!-- <p class="mt-card-desc font-grey-mint">Executive Manager</p> -->
                                                                        <!-- <div class="mt-card-social">
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-facebook"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-twitter"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-dribbble"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="mt-card-item">
                                                                    <div class="mt-card-avatar mt-overlay-1 mt-scroll-up">
                                                                        <img src="https://image.flaticon.com/icons/svg/1006/1006649.svg" />
                                                                        <div class="mt-overlay">
                                                                            <ul class="mt-info">
                                                                                <li>
																					<a class="btn default btn-outline" href="<?=site_url('Laporan/kegiatan_relawan');?>">	
                                                                                        <i class="icon-action-redo"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <!-- <li>
                                                                                    <a class="btn default btn-outline" href="javascript:;">
                                                                                        <i class="icon-link"></i>
                                                                                    </a>
                                                                                </li> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-card-content">
                                                                        <h3 class="mt-card-name">Dashboard Struktur</h3>
                                                                        <!-- <p class="mt-card-desc font-grey-mint">Human Resource</p> -->
                                                                        <!-- <div class="mt-card-social">
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-facebook"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-twitter"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="icon-social-dribbble"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END CHART PORTLET-->
                                        </div>
                                    </div>
                                    <!-- END ROW -->
									<div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <!-- <i class="icon-bar-chart font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                                        <span class="caption-helper">column and line mix</span> -->
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
										<div class="row">
										
										<div>
										<div class="form-group select2-bootstrap-prepend">
											<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Beranda/data_kecamatan');?>" method="post">
											<label class="control-label col-md-2"></label>
											<div class="col-md-5">
												<?php
													if($this->session->userdata('role')=='dapil'){
														if($this->session->userdata('id_wilayah')=='1'){
															echo '
																	<select name="pilihan_kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172080">Cakung</option>
																		<option value="3172100">Matraman</option>
																		<option value="3172090">Pulogadung</option>
																	</select>
															';
														}
														elseif($this->session->userdata('id_wilayah')=='2'){
															echo '
																	<select name="pilihan_kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172060">Jatinegara</option>
																		<option value="3172070">Duren Sawit</option>
																		<option value="3172050">Kramat Jati</option>
																	</select>
															';
														}
														else{
															echo '
																	<select name="pilihan_kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172010">Pasar Rebo</option>
																		<option value="3172020">Ciracas</option>
																		<option value="3172040">Makasar</option>
																		<option value="3172030">Cipayung</option>
																	</select>';
														}
													}
													else{
												?>
												<select id='kec_pilih' name='pilihan_kecamatan' class="form-control select2-allow-clear">
													<option value=""></option>
													<?php
														$urfdddl5['id_kabupaten'] = '3172';
														$kategdori_keperlukan = $this->Main_model->getSelectedData('kecamatan',$urfdddl5);
															foreach ($kategdori_keperlukan as $key => $fff) {
																echo '<option value="'.$fff->id_kecamatan.'">'.$fff->nm_kecamatan.'</option>';
															}
													?>
												</select>
												<?php } ?>
											</div>
											<div class="col-md-3"><button type="submit" class="btn blue">Proses</button>
											</div></div>
										</div>
										<br>
										<br>
										<br>
										<?php
										include_once(APPPATH . 'views/dashboard/chart_b1_1.php');
										?>
										<br>
										<br>
										<style>
											* {box-sizing: border-box}
											body {font-family: Verdana, sans-serif; margin:0}
											.mySlides5 {display: none}
											img {vertical-align: middle;}

											/* Slideshow container */
											.slideshow-container5 {
											max-width: 1000px;
											position: relative;
											margin: auto;
											}

											/* Next & previous buttons */
											.prev5, .next5 {
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
											.next5 {
											right: 0;
											border-radius: 3px 0 0 3px;
											}

											/* On hover, add a black background color with a little bit see-through */
											.prev5:hover, .next5:hover {
											background-color: rgba(0,0,0,0.8);
											}

											/* Caption text */
											.text5 {
											color: #f2f2f2;
											font-size: 15px;
											padding: 8px 12px;
											position: absolute;
											bottom: 8px;
											width: 100%;
											text-align: center;
											}

											/* Number text (1/3 etc) */
											.numbertext5 {
											color: #f2f2f2;
											font-size: 12px;
											padding: 8px 12px;
											position: absolute;
											top: 0;
											}

											/* The dots/bullets/indicators */
											.dot5 {
											cursor: pointer;
											height: 15px;
											width: 15px;
											margin: 0 2px;
											background-color: #bbb;
											border-radius: 50%;
											display: inline-block;
											transition: background-color 0.6s ease;
											}

											.active5, .dot5:hover {
											background-color: #717171;
											}

											/* On smaller screens, decrease text size */
											@media only screen and (max-width: 300px) {
											.prev5, .next5,.text5 {font-size: 11px}
											}
										</style>
										<div class="slideshow-container5">

											<div class="mySlides5">
												<div class="numbertext5">1 / 4</div>
												<div class="row">
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara18').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPR';
																			$coveragerww = $this->Main_model->getAPI($url6);
																			$url7 = 'https://andro.sitri.online/api/rw/desa/'.$fff->id_desa;
																			$jumlahrw = $this->Main_model->getAPI($url7);
																			$persentase = $coveragerww['jumlah']/count($jumlahrw)*100;
																			echo "{ name: '".$fff->nm_desa." (".number_format($persentase,2)." %)',data: [".$coveragerww['jumlah']."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara18"></div>
													</div>
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara19').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPRD';
																			$coveragerwwdprd = $this->Main_model->getAPI($url6);
																			$url7 = 'https://andro.sitri.online/api/rw/desa/'.$fff->id_desa;
																			$jumlahrw = $this->Main_model->getAPI($url7);
																			$persentase = $coveragerwwdprd['jumlah']/count($jumlahrw)*100;
																			echo "{ name: '".$fff->nm_desa." (".number_format($persentase,2)." %)',data: [".$coveragerwwdprd['jumlah']."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara19"></div>
													</div>
												</div>
											</div>

											<div class="mySlides5">
												<div class="numbertext5">2 / 4</div>
												<div class="row">
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara20').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$suara02 = 0;
																			$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
																			$task_caleg7 = $this->Main_model->getAPI($url7);
																			foreach ($task_caleg7 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$suara02 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
																			$task_str8 = $this->Main_model->getAPI($url8);
																			foreach ($task_str8 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$suara02 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																			$mandiri_str9 = $this->Main_model->getAPI($url9);
																			foreach ($mandiri_str9 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$suara02 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																			$mandiri_caleg10 = $this->Main_model->getAPI($url10);
																			foreach ($mandiri_caleg10 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$suara02 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$persen1 = $suara02/$fff->target_suara*100;
																			echo "{ name: '".$fff->nm_desa." (".number_format($persen1,2)." %)',data: [".$suara02."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara20"></div>
													</div>
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara21').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$suara03 = 0;
																			$url10 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
																			$task_caleg10 = $this->Main_model->getAPI($url10);
																			foreach ($task_caleg10 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$suara03 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url11 = 'https://andro.sitri.online/api/strtask/all/asc';
																			$task_str11 = $this->Main_model->getAPI($url11);
																			foreach ($task_str11 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$suara03 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url12 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																			$mandiri_str12 = $this->Main_model->getAPI($url12);
																			foreach ($mandiri_str12 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$suara03 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url13 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																			$mandiri_caleg13 = $this->Main_model->getAPI($url13);
																			foreach ($mandiri_caleg13 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$suara03 += $value['Jumlah_M'];
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$persen2 = $suara03/$fff->target_suara*100;
																			echo "{ name: '".$fff->nm_desa." (".number_format($persen2,2)." %)',data: [".$suara03."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara21"></div>
													</div>
												</div>
											</div>

											<div class="mySlides5">
												<div class="numbertext5">3 / 4</div>
												<div class="row">
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara23').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$keg3 = 0;
																			$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
																			$task_caleg7 = $this->Main_model->getAPI($url7);
																			foreach ($task_caleg7 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$keg3 += count($value['Id_Tasklist']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
																			$task_str8 = $this->Main_model->getAPI($url8);
																			foreach ($task_str8 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$keg3 += count($value['Id_Tasklist']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																			$mandiri_str9 = $this->Main_model->getAPI($url9);
																			foreach ($mandiri_str9 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$keg3 += count($value['Id_TaskMandiri']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																			$mandiri_caleg10 = $this->Main_model->getAPI($url10);
																			foreach ($mandiri_caleg10 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'C')){
																						$keg3 += count($value['Id_TaskMandiri']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			echo "{ name: '".$fff->nm_desa."',data: [".$keg3."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara23"></div>
													</div>
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara24').highcharts({
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
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$keg4 = 0;
																			$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
																			$task_caleg7 = $this->Main_model->getAPI($url7);
																			foreach ($task_caleg7 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$keg4 += count($value['Id_Tasklist']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
																			$task_str8 = $this->Main_model->getAPI($url8);
																			foreach ($task_str8 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$keg4 += count($value['Id_Tasklist']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																			$mandiri_str9 = $this->Main_model->getAPI($url9);
																			foreach ($mandiri_str9 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$keg4 += count($value['Id_TaskMandiri']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																			$mandiri_caleg10 = $this->Main_model->getAPI($url10);
																			foreach ($mandiri_caleg10 as $key => $value) {
																				if(stristr($value['Id_Wilayah'],$fff->id_desa)){
																					if(stristr($value['Id_Dapil'],'B')){
																						$keg4 += count($value['Id_TaskMandiri']);
																					}
																					else{
																						echo'';
																					}
																				} else {
																				echo '';
																				}
																			}
																			echo "{ name: '".$fff->nm_desa."',data: [".$keg4."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara24"></div>
													</div>
												</div>
											</div>

											<div class="mySlides5">
												<div class="numbertext5">4 / 4</div>
												<div class="row">
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara25').highcharts({
																credits: { enabled: false },chart: {
																	type: 'column'
																},
																title: {
																	text: 'Jumlah Kunjungan CAD (Dapil DPR-RI)'
																},
																subtitle: {
																	text: ''
																},
																xAxis: {
																	categories: [
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$url14 = 'https://andro.sitri.online/api/kunjungan/tingkat/'.$fff->id_desa.'/DPRRI';
																			$task_caleg14 = $this->Main_model->getAPI($url14);
																			// $cad2 = 0;
																			// $url14 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
																			// $task_caleg14 = $this->Main_model->getAPI($url14);
																			// foreach ($task_caleg14 as $key => $value) {
																			// 	if(stristr($value['Desa'],$fff->id_desa)){
																			// 		if(stristr($value['Id_Dapil'],'C')){
																			// 			$cad2 += count($value['Id_Caleg']);
																			// 		}
																			// 		else{
																			// 			echo'';
																			// 		}
																			// 	} else {
																			// 	echo '';
																			// 	}
																			// }
																			echo "{ name: '".$fff->nm_desa."',data: [".$task_caleg14['Jumlah']."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara25"></div>
													</div>
													<div class="col-md-6">
														<script type="text/javascript">
														$(document).ready(function() {
															$('#suara26').highcharts({
																credits: { enabled: false },chart: {
																	type: 'column'
																},
																title: {
																	text: 'Jumlah Kunjungan CAD (Dapil DPRD Provinsi)'
																},
																subtitle: {
																	text: ''
																},
																xAxis: {
																	categories: [
																		'Nama Kelurahan'
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
																series: [
																	<?php
																	$urfl54['id_kecamatan'] = $nilaii;
																	$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
																		foreach ($kategdori_keperluank as $key => $fff) {
																			$url14 = 'https://andro.sitri.online/api/kunjungan/tingkat/'.$fff->id_desa.'/DPRD';
																			$task_caleg14 = $this->Main_model->getAPI($url14);
																			// $cad3 = 0;
																			// $url15 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
																			// $task_caleg15 = $this->Main_model->getAPI($url15);
																			// foreach ($task_caleg15 as $key => $value) {
																			// 	if(stristr($value['Desa'],$fff->id_desa)){
																			// 		if(stristr($value['Id_Dapil'],'B')){
																			// 			$cad3 += count($value['Id_Caleg']);
																			// 		}
																			// 		else{
																			// 			echo'';
																			// 		}
																			// 	} else {
																			// 	echo '';
																			// 	}
																			// }
																			echo "{ name: '".$fff->nm_desa."',data: [".$task_caleg14['Jumlah']."]},";
																		}
																	?>
																]
															});
														});
														</script>
														<div id="suara26"></div>
													</div>
												</div>
											</div>

											<a class="prev5" onclick="plusSlides5(-1)">&#10094;</a>
											<a class="next5" onclick="plusSlides5(1)">&#10095;</a>
										</div>
										<br>

										<div style="text-align:center">
											<span class="dot5" onclick="currentSlide5(1)"></span> 
											<span class="dot5" onclick="currentSlide5(2)"></span>
											<span class="dot5" onclick="currentSlide5(3)"></span>
											<span class="dot5" onclick="currentSlide5(4)"></span>
										</div>

										<script>
											var slideIndex5 = 1;
											showSlides5(slideIndex5);

											function plusSlides5(n) {
											showSlides5(slideIndex5 += n);
											}

											function currentSlide5(n) {
											showSlides5(slideIndex5 = n);
											}

											function showSlides5(n) {
											var i;
											var slides5 = document.getElementsByClassName("mySlides5");
											var dots5 = document.getElementsByClassName("dot5");
											if (n > slides5.length) {slideIndex5 = 1}    
											if (n < 1) {slideIndex5 = slides5.length}
											for (i = 0; i < slides5.length; i++) {
												slides5[i].style.display = "none";  
											}
											for (i = 0; i < dots5.length; i++) {
												dots5[i].className = dots5[i].className.replace(" active", "");
											}
											slides5[slideIndex5-1].style.display = "block";  
											dots5[slideIndex5-1].className += " active";
											}
										</script>
										</div>
										
										</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <script>
                        // Set the date we're counting down to
                        var countDownDate = new Date("Apr 17, 2019 10:00:00").getTime();

                        // Update the count down every 1 second
                        var x = setInterval(function() {

                        // Get todays date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Display the result in the element with id="demo"
                        document.getElementById("hari").innerHTML = days;
                        document.getElementById("jam").innerHTML = hours;
                        document.getElementById("menit").innerHTML = minutes;
                        document.getElementById("detik").innerHTML = seconds;

                        // If the count down is finished, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                        }, 1000);
                        </script>
                        <!-- <script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
                        <script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
                        
                        <script src="../assets/pages/scripts/charts-amcharts.min.js" type="text/javascript"></script> -->