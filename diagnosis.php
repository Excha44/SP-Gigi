<?php
include_once "helper/database.php";
session_start();

$data_gejala = Database::get("SELECT * FROM gejala");

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
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="img-res/favicon.ico">
</head><!--/head-->

<body>
  <header id="home">    
    <div class="main-nav navbar-fixed-top">
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
			<li><a href="#" id="submit-form">SUBMIT</a></li>
			<li><a href="index.php">HOME</a></li>
            <li><a href="#" onclick="testAjax()">AJAX</a></li>
            <?php if(@$_SESSION['user']){ ?>
				 <li><a href="#"><i class="fa fa-user"></i>&nbsp<?php echo $_SESSION['user'] ?> </a></li>                					
			<?php } ?>	       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  
  <section>
    <div class="container   wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
      <div class="row" style="margin-left:10%">
	    <h3 style="font-size:24px">Pilih Gejala yang anda alami dengan mencentang checkbox yang tersedia </h3>
	    <h4>Setelah anda memilih gejala tekan tombol Submit untuk melanjutkan</h4>
		<h4 id="textAjax"></h4>
      </div>
      <div class="row">
	    <hr>
        <form action="bayes.php" method="post" id="form-diagnosis" style="font-size:18px">          
            <div class="col-sm-8 col-sm-offset-2" style="margin-top:4%">
                <div class="box box-primary">
                    <div class="box-body">
                        <?php
                        if(@$_SESSION['error']){
                            echo "<p style=\"color:#FF3F64\">" . $_SESSION['error'] . "</p>";
                        }
                        ?>
                        <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Keterangan Gejala</th>
                                    <th class="text-center">Pilih</th>
                                </tr>
                            </thead>
                      <?php
                        $index = 1;
                        foreach($data_gejala as $v) { ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $v->id_gejala ?>
                                    </td>
                                    <td style="color:black">
                                        <?php echo $v->nama ?>
                                        <button class="btn btn-box-tool pull-right" data-toggle="collapse" data-target="#deskripsi<?php echo $index ?>" type="button" title="Deskripsi" style=""><i class="fa fa-angle-down"></i></button>
                                        <div id="deskripsi<?php echo $index ?>" class="collapse" style="color:#666">
                                            <p style="font-size:16px"><?php echo $v->keterangan ?></p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="pilih_gejala[]" value="<?php echo $v->id_gejala ?>">
                                    </td>
                                </tr>
                        <!-- <input type="checkbox" name="<?php echo "data" . "[" . $v->id_gejala ."]" ?>" value="<?php echo $v->id_gejala ?>"><?php echo $v->nama ?><br>  -->
                      <?php
                        $index++;
                        } ?>
                        <table>
                    </div>
                </div>
            </div>
        </form>
      </div>
  </div>
</section>

  <script>
      function testAjax(){
          var xhttp; textAjax;
          textAjax = document.getElementById('textAjax').innerHTML;
          if (textAjax !== ""){
              document.getElementById('textAjax').innerHTML = "";
          } else {
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200){
                      document.getElementById('textAjax').innerHTML = this.response;
                  }
              }
              xhttp.open("GET", "test_ajax.php?d=1", true);
              xhttp.send();
          }

      }

  </script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/main-diagnosis.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="dist/js/app.min.js"></script>
  <script src="dist/js/demo.js"></script>
 </body>
<?php
if(@$_SESSION['error']){
    unset($_SESSION['error']);
}
?>

<script>
	  $('#submit-form').click(function() {
		document.getElementById("form-diagnosis").submit();
		});

</script>

 </html>