<?php 

class Cari extends CI_Controller {
	public function index()
	{
		$data['bank'] = $this->m_bank->tampil_data()->result();
		$this->load->view('v_header_cari');
		
		$data['judul'] = "Cari Nomor Rekening";
		$this->load->view('templet_user/header_user', $data);
		nav();
		/*$this->load->view('templet_user/navbar_user');*/
		$this->load->view('v_cari', $data);
		$this->load->view('Templet_user/footer_user');


	}

	public function cari_data()
	{
		$awal = microtime(true);
		//echo $this->input->post('bank');
		$id_bank = $this->input->post('bank');
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
			redirect('cari');
		}
		else if($this->input->post('bank') == 'D10')
		{
			$max_dgt = 10;
		}
		else if($this->input->post('bank') == 'D12')
		{
			$max_dgt = 12;
		}
		else if($this->input->post('bank') == 'D13')
		{
			$max_dgt = 13;
		}
		else if($this->input->post('bank') == 'D15')
		{
			$max_dgt = 15;
		}
		else if($this->input->post('bank') == 'D16')
		{
			$max_dgt = 16;
		}
		else if($this->input->post('bank') == 'all')
		{
			$max_dgt = 16;
		}
		else
		{
			$jml_dgt = $this->m_cari->cari_digit($id_bank, 'bank')->result();
			foreach ($jml_dgt as $row) {
				$max_dgt = $row->jml_digit;
			}
		}

		$pilih_digit = substr($id_bank, 0, 1);

		$this->form_validation->set_rules('norek', 'Nomor Rekening', 'required|max_length['.$max_dgt.']|numeric', ['required' =>'Nomor Rekening Wajib Diisi!',
			'max_length' => 'Jumlah digit %s maksimal '.$max_dgt.' angka',
			'numeric' => '%s harus angka!']);

