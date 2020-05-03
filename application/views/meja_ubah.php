
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel Masakan</div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?=base_url('admin/meja_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="no_meja" name="no_meja" class="form-control" value="<?=$meja['no_meja'];?>">
                <label class="control-label">No Meja</label>
                <input type="text" class="form-control" id="no_meja" name="no_meja" placeholder="No Meja" value="<?=$meja['no_meja'];?>" required readonly>
                 <label class="control-label">Deskripsi Meja </label>
                <input type="text" class="form-control" id="deskripsi_meja" name="deskripsi_meja" placeholder="Deskripsi Meja" value="<?=$meja['deskripsi_meja'];?>" required>
                
                 
              </div>
            </div>
              
            <div class="modal-footer">
              <a href="<?=base_url('admin/meja');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>