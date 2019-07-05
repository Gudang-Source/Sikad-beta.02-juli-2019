<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeladmin extends CI_Model {

	public function get_all($table)
	{
		$data = $this->db->get($table);
		return $data->result();
	}

	public function get_limit($table, $limit=NULL, $offset=NULL){
		$data = $this->db->get($table, $limit, $offset);
		if (is_object($data)) {
			return $data->row();	
		}
	}

 	public function getadmin($where=""){
 		$data = $this->db->query('select * from tb_admin '.$where);
 		return $data->result_array(); 
	}

	public function insert_admin($table_admin,$data){
		$res = $this->db->insert($table_admin,$data);
		return $res;	

	}

	public function update_admin($table_admin,$data, $where){
		$res = $this->db->update($table_admin, $data, $where);
		return $res;	
	
	}

	public function del_admin($table_admin,$data){
		$res = $this->db->delete($table_admin,$data);
		return $res;	

	}

	public function get_id($id){
		$query = "SELECT tb_komisariat.*, tb_rayon.*
				FROM tb_rayon JOIN tb_komisariat 
						ON tb_komisariat.kode_kom = tb_rayon.kode_kom 
					WHERE tb_komisariat.kode_kom = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_prof_kom($id){
		$query = "SELECT * FROM tb_komisariat Where kode_kom = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_prof_rayon($id){
		$query = "SELECT * FROM tb_rayon where kode_rayon = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_prof_anggota_kom($id){
		$query = "SELECT * FROM tb_kader_anggota 
				JOIN tb_komisariat ON tb_kader_anggota.kode_kom = tb_komisariat.kode_kom
				WHERE tb_kader_anggota.kode_kom = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}	

	public function get_prof_anggota_rayon($id){
		$query = "SELECT * FROM tb_kader_anggota 
				JOIN tb_rayon ON tb_rayon.kode_rayon = tb_rayon.kode_rayon 
				WHERE tb_rayon.kode_rayon = '$id'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function ambil_data( $where) 
	{
		$this->db->where($where);
		$data = $this->db->get('tb_kader_anggota');
		return $data->result();
	}

	function getkom()
	{
		$data = $this->db->get('tb_komisariat')->result_array();
		$result = array();
		foreach ($data as $key ) {
			$result[] = array(
				'kode_kom' => $key['kode_kom'],
				'nama_kom' => $key['nama_kom']
			);
		}

		return $result;
	}

	function hitung_asia()
	{
		$this->db->where('kode_kom', 'asia');
		$this->db->from('tb_kader_anggota');
		return $this->db->count_all_results();
	}

	function hitung_ibnu()
	{
		$this->db->where('kode_kom', 'ibnu');
		$this->db->from('tb_kader_anggota');
		return $this->db->count_all_results();
	}
}
