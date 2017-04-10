<?php
include_once "helper/database.php";
session_start();

/*
if(!@$_SESSION['user']){
	header("location:index.php");
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Pakar Gigi dan Mulut</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/modal.css" rel="stylesheet">
  
  

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="img-res/favicon.ico">
</head><!--/head-->

<body>

  <!--.preloader-->
  <!--<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>-->
  <!--/.preloader-->

  <header id="home">
    
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">			
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <h1><img class="img-responsive" src="img-res/logo2.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
			<li class="scroll"><a href="index.php#team" id="submit-form" >HOME</a></li>
            <?php if(@$_SESSION['user']){ ?>
				 <li class="scroll"><a href="#"><i class="fa fa-user"></i>&nbsp<?php echo $_SESSION['user'] ?> </a></li>                					
			<?php } ?>	       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->  

  
	<div id="single-portfolio">
		<div id="portfolio-details" class="container">						
			<div class="row">
				<div class="col-sm-9">
					<div class="project-info">
						<div class="row">
							<h2>Penyakit Tidak Terdeteksi</h2>
							<h3>Maaf untuk saat ini Sistem Pakar tidak dapat mendeteksi penyakit yang anda alami</h3> 
							<h3>Anda dapat mengulangi konsultasi dengan gejala yang berbeda dengan menekan tombol di bawah</h3>
							<h3>Jika masih tidak terdeteksi disarankan untuk menemui dan berkonsultasi pada dokter gigi terpercaya</h3>
						</div>						
					</div>					
				</div>				
			</div>
			<div class="row text-center" style="margin-top:5%">
				<div class="service-icon">			
					<a href="diagnosis.php"><i class="fa fa-refresh"></i></a>
				</div>
				<div class="service-info" style="margin-top:-1%">
				  <h3>Ulangi Konsultasi</h3>				  
				</div>
			</div>
		</div>
	</div>
	<!--
	<section id="services">
		<div class="container">
			<div class="row text-center">
				<div class="service-icon">			
					<i class="fa fa-user" data-toggle="modal" data-target="#myModal" id="click-modal-login"></i>			
				</div>			
				<div class="service-info">
				  <h3>Login</h3>
				  <p>Login terlebih dahulu untuk dapat melakukan konsultasi pada sistem pakar</p>
				</div>
			</div>
		</div>
	</section>
	-->
  
  
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="img-res/logo2.png" alt=""></a>
        </div>        
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 Oxygen Theme.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Crafted by <a href="http://designscrazed.org/">Allie</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
		
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>

</body>
</html>
<script>
    function validate() {
        var pass1 = document.getElementById("password-register").value;
        var pass2 = document.getElementById("confirm-password").value;
		var ok = true;
	
        if (pass1 != pass2) {
            alert("Passwords tidak sama!!");
            document.getElementById("password-register").style.borderColor = "#E34234";
            document.getElementById("confirm-password").style.borderColor = "#E34234";
			ok = false;
        } else {
			
		}
        return ok;
    }
		
	
	$('#close-modal').click(function() {
		$('#myModal').modal('hide');
	});
	
	$('#close-modal2').click(function() {
		$('#modal-diagnosis').modal('hide');
	});
</script>