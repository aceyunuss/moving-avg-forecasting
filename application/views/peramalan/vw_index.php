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
            <label>Bulan</label>
            <select id="mo" class="form-control">
              <option value="all">Semua bulan</option>
              <?php foreach ((array)$mth as $k => $v) { ?>
                <option value="<?= $k ?>"><?= $v ?></option>
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
      <center>
        <form method="POST" action="<?= site_url('peramalan/send_predict') ?>">
          <input type="hidden" name="item_inp" id="item_inp">
          <input type="hidden" name="size_inp" id="size_inp">
          <input type="hidden" name="month_inp" id="month_inp">
          <input type="hidden" name="year_inp" id="year_inp">
          <input type="hidden" name="imonth" id="imonth">
          <input type="hidden" name="iact" id="iact">
          <input type="hidden" name="ifma" id="ifma">
          <input type="hidden" name="irasio" id="irasio">
          <button type="submit" class="btn btn-info btn-md sv" style="display: none;">Kirim</button>
        </form>
      </center>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('.calcc').click(function() {

      let item = $('#item').val();
      let size = $('#size').val();
      let period = 3; //$('#period').val();
      let month = $("#mo option:selected").text();
      let mo = $('#mo').val();
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
            mo: mo,
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
            let rasiot = 0;
            let imonth = "";
            let iact = "";
            let ifma = "";
            let irasio = "";
            let moli = "";
            let foma = "";


            $('.sv').css('display', 'inline')

            for (let x in cale) {
              itm = cale[x];
              if ((cale.length > 12 && parseInt(x) >= parseInt(period)) || cale.length <= 12) {

                if (mo == 'all') {

                  tbody += '<tr class="text-center">\
                              <td>' + itm.mo + '</td>\
                              <td>' + itm.tot + '</td>\
                              <td>' + itm.avg + '</td>\
                              <td>' + itm.rasio + ' %</td>\
                            </tr>'
                } else {

                  moli += '<p>' + itm.mo + ' : ' + itm.tot + '</p>';

                  if (x == 2) {
                    foma = '<p>' + month + '</p>' +
                      '<p>' + itm.avg + '</p>' +
                      '<p>Rasio : ' + itm.rasio + ' % </p>';
                  } else {
                    ct = ''
                  }

                  tbody = '<tr class="text-center">\
                            <td>' + moli + '</td>\
                            <td>' + foma + '</td>\
                          </tr>'
                }

                tt += itm.act;
                rasiot += (itm.rasio == "-") ? 0 : itm.rasio;
                d = x;
              }
              imonth += itm.mo + ";";
              iact += itm.tot + ";";
              ifma += itm.avg + ";";
              irasio += itm.rasio + ";";
            }

            $('#item_inp').val(brg);
            $('#size_inp').val(ukr);
            $('#month_inp').val(month);
            $('#year_inp').val(yr);
            $('#imonth').val(imonth);
            $('#iact').val(iact);
            $('#ifma').val(ifma);
            $('#irasio').val(irasio);

            let co = parseInt(d) + 1 - parseInt(period)


            let tv = tt / (co);
            console.log(co)
            let rasiov = rasiot / (co);

            if (mo == "all") {

              tbl = '<h2>Forecast ' + month + ' ' + yr + '</h2>\
                    <h4>' + brg + ' ' + ukr + '</h4>\
                    </br>\
                    <table class="table table-bordered item_table">\
                      <thead>\
                        <tr class="text-center">\
                          <th>Bulan</th>\
                          <th id="brg">' + brg + '</th>\
                          <th>Forecast MA</th>\
                          <th>Rasio</th>\
                        </tr>\
                      </thead>\
                      <tbody id="tbody">' + tbody + '\
                        <tr class="text-center">\
                          <th> Total </th>\
                          <th>' + tt + '</th>\
                          <th> </th>\
                          <th>' + rasiot.toFixed(2) + ' %</th>\
                        </tr>\
                        <tr class="text-center">\
                          <th> Average </th>\
                          <th>' + tv.toFixed(2) + '</th>\
                          <th></th>\
                          <th>' + rasiov.toFixed(2) + ' %</th>\
                        </tr>\
                      </tbody>\
                    </table>';
            } else {

              tbl = '<h2>Forecast ' + month + ' ' + yr + '</h2>\
                    <h4>' + brg + ' ' + ukr + '</h4>\
                    </br>\
                    <table class="table table-bordered item_table">\
                      <thead>\
                        <tr class="text-center">\
                          <th>Periode Sebelumnya</th>\
                          <th>Forecast MA</th>\
                        </tr>\
                      </thead>\
                      <tbody id="tbody">' + tbody + '\
                      </tbody>\
                    </table>';
            }

            $('.divtable').html(tbl)

          },
        });
      }
    })

  })
</script>