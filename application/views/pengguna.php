<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 text-center">Data Pengguna</h1>
  <section class="content">
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo $this->session->flashdata('flash_sukses'); ?>
    <button class="btn btn-info" style="margin-left: 10px" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Pengguna
          </button>

<p class="mb-2">
 <form action="<?php echo site_url('admin/search_pengguna');?>" methot="post">
 <div class="input-group" style="padding: 10px;" >
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" id="diprint">Search</button>
  <a href="<?php echo site_url('admin/search_pengguna'); ?>" class="btn btn-outline-danger" id="diprint">Reset</a>
  </div>
  <input type="text" name="cari_pengguna" value="<?php echo (isset($_GET['cari_pengguna'])) ? $_GET['cari_pengguna'] : '';?>"  placeholder="Data Pengguna"  aria-label="Last name" class="form-control" autocomplete="off" >
</div>
</form>
</p>

      <div class="row">
        <div class="col">
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card">
              <div class="card-header bg-primary-400 text-primary">Form Input Pengguna</div>
              <div class="card-body">
                <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?=base_url('admin/tambah_pengguna');?>">
                    
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username...." required>
                    
                    <label>Password</label>
                    <input type="text" id="password" name="password" class="form-control" placeholder="Password...." required>
                    
                    <label>Nama</label>
                    <input type="text" id="nama_user" name="nama_user" class="form-control" placeholder="Nama...." required>
                    
                    <label>Role-(hak-akses)</label>
                    
                    <select name="id_level" class="form-control form-control-user" required>
                    <option value="-">-pilihan-
                    <option value=1>Admin</option>
                    <option value=2 >Kasir</option>
                    <option value=3>Koki</option>
                    <option value=4>Owner</option>
                    </select>
                   </div>
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save">&nbsp;&nbsp;Simpan</i></button>
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
                        <th>No         </th>
                        <th>Username </th>
                        <th>Password </th>
                        <th>nama    </th>
                        <th>Role(Hak Akses)</th>
                        <th colspan="3">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no = 0;
                      foreach($user as $s):$no++;?>
                      <tr>
                        <td class="text-center text-middle"><?=$no;?></td>
                        <td class="text-middle"><?php echo $s->username ?></td>
                        <td class="text-middle"><?php echo $s->password ?></td>
                        <td class="text-middle"><?php echo $s->nama_user ?></td>
                        <td class="text-middle"><?php echo $s->id_level ?></td>
                        <td><?php echo anchor('admin/detail/'.$s->id_user,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
                        <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus/'.$s->id_user, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                        <td><?php echo anchor('admin/edit/'.$s->id_user, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
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
