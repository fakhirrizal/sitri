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
													<img src='<?=base_url('assets/baru.jpeg');?>' width='100%'>
                                                    
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
										<?php
										if($this->session->userdata('role')=='dpd' or $this->session->userdata('role')=='super admin' or $this->session->userdata('role')=='dpc'){
										?>
										<!-- <div class="form-group select2-bootstrap-prepend">
											<label class="control-label col-md-2">Opsi Pencarian</label>
											<div class="col-md-8">
											<div class="md-radio-inline">
												<div class="md-radio has-success">
													<input type="radio" id="radio14" name="radio2" class="md-radiobtn">
													<label for="radio14">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Tingkat Pemilihan </label>
												</div>
												<div class="md-radio has-error">
													<input type="radio" id="radio15" name="radio2" class="md-radiobtn" checked="">
													<label for="radio15">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Dapil </label>
												</div>
												<div class="md-radio has-warning">
													<input type="radio" id="radio16" name="radio2" class="md-radiobtn">
													<label for="radio16">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Kecamatan </label>
												</div>
											</div>
											</div>
										</div> -->
										<!-- <div class="form-group form-md-radios">
											<label>Opsi Pencarian</label>
											<div class="md-radio-inline">
												<div class="md-radio has-success">
													<input type="radio" id="radio14" name="radio2" class="md-radiobtn">
													<label for="radio14">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Tingkat Pemilihan </label>
												</div>
												<div class="md-radio has-error">
													<input type="radio" id="radio15" name="radio2" class="md-radiobtn" checked="">
													<label for="radio15">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Dapil </label>
												</div>
												<div class="md-radio has-warning">
													<input type="radio" id="radio16" name="radio2" class="md-radiobtn">
													<label for="radio16">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span> Kecamatan </label>
												</div>
											</div>
										</div> -->
										
										<?php }else{echo'';} ?>
										<!-- <div class="form-group" id='pilihan1' style='display: none'>
											<label class="control-label col-md-1">Tingkat Pemilihan</label>
											<div class="col-md-5">
												<select name="pemohon" id="country_list" class="form-control" required>
													<option value=""></option>
													<option value="DPRRI">DPR-RI</option>
													<option value="DPRD">DPRD Provinsi</option>
												</select>
											</div>
										</div> -->

										<!-- <div class="form-group" id='pilihan2' >
											<label class="control-label col-md-1">Dapil</label>
											<div class="col-md-5">
												<select id="single-append-text" class="form-control select2-allow-clear">
													<option value=''></option>
													<?php
													foreach($data_dapil as $key => $value){
														echo '<option value="'.$value['Id_Dapil'].'">'.$value['Nama_Dapil'].'</option>';
													}
													?>
												</select>
											</div>
										</div> -->
										<!-- <div class="form-group select2-bootstrap-prepend" id='pilihan2' >
											<label class="control-label col-md-2">Dapil</label>
											<div class="col-md-5">
												<select id='tingkat_dapil' class="form-control select2-allow-clear">
													<option value=""></option>
													<option value="DPRRI">DPR-RI</option>
													<option value="DPRD">DPRD Provinsi</option>
												</select>
											</div>
										<br>
										<br>
										</div>
										<div class="form-group select2-bootstrap-prepend" id='pilihan21' >
											<label class="control-label col-md-2"></label>
											<div class="col-md-5">
												<select name="dapil" id='pilihandapil' class="form-control select2-allow-clear">
													<option value=""></option>
												</select>
											</div>
										</div>
										<div class="form-group select2-bootstrap-prepend" id='pilihan3' style='display: none'>
											<label class="control-label col-md-2">Kabupaten/ Kota</label>
											<div class="col-md-5">
												<select id="kabupaten" class="form-control select2-allow-clear">
													<option value=''></option>
													<?php
													foreach($data_provinsi as $key => $value){
														echo '<option value="'.$value['Id_Kabupaten'].'">'.$value['Nama_Kabupaten'].'</option>';
													}
													?>
												</select>
											</div>
										<br>
										<br>
										</div>
										<div class="form-group select2-bootstrap-prepend" id='pilihan31' style='display: none'>
											<label class="control-label col-md-2">Kecamatan</label>
											<div class="col-md-5">
												<select id="kecamatan" name='kecamatan' class="form-control select2-allow-clear">
													<option value=''></option>
												</select>
											</div>
										</div>
										</div>
										<br> -->
										<div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
											<?php
											$url3 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
											$data_task = $this->Main_model->getAPI($url3);
											$jumlah_suara1 = 0;
											$jumlah_suara2 = 0;
											$jumlah_suara_0 = 0;
											$jumlah_suara_1 = 0;
											$jumlah_suara_2 = 0;
											$jumlah_suara_3 = 0;
											$jumlah_suara_4 = 0;
											$target1 = 0;
											$target2 = 0;
											foreach ($data_task as $key => $dt) {
												if(substr($dt['Id_Dapil'],0,1)=='C'){
													$jumlah_suara1 += $dt['Jumlah_M'];
													$target1 += $dt['Jumlah_M']+$dt['Jumlah_CM']+$dt['Jumlah_O']+$dt['Jumlah_T']+$dt['Jumlah_BJ'];}
												elseif(substr($dt['Id_Dapil'],0,1)=='B'){
													$jumlah_suara2 += $dt['Jumlah_M'];
													$target2 += $dt['Jumlah_M']+$dt['Jumlah_CM']+$dt['Jumlah_O']+$dt['Jumlah_T']+$dt['Jumlah_BJ'];}
												else{
													echo '';
												}
											}
											$url23 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
											$task_mandiri = $this->Main_model->getAPI($url23);
											foreach ($task_mandiri as $key => $tm) {
												if(substr($tm['Id_Dapil'],0,1)=='C'){
													$jumlah_suara1 += $tm['Jumlah_M'];
													$target1 += $tm['Jumlah_M']+$tm['Jumlah_CM']+$tm['Jumlah_O']+$tm['Jumlah_T']+$tm['Jumlah_BJ'];
												}
												elseif(substr($tm['Id_Dapil'],0,1)=='B'){
													$jumlah_suara2 += $tm['Jumlah_M'];
													$target2 += $tm['Jumlah_M']+$tm['Jumlah_CM']+$tm['Jumlah_O']+$tm['Jumlah_T']+$tm['Jumlah_BJ'];}
												else{
													echo '';
												}
											}
											$url24 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
											$task_mandiri_str = $this->Main_model->getAPI($url24);
											foreach ($task_mandiri_str as $key => $tms) {
												if(substr($tms['Id_Dapil'],0,1)=='C'){
													$jumlah_suara1 += $tms['Jumlah_M'];
													$target1 += $tms['Jumlah_M']+$tms['Jumlah_CM']+$tms['Jumlah_O']+$tms['Jumlah_T']+$tms['Jumlah_BJ'];
												}
												elseif(substr($tms['Id_Dapil'],0,1)=='B'){
													$jumlah_suara2 += $tms['Jumlah_M'];
													$target2 += $tms['Jumlah_M']+$tms['Jumlah_CM']+$tms['Jumlah_O']+$tms['Jumlah_T']+$tms['Jumlah_BJ'];}
												else{
													echo '';
												}
											}
											$url25 = 'https://andro.sitri.online/api/strtask/all/asc';
											$task_str = $this->Main_model->getAPI($url25);
											foreach ($task_str as $key => $ts) {
												if(substr($ts['Id_Dapil'],0,1)=='C'){
													$jumlah_suara1 += $ts['Jumlah_M'];
													$target1 += $ts['Jumlah_M']+$ts['Jumlah_CM']+$ts['Jumlah_O']+$ts['Jumlah_T']+$ts['Jumlah_BJ'];
												}
												elseif(substr($ts['Id_Dapil'],0,1)=='B'){
													$jumlah_suara2 += $ts['Jumlah_M'];
													$target2 += $ts['Jumlah_M']+$ts['Jumlah_CM']+$ts['Jumlah_O']+$ts['Jumlah_T']+$ts['Jumlah_BJ'];}
												else{
													echo '';
												}
											}
											?>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="7800"><?php if($jumlah_suara1==0){
																	echo '0';
																}else{
																		$total = $jumlah_suara1/500007*100;
																		echo number_format($total,2);
																	}
																?></span>
																<small class="font-green-sharp">% DPR-RI</small>
															</h3>
															<!-- <small>DPR-RI</small> -->
														</div>
														<div class="icon">
															<!-- <i class="icon-pie-chart"></i> -->
														</div>
													</div>
													<div class="progress-info">
														<p class="font-green-sharp"><?= $jumlah_suara1; ?> Suara dari target <?= '500,007'; ?> Suara</p>
														<!-- <div class="progress">
															<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
																<span class="sr-only">76% progress</span>
															</span>
														</div>
														<div class="status">
															<div class="status-title"> progress </div>
															<div class="status-number"> 76% </div>
														</div> -->
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="1349"><?php if($jumlah_suara2==0){
																	echo '0';
																}else{
																		$total = $jumlah_suara2/500007*100;
																		echo number_format($total,2);
																	}
																?> % DPRD</span>
															</h3>
															<!-- <small>NEW FEEDBACKS</small> -->
														</div>
														<div class="icon">
															<!-- <i class="icon-pie-chart"></i> -->
														</div>
													</div>
													<div class="progress-info">
														<p class="font-green-sharp"><?= $jumlah_suara2; ?> Suara dari target <?= '500,007'; ?> Suara</p>
														<!-- <div class="progress">
															<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
																<span class="sr-only">85% change</span>
															</span>
														</div>
														<div class="status">
															<div class="status-title"> change </div>
															<div class="status-number"> 85% </div>
														</div> -->
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
											
										</div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
											<div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<?php
													$url13 = 'https://andro.sitri.online/api/counttokoh/all/asc/';
													$datatokoh = $this->Main_model->getAPI($url13);
													$jumlah_tokoh = 0;
													$tokoh = '';
													foreach ($datatokoh as $d) {
														if ($d['Jumlah'] >= $jumlah_tokoh) {
														$jumlah_tokoh = $d['Jumlah'];
														$tokoh = $d['Tokoh_Dikunjungi'];
														}
														else{
															echo '';
														}
													}
													?>
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567"><?= count($datatokoh); ?></span>
															</h3>
															<small>Tokoh Dikunjungi</small>
														</div>
														<div class="icon">
															<i class="icon-users"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
											
										</div>
										<?php
										include_once(APPPATH . 'views/dashboard/chart_b1.php');
										echo '<br>';
										// include_once(APPPATH . 'views/dashboard/chart_b2.php');
										// echo '<br>';
										// include_once(APPPATH . 'views/dashboard/chart_c.php');
										// echo '<br>';
										// include_once(APPPATH . 'views/dashboard/chart_d.php');
										?>
										<!-- <script>
										window.onload = function()
										{
										var hasil8 = new chart_8();
										document.getElementById("chart_8").innerHTML=hasil8;
										}
										</script> -->
										<!-- <button class="btn blue" onclick="chart_8()">Test</button> -->
										<!-- <div id='chart_8'></div> -->
			
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
																	// $url2 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
																	// $mandiri_str = $this->Main_model->getAPI($url2);
																	// $url3 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
																	// $mandiri_caleg = $this->Main_model->getAPI($url3);
																	$mandiri_caleg = array();
																	$mandiri_str = array();
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
													<!-- <div class="col-md-6">
														<div id="GrafikPie7"></div>
													</div> -->
													<div class="col-md-12">
														<div id="chart_8" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<!-- <div class="mySlides2">
											<div class="numbertext2">3 / 3</div>
												3
											</div> -->

											<a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
											<a class="next2" onclick="plusSlides2(1)">&#10095;</a>

										</div>
										<br>

										<div style="text-align:center">
											<span class="dot2" onclick="currentSlide2(1)"></span> 
											<span class="dot2" onclick="currentSlide2(2); chart_8();"></span>
											<!-- <span class="dot2" onclick="currentSlide2(3)"></span> -->
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
										<style>
											* {box-sizing: border-box}
											body {font-family: Verdana, sans-serif; margin:0}
											.mySlides3 {display: none}
											img {vertical-align: middle;}

											/* Slideshow container */
											.slideshow-container3 {
											max-width: 1000px;
											position: relative;
											margin: auto;
											}

											/* Next & previous buttons */
											.prev3, .next3 {
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
											.next3 {
											right: 0;
											border-radius: 3px 0 0 3px;
											}

											/* On hover, add a black background color with a little bit see-through */
											.prev3:hover, .next3:hover {
											background-color: rgba(0,0,0,0.8);
											}

											/* Caption text */
											.text3 {
											color: #f2f2f2;
											font-size: 15px;
											padding: 8px 12px;
											position: absolute;
											bottom: 8px;
											width: 100%;
											text-align: center;
											}

											/* Number text (1/3 etc) */
											.numbertext3 {
											color: #f2f2f2;
											font-size: 12px;
											padding: 8px 12px;
											position: absolute;
											top: 0;
											}

											/* The dots/bullets/indicators */
											.dot3 {
											cursor: pointer;
											height: 15px;
											width: 15px;
											margin: 0 2px;
											background-color: #bbb;
											border-radius: 50%;
											display: inline-block;
											transition: background-color 0.6s ease;
											}

											.active3, .dot3:hover {
											background-color: #717171;
											}

											/* On smaller screens, decrease text size */
											@media only screen and (max-width: 300px) {
											.prev3, .next3,.text3 {font-size: 11px}
											}
										</style>

										<div class="slideshow-container3">

											<div class="mySlides3">
												<div class="numbertext3">1 / 4</div>
												<div class="row">
													<div class="col-md-6">
														<script>
															window.onload = function()
															{
															var hasil9 = new chart_9();
															document.getElementById("chart_9").innerHTML=hasil9;
															var hasil10 = new chart_10();
															document.getElementById("chart_10").innerHTML=hasil10;
															}
														</script>
														<div id="chart_9"></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_10"></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">2 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_11" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_12" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">3 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_13" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_14" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">4 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_15" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_16" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<a class="prev3" onclick="plusSlides3(-1)">&#10094;</a>
											<a class="next3" onclick="plusSlides3(1)">&#10095;</a>

										</div>
										<br>

										<div style="text-align:center">
											<span class="dot3" onclick="currentSlide3(1)"></span> 
											<span class="dot3" onclick="currentSlide3(2); chart_11(); chart_12();"></span>
											<span class="dot3" onclick="currentSlide3(3); chart_13(); chart_14();"></span>
											<span class="dot3" onclick="currentSlide3(4); chart_15(); chart_16();"></span>
										</div>

										<script>
											var slideIndex3 = 1;
											showSlides3(slideIndex3);

											function plusSlides3(n) {
											showSlides3(slideIndex3 += n);
											}

											function currentSlide3(n) {
											showSlides3(slideIndex3 = n);
											}

											function showSlides3(n) {
											var i;
											var slides3 = document.getElementsByClassName("mySlides3");
											var dots3 = document.getElementsByClassName("dot3");
											if (n > slides3.length) {slideIndex3 = 1}    
											if (n < 1) {slideIndex3 = slides3.length}
											for (i = 0; i < slides3.length; i++) {
												slides3[i].style.display = "none";  
											}
											for (i = 0; i < dots3.length; i++) {
												dots3[i].className = dots3[i].className.replace(" active", "");
											}
											slides3[slideIndex3-1].style.display = "block";  
											dots3[slideIndex3-1].className += " active";
											}
										</script>
										<br>
										<br>
										<!-- <div class="form-group select2-bootstrap-prepend">
											<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Beranda');?>" method="post">
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
										</div> -->
										<br>
										<br>
										<!-- <div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<?php
													$url1 = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc/';
													$datasegmen = $this->Main_model->getAPI($url1);
													$jumlah_segmen = 0;
													$segmen = '';
													foreach ($datasegmen as $d) {
														if ($d['Jumlah'] >= $jumlah_segmen) {
														$jumlah_segmen = $d['Jumlah'];
														$segmen = $d['Segmentasi'];
														}
														else{
															echo '';
														}
													}
													?>
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="7800"><?= $jumlah_segmen; ?></span>
																<small class="font-green-sharp">Segmentasi</small>
															</h3>
															<small><?= $segmen; ?></small>
														</div>
														<div class="icon">
															<i class="icon-layers"></i>
														</div>
													</div>
													<div class="progress-info">
														<div class="progress">
															<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
																<span class="sr-only">76% progress</span>
															</span>
														</div>
														<div class="status">
															<div class="status-title"> 23/ 98 Segmentasi </div>
															<div class="status-number"> 76% </div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<?php
													$url2 = 'https://andro.sitri.online/api/calegtask/countisuall/asc/';
													$dataj = $this->Main_model->getAPI($url2);
													$jumlah_isu = 0;
													$isu = '';
													foreach ($dataj as $d) {
														if ($d['Jumlah'] >= $jumlah_isu) {
														$jumlah_isu = $d['Jumlah'];
														$isu = $d['Isu'];
														}
														else{
															echo '';
														}
													}
													?>
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="1349"><?= $jumlah_isu; ?> Isu</span>
															</h3>
															<small><?= $isu; ?></small>
														</div>
														<div class="icon">
															<i class="icon-feed"></i>
														</div>
													</div>
													<div class="progress-info">
														<div class="progress">
															<span style="width: 85%;" class="progress-bar progress-bar-success green-sharp">
																<span class="sr-only">85% change</span>
															</span>
														</div>
														<div class="status">
															<div class="status-title"> 30/ 54 Isu </div>
															<div class="status-number"> 85% </div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567"><?php echo count($data_task)+count($task_mandiri); ?></span>
															</h3>
															<small>Kegiatan</small>
														</div>
														<div class="icon">
															<i class="icon-shuffle"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<?php
													$url13 = 'https://andro.sitri.online/api/counttokoh/all/asc/';
													$datatokoh = $this->Main_model->getAPI($url13);
													$jumlah_tokoh = 0;
													$tokoh = '';
													foreach ($datatokoh as $d) {
														if ($d['Jumlah'] >= $jumlah_tokoh) {
														$jumlah_tokoh = $d['Jumlah'];
														$tokoh = $d['Tokoh_Dikunjungi'];
														}
														else{
															echo '';
														}
													}
													?>
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567"><?= count($datatokoh); ?></span>
															</h3>
															<small>Tokoh Dikunjungi</small>
														</div>
														<div class="icon">
															<i class="icon-users"></i>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										<!-- <div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<div class="display">
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567">[0] <?= $jumlah_suara_0.' Suara'; ?></span>
															</h3>
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567">[1] <?= $jumlah_suara_1.' Suara'; ?></span>
															</h3>
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567">[2] <?= $jumlah_suara_2.' Suara'; ?></span>
															</h3>
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567">[3] <?= $jumlah_suara_3.' Suara'; ?></span>
															</h3>
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="567">[4] <?= $jumlah_suara_4.' Suara'; ?></span>
															</h3>
														</div>
														<div class="icon">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat2 ">
													<div class="display">
														<?php
														$url4 = 'https://andro.sitri.online/api/coverageall/all/';
														$coverage = $this->Main_model->getAPI($url4);
														?>
														<div class="number">
															<h3 class="font-green-sharp">
																<span data-counter="counterup" data-value="276"><?= $coverage['jumlah']; ?> </span>
															</h3>
															<small>Coverage RW</small>
														</div>
														<div class="icon">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											</div>
										</div> -->
										</div>
										</div>
											</div>
										</div>
									</div>
                                    <!-- BEGIN ROW -->
									<!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-bar-chart font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                                        <span class="caption-helper">column and line mix</span>
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
                                                    <div id="chart_1" class="chart" style="height: 500px;"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
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