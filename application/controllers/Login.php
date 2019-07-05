<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->cname = 'dashboard';
    $this->cpc = 'cabang';
    $this->ckom = 'komisariat';
    $this->crayon = 'rayon';
    $this->cmember = 'member';
  }

  public function check_auth()
  {
    if(isset($_POST['login'])){
      $query = $this->Model_akun->get_val_gol();
      if ($query->logig == 1) {
         $result = $this->db->get_where('tb_admin', array('user_name' => $query->user))->row();
         $this->session->set_userdata('user', $result->user_name);
        if ($result->status == 'active' ) {
          redirect('cabang');
        }else{
          $this->session->set_flashdata("msg", "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>Akunnya blum aktive hub NawaIdea</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
          redirect('dashboard');
        }
      }elseif ($query->logig == 2) {
        $kode = ['kode_kom' => $query->kode];
        $result = $this->db->get_where('tb_komisariat', $kode)->result_array();
          foreach ($result as $list) {
            $r = array();
            $r['username']    = $list['username'];
            $r['nama_kom']    = $list['nama_kom'];
            $r['kode_kom']    = $list['kode_kom'];
            $r['kampus']      = $list['kampus'];
            $this->session->set_userdata($r);
          }
          redirect('Komisariat');
      }elseif ($query->logig == 3) {
        $kode = ['kode_rayon' => $query->kode];
        $result = $this->db->get_where('tb_rayon', $kode)->result_array();
        foreach ($result as $list) {
          $r = array();
          $r['username']    = $list['username'];
          $r['kode_kom']    = $list['kode_kom'];
          $r['nama_rayon']  = $list['nama_rayon'];
          $r['kode_rayon']  = $list['kode_rayon'];
          $r['fakultas']    = $list['fakultas'];
          $r['kampus']      = $list['kampus'];
          $this->session->set_userdata($r);
        }  
        redirect('Rayon');
      }elseif ($query->logig == 4) {
        $kode = ['username' => $query->kode];
        $result = $this->db->get_where('tb_kader_anggota')->result_array();
        foreach ($result as $list) {
            $r = array();
            $r['id']          = $list['id'];
            $r['foto']        = $list['foto'];
            $r['username']    = $list['username'];
            $r['nama']        = $list['nama'];
            $r['kode_kom']    = $list['kode_kom'];
            $r['kode_rayon']  = $list['kode_rayon'];
            $this->session->set_userdata($r);
          }  
          // var_dump($r);
          redirect('Member');
      }else {
        $this->session->set_flashdata('msg', "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>Maaf mungkin anda belum terdaftar atau anda salah memasukkan username dan password</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
          redirect('dashboard');
      } 
    }  
  }

  public function logout(){
    $this->session->sess_destroy();
    
    redirect ('dashboard','refresh');
  }

}

  




