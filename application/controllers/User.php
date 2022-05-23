<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Md_user']);

    if ($this->session->userdata('access') != 'verf') {
      $this->session->sess_destroy();
      redirect('home');
    }
  }


  public function index()
  {
    $data['users'] = $this->Md_user->get()->result_array();
    $this->vw("user/vw_daftar", "Data User", $data);
  }


  public function input()
  {
    $data['role'] = ['Admin Marketing', 'General Manager', 'Direktur'];
    $this->vw("user/vw_input", "Tambah Data User", $data);
  }


  public function sb_input()
  {
    $inp = $this->input->post();

    $user = [
      'name'      => $inp['name'],
      'username'  => $inp['username'],
      'gender'    => $inp['gender'],
      'phone'     => $inp['telp'],
      'nik'       => $inp['nik'],
      'role'      => $inp['role'],
      'password'  => sha1($inp['password']),
    ];

    $this->db->trans_begin();

    $this->Md_user->insert($user);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil'); location.href='" . site_url('user') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Gagal'); location.href='" . site_url('user/input') . "';</script>";
    }
  }


  public function hapus($id)
  {

    $this->Md_user->delete($id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $status = "Berhasil";
    } else {
      $this->db->trans_rollback();
      $status = "Gagal";
    }

    echo "<script>alert('$status menghapus user'); location.href='" . site_url('user') . "';</script>";
  }


  public function ubah($id)
  {
    $data['usr'] = $this->Md_user->get($id)->row_array();
    $data['role'] = ['Admin Marketing', 'General Manager', 'Direktur'];
    $this->vw("user/vw_ubah", "Ubah Data User", $data);
  }


  public function sb_ubah()
  {
    $inp = $this->input->post();

    $user = [
      'name'      => $inp['name'],
      'username'  => $inp['username'],
      'gender'    => $inp['gender'],
      'phone'     => $inp['telp'],
      'nik'       => $inp['nik'],
      'role'      => $inp['role'],
    ];

    if (!empty($inp['password'])) {
      $user['password'] = sha1($inp['password']);
    }

    $this->db->trans_begin();

    $this->Md_user->update($inp['usr_id'], $user);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil mengubah user'); location.href='" . site_url('user') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Gagal mengubah user'); location.href='" . site_url('user/edit/' . $inp['usr_id']) . "';</script>";
    }
  }
}
