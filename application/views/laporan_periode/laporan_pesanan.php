<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pesanan</title>
</head>
<body>
<center><h5>Laporan Data Pesanan</h5></center>
<br><br>
<form action="<?php echo site_url('admin/cari_pesanan');?>" methot="post">
<input type="text" name="cari_pesanan" class="form-control" id="diprint" placeholder="cari_pesanan Data" value="
<?php echo (isset($_GET['cari_pesanan'])) ? $_GET['cari_pesanan'] : '';?>">
<br>
<button type="submit" class="btn btn-primary btn-sm" id="diprint">Cari Data</button>
<a href="<?php echo site_url('admin/cari_pesanan'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
<button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info">Cetak Data</button>
</form><center>
<br>
<table border="1" class="table table-striped table-bordered" id="dataTable">
<tr>
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

</tr>
<?php
if(count($pesanan)>0){
    $no = 1;
    foreach($pesanan as $p){?>
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
    
</tr>
<?php }}else{ ?>
  <tr>
    <td colspan="5" align="center">Tidak Ada Data.</td>
  </tr>
<?php } ?>
</table></center>
</body>
</html>