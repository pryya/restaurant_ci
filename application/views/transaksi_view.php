

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

          <section class="content">
          <?php echo $this->session->flashdata('message'); ?>
          <a class="btn btn-primary" href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-plus"></i>Tambah Data </a>

<div class="navbar-form navbar-right mb-3">
<form action="<?php echo site_url('admin/search_transaksi1');?>" methot="post">
<input type="text" name="cari_transaksi" style="margin-left:730px;" class="search" autocomplete="off" placeholder="Search" value="
<?php echo (isset($_GET['cari_transaksi'])) ? $_GET['cari_transaksi'] : '';?>">
<button type="submit" style="margin-right:40px;" class="btn btn-primary" id="diprint">Cari</button>
<a href="<?php echo site_url('admin/search_transaksi1'); ?>" class="btn btn-danger " name="satu" id="diprint" 
style="text-decoration:none; color: black; margin-left:-40px;">Reset</a>
</div>
</form>

    
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>ID Transaksi</th>
                      <th>ID Pesanan</th>
                      <th>ID User</th>
                      <th>Tanggal Jual</th>
                      <th>Subtotal</th>
                      <th>Bayar</th>
                      <th>Kembalian</th>
                      <th>Action</th>
                    </tr>
                    <?php 

$no = 1;
foreach ($transaksi1 as $t) : ?>

<tr>
  <td><?php echo $no++ ?></td>
  <td><?php echo $t->id_transaksi ?></td>
  <td><?php echo $t->id_pesanan ?></td>
  <td><?php echo $t->id_user ?></td>
  <td><?php echo $t->tgl_jual ?></td>
  <td><?php echo $t->subtotal ?></td>
  <td><?php echo $t->bayar ?></td>
  <td><?php echo $t->kembalian ?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_vtransaksi/'.$t->id_transaksi, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
 
  </tr>

<?php endforeach; ?>   
                  </thead>
                  <tbody>
          
                   
                  </tbody>
                </table>
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

