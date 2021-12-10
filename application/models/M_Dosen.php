<?php

class M_Dosen extends CI_Model
{
    public function id_dosen($id)
    {
        $this->db->select('*');
        $this->db->from('t_dosen');
        // $this->db->join('pelajaran', 'pelajaran.id_pelajaran = guru.id_pelajaran');
        // $this->db->join('kelas', 'kelas.id_kelas = guru.id_kelas');
        $this->db->where('id_nidn', $id);
        return $this->db->get()->row_array();
    }
    public function get_dosen()
    {
        return $this->db->get('t_dosen')->result_array();
    }
}
