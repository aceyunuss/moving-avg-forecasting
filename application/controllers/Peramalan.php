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
    $mot = $this->input->post('period');


    if ($mot != "all") {
      if ($siz != "all") {
        $this->db->where('size', $siz);
      }
      $dat = $this->db
        ->select("sum(total) as tot, month(date) as dt")
        ->where(['i.name' => $itm])
        ->where_in('month(date)', [10, 11, 12])
        ->join("sell s", "s.sell_id=i.sell_id", "left")
        ->group_by("month(date)")
        ->get('sell_item i')
        ->result_array();

      $act = $this->db
        ->select("sum(total) as tot")
        ->where(['i.name' => $itm, 'month(date)'=> $mot])
        ->join("sell s", "s.sell_id=i.sell_id", "left")
        ->get('sell_item i')
        ->row()->tot;


      foreach ($dat as $key => $value) {

        $dt[$value['dt']]['avg'] = $value['tot'];
      }

      for ($i = 1; $i <= $mot; $i++) {

        $dt = array_slice($dt, -3, 3, true);
        $x = $to = 0;
        foreach ($dt as $k => $v) {
          $x = $v['avg'] + $x;
        }
        $avg = round(($x / 3), 2);
        $mad = abs($avg - $act);
        $mse = round(($mad*$mad), 2);
        $mape = round(($mad/$act*100), 2) . " %";

        $dt[$i + $k]['avg'] = $avg;
        $dt[$i + $k]['mad'] = $mad;
        $dt[$i + $k]['mse'] = $mse ;
        $dt[$i + $k]['mape'] = $mape;
        $dt[$i + $k]['mot'] =  $k-11;
      }

      echo json_encode(end($dt));
    }
  }
}
