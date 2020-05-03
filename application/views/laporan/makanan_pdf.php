<style type="text/css">
img{width: 50px; height: 50px;}
  
  .table1 {
    font-family: times new roman;
    color: #444;
    border-collapse: collapse;
    border: #ccc 1px solid;
}
 
.table1 tr th{
    background: #1cb5e0;
    color: #000046;
    font-weight: normal;
}
</style>
<!DOCTYPE html>
<html><head>
<title>Laporan Pengguna</title>
<!-- Custom styles for this page -->
<link href="<?php echo base_url()?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head><body>
<center>
<p><font size="25">LAPORAN DATA MENU</p></font>
<p>Restoran Jl. Babakan Jati Gang Jati Mulya VI No 34
<center>Gmail: nnpryya@gmail.com | Website: www.pryyahaseny.com</center></p>
</center>
<br>
<br>
      <table width="95%" border="1" align="center" cellpadding="5" cellspacing="0" class="font table1" style="margin-right: 20px; margin-left: 20px;">
          <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Jenis Menu</th>
            <th>Harga Satuan</th>
            <th>Foto</th>
            <th>Deskripsi</th>
          </tr>
        <?php $no= 1;
foreach ($makanan as $m): ?>
<tr>
<td><?php echo $no++?></td>
<td><?php echo $m->nama_menu ?></td>
<td><?php echo $m->jenis_menu ?></td>
<td><?php echo $m->harga_satuan ?></td>
<td>
<img src="<?php echo base_url(); ?>assets/foto/<?php echo $m->foto; ?>"></td>
<td><?php echo $m->deskripsi ?></td>
</tr>
<?php endforeach; ?>
      </table>


<script type="text/javascript">
window.print();
</script>
</body></hmtl>