<div class="card">
  <div class="card-body">
    <h4 class="card-title">User</h4>
    <hr>
    <a href="<?= site_url('user/input') ?>" type="button" class="btn btn-sm btn-primary"> Input User </a>
    <br><br>
    <div class="table-responsive">
      <table class="table" id="usrtbl">
        <thead>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Role</th>
            <th class="text-center">No. Telp</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $key => $value) { ?>
            <tr>
              <td><?= $value['name'] ?></td>
              <td><?= $value['role'] ?></td>
              <td><?= $value['phone'] ?></td>
              <td class="text-center" style="width: 20%;">
                <a href="<?= site_url('user/ubah/' . $value['usr_id']) ?>" class="btn btn-sm
                 btn-success">Ubah</a>
                <a href="<?= site_url('user/hapus/' . $value['usr_id']) ?>" class="btn btn-sm
                 btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>