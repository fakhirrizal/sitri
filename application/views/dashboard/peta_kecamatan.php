						<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Peta Pemenangan</span>
                            </li>
                        </ul>
                        <?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
                                                                     
                            <style>
                                /* Always set the map height explicitly to define the size of the div
                                * element that contains the map. */
                                #map {
                                height: 600px;
                                }
                                
                                /* Optional: Makes the sample page fill the window. */
                            
                            </style>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnjlDXASsyIUKAd1QANakIHIM8jjWWyNU" type="text/javascript"></script>
                            <script>
                            var map;
                            var marker;
                        
                            function initMap() {
                                // Variabel untuk menyimpan informasi (desc)
                                var infoWindow = new google.maps.InfoWindow;
                                
                                //  Variabel untuk menyimpan peta Roadmap
                                var mapOptions = {
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                } 

                                map = new google.maps.Map(document.getElementById('map'), {
                                //center: {lat: -6.2607882, lng: 106.7649296},
                                //zoom: 10  
                                });
                                // Variabel untuk menyimpan batas kordinat
                                var bounds = new google.maps.LatLngBounds();

                                // Pengambilan data dari database
                                <?php
                                
                                    foreach ($data_marker as $key => $value) {
                                        $nama = $value->nm_desa;
                                        $lat = $value->lintang;
                                        $lon = $value->bujur;
                                        $id = $value->id_desa;
                                       // $url = site_url('Dashboard/peta_kec');
                                        //echo ("addMarker($lat, $lon, '<b>$nama</b><br><a href=$url/$id>Klik disini untuk data detail</a>');\n"); 
                                        echo ("addMarker($lat, $lon, $id);\n");
                                    }
                                ?>
                                
                                // Proses membuat marker 
                                function addMarker(lat, lng, info) {
                                    var lokasi = new google.maps.LatLng(lat, lng);
                                    bounds.extend(lokasi);
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: lokasi
                                    });       
                                    map.fitBounds(bounds);
                                    bindInfoWindow(marker, map, infoWindow, info);
                                }

                                function bindInfoWindow(marker, map, infoWindow, id) {
                                    google.maps.event.addListener(marker, 'click', function() {
                                        $.post('<?php echo site_url()."/Beranda/ajax_peta2"; ?>',{id:id},
                                        function(html){
                                        infoWindow.setContent(html);
                                        infoWindow.open(map,marker);
                                        });
                                    });
                                }
                                // Menampilkan informasi pada masing-masing marker yang diklik
                                // function bindInfoWindow(marker, map, infoWindow, html) {
                                // google.maps.event.addListener(marker, 'click', function() {
                                //     infoWindow.setContent(html);
                                //     infoWindow.open(map, marker);
                                // });
                                // }
                                var situs = 'https://kppnpan.id/assets/peta_kec/';
                                var nama_file = '<?php echo $kml ?>';
								var situs_full = situs.concat(nama_file);
                                var kmldashboard = new google.maps.KmlLayer({
                                url: situs_full,
								map: map
                                });
                            }
                            google.maps.event.addDomListener(window, 'load', initMap);
                            </script>
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
                                        <div class="portlet-body">
                                        <div id="map" class="c-content-contact-1-gmap"></div>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                    <div>
									</div>
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-user-following font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Data Pemilih Tetap 2019</span>
														<span class="caption-helper">Update tanggal <?php
														$waktu = explode('-', date('Y-m-d'));
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
														?></span>
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body" style="display: none;">
													<div style="text-align: center;">
														<p id="dynamic_pager_content2" class="well"> BELUM ADA DATA YANG TERSEDIA </p>
											 		</div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-layers font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Segmentasi Masyarakat</span>
                                                        <span class="caption-helper">Berdasarkan golongan usia</span>
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body" style="display: none;">
												<p>1. Majelis taklim</p>
												<p>2. PKK</p>
												<p>3. Posyandu</p>
												<p>4. Jumantik</p>
												<p>5. Dasawisma</p>
												<p>6. Kyai,  Habaib,  DKM</p>
												<p>7. Ustadzah</p>
												<p>8. Karang Taruna / Pemuda Lingkungan</p>
												<p>9. FBR</p>
												<p>10. FORKABI</p>
												<p>11. FPI</p>
												<p>12. Mantan pejabat/pimpinan partai/legislatif</p> 
												<p>13. RT RW</p>
												<p>14. FKMS / Pokdan / Mitra Koramil / FKDM</p>
												<p>15. Paguyuban Kesukuan</p>
												<p>16. Komunitas sepeda</p>
												<p>17. Komunitas buruh</p>
												<p>18. Komunitas Jakmania</p>
												<p>19. Pelajar/Mahasiswa</p>
												<p>20. Pendidikan (yayasan,  sekolah,  guru,  dosen)</p>
												<p>21. Komunitas Olahraga (bola,  futsal,  panahan,  dll)</p>
												<p>22. Komunitas senam (lansia,  aerobik,  dll) </p>
												<p>23. Kesehatan (RS,  Puskesmas,  dokter,  bidan,  perawat)</p> 
												<p>24. Profesional (akuntan,  arsitek,  konsultan,  psikolog,  dll) </p>
												<p>25. Hukum (pengacara,  notaris,  hakim,  jaksa,  pembuat akta tanah,  dll)</p> 
												<p>26. Pengusaha (properti,  angkutan,  travel,  dll) </p>
												<p>27. Pedagang Pasar</p>
												<p>28. Pedagang kaki lima / umkm</p>
												<p>29. Ojek online</p>
												<p>30. Bank,  BPR,  Koperasi</p>
												<p>31. Pengangguran</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-volume-up font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Isu Strategis</span>
                                                        <span class="caption-helper">Sumber : Lembaga Survei Indonesia</span>
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body" style="display: none;">
												<p>1. Sumber daya manusia-pendidikan dasar</p>
												<p>2. Tenaga kerja, pengangguran</p>
												<p>3. Lingkungan hidup,air, sungai, sampah</p>
												<p>4. Ukm, usaha rumahan</p>
												<p>5. Pangan/perumahan</p>
												<p>6. Layanan kesehatan dasar</p>
												<p>7. Pelayanan publik, pembangunan infrastruktur</p> 
												<p>8. Seni budaya dan olahraga</p>
												<p>9. Keagamaan, masjid, pesantren</p>
												<p>10. Kepemudaan, pelajar, mahasiswa</p> 
												<p>11. Tokoh wanita, keluarga</p>
												<p>12. Pertanian, peternakan, perikanan</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
									<div class="row">
										<div class="col-md-12">
											<div class="portlet light bordered">
											<div class="tabbable-line">
												<ul class="nav nav-tabs ">
													<li class="active">
														<a href="#tab_15_1" data-toggle="tab"> DPT 2019 </a>
													</li>
													<li>
														<a href="#tab_15_2" data-toggle="tab"> Hasil C1 2014 </a>
													</li>
													<li>
														<a href="#tab_15_3" data-toggle="tab"> Segmentasi Masyarakat </a>
													</li>
													<li>
														<a href="#tab_15_4" data-toggle="tab"> Sebaran Tokoh </a>
													</li>
													<li>
														<a href="#tab_15_5" data-toggle="tab"> Target Suara </a>
													</li>
													<li>
														<a href="#tab_15_6" data-toggle="tab"> Coverage RW </a>
													</li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="tab_15_1">
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<li class="active">
																		<a href="#tab_6_1" data-toggle="tab"> Cakung </a>
																	</li>
																	<li>
																		<a href="#tab_6_2" data-toggle="tab"> Matraman </a>
																	</li>
																	<li>
																		<a href="#tab_6_3" data-toggle="tab"> Ciracas </a>
																	</li>
																	<li>
																		<a href="#tab_6_4" data-toggle="tab"> Pasar Rebo </a>
																	</li>
																	<li>
																		<a href="#tab_6_5" data-toggle="tab"> Jatinegara </a>
																	</li>
																	<li>
																		<a href="#tab_6_6" data-toggle="tab"> Cipayung </a>
																	</li>
																	<li>
																		<a href="#tab_6_7" data-toggle="tab"> Pulogadung </a>
																	</li>
																	<li>
																		<a href="#tab_6_8" data-toggle="tab"> Makasar </a>
																	</li>
																	<li>
																		<a href="#tab_6_9" data-toggle="tab"> Duren Sawit </a>
																	</li>
																	<li>
																		<a href="#tab_6_10" data-toggle="tab"> Kramatjati </a>
																	</li>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<div class="tab-pane active" id="tab_6_1">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>CAKUNG BARAT</b></td><td>43,706</td></tr>
																			<tr><td><b>CAKUNG TIMUR</b></td><td>44,535</td></tr>
																			<tr><td><b>JATINEGARA</b></td><td>66,601</td></tr>
																			<tr><td><b>PENGGILINGAN</b></td><td>69,859</td></tr>
																			<tr><td><b>PULO GEBANG</b></td><td>71,435</td></tr>
																			<tr><td><b>RAWA TERATE</b></td><td>20,116</td></tr>
																			<tr><td><b>UJUNG MENTENG</b></td><td>22,786</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_2">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>KAYU MANIS</b></td><td>21,679</td></tr>
																			<tr><td><b>KEBON MANGGIS</b></td><td>13,234</td></tr>
																			<tr><td><b>PALMERIAM</b></td><td>16,559</td></tr>
																			<tr><td><b>PISANGAN BARU</b></td><td>27,150</td></tr>
																			<tr><td><b>UTAN KAYU SELATAN</b></td><td>28,287</td></tr>
																			<tr><td><b>UTAN KAYU UTARA</b></td><td>24,210</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_3">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>CIBUBUR</b></td><td>			52,681</td></tr>
																			<tr><td><b>CIRACAS</b></td><td>			49,477</td></tr>
																			<tr><td><b>KELAPA DUA WETAN</b></td><td>			36,830</td></tr>
																			<tr><td><b>RAMBUTAN</b></td><td>			28,862</td></tr>
																			<tr><td><b>SUSUKAN</b></td><td>			30,938
																			</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_4">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>BARU</b></td><td>15,341</td></tr>
																			<tr><td><b>CIJANTUNG</b></td><td>31,715</td></tr>
																			<tr><td><b>GEDONG</b></td><td>27,146</td></tr>
																			<tr><td><b>KALISARI</b></td><td>31,744</td></tr>
																			<tr><td><b>PEKAYON</b></td><td>31,996</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_5">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>BALIMESTER</b></td><td>8,123</td></tr>
																			<tr><td><b>BIDARA CINA</b></td><td>32,029</td></tr>
																			<tr><td><b>CIPINANG BESAR SELATAN</b></td><td>27,622</td></tr>
																			<tr><td><b>CIPINANG BESAR UTARA</b></td><td>38,721</td></tr>
																			<tr><td><b>CIPINANG MUARA</b></td><td>45,284</td></tr>
																			<tr><td><b>KAMPUNG MELAYU</b></td><td>20,999</td></tr>
																			<tr><td><b>RAWA BUNGA</b></td><td>17,766</td></tr>
																			<tr><td><b>CIPINANG CEMPEDAK</b></td><td>28,900</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_6">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>BAMBU APUS</b></td><td>20,843</td></tr>
																			<tr><td><b>CEGER</b></td><td>15,356</td></tr>
																			<tr><td><b>CILANGKAP</b></td><td>20,039</td></tr>
																			<tr><td><b>CIPAYUNG</b></td><td>19,508</td></tr>
																			<tr><td><b>LUBANG BUAYA</b></td><td>50,684</td></tr>
																			<tr><td><b>MUNJUL</b></td><td>17,596</td></tr>
																			<tr><td><b>PONDOK RANGGON</b></td><td>18,222</td></tr>
																			<tr><td><b>SETU</b></td><td>14,813</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_7">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>CIPINANG</b></td><td>32,337</td></tr>
																			<tr><td><b>JATI</b></td><td>27,657</td></tr>
																			<tr><td><b>JATINEGARA KAUM</b></td><td>18,524</td></tr>
																			<tr><td><b>KAYU PUTIH</b></td><td>33,017</td></tr>
																			<tr><td><b>PISANGAN TIMUR</b></td><td>34,099</td></tr>
																			<tr><td><b>PULO GADUNG</b></td><td>26,020</td></tr>
																			<tr><td><b>RAWAMANGUN</b></td><td>31,686</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_8">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>CIPINANG MELAYU</b></td><td>32,890</td></tr>
																			<tr><td><b>HALIM PERDANA KUSUMA</b></td><td>17,723</td></tr>
																			<tr><td><b>KEBON PALA</b></td><td>35,926</td></tr>
																			<tr><td><b>MAKASAR</b></td><td>27,308</td></tr>
																			<tr><td><b>PINANGRANTI</b></td><td>19,739</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_9">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>DUREN SAWIT</b></td><td>50,223</td></tr>
																			<tr><td><b>KLENDER</b></td><td>55,921</td></tr>
																			<tr><td><b>MALAKA JAYA</b></td><td>25,465</td></tr>
																			<tr><td><b>MALAKA SARI</b></td><td>23,884</td></tr>
																			<tr><td><b>PONDOK BAMBU</b></td><td>48,377</td></tr>
																			<tr><td><b>PONDOK KELAPA</b></td><td>55,423</td></tr>
																			<tr><td><b>PONDOK KOPI</b></td><td>27,661</td></tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="tab-pane fade" id="tab_6_10">
																		<table class='table'>
																			<tbody>
																			<tr><td><b>BALEKAMBANG</b></td><td>22,745</td></tr>
																			<tr><td><b>BATU AMPAR</b></td><td>37,490</td></tr>
																			<tr><td><b>CAWANG</b></td><td>26,647</td></tr>
																			<tr><td><b>CILILITAN</b></td><td>32,209</td></tr>
																			<tr><td><b>DUKUH</b></td><td>19,110</td></tr>
																			<tr><td><b>KRAMATJATI</b></td><td>27,374</td></tr>
																			<tr><td><b>TENGAH</b></td><td>34,419</td></tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="tab_15_2">
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<li class="active">
																		<a href="#tab_61_1" data-toggle="tab"> Cakung </a>
																	</li>
																	<li>
																		<a href="#tab_61_2" data-toggle="tab"> Matraman </a>
																	</li>
																	<li>
																		<a href="#tab_61_3" data-toggle="tab"> Ciracas </a>
																	</li>
																	<li>
																		<a href="#tab_61_4" data-toggle="tab"> Pasar Rebo </a>
																	</li>
																	<li>
																		<a href="#tab_61_5" data-toggle="tab"> Jatinegara </a>
																	</li>
																	<li>
																		<a href="#tab_61_6" data-toggle="tab"> Cipayung </a>
																	</li>
																	<li>
																		<a href="#tab_61_7" data-toggle="tab"> Pulogadung </a>
																	</li>
																	<li>
																		<a href="#tab_61_8" data-toggle="tab"> Makasar </a>
																	</li>
																	<li>
																		<a href="#tab_61_9" data-toggle="tab"> Duren Sawit </a>
																	</li>
																	<li>
																		<a href="#tab_61_10" data-toggle="tab"> Kramatjati </a>
																	</li>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<div class="tab-pane active" id="tab_61_1">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">139.302</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">55,54%</td><td align="right" class="da1 da_pb_ct" style="display: none;">140.278</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">55,43%</td><td align="right" class="c1" width="60">111.500</td><td align="right" class="c1jkp c1">44,46%</td><td align="right" class="da1 da_jk_ct" style="display: none;">112.816</td><td align="right" class="da1 da_jk_pt" style="display: none;">44,57%</td><td class="c1" align="right">250.830 <br> <span class="delta">(+28)</span></td><td class="c1" align="right">2.037</td><td align="right" class="c1" title="9 TPS dari 603">1,49%</td><td align="right" class="c1" bgcolor="lightgreen" title="603 TPS dari 603">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="CAKUNG TIMUR"><a href="javascript:set_hie(4,26105)">CAKUNG TIMUR</a></td><td data-sort-index="2" data-sort="20177" align="right" width="60" class="c1">20.177</td><td data-sort-index="2" data-sort="20177" align="right" class="c1" bgcolor="lightgreen">57,75%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26105" style="display: none;">20.177<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26105" style="display: none; background-color: lightgreen;">57,75%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="14762" align="right" class="c1" width="60">14.762</td><td data-sort-index="6" data-sort="14762" align="right" class="c1">42,25%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26105" style="display: none;">14.762<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26105" style="display: none;">42,25%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="34939" align="right">34.939</td><td class="c1" data-sort-index="11" data-sort="250" align="right">250</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 89">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="89 TPS dari 89">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="JATINEGARA"><a href="javascript:set_hie(4,26106)">JATINEGARA</a></td><td data-sort-index="2" data-sort="28026" align="right" width="60" class="c1">28.026</td><td data-sort-index="2" data-sort="28026" align="right" class="c1" bgcolor="lightgreen">56,94%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26106" style="display: none;">27.941<div class="delta delta-c-da complete" style="display: none;">(-85)</div></td><td align="right" class="da1" id="da_pb_p_26106" style="display: none; background-color: lightgreen;">56,99%<div class="delta delta-c-da " style="display: none;">(+0,05%)</div></td><td data-sort-index="6" data-sort="21197" align="right" class="c1" width="60">21.197</td><td data-sort-index="6" data-sort="21197" align="right" class="c1">43,06%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26106" style="display: none;">21.090<div class="delta delta-c-da complete" style="display: none;">(-107)</div></td><td align="right" class="da1" id="da_jk_p_26106" style="display: none;">43,01%<div class="delta delta-c-da " style="display: none;">(-0,05%)</div></td><td class="c1" data-sort-index="10" data-sort="49221" align="right" bgcolor="lightpink">49.221 <br> <span class="delta">(-2) </span></td><td class="c1" data-sort-index="11" data-sort="399" align="right">399</td><td data-sort-index="12" class="c1" data-sort="0.008928571428571428" align="right" bgcolor="lightpink" title="1 TPS dari 112">0,89%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="112 TPS dari 112">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="RAWA TERATE"><a href="javascript:set_hie(4,26107)">RAWA TERATE</a></td><td data-sort-index="2" data-sort="8127" align="right" width="60" class="c1">8.127</td><td data-sort-index="2" data-sort="8127" align="right" class="c1" bgcolor="lightgreen">55,32%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26107" style="display: none;">8.127<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26107" style="display: none; background-color: lightgreen;">55,32%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="6565" align="right" class="c1" width="60">6.565</td><td data-sort-index="6" data-sort="6565" align="right" class="c1">44,68%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26107" style="display: none;">6.565<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26107" style="display: none;">44,68%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="14692" align="right">14.692</td><td class="c1" data-sort-index="11" data-sort="164" align="right">164</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 38">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="38 TPS dari 38">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="PENGGILINGAN"><a href="javascript:set_hie(4,26108)">PENGGILINGAN</a></td><td data-sort-index="2" data-sort="28777" align="right" width="60" class="c1">28.777</td><td data-sort-index="2" data-sort="28777" align="right" class="c1" bgcolor="lightgreen">54,75%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26108" style="display: none;">29.162<div class="delta delta-c-da complete" style="display: none;">(+385)</div></td><td align="right" class="da1" id="da_pb_p_26108" style="display: none; background-color: lightgreen;">54,73%<div class="delta delta-c-da " style="display: none;">(-0,02%)</div></td><td data-sort-index="6" data-sort="23783" align="right" class="c1" width="60">23.783</td><td data-sort-index="6" data-sort="23783" align="right" class="c1">45,25%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26108" style="display: none;">24.125<div class="delta delta-c-da complete" style="display: none;">(+342)</div></td><td align="right" class="da1" id="da_jk_p_26108" style="display: none;">45,27%<div class="delta delta-c-da " style="display: none;">(+0,02%)</div></td><td class="c1" data-sort-index="10" data-sort="52560" align="right">52.560</td><td class="c1" data-sort-index="11" data-sort="447" align="right">447</td><td data-sort-index="12" class="c1" data-sort="0.015503875968992248" align="right" bgcolor="lightpink" title="2 TPS dari 129">1,55%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="129 TPS dari 129">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="PULO GEBANG"><a href="javascript:set_hie(4,26109)">PULO GEBANG</a></td><td data-sort-index="2" data-sort="27912" align="right" width="60" class="c1">27.912</td><td data-sort-index="2" data-sort="27912" align="right" class="c1" bgcolor="lightgreen">52,64%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26109" style="display: none;">28.186<div class="delta delta-c-da complete" style="display: none;">(+274)</div></td><td align="right" class="da1" id="da_pb_p_26109" style="display: none; background-color: lightgreen;">52,63%<div class="delta delta-c-da " style="display: none;">(+0,02%)</div></td><td data-sort-index="6" data-sort="25111" align="right" class="c1" width="60">25.111</td><td data-sort-index="6" data-sort="25111" align="right" class="c1">47,36%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26109" style="display: none;">25.372<div class="delta delta-c-da complete" style="display: none;">(+261)</div></td><td align="right" class="da1" id="da_jk_p_26109" style="display: none;">47,37%<div class="delta delta-c-da " style="display: none;">(+0,04%)</div></td><td class="c1" data-sort-index="10" data-sort="53053" align="right" bgcolor="lightpink">53.053 <br> <span class="delta">(+30) </span></td><td class="c1" data-sort-index="11" data-sort="443" align="right">443</td><td data-sort-index="12" class="c1" data-sort="0.015384615384615385" align="right" bgcolor="lightpink" title="2 TPS dari 130">1,54%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="130 TPS dari 130">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="UJUNG MENTENG"><a href="javascript:set_hie(4,26110)">UJUNG MENTENG</a></td><td data-sort-index="2" data-sort="8456" align="right" width="60" class="c1">8.456</td><td data-sort-index="2" data-sort="8456" align="right" class="c1" bgcolor="lightgreen">51,73%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26110" style="display: none;">8.868<div class="delta delta-c-da complete" style="display: none;">(+412)</div></td><td align="right" class="da1" id="da_pb_p_26110" style="display: none; background-color: lightgreen;">50,44%<div class="delta delta-c-da red" style="display: none;">(-1,28%)</div></td><td data-sort-index="6" data-sort="7891" align="right" class="c1" width="60">7.891</td><td data-sort-index="6" data-sort="7891" align="right" class="c1">48,27%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26110" style="display: none;">8.712<div class="delta delta-c-da complete" style="display: none;">(+821)</div></td><td align="right" class="da1" id="da_jk_p_26110" style="display: none;">49,56%<div class="delta delta-c-da red" style="display: none;">(+1,28%)</div></td><td class="c1" data-sort-index="10" data-sort="16347" align="right">16.347</td><td class="c1" data-sort-index="11" data-sort="130" align="right">130</td><td data-sort-index="12" class="c1" data-sort="0.09090909090909091" align="right" bgcolor="lightpink" title="4 TPS dari 44">9,09%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="CAKUNG BARAT"><a href="javascript:set_hie(4,26111)">CAKUNG BARAT</a></td><td data-sort-index="2" data-sort="17827" align="right" width="60" class="c1">17.827</td><td data-sort-index="2" data-sort="17827" align="right" class="c1" bgcolor="lightgreen">59,39%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26111" style="display: none;">17.817<div class="delta delta-c-da complete" style="display: none;">(-10)</div></td><td align="right" class="da1" id="da_pb_p_26111" style="display: none; background-color: lightgreen;">59,38%<div class="delta delta-c-da " style="display: none;">(-0,01%)</div></td><td data-sort-index="6" data-sort="12191" align="right" class="c1" width="60">12.191</td><td data-sort-index="6" data-sort="12191" align="right" class="c1">40,61%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26111" style="display: none;">12.190<div class="delta delta-c-da complete" style="display: none;">(-1)</div></td><td align="right" class="da1" id="da_jk_p_26111" style="display: none;">40,62%<div class="delta delta-c-da " style="display: none;">(+0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="30018" align="right">30.018</td><td class="c1" data-sort-index="11" data-sort="204" align="right">204</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 61">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="61 TPS dari 61">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">139.302</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">55,54%</td><td align="right" class="da1 da_pb_ct" style="display: none;">140.278</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">55,43%</td><td align="right" class="c1" width="60">111.500</td><td align="right" class="c1jkp c1">44,46%</td><td align="right" class="da1 da_jk_ct" style="display: none;">112.816</td><td align="right" class="da1 da_jk_pt" style="display: none;">44,57%</td><td class="c1" align="right">250.830 <br> <span class="delta">(+28)</span></td><td class="c1" align="right">2.037</td><td align="right" class="c1" title="9 TPS dari 603">1,49%</td><td align="right" class="c1" bgcolor="lightgreen" title="603 TPS dari 603">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_2">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">51.239</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,84%</td><td align="right" class="da1 da_pb_ct" style="display: none;">51.239</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,87%</td><td align="right" class="c1" width="60">45.727</td><td align="right" class="c1jkp c1">47,16%</td><td align="right" class="da1 da_jk_ct" style="display: none;">45.677</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,13%</td><td class="c1" align="right">96.966</td><td class="c1" align="right">1.142</td><td align="right" class="c1" title="0 TPS dari 208">0,00%</td><td align="right" class="c1" bgcolor="lightgreen" title="208 TPS dari 208">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="PISANGAN BARU"><a href="javascript:set_hie(4,26067)">PISANGAN BARU</a></td><td data-sort-index="2" data-sort="10206" align="right" width="60" class="c1">10.206</td><td data-sort-index="2" data-sort="10206" align="right" class="c1" bgcolor="lightgreen">53,11%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26067" style="display: none;">10.206<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26067" style="display: none; background-color: lightgreen;">53,11%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9012" align="right" class="c1" width="60">9.012</td><td data-sort-index="6" data-sort="9012" align="right" class="c1">46,89%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26067" style="display: none;">9.012<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26067" style="display: none;">46,89%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="19218" align="right">19.218</td><td class="c1" data-sort-index="11" data-sort="191" align="right">191</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 43">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="UTAN KAYU UTARA"><a href="javascript:set_hie(4,26068)">UTAN KAYU UTARA</a></td><td data-sort-index="2" data-sort="9131" align="right" width="60" class="c1">9.131</td><td data-sort-index="2" data-sort="9131" align="right" class="c1" bgcolor="lightgreen">51,70%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26068" style="display: none;">9.131<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26068" style="display: none; background-color: lightgreen;">51,85%<div class="delta delta-c-da " style="display: none;">(+0,15%)</div></td><td data-sort-index="6" data-sort="8530" align="right" class="c1" width="60">8.530</td><td data-sort-index="6" data-sort="8530" align="right" class="c1">48,30%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26068" style="display: none;">8.480<div class="delta delta-c-da complete" style="display: none;">(-50)</div></td><td align="right" class="da1" id="da_jk_p_26068" style="display: none;">48,15%<div class="delta delta-c-da " style="display: none;">(-0,15%)</div></td><td class="c1" data-sort-index="10" data-sort="17661" align="right">17.661</td><td class="c1" data-sort-index="11" data-sort="229" align="right">229</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 34">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="34 TPS dari 34">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="KAYU MANIS"><a href="javascript:set_hie(4,26069)">KAYU MANIS</a></td><td data-sort-index="2" data-sort="8395" align="right" width="60" class="c1">8.395</td><td data-sort-index="2" data-sort="8395" align="right" class="c1" bgcolor="lightgreen">53,83%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26069" style="display: none;">8.395<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26069" style="display: none; background-color: lightgreen;">53,83%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="7201" align="right" class="c1" width="60">7.201</td><td data-sort-index="6" data-sort="7201" align="right" class="c1">46,17%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26069" style="display: none;">7.201<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26069" style="display: none;">46,17%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="15596" align="right">15.596</td><td class="c1" data-sort-index="11" data-sort="198" align="right">198</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 35">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="35 TPS dari 35">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="PALMERIAM"><a href="javascript:set_hie(4,26070)">PALMERIAM</a></td><td data-sort-index="2" data-sort="6255" align="right" width="60" class="c1">6.255</td><td data-sort-index="2" data-sort="6255" align="right" class="c1" bgcolor="lightgreen">50,82%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26070" style="display: none;">6.255<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26070" style="display: none; background-color: lightgreen;">50,82%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="6053" align="right" class="c1" width="60">6.053</td><td data-sort-index="6" data-sort="6053" align="right" class="c1">49,18%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26070" style="display: none;">6.053<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26070" style="display: none;">49,18%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="12308" align="right">12.308</td><td class="c1" data-sort-index="11" data-sort="119" align="right">119</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 28">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="28 TPS dari 28">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="KEBON MANGGIS"><a href="javascript:set_hie(4,26071)">KEBON MANGGIS</a></td><td data-sort-index="2" data-sort="6674" align="right" width="60" class="c1">6.674</td><td data-sort-index="2" data-sort="6674" align="right" class="c1" bgcolor="lightgreen">64,04%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26071" style="display: none;">6.674<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26071" style="display: none; background-color: lightgreen;">64,04%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="3747" align="right" class="c1" width="60">3.747</td><td data-sort-index="6" data-sort="3747" align="right" class="c1">35,96%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26071" style="display: none;">3.747<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26071" style="display: none;">35,96%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="10421" align="right">10.421</td><td class="c1" data-sort-index="11" data-sort="125" align="right">125</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 25">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="25 TPS dari 25">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="UTAN KAYU SELATAN"><a href="javascript:set_hie(4,26072)">UTAN KAYU SELATAN</a></td><td data-sort-index="2" data-sort="10578" align="right" width="60" class="c1">10.578</td><td data-sort-index="2" data-sort="10578" align="right" class="c1">48,61%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26072" style="display: none;">10.578<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26072" style="display: none;">48,61%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="11184" align="right" class="c1" width="60">11.184</td><td data-sort-index="6" data-sort="11184" align="right" class="c1" bgcolor="lightgreen">51,39%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26072" style="display: none;">11.184<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26072" style="display: none; background-color: lightgreen;">51,39%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="21762" align="right">21.762</td><td class="c1" data-sort-index="11" data-sort="280" align="right">280</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 43">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">51.239</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,84%</td><td align="right" class="da1 da_pb_ct" style="display: none;">51.239</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,87%</td><td align="right" class="c1" width="60">45.727</td><td align="right" class="c1jkp c1">47,16%</td><td align="right" class="da1 da_jk_ct" style="display: none;">45.677</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,13%</td><td class="c1" align="right">96.966</td><td class="c1" align="right">1.142</td><td align="right" class="c1" title="0 TPS dari 208">0,00%</td><td align="right" class="c1" bgcolor="lightgreen" title="208 TPS dari 208">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_3">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">78.423</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">53,23%</td><td align="right" class="da1 da_pb_ct" style="display: none;">78.752</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">53,23%</td><td align="right" class="c1" width="60">68.895</td><td align="right" class="c1jkp c1">46,77%</td><td align="right" class="da1 da_jk_ct" style="display: none;">69.201</td><td align="right" class="da1 da_jk_pt" style="display: none;">46,77%</td><td class="c1" align="right">147.318</td><td class="c1" align="right">1.660</td><td align="right" class="c1" title="3 TPS dari 263">1,14%</td><td align="right" class="c1" bgcolor="lightgreen" title="263 TPS dari 263">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="CIRACAS"><a href="javascript:set_hie(4,26127)">CIRACAS</a></td><td data-sort-index="2" data-sort="19299" align="right" width="60" class="c1">19.299</td><td data-sort-index="2" data-sort="19299" align="right" class="c1" bgcolor="lightgreen">51,26%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26127" style="display: none;">19.299<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26127" style="display: none; background-color: lightgreen;">51,26%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="18349" align="right" class="c1" width="60">18.349</td><td data-sort-index="6" data-sort="18349" align="right" class="c1">48,74%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26127" style="display: none;">18.349<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26127" style="display: none;">48,74%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="37648" align="right">37.648</td><td class="c1" data-sort-index="11" data-sort="401" align="right">401</td><td data-sort-index="12" class="c1" data-sort="0.015873015873015872" align="right" bgcolor="lightpink" title="1 TPS dari 63">1,59%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="63 TPS dari 63">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="CIBUBUR"><a href="javascript:set_hie(4,26128)">CIBUBUR</a></td><td data-sort-index="2" data-sort="21100" align="right" width="60" class="c1">21.100</td><td data-sort-index="2" data-sort="21100" align="right" class="c1" bgcolor="lightgreen">53,97%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26128" style="display: none;">21.103<div class="delta delta-c-da complete" style="display: none;">(+3)</div></td><td align="right" class="da1" id="da_pb_p_26128" style="display: none; background-color: lightgreen;">53,98%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="17993" align="right" class="c1" width="60">17.993</td><td data-sort-index="6" data-sort="17993" align="right" class="c1">46,03%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26128" style="display: none;">17.993<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26128" style="display: none;">46,02%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="39093" align="right">39.093</td><td class="c1" data-sort-index="11" data-sort="495" align="right">495</td><td data-sort-index="12" class="c1" data-sort="0.014084507042253521" align="right" bgcolor="lightpink" title="1 TPS dari 71">1,41%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="71 TPS dari 71">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="KELAPA DUA WETAN"><a href="javascript:set_hie(4,26129)">KELAPA DUA WETAN</a></td><td data-sort-index="2" data-sort="13026" align="right" width="60" class="c1">13.026</td><td data-sort-index="2" data-sort="13026" align="right" class="c1">49,29%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26129" style="display: none;">13.352<div class="delta delta-c-da complete" style="display: none;">(+326)</div></td><td align="right" class="da1" id="da_pb_p_26129" style="display: none;">49,34%<div class="delta delta-c-da " style="display: none;">(+0,05%)</div></td><td data-sort-index="6" data-sort="13401" align="right" class="c1" width="60">13.401</td><td data-sort-index="6" data-sort="13401" align="right" class="c1" bgcolor="lightgreen">50,71%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26129" style="display: none;">13.707<div class="delta delta-c-da complete" style="display: none;">(+306)</div></td><td align="right" class="da1" id="da_jk_p_26129" style="display: none; background-color: lightgreen;">50,66%<div class="delta delta-c-da " style="display: none;">(-0,05%)</div></td><td class="c1" data-sort-index="10" data-sort="26427" align="right">26.427</td><td class="c1" data-sort-index="11" data-sort="273" align="right">273</td><td data-sort-index="12" class="c1" data-sort="0.02040816326530612" align="right" bgcolor="lightpink" title="1 TPS dari 49">2,04%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="49 TPS dari 49">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="SUSUKAN"><a href="javascript:set_hie(4,26130)">SUSUKAN</a></td><td data-sort-index="2" data-sort="12853" align="right" width="60" class="c1">12.853</td><td data-sort-index="2" data-sort="12853" align="right" class="c1" bgcolor="lightgreen">56,31%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26130" style="display: none;">12.853<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26130" style="display: none; background-color: lightgreen;">56,31%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9974" align="right" class="c1" width="60">9.974</td><td data-sort-index="6" data-sort="9974" align="right" class="c1">43,69%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26130" style="display: none;">9.974<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26130" style="display: none;">43,69%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="22827" align="right">22.827</td><td class="c1" data-sort-index="11" data-sort="250" align="right">250</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 42">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="42 TPS dari 42">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="RAMBUTAN"><a href="javascript:set_hie(4,26131)">RAMBUTAN</a></td><td data-sort-index="2" data-sort="12145" align="right" width="60" class="c1">12.145</td><td data-sort-index="2" data-sort="12145" align="right" class="c1" bgcolor="lightgreen">56,96%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26131" style="display: none;">12.145<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26131" style="display: none; background-color: lightgreen;">56,96%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9178" align="right" class="c1" width="60">9.178</td><td data-sort-index="6" data-sort="9178" align="right" class="c1">43,04%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26131" style="display: none;">9.178<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26131" style="display: none;">43,04%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="21323" align="right">21.323</td><td class="c1" data-sort-index="11" data-sort="241" align="right">241</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 38">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="38 TPS dari 38">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">78.423</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">53,23%</td><td align="right" class="da1 da_pb_ct" style="display: none;">78.752</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">53,23%</td><td align="right" class="c1" width="60">68.895</td><td align="right" class="c1jkp c1">46,77%</td><td align="right" class="da1 da_jk_ct" style="display: none;">69.201</td><td align="right" class="da1 da_jk_pt" style="display: none;">46,77%</td><td class="c1" align="right">147.318</td><td class="c1" align="right">1.660</td><td align="right" class="c1" title="3 TPS dari 263">1,14%</td><td align="right" class="c1" bgcolor="lightgreen" title="263 TPS dari 263">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_4">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">61.183</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">57,42%</td><td align="right" class="da1 da_pb_ct" style="display: none;">61.182</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">57,47%</td><td align="right" class="c1" width="60">45.374</td><td align="right" class="c1jkp c1">42,58%</td><td align="right" class="da1 da_jk_ct" style="display: none;">45.274</td><td align="right" class="da1 da_jk_pt" style="display: none;">42,53%</td><td class="c1" align="right">106.456 <br> <span class="delta">(-101)</span></td><td class="c1" align="right">1.005</td><td align="right" class="c1" title="2 TPS dari 200">1,00%</td><td align="right" class="c1" bgcolor="lightgreen" title="200 TPS dari 200">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="PEKAYON"><a href="javascript:set_hie(4,26099)">PEKAYON</a></td><td data-sort-index="2" data-sort="13690" align="right" width="60" class="c1">13.690</td><td data-sort-index="2" data-sort="13690" align="right" class="c1" bgcolor="lightgreen">55,63%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26099" style="display: none;">13.690<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26099" style="display: none; background-color: lightgreen;">55,63%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="10921" align="right" class="c1" width="60">10.921</td><td data-sort-index="6" data-sort="10921" align="right" class="c1">44,37%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26099" style="display: none;">10.921<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26099" style="display: none;">44,37%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="24611" align="right">24.611</td><td class="c1" data-sort-index="11" data-sort="198" align="right">198</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 47">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="47 TPS dari 47">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="KALISARI"><a href="javascript:set_hie(4,26100)">KALISARI</a></td><td data-sort-index="2" data-sort="14097" align="right" width="60" class="c1">14.097</td><td data-sort-index="2" data-sort="14097" align="right" class="c1" bgcolor="lightgreen">57,60%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26100" style="display: none;">14.096<div class="delta delta-c-da complete" style="display: none;">(-1)</div></td><td align="right" class="da1" id="da_pb_p_26100" style="display: none; background-color: lightgreen;">57,83%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="10378" align="right" class="c1" width="60">10.378</td><td data-sort-index="6" data-sort="10378" align="right" class="c1">42,40%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26100" style="display: none;">10.278<div class="delta delta-c-da complete" style="display: none;">(-100)</div></td><td align="right" class="da1" id="da_jk_p_26100" style="display: none;">42,17%<div class="delta delta-c-da " style="display: none;">(-0,41%)</div></td><td class="c1" data-sort-index="10" data-sort="24374" align="right" bgcolor="lightpink">24.374 <br> <span class="delta">(-101) </span></td><td class="c1" data-sort-index="11" data-sort="235" align="right">235</td><td data-sort-index="12" class="c1" data-sort="0.045454545454545456" align="right" bgcolor="lightpink" title="2 TPS dari 44">4,55%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="BARU"><a href="javascript:set_hie(4,26101)">BARU</a></td><td data-sort-index="2" data-sort="8710" align="right" width="60" class="c1">8.710</td><td data-sort-index="2" data-sort="8710" align="right" class="c1" bgcolor="lightgreen">69,47%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26101" style="display: none;">8.710<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26101" style="display: none; background-color: lightgreen;">69,47%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="3828" align="right" class="c1" width="60">3.828</td><td data-sort-index="6" data-sort="3828" align="right" class="c1">30,53%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26101" style="display: none;">3.828<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26101" style="display: none;">30,53%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="12538" align="right">12.538</td><td class="c1" data-sort-index="11" data-sort="98" align="right">98</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 28">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="28 TPS dari 28">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="CIJANTUNG"><a href="javascript:set_hie(4,26102)">CIJANTUNG</a></td><td data-sort-index="2" data-sort="13065" align="right" width="60" class="c1">13.065</td><td data-sort-index="2" data-sort="13065" align="right" class="c1" bgcolor="lightgreen">53,92%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26102" style="display: none;">13.065<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26102" style="display: none; background-color: lightgreen;">53,92%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="11165" align="right" class="c1" width="60">11.165</td><td data-sort-index="6" data-sort="11165" align="right" class="c1">46,08%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26102" style="display: none;">11.165<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26102" style="display: none;">46,08%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="24230" align="right">24.230</td><td class="c1" data-sort-index="11" data-sort="284" align="right">284</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 44">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="GEDONG"><a href="javascript:set_hie(4,26103)">GEDONG</a></td><td data-sort-index="2" data-sort="11621" align="right" width="60" class="c1">11.621</td><td data-sort-index="2" data-sort="11621" align="right" class="c1" bgcolor="lightgreen">56,13%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26103" style="display: none;">11.621<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26103" style="display: none; background-color: lightgreen;">56,13%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9082" align="right" class="c1" width="60">9.082</td><td data-sort-index="6" data-sort="9082" align="right" class="c1">43,87%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26103" style="display: none;">9.082<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26103" style="display: none;">43,87%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="20703" align="right">20.703</td><td class="c1" data-sort-index="11" data-sort="190" align="right">190</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 37">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="37 TPS dari 37">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">61.183</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">57,42%</td><td align="right" class="da1 da_pb_ct" style="display: none;">61.182</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">57,47%</td><td align="right" class="c1" width="60">45.374</td><td align="right" class="c1jkp c1">42,58%</td><td align="right" class="da1 da_jk_ct" style="display: none;">45.274</td><td align="right" class="da1 da_jk_pt" style="display: none;">42,53%</td><td class="c1" align="right">106.456 <br> <span class="delta">(-101)</span></td><td class="c1" align="right">1.005</td><td align="right" class="c1" title="2 TPS dari 200">1,00%</td><td align="right" class="c1" bgcolor="lightgreen" title="200 TPS dari 200">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_5">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">91.058</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,44%</td><td align="right" class="da1 da_pb_ct" style="display: none;">91.053</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,44%</td><td align="right" class="c1" width="60">82.598</td><td align="right" class="c1jkp c1">47,56%</td><td align="right" class="da1 da_jk_ct" style="display: none;">82.591</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,56%</td><td class="c1" align="right">173.656</td><td class="c1" align="right">1.787</td><td align="right" class="c1" title="1 TPS dari 367">0,27%</td><td align="right" class="c1" bgcolor="lightgreen" title="367 TPS dari 367">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="KAMPUNG MELAYU"><a href="javascript:set_hie(4,26082)">KAMPUNG MELAYU</a></td><td data-sort-index="2" data-sort="10165" align="right" width="60" class="c1">10.165</td><td data-sort-index="2" data-sort="10165" align="right" class="c1" bgcolor="lightgreen">62,04%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26082" style="display: none;">10.160<div class="delta delta-c-da complete" style="display: none;">(-5)</div></td><td align="right" class="da1" id="da_pb_p_26082" style="display: none; background-color: lightgreen;">62,03%<div class="delta delta-c-da " style="display: none;">(-0,01%)</div></td><td data-sort-index="6" data-sort="6219" align="right" class="c1" width="60">6.219</td><td data-sort-index="6" data-sort="6219" align="right" class="c1">37,96%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26082" style="display: none;">6.219<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26082" style="display: none;">37,97%<div class="delta delta-c-da " style="display: none;">(+0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="16384" align="right">16.384</td><td class="c1" data-sort-index="11" data-sort="151" align="right">151</td><td data-sort-index="12" class="c1" data-sort="0.03333333333333333" align="right" bgcolor="lightpink" title="1 TPS dari 30">3,33%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="30 TPS dari 30">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="BIDARA CINA"><a href="javascript:set_hie(4,26083)">BIDARA CINA</a></td><td data-sort-index="2" data-sort="13715" align="right" width="60" class="c1">13.715</td><td data-sort-index="2" data-sort="13715" align="right" class="c1" bgcolor="lightgreen">55,27%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26083" style="display: none;">13.715<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26083" style="display: none; background-color: lightgreen;">55,27%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="11098" align="right" class="c1" width="60">11.098</td><td data-sort-index="6" data-sort="11098" align="right" class="c1">44,73%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26083" style="display: none;">11.098<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26083" style="display: none;">44,73%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="24813" align="right">24.813</td><td class="c1" data-sort-index="11" data-sort="251" align="right">251</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 52">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="52 TPS dari 52">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="BALIMESTER"><a href="javascript:set_hie(4,26084)">BALIMESTER</a></td><td data-sort-index="2" data-sort="2364" align="right" width="60" class="c1">2.364</td><td data-sort-index="2" data-sort="2364" align="right" class="c1">35,49%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26084" style="display: none;">2.364<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26084" style="display: none;">35,49%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="4297" align="right" class="c1" width="60">4.297</td><td data-sort-index="6" data-sort="4297" align="right" class="c1" bgcolor="lightgreen">64,51%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26084" style="display: none;">4.297<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26084" style="display: none; background-color: lightgreen;">64,51%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="6661" align="right">6.661</td><td class="c1" data-sort-index="11" data-sort="59" align="right">59</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 14">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="14 TPS dari 14">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="RAWA BUNGA"><a href="javascript:set_hie(4,26085)">RAWA BUNGA</a></td><td data-sort-index="2" data-sort="6918" align="right" width="60" class="c1">6.918</td><td data-sort-index="2" data-sort="6918" align="right" class="c1" bgcolor="lightgreen">51,93%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26085" style="display: none;">6.918<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26085" style="display: none; background-color: lightgreen;">51,93%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="6404" align="right" class="c1" width="60">6.404</td><td data-sort-index="6" data-sort="6404" align="right" class="c1">48,07%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26085" style="display: none;">6.404<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26085" style="display: none;">48,07%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="13322" align="right">13.322</td><td class="c1" data-sort-index="11" data-sort="142" align="right">142</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 27">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="27 TPS dari 27">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="CIPINANG CEMPEDAK"><a href="javascript:set_hie(4,26086)">CIPINANG CEMPEDAK</a></td><td data-sort-index="2" data-sort="12529" align="right" width="60" class="c1">12.529</td><td data-sort-index="2" data-sort="12529" align="right" class="c1" bgcolor="lightgreen">56,09%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26086" style="display: none;">12.529<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26086" style="display: none; background-color: lightgreen;">56,09%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9809" align="right" class="c1" width="60">9.809</td><td data-sort-index="6" data-sort="9809" align="right" class="c1">43,91%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26086" style="display: none;">9.809<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26086" style="display: none;">43,91%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="22338" align="right">22.338</td><td class="c1" data-sort-index="11" data-sort="190" align="right">190</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 43">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="CIPINANG MUARA"><a href="javascript:set_hie(4,26087)">CIPINANG MUARA</a></td><td data-sort-index="2" data-sort="17656" align="right" width="60" class="c1">17.656</td><td data-sort-index="2" data-sort="17656" align="right" class="c1">49,77%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26087" style="display: none;">17.656<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26087" style="display: none;">49,77%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="17816" align="right" class="c1" width="60">17.816</td><td data-sort-index="6" data-sort="17816" align="right" class="c1" bgcolor="lightgreen">50,23%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26087" style="display: none;">17.816<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26087" style="display: none; background-color: lightgreen;">50,23%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="35472" align="right">35.472</td><td class="c1" data-sort-index="11" data-sort="362" align="right">362</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 77">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="77 TPS dari 77">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="CIPINANG BESAR SELATAN"><a href="javascript:set_hie(4,26088)">CIPINANG BESAR SELATAN</a></td><td data-sort-index="2" data-sort="10813" align="right" width="60" class="c1">10.813</td><td data-sort-index="2" data-sort="10813" align="right" class="c1" bgcolor="lightgreen">53,23%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26088" style="display: none;">10.813<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26088" style="display: none; background-color: lightgreen;">53,23%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9499" align="right" class="c1" width="60">9.499</td><td data-sort-index="6" data-sort="9499" align="right" class="c1">46,77%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26088" style="display: none;">9.499<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26088" style="display: none;">46,77%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="20312" align="right">20.312</td><td class="c1" data-sort-index="11" data-sort="192" align="right">192</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 38">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="38 TPS dari 38">100,00%</td></tr><tr class="datarow" id="row7"><td align="center" data-sort-index="0" data-sort="7">8</td><td data-sort-index="1" data-sort="CIPINANG BESAR UTARA"><a href="javascript:set_hie(4,26089)">CIPINANG BESAR UTARA</a></td><td data-sort-index="2" data-sort="16898" align="right" width="60" class="c1">16.898</td><td data-sort-index="2" data-sort="16898" align="right" class="c1">49,19%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26089" style="display: none;">16.898<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26089" style="display: none;">49,20%<div class="delta delta-c-da " style="display: none;">(+0,01%)</div></td><td data-sort-index="6" data-sort="17456" align="right" class="c1" width="60">17.456</td><td data-sort-index="6" data-sort="17456" align="right" class="c1" bgcolor="lightgreen">50,81%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26089" style="display: none;">17.449<div class="delta delta-c-da complete" style="display: none;">(-7)</div></td><td align="right" class="da1" id="da_jk_p_26089" style="display: none; background-color: lightgreen;">50,80%<div class="delta delta-c-da " style="display: none;">(-0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="34354" align="right">34.354</td><td class="c1" data-sort-index="11" data-sort="440" align="right">440</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 86">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="86 TPS dari 86">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">91.058</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,44%</td><td align="right" class="da1 da_pb_ct" style="display: none;">91.053</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,44%</td><td align="right" class="c1" width="60">82.598</td><td align="right" class="c1jkp c1">47,56%</td><td align="right" class="da1 da_jk_ct" style="display: none;">82.591</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,56%</td><td class="c1" align="right">173.656</td><td class="c1" align="right">1.787</td><td align="right" class="c1" title="1 TPS dari 367">0,27%</td><td align="right" class="c1" bgcolor="lightgreen" title="367 TPS dari 367">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_6">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">72.291</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">56,30%</td><td align="right" class="da1 da_pb_ct" style="display: none;">72.928</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">56,34%</td><td align="right" class="c1" width="60">56.101</td><td align="right" class="c1jkp c1">43,70%</td><td align="right" class="da1 da_jk_ct" style="display: none;">56.525</td><td align="right" class="da1 da_jk_pt" style="display: none;">43,66%</td><td class="c1" align="right">128.392</td><td class="c1" align="right">1.314</td><td align="right" class="c1" title="3 TPS dari 271">1,11%</td><td align="right" class="c1" bgcolor="lightgreen" title="271 TPS dari 271">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="CIPAYUNG"><a href="javascript:set_hie(4,26133)">CIPAYUNG</a></td><td data-sort-index="2" data-sort="7303" align="right" width="60" class="c1">7.303</td><td data-sort-index="2" data-sort="7303" align="right" class="c1" bgcolor="lightgreen">50,94%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26133" style="display: none;">7.303<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26133" style="display: none; background-color: lightgreen;">50,94%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="7034" align="right" class="c1" width="60">7.034</td><td data-sort-index="6" data-sort="7034" align="right" class="c1">49,06%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26133" style="display: none;">7.034<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26133" style="display: none;">49,06%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="14337" align="right">14.337</td><td class="c1" data-sort-index="11" data-sort="144" align="right">144</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 27">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="27 TPS dari 27">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="CILANGKAP"><a href="javascript:set_hie(4,26134)">CILANGKAP</a></td><td data-sort-index="2" data-sort="8084" align="right" width="60" class="c1">8.084</td><td data-sort-index="2" data-sort="8084" align="right" class="c1" bgcolor="lightgreen">56,13%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26134" style="display: none;">8.084<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26134" style="display: none; background-color: lightgreen;">56,13%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="6317" align="right" class="c1" width="60">6.317</td><td data-sort-index="6" data-sort="6317" align="right" class="c1">43,87%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26134" style="display: none;">6.317<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26134" style="display: none;">43,87%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="14401" align="right">14.401</td><td class="c1" data-sort-index="11" data-sort="109" align="right">109</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 32">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="32 TPS dari 32">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="PONDOK RANGGON"><a href="javascript:set_hie(4,26135)">PONDOK RANGGON</a></td><td data-sort-index="2" data-sort="7975" align="right" width="60" class="c1">7.975</td><td data-sort-index="2" data-sort="7975" align="right" class="c1" bgcolor="lightgreen">59,38%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26135" style="display: none;">7.975<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26135" style="display: none; background-color: lightgreen;">59,38%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="5455" align="right" class="c1" width="60">5.455</td><td data-sort-index="6" data-sort="5455" align="right" class="c1">40,62%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26135" style="display: none;">5.455<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26135" style="display: none;">40,62%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="13430" align="right">13.430</td><td class="c1" data-sort-index="11" data-sort="177" align="right">177</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 24">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="24 TPS dari 24">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="MUNJUL"><a href="javascript:set_hie(4,26136)">MUNJUL</a></td><td data-sort-index="2" data-sort="6724" align="right" width="60" class="c1">6.724</td><td data-sort-index="2" data-sort="6724" align="right" class="c1" bgcolor="lightgreen">54,05%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26136" style="display: none;">7.054<div class="delta delta-c-da complete" style="display: none;">(+330)</div></td><td align="right" class="da1" id="da_pb_p_26136" style="display: none; background-color: lightgreen;">54,12%<div class="delta delta-c-da " style="display: none;">(+0,08%)</div></td><td data-sort-index="6" data-sort="5717" align="right" class="c1" width="60">5.717</td><td data-sort-index="6" data-sort="5717" align="right" class="c1">45,95%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26136" style="display: none;">5.979<div class="delta delta-c-da complete" style="display: none;">(+262)</div></td><td align="right" class="da1" id="da_jk_p_26136" style="display: none;">45,88%<div class="delta delta-c-da " style="display: none;">(-0,08%)</div></td><td class="c1" data-sort-index="10" data-sort="12441" align="right">12.441</td><td class="c1" data-sort-index="11" data-sort="125" align="right">125</td><td data-sort-index="12" class="c1" data-sort="0.045454545454545456" align="right" bgcolor="lightpink" title="1 TPS dari 22">4,55%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="22 TPS dari 22">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="SETU"><a href="javascript:set_hie(4,26137)">SETU</a></td><td data-sort-index="2" data-sort="5926" align="right" width="60" class="c1">5.926</td><td data-sort-index="2" data-sort="5926" align="right" class="c1" bgcolor="lightgreen">57,14%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26137" style="display: none;">6.233<div class="delta delta-c-da complete" style="display: none;">(+307)</div></td><td align="right" class="da1" id="da_pb_p_26137" style="display: none; background-color: lightgreen;">57,50%<div class="delta delta-c-da " style="display: none;">(+0,36%)</div></td><td data-sort-index="6" data-sort="4445" align="right" class="c1" width="60">4.445</td><td data-sort-index="6" data-sort="4445" align="right" class="c1">42,86%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26137" style="display: none;">4.607<div class="delta delta-c-da complete" style="display: none;">(+162)</div></td><td align="right" class="da1" id="da_jk_p_26137" style="display: none;">42,50%<div class="delta delta-c-da " style="display: none;">(-0,36%)</div></td><td class="c1" data-sort-index="10" data-sort="10371" align="right">10.371</td><td class="c1" data-sort-index="11" data-sort="100" align="right">100</td><td data-sort-index="12" class="c1" data-sort="0.08333333333333333" align="right" bgcolor="lightpink" title="2 TPS dari 24">8,33%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="24 TPS dari 24">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="BAMBU APUS"><a href="javascript:set_hie(4,26138)">BAMBU APUS</a></td><td data-sort-index="2" data-sort="8652" align="right" width="60" class="c1">8.652</td><td data-sort-index="2" data-sort="8652" align="right" class="c1" bgcolor="lightgreen">56,63%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26138" style="display: none;">8.652<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26138" style="display: none; background-color: lightgreen;">56,63%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="6627" align="right" class="c1" width="60">6.627</td><td data-sort-index="6" data-sort="6627" align="right" class="c1">43,37%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26138" style="display: none;">6.627<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26138" style="display: none;">43,37%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="15279" align="right">15.279</td><td class="c1" data-sort-index="11" data-sort="182" align="right">182</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 34">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="34 TPS dari 34">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="LUBANG BUAYA"><a href="javascript:set_hie(4,26139)">LUBANG BUAYA</a></td><td data-sort-index="2" data-sort="21411" align="right" width="60" class="c1">21.411</td><td data-sort-index="2" data-sort="21411" align="right" class="c1" bgcolor="lightgreen">58,13%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26139" style="display: none;">21.411<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26139" style="display: none; background-color: lightgreen;">58,13%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="15425" align="right" class="c1" width="60">15.425</td><td data-sort-index="6" data-sort="15425" align="right" class="c1">41,87%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26139" style="display: none;">15.425<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26139" style="display: none;">41,87%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="36836" align="right">36.836</td><td class="c1" data-sort-index="11" data-sort="352" align="right">352</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 80">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="80 TPS dari 80">100,00%</td></tr><tr class="datarow" id="row7"><td align="center" data-sort-index="0" data-sort="7">8</td><td data-sort-index="1" data-sort="CEGER"><a href="javascript:set_hie(4,26140)">CEGER</a></td><td data-sort-index="2" data-sort="6216" align="right" width="60" class="c1">6.216</td><td data-sort-index="2" data-sort="6216" align="right" class="c1" bgcolor="lightgreen">55,02%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26140" style="display: none;">6.216<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26140" style="display: none; background-color: lightgreen;">55,02%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="5081" align="right" class="c1" width="60">5.081</td><td data-sort-index="6" data-sort="5081" align="right" class="c1">44,98%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26140" style="display: none;">5.081<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26140" style="display: none;">44,98%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="11297" align="right">11.297</td><td class="c1" data-sort-index="11" data-sort="125" align="right">125</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 28">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="28 TPS dari 28">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">72.291</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">56,30%</td><td align="right" class="da1 da_pb_ct" style="display: none;">72.928</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">56,34%</td><td align="right" class="c1" width="60">56.101</td><td align="right" class="c1jkp c1">43,70%</td><td align="right" class="da1 da_jk_ct" style="display: none;">56.525</td><td align="right" class="da1 da_jk_pt" style="display: none;">43,66%</td><td class="c1" align="right">128.392</td><td class="c1" align="right">1.314</td><td align="right" class="c1" title="3 TPS dari 271">1,11%</td><td align="right" class="c1" bgcolor="lightgreen" title="271 TPS dari 271">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_7">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">73.849</td><td align="right" class="c1pbp c1">47,51%</td><td align="right" class="da1 da_pb_ct" style="display: none;">74.138</td><td align="right" class="da1 da_pb_pt" style="display: none;">47,56%</td><td align="right" class="c1" width="60">81.602</td><td align="right" class="c1jkp c1 win" style="background-color: lightgreen;">52,49%</td><td align="right" class="da1 da_jk_ct" style="display: none;">81.732</td><td align="right" class="da1 da_jk_pt" style="display: none; background-color: lightgreen;">52,44%</td><td class="c1" align="right">155.546 <br> <span class="delta">(+95)</span></td><td class="c1" align="right">1.633</td><td align="right" class="c1" title="3 TPS dari 314">0,96%</td><td align="right" class="c1" bgcolor="lightgreen" title="314 TPS dari 314">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="PULO GADUNG"><a href="javascript:set_hie(4,26074)">PULO GADUNG</a></td><td data-sort-index="2" data-sort="8320" align="right" width="60" class="c1">8.320</td><td data-sort-index="2" data-sort="8320" align="right" class="c1">39,37%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26074" style="display: none;">8.320<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26074" style="display: none;">39,38%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="12814" align="right" class="c1" width="60">12.814</td><td data-sort-index="6" data-sort="12814" align="right" class="c1" bgcolor="lightgreen">60,63%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26074" style="display: none;">12.809<div class="delta delta-c-da complete" style="display: none;">(-5)</div></td><td align="right" class="da1" id="da_jk_p_26074" style="display: none; background-color: lightgreen;">60,62%<div class="delta delta-c-da " style="display: none;">(-0,02%)</div></td><td class="c1" data-sort-index="10" data-sort="21129" align="right" bgcolor="lightpink">21.129 <br> <span class="delta">(-5) </span></td><td class="c1" data-sort-index="11" data-sort="215" align="right">215</td><td data-sort-index="12" class="c1" data-sort="0.022727272727272728" align="right" bgcolor="lightpink" title="1 TPS dari 44">2,27%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="PISANGAN TIMUR"><a href="javascript:set_hie(4,26075)">PISANGAN TIMUR</a></td><td data-sort-index="2" data-sort="13692" align="right" width="60" class="c1">13.692</td><td data-sort-index="2" data-sort="13692" align="right" class="c1" bgcolor="lightgreen">52,27%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26075" style="display: none;">13.692<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26075" style="display: none; background-color: lightgreen;">52,27%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="12501" align="right" class="c1" width="60">12.501</td><td data-sort-index="6" data-sort="12501" align="right" class="c1">47,73%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26075" style="display: none;">12.501<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26075" style="display: none;">47,73%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="26193" align="right">26.193</td><td class="c1" data-sort-index="11" data-sort="345" align="right">345</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 52">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="52 TPS dari 52">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="CIPINANG"><a href="javascript:set_hie(4,26076)">CIPINANG</a></td><td data-sort-index="2" data-sort="11988" align="right" width="60" class="c1">11.988</td><td data-sort-index="2" data-sort="11988" align="right" class="c1" bgcolor="lightgreen">50,13%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26076" style="display: none;">11.995<div class="delta delta-c-da complete" style="display: none;">(+7)</div></td><td align="right" class="da1" id="da_pb_p_26076" style="display: none; background-color: lightgreen;">50,16%<div class="delta delta-c-da " style="display: none;">(+0,03%)</div></td><td data-sort-index="6" data-sort="11924" align="right" class="c1" width="60">11.924</td><td data-sort-index="6" data-sort="11924" align="right" class="c1">49,87%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26076" style="display: none;">11.917<div class="delta delta-c-da complete" style="display: none;">(-7)</div></td><td align="right" class="da1" id="da_jk_p_26076" style="display: none;">49,84%<div class="delta delta-c-da " style="display: none;">(-0,03%)</div></td><td class="c1" data-sort-index="10" data-sort="23912" align="right">23.912</td><td class="c1" data-sort-index="11" data-sort="253" align="right">253</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 49">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="49 TPS dari 49">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="JATINEGARA KAUM"><a href="javascript:set_hie(4,26077)">JATINEGARA KAUM</a></td><td data-sort-index="2" data-sort="7817" align="right" width="60" class="c1">7.817</td><td data-sort-index="2" data-sort="7817" align="right" class="c1" bgcolor="lightgreen">57,54%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26077" style="display: none;">7.817<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26077" style="display: none; background-color: lightgreen;">57,54%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="5768" align="right" class="c1" width="60">5.768</td><td data-sort-index="6" data-sort="5768" align="right" class="c1">42,46%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26077" style="display: none;">5.768<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26077" style="display: none;">42,46%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="13585" align="right">13.585</td><td class="c1" data-sort-index="11" data-sort="127" align="right">127</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 27">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="27 TPS dari 27">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="RAWAMANGUN"><a href="javascript:set_hie(4,26078)">RAWAMANGUN</a></td><td data-sort-index="2" data-sort="11573" align="right" width="60" class="c1">11.573</td><td data-sort-index="2" data-sort="11573" align="right" class="c1">49,99%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26078" style="display: none;">11.700<div class="delta delta-c-da complete" style="display: none;">(+127)</div></td><td align="right" class="da1" id="da_pb_p_26078" style="display: none; background-color: lightgreen;">50,14%<div class="delta delta-c-da " style="display: none;">(+0,15%)</div></td><td data-sort-index="6" data-sort="11576" align="right" class="c1" width="60">11.576</td><td data-sort-index="6" data-sort="11576" align="right" class="c1" bgcolor="lightgreen">50,01%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26078" style="display: none;">11.634<div class="delta delta-c-da complete" style="display: none;">(+58)</div></td><td align="right" class="da1" id="da_jk_p_26078" style="display: none;">49,86%<div class="delta delta-c-da " style="display: none;">(-0,15%)</div></td><td class="c1" data-sort-index="10" data-sort="23149" align="right">23.149</td><td class="c1" data-sort-index="11" data-sort="276" align="right">276</td><td data-sort-index="12" class="c1" data-sort="0.02127659574468085" align="right" bgcolor="lightpink" title="1 TPS dari 47">2,13%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="47 TPS dari 47">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="KAYU PUTIH"><a href="javascript:set_hie(4,26079)">KAYU PUTIH</a></td><td data-sort-index="2" data-sort="10571" align="right" width="60" class="c1">10.571</td><td data-sort-index="2" data-sort="10571" align="right" class="c1">40,43%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26079" style="display: none;">10.726<div class="delta delta-c-da complete" style="display: none;">(+155)</div></td><td align="right" class="da1" id="da_pb_p_26079" style="display: none;">40,65%<div class="delta delta-c-da " style="display: none;">(+0,38%)</div></td><td data-sort-index="6" data-sort="15575" align="right" class="c1" width="60">15.575</td><td data-sort-index="6" data-sort="15575" align="right" class="c1" bgcolor="lightgreen">59,57%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26079" style="display: none;">15.659<div class="delta delta-c-da complete" style="display: none;">(+84)</div></td><td align="right" class="da1" id="da_jk_p_26079" style="display: none; background-color: lightgreen;">59,35%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="26246" align="right" bgcolor="lightpink">26.246 <br> <span class="delta">(+100) </span></td><td class="c1" data-sort-index="11" data-sort="238" align="right">238</td><td data-sort-index="12" class="c1" data-sort="0.02" align="right" bgcolor="lightpink" title="1 TPS dari 50">2,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="50 TPS dari 50">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="JATI"><a href="javascript:set_hie(4,26080)">JATI</a></td><td data-sort-index="2" data-sort="9888" align="right" width="60" class="c1">9.888</td><td data-sort-index="2" data-sort="9888" align="right" class="c1">46,35%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26080" style="display: none;">9.888<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26080" style="display: none;">46,35%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="11444" align="right" class="c1" width="60">11.444</td><td data-sort-index="6" data-sort="11444" align="right" class="c1" bgcolor="lightgreen">53,65%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26080" style="display: none;">11.444<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26080" style="display: none; background-color: lightgreen;">53,65%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="21332" align="right">21.332</td><td class="c1" data-sort-index="11" data-sort="179" align="right">179</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 45">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="45 TPS dari 45">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">73.849</td><td align="right" class="c1pbp c1">47,51%</td><td align="right" class="da1 da_pb_ct" style="display: none;">74.138</td><td align="right" class="da1 da_pb_pt" style="display: none;">47,56%</td><td align="right" class="c1" width="60">81.602</td><td align="right" class="c1jkp c1 win" style="background-color: lightgreen;">52,49%</td><td align="right" class="da1 da_jk_ct" style="display: none;">81.732</td><td align="right" class="da1 da_jk_pt" style="display: none; background-color: lightgreen;">52,44%</td><td class="c1" align="right">155.546 <br> <span class="delta">(+95)</span></td><td class="c1" align="right">1.633</td><td align="right" class="c1" title="3 TPS dari 314">0,96%</td><td align="right" class="c1" bgcolor="lightgreen" title="314 TPS dari 314">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_8">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">56.027</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,59%</td><td align="right" class="da1 da_pb_ct" style="display: none;">56.742</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,49%</td><td align="right" class="c1" width="60">50.506</td><td align="right" class="c1jkp c1">47,41%</td><td align="right" class="da1 da_jk_ct" style="display: none;">51.362</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,51%</td><td class="c1" align="right">106.533</td><td class="c1" align="right">1.035</td><td align="right" class="c1" title="4 TPS dari 222">1,80%</td><td align="right" class="c1" bgcolor="lightgreen" title="222 TPS dari 222">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="MAKASAR"><a href="javascript:set_hie(4,26121)">MAKASAR</a></td><td data-sort-index="2" data-sort="10522" align="right" width="60" class="c1">10.522</td><td data-sort-index="2" data-sort="10522" align="right" class="c1">49,13%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26121" style="display: none;">10.771<div class="delta delta-c-da complete" style="display: none;">(+249)</div></td><td align="right" class="da1" id="da_pb_p_26121" style="display: none;">49,01%<div class="delta delta-c-da " style="display: none;">(-0,12%)</div></td><td data-sort-index="6" data-sort="10893" align="right" class="c1" width="60">10.893</td><td data-sort-index="6" data-sort="10893" align="right" class="c1" bgcolor="lightgreen">50,87%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26121" style="display: none;">11.205<div class="delta delta-c-da complete" style="display: none;">(+312)</div></td><td align="right" class="da1" id="da_jk_p_26121" style="display: none; background-color: lightgreen;">50,99%<div class="delta delta-c-da " style="display: none;">(+0,12%)</div></td><td class="c1" data-sort-index="10" data-sort="21415" align="right">21.415</td><td class="c1" data-sort-index="11" data-sort="276" align="right">276</td><td data-sort-index="12" class="c1" data-sort="0.022727272727272728" align="right" bgcolor="lightpink" title="1 TPS dari 44">2,27%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="PINANGRANTI"><a href="javascript:set_hie(4,26122)">PINANGRANTI</a></td><td data-sort-index="2" data-sort="8191" align="right" width="60" class="c1">8.191</td><td data-sort-index="2" data-sort="8191" align="right" class="c1" bgcolor="lightgreen">51,93%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26122" style="display: none;">8.192<div class="delta delta-c-da complete" style="display: none;">(+1)</div></td><td align="right" class="da1" id="da_pb_p_26122" style="display: none; background-color: lightgreen;">51,93%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="7583" align="right" class="c1" width="60">7.583</td><td data-sort-index="6" data-sort="7583" align="right" class="c1">48,07%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26122" style="display: none;">7.583<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26122" style="display: none;">48,07%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="15774" align="right">15.774</td><td class="c1" data-sort-index="11" data-sort="171" align="right">171</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 31">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="31 TPS dari 31">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="KEBON PALA"><a href="javascript:set_hie(4,26123)">KEBON PALA</a></td><td data-sort-index="2" data-sort="13755" align="right" width="60" class="c1">13.755</td><td data-sort-index="2" data-sort="13755" align="right" class="c1" bgcolor="lightgreen">50,45%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26123" style="display: none;">14.220<div class="delta delta-c-da complete" style="display: none;">(+465)</div></td><td align="right" class="da1" id="da_pb_p_26123" style="display: none; background-color: lightgreen;">50,29%<div class="delta delta-c-da " style="display: none;">(-0,16%)</div></td><td data-sort-index="6" data-sort="13510" align="right" class="c1" width="60">13.510</td><td data-sort-index="6" data-sort="13510" align="right" class="c1">49,55%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26123" style="display: none;">14.054<div class="delta delta-c-da complete" style="display: none;">(+544)</div></td><td align="right" class="da1" id="da_jk_p_26123" style="display: none;">49,71%<div class="delta delta-c-da " style="display: none;">(+0,16%)</div></td><td class="c1" data-sort-index="10" data-sort="27265" align="right">27.265</td><td class="c1" data-sort-index="11" data-sort="259" align="right">259</td><td data-sort-index="12" class="c1" data-sort="0.05172413793103448" align="right" bgcolor="lightpink" title="3 TPS dari 58">5,17%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="58 TPS dari 58">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="HALIM PERDANA KUSUMA"><a href="javascript:set_hie(4,26124)">HALIM PERDANA KUSUMA</a></td><td data-sort-index="2" data-sort="8807" align="right" width="60" class="c1">8.807</td><td data-sort-index="2" data-sort="8807" align="right" class="c1" bgcolor="lightgreen">62,19%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26124" style="display: none;">8.807<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26124" style="display: none; background-color: lightgreen;">62,19%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="5355" align="right" class="c1" width="60">5.355</td><td data-sort-index="6" data-sort="5355" align="right" class="c1">37,81%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26124" style="display: none;">5.355<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26124" style="display: none;">37,81%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="14162" align="right">14.162</td><td class="c1" data-sort-index="11" data-sort="101" align="right">101</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 32">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="32 TPS dari 32">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="CIPINANG MELAYU"><a href="javascript:set_hie(4,26125)">CIPINANG MELAYU</a></td><td data-sort-index="2" data-sort="14752" align="right" width="60" class="c1">14.752</td><td data-sort-index="2" data-sort="14752" align="right" class="c1" bgcolor="lightgreen">52,84%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26125" style="display: none;">14.752<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26125" style="display: none; background-color: lightgreen;">52,84%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="13165" align="right" class="c1" width="60">13.165</td><td data-sort-index="6" data-sort="13165" align="right" class="c1">47,16%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26125" style="display: none;">13.165<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26125" style="display: none;">47,16%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="27917" align="right">27.917</td><td class="c1" data-sort-index="11" data-sort="228" align="right">228</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 57">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="57 TPS dari 57">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">56.027</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,59%</td><td align="right" class="da1 da_pb_ct" style="display: none;">56.742</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,49%</td><td align="right" class="c1" width="60">50.506</td><td align="right" class="c1jkp c1">47,41%</td><td align="right" class="da1 da_jk_ct" style="display: none;">51.362</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,51%</td><td class="c1" align="right">106.533</td><td class="c1" align="right">1.035</td><td align="right" class="c1" title="4 TPS dari 222">1,80%</td><td align="right" class="c1" bgcolor="lightgreen" title="222 TPS dari 222">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_9">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">116.609</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,57%</td><td align="right" class="da1 da_pb_ct" style="display: none;">117.132</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,54%</td><td align="right" class="c1" width="60">105.192</td><td align="right" class="c1jkp c1">47,43%</td><td align="right" class="da1 da_jk_ct" style="display: none;">105.800</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,46%</td><td class="c1" align="right">221.601 <br> <span class="delta">(-200)</span></td><td class="c1" align="right">2.252</td><td align="right" class="c1" title="6 TPS dari 463">1,30%</td><td align="right" class="c1" bgcolor="lightgreen" title="463 TPS dari 463">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="DUREN SAWIT"><a href="javascript:set_hie(4,26113)">DUREN SAWIT</a></td><td data-sort-index="2" data-sort="19488" align="right" width="60" class="c1">19.488</td><td data-sort-index="2" data-sort="19488" align="right" class="c1" bgcolor="lightgreen">50,42%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26113" style="display: none;">19.766<div class="delta delta-c-da complete" style="display: none;">(+278)</div></td><td align="right" class="da1" id="da_pb_p_26113" style="display: none; background-color: lightgreen;">50,41%<div class="delta delta-c-da " style="display: none;">(-0,01%)</div></td><td data-sort-index="6" data-sort="19165" align="right" class="c1" width="60">19.165</td><td data-sort-index="6" data-sort="19165" align="right" class="c1">49,58%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26113" style="display: none;">19.448<div class="delta delta-c-da complete" style="display: none;">(+283)</div></td><td align="right" class="da1" id="da_jk_p_26113" style="display: none;">49,59%<div class="delta delta-c-da " style="display: none;">(+0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="38653" align="right">38.653</td><td class="c1" data-sort-index="11" data-sort="341" align="right">341</td><td data-sort-index="12" class="c1" data-sort="0.025" align="right" bgcolor="lightpink" title="2 TPS dari 80">2,50%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="80 TPS dari 80">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="PONDOK BAMBU"><a href="javascript:set_hie(4,26114)">PONDOK BAMBU</a></td><td data-sort-index="2" data-sort="20521" align="right" width="60" class="c1">20.521</td><td data-sort-index="2" data-sort="20521" align="right" class="c1" bgcolor="lightgreen">52,20%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26114" style="display: none;">20.521<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26114" style="display: none; background-color: lightgreen;">52,20%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="18795" align="right" class="c1" width="60">18.795</td><td data-sort-index="6" data-sort="18795" align="right" class="c1">47,80%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26114" style="display: none;">18.795<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26114" style="display: none;">47,80%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="39316" align="right">39.316</td><td class="c1" data-sort-index="11" data-sort="345" align="right">345</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 77">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="77 TPS dari 77">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="KLENDER"><a href="javascript:set_hie(4,26115)">KLENDER</a></td><td data-sort-index="2" data-sort="22914" align="right" width="60" class="c1">22.914</td><td data-sort-index="2" data-sort="22914" align="right" class="c1" bgcolor="lightgreen">54,18%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26115" style="display: none;">22.714<div class="delta delta-c-da complete" style="display: none;">(-200)</div></td><td align="right" class="da1" id="da_pb_p_26115" style="display: none; background-color: lightgreen;">53,96%<div class="delta delta-c-da " style="display: none;">(-0,48%)</div></td><td data-sort-index="6" data-sort="19378" align="right" class="c1" width="60">19.378</td><td data-sort-index="6" data-sort="19378" align="right" class="c1">45,82%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26115" style="display: none;">19.378<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26115" style="display: none;">46,04%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="42092" align="right" bgcolor="lightpink">42.092 <br> <span class="delta">(-200) </span></td><td class="c1" data-sort-index="11" data-sort="425" align="right">425</td><td data-sort-index="12" class="c1" data-sort="0.011627906976744186" align="right" bgcolor="lightpink" title="1 TPS dari 86">1,16%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="86 TPS dari 86">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="PONDOK KELAPA"><a href="javascript:set_hie(4,26116)">PONDOK KELAPA</a></td><td data-sort-index="2" data-sort="22485" align="right" width="60" class="c1">22.485</td><td data-sort-index="2" data-sort="22485" align="right" class="c1" bgcolor="lightgreen">52,61%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26116" style="display: none;">22.696<div class="delta delta-c-da complete" style="display: none;">(+211)</div></td><td align="right" class="da1" id="da_pb_p_26116" style="display: none; background-color: lightgreen;">52,69%<div class="delta delta-c-da " style="display: none;">(+0,08%)</div></td><td data-sort-index="6" data-sort="20256" align="right" class="c1" width="60">20.256</td><td data-sort-index="6" data-sort="20256" align="right" class="c1">47,39%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26116" style="display: none;">20.377<div class="delta delta-c-da complete" style="display: none;">(+121)</div></td><td align="right" class="da1" id="da_jk_p_26116" style="display: none;">47,31%<div class="delta delta-c-da " style="display: none;">(-0,08%)</div></td><td class="c1" data-sort-index="10" data-sort="42741" align="right">42.741</td><td class="c1" data-sort-index="11" data-sort="443" align="right">443</td><td data-sort-index="12" class="c1" data-sort="0.010309278350515464" align="right" bgcolor="lightpink" title="1 TPS dari 97">1,03%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="97 TPS dari 97">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="MALAKA SARI"><a href="javascript:set_hie(4,26117)">MALAKA SARI</a></td><td data-sort-index="2" data-sort="9705" align="right" width="60" class="c1">9.705</td><td data-sort-index="2" data-sort="9705" align="right" class="c1" bgcolor="lightgreen">52,94%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26117" style="display: none;">9.705<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26117" style="display: none; background-color: lightgreen;">52,94%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="8626" align="right" class="c1" width="60">8.626</td><td data-sort-index="6" data-sort="8626" align="right" class="c1">47,06%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26117" style="display: none;">8.626<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26117" style="display: none;">47,06%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="18331" align="right">18.331</td><td class="c1" data-sort-index="11" data-sort="234" align="right">234</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 37">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="37 TPS dari 37">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="MALAKA JAYA"><a href="javascript:set_hie(4,26118)">MALAKA JAYA</a></td><td data-sort-index="2" data-sort="11001" align="right" width="60" class="c1">11.001</td><td data-sort-index="2" data-sort="11001" align="right" class="c1" bgcolor="lightgreen">55,98%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26118" style="display: none;">11.235<div class="delta delta-c-da complete" style="display: none;">(+234)</div></td><td align="right" class="da1" id="da_pb_p_26118" style="display: none; background-color: lightgreen;">55,92%<div class="delta delta-c-da " style="display: none;">(-0,06%)</div></td><td data-sort-index="6" data-sort="8652" align="right" class="c1" width="60">8.652</td><td data-sort-index="6" data-sort="8652" align="right" class="c1">44,02%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26118" style="display: none;">8.856<div class="delta delta-c-da complete" style="display: none;">(+204)</div></td><td align="right" class="da1" id="da_jk_p_26118" style="display: none;">44,08%<div class="delta delta-c-da " style="display: none;">(+0,06%)</div></td><td class="c1" data-sort-index="10" data-sort="19653" align="right">19.653</td><td class="c1" data-sort-index="11" data-sort="246" align="right">246</td><td data-sort-index="12" class="c1" data-sort="0.046511627906976744" align="right" bgcolor="lightpink" title="2 TPS dari 43">4,65%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="PONDOK KOPI"><a href="javascript:set_hie(4,26119)">PONDOK KOPI</a></td><td data-sort-index="2" data-sort="10495" align="right" width="60" class="c1">10.495</td><td data-sort-index="2" data-sort="10495" align="right" class="c1" bgcolor="lightgreen">50,42%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26119" style="display: none;">10.495<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26119" style="display: none; background-color: lightgreen;">50,42%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="10320" align="right" class="c1" width="60">10.320</td><td data-sort-index="6" data-sort="10320" align="right" class="c1">49,58%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26119" style="display: none;">10.320<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26119" style="display: none;">49,58%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="20815" align="right">20.815</td><td class="c1" data-sort-index="11" data-sort="218" align="right">218</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 43">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">116.609</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">52,57%</td><td align="right" class="da1 da_pb_ct" style="display: none;">117.132</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">52,54%</td><td align="right" class="c1" width="60">105.192</td><td align="right" class="c1jkp c1">47,43%</td><td align="right" class="da1 da_jk_ct" style="display: none;">105.800</td><td align="right" class="da1 da_jk_pt" style="display: none;">47,46%</td><td class="c1" align="right">221.601 <br> <span class="delta">(-200)</span></td><td class="c1" align="right">2.252</td><td align="right" class="c1" title="6 TPS dari 463">1,30%</td><td align="right" class="c1" bgcolor="lightgreen" title="463 TPS dari 463">100,00%</td></tr></tbody></table>
																	</div>
																	<div class="tab-pane fade" id="tab_61_10">
																		<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">83.631</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">56,27%</td><td align="right" class="da1 da_pb_ct" style="display: none;">84.430</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">56,26%</td><td align="right" class="c1" width="60">65.001</td><td align="right" class="c1jkp c1">43,73%</td><td align="right" class="da1 da_jk_ct" style="display: none;">65.653</td><td align="right" class="da1 da_jk_pt" style="display: none;">43,74%</td><td class="c1" align="right">148.566 <br> <span class="delta">(-66)</span></td><td class="c1" align="right">1.437</td><td align="right" class="c1" title="5 TPS dari 315">1,59%</td><td align="right" class="c1" bgcolor="lightgreen" title="315 TPS dari 315">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="KRAMATJATI"><a href="javascript:set_hie(4,26091)">KRAMATJATI</a></td><td data-sort-index="2" data-sort="10374" align="right" width="60" class="c1">10.374</td><td data-sort-index="2" data-sort="10374" align="right" class="c1" bgcolor="lightgreen">51,66%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26091" style="display: none;">10.374<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26091" style="display: none; background-color: lightgreen;">51,66%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="9708" align="right" class="c1" width="60">9.708</td><td data-sort-index="6" data-sort="9708" align="right" class="c1">48,34%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26091" style="display: none;">9.708<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26091" style="display: none;">48,34%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="20082" align="right">20.082</td><td class="c1" data-sort-index="11" data-sort="222" align="right">222</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 44">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="44 TPS dari 44">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="TENGAH"><a href="javascript:set_hie(4,26092)">TENGAH</a></td><td data-sort-index="2" data-sort="12898" align="right" width="60" class="c1">12.898</td><td data-sort-index="2" data-sort="12898" align="right" class="c1" bgcolor="lightgreen">51,84%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26092" style="display: none;">13.022<div class="delta delta-c-da complete" style="display: none;">(+124)</div></td><td align="right" class="da1" id="da_pb_p_26092" style="display: none; background-color: lightgreen;">51,70%<div class="delta delta-c-da " style="display: none;">(-0,28%)</div></td><td data-sort-index="6" data-sort="11982" align="right" class="c1" width="60">11.982</td><td data-sort-index="6" data-sort="11982" align="right" class="c1">48,16%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26092" style="display: none;">12.167<div class="delta delta-c-da complete" style="display: none;">(+185)</div></td><td align="right" class="da1" id="da_jk_p_26092" style="display: none;">48,30%<div class="delta delta-c-da " style="display: none;">(+0,02%)</div></td><td class="c1" data-sort-index="10" data-sort="24814" align="right" bgcolor="lightpink">24.814 <br> <span class="delta">(-66) </span></td><td class="c1" data-sort-index="11" data-sort="249" align="right">249</td><td data-sort-index="12" class="c1" data-sort="0.05454545454545454" align="right" bgcolor="lightpink" title="3 TPS dari 55">5,45%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="55 TPS dari 55">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="DUKUH"><a href="javascript:set_hie(4,26093)">DUKUH</a></td><td data-sort-index="2" data-sort="7706" align="right" width="60" class="c1">7.706</td><td data-sort-index="2" data-sort="7706" align="right" class="c1" bgcolor="lightgreen">55,07%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26093" style="display: none;">7.954<div class="delta delta-c-da complete" style="display: none;">(+248)</div></td><td align="right" class="da1" id="da_pb_p_26093" style="display: none; background-color: lightgreen;">54,88%<div class="delta delta-c-da " style="display: none;">(-0,19%)</div></td><td data-sort-index="6" data-sort="6287" align="right" class="c1" width="60">6.287</td><td data-sort-index="6" data-sort="6287" align="right" class="c1">44,93%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26093" style="display: none;">6.540<div class="delta delta-c-da complete" style="display: none;">(+253)</div></td><td align="right" class="da1" id="da_jk_p_26093" style="display: none;">45,12%<div class="delta delta-c-da " style="display: none;">(+0,19%)</div></td><td class="c1" data-sort-index="10" data-sort="13993" align="right">13.993</td><td class="c1" data-sort-index="11" data-sort="147" align="right">147</td><td data-sort-index="12" class="c1" data-sort="0.03333333333333333" align="right" bgcolor="lightpink" title="1 TPS dari 30">3,33%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="30 TPS dari 30">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="BATU AMPAR"><a href="javascript:set_hie(4,26094)">BATU AMPAR</a></td><td data-sort-index="2" data-sort="16647" align="right" width="60" class="c1">16.647</td><td data-sort-index="2" data-sort="16647" align="right" class="c1" bgcolor="lightgreen">60,12%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26094" style="display: none;">16.653<div class="delta delta-c-da complete" style="display: none;">(+6)</div></td><td align="right" class="da1" id="da_pb_p_26094" style="display: none; background-color: lightgreen;">60,13%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td data-sort-index="6" data-sort="11041" align="right" class="c1" width="60">11.041</td><td data-sort-index="6" data-sort="11041" align="right" class="c1">39,88%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26094" style="display: none;">11.041<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26094" style="display: none;">39,87%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td class="c1" data-sort-index="10" data-sort="27688" align="right">27.688</td><td class="c1" data-sort-index="11" data-sort="247" align="right">247</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 51">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="51 TPS dari 51">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="BALEKAMBANG"><a href="javascript:set_hie(4,26095)">BALEKAMBANG</a></td><td data-sort-index="2" data-sort="10760" align="right" width="60" class="c1">10.760</td><td data-sort-index="2" data-sort="10760" align="right" class="c1" bgcolor="lightgreen">64,40%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26095" style="display: none;">10.777<div class="delta delta-c-da complete" style="display: none;">(+17)</div></td><td align="right" class="da1" id="da_pb_p_26095" style="display: none; background-color: lightgreen;">64,20%<div class="delta delta-c-da " style="display: none;">(-0,20%)</div></td><td data-sort-index="6" data-sort="5947" align="right" class="c1" width="60">5.947</td><td data-sort-index="6" data-sort="5947" align="right" class="c1">35,60%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26095" style="display: none;">6.009<div class="delta delta-c-da complete" style="display: none;">(+62)</div></td><td align="right" class="da1" id="da_jk_p_26095" style="display: none;">35,80%<div class="delta delta-c-da " style="display: none;">(+0,20%)</div></td><td class="c1" data-sort-index="10" data-sort="16707" align="right">16.707</td><td class="c1" data-sort-index="11" data-sort="169" align="right">169</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 36">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="36 TPS dari 36">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="CILILITAN"><a href="javascript:set_hie(4,26096)">CILILITAN</a></td><td data-sort-index="2" data-sort="14481" align="right" width="60" class="c1">14.481</td><td data-sort-index="2" data-sort="14481" align="right" class="c1" bgcolor="lightgreen">57,45%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26096" style="display: none;">14.481<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26096" style="display: none; background-color: lightgreen;">57,45%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="10724" align="right" class="c1" width="60">10.724</td><td data-sort-index="6" data-sort="10724" align="right" class="c1">42,55%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26096" style="display: none;">10.724<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_jk_p_26096" style="display: none;">42,55%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="25205" align="right">25.205</td><td class="c1" data-sort-index="11" data-sort="214" align="right">214</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 56">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="56 TPS dari 56">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="CAWANG"><a href="javascript:set_hie(4,26097)">CAWANG</a></td><td data-sort-index="2" data-sort="10765" align="right" width="60" class="c1">10.765</td><td data-sort-index="2" data-sort="10765" align="right" class="c1" bgcolor="lightgreen">53,62%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26097" style="display: none;">11.169<div class="delta delta-c-da complete" style="display: none;">(+404)</div></td><td align="right" class="da1" id="da_pb_p_26097" style="display: none; background-color: lightgreen;">54,13%<div class="delta delta-c-da red" style="display: none;">(+0,51%)</div></td><td data-sort-index="6" data-sort="9312" align="right" class="c1" width="60">9.312</td><td data-sort-index="6" data-sort="9312" align="right" class="c1">46,38%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26097" style="display: none;">9.464<div class="delta delta-c-da complete" style="display: none;">(+152)</div></td><td align="right" class="da1" id="da_jk_p_26097" style="display: none;">45,87%<div class="delta delta-c-da red" style="display: none;">(-0,51%)</div></td><td class="c1" data-sort-index="10" data-sort="20077" align="right">20.077</td><td class="c1" data-sort-index="11" data-sort="189" align="right">189</td><td data-sort-index="12" class="c1" data-sort="0.023255813953488372" align="right" bgcolor="lightpink" title="1 TPS dari 43">2,33%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="43 TPS dari 43">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">83.631</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">56,27%</td><td align="right" class="da1 da_pb_ct" style="display: none;">84.430</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">56,26%</td><td align="right" class="c1" width="60">65.001</td><td align="right" class="c1jkp c1">43,73%</td><td align="right" class="da1 da_jk_ct" style="display: none;">65.653</td><td align="right" class="da1 da_jk_pt" style="display: none;">43,74%</td><td class="c1" align="right">148.566 <br> <span class="delta">(-66)</span></td><td class="c1" align="right">1.437</td><td align="right" class="c1" title="5 TPS dari 315">1,59%</td><td align="right" class="c1" bgcolor="lightgreen" title="315 TPS dari 315">100,00%</td></tr></tbody></table>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="tab_15_3">
														<!-- <div class='row'>
														<div class="col-md-6">
														<p>1. Majelis taklim</p>
														<p>2. PKK</p>
														<p>3. Posyandu</p>
														<p>4. Jumantik</p>
														<p>5. Dasawisma</p>
														<p>6. Kyai,  Habaib,  DKM</p>
														<p>7. Ustadzah</p>
														<p>8. Karang Taruna / Pemuda Lingkungan</p>
														<p>9. FBR</p>
														<p>10. FORKABI</p>
														<p>11. FPI</p>
														<p>12. Mantan pejabat/pimpinan partai/legislatif</p> 
														<p>13. RT RW</p>
														<p>14. FKMS / Pokdan / Mitra Koramil / FKDM</p>
														<p>15. Paguyuban Kesukuan</p>
														<p>16. Komunitas sepeda</p>
														</div>
														<div class="col-md-6">
														<p>17. Komunitas buruh</p>
														<p>18. Komunitas Jakmania</p>
														<p>19. Pelajar/Mahasiswa</p>
														<p>20. Pendidikan (yayasan,  sekolah,  guru,  dosen)</p>
														<p>21. Komunitas Olahraga (bola,  futsal,  panahan,  dll)</p>
														<p>22. Komunitas senam (lansia,  aerobik,  dll) </p>
														<p>23. Kesehatan (RS,  Puskesmas,  dokter,  bidan,  perawat)</p> 
														<p>24. Profesional (akuntan,  arsitek,  konsultan,  psikolog,  dll) </p>
														<p>25. Hukum (pengacara,  notaris,  hakim,  jaksa,  pembuat akta tanah,  dll)</p> 
														<p>26. Pengusaha (properti,  angkutan,  travel,  dll) </p>
														<p>27. Pedagang Pasar</p>
														<p>28. Pedagang kaki lima / umkm</p>
														<p>29. Ojek online</p>
														<p>30. Bank,  BPR,  Koperasi</p>
														<p>31. Pengangguran</p></div></div> -->
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<?php
																	$where_kec = array(
																		'id_kabupaten' => '3172'
																	);
																	$datakec = $this->Main_model->getSelectedData('kecamatan',$where_kec);
																	$nomor_kec = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<li class="<?php if($nomor_kec=='0'){echo'active';}else{echo'';} ?>">
																				<a href="#seg<?= $d_kec->id_kecamatan; ?>" data-toggle="tab"> <?= $d_kec->nm_kecamatan; ?> </a>
																			</li>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<?php
																	$nomor_kel = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<div class="tab-pane <?php if($nomor_kel=='0'){echo'active';}else{echo'fade';} ?>" id="seg<?= $d_kec->id_kecamatan; ?>">
																		<?php
																		$where_kel = array(
																			'id_kecamatan' => $d_kec->id_kecamatan
																		);
																		$datakel = $this->Main_model->getSelectedData('desa',$where_kel);
																		?>
																			<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
																					<td style="text-align: center;">Nama Daerah</td>
																					<td style="text-align: center;">Segmentasi</td>
																				</tr>
																				<?php
																				foreach ($datakel as $key => $value) {
																					echo '<tr>
																					<td>'.$value->nm_desa.'</td>
																					<td style="text-align: center;"><a data-toggle="modal" class="view_data4 btn btn-sm green" data-target="#myModal4" id="'.$value->id_desa.'"> Detail </a>
																					</td>
																					</tr>';
																				}
																				?>
																			</table>
																		</div>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="tab_15_4">
														<!-- <div class='row'>
														<div class="col-md-6">
														<p>1. Sumber daya manusia-pendidikan dasar</p>
														<p>2. Tenaga kerja, pengangguran</p>
														<p>3. Lingkungan hidup,air, sungai, sampah</p>
														<p>4. Ukm, usaha rumahan</p>
														<p>5. Pangan/perumahan</p>
														<p>6. Layanan kesehatan dasar</p>
														</div><div class="col-md-6">
														<p>7. Pelayanan publik, pembangunan infrastruktur</p> 
														<p>8. Seni budaya dan olahraga</p>
														<p>9. Keagamaan, masjid, pesantren</p>
														<p>10. Kepemudaan, pelajar, mahasiswa</p> 
														<p>11. Tokoh wanita, keluarga</p>
														<p>12. Pertanian, peternakan, perikanan</p></div></div> -->
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<?php
																	$where_kec = array(
																		'id_kabupaten' => '3172'
																	);
																	$datakec = $this->Main_model->getSelectedData('kecamatan',$where_kec);
																	$nomor_kec = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<li class="<?php if($nomor_kec=='0'){echo'active';}else{echo'';} ?>">
																				<a href="#t<?= $d_kec->id_kecamatan; ?>" data-toggle="tab"> <?= $d_kec->nm_kecamatan; ?> </a>
																			</li>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<?php
																	$nomor_kel = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<div class="tab-pane <?php if($nomor_kel=='0'){echo'active';}else{echo'fade';} ?>" id="t<?= $d_kec->id_kecamatan; ?>">
																		<?php
																		$where_kel = array(
																			'id_kecamatan' => $d_kec->id_kecamatan
																		);
																		$datakel = $this->Main_model->getSelectedData('desa',$where_kel);
																		?>
																			<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
																					<td style="text-align: center;">Nama Daerah</td>
																					<td style="text-align: center;">Sebaran Tokoh</td>
																				</tr>
																				<?php
																				foreach ($datakel as $key => $value) {
																					echo '<tr>
																					<td>'.$value->nm_desa.'</td>
																					<td style="text-align: center;"><a data-toggle="modal" class="view_data3 btn btn-sm green" data-target="#myModal3" id="'.$value->id_desa.'"> Detail </a>
																					</td>
																					</tr>';
																				}
																				?>
																			</table>
																		</div>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="tab_15_5">
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<?php
																	$where_kec = array(
																		'id_kabupaten' => '3172'
																	);
																	$datakec = $this->Main_model->getSelectedData('kecamatan',$where_kec);
																	$nomor_kec = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<li class="<?php if($nomor_kec=='0'){echo'active';}else{echo'';} ?>">
																				<a href="#<?= $d_kec->id_kecamatan; ?>" data-toggle="tab"> <?= $d_kec->nm_kecamatan; ?> </a>
																			</li>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<?php
																	$nomor_kel = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<div class="tab-pane <?php if($nomor_kel=='0'){echo'active';}else{echo'fade';} ?>" id="<?= $d_kec->id_kecamatan; ?>">
																		<?php
																		$where_kel = array(
																			'id_kecamatan' => $d_kec->id_kecamatan
																		);
																		$datakel = $this->Main_model->getSelectedData('desa',$where_kel);
																		?>
																			<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
																					<td>Nama Daerah</td>
																					<td style="text-align: center;">Pemilih</td>
																					<td style="text-align: center;">Kinerja 62%</td>
																					<td style="text-align: center;">Suara 30%</td>
																					<td style="text-align: center;">Coverage RW</td>
																				</tr>
																				<?php
																				foreach ($datakel as $key => $value) {
																					$url1 = 'https://andro.sitri.online/api/coverageall/wilayah/'.$value->id_desa;
																					$datacoverage = $this->Main_model->getAPI($url1);
																					echo '<tr>
																					<td>'.$value->nm_desa.'</td>
																					<td style="text-align: center;">'.number_format($value->dpt).'
																					</td>
																					<td style="text-align: center;">'.number_format($value->target_kinerja).'
																					</td>
																					<td style="text-align: center;">'.number_format($value->target_suara).'</td>
																					<td style="text-align: center;">'.$datacoverage['jumlah'].'</td>
																					</tr>';
																				}
																				?>
																			</table>
																		</div>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="tab_15_6">
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-3">
																<ul class="nav nav-tabs tabs-left">
																	<?php
																	$where_kec = array(
																		'id_kabupaten' => '3172'
																	);
																	$datakec = $this->Main_model->getSelectedData('kecamatan',$where_kec);
																	$nomor_kec = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<li class="<?php if($nomor_kec=='0'){echo'active';}else{echo'';} ?>">
																				<a href="#a<?= $d_kec->id_kecamatan; ?>" data-toggle="tab"> <?= $d_kec->nm_kecamatan; ?> </a>
																			</li>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</ul>
															</div>
															<div class="col-md-9 col-sm-9 col-xs-9">
																<div class="tab-content">
																	<?php
																	$nomor_kel = 0;
																	foreach($datakec as $d_kec){
																	?>
																		<div class="tab-pane <?php if($nomor_kel=='0'){echo'active';}else{echo'fade';} ?>" id="a<?= $d_kec->id_kecamatan; ?>">
																		<?php
																		$where_kel = array(
																			'id_kecamatan' => $d_kec->id_kecamatan
																		);
																		$datakel = $this->Main_model->getSelectedData('desa',$where_kel);
																		?>
																		<div class="table-scrollable">
																			<table class="table table-striped table-bordered table-hover"><tr>
																					<td style="text-align: center;" width="21%">Nama Daerah</td>
																					<td style="text-align: center;" width="16%">Jumlah RW</td>
																					<td style="text-align: center;" width="21%">Jumlah Kegiatan</td>
																					<td style="text-align: center;" width="21%">Suara yg Memilih</td>
																					<td style="text-align: center;" width="21%">Target (Persentase Suara)</td>
																				</tr>
																				<?php
																				foreach ($datakel as $key => $value) {
																					$url0 = 'https://andro.sitri.online/api/rw/desa/'.$value->id_desa;
																					$datarw = $this->Main_model->getAPI($url0);
																					$url1 = 'https://andro.sitri.online/api/coverageall/wilayah/'.$value->id_desa;
																					$datacoverage = $this->Main_model->getAPI($url1);
																					echo '<tr>
																					<td style="text-align: center;">'.$value->nm_desa.'</td>
																					<td style="text-align: center;">'.count($datarw).'</td>';
																				?>
																					<td style="text-align: center;">
																					<?php
																					// $ur21 = 'https://andro.sitri.online/api/rw/desa/'.$value->id_desa;
																					// $rwdesa = $this->Main_model->getAPI($ur21);
																					//foreach ($rwdesa as $key => $rwd) {
																						// $ur21111 = 'https://andro.sitri.online/api/kegiatan/rw/'.$rwd['Id_Rw'];
																						// $jumlah_keg = $this->Main_model->getAPI($ur21111);
																						// $cek_nama = array('Message'=>'Jumlah not found');
																						// if($jumlah_keg==$cek_nama){
																						// 	echo '';
																						// }else{
																						// echo 'RW '.$rwd['Nomor_Rw'].' = '.$jumlah_keg['Jumlah'].'; ';}
																						echo'<a data-toggle="modal" class="view_data btn btn-sm green" data-target="#myModal" id="'.$value->id_desa.'"> Detail </a>';
																					//}
																					?>
																					</td>
																					<td style="text-align: center;">
																					<?php
																					// $ur212 = 'https://andro.sitri.online/api/rw/desa/'.$value->id_desa;
																					// $rwdesaa = $this->Main_model->getAPI($ur212);
																					// foreach ($rwdesaa as $key => $rwds) {
																					// 	//echo 'RW '.$rwds['Nomor_Rw'].' = 0;';
																					// 	$ur211112 = 'https://andro.sitri.online/api/kegiatan/rw/'.$rwds['Id_Rw'];
																					// 	$jumlah_keg = $this->Main_model->getAPI($ur211112);
																					// 	$cek_nama = array('Message'=>'Jumlah not found');
																					// 	if($jumlah_keg==$cek_nama){
																					// 		echo '';
																					// 	}else{
																					// 	echo 'RW '.$rwds['Nomor_Rw'].' = '.$jumlah_keg['Jumlah'].'; ';}
																					// }
																					echo'<a data-toggle="modal" class="view_data2 btn btn-sm green" data-target="#myModal2" id="'.$value->id_desa.'"> Detail </a>';
																					?></td>
																					<td style="text-align: center;"><?php echo'<a data-toggle="modal" class="view_data5 btn btn-sm green" data-target="#myModal5" id="'.$value->id_desa.'"> Detail </a>'; ?>
																					</td>
																					</tr>
																				<?php
																				}
																				?>
																			</table>
																		</div></div>
																	<?php
																		$nomor_kec++;
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
						</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail"></div>
      </div>
      
    </div>
  </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Beranda/ajax_jumlah_kegiatan', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail2"></div>
      </div>
      
    </div>
  </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data2').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Beranda/ajax_suara_memilih', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail2').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal2').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail3"></div>
      </div>
      
    </div>
  </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data3').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Beranda/ajax_tokoh', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail3').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal3').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail4"></div>
      </div>
      
    </div>
  </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data4').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Beranda/ajax_segmentasi', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail4').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal4').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">

      <div class="modal-header" style="text-align: center;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail Data</h4>
    

      </div>
      <div class="modal-body">
        <div class="box box-primary" id="data_detail5"></div>
      </div>
      
    </div>
  </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data5').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo site_url(); ?>/Beranda/ajax_persentase_suara_memilih', // set url -> ini file yang menyimpan query tampil detail data gambar
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_detail5').html(data); // mengisi konten dari -> <div class="modal-body" id="data_gambar">
          $('#myModal5').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
</script>