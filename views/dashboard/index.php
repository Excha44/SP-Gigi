<?php ob_start() ?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php  echo count(@$data_penyakit) . '  '?><sup style="font-size: 20px">data</sup></h3> 
                  <p>Penyakit Gigi dan Mulut</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-pulse"></i>
                </div>
                <a href="home.php?c=penyakit&m=index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo count(@$data_bp) . '  '?> <sup style="font-size: 20px">data</sup></h3>
                  <p>Data Diagnosis Pakar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-browsers"></i>
                </div>
                <a href="home.php?c=data_diagnosis&m=index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo count(@$data_history). ' '?> <sup style="font-size: 20px">data</sup></h3>
                  <p>Data Konsultasi Sistem</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-folder-open"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo count(@$data_menunggu) . '  '?> <sup style="font-size: 20px">data</sup></h3>
                  <p>Data untuk diverifikasi pakar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-checkbox-outline"></i>
                </div>
                <a href="home.php?c=verifikasi&m=index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->           
</div><!-- /.row -->
