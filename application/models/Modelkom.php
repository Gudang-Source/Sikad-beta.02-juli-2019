 <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Modelkom extends CI_Model {
 	public function getkom($where=""){
 	$data = $this->db->query('select * from tb_kom '.$where);
 	return $data->result_array(); 
	}

	public function insert_kom($table_admin,$data){
		$res = $this->db->insert($table_admin,$data);
		return $res;	

	}

	public function update_kom($table_admin,$data, $where){
		$res = $this->db->update($table_admin, $data, $where);
		return $res;	
	
	}

	public function del_kom($table_admin,$data){
		$res = $this->db->delete($table_admin,$data);
		return $res;	

	}
}
