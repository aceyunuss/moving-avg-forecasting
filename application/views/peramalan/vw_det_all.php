<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive col-sm-12 heyo">
        <div class="divtable">
          <center>
            <h2><?= 'Forecast ' . $fo['month'] . ' ' . $fo['year'] ?></h2>
            <h4><?= $fo['item_name'] . ' ' . $fo['size'] ?></h4> <br>
          </center>
          <?php if (count($fodet) != 3) { ?>
            <table class="table table-bordered item_table">
              <thead>
                <tr class="text-center">
                  <th>Bulan</th>
                  <th><?= $fo['item_name'] ?></th>
                  <th>Forecast MA</th>
                  <th>Rasio</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php
                $rat = $act = 0;
                foreach ($fodet as $k => $v) {
                  $act += $v['actual'];
                  $rat += $v['ratio'];
                ?>
                  <tr class="text-center">
                    <td><?= $v['month'] ?></td>
                    <td><?= $v['actual'] ?></td>
                    <td><?= $v['predict'] ?></td>
                    <td><?= $v['ratio'] . ' %' ?></td>
                  </tr>
                <?php } ?>
                <tr class="text-center">
                  <th> Total </th>
                  <th><?= $act ?></th>
                  <th> </th>
                  <th><?= $rat . ' %' ?></th>
                </tr>
                <tr class="text-center">
                  <th> Average </th>
                  <th><?= round(($act / count($fodet)), 2) ?></th>
                  <th></th>
                  <th><?= round(($rat / count($fodet)), 2) . ' %' ?></th>
                </tr>
              </tbody>
            </table>
          <?php } else { ?>
            <table class="table table-bordered item_table">
              <thead>
                <tr class="text-center">
                  <th>Periode Sebelumnya</th>
                  <th>Forecast MA</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <tr class="text-center">
                  <td>
                    <?php foreach ($fodet as $k => $v) {
                      echo "<p>" . $v['month'] . " : " . $v['actual'] . '</p>';
                    } ?>
                  </td>
                  <td>
                    <p><?= $fo['month'] ?></p>
                    <p><?= end($fodet)['predict'] ?></p>
                    <p><?= 'Rasio : ' . end($fodet)['ratio'] . '%' ?></p>
                  </td>
                </tr>
              </tbody>
            </table>
          <?php } ?>

        </div>
      </div>
      <br>
      <hr>
      <br>
      <div class="bu">
        <button class="btn btn-light btn-md" onclick="window.history.go(-1);">Back</button>
        <button class="print btn btn-success btn-md pull-right">Cetak</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('.print').click(function() {
    $('#sidebar').hide();
    $('.navbar-brand').hide();
    $('.nav-profile').hide();
    $('.navbar-toggler').hide();
    $('.bu').hide();
    window.print();
    $('#sidebar').show();
    $('.navbar-brand').show();
    $('.nav-profile').show();
    $('.navbar-toggler').show();
    $('.bu').show();
  })
</script>