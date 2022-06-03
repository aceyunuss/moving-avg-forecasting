<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PT. Cahaya Laguna</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/vendors/css/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/demo/style.css') ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('/assets/images/favicon.png') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth" style="background-image: url('<?= base_url('/assets/images/cartglobe.jpg') ?>'); background-size: 100% auto;">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <h2>PT. Cahaya Laguna</h2>
              </div>
              <h4>Hello let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="<?= site_url('auth/cekLogin') ?>" method="POST">
                <div class="form-group">
                  <input name="username" required type="text" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" required type="password" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('/assets/vendors/js/vendor.bundle.base.js') ?> "></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('/assets/js/off-canvas.js') ?> "></script>
  <script src="<?= base_url('/assets/js/hoverable-collapse.js') ?> "></script>
  <script src="<?= base_url('/assets/js/misc.js') ?> "></script>
  <script src="<?= base_url('/assets/js/settings.js') ?> "></script>
  <!-- endinject -->
</body>

</html>