<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends Core_Controller
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
    $uom = $this->Md_penjualan->getUom()->result_array();
    $data['uom'] = json_encode($uom);
    $itm = $this->Md_penjualan->item();
    $data['itm'] = json_encode($itm);
    $this->vw("penjualan/vw_input", "Input Penjualan", $data);
  }


  public function sb_input()
  {
    $inp = $this->input->post();
    $itm = [];

    $penjualan = [
      'date'          => $inp['tanggal'],
      'customer'      => $inp['cust'],
      'po'            => $inp['po'],
      'description'   => $inp['desc'],
      'creator_id'    => $this->session->userdata('usr_id'),
      'creator_name'  => $this->session->userdata('name'),
    ];

    $this->db->trans_begin();

    $this->Md_penjualan->insert($penjualan);

    $sell_id = $this->db->insert_id();

    foreach ($inp['item_name'] as $k => $v) {
      $itm[] = [
        'sell_id' => $sell_id,
        'name'    => $inp['item_name'][$k],
        'size'    => $inp['item_size'][$k],
        'total'   => $inp['item_total'][$k],
      ];
    }

    $this->Md_penjualan->insertItem($itm);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil'); location.href='" . site_url('datapenjualan') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Gagal'); location.href='" . site_url('penjualan/input') . "';</script>";
    }
  }
}
