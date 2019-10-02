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
                                                                        <div class="mt-card-social">
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
                                                                        </div>
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
                                                                        <div class="mt-card-social">
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
                                                                        </div>
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
                                                                        <div class="mt-card-social">
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
                                                                        </div>
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
																		$total = $jumlah_suara1/$target1*100;
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
														<p class="font-green-sharp"><?= $jumlah_suara1; ?> Suara dari target <?= $target1; ?> Suara</p>
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
																		$total = $jumlah_suara2/$target2*100;
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
														<p class="font-green-sharp"><?= $jumlah_suara2; ?> Suara dari target <?= $target2; ?> Suara</p>
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
										include_once(APPPATH . 'views/dashboard/chart_b2.php');
										echo '<br>';
										include_once(APPPATH . 'views/dashboard/chart_c.php');
										// echo '<br>';
										// include_once(APPPATH . 'views/dashboard/d1.php');
										
										?>
										<br>
										<br>
										
										<div class="form-group select2-bootstrap-prepend">
											<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Beranda');?>" method="post">
											<label class="control-label col-md-2"></label>
											<div class="col-md-5">
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
											</div>
											<div class="col-md-3"><button type="submit" class="btn blue">Proses</button>
											</div></div>
										</div>
										<br>
										<br>
										<div id='id_ajax'>
										</div>
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
									<!-- <div class="tabbable-line">
										<ul class="nav nav-tabs ">
											<li class="active">
												<a href="#tab_15_1" data-toggle="tab"> Section 1 </a>
											</li>
											<li>
												<a href="#tab_15_2" data-toggle="tab"> Section 2 </a>
											</li>
											<li>
												<a href="#tab_15_3" data-toggle="tab"> Section 3 </a>
											</li>
											<li>
												<a href="#tab_15_4" data-toggle="tab"> Section 1 </a>
											</li>
											<li>
												<a href="#tab_15_5" data-toggle="tab"> Section 2 </a>
											</li>
											<li>
												<a href="#tab_15_6" data-toggle="tab"> Section 3 </a>
											</li>
											<li>
												<a href="#tab_15_7" data-toggle="tab"> Section 1 </a>
											</li>
											<li>
												<a href="#tab_15_8" data-toggle="tab"> Section 2 </a>
											</li>
											<li>
												<a href="#tab_15_9" data-toggle="tab"> Section 3 </a>
											</li>
											<li>
												<a href="#tab_15_10" data-toggle="tab"> Section 3 </a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_15_1">
												
											</div>
											<div class="tab-pane" id="tab_15_2">
											
												
											</div>
											<div class="tab-pane" id="tab_15_3">
												<p> Howdy, I'm in Section 3. </p>
												<p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem
													vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat </p>
												<p>
													<a class="btn yellow" href="ui_tabs_accordions_navs.html#tab_15_3" target="_blank"> Activate this tab via URL </a>
												</p>
											</div>
										</div>
									</div> -->
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