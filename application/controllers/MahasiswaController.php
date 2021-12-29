<?php

class MahasiswaController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(['M_Mahasiswa', 'M_Matakuliah', 'M_Staff']);
        if ($this->session->userdata('isSiswa') == "") {
            redirect('LoginController/index');
        }
    }

    public function index()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'jumlah' => $this->M_Mahasiswa->get_pengumuman(),
            'title' => 'Siakad Mahasiswa-Dashboard'
        );
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/dashboard_mahasiswa', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil_pengumuman()
    {
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'pengumuman' => $this->M_Mahasiswa->tampil_pengumuman(),
            'no' => 1,
            'title' => 'Siakad Mahasiswa-Pengumuman'
        );
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/tampil_pengumuman', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    // public function tampil_krs()
    // {
    //     $data1 = array(
    //         'title' => 'KRS',
    //         'sess' => $this->session->userdata('isSiswa'),
    //         'periode' => $this->M_Mahasiswa->tampil_periode()
    //     );

    //     $this->load->view('mahasiswa/template/mhs_header', $data1);
    //     $this->load->view('mahasiswa/template/mhs_sidebar', $data1);
    //     $this->load->view('mahasiswa/filter_krs', $data1);
    //     $this->load->view('mahasiswa/template/mhs_footer');
    // }

    public function tampil()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'krs' => $this->M_Mahasiswa->tampilData($id),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'periode' => $this->M_Mahasiswa->tampil_periode(),
            'periodex' => $this->M_Mahasiswa->periode(),
            'no' => 1,
            'title' => 'Siakad Mahasiswa-KRS'
        );

        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/tampil_krs', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil2()
    {
        $npmnya = $this->input->post('npm');
        $semesternya = $this->input->post('smt');
        $data['sess'] = $this->session->userdata('isSiswa');
        $id = $data['sess'][0]['id_nim'];
        $data1 = array(
            'title' => 'Siakad Mahasiswa-KRS',
            'sess' => $this->session->userdata('isSiswa'),
            'krs' => $this->M_Mahasiswa->tampilData2($npmnya, $semesternya),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'periode' => $this->M_Mahasiswa->tampil_periode()

        );


        $this->load->view('mahasiswa/template/mhs_header', $data1);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data1);
        $this->load->view('mahasiswa/tampil_krs', $data1);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tambah_krs()
    {
        // $npmnya = $this->input->post('npm');
        $semesternya = $this->input->post('smt');
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'matkul' => $this->M_Mahasiswa->get_matakuliah($semesternya),
            'periode' => $this->M_Mahasiswa->periode(),
            'no' => 1,
            'title' => 'Siakad Mahasiswa-KRS'
        );

        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/tambah_krs', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function krs_penawaran()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'periode' => $this->M_Mahasiswa->periode(),
            'no' => 1,
            'title' => 'Siakad Mahasiswa-KRS'
        );
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/penawaran_krs', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function simpan_krs()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data['periode'] = $this->input->post('periode');
        $data['id_nim'] = $this->input->post('nim');
        $data['id_matkul'] = $this->input->post('nama_mk');

        $this->db->insert('t_krs_khs', $data);
        redirect('MahasiswaController/tampil', $id);
    }

    public function hapus_krs($krs)
    {
        $where = array('id_krskhs' => $krs);
        $this->M_Mahasiswa->hapus_krs($where);
        redirect('MahasiswaController/tampil');
    }

    public function tampil_khs()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' => $this->session->userdata('isSiswa'),
            'khs' => $this->M_Mahasiswa->tampil_khs($id),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'periode' => $this->M_Mahasiswa->tampil_periode(),
            'no' => 1,
            'title' => 'Siakad Mahasiswa-KHS'
        );
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/tampil_khs', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil_khs2()
    {
        $npmnya = $this->input->post('npm');
        $semesternya = $this->input->post('smt');
        $data['sess'] = $this->session->userdata('isSiswa');
        $id = $data['sess'][0]['id_nim'];
        $data1 = array(
            'title' => 'Siakad Mahasiswa-KHS',
            'sess' => $this->session->userdata('isSiswa'),
            'khs' => $this->M_Mahasiswa->tampil_khs2($npmnya, $semesternya),
            'mahasiswa' => $this->M_Mahasiswa->id_mahasiswa($id),
            'periode' => $this->M_Mahasiswa->tampil_periode()

        );

        $this->load->view('mahasiswa/template/mhs_header', $data1);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data1);
        $this->load->view('mahasiswa/tampil_khs', $data1);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    // public function cetak_khs()
    // {
    //     $data['sess'] = $this->session->userdata('isSiswa');
    //     $id = $data['sess'][0]['id_nim'];
    //     $data['khs'] = $this->M_Mahasiswa->tampil_khs($id);
    //     $data['siswa'] = $this->M_Mahasiswa->id_mahasiswa($id);
    //     $data['no'] = 1;
    //     $this->load->view('mahasiswa/cetak_khs', $data);
    // }

    ////////// PENGATURAN PAGE //////////
    public function setting_profil()
    {
        $data1['sess'] = $this->session->userdata('isSiswa');
        $id = $data1['sess'][0]['id_nim'];
        $data = array(
            'sess' =>  $this->session->userdata('isSiswa'),
            'mahasiswa' => $this->M_Mahasiswa->get_mahasiswa($id),
            'title' => 'Siakad Mahasiswa-Profil'
        );

        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/setting_profil', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function edit_akun_mahasiswa()
    {
        $file = $_FILES['foto']['name'];
        if ($file == "") {
            $data['sess'] = $this->session->userdata('isSiswa');
            $id = $data['sess'][0]['id_nim'];
            $data = [
                'nama_mhs' => $this->input->post('nama'),
                'ttl_mhs' => $this->input->post('ttl'),
                'no_telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'email_mhs' => $this->input->post('email'),
                'username' => $this->input->post('username'),
            ];
            $query = $this->M_Mahasiswa->edit_akun_mahasiswa($id, $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Update data succes');
                redirect('MahasiswaController/index');
            } else {
                $this->session->set_flashdata('success', 'Update data failed');
                redirect('MahasiswaController/index');
            }
        } else {
            $config['upload_path'] = './asset/image';
            $config['allowed_types'] = 'png|jpg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('success', 'Update data failed');
                redirect('MahasiswaController/index');
            } else {
                $data['sess'] = $this->session->userdata('isSiswa');
                $id = $data['sess'][0]['id_nim'];
                $data = [
                    'nama_mhs' => $this->input->post('nama'),
                    'ttl_mhs' => $this->input->post('ttl'),
                    'no_telepon' => $this->input->post('telepon'),
                    'alamat' => $this->input->post('alamat'),
                    'email_mhs' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'foto' => $_FILES['foto']['name'],
                ];
                $query = $this->M_Mahasiswa->edit_akun_mahasiswa($id, $data);
                if ($query) {
                    $this->session->set_flashdata('success', 'Update data succes');
                    redirect('MahasiswaController/index');
                } else {
                    $this->session->set_flashdata('success', 'Update data failed');
                    redirect('MahasiswaController/index');
                }
            }
        }
    }

    public function setting_password()
    {
        $data = array(
            'sess' =>  $this->session->userdata('isSiswa'),
            'title' => 'Siakad Mahasiswa-Password'
        );
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data);
        $this->load->view('mahasiswa/setting_password', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function edit_password()
    {
        $pswd1 = $this->input->post('pswd1');
        $pswd2 = $this->input->post('pswd2');

        if ($pswd1 == $pswd2) {
            $data['sess'] = $this->session->userdata('isSiswa');
            $id = $data['sess'][0]['id_nim'];
            $data = [
                'password' => $this->input->post('pswd2'),
            ];
            $query = $this->M_Mahasiswa->edit_password($id, $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Update password  data succes');
                redirect('MahasiswaController/index');
            } else {
                $this->session->set_flashdata('success', 'Update password  data failed');
                redirect('MahasiswaController/index');
            }
        } else {
            $this->session->set_flashdata('success', 'Password Failed Update');
            redirect('MahasiswaController/setting_password');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('isSiswa');
        redirect('LoginController/index');
    }
}
