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


	public function cari_kelas($cari)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->like('nama_kelas', $cari);
		return $this->db->get()->result_array();
	}

	public function post_kelas($kelas)
	{
		return $this->db->insert('kelas', $kelas);
	}

	public function delete_kelas($id)
	{
		$this->db->where('id_kelas', $id);
		return $this->db->delete('kelas');
	}

	public function cari_pengumuman($cari)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->like('nama_pengumuman', $cari);
		return $this->db->get()->result_array();
	}

	public function show_siswa($id)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('id_kelas', $id);
		$this->db->join('nilai', 'nilai.id_siswa = siswa.id_siswa');
		return $this->db->get()->result_array();
	}

	public function post_nilai($data)
	{
		return $this->db->insert('nilai', $data);
	}

	public function get_siswa_nilai($id)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('id_kelas', $id);
		return $this->db->get()->result_array();
	}

	public function show_nilai($id)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
		//$this->db->join('guru','guru.id_guru = nilai.id_guru');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		$this->db->where('id_guru', $id);
		return $this->db->get()->result_array();
	}

	public function all_nilai()
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
		$this->db->join('guru', 'guru.id_guru = nilai.id_guru');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		return $this->db->get()->result_array();
	}

	public function show_nilai_id($id)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
		$this->db->join('guru', 'guru.id_guru = nilai.id_guru');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		$this->db->where('id_nilai', $id);
		return $this->db->get()->row_array();
	}

	public function show_nilai_ids($cari)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		$this->db->join('guru', 'guru.id_guru = nilai.id_guru');
		$this->db->like('nama_siswa', $cari);
		return $this->db->get()->result_array();
	}

	public function ubah_nilai($id, $nilai)
	{
		$this->db->where('id_nilai', $id);
		return $this->db->update('nilai', $nilai);
	}

	public function hapus_nilai($id)
	{
		$this->db->where('id_nilai', $id);
		return $this->db->delete('nilai');
	}

	public function post_materi($data)
	{
		return $this->db->insert('materi', $data);
	}

	public function get_materi()
	{
		return $this->db->get_where('materi', ['status' => 'aktif'])->result_array();
	}

	public function get_materi_all()
	{
		return $this->db->get('materi')->result_array();
	}

	public function hapus_materi($id)
	{
		$this->db->where('id_materi', $id);
		return $this->db->delete('materi');
	}

	public function cari_materi($cari)
	{
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->like('nama_materi', $cari);
		$this->db->where('status', 'aktif');
		return $this->db->get()->result_array();
	}

	public function materi_id($id)
	{
		return $this->db->get_where('materi', ['id_materi', $id])->row_array();
	}

	public function ubah_materi($id, $data)
	{
		$this->db->where('id_materi', $id);
		return $this->db->update('materi', $data);
	}

	public function pengumuman_guru()
	{
		// $this->db->get_where('pengumuman',['status'=>1,'user'=>'	GURU'])->result_array();
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('user', 'GURU');
		$this->db->where('status', 1);
		return $this->db->get()->result_array();
	}

	public function cari_pengumumanguru($cari)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->like('nama_pengumuman', $cari);
		return $this->db->get()->result_array();
	}



	public function cari_pengumumansiswa($cari)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->like('nama_pengumuman', $cari);
		return $this->db->get()->result_array();
	}


	public function edit_admin_tu($id, $data)
	{
		$this->db->where('id_tu', $id);
		return $this->db->update('tu', $data);
	}

	public function get_nilai_siswa($id)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		//$this->db->join('siswa','siswa.id_siswa = nilai.id_siswa');
		$this->db->join('guru', 'guru.id_guru = nilai.id_guru');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		$this->db->where('id_siswa', $id);
		return $this->db->get()->result_array();
	}

	public function cari_nilai($cari, $id)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		//$this->db->join('siswa','siswa.id_siswa = nilai.id_siswa');
		$this->db->join('pelajaran', 'pelajaran.id_pelajaran = nilai.id_pelajaran');
		$this->db->join('guru', 'guru.id_guru = nilai.id_guru');
		$this->db->like('nama_pelajaran', $cari);
		$this->db->where('id_siswa', $id);
		return $this->db->get()->result_array();
	}
}
