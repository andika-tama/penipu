<!DOCTYPE html>
<html lang="en">

<div id="content" class="p-4 p-md-5 pt-5 bg-gradient-light">

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('aset/img/1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-white"><b> Hati - Hati Penipuan! </b></h3>
            <p>Hati - hati, bertransaksi ditempat yang tidak ada garansi, beresiko penipuan! </p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('aset/img/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-white"><b> Cek Sebelum Bertransaksi! </b></h3>
            <p>Ingat selalu cek nomor rekening sebelum bertransaksi dengannya!</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('aset/img/3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-white"><b>Laporankan Penipuan!  </b></h3>
            <p>Laporankan nomor rekening beli terjadi penipuan!</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Selamat Datang!
    <?php $nama = $this->session->userdata('pelapor'); ?>
    <?php if($nama != NULL) : ?>
      <?php echo $nama ?>
    <?php endif; ?>
    </h1>
    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Cari Nomor Rekening</h4>
          <div class="card-body">
            <p class="card-text">Cari nomor rekening yang dicurigai sebelum bertransaksi dengannya!</p>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('cari') ?>" class="btn btn-emas">Cari!</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Laporkan Nomor Rekening!</h4>
          <div class="card-body">
            <p class="card-text">Laporkan nomor rekening penipu agar meminimalisir korban penipuan!</p>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('laporan/buat_laporan') ?>" class="btn btn-primary">Buat Laporan!</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Lihat Laporan</h4>
          <div class="card-body">
            <p class="card-text">Lihat riwayat pelaporan dari nomor rekening yang dicari!</p>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('cari') ?>" class="btn btn-info">Lihat Laporan</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

</div>

</html>
