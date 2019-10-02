<link href="<?=base_url('assets/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" type="text/css" />
                        <link href="<?=base_url('assets/pages/css/portfolio.min.css');?>" rel="stylesheet" type="text/css" />
                        
                        <script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
                        <script src="<?=base_url('assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js');?>" type="text/javascript"></script>
                        <script src="<?=base_url('assets/pages/scripts/portfolio-1.min.js');?>" type="text/javascript"></script>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Laporan</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Detail Kegiatan Struktur</span>
                            </li>
                        </ul>
                        <?= $this->session->flashdata('sukses') ?>
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
                                            <?php
											//print_r($data_relawan);
                                            //foreach ($data_relawan as $key => $value) {
												//echo $data_relawan['Id_Dapil'];
											//}
                                            ?>
                                            <ul class="cbp-l-project-details-list">
												<li>
													<?php
													if($data_relawan['Id_Dapil']=='string'){
														echo '';
													}
													else{
													?>
													<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php
													$url4 = 'https://andro.sitri.online/api/dapil/id/'.$data_relawan['Id_Dapil'];
													$data_dapil_detail = $this->Main_model->getAPI($url4);
													echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';
													}?>
												</li>
												<li>
													<strong>Nama Struktur</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
												<?= $data_relawan['Nama']; ?>
												</li>
												<li>
													<strong>Tingkat</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
												<?= $data_relawan['Tingkat'] ?>
												</li>
												<li>
													<strong>Alamat</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
												<?= $data_relawan['Alamat'] ?>
												</li>
												<li>
													<strong>Target Suara</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
												<?= $data_relawan['Target_Suara'] ?>
												</li>
											</ul>
                                            <?php
                                            
                                            ?>
                                            <br>
											<div class="tabbable-line">
                                                <ul class="nav nav-tabs ">
                                                    <li class="active">
                                                        <a href="#tab_15_1" data-toggle="tab"> Is Done </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_15_2" data-toggle="tab"> Pending </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_15_1">
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
																		<a data-toggle="modal" href="<?=site_url('Penugasan/tambah_task_caleg');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
																		<span class="separator">|</span>
																		<a href="<?=site_url('Laporan/cetak_laporan_kegiatan_per_relawan/'.$this->uri->segment(3));?>" class="btn default uppercase">Cetak Data <i class="fa fa-print"></i> </a>
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
																	<th style="text-align: center;"> Kegiatan </th>
																	<th style="text-align: center;"> Lokasi </th>
																	<th style="text-align: center;"> Waktu </th>
																	<th style="text-align: center;" width="8%"> Aksi </th>
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																$url3 = 'https://andro.sitri.online/api/strtask/str/'.$this->uri->segment(3);
																$data_task = $this->Main_model->getAPI($url3);
																//print_r($data_task);
																$cek = array('Message'=>'Task not found');
																if($data_task==$cek){
																	echo '';
																}
																else{
																foreach ($data_task as $key => $value) {
																	if($value['IsDone']=='1'){
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_Tasklist']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<!-- <td><?php
																	//echo $data_relawan['Nama'];
																	?></td> -->
																	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
																	<td style="text-align: center;"><?= $value['Detail_Lokasi']; ?></td>
																	<!-- <td><?php
																			// if($value['IsDone']=='1'){
																			// 	echo '<span class="label label-danger"> Done </span>';
																			// }
																			// else{
																			// 	echo '<span class="label label-warning"> Pending </span>';
																			// }
																		?></td> -->
																	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
                                                                        $jam_acara = substr($value['Waktu'],11,5); 
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
                                                                ?></td>
																	<td>
																		<div class="btn-group">
																			<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
																				<i class="fa fa-angle-down"></i>
																			</button>
																			<ul class="dropdown-menu" role="menu">
																				<li>
																					<a data-toggle="modal" href="#detail_task<?= $value['Id_Tasklist']; ?>">
																						<i class="icon-eye"></i> Detail Data </a>
																				</li>
																				<li>
																					<a data-toggle="modal" href="#">
																						<i class="icon-wrench"></i> Ubah Data </a>
																				</li>
																				<li>
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/1/'.$value['Id_Tasklist'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
																				</li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																}else{echo'';}}}
																$url4 = 'https://andro.sitri.online/api/strmandiri/strnf/'.$this->uri->segment(3);
																$data_task_mandiri = $this->Main_model->getAPI($url4);
																//print_r($data_task);
																$cek = array('Message'=>'Task not found');
																if($data_task_mandiri==$cek){
																	echo '';
																}
																else{
																foreach ($data_task_mandiri as $key => $value) {
																	if($value['IsDone']=='1'){
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_TaskMandiri']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<!-- <td><?php
																	//echo $data_relawan['Nama'];
																	?></td> -->
																	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
																	<td style="text-align: center;"><?= '-'; ?></td>
																	<!-- <td><?php
																			// if($value['IsDone']=='1'){
																			// 	echo '<span class="label label-danger"> Done </span>';
																			// }
																			// else{
																			// 	echo '<span class="label label-warning"> Pending </span>';
																			// }
																		?></td> -->
																	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
                                                                        $jam_acara = substr($value['Waktu'],11,5); 
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
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/1/'.$value['Id_TaskMandiri'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
																				</li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																}else{echo'';}}}
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
																		<button type='submit' id="sample_editable_1_new" class="btn sbold green"> Delete
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
																	<th style="text-align: center;"> Kegiatan </th>
																	<th style="text-align: center;"> Rencana </th>
																	<th style="text-align: center;"> Waktu </th>
																	<th style="text-align: center;" width="8%"> Aksi </th>
																</tr>
															</thead>
															<tbody>
																<?php
																$nomor = 1;
																$url5 = 'https://andro.sitri.online/api/strtask/str/'.$this->uri->segment(3);
																$data_task_pending = $this->Main_model->getAPI($url5);
																//print_r($data_task);
																$cek = array('Message'=>'Task not found');
																if($data_task_pending==$cek){
																	echo '';
																}
																else{
																foreach ($data_task_pending as $key => $value) {
																	if($value['IsDone']=='1'){
																	echo'';
																	}
																	else{
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_Tasklist']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $nomor++.'.'; ?></td>
																	<!-- <td><?php
																	//echo $data_relawan['Nama'];
																	?></td> -->
																	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
																	<td style="text-align: center;"><?= $value['Detail_Lokasi']; ?></td>
																	<!-- <td><?php
																			// if($value['IsDone']=='1'){
																			// 	echo '<span class="label label-danger"> Done </span>';
																			// }
																			// else{
																			// 	echo '<span class="label label-warning"> Pending </span>';
																			// }
																		?></td> -->
																	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
                                                                        $jam_acara = substr($value['Waktu'],11,5); 
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
                                                                ?></td>
																	<td>
																		<div class="btn-group">
																			<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
																				<i class="fa fa-angle-down"></i>
																			</button>
																			<ul class="dropdown-menu" role="menu">
																				<li>
																					<a data-toggle="modal" href="#detail_task<?= $value['Id_Tasklist']; ?>">
																						<i class="icon-eye"></i> Detail Data </a>
																				</li>
																				<li>
																					<a data-toggle="modal" href="#">
																						<i class="icon-wrench"></i> Ubah Data </a>
																				</li>
																				<li>
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/1/'.$value['Id_Tasklist'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
																				</li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																}}}
																$url4 = 'https://andro.sitri.online/api/strmandiri/strnf/'.$this->uri->segment(3);
																$data_task_mandiri_pending = $this->Main_model->getAPI($url4);
																//print_r($data_task);
																$cek = array('Message'=>'Task not found');
																if($data_task_mandiri_pending==$cek){
																	echo '';
																}
																else{
																foreach ($data_task_mandiri_pending as $key => $value) {
																	if($value['IsDone']=='1'){
																	echo'';
																	}
																	else{
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_TaskMandiri']; ?>"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $nomor++.'.'; ?></td>
																	<!-- <td><?php
																	//echo $data_relawan['Nama'];
																	?></td> -->
																	<td style="text-align: center;"><?= $value['Nama_Kegiatan']; ?></td>
																	<td style="text-align: center;"><?= '-'; ?></td>
																	<!-- <td><?php
																			// if($value['IsDone']=='1'){
																			// 	echo '<span class="label label-danger"> Done </span>';
																			// }
																			// else{
																			// 	echo '<span class="label label-warning"> Pending </span>';
																			// }
																		?></td> -->
																	<td style="text-align: center;"><?php   $tgl_acara = substr($value['Waktu'],0,10);
                                                                        $jam_acara = substr($value['Waktu'],11,5); 
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
																					<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Penugasan/hapus_task/1/'.$value['Id_TaskMandiri'])?>">
																						<i class="icon-trash"></i> Hapus Data </a>
																				</li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																}}}
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
$url9 = 'https://andro.sitri.online/api/strtask/str/'.$this->uri->segment(3);
$data_task = $this->Main_model->getAPI($url9);
foreach ($data_task as $row) { 
	$cek = array('Message'=>'Task not found');
		if($data_task==$cek){
			echo '';
		}
		else{
?>
<div class="modal fade bs-modal-lg" id="detail_task<?= $row['Id_Tasklist']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
					if($row['Id_Dapil']==NULL){
						echo '';
					}
					else{
					$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
					$data_dapil_detail = $this->Main_model->getAPI($url4);
					$cek_nama = array('Message'=>'Dapil not found');
					if($data_dapil_detail==$cek_nama){
						echo '';
					}
					else{
					echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';}}
					?>
				</li>
			
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
				<br><a href="<?=base_url();?>Penugasan/download_lampiran/<?= $row['Id_Tasklist']; ?>" target="_blank" class="btn blue uppercase"><i class="fa fa-download"></i> Unduh Lampiran</a>
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div>
<?php }}
?>
<?php
$url10 = 'https://andro.sitri.online/api/strmandiri/strnf/'.$this->uri->segment(3);
$task_mandiri = $this->Main_model->getAPI($url10);
    foreach ($task_mandiri as $row) { 
		$cek = array('Message'=>'Task not found');
		if($task_mandiri==$cek){
			echo '';
		}
		else{
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
					if($row['Id_Dapil']==NULL){
						echo '';
					}
					else{
					$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
					$data_dapil_detail = $this->Main_model->getAPI($url4);
					$cek_nama = array('Message'=>'Dapil not found');
					if($data_dapil_detail==$cek_nama){
						echo '';
					}
					else{
					echo $data_dapil_detail['Nama_Dapil'].' ('.$data_dapil_detail['Nama_WilayahDapil'].')';}}
					?>
				</li>
				
				<li>
					<strong>Nama Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Nama_Kegiatan']; ?></li>
				<li>
					<strong>Jenis Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Jenis_Kegiatan']; ?></li>
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
					<strong>Tokoh yg dikunjungi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= '  '.$row['Tokoh_Dikunjungi']; ?></li>
				<li>
					<strong>Lembaga yg dikunjungi</strong>&nbsp; &nbsp;<?= '  '.$row['Lembaga_Dikunjungi']; ?></li>
				<li>
					<strong>Segmentasi</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Segmentasi']; ?></li>
				<li>
					<strong>Isu Strategis</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Isu_Strategis']; ?></li>
				<li>
					<strong>Catatan</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Catatan']; ?></li>
				<br><a href="<?=base_url();?>Penugasan/download_lampiran2/<?= $row['Id_TaskMandiri']; ?>" target="_blank" class="btn blue uppercase"><i class="fa fa-download"></i> Unduh Lampiran</a>
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div>
<?php }}
?>