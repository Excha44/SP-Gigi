<?php
session_start();
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
  
  <script type="text/javascript" src="js/jquery.js"></script>

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link rel="shortcut icon" href="img-res/favicon.ico">
</head><!--/head-->

<body>

  <!--.preloader-->
  <!--<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>-->
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(img-res/slider/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><span>Selamat Datang</span></h1>
            <p class="animated fadeInRightBig">di Website Sistem Pakar Gigi dan Mulut</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Selanjutnya</a>
          </div>
        </div>
        <div class="item" style="background-image: url(img-res/slider/2.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><span>Diagnosa Penyakit</span></h1>
            <p class="animated fadeInRightBig">Mudah dan Cepat</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#diagnosa">Mulai Konsultasi</a>
          </div>
        </div>
        <div class="item" style="background-image: url(img-res/slider/3.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><span>Kenali Macam Penyakit</span></h1>
            <p class="animated fadeInRightBig">Penyakit Gigi dan Mulut yang dapat diderita</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#portfolio">Lihat Penyakit</a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
	
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">			          
          <a class="navbar-brand" href="index.php">
            <h1><img class="img-responsive" src="img-res/logo2.png" alt="logo" style="width:150%"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#services">About</a></li> 
			<li class="scroll"><a href="#diagnosa">Diagnosa</a></li> 
            <li class="scroll"><a href="#portfolio">Penyakit</a></li>
            <li><a href="#" data-toggle="modal" data-target="#modal-help" id="click-modal-login">Help</a></li>
			<?php if(!@$_SESSION['user']) : ?>
				<li><a href="#" data-toggle="modal" data-target="#myModal" id="click-modal-login">Login</a></li>
			<?php endif; ?>
			<?php if(@$_SESSION['user']): ?>
				<li><a href="histori.php?id=<?php echo $_SESSION['id_user'] ?>">Riwayat</a></li>
				 <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i>&nbsp<?php echo $_SESSION['user'] ?> </a>
					<ul class="dropdown-menu" >
						<li class="user-footer">
							<a href="proses_login.php?s=logout" class="btn btn-default btn-flat col-sm-12">
								<i id="signout-fa" class="fa fa-lock"></i>
								<span>Sign out</span>
							</a>
						</li>
					</ul>
				 </li>                 					
			<?php endif; ?>	             						
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">	
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
			<br>
            <h2>About Website</h2>
            <p>Website Sistem Pakar Gigi Dan Mulut adalah website yang menyediakan fasilitas untuk mediagnosis penyakit gigi dan mulut.
			   Dengan memilih gejala yang ada, sistem ini dapat mendiagnosis penyakit gigi dan mulut yang mungkin diderita.</p>
			<br>
			<h2>Apakah itu Sistem Pakar?</h2>
			<p>Expert System atau Sistem pakar adalah sistem informasi yang berisi dengan pengetahuan dari pakar yang digunakan untuk
				melakukan konsultasi. Pengetahuan dari pakar akan diolah  menggunakan teknik tertentu sehingga dapat mengetahui atau memprediksi
				penyakit yang mungkin diderita.</p>
          </div>
        </div> 
      </div>
	  <?php if(!@$_SESSION['user']) { ?>
      <div class="text-center our-services">
        <div class="row">
		  <div class="col-sm-1">
		  </div>
          <div class="col-sm-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">			
				<i class="fa fa-user" data-toggle="modal" data-target="#myModal" id="click-modal-login"></i>			
            </div>			
            <div class="service-info">
              <h3>Login</h3>
              <p>Login terlebih dahulu untuk dapat melakukan konsultasi pada sistem pakar</p>
            </div>
          </div>
          <div class="col-sm-5 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-sign-in" data-toggle="modal" data-target="#myModal" id="click-modal-register"></i>
            </div>
            <div class="service-info">
              <h3>Register</h3>
              <p>Daftar gratis tanpa dipungut biaya untuk dapat berkonsultasi dengan sistem</p>
            </div>
          </div>
		  <div class="col-sm-1">
		  </div>
        </div>
      </div>
	  <?php } ?>
    </div>
  </section><!--/#services-->
  
  <section id="diagnosa">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Diagnosis Penyakit</h2>
          <p>Anda dapat melakukan konsultasi dengan sistem untuk mengetahui kemungkinan penyakit gigi dan mulut yang anda derita.
			Caranya mudah dan prosesnya cepat. Anda hanya perlu memilih gejala yang anda alami dan sistem akan mendiagnosa penyakit yang mungkin diderita</p>		  
		  <br>
			  <div class="service-icon">
				
				
					<a href="diagnosis.php"><i class="fa fa-sign-in"></i></a>
				<!--
					<i class="fa fa-sign-in" data-toggle="modal" data-target="#modal-diagnosis" id="click-modal-login" ></i>
				
				-->
			  </div>
			  <div class="service-info">
				<h3>Mulai Konsultasi</h3>		    
			  </div>

            <!--
		  <div class="col-sm-2">
			<div class="service-icon" style="height:45px;width:45px;font-size:24px;margin-top:15%;line-height:50px">
				<i class="fa fa-question" data-toggle="modal" data-target="#modal-help"></i>
			</div>
			<div class="service-info">
				<h3>Bantuan</h3>
			</div>
		  </div>
		  -->
        </div>
      </div>
    </div>
  </section><!--/#team-->
  
  <section id="portfolio" style="margin-top:-10%">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Kenali Penyakit Gigi dan Mulut</h2>
          <p>Kenali beberapa penyakit gigi dan mulut yang dapat anda derita. Masih ada banyak macam penyakit gigi dan mulut yang dapat menyerang anda.
				Berikut beberapa penyakit gigi dan mulut yang sering diderita</p>
        </div>
      </div> 
    </div>
    <div class="container-fluid" style="background-image: url(img-penyakit/bg-penyakit3.jpg)">
      <div class="row">
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit1.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">					
                    <h3>Karies Gigi</h3>
                    <!-- <p>Design, Photography</p>-->
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/karies.html" ><i class="fa fa-navicon"></i></a></span>
                    <!-- <span class="folio-expand"><a href="img-penyakit/1.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit2.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Abses Periodontal</h3>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/abses.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="500ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit3.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Stomatitis</h3>                   
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/stomatitis.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit4.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Gingivitis</h3>                   
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/gingivitis.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="700ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit5.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Pulpitis Reversibel</h3>                    
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/pulpitis-rev.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="800ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit6.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Pulpitis Ireversibel</h3>                    
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/pulpitis-irev.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="900ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit7.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Herpes Labialis</h3>                    
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/herpes.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="1000ms">
            <div class="folio-image">
              <img class="img-responsive" src="img-penyakit/penyakit8.png" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Glositis</h3>                    
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="penyakit/glositis.html" ><i class="fa fa-navicon"></i></a></span>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
  </section><!--/#portfolio-->

  <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Tahukah anda?</h2>
            <p>Penyakit gigi dan mulut menjadi penyakit tertinggi ke-6 yang dikeluhkan masyarakat Indonesia dan 
				penyakit dengan peringkat ke-4 penyakit termahal dalam perawatannya.</p>
            <p>Penyakit gigi dan mulut yang banyak diderita adalah karies (gigi berlubang) dan penyakit jaringan penyangga gigi (radang gusi) 
				yang semuanya berkaitan erat dengan perilaku membersihkan gigi dan mulut keseharian</p>
			<p>Sumber (lifestyle.bisnis.com)</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="lead">Karies Gigi</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="60">40%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
              <p class="lead">Gingivitis</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="45">35%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead">Abses</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="30">20%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="lead">Lain-lain</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="8">5%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#about-us-->

  
  
  
  
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo" >
          <a href="index.html" ><img  src="img-res/logo2.png" alt="" style="width:120%;height:120%"></a>
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
	
	<!-- MODAL -->
	<div id="myModal" class="modal fade" role="dialog" style="position:fixed;top:20%">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a  href="#services" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a  href="#services" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">							
							<div class="col-lg-12">
								<form id="login-form" action="proses_login.php?s=login"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="data[username]" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="data[password]" id="password-login" tabindex="2" class="form-control" placeholder="Password">
									</div>									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>									
								</form>								
								<form id="register-form" action="proses_login.php?s=register" onsubmit="return validate()" method="post" role="form" style="display: none;">
									<input type="hidden" name="data[level]" value="2">
									<div class="form-group">
										<input type="text" name="data[username]" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>									
									<div class="form-group">
										<input type="password" name="data[password]" id="password-register" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="3" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
								<a href="#services" id="close-modal">Close</a>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	
	<div id="modal-diagnosis" class="modal fade" role="dialog" style="position:fixed;top:20%">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a  href="#team" class="active" id="login-form-link-diagnosis">Login</a>
							</div>
							<div class="col-xs-6">
								<a  href="#team" id="register-form-link-diagnosis">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form-diagnosis" action="proses_login.php?s=login_diagnosis"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="data[username]" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="data[password]" id="password-login" tabindex="2" class="form-control" placeholder="Password">
									</div>									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>									
								</form>								
								<form id="register-form-diagnosis" action="proses_login.php?s=register_diagnosis" onsubmit="return validate()" method="post" role="form" style="display: none;">
									<input type="hidden" name="data[level]" value="2">
									<div class="form-group">
										<input type="text" name="data[username]" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>									
									<div class="form-group">
										<input type="password" name="data[password]" id="password-register" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="3" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
								<a href="#team" id="close-modal2">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

    <div id="modal-help" class="modal fade" role="dialog" style="position:fixed;top:5%">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-login">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-8 col-xs-offset-2">
                              <h2>Bantuan</h2>
                          </div>
                          <div class="col-xs-2">
                              <h2><a href="#diagnosa" id="close-modal-help">X</a></h2>
                          </div>
                      </div>
                      <hr>
                  </div>
                  <div class="panel-body-help">
                      <div class="row">
                          <div class="col-lg-10 col-lg-offset-1">
                              <h3><b>Konsultasi</b></h3>
                              <p>Untuk melakukan konsultasi, anda diharuskan sudah dalam status <b>LOGIN</b> pada website.</p>
                              <p>Setelah itu anda harus memilih gejala-gejala yang diderita.Setelah memilih gejala,
                                  tekan Submit untuk menampilkan hasil diagnosis sistem pakar</p>
                              <img class="img-responsive" src="img-res/help/test.png" style="width:70%;height:60%;padding-left:10%"/>
                          </div>
                      </div>
                      <div class="row" style="margin-top:5%;margin-bottom:5%">
                          <div class="col-lg-10 col-lg-offset-1">
                              <h3><b>Hasil Diagnosis</b></h3>
                              <p>Pada halaman diagnosis akan keluar nama penyakit yang didierita beserta sebuah nilai persentase
                                yang dihasilkan dari perhitungan sistem</p>
                              <p>Nilai persentase menandakan besaran peluang atau kemungkinan penyakit diderita.</p>
                              <img class="img-responsive" src="img-res/help/help2.jpg" style="width:70%;height:60%;padding-left:10%"/>
                          </div>
                      </div>
                      <!-- <div class="row">
                          <div class="col-lg-10 col-lg-offset-1">
                              <a href="#services" id="close-modal-help">Close</a>
                          </div>
                      </div> -->
                  </div>
              </div>
          </div>
      </div>
  </div>

	<!-- MODAL -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  

</body>
</html>
<script>	
    	
	$('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
	$('#login-form-link-diagnosis').click(function(e) {
		$("#login-form-diagnosis").delay(100).fadeIn(100);
		$("#register-form-diagnosis").fadeOut(100);
		$('#register-form-link-diagnosis').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
	$('#register-form-link-diagnosis').click(function(e) {
		$("#register-form-diagnosis").delay(100).fadeIn(100);
		$("#login-form-diagnosis").fadeOut(100);
		$('#login-form-link-diagnosis').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
	$('#click-modal-login').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$('#login-form-link').addClass('active');
		e.preventDefault();
	});
	
	$('#click-modal-register').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$('#register-form-link').addClass('active');
		e.preventDefault();
	});
	
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

    $('#close-modal-help').click(function() {
        $('#modal-help').modal('hide');
    });
</script>