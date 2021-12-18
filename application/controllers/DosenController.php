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
        $data['sess'] = $this->session->userdata('isDosen');
        $id = $data['sess'][0]['id_nidn'];
        $data['dosen'] = $this->M_Dosen->id_dosen($id);
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar');
        $this->load->view('dosen/dashboard_dosen', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function show_khs()
    {
        // $nidnnya = $this->input->post('nidn');
        // $data['sess'] = $this->session->userdata('isDosen');
        // $id = $data['sess'][0]['id_nidn'];
        // $data1 = array(
        //     'title' => 'Tampil KHS',
        //     'sess' => $this->session->userdata('isDosen'), 'khs' => $this->M_Dosen->tampilDataKHS($nidnnya),

        // );

        // $this->load->view('dosen/template/dsn_header', $data1);
        // $this->load->view('dosen/template/dsn_sidebar', $data1);
        // $this->load->view('dosen/tampil_khs', $data1);
        // $this->load->view('dosen/template/dsn_footer');

        $data['sess'] = $this->session->userdata('isDosen');
        $id = $data['sess'][0]['id_nidn'];
        $data['khs'] = $this->M_Dosen->tampilDataKHS($id);
        // $data['mahasiswa'] = $this->M_Mahasiswa->id_mahasiswa($id);
        // $data['periode'] = $this->M_Mahasiswa->tampil_periode();
        $data['no'] = 1;
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/tampil_khs', $data);
        $this->load->view('dosen/template/dsn_footer');
    }

    public function input_nilai_khs($id)
    {
        $data['sess'] = $this->session->userdata('isDosen');
        // $id = $data['sess'][0]['id_nidn'];
        $data['nilai'] = $this->M_Dosen->input_nilai_khs($id);
        // $data['siswa'] = $this->M_Mahasiswa->id_mahasiswa($id);
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
        $data['sess'] = $this->session->userdata('isDosen');
        $data['pengumuman'] = $this->M_Dosen->tampil_pengumuman();
        $data['no'] = 1;
        $this->load->view('dosen/template/dsn_header', $data);
        $this->load->view('dosen/template/dsn_sidebar', $data);
        $this->load->view('dosen/pengumuman_dosen', $data);
        $this->load->view('dosen/template/dsn_footer');
    }
}
