<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?php $nilaii = '3172010'; ?>
			<style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides5 {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container5 {
			max-width: 1000px;
			position: relative;
			margin: auto;
			}

			/* Next & previous buttons */
			.prev5, .next5 {
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
			.next5 {
			right: 0;
			border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev5:hover, .next5:hover {
			background-color: rgba(0,0,0,0.8);
			}

			/* Caption text */
			.text5 {
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			bottom: 8px;
			width: 100%;
			text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext5 {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
			}

			/* The dots/bullets/indicators */
			.dot5 {
			cursor: pointer;
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
			}

			.active5, .dot5:hover {
			background-color: #717171;
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			.prev5, .next5,.text5 {font-size: 11px}
			}
			</style>
			<div class="slideshow-container5">

			<div class="mySlides5">
			<div class="numbertext5">1 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara18').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
											$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPR';
											$coveragerww = $this->Main_model->getAPI($url6);
											echo "{ name: '".$fff->nm_desa."',data: [".$coveragerww['jumlah']."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara18"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara19').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
											$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_desa.'/DPRD';
											$coveragerwwdprd = $this->Main_model->getAPI($url6);
											echo "{ name: '".$fff->nm_desa."',data: [".$coveragerwwdprd['jumlah']."]},";
										}
									?>
								]
							});
						});
						</script>
						<div id="suara19"></div>
					</div>
				</div>
			</div>

			<div class="mySlides5">
			<div class="numbertext5">2 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara20').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara20"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara21').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara21"></div>
					</div>
				</div>
			</div>

			<div class="mySlides5">
			<div class="numbertext5">3 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara23').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara23"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara24').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara24"></div>
					</div>
				</div>
			</div>

			<div class="mySlides5">
			<div class="numbertext5">4 / 4</div>
				<div class="row">
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara25').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara25"></div>
					</div>
					<div class="col-md-6">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#suara26').highcharts({
								chart: {
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
									$urfl54['id_kecamatan'] = $nilaii;
									$kategdori_keperluank = $this->Main_model->getSelectedData('desa',$urfl54);
										foreach ($kategdori_keperluank as $key => $fff) {
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
						<div id="suara26"></div>
					</div>
				</div>
			</div>

			<a class="prev5" onclick="plusSlides5(-1)">&#10094;</a>
			<a class="next5" onclick="plusSlides5(1)">&#10095;</a>
			</div>
			<br>

			<div style="text-align:center">
			<span class="dot5" onclick="currentSlide5(1)"></span> 
			<span class="dot5" onclick="currentSlide5(2)"></span>
			<span class="dot5" onclick="currentSlide5(3)"></span>
			<span class="dot5" onclick="currentSlide5(4)"></span>
			</div>

			<script>
			var slideIndex5 = 1;
			showSlides5(slideIndex5);

			function plusSlides5(n) {
			showSlides5(slideIndex5 += n);
			}

			function currentSlide5(n) {
			showSlides5(slideIndex5 = n);
			}

			function showSlides5(n) {
			var i;
			var slides5 = document.getElementsByClassName("mySlides5");
			var dots5 = document.getElementsByClassName("dot5");
			if (n > slides5.length) {slideIndex5 = 1}    
			if (n < 1) {slideIndex5 = slides5.length}
			for (i = 0; i < slides5.length; i++) {
				slides5[i].style.display = "none";  
			}
			for (i = 0; i < dots5.length; i++) {
				dots5[i].className = dots5[i].className.replace(" active", "");
			}
			slides5[slideIndex5-1].style.display = "block";  
			dots5[slideIndex5-1].className += " active";
			}
			</script>