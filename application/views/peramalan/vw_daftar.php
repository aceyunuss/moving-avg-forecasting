<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Prediksi Penjualan</h4>
    <div class="table-responsive">
      <table class="table" id="usrtbl">
        <thead>
          <tr>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">Tahun</th>
            <th class="text-center">Ukuran</th>
            <th class="text-center">Tanggal dibuat</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $value['item_name'] ?></td>
              <td class="text-center"><?= $value['month'] ?></td>
              <td class="text-center"><?= $value['year'] ?></td>
              <td class="text-center"><?= $value['size'] ?></td>
              <td class="text-center"><?= $value['created_date'] ?></td>
              <td class="text-center">
                <a href="<?= site_url('peramalan/view/' . $value['forecast_id']) ?>" class="btn btn-sm
                 btn-success">Lihat</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>