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
										
										<br>
										<br>
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
												<select name='pilihan_kecamatan' class="form-control select2-allow-clear">
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