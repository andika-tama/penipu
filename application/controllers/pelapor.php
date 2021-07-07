<?php 
class Pelapor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in_usr();
	}

	public function index(){
		$data['bank'] = $this->m_bank->tampil_data()->result();
		$data['judul'] = "Cari Nomor Rekening";
		$this->load->view('templet_user/header_user', $data);
		nav();
		$this->load->view('v_cari', $data);
		$this->load->view('templet_user/footer_user');
		
	}

	public function kelola_akun()
	{
		$id = array (
			'id_user' => $this->session->userdata('id_user')
		);
		$data['user'] = $this->m_pelapor->ambil_data($id, 'pelapor')->result();
		$query = $this->m_pelapor->ambil_data($id, 'pelapor')->result();
		foreach ($query as $row) {
			$usr = $row->username;
			$usr_email = $row->email;
			$ps = $row->password;
		}

		if($usr != ($nm = $this->input->post('username'))) //cek apakah user ingin mengganti username
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[pelapor.username]|min_length[5]',[
				'is_unique' => 'username sudah terdaftar dalam sistem!',
				'required' => '%s harus diisi!',
				'min_length' => '%s minimal 5 karakter']);
		}
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]',[
				'required' => '%s harus diisi!',
				'min_length' => '%s minimal 5 karakter']);
		}

		if($usr_email != ($eml = $this->input->post('email'))) //cek apakah user ingin mengganti email
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pelapor.email]',[
				'is_unique' => 'Email sudah terdaftar dalam sistem!',
				'required' => '%s harus diisi!',
				'valid_email' => 'masukkan %s yang valid']);
		}
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
				'required' => '%s harus diisi!',
				'valid_email' => 'masukkan %s yang valid']);
		}
		
		$this->form_validation->set_rules('nama', 'Nama', 'required',['required' => '%s harus diisi!']);

		if($this->input->post('pass1') == TRUE)
		{
			$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]',[
				'matches' => 'Password tidak sama!',
				'min_length' => 'Password terlalu pendek'] );
			$this->form_validation->set_rules('pass2', 'Password Verification', 'required|trim|matches[pass1]');
			$ps = $this->input->post('pass1');

		}


		if($this->form_validation->run() == FALSE)
		{

			$data['judul'] = "Ubah Data Akun";
			$this->load->view('templet_user/header_user', $data);
			nav();
			$this->load->view('v_kelola_akun', $data);
			$this->load->view('templet_user/footer_user');
		}
		else
		{

			$data =[
				'username' => $this->input->post('username'),
				'password' => $ps,
				'nama_pelapor' => $this->input->post('nama'),
				'email' => $this->input->post('email')
			];

			$this->m_pelapor->update_data($id, $data, 'pelapor');
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
				Selamat! Data akun berhasil diperbaharui!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;
				</span>
				</button>
				</div>'); //flash data untuk alret!
			redirect('pelapor/kelola_akun');
		}
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Andah sudah Logout!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		redirect('akses/login');
	}
}
?>