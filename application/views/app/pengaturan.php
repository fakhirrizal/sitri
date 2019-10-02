						<ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="javascript:;">Pengaturan</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Tentang Aplikasi</span>
                            </li>
                        </ul>
                        <?= $this->session->flashdata('gagal') ?>
                        <?= $this->session->flashdata('sukses') ?>
                        <div class="page-content-inner">
                        	<!-- <div class="m-heading-1 border-green m-bordered">
                                <h3>Catatan</h3>
                                <p> 1. Catatan pertama</p>
                                <p> 2. Catatan kedua</p>
                                <p> 3. Catatan ketiga</p>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-green-haze">
                                                <i class="icon-layers font-green-haze"></i>
                                                <span class="caption-subject bold uppercase"> Form Input</span>
                                            </div>
                                            <!-- <div class="actions">
                                                <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                                            </div> -->
                                        </div>
                                        <div class="portlet-body form">
                                            <form role="form" class="form-horizontal" action="<?=site_url('Setting/simpan_setting');?>" method="post">
                                                <div class="form-body">
                                                    <?php
                                                    foreach ($data_aplikasi as $key => $value) {
                                                    ?>
                                                    <div class="form-group form-md-line-input has-danger">
                                                        <label class="col-md-2 control-label" for="form_control_1">About</label>
                                                        <div class="col-md-10">
                                                            <div class="input-icon">
                                                                <!-- <input required type="text" class="form-control" name="nama_kegiatan" placeholder="Type something"> -->
                                                                <textarea rows="3" required class="form-control" name="about" placeholder="Type something"><?= $value->about; ?></textarea>
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block">Some help goes here...</span>
                                                                <i class="icon-pin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input has-danger">
                                                        <label class="col-md-2 control-label" for="form_control_1">Number Phone</label>
                                                        <div class="col-md-10">
                                                            <div class="input-icon">
                                                                <input required type="text" class="form-control" name="phone" value="<?= $value->phone; ?>">
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block">Some help goes here...</span>
                                                                <i class="fa fa-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input has-danger">
                                                        <label class="col-md-2 control-label" for="form_control_1">Email Address</label>
                                                        <div class="col-md-10">
                                                            <div class="input-icon">
                                                                <input required type="text" class="form-control" name="email" value="<?= $value->email; ?>" placeholder="Type something">
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block">Some help goes here...</span>
                                                                <i class="icon-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php } ?>
                                                </div>
                                                <div class="form-actions margin-top-10">
                                                    <div class="row">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button type="button" class="btn default">Batal</button>
                                                            <button type="submit" class="btn blue">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE FORM PORTLET-->
                                </div>
                            </div>
                        </div>