<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelkader extends CI_Model {

 	public function get_all(){
 		$data = $this->db->get('tb_kader_anggota');
	 	return $data->result_array(); 
	}

	public function getktakader($where = ""){
		$data = $this->db->get('tb_kader_anggota, tb_komisariat, tb_rayon ' .$where);
		return $data->result_array();
	}

	public function get_kader($select){
  		$query = "SELECT tb_kader_anggota.nama, tb_kader_anggota.organisasi, tb_rayon.nama_rayon 
  				FROM tb_kader_anggota JOIN tb_rayon 
  				ON tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon 
  				WHERE tb_kader_anggota.st_pr = 'ya' AND tb_kader_anggota.kode_rayon = '$select'";
  		$data = $this->db->sql($query);
  		return $data->result_array();
  	}

  	public function getrayon_anggota($select){
  		$query = "SELECT * FROM tb_komisariat 
  					JOIN tb_rayon ON tb_komisariat.kode_kom = tb_rayon.kode_kom
					JOIN tb_kader_anggota on tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon
					WHERE tb_kader_anggota.kode_rayon = '$select'
					";

		$data = $this->db->query($query);
		return $data->result_array();
  	}

}
