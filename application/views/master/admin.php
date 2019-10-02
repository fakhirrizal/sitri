<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<script>
						$(document).ready(function(){
                            $("#radio44").click(function(){
									$('#wilayah_manager_dapil').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio45").click(function(){
									$('#wilayah_manager_dapil').show('fast');
                            });
                        });
						$(document).ready(function(){
                            $("#radio46").click(function(){
									$('#wilayah_manager_dapil').hide('fast');
                            });
                        });
						</script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Master</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Data Admin</span>
                            </li>
                        </ul>
                        <?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
                            <div class="m-heading-1 border-green m-bordered">
                                <h3>Catatan</h3>
                                <p> 1. Ketika mengklik <i>Atur Ulang Sandi</i>, maka kata sandi otomatis menjadi "<b>1234</b>"</p>
                                <p> 2. Jika menambahkan admin baru, <i>username</i> tidak boleh sama. </p>
                                <!-- <p> 3. Catatan ketiga</p> -->
                            </div>
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
															<a data-toggle="modal" href="#tambah_data" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
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
                                                        <th style="text-align: center;"> Username </th>
                                                        <th style="text-align: center;"> Role </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                	foreach ($data_admin as $key => $value) {
													if($this->session->userdata('role')=='dpd'){
														if($value->role=='super admin'){
															echo '';
														}
														else{
                                                	?>
                                                	<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?php echo $value->id; ?>"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td><?= $value->nama_lengkap; ?></td>
                                                        <td><?= $value->username; ?></td>
														<td style="text-align: center;"><?php
														if($value->role=='dpd'){
															echo 'Admin DPD';
														}
														elseif($value->role=='dpc'){
															echo 'DPC';
														}
														elseif($value->role=='dapil'){
															echo 'Manager Dapil';
														}
														elseif($value->role=='super admin'){
															echo 'Super Admin';
														}else{echo '';}?></td>
                                                        <td>
                                                        	<?php
                                                        	if($value->role=='super admin'){
                                                        		echo '
                                                        		<div class="btn-group">
                                                                <button class="btn btn-xs red dropdown-toggle" type="button" disabled data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                </button>
                                                                </div>
                                                        		';
                                                        	}
                                                        	else{
                                                        	?>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#ubah<?= $value->id; ?>">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Master/hapus_admin/'.$value->id)?>">
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
                                                        	<?php } ?>
                                                        </td>
                                                    </tr>
                                                	<?php
                                                	}}elseif($this->session->userdata('role')=='super admin'){
													?>
													<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?php echo $value->id; ?>"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td><?= $value->nama_lengkap; ?></td>
                                                        <td><?= $value->username; ?></td>
														<td style="text-align: center;"><?php
														if($value->role=='dpd'){
															echo 'Admin DPD';
														}
														elseif($value->role=='dpc'){
															echo 'DPC';
														}
														elseif($value->role=='dapil'){
															echo 'Manager Dapil';
														}
														elseif($value->role=='super admin'){
															echo 'Super Admin';
														}else{echo '';}?></td>
                                                        <td>
                                                        	<?php
                                                        	if($value->role=='super admin'){
                                                        		echo '
                                                        		<div class="btn-group">
                                                                <button class="btn btn-xs red dropdown-toggle" type="button" disabled data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                </button>
                                                                </div>
                                                        		';
                                                        	}
                                                        	else{
                                                        	?>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#ubah<?= $value->id; ?>">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Master/hapus_admin/'.$value->id)?>">
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
                                                        	<?php } ?>
                                                        </td>
                                                    </tr>
													<?php
													}else{echo'';}}
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
<div class="modal fade bs-modal-lg" id="tambah_data" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Tambah Data Admin</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">
          <!-- form start -->
		  	<form role="form" class="form-horizontal" action="<?=site_url('Master/simpan_admin');?>" method="post">
				<div class="form-body">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Email</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="email" class="form-control" name="email" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-envelope"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Password</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="text" class="form-control" name="password" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-key"></i>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Nama Lengkap</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="text" class="form-control" name="nama_lengkap" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Username</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-user-following"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Role</label>
						<div class="col-md-10">
							<div class="md-radio-inline">
								
								<div class="md-radio has-error">
									<input type="radio" id="radio44" name="role" value="dpd" class="md-radiobtn" checked>
									<label for="radio44">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Admin DPD </label>
								</div>
								<div class="md-radio has-warning">
									<input type="radio" id="radio45" name="role" value="dapil" class="md-radiobtn">
									<label for="radio45">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Manager Dapil </label>
								</div>
								<div class="md-radio has-success">
									<input type="radio" id="radio46" name="role" value="dpc" class="md-radiobtn">
									<label for="radio46">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> DPC </label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group select2-bootstrap-prepend" id='wilayah_manager_dapil' style='display: none'>
						<label class="control-label col-md-2">Wilayah <span class="required"> * </span></label>
						<div class="col-md-10">
							<select name="wilayah" id="wilayah" class="form-control select2-allow-clear">
								<option value=""></option>
								<option value="1">Dapil 4 - Cakung, Matraman, Pulogadung</option>
								<option value="2">Dapil 5 - Duren Sawit, Jatinegara, Kramat Jati</option>
								<option value="3">Dapil 6 = Ciracas, Cipayung, Makasar, Pasar Rebo</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-actions margin-top-10">
					<div class="row">
						<div class="col-md-offset-2 col-md-10">
							<button type="button" data-dismiss="modal" class="btn default">Batal</button>
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
<?php
    foreach ($data_admin as $row) { 
?>
<div class="modal fade bs-modal-lg" id="ubah<?= $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Ubah Data Admin</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">
          <!-- form start -->
          	<form role="form" class="form-horizontal" action="<?=site_url('Master/ubah_admin');?>" method="post">
				<input type="hidden" name="id" value="<?= $row->id; ?>">
				<div class="form-body">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Nama Lengkap</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="text" class="form-control" name="nama_lengkap" value="<?= $row->nama_lengkap; ?>" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Username</label>
						<div class="col-md-10">
							<div class="input-icon">
								<input type="text" value="<?= $row->username; ?>" class="form-control" name="username" placeholder="Type something">
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-user-following"></i>
							</div>
						</div>
					</div>
					<input type="hidden" value="bukankelompok" name="status">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-2 control-label" for="form_control_1">Role</label>
						<div class="col-md-10">
							<div class="md-radio-inline">
								
								<div class="md-radio has-error">
									<input type="radio" id="radio54<?= $row->id; ?>" name="role" value="dpd" class="md-radiobtn" <?php if($row->role=='dpd'){echo'checked';}else{echo'';} ?>>
									<label for="radio54<?= $row->id; ?>">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Admin DPD </label>
								</div>
								<div class="md-radio has-warning">
									<input type="radio" id="radio55<?= $row->id; ?>" name="role" value="dapil" class="md-radiobtn" <?php if($row->role=='dapil'){echo'checked';}else{echo'';} ?>>
									<label for="radio55<?= $row->id; ?>">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Manager Dapil </label>
								</div>
								<div class="md-radio has-success">
									<input type="radio" id="radio56<?= $row->id; ?>" name="role" value="dpc" class="md-radiobtn" <?php if($row->role=='dpc'){echo'checked';}else{echo'';} ?>>
									<label for="radio56<?= $row->id; ?>">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> DPC </label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions margin-top-10">
					<div class="row">
						<div class="col-md-offset-2 col-md-10">
							<button type="button" data-dismiss="modal" class="btn default">Batal</button>
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