						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Master</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Data Caleg</span>
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
										</div>
										1. Sumber daya manusia-pendidikan dasar
										2. Tenaga kerja, pengangguran
										3. Lingkungan hidup,air, sungai, sampah
										4. Ukm, usaha rumahan
										5. Pangan/perumahan
										6. Layanan kesehatan dasar
										7. Pelayanan publik, pembangunan infrastruktur 
										8. Seni budaya dan olahraga
										9. Keagamaan, masjid, pesantren
										10. Kepemudaan, pelajar, mahasiswa 
										11. Tokoh wanita, keluarga
										12. Pertanian, peternakan, perikanan
										-->
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
															<a data-toggle="modal" href="<?=site_url('Master/tambah_data_caleg');?>" class="btn blue uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
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
                                                        <th style="text-align: center;"> No. Telp. </th>
                                                        <th style="text-align: center;"> Alamat </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													<?php
                                                    $no = 1;
                                                	foreach ($data_caleg as $key => $value) {
                                                	?>
                                                	<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?= $value['Id_Caleg']; ?>"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td><?= $value['Nama']; ?></td>
                                                        <td><?= $value['Telepon']; ?></td>
                                                        <td style="text-align: center;"><?= $value['Alamat']; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
																	<li>
                                                                        <a data-toggle="modal" href="#detail<?= $value['Id_Caleg']; ?>">
                                                                            <i class="icon-eye"></i> Detail Data </a>
                                                                    </li>
																	<li>
                                                                        <a href="<?=site_url('Master/ubah_data_caleg/'.$value['Id_Caleg']);?>">
                                                                            <i class="icon-wrench"></i> Ubah Data </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="return confirm('Anda yakin?')" href="<?=site_url('Master/hapus_data_caleg/'.$value['Id_Caleg']);?>">
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
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
						</div>
<?php
    foreach ($data_caleg as $row) { 
?>
<div class="modal fade bs-modal-lg" id="detail<?= $row['Id_Caleg']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
					<strong>TTL</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?php
							echo $row['Tempat_Lahir'].', ';
							$tanggal = explode('T', $row['Tanggal_Lahir']);
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
							}
					?></li>
				<li>
					<strong>Kontak</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Telepon'];; ?></li>
				<li>
					<strong>Alamat</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Alamat']; ?></li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/desa/all/desc';
					$data_d = $this->Main_model->getAPI($url4);
					foreach ($data_d as $value1) {
						if($value1['Id_Desa']==$row['Desa']){
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
					$url4 = 'https://andro.sitri.online/api/kec/id/'.$row['Kecamatan'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kecamatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kecamatan'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/kab/id/'.$row['Kabupaten'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kabupaten/ Kota</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kabupaten'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/prov/id/'.$row['Provinsi'];
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
						}}
					?>
				</li>
				<li>
					<strong>Target Suara</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= number_format($row['Target_Suara']); ?></li>
			</ul>
        </div>
      </div>     
    </div>
  </div>
</div>
<?php
}
?>