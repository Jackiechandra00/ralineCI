<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->username=="") {
      redirect('index');
    }
  }

  public function index()
  {
    $this->load->view('guru/dashboard');
  }
}
