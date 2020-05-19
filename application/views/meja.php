 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800 text-center">Daftar Meja</h1>

<section class="content">
<?php echo $this->session->flashdata('message'); ?>
<?php echo $this->session->flashdata('flash_sukses'); ?>
<button class="btn btn-info" style="margin-left:10px" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Pengguna
</button>

<p class="mb-2">
 <form action="<?php echo site_url('admin/search_meja');?>" methot="post">
 <div class="input-group" style="padding: 10px;" >
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" id="diprint">Search</button>
  <a href="<?php echo site_url('admin/search_meja'); ?>" class="btn btn-outline-danger" id="diprint">Reset</a>
  </div>
  <input type="text" name="cari_meja" value="
<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : '';?>" placeholder="No Meja" aria-label="Last name" class="form-control" autocomplete="off" >
</div>
</form>
</p>

  <div class="row">
    <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
    <div class="card">
    <div class="card-header bg-primary-400 text-primary">Form Input No</div>
    <div class="card-body">
    <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_meja');?>">
      <div class="form-group">
         <label>Deskripsi Meja</label>
         <input type="text" id="deskripsi_meja" name="deskripsi_meja" class="form-control" placeholder="Deskripsi...."  required>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-save">&nbsp;&nbsp;Simpan</i></button>
      <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
    </form>
    </div>
  </div>
  </div>
</div> 
</div>

  <div class="row">
  <div class="col">
  <div class="collapse multi-collapse show" id="multiCollapseExample2">
  <div class="card shadow-lg">
  <div class="card-header bg-primary-500 text-primary">Daftar No Meja</div>
  <div class="card-body">
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead class="bg-info text-white"> 
    <tr class="text-center">
       <th>No Meja</th>
       <th>Deskripsi Meja</th>
       <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
 <?php 

foreach ($meja as $m) : ?>

<tr>
  <td><?php echo $m->no_meja ?></td>
  <td><?php echo $m->deskripsi_meja ?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_meja/'.$m->no_meja, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
  <td><?php echo anchor('admin/edit_meja/'.$m->no_meja, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
  
</tr>
<?php endforeach; ?>   
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
