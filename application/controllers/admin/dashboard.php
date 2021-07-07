<?php 

class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		is_logged_in_adm();
	}
	public function index()
	{
		$pgn = 0;
		$lpr = 0;
		$lpr_k = 0;
		$nr = 0;

		$pengguna = $this->m_pengguna->tampil_data();
		$norek = $this->m_norek->tampil_data();
		$laporan_msk = $this->m_laporan->tampil_data();
		$laporan_knfr = $this->m_laporan->tampil_data_not_confirm();

		$pgn = $pengguna->num_rows();
		$nr = $norek->num_rows();
		$lpr = $laporan_msk->num_rows();
		$lpr_k = $laporan_knfr ->num_rows();




		$data['pengguna'] = $pgn;
		$data['norek'] = $nr;
		$data['laporan_msk'] = $lpr;
		$data['laporan_konfir'] = $lpr_k;

		$data['judul'] = "Dashboard Admin";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('Templet_admin/footer');
	}


}


 ?>