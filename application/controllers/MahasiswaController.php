<?php

class MahasiswaController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(['M_Mahasiswa', 'M_Matakuliah']);
        if ($this->session->userdata('isSiswa') == "") {
            redirect('LoginController/index');
        }
    }

    public function index()
    {
        $data['sess'] = $this->session->userdata('isSiswa');
        $id = $data['sess'][0]['id_nim'];
        $data['mahasiswa'] = $this->M_Mahasiswa->id_mahasiswa($id);
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar');
        $this->load->view('mahasiswa/dashboard_mahasiswa', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil_pengumuman()
    {
        $data['sess'] = $this->session->userdata('isSiswa');
        $data['pengumuman'] = $this->M_Mahasiswa->tampil_pengumuman();
        $data['no'] = 1;
        $this->load->view('mahasiswa/template/mhs_header', $data);
        $this->load->view('mahasiswa/template/mhs_sidebar');
        $this->load->view('mahasiswa/tampil_pengumuman', $data);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil_krs()
    {
        $data1 = array(
            'title' => 'KRS',
            'sess' => $this->session->userdata('isSiswa')
        );

        $this->load->view('mahasiswa/template/mhs_header', $data1);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data1);
        $this->load->view('mahasiswa/filter_krs', $data1);
        $this->load->view('mahasiswa/template/mhs_footer');
    }

    public function tampil()
    {
        $npmnya = $this->input->post('npm');
        $data1 = array(
            'title' => 'Tampil KRS',
            'sess' => $this->session->userdata('isSiswa'), 'krs' => $this->M_Mahasiswa->tampilData($npmnya)
        );


        $this->load->view('mahasiswa/template/mhs_header', $data1);
        $this->load->view('mahasiswa/template/mhs_sidebar', $data1);
        $this->load->view('mahasiswa/tampil_krs', $data1);
        $this->load->view('mahasiswa/template/mhs_footer');
    }
}
