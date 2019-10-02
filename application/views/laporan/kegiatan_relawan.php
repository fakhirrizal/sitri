					
						<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<script>
                        $(document).ready(function(){
                            $("#radio14").click(function(){
                                    $('#pilihan1').show('fast');
									$('#pilihan2').hide('fast');
									$('#pilihan21').hide('fast');
									$('#pilihan3').hide('fast');
									$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio15").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').show('fast');
									$('#pilihan21').show('fast');
									$('#pilihan3').hide('fast');
									$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio16").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').hide('fast');
									$('#pilihan21').hide('fast');
									$('#pilihan3').show('fast');
									$('#pilihan31').show('fast');
                            });
                        });
						</script>
						<script type="text/javascript">

						$(function(){

						$.ajaxSetup({
						type:"POST",
						url: "<?php echo site_url('Laporan/filter_laporan')?>",
						cache: false,
						});

						$("#country_list").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'tingkat_pemilihan_relawan'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})


						});
						$("#single-append-text").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'dapil'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})
						});
						$("#kabupaten").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'listkecamatan'},
						success: function(respond){
						$("#kecamatan").html(respond);
						}
						})


						});
						$("#kecamatan").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'kecamatan'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})
						});
						$("#tingkat_dapil").change(function(){
						var value=$(this).val();
						$.ajax({
						data:{id:value,modul:'pilihandapil'},
						success: function(respond){
						$("#pilihandapil").html(respond);
						}
						})
						});
						})

						</script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Laporan</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Kegiatan Struktur</span>
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
                                        
                                        <div class="portlet-body">
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
															<span class="box"></span> Tingkat Struktur </label>
													</div>
													<div class="md-radio has-error">
														<input type="radio" id="radio15" name="radio2" class="md-radiobtn" checked="">
														<label for="radio15">
															<span class="inc"></span>
															<span class="check"></span>
															<span class="box"></span> Dapil </label>
													</div>
													<div class="md-radio has-warning">
														<input type="radio" id="radio16" name="radio2" class="md-radiobtn">
														<label for="radio16">
															<span class="inc"></span>
															<span class="check"></span>
															<span class="box"></span> Kecamatan </label>
													</div>
												</div>
											</div> -->
											<br>
											<?php }else{echo'';} ?>
											<div class="form-group" id='pilihan1' >
												<label class="control-label col-md-1">Tingkat Struktur</label>
												<div class="col-md-5">
													<select id="country_list" class="form-control select2-allow-clear">
                                                        <option value=''></option>
														<option value='DPC'>DPC</option>
														<option value='DPRA'>DPRA</option>
														<option value='TIMSES'>TIMSES</option>
														<option value='UPPA'>UPPA</option>
                                                    </select>
												</div>
											</div>

											<!-- <div class="form-group select2-bootstrap-prepend" id='pilihan2' >
												<label class="control-label col-md-1">Dapil</label>
												<div class="col-md-5">
													<select id='tingkat_dapil' class="form-control select2-allow-clear">
														<option value=""></option>
														<option value="DPRRI">DPR-RI</option>
														<option value="DPRD">DPRD Provinsi</option>
													</select>
												</div>
											<br>
											<br>
											</div>
											
											<div class="form-group select2-bootstrap-prepend" id='pilihan21' >
												<label class="control-label col-md-1"></label>
												<div class="col-md-5">
													<select name="dapil" id='pilihandapil' class="form-control select2-allow-clear">
														<option value=""></option>
													</select>
												</div>
											</div>

											<div class="form-group select2-bootstrap-prepend" id='pilihan3' style='display: none'>
												<label class="control-label col-md-1">Kabupaten/ Kota</label>
												<div class="col-md-5">
													<select id="kabupaten" class="form-control select2-allow-clear">
														<option value=''></option>
														<?php
														foreach($data_provinsi as $key => $value){
															echo '<option value="'.$value['Id_Kabupaten'].'">'.$value['Nama_Kabupaten'].'</option>';
														}
														?>
                                                    </select>
												</div>
											<br>
											<br>
											</div>
											<div class="form-group select2-bootstrap-prepend" id='pilihan31' style='display: none'>
												<label class="control-label col-md-1">Kecamatan</label>
												<div class="col-md-5">
													<select id="kecamatan" class="form-control select2-allow-clear">
														<option value=''></option>
                                                    </select>
												</div>
											</div> -->
											<br>
											<br> 
											<hr>
                                            <form action="#" method="post" onsubmit="return deleteConfirm();"/>
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <button type='submit' id="sample_editable_1_new" class="btn sbold green"> Hapus
                                                                <i class="fa fa-trash"></i>
                                                            </button>
															
                                                        </div>
														<a href="<?=site_url('Penugasan/tambah_task_relawan');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
                                                    </div>
                                                  
                                                </div>
                                            </div>
											<div id='data_ajax'>
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
                                                        <th style="text-align: center;"> Nama Struktur </th>
														<th style="text-align: center;"> Instruksi </th>
                                                        <th style="text-align: center;"> Jumlah Kegiatan </th>
														<th style="text-align: center;"> Target Pemilih </th>
														<th style="text-align: center;"> Jumlah Pemilih </th>
														<th style="text-align: center;"> Coverage </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nomor = 1;
                                                	foreach ($data_relawan as $key => $value) {
													?>
													<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $nomor++.'.'; ?></td>
														<td><?= $value['Nama']; ?></td>
														<?php
														$total_relawan_task = '';
														$task1 = 0;
														$task2 = 0;
														$task_done = 0;
														foreach ($relawan_task as $key => $ct) {
															if($ct['Id_Struktur']==$value['Id_Struktur']){
																$task1++;
																if($ct['IsDone']=='1'){
																	$task_done++;
																}
																else{
																	echo'';
																}
															}
														}
														foreach ($task_mandiri as $key => $tm) {
															if($tm['Id_Struktur']==$value['Id_Struktur']){
																$task2++;
															}
														}
														$total_relawan_task = $task1+$task2;
														?>
                                                        <td style="text-align: center;"><?= $task_done.'/ '.$task1; ?> Kegiatan</td>
														<td style="text-align: center;"><?= $task2; ?> Kegiatan</td>
														<td style="text-align: center;"><?= $value['Target_Suara']; ?></td>
														<?php
														$total_cakupan = '';
														$cakupan1 = '';
														$cakupan2 = '';
														$pemilih = 0;
														$pemilihmandiri = 0;
														foreach ($relawan_task as $key => $ct) {
															if($ct['Id_Struktur']==$value['Id_Struktur']){
																$total_ini = $ct['Jumlah_M'] + $ct['Jumlah_CM'] + $ct['Jumlah_O'] + $ct['Jumlah_T'] + $ct['Jumlah_BJ'];
																$cakupan1 += $total_ini;
																$pemilih +=$ct['Jumlah_M'];
															}
														}
														foreach ($task_mandiri as $key => $tm) {
															if($tm['Id_Struktur']==$value['Id_Struktur']){
																$total_ini = $tm['Jumlah_M'] + $tm['Jumlah_CM'] + $tm['Jumlah_O'] + $tm['Jumlah_T'] + $tm['Jumlah_BJ'];
																$cakupan2 += $total_ini;
																$pemilihmandiri += $tm['Jumlah_M'];
															}
														}
														$total_cakupan = $cakupan1+$cakupan2;
														?>
														<td style="text-align: center;"><?= $pemilih+$pemilihmandiri; ?> Orang</td>
														<td style="text-align: center;"><?php
														$urlcoverage = 'https://andro.sitri.online/api/coveragestr/str/'.$value['Id_Struktur'];
														$datacoverage = $this->Main_model->getAPI($urlcoverage);
														$rwrw = 'https://andro.sitri.online/api/rw/all/asc';
														$datarw = $this->Main_model->getAPI($rwrw);
														$jumlahrw = 0;
														foreach ($datarw as $key => $drw) {
															if($drw['Id_Kabupaten']=='3172'){
																$jumlahrw++;
															}
															else{echo'';}
														}
														echo $datacoverage['jumlah'];
														if($datacoverage['jumlah']==0){
															echo ' (0 %)';
														}
														else{
														$persentase = $datacoverage['jumlah'] / $jumlahrw * 100; echo ' ('.number_format($persentase,2).' %)';} ?></td>
                                                        <td>
														<a href="<?=site_url('Laporan/detail_relawan/'.$value['Id_Struktur']);?>" class="btn btn-xs green">Detail</a>
                                                            <!-- <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#detail_data">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-trash"></i> Hapus Data </a>
                                                                    </li>
                                                                </ul>
                                                            </div> -->
                                                        	
                                                        </td>
                                                    </tr>
                                                	<!-- <tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td>Mukhammad Fakhir Rizal</td>
                                                        <td style="text-align: center;">12 Kegiatan</td>
                                                        <td style="text-align: center;">1,200 Orang</td>
														<td style="text-align: center;">890 Orang</td>
														<td style="text-align: center;">90 %</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#detail_data">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-trash"></i> Hapus Data </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        	
                                                        </td>
                                                    </tr>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td>Sharfina Aulia Puspasari</td>
                                                        <td style="text-align: center;">13 Kegiatan</td>
                                                        <td style="text-align: center;">1,170 Orang</td>
														<td style="text-align: center;">990 Orang</td>
														<td style="text-align: center;">89 %</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#detail_data">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-trash"></i> Hapus Data </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        	
                                                        </td>
                                                    </tr>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td>Elad Oktarizo</td>
                                                        <td style="text-align: center;">3 Kegiatan</td>
                                                        <td style="text-align: center;">970 Orang</td>
														<td style="text-align: center;">940 Orang</td>
														<td style="text-align: center;">96 %</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#detail_data">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="icon-trash"></i> Hapus Data </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        	
                                                        </td>
                                                    </tr> -->
                                                	<?php
                                                	}
                                                	?>
                                                </tbody>
                                            </table>
                                            </div>
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
<div class="modal fade bs-modal-lg" id="detail_data" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
      </div>
      <div class="modal-body">
		<div class="cbp-l-project-details-title">
			<span>Nama Caleg</span>
		</div>
		<ul class="cbp-l-project-details-list">
			<li>
				<strong>Nama</strong>Mukhammad Fakhir Rizal</li>
			<li>
				<strong>No. KTP</strong>3325111611940004</li>
			<li>
				<strong>Alamat</strong>Jln. dr. Cipto 61, Proyonanggan Tengah, Batang 51211</li>
			<li>
				<strong>Email</strong>bokir.rizal@gmail.com</li>
			<li>
				<strong>Nomor HP</strong>+62 856 963 036 27</li>
		</ul>

		<div class="cbp-l-project-details-title">
			<span>Laporan Kegiatan</span>
		</div>
		<ul class="cbp-l-project-details-list">
			<li>
				<strong>Kegiatan 1</strong>Oke</li>
			<li>
				<strong>Kegiatan 2</strong>Mantap Betul</li>
			<li>
				<strong>Kegiatan 3</strong>Nais, lanjutkan!!!</li>
		</ul>
		<div class="cbp-l-project-desc-title">
			<span>Dokumen Foto</span>
		</div>
		<ul class="cbp-l-project-related-wrap">
			<li class="cbp-l-project-related-item">
				<a href="ajax-juicy-projects/project1.html" class="cbp-singlePage cbp-l-project-related-link" rel="nofollow">
					<img src="http://localhost/sindangjaring/assets/global/img/600x600/19.jpg" alt="">
					<div class="cbp-l-project-related-title">Persiapan Kampanye</div>
				</a>
			</li>
			<li class="cbp-l-project-related-item">
				<a href="ajax-juicy-projects/project3.html" class="cbp-singlePage cbp-l-project-related-link" rel="nofollow">
					<img src="http://localhost/sindangjaring/assets/global/img/600x600/21.jpg" alt="">
					<div class="cbp-l-project-related-title">Blusukan ke Bulan</div>
				</a>
			</li>
			<li class="cbp-l-project-related-item">
				<a href="ajax-juicy-projects/project4.html" class="cbp-singlePage cbp-l-project-related-link" rel="nofollow">
					<img src="http://localhost/sindangjaring/assets/global/img/600x600/65.jpg" alt="">
					<div class="cbp-l-project-related-title">Talkshow di Kampus</div>
				</a>
			</li>
		</ul>
		<div class='row'>
			<!-- <a href="#" target="_blank" class="cbp-l-project-details-visit btn red uppercase"><i class="fa fa-download"></i> Unduh File Rekap</a> -->
		</div>
      </div>
    </div>
  </div>
</div>