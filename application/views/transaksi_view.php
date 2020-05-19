  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Data Transaksi</h1>

<section class="content">
<?php echo $this->session->flashdata('message'); ?>
<a class="btn btn-primary" style="margin-left:10px" href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-plus"></i>Tambah Data </a>

<p class="mb-2">
 <form action="<?php echo site_url('admin/search_transaksi1');?>" methot="post">
 <div class="input-group" style="padding: 10px;" >
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" id="diprint">Search</button>
  <a href="<?php echo site_url('admin/search_transaksi1'); ?>" class="btn btn-outline-danger" id="diprint">Reset</a>
  </div>
  <input type="text" name="cari_transaksi" value="
<?php echo (isset($_GET['cari_transaksi'])) ? $_GET['cari_transaksi'] : '';?>"  placeholder="Cari Pesanan"  aria-label="Last name" class="form-control" autocomplete="off" >
</div>
</form>
</p>

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
                      <th>ID Transaksi</th>
                      <th>ID Pesanan</th>
                      <th>ID User</th>
                      <th>Tanggal Jual</th>
                      <th>Subtotal</th>
                      <th>Bayar</th>
                      <th>Kembalian</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
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
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
