<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('access') == 'verf') {
      $this->vw('vw_home', "Home");
    } else {
      $this->session->sess_destroy();
      $data['title'] = "Forecasting";
      $this->load->view("vw_login");
    }
  }

  public function cekLogin()
  {
    $this->load->model(['Md_user']);

    $username = $this->input->post('username');
    $pass = md5($this->input->post('password'));

    if (empty($username) || empty($pass)) {
      $msg = 'Username dan password tidak boleh kosong';
    } else {
      $usr = $this->Md_user->login($username, $pass)->row_array();

      if (empty($usr)) {
        $msg = 'Username dan password tidak cocok. Silahkan periksa kembali';
      } else {

        $us = [
          'usr_id' => $usr['usr_id'],
          'name'   => $usr['name'],
          'access' => 'verf',
          'role'   => $usr['role']
        ];

        $this->session->set_userdata($us);
        $msg = "Selamat datang, " . $usr['name'];
      }
    }
    echo "<script>alert('$msg'); location.href='" . site_url('home') . "';</script>";
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect('home');
  }
}
