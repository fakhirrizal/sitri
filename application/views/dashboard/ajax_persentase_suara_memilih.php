


			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
						<th style="text-align: center;"> Nomor RW </th>
						<th style="text-align: center;"> Target Suara </th>
						<th style="text-align: center;"> Jumlah Suara Memilih </th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($rw as $key => $row) {
						$dpt = '';
				?>
					<tr class="odd gradeX">
						<td style="text-align: center;"><?= 'RW '.$row['Nomor_Rw'] ?></td>
						<td style="text-align: center;">
							<?php
							$where['id_rw'] = $row['Id_Rw'];
							$data_suara = $this->Main_model->getSelectedData('dpt_rw',$where);
							foreach ($data_suara as $key => $value) {
								echo $value->target_suara.' Suara';
								$dpt = $value->dpt;
							}
							?>
						</td>
						<td style="text-align: center;"><?php
						$ur21111 = 'https://andro.sitri.online/api/kegiatan/memilih/'.$row['Id_Rw'];
						$jumlah_keg = $this->Main_model->getAPI($ur21111);
						$cek_nama = array('Message'=>'Jumlah not found');
						if($jumlah_keg==$cek_nama){
							echo '0 Suara (0 %)';
						}else{
						$persen = $jumlah_keg['Jumlah']/$dpt*100;
						echo $jumlah_keg['Jumlah'].' Suara ('.number_format($persen,2).' %)';}
						?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
