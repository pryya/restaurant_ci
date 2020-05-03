<div class="content-wrapper">
<section class="content">
<h4><strong>
DETAIL MENU
</strong></h4>
<table class="table">
<tr>
<th>Kode Menu</th>
<td><?php echo $detail_menu->id_menu ?></td>
</tr>
<tr>
<th>Nama Menu</th>
<td><?php echo $detail_menu->nama_menu ?></td>
</tr>
<tr>
<th>Jenis Menu</th>
<td><?php echo $detail_menu->jenis_menu?></td>
</tr>
<tr>
<th>Harga Satuan</th>
<td><?php echo $detail_menu->harga_satuan?></td>
</tr>
<tr>
<th>Gambar Menu</th>
<td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail_menu->foto;?>" width="110" height="110"> </td>
</tr>
<tr>
<th>Deskripsi</th>
<td class="small">
<?php echo substr($detail_menu->deskripsi, 0, 120) ?>...</td>
</tr>
</table>
<a href="<?php echo base_url('admin/makanan'); ?>" class="btn btn-primary">Kembali</a>
</section>
</div>