		if($this->form_validation->run() == FALSE)
		{
			$data['bank'] = $this->m_bank->tampil_data()->result();
			$this->load->view('v_header_cari');

			$data['judul'] = "Cari Nomor Rekening";
			$this->load->view('templet_user/header_user', $data);
			nav();
			/*$this->load->view('templet_user/navbar_user');*/
			$this->load->view('v_cari', $data);
			$this->load->view('Templet_user/footer_user');
		}
		else
		{
			$awal = microtime(true);
			$no_rek = $this->input->post('norek');
			$bnyk_data = 0;
			$pattern = $no_rek;
			//proses boyer moore
			$OH = $this->_badCharacter($pattern);
			$MH = $this->_goodSuffix($pattern);

			if($this->input->post('bank') == 'all')
			{
				$data_norek = $this->m_cari->ambil_data_all()->result();
			}
			else if ($pilih_digit == 'D')
			{
				$data_norek = $this->m_cari->ambil_data_by_digit($max_dgt)->result();
				
			}
			else
			{
				$data_norek = $this->m_cari->ambil_data($no_rek, $id_bank)->result();
			}
			
			if($data_norek)
			{
				
				$patt_len = strlen($pattern);

				foreach ($data_norek as $dr) {

					$text = $dr->no_rek;
					$text_len = strlen($text);

					$geser = 0;
					$idx_cmpr = $patt_len - 1;

					while (($geser + $patt_len) <= $text_len && $idx_cmpr >= 0)
					{
						if($pattern[$idx_cmpr] == $text[$geser + $idx_cmpr])
						{
							$idx_cmpr--;
							
						}
						else
						{
							$geser = $geser + max($OH[$text[$geser - $idx_cmpr]], $MH[$idx_cmpr]);
							$idx_cmpr = $patt_len-1;
						}
						//var_dump($idx_cmpr);
					}

					if($idx_cmpr == -1)
					{
						$bnyk_data++;
						$bnyk_lpr[$bnyk_data] = $this->_hitungLaporan($text);
						$data2[$bnyk_data] = $dr;
					}		
				//boyer moore!
				}

				if($bnyk_data == 0)
				{
					$this->session->set_flashdata('pesan', '<div 
						class="alert alert-danger alert-dismissible fade show" role="alert">
						Nomor rekening tidak ditemukan!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
						</button>
						</div>');
					redirect('cari');

				}

			}
			else
			{
				$this->session->set_flashdata('pesan', '<div 
					class="alert alert-danger alert-dismissible fade show" role="alert">
					Tidak ada nomor rekening yang terlapor pada bank tersebut!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;
					</span>
					</button>
					</div>');
				redirect('cari');
			}
			$akhir = microtime(true);
			$data['waktu'] = $akhir - $awal;
			$data['bnyk_data'] = $bnyk_data;
			$data['bnyk_laporan'] = $bnyk_lpr;
			$data['norek'] = $data2;
			$data['bank'] = $this->m_bank->tampil_data()->result();
			//var_dump($data2);

			$data['judul'] = "Hasil Pencarian";
			$this->load->view('templet_user/header_user', $data);
			$this->load->view('templet_user/navbar_user');
			//nav();
			$this->load->view('cari3_uji', $data);
			$this->load->view('templet_user/footer_user');
		}
	}

	public function view_laporan($no_rek)
	{
		$data_laporan = $this->m_cari->tampil_laporan($no_rek)->result();
		$data['laporan'] = $data_laporan;
		$data['judul'] = "Lihat Laporan";
		$this->load->view('templet_user/header_user', $data);
		nav();
		$this->load->view('v_laporan_norek', $data);
		$this->load->view('templet_user/footer_user');

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
		$this->load->view('templet_user/header_user', $data);
		nav();
		$this->load->view('v_lapora_detail', $data);
		$this->load->view('templet_user/footer_user');
	}

	private function _hitungLaporan($norek)
	{
		$bnyk_lpr = 0;
		$data_laporan = $this->m_laporan->ambil_data_by_norek($norek)->result();

		foreach ($data_laporan as $dl) {
			$bnyk_lpr++;
		}

		return $bnyk_lpr;
	}

	private function _badCharacter($pattern)
	{
		$m = strlen($pattern);

		for ($i = 0; $i < 10; $i++){
			$BC[$i] = $m;
		}

		for ($i = 0; $i < $m; $i++){
			$BC[$pattern[$i]] = $m-1-$i;
		}
		return $BC;
	}

	private  function _goodSuffix($pattern)
	{
		$m = strlen($pattern);

		$MH[$m - 1] = 1;

		for ($i=1; $i < $m; $i++) { 
			$s[$i-1] = substr($pattern, 0+$i-1, $m-$i+1); //tabel suffix
			//$px_s[$i] = substr($pattern, $m-$i-1, 1); //tabel prefix suffix
			$px[$i-1] = substr($pattern, 0, $m-$i); // tabel compare prefix
			$n_gsr[$i-1] = $i; //nilai geser
		}

		for ($i= $m-2; $i>=0; $i--) { 
			$keluar = 0;
			$pjg_s = strlen($s[$i]);
			$geser = 1;
			$idx_px = 0;

			while ($keluar == 0)
			{
				$pjg_px = strlen($px[$idx_px]);

				if ($geser == 1)
				{
					if($pjg_s > $pjg_px)
					{
						$sf_cpr[$i] = substr($s[$i], $pjg_s-$pjg_px, $pjg_px);
						$px_cpr[$idx_px] = $px[$idx_px];
					}
					else if ($pjg_px > $pjg_s)
					{
						$sf_cpr[$i] = $s[$i];
						$px_cpr[$idx_px] = substr($px[$idx_px], $pjg_px-$pjg_s, $pjg_s);
					}
					else
					{
						$sf_cpr[$i] = $s[$i];
						$px_cpr[$idx_px] = $px[$idx_px];
					}
				}

				$q = strlen($sf_cpr[$i]);
				$w = strlen($px_cpr[$idx_px]);

				if($sf_cpr[$i][$q-$geser] == $px_cpr[$idx_px][$w-$geser])
				{
					if($q == $pjg_s && $q-$geser-1 == 0)
					{
						if($sf_cpr[$i][$q-$geser-1] != $px_cpr[$idx_px][$w-$geser-1])
						{
							$MH[$i] = $n_gsr[$idx_px];
							$keluar = 1;
							$geser++;
						}
						else
						{
							$idx_px++;
							$geser = 1;
						}
					}
					else
					{
						if ($q - $geser == 0)
						{
							$MH[$i] = $n_gsr[$idx_px];
							$keluar = 1;
						}

						$geser++;
					}			
				}
				else
				{
					if($idx_px == $m-2)
					{
						$MH[$i] = $m;
						$keluar = 1;
					}
					else
					{
						$idx_px ++;
						$geser = 1;
					}
				}
			}
		}

		//var_dump($px_cpr);
		/*echo "COMPARE";
		var_dump($px);*/

		return $MH;
	}

	public function cari_data_manual()
	{
		$awal = microtime(true);
		//echo $this->input->post('bank');
		if($this->input->post('bank') == 'NULL')
		{
			/*echo '<script>
			alert("Bank harus diisi");
			</script>';
			echo"<script>window.location='".site_url('cari')."';</script>";*/

			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
				Bank harus dipilih!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('cari');
		}

		$id_bank = $this->input->post('bank');
		$jml_dgt = $this->m_cari->cari_digit($id_bank, 'bank')->result();

		foreach ($jml_dgt as $row) {
			$max_dgt = $row->jml_digit;
		}

		$this->form_validation->set_rules('norek', 'norek', 'required|max_length['.$max_dgt.']', ['required' =>'Nomor Rekening Wajib Diisi!',
			'max_length' => 'Jumlah digit maksimal '.$max_dgt.' angka']);

		if($this->form_validation->run() == FALSE)
		{
			$data['bank'] = $this->m_bank->tampil_data()->result();
			$this->load->view('v_cari2', $data);
		}
		else
		{
			
			$no_rek = $this->input->post('norek');
			$bnyk_data = 0;

			$data_norek = $this->m_cari->cari_norek_manual($no_rek, 'no_rek')->result();

			foreach ($data_norek as $dr) {
				$bnyk_data++;
				$text = $dr->no_rek;
				$bnyk_lpr[$bnyk_data] = $this->_hitungLaporan($text);
			}
			
			/*$jml_data = array('total' => $bnyk_data);

			var_dump($jml_data);*/

			$akhir = microtime(true);
			$data['waktu'] = $akhir - $awal;
			$data['bnyk_data'] = $bnyk_data;
			$data['bnyk_laporan'] = $bnyk_lpr;
			$data['norek'] = $data_norek;
			$data['bank'] = $this->m_bank->tampil_data()->result();
			//var_dump($data2);

			$data['judul'] = "Hasil Pencarian";
			$this->load->view('templet_user/header_user', $data);
			$this->load->view('templet_user/navbar_user');
			//nav();
			$this->load->view('cari3_uji', $data);
			$this->load->view('templet_user/footer_user');
		}
	}
}

?>