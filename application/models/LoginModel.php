<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function login_model($uname = '', $pwd = '')
  {
    $uname = $this->db->escape($uname);
    $login_check = $this->db->query("SELECT * FROM user WHERE username=$uname");
    if ($login_check) {
      if (password_verify($pwd, $login_check->row()->password)) {
        $time = time();
        $time = date("Y-m-d H:i:s", $time);
        // $this->db->query("UPDATE user SET last_login='$time', status='logged_in' WHERE username=$uname");
        $this->db->query("call log_user_aktif($uname, 'login', '{$time}');");
        return [true, $login_check];
      } else {
        return [false, ''];
      }
    }
  }

  public function logout($uname = '')
  {
    $user_check = $this->db->query("SELECT * FROM user WHERE username='$uname'")->num_rows();
    // var_dump($user_check);die;
    if ($user_check>0) {
      if ($this->db->query("UPDATE user SET status='inactive' WHERE username='$uname'")) {
        $time = time();
        $time = date("Y-m-d H:i:s", $time);
        $this->db->query("call log_user_aktif('$uname', 'logout', '{$time}');");
        return true;
      } else {
        return false;
      }
    }
  }
}
