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
		$data['admin'] = $this->M_Staff->get_staff($id);
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/dasboard', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function siswa()
	{

		$data['sess'] = $this->session->userdata('isStaff');
		$data['siswa'] = $this->M_Mahasiswa->get_siswa();
		$data['jurusan'] = $this->M_Staff->get_jurusan();
		$data['no'] = 1;
		$jumlah = count($data['siswa']);
		//pagination
		// $config['base_url'] = 'http://localhost/siakad/StaffController/cari_siswa/';
		// $config['total_rows'] = $jumlah;
		// $config['per_page'] = 2;
		// $this->pagination->initialize($config);

		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_mahasiswa', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_siswa()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['jurusan'] = $this->M_Staff->get_jurusan();
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tambah_siswa', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function do_siswa()
	{
		$this->form_validation->set_rules('nim', 'Nim', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required|max[4]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Alamat', 'required');
		if ($this->form_validation->run() == false) {
			$data['sess'] = $this->session->userdata('isStaff');
			$data['jurusan'] = $this->M_Staff->get_jurusan();
			$this->load->view('admin/template/admin_header');
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
		$data['sess'] = $this->session->userdata('isStaff');
		$data['jurusan'] = $this->M_Staff->get_jurusan();
		$data['siswa'] = $this->M_Mahasiswa->id_nim($id);
		//var_dump($data['siswa']);
		$this->load->view('admin/template/admin_header');
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
		$data['sess'] = $this->session->userdata('isStaff');
		$data['siswa'] = $this->M_Mahasiswa->id_nim($id);
		$this->load->view('admin/template/admin_header');
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

	// public function cari_siswa()
	// {
	// 	$data['sess'] = $this->session->userdata('isStaff');
	// 	$data['siswa'] = $this->M_Staff->cari_siswa();
	// 	$data['no'] = 1;
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/menu', $data);
	// 	$this->load->view('admin/siswa', $data);
	// 	$this->load->view('admin/template/footer');
	// }

	public function dosen()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['dosen'] = $this->M_Dosen->get_dosen();
		$data['no'] = 1;
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_dosen', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_dosen()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		//$data['pelajaran'] = $this->Models->get_pelajaran();
		//$data['kelas'] = $this->Models->get_kelas();
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tambah_dosen', $data);
		$this->load->view('admin/template/admin_footer');
	}

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
			$data['sess'] = $this->session->userdata('isStaff');
			// $data['pelajaran'] = $this->Models->get_pelajaran();
			// $data['kelas'] = $this->Models->get_kelas();
			$this->load->view('admin/template/admin_header');
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
		$data['sess'] = $this->session->userdata('isStaff');
		// $data['pelajaran'] = $this->Models->get_pelajaran();
		// $data['kelas'] = $this->Models->get_kelas();
		$data['dosen'] = $this->M_Dosen->id_dosen($id);
		$this->load->view('admin/template/admin_header');
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
		$data['sess'] = $this->session->userdata('isStaff');
		$data['dosen'] = $this->M_Dosen->id_dosen($id);
		$this->load->view('admin/template/admin_header');
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

	// public function search_dosen()
	// {
	// 	$cari = $this->input->post('cari');
	// 	$data['sess'] = $this->session->userdata('isStaff');
	// 	$data['dosen'] = $this->M_Staff->search_dosen($cari);
	// 	$data['no'] = 1;
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/menu', $data);
	// 	$this->load->view('admin/tampil_dosen', $data);
	// 	$this->load->view('admin/template/footer');
	// }

	public function matakuliah()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['matkul'] = $this->M_Staff->get_matakuliah();
		$data['no'] = 1;
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_matakuliah', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_matakuliah()
	{

		$data['sess'] = $this->session->userdata('isStaff');
		$data['matakuliah'] = $this->M_Staff->get_matakuliah();
		$data['kelas'] = $this->M_Staff->get_kelas();
		$data['dosen'] = $this->M_Dosen->get_dosen();
		$data['jurusan'] = $this->M_Staff->get_jurusan();


		// $data = [
		// 	'nama_pelajaran' => $this->input->post('nama'),
		// 	'jam_pelajaran' => $this->input->post('jam'),
		// ];

		// $query = $this->M_Staff->post_matakuliah($data);
		// if ($query) {
		// 	$this->session->set_flashdata('success', 'Tambah data berhasil');
		// 	redirect('StaffController/matakuliah');
		// } else {
		// 	$this->session->set_flashdata('success', 'Tambah data Failed');
		// 	redirect('StaffController/matakuliah');
		// }

		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tambah_matakuliah', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function post_matakuliah()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('smt', 'Semester', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');
		// $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
		if ($this->form_validation->run() == false) {
			$data['sess'] = $this->session->userdata('isStaff');
			$data['kelas'] = $this->M_Staff->get_kelas();
			$data['dosen'] = $this->M_Dosen->get_dosen();
			$data['jurusan'] = $this->M_Staff->get_jurusan();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/menu', $data);
			$this->load->view('admin/tambah_matakuliah', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = [
				'id_matkul' => $this->input->post('id'),
				'nama_matkul' => $this->input->post('nama'),
				'semester' => $this->input->post('smt'),
				'sks' => $this->input->post('sks'),
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
		$data['sess'] = $this->session->userdata('isStaff');
		$data['matakuliah'] = $this->M_Staff->edit_matakuliah($id);
		$data['kelas'] = $this->M_Staff->get_kelas();
		$data['dosen'] = $this->M_Dosen->get_dosen();
		$data['jurusan'] = $this->M_Staff->get_jurusan();
		$this->load->view('admin/template/admin_header');
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


	// public function search_matakuliah()
	// {
	// 	$cari = $this->input->post('cari');
	// 	$data['sess'] = $this->session->userdata('isStaff');
	// 	$data['matakuliah'] = $this->M_Staff->search_matakuliah($cari);
	// 	$data['no'] = 1;
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/menu', $data);
	// 	$this->load->view('admin/tampil_matakuliah', $data);
	// 	$this->load->view('admin/template/footer');
	// }

	public function jurusan()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['jurusan'] = $this->M_Staff->get_jurusan();
		$data['no'] = 1;
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_jurusan', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_jurusan()
	{

		$data['sess'] = $this->session->userdata('isStaff');
		$data['jurusan'] = $this->M_Staff->get_jurusan();

		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tambah_jurusan', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function post_jurusan()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data['sess'] = $this->session->userdata('isStaff');
			$data['jurusan'] = $this->M_Staff->get_jurusan();
			$this->load->view('admin/template/admin_header');
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

	public function kelas()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['kelas'] = $this->M_Staff->get_kelas();
		$data['no'] = 1;
		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tampil_kelas', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function tambah_kelas()
	{

		$data['sess'] = $this->session->userdata('isStaff');
		$data['kelas'] = $this->M_Staff->get_kelas();

		$this->load->view('admin/template/admin_header');
		$this->load->view('admin/template/admin_sidebar', $data);
		$this->load->view('admin/tambah_kelas', $data);
		$this->load->view('admin/template/admin_footer');
	}

	public function post_kelas()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|max[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data['sess'] = $this->session->userdata('isStaff');
			$data['kelas'] = $this->M_Staff->get_kelas();
			$this->load->view('admin/template/admin_header');
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

	public function pengumuman()
	{
		$data['sess'] = $this->session->userdata('isStaff');
		$data['pengumuman'] = $this->M_Staff->get_pengumuman();
		$data['no'] = 1;
		$this->load->view('admin/template/admin_header');
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
			// 'status' => 1,
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

	public function logout()
	{
		$this->session->unset_userdata('isStaff');
		redirect('LoginController/index');
	}
}
