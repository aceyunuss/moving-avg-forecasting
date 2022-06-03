<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Datapenjualan extends Core_Controller
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
    $data['sell'] = $this->Md_penjualan->get()->result_array();
    $this->vw("datapenjualan/vw_daftar", "Data Penjualan", $data);
  }

  public function lihat($id)
  {
    $data['sell'] = $this->Md_penjualan->get($id)->row_array();
    $data['itm'] = $this->Md_penjualan->getItem($id)->result_array();
    $this->vw("datapenjualan/vw_lihat", "Lihat Data Penjualan", $data);
  }
}