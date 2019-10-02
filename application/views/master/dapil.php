						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Master</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Daerah Pemilihan (DAPIL)</span>
                            </li>
                        </ul>
                        <?= $this->session->flashdata('sukses') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <div class="page-content-inner">
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
										
                                            <div class="tabbable-line">
                                                <ul class="nav nav-tabs ">
                                                    <li class="active">
                                                        <a href="#tab_15_1" data-toggle="tab"> Dapil DPR-RI  </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_15_2" data-toggle="tab"> Dapil DPRD Provinsi </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_15_1">
														<form action="#" method="post" onsubmit="return deleteConfirm();"/>
														<div class="table-toolbar">
															<div class="row">
																<div class="col-md-6">
																	<div class="btn-group">
																		<button type='submit' id="sample_editable_1_new" class="btn sbold green"> Hapus
																			<i class="fa fa-trash"></i>
																		</button>
																	</div>
																</div>
															
															</div>
														</div>
														
														<table class="table table-striped table-bordered table-hover table-checkable order-column" id="example">
															<thead>
																<tr>
																	<th width="3%">
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
																			<span></span>
																		</label>
																	</th>
																	<th style="text-align: center;" width="4%"> # </th>
																	<th style="text-align: center;"> Nama Dapil </th>
																	<th style="text-align: center;"> Wilayah</th>
																	<th style="text-align: center;"> Kuota Kursi </th>
																	
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($dprri as $key => $value) {
																	$cek = 'DKI';
																	if(stristr($value['Nama_Dapil'],$cek)){
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<td><?= $value['Nama_Dapil']; ?></td>
																	<td><?= $value['Nama_WilayahDapil']; ?></td>
																	<td><?= $value['Kursi_Dapil']; ?></td>
																</tr>
																<?php
																	}
																	else{
																		echo '';
																	}
																}
																?>
															</tbody>
														</table>
														<script>
														$('#example').dataTable( {
														"searching": false,
														"ordering": false
														} );
														</script>
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
                                                    <div class="tab-pane" id="tab_15_2">
													<form action="#" method="post" onsubmit="return deleteConfirm();"/>
														<div class="table-toolbar">
															<div class="row">
																<div class="col-md-6">
																	<div class="btn-group">
																		<button type='submit' id="sample_editable_1_new" class="btn sbold green"> Hapus
																			<i class="fa fa-trash"></i>
																		</button>
																	</div>
																</div>
															
															</div>
														</div>
														
														<table class="table table-striped table-bordered table-hover table-checkable order-column" id="example">
															<thead>
																<tr>
																	<th width="3%">
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
																			<span></span>
																		</label>
																	</th>
																	<th style="text-align: center;" width="4%"> # </th>
																	<th style="text-align: center;"> Nama Dapil </th>
																	<th style="text-align: center;"> Wilayah</th>
																	<th style="text-align: center;"> Kuota Kursi </th>
																	
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($dprdprov as $key => $value) {
																	$cek = 'DKI';
																	if(stristr($value['Nama_Dapil'],$cek)){
																?>
																<tr class="odd gradeX">
																	<td>
																		<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																			<input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
																			<span></span>
																		</label>
																	</td>
																	<td style="text-align: center;"><?= $no++.'.'; ?></td>
																	<td><?= $value['Nama_Dapil']; ?></td>
																	<td><?= $value['Nama_WilayahDapil']; ?></td>
																	<td><?= $value['Kursi_Dapil']; ?></td>
																</tr>
																<?php
																	}
																	else{
																		echo '';
																	}
																}
																?>
															</tbody>
														</table>
														<script>
														$('#example').dataTable( {
														"searching": false,
														"ordering": false
														} );
														</script>
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
                                            
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>