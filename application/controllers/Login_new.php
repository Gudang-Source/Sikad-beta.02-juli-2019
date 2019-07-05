<?php 
/**
 * 
 */
class Login_new extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->cname = 'dashboard';
	    $this->cpc = 'cabang';
	    $this->ckom = 'komisariat';
	    $this->crayon = 'rayon';
	    $this->cmember = 'member';
	}

	public function login_global()
	{
	    if(isset($_POST['login']))
	    {
	      $datas = $this->Model_akun->get_val_gol();
	      var_dump($datas);
	      if ($datas->logig == 2) {
	      	$kode = ['kode_kom' => $datas->kode];
		    $result = $this->db->get_where('tb_komisariat', $kode)->result_array();
		        foreach ($result as $list) {
		          $r = array();
		          $r['username']    = $list['username'];
		          $r['nama_kom']    = $list['nama_kom'];
		          $r['kode_kom']    = $list['kode_kom'];
		          $r['kampus']      = $list['kampus'];
		          $this->session->set_userdata($r);
	        	}
	        	redirect($this->ckom);
	      }elseif ($datas->logig == 3) {
	      	$kode = ['kode_rayon' => $datas->kode];
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
	        
	        redirect($this->crayon);
	      }elseif ($datas->logig == 4) {
	      	$kode = ['username' => $datas->kode];
	      	$result = $this->db->get_where('tb_kader_anggota');
	      	foreach ($data as $list) {
	            $r = array();
	            $r['id']          = $list['id'];
	            $r['foto']        = $list['foto'];
	            $r['username']    = $list['username'];
	            $r['nama']        = $list['nama'];
	            $r['kode_kom']    = $list['kode_kom'];
	            $r['kode_rayon']  = $list['kode_rayon'];
	            $this->session->set_userdata($r);
	          }  
	          
	          redirect($this->cmember);
	      }else{
	      	echo "Keliru";
	      }

	 	}

	}


}	 