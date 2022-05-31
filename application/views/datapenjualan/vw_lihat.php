<form method="POST" action="<?= site_url('penjualan/sb_input') ?>">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form</h4>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal</label>
          <label class="col-sm-8 col-form-label"><?= substr($sell['date'], 0, 10) ?></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Customer</label>
          <label class="col-sm-8 col-form-label"><?= $sell['customer'] ?></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">No. PO</label>
          <label class="col-sm-8 col-form-label"><?= $sell['po'] ?></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Deskripsi</label>
          <label class="col-sm-8 col-form-label"><?= $sell['description'] ?></label>
        </div>

        <hr>
        <br>

        <table class="itm table table-hover table-lg mt-lg mb-0">
          <thead>
            <tr>
              <th style="text-align:center; width: 10%">No</th>
              <th style="text-align:center; width: 50%">Nama</th>
              <th style="text-align:center; width: 20%">Ukuran</th>
              <th style="text-align:center; width: 20%">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($itm as $k => $v) { ?>
              <tr>
                <td class="text-center"><?= ++$k ?></td>
                <td class="text-center"><?= $v['name'] ?></td>
                <td class="text-center"><?= $v['size'] ?></td>
                <td class="text-center"><?= $v['total'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <br>
        <hr>
        <br>
        <button class="btn btn-light" onclick="window.history.go(-1);">Back</button>
      </div>
    </div>
  </div>
</form>