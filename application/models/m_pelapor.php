<?php 

class M_pelapor extends CI_Model{
	public function ambil_data($where, $tabel)
	{
		return $this->db->get_where($tabel, $where);
	}
	public function update_data($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}
}
?>
