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
	
    <div class="box box-default">
        <form role="form" method="post" onsubmit="return validate()" id="mainForm" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="" />			
            <div class="box-body">
			<div class="row">
			<div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Diagnosis Penyakit</label>
							<select autofocus="" name="data[id_penyakit]" class="form-control">
                                <?php foreach($penyakit as $v): ?>
                                <option <?= @$data->id_penyakit == $v->id_penyakit? 'selected=""' : '' ?> value="<?= $v->id_penyakit ?>"><?= $v->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div> 				
                </div>  
				<div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Kode Gejala</label><br>
							Contoh: 1,2,4,...
							<?php 
								$terbesar = $id_grup_gejala->id;																
							?>
							<input type="hidden" name="data[id_grup_gejala]" value="<?php echo$terbesar + 1 ?>" />
							<input type="hidden" name="data2[id_grup_gejala]" value="<?php echo $terbesar + 1 ?>" />		
                            <input type="text" id="id_gejala" name="data2[id_gejala]" class="form-control" />							
                        </div>
                    </div>                   
                </div>
				<div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>                        
						<a class="btn btn-info" href="?c=data_diagnosis&m=index"><i class="fa fa-reply"></i> Kembali</a>
						<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myModal">Tambah Gejala</button>
                    </div>
                </div>
			</div>
			<div class="col-sm-4">	
				<br>
				<div class="small-box bg-green">
					<div class="inner">					  
					  <h3><?php echo count(@$data_bp) . '  '?> <sup style="font-size: 20px">data</sup></h3>
					  <p>Data Diagnosis Pakar</p>
					</div>
					<div class="icon">
					  <i class="ion ion-person-add"></i>
					</div>					
				 </div>            
			</div>
			
				</form>
				</div>
				<div class="row" style="margin-top:10px">
					<div class="col-sm-8">
						<div class="form-group">
						
						<table id="example2" class="table table-bordered table-hover" >
						<thead>
						<tr>
							<th>Kode Gejala</th>
							<th>Keterangan Gejala</th>                        							
						</tr>
						</thead>
						<?php if (!$gejala) : ?>
                        <tr>
                            <td colspan="100" class="text-center">Tidak Ada Data</td>
                        </tr>
						<?php endif; ?>
						<?php foreach ($gejala as $v) : ?>
                        <tr>
                            <td>								
								<?php echo $v->id_gejala ?>								
							</td>                            
                            <td>                                
                                <?php echo $v->nama ?>                                
                            </td>                                                       
                        </tr>
						<?php endforeach; ?>
					</table>
					</div>
					</div>
				</div>
               
				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog modal-sm">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Tambah Gejala</h4>
							</div>
							<form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data">
							<input type="hidden" name="id" value="" />			
							<div class="modal-body">
								<div class="form-group">
									<label>Keterangan Gejala</label>
									<input type="text" name="data_gejala[nama]" class="form-control" />
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="submit" id="submit" style="width: 100%;">
									<span class="glyphicon glyphicon-ok-sign"></span>
									Tambah Gejala
								</button>
							</div>
							</form>
						</div>
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
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
	  
	  function validate() {
        var id_gejala = document.getElementById("id_gejala").value;        
		var ok = true;
		
		if (id_gejala == ""){
			alert("Kode gejala harus diisi");
			document.getElementById("id_gejala").style.borderColor = "#E34234";
			return false;
		}
				
		var id_gejala_split = id_gejala.split(",");
		
		
		for (i = 0; i < id_gejala_split.length; i++) { 
			if(isFinite(id_gejala_split[i])){
				ok = true;
			} else {
				alert("Pastikan format pengisian kode gejala benar dan kode adalah angka ");
				document.getElementById("id_gejala").style.borderColor = "#E34234";
				return false;
			}
		}
        
        return ok;
    }
</script>


