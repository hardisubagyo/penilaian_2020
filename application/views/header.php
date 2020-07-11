<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/assets/images/favicon.png">
    <title>Xtreme admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/extra-libs/prism/prism.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url(); ?>assets/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url(); ?>assets/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url(); ?>assets/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             <img src="<?php echo base_url(); ?>assets/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>" aria-expanded="false">
                                <i class="mdi mdi-home"></i><span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <?php if(! $this->session->userdata('email')){ ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Login'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-login"></i><span class="hide-menu">Login</span>
                                </a>
                            </li>
                        <?php }else{} ?> 
                        <?php if($this->session->userdata('email')){ ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Pengguna'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Slide'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-file-image"></i><span class="hide-menu">Slideshow</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Siswa'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-account"></i><span class="hide-menu">Siswa</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-content-paste"></i><span class="hide-menu">Penilaian</span></a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="<?php echo site_url('MataPelajaran'); ?>" class="sidebar-link">
                                                <i class="mdi mdi-vector-difference-ba"></i><span class="hide-menu"> Input Mata Pelajaran</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="<?php echo site_url('Penilaian'); ?>" class="sidebar-link">
                                                <i class="mdi mdi-vector-difference-ba"></i><span class="hide-menu"> Input Nilai</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="<?php echo site_url('DaftarNilai'); ?>" class="sidebar-link">
                                                <i class="mdi mdi-vector-difference-ba"></i><span class="hide-menu"> Daftar Nilai</span>
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Keuangan'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-pulse"></i><span class="hide-menu">Keuangan</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Login/Keluar'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-power"></i><span class="hide-menu">Logout</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <div class="container-fluid">