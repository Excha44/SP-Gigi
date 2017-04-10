<?php ob_start(); 

	$jumlah_penyakit_db = Database::getSingle("SELECT COUNT(id_penyakit) as jumlah_penyakit FROM penyakit");
	$jumlah_penyakit = $jumlah_penyakit_db->jumlah_penyakit;
	
	$jumlah_gejala_db = Database::getSingle("SELECT COUNT(id_gejala) as jumlah_gejala FROM gejala");
	$jumlah_gejala = $jumlah_gejala_db->jumlah_gejala;
	//echo $jumlah_gejala;
	
	$prob_gejala = array();
	for($j=1; $j<=$jumlah_gejala; $j++){
		for($i=1; $i<=$jumlah_penyakit; $i++){
			
			// Menghitung jumlah gejala $i dari semua basis pengetahuan dengan kode penyakit $i
			$jumlah_gejala_penyakit_db = Database::getSingle("SELECT COUNT(grup_gejala.id_gejala) as jumlah_gejala 
										FROM gejala NATURAL JOIN basis_pengetahuan NATURAL JOIN grup_gejala 
										WHERE id_gejala = '$j' AND id_penyakit= '$i'");
			$jumlah_gejala_penyakit = $jumlah_gejala_penyakit_db->jumlah_gejala;
			
			// Menghitung jumlah penyakit kode $i pada BP
			$jumlah_penyakit_bp_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah_bp FROM basis_pengetahuan WHERE id_penyakit = '$i'");
			$jumlah_penyakit_bp = $jumlah_penyakit_bp_db->jumlah_bp;
			
			if($jumlah_penyakit_bp > 0){
				$prob_gejala[$j][$i]= $jumlah_gejala_penyakit / $jumlah_penyakit_bp;
			} else {
				$prob_gejala[$j][$i]= 0;
			}
			if($prob_gejala[$j][$i]>0 && $prob_gejala[$j][$i]<1){
				$prob_gejala[$j][$i] = number_format($prob_gejala[$j][$i],2);
			} 
		}
	}
	
	$prob_penyakit = array();
	$jumlah_data_bp_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah FROM basis_pengetahuan"); 
	$jumlah_data_bp = $jumlah_data_bp_db->jumlah;
	
	for($i=1; $i<=$jumlah_penyakit; $i++){
		
		$jumlah_kemunculan_penyakit_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah
										FROM basis_pengetahuan
										WHERE id_penyakit= '$i'");
		$jumlah_kemunculan_penyakit = $jumlah_kemunculan_penyakit_db->jumlah;
		
		$prob_penyakit[$i] = $jumlah_kemunculan_penyakit / $jumlah_data_bp;
		
		if($prob_penyakit[$i]>0 && $prob_penyakit[$i]<1){
			$prob_penyakit[$i] = number_format($prob_penyakit[$i],2);
		}
	}

?>
<section class="content-header">
    <h1>
        Data Probabilitas       
    </h1>
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Probabilitas</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">

	<div class="col-sm-12">
        <div class="box">
            <div class="box-body">													
				<table  class="table table-hover">
					<thead>
                    <tr>
						<th>ID</th>
						<?php foreach($data_penyakit as $v) { ?>
                        <th class="text-center"><?php echo $v->nama ?></th>
						<?php } ?>                                             
                    </tr>
					</thead>
					<tr>
						<td>P</td>
					<?php for($i=1 ; $i<=$jumlah_penyakit; $i++) { ?>
						<td class="text-center"><?php echo $prob_penyakit[$i] ?></td>									
					<?php } ?>
                    <?php for($j=1; $j<=$jumlah_gejala; $j++){						
						echo "<tr>";
							echo "<td>" . $j . "</td>";
							 for($i=1; $i<=$jumlah_penyakit; $i++){ 
								echo "<td class=\"text-center\">" . $prob_gejala[$j][$i] . "</td>";
							 }
						echo "</tr>";
					} ?>					                                            
                </table>
            </div>
        </div>
    </div>
	<div style="height:790px"></div>
</div>
<?php

echo $prob_gejala[10][1];
?>
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
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
</script>

