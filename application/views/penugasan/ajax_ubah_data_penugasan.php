
										<?php
										foreach ($data_task as $key => $value) {
											if($value['Id_Tasklist']==$id_penugasan){
										?>
											<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Penugasan/update_penugasan');?>" method="post">
												<div class="form-body">
													<input type="hidden" name="status" value='<?= $status; ?>'/>
													<input type="hidden" name="id_tasklist" value='<?= $value['Id_Tasklist']; ?>'/>
													<input type="hidden" name="Id_Struktur" value='<?= $value['Id_Struktur']; ?>'/>
													<input type="hidden" name="id_caleg" value='<?= $value['Id_Caleg']; ?>'/>
													<input type="hidden" name="id_wilayah" value='<?= $value['Id_Wilayah']; ?>'/>
													<input type="hidden" name="id_caleg" value='<?= $value['Id_Caleg']; ?>'/>
													<input type="hidden" name="waktu_realisasi" value='<?= $value['Waktu_Realisasi']; ?>'/>
													<input type="hidden" name="segmentasi" value='<?= $value['Segmentasi']; ?>'/>
													<input type="hidden" name="isu_strategis" value='<?= $value['Isu_Strategis']; ?>'/>
													<input type="hidden" name="foto" value='<?= $value['Foto']; ?>'/>
													<input type="hidden" name="kehadiran_caleg" value='<?= $value['Kehadiran_Caleg']; ?>'/>
													<input type="hidden" name="jumlah_m" value='<?= $value['Jumlah_M']; ?>'/>
													<input type="hidden" name="jumlah_cm" value='<?= $value['Jumlah_CM']; ?>'/>
													<input type="hidden" name="jumlah_o" value='<?= $value['Jumlah_O']; ?>'/>
													<input type="hidden" name="jumlah_t" value='<?= $value['Jumlah_T']; ?>'/>
													<input type="hidden" name="jumlah_bj" value='<?= $value['Jumlah_BJ']; ?>'/>
													<input type="hidden" name="attachment" value='<?= $value['Attachment']; ?>'/>
													<input type="hidden" name="isdone" value='<?= $value['IsDone']; ?>'/>
													<input type="hidden" name="status_pelaporan" value='<?= $value['Status_Pelaporan']; ?>'/>
													<input type="hidden" name="notes" value='<?= $value['Notes']; ?>'/>
													<div class="form-group">
														<label class="control-label col-md-3">Nama Kegiatan
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nama_kegiatan" value='<?= $value['Nama_Kegiatan']; ?>'/>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Jenis Kegiatan<span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="jenis_kegiatan" class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="PERSON" <?php if($value['Jenis_Kegiatan']=='PERSON'){echo'selected';}else{echo'';} ?>>Person</option>
																<option value="FAMILY" <?php if($value['Jenis_Kegiatan']=='FAMILY'){echo'selected';}else{echo'';} ?>>Family</option>
																<option value='MASSA' <?php if($value['Jenis_Kegiatan']=='MASSA'){echo'selected';}else{echo'';} ?>>Massa</option>
																<option value='PROJECT' <?php if($value['Jenis_Kegiatan']=='PROJECT'){echo'selected';}else{echo'';} ?>>Project</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Deskripsi Kegiatan
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="deskripsi_kegiatan" value='<?= $value['Deskripsi_Kegiatan']; ?>'/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Waktu
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="date" class="form-control" name="waktu" />
														</div>
														<div class="col-md-4">
															<input type="time" class="form-control" name="jam" />
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Lokasi
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="detail_lokasi" value='<?= $value['Detail_Lokasi']; ?>'/>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Dapil <span class="required"> * </span></label>
														<div class="col-md-4">
															<select id='tingkat_dapil' class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPRRI" <?php if(substr($value['Id_Dapil'],0,1)=='C'){echo 'selected';}else{echo'';} ?>>DPR-RI</option>
																<option value="DPRD" <?php if(substr($value['Id_Dapil'],0,1)=='B'){echo 'selected';}else{echo'';} ?>>DPRD Provinsi</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3"></label>
														<div class="col-md-4">
															<select name="dapil" id='dapil' class="form-control select2-allow-clear">
																<?php
																if(substr($value['Id_Dapil'],0,1)=='C'){
																	$url4 = 'https://andro.sitri.online/api/dapil/all/C';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($value['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil']; ?></option>
																		<?php
																		
																	}
																}else{
																	$url4 = 'https://andro.sitri.online/api/dapil/all/B';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		$cek = 'DKI';
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($value['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil'] ?></option>
																		<?php
																	}
																}
																?>
															</select>
														</div>
													</div>
													<hr>
													<div class="form-group">
														<label class="control-label col-md-3">Tokoh yang akan dikunjungi
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="tokoh_dikunjungi" value='<?= $value['Tokoh_Dikunjungi']; ?>'/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Lembaga yang akan dikunjungi
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="lembaga_dikunjungi" value='<?= $value['Lembaga_Dikunjungi']; ?>'/>
														</div>
													</div>
												</div>
												<div class="form-actions margin-top-10">
													<div class="row">
														<div class="col-md-offset-3 col-md-10">
															<button type="button" class="btn default">Batal</button>
															<button type="submit" class="btn blue">Simpan</button>
														</div>
													</div>
												</div>
											</form>
										<?php }else{echo'';}} ?>