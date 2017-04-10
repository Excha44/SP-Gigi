<?php ob_start() ?>
<section class="content-header">
		
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-danger" style="margin-left:auto;margin-right:auto;width:40%">
        <form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data" style="margin-left:10%">
            <input type="hidden" name="id" value="<?= @$data->id ?>" />
			<div class="box-header">
				<h2 > Edit Profile </h2>				
			</div>
			<div class="box-body">				
				<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="data[nama]" class="form-control" value="<?= @$data->nama ?>" />
                        </div>
                    </div>				
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="data[no_hp]" class="form-control" value="<?= @$data->no_hp ?>" />
                        </div>
                    </div>									                 
                </div> 
				<div class="row">
					<div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="data[email]" class="form-control" value="<?= @$data->email ?>" />
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
                            <label>Pendapatan (Rp)</label>
                            <select autofocus="" name="data[pendapatan_id]" class="form-control">
                                <?php foreach($pendapatan as $value): ?>
                                <option <?= @$data->pendapatan_id == $value->id ? 'selected=""' : '' ?> value="<?= $value->id ?>"><?= $value->pendapatan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="data[alamat]" rows="2" class="form-control"><?= @$data->alamat ?></textarea>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <!-- <a class="btn btn-info" href="?c=customer&m=index"><i class="fa fa-reply"></i> Kembali</a> -->
                    </div>
                </div><!-- /.row -->
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        $('[type=password]').next().mousedown(function(){
            $(this).prev().attr('type', 'text');
        });
        $('[type=password]').next().mouseup(function(){
            $(this).prev().attr('type', 'password');
        });
    });
</script>