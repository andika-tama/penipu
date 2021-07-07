<?php 
class M_laporan extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->from('laporan')->join('pelapor', 'laporan.id_plp=pelapor.id_user')->get();
	}

	public function tampil_data_not_confirm()
	{
		return $this->db->select('*')->from('laporan')->where('status_knfr', null)->join('pelapor', 'laporan.id_plp=pelapor.id_user')->get();
	}

	public function tampil_data_confirm()
	{
		return $this->db->select('*')->from('laporan')->where('status_knfr', 'diterima')->join('pelapor', 'laporan.id_plp=pelapor.id_user')->get();
	}

	public function tampil_data_reject()
	{
		return $this->db->select('*')->from('laporan')->where('status_knfr', 'ditolak')->join('pelapor', 'laporan.id_plp=pelapor.id_user')->get();
	}

	public function ambil_data($id)
	{
		return $this->db->select('*')->from('laporan')->where('id_laporan', $id)->get();
	}

	public function ambil_data_by_norek($norek)
	{
		return $this->db->select('*')->from('laporan')->where('norek', $norek)->where('status_knfr', 'Diterima')->get();
	}

	public function ambil_data_by_user($id)
	{
		return $this->db->select('*')->from('laporan')->where('id_plp', $id)->get();
	}
	public function ambil_data_by_id($id)
	{
		return $this->db->select('*')->from('laporan')->where('id_laporan', $id)->get();
	}

	public function ambil_data_plp_by_id($id)
	{
		return $this->db->select('*')->from('laporan')->where('id_laporan', $id)->get();
	}

	public function ambil_data_detail($id, $id_plp)
	{
		return $this->db->select('*')->from('laporan')->where('id_laporan', $id)->join('pelapor', 'laporan.id_plp=pelapor.id_user')->get();
	}

	public function ambil_data_foto($id)
	{
		return $this->db->select('*')->from('bukti')->where('id_lpr', $id)->get();
	}

	public function ambil_data_last($id)
	{
		return $this->db->select('id_laporan')->from('laporan')->where('id_plp', $id)->order_by('id_laporan', 'DESC')->limit(1)->get();
	}

	public function konfirmasi($where, $data, $tb)
	{
		$this->db->where($where);
		$this->db->update($tb, $data);
	}

	public function cek_verif_byid($nrk, $plp, $ket)
	{
		return $this->db->select('id_laporan')->from('laporan')->where('norek', $nrk)->where('status_knfr', $ket)->where('id_plp', $plp)->get();
	}

	public function ambil_norek($id)
	{
		return $this->db->select('norek')->from('laporan')->where('id_laporan', $id)->get();
	}
	public function hapus_data($id, $tb)
	{
		$this->db->where('id_lpr', $id);
		$this->db->delete('bukti');
		$this->db->where('id_laporan', $id);
		$this->db->delete($tb);
	}

	public function edit_data($id, $data)
	{
		$this->db->where('id_laporan', $id);
		$this->db->update('laporan', $data);
	}
	public function cek_verif($id, $norek, $ket)
	{
		return $this->db->select('id_laporan')->from('laporan')->where('id_plp', $id)->where('norek', $norek)->where('status_knfr', $ket)->get();
	}

	public function ambil_data_SK($id)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->where('id_laporan', $id);
		return $this->db->get();
	}

	public function ambil_data_SK_plp($id_plp)
	{
		$this->db->select('*');
		$this->db->from('pelapor');
		$this->db->where('id_user', $id_plp);
		return $this->db->get();
	}
}
?>