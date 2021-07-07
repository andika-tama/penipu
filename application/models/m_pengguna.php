<?php 

class M_pengguna extends CI_Model{

	public function tampil_data()
	{

		return $this->db->get('pelapor');
	}

	public function hapus_data($where, $tabel)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	public function edit_data($where, $tabel)
	{
		return $this->db->get_where($tabel, $where);
	}

	
	public function update_data($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}

	public function cek_data($where, $tb)
	{
		return $this->db->select('*')->from($tb)->where('id_user', $where)->get();

	}

	public function ambil_id_by_usr($username)
	{
		return $this->db->select('id_user')->from('pelapor')->where('username', $username)->get();
	}
	public function ambil_name_by_id($id)
	{
		return $this->db->select('nama_pelapor')->from('pelapor')->where('id_user', $id)->get();
	}
}
?>