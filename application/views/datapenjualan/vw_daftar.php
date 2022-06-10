<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Penjualan</h4>
    <hr>
    <div class="table-responsive">
      <table class="table" id="usrtbl">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">Jumlah Penjualan</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sell as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= ++$key ?></td>
              <td class="text-center"><?= $value['mth'] ?></td>
              <td class="text-center"><?= $value['total'] ?></td>
              <td class="text-center">
                <a href="<?= site_url('datapenjualan/lihat_bulan/' . $value['m']) ?>" class="btn btn-sm
                 btn-success">Detail</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>