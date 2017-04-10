<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->


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
    
    $pages = 'auth/login';
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
//include( "{$path}views/{$pages}.php");
$_CONTENT_FOR_LAYOUT = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<head>

<title>Sistem Pakar Gigi dan Mulut</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Valid Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Custom-Style-Sheet -->
<link rel="stylesheet" href="css/bootstrap.css"	type="text/css" media="all">
<link rel="stylesheet" href="css/validify.css"	type="text/css" media="all">
<link rel="stylesheet" href="css/style.css"		type="text/css" media="all">
<!-- //Custom-Style-Sheet -->

<!-- Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900"		type="text/css" media="all">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700"					type="text/css" media="all">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"	type="text/css" media="all">
<link rel="shortcut icon" href="../img-res/favicon.ico">
<!-- //Fonts -->

<!-- Style -->
<style type="text/css">
	@-webkit-keyframes AnimationName {
		0%{background-position:15% 0%}
		50%{background-position:86% 100%}
		100%{background-position:15% 0%}
	}

	@-moz-keyframes AnimationName {
		0%{background-position:15% 0%}
		50%{background-position:86% 100%}
		100%{background-position:15% 0%}
	}

	@keyframes AnimationName { 
		0%{background-position:15% 0%}
		50%{background-position:86% 100%}
		100%{background-position:15% 0%}
	}

	.textbox {
		margin: 20px 0;
		padding: 15px 20px;
		color: #fff;
		background-color: rgba(0, 0, 0, .25);
		border: 1px solid #CCC;
		border-radius: 0;
		box-shadow: none !important;
		transition: all .2s linear;
	}

	.btn-osx, button[disabled] {
		padding: 5px 10px;
		color: #fff;
		background-color: rgba(0, 0, 0, .1)!important;
		border: 1px solid rgba(255, 255, 255, .2);
		box-shadow: none !important;
		transition: all .2s linear;
		border-radius: 50%;
		font-size: 20px;
	}

	.btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
		color: #FFF;
		opacity: 1;
		border-color: #FFF!important;
	}

	@media screen and (max-width: 640px) {
		.textbox {
			margin: 20px 0;
			padding: 12px;
			font-size: 13px;
		}
	}

</style>
<!-- //Style -->

</head>
<!-- //Head -->



	<!-- Body -->
	<body>
		<h1>Sistem Pakar Gigi dan Mulut</h1>
                    
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
                    
                   
            

		<div class="containerw3layouts-agileits">
			
			<form role="form" method="post" id="mainForm" action="home.php?c=auth&m=login" enctype="multipart/form-data">
			<!--<form action="#" method="post" id="demo" novalidate>-->
				<div class="form-group agileits-w3layouts">
					<input type="text" class="form-control agileinfo textbox" name="data[username]" required placeholder="Username">
				</div>
				<div class="form-group w3-agile password">
					<input type="password" class="form-control w3-agileits textbox" name="data[password]" required placeholder="Password">
				</div>
				<div class="form-group w3-agile submit">
					<button class="btn btn-default btn-osx w3-agileits btn-lg"  type="submit"><i class="fa agileinfo fa-arrow-circle-right">Login</i></button>
				</div>
				<!--<div class="alert agileits-w3layouts alert-success hidden" role="alert">Login Successful!</div>-->
			</form>

		</div>

		<div class="w3lsfooteragileits">
			<p> &copy; 2016 Valid Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com" target="=_blank">W3layouts</a></p>
		</div>



		<!-- Necessary-JavaScript-Files-&-Links -->

			<!-- Default-JavaScript --><script type="text/javascript" src="js/jquery.min.js"></script>
			<script src="js/validify.js"></script>
			<script>
				$("#demo").validify({
					onSubmit: function (e, $this) {
						$this.find('.alert').removeClass('hidden')
					},
					onFormSuccess: function (form) {
						console.log("Form is valid now!")
					},
					onFormFail: function (form) {
						console.log("Form is not valid :(")
					}
				});
			</script>

		<!-- //Necessary-JavaScript-Files-&-Links -->



	</body>
	<!-- //Body -->



</html>