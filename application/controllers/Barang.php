<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends Core_Controller
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
    $data['itm'] = $this->Md_penjualan->getItem()->result_array();
    $this->vw("barang/vw_daftar", "Data Barang", $data);
  }

  public function lihat($id)
  {
    $data['itm'] = $this->Md_penjualan->getItem("", $id)->result_array();
    $this->vw("barang/vw_lihat", "Lihat Data Barang", $data);
  }
}
