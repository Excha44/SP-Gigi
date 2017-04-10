<?php ob_start() ?>
<section class="content-header">    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<div class="row">
    <div class="col-xs-12" ">
        <div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-car"></i> <b><?php echo $data->merk . " " . $data->nama ?></b></h3>
            </div>
            <div class="box-body" style="font-size:17px">
                <?= $data->deskripsi ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6">
        <div class="box box-info">
            <div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-road"></i> Informasi Umum</h3>
            </div>
            <div class="box-body table-responsive">
                <dl class="dl-horizontal" style="font-size:18px">
                    <dt>Merk</dt>
                    <dd><?= $data->merk ?></dd>
                    <dt>Jenis</dt>
                    <dd><?= $data->jenis ?></dd>
                    <dt>Nama</dt>
                    <dd><?= $data->nama ?></dd>
                    <dt>Harga</dt>
                    <dd>
                        <?= Helper::idNumber($data->harga) ?>
                        <span class="text-danger" style="font-size: 12px;"> *syarat dan ketentuan berlaku</span>
                    </dd>
                    <dt></dt>
                    <dd>
                        <a href="?c=pelanggan&m=createkredit&mobil_id=<?= $data->id?>" class="btn  btn-success">
                            <i class="fa fa-car"></i>
                            <span>Ajukan Kredit</span>
                        </a>
                    </dd>
                </dl>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-xs-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-cogs"></i> Spesifikasi</h3>
            </div>
            <div class="box-body table-responsive" style="font-size:14px">
                <table class="my-table">
					<tr>
                        <td>Tipe Transmisi</td>
                        <td>:</td>
                        <td><?= $spesifikasi->transmisi ?></td>
                    </tr>
                    <tr>
                        <td>Silinder (cc)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->silinder ?></td>
                    </tr>
                    <tr>
                        <td>Tenaga</td>
                        <td>:</td>
                        <td><?= $spesifikasi->tenaga ?> PS / <?= $spesifikasi->tenaga_rpm ?> rpm</td>
                    </tr>
                    <tr>
                        <td>Torsi</td>
                        <td>:</td>
                        <td><?= $spesifikasi->torsi ?> Kgm / <?= $spesifikasi->torsi_rpm ?> rpm</td>
                    </tr>
                    <tr>
                        <td>Bahan Bakar</td>
                        <td>:</td>
                        <td><?= $spesifikasi->bahan_bakar ?></td>
                    </tr>
                    <tr>
                        <td>Kapasitas Tangki (L)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->kapasitas_tangki ?></td>
                    </tr>
                    <tr>
                        <td>Dimensi (PxLxT)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->dimensi_panjang ?> x <?= $spesifikasi->dimensi_lebar ?> x <?= $spesifikasi->dimensi_tinggi ?> (mm)</td>
                    </tr>
                    <tr>
                        <td>Jarak Poros Roda (mm)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->jarak_poros_roda ?></td>
                    </tr>
                    <tr>
                        <td>Jarak Pijak Depan (mm)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->jarak_pijak_depan ?></td>
                    </tr>
                    <tr>
                        <td>Jarak Pijak Belakang (mm)</td>
                        <td>:</td>
                        <td><?= $spesifikasi->jarak_pijak_belakang ?></td>
                    </tr>
                    <tr>
                        <td>Rem Depan</td>
                        <td>:</td>
                        <td><?= $spesifikasi->rem_depan ?></td>
                    </tr>
                    <tr>
                        <td>Rem Belakang</td>
                        <td>:</td>
                        <td><?= $spesifikasi->rem_belakang ?></td>
                    </tr>
                    <tr>
                        <td>Suspensi Depan</td>
                        <td>:</td>
                        <td><?= $spesifikasi->suspensi_depan ?></td>
                    </tr>
                    <tr>
                        <td>Suspensi Belakang</td>
                        <td>:</td>
                        <td><?= $spesifikasi->suspensi_belakang ?></td>
                    </tr>
                    <tr>
                        <td>Ukuran Ban</td>
                        <td>:</td>
                        <td><?= $spesifikasi->ukuran_ban ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-picture-o"></i> Galeri</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php $a=1;
		foreach ($galeri as $v) : ?>
        <div class="col-xs-4">
            <div class="box box-warning">
                <div class="box-body table-responsive text-center">
                    <div style="height:170px; ">
                    <img class="my-modal-img vertical-middle" id="<?php echo "myImg".$a ?>" src="<?= $v->gambar ?>" alt="<?php echo $data->merk ?> <?php echo $data->nama ?>" style="max-height: 100%; max-width: 100%; margin: auto;"/>
                    </div>
                    <?= $v->deskripsi ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    <?php $a++;
			endforeach; ?>
						
		<div id="myModal" class="modal">
		  <!-- The Close Button -->
			<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>
</div>
<script>
	var modal = document.getElementById('myModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
//	var img1 = document.getElementById('myImg1');
//	var img2 = document.getElementById('myImg2');
//	var img3 = document.getElementById('myImg3');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
    
    $(function(){
        $('.my-modal-img').click(function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            captionText.innerHTML = this.alt;
        });
    });
//	img1.onclick = function(){
//		modal.style.display = "block";
//		modalImg.src = this.src;
//		modalImg.alt = this.alt;
//		captionText.innerHTML = this.alt;
//	}
//	img2.onclick = function(){
//		modal.style.display = "block";
//		modalImg.src = this.src;
//		modalImg.alt = this.alt;
//		captionText.innerHTML = this.alt;
//	}
//	img3.onclick = function(){
//		modal.style.display = "block";
//		modalImg.src = this.src;
//		modalImg.alt = this.alt;
//		captionText.innerHTML = this.alt;
//	}
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}
</script>