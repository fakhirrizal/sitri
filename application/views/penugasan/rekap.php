<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<script>
                        $(document).ready(function(){
                            $("#radio14").click(function(){
                                    $('#pilihan1').show('fast');
									$('#pilihan2').hide('fast');
									//$('#pilihan21').hide('fast');
									$('#pilihan3').hide('fast');
									//$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio15").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').show('fast');
									//$('#pilihan21').show('fast');
									$('#pilihan3').hide('fast');
									//$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio16").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').hide('fast');
									//$('#pilihan21').hide('fast');
									$('#pilihan3').show('fast');
									//$('#pilihan31').show('fast');
                            });
                        });
						</script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Instruksi</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Rekap</span>
                            </li>
						</ul>
						<?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
                            <!-- <div class="m-heading-1 border-green m-bordered">
                                <h3>Catatan</h3>
                                <p> 1. Catatan pertama</p>
                                <p> 2. Catatan kedua</p>
                                <p> 3. Catatan ketiga</p>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <!-- <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <i class="icon-settings font-dark"></i>
                                                <span class="caption-subject bold uppercase"> Managed Table</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="portlet-body">
											<form action="#" method="post" onsubmit="return deleteConfirm();"/>
												<div class="table-toolbar">
													<div class="row">
														<div class="col-md-6">
															<div class="btn-group">
																<button type='submit' id="sample_editable_1_new" class="btn sbold green"> Hapus
																	<i class="fa fa-trash"></i>
																</button>
																
															</div>
																<span class="separator">|</span>
																<a data-toggle="modal" href="<?=site_url('Penugasan/tambah_instruksi');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
																<span class="separator">|</span>
																<a target="_blank" href="<?=site_url('Penugasan/cetak_rekap_kegiatan');?>" class="btn red uppercase">Cetak Data <i class="fa fa-print"></i> </a>
														</div>
													
													</div>
												</div>
												<?php
											if($this->session->userdata('role')=='dpd' or $this->session->userdata('role')=='super admin' or $this->session->userdata('role')=='dpc'){
											?>
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
															<span class="box"></span> CAD </label>
													</div>
													<div class="md-radio has-warning">
														<input type="radio" id="radio16" name="radio2" class="md-radiobtn">
														<label for="radio16">
															<span class="inc"></span>
															<span class="check"></span>
															<span class="box"></span> Tingkat Struktur </label>
													</div>
												</div>
											</div>
											<br>
											<div class="form-group" id='pilihan1' style='display: none'>
												<label class="control-label col-md-1">Tingkat Pemilihan</label>
												<div class="col-md-5">
													<select name="pemohon" id="country_list" class="form-control" required>
														<option value=""></option>
														<option value="DPRRI">DPR-RI</option>
														<option value="DPRD">DPRD Provinsi</option>
													</select>
												</div>
												<br>
												<br>
											</div>
											<?php }else{echo'';} ?>
											<div class="form-group" id='pilihan2' >
												<label class="control-label col-md-1">Dapil</label>
												<div class="col-md-5">
													<select id="single-append-text" class="form-control select2-allow-clear">
                                                        <option value=''></option>
														<?php
														foreach($data_caleg as $key => $value){
															echo '<option value="all">Semua Caleg</option>';
															echo '<option value="'.$value['Id_Caleg'].'">'.$value['Nama'].'</option>';
														}
														?>
                                                    </select>
												</div>
											</div>
											<div class="form-group select2-bootstrap-prepend" id='pilihan2' >
												<label class="control-label col-md-1">CAD</label>
												<div class="col-md-5">
													<select id='tingkat_dapil' class="form-control select2-allow-clear">
														<option value=""></option>
														<?php
														foreach($data_caleg as $key => $value){
															echo '<option value="all">Semua Caleg</option>';
															echo '<option value="'.$value['Id_Caleg'].'">'.$value['Nama'].'</option>';
														}
														?>
													</select>
												</div>
											<br>
											<br>
											</div>

											<div class="form-group select2-bootstrap-prepend" id='pilihan3' style='display: none'>
												<label class="control-label col-md-1">Tingkat Struktur</label>
												<div class="col-md-5">
													<select id="kabupaten" class="form-control select2-allow-clear">
														<option value=''></option>
														<?php
															echo '<option value="all">Semua Struktur</option>';
															echo '<option value="DPC">DPC</option>';
															echo '<option value="DPRA">DPRA</option>';
															echo '<option value="TIMSES">TIMSES</option>';
															echo '<option value="UPPA">UPPA</option>';
														?>
                                                    </select>
												</div>
											<br>
											<br>
											</div> -->
											<hr>
											<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
												<thead>
													<tr>
														<th width="3%">
															<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
																<span></span>
															</label>
														</th>
														<th style="text-align: center;" width="4%"> # </th>
														<th style="text-align: center;"> Nama Kegiatan </th>
														<th style="text-align: center;"> Target Instruksi </th>
														<th style="text-align: center;"> Realisasi </th>
														<th style="text-align: center;" width="8%"> Realisator </th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													$no_task_caleg = 0;
													$url4 = 'https://andro.sitri.online/api/calegtask/nama';
													$task_group_by_nama = $this->Main_model->getAPI($url4);
													foreach ($task_group_by_nama as $key => $value) {
													?>
													<tr class="odd gradeX">
														<td>
															<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
																<span></span>
															</label>
														</td>
														<td style="text-align: center;"><?= $no++.'.'; ?></td>
														<td style="text-align: center;"><?php
														echo $value['Nama_Kegiatan'];
														?></td>
														<td style="text-align: center;">
														<?php
														$url5 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
														$task_caleg_all = $this->Main_model->getAPI($url5);
														$total_instruksi_caleg = 0;
														$instruksi_caleg_done = 0;
														foreach ($task_caleg_all as $key => $tca) {
															if($tca['Nama_Kegiatan']==$value['Nama_Kegiatan']){
																$total_instruksi_caleg++;
																if($tca['IsDone']=='1'){
																	$instruksi_caleg_done++;
																}
																else{
																	echo'';
																}
															}
															else{
																echo '';
															}
														}
														echo $total_instruksi_caleg.' Caleg';
														?>
														</td>
														<td style="text-align: center;"><?= $instruksi_caleg_done.' Caleg'; ?></td>
														<td style="text-align: center;"><a href="<?=site_url('Penugasan/detail_rekap/1/'.$no_task_caleg);?>" class="btn btn-xs green">Detail</a>
														</td>
													</tr>
													<?php
													$no_task_caleg++;
													}
													?>
													<?php
													$no_task_str = 0;
													$url6 = 'https://andro.sitri.online/api/strtask/nama';
													$task_str_group_by_nama = $this->Main_model->getAPI($url6);
													foreach ($task_str_group_by_nama as $key => $value) {
													?>
													<tr class="odd gradeX">
														<td>
															<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
																<span></span>
															</label>
														</td>
														<td style="text-align: center;"><?= $no++.'.'; ?></td>
														<td style="text-align: center;"><?php
														echo $value['Nama_Kegiatan'];
														?></td>
														<td style="text-align: center;">
														<?php
														$url7 = 'https://andro.sitri.online/api/strtask/all/asc';
														$task_str_all = $this->Main_model->getAPI($url7);
														$total_instruksi_str = 0;
														$instruksi_str_done = 0;
														foreach ($task_str_all as $key => $tca) {
															if($tca['Nama_Kegiatan']==$value['Nama_Kegiatan']){
																$total_instruksi_str++;
																if($tca['IsDone']=='1'){
																	$instruksi_str_done++;
																}
																else{
																	echo'';
																}
															}
															else{
																echo '';
															}
														}
														echo $total_instruksi_str.' Struktur';
														?>
														</td>
														<td style="text-align: center;"><?= $instruksi_str_done.' Struktur'; ?></td>
														<td style="text-align: center;"><a href="<?=site_url('Penugasan/detail_rekap/2/'.$no_task_str);?>" class="btn btn-xs green">Detail</a>
														</td>
													</tr>
													<?php
													$no_task_str++;
													}
													?>
												</tbody>
											</table>
											</form>
											<script type="text/javascript">
											function deleteConfirm(){
												var result = confirm("Do you really want to delete records?");
												if(result){
													return true;
												}else{
													return false;
												}
											}
											</script>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
						</div>