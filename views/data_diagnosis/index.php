<?php ob_start() ?>
<section class="content-header">
    <h1>
        Data Diagnosis       
    </h1>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Diagnosis</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">

	<div class="col-xs-10">
        <div class="box">
            <div class="box-body">
					<table id="example2" class="table table-bordered">
				
					<thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Gejala</th> 
						<th>Diagnosis Penyakit</th>	
                        <th class="col-sm-1 text-center">
                            <a href="?c=data_diagnosis&m=edit" class="btn btn-sm btn-success">Tambah</a>
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
								<?php echo $v->id_bp ?>								
							</td>                            
                            <td>                               
                                <?php 
									$result = array();
									$i = 0;
									foreach($kode_gejala as $c){
										if($c->id_grup_gejala == $v->id_grup_gejala){
											$result[$i] =  $c->id_gejala ;
											$i++;
										}
									}
									$result_full = implode(', ', $result);
									echo $result_full;
								?>
                            </td> 
							<td>
								<?php echo $v->nama ?>
							</td>
                            <td class="nowrap text-center">                                                                                              								
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="?c=data_diagnosis&m=delete&id=<?php echo $v->id_bp ?>" class="btn btn-sm btn-danger">Hapus</a>							
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

</section>

<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
		  "lengthMenu": [10],
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false,
		  "pagingType": "simple_numbers"
        });
      });
</script>

