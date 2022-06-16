<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peramalan extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Md_penjualan']);

    if ($this->session->userdata('access') != 'verf') {
      $this->session->sess_destroy();
      redirect('home');
    }
  }

  public function index()
  {
    $data['uom'] = $this->Md_penjualan->getUom()->result_array();
    $mth = [];
    for ($m = 1; $m <= 12; $m++) {
      $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
      $mth[$m] = $month;
    }

    $data['mth'] = $mth;
    $data['item'] = $this->Md_penjualan->item();

    $this->vw("peramalan/vw_index", "Prediksi Penjualan", $data);
  }
}
