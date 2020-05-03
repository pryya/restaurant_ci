
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Daftar Menu</h1>

          <section class="content">
          <?php echo $this->session->flashdata('message'); ?>
          <?php echo $this->session->flashdata('flash_sukses'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data </button>

      <a class="btn btn-warning" href="<?php echo base_url('admin/pdf_makanan') ?>" target="_blank0"><i class="fa fa-file"></i>Export PDF</a>

      <div class="navbar-form navbar-right mb-3">
      <form action="<?php echo site_url('admin/search_makanan');?>" methot="post">
    <input type="text" name="cari_makanan" style="margin-left:730px;" class="search" placeholder="Search" autocomplete="off" value="
<?php echo (isset($_GET['cari_makanan'])) ? $_GET['cari_makanan'] : '';?>">
    <button type="submit" style="margin-right:40px;" class="btn btn-primary" id="diprint">Cari</button>
   <a href="<?php echo site_url('admin/search_makanan'); ?>" class="btn btn-danger " name="satu" id="diprint" 
    style="text-decoration:none; color: black; margin-left:-40px;">Reset</a>
    </div>
    </form>
 
    </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Menu Makanan & Minuman</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Jenis Menu</th>
                      <th>Harga Satuan</th>
                      <th>Foto</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <th>No</th>
                      <th>Nama Makanan</th>
                      <th>Jenis Makanan</th>
                      <th>Harga Satuan</th>
                      <th>Foto</th>
                      <th colspan="3">Action</th>
                  </tfoot>
                  <tbody>
                   
                  <?php 

$no = 1;
foreach ($makanan as $m) : ?>

<tr>
  <td><?php echo $no++ ?></td>
  <td><?php echo $m->nama_menu ?></td>
  <td><?php echo $m->jenis_menu ?></td>
  <td>Rp. <?php echo number_format($m->harga_satuan) ?></td>
  <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $m->foto; ?>" width="64" height="50"></td>
  <td><?php echo anchor('admin/detail_menu/'.$m->id_menu,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_menu/'.$m->id_menu, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
  <td><?php echo anchor('admin/menu_ubah/'.$m->id_menu, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
</tr>

<?php endforeach; ?>   
</tbody>
                  </thead>
                </table>    

              </div>
            </div>
          </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Makanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_makanan');?>">

          <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" id="nama_menu" name="nama_menu" class="form-control" placeholder="Nama Makanan/Minuman...." required>
          </div>

          <div class="form-group">
          <label>Jenis Menu</label>
                 <select name="jenis_menu" class="form-control form-control-user" required>
                    <option value="-">-- Jenis Menu --
                    <option value= "Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                  </select>
          </div>

          <div class="form-group">
            <label>Harga Satuan</label>
            <input type="text" id="harga_satuan" name="harga_satuan" class="form-control" placeholder="Harga Satuan...." required>
          </div>

          <div class="form-group">
            <label>Upload Foto</label>
            <input type="file" id="foto" name="foto" class="form-control" required>
          </div>

          <div class="form-group">
								<label for="name">Deskripsi</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Product description..." required></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

           <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
          
        </form>
      </div>
    </div>
  </div>


              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

