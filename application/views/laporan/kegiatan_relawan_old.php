
						<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<script type="text/javascript">

						$(function(){

						$.ajaxSetup({
						type:"POST",
						url: "<?php echo site_url('Laporan/filter_laporan')?>",
						cache: false,
						});
						$("#single-append-text").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'tingkat_struktur'},
						success: function(respond){
						$("#data_ajax").html(respond);
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
							<span>Kegiatan Relawan/ Struktur</span>
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
											<div class="form-group form-md-radios">
												<label>Opsi Pencarian</label>
											</div>
											<br>
											<div class="form-group">
												<label class="control-label col-md-1">Tingkat Struktur</label>
												<div class="col-md-5">
													<select id="single-append-text" class="form-control select2-allow-clear">
                                                        <option value=''></option>
														<option value='1'>DPC</option>
														<option value='2'>DPRa</option>
														<option value='3'>TIMSES</option>
														<option value='4'>UPPA</option>
                                                    </select>
												</div>
											</div>
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
														<a href="#" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
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
														<th style="text-align: center;"> Jumlah Instruksi </th>
														<th style="text-align: center;"> Jumlah Kegiatan </th>
														<th style="text-align: center;"> Target Pemilih </th>
														<th style="text-align: center;"> Jumlah Pemilih </th>
														<th style="text-align: center;"> Coverage </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                	//foreach ($data_admin as $key => $value) {
                                                	?>
                                                	<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td style="text-align: center;">DPC</td>
                                                        <td style="text-align: center;">12 Instruksi</td>
                                                        <td style="text-align: center;">23 Kegiatan</td>
														<td style="text-align: center;">2,890 Orang</td>
														<td style="text-align: center;">2,690 Orang</td>
														<td style="text-align: center;">93 %</td>
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
                                                        <td style="text-align: center;">DPRa</td>
														<td style="text-align: center;">3 Instruksi</td>
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
                                                        <td style="text-align: center;">DPC</td>
														<td style="text-align: center;">3 Instruksi</td>
														<td style="text-align: center;">10 Kegiatan</td>
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
                                                    </tr>
                                                	<?php
                                                	//}
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