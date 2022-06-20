<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Penjualan</h4>
    <hr>
    <br>
    <div class="row">
      <label class="col-sm-2">
        Nama Barang
      </label>
      <div class="col-sm-4">
        <select class="form-control brg">
          <option <?= $itm == "h" ? "selected" : "" ?> value="h">Pipa Baja Hitam</option>
          <option <?= $itm == "g" ? "selected" : "" ?> value="g">Pipa Baja Galvanis</option>
        </select>
      </div>
      <div class="col-sm-3">
        <select class="form-control yr">
          <?php foreach ($yr as $y) { ?>
            <option <?= $y == $wy ? "selected" : "" ?> value="<?= $y ?>"><?= $y ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <br>
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
              <td class="text-center"><?= $value['mth'] . " " . $wy ?></td>
              <td class="text-center"><?= $value['total'] ?></td>
              <td class="text-center">
                <a href="<?= site_url('datapenjualan/lihat_bulan/' . $value['m'] . '/' . $wy) ?>" class="btn btn-sm
                 btn-success">Detail</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.brg, .yr').change(function() {
      let itm = $('.brg').val()
      let yr = $('.yr').val()
      console.log(yr)
      location.href = '<?= site_url('datapenjualan/alias/') ?>' + itm + '/' + yr
    })
  })
</script>