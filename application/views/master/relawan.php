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
                                <span>Data Struktur</span>
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
                                                            <button type='submit' id="sample_editable_1_new" class="btn sbold green"> Delete
                                                                <i class="fa fa-trash"></i>
															</button>
															
														</div>
															<span class="separator">|</span>
															<a href="<?=site_url('Master/tambah_data_relawan');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            
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
                                                        <th style="text-align: center;"> Nama </th>
                                                        <th style="text-align: center;"> Alamat </th>
                                                        <th style="text-align: center;"> Tingkat </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													<?php
                                                    $no = 1;
                                                	foreach ($data_relawan as $key => $value) {
                                                	?>
                                                	<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_Struktur']; ?>"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td><?= $value['Nama']; ?></td>
                                                        <td><?= $value['Alamat']; ?></td>
                                                        <td style="text-align: center;"><?= $value['Tingkat']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
																	<li>
                                                                        <a data-toggle="modal" class='view_data' data-target="#myModal" id="<?= $value['Id_Struktur']; ?>">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
																	<li>
                                                                        <a data-toggle="modal" href="<?=site_url('Master/ubah_data_relawan/'.$value['Id_Struktur']);?>">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="return confirm('Anda yakin?')" href="#">
                                                                            <i class="icon-trash"></i> Hapus Data </a>
                                                                    </li>
                                                                    <li class="divider"> </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="icon-refresh"></i> Atur Ulang Sandi
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                	<?php
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
<!-- <?php
    //foreach ($data_relawan as $row) { 
?>
<div class="modal fade bs-modal-lg" id="detail<?= $row['Id_Struktur']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Detail</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">
			<ul class="cbp-l-project-details-list">
				<li>
					<strong>Nama</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Nama']; ?></li>
				
				<li>
					<strong>Tingkat</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Tingkat'];; ?></li>
				<li>
					<strong>Alamat</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Alamat']; ?></li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/desa/all/desc';
					$data_d = $this->Main_model->getAPI($url4);
					foreach ($data_d as $value1) {
						if($value1['Id_Desa']==$row['Id_Desa']){
							echo '<strong>Desa</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$value1['Nama_Desa'];
						}
						else{
							echo '';
						}
					}
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/kec/id/'.$row['Id_Kecamatan'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kecamatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kecamatan'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/kab/id/'.$row['Id_Kabupaten'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kabupaten/ Kota</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kabupaten'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/prov/id/'.$row['Id_Provinsi'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Provinsi</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Provinsi'];
					?>
				</li>
				<li>
					<?php
					if($row['Id_Dapil']==''){
						echo '<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp;';
					}
					else{
						$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
						$data_d = $this->Main_model->getAPI($url4);
						echo '<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Dapil'];
						if(substr($row['Id_Dapil'],0,1)=='B'){
							echo ' (DPRD Provinsi)';
						}
						else{
							echo ' (DPR-RI)';
						}
					}
					?>
				</li>
				
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div> -->
<?php //}
    foreach ($data_relawan as $row) {
?>
<div class="modal fade bs-modal-lg" id="ubah<?= $row['Id_Struktur']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Data Ubah</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">
			<form role="form" enctype='multipart/form-data' class="form-horizontal" action="<?=site_url('Master/ubah_data_relawan');?>" method="post">
				<div class="form-body">
					<div class="form-group">
						<label class="control-label col-md-3">Nama
							<span class="required"> * </span>
						</label>
						<input type="hidden" name="id_struktur" value='<?= $row['Id_Struktur']; ?>'/>
						<input type="hidden" name="alamat" value='<?= $row['Alamat']; ?>'/>
						<!-- <input type="hidden" name="id_dapil" value='<?= $row['Id_Dapil']; ?>'/> -->
						<input type="hidden" name="id_kecamatan" value='<?= $row['Id_Kecamatan']; ?>'/>
						<input type="hidden" name="id_desa" value='<?= $row['Id_Desa']; ?>'/>
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
							<select name="dapil" id='dapil' class="form-control select2-allow-clear">
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
    </div>
  </div>
</div> 
<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail"></div>
      </div>
      
    </div>
  </div>
</div>
  <script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Master/ajax_detail_relawan', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
  </script>