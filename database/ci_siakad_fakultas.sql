-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
('2007050505', 'Deschika S.H., M.H', 'Kendari, 05 Mei 1988', '081313131315', 'Mandonga', 'deschika12345@gmail.com', '2007050505', '2007050505', '1730076664_deschika.jpg'),
('2015122502', 'Idris Saputra S.H., M.H', 'Kendari, 25 Desember 1979', '082277019248', 'BTN Tawang Alun', 'idrissaputra9898@gmail.com', '2015122502', '2015122502', '5037_yan.jpg'),
('2016010101', 'Sulihin S.H., M.H', 'Raha, 06 Agustus 1987', '082345322345', 'BTN Kendari Permai', 'sulihin06@gmail.com', '2016010101', '2016010101', '170636974_arfa.png');

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
('kls_001', 'Kelas A');

-- --------------------------------------------------------

--
-- Table structure for table `t_krs_khs`
--

CREATE TABLE `t_krs_khs` (
  `id_krskhs` int(11) NOT NULL,
  `id_mhs` varchar(10) NOT NULL,
  `id_matkul` varchar(6) NOT NULL,
  `semester` int(1) NOT NULL,
  `nilai` varchar(1) NOT NULL,
  `bobot` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

INSERT INTO `t_matakuliah` (`id_matkul`, `nama_matkul`, `semester`, `sks`, `id_kelas`, `id_dosen`, `id_jurusan`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
('mk_001', 'Hukum Perdata', 1, 2, 'kls_001', 2015122502, 'Jur_001', 'Senin', '12:00:00', '14:00:00'),
('mk_002', 'Hukum Pidana', 1, 2, 'kls_001', 2016010101, 'Jur_002', 'Selesa', '13:00:00', '15:00:00'),
('mk_003', 'Hukum Tata Negara', 1, 2, 'kls_001', 2015122502, 'Jur_003', 'Rabu', '13:00:00', '15:00:00');

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
(1, 'Ariyana', 'Admin Siakad', 'Ariyana', '12345', 'siakad.jpg');

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
  MODIFY `id_krskhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pengumuman`
--
ALTER TABLE `t_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_staff`
--
ALTER TABLE `t_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
