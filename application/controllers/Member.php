<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  private $pmii = ' PMII KOTA MALANG ';

  public function __construct(){
    parent::__construct();
    $this->load->library('Fpdf');
    $this->load->model('M_konten');
    $this->load->model('Model_konten');
    
    if(! $this->session->has_userdata('nama') && !$this->session->has_userdata('kode'))
    {
      $this->session->set_flashdata("msg", "<div class='modal fade' id='myModal'><div class='modal-dialog'><div class='alert alert-danger'><h2 class='form-signin-heading'>OJOK MEKSO, LOGIN RUMIYEN!!!</h2></div></div><button type='button' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-close'></span> Close</button></div><script type='text/javascript'>$('#myModal').modal('show');</script>");
      redirect('dashboard', 'refresh');
    }
    
  }

  public function index()
  {
    $id = $this->session->userdata('username');
    $rayon = $this->session->userdata('kode_rayon');
    $kom = $this->session->userdata('kode_kom');
    $data = array(
            'title' => $this->session->userdata('nama'),
            'id' => $id,
            'month_yeer' => $this->M_konten->month_yeer(),
            'data' => $this->Model_konten->getKonten($rayon, $kom)
          );
    $this->load->view('member/index', $data);
  }

  public function myconten()
  {
    $id = $this->session->userdata('username');
    $data = array(
            'title' => $this->session->userdata('nama'),
            'id' => $id,
            'categori' => $this->M_konten->get_all_categori($id),
            'month_yeer' => $this->M_konten->month_yeer(),
            'data' => $this->M_konten->getContenMember($id)
          );
    $this->load->view('member/myconten', $data);
  }

  public function showdata(){

    // if ($this->input->post()) {
      $month = $this->input->post('month');
      $year = $this->input->post('year');
    // }else{
    //   $month = date('m');
    //   $year = date('Y');
    // }

    $id = $this->session->userdata('username');
    $data = array(
            'title' => $this->session->userdata('nama'),
            'id' => $id,
            'categori' => $this->M_konten->get_all_categori($id),
            'month_yeer' => $this->M_konten->month_yeer(),
            'data' => $this->M_konten->get_on_days($id, $month, $year)
          );
    $this->load->view('member/myconten', $data);
  }

  public function showcategori($cate)
  {
    $id = $this->session->userdata('username');
    $data = array(
            'title' => $this->session->userdata('nama'),
            'id' => $id,
            'categori' => $this->M_konten->get_all_categori($id),
            'month_yeer' => $this->M_konten->month_yeer(),
            'data' => $this->M_konten->get_conten_categori($id, $cate)
          );
    $this->load->view('member/myconten', $data);
  }

  public function readmore($id){
     $data = array(
            'title' => $this->session->userdata('nama'),
            'data' => $this->M_konten->get_one($id)
          );
    $this->load->view('member/read', $data);
    // var_dump($data['data']);
  }

  public function create_konten(){
    $id = $this->session->userdata('nama');
    $data = array(
                  'title' => $id, 
                  'kategori' => $this->M_konten->kategori()
                );
    $this->load->view('member/create', $data);
  }

  public function post_data(){
    $to_konten    = $this->input->post('to_konten');
    $id_kategori  = $this->input->post('id_kategori');
    $id_pengurus  = $this->input->post('id_pengurus');
    $judul        = $this->input->post('judul');
    $isi          = $this->input->post('posting');

    $data = array(
            'id_kader'    => $this->session->userdata('username'),
            'id_kom'      => $this->session->userdata('kode_kom'),
            'id_rayon'    => $this->session->userdata('kode_rayon'),
            'to_konten'   => $to_konten,
            'judul'       => $judul,
            'posting'     => $isi,
            'id_kategori' => $id_kategori,
            'id_pengurus' => $id_pengurus,
            'gambar'      => rand(0, 100)
          );

    $insert = $this->M_konten->create('tb_konten', $data);
    if ($insert > 0) {
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Posting berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
      redirect('member/myconten');
    }else{
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload Berita !! </div></div>");
      redirect('member/create_konten'); 
    }
  }

  public function edit($id){

     $data = array(
            'title' => $this->session->userdata('nama'),
            'data' => $this->M_konten->get_one($id),
            'kategori' => $this->M_konten->kategori()
          );
    $this->load->view('member/create', $data);
    // var_dump($data['data']);
  }

  public function edit_data(){
    $id_konten    = $this->input->post('id_konten');
    $to_konten    = $this->input->post('to_konten');
    $id_kategori  = $this->input->post('id_kategori');
    $id_pengurus  = $this->input->post('id_pengurus');
    $judul        = $this->input->post('judul');
    $isi          = $this->input->post('posting');

    $data = array(
            'id_kader'    => $this->session->userdata('username'),
            'id_kom'      => $this->session->userdata('kode_kom'),
            'id_rayon'    => $this->session->userdata('kode_rayon'),
            'to_konten'   => $to_konten,
            'judul'       => $judul,
            'tanggal'     => date('Y-m-d H:i:s'),
            'posting'     => $isi,
            'id_kategori' => $id_kategori,
            'id_pengurus' => $id_pengurus,
            'gambar'      => rand(0, 100)
          );
    $where = array('id_konten' => $id_konten );
    $insert = $this->M_konten->update('tb_konten', $data, $where);
    if ($insert > 0) {
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Posting berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
      redirect('member/myconten');
    }else{
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload Berita !! </div></div>");
      redirect('member/create_konten'); 
    }
  }

  function delete_konten($id){
    $where = array('id_konten'=>$id);
    $res = $this->M_konten->delete_knt('tb_konten',$where); 
    if ($res > 0) {
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Posting berhasil dihapus!!</div></div>");
      redirect('member');
    }else{
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Hapus Berita !! </div></div>");
      redirect('member');
    }
  }

  public function profile(){
    
    $data = array(
              'title' => $this->session->userdata('nama'),
              'data'  => $this->Model_akun->get_member($this->session->userdata('username'))
            );
    $this->load->view('member/profile', $data);
  }

  public function editprofile()
  {
    $session = $this->session->userdata('username');
    $nama = $this->session->userdata('nama');
    
    $data = array(
      'title' => $nama,
      'data' => $this->Model_akun->get_member($session)
    );
    $this->load->view('member/editprofile', $data);
  }

  public function proses_edit()
  {
    $this->load->library('ciqrcode');

    $id = $this->input->post('id');
    $jk = $this->input->post('jk');
    $fak = $this->input->post('fakultas');
    $jur = $this->input->post('jurusan');
    $nama = $this->input->post('nama');
    $nim = $this->input->post('nim');
    $email = $this->input->post('email');
    $blog = $this->input->post('blog');
    $fb = $this->input->post('fb');
    $tw = $this->input->post('tw');
    $ig = $this->input->post('ig');
    $lahir = $this->input->post('lahir');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $tgl = date('Y-m-d', strtotime($tgl_lahir));
    $asal = $this->input->post('alamat_asal');
    $dimalang = $this->input->post('alamat_malang');
    $ayah = $this->input->post('ayah');
    $ibu = $this->input->post('ibu');
    $tlp_ortu = $this->input->post('tlp_ortu');
    $alamat_ortu = $this->input->post('alamat_ortu');
    $motto = $this->input->post('motto');
    $alasan = $this->input->post('alasan');
    $organisasi = $this->input->post('organisasi');
    $bakat = $this->input->post('bakat');
    $minat = $this->input->post('minat');

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '720'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $image_name = $nama.'.png'; //buat name dari qr code sesuai dengan nim

    $params['data'] = $nama.$this->pmii ; //data yang akan di jadikan QR CODE
    $params['level'] = 'M'; //H=High
    $params['size'] = 10;
    $params['savename'] = $config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/

    $update_data = array(
          'jk'            => $jk,
          'jurusan'       => $jur,
          'fakultas'      => $fak,
          'nama'          => $nama,
          'nim'           => $nim,
          'email'         => $email,
          'blog'          => $blog,
          'fb'            => $fb,
          'tw'            => $tw,
          'ig'            => $ig,
          'lahir'         => $lahir,
          'tgl_lahir'     => $tgl,
          'alamat_asal'   => $asal,
          'alamat_malang' => $dimalang,
          'ayah'          => $ayah,
          'ibu'           => $ibu,
          'tlp_ortu'      => $tlp_ortu,
          'alamat_ortu'   => $alamat_ortu,
          'motto'         => $motto,
          'alasan'        => $alasan,
          'organisasi'    => $organisasi,
          'bakat'         => $bakat,
          'minat'         => $minat,
          'qrcode'     => $this->ciqrcode->generate($params),
      );

    $where = array ('id' => $id);
    $res = $this->db->update('tb_kader_anggota', $update_data, $where);
    if ($res >= 1) {
      redirect('member/profile');
    }
  }

  public function setting()
  {
    $session = $this->session->userdata('username');
    $nama = $this->session->userdata('nama');
    $data['title'] = $nama;
    $data['data'] = $this->Model_akun->get_member($session);
    $this->load->view('member/setting', $data);
  }

  public function prosessetting()
  {
    $id = $this->input->post('id');
    $password = $this->input->post('password');

    $update_data = array(
          'password'      => $password
      );

    $where = array ('id' => $id);
    $res = $this->db->update('tb_kader_anggota', $update_data, $where);
    if ($res >= 1) {
      redirect('member');
    }
  }  

  public function editfoto(){
    $nama = $this->session->userdata('nama');
    $session = $this->session->userdata('username');
    $data['title'] = "Kader ".$nama;
    $data['data'] = $this->Model_akun->get_member($session);
    
    $this->load->view('member/feupload', $data);
  }

