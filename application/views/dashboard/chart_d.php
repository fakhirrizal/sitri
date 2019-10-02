<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
						
</script>
<?php $nilai = '3172020'; ?>
			<style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides4 {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container4 {
			max-width: 1000px;
			position: relative;
			margin: auto;
			}

			/* Next & previous buttons */
			.prev4, .next4 {
			cursor: pointer;
			position: absolute;
			top: 50%;
			width: auto;
			padding: 16px;
			margin-top: -22px;
			color: white;
			font-weight: bold;
			font-size: 18px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
			user-select: none;
			}

			/* Position the "next button" to the right */
			.next4 {
			right: 0;
			border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev4:hover, .next4:hover {
			background-color: rgba(0,0,0,0.8);
			}

			/* Caption text */
			.text4 {
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			bottom: 8px;
			width: 100%;
			text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext4 {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
			}

			/* The dots/bullets/indicators */
			.dot4 {
			cursor: pointer;
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
			}

			.active4, .dot4:hover {
			background-color: #717171;
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			.prev4, .next4,.text4 {font-size: 11px}
			}
			</style>
			<script>
			
			$(document).ready(function(){
                            $("#kec_pilih").change(function(){
								var value=$(this).val();	
								if(value=='3172020'){
									$('#3172020').show('fast');
									$('#3172030').hide('fast');
									//$('#coba2').hide('fast');
								}else if(value=='3172030'){
									//$('#coba2').show('fast');
									$('#3172020').hide('fast');
									$('#3172030').show('fast');
									//$('#coba1').hide('fast');
								}
                            });
						});
			</script>
										<!-- <br>
										<br>
										<div class="form-group select2-bootstrap-prepend">
											<label class="control-label col-md-1"></label>
											<div class="col-md-5">
												<select id='kec_pilih' class="form-control select2-allow-clear">
													<option value=""></option>
													<?php
														$urfl5['id_kabupaten'] = '3172';
														$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
															foreach ($kategdori_keperluan as $key => $fff) {
																echo '<option value="'.$fff->id_kecamatan.'">'.$fff->nm_kecamatan.'</option>';
															}
													?>
												</select>
											</div>
										</div>
										<br>
										<br> -->
										<div id='coba1' style='display: none'>coba 1</div>
										<div id='coba2' style='display: none'>coba 2</div>
			<div class="slideshow-container4">
			<?php
				// $nilai = '';
				// $urfl5['id_kabupaten'] = '3172';
				// $kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
				// 	foreach ($kategdori_keperluan as $key => $fff) {
				// 		$nilai = $fff->id_kecamatan;
				// 	}
			?>
			<div class="mySlides4">
			<div class="numbertext4">1 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara10').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Coverage RW (Dapil DPR-RI)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPR';
											$coveragerw = $this->Main_model->getAPI($url6);
											echo "{ name: '".$fff->nm_desa."',data: [".$coveragerw['jumlah']."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara10"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara11').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Coverage RW (Dapil DPRD Provinsi)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPRD';
											$coveragerwdprd = $this->Main_model->getAPI($url6);
											echo "{ name: '".$fff->nm_desa."',data: [".$coveragerwdprd['jumlah']."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara11"></div>
					</div>
				</div>
			</div>

			<div class="mySlides4">
			<div class="numbertext4">2 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara12').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Rekapan Suara (Dapil DPR-RI)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$suara02 = 0;
											$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
											$task_caleg7 = $this->Main_model->getAPI($url7);
											foreach ($task_caleg7 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$suara02 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
											$task_str8 = $this->Main_model->getAPI($url8);
											foreach ($task_str8 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$suara02 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
											$mandiri_str9 = $this->Main_model->getAPI($url9);
											foreach ($mandiri_str9 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$suara02 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
											$mandiri_caleg10 = $this->Main_model->getAPI($url10);
											foreach ($mandiri_caleg10 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$suara02 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa." (Target Suara : ".$fff->target_suara.")',data: [".$suara02."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara12"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara13').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Rekapan Suara (Dapil DPRD Provinsi)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$suara03 = 0;
											$url10 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
											$task_caleg10 = $this->Main_model->getAPI($url10);
											foreach ($task_caleg10 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$suara03 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url11 = 'https://andro.sitri.online/api/strtask/all/asc';
											$task_str11 = $this->Main_model->getAPI($url11);
											foreach ($task_str11 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$suara03 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url12 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
											$mandiri_str12 = $this->Main_model->getAPI($url12);
											foreach ($mandiri_str12 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$suara03 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url13 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
											$mandiri_caleg13 = $this->Main_model->getAPI($url13);
											foreach ($mandiri_caleg13 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$suara03 += $value['Jumlah_M'];
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa." (Target Suara : ".$fff->target_suara.")',data: [".$suara03."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara13"></div>
					</div>
				</div>
			</div>

			<div class="mySlides4">
			<div class="numbertext4">3 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara14').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Rekapan Kegiatan (Dapil DPR-RI)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$keg3 = 0;
											$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
											$task_caleg7 = $this->Main_model->getAPI($url7);
											foreach ($task_caleg7 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$keg3 += count($value['Id_Tasklist']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
											$task_str8 = $this->Main_model->getAPI($url8);
											foreach ($task_str8 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$keg3 += count($value['Id_Tasklist']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
											$mandiri_str9 = $this->Main_model->getAPI($url9);
											foreach ($mandiri_str9 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$keg3 += count($value['Id_TaskMandiri']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
											$mandiri_caleg10 = $this->Main_model->getAPI($url10);
											foreach ($mandiri_caleg10 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$keg3 += count($value['Id_TaskMandiri']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa."',data: [".$keg3."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara14"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara15').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Rekapan Kegiatan (Dapil DPRD Provinsi)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$keg4 = 0;
											$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
											$task_caleg7 = $this->Main_model->getAPI($url7);
											foreach ($task_caleg7 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$keg4 += count($value['Id_Tasklist']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url8 = 'https://andro.sitri.online/api/strtask/all/asc';
											$task_str8 = $this->Main_model->getAPI($url8);
											foreach ($task_str8 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$keg4 += count($value['Id_Tasklist']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url9 = 'https://andro.sitri.online/api/strmandiri/allnf/asc';
											$mandiri_str9 = $this->Main_model->getAPI($url9);
											foreach ($mandiri_str9 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$keg4 += count($value['Id_TaskMandiri']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											$url10 = 'https://andro.sitri.online/api/calegmandiri/allnf/asc';
											$mandiri_caleg10 = $this->Main_model->getAPI($url10);
											foreach ($mandiri_caleg10 as $key => $value) {
												if(stristr($value['Id_Wilayah'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$keg4 += count($value['Id_TaskMandiri']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa."',data: [".$keg4."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara15"></div>
					</div>
				</div>
			</div>

			<div class="mySlides4">
			<div class="numbertext4">4 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara16').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Jumlah CAD (Dapil DPR-RI)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$cad2 = 0;
											$url14 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
											$task_caleg14 = $this->Main_model->getAPI($url14);
											foreach ($task_caleg14 as $key => $value) {
												if(stristr($value['Desa'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'C')){
														$cad2 += count($value['Id_Caleg']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa."',data: [".$cad2."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara16"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara17').highcharts({
								credits: { enabled: false },chart: {
									type: 'column'
								},
								title: {
									text: 'Jumlah CAD (Dapil DPRD Provinsi)'
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									categories: [
										'Nama Kelurahan'
									]
								},
								yAxis: {
									min: 0,
									title: {
										text: 'Total'
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [
									<?php
									$urfl5['id_kecamatan'] = $nilai;
									$kategdori_keperluan = $this->Main_model->getSelectedData('desa',$urfl5);
										foreach ($kategdori_keperluan as $key => $fff) {
											$cad3 = 0;
											$url15 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
											$task_caleg15 = $this->Main_model->getAPI($url15);
											foreach ($task_caleg15 as $key => $value) {
												if(stristr($value['Desa'],$fff->id_desa)){
													if(stristr($value['Id_Dapil'],'B')){
														$cad3 += count($value['Id_Caleg']);
													}
													else{
														echo'';
													}
												} else {
												echo '';
												}
											}
											echo "{ name: '".$fff->nm_desa."',data: [".$cad3."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara17"></div>
					</div>
				</div>
			</div>

			<a class="prev4" onclick="plusSlides4(-1)">&#10094;</a>
			<a class="next4" onclick="plusSlides4(1)">&#10095;</a>
			</div>
			</div>
			<br>

			<div style="text-align:center">
			<span class="dot4" onclick="currentSlide4(1)"></span> 
			<span class="dot4" onclick="currentSlide4(2)"></span>
			<span class="dot4" onclick="currentSlide4(3)"></span>
			<span class="dot4" onclick="currentSlide4(4)"></span>
			</div>

			<script>
			var slideIndex4 = 1;
			showSlides4(slideIndex4);

			function plusSlides4(n) {
			showSlides4(slideIndex4 += n);
			}

			function currentSlide4(n) {
			showSlides4(slideIndex4 = n);
			}

			function showSlides4(n) {
			var i;
			var slides4 = document.getElementsByClassName("mySlides4");
			var dots4 = document.getElementsByClassName("dot4");
			if (n > slides4.length) {slideIndex4 = 1}    
			if (n < 1) {slideIndex4 = slides4.length}
			for (i = 0; i < slides4.length; i++) {
				slides4[i].style.display = "none";  
			}
			for (i = 0; i < dots4.length; i++) {
				dots4[i].className = dots4[i].className.replace(" active", "");
			}
			slides4[slideIndex4-1].style.display = "block";  
			dots4[slideIndex4-1].className += " active";
			}
			</script>