                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" border='1' id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;" width="4%"> # </th>
                                                        <th style="text-align: center;"> Nama CAD </th>
														<th style="text-align: center;"> Instruksi </th>
                                                        <th style="text-align: center;"> Jumlah Kegiatan </th>
														<th style="text-align: center;"> Target Pemilih </th>
														<th style="text-align: center;"> Jumlah Pemilih </th>
														<th style="text-align: center;"> Coverage </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
													$nomor = 1;
                                                	foreach ($data_caleg as $key => $value) {
													?>
													<tr class="odd gradeX">
                                                        <td style="text-align: center;"><?= $nomor++.'.'; ?></td>
														<td><?= $value['Nama']; ?></td>
														<?php
														$total_caleg_task = '';
														$task1 = 0;
														$task2 = 0;
														$task_done = 0;
														foreach ($caleg_task as $key => $ct) {
															if($ct['Id_Caleg']==$value['Id_Caleg']){
																$task1++;
																if($ct['IsDone']=='1'){
																	$task_done++;
																}
																else{
																	echo'';
																}
															}
														}
														foreach ($task_mandiri as $key => $tm) {
															if($tm['Id_Caleg']==$value['Id_Caleg']){
																$task2++;
															}
														}
														$total_caleg_task = $task1+$task2;
														?>
														<td style="text-align: center;"><?= $task_done.'/ '.$task1.' Kegiatan'; ?></td>
                                                        <td style="text-align: center;"><?= $task2; ?> Kegiatan</td>
														<td style="text-align: center;"><?= number_format($value['Target_Suara']); ?></td>
														<?php
														$total_cakupan = '';
														$cakupan1 = '';
														$cakupan2 = '';
														$pemilih = 0;
														$pemilihmandiri = 0;
														foreach ($caleg_task as $key => $ct) {
															if($ct['Id_Caleg']==$value['Id_Caleg']){
																$total_ini = $ct['Jumlah_M'] + $ct['Jumlah_CM'] + $ct['Jumlah_O'] + $ct['Jumlah_T'] + $ct['Jumlah_BJ'];
																$cakupan1 += $total_ini;
																$pemilih += $ct['Jumlah_M'];
															}
														}
														foreach ($task_mandiri as $key => $tm) {
															if($tm['Id_Caleg']==$value['Id_Caleg']){
																$total_ini = $tm['Jumlah_M'] + $tm['Jumlah_CM'] + $tm['Jumlah_O'] + $tm['Jumlah_T'] + $tm['Jumlah_BJ'];
																$cakupan2 += $total_ini;
																$pemilihmandiri += $tm['Jumlah_M'];
															}
														}
														$total_cakupan = $cakupan1+$cakupan2;
														?>
														<!-- <td style="text-align: center;"><?= $total_cakupan; ?> Orang</td> -->
														<td style="text-align: center;"><?= $pemilih+$pemilihmandiri; ?> Orang</td>
														<td style="text-align: center;"><?php
														$urlcoverage = 'https://andro.sitri.online/api/coveragecaleg/caleg/'.$value['Id_Caleg'];
														$datacoverage = $this->Main_model->getAPI($urlcoverage);
														$rwrw = 'https://andro.sitri.online/api/rw/all/asc';
														$datarw = $this->Main_model->getAPI($rwrw);
														$jumlahrw = 0;
														foreach ($datarw as $key => $drw) {
															if($drw['Id_Kabupaten']=='3172'){
																$jumlahrw++;
															}
															else{echo'';}
														}
														echo $datacoverage['jumlah'];
														if($datacoverage['jumlah']==0){
															echo ' (0 %)';
														}
														else{
														$persentase = $datacoverage['jumlah'] / $jumlahrw * 100; echo ' ('.number_format($persentase,2).' %)';} ?></td>
                                                        
                                                    </tr>
                                                	<!-- <tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td>Mukhammad Fakhir Rizal</td>
                                                        <td style="text-align: center;">12 Kegiatan</td>
                                                        <td style="text-align: center;">1,200 Orang</td>
														<td style="text-align: center;">890 Orang</td>
														<td style="text-align: center;">90 %</td>
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
                                                        <td>Sharfina Aulia Puspasari</td>
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
                                                        <td>Elad Oktarizo</td>
                                                        <td style="text-align: center;">3 Kegiatan</td>
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
                                                    </tr> -->
                                                	<?php
                                                	}
                                                	?>
                                                </tbody>
											</table>
<?php

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-Rekap.xls");

// Tambahkan table
// include "../pilihan_menu/tamu.php";

?>