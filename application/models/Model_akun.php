<?php
/**
* 
*/
class Model_akun extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function get_val_gol()
	{
		$data = [
					'user' => $this->input->post('username'),
					'pass' => do_hash($this->input->post('password'), 'md5')
				];
		
		$sql = $this->db->get_where('tb_testing_log', $data);
		if ($sql == true) {
			return $sql->row();
		}else{
			return FALSE;
		}
	}

	public function get_admin_kom(){
		$data = $this->db->get('akun_kom');
		return $data->result_array();
	}

	public function get_validation_kom($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$data = $this->db->get('tb_komisariat');

		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function profile_kom($kode_kom)
	{
		$this->db->where('kode_kom', $kode_kom);
		$data = $this->db->get('tb_komisariat');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}

	public function get_rayon($kode_kom)
	{
		$this->db->where('tb_rayon.kode_kom', $kode_kom);
		$this->db->from('tb_komisariat');
		$this->db->join('tb_rayon', 'tb_komisariat.kode_kom = tb_rayon.kode_kom');
		$this->db->order_by('tb_rayon.kode_rayon', 'ASC');
		$data = $this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}

	public function edit_data_rayon($id)
	{
		$this->db->where('id_rayon', $id);
		$data = $this->db->get('tb_rayon');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function delete_rayon($table, $where)
	{
		$data = $this->db->delete($table, $where);
		return $data;
	}

	public function get_data_rayon($kode_kom)
	{
		$this->db->select('tb_komisariat.*, tb_rayon.*, tb_kader_anggota.*');
		$this->db->where('tb_kader_anggota.kode_kom', $kode_kom);
		$this->db->from('tb_komisariat');
		$this->db->join('tb_rayon', 'tb_komisariat.kode_kom = tb_rayon.kode_kom');
		$this->db->join('tb_kader_anggota', 'tb_rayon.kode_rayon = tb_kader_anggota.kode_rayon');
		$this->db->order_by('tb_kader_anggota.nama', 'ASC');
		$data = $this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}

	public function get_validation_rayon($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$data = $this->db->get('tb_rayon');

		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function profile_rayon($kode_rayon)
	{	
		$this->db->where('kode_rayon', $kode_rayon);
		$data = $this->db->get('tb_rayon');
		if ($data->num_rows()> 0) 
		{
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}

	public function get_kader($kode_rayon)
	{
		$this->db->select('*');
		$this->db->where('kode_rayon', $kode_rayon);
		$this->db->order_by('nama', 'ASC');
		$data = $this->db->get('tb_kader_anggota');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}else{
			return false;
		}
	}


	public function cek_login_akun_anggota($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('tb_kader_anggota');

		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function edit_anggot_rayon($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('tb_kader_anggota');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}

	function delete_data($table_admin,$data){
		$res = $this->db->delete($table_admin,$data);
		return $res;	

	}

	function get_member($username)
	{
		$this->db->select('tb_komisariat.*, tb_rayon.*, tb_kader_anggota.*');
		$this->db->from('tb_komisariat');
		$this->db->join('tb_rayon', 'tb_rayon.kode_kom = tb_komisariat.kode_kom');
		$this->db->join('tb_kader_anggota', 'tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon');
		$this->db->where('tb_kader_anggota.username', $username);
		$data = $this->db->get();
		if (is_array($data) || is_object($data)) {
			return $data->result_array();
		}else{
			return false;
		}

	}

	function get_byimage($where) {
        $this->db->from('tb_kader_anggota');
        $this->db->where('id');
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

	
}