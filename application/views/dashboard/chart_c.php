<script src="https://code.highcharts.com/highcharts-3d.js"></script>
			<style>
				* {box-sizing: border-box}
				body {font-family: Verdana, sans-serif; margin:0}
				.mySlides3 {display: none}
				img {vertical-align: middle;}

				/* Slideshow container */
				.slideshow-container3 {
				max-width: 1000px;
				position: relative;
				margin: auto;
				}

				/* Next & previous buttons */
				.prev3, .next3 {
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
				.next3 {
				right: 0;
				border-radius: 3px 0 0 3px;
				}

				/* On hover, add a black background color with a little bit see-through */
				.prev3:hover, .next3:hover {
				background-color: rgba(0,0,0,0.8);
				}

				/* Caption text */
				.text3 {
				color: #f2f2f2;
				font-size: 15px;
				padding: 8px 12px;
				position: absolute;
				bottom: 8px;
				width: 100%;
				text-align: center;
				}

				/* Number text (1/3 etc) */
				.numbertext3 {
				color: #f2f2f2;
				font-size: 12px;
				padding: 8px 12px;
				position: absolute;
				top: 0;
				}

				/* The dots/bullets/indicators */
				.dot3 {
				cursor: pointer;
				height: 15px;
				width: 15px;
				margin: 0 2px;
				background-color: #bbb;
				border-radius: 50%;
				display: inline-block;
				transition: background-color 0.6s ease;
				}

				.active3, .dot3:hover {
				background-color: #717171;
				}

				/* On smaller screens, decrease text size */
				@media only screen and (max-width: 300px) {
				.prev3, .next3,.text3 {font-size: 11px}
				}
			</style>

			<div class="slideshow-container3">

				<div class="mySlides3">
					<div class="numbertext3">1 / 4</div>
					<div class="row">
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_kecamatan.'/DPR';
												$coveragerw = $this->Main_model->getAPI($url6);
												$urlxx = 'https://andro.sitri.online/api/rw/all/asc';
												$queryrw = $this->Main_model->getAPI($urlxx);
												$jumlah_rw = 0;
												foreach ($queryrw as $key => $xx) {
													if($xx['Id_Kecamatan']==$fff->id_kecamatan){
														$jumlah_rw++;
													}
													else{
														echo '';
													}
												}
												$persentase = $coveragerw['jumlah']/$jumlah_rw*100;
												echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerw['jumlah']."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara"></div>
						</div>
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara4').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$url6 = 'https://andro.sitri.online/api/coveragecaleg/'.$fff->id_kecamatan.'/DPRD';
												$coveragerwdprd = $this->Main_model->getAPI($url6);
												$urlxxx = 'https://andro.sitri.online/api/rw/all/asc';
												$queryrw = $this->Main_model->getAPI($urlxxx);
												$jumlah_rw_ = 0;
												foreach ($queryrw as $key => $xxx) {
													if($xxx['Id_Kecamatan']==$fff->id_kecamatan){
														$jumlah_rw_++;
													}
													else{
														echo '';
													}
												}
												$persentase = $coveragerwdprd['jumlah']/$jumlah_rw_*100;
												echo "{ name: '".$fff->nm_kecamatan." (".number_format($persentase,2)." %)',data: [".$coveragerwdprd['jumlah']."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara4"></div>
						</div>
					</div>
				</div>

				<div class="mySlides3">
					<div class="numbertext3">2 / 4</div>
					<div class="row">
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara2').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$suara0 = 0;
												$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
												$task_caleg7 = $this->Main_model->getAPI($url7);
												foreach ($task_caleg7 as $key => $value) {
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$suara0 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$suara0 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$suara0 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$suara0 += $value['Jumlah_M'];
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara0."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara2"></div>
						</div>
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara5').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$suara01 = 0;
												$url10 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
												$task_caleg10 = $this->Main_model->getAPI($url10);
												foreach ($task_caleg10 as $key => $value) {
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$suara01 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$suara01 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$suara01 += $value['Jumlah_M'];
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$suara01 += $value['Jumlah_M'];
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan." (Target Suara : ".$fff->target_suara.")',data: [".$suara01."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara5"></div>
						</div>
					</div>
				</div>

				<div class="mySlides3">
					<div class="numbertext3">3 / 4</div>
					<div class="row">
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara3').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$keg = 0;
												$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
												$task_caleg7 = $this->Main_model->getAPI($url7);
												foreach ($task_caleg7 as $key => $value) {
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$keg += count($value['Id_Tasklist']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$keg += count($value['Id_Tasklist']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$keg += count($value['Id_TaskMandiri']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$keg += count($value['Id_TaskMandiri']);
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara3"></div>
						</div>
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara6').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$keg1 = 0;
												$url7 = 'https://andro.sitri.online/api/calegtask/allnf/asc';
												$task_caleg7 = $this->Main_model->getAPI($url7);
												foreach ($task_caleg7 as $key => $value) {
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$keg1 += count($value['Id_Tasklist']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$keg1 += count($value['Id_Tasklist']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$keg1 += count($value['Id_TaskMandiri']);
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
													if(stristr($value['Id_Wilayah'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$keg1 += count($value['Id_TaskMandiri']);
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan."',data: [".$keg1."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara6"></div>
						</div>
					</div>
				</div>

				<div class="mySlides3">
					<div class="numbertext3">4 / 4</div>
					<div class="row">
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara7').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$cad = 0;
												$url14 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
												$task_caleg14 = $this->Main_model->getAPI($url14);
												foreach ($task_caleg14 as $key => $value) {
													if(stristr($value['Kecamatan'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'C')){
															$cad += count($value['Id_Caleg']);
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan."',data: [".$cad."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara7"></div>
						</div>
						<div class="col-md-6">
							<script type="text/javascript">
							$(document).ready(function() {
								$('#suara8').highcharts({
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
											'Nama Kecamatan'
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
										$urfl5['id_kabupaten'] = '3172';
										$kategdori_keperluan = $this->Main_model->getSelectedData('kecamatan',$urfl5);
											foreach ($kategdori_keperluan as $key => $fff) {
												$cad1 = 0;
												$url15 = 'https://andro.sitri.online/api/calegprofiles/allnf/asc';
												$task_caleg15 = $this->Main_model->getAPI($url15);
												foreach ($task_caleg15 as $key => $value) {
													if(stristr($value['Kecamatan'],$fff->id_kecamatan)){
														if(stristr($value['Id_Dapil'],'B')){
															$cad1 += count($value['Id_Caleg']);
														}
														else{
															echo'';
														}
													} else {
													echo '';
													}
												}
												echo "{ name: '".$fff->nm_kecamatan."',data: [".$cad1."]},";
											}
										?>
									]
								});
							});
							</script>
							<div id="suara8"></div>
						</div>
					</div>
				</div>

				<a class="prev3" onclick="plusSlides3(-1)">&#10094;</a>
				<a class="next3" onclick="plusSlides3(1)">&#10095;</a>

			</div>
			<br>

			<div style="text-align:center">
				<span class="dot3" onclick="currentSlide3(1)"></span> 
				<span class="dot3" onclick="currentSlide3(2)"></span>
				<span class="dot3" onclick="currentSlide3(3)"></span>
				<span class="dot3" onclick="currentSlide3(4)"></span>
			</div>

			<script>
				var slideIndex3 = 1;
				showSlides3(slideIndex3);

				function plusSlides3(n) {
				showSlides3(slideIndex3 += n);
				}

				function currentSlide3(n) {
				showSlides3(slideIndex3 = n);
				}

				function showSlides3(n) {
				var i;
				var slides3 = document.getElementsByClassName("mySlides3");
				var dots3 = document.getElementsByClassName("dot3");
				if (n > slides3.length) {slideIndex3 = 1}    
				if (n < 1) {slideIndex3 = slides3.length}
				for (i = 0; i < slides3.length; i++) {
					slides3[i].style.display = "none";  
				}
				for (i = 0; i < dots3.length; i++) {
					dots3[i].className = dots3[i].className.replace(" active", "");
				}
				slides3[slideIndex3-1].style.display = "block";  
				dots3[slideIndex3-1].className += " active";
				}
			</script>