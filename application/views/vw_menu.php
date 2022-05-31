<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
    <a class="sidebar-brand brand-logo" href="<?= site_url() ?>"><img src="<?= base_url('assets/images/logo.svg') ?>" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="<?= site_url() ?>"><img src="<?= base_url('assets/images/logo-mini.svg') ?>" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?= base_url('assets/images/faces-clipart/pic-1.png') ?>" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column pr-3">
          <span class="font-weight-medium mb-2"><?= $this->session->userdata('name') ?></span>
          <span class="font-weight-normal"><?= $this->session->userdata('role') ?></span>
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('') ?>">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('user') ?>">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Data User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('barang') ?>">
        <i class="mdi mdi mdi-archive menu-icon"></i>
        <span class="menu-title">Data Barang</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('penjualan') ?>">
        <i class="mdi mdi-cart menu-icon"></i>
        <span class="menu-title">Input Penjualan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('datapenjualan') ?>">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Data Penjualan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= site_url('peramalan') ?>">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Peramalan Penjualan</span>
      </a>
    </li>
  </ul>
</nav>