<?php 
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['judul'] = "Login";
		$this->load->view('templet_user/header_user', $data);
		$this->load->view('templet_user/navbar_user');
		$this->load->view('v_login');
		$this->load->view('templet_user/footer_user');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Login";
			$this->load->view('templet_user/header_user', $data);
			$this->load->view('templet_user/navbar_user');
			$this->load->view('v_login');
			$this->load->view('templet_user/footer_user');
		}
		else
		{
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$level = $this->input->post('level');

			$user = $username;
			$pass = $password;

			if($level == "Admin")
			{
				$cek = $this->m_login->cek_login($user, $pass);

				if($cek->num_rows() > 0)
				{
					foreach ($cek->result() as $ck) {
						$s_data['id_admin'] = $ck->id_admin;
						$s_data['username'] = $ck->username;
						$s_data['email'] = $ck->email;
						$s_data['level'] = "Admin";

						$this->session->set_userdata($s_data);
					}
					redirect('admin/dashboard');
				}
				else
				{
					$this->session->set_flashdata('pesan', 'Maaf username dan password salah!');
					redirect('akses/login');
				}
			}

			//untuk login pengguna

			else
			{
				$cek = $this->m_login->cek_login_user($user, $pass);

				if($cek->num_rows() > 0)
				{
					foreach ($cek->result() as $ck) {
						$s_data['username'] = $username;
						$s_data['email'] = $ck->email;
						$s_data['level'] = "Pelapor";
						$s_data['id_user'] = $ck->id_user;
						$s_data['pelapor'] = $ck->nama_pelapor;

						$this->session->set_userdata($s_data);
					}
					redirect('Welcome');
				}
				else
				{
					$this->session->set_flashdata('pesan', 'Maaf username dan password salah!');
					redirect('akses/login');
				}
			}
			
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[pelapor.username]|min_length[5]',[
			'is_unique' => 'username sudah terdaftar dalam sistem!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pelapor.email]',[
			'is_unique' => 'Email sudah terdaftar dalam sistem!']);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]',[
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek'] );
		$this->form_validation->set_rules('pass2', 'Password Verification', 'required|trim|matches[pass1]');


		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Register";
			$this->load->view('templet_user/header_user', $data);
			$this->load->view('templet_user/navbar_user');
			$this->load->view('v_register');
			$this->load->view('Templet_user/footer_user');
		}
		else
		{
			$data =[
				'username' => $this->input->post('username'),
				'password' => $this->input->post('pass1'),
				'nama_pelapor' => $this->input->post('nama'),
				'email' => $this->input->post('email')
			];
			$this->db->insert('pelapor', $data);
			$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Selamat! Anda sudah terdaftar!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>'); //flash data untuk alret!
			redirect('akses/login');
		}
	}

	public function logout()
	{
		$this->session->set_flashdata('pesan', '<div 
				class="alert alert-success alert-dismissible fade show" role="alert">
					Andah sudah Logout!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button>
				</div>');
		$this->session->sess_destroy();
		
		redirect('akses/login');
	}

	public function lupa_pass()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
			'required' => '%s harus diisi!']);

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Lupa Password";
			$this->load->view('templet_user/header_user', $data);
			$this->load->view('templet_user/navbar_user');
			$this->load->view('v_lupa_pass');
			$this->load->view('templet_user/footer_user');
		}
		else
		{
			$username = $this->input->post('username');
			$user = $this->db->get_where('pelapor', ['username' => $username]) -> row_array();

			if($user)
			{
				$data_user=$this->m_login->get_email_pass($username)->result();
				foreach ($data_user as $dt) {
					$email = $dt->email;
					$pass = $dt->password;
				}

				$this->_kirimEmail($email, $pass, 'lupa_pass');
				$this->session->set_flashdata('pesan', 'Password sudah terkirim ke email anda!');
					redirect('akses/login');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'Maaf username tidak terdaftar!');
					redirect('akses/login/lupa_pass');
			}
		}
		
	}

	private function _kirimEmail($email,$pass, $type)
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
		

		if($type == 'lupa_pass')
		{
			$this->email->subject('Password Anda');
			$this->email->message('Password Anda adalah : <b>'.$pass. '</b> Terima kasih!');
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