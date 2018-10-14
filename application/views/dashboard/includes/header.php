<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="<?= BASE_URL ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bienvenido a su panel de Administración</title>
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/dashboard/adminbsb/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animate.css Css --><!--Efectos animados a los elementos-->
    <link href="assets/dashboard/adminbsb/css/animate.min.css" rel="stylesheet" />

    <!-- Font Awesome Css --><!--Iconos - Fuentes-->
    <link href="assets/dashboard/adminbsb/css/font-awesome.min.css" rel="stylesheet" />

    <!-- iCheck Css --><!--diseño check button-->
    <link href="assets/dashboard/adminbsb/css/flat/_all.css" rel="stylesheet" />

    <!-- Switchery Css --><!--botones con diseño de interruptor
    <link href="assets/dashboard/adminbsb/css/switchery.min.css" rel="stylesheet" />-->
    
    <!-- Multiselect Css 
    <link href="assets/dashboard/adminbsb/css/multi-select.css" rel="stylesheet" />-->
    <!-- Bootstrap Select Css 
    <link href="assets/dashboard/adminbsb/css/bootstrap-select.min.css" rel="stylesheet" />-->
    <!-- select CHOSEN Js -->
    <link href="assets/dashboard/adminbsb/plugins/chosen/chosen.css" rel="stylesheet" />
    <!-- Metis Menu Css --><!--Menu responsivo-->
    <link href="assets/dashboard/adminbsb/css/metisMenu.min.css" rel="stylesheet" />

    <!-- Jquery Datatables Css --><!-- Tabla responsiva -->
    <link href="assets/dashboard/adminbsb/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/dashboard/adminbsb/css/responsive.dataTables.min.css" rel="stylesheet" />

    <!-- Pace Loader Css --> <!-- indicador de progreso (progressbar) 
    <link href="assets/dashboard/adminbsb/css/pace-theme-flash.css" rel="stylesheet" />-->
    
    <!--Nuestros estilos-->
    <link href="assets/dashboard/adminbsb/css/style.css" rel="stylesheet" />
    <!-- Mensaje de alertas con diseños -->
    <link rel="stylesheet" type="text/css" href="assets/dashboard/adminbsb/plugins/sweetalert/sweetalert.css">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/dashboard/adminbsb/css/allthemes.min.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="assets/dashboard/adminbsb/js/jquery.min.js"></script>

   
     
</head>

