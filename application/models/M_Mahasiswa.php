<?php

class M_Mahasiswa extends CI_Model
{
    public function id_mahasiswa($id)
    {
        $this->db->select('* , t_jurusan.nama');
        $this->db->from('t_mahasiswa');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
        $this->db->where('id_nim', $id);
        return $this->db->get()->row_array();
    }

    public function get_siswa()
    {

        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
        // return $this->db->get('t_mahasiswa')->result_array();
        return $this->db->get()->result_array();
    }

    public function tampil_pengumuman()
    {
        $this->db->select('*');
        $this->db->from('t_pengumuman');
        $this->db->where('tujuan', 'Mahasiswa');
        // $this->db->where('status', 1);
        return $this->db->get()->result_array();
    }

    public function tampilData($npm)
    {
        $where = array('id_nim' => $npm);
        $this->db->where($where);
        $this->db->select('t_krs_khs.periode, t_matakuliah.id_matkul, t_matakuliah.nama_matkul, t_matakuliah.sks, t_krs_khs.id_krskhs');
        $this->db->from('t_krs_khs');
        $this->db->JOIN('t_matakuliah', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $query = $this->db->get();
        return $query->result();
    }
}
