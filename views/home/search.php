<?php ob_start() ?>
<section class="content-header">
    <h1 style="color:white">
        Produk Mobil
    </h1>    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<?php if (!$data) : ?>
<div class="col-xs-12">
    <div class="box box-danger">
        <div class="box-body table-responsive text-center">
            <div class="text-center">Tidak Ada Data</div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="row">
	<!-- 
	<div class="col-xs-12">
        <div class="box">
			<div class="box-title">
				<h3>Mobil Transmisi Auotmatic </h3>				
			</div>
		</div>
	</div>
	-->
    <?php foreach ($data as $v) : ?>
        <div class="col-xs-3">
            <div class="box box-danger">
                <div class="box-body table-responsive text-center">
                    <a href="?c=home&m=viewkatalog&id=<?= $v->id ?>" style="color:black">
                        <div style="height:130px;">
                            <img class="vertical-middle" src="<?= $v->gambar ? $v->gambar : 'images/car.jpg' ?>" alt="<?php echo $v->merk ?> <?php echo $v->nama ?>" style="margin: auto; max-width: 100%; max-height: 100%;"/>
                        </div>
                        <h4>
                            <?php echo $v->merk ?> <?php echo $v->nama ?>
                        </h4>
                    </a>
                    <a href="?c=home&m=viewkatalog&id=<?= $v->id ?>" class="btn btn-sm btn-danger form-control">
                        <span>
                            Lihat Detail
                        </span>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    <?php endforeach; ?>
</div>