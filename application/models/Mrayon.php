<?php


class Mrayon extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Updatedata($tabelName, $data, $where){
		$res = $this->db->update($tabelName, $data, $where);
		return $res;
	}

	public function path_all($where=""){
		$data = $this->db->get('tb_rayon ' .$where);
		return $data->result_array();
	}

	public function path_data_rayon(){
		$this->db->select('tb_rayon.*, tb_komisariat.nama_kom');
		$this->db->select('tb_testing_log.user as p, tb_testing_log.pass as p');
		$this->db->from('tb_testing_log');
		$this->db->join('tb_rayon', 'tb_testing_log.kode = tb_rayon.kode_rayon');
		$this->db->join('tb_komisariat', 'tb_rayon.kode_kom = tb_komisariat.kode_kom');
		$this->db->order_by('tb_rayon.nama_rayon', 'ASC');
		
		$data = $this->db->get();
		//$data = $this->db->get('tb_rayon', 'tb_komisariat');
		return $data->result_array();
	}

	public function update_rayon($table,$data,$where){
	    $res = $this->db->update($table,$data,$where);
	    return $res;
  	}

  	public function get_data_kader_rayon($id){
		$query = "SELECT * FROM tb_rayon join tb_kader_anggota where tb_rayon.kode_rayon = '$id' 
		and 
		tb_kader_anggota.kode_rayon = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function datakaderrayon($id){
		$this->db->select('tb_komisariat.*, tb_rayon.*, tb_kader_anggota.*');
		$this->db->from('tb_kader_anggota');
		$this->db->where('tb_kader_anggota.kode_rayon', $id);
		$this->db->join('tb_rayon', 'tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon');
		$this->db->join('tb_komisariat', 'tb_komisariat.kode_kom = tb_kader_anggota.kode_kom');
		$this->db->order_by('tb_kader_anggota.nama', 'ASC');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getkader($id){
		$this->db->select('*');
		$this->db->from('tb_kader_anggota');
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getprofile($id){
		$q = "SELECT tb_komisariat.*, tb_rayon.*, tb_kader_anggota.*
			 FROM tb_komisariat 
			 JOIN tb_rayon ON tb_komisariat.kode_kom = tb_rayon.kode_kom
			 JOIN tb_kader_anggota ON tb_rayon.kode_rayon = tb_kader_anggota.kode_rayon
			 WHERE tb_kader_anggota.id = '$id'";
		$data = $this->db->query($q);
		return $data->result_array();
	}

	public function count_all(){
		$data = $this->db->get('tb_kader_anggota')->num_rows();
		return $data;
	}
}