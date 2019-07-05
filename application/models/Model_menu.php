<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

 	public function menu_kom(){
 		$query = "SELECT nama_kom FROM tb_komisariat";
 		$data = $this->db->query($query);
	 	return $data->result_array(); 
	}

	public function menu_rayon(){
 		$query = "SELECT nama_rayon FROM tb_rayon";
 		$data = $this->db->query($query);
	 	return $data->result_array(); 
	}

  public function get_header(){
    $data = $this->db->get('tb_header', 1);
    return $data->row();
  }

  public function global_edit($tabel, $no='', $val)
  {
    return $this->db->update($tabel, $no, $val);
  }

	public function get_kader($select){
  		$query = "SELECT tb_kader_anggota.nama, tb_kader_anggota.organisasi, tb_rayon.nama_rayon 
                FROM tb_kader_anggota JOIN tb_rayon 
                ON tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon 
                WHERE tb_kader_anggota.st_pr = 'ya' AND tb_kader_anggota.kode_rayon = '$select'";
  		$data = $this->db->sql($query);
  		return $data->result_array();
  	}

  	function hitungkom()
  	{
  		$sql = "SELECT count( id_kom ) AS jumlah 
  				FROM tb_komisariat ";
  		$data = $this->db->query($sql);
  		if ($data->num_rows() > 0) {
  			return $data;
  		}else{
  			return false;
  		}
  	}

	function hitungpr()
  	{
  		$sql = "SELECT count( id_rayon ) AS jumlah 
  				FROM tb_rayon ";
  		$data = $this->db->query($sql);
  		if ($data->num_rows() > 0) {
  			return $data;
  		}else{
  			return false;
  		}
  	}  

  	function hitungkader()	
  	{
  		$sql = "SELECT count( id ) AS jumlah 
  				FROM tb_kader_anggota ";
  		$data = $this->db->query($sql);
  		if ($data->num_rows() > 0) {
  			return $data;
  		}else{
  			return false;
  		}
  	}

  	function jmlkader_rayon_kom($select)
  	{
  		$sql = "SELECT COUNT( tb_rayon.kode_kom ) as jml
				FROM tb_komisariat
				JOIN tb_rayon 
				ON tb_komisariat.kode_kom = tb_rayon.kode_kom 
				where tb_rayon.kode_kom = '$select'";
  		$data = $this->db->query($sql);
  		if ($data->num_rows() > 0) {
  			return $data;
  		}else{
  			return false;
  		}
  	}

    public function jmlkader_komisariat($select)
    {
      $sql = "SELECT COUNT( tb_kader_anggota.kode_rayon ) as jml
        FROM tb_kader_anggota 
        JOIN tb_komisariat
        ON tb_komisariat.kode_kom = tb_kader_anggota.kode_kom 
        where tb_kader_anggota.kode_kom = '$select'";
      $data = $this->db->query($sql);
      if ($data->num_rows() > 0) {
        return $data;
      }else{
        return false;
      }

    }

  	public function jmlkader_rayon($select)
  	{
  		$sql = "SELECT COUNT( tb_kader_anggota.kode_rayon ) as jml
				FROM tb_rayon
				JOIN tb_kader_anggota 
				ON tb_rayon.kode_rayon = tb_kader_anggota.kode_rayon 
				where tb_kader_anggota.kode_rayon = '$select'";
  		$data = $this->db->query($sql);
  		if ($data->num_rows() > 0) {
  			return $data;
  		}else{
  			return false;
  		}

  	}

}
