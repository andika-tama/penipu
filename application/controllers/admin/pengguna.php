<?php 

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in_adm();
	}

	public function index()
	{
		$data['pengguna'] = $this->m_pengguna->tampil_data()->result();

		$data['judul'] = "Kelola Pengguna";
		$this->load->view('Templet_admin/header', $data);
		$this->load->view('Templet_admin/sidebar');
		$this->load->view('admin/v_pengguna', $data);
		$this->load->view('Templet_admin/footer');
	}
	
	public function hapus($id)
	{
		$where = array('id_user' => $id);
		$this->m_pengguna->hapus_data($where, 'pelapor');
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Pengguna Berhasil Dihapus
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect ('admin/pengguna');
	}

	public function edit($id)
	{
		$query = $this->m_pengguna->cek_data($id, 'pelapor');
		if($query->num_rows() == 0)
		{
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Pengguna Tidak Ditemukan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
			redirect('admin/pengguna');		
		}
		else
		{
			$query = $this->m_pengguna->cek_data($id, 'pelapor')->result();
			foreach ($query as $row) {
				$usr = $row->username;
				$eml = $row->email;
			}	
		}

		//var_dump($usr);
		if($usr != ($this->input->post('username')))
		{
			$usrcek = $this->input->post('username');
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[pelapor.username]|min_length[5]',[
				'required' => '%s tidak boleh kosong!',
				'is_unique' => '%s '.$usrcek.' sudah terdaftar pada sistem!',
				'min_length' => '%s minimal 5 karakter']);
		}
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]',[
				'required' => '%s tidak boleh kosong!',
				'min_length' => '%s minimal 5 karakter']);
		}

		if($eml != ($this->input->post('email')))
		{
			$emlcek = $this->input->post('email');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pelapor.email]',[
				'required' => '%s tidak boleh kosong!',
				'is_unique' => '%s '.$emlcek.' sudah terdaftar dalam sistem!']);
		}
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
				'required' => '%s tidak boleh kosong!']);
		}

		$where = array('id_user' => $id);
		$data['pengguna'] = $this->m_pengguna->edit_data($where, 'pelapor')->result();

		

		$this->form_validation->set_rules('nama_pengguna', 'Nama pengguna', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Edit Pengguna";
			$this->load->view('Templet_admin/header', $data);
			$this->load->view('Templet_admin/sidebar');
			$this->load->view('admin/v_pengguna_edit', $data);
			$this->load->view('Templet_admin/footer');
		}

		else
		{
			$id = $this->input->post('id_user');
			$username = $this->input->post('username');
			$nama_pengguna = $this->input->post('nama_pengguna');
			$pass = $this->input->post('password');
			$email = $this->input->post('email');

			$data = array(
				'id_user' => $id,
				'username' => $username,
				'password' => $pass,
				'nama_pelapor' => $nama_pengguna,
				'email' => $email
			);

			$where = array (
				'id_user' => $id
			);

			$this->m_pengguna->update_data($where, $data, 'pelapor');
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
				Data Bank Berhasil Diubah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect ('admin/pengguna');
		}
		
	}
}
?>
