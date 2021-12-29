<?php

/**
 * 
 */
class StaffController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['M_Staff', 'M_Mahasiswa', 'M_Dosen', 'M_Matakuliah']);
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		if ($this->session->userdata('isStaff') == "") {
			redirect('LoginController/index');
		}
	}

	public function index()
	{

		$data['sess'] = $this->session->userdata('isStaff');
		$id = $data['sess'][0]['id'];
		$data = array(
			'sess' => $this->session->userdata('isStaff'),
			'admin' => $this->M_Staff->get_staff($id),
			'jumlah' => $this->db->from('t_mahasiswa')->get()->num_rows(),
			'jumlah_dosen' => $this->db->from('t_dosen')->get()->num_rows(),
			'title' => 'Siakad Admin-Dashboard'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/dasboard', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function siswa()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'siswa' => $this->M_Mahasiswa->get_siswa(),
			'jurusan' =>  $this->M_Staff->get_jurusan(),
			'no' => 1,
			'title' => 'Siakad Admin-Mahasiswa'
		);

		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_mahasiswa', $data);
		$this->load->view('admin/template/admin_footer');
	}

	// public function tambah_siswa()
	// {
	// 	$data = array(
	// 		'sess' =>  $this->session->userdata('isStaff'),
	// 		'jurusan' =>  $this->M_Staff->get_jurusan(),
	// 		'title' => 'Siakad Admin-Mahasiswa'
	// 	);

	// 	$this->load->view('admin/template/admin_header', $data);
	// 	$this->load->view('admin/template/admin_sidebar', $data);
	// 	$this->load->view('admin/tampil_mahasiswa', $data);
	// 	$this->load->view('admin/template/admin_footer');
	// }

	public function do_siswa()
	{
		$this->form_validation->set_rules('nim', 'Nim', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required|max[4]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Alamat', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'sess' =>  $this->session->userdata('isStaff'),
				'jurusan' =>  $this->M_Staff->get_jurusan(),
				'title' => 'Siakad Admin-Mahasiswa'
			);
			$this->load->view('admin/template/admin_header', $data);
			$this->load->view('admin/template/admin_sidebar', $data);
			$this->load->view('admin/tambah_siswa', $data);
			$this->load->view('admin/template/admin_footer');
		} else {
			$file = $_FILES['foto']['name'];
			if ($file == "") {
				echo "kosong";
			} else {
				$config['allowed_types'] = "png|jpg";
				$config['upload_path'] = "./asset/image/";
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "Kosong!";
				} else {
					$data = [
						'id_jurusan' => $this->input->post('jurusan'),
						'nama_mhs' => $this->input->post('nama'),
						'ttl_mhs' => $this->input->post('ttl'),
						'id_nim' => $this->input->post('nim'),
						'angkatan' => $this->input->post('angkatan'),
						'alamat' => $this->input->post('alamat'),
						'no_telepon' => $this->input->post('telepon'),
						'email_mhs' => $this->input->post('email'),
						'foto' => $_FILES['foto']['name'],
						'username' => $this->input->post('nim'),
						'password' => $this->input->post('nim'),
					];

					$query = $this->M_Staff->post_siswa($data);
					if ($query) {
						$this->session->set_flashdata('success', 'tambah data succes');
						redirect('StaffController/siswa');
					} else {
						$this->session->set_flashdata('success', 'tambah data failed');
						redirect('StaffController/siswa');
					}
				}
			}
		}
	}

	public function edit_siswa($id)
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'jurusan' =>  $this->M_Staff->get_jurusan(),
			'siswa' =>  $this->M_Mahasiswa->id_mahasiswa($id),
			'title' => 'Siakad Admin-Mahasiswa'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/edit_siswa', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function do_edit_siswa()
	{
		$foto = $_FILES['foto']['name'];
		if ($foto == "") {
			$id = $this->input->post('id');
			$data = [
				'id_jurusan' => $this->input->post('jurusan'),
				'nama_mhs' => $this->input->post('nama'),
				'ttl_mhs' => $this->input->post('ttl'),
				'id_nim' => $this->input->post('nim'),
				'angkatan' => $this->input->post('angkatan'),
				'alamat' => $this->input->post('alamat'),
				'no_telepon' => $this->input->post('telepon'),
				'email_mhs' => $this->input->post('email'),
				'username' => $this->input->post('nim'),
				'password' => $this->input->post('nim'),
			];
			$query = $this->M_Staff->edit_siswa1($id, $data);
			if ($query) {
				$this->session->set_flashdata('success', 'ubah data succes');
				redirect('StaffController/siswa');
			} else {
				$this->session->set_flashdata('success', 'ubah data failed');
				redirect('StaffController/siswa');
			}
		} else {
			$config['allowed_types'] = "png|jpg";
			$config['upload_path'] = "./asset/image/";
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Kosong!";
			} else {
				$id = $this->input->post('id');
				$data = [
					'id_jurusan' => $this->input->post('jurusan'),
					'nama_mhs' => $this->input->post('nama'),
					'ttl_mhs' => $this->input->post('ttl'),
					'id_nim' => $this->input->post('nim'),
					'angkatan' => $this->input->post('angkatan'),
					'alamat' => $this->input->post('alamat'),
					'no_telepon' => $this->input->post('telepon'),
					'email_mhs' => $this->input->post('email'),
					'username' => $this->input->post('nim'),
					'password' => $this->input->post('nim'),
				];

				$query = $this->M_Staff->edit_siswa($id, $data);
				if ($query) {
					$this->session->set_flashdata('success', 'ubah data succes');
					redirect('StaffController/siswa');
				} else {
					$this->session->set_flashdata('success', 'ubah data failed');
					redirect('StaffController/siswa');
				}
			}
		}
	}

	public function show_siswa($id)
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'siswa' =>  $this->M_Mahasiswa->id_mahasiswa($id),
			'title' => 'Siakad Admin-Mahasiswa'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/show_siswa', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function hapus_siswa($id)
	{
		$query = $this->M_Staff->hapus_siswa($id);
		if ($query) {
			$this->session->set_flashdata('success', 'hapus data succes');
			redirect('StaffController/siswa');
		} else {
			$this->session->set_flashdata('success', 'hapus data failed');
			redirect('StaffController/siswa');
		}
	}

	//DOSEN PAGEEEEE
	public function dosen()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'dosen' =>  $this->M_Dosen->get_dosen(),
			'no' => 1,
			'title' => 'Siakad Admin-Dosen'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_dosen', $data);
		$this->load->view('admin/template/admin_footer');
	}

	// public function tambah_dosen()
	// {
	// 	$data = array(
	// 		'sess' =>  $this->session->userdata('isStaff'),
	// 		'title' => 'Siakad Admin-Dosen'
	// 	);
	// 	$this->load->view('admin/template/admin_header', $data);
	// 	$this->load->view('admin/template/admin_sidebar', $data);
	// 	$this->load->view('admin/tambah_dosen', $data);
	// 	$this->load->view('admin/template/admin_footer');
	// }

	public function post_dosen()
	{
		$this->form_validation->set_rules('nidn', 'Nidn', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		// $this->form_validation->set_rules('tahun', 'Tahun', 'required|max[4]');
		$this->form_validation->set_rules('ttl', 'TTL', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'sess' =>  $this->session->userdata('isStaff'),
				'title' => 'Siakad Admin-Dosen'
			);
			$this->load->view('admin/template/admin_header', $data);
			$this->load->view('admin/template/admin_sidebar', $data);
			$this->load->view('admin/tambah_dosen', $data);
			$this->load->view('admin/template/admin_footer');
		} else {
			$file = $_FILES['foto']['name'];
			if ($file == "") {
				echo "Kosong";
			} else {
				$config['allowed_types'] = 'jpg|png';
				$config['upload_path'] = './asset/image';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "Failed";
				} else {
					$data = [
						// 'id_pelajaran' => $this->input->post('pelajaran'),
						'id_nidn' => $this->input->post('nidn'),
						'nama_dosen' => $this->input->post('nama'),
						//'thn_guru' => $this->input->post('tahun'),
						'ttl_dosen' => $this->input->post('ttl'),
						'no_telepon' => $this->input->post('telepon'),
						'alamat' => $this->input->post('alamat'),
						'email' => $this->input->post('email'),
						'foto' => $_FILES['foto']['name'],
						//'id_kelas' => $this->input->post('kelas'),
						'username' => $this->input->post('nidn'),
						'password' => $this->input->post('nidn'),
					];
					$query = $this->M_Staff->post_dosen($data);
					if ($query) {
						$this->session->set_flashdata('success', 'input data succes');
						redirect('StaffController/dosen');
					} else {
						$this->session->set_flashdata('success', 'input data failed');
						redirect('StaffController/dosen');
					}
				}
			}
		}
	}

	public function edit_dosen($id)
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'dosen' => $this->M_Dosen->id_dosen($id),
			'title' => 'Siakad Admin-Dosen'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/edit_dosen', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function simpan_dosen()
	{
		$foto = $_FILES['foto']['name'];
		if ($foto == "") {
			$id = $this->input->post('id');
			$data = [
				// 'id_pelajaran' => $this->input->post('pelajaran'),
				'id_nidn' => $this->input->post('nidn'),
				'nama_dosen' => $this->input->post('nama'),
				//'thn_guru' => $this->input->post('tahun'),
				'ttl_dosen' => $this->input->post('ttl'),
				'no_telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				//'id_kelas' => $this->input->post('kelas'),
				'username' => $this->input->post('nidn'),
				'password' => $this->input->post('nidn'),
			];
			$query = $this->M_Staff->edit_dosen($id, $data);
			if ($query) {
				$this->session->set_flashdata('success', 'Update data succes');
				redirect('StaffController/dosen');
			} else {
				$this->session->set_flashdata('success', 'Update data failed');
				redirect('StaffController/dosen');
			}
		} else {
			$config['upload_path'] = './asset/image';
			$config['allowed_types'] = 'png|jpg';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('success', 'Update data failed');
				redirect('StaffController/dosen');
			} else {
				$id = $this->input->post('id');
				$data = [

					// 'id_pelajaran' => $this->input->post('pelajaran'),
					'id_nidn' => $this->input->post('nidn'),
					'nama_dosen' => $this->input->post('nama'),
					//'thn_guru' => $this->input->post('tahun'),
					'ttl_dosen' => $this->input->post('ttl'),
					'no_telepon' => $this->input->post('telepon'),
					'alamat' => $this->input->post('alamat'),
					'email' => $this->input->post('email'),
					'foto' => $_FILES['foto']['name'],
					//'id_kelas' => $this->input->post('kelas'),
					'username' => $this->input->post('nidn'),
					'password' => $this->input->post('nidn'),
				];
				$query = $this->M_Staff->edit_dosen1($id, $data);
				if ($query) {
					$this->session->set_flashdata('success', 'Update data succes');
					redirect('StaffController/dosen');
				} else {
					$this->session->set_flashdata('success', 'Update data failed');
					redirect('StaffController/dosen');
				}
			}
		}
	}

	public function show_dosen($id)
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'dosen' => $this->M_Dosen->id_dosen($id),
			'title' => 'Siakad Admin-Dosen'
		);

		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/show_dosen', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function delete_dosen($id)
	{
		$query = $this->M_Staff->hapus_dosen($id);
		if ($query) {
			$this->session->set_flashdata('success', 'Delete Succes');
			redirect('StaffController/dosen');
		} else {
			$this->session->set_flashdata('success', 'Delete Failed');
			redirect('StaffController/dosen');
		}
	}

	//MATAKULIAH PAGE
	public function matakuliah()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'matkul' => $this->M_Staff->get_matakuliah(),
			'kelas' => $this->M_Staff->get_kelas(),
			'dosen' => $this->M_Dosen->get_dosen(),
			'jurusan' => $this->M_Staff->get_jurusan(),
			'no' => 1,
			'title' => 'Siakad Admin-Matakuliah'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_matakuliah', $data);
		$this->load->view('admin/template/admin_footer');
	}

	// public function tambah_matakuliah()
	// {
	// 	$data = array(
	// 		'sess' =>  $this->session->userdata('isStaff'),
	// 		'matakuliah' => $this->M_Staff->get_matakuliah(),
	// 		'kelas' => $this->M_Staff->get_kelas(),
	// 		'dosen' => $this->M_Dosen->get_dosen(),
	// 		'jurusan' => $this->M_Staff->get_jurusan(),
	// 		'title' => 'Siakad Admin-Matakuliah'
	// 	);

	// 	$this->load->view('admin/template/admin_header', $data);
	// 	$this->load->view('admin/template/admin_sidebar', $data);
	// 	$this->load->view('admin/tambah_matakuliah', $data);
	// 	$this->load->view('admin/template/admin_footer');
	// }

	public function post_matakuliah()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('smt', 'Semester', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');
		// $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'sess' =>  $this->session->userdata('isStaff'),
				'matakuliah' => $this->M_Staff->get_matakuliah(),
				'kelas' => $this->M_Staff->get_kelas(),
				'dosen' => $this->M_Dosen->get_dosen(),
				'jurusan' => $this->M_Staff->get_jurusan(),
				'title' => 'Siakad Admin-Matakuliah'
			);
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/menu', $data);
			$this->load->view('admin/tambah_matakuliah', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = [
				'id_matkul' => $this->input->post('id'),
				'nama_matkul' => $this->input->post('nama'),
				'semester' => $this->input->post('smt'),
				'sks' => $this->input->post('sks'),
				'ket' => $this->input->post('ket'),
				'id_kelas' => $this->input->post('kelas'),
				'id_dosen' => $this->input->post('dosen'),
				'id_jurusan' => $this->input->post('jurusan'),
				//'jadwal' => $this->input->post('jadwal'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai'),
			];
			$query = $this->M_Staff->post_matakuliah($data);
			if ($query) {
				$this->session->set_flashdata('success', 'input data succes');
				redirect('StaffController/matakuliah');
			} else {
				$this->session->set_flashdata('success', 'input data failed');
				redirect('StaffController/matakuliah');
			}
		}
	}

	public function edit_matakuliah($id)
	{

		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'matakuliah' => $this->M_Staff->edit_matakuliah($id),
			'kelas' => $this->M_Staff->get_kelas(),
			'dosen' => $this->M_Dosen->get_dosen(),
			'jurusan' => $this->M_Staff->get_jurusan(),
			'title' => 'Siakad Admin-Matakuliah'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/edit_matakuliah');
		$this->load->view('admin/template/admin_footer');
	}

	public function simpanedit_matakuliah()
	{
		$id = $this->input->post('id');
		$data = [
			'id_matkul' => $this->input->post('ids'),
			'nama_matkul' => $this->input->post('nama'),
			'semester' => $this->input->post('smt'),
			'sks' => $this->input->post('sks'),
			'ket' => $this->input->post('ket'),
			'id_kelas' => $this->input->post('kelas'),
			'id_dosen' => $this->input->post('dosen'),
			'id_jurusan' => $this->input->post('jurusan'),
			//'jadwal' => $this->input->post('jadwal'),
			'hari' => $this->input->post('hari'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
		];

		$query = $this->M_Staff->simpanedit_matakuliah($id, $data);
		if ($query) {
			$this->session->set_flashdata('success', 'Tambah data berhasil');
			redirect('StaffController/matakuliah');
		} else {
			$this->session->set_flashdata('success', 'Tambah data Failed');
			redirect('StaffController/matakuliah');
		}
	}

	public function delete_matakuliah($id)
	{
		$query = $this->M_Staff->delete_matakuliah($id);
		if ($query) {
			$this->session->set_flashdata('success', 'hapus data succes');
			redirect('StaffController/matakuliah');
		} else {
			$this->session->set_flashdata('success', 'hapus data failed');
			redirect('StaffController/matakuliah');
		}
	}

	////JURUSAN PAGE////////////////////
	public function jurusan()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'jurusan' => $this->M_Staff->get_jurusan(),
			'no' => 1,
			'title' => 'Siakad Admin-Jurusan'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_jurusan', $data);
		$this->load->view('admin/template/admin_footer');
	}

	// public function tambah_jurusan()
	// {
	// 	$data = array(
	// 		'sess' =>  $this->session->userdata('isStaff'),
	// 		'jurusan' => $this->M_Staff->get_jurusan(),
	// 		'title' => 'Siakad Admin-Jurusan'
	// 	);

	// 	$this->load->view('admin/template/admin_header', $data);
	// 	$this->load->view('admin/template/admin_sidebar', $data);
	// 	$this->load->view('admin/tambah_jurusan', $data);
	// 	$this->load->view('admin/template/admin_footer');
	// }

	public function post_jurusan()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'sess' =>  $this->session->userdata('isStaff'),
				'jurusan' => $this->M_Staff->get_jurusan(),
				'title' => 'Siakad Admin-Jurusan'
			);

			$this->load->view('admin/template/admin_header', $data);
			$this->load->view('admin/template/admin_sidebar', $data);
			$this->load->view('admin/tambah_jurusan', $data);
			$this->load->view('admin/template/admin_footer');
		} else {
			$data = [
				'id_jurusan' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
			];
			$query = $this->M_Staff->post_jurusan($data);
			if ($query) {
				$this->session->set_flashdata('success', 'input data succes');
				redirect('StaffController/jurusan');
			} else {
				$this->session->set_flashdata('success', 'input data failed');
				redirect('StaffController/jurusan');
			}
		}
	}

	public function delete_jurusan($id)
	{
		$query = $this->M_Staff->delete_jurusan($id);
		if ($query) {
			$this->session->set_flashdata('success', 'hapus data succes');
			redirect('StaffController/jurusan');
		} else {
			$this->session->set_flashdata('success', 'hapus data failed');
			redirect('StaffController/jurusan');
		}
	}


	///////// KEALAS PAGE //////////
	public function kelas()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'kelas' => $this->M_Staff->get_kelas(),
			'no' => 1,
			'title' => 'Siakad Admin-Kelas'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_kelas', $data);
		$this->load->view('admin/template/admin_footer');
	}

	// public function tambah_kelas()
	// {
	// 	$data = array(
	// 		'sess' =>  $this->session->userdata('isStaff'),
	// 		'kelas' => $this->M_Staff->get_kelas(),
	// 		'title' => 'Siakad Admin-Kelas'
	// 	);
	// 	$this->load->view('admin/template/admin_header', $data);
	// 	$this->load->view('admin/template/admin_sidebar', $data);
	// 	$this->load->view('admin/tambah_kelas', $data);
	// 	$this->load->view('admin/template/admin_footer');
	// }

	public function post_kelas()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'sess' =>  $this->session->userdata('isStaff'),
				'kelas' => $this->M_Staff->get_kelas(),
				'title' => 'Siakad Admin-Kelas'
			);
			$this->load->view('admin/template/admin_header', $data);
			$this->load->view('admin/template/admin_sidebar', $data);
			$this->load->view('admin/tambah_kelas', $data);
			$this->load->view('admin/template/admin_footer');
		} else {
			$data = [
				'id_kelas' => $this->input->post('id'),
				'nama_kelas' => $this->input->post('nama'),
			];
			$query = $this->M_Staff->post_kelas($data);
			if ($query) {
				$this->session->set_flashdata('success', 'input data succes');
				redirect('StaffController/kelas');
			} else {
				$this->session->set_flashdata('success', 'input data failed');
				redirect('StaffController/kelas');
			}
		}
	}

	public function delete_kelas($id)
	{
		$query = $this->M_Staff->delete_kelas($id);
		if ($query) {
			$this->session->set_flashdata('success', 'hapus data succes');
			redirect('StaffController/kelas');
		} else {
			$this->session->set_flashdata('success', 'hapus data failed');
			redirect('StaffController/kelas');
		}
	}

	//////////PERIODE PAGE////////////////////
	public function periode()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'periode' => $this->M_Staff->get_periode(),
			'no' => 1,
			'title' => 'Siakad Admin-Periode'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_periode', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_periode()
	{
		$data = [
			// 'id_periode' => $this->input->post('id'),
			'periode' => $this->input->post('periode'),
			'ket' => $this->input->post('keterangan'),
			'status' => $this->input->post('status'),
		];

		$query = $this->M_Staff->tambah_periode($data);
		if ($query) {
			$this->session->set_flashdata('success', 'Tambah data berhasil');
			redirect('StaffController/periode');
		} else {
			$this->session->set_flashdata('success', 'Tambah data Failed');
			redirect('StaffController/periode');
		}
	}

	public function edit_periode()
	{
		$this->form_validation->set_rules('mod_id', 'mod_id', 'required');
		$this->form_validation->set_rules('mod_name', 'mod_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', "Data Gagal Di Edit");
			redirect('StaffController/periode');
		} else {
			$data = array(
				"periode" => $_POST['mod_name'],
				"ket" => $_POST['mod_ket'],
				"status" => $_POST['mod_status']
			);

			$this->db->where('id_periode', $_POST['mod_id']);
			$this->db->update('t_periode', $data);
			$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
			redirect('StaffController/periode');
		}
	}

	public function delete_periode($id)
	{
		if ($id == "") {
			$this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
			redirect('StaffController/periode');
		} else {
			$this->db->where('id_periode', $id);
			$this->db->delete('t_periode');
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('StaffController/periode');
		}
	}

	////////// PENGUMUMAN PAGE ////////////
	public function pengumuman()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'pengumuman' => $this->M_Staff->get_pengumuman(),
			'no' => 1,
			'title' => 'Siakad Admin-Pengumuman'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_pengumuman', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_pengumuman()
	{
		$data = [
			'id_pengumuman' => $this->input->post('id'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tujuan' => $this->input->post('tujuan'),
			'tanggal' => $this->input->post('tanggal'),
		];

		$query = $this->M_Staff->post_pengumuman($data);
		if ($query) {
			$this->session->set_flashdata('success', 'Tambah data berhasil');
			redirect('StaffController/pengumuman');
		} else {
			$this->session->set_flashdata('success', 'Tambah data Failed');
			redirect('StaffController/pengumuman');
		}
	}

	public function edit_pengumuman($id)
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'pengumuman' => $this->M_Staff->edit_pengumuman($id),
			'no' => 1,
			'title' => 'Siakad Admin-Pengumuman'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/edit_pengumuman', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function update_pengumuman()
	{
		$id = $this->input->post('id');
		$data = [
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tujuan' => $this->input->post('tujuan'),
			'tanggal' => $this->input->post('tanggal'),
		];

		$query = $this->M_Staff->update_pengumuman($id, $data);
		if ($query) {
			$this->session->set_flashdata('success', 'Edit data berhasil');
			redirect('StaffController/pengumuman');
		} else {
			$this->session->set_flashdata('success', 'Edit data Failed');
			redirect('StaffController/pengumuman');
		}
	}

	public function delete_pengumuman($id)
	{
		$query = $this->M_Staff->delete_pengumuman($id);
		if ($query) {
			$this->session->set_flashdata('success', 'Delete data berhasil');
			redirect('StaffController/pengumuman');
		} else {
			$this->session->set_flashdata('success', 'Delete data Failed');
			redirect('StaffController/pengumuman');
		}
	}

	////////// PENGATURAN PAGE //////////
	public function setting_profil()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$id = $data['sess'][0]['id'];
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'admin' => $this->M_Staff->get_staff($id),
			'title' => 'Siakad Admin-Profil'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/setting_profil', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function edit_admin()
	{
		$file = $_FILES['foto']['name'];
		if ($file == "") {
			$data['sess'] = $this->session->userdata('isStaff');
			$id = $data['sess'][0]['id'];
			$data = [
				'nama_staff' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
			];
			$query = $this->M_Staff->edit_admin($id, $data);
			if ($query) {
				$this->session->set_flashdata('success', 'Update data succes');
				redirect('StaffController/index');
			} else {
				$this->session->set_flashdata('success', 'Update data failed');
				redirect('StaffController/index');
			}
		} else {
			$config['upload_path'] = './asset/image';
			$config['allowed_types'] = 'png|jpg';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('success', 'Update data failed');
				redirect('StaffController/index');
			} else {
				$data['sess'] = $this->session->userdata('isStaff');
				$id = $data['sess'][0]['id'];
				$data = [
					'nama_staff' => $this->input->post('nama'),
					'jabatan' => $this->input->post('jabatan'),
					'username' => $this->input->post('username'),
					'foto' => $_FILES['foto']['name'],
				];
				$query = $this->M_Staff->edit_admin($id, $data);
				if ($query) {
					$this->session->set_flashdata('success', 'Update data succes');
					redirect('StaffController/index');
				} else {
					$this->session->set_flashdata('success', 'Update data failed');
					redirect('StaffController/index');
				}
			}
		}
	}

	public function setting_password()
	{
		$data = array(
			'sess' =>  $this->session->userdata('isStaff'),
			'title' => 'Siakad Admin-Password'
		);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/setting_password', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function edit_password()
	{
		$pswd1 = $this->input->post('pswd1');
		$pswd2 = $this->input->post('pswd2');

		if ($pswd1 == $pswd2) {
			$data['sess'] = $this->session->userdata('isStaff');
			$id = $data['sess'][0]['id'];
			$data = [
				'password' => $this->input->post('pswd2'),
			];
			$query = $this->M_Staff->edit_password($id, $data);
			if ($query) {
				$this->session->set_flashdata('success', 'Update password  data succes');
				redirect('StaffController/index');
			} else {
				$this->session->set_flashdata('success', 'Update password  data failed');
				redirect('StaffController/index');
			}
		} else {
			$this->session->set_flashdata('success', 'Password Failed Update');
			redirect('StaffController/setting_password');
		}
	}



	public function logout()
	{
		$this->session->unset_userdata('isStaff');
		redirect('LoginController/index');
	}
}
