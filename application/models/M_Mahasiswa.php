<?php

class M_Mahasiswa extends CI_Model
{
    public function id_nim($id)
    {
        $this->db->select('*');
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
}
