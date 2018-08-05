-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 05:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mja`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahsp`
--

CREATE TABLE `ahsp` (
  `ahsp_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `ahsp_nama` varchar(100) NOT NULL,
  `ahsp_satuan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahsp`
--

INSERT INTO `ahsp` (`ahsp_id`, `pryk_id`, `ahsp_nama`, `ahsp_satuan`) VALUES
(1, 1, 'Analisa 1', 'm3'),
(3, 1, 'Analisa 2', 'm3');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `bhnbku_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `bhnbku_nama` varchar(50) NOT NULL,
  `bhnbku_satuan` varchar(5) NOT NULL,
  `bhnbku_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`bhnbku_id`, `pryk_id`, `bhnbku_nama`, `bhnbku_satuan`, `bhnbku_harga`) VALUES
(1, 1, 'Pasir', 'sak', 500000),
(8, 1, 'asdasd', 'zz', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `detail_ahsp_bahan_baku`
--

CREATE TABLE `detail_ahsp_bahan_baku` (
  `detahspbb_id` int(11) NOT NULL,
  `ahsp_id` int(11) NOT NULL,
  `bhnbku_id` int(11) NOT NULL,
  `detahspbb_koeff` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ahsp_bahan_baku`
--

INSERT INTO `detail_ahsp_bahan_baku` (`detahspbb_id`, `ahsp_id`, `bhnbku_id`, `detahspbb_koeff`) VALUES
(3, 1, 8, 1),
(5, 1, 1, 2),
(9, 3, 1, 1),
(10, 3, 1, 1.5),
(11, 1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_ahsp_upah`
--

CREATE TABLE `detail_ahsp_upah` (
  `detahspupah_id` int(11) NOT NULL,
  `ahsp_id` int(11) NOT NULL,
  `upah_id` int(11) NOT NULL,
  `detahspupah_koeff` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ahsp_upah`
--

INSERT INTO `detail_ahsp_upah` (`detahspupah_id`, `ahsp_id`, `upah_id`, `detahspupah_koeff`) VALUES
(1, 1, 5, 4),
(2, 1, 2, 3.5),
(3, 3, 5, 3),
(4, 3, 2, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jbtn_id` int(11) NOT NULL,
  `jbtn_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jbtn_id`, `jbtn_nama`) VALUES
(1, 'Manajer Proyek'),
(2, 'Manajer K3'),
(3, 'Direktur'),
(4, 'Site Manager'),
(5, 'Penanggung Jawab Teknis');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jdwl_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `jdwl_bobot` double NOT NULL,
  `jdwl_durasi` int(11) NOT NULL,
  `jdwal_sdm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_rencana`
--

CREATE TABLE `jadwal_rencana` (
  `jdwlren_id` int(11) NOT NULL,
  `jdwl_id` int(11) NOT NULL,
  `jdwlren_minggu` int(11) NOT NULL,
  `jdwlren_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sdm`
--

CREATE TABLE `jadwal_sdm` (
  `jdwlsdm_id` int(11) NOT NULL,
  `jdwl_id` int(11) NOT NULL,
  `jdwlsdm_minggu` int(11) NOT NULL,
  `jdwlsdm_jumlah_alokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian`
--

CREATE TABLE `kegiatan_harian` (
  `kgtnhari_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `kgtnhari_hari` int(11) NOT NULL,
  `kgtnhari_tanggal` date NOT NULL,
  `kgtnhari_jum_tenagakerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_bahan_baku`
--

CREATE TABLE `kegiatan_harian_bahan_baku` (
  `kgtnharibb_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `bhnbku_id` int(11) NOT NULL,
  `kgtnharibb_jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_pekerjaan`
--

CREATE TABLE `kegiatan_harian_pekerjaan` (
  `kgtnharipek_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `klien_id` int(11) NOT NULL,
  `klien_nama` varchar(70) NOT NULL,
  `klien_email` varchar(50) NOT NULL,
  `klien_no_tlp` varchar(13) NOT NULL,
  `klien_alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`klien_id`, `klien_nama`, `klien_email`, `klien_no_tlp`, `klien_alamat`) VALUES
(1, 'Dinas Kabupaten Garut', 'diskominfo@garutkab.go.id', '02624895000', 'Kabupaten Garut');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `peg_id` int(11) NOT NULL,
  `peg_nama` varchar(70) NOT NULL,
  `peg_email` varchar(50) NOT NULL,
  `peg_no_tlp` varchar(13) NOT NULL,
  `peg_domisili` varchar(50) NOT NULL,
  `peg_status` enum('Tetap','Kontrak') NOT NULL,
  `peg_hak_akses` tinyint(1) NOT NULL,
  `pgna_id` int(11) DEFAULT NULL,
  `jbtn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`peg_id`, `peg_nama`, `peg_email`, `peg_no_tlp`, `peg_domisili`, `peg_status`, `peg_hak_akses`, `pgna_id`, `jbtn_id`) VALUES
(1, 'Rizal Nur Rahman', 'manpro@gmail.com', '087825718829', 'Garut', 'Tetap', 1, 1, 1),
(4, 'Faisal Ridho', 'faisalridho@gmail.com', '08123311132', 'Garut', 'Tetap', 1, 3, 2),
(5, 'Totok Hermawan', 'totok@gmail.com', '081245678549', 'Bandung', 'Tetap', 1, 4, 3),
(6, 'Rizki Nanda Saputra', 'rizki@gmail.com', '087825468512', 'Garut', 'Tetap', 1, 5, 4),
(7, 'Yadi Supriyadi', 'yadi@gmail.com', '081345687512', 'Garut', 'Tetap', 1, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pgna_id` int(11) NOT NULL,
  `pgna_username` varchar(30) NOT NULL,
  `pgna_sandi` varchar(50) NOT NULL,
  `pgna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pgna_id`, `pgna_username`, `pgna_sandi`, `pgna_status`) VALUES
(1, 'manpro', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'mank3', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'direktur', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'siteman', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'penteknis', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `pryk_id` int(11) NOT NULL,
  `peg_id` int(11) NOT NULL,
  `klien_id` int(11) NOT NULL,
  `pryk_kode` varchar(19) NOT NULL,
  `pryk_nama` varchar(100) NOT NULL,
  `pryk_tgl_kontrak` date NOT NULL,
  `pryk_nilai_kontrak` int(11) NOT NULL,
  `pryk_jenis_proyek` enum('Perumahan','Gedung','Teknik Sipil') NOT NULL,
  `pryk_lokasi` varchar(150) NOT NULL,
  `pryk_durasi` int(11) NOT NULL,
  `pryk_tgl_mulai` date NOT NULL,
  `pryk_tgl_selesai` date DEFAULT NULL,
  `pryk_status` enum('Perencanaan','Pelaksanaan','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`pryk_id`, `peg_id`, `klien_id`, `pryk_kode`, `pryk_nama`, `pryk_tgl_kontrak`, `pryk_nilai_kontrak`, `pryk_jenis_proyek`, `pryk_lokasi`, `pryk_durasi`, `pryk_tgl_mulai`, `pryk_tgl_selesai`, `pryk_status`) VALUES
(1, 1, 1, '01/ABS/SPL/PGD/2018', 'Rumah Singgah Anak Jalanan', '2018-05-23', 798285000, 'Gedung', 'Kabupaten Garut', 180, '2018-05-23', '2018-06-01', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `rab_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `ahsp_id` int(11) DEFAULT NULL,
  `detrab_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`rab_id`, `pryk_id`, `strkpek_id`, `ahsp_id`, `detrab_harga`) VALUES
(4, 1, 6, NULL, 0),
(5, 1, 7, 3, 1642582),
(6, 1, 8, 3, 1642582),
(9, 1, 11, 1, 1394924);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_fisik`
--

CREATE TABLE `realisasi_fisik` (
  `reafsk_id` int(11) NOT NULL,
  `jdwlren_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `reafsk_volume` double NOT NULL,
  `reafsk_biaya_aktual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `risiko`
--

CREATE TABLE `risiko` (
  `rsko_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `rsko_nama` varchar(150) NOT NULL,
  `rsko_nilai_probabilitas` int(11) NOT NULL,
  `rsko_nilai_dampak` int(11) NOT NULL,
  `rsko_nilai_tingkat_resiko` double NOT NULL,
  `rsko_tingkat_resiko` varchar(6) NOT NULL,
  `rsko_pengendalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_pekerjaan`
--

CREATE TABLE `struktur_pekerjaan` (
  `strkpek_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `strkpek_no` varchar(15) DEFAULT NULL,
  `strkpek_nama` varchar(50) NOT NULL,
  `strkpek_id_pendahulu` int(11) DEFAULT NULL,
  `strkpek_volume` double NOT NULL,
  `strkpek_satuan` varchar(5) NOT NULL,
  `strkpek_status` enum('top','sub') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_pekerjaan`
--

INSERT INTO `struktur_pekerjaan` (`strkpek_id`, `pryk_id`, `strkpek_no`, `strkpek_nama`, `strkpek_id_pendahulu`, `strkpek_volume`, `strkpek_satuan`, `strkpek_status`) VALUES
(6, 1, '1.', 'Pekerjaan Persiapan', NULL, 30, 'g', 'top'),
(7, 1, '1.1.', 'Pekerjaan Gali', 6, 23, 'g', 'sub'),
(8, 1, '2.', 'Pemasangan Bowplank', NULL, 34, 'm2', 'sub'),
(11, 1, '1.2.', 'asda', 6, 15, 'm3', 'sub');

-- --------------------------------------------------------

--
-- Table structure for table `upah`
--

CREATE TABLE `upah` (
  `upah_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `upah_satuan` varchar(5) NOT NULL,
  `upah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upah`
--

INSERT INTO `upah` (`upah_id`, `pryk_id`, `jbtn_id`, `upah_satuan`, `upah_harga`) VALUES
(2, 1, 1, 'zz', 111111),
(5, 1, 2, 'zz', 1231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahsp`
--
ALTER TABLE `ahsp`
  ADD PRIMARY KEY (`ahsp_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`bhnbku_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `detail_ahsp_bahan_baku`
--
ALTER TABLE `detail_ahsp_bahan_baku`
  ADD PRIMARY KEY (`detahspbb_id`),
  ADD KEY `ahsp_id` (`ahsp_id`),
  ADD KEY `bhnbku_id` (`bhnbku_id`);

--
-- Indexes for table `detail_ahsp_upah`
--
ALTER TABLE `detail_ahsp_upah`
  ADD PRIMARY KEY (`detahspupah_id`),
  ADD KEY `ahsp_id` (`ahsp_id`),
  ADD KEY `upah_id` (`upah_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jbtn_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jdwl_id`),
  ADD KEY `pryk_id` (`pryk_id`),
  ADD KEY `strkpek_id` (`strkpek_id`);

--
-- Indexes for table `jadwal_rencana`
--
ALTER TABLE `jadwal_rencana`
  ADD PRIMARY KEY (`jdwlren_id`),
  ADD KEY `jdwl_id` (`jdwl_id`);

--
-- Indexes for table `jadwal_sdm`
--
ALTER TABLE `jadwal_sdm`
  ADD PRIMARY KEY (`jdwlsdm_id`),
  ADD KEY `jdwl_id` (`jdwl_id`);

--
-- Indexes for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD PRIMARY KEY (`kgtnhari_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `kegiatan_harian_bahan_baku`
--
ALTER TABLE `kegiatan_harian_bahan_baku`
  ADD PRIMARY KEY (`kgtnharibb_id`),
  ADD KEY `bhnbku_id` (`bhnbku_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`);

--
-- Indexes for table `kegiatan_harian_pekerjaan`
--
ALTER TABLE `kegiatan_harian_pekerjaan`
  ADD PRIMARY KEY (`kgtnharipek_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`),
  ADD KEY `strkpek_id` (`strkpek_id`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`klien_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`peg_id`),
  ADD KEY `pgna_id` (`pgna_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pgna_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`pryk_id`),
  ADD KEY `peg_id` (`peg_id`),
  ADD KEY `klien_id` (`klien_id`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`rab_id`),
  ADD KEY `pryk_id` (`pryk_id`),
  ADD KEY `strkpek_id` (`strkpek_id`),
  ADD KEY `ahsp_id` (`ahsp_id`);

--
-- Indexes for table `realisasi_fisik`
--
ALTER TABLE `realisasi_fisik`
  ADD PRIMARY KEY (`reafsk_id`),
  ADD KEY `jdwlren_id` (`jdwlren_id`),
  ADD KEY `strkpek_id` (`strkpek_id`);

--
-- Indexes for table `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`rsko_id`),
  ADD KEY `strkpek_id` (`strkpek_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  ADD PRIMARY KEY (`strkpek_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `upah`
--
ALTER TABLE `upah`
  ADD PRIMARY KEY (`upah_id`),
  ADD KEY `pryk_id` (`pryk_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahsp`
--
ALTER TABLE `ahsp`
  MODIFY `ahsp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `bhnbku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_ahsp_bahan_baku`
--
ALTER TABLE `detail_ahsp_bahan_baku`
  MODIFY `detahspbb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_ahsp_upah`
--
ALTER TABLE `detail_ahsp_upah`
  MODIFY `detahspupah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jbtn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jdwl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_rencana`
--
ALTER TABLE `jadwal_rencana`
  MODIFY `jdwlren_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_sdm`
--
ALTER TABLE `jadwal_sdm`
  MODIFY `jdwlsdm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  MODIFY `kgtnhari_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_bahan_baku`
--
ALTER TABLE `kegiatan_harian_bahan_baku`
  MODIFY `kgtnharibb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_pekerjaan`
--
ALTER TABLE `kegiatan_harian_pekerjaan`
  MODIFY `kgtnharipek_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `klien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pgna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `pryk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `rab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `realisasi_fisik`
--
ALTER TABLE `realisasi_fisik`
  MODIFY `reafsk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risiko`
--
ALTER TABLE `risiko`
  MODIFY `rsko_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  MODIFY `strkpek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `upah`
--
ALTER TABLE `upah`
  MODIFY `upah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahsp`
--
ALTER TABLE `ahsp`
  ADD CONSTRAINT `ahsp_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_2` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_ahsp_bahan_baku`
--
ALTER TABLE `detail_ahsp_bahan_baku`
  ADD CONSTRAINT `detail_ahsp_bahan_baku_ibfk_1` FOREIGN KEY (`ahsp_id`) REFERENCES `ahsp` (`ahsp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ahsp_bahan_baku_ibfk_2` FOREIGN KEY (`bhnbku_id`) REFERENCES `bahan_baku` (`bhnbku_id`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_ahsp_upah`
--
ALTER TABLE `detail_ahsp_upah`
  ADD CONSTRAINT `detail_ahsp_upah_ibfk_1` FOREIGN KEY (`ahsp_id`) REFERENCES `ahsp` (`ahsp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ahsp_upah_ibfk_2` FOREIGN KEY (`upah_id`) REFERENCES `upah` (`upah_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`strkpek_id`) REFERENCES `struktur_pekerjaan` (`strkpek_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_rencana`
--
ALTER TABLE `jadwal_rencana`
  ADD CONSTRAINT `jadwal_rencana_ibfk_1` FOREIGN KEY (`jdwl_id`) REFERENCES `jadwal` (`jdwl_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_sdm`
--
ALTER TABLE `jadwal_sdm`
  ADD CONSTRAINT `jadwal_sdm_ibfk_1` FOREIGN KEY (`jdwl_id`) REFERENCES `jadwal` (`jdwl_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`pgna_id`) REFERENCES `pengguna` (`pgna_id`) ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`klien_id`) REFERENCES `klien` (`klien_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`peg_id`) REFERENCES `pegawai` (`peg_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rab_ibfk_2` FOREIGN KEY (`strkpek_id`) REFERENCES `struktur_pekerjaan` (`strkpek_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rab_ibfk_3` FOREIGN KEY (`ahsp_id`) REFERENCES `ahsp` (`ahsp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `realisasi_fisik`
--
ALTER TABLE `realisasi_fisik`
  ADD CONSTRAINT `realisasi_fisik_ibfk_1` FOREIGN KEY (`strkpek_id`) REFERENCES `struktur_pekerjaan` (`strkpek_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `realisasi_fisik_ibfk_2` FOREIGN KEY (`jdwlren_id`) REFERENCES `jadwal_rencana` (`jdwlren_id`) ON UPDATE CASCADE;

--
-- Constraints for table `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risiko_ibfk_2` FOREIGN KEY (`strkpek_id`) REFERENCES `struktur_pekerjaan` (`strkpek_id`) ON UPDATE CASCADE;

--
-- Constraints for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  ADD CONSTRAINT `stuktur_pekerjaan_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `upah`
--
ALTER TABLE `upah`
  ADD CONSTRAINT `upah_ibfk_1` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `upah_ibfk_2` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
