<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisariat extends CI_Controller {
  
  private $pc = "V-04.02.";

  public function __construct(){
    parent::__construct();
    $this->load->library('ciqrcode');
     if(! $this->session->has_userdata('nama_kom') && !$this->session->has_userdata('kode_kom'))
        {
          $this->session->set_flashdata("alert_pro", "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>OJOK MEKSO, LOGIN RUMIYEN!!!</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
          redirect('dashboard/pk', 'refresh');
        }
    $this->load->model('app_model');
  }

  public function index(){
    $data = array(
              'title' => $this->session->userdata('nama_kom')
            );
    $this->load->view('komisariat/komisariat', $data);
  }

  function profile(){
    $session = $this->session->userdata('kode_kom');
    
    $data = array(
                  'title' => $this->session->userdata('nama_kom'), 
                  'data' => $this->Model_akun->profile_kom($session),
                );
    $this->load->view('komisariat/profile_kom', $data);
  }

  function datarayon()
  {
    $session = $this->session->userdata('kode_kom');
    $nama_kom = $this->session->userdata('nama_kom');

    $data = array(
                  'title' => $nama_kom, 
                  'data' => $this->Model_akun->get_rayon($session),
                );

    $this->load->view('komisariat/rayonkom', $data);
  }

  public function getkaderKom()
  {
    $session = $this->session->userdata('kode_kom');
    $nama_kom = $this->session->userdata('nama_kom');
    
    $data = array(
              'title' => $nama_kom,
              'data' => $this->Model_akun->get_data_rayon($session)
            );
    $this->load->view('komisariat/kaderkom', $data);
  }
  
  public function edit_kom(){
    $session  = $this->session->userdata('kode_kom');
    $title    = $this->session->userdata('nama_kom');
    
    $data = array(
                'title' => "Komisariat " .$title, 
                'data' => $this->Model_akun->profile_kom($session)
              );
    $this->load->view('komisariat/VeditProfile', $data);
  }

  public function update_kom(){
    $Id_kom    = $_POST ["id_kom"];
    $tgl_lahir = $this->input->post('since');
    $tgl       = date('Y-m-d', strtotime($tgl_lahir));
    $Nama_kom  = $_POST ["nama_kom"];
    $kampus    = $_POST["kampus"];
    $No_telp   = $_POST ["no_telp"];
    $Media     = $_POST ["media"];
    $Alamat    = $_POST ["alamat"];
    $email     = $_POST["email"];
    $web       = $_POST["website"];
    $fb        = $_POST["fb"];
    $ig        = $_POST["ig"];
    $tw        = $_POST["tw"];

    $data_update = array(
        'since'     => $tgl,
        'nama_kom'  => $Nama_kom,
        'kampus'    => $kampus,
        'no_telp'   => $No_telp,
        'media'     => $Media,
        'alamat'    => $Alamat,
        'email'     => $email,
        'website'   => $web,
        'fb'        => $fb,
        'ig'        => $ig,
        'tw'        => $tw
      );
    $where = array ('id_kom'=>$Id_kom);
    $res = $this->db->update('tb_komisariat', $data_update, $where);
    if ($res>=1) {
      redirect('komisariat/profile');
    }else{echo "data gagal di update !!!";
   }
  }

  public function setting_akun(){
    $session  = $this->session->userdata('kode_kom');
    $title    = $this->session->userdata('nama_kom');
    
    $data = array(
                'title' => "Komisariat " .$title,
                'data' => $this->Model_akun->profile_kom($session)
              );
    $this->load->view('komisariat/setting_akun', $data);
  }

  public function proses_setting_akun(){
    $Id_kom    = $_POST ["id_kom"];
    $username  = $_POST ["username"];
    $password  = do_hash($this->input->post('password'), "MD5");
    
    $data_update = array(
        'password'  => $password,
        'username'  => $username
      );
    $where = array ('id_kom'=>$Id_kom);
    $res = $this->db->update('tb_komisariat', $data_update, $where);
    if ($res>=1) {
      redirect('komisariat/profile');
    }else{echo "data gagal di update !!!";
   }
  }

  public function tambahrayon(){
    $session = $this->session->userdata('kode_kom');
    $data['title'] = $this->session->userdata('nama_kom');
    $data['kode'] = $session;
    
    $this->load->view('komisariat/add_rayon', $data);
  }

  public function insertRayon(){
    $kode_kom   = $this->session->userdata('kode_kom');
    $kampus     = $this->session->userdata('kampus');
    $username   = $this->input->post('username');
    $kode_rayon = $this->input->post('kode_rayon');
    $nama_rayon = $this->input->post('nama_rayon');
    $fakultas   = $this->input->post('fakultas');
    $password   = $this->input->post('password');
      
      $data_update = array(
        'kode_kom'   => $kode_kom,
        'kode_rayon' => $kode_rayon,
        'kampus'     => $kampus,
        'nama_rayon' => $nama_rayon,
        'fakultas'   => $fakultas,
        'username'   => $username,
        'password'   => $password
      );

      $res = $this->db->insert('tb_rayon',$data_update);
      if ($res >=1) {
        redirect ('komisariat/datarayon');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  public function editrayon()
  {
    $title = $this->session->userdata('nama_kom');
    $id     = $this->uri->segment(3);

    $data = array(
              'kode' => $this->session->userdata('kode_kom'),
              'title' => $title,
              'data' => $this->Model_akun->edit_data_rayon($id)
            );
    $this->load->view('komisariat/add_rayon',$data);
  }

  public function updateRayon()
  {
    $id         = $this->input->post('id_rayon');
    $kode_kom   = $this->session->userdata('kode_kom');
    $kampus     = $this->session->userdata('kampus');
    $username   = $this->input->post('username');
    $kode_rayon = $this->input->post('kode_rayon');
    $fakultas   = $this->input->post('fakultas');
    $nama_rayon = $this->input->post('nama_rayon');
    $password   = $this->input->post('password');
      
      $data_update = array(
        'kode_kom'   => $kode_kom,
        'kode_rayon' => $kode_rayon,
        'kampus'     => $kampus,
        'nama_rayon' => $nama_rayon,
        'fakultas'   => $fakultas,
        'username'   => $username,
        'password'   => $password
      );
      $where = array ('id_rayon'=>$id);
      $res = $this->Mrayon->Updatedata('tb_rayon', $data_update, $where);
      if ($res >=1) {
        redirect ('komisariat/datarayon');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  public function deleteRayon($id)
  {
    $where = array('kode_rayon' => $id);
    $res   = $this->Model_akun->delete_rayon('tb_rayon', $where);
    $res2  = $this->Model_akun->delete_rayon('tb_kader_anggota', $where);
    if ($res > 0 && $res2 > 0) {
      redirect('komisariat/datarayon');
    }else{
      echo "gagal";
    }
  }

  public function tambahkader()
  { 
    $id    = $this->session->userdata('kode_kom');
    $title = $this->session->userdata('nama_kom');
    
    $data = array(
              'title' => $title,
              'kom' => $this->Mkom->get_kom(),
              'kader' => $this->Mkom->getrayonperkom($id)
            );
    $this->load->view('komisariat/add_anggota', $data);
  }

  public function proses(){
    $nama     = $this->input->post('nama');
    $kode     = $this->input->post('kode');
    $kom      = $this->session->userdata('kode_kom');
    $since_enter = $this->input->post('since_enter');
    $tgl = date('Y-m-d', strtotime($since_enter));
    $kampus   = $this->session->userdata('kampus');
    $rayon    = $this->input->post('kode_rayon');
    $fakultas = $this->input->post('fakultas');


    $data_update = array(
        'nama'       => $nama,
        'kode'       => $kode,
        'kode_kom'   => $kom,
        'kampus'     => $kampus,
        'kode_rayon' => $rayon,
        'fakultas'   => $fakultas,
        'username'   => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($since_enter)).'.'.$kode,
        'since_enter'=> $tgl,
        'password'   => rand(0, 10000),
        'status'     => 'active'
      );

      $res = $this->db->insert('tb_kader_anggota',$data_update);
      if ($res >=1) {
        redirect ('komisariat/getkaderKom');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  public function edit(){
    $id2 = $this->session->userdata('kode_kom');
    $id = $this->uri->segment(3);
    $data['kom'] = $this->Mkom->get_kom();
    $data['rayon'] = $this->Mrayon->path_data_rayon();
    $data['title'] = "KADER ANGGOTA";
    $data['kader'] = $this->Mkom->getrayonperkom($id2);
    $data['data'] = $this->Model_akun->edit_anggot_rayon($id);
    $this->load->view('komisariat/add_anggota', $data);
  }

  public function proses_edit(){
    $id       = $this->input->post('id');
    $kode     = $this->input->post('kode');
    $nama     = $this->input->post('nama');
    $kom      = $this->session->userdata('kode_kom');
    $rayon    = $this->input->post('kode_rayon');
    $kampus   = $this->session->userdata('kampus');
    $fakultas = $this->input->post('fakultas');
    $since_enter = $this->input->post('since_enter');
    $tgl      = date('Y-m-d', strtotime($since_enter));

    $data_update = array(
        'nama'        => $nama,
        'kode'        => $kode,
        'kode_kom'    => $kom,
        'kode_rayon'  => $rayon,
        'kampus'      => $kampus,
        'fakultas'    => $fakultas,
        'username'    => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($since_enter)).'.'.$kode,
        'since_enter'=> $tgl,
        'password'    => rand(0, 10000)
      );
      $where = array('id'=>$id);
      $res = $this->db->update('tb_kader_anggota', $data_update, $where);
      if ($res >=1) {
        redirect ('komisariat/getkaderKom');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

  function delete_data($id)
  {
    $where = array('id' => $id);
    $res = $this->Model_akun->delete_data('tb_kader_anggota', $where);
    if ($res>=1) {
      redirect ('komisariat/getkaderKom');
    }else{
        echo "<h1> data gagal  </h1> ";
    }
  }

  /*public function profilerayon()
  {
    
    $this->db->select('*');
    $this->db->where('kode_kom', 'asia');
    $this->db->where('kode_rayon', '001');
    $this->db->from('tb_rayon');
    $data = $this->db->get('tb_rayon');

    print_r($data);
  }*/

  public function kaderrayon(){
    $id = $this->uri->segment(3);
    $data['title'] = $id;
    $data['data'] = $this->Mrayon->datakaderrayon($id);
    $this->load->view('komisariat/kaderkom', $data);
  }

  public function lihatkader(){
    $session = $this->uri->segment(3);
    $data['title'] = "Profile Kader";
    $data['data'] = $this->Mrayon->getprofile($session);
    $this->load->view('rayon/profilekader', $data);
  }

}
