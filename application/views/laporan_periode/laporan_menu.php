<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Menu Aplikasi</title>
</head>
<body>
<center><h5>Laporan Data Menu Aplikasi</h5></center>
<br><br>
<form action="<?php echo site_url('admin/cari_menu');?>" methot="post">
<input type="text" name="cari_makanan" class="form-control" id="diprint" placeholder="cari_makanan Data" value="
<?php echo (isset($_GET['cari_makanan'])) ? $_GET['cari_makanan'] : '';?>">
<br>
<button type="submit" class="btn btn-primary btn-sm" id="diprint">Cari Data</button>
<a href="<?php echo site_url('admin/cari_menu'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
<button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info">Cetak Data</button>
</form><center>
<br>
<table border="1" class="table table-striped table-bordered" id="dataTable">
<tr>
<th>No</th>
<th>Nama Menu</th>
<th>Jenis Menu</th>
<th>Harga Satuan</th>
<th>Foto</th>
<th>Deskripsi</th>

</tr>
<?php
if(count($daftar_menu)>0){
    $no = 1;
    foreach($daftar_menu as $m){?>

    <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $m->nama_menu; ?></td>
    <td><?php echo $m->jenis_menu; ?></td>
    <td><?php echo $m->harga_satuan; ?></td>
    <td><?php echo $m->foto; ?></td>
    <td><?php echo $m->deskripsi; ?></td>
    
    </tr>
    <?php }}else{ ?>
    <tr>
    <td colspan="5" align="center">Tidak Ada Data.</td>
    </tr>
    <?php } ?>
    </table></center>
    
</body>
</html>