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

    public function get_pengumuman()
    {
        $this->db->from('t_pengumuman');
        $this->db->where('tujuan', 'Dosen');
        return $this->db->get()->num_rows();
    }

    public function get_dosen()
    {
        return $this->db->get('t_dosen')->result_array();
    }

    public function tampilDataKHS($npm)
    {
        $where = array('id_dosen' => $npm);
        $this->db->where($where);
        $this->db->select('t_krs_khs.id_matkul, t_krs_khs.periode as id_periode, t_krs_khs.periode, t_matakuliah.nama_matkul, 
        t_matakuliah.sks, t_mahasiswa.nama_mhs, t_krs_khs.nilai, t_krs_khs.bobot,
        t_matakuliah.semester, t_krs_khs.id_nim, t_dosen.nama_dosen, t_periode.periode, t_krs_khs.id_krskhs');
        $this->db->from('t_matakuliah');
        $this->db->JOIN('t_krs_khs', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $this->db->JOIN('t_periode', 't_periode.id_periode=t_krs_khs.periode');
        $this->db->JOIN('t_dosen', 't_dosen.id_nidn=t_matakuliah.id_dosen');
        $this->db->JOIN('t_mahasiswa', 't_mahasiswa.id_nim=t_krs_khs.id_nim');
        $query = $this->db->get();
        return $query->result();
    }

    public function input_nilai_khs($id)
    {
        $this->db->select('*');
        $this->db->from('t_krs_khs');
        $this->db->where('id_krskhs', $id);
        return $this->db->get()->row_array();
    }

    public function simpan_nilai_khs($id, $data)
    {
        $this->db->where('id_krskhs', $id);
        return $this->db->update('t_krs_khs', $data);
    }

    public function tampil_pengumuman()
    {
        $this->db->select('*');
        $this->db->from('t_pengumuman');
        $this->db->where('tujuan', 'Dosen');
        // $this->db->where('status', 1);
        return $this->db->get()->result_array();
    }

    public function get_dosen_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_dosen');
        $this->db->where('id_nidn', $id);
        return $this->db->get()->row_array();
    }

    public function edit_akun_dosen($id, $data)
    {
        $this->db->where('id_nidn', $id);
        return $this->db->update('t_dosen', $data);
    }

    public function edit_password($id, $data)
    {
        $this->db->where('id_nidn', $id);
        return $this->db->update('t_dosen', $data);
    }
}
