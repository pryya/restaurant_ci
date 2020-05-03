
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Daftar Meja</h1>

          <section class="content">
          <?php echo $this->session->flashdata('message'); ?>
          <?php echo $this->session->flashdata('flash_sukses'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data </button>
      
      <div class="navbar-form navbar-right mb-3">
      <form action="<?php echo site_url('admin/search_meja');?>" methot="post">
    <input type="text" name="cari_meja" style="margin-left:730px;" class="search" autocomplete="off" placeholder="Search" value="
<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : '';?>">
    <button type="submit" style="margin-right:40px;" class="btn btn-primary" id="diprint">Cari</button> 
    <a href="<?php echo site_url('admin/search_meja'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black; margin-left:-40px;">Reset</a>
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
                      <th>No Meja</th>
                      <th>Deskripsi Meja</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <th>No Meja</th>
                      <th>Deskripsi Meja</th>
                      <th colspan="3">Action</th>
                  </tfoot>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_meja');?>">
          <div class="form-group">
            <label>Deskripsi Meja</label>
            <input type="text" id="deskripsi_meja" name="deskripsi_meja" class="form-control" placeholder="Deskripsi...."  required>
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

