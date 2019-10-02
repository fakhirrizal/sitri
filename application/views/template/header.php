<?php
if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".site_url()."'</script>";
        }
else{
	$where = array(
		'id' => $this->session->userdata('id')
	);
	$cek = $this->Main_model->getSelectedData('user',$where);
	foreach ($cek as $key => $value) {
		if($this->session->userdata('token')==$value->token){
			echo '';
		}
		else{
			$this->session->sess_destroy();
			echo "<script>alert('Token tidak valid')</script>";
            echo "<script>window.location='".site_url()."'</script>";
		}
	}
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
		<meta charset="utf-8" />
        <title>Command Center</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/ladda/ladda-themeless.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/clockface/css/clockface.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/css/components-md.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/global/css/plugins-md.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/pages/css/blog.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url('assets/layouts/layout3/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/layouts/layout3/css/themes/default.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url('assets/layouts/layout3/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?=base_url('assets/logo_baru.png');?>" />
	</head>
    <!-- END HEAD -->

        <body class="page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
						<?php
						echo '<img src="'.base_url('assets/pks.jpg').'">';
						?>
                        <a href="#">
                            <!-- <img src="https://www.debanensite.nl/files/thumb/d/e/logo_D_300_300_demaco.jpg" alt="logo" class="logo-default"> -->
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!-- <img alt="" class="img-circle" src="https://cdn1.iconfinder.com/data/icons/rcons-user-action/512/user-512.png"> -->
                                    <?php
                                    $where = array('id'=>$this->session->userdata('id'));
                                    $data_profil = $this->Main_model->getSelectedData('user',$where);
                                    foreach ($data_profil as $key => $d_p) {
                                        if($d_p->foto==NULL){
                                            echo '<img alt="" class="img-circle" src="https://cdn1.iconfinder.com/data/icons/rcons-user-action/512/user-512.png">';
                                        }
                                        else{
                                            //echo '<img alt="" class="img-circle" src="'.base_url('assets/foto_profil/'.$d_p->foto).'">';
                                            echo '<img class="img-circle" src="data:image/jpg;base64,'.$d_p->foto.'">';
                                        }
                                        echo '<span class="username username-hide-mobile">'.$d_p->nama_lengkap.'</span>';
                                    }
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url('User/profil'); ?>">
                                            <i class="icon-user"></i> Pengaturan Akun </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('User/bantuan'); ?>">
                                            <i class="icon-rocket"></i> Bantuan
                                            <!-- <span class="badge badge-success"> 7 </span> -->
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?php echo site_url('User/keluar'); ?>">
                                            <i class="icon-key"></i> Keluar </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <form class="search-form" action="page_general_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                        <li class="menu-dropdown classic-menu-dropdown <?php if($active=='beranda'){echo 'active';}else{echo '';} ?>">
                                <a href="javascript:;">
                                    <i class="icon-home"></i> Dashboard
                                    <span class="arrow <?php if($active=='beranda'){echo 'open';}else{echo '';} ?>"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                   
                                    <li class=" <?php if($sub=='menu01'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Beranda'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-frame"></i> Beranda
                                            
                                        </a>
									</li>
									<li class=" <?php if($sub=='grafik1'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik1'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 1
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='grafik2'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik2'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 2
                                        </a>
                                    </li>
									<li class=" <?php if($sub=='grafik3'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik3'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 3
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='menu02'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Beranda/peta_pemenangan'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-map"></i> Peta Pemenangan
                                            
                                        </a>
									</li>
                                    <li class=" <?php if($sub=='menu03'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Beranda/data_kecamatan'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-social-dropbox"></i> Data Kecamatan
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>
							<!-- <li class="menu-dropdown classic-menu-dropdown <?php if($active=='grafik'){echo 'active';}else{echo '';} ?>">
                                <a href="javascript:;"><i class="fa fa-bar-chart"></i> Grafik
                                    <span class="arrow <?php if($active=='grafik'){echo 'open';}else{echo '';} ?>"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" <?php if($sub=='grafik1'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik1'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 1
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='grafik2'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik2'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 2
                                        </a>
                                    </li>
									<li class=" <?php if($sub=='grafik3'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik3'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 3
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='grafik4'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Grafik/grafik4'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-list"></i> Grafik 4
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
							<li class="menu-dropdown classic-menu-dropdown <?php if($active=='master'){echo 'active';}else{echo '';} ?>">
                                <a href="javascript:;"><i class="icon-drawer"></i> Master
                                    <span class="arrow <?php if($active=='master'){echo 'open';}else{echo '';} ?>"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                	<!-- <li class=" <?php if($sub=='menu11'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Master/dapil'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-pointer"></i> Dapil
                                            
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='menu12'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Master/dpt'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-users"></i> DPT (Daftar Pemilih Tetap)
                                            
                                        </a>
                                    </li> -->
                                    <li class=" <?php if($sub=='menu13'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Master/caleg'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-users"></i> Caleg
                                            
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='menu14'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Master/relawan'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-users"></i> Struktur
                                            
                                        </a>
                                    </li>
									<?php
									if($this->session->userdata('role')=='dpd' or $this->session->userdata('role')=='super admin'){
									?>
                                    <li class=" <?php if($sub=='menu15'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Master/admin'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-user-following"></i> Admin
                                            
                                        </a>
                                    </li>
									<?php }else{echo'';} ?>
                                </ul>
                            </li>
                            <?php
							if($this->session->userdata('role')=='dpd' or $this->session->userdata('role')=='super admin'){
							?>
                            <li class="menu-dropdown classic-menu-dropdown <?php if($active=='penugasan'){echo 'active';}else{echo '';} ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-bullhorn"></i> Penugasan
                                    <span class="arrow <?php if($active=='penugasan'){echo 'open';}else{echo '';} ?>"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                   
                                    <li class=" <?php if($sub=='menu21'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Penugasan/caleg'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-note"></i> Caleg
                                            
                                        </a>
                                    </li>
                                    <li class=" <?php if($sub=='menu22'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Penugasan/relawan'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-note"></i> Struktur
                                            
                                        </a>
									</li>
									<li class=" <?php if($sub=='menu23'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Penugasan/rekap'); ?>" class="nav-link nav-toggle ">
                                            <i class="fa fa-file-text-o"></i> Rekap
                                            
                                        </a>
									</li>
                                </ul>
                            </li>
							<?php }else{echo'';} ?>
                            <li class="menu-dropdown classic-menu-dropdown <?php if($active=='usulan'){echo 'active';}else{echo '';} ?>">
                                <a href="<?php echo site_url('Usulan'); ?>"><i class="fa fa-caret-square-o-up"></i> Usulan Task
                                </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown <?php if($active=='laporan'){echo 'active';}else{echo '';} ?>">
                                <a href="javascript:;"><i class="icon-book-open"></i> Laporan
                                    <span class="arrow <?php if($active=='laporan'){echo 'open';}else{echo '';} ?>"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" <?php if($sub=='menu31'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Laporan/kegiatan_caleg'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-directions"></i> Kegiatan Caleg
                                            
                                        </a>
                                        
                                    </li>
									<li class=" <?php if($sub=='menu32'){echo 'active';}else{echo '';} ?>">
                                        <a href="<?php echo site_url('Laporan/kegiatan_relawan'); ?>" class="nav-link nav-toggle ">
                                            <i class="icon-directions"></i> Kegiatan Struktur
                                           
                                        </a>
									</li>
                                    <!-- <li class="dropdown-submenu <?php if($sub=='keuangan'){echo 'active';}else{echo '';} ?>">
                                        <a href="javascript:;" class="nav-link nav-toggle <?php if($sub=='keuangan'){echo 'active';}else{echo '';} ?>">
                                            <i class="icon-wallet"></i> Keuangan
                                            <span class="arrow <?php if($sub=='keuangan'){echo 'open';}else{echo '';} ?>"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=" <?php if($sub2=='pemasukan'){echo 'active';}else{echo '';} ?>">
                                                <a href="<?php echo site_url('Laporan/pemasukan'); ?>" class="nav-link "> Pemasukan </a>
                                            </li>
                                            <li class=" <?php if($sub2=='pengeluaran'){echo 'active';}else{echo '';} ?>">
                                                <a href="<?php echo site_url('Laporan/pengeluaran'); ?>" class="nav-link "> Pengeluaran </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    
                                    <!-- <li class="dropdown-submenu <?php if($sub=='pencarian'){echo 'active';}else{echo '';} ?>">
                                        <a href="javascript:;" class="nav-link nav-toggle <?php if($sub=='keuangan'){echo 'active';}else{echo '';} ?>">
                                            <i class="icon-layers"></i> Rekap
                                            <span class="arrow <?php if($sub=='pencarian'){echo 'open';}else{echo '';} ?>"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=" <?php if($sub2=='pencarian_kegiatan'){echo 'active';}else{echo '';} ?>">
                                                <a href="<?php echo site_url('Laporan/pencarian_kegiatan'); ?>" class="nav-link "> Case 1 </a>
                                            </li>
                                            <li class=" <?php if($sub2=='pencarian_keuangan'){echo 'active';}else{echo '';} ?>">
                                                <a href="<?php echo site_url('Laporan/pencarian_keuangan'); ?>" class="nav-link "> Case 2 </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </li>
                            
                            <li class="menu-dropdown classic-menu-dropdown <?php if($active=='log_activity'){echo 'active';}else{echo '';} ?>">
                                <a href="<?php echo site_url('Log_activity'); ?>"><i class="icon-list"></i> Log Activity
                                   
                                </a>
                                
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown <?php if($active=='tentang'){echo 'active';}else{echo '';} ?>">
                                <a href="<?php echo site_url('Tentang'); ?>"><i class="icon-feed"></i> Tentang
                                   
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard
                                <small>SI Parpol PKS DPD Jakarta Timur</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <?php
                                if($this->session->userdata('role')=='super admin'){
                                ?>
                                <a href="<?php echo site_url('Setting'); ?>" title="Setting Informasi Aplikasi" class="btn dropdown-toggle" >
                                    <i class="icon-settings"></i>
                                </a>
                                <?php 
                                }
                                else{echo'';}
                                ?>
                            </div>
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
<?php } ?>