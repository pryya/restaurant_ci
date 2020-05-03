<?php
date_default_timezone_set("Asia/Jakarta");
$tgl_jual=date('Y-m-d');?>
<?php if(!isset($id)) $id="" ?>

	 <!-- Begin PNama User Content -->
   <div class="container-fluid">
 

 <!-- PNama User Heading -->
 <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>

 <?php echo $this->session->flashdata('message'); ?>
 
 <p class="mb-2">
 <form action="<?php echo site_url('kasir/search_transaksi');?>" methot="post">
<div class="input-group">
  <div class="input-group-prepend">
  <button class="btn btn-outline-success" type="submit" name="cari" id="button-addon1" >Search</button>
  </div>
  <input type="text" name="cari_transaksi" value="
<?php echo (isset($_GET['cari_transaksi'])) ? $_GET['cari_transaksi'] : '';?>" placeholder="ID Pesanan"  aria-label="Last name" class="form-control" autocomplete="off" >
</div>
</form>
</p>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
   <div class="card-header py-3">
   <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
   </div>
   <div class="card-body">
   <div class="table-responsive">
     <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
     <caption>Transaksi</caption>
     <thead>
       <tr>
       <th>No</th>
       <th>ID Pesanan</th>
       <th>ID Menu</th>
       <th>Nama Menu</th>
       <th>Jumlah Pesanan</th>
       <th>Harga Satuan</th>
       <th>Total</th>
       </tr>

       <?php
       $no=1;
       $tott=0;
       $kembalian=0;
       $id_pesanan="";

       foreach ($transaksi as $t) : 

       ?>
       

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $id_pesanan=$t->id_pesanan ?></td>
          <td><?php echo $t->id_menu ?></td>
          <td><?php echo $t->nama_menu ?></td>
          <td><?php echo $t->jlm_pesan ?></td>
          <td><?php echo $t->harga_satuan ?></td>
          <td><?php 
          $tott=$t->total+$t->total;
          echo $t->total ?></td>    
         
          </tr>
        
        <?php endforeach; ?>   



     
     </thead>
     <tfoot>
     <tr>
     <th>No</th>
       <th>ID Pesanan</th>
       <th>ID Menu</th>
       <th>Nama Menu</th>
       <th>Jumlah Pesanan</th>
       <th>Harga Satuan</th>
       <th>Total</th>
       </tr>
    
                   </tfoot>
                   <tbody>
           
     </tbody>
     <tfoot>
     </table>
   </div>
   </div>
 </div>
 
 </div>
 
 <div class="container">
       
   
   <div class="container" style="margin-top:20px">
     
     <form method="POST" action="<?=base_url('kasir/tambah_transaksi');?>" enctype="multipart/form-data" >
 
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">ID User</label>
         <div class="col-sm-10">
          <input type="hidden" name="id_pesanan" id="id_pesanan" value="<?=$id_pesanan; ?>">
           <input type="text" name="id_user" id="id_user" value="<?=$this->session->userdata('id_user'); ?>" class="form-control" size="4" readonly required>
         </div>
       </div>
 
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
         <div class="col-sm-10">
           <input type="text" name="tgl_jual" id="tgl_jual"  value='<?php date_default_timezone_set("Asia/Bangkok"); print date('1, d-m-Y H:i:s');?>' class="form-control" size="4" required readonly>
         </div>
       </div>
 
       <div class="form-group row">
				<label class="col-sm-2 col-form-label">SubTotal</label>
				<div class="col-sm-10">
					<input type="text" name="subtotal" id="subtotal"class="form-control" size="4"  onkeyup="sum();" value="<?php echo $tott;?>" readonly>
				</div>
			</div>

      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Bayar</label>
				<div class="col-sm-10">
					<input type="text" name="bayar" id="bayar"class="form-control" size="4"  onkeyup="sum();" required>
				</div>
			</div>

      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kembalian</label>
				<div class="col-sm-10">
					<input type="text" name="kembalian" id="kembalian"class="form-control" size="4" value="<?php echo $kembalian;?>" readonly>
				</div>
			</div>

       <div class="form-group row">
         <label class="col-sm-2 col-form-label">&nbsp;</label>
         <div class="col-sm-10">
           <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
           <input type="reset" name="reset" class="btn btn-danger" value="BATAL">
           <a class="btn btn-warning" href="<?php echo base_url('admin/transaksi_view') ?>">Kembali </a>
         </div>
       </div>
     </form>
     
   </div>

   
   <script>
function sum(){
  var txtFirstNumberValue = document.getElementById('subtotal').value;
  var txtSecondNumberValue = document.getElementById('bayar').value;
  var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
  if (!isNaN(result)){
    document.getElementById('kembalian').value = result;
  }
}
</script>
 