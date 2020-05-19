
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-primary-500 text-primary">Data Tabel Masakan</div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?=base_url('admin/makanan_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id_menu" name="id_menu" class="form-control" value="<?=$makanan['id_menu'];?>">
                
                <label class="control-label">Nama Menu</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="nama_menu" value="<?=$makanan['nama_menu'];?>" required>
                
                <label class="control-label">Jenis Menu </label>
                <input type="text" class="form-control" id="jenis_menu" name="jenis_menu" placeholder="jenis_menu" value="<?=$makanan['jenis_menu'];?>" required>
                
                <label class="control-label">Harga Satuan </label>
                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="harga_satuan" value="<?=$makanan['harga_satuan'];?>" required>
                <div class="form-group">
                
                <label>Upload Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
              </div>
              
                <label class="control-label">Deskripsi </label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" value="<?=$makanan['deskripsi'];?>" required>
                 
              </div>
            </div>
              
            <div class="modal-footer">
              <a href="<?=base_url('admin/makanan');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>