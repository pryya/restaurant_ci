 <!-- Begin Page Content -->
 <div class="container-fluid">

 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
  </ol>

  <!-- Area Chart Example-->
  <div class="card mb-3">
    <div class="card-header">
      <h1>Selamat datang <?=$this->session->userdata('nama_user'); ?></h1>
      <h5>Anda masuk sebagai<i> <?=$this->session->userdata('nama_level'); ?></i></h5>
      <h4>Halaman ini hanya bisa diakses setelah login.</h4>
    </div>
  </div>

  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="<?php echo base_url("assets/img/hayamb.png")?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Hayam Bakakak</h5>
        <p>Jawa Barat</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo base_url("assets/img/cireng.png")?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Cireng</h5>
        <p>Jawa Barat</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo base_url("assets/img/ikanbungkus.png")?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Ikan Bungkus</h5>
        <p>Papua</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo base_url("assets/img/papeda.png")?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Papeda</h5>
        <p>Papua</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->