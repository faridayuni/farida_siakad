<?php

class M_Matakuliah extends CI_Model
{
    // public function id_nim($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_mahasiswa');
    //     $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
    //     $this->db->where('id_nim', $id);
    //     return $this->db->get()->row_array();
    // }

    public function get_matakuliah()
    {
        $this->db->select('t_matakuliah.id_matkul, t_matakuliah.nama_matkul, t_matakuliah.semester, t_matakuliah.sks, 
        t_kelas.nama_kelas, t_dosen.nama_dosen, t_jurusan.nama, t_matakuliah.hari, t_matakuliah.jam_mulai, t_matakuliah.jam_selesai');
        $this->db->from('t_matakuliah');
        $this->db->join('t_dosen', 't_matakuliah.id_dosen = t_dosen.id_nidn');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_matakuliah.id_jurusan');
        $this->db->join('t_kelas', 't_kelas.id_kelas = t_matakuliah.id_kelas');
        return $this->db->get()->result_array();
    }

    public function get_matakuliah_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_matakuliah');
        $this->db->where('id_matkul', $id);
        return $this->db->get()->row_array();
    }

    public function tampilData($id)
    {
        $this->db->select('*');
        $this->db->from('t_matakuliah');
        $this->db->where('id_matkul', $id);
        return $this->db->get()->row_array();
    }
}
