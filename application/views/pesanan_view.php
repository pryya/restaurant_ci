 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800 text-center">Daftar Pesanan</h1>

<section class="content">
  <a class="btn btn-primary" href="<?php echo base_url('admin/pesanan') ?>" style="margin-left:10px"><i class="fa fa-plus"></i>Tambah Data </a>

<p class="mb-2">
 <form action="<?php echo site_url('admin/search_pesanan');?>" methot="post">
 <div class="input-group" style="padding: 10px;" >
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" id="diprint">Search</button>
  <a href="<?php echo site_url('admin/search_pesanan'); ?>" class="btn btn-outline-danger" id="diprint">Reset</a>
  </div>
  <input type="text" name="cari_pesanan" value="
<?php echo (isset($_GET['cari_pesanan'])) ? $_GET['cari_pesanan'] : '';?>"  placeholder="Cari Pesanan"  aria-label="Last name" class="form-control" autocomplete="off" >
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
                      <th>Id Pesanan</th>
                      <th>Id Menu</th>
                      <th>Nama Menu</th>
                      <th>Jumlah Pesan</th>
                      <th>No Meja</th>
                      <th>Harga Satuan</th>
                      <th>Tanggal Pesan</th>
                      <th>Jam Pesan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($pesanan as $p) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $p->id_pesanan ?></td>
                      <td><?php echo $p->id_menu ?></td>
                      <td><?php echo $p->nama_menu ?></td>
                      <td><?php echo $p->jlm_pesan ?></td>
                      <td><?php echo $p->no_meja ?></td>
                      <td><?php echo $p->harga_satuan ?></td>
                      <td><?php echo $p->tgl_pesan ?></td>
                      <td><?php echo $p->jam_pesan ?></td>
                      <td><?php echo $p->total ?></td>
                      <td><?php echo $p->status ?></td>
                      <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_vpesanan/'.$p->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
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
