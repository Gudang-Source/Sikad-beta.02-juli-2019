<?php
/**
* for super admin
*/
class Foo_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function aunt_log($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$data = $this->db->get('superadmin');
		if ($data->num_rows() > 0) {
			return $data;
		}else{
			return FALSE;
		}
	}

	public function getadmin()
	{
		$data = $this->db->get('tb_admin');
		return $data->result_array();
	}

	function settingaktifasi($id_user = 0, $data){
		$this->db->where('id_user', $id_user);
		$this->db->update('tb_admin', $data);
	}

	function get_kader(){
		$q = "SELECT tb_komisariat.nama_kom, tb_komisariat.kode_kom, 
			 tb_rayon.nama_rayon, tb_rayon.kode_rayon, tb_kader_anggota.*
			 FROM tb_komisariat 
			 JOIN tb_rayon ON tb_komisariat.kode_kom = tb_rayon.kode_kom
			 JOIN tb_kader_anggota ON tb_rayon.kode_rayon = tb_kader_anggota.kode_rayon
			 order by tb_kader_anggota.nama";
		$data = $this->db->query($q);
		return $data->result_array();
	}

	public function hitrayon($id){
		$hit = "SELECT COUNT(tb_rayon.kode_kom) as jml
				FROM tb_rayon
				JOIN tb_komisariat
				ON tb_komisariat.kode_kom = tb_rayon.kode_kom 
				where tb_rayon.kode_kom = '$id'";
		$data = $this->db->query($hit);
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function hitkaderkom($id){
		$hit = "SELECT COUNT(tb_kader_anggota.kode_kom) as jml
				FROM tb_kader_anggota
				JOIN tb_komisariat
				ON tb_komisariat.kode_kom = tb_kader_anggota.kode_kom 
				where tb_kader_anggota.kode_kom = '$id'";
		$data = $this->db->query($hit);
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function hitkaderrayon($id){
		$hit = "SELECT COUNT(tb_kader_anggota.kode_rayon) as jml
				FROM tb_kader_anggota
				JOIN tb_rayon
				ON tb_rayon.kode_rayon = tb_kader_anggota.kode_rayon
				where tb_kader_anggota.kode_rayon = '$id'";
		$data = $this->db->query($hit);
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function pdf_kader_kom($id=NULL)
	{
		return $this->db->where('kode_kom', $id)->get('tb_kader_anggota')->result();
	}
}
