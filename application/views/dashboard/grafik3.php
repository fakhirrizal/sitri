<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="<?=base_url('application/views/dashboard/chart/chart_full.js');?>" type="text/javascript"></script>
						<script>
						$(document).ready(function(){
                            $("#radio15").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').show('fast');
									$('#pilihan21').show('fast');
									$('#pilihan3').hide('fast');
									$('#pilihan31').hide('fast');
                            });
						});
						$(document).ready(function(){
                            $("#radio16").click(function(){
									$('#pilihan1').hide('fast');
									$('#pilihan2').hide('fast');
									$('#pilihan21').hide('fast');
									$('#pilihan3').show('fast');
									$('#pilihan31').show('fast');
                            });
                        });
						</script>
						<script type="text/javascript">

						$(function(){

						$.ajaxSetup({
						type:"POST",
						url: "<?php echo site_url('Beranda/filter_laporan')?>",
						cache: false,
						});

						$("#country_list").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'tingkat_pemilihan'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})


						});
						$("#pilihandapil").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'dapil'},
						success: function(respond){
						$("#data_ajax").html(respond);
						}
						})
						});
						$("#kabupaten").change(function(){

						var value=$(this).val();

						$.ajax({
						data:{id:value,modul:'listkecamatan'},
						success: function(respond){
						$("#kecamatan").html(respond);
						}
						})


						});
						$("#tingkat_dapil").change(function(){
						var value=$(this).val();
						$.ajax({
						data:{id:value,modul:'pilihandapil'},
						success: function(respond){
						$("#pilihandapil").html(respond);
						}
						})
						});
						$("#kec_pilih").change(function(){
						var value=$(this).val();
						$.ajax({
						data:{id:value,modul:'laporanperkecamatan'},
						success: function(respond){
						$("#id_ajax").html(respond);
						}
						})
						});
						})

						</script>
						<ul class="page-breadcrumb breadcrumb"> 
                            <li>
                                <a href="javascript:;">Dashboard</a>
                                <i class="fa fa-circle"></i>
							</li>
							<li>
                                <a href="javascript:;">Beranda</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Grafik 1</span>
                            </li>
                        </ul>

                        <!--===============================================================================================-->
                            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/comingsoon/css/util.css');?>">
                            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/comingsoon/css/main.css');?>">
                        <!--===============================================================================================-->
                        <style>
                            .tes {
                                opacity: 1;
                                filter: alpha(opacity=50); /* For IE8 and earlier */
                            }
                        </style>
                        <?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <!-- <i class="icon-bar-chart font-green-haze"></i>
                                                        <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                                        <span class="caption-helper">column and line mix</span> -->
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
										<div class="row">
										<div>
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
														<script>
															window.onload = function()
															{
															var hasil9 = new chart_9();
															document.getElementById("chart_9").innerHTML=hasil9;
															var hasil10 = new chart_10();
															document.getElementById("chart_10").innerHTML=hasil10;
															}
														</script>
														<div id="chart_9"></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_10"></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">2 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_11" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_12" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">3 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_13" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_14" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<div class="mySlides3">
												<div class="numbertext3">4 / 4</div>
												<div class="row">
													<div class="col-md-6">
														
														<div id="chart_15" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
													<div class="col-md-6">
														
														<div id="chart_16" style="text-align: center;"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif"/></div>
													</div>
												</div>
											</div>

											<a class="prev3" onclick="plusSlides3(-1)">&#10094;</a>
											<a class="next3" onclick="plusSlides3(1)">&#10095;</a>

										</div>
										<br>

										<div style="text-align:center">
											<span class="dot3" onclick="currentSlide3(1)"></span> 
											<span class="dot3" onclick="currentSlide3(2); chart_11(); chart_12();"></span>
											<span class="dot3" onclick="currentSlide3(3); chart_13(); chart_14();"></span>
											<span class="dot3" onclick="currentSlide3(4); chart_15(); chart_16();"></span>
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
										<br>
										<br>
										<br>
										<br>
										</div>
										</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>