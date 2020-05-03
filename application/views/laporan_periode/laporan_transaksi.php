<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Transaksi Aplikasi</title>
</head>
<body>
<center><h5>Laporan Data Transaksi Aplikasi</h5></center>
<br><br>
<form action="<?php echo site_url('admin/cari_transaksi');?>" methot="post">
<input type="text" name="cari_transaksi" class="form-control" id="diprint" placeholder="cari_transaksi Data" value="
<?php echo (isset($_GET['cari_transaksi'])) ? $_GET['cari_transaksi'] : '';?>">
<br>
<button type="submit" class="btn btn-primary btn-sm" id="diprint">Cari Data</button>
<a href="<?php echo site_url('admin/cari_transaksi'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
<button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info">Cetak Data</button>
</form><center>
<br>
<table border="1" class="table table-striped table-bordered" id="dataTable">
<tr>
<th>No</th>
<th>ID Transaksi</th>
<th>ID Pesanan</th>
<th>ID User</th>
<th>Tanggal Jual</th>
<th>SubTotal</th>
<th>Bayar</th>

</tr>
<?php
if(count($transaksi1)>0){
    $no = 1;
    foreach($transaksi1 as $t){?>

    <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $t->id_transaksi; ?></td>
    <td><?php echo $t->id_pesanan; ?></td>
    <td><?php echo $t->id_user; ?></td>
    <td><?php echo $t->tgl_jual; ?></td>
    <td><?php echo $t->subtotal; ?></td>
    <td><?php echo $t->bayar; ?></td>
    
    </tr>
    <?php }}else{ ?>
    <tr>
    <td colspan="5" align="center">Tidak Ada Data.</td>
    </tr>
    <?php } ?>
    </table></center>
    
</body>
</html>