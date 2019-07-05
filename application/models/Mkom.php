<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkom extends CI_Model {
  
  public function komisariat(){
    $this->db->order_by('nama_kom', 'ASC');
    $this->db->from('tb_komisariat');
    $data = $this->db->get();
    if ($data->num_rows() > 0) {
      return $data->result_array();
    }else{
      return false;
    }
  }
  public function get_kom($where=""){
    $dkom = $this->db->query('select * from tb_komisariat '.$where);
    return $dkom->result_array();
  }

  public function insert_kom(){
  $res = $this->db->insert($table,$data);
  return $res;
  }

  public function update_kom($table,$data,$where){
    $res = $this->db->update($table,$data,$where);
    return $res;
  }

  public function del_kom($table,$data){
    $res= $this->db->delete($table,$data);
    return $res;
  }

  public function getrayonperkom($kode){
    $q = "SELECT tb_komisariat.kode_kom, tb_rayon.kode_rayon, tb_rayon.fakultas, tb_rayon.nama_rayon
          FROM tb_komisariat
          join tb_rayon ON tb_komisariat.kode_kom = tb_rayon.kode_kom
          WHERE tb_rayon.kode_kom = '$kode'";
    $data = $this->db->query($q);
    return $data->result_array();
  }
}
