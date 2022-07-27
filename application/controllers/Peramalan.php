<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peramalan extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Md_penjualan', 'Md_peramalan']);

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

    $this->db->select("year(date) as yr")->group_by("year(date)");
    $yr = $this->Md_penjualan->get()->result_array();
    $data['yr'] = array_column($yr, "yr");

    $this->vw("peramalan/vw_index", "Prediksi Penjualan", $data);
  }


  public function calculate()
  {
    $itm = $this->input->post('item');
    $siz = $this->input->post('size');
    $mo = $this->input->post('mo');
    $per = 3; //$this->input->post('period');
    $yr = $this->input->post('yr');

    if ($mo == "all") {

      if ($siz != "all") {
        $this->db->where('size', $siz);
      }
      $pre = $this->db
        ->select("sum(total) as tot, month(date) as dt, monthname(date) as mo")
        ->where("date >= '$yr-01-01 00:00:00' - INTERVAL 3 MONTH ")
        ->where(['i.name' => $itm, 'year(date)' => $yr - 1])
        ->limit("3")
        ->join("sell s", "s.sell_id=i.sell_id", "left")
        ->group_by("month(date)")
        ->get('sell_item i')
        ->result_array();

      if ($siz != "all") {
        $this->db->where('size', $siz);
      }
      $now = $this->db
        ->select("sum(total) as tot, month(date) as dt, monthname(date) as mo")
        ->where(['i.name' => $itm, 'year(date)' => $yr])
        ->join("sell s", "s.sell_id=i.sell_id", "left")
        ->group_by("month(date)")
        ->get('sell_item i')
        ->result_array();

      $dat = array_merge($pre, $now);
    } else {
      if ($siz != "all") {
        $this->db->where('size', $siz);
      }
      $now = $this->db
        ->select("sum(total) as tot, month(date) as dt, monthname(date) as mo")
        ->group_start()
        ->where("date between '$yr-$mo-01 00:00:00' - INTERVAL 3 MONTH and '$yr-$mo-01 00:00:00'")
        ->group_end()
        ->where(['i.name' => $itm])
        ->order_by("date", "asc")
        ->limit("3")
        ->join("sell s", "s.sell_id=i.sell_id", "left")
        ->group_by("month(date)")
        ->group_by("year(date)")
        ->get('sell_item i')
        ->result_array();

      $pre = $te = [];
      if (count($now) < 3) {

        for ($i = -2; $i <= 0; $i++) {
          $x = $mo - 1;
          $pre[] = [
            'tot' => 0,
            'dt' => date('m', strtotime("$i month", strtotime(date("$yr-$x-01 00:00:00")))),
            'mo' => date('F', strtotime("$i month", strtotime(date("$yr-$x-01 00:00:00"))))
          ];
        }

        $te = array_slice($pre, 0, (3 - count($now)));
      }
      $dat = array_merge($te, $now);
    }

    foreach ($dat as $key => $value) {

      $dat[$key]['act'] = (int)$value['tot'];
      if ($key < ($per - 1) && $yr == 2021) {
        $dat[$key]['avg'] = "-";
        // $dat[$key]['mad'] = "-";
        // $dat[$key]['mse'] = "-";
        // $dat[$key]['mape'] = "-";
        $dat[$key]['rasio'] = "-";
      } else {
        $dt = array_slice($dat, ($key - $per + 1), $per - 1, true);

        $avg = ((array_sum(array_column($dt, "tot"))) + $value['tot']) / $per;
        // $mad = abs($avg - $value['tot']);
        // $mse = ($mad * $mad);
        // $mape = ($mad / $value['tot'] * 100);
        $rasio = $avg == 0 ? 0 : (($avg - $value['tot']) / $avg * 100);

        $dat[$key]['avg'] = round($avg, 2);
        // $dat[$key]['mad'] = round($mad, 2);
        // $dat[$key]['mse'] = round($mse, 2);
        // $dat[$key]['mape'] = round($mape, 2);
        $dat[$key]['rasio'] = round($rasio, 2);
      }
    }

    echo json_encode($dat);
  }


  public function send_predict()
  {
    $post = $this->input->post();
    $det = [];
    $ins = [
      'item_name' => $post['item_inp'],
      'size' => $post['size_inp'],
      'month' => $post['month_inp'],
      'year' => $post['year_inp'],
      'created_date' => date('Y-m-d H:i:s')
    ];

    $mo = explode(";", $post['imonth']);
    $ac = explode(";", $post['iact']);
    $ma = explode(";", $post['ifma']);
    $ra = explode(";", $post['irasio']);


    $this->db->trans_begin();

    $id = $this->Md_peramalan->insert($ins);

    foreach ($mo as $key => $value) {
      if (!empty($value)) {
        $det[] = [
          'forecast_id' => $id,
          'month' => $value,
          'actual' => $ac[$key],
          'predict' => $ma[$key],
          'ratio' => $ra[$key],
        ];
      }
    }

    $id = $this->Md_peramalan->insertDetail($det);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil'); location.href='" . site_url('peramalan') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Gagal'); location.href='" . site_url('peramalan') . "';</script>";
    }
  }


  public function list()
  {

    $data['list'] = $this->Md_peramalan->get()->result_array();
    $this->vw("peramalan/vw_daftar", "Data Prediksi Penjualan", $data);
  }


  public function view($id)
  {

    $data['fo'] = $this->Md_peramalan->get($id)->row_array();
    $data['fodet'] = $this->Md_peramalan->getDetail($id)->result_array();

    $this->vw("peramalan/vw_det_all", "Data Prediksi Penjualan", $data);
  }
}
