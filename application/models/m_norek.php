<?php 
class M_norek extends CI_Model
{
	public function tampil_data()
	{


		return $this->db->from('no_rek')->join('bank', 'bank.id_bank=no_rek.id_b')->get();
	}

	public function input_data($data)
	{
		$this->db->insert('no_rek', $data);
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

	public function ambil_id_b($where, $tb, $field)
	{
		return $this->db->select($field)->from($tb)->where('no_rek', $where)->get();

	}

	public function cek_data($where, $tb)
	{
		return $this->db->select('*')->from($tb)->where('no_rek', $where)->get();

	}

	public function data_bank($where, $tb, $field)
	{
		return $this->db->select($field)->from($tb)->where('id_bank', $where)->get();
	}

	public function update_data($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}
}
 ?>