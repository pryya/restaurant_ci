
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500  bg-primary-500 text-primary">Edit Data Pengguna</div>
          <div class="card-body">
            <form method="POST" action="<?=base_url('admin/pengguna_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id_user" name="id_user" class="form-control" value="<?=$user['id_user'];?>">
                <label class="control-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?=$user['username'];?>" required>
                 <label class="control-label">Password </label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?=$user['password'];?>" required>
                <label class="control-label">Nama </label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama" value="<?=$user['nama_user'];?>" required>
                 <label>Role-(hak-akses)</label>
                 <select name="id_level" class="form-control form-control-user" required>
                    <option value="-">-pilihan-
                    <option value= 1>Admin</option>
                    <option value= 2 >Kasir</option>
                    <option value=3>Koki</option>
                    <option value=4>Owner</option>
                  </select>
                  <input type="hidden" class="form-control" id="user_update" name="user_update"  value="<?=$this->session->userdata('nama'); ?>" required>             
                   <input name="update_date" type="hidden" id="update_date" value=" <?php echo date('Y-m-d'); ?> "readonly>
              </div>
            </div>
            <div class="modal-footer">
              <a href="<?=base_url('admin/pengguna');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>