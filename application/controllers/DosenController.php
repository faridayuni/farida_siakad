<?php

class DosenController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Dosen', 'M_Matakuliah']);
        if ($this->session->userdata('isDosen') == "") {
            redirect('LoginController/index');
        }
    }

    public function index()
    {
        $data1['sess'] = $this->session->userdata('isDosen');
        $id = $data1['sess'][0]['id_nidn'];
        $data = array(
            'sess' => $this->session->userdata('isDosen'),
            'dosen' => $this->M_Dosen->id_dosen($id),
            'jumlah' => $this->M_Dosen->get_pengumuman(),
            'title' => 'Siakad Dosen-Dashboard'
        );
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/dashboard_dosen', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function show_khs()
    {

        $data1['sess'] = $this->session->userdata('isDosen');
        $id = $data1['sess'][0]['id_nidn'];
        $data = array(
            'sess' => $this->session->userdata('isDosen'),
            'khs' =>  $this->M_Dosen->tampilDataKHS($id),
            'no' => 1,
            'title' => 'Siakad Dosen-Nilai'
        );
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/tampil_khs', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function input_nilai_khs($id)
    {
        $data = array(
            'sess' => $this->session->userdata('isDosen'),
            'nilai' => $this->M_Dosen->input_nilai_khs($id),
            'title' => 'Siakad Dosen-Nilai'
        );
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/edit_khs', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function simpan_nilai_khs()
    {
        $id = $this->input->post('id');
        $data = [
            'id_nim' => $this->input->post('nim'),
            'id_matkul' => $this->input->post('id_matkul'),
            'periode' => $this->input->post('periode'),
            'nilai' => $this->input->post('nilai'),
            'bobot' => $this->input->post('bobot'),
        ];

        $query = $this->M_Dosen->simpan_nilai_khs($id, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Tambah data berhasil');
            redirect('DosenController/show_khs');
        } else {
            $this->session->set_flashdata('success', 'Tambah data Failed');
            redirect('DosenController/show_khs');
        }
    }

    public function tampil_pengumuman()
    {
        $data = array(
            'sess' => $this->session->userdata('isDosen'),
            'pengumuman' => $this->M_Dosen->tampil_pengumuman(),
            'no' => 1,
            'title' => 'Siakad Dosen-Nilai'
        );
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/pengumuman_dosen', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    ////////// PENGATURAN PAGE //////////
    public function setting_profil()
    {
        $data1['sess'] = $this->session->userdata('isDosen');
        $id = $data1['sess'][0]['id_nidn'];
        $data = array(
            'sess' =>  $this->session->userdata('isDosen'),
            'dosen' => $this->M_Dosen->get_dosen_id($id),
            'title' => 'Siakad Dosen-Profil'
        );

        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/setting_profil', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function edit_akun_dosen()
    {
        $file = $_FILES['foto']['name'];
        if ($file == "") {
            $data['sess'] = $this->session->userdata('isDosen');
            $id = $data['sess'][0]['id_nidn'];
            $data = [
                'nama_dosen' => $this->input->post('nama'),
                'ttl_dosen' => $this->input->post('ttl'),
                'no_telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
            ];
            $query = $this->M_Dosen->edit_akun_dosen($id, $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Update data succes');
                redirect('DosenController/index');
            } else {
                $this->session->set_flashdata('success', 'Update data failed');
                redirect('DosenController/index');
            }
        } else {
            $config['upload_path'] = './asset/image';
            $config['allowed_types'] = 'png|jpg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('success', 'Update data failed');
                redirect('DosenController/index');
            } else {
                $data['sess'] = $this->session->userdata('isDosen');
                $id = $data['sess'][0]['id_nidn'];
                $data = [
                    'nama_dosen' => $this->input->post('nama'),
                    'ttl_dosen' => $this->input->post('ttl'),
                    'no_telepon' => $this->input->post('telepon'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'foto' => $_FILES['foto']['name'],
                ];
                $query = $this->M_Dosen->edit_akun_dosen($id, $data);
                if ($query) {
                    $this->session->set_flashdata('success', 'Update data succes');
                    redirect('DosenController/index');
                } else {
                    $this->session->set_flashdata('success', 'Update data failed');
                    redirect('DosenController/index');
                }
            }
        }
    }

    public function setting_password()
    {
        $data = array(
            'sess' =>  $this->session->userdata('isDosen'),
            'title' => 'Siakad Dosen-Password'
        );
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/setting_password', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function edit_password()
    {
        $pswd1 = $this->input->post('pswd1');
        $pswd2 = $this->input->post('pswd2');

        if ($pswd1 == $pswd2) {
            $data['sess'] = $this->session->userdata('isDosen');
            $id = $data['sess'][0]['id_nidn'];
            $data = [
                'password' => $this->input->post('pswd2'),
            ];
            $query = $this->M_Dosen->edit_password($id, $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Update password  data succes');
                redirect('DosenController/index');
            } else {
                $this->session->set_flashdata('success', 'Update password  data failed');
                redirect('DosenController/index');
            }
        } else {
            $this->session->set_flashdata('success', 'Password Failed Update');
            redirect('DosenController/setting_password');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('isDosen');
        redirect('LoginController/index');
    }
}
