<?php 

class M_bank extends CI_Model{

	public function tampil_data()
	{

		return $this->db->get('bank');
	}

	public function input_data($data)
	{
		$this->db->insert('bank', $data);
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

	public function hapus_data($where, $tabel)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	public function cek_data($where, $tb)
	{
		return $this->db->select('*')->from($tb)->where('id_bank', $where)->get();

	}

	public function ambil_data_bank($norek)
	{
		return $this->db->select('*')->from('no_rek')->where('no_rek', $norek)->join('bank', 'bank.id_bank=no_rek.id_b')->get();
	}

}
 ?>