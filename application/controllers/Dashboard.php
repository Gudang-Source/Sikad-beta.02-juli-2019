<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function index() 
  {
    $data['title'] = "Login Akun ";
    $this->load->view('aut_log', $data);
  }
  
}