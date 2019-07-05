<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller{

  private $pc = "V-04.02.";

  public function __construct(){
    parent::__construct();
    $this->load->library('ciqrcode');
    $this->load->model(array('Foo_model', 'Model_konten', 'App_model', 'Modelkom' ));
    
    if(! $this->session->has_userdata('user'))
    {
      $this->session->set_flashdata("msg", "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>OJOK MEKSO, LOGIN RUMIYEN!!!</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
      redirect('dashboard', 'refresh');
    }
    
  }

  public function index(){
    $data['from_kom'] = $this->Model_konten->kom_to_pc();
    $data['from_pr'] = $this->Model_konten->rayon_to_pc();
    $data['from_mm'] = $this->Model_konten->member_to_pc();
    $data['title'] = 'Welcome';
    $this->load->view('cabang/cabang', $data);
  }

  public function index2()
  {
    $datas = [
              'title'    => 'Welcome, ',
              'from_kom' => $this->Model_konten->kom_to_pc(),
              'from_pr'  => $this->Model_konten->rayon_to_pc(),
              'from_mm'  => $this->Model_konten->member_to_pc(),
            ];
    $this->load->view('cabang/header_cabang', $datas);
    $this->load->view('cabang/testing_index', $datas);
    $this->load->view('cabang/footer_cabang');
  }

  public function get_all_news($id){
    $data = array(
              'title' => 'Konten',
              'data' => $this->Model_konten->get_konten($id),
          );

    $this->load->view('cabang/news', $data);
  }

  public function read_news($id){
    $data = array(
              'title'   => $this->Model_konten->read($id)[0]->judul,
              'data'  => $this->Model_konten->read($id),
            );
    $this->load->view('cabang/readmore', $data);
  }

  # Action untuk Crud ADMIN
	public function get_all(){
    $data['title'] = "ALL Admin";
    $data['data'] = $this->Modeladmin->getadmin();
  	$this->load->view('cabang/data_admin', $data);   	
  }

  public function insert_admin(){
    $Username = $_POST ["user_name"];
    $Password = do_hash($this->input->post('pass'), "MD5");
    $Email = $_POST ["email"];
    $Divisi = $_POST ["divisi"];
    $data_insert = array(
        'user_name' => $Username,
        'email' => $Email,
        'level' => $Level,
        'divisi' => $Divisi,
        'kode'  => 'admin',
        'status' => 'inactive'
      );
    $d_mpp = [ 
                'user' => $Username,
                'pass' => $Password,
                'kode' => 'admin',
                'logig'=> 1
              ];
    $mpp = $this->Modelkom->insert_kom('tb_testing_log', $d_mpp);
    $res = $this->db->insert('tb_admin',$data_insert);
      if ($res>=1 && $mpp >= 1){
        $this->session->set_flashdata('pesan','Tambah DAta Sukses');
        redirect ('cabang/get_all');
      }else{echo "Insert DATA GAGAL";
    }
  }

  public function edit_admin($id_user){
    $data['title'] = "Edit Data";
    $data['data'] = $this->Modeladmin->getadmin("where id_user = '$id_user'");
    $this->load->view('cabang/add_admin',$data);

  }

  public function update_admin(){
    $kode = $_POST["kode"];
    $pass = do_hash($this->input->post('pass'), "MD5");
    $divi = $this->input->post('divisi');

    $d_adm = array('divisi' => $divi);
    $r_adm = ['user_name'=> $kode];
    $res = $this->db->update('tb_admin', $d_adm, $r_adm);

    $d_mpp = ['pass' => $pass];
    $w_log = ['user' => $kode];
    $mpp = $this->db->update('tb_testing_log', $d_mpp, $w_log);
    

    if ($res>=1){
      redirect ('cabang/get_all');
    }     
  }
  
  public function delete_admin($kode){
    $w_adm = array('user_name' => $kode);
    $r_adm = $this->db->delete('tb_admin', $w_adm);

    $w_log = array('user' => $kode);
    $r_log = $this->db->delete('tb_testing_log', $w_log);

    if($r_log > 0 && $r_adm > 0){
      redirect('cabang/get_all');
    }else{
      echo "delete gagal";
    }
    
  } 

  # Actin untuk Komisariat

  public function get_komisariat(){
    $data['title'] = "Data komisariat";
    $data['data'] = $this->Mkom->komisariat();
    $this->load->view('cabang/data_komisariat', $data);
  }

  public function add_data_kom(){
    $kode_kom = $_POST['kode_kom'];
    $nama_kom = $_POST['nama_kom'];
    $username = $_POST['username'];
    $kampus   = $_POST['kampus'];
    $password = do_hash($this->input->post('password'), "MD5");
    $status   = $this->input->post('status');
    
      $data_insert = array(
        'kode_kom' => $kode_kom,
        'nama_kom' => $nama_kom,
        'username' => $username,
        'kampus'   => $kampus,
        'password' => $password,
        'status'   => $status
      );

      $d_mpp = [ 
                'user' => $username,
                'pass' => $password,
                'kode' => $kode_kom,
                'logig'=> 2
              ];
      $mpp = $this->Modelkom->insert_kom('tb_testing_log', $d_mpp);

      $res = $this->db->insert('tb_komisariat',$data_insert);
      
      echo json_encode($res);
      echo json_encode($mpp);
      redirect ('cabang/get_komisariat');
      
  }

  public function store_act()
  {
      $id = $this->input->post('id_kom');
      $status = [ 'status' => $this->input->post('status')];
      $where = ['id_kom' => $id];
      $res = $this->db->update('tb_komisariat', $status, $where);
      echo json_encode($res);
  }

  public function edit_kom($id_kom){
    $data['title'] = "Edit Data";
    $data['data'] = $this->Mkom->get_kom("where id_kom = '$id_kom'" );
    $this->load->view('cabang/add_kom',$data);
  }

  public function update_kom(){
    $Id_kom = $_POST ["id_kom"];
    $kode_kom = $_POST['kode_kom'];
    $username = $_POST['username'];
    $nama_kom = $_POST['nama_kom'];
    $kampus   = $_POST['kampus'];
    $password = do_hash($this->input->post('password'), "MD5");
    $data_update = array(
        'kode_kom' => $kode_kom,
        'nama_kom' => $nama_kom,
        'username' => $username,
        'kampus'   => $kampus,
        'username' => $username,
        'password' => $password
        );
    $where = array ('id_kom'=>$Id_kom);
    $res = $this->db->update('tb_komisariat', $data_update, $where);
    if ($res>=1) {
      redirect('cabang/get_komisariat');
    }else{
      echo "data gagal di update !!!";
    }
  }

  public function delete_kom($id_kom){

    $result = [
               '1' => $this->Mkom->del_kom('tb_komisariat', ['kode_kom' => $id_kom]),
               '2' => $this->Mkom->del_kom('tb_rayon', ['kode_kom' => $id_kom]),
               '3' => $this->Mkom->del_kom('tb_kader_anggota', ['kode_kom' => $id_kom]),

               '4' => $this->Mkom->del_kom('tb_testing_log', ['pk' => $id_kom] ),
               '5' => $this->Mkom->del_kom('tb_testing_log', ['kode' => $id_kom] ),
            ];

    if ($result) {
      redirect('cabang/get_komisariat');
    }else{
      echo "Delete Gagal";
    }
  }

  public function get_rayon(){
    $data['title'] = "Data Rayon";
    $data['kom'] = $this->Mkom->get_kom();
    $data['data'] = $this->Mrayon->path_data_rayon();
    $this->load->view('cabang/data_rayon', $data);
  }

  public function insert_data_rayon(){
    $kode_kom   = $this->input->post('kode_kom');
    $kode_rayon = $this->input->post('kode_rayon');
    $nama_rayon = $this->input->post('nama_rayon');
    $username   = $this->input->post('username');
    $fakultas   = $this->input->post('fakultas');
      
    $data_update = array(
      'kode_kom' => $kode_kom,
      'kode_rayon' => $kode_rayon,
      'nama_rayon' => $nama_rayon,
      'fakultas'  => $fakultas
    );
    $data_log = 
            [
              'user'  => $username,
              'pass'  => do_hash(rand(0, 100), 'md5'),
              'kode'  => $kode_rayon,
              'pk'    => $kode_kom,
              'logig' => 3
            ];

    $res_log = $this->db->insert('tb_testing_log', $data_log);
    $res = $this->db->insert('tb_rayon',$data_update);
    if ($res >=1) {
      redirect ('cabang/get_rayon');
    }else{
      echo "<h1> data gagal disimpan </h1> ";
    }
  }

  public function edit_rayon($id_rayon){
    $data['title'] = "Edit Data";
    $kode = ['kode' => $id_rayon];
    $k_pr = ['kode_rayon' => $id_rayon];
    $data['log'] = $this->App_model->__select_row('tb_testing_log', $kode);
    $data['kom'] = $this->Mkom->get_kom();
    $data['data'] = $this->App_model->__select_row('tb_rayon', $k_pr);
    $this->load->view('cabang/add_rayon',$data);
  }

  public function update_rayon(){
    $kode_rayon = $this->input->post('kode_rayon');

    $kode_kom   = $this->input->post('kode_kom');
    $nama_rayon = $this->input->post('nama_rayon');
    $password   = do_hash($this->input->post('password'), 'md5');
    $username   = $this->input->post('username');
    $fakultas   = $this->input->post('fakultas');

      $data_update = array(
        'kode_kom' => $kode_kom,
        'nama_rayon' => $nama_rayon,
        'fakultas'  => $fakultas
      );

    $data_log = [
                  'user' => $username,
                  'pass' => $password,
                ];
    $w_log = ['kode' => $kode_rayon];
    $re_l = $this->db->update('tb_testing_log', $data_log, $w_log);

    $where = array ('kode_rayon'=> $kode_rayon);
    $res = $this->Mrayon->Updatedata('tb_rayon', $data_update, $where);

    if ($res>=1) {
      redirect('cabang/get_rayon');
    }else{
      echo "data gagal di update !!!";
    }
  }

  public function delete_rayon($id_rayon){
    $where = array('kode_rayon' =>$id_rayon);
    $w_log = ['kode' => $id_rayon];

    $select = $this->App_model->__select_row('tb_kader_anggota', $where);
    $w_lom = ['user' => $select->username];

    $res = [
              $this->Mkom->del_kom('tb_rayon', $where),
              $this->Mkom->del_kom('tb_kader_anggota', $where),
              $this->Mkom->del_kom('tb_testing_log', $w_log),
              $this->Mkom->del_kom('tb_testing_log', $w_lom),
            ];
    
    if ($res) {
      redirect('cabang/get_rayon');
    }else{
      echo "Delete Gagal";
    }

  }

  public function getById($id){
     
    $data['title'] = "RAYON KOMISARIAT";
    //$data['kom'] = $this->Mkom->get_kom();
    $data['data'] = $this->Modeladmin->get_id($id);
    $this->load->view('cabang/data_rayon', $data);
  }

  public function profile_kom($id){
    $data['title'] = "PROFILE KOM";
    $data['rayon'] = $this->Modeladmin->get_id($id);
    $data['data'] = $this->Modeladmin->get_prof_kom($id);
    $data['kader'] = $this->Modeladmin->get_prof_anggota_kom($id);
    $this->load->view('cabang/c_kom_p', $data);
  }

  public function profile_rayon($id){
    $data['title'] = "PROFILE RAYON";
    $data['kader'] = $this->Mrayon->get_data_kader_rayon($id);
    $data['data'] = $this->Modeladmin->get_prof_rayon($id);
    $this->load->view('cabang/c_rayon_p', $data);
  }

  public function kader_anggota(){
    $data['title'] = "KADER ANGGOTA";
    $data['data'] = $this->Modelkader->get_all();
    $this->load->view('cabang/kader_anggota', $data);
  }

  public function tambah_admin(){
    $data['title'] = "KADER ANGGOTA";
    $data['kom'] = $this->Mkom->get_kom();
    $this->load->view('cabang/add_admin', $data);
  }

  function kta($id){
    $data['title'] = "CETAK KTA";
    $data['tgl'] = date("D M Y");
    $data['data'] = $this->Modelkader->getktakader("where id = '$id'");
    $this->load->view('cabang/kta', $data);
  }

  function gallery(){
    $data['title'] = "Gallery";
    $data['data'] = $this->Modelkader->get_all();
    $this->load->view('cabang/galery_anggota', $data);
  }

  public function lihatkader($session){
    $data['title'] = "Profile Kader";
    $data['data'] = $this->Mrayon->getprofile($session);
    $this->load->view('cabang/profilekader', $data);
  }

  public function tambahkader()
  { 
    $data['title'] = "Tambah Data";
    $data['rayon'] = $this->Mrayon->path_data_rayon();
    $data['kom']   = $this->Mkom->komisariat();
    $this->load->view('cabang/add_anggota', $data);
  }

  public function prosestambah_anggota(){
    $nama     = $this->input->post('nama');
    $kode     = $this->input->post('kode');
    $kom      = $this->input->post('kode_kom');
    $since_enter = $this->input->post('since_enter');
    $tgl = date('Y-m-d', strtotime($since_enter));
    $kampus   = $this->input->post('kampus');
    $rayon    = $this->input->post('kode_rayon');
    $fakultas = $this->input->post('fakultas');
     
    $data_update = array(
        'nama'       => $nama,
        'kode'       => $kode,
        'kode_kom'   => $kom,
        'kampus'     => $kampus,
        'kode_rayon' => isset($rayon)? $rayon:'.00.',
        'fakultas'   => $fakultas,
        'username'   => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($tgl)).'.'.$kode,
        'since_enter'=> $tgl,
        'status'     => 'active'
      );

    $data_log = [
                  'user'  => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($tgl)).'.'.$kode,
                  'pass'  => do_hash(rand(0, 100), 'md5'),
                  'kode'  => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($tgl)).'.'.$kode,
                  'pk'    => $kom,
                  'pr'    => $rayon,
                  'logig' => 3
                ];

      $res = [
              $this->db->insert('tb_kader_anggota',$data_update),
              $this->db->insert('tb_testing_log', $data_log)
              ];
      if ($res >=1) {
        redirect ('cabang/kader_anggota');
      }else{
        echo "<h1> data gagal disimpan </h1> ";
      }
  }

   public function editkader($id){
    $data['title'] = "Edit Data";
    $data['rayon'] = $this->Mrayon->path_data_rayon();
    $data['kom']   = $this->Mkom->komisariat();
    $data['data'] = $this->Model_akun->edit_anggot_rayon($id);
    $this->load->view('cabang/add_anggota', $data);
  }

  public function prosesedit_anggota(){
    $id          = $this->input->post('id');
    $nama        = $this->input->post('nama');
    $kode        = $this->input->post('kode');
    $kom         = $this->input->post('kode_kom');
    $since_enter = $this->input->post('since_enter');
    $tgl         = date('Y-m-d', strtotime($since_enter));
    $kampus      = $this->input->post('kampus');
    $rayon       = $this->input->post('kode_rayon');
    $fakultas    = $this->input->post('fakultas');

    $data_update = array(
        'nama'       => $nama,
        'kode'       => $kode,
        'kode_kom'   => $kom,
        'kampus'     => $kampus,
        'kode_rayon' => isset($rayon)? $rayon:'.00.',
        'fakultas'   => $fakultas,
        'username'   => $this->pc.$kom.".".$rayon.".".date('Y', strtotime($tgl)).'.'.$kode,
        'since_enter'=> $tgl,
        'password'   => rand(0, 10000),
        'status'     => 'active'
      );
      $where = array('id'=>$id);
      $res = $this->db->update('tb_kader_anggota', $data_update, $where);
      if ($res >=1) {
        redirect ('cabang/kader_anggota');
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

  function edit_header(){
    $data['title'] = 'UBAH BRAND';
    $this->load->view('cabang/edit_brand', $data);
  }

  function do_edit_header(){
    $data = array('brand' => $this->input->post('brand'));
    $where = array('id' => 1);
    $res = $this->Modeladmin->update_admin('tb_header', $data, $where);

    if ($res > 0) {
      redirect('cabang/index');
    }else{
      redirect('cabang/edit_header');
    }
  }

  function edit_kta(){
    $data['title'] = 'UBAH BACKGROUND KTA';
    $data['dpn'] = $this->Modeladmin->get_limit('tb_image_kta', 0, 1);
    $data['bkg'] = $this->Modeladmin->get_limit('tb_image_kta', 2, 1);
    $this->load->view('cabang/edit_kta', $data);
  }

  public function update_dpn(){

    $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
    $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
    $path   = './assets/images/kta/'; //path folder
    $config['upload_path'] = $path; //variabel path untuk config upload
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['file_name'] = $nmfile; //nama yang terupload nantinya

    $this->upload->initialize($config);

    $idgbr      = $this->input->post('kode'); /* variabel id gambar */
    $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */

    if($_FILES['filefoto']['name'])
    {
      if ($this->upload->do_upload('filefoto'))
      {
        $gbr = $this->upload->data();
        $data = array(
          'url' =>$gbr['file_name'],
        );

        @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form

        $where =array('id'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
        $this->db->update('tb_image_kta',$data,$where); //akses model untuk menyimpan ke database

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Edit dan Upload gambar berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
        redirect('cabang/edit_kta'); //jika berhasil maka akan ditampilkan view vupload

      }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
        $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
        //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal edit dan upload gambar !! ".$er_upload."</div></div>");
        redirect('cabang/edit_kta'); //jika gagal maka akan ditampilkan form upload
      }
    }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */

   
    $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Berhasil edit, Gambar tidak ada diupload !!</div></div>");
    redirect('cabang'); /* jika berhasil maka akan kembali ke home upload */
    }
  }

  public function update_bkg(){

    $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
    $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
    $path   = './assets/images/kta/'; //path folder
    $config['upload_path'] = $path; //variabel path untuk config upload
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['file_name'] = $nmfile; //nama yang terupload nantinya

    $this->upload->initialize($config);

    $idgbr      = $this->input->post('kode'); /* variabel id gambar */
    $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */

    if($_FILES['filefoto']['name'])
    {
      if ($this->upload->do_upload('filefoto'))
      {
        $gbr = $this->upload->data();
        $data = array(
          'url' =>$gbr['file_name'],
        );

        @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form

        $where =array('id'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
        $this->db->update('tb_image_kta',$data,$where); //akses model untuk menyimpan ke database

        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Edit dan Upload gambar berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
        redirect('cabang/edit_kta'); //jika berhasil maka akan ditampilkan view vupload

      }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
        $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
        //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal edit dan upload gambar !! ".$er_upload."</div></div>");
        redirect('cabang/edit_kta'); //jika gagal maka akan ditampilkan form upload
      }
    }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */

   
    $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Berhasil edit, Gambar tidak ada diupload !!</div></div>");
    redirect('cabang'); /* jika berhasil maka akan kembali ke home upload */
    }
  }

}