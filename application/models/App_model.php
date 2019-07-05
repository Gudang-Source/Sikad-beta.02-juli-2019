 <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class App_model extends CI_Model {
	
	public function proseslogin($user,$pass){
	    $this->db->where('user_name',$user);
	    $this->db->where('pass',$pass);
	    return $this->db->get('tb_admin')->row();
  	}

  	public function __select_row($table, $where)
  	{
  		return $this->db->get_where($table, $where)->row();
  	}
}
