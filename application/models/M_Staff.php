<?php

class M_Staff extends CI_Model
{
    public function get_staff($id)
    {
        $this->db->select('*');
        $this->db->from('t_staff');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function post_siswa($data)
    {
        return $this->db->insert('t_mahasiswa', $data);
    }

    // public function jumlah_siswa()
    // {
    //     $this->db->select('id_nim, COUNT(id_nim) as total');
    // }

    // public function id_nim($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_mahasiswa');
    //     $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_mahasiswa.id_jurusan');
    //     $this->db->where('id_nim', $id);
    //     return $this->db->get()->row_array();
    // }

    public function edit_siswa1($id, $data)
    {
        $this->db->where('id_nim', $id);
        return $this->db->update('t_mahasiswa', $data);
    }

    public function edit_siswa($id, $data)
    {
        $this->db->where('id_nim', $id);
        return $this->db->update('t_mahasiswa', $data);
    }

    public function hapus_siswa($id)
    {
        $this->db->where('id_nim', $id);
        return $this->db->delete('t_mahasiswa');
    }

    public function cari_siswa()
    {
        $cari = $this->input->post('cari');
        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $this->db->like('angkatan', $cari);
        $this->db->or_like('id_nim', $cari);
        return $this->db->get()->result_array();
    }

    public function post_dosen($data)
    {
        return $this->db->insert('t_dosen', $data);
    }

    public function edit_dosen($id, $data)
    {
        $this->db->where('id_nidn', $id);
        return $this->db->update('t_dosen', $data);
    }

    public function edit_dosen1($id, $data)
    {
        $this->db->where('id_nidn', $id);
        return $this->db->update('t_dosen', $data);
    }

    public function hapus_dosen($id)
    {
        $this->db->where('id_nidn', $id);
        return $this->db->delete('t_dosen');
    }

    public function search_dosen($cari)
    {
        $this->db->select('*');
        $this->db->from('t_dosen');
        // $this->db->join('pelajaran', 'pelajaran.id_pelajaran = guru.id_pelajaran');
        // $this->db->join('kelas', 'kelas.id_kelas = guru.id_kelas');
        $this->db->like('nama_dosen', $cari);
        return $this->db->get()->result_array();
    }

    //MATAKULIAH
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

    public function post_matakuliah($data)
    {
        return  $this->db->insert('t_matakuliah', $data);
    }

    public function edit_matakuliah($id)
    {
        // $this->db->where('id_matkul', $id);
        // return $this->db->get('t_matakuliah')->row_array();
        $this->db->select('*');
        $this->db->from('t_matakuliah');
        $this->db->join('t_dosen', 't_matakuliah.id_dosen = t_dosen.id_nidn');
        $this->db->join('t_jurusan', 't_jurusan.id_jurusan = t_matakuliah.id_jurusan');
        $this->db->join('t_kelas', 't_kelas.id_kelas = t_matakuliah.id_kelas');
        $this->db->where('id_matkul', $id);
        return $this->db->get()->row_array();
    }

    public function simpanedit_matakuliah($id, $data)
    {
        $this->db->where('id_matkul', $id);
        return $this->db->update('t_matakuliah', $data);
    }

    public function delete_matakuliah($id)
    {
        $this->db->where('id_matkul', $id);
        return $this->db->delete('t_matakuliah');
    }

    public function search_matakuliah($cari)
    {
        $this->db->select('*');
        $this->db->from('t_matakuliah');
        $this->db->like('nama_matkul', $cari);
        return $this->db->get()->result_array();
    }

    //JURUSAN
    public function get_jurusan()
    {
        return $this->db->get('t_jurusan')->result_array();
    }

    public function post_jurusan($data)
    {
        return  $this->db->insert('t_jurusan', $data);
    }

    public function delete_jurusan($id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->delete('t_jurusan');
    }

    //KELAS
    public function get_kelas()
    {
        return $this->db->get('t_kelas')->result_array();
    }

    public function post_kelas($data)
    {
        return  $this->db->insert('t_kelas', $data);
    }

    public function delete_kelas($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->db->delete('t_kelas');
    }

    ///PERIODE
    public function get_periode()
    {
        return $this->db->get('t_periode')->result_array();
    }

    public function tambah_periode($data)
    {
        return $this->db->insert('t_periode', $data);
    }

    // public function edit_periode($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_periode');
    //     $this->db->where('id_periode', $id);
    //     return $this->db->get()->row_array();
    // }

    public function edit_periode($data, $id)
    {
        $this->db->where('id_periode', $id);
        $this->db->update('t_periode', $data);
        return TRUE;
    }


    //PENGUMUMAN
    public function get_pengumuman()
    {
        return $this->db->get('t_pengumuman')->result_array();
    }

    public function post_pengumuman($data)
    {
        return $this->db->insert('t_pengumuman', $data);
    }


    public function edit_pengumuman($id)
    {
        $this->db->select('*');
        $this->db->from('t_pengumuman');
        $this->db->where('id_pengumuman', $id);
        return $this->db->get()->row_array();
    }

    public function delete_pengumuman($id)
    {
        $this->db->where('id_pengumuman', $id);
        return $this->db->delete('t_pengumuman');
    }


    public function update_pengumuman($id, $data)
    {
        $this->db->where('id_pengumuman', $id);
        return $this->db->update('t_pengumuman', $data);
    }

    public function edit_admin($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('t_staff', $data);
    }

    public function edit_password($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('t_staff', $data);
    }
}
