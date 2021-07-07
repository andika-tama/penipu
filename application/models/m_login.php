<?php 
class M_login extends CI_Model{

	public function cek_login($username, $password)
	{
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		return $this->db->get('admin');
	}

	public function cek_login_user($username, $password)
	{
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		return $this->db->get('pelapor');
	}

	public function get_email_pass($username)
	{
		return $this->db->select('*')->from('pelapor')->where('username', $username)->get();
	}

	public function get_email_by_id($id)
	{
		return $this->db->select('email')->from('pelapor')->where('id_user', $id)->get();
	}
}


 ?>