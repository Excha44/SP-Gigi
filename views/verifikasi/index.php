<?php ob_start(); 
	
include_once "../helper/database.php";

?>
<section class="content-header">
    <h1>
        Data Konsultasi User       
    </h1>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Konsultasi User</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
<div class="row">		
	<div class="col-md-6">
	  <div class="box box-default collapsed-box">
		<div class="box-header with-border">
		  <h3 class="box-title">Mohon bantuan pengecekan data konsultasi</h3>
		  <div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-down"></i></button>
		  </div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
		  <p>Untuk dapat membantu website sistem pakar gigi dan mulut selalu diperbarui dengan data diagnosis yang baru,
			mohon bantuan untuk mengecek dari data konsultasi pengguna website berikut apakah sudah layak untuk digunakan sebagai data diagnosis </p>
		  <p>Untuk memilih data yang sudah layak, dapat menekan tombol centang berwarna hijau. Jika tidak layak dapat menekan tombol silang
			berwarna merah.</p>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->		
</div>

<?php if(@$_SESSION['notif'] == "sukses"){ ?>
<div class="row">
    <div class="col-xs-10">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> Verifikasi Sukses!</h4>
            Proses Verifikasi data konsultasi telah sukses dilakukan
        </div>
    </div>
</div>
<?php } ?>
<div class="row">
	<div class="col-xs-10">
        <div class="box">
            <div class="box-body">	
			
				<?php if(!$data_history){ ?>
					<table class="table table-bordered">
				<?php } else { ?>
					<table  id="example2" class="table table-bordered">
				<?php } ?>
					<thead>
                    <tr>
						<th>ID</th>						
                        <th>Keterangan Gejala</th>
						<th>Diagnosis Penyakit</th>
						<th class="text-center">Verifikasi</th>						
                    </tr>
					</thead> 
					<?php if (!$data_history) : ?>
                        <tr>
                            <td colspan="100" class="text-center">Tidak Ada Data</td>
                        </tr>
					<?php endif; ?>
                    <?php foreach ($data_history as $v) : ?>
                        <tr>
                            <td>								
								<?php echo $v->id_history ?>								
							</td> 							
                            <td>                               
                                <?php 		
									$id_gejala_split = explode(",", $v->id_gejala);									
									for($i=0; $i<count($id_gejala_split); $i++){
										$nama_gejala_db = Database::getSingle("SELECT nama from gejala WHERE id_gejala = '$id_gejala_split[$i]'");
										echo "- " . $nama_gejala_db->nama . "<br>";
									}								
								?>
                            </td>
							<td>                                
                                <?php echo $v->nama ?>                                
                            </td> 
                            <td class="nowrap text-center">                                                                
                                <a href="?c=verifikasi&m=setuju&id=<?php echo $v->id_history ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                <a href="?c=verifikasi&m=tidak_setuju&id=<?php echo $v->id_history ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
						<?php endforeach; ?>					                                            
                </table>
            </div>
        </div>
    </div>
</div>

</section>

<?php
    unset($_SESSION['notif']);
?>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
		  "lengthMenu": [5],
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": false,
		  "pagingType": "simple"
        });
      });
</script>

