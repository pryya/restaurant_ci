<style type="text/css">
  
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
<p><font size="25">LAPORAN PENGGUNA</p></font>
<p>Restoran Jl. Babakan Jati Gang Jati Mulya VI No 34
<center>Gmail: nnpryya@gmail.com | Website: www.pryyahaseny.com</center></p>
</center>
<br>
<br>
      <table width="95%" border="1" align="center" cellpadding="5" cellspacing="0" class="font table1" style="margin-right: 20px; margin-left: 20px;">
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama User</th>
            <th>Id Level</th>
          </tr>
        <?php $no= 1;
foreach ($user as $s): ?>
<tr>
<td><?php echo $no++?></td>
<td><?php echo $s->username ?></td>
<td><?php echo $s->password ?></td>
<td><?php echo $s->nama_user ?></td>
<td><?php echo $s->id_level ?></td>
</tr>
<?php endforeach; ?>
      </table>


<script type="text/javascript">
window.print();
</script>
</body></hmtl>