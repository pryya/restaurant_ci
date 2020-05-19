 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800 text-center">Daftar Menu</h1>

<section class="content">
<?php echo $this->session->flashdata('message'); ?>
<?php echo $this->session->flashdata('flash_sukses'); ?>
<button class="btn btn-info" style="margin-left: 10px" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Pengguna
</button>

<p class="mb-2">
 <form action="<?php echo site_url('admin/search_makanan');?>" methot="post">
 <div class="input-group" style="padding: 10px;" >
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" id="diprint">Search</button>
  <a href="<?php echo site_url('admin/search_makanan'); ?>" class="btn btn-outline-danger" id="diprint">Reset</a>
  </div>
  <input type="text" name="cari_makanan" value="<?php echo (isset($_GET['cari_makanan'])) ? $_GET['cari_makanan'] : '';?>" placeholder="Data Menu"  aria-label="Last name" class="form-control" autocomplete="off" >
</div>
</form>
</p>

    

      <div class="row">
        <div class="col">
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card">
              <div class="card-header bg-primary-400 text-primary">Form Input Pengguna</div>
              <div class="card-body">
                <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_makanan');?>">
                    
                  <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" id="nama_menu" name="nama_menu" class="form-control" placeholder="Nama Makanan/Minuman...." required>
                    <label>Jenis Menu</label>
                    <select name="jenis_menu" class="form-control form-control-user" required>
                    <option value="-">-- Jenis Menu --
                    <option value= "Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                  </select>
                    <label>Harga Satuan</label>
                    <input type="text" id="harga_satuan" name="harga_satuan" class="form-control" placeholder="Harga Satuan...." required>
                    <label>Upload Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control" required>
                    <label>Deskripsi</label>
                    <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Product description..." required></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
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
              <div class="card-header bg-primary-500 text-primary">Data Tabel Pengguna</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white"> 
                      <tr class="text-center">
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Jenis Menu</th>
                      <th>Harga Satuan</th>
                      <th>Foto</th>
                      <th colspan="3">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no = 0;
                      foreach($makanan as $m):$no++;?>
                      <tr>
                        <td class="text-center text-middle"><?=$no;?></td>
                        <td class="text-middle"><?php echo $m->nama_menu ?></td>
                        <td class="text-middle"><?php echo $m->jenis_menu ?></td>
                        <td class="text-middle">Rp. <?php echo number_format($m->harga_satuan) ?></td>
                        <td class="text-middle"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $m->foto; ?>" width="64" height="50"></td>
                        <td><?php echo anchor('admin/detail_menu/'.$m->id_menu,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_menu/'.$m->id_menu, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
  <td><?php echo anchor('admin/menu_ubah/'.$m->id_menu, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                        
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
