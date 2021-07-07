<?php 

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in_adm();
	}

	public function index()
	{
		$data['bank'] = $this->m_bank->tampil_data()->result();

		$data['judul'] = "Kelola Data Bank";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_bank', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function tambah_bank()
	{
		$data = array(
			'nama_bank'  => set_value('nama_bank'),
			'jml_digit'  => set_value('jml_digit'),
		);

		$data['judul'] = "Tambah Data Bank";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_bank_form', $data);
		$this->load->view('Templet_admin/footer');
	}

	public function input_bank()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_bank();
		}
		else
		{
			$data = array (
				'nama_bank'  => $this->input->post('nama_bank', TRUE),
				'jml_digit'  => $this->input->post('jml_digit', TRUE),
			);

			$this->m_bank->input_data($data);
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil Tambah Data Bank
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>'); //flash data untuk alret!
			redirect('admin/bank');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_bank', 'nama_bank', 'required', ['required' =>'Nama Bank Wajib Diisi!']);
		$this->form_validation->set_rules('jml_digit', 'jml_digit', 'required', ['required' =>'Jumlah Digit Wajib Diisi!']);
	}

	public function edit($id)
	{
		$query = $this->m_bank->cek_data($id, 'bank');
		if($query->num_rows() == 0)
		{
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Bank Tidak Ditemukan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
			redirect('admin/bank');
		}

		$where = array('id_bank' => $id);
		$data['bank'] = $this->m_bank->edit_data($where, 'bank')->result();

		$this->form_validation->set_rules('nama_bank', 'Nama bank', 'required|trim',[
			'required' => '%s tidak boleh kosong!']);
		$this->form_validation->set_rules('jml_digit', 'Jumlah digit', 'required|trim',[
			'required' => '%s tidak boleh kosong!']);


		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Edit Data Bank";
			$this->load->view('Templet_admin/header', $data);
			$this->load->view('Templet_admin/sidebar');
			$this->load->view('admin/v_bank_edit', $data);
			$this->load->view('Templet_admin/footer');
		}
		else
		{
			$id = $this->input->post('id_bank');
			$nama_bank = $this->input->post('nama_bank');
			$jml_digit = $this->input->post('jml_digit');

			$data = array(
				'id_bank' => $id,
				'nama_bank' => $nama_bank,
				'jml_digit' => $jml_digit
			);

			$where = array (
				'id_bank' => $id
			);

			$this->m_bank->update_data($where, $data, 'bank');
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
				Data Bank Berhasil Diubah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect ('admin/bank');
		}
	}
	
	public function hapus($id)
	{
		$where = array('id_bank' => $id);
		$this->m_bank->hapus_data($where, 'bank');
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Bank Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect ('admin/bank');
	}
}

?>