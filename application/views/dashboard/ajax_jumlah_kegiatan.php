
			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
						<th style="text-align: center;"> Nomor RW </th>
						<th style="text-align: center;"> Jumlah Kegiatan </th>
						
					</tr>
				</thead>
				<tbody>
				<?php
	foreach ($rw as $key => $row) {
?>
					<tr class="odd gradeX">
						<td style="text-align: center;"><?= 'RW '.$row['Nomor_Rw'] ?></td>
						<td style="text-align: center;"><?php
						$ur21111 = 'https://andro.sitri.online/api/kegiatan/rw/'.$row['Id_Rw'];
						$jumlah_keg = $this->Main_model->getAPI($ur21111);
						$cek_nama = array('Message'=>'Jumlah not found');
						if($jumlah_keg==$cek_nama){
							echo '0 Kegiatan';
						}else{
						echo $jumlah_keg['Jumlah'].' Kegiatan';}
						?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
