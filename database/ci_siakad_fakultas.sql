-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 04:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_siakad_fakultas`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE `t_dosen` (
  `id_nidn` varchar(10) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `ttl_dosen` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_dosen`
--

INSERT INTO `t_dosen` (`id_nidn`, `nama_dosen`, `ttl_dosen`, `no_telepon`, `alamat`, `email`, `username`, `password`, `foto`) VALUES
('0101088705', 'Guasman Tatawu, S.H., M.H', 'Kendari, 1 Agustus 1987', '82345678902', 'BTN Kendari Permai Blok D', 'guasman@gmail.com', '0101088705', '0101088705', '2119154833_lapatuju.jpg'),
('0101108811', 'Haris Yusuf, S.H., M.H', 'Makassar, 10 Januari 1988', '081313231235', 'Kampu Lama Kemaraya Kota Kendari', 'haris@gmail.com', '0101108811', '0101108811', '1923147771_haris.jpg'),
('0102088706', 'La Ino, S.Pd., M.Hum', 'Kendari, 2 Agustus 1987', '082345678901', 'BTN Kendari Permai Blok A', 'laino@gmail.com', '0102088706', '0102088706', '1496306046_ilham.jpg'),
('0103088807', 'Idaman, S.Ag., M.A', 'Kendari, 3 Agustus 1988', '082345678902', 'BTN Maleo Blok C No. 23 Kota Kendari', 'idaman@yahoo.com', '0103088807', '0103088807', '14532_ayib2.jpg'),
('0105058801', 'Deschika S.H., M.H', 'Kendari, 05 Mei 1988', '081313131315', 'Mandonga', 'deschika12345@gmail.com', '0105058801', '0105058801', '1730076664_deschika.jpg'),
('0106088703', 'Sulihin S.H., M.H', 'Raha, 06 Agustus 1987', '082345322345', 'BTN Kendari Permai', 'sulihin06@gmail.com', '0106088703', '0106088703', '170636974_arfa.png'),
('0107088704', 'Dr. Deity Yuningsih, S.H., M.H', 'Kendari, 7 Agustus 1987', '85241768934', 'BTN Maleo Blok C No. 11 Kota Kendari', 'deityyuningsih@gmail.com', '0107088704', '0107088704', '15215_monica.jpg'),
('0117088708', 'Nur Intan, S.H., M.H', 'Kendari, 17 Agustus 1987', '082345678907', 'BTN Tawang Alun', 'intan00@gmail.com', '0117088708', '0117088708', '917113626_nurintan.jpg'),
('0123048910', 'Sabrina Hidayat, S.H., M.H', 'Borneo, 23 April 1989', '83245324530', 'Jl. DI Panjaitan No. 13 Kota Kendari', 'sabrina@gmail.com', '0123048910', '0123048910', '695332656_siti.jpg'),
('0125127902', 'Idris Saputra S.H., M.H', 'Kendari, 25 Desember 1979', '082277019248', 'BTN Tawang Alun', 'idrissaputra9898@gmail.com', '0125127902', '0125127902', '5037_yan.jpg'),
('0127088709', 'Jabalnur, S.H., M.H', 'Kendari, 27 Agustus 1987', '082345678905', 'BTN Griya Asri Poasia', 'jabalnur@gmail.com', '0127088709', '0127088709', '1493061095_jabalnur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `id_jurusan` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `nama`) VALUES
('Jur_000', 'Umum'),
('Jur_001', 'Perdata'),
('Jur_002', 'Pidana'),
('Jur_003', 'Tata Negara');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` varchar(7) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`) VALUES
('kls_001', 'Kelas A'),
('kls_002', 'Kelas B');

-- --------------------------------------------------------

--
-- Table structure for table `t_krs_khs`
--

