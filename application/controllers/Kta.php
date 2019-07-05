<?php
/**
* kta kader dan anggota kota malang
*/
class Kta extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function print_kta()
	{
		$data['judul'] = "KADER";
		$data['data'] = "mboh";

		$this->load->view('read_kta', $data);
	}
}