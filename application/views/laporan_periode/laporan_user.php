<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pengguna Aplikasi</title>
</head>
<body>
<center><h5>Laporan Data Pengguna Aplikasi</h5></center>
<br><br>
<form action="<?php echo site_url('admin/cari');?>" methot="post">
<input type="text" name="cari" class="form-control" id="diprint" placeholder="Cari Data" value="
<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : '';?>">
<br>
<button type="submit" class="btn btn-primary btn-sm" id="diprint">Cari Data</button>
<a href="<?php echo site_url('admin/cari'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
<button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info">Cetak Data</button>
</form><center>
<br>
<table border="1" class="table table-striped table-bordered" id="dataTable">
<tr>
<th>No</th>
<th>Username</th>
<th>Nama</th>
<th>Password</th>
<th>Role</th>

</tr>
<?php
if(count($login_jo1)>0){
    $no = 1;
    foreach($login_jo1 as $k){?>

    <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $k->username; ?></td>
    <td><?php echo $k->nama_user; ?></td>
    <td><?php echo $k->password; ?></td>
    <td><?php echo $k->id_level; ?></td>
    
    </tr>
    <?php }}else{ ?>
    <tr>
    <td colspan="5" align="center">Tidak Ada Data.</td>
    </tr>
    <?php } ?>
    </table></center>
    
</body>
</html>