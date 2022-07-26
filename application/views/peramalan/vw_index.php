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
        <div class="col-md-2">
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
        <div class="col-md-2">
          <div class="form-group">
            <label>Tahun</label>
            <select id="yr" class="form-control">
              <?php foreach ((array)$yr as $y) { ?>
                <option value="<?= $y ?>"><?= $y ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Bulan</label>
            <select id="mo" class="form-control">
              <option value="all">Semua bulan</option>
              <?php foreach ((array)$mth as $m) { ?>
                <option value="<?= $m ?>"><?= $m ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
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
        <div class="table-responsive col-sm-12">
          <div class="divtable">

          </div>
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
      let period = 3; //$('#period').val();
      let yr = $('#yr').val();

      if (period > 11) {
        alert("Maksimal periode 11")
      } else {

        $.ajax({
          type: "POST",
          url: '<?= site_url('peramalan/calculate') ?>',
          data: {
            item: item,
            size: size,
            period: period,
            yr: yr,
          },
          success: function(data, textStatus, jQxhr) {
            cale = JSON.parse(data)
            $('.divtable').html('')
            let brg = $("#item option:selected").text();
            let ukr = $("#size option:selected").text();
            $("#brg").text(brg + " " + ukr + " " + yr)
            let tbody = "";
            let d = 1
            let tt = 0;
            let mapet = 0;

            for (let x in cale) {
              itm = cale[x];

              if ((cale.length > 12 && parseInt(x) >= parseInt(period)) || cale.length <= 12) {
                tbody += '<tr class="text-center">\
                        <td>' + itm.mo + '</td>\
                        <td>' + itm.tot + '</td>\
                        <td>' + itm.avg + '</td>\
                        <td>' + itm.mape + ' %</td>\
                      </tr>'

                tt += itm.act;
                mapet += (itm.mape == "-") ? 0 : itm.mape;
                d = x;
              }
            }
            let co = parseInt(d) + 1 - parseInt(period)


            let tv = tt / (co);
            console.log(co)
            let mapev = mapet / (co);

            tbl = '<table class="table table-bordered item_table">\
                        <thead>\
                          <tr class="text-center">\
                            <th>Bulan</th>\
                            <th id="brg">Barang</th>\
                            <th>Forecast MA</th>\
                            <th>Rasio</th>\
                          </tr>\
                        </thead>\
                        <tbody id="tbody">' + tbody + '\
                          <tr class="text-center">\
                            <th> Total </th>\
                            <th>' + tt + '</th>\
                            <th> </th>\
                            <th>' + mapet.toFixed(2) + ' %</th>\
                          </tr>\
                          <tr class="text-center">\
                            <th> Average </th>\
                            <th>' + tv.toFixed(2) + '</th>\
                            <th></th>\
                            <th>' + mapev.toFixed(2) + ' %</th>\
                          </tr>\
                        </tbody>\
                      </table>';

            $('.divtable').html(tbl)

          },
        });
      }
    })

  })
</script>