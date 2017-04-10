<?php ob_start() ?>
<section class="content-header">
    <h1>
        Edit Gejala        
    </h1>
	
	<ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penyakit & Gejala</li>
    </ol>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-default">
        <form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo @$data->id_gejala ?>" />			
            <div class="box-body">             
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="text" name="data[nama]" class="form-control" value="<?= @$data->nama ?>" />
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan Gejala</label>
                            <textarea name="data[keterangan]" id="keterangan" rows="10" style="width:100%"><?= @$data->keterangan ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a class="btn btn-info" href="?c=penyakit&m=index"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                </div><!-- /.row -->
            </div>
        </form>
    </div>
</section>
