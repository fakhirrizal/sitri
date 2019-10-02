                    <link href="<?=base_url('assets/pages/css/profile.min.css');?>" rel="stylesheet" type="text/css" />
                    <link href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
                    
                    
                    <?php foreach ($data_profil as $key => $value) {?>
                  
                    <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="#">Pengaturan Akun</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Profil</span>
                            </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                    <?php
                                        if(empty($value->foto)){
                                            echo '<img src="'.base_url('assets/foto_profil/kosong.jpeg').'" class="img-responsive" alt="">';
                                        }
                                        else{
                                            //echo '<img src="'.base_url('assets/foto_profil/').$value->foto.'" class="img-responsive" alt="">';
                                            echo '<img class="img-responsive" src="data:image/jpg;base64,'.$value->foto.'">';
                                        }
                                    ?>
                                        
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo $value->nama_lengkap; ?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="#">
                                                    <i class="icon-user"></i> Pengaturan Profil </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('User/ganti_sandi'); ?>">
                                                    <i class="icon-lock"></i> Pengaturan Kata Sandi </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                               
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <h4><?= $this->session->flashdata('sukses') ?></h4>
                                                <h4><?= $this->session->flashdata('gagal') ?></h4>
                                                <!-- <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Pengaturan Profil</span>
                                                </div> -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Ganti Foto Profil</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="<?php echo site_url('User/ubah_profil'); ?>" method="post">
                                                            <div class="form-group">
                                                                <label class="control-label">Nama</label>
                                                                <div class="input-icon">
                                                                <i class="fa fa-user"></i>
                                                                <input type="text" name="nama_lengkap" onkeyup="validHuruf(this)" class="form-control" value="<?php echo $value->nama_lengkap; ?>" required/> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Username</label>
                                                                <div class="input-icon">
                                                                <i class="fa fa-user"></i>
                                                                <input type="text" name="username" class="form-control" value="<?php echo $value->username; ?>" required/> </div>
                                                            </div>
                                                           
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn green"> Ubah </button>
                                                                <button type="reset" class="btn default"> Hapus </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <div class="m-heading-1 border-green m-bordered">
                                                            <h3>Catatan</h3>
                                                            <p> Ekstensi yang diijinkan : jpg, png, jpeg, dan bmp </p>
                                                            <p> Ukuran maksimal file : 3MB </p>
                                                        </div>
                                                        <form action="<?php echo site_url('User/ubah_foto'); ?>" role="form" enctype='multipart/form-data' method="post">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Pilih gambar </span>
                                                                            <span class="fileinput-exists"> Ubah </span>
                                                                            <input type="file" name="foto"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn green"> Ubah </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <?php } ?>
                    <script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
                    <script src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript"></script>
                    <script src="<?=base_url('assets/global/plugins/jquery.sparkline.min.js');?>" type="text/javascript"></script>
                    <script src="<?=base_url('assets/pages/scripts/profile.min.js');?>" type="text/javascript"></script>
<script language='javascript'>

                    function validHuruf(a)

                    {

                        if(!/^[a-z, A-Z.']+$/.test(a.value))

                        {

                        a.value = a.value.substring(0,a.value.length-1000);

                        }

                    }

</script>