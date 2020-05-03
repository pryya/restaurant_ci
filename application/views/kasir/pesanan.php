<?php
date_default_timezone_set("Asia/Jakarta");
$tgl_pesan=date('Y-m-d');?>
<?php if(!isset($id_pesanan)) $id_pesanan="" ?>
<script>
function sum(){
  var txtFirstNumberValue = document.getElementById('jlm_pesan').value;
  var txtSecondNumberValue = document.getElementById('harga_satuan').value;
  var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
  if (!isNaN(result)){
    document.getElementById('total').value = result;
  }
}
</script>

<div class="container-fluid">
  <!-- Page Heading -->
  <center>
          <h1 class="h3 mb-2 text-gray-800">Pesan Makanan</h1>
          </center>
          <form method="POST" enctype="multipart/form-data" action="<?=base_url('kasir/pesanan_tambah');?>">
          
  <div class="form-row">
  <div class="form-group col-md-6">
    <label>Nama Menu </label>
                      <td> 
                      <?php  
                        $a= mysqli_connect("localhost","root","","db_resto");  
                        $result = mysqli_query($a,"select * from daftar_menu order by id_menu asc");  
                        $jsArray = "var Nama_prd1 = new Array();";  
                        echo '<select name="id_menu" onchange="changeValue(this.value)" class="form-control form-control-user">';  
                        echo '<option>---Pilih Nama Menu----</option>';  
                        while ($row = mysqli_fetch_array($result)) {  
                        echo '<option value="'. $row['id_menu'].'">' . $row['nama_menu'] . '</option>';  
                         $jsArray .= "Nama_prd1['". $row['id_menu']."'] = {name:'". addslashes($row['id_menu']) . "',desc:'". addslashes($row['harga_satuan']) . "'};\n";  
                          }  
                        echo '</select>';   
                      ?>  
                      <script type="text/javascript">
                      <?php echo $jsArray; ?>
                      function changeValue(id_menu){
                        document.getElementById('harga_satuan').value = Nama_prd1[id_menu].desc;
                      
                      };
                    </script>

    </div>

    <div class="form-group col-md-6">
      
    <label>No Meja </label>
                      <td> 
                      <?php  
                        $a= mysqli_connect("localhost","root","","db_resto");  
                        $result = mysqli_query($a,"select * from posisi_meja order by no_meja asc");  
                        $jsArray = "var No_prd1 = new Array();";  
                        echo '<select name="no_meja" onchange="changeValue(this.value)" class="form-control form-control-user">';  
                        echo '<option>---Pilih No Meja ----</option>';  
                        while ($row = mysqli_fetch_array($result)) {  
                        echo '<option value="'. $row['no_meja'].'">' . $row['no_meja'] . '</option>';  
                         $jsArray .= "No_prd1['". $row['no_meja']."'] = {name:'". addslashes($row['no_meja']) . "'};\n";  
                          }  
                        echo '</select>';   
                      ?>  
    </div>

    <div class="form-group col-md-6">
      <label>Jumlah Pesanan</label>
      <input type="text" class="form-control" id="jlm_pesan" name="jlm_pesan" onkeyup="sum();">
    </div>

    <div class="form-group col-md-6">
      <label>Tanggal Pesan</label>
      <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value='<?=$tgl_pesan; ?>'>
    </div>

   <div class="form-group col-md-6">
   <label>Harga Satuan</label>
   <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" onkeyup="sum();"  required>
   </div>

    <div class="form-group col-md-6">
      <label>Jam Pesan</label>
      <input type="time" class="form-control" id="jam_pesan" name="jam_pesan"  value='<?php date_default_timezone_set("Asia/Jakarta"); print date('H:i:s'); ?>'>
    </div>

    <div class="form-group col-md-6">
    <label>Total</label>
    <input type="text" class="form-control" id="total" name="total" required readonly>
  </div>
    </div>
    <div class="container-fluid">
    <button type="submit" class="btn btn-primary mb-5" id="btn_simpan">Simpan</button>
    <a class="btn btn-warning mb-5" href="<?php echo base_url('admin/pesanan_view') ?>">Kembali</a>
    </div>
  </div> 
  
</form>

<form method="POST" enctype="multipart/form" action="<?=base_url('kasir/tambah_pesanan');?>">
          
<div class="card shodow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pesanan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Jumlah Pesanan</th>
            <th>No Meja</th>
            <th>Harga Satuan</th>
            <th>Tanggal Pesanan</th>
            <th>Jam Pesanan</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
          <?php 

$no = 1;
foreach ($pesan as $p) : ?>

<tr>
  <td><?php echo $no++ ?></td>
  <td><?php echo $p->nama_menu ?></td>
  <td><?php echo $p->jlm_pesan ?></td>
  <td><?php echo $p->no_meja ?></td>
  <td><?php echo number_format($p->harga_satuan) ?></td>
  <td><?php echo $p->tgl_pesan ?></td>
  <td><?php echo $p->jam_pesan ?></td>
  <td><?php echo number_format($p->total) ?></td>
  <td onclick="javascript: return confirm('Anda yakin hapus ?')"><?php echo anchor('admin/hapus_pesanan/'.$p->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>

</tr>

<?php endforeach; ?>   
        </thead>
      
      </table>
      <button type="submit" class="btn btn-danger mb-5">Proses</button> 
      <!-- <a class="btn btn-success mb-5" href="<?php echo base_url('admin/pdf_pesanan') ?>">Cetak</a> -->
    </form>

      
      

    <!--   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>

<script type="text/javascript">
$(document).ready(function(){
  tampil_data_barang();

  $('#mydata').dataTable();

  //fungsi tampil barang
  function tampil_data_barang(){
    $.ajax({
      type : 'GET',
      url : '<?php echo base_url()?>admin/data_pesanan',
      async : true,
      dataType : 'json',
      success : function(data){
        var html = '';
      }
    })
  }
});

</script>
 -->
 