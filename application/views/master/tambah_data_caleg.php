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
                                            <form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Master/simpan_data_caleg');?>" method="post">
												<div class="form-body">
													<div class="form-group">
														<label class="control-label col-md-3">Nama
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nama" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Telepon
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="telepon" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Tempat_Lahir
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="tempat_lahir" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Tanggal_Lahir
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="date" class="form-control" name="tanggal_lahir" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Alamat
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="alamat" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Provinsi <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="provinsi" id="provinsi" class="form-control select2-allow-clear">
																<option value=""></option>
																<?php
																foreach($data_provinsi as $key => $value){
																	echo '<option value="'.$value['Id_Provinsi'].'">'.$value['Nama_Provinsi'].'</option>';
																}
																?>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kabupaten <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="kabupaten" id="kabupaten" class="form-control select2-allow-clear">
																<option value=""></option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kecamatan <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="kecamatan" id="kecamatan" class="form-control select2-allow-clear">
																<option value=""></option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kelurahan/ Desa <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="desa" id="desa" class="form-control select2-allow-clear">
																<option value=""></option>
															</select>
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
																		<input type="file" name="foto" required> </span>
																	<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
																</div>
															</div>
															
														</div>
													</div>
													<hr>
													<div class="form-group">
														<label class="control-label col-md-3">Username
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="email" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Password
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="password" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<hr>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Dapil <span class="required"> * </span></label>
														<div class="col-md-4">
															<select id='tingkat_dapil' name='tingkat_dapil' class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPRRI">DPR-RI</option>
																<option value="DPRD">DPRD Provinsi</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3"></label>
														<div class="col-md-4">
															<select name="dapil" id='dapil' class="form-control select2-allow-clear" required>
																<option value=""></option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Nomor Urut
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nomor_urut" />
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Target Suara
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="target_suara" />
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