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
                                <span>Tambah Data Struktur</span>
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
                                            <form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Master/simpan_data_relawan');?>" method="post">
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
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Tingkat <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="tingkat" class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPC">DPC</option>
																<option value="DPRA">DPRA</option>
																<option value="TIMSES">TIMSES</option>
																<option value="UPPA">UPPA</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Dapil <span class="required"> * </span></label>
														<div class="col-md-4">
															<select id='tingkat_dapil' class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPRRI">DPR-RI</option>
																<option value="DPRD">DPRD Provinsi</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3"></label>
														<div class="col-md-4">
															<select name="dapil" id='dapil' class="form-control select2-allow-clear">
																<option value=""></option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Target Suara
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="target_suara" />
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Alamat
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="alamat" />
														</div>
													</div>
													<?php
													if($this->session->userdata('role')=='dapil'){
														if($this->session->userdata('id_wilayah')=='1'){
															echo '
															<div class="form-group select2-bootstrap-prepend">
																<label class="control-label col-md-3">Kecamatan</label>
																<div class="col-md-4">
																	<select id="kecamatan" name="kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172080">Cakung</option>
																		<option value="3172100">Matraman</option>
																		<option value="3172090">Pulogadung</option>
																	</select>
																</div>
															</div>
															';
														}
														elseif($this->session->userdata('id_wilayah')=='2'){
															echo '
															<div class="form-group select2-bootstrap-prepend">
																<label class="control-label col-md-3">Kecamatan</label>
																<div class="col-md-4">
																	<select id="kecamatan" name="kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172060">Jatinegara</option>
																		<option value="3172070">Duren Sawit</option>
																		<option value="3172050">Kramat Jati</option>
																	</select>
																</div>
															</div>
															';
														}
														else{
															echo '
															<div class="form-group select2-bootstrap-prepend">
																<label class="control-label col-md-3">Kecamatan</label>
																<div class="col-md-4">
																	<select id="kecamatan" name="kecamatan" class="form-control select2-allow-clear">
																		<option value=""></option>
																		<option value="3172010">Pasar Rebo</option>
																		<option value="3172020">Ciracas</option>
																		<option value="3172040">Makasar</option>
																		<option value="3172030">Cipayung</option>
																	</select>
																</div>
															</div>';
														}
													}
													else{
													?>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kecamatan <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="kecamatan" id="kecamatan" class="form-control select2-allow-clear">
																<option value=""></option>
																<?php
																foreach($data_provinsi as $key => $value){
																	echo '<option value="'.$value['Id_Kecamatan'].'">'.$value['Nama_Kecamatan'].'</option>';
																}
																?>
															</select>
														</div>
													</div>
													<?php } ?>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kelurahan/ Desa <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="desa" id="desa" class="form-control select2-allow-clear">
																<option value=""></option>
															</select>
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