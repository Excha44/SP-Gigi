<?php ob_start() ?>
<section class="content-header">
    
    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

</section>

</div>
<!-- <div id="parallax-window1" style="margin-top:-50px"></div>-->

<div class="container">
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6" style="padding-left:50px; text-align:left">
						<h3>Cara Pengajuan Kredit</h3>
						<p>1. Pilih mobil yang anda inginkan.</p>
						<p>2. Pilih jangka angsuran dan masukkan uang muka, lalu tekan tombol Ajukan Kredit.</p>						
						<p>3. Tunggu sementara proses pengajuan kredit anda untuk disetujui oleh pihak kami.</p>
						<p>4. Pantau status kredit anda pada hamalan Kredit Customer</p>	
						<p>5. Ketika kredit telah disetujui, maka status kredit akan menjadi 'Berjalan' dan anda </p>
						<p>&nbsp; &nbsp; dapat melakukan pembayaran angsuran</p><br>
						<h3>Cara Melakukan Konfirmasi Pembayaran Angsuran</h3>
						<p>1. Pastikan kredit anda sudah diterima dan tekan tombol pembayaran</p>						
						<p>2. Masukkan tanggal transfer, nomor rekening beserta foto bukti transfer</p>						
						<p>3. Jika sudah lengkap tekan tombol 'Simpan'</p>
						<p>4. Tunggu pembayaran anda dikonfirmasi oleh pihak kami, Anda dapat memantau 
						<p>&nbsp; &nbsp;  histori pembayaran anda pada menu 'Histori Pembayaran'</p>
						
                    </div>
					<div class="col-sm-6">
						<h3>Nomor Rekening</h3>
						<table class="table" style="width:80%">
							<thead>
								<th>Bank</th>
								<th>Rekening</th>
								<th>Atas Nama</th>
							</thead>
							<tbody>
								<tr>
                                    <td class="text-center"><img src="images/bank_bca.png" style="height:20px"/></td>
									<td>8160.270.200</td>
									<td>PT ASTRA INTERNATIONAL TBK</td>
								</tr>
								<tr>
									<td class="text-center"><img src="images/bank_bni.png"  style="height:20px"/></td>
									<td>0540.246.009</td>
									<td>PT ASTRA INTERNATIONAL TBK</td>
								</tr>
							</tbody>
						</table>
                    </div>
                </div>
				
            </div>
        </div>
    </section>
</div>



<!-- <div id="parallax-window2"></div>-->

<!--
<div class="container">
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        Selamat Datang Di Website 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
-->
<script src="plugins/parallax/parallax.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#parallax-window1').parallax({imageSrc: 'images/mobil3.jpg', zIndex: 1});
        $('#parallax-window2').parallax({imageSrc: 'images/parallax2.jpg', zIndex: 1});
    });
</script>

<script type="text/javascript">
    var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>

<style type="text/css">
    #parallax-window1, #parallax-window2 {
        min-height: 400px;
        background: transparent;
    }
    section.content {
        min-height: 0;
    }
</style>