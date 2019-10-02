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
								/*style the box which holds the text of the information window*/  
								.gm-style .gm-style-iw {
            width: 1000px !important;
            height: 1000px !important;
            min-height: 1200px !important;
         }    

         /*style the paragraph tag*/
         .gm-style .gm-style-iw #google-popup p{
            padding: 1000px;
         }


        /*style the annoying little arrow at the bottom*/
        .gm-style div div div div div div div div {
            margin: 0;
            padding: 0;
            top: 0;
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
                                        $nama = $value->nm_kecamatan;
                                        $lat = $value->lintang;
                                        $lon = $value->bujur;
                                        $id = $value->id_kecamatan;
                                        $url = site_url('Dashboard/peta_kec');
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
                                        $.post('<?php echo site_url()."/Beranda/ajax_peta"; ?>',{id:id},
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
                                var situs = 'https://kppnpan.id/assets/peta_kabupaten/';
                                var nama_file = '<?php echo $kml ?>';
                                var situs_full = situs.concat(nama_file);;
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
												<a href="#tab_15_4" data-toggle="tab"> Isu Strategis </a>
											</li>
											<li>
												<a href="#tab_15_5" data-toggle="tab"> Target Suara </a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_15_1">
												<div >
													<table class='table'>
													<tbody>
													<tr style="text-align: center;">
													<td><b>CAKUNG</b></td>
													<td>|</td>
													<td>339,038 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>MATRAMAN</b></td>
													<td>|</td>
													<td>131,119 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>PULOGADUNG</b></td>
													<td>|</td>
													<td>203,340 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>CIPAYUNG</b></td>
													<td>|</td>
													<td>177,061 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>CIRACAS</b></td>
													<td>|</td>
													<td>198,788 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>MAKASAR</b></td>
													<td>|</td>
													<td>133,586 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>PASAR REBO</b></td>
													<td>|</td>
													<td>137,942 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>DUREN SAWIT</b></td>
													<td>|</td>
													<td>286,954 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>JATINEGARA</b></td>
													<td>|</td>
													<td>219,444 Orang</td>
													</tr>
													<tr style="text-align: center;">
													<td><b>KRAMAT JATI</b></td>
													<td>|</td>
													<td>199,994 Orang</td>
													</tr>
													</tbody>
													</table>
											 	</div>
											</div>
											<div class="tab-pane" id="tab_15_2">
												<table class="table"><tbody><tr class="header" id="header" bgcolor="#DDDDDD">      <th onclick="sort(0)" width="40">No      </th><th onclick="sort(1)" width="225">Tempat      </th><th onclick="sort(2)" width="120" class="c1" colspan="2">Prabowo-Hatta<br>(C1)</th><th onclick="sort(3)" width="120" class="da1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DA1)</th><th onclick="sort(4)" width="120" class="db1" colspan="2" style="display: none;">Prabowo-Hatta<br>(DB1)</th><th onclick="sort(6)" width="120" class="c1" colspan="2">Jokowi-JK<br>(C1)</th><th onclick="sort(7)" width="120" class="da1" colspan="2" style="display: none;">Jokowi-JK<br>(DA1)</th><th onclick="sort(8)" width="120" class="db1" colspan="2" style="display: none;">Jokowi-JK<br>(DB1)</th><th onclick="sort(10)" class="c1" width="70">Suara sah      </th><th onclick="sort(11)" class="c1" width="70">Tidak sah      </th><th onclick="sort(12)" class="c1" width="60">TPS Error      </th><th onclick="sort(13)" class="c1" width="60">TPS</th></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">823.612</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">53,62%</td><td align="right" class="da1 da_pb_ct" style="display: none;">827.874</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">53,60%</td><td align="right" class="db1 db_pb_ct" style="display: none;">827.874</td><td align="right" class="db1 db_pb_pt" style="display: none; background-color: lightgreen;">53,60%</td><td align="right" class="c1" width="60">712.496</td><td align="right" class="c1jkp c1">46,38%</td><td align="right" class="da1 da_jk_ct" style="display: none;">716.631</td><td align="right" class="da1 da_jk_pt" style="display: none;">46,40%</td><td align="right" class="db1 db_jk_ct" style="display: none;">716.631</td><td align="right" class="db1 db_jk_pt" style="display: none;">46,40%</td><td class="c1" align="right">1.535.864 <br> <span class="delta">(-244)</span></td><td class="c1" align="right">15.302</td><td align="right" class="c1" title="36 TPS dari 3.226">1,12%</td><td align="right" class="c1" bgcolor="lightgreen" title="3.226 TPS dari 3.226">100,00%</td></tr><tr class="datarow" id="row0"><td align="center" data-sort-index="0" data-sort="0">1</td><td data-sort-index="1" data-sort="MATRAMAN"><a href="javascript:set_hie(3,26066)">MATRAMAN</a></td><td data-sort-index="2" data-sort="51239" align="right" width="60" class="c1">51.239</td><td data-sort-index="2" data-sort="51239" align="right" class="c1" bgcolor="lightgreen">52,84%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26066" style="display: none;">51.239<div class="delta delta-c-da complete" style="display: none;">(0)</div></td><td align="right" class="da1" id="da_pb_p_26066" style="display: none; background-color: lightgreen;">52,87%<div class="delta delta-c-da " style="display: none;">(+0,03%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26066" style="display: none;">51.239<div class="delta delta-c-db complete" style="display: none;">(0)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26066" style="display: none; background-color: lightgreen;">52,87%<div class="delta delta-c-db " style="display: none;">(+0,03%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="45727" align="right" class="c1" width="60">45.727</td><td data-sort-index="6" data-sort="45727" align="right" class="c1">47,16%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26066" style="display: none;">45.677<div class="delta delta-c-da complete" style="display: none;">(-50)</div></td><td align="right" class="da1" id="da_jk_p_26066" style="display: none;">47,13%<div class="delta delta-c-da " style="display: none;">(-0,03%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26066" style="display: none;">45.677<div class="delta delta-c-db complete" style="display: none;">(-50)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26066" style="display: none;">47,13%<div class="delta delta-c-db " style="display: none;">(-0,03%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="96966" align="right">96.966</td><td class="c1" data-sort-index="11" data-sort="1142" align="right">1.142</td><td data-sort-index="12" class="c1" data-sort="0" align="right" title="0 TPS dari 208">0,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="208 TPS dari 208">100,00%</td></tr><tr class="datarow" id="row1"><td align="center" data-sort-index="0" data-sort="1">2</td><td data-sort-index="1" data-sort="PULOGADUNG"><a href="javascript:set_hie(3,26073)">PULOGADUNG</a></td><td data-sort-index="2" data-sort="73849" align="right" width="60" class="c1">73.849</td><td data-sort-index="2" data-sort="73849" align="right" class="c1">47,51%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26073" style="display: none;">74.138<div class="delta delta-c-da complete" style="display: none;">(+289)</div></td><td align="right" class="da1" id="da_pb_p_26073" style="display: none;">47,56%<div class="delta delta-c-da " style="display: none;">(+0,09%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26073" style="display: none;">74.138<div class="delta delta-c-db complete" style="display: none;">(+289)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26073" style="display: none;">47,56%<div class="delta delta-c-db " style="display: none;">(+0,09%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="81602" align="right" class="c1" width="60">81.602</td><td data-sort-index="6" data-sort="81602" align="right" class="c1" bgcolor="lightgreen">52,49%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26073" style="display: none;">81.732<div class="delta delta-c-da complete" style="display: none;">(+130)</div></td><td align="right" class="da1" id="da_jk_p_26073" style="display: none; background-color: lightgreen;">52,44%<div class="delta delta-c-da " style="display: none;">(-0,03%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26073" style="display: none;">81.732<div class="delta delta-c-db complete" style="display: none;">(+130)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26073" style="display: none; background-color: lightgreen;">52,44%<div class="delta delta-c-db " style="display: none;">(-0,03%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="155546" align="right" bgcolor="lightpink">155.546 <br> <span class="delta">(+95) </span></td><td class="c1" data-sort-index="11" data-sort="1633" align="right">1.633</td><td data-sort-index="12" class="c1" data-sort="0.009554140127388535" align="right" bgcolor="lightpink" title="3 TPS dari 314">0,96%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="314 TPS dari 314">100,00%</td></tr><tr class="datarow" id="row2"><td align="center" data-sort-index="0" data-sort="2">3</td><td data-sort-index="1" data-sort="JATINEGARA"><a href="javascript:set_hie(3,26081)">JATINEGARA</a></td><td data-sort-index="2" data-sort="91058" align="right" width="60" class="c1">91.058</td><td data-sort-index="2" data-sort="91058" align="right" class="c1" bgcolor="lightgreen">52,44%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26081" style="display: none;">91.053<div class="delta delta-c-da complete" style="display: none;">(-5)</div></td><td align="right" class="da1" id="da_pb_p_26081" style="display: none; background-color: lightgreen;">52,44%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26081" style="display: none;">91.053<div class="delta delta-c-db complete" style="display: none;">(-5)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26081" style="display: none; background-color: lightgreen;">52,44%<div class="delta delta-c-db " style="display: none;">(0,00%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="82598" align="right" class="c1" width="60">82.598</td><td data-sort-index="6" data-sort="82598" align="right" class="c1">47,56%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26081" style="display: none;">82.591<div class="delta delta-c-da complete" style="display: none;">(-7)</div></td><td align="right" class="da1" id="da_jk_p_26081" style="display: none;">47,56%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26081" style="display: none;">82.591<div class="delta delta-c-db complete" style="display: none;">(-7)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26081" style="display: none;">47,56%<div class="delta delta-c-db " style="display: none;">(0,00%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="173656" align="right">173.656</td><td class="c1" data-sort-index="11" data-sort="1787" align="right">1.787</td><td data-sort-index="12" class="c1" data-sort="0.0027247956403269754" align="right" bgcolor="lightpink" title="1 TPS dari 367">0,27%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="367 TPS dari 367">100,00%</td></tr><tr class="datarow" id="row3"><td align="center" data-sort-index="0" data-sort="3">4</td><td data-sort-index="1" data-sort="KRAMATJATI"><a href="javascript:set_hie(3,26090)">KRAMATJATI</a></td><td data-sort-index="2" data-sort="83631" align="right" width="60" class="c1">83.631</td><td data-sort-index="2" data-sort="83631" align="right" class="c1" bgcolor="lightgreen">56,27%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26090" style="display: none;">84.430<div class="delta delta-c-da complete" style="display: none;">(+799)</div></td><td align="right" class="da1" id="da_pb_p_26090" style="display: none; background-color: lightgreen;">56,26%<div class="delta delta-c-da " style="display: none;">(-0,04%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26090" style="display: none;">84.430<div class="delta delta-c-db complete" style="display: none;">(+799)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26090" style="display: none; background-color: lightgreen;">56,26%<div class="delta delta-c-db " style="display: none;">(-0,04%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="65001" align="right" class="c1" width="60">65.001</td><td data-sort-index="6" data-sort="65001" align="right" class="c1">43,73%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26090" style="display: none;">65.653<div class="delta delta-c-da complete" style="display: none;">(+652)</div></td><td align="right" class="da1" id="da_jk_p_26090" style="display: none;">43,74%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26090" style="display: none;">65.653<div class="delta delta-c-db complete" style="display: none;">(+652)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26090" style="display: none;">43,74%<div class="delta delta-c-db " style="display: none;">(0,01%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="148566" align="right" bgcolor="lightpink">148.566 <br> <span class="delta">(-66) </span></td><td class="c1" data-sort-index="11" data-sort="1437" align="right">1.437</td><td data-sort-index="12" class="c1" data-sort="0.015873015873015872" align="right" bgcolor="lightpink" title="5 TPS dari 315">1,59%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="315 TPS dari 315">100,00%</td></tr><tr class="datarow" id="row4"><td align="center" data-sort-index="0" data-sort="4">5</td><td data-sort-index="1" data-sort="PASAR REBO"><a href="javascript:set_hie(3,26098)">PASAR REBO</a></td><td data-sort-index="2" data-sort="61183" align="right" width="60" class="c1">61.183</td><td data-sort-index="2" data-sort="61183" align="right" class="c1" bgcolor="lightgreen">57,42%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26098" style="display: none;">61.182<div class="delta delta-c-da complete" style="display: none;">(-1)</div></td><td align="right" class="da1" id="da_pb_p_26098" style="display: none; background-color: lightgreen;">57,47%<div class="delta delta-c-da " style="display: none;">(0,00%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26098" style="display: none;">61.182<div class="delta delta-c-db complete" style="display: none;">(-1)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26098" style="display: none; background-color: lightgreen;">57,47%<div class="delta delta-c-db " style="display: none;">(0,00%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="45374" align="right" class="c1" width="60">45.374</td><td data-sort-index="6" data-sort="45374" align="right" class="c1">42,58%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26098" style="display: none;">45.274<div class="delta delta-c-da complete" style="display: none;">(-100)</div></td><td align="right" class="da1" id="da_jk_p_26098" style="display: none;">42,53%<div class="delta delta-c-da " style="display: none;">(-0,09%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26098" style="display: none;">45.274<div class="delta delta-c-db complete" style="display: none;">(-100)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26098" style="display: none;">42,53%<div class="delta delta-c-db " style="display: none;">(-0,09%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="106456" align="right" bgcolor="lightpink">106.456 <br> <span class="delta">(-101) </span></td><td class="c1" data-sort-index="11" data-sort="1005" align="right">1.005</td><td data-sort-index="12" class="c1" data-sort="0.01" align="right" bgcolor="lightpink" title="2 TPS dari 200">1,00%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="200 TPS dari 200">100,00%</td></tr><tr class="datarow" id="row5"><td align="center" data-sort-index="0" data-sort="5">6</td><td data-sort-index="1" data-sort="CAKUNG"><a href="javascript:set_hie(3,26104)">CAKUNG</a></td><td data-sort-index="2" data-sort="139302" align="right" width="60" class="c1">139.302</td><td data-sort-index="2" data-sort="139302" align="right" class="c1" bgcolor="lightgreen">55,54%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26104" style="display: none;">140.278<div class="delta delta-c-da complete" style="display: none;">(+976)</div></td><td align="right" class="da1" id="da_pb_p_26104" style="display: none; background-color: lightgreen;">55,43%<div class="delta delta-c-da " style="display: none;">(-0,11%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26104" style="display: none;">140.278<div class="delta delta-c-db complete" style="display: none;">(+976)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26104" style="display: none; background-color: lightgreen;">55,43%<div class="delta delta-c-db " style="display: none;">(-0,11%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="111500" align="right" class="c1" width="60">111.500</td><td data-sort-index="6" data-sort="111500" align="right" class="c1">44,46%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26104" style="display: none;">112.816<div class="delta delta-c-da complete" style="display: none;">(+1.316)</div></td><td align="right" class="da1" id="da_jk_p_26104" style="display: none;">44,57%<div class="delta delta-c-da " style="display: none;">(+0,12%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26104" style="display: none;">112.816<div class="delta delta-c-db complete" style="display: none;">(+1.316)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26104" style="display: none;">44,57%<div class="delta delta-c-db " style="display: none;">(+0,12%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="250830" align="right" bgcolor="lightpink">250.830 <br> <span class="delta">(+28) </span></td><td class="c1" data-sort-index="11" data-sort="2037" align="right">2.037</td><td data-sort-index="12" class="c1" data-sort="0.014925373134328358" align="right" bgcolor="lightpink" title="9 TPS dari 603">1,49%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="603 TPS dari 603">100,00%</td></tr><tr class="datarow" id="row6"><td align="center" data-sort-index="0" data-sort="6">7</td><td data-sort-index="1" data-sort="DUREN SAWIT"><a href="javascript:set_hie(3,26112)">DUREN SAWIT</a></td><td data-sort-index="2" data-sort="116609" align="right" width="60" class="c1">116.609</td><td data-sort-index="2" data-sort="116609" align="right" class="c1" bgcolor="lightgreen">52,57%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26112" style="display: none;">117.132<div class="delta delta-c-da complete" style="display: none;">(+523)</div></td><td align="right" class="da1" id="da_pb_p_26112" style="display: none; background-color: lightgreen;">52,54%<div class="delta delta-c-da " style="display: none;">(-0,08%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26112" style="display: none;">117.132<div class="delta delta-c-db complete" style="display: none;">(+523)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26112" style="display: none; background-color: lightgreen;">52,54%<div class="delta delta-c-db " style="display: none;">(-0,08%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="105192" align="right" class="c1" width="60">105.192</td><td data-sort-index="6" data-sort="105192" align="right" class="c1">47,43%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26112" style="display: none;">105.800<div class="delta delta-c-da complete" style="display: none;">(+608)</div></td><td align="right" class="da1" id="da_jk_p_26112" style="display: none;">47,46%<div class="delta delta-c-da " style="display: none;">(-0,01%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26112" style="display: none;">105.800<div class="delta delta-c-db complete" style="display: none;">(+608)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26112" style="display: none;">47,46%<div class="delta delta-c-db " style="display: none;">(-0,01%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="221601" align="right" bgcolor="lightpink">221.601 <br> <span class="delta">(-200) </span></td><td class="c1" data-sort-index="11" data-sort="2252" align="right">2.252</td><td data-sort-index="12" class="c1" data-sort="0.012958963282937365" align="right" bgcolor="lightpink" title="6 TPS dari 463">1,30%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="463 TPS dari 463">100,00%</td></tr><tr class="datarow" id="row7"><td align="center" data-sort-index="0" data-sort="7">8</td><td data-sort-index="1" data-sort="MAKASAR"><a href="javascript:set_hie(3,26120)">MAKASAR</a></td><td data-sort-index="2" data-sort="56027" align="right" width="60" class="c1">56.027</td><td data-sort-index="2" data-sort="56027" align="right" class="c1" bgcolor="lightgreen">52,59%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26120" style="display: none;">56.742<div class="delta delta-c-da complete" style="display: none;">(+715)</div></td><td align="right" class="da1" id="da_pb_p_26120" style="display: none; background-color: lightgreen;">52,49%<div class="delta delta-c-da " style="display: none;">(-0,10%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26120" style="display: none;">56.742<div class="delta delta-c-db complete" style="display: none;">(+715)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26120" style="display: none; background-color: lightgreen;">52,49%<div class="delta delta-c-db " style="display: none;">(-0,10%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="50506" align="right" class="c1" width="60">50.506</td><td data-sort-index="6" data-sort="50506" align="right" class="c1">47,41%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26120" style="display: none;">51.362<div class="delta delta-c-da complete" style="display: none;">(+856)</div></td><td align="right" class="da1" id="da_jk_p_26120" style="display: none;">47,51%<div class="delta delta-c-da " style="display: none;">(+0,10%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26120" style="display: none;">51.362<div class="delta delta-c-db complete" style="display: none;">(+856)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26120" style="display: none;">47,51%<div class="delta delta-c-db " style="display: none;">(+0,10%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="106533" align="right">106.533</td><td class="c1" data-sort-index="11" data-sort="1035" align="right">1.035</td><td data-sort-index="12" class="c1" data-sort="0.018018018018018018" align="right" bgcolor="lightpink" title="4 TPS dari 222">1,80%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="222 TPS dari 222">100,00%</td></tr><tr class="datarow" id="row8"><td align="center" data-sort-index="0" data-sort="8">9</td><td data-sort-index="1" data-sort="CIRACAS"><a href="javascript:set_hie(3,26126)">CIRACAS</a></td><td data-sort-index="2" data-sort="78423" align="right" width="60" class="c1">78.423</td><td data-sort-index="2" data-sort="78423" align="right" class="c1" bgcolor="lightgreen">53,23%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26126" style="display: none;">78.752<div class="delta delta-c-da complete" style="display: none;">(+329)</div></td><td align="right" class="da1" id="da_pb_p_26126" style="display: none; background-color: lightgreen;">53,23%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26126" style="display: none;">78.752<div class="delta delta-c-db complete" style="display: none;">(+329)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26126" style="display: none; background-color: lightgreen;">53,23%<div class="delta delta-c-db " style="display: none;">(0,01%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="68895" align="right" class="c1" width="60">68.895</td><td data-sort-index="6" data-sort="68895" align="right" class="c1">46,77%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26126" style="display: none;">69.201<div class="delta delta-c-da complete" style="display: none;">(+306)</div></td><td align="right" class="da1" id="da_jk_p_26126" style="display: none;">46,77%<div class="delta delta-c-da " style="display: none;">(0,01%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26126" style="display: none;">69.201<div class="delta delta-c-db complete" style="display: none;">(+306)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26126" style="display: none;">46,77%<div class="delta delta-c-db " style="display: none;">(0,01%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="147318" align="right">147.318</td><td class="c1" data-sort-index="11" data-sort="1660" align="right">1.660</td><td data-sort-index="12" class="c1" data-sort="0.011406844106463879" align="right" bgcolor="lightpink" title="3 TPS dari 263">1,14%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="263 TPS dari 263">100,00%</td></tr><tr class="datarow" id="row9"><td align="center" data-sort-index="0" data-sort="9">10</td><td data-sort-index="1" data-sort="CIPAYUNG"><a href="javascript:set_hie(3,26132)">CIPAYUNG</a></td><td data-sort-index="2" data-sort="72291" align="right" width="60" class="c1">72.291</td><td data-sort-index="2" data-sort="72291" align="right" class="c1" bgcolor="lightgreen">56,30%</td><td data-sort-index="3" align="right" class="da1" id="da_pb_c_26132" style="display: none;">72.928<div class="delta delta-c-da complete" style="display: none;">(+637)</div></td><td align="right" class="da1" id="da_pb_p_26132" style="display: none; background-color: lightgreen;">56,34%<div class="delta delta-c-da " style="display: none;">(+0,03%)</div></td><td data-sort-index="4" align="right" class="db1" id="db_pb_c_26132" style="display: none;">72.928<div class="delta delta-c-db complete" style="display: none;">(+637)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_pb_p_26132" style="display: none; background-color: lightgreen;">56,34%<div class="delta delta-c-db " style="display: none;">(+0,03%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td data-sort-index="6" data-sort="56101" align="right" class="c1" width="60">56.101</td><td data-sort-index="6" data-sort="56101" align="right" class="c1">43,70%</td><td data-sort-index="7" align="right" class="da1" id="da_jk_c_26132" style="display: none;">56.525<div class="delta delta-c-da complete" style="display: none;">(+424)</div></td><td align="right" class="da1" id="da_jk_p_26132" style="display: none;">43,66%<div class="delta delta-c-da " style="display: none;">(-0,03%)</div></td><td data-sort-index="8" align="right" class="db1" id="db_jk_c_26132" style="display: none;">56.525<div class="delta delta-c-db complete" style="display: none;">(+424)</div><div class="delta delta-da-db complete" style="display: none;">(0)</div></td><td align="right" class="db1" id="db_jk_p_26132" style="display: none;">43,66%<div class="delta delta-c-db " style="display: none;">(-0,03%)</div><div class="delta delta-da-db " style="display: none;">(0,00%)</div></td><td class="c1" data-sort-index="10" data-sort="128392" align="right">128.392</td><td class="c1" data-sort-index="11" data-sort="1314" align="right">1.314</td><td data-sort-index="12" class="c1" data-sort="0.01107011070110701" align="right" bgcolor="lightpink" title="3 TPS dari 271">1,11%</td><td data-sort-index="13" class="c1" data-sort="1" align="right" bgcolor="lightgreen" title="271 TPS dari 271">100,00%</td></tr><tr class="total"><td colspan="2">TOTAL</td><td align="right" class="c1" width="60">823.612</td><td align="right" class="c1pbp c1 win" style="background-color: lightgreen;">53,62%</td><td align="right" class="da1 da_pb_ct" style="display: none;">827.874</td><td align="right" class="da1 da_pb_pt" style="display: none; background-color: lightgreen;">53,60%</td><td align="right" class="db1 db_pb_ct" style="display: none;">827.874</td><td align="right" class="db1 db_pb_pt" style="display: none; background-color: lightgreen;">53,60%</td><td align="right" class="c1" width="60">712.496</td><td align="right" class="c1jkp c1">46,38%</td><td align="right" class="da1 da_jk_ct" style="display: none;">716.631</td><td align="right" class="da1 da_jk_pt" style="display: none;">46,40%</td><td align="right" class="db1 db_jk_ct" style="display: none;">716.631</td><td align="right" class="db1 db_jk_pt" style="display: none;">46,40%</td><td class="c1" align="right">1.535.864 <br> <span class="delta">(-244)</span></td><td class="c1" align="right">15.302</td><td align="right" class="c1" title="36 TPS dari 3.226">1,12%</td><td align="right" class="c1" bgcolor="lightgreen" title="3.226 TPS dari 3.226">100,00%</td></tr></tbody></table>
											</div>
											<div class="tab-pane" id="tab_15_3">
												<div class='row'>
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
												<p>31. Pengangguran</p></div></div>
											</div>
											<div class="tab-pane" id="tab_15_4">
												<div class='row'>
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
												<p>12. Pertanian, peternakan, perikanan</p></div></div>
											</div>
											<div class="tab-pane" id="tab_15_5">
												<?php
												echo '<table class="table table-striped table-bordered table-hover table-checkable order-column"><tr>
													<td>Nama Daerah</td>
													<td style="text-align: center;">Pemilih</td>
													<td style="text-align: center;">Kinerja 62%</td>
													<td style="text-align: center;">Suara 30%</td>
												</tr>
												<tr>
												<td>Makasar</td>
												<td style="text-align: center;">137,942</td>
												<td style="text-align: center;">68,020</td>
												<td style="text-align: center;">33,997</td>
												</tr>
												<tr>
												<td>Duren Sawit</td>
												<td style="text-align: center;">286,954</td>
												<td style="text-align: center;">141,542
												</td>
												<td style="text-align: center;">70,779</td>
												</tr>
												<tr>
												<td>Jatinegara</td>
												<td style="text-align: center;">219,444
												</td>
												<td style="text-align: center;">108,264
												</td>
												<td style="text-align: center;">54,115</td>
												</tr>
												<tr>
												<td>Cipayung</td>
												<td style="text-align: center;">177,061
												</td>
												<td style="text-align: center;">87,351
												</td>
												<td style="text-align: center;">43,683</td>
												</tr>
												<tr>
												<td>Pasar Rebo</td>
												<td style="text-align: center;">137,942
												</td>
												<td style="text-align: center;">68,020
												</td>
												<td style="text-align: center;">33,997</td>
												</tr>
												<tr>
												<td>Ciracas</td>
												<td style="text-align: center;">198,788
												</td>
												<td style="text-align: center;">98,085
												</td>
												<td style="text-align: center;">49,034</td>
												</tr>
												<tr>
												<td>Kramat Jati</td>
												<td style="text-align: center;">199,994
												</td>
												<td style="text-align: center;">98,647
												</td>
												<td style="text-align: center;">49,293</td>
												</tr>
												<tr>
												<td>Matraman</td>
												<td style="text-align: center;">131,119
												</td>
												<td style="text-align: center;">64,679
												</td>
												<td style="text-align: center;">32,338</td>
												</tr>
												<tr>
												<td>Pulo Gadung</td>
												<td style="text-align: center;">203,340
												</td>
												<td style="text-align: center;">100,326
												</td>
												<td style="text-align: center;">50,153</td>
												</tr>
												<tr>
												<td>Cakung</td>
												<td style="text-align: center;">339,038
												</td>
												<td style="text-align: center;">167,269
												</td>
												<td style="text-align: center;">83,657</td>
												</tr>
												</table>';
												?>
											</div>
										</div>
									</div>
									</div>
								</div>
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
                                    </div> -->
                                    
                                    
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-file-archive-o font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Hasil C1 Pemilu 2014</span>
                                                        <span class="caption-helper">Sumber : KPU RI</span>
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
                                                    
                                                    <form action="<?=base_url('Beranda/mulitple_deleted');?>" method="post" onsubmit="return deleteConfirm();"/>
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="btn-group">
                                                                    <button type='submit' id="sample_editable_1_new" class="btn sbold green"> Delete
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                                        <span></span>
                                                                    </label>
                                                                </th>
                                                                <th> Username </th>
                                                                <th> Email </th>
                                                                <th> Status </th>
                                                                <th> Joined </th>
                                                                <th> Actions </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> user1wow </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Blocked </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> restest </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-success"> Approved </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> foopl </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-info"> Info </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> weep </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Rejected </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> coop </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-info"> Info </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> pppol </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Suspended </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </form>
                                                    <script type="text/javascript">
                                                    function deleteConfirm(){
                                                        var result = confirm("Do you really want to delete records?");
                                                        if(result){
                                                            return true;
                                                        }else{
                                                            return false;
                                                        }
                                                    }
                                                    </script>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    
                                    
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="portlet light ">
                                            <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-edit font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Pilgub DKI Putaran 1</span>
                                                        <span class="caption-helper">Sumber : KPU DKI Jakarta</span>
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
                                                    
                                                    <form action="<?=base_url('Beranda/mulitple_deleted');?>" method="post" onsubmit="return deleteConfirm();"/>
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="btn-group">
                                                                    <button type='submit' id="sample_editable_1_new" class="btn sbold green"> Delete
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_4">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                                        <span></span>
                                                                    </label>
                                                                </th>
                                                                <th> Username </th>
                                                                <th> Email </th>
                                                                <th> Status </th>
                                                                <th> Joined </th>
                                                                <th> Actions </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> user1wow </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Blocked </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> restest </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-success"> Approved </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> foopl </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-info"> Info </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> weep </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Rejected </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> coop </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-info"> Info </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td> pppol </td>
                                                                <td>
                                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-sm label-danger"> Suspended </span>
                                                                </td>
                                                                <td class="center"> 12.12.2011 </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-docs"></i> New Post </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-tag"></i> New Comment </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-user"></i> New User </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-flag"></i> Comments
                                                                                    <span class="badge badge-success">4</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </form>
                                                    <script type="text/javascript">
                                                    function deleteConfirm(){
                                                        var result = confirm("Do you really want to delete records?");
                                                        if(result){
                                                            return true;
                                                        }else{
                                                            return false;
                                                        }
                                                    }
                                                    </script>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    
                                    
                                    <!-- <div class="row">
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
                                    </div> -->
                                    
                                    
                                    <!-- <div class="row">
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
                                    
                                    
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="portlet light ">
                                            <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-target font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Target Suara</span>
                                                        <span class="caption-helper">Dirancang oleh Tim Pemenangan PKS</span>
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
												
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </div>
                        </div>