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
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Customer</th>
            <th class="text-center">No. PO</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sell as $key => $value) { ?>
            <tr>
              <td><?= $value['description'] ?></td>
              <td><?= substr($value['date'], 0, 10) ?></td>
              <td><?= $value['customer'] ?></td>
              <td><?= $value['po'] ?></td>
              <td class="text-center">
                <a href="<?= site_url('datapenjualan/lihat/' . $value['sell_id']) ?>" class="btn btn-sm
                 btn-success">Lihat</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>