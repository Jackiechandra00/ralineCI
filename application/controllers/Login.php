<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel');
    // if($this->session->jabatan == "Guru"){
    //   redirect('Teacher/guru');
    // } else if ($this->session->jabatan == "admin") {
    //   redirect("Adminis/Admin");
    // }
  }
  public function index()
  {
    $this->load->view('index');
  } 

  public function login()
  {
    $uname = $this->input->post('username');
    $pwd = $this->input->post('password');

    $login_check = $this->LoginModel->login_model($uname, $pwd);
      
    if ($login_check[0]) {
      // Auth success
        $this->session->unset_userdata('username');
        $data = $login_check[1]->row();
        $this->session->set_userdata([
          'id' => $data->id,
          'username' => $data->username,
          'jabatan' => $data->jabatan
        ]);
        if($this->session->jabatan == "admin")
        {
          redirect('Adminis/Admin');
        }
        else
        {
          redirect('Teacher/Guru');
        }
    } else {
      redirect('Login');
    }
  }

  public function logout()
  {
    if ($this->LoginModel->logout($this->session->username)) {
      $this->session->sess_destroy();
    }
    redirect('Login');
  }
}
