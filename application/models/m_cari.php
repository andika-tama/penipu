<?php 

class M_cari extends CI_Model{

	public function cari_digit($id, $tb)
	{
		return $this->db->select('jml_digit')->from($tb)->where('id_bank', $id)->get();
	}

	public function cari_norek($nr, $tb)
	{
		$this->db->select('*');
		$this->db->from($tb);
		$this->db->like('no_rek', $nr);
		$this->db->join('bank', 'bank.id_bank=no_rek.id_b');
		return $this->db->get();
	}

	public function ambil_data($nr, $bank)
	{
		$where = "status='Penipu' OR status='Terlapor'";
		$this->db->select('*');
		$this->db->from('no_rek');
		$this->db->where('id_b', $bank);
		$this->db->where($where);
		$this->db->join('bank', 'bank.id_bank=no_rek.id_b');
		return $this->db->get();
	}
	public function ambil_data_all()
	{
		$where = "status='Penipu' OR status='Terlapor'";
		$this->db->select('*');
		$this->db->from('no_rek');
		$this->db->where($where);
		$this->db->join('bank', 'bank.id_bank=no_rek.id_b');
		return $this->db->get();
	}

	public function ambil_data_by_digit($dgt)
	{
		$where = "status='Penipu' OR status='Terlapor'";
		$this->db->select('*');
		$this->db->from('no_rek');
		$this->db->where($where);
		$this->db->join('bank', 'bank.id_bank=no_rek.id_b AND jml_digit='.$dgt.'');
		//$this->db->where('bank.jml_digit', $dgt);
		return $this->db->get();
	}

	public function tampil_laporan($norek)
	{
		$this->db->select ( '*' ); 
		$this->db->from ( 'laporan' );
		$this->db->where ( 'norek', $norek );
		$this->db->where('status_knfr', 'Diterima');
		$this->db->join ( 'pelapor', 'pelapor.id_user = laporan.id_plp');
		$query = $this->db->get ();
		return $query;
	}
	public function cari_norek_manual($nr, $tb)
	{
		$where = "status='Penipu' OR status='Terlapor'";
		$this->db->select('*');
		$this->db->from($tb);
		$this->db->like('no_rek', $nr);
		$this->db->where($where);
		$this->db->join('bank', 'bank.id_bank=no_rek.id_b');
		return $this->db->get();
	}
}

?>