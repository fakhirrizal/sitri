                                            <div class="tab-pane active" id="tab_1_3">
                                                <!-- <div class="note note-success">
                                                    <p> Simple Line Icons. 162 Beautifully Crafted Webfont Icons.
                                                        <br> For more info check out
                                                        <a href="http://graphicburger.com/simple-line-icons-webfont/" Target Suara="_blank">http://graphicburger.com/simple-line-icons-webfont/</a>
                                                    </p>
                                                </div> -->
                                                <!-- <div class="simplelineicons-demo">
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-user"></span> &nbsp;icon-user </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-user-female"></span> &nbsp;icon-user-female </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-star"></span> &nbsp;icon-star </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-symbol-female"></span> &nbsp;icon-symbol-female </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-symbol-male"></span> &nbsp;icon-symbol-male </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-Target Suara"></span> &nbsp;icon-Target Suara </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-volume-1"></span> &nbsp;icon-volume-1 </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-volume-2"></span> &nbsp;icon-volume-2 </span>
                                                    </span>
                                                    <span class="item-box">
                                                        <span class="item">
                                                            <span aria-hidden="true" class="icon-volume-off"></span> &nbsp;icon-volume-off </span>
                                                    </span>
                                                </div> -->
												<?php
												//print_r($data_ajax);
												?>
                                            </div>
											<?php
											// if($data_task["Message"]=='Task not found'){
											// 	echo '<div style="text-align: center;">
											// 			<p id="dynamic_pager_content2" class="well"> BELUM ADA DATA YANG TERSEDIA </p>
											// 		</div>';
											// }
											// else{
											// echo 'ada';
											// }
											//foreach ($data_kec as $key => $value) {
											echo '<div style="text-align: center;">
											<p id="dynamic_pager_content2" class="well">'.$data_kec['Nama_Kecamatan'].'</p>
											</div>';
											$url41 = 'https://andro.sitri.online/api/coverageall/wilayah/'.$id_kec;
											$coverage = $this->Main_model->getAPI($url41);
											$url42 = 'https://andro.sitri.online/api/calegtask/countisuwilayah/'.$id_kec;
											$dataj = $this->Main_model->getAPI($url42);
											$jumlah_isu = 0;
											$isu = '';
											foreach ($dataj as $d) {
												if ($d['Jumlah'] >= $jumlah_isu) {
												$jumlah_isu = $d['Jumlah'];
												$isu = $d['Isu'];
												}
												else{
													echo '';
												}
											}
											$url43 = 'https://andro.sitri.online/api/counttokoh/wilayah/'.$id_kec;
											$datatokoh = $this->Main_model->getAPI($url43);
											$jumlah_tokoh = 0;
											$tokoh = '';
											foreach ($datatokoh as $d) {
												if ($d['Jumlah'] >= $jumlah_tokoh) {
												$jumlah_tokoh = $d['Jumlah'];
												$tokoh = $d['Tokoh_Dikunjungi'];
												}
												else{
													echo '';
												}
											}
											$url44 = 'https://andro.sitri.online/api/calegtask/countsegmenwilayah/'.$id_kec;
											$datasegmen = $this->Main_model->getAPI($url44);
											$jumlah_segmen = 0;
											$segmen = '';
											foreach ($datasegmen as $d) {
												if ($d['Jumlah'] >= $jumlah_segmen) {
												$jumlah_segmen = $d['Jumlah'];
												$segmen = $d['Segmentasi'];
												}
												else{
													echo '';
												}
											}
											if($jumlah_segmen==0){
												$segmen = '-';
											}
											else{
												echo '';
											}
											if($jumlah_isu==0){
												$isu = '-';
											}
											else{
												echo '';
											}
											// echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="30%">Segmentasi Terbesar</td>
											// 	<td style="text-align: center;" width="30%">Isu Terbanyak</td>
											// 	<td style="text-align: center;" width="20%">Tokoh yg Dikunjungi</td>
											// 	<td style="text-align: center;" width="20%">Coverage RW</td>
											// </tr>
											// <tr>
											// <td>'.$segmen.' ('.$jumlah_segmen.')
											// </td>
											// <td style="text-align: center;">'.$isu.' ('.$jumlah_isu.')
											// </td>
											// <td style="text-align: center;">'.$jumlah_tokoh.'</td>
											// <td style="text-align: center;">'.$coverage['jumlah'].'</td>
											// </tr></table>';
											//}
											// if($id_kec=='3172040'){
											// 	//makasar
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td width="35%">Prabowo-Hatta</td>
											// 		<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 		<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 		<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>56.027	(52,59%)	</td>
											// 	<td style="text-align: center;">50.506	(47,41%)</td>
											// 	<td style="text-align: center;">1.035</td>
											// 	<td style="text-align: center;">1,80%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>46,224</td>
											// 	<td style="text-align: center;">63,886</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>137,942</td>
											// 	<td style="text-align: center;">68,020</td>
											// 	<td style="text-align: center;">33,997</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172070'){
											// 	//duren sawit
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>116.609	(52,57%)</td>
											// 	<td style="text-align: center;">105.192	(47,43%)</td>
											// 	<td style="text-align: center;">2.252</td>
											// 	<td style="text-align: center;">1,30%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>88,532</td>
											// 	<td style="text-align: center;">142,537</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>286,954</td>
											// 	<td style="text-align: center;">141,542
											// 	</td>
											// 	<td style="text-align: center;">70,779</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172060'){
											// 	//jatinegara
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>91.058	(52,44%)</td>
											// 	<td style="text-align: center;">82.598	(47,56%)</td>
											// 	<td style="text-align: center;">1.787</td>
											// 	<td style="text-align: center;">0,27%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>63,777</td>
											// 	<td style="text-align: center;">112,141</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>219,444
											// 	</td>
											// 	<td style="text-align: center;">108,264
											// 	</td>
											// 	<td style="text-align: center;">54,115</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172030'){
											// 	//cipayung
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>72.291	(56,30%)</td>
											// 	<td style="text-align: center;">56.101	(43,70%)</td>
											// 	<td style="text-align: center;">1.314</td>
											// 	<td style="text-align: center;">1,11%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>52,698</td>
											// 	<td style="text-align: center;">85,203</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>177,061
											// 	</td>
											// 	<td style="text-align: center;">87,351
											// 	</td>
											// 	<td style="text-align: center;">43,683</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172010'){
											// 	//pasar rebo
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>61.183	(57,42%)</td>
											// 	<td style="text-align: center;">45.374	(42,58%)</td>
											// 	<td style="text-align: center;">1.005</td>
											// 	<td style="text-align: center;">1,00%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>43,531</td>
											// 	<td style="text-align: center;">68,192</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>137,942
											// 	</td>
											// 	<td style="text-align: center;">68,020
											// 	</td>
											// 	<td style="text-align: center;">33,997</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172020'){
											// 	//ciracas
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>78.423	(53,23%)</td>
											// 	<td style="text-align: center;">68.895	(46,77%)</td>
											// 	<td style="text-align: center;">1.660</td>
											// 	<td style="text-align: center;">1,14%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>63,955</td>
											// 	<td style="text-align: center;">91,013</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>198,788
											// 	</td>
											// 	<td style="text-align: center;">98,085
											// 	</td>
											// 	<td style="text-align: center;">49,034</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172050'){
											// 	//kramat jati
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>83.631	(56,27%)</td>
											// 	<td style="text-align: center;">65.001	(43,73%)</td>
											// 	<td style="text-align: center;">1.437</td>
											// 	<td style="text-align: center;">1,59%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>55,584</td>
											// 	<td style="text-align: center;">101,917</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>199,994
											// 	</td>
											// 	<td style="text-align: center;">98,647
											// 	</td>
											// 	<td style="text-align: center;">49,293</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172100'){
											// 	//matraman
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>51.239	(52,84%)</td>
											// 	<td style="text-align: center;">45.727	(47,16%)</td>
											// 	<td style="text-align: center;">1.142</td>
											// 	<td style="text-align: center;">0,00%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>37,644</td>
											// 	<td style="text-align: center;">62,366</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>131,119
											// 	</td>
											// 	<td style="text-align: center;">64,679
											// 	</td>
											// 	<td style="text-align: center;">32,338</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172090'){
											// 	//pulo gadung
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>73.849	(47,51%)</td>
											// 	<td style="text-align: center;">81.602	(52,49%)</td>
											// 	<td style="text-align: center;">1.633</td>
											// 	<td style="text-align: center;">0,96%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>612,093</td>
											// 	<td style="text-align: center;">993,173</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>203,340
											// 	</td>
											// 	<td style="text-align: center;">100,326
											// 	</td>
											// 	<td style="text-align: center;">50,153</td>
											// 	</tr></table>';
											// }
											// elseif($id_kec=='3172080'){
											// 	//cakung
											// 	echo '<h5>Pilpres 2014</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 	<td width="35%">Prabowo-Hatta</td>
											// 	<td style="text-align: center;" width="35%">Jokowi-JK</td>
											// 	<td style="text-align: center;" width="15%">Tidak Sah</td>
											// 	<td style="text-align: center;" width="15%">TPS Error</td>
											// 	</tr>
											// 	<tr>
											// 	<td>139.302	(55,54%)</td>
											// 	<td style="text-align: center;">111.500	(44,46%)</td>
											// 	<td style="text-align: center;">2.037</td>
											// 	<td style="text-align: center;">1,49%</td>
											// 	</tr></table>';
											// 	echo '<h5>Pemilu DKI Jakarta 2017 Putaran II</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Ahot-Djarot</td>
											// 		<td style="text-align: center;">Anies-Sandi</td>
											// 		<td style="text-align: center;">Tidak Sah</td>
											// 	</tr>
											// 	<tr>
											// 	<td>93,563</td>
											// 	<td style="text-align: center;">172,357</td>
											// 	<td style="text-align: center;">'.$data_kec['Tidak_Sah'].'</td>
											// 	</tr></table>';
											// 	echo '<h5>Target Suara</h5>';
											// 	echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
											// 		<td>Pemilih</td>
											// 		<td style="text-align: center;">Kinerja 62%</td>
											// 		<td style="text-align: center;">Suara 30%</td>
											// 	</tr>
											// 	<tr>
											// 	<td>339,038
											// 	</td>
											// 	<td style="text-align: center;">167,269
											// 	</td>
											// 	<td style="text-align: center;">83,657</td>
											// 	</tr></table>';
											// }
											// else{
											// 	echo '';
											// }
											//print_r($data_kec);
											$where['id_kecamatan'] = $id_kec;
											$datakec = $this->Main_model->getSelectedData('kecamatan',$where);
											$target_suara = '';
											$dpt = '';
											foreach ($datakec as $key => $value) {
												$kml = $value->kml;
												$wilayah = $value->nm_kecamatan;
												$target_suara = $value->target_suara;
												$dpt = $value->dpt;
											}
											$url3 = 'https://andro.sitri.online/api/calegtask/wilayah/'.$id_kec;
											$data_task = $this->Main_model->getAPI($url3);
											$jumlah_suara1 = 0;
											$jumlah_suara2 = 0;
											$jumlah_suara_0 = 0;
											$jumlah_suara_1 = 0;
											$jumlah_suara_2 = 0;
											$jumlah_suara_3 = 0;
											$jumlah_suara_4 = 0;
											$suara_total = 0;
											$target1 = 0;
											$target2 = 0;
											foreach ($data_task as $key => $dt) {
													$jumlah_suara1 += $dt['Jumlah_M'];
													$suara_total_ini = $dt['Jumlah_M']+$dt['Jumlah_CM']+$dt['Jumlah_O']+$dt['Jumlah_T']+$dt['Jumlah_BJ'];
													$suara_total += $suara_total_ini;
											}
											$url23 = 'https://andro.sitri.online/api/calegmandiri/wilayah/'.$id_kec;
											$task_mandiri = $this->Main_model->getAPI($url23);
											foreach ($task_mandiri as $key => $tm) {
													$jumlah_suara1 += $tm['Jumlah_M'];
													$suara_total_ini = $tm['Jumlah_M']+$tm['Jumlah_CM']+$tm['Jumlah_O']+$tm['Jumlah_T']+$tm['Jumlah_BJ'];
													$suara_total += $suara_total_ini;
											}
											$url24 = 'https://andro.sitri.online/api/strmandiri/wilayah/'.$id_kec;
											$task_mandiri_str = $this->Main_model->getAPI($url24);
											foreach ($task_mandiri_str as $key => $tms) {
													$jumlah_suara1 += $tms['Jumlah_M'];
													$suara_total_ini = $tms['Jumlah_M']+$tms['Jumlah_CM']+$tms['Jumlah_O']+$tms['Jumlah_T']+$tms['Jumlah_BJ'];
													$suara_total += $suara_total_ini;
											}
											$url25 = 'https://andro.sitri.online/api/strtask/wilayah/'.$id_kec;
											$task_str = $this->Main_model->getAPI($url25);
											foreach ($task_str as $key => $ts) {
													$jumlah_suara1 += $ts['Jumlah_M'];
													$suara_total_ini = $ts['Jumlah_M']+$ts['Jumlah_CM']+$ts['Jumlah_O']+$ts['Jumlah_T']+$ts['Jumlah_BJ'];
													$suara_total += $suara_total_ini;
											}
											$url26 = 'https://andro.sitri.online/api/rw/all/asc';
											$rw = $this->Main_model->getAPI($url26);
											$jumlah_rw = 0;
											foreach ($rw as $key => $value) {
												if($value['Id_Kecamatan']==$id_kec){
													$jumlah_rw++;
												}
												else{
													echo '';
												}
											}
											$persentase_coverage_rw = 0;
											if($coverage['jumlah']=='0'){
												$persentase_coverage_rw = 0;
											}
											else{
												$persentase_coverage_rw = $coverage['jumlah']/$jumlah_rw*100;
											}
											$persentase_target_suara = 0;
											if($jumlah_suara1=='0'){
												$persentase_target_suara = 0;
											}
											else{
												$persentase_target_suara = $jumlah_suara1/$dpt*100;
											}
											$persentase_target_kinerja = 0;
											if($suara_total=='0'){
												$persentase_target_kinerja = 0;
											}
											else{
												$persentase_target_kinerja = $suara_total/$dpt*100;
											}
											?>
											<table class="table table-striped table-bordered table-hover">
												<tr style="text-align: center;"><td>
													<strong>Coverage RW</strong></td><td><?= $coverage['jumlah'].' ('.number_format($persentase_coverage_rw,2).' %)'; ?></td></tr>
												<tr style="text-align: center;"><td>
													<strong>Pencapaian Target Suara</strong></td><td><?= number_format($jumlah_suara1).' ('.number_format($persentase_target_suara,2).' %)'; ?></td></tr>
												<tr style="text-align: center;"><td>
													<strong>Target Kinerja</strong></td><td><?= number_format($suara_total).' ('.number_format($persentase_target_kinerja,2).' %)'; ?></td></tr>
												<tr style="text-align: center;"><td>
													<strong>Top Segmen</strong></td><td><?php echo $segmen.' ('.$jumlah_segmen.')'; ?></td></tr>
												<tr style="text-align: center;"><td>
													<strong>Top Isu</strong></td><td><?php echo $isu.' ('.$jumlah_isu.')'; ?></td></tr>
											</table>
											<br>
											<div style="text-align: center;">
											<button class="btn btn-xs green" type="button" onclick="window.location.href='<?=base_url('index.php/Beranda/peta_kec/'.$id_kec);?>'"> Detail Data
                                            </button>
											</div>