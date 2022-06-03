<div class="col-xl-12 col-md-12 grid-margin stretch-card">
  <div class="card card-invoice">
    <div class="card-body">
      <h4 class="card-title pb-3">Pending invoices</h4>
      <div class="row">
        <div class="col-md-6">
          <div class="dropdown">

            <div class="list-card">
              <div class="align-items-center">
                <div class="col-12 col-sm-12">
                  <div class="row align-items-center">
                    <div class="col-sm-3">
                      <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="col-sm-5 pr-0 pl-sm-0">
                      <span>Januari</span>
                      <h6 class="mb-1 mb-sm-0">2022</h6>
                    </div>
                    <div class="col-sm-4">
                      <div class="d-flex pt-1 align-items-center">
                        <a href="awok" class="reload-outer bg-info"><i class="mdi mdi-reload"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="dropdown">

            <div class="list-card">
              <div class="align-items-center">
                <div class="col-12 col-sm-12">
                  <div class="row align-items-center">
                    <div class="col-sm-3">
                      <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="col-sm-5 pr-0 pl-sm-0">
                      <span>Januari</span>
                      <h6 class="mb-1 mb-sm-0">2022</h6>
                    </div>
                    <div class="col-sm-4">
                      <div class="d-flex pt-1 align-items-center">
                        <a href="awok" class="reload-outer bg-info"><i class="mdi mdi-reload"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Penjualan</h4>
    <hr>
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