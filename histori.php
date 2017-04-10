<?php
include_once "helper/database.php";
session_start();

if($_GET['id']){
	$id_user = $_GET['id'];
	
	$data_history = Database::get("SELECT * FROM history WHERE id_user = '$id_user' ORDER BY tanggal DESC");
	

}
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
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

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
    
    <div class="main-nav  navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">			
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            <h1><img class="img-responsive" src="img-res/logo2.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
			<li class="scroll"><a href="index.php#diagnosa" id="submit-form" >HOME</a></li>
            <?php if(@$_SESSION['user']){ ?>
				 <li class="scroll"><a href="#"><i class="fa fa-user"></i>&nbsp<?php echo $_SESSION['user'] ?> </a></li>                					
			<?php } ?>	       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->  
	
  <section>
	<div class="row" style="min-height:340px">
	  <div class="col-xs-1"></div>
	  <div class="col-xs-8" style="margin-left:8%">
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">
						<h3><b> Riwayat Konsultasi Anda </b></h3>
					</div>
				</div>
				<div class="box-body">
					
					<table class="table table-bordered">
						<tr>
							<th>Tanggal Konsultasi</th>
							<th>Gejala</th>
							<th class="text-center">Diagnosa Penyakit</th>
						</tr>
						<?php if (!$data_history) : ?>
							<tr>
								<td colspan="100" class="text-center">Anda belum pernah melakukan konsultasi pada sistem pakar</td>
							</tr>
						<?php endif; ?>
						<?php foreach ($data_history as $v) : ?>
							<tr>
								<td>
									<?php 
										$tanggal_lengkap = date("d F Y", strtotime($v->tanggal) );
										//echo $v->tanggal 
										echo $tanggal_lengkap;
									?>																		
								</td>                           
								<td>
									<?php
										$id_gejala_split = explode(",", $v->id_gejala);									
										for($i=0; $i<count($id_gejala_split); $i++){
											$nama_gejala_db = Database::getSingle("SELECT * from gejala WHERE id_gejala = '$id_gejala_split[$i]'");
											echo "- " . $nama_gejala_db->nama . "<br>";
										}
									?>
								</td>
								<td class="nowrap text-center">
									<?php 
										$data_penyakit = Database::getSingle("SELECT * from penyakit WHERE id_penyakit = '{$v->id_penyakit}'");
										echo $data_penyakit->nama;
									?>
									<br><br>
									<form action="detail.php" method="post">
										<input type="hidden" name="id_history" value="<?php echo $v->id_history ?>">
										<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
										<button type="submit" class="btn btn-sm btn-primary">Detail</a>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
					
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
  </section>
  
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