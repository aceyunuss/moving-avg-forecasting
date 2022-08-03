<div class="row">
  <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
    <div class="row">
      <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-warning">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <h2 class="text-white"><?= $h ?></h2>
              </div>
              <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
            </div>
            <h6 class="text-white">Pipa Baja Hitam</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-danger">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <h2 class="text-white"><?= $g ?></h2>
              </div>
              <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
            </div>
            <h6 class="text-white">Pipa Baja Galvanis</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
        <div class="card bg-success">
          <div class="card-body px-3 py-4">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <h2 class="text-white"><?= $u ?></h2>
              </div>
              <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
            </div>
            <h6 class="text-white">Pengguna Aplikasi</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-9 stretch-card grid-margin">
    <div class="card">
      <br>
      <div class="card-body">
        <div class="row my-3">
          <div class="col-sm-12">
            <div class="flot-chart-wrapper">
              <div id="flotChart" class="flot-chart">
                <figure class="highcharts-figure">

                  <div id="container"></div>
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://code.highcharts.com/highcharts.js"></script>

  <script>
    Highcharts.chart('container', {
      chart: {
        height: 330,
      },
      title: {
        text: 'Penjualan Pipa Baja'
      },
      xAxis: {
        type: 'datetime'
      },

      yAxis: {
        title: {
          text: 'Jumlah'
        }
      },
      series: [{
        name: 'Pipa Baja Galvanis',
        data: [{
          x: Date.UTC(2021, 1),
          y: 239
        }, {
          x: Date.UTC(2021, 2),
          y: 556
        }, {
          x: Date.UTC(2021, 3),
          y: 124,
        }, {
          x: Date.UTC(2021, 4),
          y: 423
        }, {
          x: Date.UTC(2021, 5),
          y: 112
        }, {
          x: Date.UTC(2021, 6),
          y: 493
        }, {
          x: Date.UTC(2021, 7),
          y: 239
        }, {
          x: Date.UTC(2021, 8),
          y: 324
        }, {
          x: Date.UTC(2021, 9),
          y: 493
        }]
      }, {
        name: 'Pipa Baja Hitam',
        data: [{
          x: Date.UTC(2021, 1),
          y: 123
        }, {
          x: Date.UTC(2021, 2),
          y: 421
        }, {
          x: Date.UTC(2021, 3),
          y: 322,
        }, {
          x: Date.UTC(2021, 4),
          y: 431
        }, {
          x: Date.UTC(2021, 5),
          y: 536
        }, {
          x: Date.UTC(2021, 6),
          y: 222
        }, {
          x: Date.UTC(2021, 7),
          y: 456
        }, {
          x: Date.UTC(2021, 8),
          y: 782
        }, {
          x: Date.UTC(2021, 9),
          y: 234
        }]
      }]

    });
  </script>

  <style>
    .highcharts-figure,
    .highcharts-data-table table {
      min-width: 360px;
      max-width: 800px;
      margin: 1em auto;
    }

    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }

    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }

    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
      padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
  </style>