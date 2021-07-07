<?php 
class Laporan_masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in_adm();
	}

	public function index()
	{
		$data['laporan'] = $this->m_laporan->tampil_data()->result();

		$data['judul'] = "Kelola Laporan Masuk";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_laporan2', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function laporan_menunggu_konfirmasi()
	{
		$hsl_data = $this->m_laporan->tampil_data_not_confirm()->result();
		$data['laporan'] = $hsl_data;
		/**/
		$data['judul'] = "Laporan Menunggu Konfirmasi";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar', $data);
		$this->load->view('admin/v_laporan2', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function laporan_diterima()
	{
		$hsl_data = $this->m_laporan->tampil_data_confirm()->result();
		$data['laporan'] = $hsl_data;

		$data['judul'] = "Laporan Diterima";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar', $data);
		$this->load->view('admin/v_laporan2', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function laporan_ditolak()
	{
		$hsl_data = $this->m_laporan->tampil_data_reject()->result();
		$data['laporan'] = $hsl_data;

		$data['judul'] = "Laporan Ditolak";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar', $data);
		$this->load->view('admin/v_laporan2', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function konfirmasi($id)
	{
		
		$id_laporan = $id;
		$id_admin = $this->session->userdata('id_admin');
		$where = array (
			'id_laporan' => $id_laporan
		);
		$id_pelapor = $this->m_laporan->ambil_data_by_id($id_laporan)->result();
		foreach ($id_pelapor as $idp) {
			$idplp = $idp->id_plp;
			$nrk = $idp->norek; 
		}

		$cek_verif = $this->m_laporan->cek_verif_byid($nrk, $idplp, "Diterima");
		
		if($cek_verif->num_rows() > 0)
		{
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
				Terdapat laporan yang telah diterima dari pelapor ini!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('admin/laporan_masuk/laporan_menunggu_konfirmasi');
		}
		$tgl_knfr = date('Y-m-d');
		$status_knfr = "Diterima";
		$pesan_knfr = "Selamat! Laporan Anda telah diterima.";
		$data =[
				'tgl_knfr' => $tgl_knfr,
				'status_knfr' => $status_knfr,
				'pesan_knfr' => $pesan_knfr,
				'id_admin' => $id_admin
			];
		$this->m_laporan->konfirmasi($where, $data, 'laporan');
		$norek = $this->m_laporan->ambil_norek($id)->result();
		foreach ($norek as $nr) {
			$no_rek = $nr->norek;
		}
		$no_r = $this->m_norek->cek_data($no_rek, 'no_rek')->result();

		foreach($no_r as $n)
		{
			if($n->status == 'Terlapor')
			{
				if($this->m_laporan->ambil_data_by_norek($no_rek)->num_rows() >= 3)
				{
					$data = array(
						'no_rek' => $no_rek,
						'nama_nasabah' => $n->nama_nasabah,
						'id_b' => $n->id_b,
						'status' => 'Penipu'
					);

					$where = array (
						'no_rek' => $no_rek
					);

					$this->m_norek->update_data($where, $data, 'no_rek');
				}
			}
			else if($n->status == 'Tidak Diketahui')
			{
				if($this->m_laporan->ambil_data_by_norek($no_rek)->num_rows() >= 1)
				{
					$data = array(
						'no_rek' => $no_rek,
						'nama_nasabah' => $n->nama_nasabah,
						'id_b' => $n->id_b,
						'status' => 'Terlapor'
					);

					$where = array (
						'no_rek' => $no_rek
					);

					$this->m_norek->update_data($where, $data, 'no_rek');
				}
			}
		}
		//kirim pesan
		$id_plp = $this->m_laporan->ambil_data_plp_by_id($id_laporan)->result();
		foreach($id_plp as $idplp)
		{
			$idp = $idplp->id_plp;
		}
		$data_user=$this->m_login->get_email_by_id($idp)->result();
		foreach ($data_user as $dt) {
			$email = $dt->email;
		}
		$pesan = $pesan_knfr;

		$this->_kirimEmail($email, $pesan, 'terima');
		$this->session->set_flashdata('pesan', '<div 
			class="alert alert-success alert-dismissible fade show" role="alert">
					Laporan berhasil dikonfirmasi!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect('admin/laporan_masuk/laporan_diterima');	
	}

	public function konfirmasi_tolak($id)
	{
		$id_laporan = $id;
		$where = array (
			'id_laporan' => $id_laporan
		);
		$this->form_validation->set_rules('pesan', 'Alasan penolakan', 'required',[
				'required' => '%s harus diisi!'] );

		if($this->form_validation->run() == FALSE)
		{
			$data['laporan'] = $this->m_laporan->ambil_data($id)->result();
			$data['judul'] = "Form Tolak Laporan";
			$this->load->view('Templet_admin/header', $data);
			$this->load->view('Templet_admin/sidebar', $data);
			$this->load->view('admin/v_tolak_laporan', $data);
			$this->load->view('Templet_admin/footer');
		}
		else
		{
			$id_admin = $this->session->userdata('id_admin');
			$tgl_knfr = date('Y-m-d');
			$status_knfr = "Ditolak";
			$pesan_knfr = $this->input->post('pesan');
			$data =[
				'tgl_knfr' => $tgl_knfr,
				'status_knfr' => $status_knfr,
				'pesan_knfr' => $pesan_knfr,
				'id_admin' => $id_admin
			];
			$this->m_laporan->konfirmasi($where, $data, 'laporan');
			//kirim pesan
			$id_plp = $this->m_laporan->ambil_data_plp_by_id($id_laporan)->result();
			foreach($id_plp as $idplp)
			{
				$idp = $idplp->id_plp;
			}
			$data_user=$this->m_login->get_email_by_id($idp)->result();
			foreach ($data_user as $dt) {
				$email = $dt->email;
			}
			$pesan = $pesan_knfr;

			$this->_kirimEmail($email, $pesan, 'tolak');
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
				Laporan berhasil ditolak!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('admin/laporan_masuk/laporan_ditolak');
		}
	}

	public function detail_laporan($id)
	{
		$id_laporan = $id;
		$ambil_data = $this->m_laporan->ambil_data($id)->result();

		foreach ($ambil_data as $adt) {
			$id_pelapor = $adt->id_plp;
		}

		$data['laporan'] = $this->m_laporan->ambil_data_detail($id, $id_pelapor)->result();
		$data['foto'] = $this->m_laporan->ambil_data_foto($id)->result();

		$data['judul'] = "Detail Laporan";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar', $data);
		$this->load->view('Templet_admin/footer');
		$this->load->view('admin/v_detail', $data);
		
	}

	public function hapus_laporan($id)
	{
		$foto = $this->m_bukti->ambil_data($id)->result();

		foreach ($foto as $ft) {
			unlink("./aset/bukti/$ft->foto");
		}
		
		$this->m_laporan->hapus_data($id, 'laporan');
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Laporan berhasil dihapus!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect ('admin/laporan_masuk');
	}

	private function _kirimEmail($email,$pesan, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'adm.carinorek@gmail.com',
			'smtp_pass' => 'skripsi123',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"


		];

		$this->load->library('email', $config);
		$this->email->initialize($config);
		  

		$this->email->from('adm.carinorek@gmail.com', 'Cari Nomor Rekening Penipuan');
		$this->email->to($email);
		

		if($type == 'tolak')
		{
			$this->email->subject('Pesan Penolakan Laporan');
			$this->email->message('Mohon Maaf, Laporan Anda kami tolak dengan alasan : <b>'.$pesan. '</b> Terima kasih!');
		}
		else if($type == 'terima')
		{
			$this->email->subject('Pesan Penerimaan Laporan');
			$this->email->message( '<b>'.$pesan. '</b>');
		}

		if($this->email->send())
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
		
	}
}
?>