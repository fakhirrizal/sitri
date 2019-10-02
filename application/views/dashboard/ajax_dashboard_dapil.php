									<?php
									// if($jenis=='dapil'){
									// 	echo 'dapil';
									// }
									// elseif($jenis=='kecamatan'){
									// 	echo 'kecamatan';
									// }
									// else{
									// 	echo '';
									// }
									//echo $nilai;
									$target_suara = 0;
									$jumlah_task = 0;
									$jumlah_task_mandiri = 0;
									$jumlah_pemilih = 0;
									$jumlah_pemilih_mandiri = 0;
									$jumlah_kinerja = 0;
									$jumlah_kinerja_mandiri = 0;
									//$coverage = 0;
									foreach ($data_task as $key => $value) {
										$target_suara += $value['Target_Suara'];
										$jumlah_task += $value['Jumlah_Task'];
										$jumlah_task_mandiri += $value['Jumlah_TaskMandiri'];
										$jumlah_pemilih += $value['Jumlah_Memilih'];
										$jumlah_pemilih_mandiri += $value['Jumlah_MemilihMandiri'];
										$jumlah_kinerja += $value['Jumlah_Kinerja'];
										$jumlah_kinerja_mandiri += $value['Jumlah_KinerjaMandiri'];
										//$coverage += $value['Jumlah_CoverageRW'];
									}
									?>
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<?php
												$url1 = 'https://andro.sitri.online/api/calegtask/countsegmendapil/'.$nilai;
												$datasegmen = $this->Main_model->getAPI($url1);
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
												?>
												<div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="7800"><?= $jumlah_segmen; ?></span>
															<small class="font-green-sharp">Segmentasi</small>
														</h3>
														<small><?= $segmen; ?></small>
													</div>
													<div class="icon">
														<i class="icon-layers"></i>
													</div>
												</div>
												<div class="progress-info">
													<!-- <div class="progress">
														<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
															<span class="sr-only">76% progress</span>
														</span>
													</div>
													<div class="status">
														<div class="status-title"> 23/ 98 Segmentasi </div>
														<div class="status-number"> 76% </div>
													</div> -->
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<?php
													$url2 = 'https://andro.sitri.online/api/calegtask/countisudapil/'.$nilai;
													$dataj = $this->Main_model->getAPI($url2);
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
													?>
												<div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="1349"><?= $jumlah_isu; ?> Isu</span>
														</h3>
														<small><?= $isu; ?></small>
													</div>
													<div class="icon">
														<i class="icon-feed"></i>
													</div>
												</div>
												<div class="progress-info">
													<div class="progress">
														<span style="width: 85%;" class="progress-bar progress-bar-success green-sharp">
															<span class="sr-only">85% change</span>
														</span>
													</div>
													<div class="status">
														<div class="status-title"> 30/ 54 Isu </div>
														<div class="status-number"> 85% </div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="567"><?php echo $jumlah_task+$jumlah_task_mandiri; ?></span>
														</h3>
														<small>Kegiatan</small>
													</div>
													<div class="icon">
														<i class="icon-shuffle"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<div class="display">
													<?php
													$url13 = 'https://andro.sitri.online/api/counttokoh/dapil/'.$nilai;
													$datatokoh = $this->Main_model->getAPI($url13);
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
													?>
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="567"><?= count($datatokoh); ?></span>
														</h3>
														<small>Tokoh Dikunjungi</small>
													</div>
													<div class="icon">
														<i class="icon-users"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="567">[0] <?= $jumlah_pemilih+$jumlah_pemilih_mandiri.' Suara'; ?></span>
														</h3>
														<!-- <small>Kegiatan</small> -->
													</div>
													<div class="icon">
														<!-- <i class="icon-users"></i> -->
													</div>
												</div>
												<!-- <div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="567">65</span>
														</h3>
														<small>Tokoh Dikunjungi</small>
													</div>
													<div class="icon">
														<i class="icon-users"></i>
													</div>
												</div> -->
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<div class="dashboard-stat2 ">
												<?php
													$url41 = 'https://andro.sitri.online/api/coverageall/dapil/'.$nilai;
													$coverage = $this->Main_model->getAPI($url41);
													// $jumlah_tokoh = 0;
													// $tokoh = '';
													// foreach ($datatokoh as $d) {
													// 	if ($d['Jumlah'] >= $jumlah_tokoh) {
													// 	$jumlah_tokoh = $d['Jumlah'];
													// 	$tokoh = $d['Tokoh_Dikunjungi'];
													// 	}
													// 	else{
													// 		echo '';
													// 	}
													// }
												?>
												<div class="display">
													<div class="number">
														<h3 class="font-green-sharp">
															<span data-counter="counterup" data-value="276"><?= $coverage['jumlah']; ?> </span>
														</h3>
														<small>Coverage RW</small>
													</div>
													<div class="icon">
														<!-- <i class="icon-directions"></i> -->
													</div>
												</div>
												<!-- <div class="progress-info">
													<div class="progress">
														<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
															<span class="sr-only">56% change</span>
														</span>
													</div>
													<div class="status">
														<div class="status-title"> change </div>
														<div class="status-number"> 57% </div>
													</div>
												</div> -->
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										</div>
									</div>