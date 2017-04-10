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
                    <div class="col-sm-12" style="padding-left:100px;padding-right:50px">
						<h3>Profil Perusahaan</h3>
						<p style="text-align:left;">AUTO2000 adalah jaringan jasa penjualan, perawatan, perbaikan dan penyediaan 
						suku cadang Toyota yang berdiri sejak tahun 1975 dengan nama Astra Motor Sales, 
						dan baru pada tahun 1989 berubah nama menjadi AUTO2000 dengan manajemen yang sudah ditangani sepenuhnya 
						oleh PT. Astra International Tbk. AUTO2000 saat ini memiliki 96 outlet (terdiri dari 14 outlet V-hanya melayani jual beli kendaraan, 
						67 outlet VSP-melayani jual beli & service kendaraan, & 15 outlet VSPBP-melayani jual beli, service, perbaikan & pengecatan bodi kendaraan) 
						yang tersebar di hampir seluruh Indonesia (kecuali Sulawesi, Maluku, Irian Jaya, Jambi, Riau, Bengkulu, Jawa Tengah dan D.I.Y). 
						Di samping itu, AUTO2000 pun bekerjasama dengan 840 partshop yang tersebar di berbagai penjuru Indonesia, untuk menjamin keaslian suku cadang produk.
						Ke depannya jumlah jaringan AUTO2000 pun akan terus bertambah seiring dengan pertumbuhan bisnis, serta untuk memenuhi kebutuhan seluruh pelanggan,
						serta memberi kemudahan bagi calon pembeli Toyota.</p>

                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-6" style="padding-left:100px">
						<h3>Kantor</h3>
						<img style="height:300px;width:450px" src="images/profil.jpg"></img>
                    </div>
					<div class="col-sm-6" >
						<h3>Lokasi</h3>
						<div class="map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.0834588222815!2d112.61976551477935!3d-7.990317944245481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6281d09cc1267%3A0x2b3caf38f9d97758!2sAuto2000!5e0!3m2!1sid!2s!4v1463817317100" width="450" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
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