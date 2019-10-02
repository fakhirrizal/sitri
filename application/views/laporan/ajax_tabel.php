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
						<td><?= $dt['Nama']; ?></td>
						<td style="text-align: center;"><?= $dt['Jumlah_Task'].'/ '.$dt['Jumlah_TaskDone']; ?></td>
						<td style="text-align: center;"><?php
						$total_task = $dt['Jumlah_TaskMandiri'];
						echo $total_task.' Kegiatan'; ?></td>
						<td style="text-align: center;"><?= number_format($dt['Target_Suara']); ?> Orang</td>
						<td style="text-align: center;"><?php
						$total_pemilih = $dt['Jumlah_Memilih'] + $dt['Jumlah_MemilihMandiri'];
						echo number_format($total_pemilih).' Orang'; ?></td>
						<td style="text-align: center;"><?php echo $dt['Jumlah_CoverageRW'];
						if($dt['Jumlah_CoverageRW']==0){
							echo ' (0 %)';
						}
						else{
						$persentase = $dt['Jumlah_CoverageRW'] / $pembagi * 100; echo ' ('.number_format($persentase,2).' %)';}
						?> </td>
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