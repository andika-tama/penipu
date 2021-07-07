<?php 

function is_logged_in_adm()
{
	$ci = get_instance();
	if(!$ci->session->userdata('username'))
	{
		redirect('akses/login');
	}
	else
	{
		if($ci->session->userdata('level') != "Admin")
		{
			echo "akses ditolak"; // buat halaman akses ditolak
			/*redirect('')*/
		}
	}
}

function is_logged_in_usr()
{
	$ci = get_instance();
	if(!$ci->session->userdata('username'))
	{
		redirect('akses/login');
	}
	else
	{
		if($ci->session->userdata('level') != "Pelapor")
		{
			echo "akses ditolak"; // buat halaman akses ditolak
			redirect('admin/dashboard');
		}
	}
}

function nav(){
		$ci = get_instance();
		if(!$ci->session->userdata('username'))
		{
			$ci->load->view('templet_user/navbar_user');
		}
		else
		{
			$ci->load->view('templet_user/navbar_login');
		}
	}

 ?>