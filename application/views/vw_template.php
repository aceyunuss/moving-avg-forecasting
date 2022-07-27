<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>PT. Cahaya Leguna - <?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
  <link href="<?= base_url('assets/css/select2.min.css') ?>" rel="stylesheet">


  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.resize.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.categories.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.fillbetween.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.stack.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/flot/jquery.flot.pie.js') ?>"></script>
  <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets/js/misc.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery.min.js') ?> "></script>
  <script src="<?= base_url('assets/js/datatables.js') ?> "></script>
  <script src="<?= base_url('assets/js/select2.min.js') ?> "></script>

</head>


<body>
  <div class="container-scroller">

    <?php include('vw_menu.php') ?>

    <?php include('vw_header.php') ?>

    <?php include('vw_content.php') ?>

  </div>
</body>

</html>

<script>
  $(document).ready(function() {
    $('.datatable').DataTable();

    $(".selects2").select2({
      theme: "classic"
    });
  });
</script>