			<ul class="cbp-l-project-details-list">
				<li>
					<strong>Nama</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Nama']; ?></li>
				
				<li>
					<strong>Tingkat</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?= $row['Tingkat'];; ?></li>
				<li>
					<strong>Alamat</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Alamat']; ?></li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/desa/all/desc';
					$data_d = $this->Main_model->getAPI($url4);
					foreach ($data_d as $value1) {
						if($value1['Id_Desa']==$row['Id_Desa']){
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
					$url4 = 'https://andro.sitri.online/api/kec/id/'.$row['Id_Kecamatan'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kecamatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kecamatan'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/kab/id/'.$row['Id_Kabupaten'];
					$data_d = $this->Main_model->getAPI($url4);
					echo '<strong>Kabupaten/ Kota</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Kabupaten'];
					?>
				</li>
				<li>
					<?php
					$url4 = 'https://andro.sitri.online/api/prov/id/'.$row['Id_Provinsi'];
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
						}
					}
					?>
				</li>
				
			</ul>