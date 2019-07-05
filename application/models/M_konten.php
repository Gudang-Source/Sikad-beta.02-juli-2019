<?php
/**
* Model untuk create conten kom rayon and member
*/
class M_konten extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getContenMember($id)
	{
		$this->db->select('*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kader_anggota', 'tb_konten.id_kader = tb_kader_anggota.username');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('tb_kader_anggota.username', $id);
		$this->db->order_by('tanggal', 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function get_one($id){
		$this->db->select('*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('tb_konten.id_konten', $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function month_yeer(){
		$this->db->select('month(tanggal) as bulan, year(tanggal) as tahun');
		$this->db->order_by('tanggal', 'ASC');
		$this->db->group_by('year(tanggal)');
		$data = $this->db->get('tb_konten');
		return $data->result();
	}

	public function get_on_days($id, $month = false ,$year= false){
		$this->db->select('*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kader_anggota', 'tb_konten.id_kader = tb_kader_anggota.username');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		if ($month == TRUE && $year == TRUE) {
			$this->db->where('month(tb_konten.tanggal)', $month);
			$this->db->where('year(tb_konten.tanggal)', $year);
		}
		$this->db->where('tb_kader_anggota.username', $id);
		$this->db->order_by('tanggal', 'DESC');
		$data = $this->db->get();
		return $data->result();	
	}

	public function get_all_categori($id){
		$this->db->select('tb_kategori.kategori, count(tb_kategori.id_kategori) as jml');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('tb_konten.id_kader', $id);
		$this->db->group_by('tb_kategori.kategori');
		$data = $this->db->get();
		return $data->result();
	}

	public function get_conten_categori($id, $cate){
		$this->db->select('*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('id_kader', $id);
		$this->db->where('kategori', $cate);
		$this->db->order_by('month(tanggal)', 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function create($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}

	public function kategori(){
		return $this->db->get('tb_kategori')->result();
	}


	public function delete_knt($table,$data){
		$res = $this->db->delete($table,$data);
		return $res;	
	}

}