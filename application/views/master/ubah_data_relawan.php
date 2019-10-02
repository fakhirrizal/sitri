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
                                <span>Ubah Data Struktur</span>
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
											<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Master/update_data_relawan');?>" method="post">
												<div class="form-body">
													<?php
                                                	//foreach ($data_relawan as $key => $row) {
                                                	?>
													<div class="form-group">
														<label class="control-label col-md-3">Nama
															<span class="required"> * </span>
														</label>
														<input type="hidden" name="id_struktur" value='<?= $row['Id_Struktur']; ?>'/>
														<input type="hidden" name="alamat" value='<?= $row['Alamat']; ?>'/>
														<!-- <input type="hidden" name="id_dapil" value='<?= $row['Id_Dapil']; ?>'/> -->
														<!-- <input type="hidden" name="id_kecamatan" value='<?= $row['Id_Kecamatan']; ?>'/>
														<input type="hidden" name="id_desa" value='<?= $row['Id_Desa']; ?>'/> -->
														<input type="hidden" name="target_suara" value='<?= $row['Target_Suara']; ?>'/>
														<div class="col-md-4">
															<input type="text" class="form-control" name="nama" value='<?= $row['Nama']; ?>'/>
															<!-- <span class="help-block"> Provide your city or town </span> -->
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Tingkat <span class="required"> * </span></label>
														<div class="col-md-4">
															<select name="tingkat" class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPC" <?php if($row['Tingkat']=='DPC'){echo 'selected';}else{echo'';} ?>>DPC</option>
																<option value="DPRA" <?php if($row['Tingkat']=='DPRA'){echo 'selected';}else{echo'';} ?>>DPRA</option>
																<option value="TIMSES" <?php if($row['Tingkat']=='TIMSES'){echo 'selected';}else{echo'';} ?>>TIMSES</option>
																<option value="UPPA" <?php if($row['Tingkat']=='UPPA'){echo 'selected';}else{echo'';} ?>>UPPA</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Dapil <span class="required"> * </span></label>
														<div class="col-md-4">
															<select id='tingkat_dapil' class="form-control select2-allow-clear">
																<option value=""></option>
																<option value="DPRRI" <?php if(substr($row['Id_Dapil'],0,1)=='C'){echo 'selected';}else{echo'';} ?>>DPR-RI</option>
																<option value="DPRD" <?php if(substr($row['Id_Dapil'],0,1)=='B'){echo 'selected';}else{echo'';} ?>>DPRD Provinsi</option>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3"></label>
														<div class="col-md-4">
															<select name="id_dapil" id='dapil' class="form-control select2-allow-clear">
																<?php
																if(substr($row['Id_Dapil'],0,1)=='C'){
																	$url4 = 'https://andro.sitri.online/api/dapil/all/C';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($row['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil']; ?></option>
																		<?php
																		
																	}
																}else{
																	$url4 = 'https://andro.sitri.online/api/dapil/all/B';
																	$data_d = $this->Main_model->getAPI($url4);
																	foreach ($data_d as $value1) {
																		$cek = 'DKI';
																		?>
																			<option value="<?= $value1['Id_Dapil']; ?>" <?php if($row['Id_Dapil']==$value1['Id_Dapil']){echo 'selected';}else{echo'';} ?>><?= $value1['Nama_Dapil'] ?></option>
																		<?php
																	}
																}
																?>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Wilayah <span class="required"> * </span></label>
														<div class="col-md-4">
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kecamatan</label>
														<div class="col-md-4">
															<select name="id_kecamatan" id="kecamatan" class="form-control select2-allow-clear">
																<option value=""></option>
																<?php
																foreach($data_provinsi as $key => $value){
																?>
																	<option value="<?= $value['Id_Kecamatan'] ?>" <?php if($value['Id_Kecamatan']==$row['Id_Kecamatan']){echo'selected';}else{echo'';} ?>><?= $value['Nama_Kecamatan']; ?></option>
																<?php }
																?>
															</select>
														</div>
													</div>
													<div class="form-group select2-bootstrap-prepend">
														<label class="control-label col-md-3">Kelurahan/ Desa</label>
														<div class="col-md-4">
															<select name="id_desa" id="desa" class="form-control select2-allow-clear">
																<option value=""></option>
																<?php
																$url5 = 'https://andro.sitri.online/api/desa/kec/'.$row['Id_Kecamatan'];
																$data_desa = $this->Main_model->getAPI($url5);
																foreach ($data_desa as $key => $value) {
																?>
																<option value="<?= $value['Id_Desa'] ?>" <?php if($value['Id_Desa']==$row['Id_Desa']){echo'selected';}else{echo'';} ?>><?= $value['Nama_Desa']; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													<?php  ?>
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