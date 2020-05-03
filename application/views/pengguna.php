

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>

          <section class="content">
          <?php echo $this->session->flashdata('message'); ?>
          <?php echo $this->session->flashdata('flash_sukses'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#form"><i class="fa fa-plus"></i>Tambah Data </button>

      <a class="btn btn-warning" href="<?php echo base_url('admin/pdf') ?>" id="diprint"><i class="fa fa-file"></i>Export PDF</a>

      <div class="navbar-form navbar-right mb-3">
      <form action="<?php echo site_url('admin/search_pengguna');?>" methot="post">
    <input type="text" name="cari_pengguna" style="margin-left:730px;" class="search" placeholder="Search" autocomplete="off" value="
<?php echo (isset($_GET['cari_pengguna'])) ? $_GET['cari_pengguna'] : '';?>">
    <button type="submit" style="margin-right:40px;" class="btn btn-primary" id="diprint">Cari</button>
   <a href="<?php echo site_url('admin/search_pengguna'); ?>" class="btn btn-danger " name="satu" id="diprint" 
    style="text-decoration:none; color: black; margin-left:-40px;">Reset</a>
    </div>
    </form>
    
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama User</th>
                      <th>Id Level</th>
                      <th colspan="3">Action</th>
                    </tr>
                    <?php 

$no = 1;
foreach ($user as $s) : ?>

<tr>
  <td><?php echo $no++ ?></td>
  <td><?php echo $s->username ?></td>
  <td><?php echo $s->password ?></td>
  <td><?php echo $s->nama_user ?></td>
  <td><?php echo $s->id_level ?></td>
  <td><?php echo anchor('admin/detail/'.$s->id_user,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus/'.$s->id_user, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
  <td><?php echo anchor('admin/edit/'.$s->id_user, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
</tr>

<?php endforeach; ?>   
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama User</th>
                      <th>Id Level</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
          
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      
         
                
<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_pengguna');?>">
      <center><font color="red"><p id="pesan"></p></font></center>
          <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username...." required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" id="password" name="password" class="form-control" placeholder="Password...." required>
          </div>

          <div class="form-group">
            <label>Nama User</label>
            <input type="text" id="nama_user" name="nama_user" class="form-control" placeholder="Nama...." required>
          </div>

           <div class="form-group">
           <label>Role-(hak-akses)</label>
                    <select name="id_level" class="form-control form-control-user" required>
                    <option value="-">-pilihan-
                    <option value=1>Admin</option>
                    <option value=2 >Kasir</option>
                    <option value=3>Koki</option>
                    <option value=4>Owner</option>
                    </select>
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

