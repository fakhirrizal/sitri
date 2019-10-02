						<ul class="page-breadcrumb breadcrumb">
                            <!-- <li>
                                <a href="javascript:;"></a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Log Activity</span>
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
											<form action="#" method="post" onsubmit="return deleteConfirm();"/>
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <button type='submit' id="sample_editable_1_new" class="btn sbold green"> Kosongkan Log
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
											<div id='data_ajax'>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th width="3%">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                                <span></span>
                                                            </label>
                                                        </th>
                                                        <th style="text-align: center;" width="4%"> # </th>
                                                        <th style="text-align: center;"> Nama User (Role) </th>
                                                        <th style="text-align: center;"> Keterangan </th>
														<th style="text-align: center;"> Waktu </th>
                                                        <th style="text-align: center;" width="8%"> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                	//foreach ($data_admin as $key => $value) {
                                                	?>
                                                	<tr class="odd gradeX">
                                                        <td>
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" name="selected_id[]" value="#"/>
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td style="text-align: center;"><?= $no++.'.'; ?></td>
                                                        <td>Mukhammad Fakhir Rizal (Caleg)</td>
                                                        <td style="text-align: center;">Login Aplikasi</td>
                                                        <td style="text-align: center;">11 Juli 2018 13:09</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#">
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
                                                        <td>Sharfina Aulia Puspasari (Caleg)</td>
                                                        <td style="text-align: center;">Melaporan kegiatan kunjungan</td>
                                                        <td style="text-align: center;">11 Juli 2018 20:12</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#">
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
                                                        <td>Elad Oktarizo (Admin)</td>
                                                        <td style="text-align: center;">Menambah instruksi buat caleg</td>
                                                        <td style="text-align: center;">10 Agustus 2018 21:17</td>
                                                        <td>
                                                        	
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#">
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
                                                	<?php
                                                	//}
                                                	?>
                                                </tbody>
                                            </table>
                                            </div>
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
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>