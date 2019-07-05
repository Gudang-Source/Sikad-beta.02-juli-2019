<?php
/**
* Model untuk konten 
*/
class Model_konten extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getKonten($rayon, $kom )
	{
		$this->db->select('tb_konten.*, tb_kader_anggota.nama, tb_kader_anggota.username, 
					tb_kategori.kategori, tb_komisariat.nama_kom, tb_rayon.nama_rayon');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->join('tb_kader_anggota', 'tb_konten.id_kader = tb_kader_anggota.username');
		$this->db->join('tb_komisariat', 'tb_kader_anggota.kode_kom = tb_komisariat.kode_kom');
		$this->db->join('tb_rayon', 'tb_kader_anggota.kode_rayon = tb_rayon.kode_rayon');
		$this->db->where('tb_kader_anggota.kode_rayon', $rayon );
		$this->db->where('tb_kader_anggota.kode_kom', $kom);
		$this->db->order_by('month(tb_konten.tanggal)', 'DESC');
		$data = $this->db->get();
		return $data->result();
	}
	
	public function kom_to_pc()
	{
		$q = "SELECT count(judul) as j, to_konten, id_pengurus 
				from tb_konten where id_pengurus = 2 and to_konten = 'PC'";
		$data = $this->db->query($q);
		return $data->result();
	}

	public function rayon_to_pc()
	{
		$q = "SELECT count(judul) as j, to_konten, id_pengurus 
				from tb_konten where id_pengurus = 3 and to_konten = 'PC'";
		$data = $this->db->query($q);
		return $data->result();
	}

	public function member_to_pc()
	{
		$q = "SELECT count(judul) as j, to_konten, id_pengurus 
				from tb_konten where id_pengurus = 4 and to_konten = 'PC'";
		$data = $this->db->query($q);
		return $data->result();
	}

	public function get_konten($id)
	{
		$this->db->select('*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('tb_konten.id_pengurus', $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function read($id)
	{
		$this->db->select('tb_konten.*, tb_kategori.*');
		$this->db->from('tb_konten');
		$this->db->join('tb_kategori', 'tb_konten.id_kategori = tb_kategori.id_kategori');
		$this->db->where('tb_konten.id_konten', $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function komisariat($id)
	{
		$this->db->select('tb_konten.*, tb_komisariat.*');
		$this->db->from('tb_konten');
		$this->db->join('tb_komisariat', 'tb_konten.id_kom = tb_komisariat.kode_kom');
		$this->db->where('tb_komisariat.kode_kom', $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function rayon($id)
	{
		$this->db->select('tb_konten.*, tb_rayon.*');
		$this->db->from('tb_konten');
		$this->db->join('tb_rayon', 'tb_konten.id_rayon = tb_rayon.kode_rayon');
		$this->db->where('tb_rayon.kode_rayon', $id);
		$data = $this->db->get();
		return $data->result();
	}

}