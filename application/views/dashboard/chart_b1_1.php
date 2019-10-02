<script src="https://code.highcharts.com/highcharts-3d.js"></script>
			
			<style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			max-width: 1000px;
			position: relative;
			margin: auto;
			}

			/* Next & previous buttons */
			.prev, .next {
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
			.next {
			right: 0;
			border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev:hover, .next:hover {
			background-color: rgba(0,0,0,0.8);
			}

			/* Caption text */
			.text {
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			bottom: 8px;
			width: 100%;
			text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			cursor: pointer;
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
			}

			.active, .dot:hover {
			background-color: #717171;
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			.prev, .next,.text {font-size: 11px}
			}
			</style>

			<div class="slideshow-container">

			<div class="mySlides">
			<div class="numbertext">1 / 2</div>
				<div class="row">
					<div class="col-md-6">
						<?php
						$arrayPie3 = array();
						$url6 = 'https://andro.sitri.online/api/calegtask/countsegmenwilayah/'.$nilaii;
						$strtask_segmen = $this->Main_model->getAPI($url6);
							foreach ($strtask_segmen as $key => $row) {
								$arrayPie3[] =  "["."'".$row['Segmentasi']."'".",".$row['Jumlah']."]";
							}
						?>
						<script type="text/javascript">
							$(function(){
							var chart = new Highcharts.Chart({
								chart: {
									renderTo: 'GrafikPie3',
									type: 'pie',
									options3d: {
										enabled: true,
										alpha: 45,
										beta: 0
									}
								},
								credits: { enabled: false },title: {
									text: 'Segmentasi Kegiatan Caleg'
								},
								tooltip: {
									pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
								},
								plotOptions: {
									pie: {
										allowPointSelect: true,
										cursor: 'pointer',
										depth: 35,
										dataLabels: {
											enabled: true,
											format: '{point.name}'
										}
									}
								},
								series: [{
									type: 'pie',
									name: 'Persentase',
									data: [<?= join($arrayPie3,",") ?>],
								}]
							});
							});
						</script>
						<div id="GrafikPie3"></div>
					</div>
					<div class="col-md-6">
						<?php
						$arrayPie = array();
						$url5 = 'https://andro.sitri.online/api/strtask/countsegmenwilayah/'.$nilaii;
						$kategori_keperluan = $this->Main_model->getAPI($url5);
							foreach ($kategori_keperluan as $key => $row) {
								$arrayPie[] =  "["."'".$row['Segmentasi']."'".",".$row['Jumlah']."]";
							}
						?>
						<script type="text/javascript">
							$(function(){
							var chart = new Highcharts.Chart({
								chart: {
									renderTo: 'GrafikPie1',
									type: 'pie',
									options3d: {
										enabled: true,
										alpha: 45,
										beta: 0
									}
								},
								credits: { enabled: false },title: {
									text: 'Segmentasi Kegiatan Struktur'
								},
								tooltip: {
									pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
								},
								plotOptions: {
									pie: {
										allowPointSelect: true,
										cursor: 'pointer',
										depth: 35,
										dataLabels: {
											enabled: true,
											format: '{point.name}'
										}
									}
								},
								series: [{
									type: 'pie',
									name: 'Persentase',
									data: [<?= join($arrayPie,",") ?>],
								}]
							});
							});
						</script>
						<div id="GrafikPie1"></div>
					</div>
				</div>
			</div>

			<div class="mySlides">
			<div class="numbertext">2 / 2</div>
			<div class="row">
					<div class="col-md-6">
						<?php
						$arrayPie4 = array();
						$url7 = 'https://andro.sitri.online/api/calegtask/countisuwilayah/'.$nilaii;
						$sebaranisu_strtask = $this->Main_model->getAPI($url7);
							foreach ($sebaranisu_strtask as $key => $row) {
								$arrayPie4[] =  "["."'".$row['Isu']."'".",".$row['Jumlah']."]";
							}
						?>
						<script type="text/javascript">
							$(function(){
							var chart = new Highcharts.Chart({
								chart: {
									renderTo: 'GrafikPie4',
									type: 'pie',
									options3d: {
										enabled: true,
										alpha: 45,
										beta: 0
									}
								},
								credits: { enabled: false },title: {
									text: 'Sebaran Isu Kegiatan Caleg'
								},
								tooltip: {
									pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
								},
								plotOptions: {
									pie: {
										allowPointSelect: true,
										cursor: 'pointer',
										depth: 35,
										dataLabels: {
											enabled: true,
											format: '{point.name}'
										}
									}
								},
								series: [{
									type: 'pie',
									name: 'Persentase',
									data: [<?= join($arrayPie4,",") ?>],
								}]
							});
							});
						</script>
						<div id="GrafikPie4"></div>
					</div>
					<div class="col-md-6">
						<?php
						$arrayPie2 = array();
						$url4 = 'https://andro.sitri.online/api/strtask/countisuwilayah/'.$nilaii;
						$sebaranisu = $this->Main_model->getAPI($url4);
							foreach ($sebaranisu as $key => $row) {
								$arrayPie2[] =  "["."'".$row['Isu']."'".",".$row['Jumlah']."]";
							}
						?>
						<script type="text/javascript">
							$(function(){
							var chart = new Highcharts.Chart({
								chart: {
									renderTo: 'GrafikPie2',
									type: 'pie',
									options3d: {
										enabled: true,
										alpha: 45,
										beta: 0
									}
								},
								credits: { enabled: false },title: {
									text: 'Sebaran Isu Kegiatan Struktur'
								},
								tooltip: {
									pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
								},
								plotOptions: {
									pie: {
										allowPointSelect: true,
										cursor: 'pointer',
										depth: 35,
										dataLabels: {
											enabled: true,
											format: '{point.name}'
										}
									}
								},
								series: [{
									type: 'pie',
									name: 'Persentase',
									data: [<?= join($arrayPie2,",") ?>],
								}]
							});
							});
						</script>
						<div id="GrafikPie2"></div>
					</div>
				</div>
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<br>

			<div style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span> 
			<span class="dot" onclick="currentSlide(2)"></span>
			</div>

			<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			showSlides(slideIndex = n);
			}

			function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {slideIndex = 1}    
			if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			}
			</script>