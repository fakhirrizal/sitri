<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo site_url('Master/ambil_data')?>",
cache: false,
});

$("#provinsi").change(function(){

var value=$(this).val();

$.ajax({
data:{id:value,modul:'kabupaten'},
success: function(respond){
$("#kabupaten").html(respond);
}
})


});

$("#kabupaten").change(function(){

var value=$(this).val();

$.ajax({
data:{id:value,modul:'kecamatan'},
success: function(respond){
$("#kecamatan").html(respond);
}
})


});

$("#kecamatan").change(function(){

var value=$(this).val();

$.ajax({
data:{id:value,modul:'desa'},
success: function(respond){
$("#desa").html(respond);
}
})


});
$("#tingkat_dapil").change(function(){
var value=$(this).val();
$.ajax({
data:{id:value,modul:'dapil'},
success: function(respond){
$("#dapil").html(respond);
}
})
});
})

</script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Master</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Tambah Data Caleg</span>
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
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-body form">
                                            <form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Master/update_data_caleg');?>" method="post">
												<div class="form-body">
													<input type="hidden" name="id" value='<?= $data_caleg['Id_Caleg']; ?>'/>
													<input type="hidden" name="foto" value='<?= $data_caleg['Foto']; ?>'/>
													<input type="hidden" name="desa" value='<?= $data_caleg['Desa']; ?>'/>
													<input type="hidden" name="kecamatan" value='<?= $data_caleg['Kecamatan']; ?>'/>
													<input type="hidden" name="kabupaten" value='<?= $data_caleg['Kabupaten']; ?>'/>
													<input type="hidden" name="provinsi" value='<?= $data_caleg['Provinsi']; ?>'/>
													<div class="form-group">
														<label class="control-label col-md-3">Nama
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nama" value='<?= $data_caleg['Nama']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Telepon
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="telepon" value='<?= $data_caleg['Telepon']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Tempat_Lahir
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="tempat_lahir" value='<?= $data_caleg['Tempat_Lahir']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Tanggal_Lahir
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="date" class="form-control" name="tanggal_lahir" value="<?php
															$tanggal = explode('T', $data_caleg['Tanggal_Lahir']);
															echo $tanggal[0];?>"/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Alamat
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="alamat" value='<?= $data_caleg['Alamat']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Foto
															<span class="required"> * </span>
														</label>
														<div class="col-md-9">
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
																<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
																<div>
																	<span class="btn default btn-file">
																		<span class="fileinput-new"> Pilih File </span>
																		<span class="fileinput-exists"> Ubah </span>
																		<input type="file" name="foto"> </span>
																	<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
																</div>
															</div>
															
														</div>
													</div>
													<hr>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Dapil <span class="required"> * </span></label>
														<div class="col-md-4">
															<select id='tingkat_dapil' name='tingkat_dapil' class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPRRI" <?php if(substr($data_caleg['Id_Dapil'],0,1)=='C'){echo 'selected';}else{echo'';} ?>>DPR-RI</option>
																<option value="DPRD" <?php if(substr($data_caleg['Id_Dapil'],0,1)=='B'){echo 'selected';}else{echo'';} ?>>DPRD Provinsi</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3"></label>
														<div class="col-md-4">
															<select name="id_dapil" id='dapil' class="form-control select2-allow-clear">
																<?php
																if(substr($data_caleg['Id_Dapil'],0,1)=='C'){
																	$url4 = 'https://andro.sitri.online/api/dapil/all/C';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($data_caleg['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil']; ?></option>
																		<?php
																		
																	}
																}else{
																	$url4 = 'https://andro.sitri.online/api/dapil/all/B';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		$cek = 'DKI';
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($data_caleg['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil'] ?></option>
																		<?php
																	}
																}
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Nomor Urut
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nomor_urut" value='<?= $data_caleg['No_Urut']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Target Suara
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="target_suara" value='<?= $data_caleg['Target_Suara']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
												</div>
												<div class="form-actions margin-top-10">
													<div class="row">
														<div class="col-md-offset-2 col-md-10">
															<button type="button" class="btn default">Batal</button>
															<button type="submit" class="btn blue">Simpan</button>
														</div>
													</div>
												</div>
											</form>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE FORM PORTLET-->
                                </div>
                            </div>
                        </div>