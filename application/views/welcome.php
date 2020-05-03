
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

    <div class="container-fluid">

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Masukan No Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('admin/tambah_meja'); ?>

        <div class="form-group">
            <label>No Meja</label>
            <input type="text" id="no_meja" name="no_meja" class="form-control" placeholder="No Meja....">
          </div>

          <div class="form-group">
            <label>Deskripsi Meja</label>
            <input type="text" id="deskripsi_meja" name="deskripsi_meja" class="form-control" placeholder="Deskripsi Meja....">
          </div>

         
           <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
          
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>