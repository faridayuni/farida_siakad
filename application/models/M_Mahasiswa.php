<?php

class M_Mahasiswa extends CI_Model
{
    public function id_mahasiswa($id)
    {
        $this->db->select('* , t_jurusan.nama, t_matakuliah.hari');
        $this->db->from('t_mahasiswa');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
        $this->db->join('t_matakuliah', 't_matakuliah.id_jurusan=t_jurusan.id_jurusan');
        $this->db->where('id_nim', $id);
        return $this->db->get()->row_array();
    }

    public function periode()
    {
        $this->db->select('*');
        $this->db->from('t_periode');
        $this->db->where('status', 'Y');
        return $this->db->get()->result_array();
    }

    public function tampil_periode()
    {
        $this->db->select('*');
        $this->db->from('t_periode');
        // $this->db->where('status', 'Y');
        return $this->db->get()->result_array();
    }


    public function get_siswa()
    {

        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
        // return $this->db->get('t_mahasiswa')->result_array();
        return $this->db->get()->result_array();
    }

    public function get_pengumuman()
    {
        $this->db->from('t_pengumuman');
        $this->db->where('tujuan', 'Mahasiswa');
        return $this->db->get()->num_rows();
    }

    public function tampil_pengumuman()
    {
        $this->db->select('*');
        $this->db->from('t_pengumuman');
        $this->db->where('tujuan', 'Mahasiswa');
        // $this->db->where('status', 1);
        return $this->db->get()->result_array();
    }

    public function tampilData()
    {
        $this->db->select('t_matakuliah.id_matkul, t_matakuliah.nama_matkul, 
        t_matakuliah.sks, t_krs_khs.id_krskhs, t_matakuliah.hari, t_matakuliah.jam_mulai, t_matakuliah.jam_selesai,
        t_matakuliah.semester, t_periode.periode, t_periode.ket');
        $this->db->from('t_krs_khs');
        $this->db->JOIN('t_matakuliah', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $this->db->JOIN('t_periode', 't_periode.id_periode=t_krs_khs.periode');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilData2($npm, $smt)
    {
        $where = array('id_nim' => $npm, 'id_periode' => $smt);
        $this->db->where($where);
        $this->db->select('t_periode.periode, t_matakuliah.id_matkul, t_matakuliah.nama_matkul, 
        t_matakuliah.sks, t_krs_khs.id_krskhs, t_matakuliah.hari, t_matakuliah.jam_mulai, t_matakuliah.jam_selesai,
        t_matakuliah.semester');
        $this->db->from('t_krs_khs');
        $this->db->JOIN('t_matakuliah', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $this->db->JOIN('t_periode', 't_periode.id_periode=t_krs_khs.periode');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_matakuliah($smt)
    {
        // $where = array('ket' => $smt);
        $this->db->where('ket', $smt);
        $this->db->select('t_matakuliah.id_matkul, t_matakuliah.nama_matkul, t_matakuliah.semester, t_matakuliah.sks, 
        t_kelas.nama_kelas, t_dosen.nama_dosen, t_jurusan.nama, t_matakuliah.hari, t_matakuliah.jam_mulai, t_matakuliah.jam_selesai');
        $this->db->from('t_matakuliah');
        $this->db->join('t_dosen', 't_matakuliah.id_dosen = t_dosen.id_nidn');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_matakuliah.id_jurusan');
        $this->db->join('t_kelas', 't_kelas.id_kelas = t_matakuliah.id_kelas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapus_krs($where)
    {
        $this->db->where($where);
        $this->db->delete('t_krs_khs');
    }

    public function tampil_khs()
    {
        $this->db->select('t_matakuliah.nama_matkul, t_matakuliah.sks,
        t_matakuliah.semester, t_periode.periode, t_dosen.nama_dosen, t_krs_khs.nilai, t_krs_khs.bobot,
        (t_matakuliah.sks * t_krs_khs.bobot) as NxB');
        $this->db->from('t_krs_khs');
        $this->db->JOIN('t_matakuliah', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $this->db->JOIN('t_periode', 't_periode.id_periode=t_krs_khs.periode');
        $this->db->JOIN('t_dosen', 't_dosen.id_nidn=t_matakuliah.id_dosen');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_khs2($npm, $smt)
    {
        $where = array('id_nim' => $npm, 'id_periode' => $smt);
        $this->db->where($where);
        $this->db->select('t_matakuliah.nama_matkul, t_matakuliah.sks,
        t_matakuliah.semester, t_periode.periode, t_dosen.nama_dosen, t_krs_khs.nilai, t_krs_khs.bobot,
        (t_matakuliah.sks * t_krs_khs.bobot) as NxB');
        $this->db->from('t_krs_khs');
        $this->db->JOIN('t_matakuliah', 't_matakuliah.id_matkul=t_krs_khs.id_matkul');
        $this->db->JOIN('t_periode', 't_periode.id_periode=t_krs_khs.periode');
        $this->db->JOIN('t_dosen', 't_dosen.id_nidn=t_matakuliah.id_dosen');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mahasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $this->db->where('id_nim', $id);
        return $this->db->get()->row_array();
    }

    public function edit_akun_mahasiswa($id, $data)
    {
        $this->db->where('id_nim', $id);
        return $this->db->update('t_mahasiswa', $data);
    }

    public function edit_password($id, $data)
    {
        $this->db->where('id_nim', $id);
        return $this->db->update('t_mahasiswa', $data);
    }
}
