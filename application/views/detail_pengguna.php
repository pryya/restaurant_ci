<div class="content-wrapper">
    <section class="content">
        <h4><strong>
            DETAIL DATA PENGGUNA
</strong></h4>

<table class="table">
    <tr>
        <th>Id User</th>
        <td><?php echo $detail->id_user ?></td>
</tr>

<tr>
    <th>Username</th>
    <td><?php echo $detail->username ?></td>
</tr>

<tr>
    <th>Password</th>
    <td><?php echo $detail->password ?></td>
</tr>

<tr>
    <th>Nama Pengguna</th>
    <td><?php echo $detail->nama_user?></td>
</tr>

<tr>
    <th>Id Level</th>
    <td><?php echo $detail->id_level ?></td>
</tr>

<tr>
    <th>Hak Akses</th>
    <td><?php echo $detail->nama_level ?></td>

</tr>
</table>
<a href="<?php echo base_url('admin/pengguna'); ?>" class="btn btn-primary">Kembali</a>
</section>
</div>
