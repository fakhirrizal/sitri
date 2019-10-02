<?php
	foreach ($usulan as $key => $row) {
		if($row['Id_CalegUsulan']==$id_usulan){
?>
			<ul class="cbp-l-project-details-list">
				<li>
					<strong>Pengusul</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?php
					 $urldatacaleg = 'https://andro.sitri.online/api/calegprofiles/idnf/'.$row['Id_Caleg'];
					 $datacaleg = $this->Main_model->getAPI($urldatacaleg);
					 echo $datacaleg['Nama'];
					 ?></li>
				
				<li>
					<strong>Wilayah</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?php
														$id_w = strlen($row['Id_Wilayah']);
														$token = 'authan:'.$this->session->userdata('token');
                                                        if ($id_w==7) {
                                                                                    //API URL
                                                                                    $apikec = 'https://andro.sitri.online/api/kec/id/'.$row['Id_Wilayah'];
                                                                                    //create a new cURL resource
                                                                                    $ch3 = curl_init($apikec);
                                                                                    
                                                                                    curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
                                                                                    //return response instead of outputting
                                                                                    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
                                                                                    //execute the POST request
                                                                                    $kec = curl_exec($ch3);
                                                                                    //close cURL resource
                                                                                    curl_close($ch3);
                                                                                    $datakec = json_decode($kec, true);
                                                          echo $datakec['Nama_Kecamatan'];
                                                        }
                                                        elseif ($id_w==10) {
                                                                                    //API URL
                                                                                    $apikel = 'https://andro.sitri.online/api/desa/id/'.$row['Id_Wilayah'];
                                                                                    //create a new cURL resource
                                                                                    $ch4 = curl_init($apikel);
                                                                                    
                                                                                    curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
                                                                                    //return response instead of outputting
                                                                                    curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
                                                                                    //execute the POST request
                                                                                    $kel = curl_exec($ch4);
                                                                                    //close cURL resource
                                                                                    curl_close($ch4);
                                                                                    $datakel = json_decode($kel, true);
                                                          echo $datakel['Nama_Desa'];
														}
														elseif ($id_w==12) {
															
															//API URL
															$apirw = 'https://andro.sitri.online/api/rw/id/'.$row['Id_Wilayah'];
															//create a new cURL resource
															$ch5 = curl_init($apirw);
															
															curl_setopt($ch5, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
															//return response instead of outputting
															curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
															//execute the POST request
															$rw = curl_exec($ch5);
															//close cURL resource
															curl_close($ch5);
															$datarw = json_decode($rw, true);
															$cek['Message'] = 'Sequence contains more than one element';
															if($datarw==$cek){
																echo 'RW 0'.substr($row['Id_Wilayah'],-2).' (';
															}else{
															echo 'RW '.$datarw['Nomor_Rw'].' (';}
															//API URL
															$apikel = 'https://andro.sitri.online/api/desa/id/'.substr($row['Id_Wilayah'],0,10);
															//create a new cURL resource
															$ch4 = curl_init($apikel);
															
															curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$token));
															//return response instead of outputting
															curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
															//execute the POST request
															$kel = curl_exec($ch4);
															//close cURL resource
															curl_close($ch4);
															$datakel = json_decode($kel, true);
								  							echo $datakel['Nama_Desa'].')';
														}
                                                        else{
                                                          echo 'Masukan Anda tidak valid';
                                                        }
                                                        //echo $id_w;
                                                        ?></li>
				<li>
					<?php
					if($row['Id_Dapil']==''){
						echo '<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp;';
					}
					else{
						$url4 = 'https://andro.sitri.online/api/dapil/id/'.$row['Id_Dapil'];
						$data_d = $this->Main_model->getAPI($url4);
						$cek = array("Message" => "Dapil not found");
						if($data_d==$cek){
							echo '<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp;';
						}
						else{
							echo '<strong>Dapil</strong>&nbsp; &nbsp; &nbsp; &nbsp;'.$data_d['Nama_Dapil'];
							if(substr($row['Id_Dapil'],0,1)=='B'){
								echo ' (DPRD Provinsi)';
							}
							else{
								echo ' (DPR-RI)';
							}
						}
					}
					?>
				</li>
				<li>
					<strong>Nama Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Nama_Kegiatan']; ?></li>
				<li>
					<strong>Jenis Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Jenis_Kegiatan']; ?></li>
				<li>
					<strong>Deskripsi Kegiatan</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Deskripsi_Kegiatan']; ?></li>
				<li>
					<strong>Waktu</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?php
																				$tanggal = explode('T', $row['Waktu']);
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
																				}?></li>
				<li>
					<strong>Segmentasi</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Segmentasi']; ?></li>
				<li>
					<strong>Isu Strategis</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Isu_Strategis']; ?></li>
				<li>
					<strong>Tokoh yg Dikunjungi</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Tokoh_Dikunjungi']; ?></li>
				<li>
					<strong>Lembaga yg Dikunjungi</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Lembaga_Dikunjungi']; ?></li>
				<li>
					<strong>Target Peserta</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  number_format($row['Target_Peserta']); ?></li>
				<li>
					<strong>Status</strong>&nbsp; &nbsp; &nbsp; &nbsp;<?=  $row['Status']; ?></li>
			</ul>
<?php }else{echo'';}} ?>