CREATE TABLE `t_krs_khs` (
  `id_krskhs` int(11) NOT NULL,
  `id_nim` varchar(10) NOT NULL,
  `id_matkul` varchar(6) NOT NULL,
  `periode` varchar(5) NOT NULL,
  `nilai` varchar(1) NOT NULL,
  `bobot` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_krs_khs`
--

INSERT INTO `t_krs_khs` (`id_krskhs`, `id_nim`, `id_matkul`, `periode`, `nilai`, `bobot`) VALUES
(22, 'H1A115001', 'mk_001', '4', 'B', 3),
(23, 'H1A115001', 'mk_002', '4', 'C', 2),
(24, 'H1A115001', 'mk_006', '4', 'B', 3),
(27, 'H1A115001', 'mk_004', '5', 'A', 4),
(32, 'H1A115001', 'mk_005', '3', 'A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `id_nim` varchar(10) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `ttl_mhs` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email_mhs` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `id_jurusan` varchar(7) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`id_nim`, `nama_mhs`, `ttl_mhs`, `no_telepon`, `alamat`, `email_mhs`, `username`, `password`, `id_jurusan`, `angkatan`, `foto`) VALUES
('H1A115001', 'Abdul Razak', 'Raha, 2 Juli 1998', '082345678909', 'Jl. Wulele No. 39 Kota Kendari', 'abdulrazak56@gmail.com', 'mahasiswa', '12345', 'Jur_003', 2015, '14532_ayib2.jpg'),
('H1A116002', 'Williamji', 'Kendari, 7 Januari 1998', '082277019248', 'Baruga', 'william723@yahoo.com', 'H1A116002', 'H1A116002', 'Jur_001', 2016, '15621_idris.jpg'),
('H1A116007', 'Jessica', 'Kendari, 29 Januari 1998', '081212121212', 'BTN Lacinta', 'jessicca898989@gmail.com', 'H1A116007', 'H1A116007', 'Jur_003', 2016, '14963_monica.jpg'),
('H1A116072', 'Jaka Malam', 'Konda, 2 Oktober 1996', '081212121212', 'Konda', 'jaka08@gmail.com', 'H1A116072', 'H1A116072', 'Jur_003', 2017, '5037_yan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_matakuliah`
--

CREATE TABLE `t_matakuliah` (
  `id_matkul` varchar(6) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `sks` int(1) NOT NULL,
  `id_kelas` varchar(7) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_jurusan` varchar(7) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_matakuliah`
--

INSERT INTO `t_matakuliah` (`id_matkul`, `nama_matkul`, `semester`, `ket`, `sks`, `id_kelas`, `id_dosen`, `id_jurusan`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
('mk_001', 'Pengantar Ilmu Hukum', 1, 'ganjil', 3, 'kls_001', 107088704, 'Jur_001', 'Senin', '08:00:00', '10:30:00'),
('mk_002', 'Bahasa Indonesia', 1, 'ganjil', 2, 'kls_001', 102088706, 'Jur_000', 'Senin', '11:00:00', '12:40:00'),
('mk_003', 'Ilmu Negara', 1, 'ganjil', 3, 'kls_001', 101088705, 'Jur_000', 'Selesa', '08:00:00', '10:30:00'),
('mk_004', 'Agama', 1, 'ganjil', 3, 'kls_002', 103088807, 'Jur_000', 'Rabu', '08:00:00', '09:40:00'),
('mk_005', 'Pancasila', 1, 'ganjil', 2, 'kls_002', 117088708, 'Jur_000', 'Kamis', '08:00:00', '09:40:00'),
('mk_006', 'Ko-Kurikuler', 1, 'ganjil', 1, 'kls_001', 127088709, 'Jur_000', 'Kamis', '09:40:00', '10:40:00'),
('mk_007', 'Pengantar Hukum Indonesia', 2, 'genap', 3, 'kls_002', 123048910, 'Jur_000', 'Jumat', '08:00:00', '10:30:00'),
('mk_008', 'Hukum Laut', 3, 'ganjil', 2, 'kls_002', 101108811, 'Jur_000', 'Senin', '12:30:00', '14:10:00'),
('mk_009', 'Hukum Administrasi Negara', 3, 'ganjil', 3, 'kls_002', 101088705, 'Jur_000', 'Senin', '14:30:00', '16:30:00'),
('mk_010', 'Antropologi Hukum', 3, 'ganjil', 2, 'kls_001', 103088807, 'Jur_000', 'Selesa', '10:00:00', '11:40:00'),
('mk_011', 'Hukum Perikatan', 3, 'ganjil', 2, 'kls_001', 117088708, 'Jur_000', 'Selesa', '00:30:00', '14:10:00'),
('mk_012', 'Hukum Agraria', 3, 'ganjil', 4, 'kls_001', 101088705, 'Jur_000', 'Kamis', '10:00:00', '12:30:00'),
('mk_013', 'Delik-Delik Dalam KUHP', 3, 'ganjil', 2, 'kls_001', 106088703, 'Jur_000', 'Kamis', '13:30:00', '15:10:00'),
('mk_014', 'Hukum Dagang', 3, 'ganjil', 2, 'kls_001', 117088708, 'Jur_000', 'Kamis', '15:30:00', '17:10:00'),
('mk_015', 'Hukum Perdata Dan Dagang Internasional', 5, 'ganjil', 2, 'kls_002', 101108811, 'Jur_001', 'Senin', '08:00:00', '09:40:00'),
('mk_016', 'Perbandingan Hukum Pidana', 5, 'ganjil', 2, 'kls_002', 106088703, 'Jur_002', 'Senin', '14:30:00', '16:10:00'),
('mk_017', 'Hukum Perbankan Dan Surat-Surat Berharga', 5, 'ganjil', 2, 'kls_001', 125127902, 'Jur_001', 'Selesa', '08:00:00', '09:40:00'),
('mk_018', 'Perbandingan Hukum Perdata', 5, 'ganjil', 2, 'kls_001', 105058801, 'Jur_001', 'Selesa', '11:00:00', '12:40:00'),
('mk_019', 'Skripsi', 7, 'ganjil', 6, 'kls_001', 101088705, 'Jur_000', 'Senin', '13:00:00', '15:30:00'),
('mk_020', 'Kuliah Kerja Profersi', 8, 'genap', 4, 'kls_001', 101088705, 'Jur_000', 'Jumat', '08:00:00', '10:30:00'),
('mk_021', 'Hukum Perdata', 2, 'genap', 3, 'kls_001', 125127902, 'Jur_000', 'Senin', '15:10:00', '18:10:00'),
('mk_022', 'Hukum Pidana', 2, 'genap', 3, 'kls_002', 106088703, 'Jur_000', 'Selesa', '15:10:00', '18:10:00'),
('mk_023', 'Hukum Islam', 2, 'genap', 3, 'kls_002', 103088807, 'Jur_000', 'Rabu', '15:10:00', '18:10:00'),
('mk_024', 'Hukum Tata Negara', 2, 'genap', 3, 'kls_001', 123048910, 'Jur_000', 'Kamis', '15:10:00', '18:10:00'),
('mk_025', 'Hukum Internasional', 2, 'genap', 3, 'kls_001', 105058801, 'Jur_000', 'Kamis', '15:10:00', '18:10:00'),
('mk_026', 'Etika Dan Tanggung Jawab Profesi', 4, 'genap', 2, 'kls_002', 107088704, 'Jur_000', 'Jumat', '15:00:00', '18:00:00'),
('mk_027', 'Hukum Dan Hak Asasi Manusia', 4, 'genap', 2, 'kls_002', 127088709, 'Jur_000', 'Selesa', '09:40:00', '11:40:00'),
('mk_028', 'Hukum Ketenagakerjaan', 4, 'genap', 2, 'kls_001', 101088705, 'Jur_003', 'Kamis', '09:00:00', '11:00:00'),
('mk_029', 'Hukum Penintesier', 6, 'genap', 3, 'kls_002', 106088703, 'Jur_002', 'Rabu', '09:00:00', '12:00:00'),
('mk_030', 'Praktek Peradilan Pidana', 6, 'genap', 4, 'kls_001', 106088703, 'Jur_000', 'Jumat', '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengumuman`
--

CREATE TABLE `t_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` varchar(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pengumuman`
--

INSERT INTO `t_pengumuman` (`id_pengumuman`, `judul`, `deskripsi`, `tujuan`, `tanggal`) VALUES
(1, 'Bayar UKT', 'Batas Pembayar UKT sampai tanggal 21 Desember 2021', 'Mahasiswa', '2021-12-11'),
(3, 'Input Nilai', 'Batas akhir penginputan nilai sampai tanggal 30 desember 2021', 'Dosen', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `t_periode`
--

CREATE TABLE `t_periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(5) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`id_periode`, `periode`, `ket`, `status`) VALUES
(1, '20201', 'ganjil', 'N'),
(2, '20202', 'genap', 'N'),
(3, '20211', 'ganjil', 'Y'),
(4, '20212', 'genap', 'N'),
(5, '20221', 'ganjil', 'N'),
(7, '20222', 'genap', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `t_staff`
--

CREATE TABLE `t_staff` (
  `id` int(11) NOT NULL,
  `nama_staff` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_staff`
--

INSERT INTO `t_staff` (`id`, `nama_staff`, `jabatan`, `username`, `password`, `foto`) VALUES
(1, 'Ariyana', 'Admin Siakad Fakultas Hukum', 'Admin_Siakad', '123456', 'siakad.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`id_nidn`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_krs_khs`
--
ALTER TABLE `t_krs_khs`
  ADD PRIMARY KEY (`id_krskhs`);

--
-- Indexes for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD PRIMARY KEY (`id_nim`);

--
-- Indexes for table `t_matakuliah`
--
ALTER TABLE `t_matakuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `t_pengumuman`
--
ALTER TABLE `t_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `t_periode`
--
ALTER TABLE `t_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `t_staff`
--
ALTER TABLE `t_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_krs_khs`
--
ALTER TABLE `t_krs_khs`
  MODIFY `id_krskhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_pengumuman`
--
ALTER TABLE `t_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_periode`
--
ALTER TABLE `t_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_staff`
--
ALTER TABLE `t_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
