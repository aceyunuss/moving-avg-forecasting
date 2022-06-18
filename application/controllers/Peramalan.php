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


  public function calculate()
  {
    $itm = $this->input->post('item');
    $siz = $this->input->post('size');
    $per = $this->input->post('period');


    if ($siz != "all") {
      $this->db->where('size', $siz);
    }
    $dat = $this->db
      ->select("sum(total) as tot, month(date) as dt, monthname(date) as mo")
      ->where(['i.name' => $itm])
      ->join("sell s", "s.sell_id=i.sell_id", "left")
      ->group_by("month(date)")
      ->get('sell_item i')
      ->result_array();

    foreach ($dat as $key => $value) {

      $dat[$key]['act'] = (int)$value['tot'];
      if ($key > ($per - 1)) {
        $dt = array_slice($dat, ($key - $per), $per, true);

        $avg = (array_sum(array_column($dt, "tot"))) / $per;
        $mad = abs($avg - $value['tot']);
        $mse = round(($mad * $mad), 2);
        $mape = round(($mad / $value['tot'] * 100), 2);

        $dat[$key]['avg'] = round($avg, 2);
        $dat[$key]['mad'] = $mad;
        $dat[$key]['mse'] = $mse;
        $dat[$key]['mape'] = $mape;
      } else {
        $dat[$key]['avg'] = "-";
        $dat[$key]['mad'] = "-";
        $dat[$key]['mse'] = "-";
        $dat[$key]['mape'] = "-";
      }
    }

    echo json_encode($dat);
  }
}
