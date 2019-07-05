<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rayon extends CI_Controller {
  
  private $pc = "V-04-02.";
  public function __construct(){
    parent::__construct();
    
    if(! $this->session->has_userdata('nama_rayon') && !$this->session->has_userdata('kode_rayon'))
    {
      $this->session->set_flashdata("alert_pro", "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>OJOK MEKSO, LOGIN RUMIYEN!!!</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
      redirect('dashboard/pr', 'refresh');
    }
  }

  public function index(){
    $session = $this->session->userdata('kode_rayon');
    
    $data['title'] = "Rayon " .$this->session->userdata('nama_rayon');
    $this->load->view('rayon/rayon', $data); 
  }

  public function profile()
  {
    $session  = $this->session->userdata('kode_rayon');
    $title    = $this->session->userdata('nama_rayon');
    
    $data['title'] = "Rayon " .$title;
    $data['data'] = $this->model_akun->profile_rayon($session);
    $this->load->view('rayon/prifile_rayon', $data);
  }

  public function anggota_rayon()
  {
    $kader = $this->session->userdata('kode_rayon');
    $title = $this->session->userdata('nama_rayon');
    $data['title']  = "Rayon " .$title;
    $data['data']   = $this->model_akun->get_kader($kader);
    $this->load->view('rayon/anggota_rayon', $data);
  }

  public function VeditProfil(){
    $session = $this->session->userdata('kode_rayon');
    $title = $this->session->userdata('nama_rayon');
    $data['title'] = $title;
    $data['kom'] = $this->mkom->get_kom();
    $data['data'] = $this->model_akun->profile_rayon($session);
    $this->load->view('rayon/VeditProfil',$data);
  }

  public function update_profile(){
    $id         = $this->input->post('id_rayon');
    $tgl_lahir = $this->input->post('since');
    $tgl = date('Y-m-d', strtotime($tgl_lahir));
    $nama_rayon = $this->input->post('nama_rayon');
    $fakultas   = $this->input->post('fakultas');
    $no_telp    = $this->input->post('no_telp');
    $alamat     = $this->input->post('alamat');
    $email      = $this->input->post('email');
    $website    = $this->input->post('website');
    $fb         = $this->input->post('fb');
    $ig         = $this->input->post('ig');
    $tw         = $this->input->post('tw');
    $media      = $this->input->post('media');

      $data_update = array(
        'since'       => $tgl,
        'nama_rayon'  => $nama_rayon,
        'fakultas'    => $fakultas,
        'no_telp'     => $no_telp,
        'alamat'      => $alamat,
        'email'       => $email,
        'website'     => $website,
        'fb'          => $fb,
        'ig'          => $ig,
        'tw'          => $tw,
        'media'       => $media
      );
    
    $where = array ('id_rayon'=>$id);
    $res = $this->mrayon->Updatedata('tb_rayon', $data_update, $where);
    if ($res>=1) {
      redirect('rayon/profile');
    }else{
      echo "data gagal di update !!!";
    }
  }

  public function setting_akun(){
    $session = $this->session->userdata('kode_rayon');
    $title = $this->session->userdata('nama_rayon');
    $data['title'] = $title;
    $data['kom'] = $this->mkom->get_kom();
    $data['data'] = $this->model_akun->profile_rayon($session);
    $this->load->view('rayon/setting_akun',$data);
  }

  public function proses_setting_akun(){
    $id         = $this->input->post('id_rayon');
    $password   = $this->input->post('password');
    $username   = $this->input->post('username');
    
      $data_update = array(
        'password'    => $password,
        'username'    => $username
      );
    
    $where = array ('id_rayon'=>$id);
    $res = $this->mrayon->Updatedata('tb_rayon', $data_update, $where);
    if ($res>=1) {
      redirect('rayon/profile');
    }else{
      echo "data gagal di update !!!";
    }
  }

  public function tambah_data()
  { 
    $title = $this->session->userdata('nama_rayon');
    $data['title'] = "Rayon " .$title;
    $data['kom'] = $this->mkom->get_kom();
    
    $this->load->view('rayon/add_anggota', $data);
  }

  public function proses(){
    $nama     = $this->input->post('nama');
    $kode     = $this->input->post('kode');
    $kom      = $this->session->userdata('kode_kom');
    $rayon    = $this->session->userdata('kode_rayon');
    $fakultas = $this->session->userdata('fakultas');
    $kampus   = $this->session->userdata('kampus');
    $since_enter = $this->input->post('since_enter');
    $tgl = date('Y-m-d', strtotime($since_enter));

    $data_update = array(
        'nama'       => $nama,
        'kode'       => $kode,
        'kode_kom'   => $kom,
        'kode_rayon' => $rayon,
        'fakultas'   => $fakultas,
        'kampus'     => $kampus,
        'username'   => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($since_enter)).'.'.$kode,
        'since_enter'=> $tgl,
        'password'   => rand(0, 10000)
      );

      $res = $this->db->insert('tb_kader_anggota',$data_update);
      if ($res >=1) {
        redirect ('rayon/anggota_rayon');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  public function edit(){
    $id = $this->uri->segment(3);
    $data['kom'] = $this->mkom->get_kom();
    $data['rayon'] = $this->mrayon->path_data_rayon();
    $data['title'] = "KADER ANGGOTA";
    $data['data'] = $this->model_akun->edit_anggot_rayon($id);
    $this->load->view('rayon/add_anggota', $data);
  }

  public function proses_edit(){
    $id       = $this->input->post('id');
    $kode     = $this->input->post('kode');
    $nama     = $this->input->post('nama');
    $kom      = $this->session->userdata('kode_kom');
    $rayon    = $this->session->userdata('kode_rayon');
    $fakultas = $this->session->userdata('fakultas');
    $kampus   = $this->session->userdata('kampus');
    $since_enter = $this->input->post('since_enter');
    $tgl = date('Y-m-d', strtotime($since_enter));

    $data_update = array(
        'nama'        => $nama,
        'kode'        => $kode,
        'kode_kom'    => $kom,
        'kode_rayon'  => $rayon,
        'fakultas'    => $fakultas,
        'kampus'      => $kampus,
        'username'   => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($since_enter)).'.'.$kode,
        'since_enter' => $tgl,
        'password'    => rand(0, 10000)
      );
      $where = array('id'=>$id);
      $res = $this->db->update('tb_kader_anggota',$data_update,$where);
      if ($res >=1) {
        redirect ('rayon/anggota_rayon');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  function delete_data($id)
  {
    $where = array('id' => $id);
    $res = $this->model_akun->delete_data('tb_kader_anggota', $where);
    if ($res>=1) {
      redirect ('rayon/anggota_rayon');
    }else{
        echo "<h1> data gagal  </h1> ";
    }
  }

  public function ligatkader(){
    $session = $this->uri->segment(3);
    $data['title'] = "Profile Kader";
    $data['data'] = $this->mrayon->getprofile($session);
    $this->load->view('rayon/profilekader', $data);
  }

}