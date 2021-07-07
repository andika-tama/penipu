<?php 
class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in_usr();
	}
	
	public function index()
	{
		$data['bank'] = $this->m_bank->tampil_data()->result();
		$data['judul'] = "Buat Laporan";
		$this->load->view('templet_user/header_user', $data);
		nav();
		$this->load->view('v_buat_laporan', $data);
		$this->load->view('templet_user/footer_user');
	}

	public function buat_laporan()
	{

		if($this->input->post('bank') == 'NULL')
		{

			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
				Bank harus dipilih!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('laporan/buat_laporan');
		}

		if(!$this->input->post('bank'))
		{
			$max_dgt = 0;
		}
		else
		{
			$id_bank = $this->input->post('bank');
			$jml_dgt = $this->m_cari->cari_digit($id_bank, 'bank')->result();

			foreach ($jml_dgt as $row) {
				$max_dgt = $row->jml_digit;
			}
		}

		//var_dump($max_dgt);

		$this->form_validation->set_rules('norek', 'norek', 'required|exact_length['.$max_dgt.']|numeric', ['required' =>'Nomor Rekening Wajib Diisi!',
			'exact_length' => 'Jumlah digit harus '.$max_dgt.' angka']);
		$this->form_validation->set_rules('nama_nsb', 'Nama Nasabah', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('media', 'Media penipuan', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('tgl_trs', 'Tanggal transaksi', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('kronologi', 'Kronologi', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('jml', 'Jumlah kerugian', 'required', ['required' =>'%s Wajib Diisi!']);

		$tgl = date('Y-m-d');

		if($this->form_validation->run() == FALSE)
		{
			$data['bank'] = $this->m_bank->tampil_data()->result();
			$data['judul'] = "Buat Laporan";
			$this->load->view('templet_user/header_user', $data);
			nav();
			$this->load->view('v_buat_laporan', $data);
			$this->load->view('templet_user/footer_user');
		}
		else
		{
			$iduser = $this->session->userdata('id_user');
			$norek = $this->input->post('norek');
			$cek_verif = $this->m_laporan->cek_verif($iduser, $norek, "Diterima");
			if($cek_verif->num_rows() > 0) 
			{
				$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Sudah Memiliki Laporan yang telah dikonfirmasi pada nomor rekening ini!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('laporan/buat_laporan');
			}
			$upload = $_FILES['bukti1']['name'];
			$bnyk_file = sizeof($upload);
			if($bnyk_file <= 4)
			{
				$norek = $this->input->post('norek');
				$query = $this->m_norek->cek_data($norek, 'no_rek');
				if($query->num_rows() == 0)
				{
					$status = "Tidak Diketahui";
					$data = array (
						'no_rek'  => $this->input->post('norek', TRUE),
						'nama_nasabah'  => $this->input->post('nama_nsb', TRUE),
						'id_b'  => $this->input->post('bank', TRUE),
						'status'  => $status,
					);

					$this->m_norek->input_data($data);
				}
				
				$id_plp = $this->session->userdata('id_user');
				$data =[
					'id_plp' => $id_plp,
					'norek' => $this->input->post('norek'),
					'jml_kerugian' => $this->input->post('jml'),
					'media' => $this->input->post('media'),
					'tgl_transaksi' => $this->input->post('tgl_trs'),
					'tgl_laporan' => $tgl,
					'kronologi' => htmlspecialchars($this->input->post('kronologi'))
				];
				$this->db->insert('laporan', $data);

				$id_last = $this->m_laporan->ambil_data_last($id_plp)->result();

				foreach ($id_last as $id_l) {
					$id_akhir = $id_l->id_laporan;
				}

				$files = $_FILES['bukti1'];
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['upload_path'] = './aset/bukti';
				$config['max_size'] = '5048000';
				
				$urut = 1;
				for($i = 0; $i < $bnyk_file; $i++)
				{
					$nmfile = $id_akhir."_BUKTI_".$urut++;
					//var_dump($nmfile);
					$config['file_name'] = $nmfile;
					$this->load->library('upload', $config);
					$_FILES['bukti1']['name'] = $files['name'][$i];
					$_FILES['bukti1']['type'] = $files['type'][$i];
					$_FILES['bukti1']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['bukti1']['error'] = $files['error'][$i];
					$_FILES['bukti1']['size'] = $files['size'][$i];

					//var_dump($_FILES['bukti1']['name']);
					$this->upload->initialize($config);

					if($this->upload->do_upload('bukti1'))
					{
						$data = $this->upload->data();
						$image_name = $data['file_name'];
						$data_foto =[
							'id_lpr' => $id_akhir,
							'foto' => $image_name
						];
						$this->db->insert('bukti', $data_foto);
					}
				}

				$this->session->set_flashdata('pesan', '<div 
					class="alert alert-success alert-dismissible fade show" role="alert">
					Selamat! Laporan dibuat!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;
					</span>
					</button>
				</div>'); //flash data untuk alret!
				redirect('cari');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Bukti penupuan maksimal 4 file!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>'); //flash data untuk alret!
			redirect('laporan/buat_laporan');
			}
		}
	}

	public function kelola_laporan()
	{
		$username = $this->session->userdata('username');
		$id_user = $this->m_pengguna->ambil_id_by_usr($username)->result();

		foreach ($id_user as $usr) {
			$id_pelapor = $usr->id_user;
		}

		$data_laporan = $this->m_laporan->ambil_data_by_user($id_pelapor)->result();
		$data['laporan'] = $data_laporan;
		$data['judul'] = "Kelola Laporan";
		$this->load->view('templet_user/header_user', $data);
		nav();
		$this->load->view('v_kelola_laporan', $data);
		$this->load->view('templet_user/footer_user');
	}

	public function edit_laporan($id)
	{
		
		$this->form_validation->set_rules('media', 'Media penipuan', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('kronologi', 'Kronologi', 'required', ['required' =>'%s Wajib Diisi!']);
		$this->form_validation->set_rules('jml', 'Jumlah kerugian', 'required', ['required' =>'%s Wajib Diisi!']);
		

		if($this->form_validation->run() == FALSE)
		{
			$laporan = $this->m_laporan->ambil_data($id)->result();
			$data['laporan'] = $laporan;
			$data['judul'] = "Edit Laporan";
			$this->load->view('templet_user/header_user', $data);
			nav();
			$this->load->view('v_edit_laporan', $data);
			$this->load->view('templet_user/footer_user');
		}
		else
		{
			$upload = $_FILES['bukti1']['name'];
			$bnyk_file = sizeof($upload);

			if($this->input->post('hapus_foto') == 'yes')
			{
				if($_FILES['bukti1']['name'][0] != '')
				{
					$foto = $this->m_bukti->ambil_data($id)->result();

					foreach ($foto as $ft) {
						unlink("./aset/bukti/$ft->foto");
					}
					$this->m_bukti->hapus_bukti($id);
					$urut = 1;
				}
				else
				{
					$this->session->set_flashdata('pesan', '<div 
						class="alert alert-danger alert-dismissible fade show" role="alert">
						Bukti tidak boleh kosong!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
						</button>
						</div>'); //flash data untuk alret!
					
					redirect('laporan/kelola_laporan');
				}
				
			}
			else
			{
				$jml_bukti = $this->m_bukti->ambil_data($id)->num_rows();
				$j_bukti = $jml_bukti + $bnyk_file;
				if($j_bukti <= 4)
				{
					$urut = $jml_bukti+1;
				}
				else
				{
					$this->session->set_flashdata('pesan', '<div 
						class="alert alert-danger alert-dismissible fade show" role="alert">
						bukti lebih dari 4! silahkan hapus bukti lama Anda!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
						</button>
						</div>'); //flash data untuk alret!
					redirect('laporan/kelola_laporan');
				}				
			}
			$files = $_FILES['bukti1'];
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['upload_path'] = './aset/bukti';
			$config['max_size'] = '5048000';


			for($i = 0; $i < $bnyk_file; $i++)
			{
				$nmfile = $id."_BUKTI_".$urut++;
					//var_dump($nmfile);
				$config['file_name'] = $nmfile;
				$this->load->library('upload', $config);
				$_FILES['bukti1']['name'] = $files['name'][$i];
				$_FILES['bukti1']['type'] = $files['type'][$i];
				$_FILES['bukti1']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['bukti1']['error'] = $files['error'][$i];
				$_FILES['bukti1']['size'] = $files['size'][$i];

					//var_dump($_FILES['bukti1']['name']);
				$this->upload->initialize($config);

				if($this->upload->do_upload('bukti1'))
				{
					$data = $this->upload->data();
					$image_name = $data['file_name'];
					$data_foto =[
						'id_lpr' => $id,
						'foto' => $image_name
					];
					$this->db->insert('bukti', $data_foto);
				}
			}
			$laporan = $this->m_laporan->ambil_data($id)->result();
			foreach ($laporan as $lp) {
				$norek = $lp->norek;
				$id_plp = $lp->id_plp;
				$tgl_transaksi = $lp->tgl_transaksi;
				$tgl_laporan = $lp->tgl_laporan;
			}
			$data =[
				'id_plp' => $id_plp,
				'norek' => $norek,
				'jml_kerugian' => $this->input->post('jml'),
				'media' => $this->input->post('media'),
				'tgl_transaksi' => $tgl_transaksi,
				'tgl_laporan' => $tgl_laporan,
				'kronologi' => htmlspecialchars($this->input->post('kronologi'))
			];
			$this->m_laporan->edit_data($id, $data);
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
				Selamat! Laporan berhasil diubah!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
						</div>'); //flash data untuk alret!
			redirect('laporan/kelola_laporan');

		}
		
		
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
		redirect ('laporan/kelola_laporan');
	}

	public function print_sk($id)
	{
		//$data['laporan'] 
		$d1 = $this->m_laporan->ambil_data_SK($id)->result();
		foreach ($d1 as $dt_l) {
			$tgl_laporan = $dt_l->tgl_laporan;
			$kronologi = $dt_l->kronologi;
			$no_rek = $dt_l->norek;
			$tgl_trs = $dt_l->tgl_transaksi;
			$media = $dt_l->media;
			$kerugian = $dt_l->jml_kerugian;
			$id_plp = $dt_l->id_plp;
		}
		$d2 = $this->m_laporan->ambil_data_SK_plp($id_plp)->result();
		foreach ($d2 as $dt_p) {
			$nama = $dt_p->nama_pelapor;
			$pekerjaan = $dt_p->pekerjaan;
			$alamat = $dt_p->alamat;
			$tgl_lhr = $dt_p->tgl_lahir;
		}
		$d3 = $this->m_bank->ambil_data_bank($no_rek)->result();
		foreach ($d3 as $dt_b) {
			$nama_bank = $dt_b->nama_bank;
			$nasabah = $dt_b->nama_nasabah;
		}

		$dataSK =[
				'nama' => $nama,
				'pekerjaan' => $pekerjaan,
				'alamat' => $alamat,
				'tanggal_lahir' => $tgl_lhr,
				'norek' => $no_rek,
				'jml_kerugian' => $kerugian,
				'media' => $media,
				'tgl_transaksi' => $tgl_trs,
				'tgl_laporan' => $tgl_laporan,
				'kronologi' => $kronologi,
				'nama_bank' => $nama_bank,
				'nama_nasabah' => $nasabah
			];
		$data['judul'] = "Cetak SK";
		$this->load->view('templet_user/header_user', $data);
		$this->load->view('v_cetak_sk', $dataSK);
	}
}
?>