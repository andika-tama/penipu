<?php 
class M_bukti extends CI_Model
{
	public function ambil_data($id)
	{
		return $this->db->select('foto')->from('bukti')->where('id_lpr', $id)->get();
	}

	public function hapus_bukti($id)
	{
		$this->db->where('id_lpr', $id);
		$this->db->delete('bukti');
	}
}
?>