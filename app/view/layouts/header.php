<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>PT. Mashalimanto Jaya Abadi</title>
    <meta name="description" content="Goofy is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Goofy Admin, Goofyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Data table CSS -->
    <link href="../../../../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- Toast CSS -->
    <link href="../../../../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Data table CSS -->
    <link href="../../../../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <link href="../../../../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

    <link href="../../../../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    
    <!-- switchery CSS -->
    <link href="../../../../vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>

    <!-- select2 CSS -->
    <link href="../../../../vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

    <!-- bootstrap-select CSS -->
    <link href="../../../../vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

    <!-- bootstrap-tagsinput CSS -->
    <link href="../../../../vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-touchspin CSS -->
    <link href="../../../../vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- multi-select CSS -->
    <link href="../../../../vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Switches CSS -->
    <link href="../../../../vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Datetimepicker CSS -->
    <link href="../../../../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

    <!-- xeditable css -->
    <link href="../../../../vendors/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

    <link href="../../../../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- vis -->
    <link href="../../../../vendors/vis/vis.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../../vendors/gantt/dhtmlxgantt.css?v=5.2.0" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="../../../../assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper theme-3-active pimary-color-blue">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="index.html">
                            <img class="brand-img" src="../../../../assets/img/logo-mja-25.png" alt="brand"/>
                            <span class="brand-text">PT. MJA</span>
                        </a>
                    </div>
                </div>  
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
            </div>
            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li class="dropdown alert-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
                        <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                            <li>
                                <div class="notification-box-head-wrap">
                                    <span class="notification-box-head pull-left inline-block">Pemberitahuan</span>
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr ma-0"/>
                                </div>
                            </li>
                            <li>
                                <div class="streamline message-nicescroll-bar">
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-green">
                                                <i class="zmdi zmdi-flag"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                New subscription created</span>
                                                <span class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                                            </div>
                                        </a>    
                                    </div>
                                    <hr class="light-grey-hr ma-0"/>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="../../../../assets/img/icon-peg.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li>
                                <a href="../front/profil.php?id=<?php echo $_SESSION["log_peg_id"]; ?>"><i class="zmdi zmdi-account"></i><span>Profil</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="../../../controller/LoginController.php?func=logout"><i class="zmdi zmdi-power"></i><span>Keluar</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>  
        </nav>
        <!-- /Top Menu Items -->
        
        <!-- Left Sidebar Menu -->
        <?php require_once('menu.php');  ?>
        <!-- /Left Sidebar Menu -->
        
        <!-- Main Content -->
        <div class="page-wrapper">