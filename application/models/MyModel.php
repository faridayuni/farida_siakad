<?php


/**
 * 
 */
class MyModel extends CI_Model
{

	public function login_mahasiswa($uname, $pswd)
	{
		return $this->db->get_where('t_mahasiswa', ['username' => $uname, 'password' => $pswd])->result_array();
	}

	public function login_dosen($uname, $pswd)
	{
		return $this->db->get_where('t_dosen', ['username' => $uname, 'password' => $pswd])->result_array();
	}

	public function login_staff($uname, $pswd)
	{
		return $this->db->get_where('t_staff', ['username' => $uname, 'password' => $pswd])->result_array();
	}
}
