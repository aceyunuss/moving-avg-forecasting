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
            <input type="number" min="1" class="form-control " name="np" id="period">
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
        <div class="table-responsive col-sm-12 ">
          <table class="table table-bordered item_table">
            <thead>
              <tr class="text-center">
                <th>Bulan</th>
                <th id="brg">Barang</th>
                <th>Forecast MA</th>
                <th>MAD</th>
                <th>MSE</th>
                <th>MAPE</th>
              </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
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
          $('.item_table tbody').html('')
          let brg = $("#item option:selected").text();
          let ukr = $("#size option:selected").text();
          $("#brg").text(brg + " " + ukr)
          let tbody = "";
          let d = 1
          let tt = 0;
          let madt = 0;
          let mset = 0;
          let mapet = 0;

          for (let x in cale) {
            itm = cale[x];
            tbody += '<tr class="text-center">\
                        <td>' + itm.mo + '</td>\
                        <td>' + itm.tot + '</td>\
                        <td>' + itm.avg + '</td>\
                        <td>' + itm.mad + '</td>\
                        <td>' + itm.mse + '</td>\
                        <td>' + itm.mape + ' %</td>\
                      </tr>'

            tt += itm.act;
            madt += (itm.mad == "-") ? 0 : itm.mad;
            mset += (itm.mse == "-") ? 0 : itm.mse;
            mapet += (itm.mape == "-") ? 0 : itm.mape;
            d = x;
          }
          let co = parseInt(d) + 1  - parseInt(period)
          

          let tv = tt / (co);
          let madv = madt / (co);
          let msev = mset / (co);
          let mapev = mapet / (co);

          tbody += '<tr class="text-center">\
                      <th> Total </th>\
                      <th>' + tt + '</th>\
                      <th> </th>\
                      <th>' + madt.toFixed(2) + '</th>\
                      <th>' + mset.toFixed(2) + '</th>\
                      <th>' + mapet.toFixed(2) + ' %</th>\
                    </tr>\
                    <tr class="text-center">\
                      <th> Average </th>\
                      <th>' + tv.toFixed(2) + '</th>\
                      <th></th>\
                      <th>' + madv.toFixed(2) + '</th>\
                      <th>' + msev.toFixed(2) + '</th>\
                      <th>' + mapev.toFixed(2) + ' %</th>\
                    </tr>'
          $('.item_table tbody').append(tbody)

        },
      });
    })

  })
</script>