<body class="ls-fixed navbar-fixed">
    <div class="all-content-wrapper">
        <!-- Top Bar -->
        <header>
            <nav class="navbar navbar-default">
                <!-- Search Bar -->
                <div class="search-bar">
                    <div class="search-icon">
                        <i class="material-icons">search</i>
                    </div>
                    <input type="text" placeholder="Buscar...">
                    <div class="close-search js-close-search">
                        <i class="material-icons">close</i>
                    </div>
                </div>
                <!-- #END# Search Bar -->

                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="material-icons">swap_vert</i>
                        </button>
                        <a href="javascript:void(0);" class="left-toggle-left-sidebar js-left-toggle-left-sidebar">
                            <i class="material-icons">menu</i>
                        </a>
                        <!-- Logo -->
                        <a class="navbar-brand" href="dashboard">
                            <span class="logo-minimized">ADM</span>
                            <span class="logo">ADMINISTRADOR</span>
                        </a>
                        <!-- #END# Logo -->
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0);" class="toggle-left-sidebar js-toggle-left-sidebar">
                                    <i class="material-icons">menu</i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="inicio" class="js-search" style="display: flex;align-items: center; font-size: 13px; font-weight: 600;" data-close="true">
                                    IR A WEB <i class="material-icons">home</i>
                                </a>
                            </li>
                            <!-- Call Search -->
                            <li>
                                <a href="javascript:void(0);" class="js-search" data-close="true">
                                    <i class="material-icons">search</i>
                                </a>
                            </li>
                            <!-- #END# Call Search -->
                            <!-- Fullscreen Request -->
                            <li>
                                <a href="javascript:void(0);" class="fullscreen js-fullscreen">
                                    <i class="material-icons">fullscreen</i>
                                </a>
                            </li>
                            <!-- #END# Fullscreen Request -->
                            <!-- Email -->
                            <li class="dropdown email-menu">
                                 <a href="dashboard/mensajes/lista" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="material-icons">email</i>
                                    <span class="label-count"><?php echo getNumMensajes();?></span>
                                </a>
                                <?php $variable=getMensajes()?>
                                   
                                <ul class="dropdown-menu">
                                    <li class="header">MENSAJES</li>
                                    <li class="body">
                                    <ul class="menu">
                                <?php foreach ($variable as $key => $value) { ?>
                                            <li>
                                                <a href="dashboard/mensajes/lista_detalle/<?=$value['id']?>">
                                                    <img src="assets/dashboard/adminbsb/images/avatars/face4.jpg" alt="User Avatar" />
                                                    <div class="info" style="width: 80%;">
                                                        <h4><?=substr($value['nombre'],0,15)?></h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 
                                                            <!-- <?php //echo diasTranscurridos($value['creado'],date('Y-m-d')); ?> dias atras &sol; -->
                                                            <?=date_format(date_create($value['creado']), 'd-m-Y')?>
                                                        </span>
                                                        <p>
                                                            <?=$value['nombre']?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                <?php }?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="dashboard/mensajes/lista">Ver todos los mensajes</a>
                            </li>
                        </ul>
                    </li>

                            <!-- #END# Email -->
                            <!-- Notifications -->
                            <!-- <li class="dropdown notification-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="label-count">7</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">NOTIFICATIONS</li>
                                    <li class="body">
                                        <ul class="menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-success">
                                                        <i class="material-icons">person_add</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>12 new members joined</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 14 mins ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-info">
                                                        <i class="material-icons">add_shopping_cart</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>4 sales made</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 22 mins ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-danger">
                                                        <i class="material-icons">delete_forever</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="material-icons">mode_edit</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy</b> changed name</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 2 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="material-icons">comment</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> commented your post</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 4 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-success">
                                                        <i class="material-icons">cached</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> updated status</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-info">
                                                        <i class="material-icons">settings</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>Settings updated</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> Yesterday
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="javascript:void(0);">View All Notifications</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- #END# Notifications -->
                            <!-- Tasks -->
                            <!-- <li class="dropdown tasks-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="material-icons">flag</i>
                                    <span class="label-count">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">TASKS</li>
                                    <li class="body">
                                        <ul class="menu tasks">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Footer display issue
                                                        <small>32%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 32%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Make new buttons
                                                        <small>45%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Create new dashboard
                                                        <small>54%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 54%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Solve transition issue
                                                        <small>65%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 65%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Answer GitHub questions
                                                        <small>92%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 92%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="javascript:void(0);">View All Tasks</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- #END# Tasks -->
                            <!-- User Menu -->
                            <li class="dropdown user-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="assets/dashboard/adminbsb/images/avatars/face2.jpg" alt="User Avatar" />
                                    <span class="hidden-xs"><?=getDataSession('nombre');?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">
                                        <img src="assets/dashboard/adminbsb/images/avatars/face2.jpg" alt="User Avatar" />
                                        <div class="user">
                                            <?=getDataSession('nombre');?>
                                            <!--<div class="title">Front-end Developer</div>-->
                                        </div>
                                    </li>
                                    <li class="body">
                                        <ul>
                                            <li>
                                                <a href="dashboard/usuarios/datos">
                                                    <i class="material-icons">account_circle</i> Datos
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dashboard/usuarios/cambiar_clave">
                                                    <i class="material-icons">lock_open</i> Cambiar Clave
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <div class="row clearfix">
                                            <div class="col-xs-5">
                                                <!-- <a href="javascript:void(0);" class="btn btn-default btn-sm btn-block">Log Off</a> -->
                                            </div>
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-5">
                                                <a href="dashboard/usuarios/logout" class="btn btn-default btn-sm btn-block">Salir</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- #END# User Menu -->
                            <li class="pull-right">
                                <!--<a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                                    <i class="material-icons">more_vert</i>
                                </a>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- #END# Top Bar -->
        <!-- Left Menu -->

        <?php $menu = ( ! empty($menu) ? $menu : []); ?>
        <?php $this->load->view("dashboard/includes/menu", $menu); ?>

        <!-- #END# Left Menu -->
        <!-- Right Sidebar -->
        <!--<aside class="right-sidebar">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#tab_overview" data-toggle="tab">OVERVIEW</a></li>
                <li role="presentation"><a href="#tab_settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div class="right-sidebar-close">
                    <i class="fa fa-times"></i>
                </div>
                <div role="tabpanel" class="tab-pane fade in active" id="tab_overview">
                    <div class="tab-container">
                        <label>UPCOMING EVENTS</label>
                        <ul>
                            <li>
                                <b class="display-block">Business Meeting</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Dinner With John</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Deadline Project For E-Commerce</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Last Check For E-Comerce</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Ask For Vacation</b> Lorem ipsum dolor sit amet
                            </li>
                        </ul>

                        <label>TODO LIST</label>
                        <ul>
                            <li>
                                <b class="display-block">Get To Know More HTML5</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Get To Know More CSS3 - Transitions</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Learn AngularJS</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Learn AngularJS Routing</b> Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <b class="display-block">Get To Know More jQuery v3</b> Lorem ipsum dolor sit amet
                            </li>
                        </ul>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_settings">
                    <div class="tab-container">
                        <label>GENERAL SETTINGS</label>
                        <ul>
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" checked />
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" />
                                </div>
                            </li>
                        </ul>

                        <label>SYSTEM SETTINGS</label>
                        <ul>
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" checked />
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" checked />
                                </div>
                            </li>
                        </ul>

                        <label>ACCOUNT SETTINGS</label>
                        <ul>
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" />
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <input type="checkbox" class="js-switch" data-size="small" checked />
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>-->
        <!-- #END# Right Sidebar -->
        <section class="content dashboard">
            <!--<div class="page-heading">
                <h1>FORM EXAMPLES</h1>
                <ol class="breadcrumb">
                    <li><a href="../../index.html">Home</a></li>
                    <li><a href="javascript:void(0);">Forms</a></li>
                    <li class="active">Form Examples</li>
                </ol>
            </div>-->