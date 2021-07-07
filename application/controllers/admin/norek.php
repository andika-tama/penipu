<?php 
class Norek extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in_adm();
	}
	public function index()
	{
		$data['norek'] = $this->m_norek->tampil_data()->result();

		$data['judul'] = "Kelola Nomor Rekening";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_norek', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function tambah_norek()
	{

		$data['bank'] = $this->m_bank->tampil_data()->result();
		/*$data = array(
			'nama_bank'  => set_value('nama_bank'),
			'jml_digit'  => set_value('jml_digit'),
		);*/

		$data['judul'] = "Form Tambah Nomor Rekening";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_norek_tambah', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function input_norek()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_norek();
		}
		else
		{
			$data = array (
				'no_rek'  => $this->input->post('norek', TRUE),
				'nama_nasabah'  => $this->input->post('nama_nasabah', TRUE),
				'id_b'  => $this->input->post('bank', TRUE),
				'status'  => $this->input->post('status', TRUE),
			);

			$this->m_norek->input_data($data);
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil Tambah Data Nomor Rekening
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>'); //flash data untuk alret!
			redirect('admin/norek');
		}
	}

	public function _rules()
	{
		$id_bank = $this->input->post('bank');
		$jml_dgt = $this->m_cari->cari_digit($id_bank, 'bank')->result();

		foreach ($jml_dgt as $row) {
			$jml_fix = $row->jml_digit;
		}
		$this->form_validation->set_rules('norek', 'norek', 'required|is_unique[no_rek.no_rek]|trim|exact_length['.$jml_fix.']', ['required' =>'Nomor Rekening Wajib Diisi!', 
			'is_unique' => 'Nomor Rekening sudah terdaftar!',
			'exact_length' => 'Panjang nomor rekening harus '.$jml_fix.' Digit']);
		$this->form_validation->set_rules('nama_nasabah', 'nama_nasabah', 'required', ['required' =>'Nama Nasabah Wajib Diisi!']);
		$this->form_validation->set_rules('bank', 'bank', 'required', ['required' =>'Bank Wajib Diisi!']);
		$this->form_validation->set_rules('status', 'status', 'required', ['required' =>'Status Nomor Rekening Wajib Diisi!']);
	}

	public function hapus($norek)
	{
		$where = array('no_rek' => $norek);
		$this->m_norek->hapus_data($where, 'no_rek');
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Nomor Rekening Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect ('admin/norek');
	}

	public function edit($id)
	{
		$query = $this->m_norek->cek_data($id, 'no_rek');
		if($query->num_rows() == 0)
		{
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Nomor Rekening Tidak Ditemukan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
			redirect('admin/norek');
		}
		else
		{
			$query = $this->m_norek->cek_data($id, 'no_rek')->result();
			foreach ($query as $row) {
				$nr = $row->no_rek;
			}
		}	

		$data['bank'] = $this->m_bank->tampil_data()->result();
		$where = array('no_rek' => $id);
		$data['norek'] = $this->m_norek->edit_data($where, 'no_rek')->result();
		

		if($this->input->post('bank') == TRUE) //cek apakah ingin mengganti bank
		{
			$id_b = $this->input->post('bank'); //bila true, ambil jml digit dari bank baru 
		}
		else
		{	//bila false, ambil jml digit dari bank lama
			$id_b = $this->m_norek->ambil_id_b($id, 'no_rek', 'id_b')->result();
			foreach ($id_b as $row) 
			{
				$id_b = $row->id_b;
			}
		}

		$jml_digit_bank = $this->m_norek->data_bank($id_b, 'bank', 'jml_digit')->result();
		foreach ($jml_digit_bank as $row)
		{
			$jml_fix = $row->jml_digit;
		}

		if($nr != ($no_rek = $this->input->post('norek')))
		{
			$nrcek = $this->input->post('norek');
			$this->form_validation->set_rules('norek', 'Nomor Rekening', 'required|trim|is_unique[no_rek.no_rek]|exact_length['.$jml_fix.']',[
				'is_unique' => 'Nomor rekening '.$nrcek.' sudah ada dalam sistem!',
				'required' => 'Nomor Rekening tidak boleh kosong!',
				'exact_length' => 'Panjang nomor rekening harus '.$jml_fix.' Digit']); 
		}
		else
		{
			$this->form_validation->set_rules('norek', 'Nomor Rekening', 'required|trim|exact_length['.$jml_fix.']',[
				'required' => 'Nomor Rekening tidak boleh kosong!',
				'exact_length' => 'Panjang nomor rekening harus '.$jml_fix.' Digit']); 
		}

		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required',[
			'required' => 'Nama nasabah tidak boleh kosong!']);

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Form Edit Nomor Rekening";
			$this->load->view('Templet_admin/header', $data);
			$this->load->view('Templet_admin/sidebar');
			$this->load->view('admin/v_norek_edit', $data);
			$this->load->view('Templet_admin/footer');
		}
		else
		{
			$id = $this->input->post('id_norek');
			$no_rek = $this->input->post('norek');
			$nama_nasabah = $this->input->post('nama_nasabah');
			$id_b = $this->input->post('bank');
			$status = $this->input->post('status');

			$data = array(
				'no_rek' => $no_rek,
				'nama_nasabah' => $nama_nasabah,
				'id_b' => $id_b,
				'status' => $status
			);

			$where = array (
				'no_rek' => $id
			);

			$this->m_norek->update_data($where, $data, 'no_rek');
			$this->session->set_flashdata('pesan', '<div 
					class="alert alert-success alert-dismissible fade show" role="alert">
						Data Bank Berhasil Diubah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;
							</span>
						</button>
					</div>');
			redirect ('admin/norek');
		}
	}
}

?>