//untuk menangani proses upload gambar yang di edit
public function updatefoto(){

  $this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
  $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
  $path   = './assets/foto/'; //path folder
  $config['upload_path'] = $path; //variabel path untuk config upload
  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
  $config['max_size'] = '3000'; //maksimum besar file 2M
  $config['max_width']  = '4288'; //lebar maksimum 1288 px
  $config['max_height']  = '1968'; //tinggi maksimu 768 px
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
        'foto' =>$gbr['file_name'],
      );

      @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form

      $where =array('id'=>$idgbr); //array where query sebagai identitas pada saat query dijalankan
      $this->db->update('tb_kader_anggota',$data,$where); //akses model untuk menyimpan ke database

      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Edit dan Upload gambar berhasil !!</div></div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
      redirect('member/profile'); //jika berhasil maka akan ditampilkan view vupload

    }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
      $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
      //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal edit dan upload gambar !! ".$er_upload."</div></div>");
      redirect('member/editfoto'); //jika gagal maka akan ditampilkan form upload
    }
  }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */

   
    $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Berhasil edit, Gambar tidak ada diupload !!</div></div>");
    redirect('member'); /* jika berhasil maka akan kembali ke home upload */
    }
  }

  function cpdf()
  {
    $fpdf = new FPDF('P','cm','A4');
    $dpn = $this->Modeladmin->get_limit('tb_image_kta', 0, 1);
    $bkg = $this->Modeladmin->get_limit('tb_image_kta', 2, 1);
    $session = $this->session->userdata('username');
   
    $data = $this->Model_akun->get_member($session); 

    $this->fpdf->AddPage();
    $this->fpdf->SetFont('Arial','',10);
    $this->fpdf->Ln(3);

    foreach ($data as $key) {
      // tampak belakang
      // $this->fpdf->Image('assets/images/kta/'.$dpn->url, 80, 15, 110, 80);
      // tampak depan
      // $this->fpdf->Image('assets/images/kta/'.$bkg->url, 20, 35, 75, 40);
      // $this->fpdf->Ln();
      // $this->fpdf->Image(($key['foto'])? 'assets/foto/'.$key['foto'] : 'assets/images/logo/user.png', 100, 45, 50, 30);

      $this->fpdf->SetFont('Arial', '', 8);
      
      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'NIK', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['username'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'NAMA', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['nama'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Alamat', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['lahir'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'TTL', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['lahir'].' '.date('d-m-Y', strtotime($key['tgl_lahir'])), 0,1, 'L');
      
      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Rayon', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['kode_rayon'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Komisariat', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['kode_kom'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Kampus', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['kampus'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Fak/Prodi', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['fakultas'], 0,1, 'L');

      $this->fpdf->Cell(10, 5, '', 0, 0, 'L');
      $this->fpdf->Cell(20, 5, 'Jurusan', 0, 0, 'L');
      $this->fpdf->Cell(3.5, 5, ': '.$key['jurusan'], 0,1, 'L');

    }



    $this->fpdf->Ln(3);

    $this->fpdf->SetFont('Arial', 'B', 12);

    $this->fpdf->Cell(50, 10, 'No Induk Kader (NIK)', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['username'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'No Induk Mahasiswa ', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['nim'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Nama', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['nama'], 0,1, 'L');    

    $this->fpdf->Cell(50, 10, 'TTL', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['lahir'].' '.date('d-m-Y', strtotime($key['tgl_lahir'])), 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Tanggal Masuk PMII', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['since_enter'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Kampus', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['kampus'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Fak/Prodi ', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['fakultas'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Jurusan', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['jurusan'], 0,1, 'L');

    // 
    $this->fpdf->Cell(50, 10, 'Alamat Asal', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['alamat_asal'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Alamat Di Malang', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['alamat_malang'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Komisariat', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['nama_kom'], 0,1, 'L');

    $this->fpdf->Cell(50, 10, 'Rayon', 0, 0, 'L');
    $this->fpdf->Cell(20, 10, ': '.$key['nama_rayon'], 0,1, 'L');

    $this->fpdf->Image($key['qrcode'], 180, 7, 20, 23);

    if ($this->fpdf->Output()) {
      $this->fpdf->Output();
    }else{
       $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">File Anda belum lengkap! isi biodata dan Upload Foto Anda</div></div>");
      redirect('member');
    }
  }

}