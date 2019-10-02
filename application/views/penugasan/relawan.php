<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Penugasan</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Struktur</span>
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
                                            <div class="tabbable-line">
                                                <ul class="nav nav-tabs ">
                                                    <li class="active">
                                                        <a href="#tab_15_1" data-toggle="tab"> Struktur Task </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_15_2" data-toggle="tab"> Task Mandiri </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_15_1">
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
																		<a data-toggle="modal" href="<?=site_url('Penugasan/tambah_task_relawan');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
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
																	<th style="text-align: center;"> Kegiatan </th>
																	<th style="text-align: center;"> Lokasi </th>
																	<th style="text-align: center;"> Status </th>
																	<th style="text-align: center;" width="8%"> Aksi </th>
																</tr>
															</thead>
															<tbody>
															<?php
																$no = 1;
																foreach ($data_task as $key => $value) {
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_Struktur']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<td><?php
																	foreach ($data_relawan as $key => $dc) {
																		if($dc['Id_Struktur']==$value['Id_Struktur']){
																			echo $dc['Nama'];
																		}
																		else{
																			echo '';
																		}
																	}
																	?></td>
																	<td><?= $value['Nama_Kegiatan']; ?></td>
																	<td><?= $value['Detail_Lokasi']; ?></td>
																	<td><?php
																			if($value['IsDone']=='1'){
																				echo '<span class="label label-danger"> Done </span>';
																			}
																			else{
																				echo '<span class="label label-warning"> Pending </span>';
																			}
																		?></td>
																	<td>
																		<div class="btn-group">
																			<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
																				<i class="fa fa-angle-down"></i>
																			</button>
																			<ul class="dropdown-menu" role="menu">
																				<li>
																					<a data-toggle="modal" href="#detail_task_<?= $value['Id_Tasklist']; ?>">
																						<i class="icon-eye"></i> Detail Data </a>
																				</li>
																				<?php
																					if($value['IsDone']=='1'){
																						echo '';
																					}
																					else{
																				?>
																				<li>
																					<a data-toggle="modal" class='edit_data' data-target="#myModal" id="<?= $value['Id_Tasklist']; ?>">
																						<i class="icon-wrench"></i> Ubah Data </a>
																				</li><?php } ?>
																				<li>
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/3/'.$value['Id_Tasklist'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
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
                                                    <div class="tab-pane" id="tab_15_2">
													<form action="#" method="post" onsubmit="return deleteConfirm();"/>
														<div class="table-toolbar">
															<div class="row">
																<div class="col-md-6">
																	<div class="btn-group">
																		<button type='submit' id="sample_editable_1_new" class="btn sbold green"> Hapus
																			<i class="fa fa-trash"></i>
																		</button>
																		
																	</div>
																</div>
															
															</div>
														</div>
														<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
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
																	<th style="text-align: center;"> Kegiatan </th>
																	<th style="text-align: center;"> Rencana </th>
																	<th style="text-align: center;"> Status </th>
																	<th style="text-align: center;" width="8%"> Aksi </th>
																</tr>
															</thead>
															<tbody>
															<?php
																$no = 1;
																foreach ($task_mandiri as $key => $value) {
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_TaskMandiri']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<td><?php
																	foreach ($data_relawan as $key => $dc) {
																		if($dc['Id_Struktur']==$value['Id_Struktur']){
																			echo $dc['Nama'];
																		}
																		else{
																			echo '';
																		}
																	}
																	?></td>
																	<td><?= $value['Nama_Kegiatan']; ?></td>
																	<td><?php
																	$tanggal = explode('T', $value['Waktu']);
																	$waktu = explode('-', $tanggal[0]);
																	if ($waktu[1]=="01") {
																		echo $waktu[2]." Januari ".$waktu[0];
																	}elseif ($waktu[1]=="02") {
																		echo $waktu[2]." Februari ".$waktu[0];
																	}elseif ($waktu[1]=="03") {
																		echo $waktu[2]." Maret ".$waktu[0];
																	}elseif ($waktu[1]=="04") {
																		echo $waktu[2]." April ".$waktu[0];
																	}elseif ($waktu[1]=="05") {
																		echo $waktu[2]." Mei ".$waktu[0];
																	}elseif ($waktu[1]=="06") {
																		echo $waktu[2]." Juni ".$waktu[0];
																	}elseif ($waktu[1]=="07") {
																		echo $waktu[2]." Juli ".$waktu[0];
																	}elseif ($waktu[1]=="08") {
																		echo $waktu[2]." Agustus ".$waktu[0];
																	}elseif ($waktu[1]=="09") {
																		echo $waktu[2]." September ".$waktu[0];
																	}elseif ($waktu[1]=="10") {
																		echo $waktu[2]." Oktober ".$waktu[0];
																	}elseif ($waktu[1]=="11") {
																		echo $waktu[2]." November ".$waktu[0];
																	}elseif ($waktu[1]=="12") {
																		echo $waktu[2]." Desember ".$waktu[0];
																	}?></td>
																	<td><?php
																			if($value['IsDone']=='1'){
																				echo '<span class="label label-danger"> Done </span>';
																			}
																			else{
																				echo '<span class="label label-warning"> Pending </span>';
																			}
																		?></td>
																	<td>
																		<div class="btn-group">
																			<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
																				<i class="fa fa-angle-down"></i>
																			</button>
																			<ul class="dropdown-menu" role="menu">
																				<li>
																					<a data-toggle="modal" href="#detail_task_mandiri<?= $value['Id_TaskMandiri']; ?>">
																						<i class="icon-eye"></i> Detail Data </a>
																				</li>
																				<li>
																					<a data-toggle="modal" href="#">
																						<i class="icon-wrench"></i> Ubah Data </a>
																				</li>
																				<li>
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/4/'.$value['Id_TaskMandiri'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
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
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
						</div>
<?php
    foreach ($data_task as $row) { 
?>
<div class="modal fade bs-modal-lg" id="detail_task_<?= $row['Id_Tasklist']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
					<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php
					$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
					$data_dapil_detail = $this->Main_model->getAPI($url4);
					$cek = array('Message'=>'Dapil not found');
					if($row['Id_Dapil']==NULL){
						echo '';
					}
					elseif($data_dapil_detail==$cek){
						echo '';
					}
					else{
					//print_r($data_dapil_detail);
					echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';}
					?>
				</li>
				<li>
					<strong>Nama Caleg</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php
																	foreach ($data_relawan as $key => $dc) {
																		if($dc['Id_Struktur']==$row['Id_Struktur']){
																			echo $dc['Nama'];
																		}
																		else{
																			echo '';
																		}
																	}
																	?></li>
				<li>
					<strong>Nama Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Nama_Kegiatan']; ?></li>
				<li>
					<strong>Jenis Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Jenis_Kegiatan']; ?></li>
				<li>
					<strong>Deskripsi Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Deskripsi_Kegiatan']; ?></li>
				<li>
					<strong>Lokasi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Detail_Lokasi']; ?></li>
				<li>
					<strong>Rencana</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php   $tgl_acara = substr($row['Waktu'],0,10);
                                                                        $jam_acara = substr($row['Waktu'],11,5); 
                                                                        $tanggal_acara = explode('-', $tgl_acara);
                                                                        $tanggal_tampil = '';
                                                                            if ($tanggal_acara[1]=="01") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Januari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="02") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Februari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="03") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Maret ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="04") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." April ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="05") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Mei ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="06") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juni ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="07") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juli ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="08") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Agustus ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="09") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." September ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="10") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Oktober ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="11") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." November ".$tanggal_acara[0];
                                                                            }else {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Desember ".$tanggal_acara[0];
                                                                            }
                                                                        echo $tanggal_tampil.' (Pukul '.$jam_acara.')';
                                                                ?></li>
				<li>
					<strong>Realisasi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php   $tgl_acara = substr($row['Waktu_Realisasi'],0,10);
                                                                        $jam_acara = substr($row['Waktu_Realisasi'],11,5); 
                                                                        $tanggal_acara = explode('-', $tgl_acara);
                                                                        $tanggal_tampil = '';
                                                                            if ($tanggal_acara[1]=="01") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Januari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="02") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Februari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="03") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Maret ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="04") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." April ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="05") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Mei ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="06") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juni ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="07") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juli ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="08") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Agustus ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="09") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." September ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="10") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Oktober ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="11") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." November ".$tanggal_acara[0];
                                                                            }else {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Desember ".$tanggal_acara[0];
                                                                            }
                                                                        echo $tanggal_tampil.' (Pukul '.$jam_acara.')';
                                                                ?></li>
				<li>
					<strong>Segmentasi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Segmentasi']; ?></li>
				<li>
					<strong>Isu Strategis</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Isu_Strategis']; ?></li>
				<li>
					<strong>Tokoh yg dikunjungi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= '  '.$row['Tokoh_Dikunjungi']; ?></li>
				<li>
					<strong>Lembaga yg dikunjungi</strong>&nbsp; &nbsp;<?= '  '.$row['Lembaga_Dikunjungi']; ?></li>
				<li>
					<strong>Kehadiran Caleg</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Kehadiran_Caleg']; ?></li>
				<li>
					<strong>Catatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Notes']; ?></li>
				<a href="<?=base_url();?>Penugasan/download_lampiran/<?= $row['Id_Tasklist']; ?>" target="_blank" class="btn blue uppercase"><i class="fa fa-download"></i> Unduh Lampiran</a>
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div>
<?php }
?>
<?php
    foreach ($task_mandiri as $row) { 
?>
<div class="modal fade bs-modal-lg" id="detail_task_mandiri<?= $row['Id_TaskMandiri']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
					<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php
					$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
					$data_dapil_detail = $this->Main_model->getAPI($url4);
					$cek = array('Message'=>'Dapil not found');
					if($row['Id_Dapil']==NULL){
						echo '';
					}
					elseif($data_dapil_detail==$cek){
						echo '';
					}
					else{
					//print_r($data_dapil_detail);
					echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';}
					?>
				</li>
				<li>
					<strong>Nama Caleg</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php
																	foreach ($data_relawan as $key => $dc) {
																		if($dc['Id_Struktur']==$row['Id_Struktur']){
																			echo $dc['Nama'];
																		}
																		else{
																			echo '';
																		}
																	}
																	?></li>
				<li>
					<strong>Nama Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Nama_Kegiatan']; ?></li>
				<li>
					<strong>Jenis Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Jenis_Kegiatan']; ?></li>
				
			
				<li>
					<strong>Waktu</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php   $tgl_acara = substr($row['Waktu'],0,10);
                                                                        $jam_acara = substr($row['Waktu'],11,5); 
                                                                        $tanggal_acara = explode('-', $tgl_acara);
                                                                        $tanggal_tampil = '';
                                                                            if ($tanggal_acara[1]=="01") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Januari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="02") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Februari ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="03") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Maret ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="04") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." April ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="05") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Mei ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="06") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juni ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="07") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Juli ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="08") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Agustus ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="09") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." September ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="10") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Oktober ".$tanggal_acara[0];
                                                                            }elseif ($tanggal_acara[1]=="11") {
                                                                             $tanggal_tampil = $tanggal_acara[2]." November ".$tanggal_acara[0];
                                                                            }else {
                                                                             $tanggal_tampil = $tanggal_acara[2]." Desember ".$tanggal_acara[0];
                                                                            }
                                                                        echo $tanggal_tampil.' (Pukul '.$jam_acara.')';
                                                                ?></li>
				<li>
					<strong>Segmentasi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Segmentasi']; ?></li>
				<li>
					<strong>Isu Strategis</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Isu_Strategis']; ?></li>
				<li>
					<strong>Tokoh yg dikunjungi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= '  '.$row['Tokoh_Dikunjungi']; ?></li>
				<li>
					<strong>Lembaga yg dikunjungi</strong>&nbsp; &nbsp;<?= '  '.$row['Lembaga_Dikunjungi']; ?></li>
				<li>
					<strong>Biaya Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= number_format($row['Biaya_Kegiatan'],2); ?></li>
				
				<a href="<?=base_url();?>Penugasan/download_lampiran/<?= $row['Id_TaskMandiri']; ?>" target="_blank" class="btn blue uppercase"><i class="fa fa-download"></i> Unduh Lampiran</a>
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div>
<?php }
?>
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_edit"></div>
      </div>
      
    </div>
  </div>
</div>
  <script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.edit_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
	  var status = '2';
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Penugasan/ajax_ubah_data_penugasan', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id,status:status},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_edit').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
  </script>