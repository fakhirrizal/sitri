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
						<th style="text-align: center;"> Nama CAD </th>
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
					
					foreach($data_task as $dt){
					?>
					<tr class="odd gradeX">
						<td>
							<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
								<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;"><?= $nomor++; ?></td>
						<td><?php
						$url3 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$dt['Id_Caleg'];
						$data_caleg = $this->Main_model->getAPI($url3);
						echo $data_caleg['Nama'];
						?></td>
						<td style="text-align: center;">
						<?php
						$url3 = 'https://andro.sitri.online/api/calegtask/caleg/'.$dt['Id_Caleg'];
						$data_task = $this->Main_model->getAPI($url3);
						$jumlah_task = 0;
						$task_done = 0;
						foreach ($data_task as $key => $dt) {
							if($dt['Id_Wilayah']==$id){
								$jumlah_task++;
								if($dt['IsDone']=='1'){
									$task_done++;
								}
								else{
									echo'';
								}
							}
							else{
								echo '';
							}
						}
						
						//$total_task = $jumlah_task + $jumlah_task_mandiri;
						//echo $total_task;
						echo $task_done.'/ '.$jumlah_task;
						?>
						</td>
						<td style="text-align: center;">
						<?php
						$url23 = 'https://andro.sitri.online/api/calegmandiri/caleg/'.$dt['Id_Caleg'];
						$task_mandiri = $this->Main_model->getAPI($url23);
						$jumlah_task_mandiri = 0;
						foreach ($task_mandiri as $key => $tm) {
							if($tm['Id_Wilayah']==$id){
								$jumlah_task_mandiri++;
							}
							else{
								echo '';
							}
						}
						echo $jumlah_task_mandiri;
						?>
						</td>
						<td style="text-align: center;"><?php
						$url3 = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$dt['Id_Caleg'];
						$data_caleg = $this->Main_model->getAPI($url3);
						echo number_format($data_caleg['Target_Suara']);
						?></td>
							<td style="text-align: center;"><?php
							$url3 = 'https://andro.sitri.online/api/calegtask/caleg/'.$dt['Id_Caleg'];
							$data_task = $this->Main_model->getAPI($url3);
							$jumlah_task = 0;
							$jumlah_pemilih = 0;
							$jumlah_pemilih_mandiri = 0;
							foreach ($data_task as $key => $ct) {
								if($dt['Id_Wilayah']==$id){
									$total_ini = $ct['Jumlah_M'] + $ct['Jumlah_CM'] + $ct['Jumlah_O'] + $ct['Jumlah_T'] + $ct['Jumlah_BJ'];
									$jumlah_task += $total_ini;
									$jumlah_pemilih += $ct['Jumlah_M'];
								}
								else{
									echo '';
								}
							}
							$url23 = 'https://andro.sitri.online/api/calegmandiri/caleg/'.$dt['Id_Caleg'];
							$task_mandiri = $this->Main_model->getAPI($url23);
							$jumlah_task_mandiri = 0;
							foreach ($task_mandiri as $key => $tm) {
								if($tm['Id_Wilayah']==$id){
									$total_ini = $tm['Jumlah_M'] + $tm['Jumlah_CM'] + $tm['Jumlah_O'] + $tm['Jumlah_T'] + $tm['Jumlah_BJ'];
									$jumlah_task_mandiri += $total_ini;
									$jumlah_pemilih_mandiri += $tm['Jumlah_M'];
								}
								else{
									echo '';
								}
							}
							$total_task = $jumlah_task + $jumlah_task_mandiri;
							echo $jumlah_pemilih+$jumlah_pemilih_mandiri;
						?></td>
						<td style="text-align: center;"><?php
						$url3 = 'https://andro.sitri.online/api/calegtask/caleg/'.$dt['Id_Caleg'];
						$data_task = $this->Main_model->getAPI($url3);
						$jumlah_task = 0;
						foreach ($data_task as $key => $ct) {
							if($dt['Id_Wilayah']==$id){
								$total_ini = $ct['Jumlah_M'] + $ct['Jumlah_CM'] + $ct['Jumlah_O'] + $ct['Jumlah_T'] + $ct['Jumlah_BJ'];
								$jumlah_task += $total_ini;
							}
							else{
								echo '';
							}
						}
						$url23 = 'https://andro.sitri.online/api/calegmandiri/caleg/'.$dt['Id_Caleg'];
						$task_mandiri = $this->Main_model->getAPI($url23);
						$jumlah_task_mandiri = 0;
						foreach ($task_mandiri as $key => $tm) {
							if($tm['Id_Wilayah']==$id){
								$total_ini = $tm['Jumlah_M'] + $tm['Jumlah_CM'] + $tm['Jumlah_O'] + $tm['Jumlah_T'] + $tm['Jumlah_BJ'];
								$jumlah_task_mandiri += $total_ini;
							}
							else{
								echo '';
							}
						}
						$total_task = $jumlah_task + $jumlah_task_mandiri;
						//echo $total_task;
						if($total_task==0){
							echo '0';
						}
						else{
							//$persentase = 80/100*$total_task;
							//echo $persentase.'';
							//echo '0';
							$url33 = 'https://andro.sitri.online/api/coveragecaleg/'.$id.'/'.$dt['Id_Caleg'];
							$coverage = $this->Main_model->getAPI($url33);
							echo $coverage['jumlah'];
							if($coverage['jumlah']==0){
								echo ' (0 %)';
							}
							else{
							$persentase = $coverage['jumlah'] / $pembagi * 100; echo ' ('.number_format($persentase,2).' %)';}
						}
						?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="<?=site_url('Laporan/detail_caleg/'.$dt['Id_Caleg']);?>">
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
					<?php } ?>
				</tbody>
			</table>