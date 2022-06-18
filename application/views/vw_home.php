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
                  <div id="containerss"></div>
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- <script src="<?= base_url('assets/js/dashboard.js') ?>"></script> -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
  <script>
    Highcharts.chart('containerss', {

        title: {
          text: 'Penjualan'
        }
        ,

        yAxis: {
          title: {
            text: 'Jumlah'
          }
        }

        ,

        xAxis: {
          accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
          }
        }

        ,

        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        }

        ,

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            }

            ,
            pointStart: 2010
          }
        }

        ,

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 14000]
          }

          , {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
          }

          , {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
          }

          , {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
          }

          , {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
          }

        ],

        responsive: {
          rules: [{
              condition: {
                maxWidth: 500
              }

              ,
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }

          ]
        }

      }

    );
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