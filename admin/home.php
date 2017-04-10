<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$path = '../';
$adminPath = $path ? '' : 'admin/';

include_once "{$path}controllers/BaseController.php";



if (isset($_GET['c'])) {
    
    include_once "{$path}helper/database.php";
    
    
    include_once "{$path}helper/helper.php";

    
    include "{$path}controllers/" . $_GET['c'] . '.php';

    
    if (method_exists($_GET['c'], 'init')) {
        call_user_func(array($_GET['c'], 'init'));
    }

    
    $_D = call_user_func(array($_GET['c'], $_GET['m']));
    
    
    if ($_D == NULL || !isset($_D[0]) || empty($_D[0])) {
        die();
    }

    $pages = $_D[0];
} else {
    
    $pages = 'auth/login2';
}

if(isset($_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'])) {
    $_CONTENT_FOR_NOTIFICATION_ERROR = $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'];
    unset($_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR']);
}
if(isset($_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'])) {
    $_CONTENT_FOR_NOTIFICATION_SUCCESS = $_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'];
    unset($_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS']);
}
if(isset($_SESSION['_CONTENT_FOR_NOTIFICATION_WARNING'])) {
    $_CONTENT_FOR_NOTIFICATION_WARNING = $_SESSION['_CONTENT_FOR_NOTIFICATION_WARNING'];
    unset($_SESSION['_CONTENT_FOR_NOTIFICATION_WARNING']);
}

if (isset($_D[1])) extract($_D[1]);
ob_start();
include( "{$path}views/{$pages}.php");
$_CONTENT_FOR_LAYOUT = ob_get_clean();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Pakar Gigi</title>        
        
        <!-- <link rel="icon" type="image/png" href="<?= $path ?>images/favicon.png"/> -->
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= $path ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= $path ?>plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= $path ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= $path ?>dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <!--<link rel="stylesheet" href="<?= $path ?>plugins/iCheck/flat/blue.css">-->
        <!-- Morris chart -->
        <!--<link rel="stylesheet" href="<?= $path ?>plugins/morris/morris.css">-->
        <!-- jvectormap -->
        <!--<link rel="stylesheet" href="<?= $path ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?= $path ?>plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <!--<link rel="stylesheet" href="<?= $path ?>plugins/daterangepicker/daterangepicker-bs3.css">-->
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?= $path ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        
        <!-- <link rel="stylesheet" href="<?= $path ?>plugins/default/style.css"> -->
		
		<!-- DataTables -->
		<link rel="stylesheet" href="<?= $path ?>plugins/datatables/dataTables.bootstrap.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="<?= $path ?>https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="<?= $path ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- jQuery 2.1.4 -->
        <script src="<?= $path ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
		
		<link rel="shortcut icon" href="../img-res/favicon.ico">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="home.php?c=dashboard&m=index" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini" >
                        <img src="<?= $path ?>images/favicon.png" height="30" />
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img src="<?= $path ?>img-res/logo2.png" height="30" />
                        
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <!-- 
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
					-->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php if(@$_SESSION['admin']) : ?>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?= $_SESSION['admin']->username ?></span>
                                </a>
                                <ul class="dropdown-menu" style="width:80px;">
                                    <li class="user-footer">
                                        <a href="?c=auth&m=logout" class="btn btn-default btn-flat col-sm-12">
                                            <i class="fa fa-lock"></i>
                                            <span>Sign out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php if(@$_SESSION['admin']) : ?>
                            <?php if( BaseController::hasAbility('penyakit') ): ?>
                                <li <?php echo ($_GET['c']=='penyakit')? "class=\"active\"" :  "" ;?>><a href="?c=penyakit&m=index"><i class="fa fa-folder-open-o"></i> <span>Penyakit & Gejala</span></i></a></li>
                            <?php endif; ?>
                            <?php if( BaseController::hasAbility('data_diagnosis') ): ?>
                                <li <?php echo ($_GET['c']=='data_diagnosis')? "class=\"active\"" :  "" ;?>><a href="?c=data_diagnosis&m=index"><i class="fa fa-stethoscope"></i><span>Data Diagnosis</span></a></li>
                            <?php endif; ?>
							<?php if( BaseController::hasAbility('prob') ): ?>
                                <li <?php echo ($_GET['c']=='prob')? "class=\"active\"" :  "" ;?>><a href="?c=prob&m=index"><i class="fa fa-file-excel-o"></i> <span>Data Probabilitas</span></a></li>
                            <?php endif; ?>  
                            <?php if( BaseController::hasAbility('verifikasi') ): ?>
                                <li <?php echo ($_GET['c']=='verifikasi')? "class=\"active\"" :  "" ;?>><a href="?c=verifikasi&m=index"><i class="fa fa-user"></i> <span>Riwayat Konsultasi</span></a></li>
                            <?php endif; ?>                            
                        <?php endif; ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <?= @$_CONTENT_FOR_HEADER ?>
                
                <section class="content">
                    
                    <?php if(@$_CONTENT_FOR_NOTIFICATION_ERROR): ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="callout callout-danger">
                            <h4>Error!</h4>
                            <p><?= $_CONTENT_FOR_NOTIFICATION_ERROR ?></p>
                          </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php endif; ?>
                    <?php if(@$_CONTENT_FOR_NOTIFICATION_SUCCESS): ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="callout callout-success">
                            <h4>Success!</h4>
                            <p><?= $_CONTENT_FOR_NOTIFICATION_SUCCESS ?></p>
                          </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php endif; ?>
                    <?php if(@$_CONTENT_FOR_NOTIFICATION_WARNING): ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="callout callout-warning">
                            <h4>Warning!</h4>
                            <p><?= $_CONTENT_FOR_NOTIFICATION_WARNING ?></p>
                          </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php endif; ?>
                    
                    <?= $_CONTENT_FOR_LAYOUT ?>
                </section>
            </div><!-- /.content-wrapper -->
            

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery UI 1.11.4 -->
        <script src="<?= $path ?>plugins/jQueryUI/jquery-ui.min.js"></script>
		<script src="dist/js/responsiveslides.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?= $path ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <!--<script src="<?= $path ?>https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <!--<script src="<?= $path ?>plugins/morris/morris.min.js"></script>-->
        <!-- Sparkline -->
        <!--<script src="<?= $path ?>plugins/sparkline/jquery.sparkline.min.js"></script>-->
        <!-- jvectormap -->
        <!--<script src="<?= $path ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
        <!--<script src="<?= $path ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
        <!-- jQuery Knob Chart -->
        <!--<script src="<?= $path ?>plugins/knob/jquery.knob.js"></script>-->
        <!-- daterangepicker -->
        <!--<script src="<?= $path ?>https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
        <!--<script src="<?= $path ?>plugins/daterangepicker/daterangepicker.js"></script>-->
        <!-- datepicker -->
        <!--<script src="<?= $path ?>plugins/datepicker/bootstrap-datepicker.js"></script>-->
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= $path ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <!--<script src="<?= $path ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
        <!-- FastClick -->
        <!--<script src="<?= $path ?>plugins/fastclick/fastclick.min.js"></script>-->
        <!-- AdminLTE App -->
        <script src="<?= $path ?>dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?= $path ?>dist/js/pages/dashboard.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="<?= $path ?>dist/js/demo.js"></script>
		
		<!-- DataTables -->
		
		<script src="<?= $path ?>plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?= $path ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
		
        
        <link rel="stylesheet" href="<?= $path ?>plugins/jQueryUI/jquery-ui.min.css">
    </body>
</html>
