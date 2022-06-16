<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Nama Barang</label>
            <select id="item" class="form-control">
              <?php foreach ((array)$item as $k => $v) { ?>
                <option value="<?= $v ?>"><?= $v ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Ukuran</label>
            <select id="size" class="form-control">
              <option value="all">Semua ukuran</option>
              <?php foreach ((array)$uom as $k => $v) { ?>
                <option value="<?= $v['uom_id'] ?>"><?= $v['uom_val'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Periode</label>
            <select class="form-control " name="np" id="period">
              <option value="all">Semua bulan</option>
              <?php foreach ((array)$mth as $k => $v) { ?>
                <option value="<?= $k ?>"><?= $v ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <p></p>

          <div class="form-group">
            <a href="#" class="btn btn-sm btn-success calcc">Hitung</a>
          </div>
        </div>
      </div>
      <br>
      <hr>
      <br>
      <center>
        <h3></h3>
        <div class="table-responsive col-sm-6 ">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr>
                <th colspan="3">
                  <h3>FORECAST</h3>
                </th>
              </tr>
              <tr>
                <th colspan="3">
                  <h4 id="itm">-</h4>
                </th>
              </tr>
              <tr>
                <th colspan="3">
                  <h1 id="avg">-</h1>
                </th>
              </tr>
              <tr>
                <th id="mad">MAD<br><br>-</th>
                <th id="mse">MSE<br><br>-</th>
                <th id="mape">MAPE<br><br>-</th>
              </tr>
            </thead>
          </table>
        </div>
      </center>
      &nbsp;
      <br>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('.calcc').click(function() {
      let item = $('#item').val();
      let size = $('#size').val();
      let period = $('#period').val();

      $.ajax({
        type: "POST",
        url: '<?= site_url('peramalan/calculate') ?>',
        data: {
          item: item,
          size: size,
          period: period,
        },
        success: function(data, textStatus, jQxhr) {
          cale = JSON.parse(data)
          $('#itm').text(item + " " + $('#size option:selected').text() + " " + cale.mot + " 2022")
          $('#avg').text(cale.avg)
          $('#mad').html("MAD <br><br>" + cale.mad)
          $('#mse').html("MSE <br><br>" + cale.mse)
          $('#mape').html("MAPE <br><br>" + cale.mape)
        },
      });
    })

  })
</script>