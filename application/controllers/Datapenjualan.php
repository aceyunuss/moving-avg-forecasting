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
    $data['itm'] = "h";
    $data['sell'] = $this->Md_penjualan->getMonth("Pipa Baja Hitam", 2021)->result_array();

    $this->db->select("year(date) as yr")->group_by("year(date)");
    $yr = $this->Md_penjualan->get()->result_array();
    $data['yr'] = array_column($yr, "yr");
    $data['wy'] = 2021;

    $this->vw("datapenjualan/vw_daftar", "Data Penjualan", $data);
  }

  public function alias($id, $y)
  {
    $itm = [
      'h' => "Pipa Baja Hitam",
      'g' => "Pipa Baja Galvanis",
    ];
    $data['sell'] = $this->Md_penjualan->getMonth($itm[$id], $y)->result_array();
    $data['itm'] = $id;
    $this->db->select("year(date) as yr")->group_by("year(date)");
    $yr = $this->Md_penjualan->get()->result_array();
    $data['yr'] = array_column($yr, "yr");
    $data['wy'] = $y;

    $this->vw("datapenjualan/vw_daftar", "Data Penjualan", $data);
  }

  public function lihat($id)
  {
    $data['sell'] = $this->Md_penjualan->get($id)->row_array();
    $data['itm'] = $this->Md_penjualan->getItem($id)->result_array();
    $this->vw("datapenjualan/vw_lihat", "Lihat Data Penjualan", $data);
  }

  public function hapus($id)
  {
    $this->db->trans_begin();

    $this->Md_penjualan->delete($id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $msg = "Berhasil";
    } else {
      $this->db->trans_rollback();
      $msg = "Gagal";
    }
    echo "<script>alert('$msg'); location.href='" . site_url('datapenjualan') . "';</script>";
  }

  public function lihat_bulan($id, $yr)
  {
    $this->db->where(["month(date)" => $id, "year(date)" => $yr]);
    $month = date('F', mktime(0, 0, 0, $id, 1, date('Y')));
    $data['sell'] = $this->Md_penjualan->get()->result_array();

    $this->vw("datapenjualan/vw_daftar_det", "Data Penjualan Bulan $month", $data);
  }
}
