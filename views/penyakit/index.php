<?php ob_start() ?>
<section class="content-header">
    <h1>
        Penyakit & Gejala        
    </h1>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penyakit & Gejala</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">

<div class="row">
	<div class="col-xs-10">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><b>Gejala Penyakit</b></a></li>
                  <li><a href="#tab_2" data-toggle="tab"><b>Penyakit Gigi dan Mulut</b></a></li>                                                 
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>ID</th>
							<th>Keterangan Gejala</th>                        
							<th class="col-sm-1 text-center">
								<a href="?c=penyakit&m=edit" class="btn btn-sm btn-success">Tambah Data</a>
							</th>
						</tr>
						</thead>
						<?php if (!$data) : ?>
                        <tr>
                            <td colspan="100" class="text-center">Tidak Ada Data</td>
                        </tr>
						<?php endif; ?>
						<?php foreach ($data as $v) : ?>
                        <tr>
                            <td>								
								<?php echo $v->id_gejala ?>								
							</td>                            
                            <td>                                
                                <?php echo $v->nama ?>                                
                            </td>                           
                            <td class="text-center">                                                                
                                <a href="?c=penyakit&m=edit&id=<?php echo $v->id_gejala ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil">&nbsp Edit Data</i></a>
                                <!-- <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="?c=penyakit&m=delete&id=<?php echo $v->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>
						<?php endforeach; ?>
					</table>
                    
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">					
					<table id="example2" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>ID</th>
							<th>Nama Penyakit</th>                        							
							<th class="text-center">
								<a href="?c=penyakit&m=editpenyakit" class="btn btn-sm btn-success">Tambah Data</a>
							</th>
						</tr>
						</thead>
						<?php if (!$data2) : ?>
                        <tr>
                            <td colspan="100" class="text-center">Tidak Ada Data</td>
                        </tr>
						<?php endif; ?>
						<?php foreach ($data2 as $v) : ?>
                        <tr>
                            <td>								
								<?php echo $v->id_penyakit ?>								
							</td>                            
                            <td>                               
                                <?php echo $v->nama ?>                                
                            </td>                           							
                            <td class="nowrap text-center">                                                                
                                <a href="?c=penyakit&m=editpenyakit&id=<?php echo $v->id_penyakit ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil">&nbsp Edit Data</i></a>
                                <!-- <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="?c=penyakit&m=deletepenyakit&id=<?php echo $v->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>
						<?php endforeach; ?>
					</table>
					
                </div><!-- /.tab-pane -->                  
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div>
</section>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
</script>

