<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['M_user']);

    if ($this->session->userdata('status') != 'granted') {
      $this->session->sess_destroy();
      redirect('auth');
    }
  }


  public function index()
  {
    $data['userlist'] = $this->M_user->get()->result_array();
    $this->template("user/v_list", "Data User", $data);
  }


  public function add()
  {
    $data['role'] = ['Murid', 'Pembimbing', 'Manajer Proyek'];
    $this->template("user/v_add", "Tambah Data User", $data);
  }


  public function go_add()
  {
    $post = $this->input->post();

    $dt = [
      'fullname'      => $post['name'],
      'role'          => $post['role'],
      'gender'        => $post['gender'],
      'phone'         => $post['phone'],
      'email'         => $post['email'],
      'birthdate'     => $post['birthdate'],
      'password'      => sha1($post['password']),
    ];

    $this->db->trans_begin();

    $this->M_user->insert($dt);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil menambah user'); location.href='" . site_url('user') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Berhasil menambah user'); location.href='" . site_url('user/add') . "';</script>";
    }
  }


  public function delete($id)
  {

    $this->M_user->delete($id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $st = "Berhasil";
    } else {
      $this->db->trans_rollback();
      $st = "Gagal";
    }

    echo "<script>alert('$st menghapus user'); location.href='" . site_url('user') . "';</script>";
  }


  public function edit($id)
  {
    $data['usr'] = $this->M_user->get($id)->row_array();
    $data['role'] = ['Murid', 'Pembimbing', 'Manajer Proyek'];
    $this->template("user/v_edit", "Ubah Data User", $data);
  }


  public function go_edit()
  {
    $post = $this->input->post();

    $dt = [
      'fullname'      => $post['name'],
      'role'          => $post['role'],
      'gender'        => $post['gender'],
      'phone'         => $post['phone'],
      'email'         => $post['email'],
      'birthdate'     => $post['birthdate'],
    ];

    if (!empty($post['password'])) {
      $dt['password'] = sha1($post['password']);
    }

    $this->db->trans_begin();

    $this->M_user->update($post['user_id'], $dt);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      echo "<script>alert('Berhasil mengubah user'); location.href='" . site_url('user') . "';</script>";
    } else {
      $this->db->trans_rollback();
      echo "<script>alert('Gagal mengubah user'); location.href='" . site_url('user/edit/' . $post['user_id']) . "';</script>";
    }
  }
}
