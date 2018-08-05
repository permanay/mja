-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 11:15 AM
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
  `ahsp_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahsp`
--

INSERT INTO `ahsp` (`ahsp_id`, `ahsp_nama`) VALUES
(1, '1 m pas. bouwplank & pengukuran '),
(2, '1 m3 galian tanah biasa kedalaman 1 m (sni. edisi rev. 2008)'),
(3, '1 m3 urugan tanah kembali 1/3 x dari indeks pekerjaan galian ( sni. edisi rev. 2008)'),
(4, '1 m3 pek. pemadatan tanah, tanah di lokasi ( sni. edisi rev. 2008)'),
(5, '1 m3 urugan pasir  ( sni. edisi rev. 2008 )'),
(6, '1 m3 urugan sirtu  ( sni. edisi rev. 2008 )'),
(7, '1 m3 pasangan batu kosong / aanstamping ( sni. edisi rev. 2008 ) '),
(8, '1 m3 pasangan pondasi batu kali, 1 pc. : 3 ps. ( sni. edisi rev. 2008 ) '),
(9, '1 m3 pasangan pondasi batu kali, 1 pc. : 5 ps. ( sni. edisi rev. 2008 ) '),
(10, '1 m2 pasangan bata merah tebal 1/2 bata, 1 pc. : 3 ps. ( sni. edisi rev. 2008 ) '),
(11, '1 m2 pasangan bata merah tebal 1/2 bata, 1 pc. : 5 ps. ( sni. edisi rev. 2008) '),
(12, '1 m2 plesteran dinding 1 pc. : 3 ps; teb. 15 mm ( sni. edisi rev. 2008 )'),
(13, '1 m2 plesteran dinding 1 pc. : 5 ps; teb. 15 mm ( sni. edisi rev. 2008 )'),
(14, '1 m3 adukan beton tumbuk camp. 1pc : 3ps : 5kr ( sni. edisi rev. 2008)'),
(15, '1 m3 lantai kerja beton k-100 ( sni. edisi rev. 2008 )'),
(16, '1 m3 adukan beton k-175 ( sni. edisi rev. 2008 )'),
(17, '1 m3 adukan beton k-225 ( sni. edisi rev. 2008 )'),
(18, '1 m pagar sementara dari kayu tinggi 2 m'),
(19, '1 m pagar sementara dari seng gelombang tinggi 2 m'),
(20, '1 m pagar sementara dari kawat duri tinggi 1.8 m'),
(21, '1 m  pek. pengukuran kembali (site) & pemasangan bowplank'),
(22, '1 m2 pek. kantor direksi keet , dengan lantai plesteran'),
(23, '1 m2 pembuatan gudang semen dan alat - alat'),
(24, '1 m2 pembuatan rumah jaga / konstruksi kayu'),
(25, 'membersihkan lapangan dan perataan'),
(26, '1 m2 pembuatan bedeng buruh'),
(27, '1 m2 pembuatan bak adukan ( 40 x 50 x 20 ) cm'),
(28, '1 m2 pembuatan stegger dari bambu, ( 40 x 50 x 20 ) cm'),
(29, '1 m2 pembuatan jalan sementara'),
(30, '1 m3 bongkaran beton bertulang'),
(31, '1 m3 bongkaran dinding tembok bata merah'),
(32, '1 m3 pek. galian tanah biasa max kedalaman 1 m'),
(33, '1 m3 pek. galian tanah biasa max kedalaman 2 m'),
(34, '1 m3 pek. galian tanah biasa max kedalaman 3 m'),
(35, '1 m3 pek. galian tanah keras max kedalaman 1 m'),
(36, '1 m3 pek. galian tanah cadas max kedalaman 1 m'),
(37, '1 m3 pek. galian tanah lumpur max kedalaman 1 m'),
(38, '1 m2 pek. stripping 1 m'),
(39, '1 m3 pembuangan tanah sejauh 150 m'),
(40, '1 m3 urugan tanah kembali'),
(41, '1 m3 pemadatan tanah'),
(42, '1 m3 pek. urugan pasir'),
(43, '1 m3 pek. urugan tanah biasa'),
(44, '1 m3 pasangan batu kali 1 pc : 3ps'),
(45, '1 m3 pasangan batu kali 1 pc : 5ps'),
(46, 'memasang 1 m3 batu kosong (aanstamping)'),
(47, '1 m2 pasangan bata merah 1pc : 3ps 1 bata'),
(48, '1 m2 pasangan bata merah 1pc : 5ps 1 bata'),
(49, '1 m2 pasangan bata merah 1pc : 3ps 1/2 bata'),
(50, '1 m2 pasangan bata merah 1pc : 5ps 1/2 bata'),
(51, '1 m2 plesteran dinding 1pc : 3ps '),
(52, '1 m2 plesteran dinding 1pc : 5ps '),
(53, '1 m2 plesteran dinding 1pc : 0. 5kp : 3 ps, tebal 15 mm'),
(54, '1 m2 plesteran dinding 1pc : 3kp : 10ps, tebal 15 mm'),
(55, '1 m2 plesteran 0.5pc : 1kp : 4ps, tebal 15 mm'),
(56, '1 m2 plesteran 1kp : 1 sm : 1ps, tebal 15 mm'),
(57, '1 m2 plesteran 1kp : 1 sm : 2ps, tebal 15 mm'),
(58, '1 m2 plesteran 1pc : 2 ps, tebal 20 mm'),
(59, '1 m2 plesteran 1pc : 3 ps, tebal 20 mm'),
(60, '1 m2 plesteran 1pc : 4ps, tebal 20 mm'),
(61, '1 m2 plesteran 1pc : 5ps, tebal 20 mm'),
(62, '1 m2 plesteran 1pc : 6ps, tebal 20 mm'),
(63, '1 m2 plesteran 1pc : 2ps, tebal 25 mm'),
(64, '1 m2 plesteran 1pc : 3ps, tebal 25 mm'),
(65, '1 m2 plesteran 1pc : 4ps, tebal 25 mm'),
(66, '1 m2 plesteran 1pc : 5ps, tebal 25 mm'),
(67, '1 m2 plesteran 1pc : 2ps, tebal 30 mm'),
(68, '1 m2 plesteran 1pc : 3ps, tebal 30 mm'),
(69, '1 m2 plesteran 1pc : 4ps, tebal 30 mm'),
(70, '1 m2 plesteran 1pc : 5ps, tebal 30 mm'),
(71, '1 m2 berapen 1pc : 3ps, tebal 30 mm'),
(72, '1 m2 berapen 1pc : 5ps, tebal 15 mm'),
(73, '1 m2 pelesteran beton 1pc : 2ps, tebal 15 mm'),
(74, '1 m2 pelesteran beton 1pc : 3ps, tebal 15 mm'),
(75, '1 m2 pelesteran skoring 1pc : 2ps'),
(76, 'bahan'),
(77, 'tenaga'),
(78, '1 m2 pelesteran granito 1pc warna : 2 granito, tebal 10 mm'),
(79, '1 m2 pelesteran teraso 1pc warna : 2 batu teraso, tebal 10 mm'),
(80, '1 m2 pelesteran ciprat 1 pc : 2 ps'),
(81, '1 m2 pelesteran siar adukan 1 pc : 2 ps'),
(82, '1 m2 pelesteran waterfroof batacote 3 lapis '),
(83, '1 m2 plesteran dinding 1 : 3 + acian'),
(84, '1 m2 plesteran dinding 1 : 5 + acian'),
(85, '1m3 pasang kusen pintu dan jendela kayu jati'),
(86, '1m3 pasang kusen pintu dan jendela kayu borneo'),
(87, '1m3 pasang kusen pintu dan jendela kayu damar laut'),
(88, '1m2 pasang pintu klamp kayu kamper'),
(89, '1m2 pasang pintu klamp kayu borneo'),
(90, '1m2 pasang pintu panel kayu jati'),
(91, '1m2 pasang pintu panel kayu kamper'),
(92, '1m2 pasang pintu dan jendela kaca kayu jati'),
(93, '1m2 pasang pintu dan jendela kaca kayu kamper'),
(94, '1m2 pasang pintu dan jendela kaca kayu borneo'),
(95, '1m2 pasang pintu dan jendela jalusi kayu borneo'),
(96, '1m2 pasang pintu dan jendela jalusi kayu kamper'),
(97, '1m2 pasang pintu plywood rangkap, rangka kayu jati'),
(98, '1 m2 pengukuran dan pemasangan bouplank'),
(99, '1 m2 pembuatan direksikeet'),
(100, '1 m2 membersihkan lapangan dan perataan'),
(101, '1 m3 beton ready mix k-175'),
(102, '1 m3 beton ready mix k-225'),
(103, '1 kg tulangan beton dengan besi polos / ulir ( sni. edisi rev. 2008 )'),
(104, '1 m2.pasang bekisting untuk sloof, ringbalk dan kuda-kuda beton (sni.edisi rev. 2008)'),
(105, '1 m2. pasang bekisting untuk kolom ( sni. edisi rev. 2008)'),
(106, '1 m2. pasang bekisting untuk balok ( sni. edisi rev. 2008 )'),
(107, '1 m2. pasang bekisting untuk balok lintel'),
(108, '1 m2. pasang bekisting untuk lantai ( sni. edisi rev. 2008 )'),
(109, '1 m3 pasangan kusen pintu & jendela, kayu kls ii ( sni. edisi rev. 2008 )'),
(110, '1 m2 pasangan pintu panil, kayu kls ii ( sni. edisi rev. 2008 )'),
(111, '1 m2 pasangan pintu panil & jendela kaca, kayu kls ii ( sni. edisi rev. 2008 )'),
(112, '1 m2 pasangan dinding pemisah grc rangkap, rangka kayu kls ii ( sni edisi rev. 2008)'),
(113, '1 m2 pasang listplank grc'),
(114, '1 m pasang talang datar /jure seng bjls 28 lebar 90 cm'),
(115, '1 m2 pasang atap genteng palentong ex jatiwangi ( sni. edisi rev. 2008 )'),
(116, '1 m pasang genteng bubung palentong ex jatiwangi ( sni. edisi rev. 2008 )'),
(117, '1 m2 pasang atap genteng morando natural( sni. edisi rev. 2008 )'),
(118, '1 m pasang genteng bubung morando natural ( sni. edisi rev. 2008 )'),
(119, '1 m2 rangka langit - langit hollow 4 x 4 cm'),
(120, '1 m2 rangka langit - langit ( 50x 100 ) cm kayu kls ii ( sni. edisi rev. 2008)'),
(121, '1 m2 langit - langit gypsum ( 1200 x 2400 x 9 ) m, t = 9 mm ( sni. edisi rev. 2008)'),
(122, '1 m list langit - langit gypsum profil ( sni. edisi rev. 2008 )'),
(123, '1 m2 langit - langit grc t = 4 mm ( sni. edisi rev. 2008)'),
(124, '1 m list langit - langit kayu profil ( sni. edisi rev. 2008 )'),
(125, 'memasang 1 buah kloset jongkok porselen ( sni. edisi rev. 2002 )'),
(126, 'memasang 1 buah wastafel ( sni. edisi rev. 2002 )'),
(127, 'pasangan bak fiber + pas bata dan keramik'),
(128, 'memasang 1 m pipa pvc. type aw, dia 1/2\" ( sni. edisi rev. 2002 )'),
(129, 'memasang 1 m pipa pvc. type aw, dia 3\" ( sni. edisi rev. 2002 )'),
(130, 'memasang 1 m pipa pvc. type aw, dia 4\" ( sni. edisi rev. 2002 )'),
(131, 'memasang 1 bh. floor drain ( sni. edisi rev. 2002 )'),
(132, 'memasang 1 bh kran air ( sni. edisi rev. 2002)'),
(133, ' 1 unit septictank 1,5 x 1,5 x 1,5 m + rembesannya'),
(134, '1 m pekerjaan saluran air hujan dari pas bata + plesteran dan acian'),
(135, '1 m pasang kusen alumunium'),
(136, '1 m2 pintu alumunium strip lebar 8 cm'),
(137, '1 buah pasang engsel jendela kupu-kupu ( sni. edisi rev. 2002 )'),
(138, '1 buah pasang kait angin ( sni. edisi rev. 2002 )'),
(139, '1 buah pasang kunci selot ( sni. edisi rev. 2002 )'),
(140, '1 buah pasang tarikan jendela'),
(141, '1 pasang espanyolet pada pintu double'),
(142, '1 m2 pasangan kaca, t = 3 mm ( sni. edisi rev. 2002 )'),
(143, '1 m2 pasangan kaca, t = 5 mm ( sni. edisi rev. 2002 )'),
(144, '1 m2 pasangan lantai keramik , uk. 40x 40 cm ( sni. edisi rev. 2008 )'),
(145, '1 m2 pasangan lantai garanit , uk. 60 x 60 cm ( sni. edisi rev. 2008)'),
(146, '1 m2 pasangan lantai keramik , uk. 30x 30 cm ( sni. edisi rev. 2008 )'),
(147, '1 m2 pasangan lantai keramik (anti slip), uk. 20x 20 cm ( sni. edisi rev. 2008 )'),
(148, '1 m2 pasangan lantai keramik, uk. 20x 20 cm ( sni. edisi rev. 2008 )'),
(149, '1 m2 pasangan dinding keramik, uk. 20 x 25 cm ( sni. edisi rev. 2008 )'),
(150, '1 m2 pengecatan bidang kayu baru, 2x lapis penutup'),
(151, '1 m2 pengecatan bidang besi baru'),
(152, '1 m2 pengecatan bidang tembok baru, 2x lapis penutup'),
(153, '1 m2 pengecatan bidang tembok lama'),
(154, '1 m2 pengecatan bidang plapond baru'),
(155, '1 m2 lapisan aquaproof'),
(156, 'Biaya Administrasi, dan Dokumentasi');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `bhnbku_id` int(11) NOT NULL,
  `bhnbku_nama` varchar(150) NOT NULL,
  `bhnbku_satuan` varchar(5) NOT NULL,
  `bhnbku_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`bhnbku_id`, `bhnbku_nama`, `bhnbku_satuan`, `bhnbku_harga`) VALUES
(1, 'pasir urug', 'm3', 75000),
(2, 'pasir pasang', 'm3', 130000),
(3, 'pasir beton', 'm3', 170000),
(4, 'pasir batu ( sirtu )', 'm3', 90000),
(5, 'batu belah pondasi', 'm3', 100000),
(6, 'batu pecah mesin 1/2', 'm3', 300000),
(7, 'batu pecah mesin 2/3', 'm3', 250000),
(8, 'batu pecah mesin 3/5', 'm3', 200000),
(9, 'batu pecah mesin 5/7', 'm3', 180000),
(10, 'ready mix k-175', 'm3', 790000),
(11, 'ready mix k-225', 'm3', 840000),
(12, 'semen pc', 'kg', 1300),
(13, 'semen putih', 'kg', 2500),
(14, 'lem putih fox', 'kg', 15000),
(15, 'bata merah bakar kls i', 'bh', 570),
(16, 'besi beton u-24, rata - rata uk. dia 8 s/d 16 mm', 'kg', 9000),
(17, 'besi strip, uk. 3 x 30 mm x 6 m ( 4,21 kg )', 'kg', 15000),
(18, 'seng bjls 0.30, l = 55 cm ( 1 rol = 50 m )', 'm', 35000),
(19, 'kawat beton', 'kg', 20000),
(20, 'paku 1/2 - 1 cm', 'kg', 20000),
(21, 'paku uk. 2 - 3 cm', 'kg', 17000),
(22, 'paku uk. 2 - 5 cm', 'kg', 17000),
(23, 'paku uk. 3 - 6 cm', 'kg', 17000),
(24, 'profil alluminium ( kusen)', 'm', 120000),
(25, 'prem pintu profil alluminium', 'm', 130000),
(26, 'prem jendela profil alluminium', 'm', 120000),
(27, 'profil kaca', 'm', 70000),
(28, 'alumunium strip', 'm', 80000),
(29, 'skrup fixer', 'bh', 700),
(30, 'sealent', 'tube', 60000),
(31, 'engsel pintu \"unilon\" besar', 'bh', 25000),
(32, 'engsel jendela biasa', 'psg', 10000),
(33, 'hak angin kait biasa', 'bh', 8500),
(34, 'tarikan pintu stainless + kunci', 'bh', 150000),
(35, 'kunci pintu cap kuda terbang type besar', 'bh', 165000),
(36, 'kunci pintu km bulat alpha', 'bh', 55000),
(37, 'slot jendela', 'bh', 6000),
(38, 'slot pintu', 'bh', 6000),
(39, 'espanyolet/ slot tanam', 'psg', 45000),
(40, 'kaca polos 3 mm (asahi)', 'm2', 65000),
(41, 'kaca polos 5 mm (asahi)', 'm2', 80000),
(42, 'kayu beksiting', 'm3', 1130000),
(43, 'kayu balok albasia', 'm3', 1130000),
(44, 'kayu papan albasia', 'm3', 1130000),
(45, 'kayu kls i', 'm3', 6000000),
(46, 'kayu balok kls i', 'm3', 6000000),
(47, 'kayu papan kls i', 'm3', 6000000),
(48, 'kayu kls ii ( kihiang, puspa, kibanen, dll )', 'm3', 2500000),
(49, 'kayu balok kls ii', 'm3', 2500000),
(50, 'kayu papan kls ii', 'm3', 2500000),
(51, 'kayu kaso kls ii , uk. 5/7', 'm3', 2500000),
(52, 'dolken dia 5 s/d 7 cm', 'btg', 15000),
(53, 'dolken dia 8 s/d 10 cm', 'btg', 25000),
(54, 'list plafond 5 cm', 'm', 4000),
(55, 'triplek 3 mm, uk. 1,20 x 2,40', 'lbr', 50000),
(56, 'triplek 4 mm, uk. 1,20 x 2,40 ', 'lbr', 60000),
(57, 'teakwood 4 mm, uk. 1,20 x 2,40', 'lbr', 75000),
(58, 'plywood tebal 4 mm', 'lbr', 80000),
(59, 'multiplek 9 mm, uk. 1,20 x 2,40', 'lbr', 95000),
(60, 'wall paper lebar 50 cm', 'm', 30000),
(61, 'gypsum 120 x 240 t = 9 mm ex dn', 'lbr', 80000),
(62, 'gypsum 120 x 240 t = 9 mm ex luar', 'lbr', 75000),
(63, 'grc board 120 x 240 t = 4 mm', 'lbr', 60000),
(64, 'lisplank grc', 'm', 45000),
(65, 'genteng palentong, ex jatiwangi', 'bh', 2000),
(66, 'genteng bubung palentong ex jatiwangi', 'bh', 3000),
(67, 'genteng morando glazuur', 'bh', 5500),
(68, 'genteng bubung morando glazuur', 'bh', 7500),
(69, 'genteng morando natural', 'bh', 4000),
(70, 'genteng bubung morando natural', 'bh', 6000),
(71, 'keramik lantai 40x40, polis tile esenza', 'm2', 235000),
(72, 'keramik lantai 40x40, warna mulya', 'm2', 55000),
(73, 'keramik lantai 30 x30, putih polos mulya', 'm2', 48000),
(74, 'keramik lantai 30 x30, warna/corak', 'm2', 47000),
(75, 'keramik lantai 20 x20, warna/corak mulya (anti slip )', 'm2', 55000),
(76, 'keramik lantai 20 x 20, warna/corak mulya', 'm2', 55000),
(77, 'keramik dinding 20 x 25, warna/corak mulya', 'm2', 55000),
(78, 'granit dn 60x60', 'm2', 190000),
(79, 'granit alam ln ukuran kecil anpolis', 'm2', 200000),
(80, 'saklar broko tunggal standard ( 1 phase )', 'bh', 24000),
(81, 'saklar broko seri standard ( 1 phase )', 'bh', 18000),
(82, 'stop kontak broko standard ( 1 phase )', 'bh', 18000),
(83, 'stop kontak broko standard ( 3 phase )', 'bh', 24000),
(84, 'lampu pijar 25 watt + amature', 'bh', 15000),
(85, 'lampu sl 25 watt + amature', 'bh', 60000),
(86, 'lampu tl 40 watt + amature', 'bh', 85000),
(87, 'kabel nym 3 x 1,5 prima', 'roll', 300000),
(88, 'kabel nym 3 x 2,5 prima', 'roll', 350000),
(89, 'mcb 6 amper mg', 'bh', 45000),
(90, 'mcb 10 amper mg', 'bh', 60000),
(91, 'mcb 16 amper mg', 'bh', 75000),
(92, 'ampelas', 'bh', 4000),
(93, 'kwas 3\"', 'bh', 10000),
(94, 'rool cat', 'bh', 25000),
(95, 'cat tembok sanlex', 'kg', 20000),
(96, 'cat tembok vinilex', 'kg', 30000),
(97, 'cat kayu / besi avian', 'kg', 52000),
(98, 'meni kayu / besi bola mas', 'kg', 25000),
(99, 'aquaproof', 'kg', 50000),
(100, 'plint coat', 'ltr', 30000),
(101, 'dempul tembok ( plamuur )', 'kg', 7200),
(102, 'dempul kayu cap kucing', 'kg', 25000),
(103, 'pipa galvanis 1/2\"', 'btg', 151200),
(104, 'pipa galvanis 3/4\"', 'btg', 259200),
(105, 'pipa galvanis 1 1/2\"', 'btg', 561600),
(106, 'pipa pralon pvc. ( aw ) dia 1/2 \", sekulaitas maspion ', 'btg', 17500),
(107, 'pipa pralon pvc. ( aw ) dia 3/4 \", sekulaitas maspion ', 'btg', 21000),
(108, 'pipa pralon pvc. ( aw ) dia 1 \", sekulaitas maspion ', 'btg', 28000),
(109, 'pipa pralon pvc. ( aw ) dia 2 \", sekulaitas maspion ', 'btg', 60000),
(110, 'pipa pralon pvc. ( aw ) dia 3 \", sekulaitas maspion ', 'btg', 118000),
(111, 'pipa pralon pvc. ( aw ) dia 4 \", sekulaitas maspion ', 'btg', 195000),
(112, 'kloset jongkok porselen ina, standard lengkap, putih', 'bh', 130000),
(113, 'kloset duduk ina type c1', 'bh', 2400000),
(114, 'bak mandi fibre glass', 'bh', 120000),
(115, 'wastafel ina lengkap', 'bh', 500000),
(116, 'kran tembok lokal  dia 1/2 \"', 'bh', 30000),
(117, 'stop kran 3/4\" kit', 'bh', 35000),
(118, 'kran air 1/2 \"', 'bh', 25000),
(119, 'floor drain ', 'bh', 35000),
(120, 'akustik 30 x 30 cm', 'lbr', 118750),
(121, 'akustik 30 x 60 cm', 'lbr', 128250),
(122, 'akustik arm strong ukuran 30 x 120 cm', 'lbr', 133000),
(123, 'akustik armstrom 60 x 120cm', 'lbr', 137750),
(124, 'alang - alang', 'ikat', 4750),
(125, 'alluminium b', 'kg', 8265),
(126, 'asbes', 'lbr', 60000),
(127, 'asbes gelombang', 'lbr', 90000),
(128, 'atap alluminium gelombang tebal 0.55', 'm2', 70000),
(129, 'badkip', 'bh', 3562500),
(130, 'bahan teraso cor', 'm3', 285000),
(131, 'bak teraso', 'bh', 161500),
(132, 'bak cuci stainless steel', 'bh', 304000),
(133, 'bak cuci teraso', 'bh', 161500),
(134, 'bak fiberglass', 'bh', 304950),
(135, 'balok kayu borneo', 'm3', 6650000),
(136, 'balok kayu jati', 'm3', 9975000),
(137, 'balok kayu kamper', 'm3', 3895000),
(138, 'balok kayu kruing', 'm3', 8075000),
(139, 'bambu 6 - 8 / 600 cm', 'btg', 13680),
(140, 'bata merah kelas i', 'bh', 550),
(141, 'batacote', 'kg', 1330),
(142, 'batu apung', 'kg', 71250),
(143, 'batu belah 15 / 20', 'm3', 120000),
(144, 'batu belah 5 / 20', 'm3', 120000),
(145, 'batu belah 5 / 7', 'm3', 120000),
(146, 'batu granito', 'kg', 24510),
(147, 'batu kerikil', 'm3', 340000),
(148, 'batu koral', 'm3', 340000),
(149, 'batu tempel hitam', 'm2', 70000),
(150, 'batu teraso', 'kg', 2280),
(151, 'bbm', 'ltr', 6555),
(152, 'besi beton ', 'kg', 8900),
(153, 'besi beton ( polos / ulir )', 'kg', 8900),
(154, 'besi beton polos', 'kg', 8750),
(155, 'besi jaring kawat baja', 'kg', 14725),
(156, 'besi profil wf', 'kg', 16000),
(157, 'besi strip', 'kg', 24035),
(158, 'carpet', 'm2', 13063),
(159, 'cat antara', 'kg', 39900),
(160, 'cat dasar', 'kg', 15390),
(161, 'cat meni', 'kg', 25935),
(162, 'cat penutup', 'kg', 14725),
(163, 'cat kayu glotek', 'kg', 45600),
(164, 'dempul', 'kg', 54910),
(165, 'dempul jadi', 'kg', 61750),
(166, 'dolken kayu galam 8 - 10 / 4m', 'btg', 20000),
(167, 'dolken kayu 8 - 10/400 cm', 'btg', 25000),
(168, 'dolken 8 / 4 m', 'btg', 25000),
(169, 'door closer', 'bh', 270655),
(170, 'door holder', 'bh', 125495),
(171, 'door stop', 'bh', 17100),
(172, 'engsel angin', 'bh', 23940),
(173, 'engsel jendela', 'bh', 17670),
(174, 'engsel pintu', 'bh', 23465),
(175, 'flincote / meni besi', 'kg', 14488),
(176, 'floor hardener ferrovax', 'kg', 6175),
(177, 'formika 4 x 3', 'lbr', 71250),
(178, 'genteng aspal', 'lbr', 42500),
(179, 'genteng beton', 'lbr', 6650),
(180, 'genteng bubung kodok', 'bh', 10545),
(181, 'genteng bubung palentong ', 'bh', 1710),
(182, 'genteng decra bond', 'lbr', 80750),
(183, 'genteng kodok', 'bh', 8075),
(184, 'genteng metal', 'lbr', 77805),
(185, 'genteng palentong', 'bh', 1710),
(186, 'genteng palentong super', 'bh', 2090),
(187, 'genteng sirap', 'bh', 37050),
(188, 'gypsum', 'lbr', 70490),
(189, 'ijuk', 'm3', 9310),
(190, 'besi hollow 4/4cm', 'btg', 17100),
(191, 'besi hollow 4/6 cm', 'btg', 22800),
(192, 'jendela besi', 'm2', 522500),
(193, 'jendela besi tahan api', 'm2', 1425000),
(194, 'jendela nako', 'bh', 28025),
(195, 'kaca buram', 'm2', 57000),
(196, 'kaca cermin', 'm2', 140000),
(197, 'kaca patri', 'm2', 76000),
(198, 'kaca polos', 'm2', 104690),
(199, 'kaca wireglass', 'm2', 237500),
(200, 'kaca temperd', 'm2', 783750),
(201, 'kait angin', 'bh', 3325),
(202, 'kapur sirih', 'kg', 9500),
(203, 'kaso 5 / 7 ( albasiah )', 'm3', 1520000),
(204, 'kawat burung', 'm2', 43510),
(205, 'kawat duri', 'kg', 49400),
(206, 'kawat harmonika ', 'm2', 58900),
(207, 'kawat kassa', 'm2', 19000),
(208, 'kawat nyamuk', 'm2', 20900),
(209, 'kawat seng polos', 'kg', 55955),
(210, 'kayu albasiah', 'm3', 1477535),
(211, 'kayu balok borneo ', 'm3', 6788700),
(212, 'kayu balok jati', 'm3', 27075000),
(213, 'kayu kaso 5 / 7 (borneo)', 'm3', 22325),
(214, 'kayu papan 3 / 20 borneo', 'm3', 2042500),
(215, 'kayu profil', 'm', 31730),
(216, 'kayu terentang ', 'm3', 1700000),
(217, 'keramik 10 x 20 cm', 'bh', 1264),
(218, 'keramik 20 x 20 cm', 'bh', 38000),
(219, 'keramik 30x30', 'm2', 42750),
(220, 'keramik 40x40', 'm2', 42750),
(221, 'keramik artistik 10 x 20 cm', 'bh', 10545),
(222, 'keramik artistik 5 x 20 cm', 'bh', 21090),
(223, 'kloset duduk / monoblok', 'bh', 1700000),
(224, 'kloset jongkok porselen', 'bh', 226005),
(225, 'kloset jongkok teraso', 'bh', 315210),
(226, 'koral beton', 'm3', 253460),
(227, 'kran air ', 'bh', 45000),
(228, 'kuas', 'bh', 10355),
(229, 'kunci lemari', 'bh', 602015),
(230, 'kunci selot', 'bh', 13300),
(231, 'kunci tanam', 'bh', 95000),
(232, 'kunsi silinder', 'bh', 466640),
(233, 'kunsi tanam antik', 'bh', 314260),
(234, 'kunsi tanam biasa', 'bh', 74290),
(235, 'kunsi tanam kamar mandi', 'bh', 171000),
(236, 'lem ', 'kg', 21375),
(237, 'lem kayu', 'lt', 20995),
(238, 'lem vinyl ', 'kg', 58425),
(239, 'list kayu profil', 'm', 31730),
(240, 'lt. vinyl karet 30 x 30 kwl i', 'm', 16000),
(241, 'marmer', 'm2', 77995),
(242, 'meni ( read lead ) a', 'kg', 25935),
(243, 'meni besi', 'lt', 25935),
(244, 'minyak bekisting', 'lt', 2565),
(245, 'minyak cat', 'kg', 8740),
(246, 'nok standar 40 cm 18, swg 22', 'm2', 263055),
(247, 'nok stel rata', 'lbr', 43320),
(248, 'paku ', 'kg', 15580),
(249, 'paku biasa 1/2\" - 1\"', 'kg', 15580),
(250, 'paku biasa 1/2\" - 1\" atau sekrup', 'kg', 15580),
(251, 'paku biasa 2', 'kg', 17000),
(252, 'paku hak pnjang 15 cm', 'kg', 6270),
(253, 'paku pancing 60 x 230', 'kg', 31540),
(254, 'paku sekrup', 'kg', 1140),
(255, 'paku skrup 3.5\" ', 'bh', 23750),
(256, 'papan kayu borneo', 'm3', 6789270),
(257, 'papan kayu borneo tebal 3cm', 'm3', 6789270),
(258, 'papan kayu jati', 'm3', 3840375),
(259, 'papan kayu kamper', 'm3', 11768030),
(260, 'papan kayu ramin', 'lbr', 6384000),
(261, 'parquet jati', 'm2', 400000),
(262, 'pasir silika ', 'kg', 7885),
(263, 'pasir urug darat', 'm3', 190000),
(264, 'pc warna', 'kg', 9975),
(265, 'pelat asbes tebal 4 mm', 'lbr', 53295),
(266, 'pelat asbes tebal 5 mm', 'lbr', 65835),
(267, 'pelitur', 'ltr', 54910),
(268, 'pelitur jadi', 'ltr', 37240),
(269, 'pengencer', 'ltr', 23750),
(270, 'perancah kayu', 'm3', 2403500),
(271, 'perekat', 'kg', 4750),
(272, 'pintu allumunium', 'm2', 205770),
(273, 'pintu besi baja', 'm2', 427500),
(274, 'pintu gulung besi', 'm2', 427500),
(275, 'pintu lipat', 'm2', 1165840),
(276, 'pipa galvanis', 'm', 362900),
(277, 'tanah urug', 'm3', 45000),
(278, 'plamir', 'kg', 33345),
(279, 'plamuur tembok', 'kg', 31160),
(280, 'plint keramik artistik 10 x 10 cm', 'bh', 21090),
(281, 'plint keramik artistik 10 x 20 cm', 'bh', 21090),
(282, 'plint keramik artistik 5 x 20 cm', 'bh', 1045),
(283, 'plint ubin granito 10 x 30 cm', 'bh', 23750),
(284, 'plint ubin granito 10 x 40 cm', 'bh', 35625),
(285, 'plint ubin pc abu - abu 15 x 20 cm', 'bh', 18000),
(286, 'plywood 4 mm', 'lbr', 90250),
(287, 'porselen 15 x 15 cm putih', 'bh', 1235),
(288, 'porselen 20 x 20 cm warna', 'bh', 2375),
(289, 'profil alluminium \" t \"', 'm', 85500),
(290, 'ramset / dinabolt', 'bh', 3135),
(291, 'rel pintu dorong', 'bh', 232513),
(292, 'residu', 'lt', 36290),
(293, 'residu atau ter', 'ltr', 36290),
(294, 'rolling door', 'm2', 427500),
(295, 'roof light fiberglass', 'lbr', 95000),
(296, 'sabun', 'kg', 33345),
(297, 'seal tape', 'bh', 2613),
(298, 'semen abu -abu', 'kg', 1500),
(299, 'semen merah', 'kg', 11115),
(300, 'semen nat', 'kg', 12113),
(301, 'semen portland', 'kg', 1500),
(302, 'semen warna ', 'kg', 11115),
(303, 'seng gelombang 3\" x 6\" bjls 28', 'lbr', 35000),
(304, 'seng plat', 'lbr', 66500),
(305, 'seng plat 3 x 6 bjls 24', 'lbr', 87780),
(306, 'seng plat 3\" x 6\" bjls 28', 'lbr', 87780),
(307, 'sisalation / alluminium foil', 'm2', 71250),
(308, 'soda api', 'kg', 23750),
(309, 'spring knip', 'bh', 14725),
(310, 'suncreen allumunium', 'm2', 332500),
(311, 'tali ijuk ', 'kg', 10735),
(312, 'teak oil', 'ltr', 26125),
(313, 'teakwood 4 x 8 x 4mm', 'lbr', 146965),
(314, 'teakwood 4 x 8 x 12mm', 'lbr', 192850),
(315, 'terali besi 2 x 3', 'm', 11400),
(316, 'ubin abu -abu 20 x 20 cm', 'bh', 41800),
(317, 'ubin abu -abu 30 x 30 cm', 'bh', 42750),
(318, 'ubin abu -abu 40 x40 cm', 'bh', 118750),
(319, 'ubin granito 30 x 30 cm', 'bh', 91827),
(320, 'ubin granito 40 x 40 cm', 'bh', 74860),
(321, 'ubin keramik 10 x 33 cm ', 'bh', 16162),
(322, 'ubin keramik 20 x 20 cm', 'bh', 1501),
(323, 'ubin keramik 25 x 25 cm', 'bh', 3230),
(324, 'ubin keramik 33 x 33 cm', 'bh', 4788),
(325, 'ubin keramik 33 x 33 cm anti slip', 'bh', 4788),
(326, 'ubin keramik 10 x 20 cm', 'bh', 6650),
(327, 'ubin keramik artistik 10 x 20 cm', 'bh', 10450),
(328, 'homogenus tile 60 x 60', 'bh', 287375),
(329, 'ubin warna 20 x 20 cm', 'bh', 1501),
(330, 'ubin warna 30 x 30 cm', 'bh', 3230),
(331, 'ubin warna 40 x 40 cm', 'bh', 4788),
(332, 'urinoir', 'bh', 700000),
(333, 'venetions blinds', 'm2', 560500),
(334, 'vernis', 'ltr', 29925),
(335, 'wall paper', 'm3', 45000),
(336, 'water drain + asesories', 'set', 332500),
(337, 'waterstop lebar 150 mm', 'm', 169100),
(338, 'waterstop lebar 200 mm', 'm', 254600),
(339, 'waterstop lebar 250 mm', 'm', 82650),
(340, 'pipa galvanis d 4\"', 'm', 576254),
(341, 'pipa pvc d 1/2\"', 'm', 3750),
(342, 'pipa pvc tipe aw  3/4\"', 'm', 5750),
(343, 'pipa pvc tipe aw  1,5\"', 'm', 8750),
(344, 'pipa pvc tipe aw  1\"', 'm', 7500),
(345, 'pipa pvc tipe aw  2\"', 'm', 1500),
(346, 'pipa pvc tipe aw  2,5\"', 'm', 18750),
(347, 'pipa pvc tipe aw  3\"', 'm', 21250),
(348, 'pipa pvc tipe aw  4\"', 'm', 52500),
(349, 'pasir batu (sirtu )', 'm3', 125000),
(350, 'batu belah 15 cm â€ 20 cm', 'm3', 120000),
(351, 'batu pecah mesin 1 cm â€ 2 cm', 'm3', 261000),
(352, 'batu pecah mesin 2 cm â€ 3 cm', 'm3', 225000),
(353, 'batu pecah mesin 3 cm â€ 5 cm', 'm3', 255000),
(354, 'batu pecah mesin 5 cm â€ 7 cm', 'm3', 265000),
(355, 'ready mix kâ€175', 'm3', 891000),
(356, 'ready mix kâ€225', 'm3', 924000),
(357, 'lem kuning', 'kg', 40000),
(358, 'paving blok natural 8 cm', 'm2', 50000),
(359, 'paving blok warna 8 cm', 'm2', 54000),
(360, 'paving blok natural 6 cm', 'm2', 49000),
(361, 'paving blok warna 6 cm', 'm2', 8000),
(362, 'kaanstein paving block', 'bh', 9000),
(363, 'bata merah', 'bh', 625),
(364, 'bata berongga', 'bh', 3000),
(365, 'roster', 'bh', 4000),
(366, 'hebel ( hb 10 x 20 x 60 ), 1 m3 = 83 bh', 'bh', 10000),
(367, 'batu susun sirih 3 x 40 cm', 'm2', 104000),
(368, 'batu sikat putih cristal', 'kg', 13000),
(369, 'batu sikat putih hitam', 'kg', 8000),
(370, 'plamir tembok', 'kg', 14000),
(371, 'cat kayu/ besi avian', 'kg', 43000),
(372, 'meni kayu /besi bola mas', 'kg', 16000),
(373, 'plincoat', 'kg', 21000),
(374, 'dempul cap kucing', 'kg', 17000),
(375, 'solignem ( 1 blek = 10 liter )', 'ltr', 42000),
(376, 'kape kayu', 'bh', 5000),
(377, 'kape tembok', 'bh', 5000),
(378, 'kayu kelas i lokal garut  ( rasamala )', 'm3', 3250000),
(379, 'kayu kelas ii lokal garut ( kihiang, puspa, kibanen, dll )', 'm3', 2250000),
(380, 'kayu kaso kls ii, uk. 5/7', 'm3', 2250000),
(381, 'list plapond 5 cm', 'm', 3000),
(382, 'daun pintu panel kls ii', 'bh', 489000),
(383, 'bilik bambu', 'm2', 6000),
(384, 'eternit, 100 x 100 x 4 mm', 'lbr', 8000),
(385, 'gypsum 120 x 240 cm ex. dn', 'lbr', 60000),
(386, 'list gypsum câ€7', 'm', 13000),
(387, 'tepung gypsum', 'kg', 4000),
(388, 'grc', 'lbr', 59000),
(389, 'triplek 4 mm, uk. pintu', 'lbr', 59000),
(390, 'teakwood 4 mm', 'lbr', 144000),
(391, 'plywood tebal 9 mm', 'lbr', 110000),
(392, 'formika ukuran pintu', 'lbr', 110000),
(393, 'woodplank ( fibersemen )', 'lbr', 45000),
(394, 'wallpaper', 'lbr', 18000),
(395, 'hpl ( 1,2 x 2,4 m )', 'lbr', 250000),
(396, 'keramik lantai 30x30, putih polos mulia', 'm2', 41000),
(397, 'keramik lantai km 25x25, warna/corak mulia', 'm2', 55000),
(398, 'keramik dinding 10x20, warna/corak mulia', 'm2', 50000),
(399, 'keramik dinding 20x20, warna/corak mulia', 'm2', 50000),
(400, 'keramik dinding 20/25, warna/corak mulia', 'm2', 55000),
(401, 'porselin 11x11, warna standar dn', 'bh', 46000),
(402, 'keramik lantai 40x40, putih polos mulia', 'm2', 48000),
(403, 'granit garuda uk. 60 x 60 cm', 'm2', 210000),
(404, 'karpet lantai sek, milano lebar 4 m', 'm2', 155000),
(405, 'besi beton uâ€24 rataâ€rata uk. dia 8 s/d 16 mm', 'kg', 8500),
(406, 'besi srtip, uk. 3 x 30 mm x 6 m ( 4,21 kg)', 'kg', 26000),
(407, 'besi siku l.30.30.3', 'kg', 21000),
(408, 'plat besi baja', 'kg', 19000),
(409, 'kawat las', 'kg', 32000),
(410, 'pintu gulung allumunium', 'm2', 65000),
(411, 'venetiaon/verticalblins', 'm2', 108000),
(412, 'seng bjls 0,28, l= 90 cm ( 1 roll = 50 m)', 'm', 26000),
(413, 'kawat bronjong', 'kg', 17000),
(414, 'main truss câ€75â€75', 'm', 14000),
(415, 'roof bottom/reng r33â€0.45', 'm', 8000),
(416, 'selt driling dia 6 x 20 mm ( truss screw )', 'bh', 300),
(417, 'selt driling dia 4 x 16 mm ( roof baten screw ) )', 'bh', 300),
(418, 'dynabol dia 12 x 120 mm', 'bh', 1000),
(419, 'spandek', 'm2', 69000),
(420, 'genting metalroof  coraltex', 'm2', 80000),
(421, 'profil allumunium 4\" ( warna brown )', 'm', 104000),
(422, 'frame daun pintu ( warna brown )', 'm', 91000),
(423, 'frame daun jendela ( warna brown )', 'm', 76000),
(424, 'alumunium strip 8 cm', 'm', 30000),
(425, 'sekrup fixer', 'bh', 2000),
(426, 'sealant', 'tube', 30000),
(427, 'hollow 4/4 dizincromate', 'btg', 55000),
(428, 'mur skrup', 'kg', 15000),
(429, 'angkur besi 8 mm', 'bh', 5000),
(430, 'hollow 2/2, 4/4 dizincromate', 'm', 13750),
(431, 'plat floordeck/bondex, t = 0.70.1000 mm', 'm2', 98000),
(432, 'plat floordeck/bondex, t = 0.75.1000 mm', 'm2', 100000),
(433, 'plat floordeck/bondex, t = 0.85.920 mm', 'm2', 120000),
(434, 'plat floordeck/bondex, t = 1 mm.880 mm', 'm2', 156000),
(435, 'wire mesh mâ€6 ( 2,1 x 5,4 m ), 34,76 kg/lbr', 'lbr', 315000),
(436, 'wire mesh mâ€8 ( 2,1 x 5,4 m ), 61,79 kg/lbr', 'lbr', 550000),
(437, 'wire mesh mâ€9 ( 2,1 x 5,4 m ), 78,21 kg/lbr', 'lbr', 725000),
(438, 'wire mesh m-10 ( 2,1 x 5,4 m ), 96,55 kg/lbr', 'lbr', 880000),
(439, 'kaca polos 3 mm', 'm2', 47000),
(440, 'kaca polos 5 mm', 'm2', 69000),
(441, 'kaca tempred warna standard 8 mm ( polos )', 'm2', 356000),
(442, 'kaca tempred warna standard 10 mm ( polos )', 'm2', 438000),
(443, 'kaca tempred warna standard 12 mm ( polos )', 'm2', 513000),
(444, 'kaca tempred warna standard 15 mm ( polos )', 'm2', 1783000),
(445, 'paku 1â€3 cm', 'kg', 22000),
(446, 'paku 5â€10 cm', 'kg', 13000),
(447, 'paku s/d 15 cm', 'kg', 52000),
(448, 'paku skrup', 'kg', 30000),
(449, 'angker baut', 'bh', 6000),
(450, 'pipa paralon pvc ( aw) dia 1/2\", sekualitas maspion', 'btg', 15000),
(451, 'pipa paralon pvc ( aw) dia 3/4\", sekualitas maspion', 'btg', 19000),
(452, 'pipa paralon pvc ( aw) dia 1\", sekualitas maspion', 'btg', 23000),
(453, 'pipa paralon pvc ( aw) dia 2\", sekualitas maspion', 'btg', 36000),
(454, 'pipa paralon pvc ( aw) dia 3\", sekualitas maspion', 'btg', 66000),
(455, 'pipa paralon pvc ( aw) dia 4\", sekualitas maspion', 'btg', 189000),
(456, 'bak mandi fiber glass, uk. kecil', 'bh', 182000),
(457, 'kran tembok lokal dia 1/2\"', 'bh', 18000),
(458, 'stop kran 1/2\"', 'bh', 15000),
(459, 'stop kran 3/4\"', 'bh', 18000),
(460, 'floor drain lokal', 'bh', 13000),
(461, 'tangki air fiber 500 ltr', 'bh', 760000),
(462, 'pompa air 125 watt', 'bh', 463000),
(463, 'urinoir lengkap warna standar', 'unit', 1566000),
(464, 'wastafel lengkap', 'unit', 386000),
(465, 'bak cuci stainless steel standar lokal', 'bh', 250000),
(466, 'pintu wc pvc', 'set', 279000),
(467, 'biaya administrasi, dan dokumentasi', 'ls', 2727273),
(468, 'mobilisasi alat dan bahan', 'ls', 4000000),
(469, 'Biaya Pangadaan Listrik kerja dan Air kerja', 'ls', 3000000),
(470, 'Pembuatan Papan Nama Kegiatan', 'ls', 500000),
(471, 'Pek. Buangan Puing Sisa Material', 'ls', 2000000);

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
(4, 5, 1, 0),
(5, 7, 1, 0.432),
(6, 8, 301, 202),
(7, 8, 2, 0.485),
(8, 9, 301, 136),
(9, 9, 2, 0.544),
(10, 10, 363, 70),
(11, 10, 301, 14.37),
(12, 10, 2, 0.04),
(13, 11, 363, 70),
(14, 11, 301, 9.68),
(15, 11, 2, 0.045),
(16, 12, 301, 7.776),
(17, 12, 2, 0.023),
(18, 13, 301, 5.184),
(19, 13, 2, 0.026),
(20, 14, 301, 230),
(21, 14, 3, 0.64),
(22, 14, 226, 0.76),
(23, 15, 301, 247),
(24, 15, 3, 0.62),
(25, 15, 226, 0.74),
(26, 16, 301, 326),
(27, 16, 3, 0.5429),
(28, 16, 226, 0.7622),
(29, 17, 301, 371),
(30, 17, 3, 0.4986),
(31, 17, 226, 0.7756),
(32, 18, 203, 0.072),
(33, 18, 251, 0.06),
(34, 18, 292, 0.4),
(35, 19, 203, 0.072),
(36, 19, 251, 0.06),
(37, 19, 243, 0.45),
(38, 20, 301, 2),
(39, 20, 205, 0.25),
(40, 20, 3, 0.005),
(41, 20, 226, 0.009),
(42, 20, 251, 0.06),
(43, 21, 213, 0.012),
(44, 21, 251, 0.02),
(45, 21, 214, 0.007),
(46, 22, 248, 0.08),
(47, 22, 157, 1.1),
(48, 22, 301, 35),
(49, 22, 2, 0.15),
(50, 22, 3, 0.1),
(51, 22, 226, 0.15),
(52, 22, 140, 30),
(53, 22, 304, 0.25),
(54, 22, 194, 0.2),
(55, 22, 198, 0.08),
(56, 22, 231, 0.15),
(57, 22, 286, 0.06),
(58, 23, 248, 0.3),
(59, 23, 301, 10.5),
(60, 23, 3, 0.03),
(61, 23, 226, 0.05),
(62, 23, 304, 0.25),
(63, 24, 248, 0.7),
(64, 26, 248, 0.3),
(65, 26, 301, 18),
(66, 26, 3, 0.03),
(67, 26, 226, 0.05),
(68, 26, 286, 1.35),
(69, 27, 216, 0.186),
(70, 27, 248, 0.3),
(71, 27, 213, 1),
(72, 28, 311, 0.25),
(73, 29, 144, 0.15),
(74, 29, 145, 0.09),
(75, 29, 2, 0.01),
(76, 42, 1, 1.2),
(77, 43, 277, 1.2),
(78, 44, 143, 1.1),
(79, 44, 301, 392),
(80, 44, 2, 0.314),
(81, 45, 143, 1.1),
(82, 45, 301, 136),
(83, 45, 2, 0.544),
(84, 46, 1, 0.432),
(85, 47, 140, 140),
(86, 47, 301, 32.95),
(87, 47, 2, 0.091),
(88, 48, 140, 140),
(89, 48, 301, 22.2),
(90, 48, 2, 0.102),
(91, 49, 140, 70),
(92, 49, 301, 14.37),
(93, 49, 2, 0.04),
(94, 50, 140, 70),
(95, 50, 301, 9.68),
(96, 50, 2, 0.045),
(97, 51, 301, 6.48),
(98, 51, 2, 0.019),
(99, 52, 301, 4.32),
(100, 52, 2, 0.022),
(101, 53, 301, 4.32),
(102, 53, 2, 0.013),
(103, 54, 301, 1.84),
(104, 54, 2, 0.014),
(105, 55, 301, 3),
(106, 55, 2, 0.019),
(107, 56, 299, 0.009),
(108, 56, 2, 0.009),
(109, 57, 299, 0.007),
(110, 57, 2, 0.015),
(111, 58, 301, 14.28),
(112, 58, 2, 0.023),
(113, 59, 301, 10.8),
(114, 59, 2, 0.026),
(115, 60, 301, 8.68),
(116, 60, 2, 0.028),
(117, 61, 301, 7.29),
(118, 61, 2, 0.028),
(119, 62, 301, 6.24),
(120, 62, 2, 0.03),
(121, 63, 301, 15.5),
(122, 63, 2, 0.013),
(123, 64, 301, 11.75),
(124, 64, 2, 0.035),
(125, 65, 301, 9.48),
(126, 65, 2, 0.038),
(127, 66, 301, 7.94),
(128, 66, 2, 0.039),
(129, 67, 301, 18.65),
(130, 67, 2, 0.035),
(131, 68, 301, 14.15),
(132, 68, 2, 0.039),
(133, 69, 301, 11.38),
(134, 69, 2, 0.042),
(135, 70, 301, 8.19),
(136, 70, 2, 0.045),
(137, 71, 301, 7.07),
(138, 71, 2, 0.021),
(139, 72, 301, 5.67),
(140, 72, 2, 0.023),
(141, 73, 301, 9.3),
(142, 73, 2, 0.018),
(143, 74, 301, 7.07),
(144, 74, 2, 0.021),
(145, 76, 301, 0.5),
(146, 76, 2, 0.002),
(147, 78, 264, 0.144),
(148, 78, 146, 15),
(149, 79, 264, 0.44),
(150, 79, 150, 11.5),
(151, 80, 301, 4.32),
(152, 80, 2, 0.016),
(153, 81, 301, 4.32),
(154, 81, 2, 0.016),
(155, 82, 301, 0.5),
(156, 82, 141, 2.9),
(157, 82, 2, 0.006),
(158, 83, 301, 0),
(159, 83, 2, 0.026),
(160, 84, 301, 0),
(161, 84, 2, 0.028),
(162, 85, 212, 1.1),
(163, 86, 211, 1.2),
(164, 88, 259, 0.036),
(165, 88, 251, 0.05),
(166, 89, 256, 0.036),
(167, 89, 251, 0.05),
(168, 90, 258, 0.05),
(169, 91, 259, 0.04),
(170, 92, 258, 0.035),
(171, 93, 259, 0.035),
(172, 94, 256, 0.035),
(173, 95, 256, 0.064),
(174, 96, 256, 0.064),
(175, 97, 258, 0.0196),
(176, 97, 249, 0.03),
(177, 97, 237, 0.3),
(178, 97, 286, 1),
(179, 98, 251, 0.02),
(180, 99, 44, 0.18),
(181, 99, 251, 0.85),
(182, 99, 127, 1.5),
(183, 101, 10, 1),
(184, 102, 11, 1),
(185, 103, 154, 1.05),
(186, 103, 19, 0.015),
(187, 104, 244, 0.1),
(188, 105, 44, 0.04),
(189, 105, 244, 0.2),
(190, 106, 44, 0.04),
(191, 106, 244, 0.2),
(192, 107, 44, 0.04),
(193, 107, 244, 0.2),
(194, 108, 44, 0.04),
(195, 108, 244, 0.2),
(196, 108, 391, 0.35),
(197, 112, 388, 0.86),
(198, 113, 248, 0.05),
(199, 114, 304, 1.05),
(200, 116, 66, 5),
(201, 116, 301, 8),
(202, 116, 2, 0.032),
(203, 118, 301, 6.52),
(204, 118, 2, 0.21),
(205, 119, 29, 6),
(206, 121, 448, 0.11),
(207, 122, 387, 0.01),
(208, 123, 388, 0.375),
(209, 125, 301, 6),
(210, 125, 2, 0.01),
(211, 126, 301, 6),
(212, 126, 2, 0.01),
(213, 127, 363, 70),
(214, 127, 2, 0.09),
(215, 127, 12, 43),
(216, 131, 119, 1),
(217, 132, 227, 1),
(218, 132, 297, 0.025),
(219, 133, 1, 0.1125),
(220, 135, 29, 2),
(221, 135, 30, 0.06),
(222, 136, 28, 14.6),
(223, 137, 173, 0.5),
(224, 139, 230, 1),
(225, 144, 301, 11.38),
(226, 144, 2, 0.042),
(227, 145, 301, 11.38),
(228, 145, 2, 0.042),
(229, 146, 301, 10),
(230, 146, 2, 0.045),
(231, 147, 301, 10.4),
(232, 147, 2, 0.045),
(233, 148, 301, 10.4),
(234, 148, 2, 0.045),
(235, 149, 301, 9.3),
(236, 149, 2, 0.018),
(237, 149, 302, 1.94),
(238, 150, 161, 0.2),
(239, 150, 92, 0.4),
(240, 150, 93, 0.05),
(241, 151, 243, 0.2),
(242, 151, 92, 0.4),
(243, 151, 93, 0.05),
(244, 152, 92, 0.3333),
(245, 154, 92, 0.3333),
(246, 155, 99, 0.2),
(247, 155, 93, 0.05),
(255, 1, 43, 0.012),
(256, 1, 251, 0.02),
(257, 1, 44, 0.007),
(258, 156, 467, 1);

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
(5, 2, 1, 0.75),
(6, 2, 14, 0.025),
(7, 3, 1, 0.25),
(8, 3, 14, 0.0083333333333333),
(9, 4, 1, 0.5),
(10, 4, 14, 0.05),
(11, 5, 1, 0.3),
(12, 5, 14, 0.01),
(13, 6, 1, 0.3),
(14, 6, 14, 0.01),
(15, 7, 1, 0.78),
(16, 7, 2, 0.39),
(17, 7, 3, 0.039),
(18, 7, 14, 0.039),
(19, 8, 1, 1.5),
(20, 8, 2, 0.75),
(21, 8, 3, 0.075),
(22, 8, 14, 0.075),
(23, 9, 1, 1.5),
(24, 9, 2, 0.75),
(25, 9, 3, 0.075),
(26, 9, 14, 0.075),
(27, 10, 1, 0.3),
(28, 10, 2, 0.1),
(29, 10, 3, 0.01),
(30, 10, 14, 0.015),
(31, 11, 1, 0.3),
(32, 11, 2, 0.1),
(33, 11, 3, 0.01),
(34, 11, 14, 0.015),
(35, 12, 1, 0.3),
(36, 12, 2, 0.15),
(37, 12, 3, 0.015),
(38, 12, 14, 0.015),
(39, 13, 1, 0.3),
(40, 13, 2, 0.15),
(41, 13, 3, 0.015),
(42, 13, 14, 0.015),
(43, 14, 1, 1.2),
(44, 14, 2, 0.2),
(45, 14, 3, 0.02),
(46, 14, 14, 0.06),
(47, 15, 1, 1.65),
(48, 15, 2, 0.275),
(49, 15, 3, 0.028),
(50, 15, 14, 0.083),
(51, 16, 1, 1.65),
(52, 16, 2, 0.275),
(53, 16, 3, 0.028),
(54, 16, 14, 0.083),
(55, 17, 1, 1.65),
(56, 17, 2, 0.275),
(57, 17, 3, 0.028),
(58, 17, 14, 0.083),
(59, 18, 4, 0.2),
(60, 18, 29, 0.02),
(61, 18, 14, 0.02),
(62, 19, 4, 0.2),
(63, 19, 29, 0.02),
(64, 19, 14, 0.02),
(65, 20, 4, 0.3),
(66, 20, 29, 0.02),
(67, 20, 14, 0.02),
(68, 21, 4, 0.1),
(69, 21, 29, 0.01),
(70, 21, 14, 0.005),
(71, 22, 4, 2),
(72, 22, 2, 1),
(73, 22, 29, 0.3),
(74, 22, 14, 0.05),
(75, 23, 4, 2),
(76, 23, 29, 0.2),
(77, 23, 14, 0.05),
(78, 24, 4, 1.5),
(79, 24, 29, 0.15),
(80, 24, 14, 0.05),
(81, 25, 14, 0.05),
(82, 26, 4, 2),
(83, 26, 29, 0.2),
(84, 26, 14, 0.05),
(85, 27, 4, 2),
(86, 27, 14, 0.05),
(87, 28, 4, 2),
(88, 28, 29, 0.2),
(89, 28, 14, 0.05),
(90, 29, 14, 0.05),
(91, 30, 14, 0.333),
(92, 31, 14, 0.033),
(93, 32, 14, 0.035),
(94, 33, 14, 0.052),
(95, 34, 14, 0.073),
(96, 35, 14, 0.062),
(97, 36, 14, 0.125),
(98, 37, 14, 0.083),
(99, 38, 14, 0.005),
(100, 39, 14, 0.05),
(101, 40, 14, 0.019),
(102, 41, 14, 0.05),
(103, 42, 10, 0),
(104, 42, 29, 0),
(105, 42, 14, 0.01),
(106, 43, 10, 0),
(107, 43, 29, 0),
(108, 43, 14, 0.01),
(109, 44, 2, 0.6),
(110, 44, 29, 0.06),
(111, 44, 14, 0.075),
(112, 45, 2, 0.6),
(113, 45, 29, 0.06),
(114, 45, 14, 0.075),
(115, 46, 1, 0.78),
(116, 46, 2, 0.39),
(117, 46, 29, 0.039),
(118, 46, 14, 0.039),
(119, 47, 2, 0.2),
(120, 47, 29, 0.02),
(121, 47, 14, 0.03),
(122, 48, 2, 0.2),
(123, 48, 29, 0.02),
(124, 48, 14, 0.03),
(125, 49, 2, 0.1),
(126, 49, 29, 0.01),
(127, 49, 14, 0.015),
(128, 50, 2, 0.1),
(129, 50, 29, 0.01),
(130, 50, 14, 0.015),
(131, 51, 2, 0.15),
(132, 51, 29, 0.015),
(133, 51, 14, 0.01),
(134, 52, 2, 0.15),
(135, 52, 29, 0.015),
(136, 52, 14, 0.01),
(137, 53, 2, 0.15),
(138, 53, 29, 0.015),
(139, 54, 2, 0.15),
(140, 54, 29, 0.015),
(141, 54, 14, 0.01),
(142, 55, 2, 0.15),
(143, 55, 29, 0.015),
(144, 55, 14, 0.01),
(145, 56, 2, 0.15),
(146, 56, 29, 0.015),
(147, 56, 14, 0.01),
(148, 57, 2, 0.15),
(149, 57, 29, 0.015),
(150, 57, 14, 0.01),
(151, 58, 2, 0.2),
(152, 58, 29, 0.02),
(153, 58, 14, 0.0125),
(154, 59, 2, 0.2),
(155, 59, 29, 0.02),
(156, 59, 14, 0.0125),
(157, 60, 2, 0.2),
(158, 60, 29, 0.02),
(159, 60, 14, 0.0125),
(160, 61, 2, 0.2),
(161, 61, 29, 0.02),
(162, 61, 14, 0.0125),
(163, 62, 2, 0.2),
(164, 62, 29, 0.02),
(165, 62, 14, 0.0125),
(166, 63, 2, 0.2),
(167, 63, 29, 0.02),
(168, 63, 14, 0.013),
(169, 64, 2, 0.2),
(170, 64, 29, 0.02),
(171, 64, 14, 0.013),
(172, 65, 2, 0.2),
(173, 65, 29, 0.02),
(174, 65, 14, 0.013),
(175, 66, 2, 0.2),
(176, 66, 29, 0.02),
(177, 66, 14, 0.013),
(178, 67, 2, 0.25),
(179, 67, 29, 0.025),
(180, 67, 14, 0.015),
(181, 68, 2, 0.25),
(182, 68, 29, 0.025),
(183, 68, 14, 0.015),
(184, 69, 2, 0.25),
(185, 69, 29, 0.025),
(186, 69, 14, 0.015),
(187, 70, 2, 0.25),
(188, 70, 29, 0.025),
(189, 70, 14, 0.015),
(190, 71, 2, 0.07),
(191, 71, 29, 0.007),
(192, 71, 14, 0.008),
(193, 72, 2, 0.07),
(194, 72, 29, 0.007),
(195, 72, 14, 0.008),
(196, 73, 2, 0.2),
(197, 73, 29, 0.02),
(198, 73, 14, 0.013),
(199, 74, 2, 0.2),
(200, 74, 29, 0.02),
(201, 74, 14, 0.013),
(202, 77, 2, 0.038),
(203, 77, 29, 0.038),
(204, 77, 14, 0.002),
(205, 78, 2, 0.02),
(206, 78, 29, 0.002),
(207, 78, 14, 0.005),
(208, 79, 2, 0.2),
(209, 79, 29, 0.02),
(210, 79, 14, 0.025),
(211, 80, 2, 0.1),
(212, 80, 29, 0.01),
(213, 80, 14, 0.015),
(214, 81, 2, 0.07),
(215, 81, 29, 0.007),
(216, 81, 14, 0.008),
(217, 82, 2, 0.2),
(218, 82, 29, 0.02),
(219, 82, 14, 0.015),
(220, 83, 2, 0.1525),
(221, 83, 29, 0.01),
(222, 83, 14, 0.008),
(223, 84, 2, 0.1525),
(224, 84, 29, 0.01),
(225, 84, 14, 0.008),
(226, 85, 4, 20),
(227, 85, 29, 2),
(228, 85, 14, 0.3),
(229, 86, 4, 18),
(230, 86, 29, 2),
(231, 86, 14, 0.3),
(232, 87, 4, 18),
(233, 87, 29, 2),
(234, 87, 14, 0.3),
(235, 88, 4, 1.05),
(236, 88, 29, 0.105),
(237, 88, 14, 0.018),
(238, 89, 4, 1.05),
(239, 89, 29, 0.105),
(240, 89, 14, 0.018),
(241, 90, 4, 2.5),
(242, 90, 29, 0.25),
(243, 90, 14, 0.05),
(244, 91, 4, 2.5),
(245, 91, 29, 0.25),
(246, 91, 14, 0.05),
(247, 92, 4, 2),
(248, 92, 29, 0.2),
(249, 92, 14, 0.04),
(250, 93, 4, 2),
(251, 93, 29, 0.2),
(252, 93, 14, 0.04),
(253, 94, 4, 2),
(254, 94, 29, 0.2),
(255, 94, 14, 0.04),
(256, 95, 4, 3),
(257, 95, 29, 0.3),
(258, 95, 14, 0.3),
(259, 96, 4, 3),
(260, 96, 29, 0.3),
(261, 96, 14, 0.5),
(262, 97, 4, 2),
(263, 97, 29, 0.2),
(264, 97, 14, 0.03),
(265, 98, 1, 0.1),
(266, 98, 4, 0.1),
(267, 98, 5, 0.01),
(268, 98, 14, 0.005),
(269, 99, 1, 1),
(270, 99, 4, 1.5),
(271, 99, 5, 0.15),
(272, 99, 14, 0.05),
(273, 100, 1, 0.1),
(274, 100, 14, 0.005),
(275, 101, 1, 0.99),
(276, 101, 2, 0.165),
(277, 101, 3, 0.017),
(278, 101, 14, 0.05),
(279, 102, 1, 0.99),
(280, 102, 2, 0.165),
(281, 102, 3, 0.017),
(282, 102, 14, 0.05),
(283, 103, 1, 0.007),
(284, 103, 17, 0.007),
(285, 103, 16, 0.0007),
(286, 103, 14, 0.0004),
(287, 104, 1, 0.52),
(288, 104, 4, 0.26),
(289, 104, 5, 0.026),
(290, 104, 14, 0.026),
(291, 105, 1, 0.66),
(292, 105, 4, 0.33),
(293, 105, 5, 0.033),
(294, 105, 14, 0.033),
(295, 106, 1, 0.66),
(296, 106, 4, 0.33),
(297, 106, 5, 0.033),
(298, 106, 14, 0.033),
(299, 107, 1, 0.3),
(300, 107, 4, 0.26),
(301, 107, 5, 0.026),
(302, 107, 14, 0.005),
(303, 108, 1, 0.66),
(304, 108, 4, 0.33),
(305, 108, 5, 0.033),
(306, 108, 14, 0.033),
(307, 109, 1, 6),
(308, 109, 4, 18),
(309, 109, 5, 1.8),
(310, 109, 14, 0.3),
(311, 110, 1, 1),
(312, 110, 4, 3),
(313, 110, 5, 0.3),
(314, 110, 14, 0.05),
(315, 111, 1, 0.8),
(316, 111, 4, 2.4),
(317, 111, 5, 0.24),
(318, 111, 14, 0.04),
(319, 112, 1, 0.7),
(320, 112, 4, 2.1),
(321, 112, 5, 0.21),
(322, 112, 14, 0.035),
(323, 113, 1, 0.1),
(324, 113, 4, 0.2),
(325, 113, 5, 0.02),
(326, 113, 14, 0.005),
(327, 114, 1, 0.2),
(328, 114, 4, 0.4),
(329, 114, 5, 0.025),
(330, 114, 14, 0.001),
(331, 115, 1, 0.15),
(332, 115, 4, 0.075),
(333, 115, 5, 0.008),
(334, 115, 14, 0.008),
(335, 116, 1, 0.4),
(336, 116, 2, 0.2),
(337, 116, 3, 0.02),
(338, 116, 14, 0.002),
(339, 117, 1, 0.06),
(340, 117, 4, 0.03),
(341, 117, 5, 0.003),
(342, 117, 14, 0.003),
(343, 118, 1, 0.15),
(344, 118, 2, 0.2),
(345, 118, 3, 0.01),
(346, 118, 14, 0.01),
(347, 119, 1, 0.15),
(348, 119, 4, 0.25),
(349, 119, 5, 0.025),
(350, 119, 14, 0.075),
(351, 120, 1, 0.15),
(352, 120, 4, 0.3),
(353, 120, 5, 0.03),
(354, 120, 14, 0.075),
(355, 121, 1, 0.1),
(356, 121, 4, 0.05),
(357, 121, 5, 0.005),
(358, 121, 14, 0.005),
(359, 122, 1, 0.06),
(360, 122, 4, 0.06),
(361, 122, 5, 0.006),
(362, 122, 14, 0.003),
(363, 123, 1, 0.1),
(364, 123, 4, 0.05),
(365, 123, 5, 0.005),
(366, 123, 14, 0.005),
(367, 124, 1, 0.05),
(368, 124, 4, 0.05),
(369, 124, 5, 0.005),
(370, 124, 14, 0.003),
(371, 125, 1, 1),
(372, 125, 2, 1.5),
(373, 125, 3, 1.5),
(374, 125, 14, 0.16),
(375, 126, 1, 1.2),
(376, 126, 2, 1.45),
(377, 126, 3, 0.15),
(378, 126, 14, 0.1),
(379, 127, 1, 1.2),
(380, 127, 2, 1.45),
(381, 127, 3, 0.15),
(382, 127, 14, 0.1),
(383, 128, 1, 0.036),
(384, 128, 12, 0.06),
(385, 128, 13, 0.006),
(386, 128, 14, 0.0018),
(387, 129, 1, 0.081),
(388, 129, 12, 0.135),
(389, 129, 13, 0.0135),
(390, 129, 14, 0.0041),
(391, 130, 1, 0.081),
(392, 130, 12, 0.135),
(393, 130, 13, 0.0135),
(394, 130, 14, 0.0041),
(395, 131, 1, 0.01),
(396, 131, 12, 0.1),
(397, 131, 13, 0.01),
(398, 131, 14, 0.005),
(399, 132, 1, 0.01),
(400, 132, 12, 0.1),
(401, 132, 13, 0.01),
(402, 132, 14, 0.005),
(403, 135, 1, 0.043),
(404, 135, 14, 0.0021),
(405, 136, 1, 0.085),
(406, 136, 14, 0.0042),
(407, 137, 1, 0.01),
(408, 137, 4, 0.1),
(409, 137, 5, 0.01),
(410, 137, 14, 0.0005),
(411, 138, 1, 0.015),
(412, 138, 4, 0.15),
(413, 138, 5, 0.015),
(414, 138, 14, 0.00075),
(415, 139, 1, 0.02),
(416, 139, 4, 0.2),
(417, 139, 5, 0.02),
(418, 139, 14, 0.001),
(419, 140, 1, 0.015),
(420, 140, 4, 0.15),
(421, 140, 5, 0.015),
(422, 140, 14, 0.00075),
(423, 141, 1, 0.015),
(424, 141, 4, 0.15),
(425, 141, 5, 0.015),
(426, 141, 14, 0.00075),
(427, 142, 1, 0.015),
(428, 142, 4, 0.15),
(429, 142, 5, 0.015),
(430, 142, 14, 0.00075),
(431, 143, 1, 0.015),
(432, 143, 4, 0.15),
(433, 143, 5, 0.015),
(434, 143, 14, 0.00075),
(435, 144, 1, 0.65),
(436, 144, 2, 0.35),
(437, 144, 3, 0.035),
(438, 144, 14, 0.035),
(439, 145, 1, 0.62),
(440, 145, 2, 0.35),
(441, 145, 3, 0.035),
(442, 145, 14, 0.035),
(443, 146, 1, 0.7),
(444, 146, 2, 0.35),
(445, 146, 3, 0.035),
(446, 146, 14, 0.03),
(447, 147, 1, 0.7),
(448, 147, 2, 0.35),
(449, 147, 3, 0.035),
(450, 147, 14, 0.03),
(451, 148, 1, 0.7),
(452, 148, 2, 0.35),
(453, 148, 3, 0.035),
(454, 148, 14, 0.03),
(455, 149, 1, 0.9),
(456, 149, 2, 0.45),
(457, 149, 3, 0.045),
(458, 149, 14, 0.045),
(459, 150, 1, 0.07),
(460, 150, 8, 0.009),
(461, 150, 9, 0.006),
(462, 150, 14, 0.0025),
(463, 151, 1, 0.07),
(464, 151, 8, 0.009),
(465, 151, 9, 0.006),
(466, 151, 14, 0.0025),
(467, 152, 1, 0.02),
(468, 152, 8, 0.063),
(469, 152, 9, 0.0063),
(470, 152, 14, 0.0025),
(471, 153, 1, 0.02),
(472, 153, 8, 0.063),
(473, 153, 9, 0.0063),
(474, 153, 14, 0.0025),
(475, 154, 1, 0.08),
(476, 154, 8, 0.126),
(477, 154, 9, 0.0063),
(478, 154, 14, 0.0025),
(479, 155, 1, 0.07),
(480, 155, 8, 0.01),
(481, 155, 9, 0.01),
(482, 155, 14, 0.001),
(492, 1, 1, 0.1),
(493, 1, 4, 0.1),
(494, 1, 5, 0.01),
(495, 1, 14, 0.005);

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
(1, 'manajer proyek'),
(2, 'site manager'),
(3, 'direktur'),
(4, 'penanggung jawab teknis'),
(5, 'pekerja'),
(6, 'tukang batu'),
(7, 'kepala tukang batu'),
(8, 'tukang kayu'),
(9, 'kepala tukang kayu'),
(10, 'tukang besi profil / tukang la'),
(11, 'kepala tukang besi profil / tu'),
(12, 'tukang besi beton'),
(13, 'kepala tukang besi beton'),
(14, 'tukang cat'),
(15, 'kepala tukang cat'),
(16, 'tukang gali'),
(17, 'kepala tukang gali'),
(18, 'tukang pipa'),
(19, 'kepala tukang pipa'),
(20, 'mandor'),
(21, 'pekerja / knek'),
(22, 'kepala tukang besi'),
(23, 'tukang besi'),
(24, 'tukang aspalt'),
(25, 'mandor/ pengawas'),
(26, 'instalator'),
(27, 'pembantu instalator'),
(28, 'tukang babat rumput'),
(29, 'tukang taman'),
(30, 'kepala tukang pasang pipa'),
(31, 'tukang pasang pipa'),
(32, 'operator alat besar'),
(33, 'pembantu operator alat besar'),
(34, 'tukang las'),
(35, 'kepala tukang '),
(36, 'tukang besi profil/ tukang las'),
(37, 'kepala tukang besi profil/ tuk'),
(38, 'tukang khusus alumunium'),
(39, 'kepala tukang alumunium'),
(40, 'tukang listrik'),
(41, 'kepala tukang listrik'),
(42, 'Pelaksana Teknis'),
(43, 'Petugas K3');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jdwl_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `jdwl_bobot` double NOT NULL,
  `jdwl_tgl_mulai` date NOT NULL,
  `jdwl_durasi` int(11) NOT NULL,
  `jdwl_pendahulu_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jdwl_id`, `pryk_id`, `strkpek_id`, `jdwl_bobot`, `jdwl_tgl_mulai`, `jdwl_durasi`, `jdwl_pendahulu_id`) VALUES
(162, 1, 6, 10.58, '2017-05-19', 1, ''),
(163, 1, 19, 12.64, '2017-05-26', 2, '162'),
(164, 1, 24, 76.07, '2017-06-09', 3, '163'),
(165, 1, 27, 0, '2017-06-09', 11, '163'),
(166, 1, 47, 0, '2017-06-09', 6, '163'),
(167, 1, 53, 0, '2017-09-22', 4, '166,168,170'),
(168, 1, 62, 0, '2017-08-25', 4, '165'),
(169, 1, 66, 0, '2017-10-20', 2, '167'),
(170, 1, 69, 0, '2017-07-14', 1, '171'),
(171, 1, 79, 0.71, '2017-06-30', 2, '164'),
(174, 2, 42, 97.54, '2018-07-20', 2, ''),
(175, 2, 44, 2.46, '2018-08-03', 1, '174');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tenaga_kerja`
--

CREATE TABLE `jadwal_tenaga_kerja` (
  `jdwltenker_id` int(11) NOT NULL,
  `jdwl_id` int(11) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `jdwltenker_jumlah` int(11) NOT NULL,
  `jdwltenker_skip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_tenaga_kerja`
--

INSERT INTO `jadwal_tenaga_kerja` (`jdwltenker_id`, `jdwl_id`, `jbtn_id`, `jdwltenker_jumlah`, `jdwltenker_skip`) VALUES
(3, 175, 20, 1, 0),
(4, 175, 5, 5, 0),
(13, 174, 20, 1, 0),
(14, 174, 7, 2, 0),
(15, 174, 10, 1, 0),
(16, 162, 20, 1, 0),
(17, 162, 5, 2, 0),
(18, 163, 20, 1, 0),
(19, 163, 16, 3, 0),
(20, 164, 20, 1, 6),
(21, 164, 35, 1, 6),
(22, 164, 12, 4, 6),
(23, 165, 20, 1, 0),
(24, 165, 35, 1, 0),
(25, 165, 12, 4, 0),
(26, 165, 5, 6, 0),
(27, 166, 20, 1, 0),
(28, 166, 35, 1, 0),
(29, 166, 12, 4, 0),
(30, 166, 5, 2, 0),
(31, 167, 20, 1, 0),
(32, 167, 35, 1, 0),
(33, 167, 5, 4, 0),
(34, 168, 20, 1, 0),
(35, 168, 18, 2, 0),
(36, 168, 5, 3, 0),
(38, 169, 5, 2, 0),
(39, 169, 20, 1, 0),
(40, 170, 5, 2, 4),
(41, 171, 20, 1, 8),
(42, 171, 5, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian`
--

CREATE TABLE `kegiatan_harian` (
  `kgtnhari_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `kgtnhari_tanggal` date NOT NULL,
  `kgtnhari_cuaca_pagi` varchar(10) NOT NULL,
  `kgtnhari_cuaca_siang` varchar(10) NOT NULL,
  `kgtnhari_cuaca_sore` varchar(10) NOT NULL,
  `kgtnhari_catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_bahan_baku`
--

CREATE TABLE `kegiatan_harian_bahan_baku` (
  `kgtnbhnbku_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `bhnbku_id` int(11) NOT NULL,
  `kgtnbhnbku_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_pekerjaan`
--

CREATE TABLE `kegiatan_harian_pekerjaan` (
  `kgtnpek_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_risiko`
--

CREATE TABLE `kegiatan_harian_risiko` (
  `kgtnrsko_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `rsko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian_tenaga_kerja`
--

CREATE TABLE `kegiatan_harian_tenaga_kerja` (
  `kgtntenker_id` int(11) NOT NULL,
  `kgtnhari_id` int(11) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `kgtntenker_jumlah` int(11) NOT NULL
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
(1, 'Dinas Kabupaten Garut', 'diskominfo@garutkab.go.id', '02624895000', 'Kabupaten Garut'),
(2, 'test', 'test@gmail.com', '123455', 'Jl. jalna');

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
(1, 'Rizal Nur Rahman', 'manpro@gmail.com', '087825718829', 'Garut', 'Tetap', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `pek_id` int(11) NOT NULL,
  `pek_nama` varchar(150) NOT NULL,
  `pek_satuan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`pek_id`, `pek_nama`, `pek_satuan`) VALUES
(1, 'pekerjaan persiapan ', ''),
(2, 'pekerjaan tanah & urugan', ''),
(3, 'pekerjaan pondasi penahan batu kali', ''),
(4, 'pekerjaan sub structure dan pondasi', ''),
(5, 'pekerjaan pondasi', ''),
(6, 'pekerjaan pile cap', ''),
(7, 'sloof beton', ''),
(8, 'pile cap tipe p-1', ''),
(9, 'pile cap tipe p-2', ''),
(10, 'sloop beton 300x500', ''),
(11, 'seloop beton 150x200', ''),
(12, 'pekerjaan pemasangan baja dan aksesoris', ''),
(13, 'pekerjaan baja bj 37 profil heavy columb section 60', ''),
(14, 'kolom baja bj 37', ''),
(15, 'pekerjaan balok baja bj 37 plofil iwf shape 400x400', ''),
(16, 'balok baja', ''),
(17, 'pekerjaan beton (lantai dan lantai 2)', ''),
(18, 'pemasangan kolom praktis', ''),
(19, 'pekerjaan pemasangan kolom struktur', ''),
(20, 'pek. kolom beton komposit 450 x450', ''),
(21, 'pekerjaan pemasangan balok beton', ''),
(22, 'pek. balok beton 200x250', ''),
(23, 'pekerjaan pelat lantai beton ', ''),
(24, 'pelat lantai beton (s1-1) tebal : 100 dan 200', ''),
(25, 'pekerjaan tangga', ''),
(26, 'pekerjaan atap', ''),
(27, 'pekerjaan kuda kuda baja ', ''),
(28, 'pekerjaan penutu atap', ''),
(29, 'pekerjaan perkerasan halaman depan', ''),
(30, 'pekerjaan pelaksanaan', ''),
(31, 'lantai dasar', ''),
(32, 'pekerjaan tanah', ''),
(33, 'pekerjaan beton', ''),
(34, 'pekerjaan pasangan', ''),
(35, 'pekerjaan kusen', ''),
(36, 'pekerjaan plapon', ''),
(37, 'pekerjaan lantai', ''),
(38, 'pekerjaan pengecatan', ''),
(39, 'pekerjaan sanitair', ''),
(40, 'pek instalasi air bersih dalam bangunan', ''),
(41, 'pek instalasi air kotor dalam bangunan', ''),
(42, 'pek pengadaan air bersih', ''),
(43, 'pekerjaan elektrikal', ''),
(44, 'lantaiâ â€1', ''),
(45, 'pekerjaan lantai i', ''),
(46, 'pek. kusen pintu, jendela dan assesories', ''),
(47, 'pekerjaan plafond', ''),
(48, 'pekerjaan instalasi listrik', ''),
(49, 'pekerjaan sanitasi', ''),
(50, 'air bersih', ''),
(51, 'air kotor', ''),
(52, '1 m2 papan nama proyek', 'm2'),
(53, '1 m pagar sementara dari seng gelombang tinggi 2 m', 'm'),
(54, '1 m  pek. pengukuran kembali (site) & pemasangan bowplank', 'm2'),
(55, 'membersihkan lapangan dan perataan', 'm2'),
(56, 'galian tanah pile cap', 'm3'),
(57, 'urugan pasir dipadatkan dibawah pondasi pile cap dan sloof', 'm3'),
(58, 'urugan kembali bekas galian pile cap', 'm3'),
(59, 'anti rayap dengan metode green termite management system', 'm2'),
(60, '1 m3 pek. urugan tanah biasa', 'm3'),
(61, '1 m3 pek. galian tanah biasa max kedalaman 1 m', 'm3'),
(62, '1 m3 urugan tanah kembali', 'm3'),
(63, '1 m3 pek. urugan pasir', 'm3'),
(64, '1 m3 pasangan batu kali 1 pc : 3ps', 'm3'),
(65, '1 m3 pasangan batu kosong / aanstamping', 'm3'),
(66, 'pengadaan tiang pancang dia 60', 'm'),
(67, 'pemancangan dan handling tiang pancang ( hydrolic static pile driver )', 'm'),
(68, 'lantai kerja beton 1pc : 3psr : 5 krl dibawah pondasi pile cap dan sloof', 'm3'),
(69, 'beton fc 30 mpa', 'm3'),
(70, 'pembesian', 'kg'),
(71, 'bekisting', 'm2'),
(72, 'beton fc 35 mpa', 'm3'),
(73, 'baja hcs 40 (include accesoris)', 'kg'),
(74, 'baja iwf shape (include accesoris)', 'kg'),
(75, 'lantai 1', 'm'),
(76, 'lantai 2', 'm'),
(77, 'pek. balok beton lintel 10x15', 'm'),
(78, 'baja canal c gordeng 100 50 20', 'kg'),
(79, 'pek. atap aspal bitumen', 'm2'),
(80, 'pek. pas nok aspal', 'm'),
(81, '1 m2 pasang alluminium foil / sisalation', 'm2'),
(82, 'pek pas atap akrilik kubah ', 'm2'),
(83, 'pekerjaan lapisan bawah pondasi telford', 'm2'),
(84, 'pekerjaan lapen macadam ', 'm2'),
(85, 'pekerjaan pasangan batu belah1pc 5ps', 'm3'),
(86, 'pek. bongkaran bangunan existing', 'ls'),
(87, 'mobilisasi alat dan bahan', 'ls'),
(88, 'pas. bouwplank', 'm'),
(89, 'pembuatan papan nama kegiatan', 'ls'),
(90, 'biaya administrasi, + dokumentasi proyek', 'ls'),
(91, 'pek. galian tanah pondasi batu kali', 'm3'),
(92, 'pek. galian tanah pondasi setempat', 'm3'),
(93, 'pek. urugan pasir bawah pondasi batu kali t=5 cm', 'm3'),
(94, 'pek. urugan pasir bawah pondasi setempat t=5 cm', 'm3'),
(95, 'pek. urugan pasir bawah lantai t=5 cm', 'm3'),
(96, 'pek. aanstamping batu kali', 'm3'),
(97, 'pek. pondasi batu kali ad, 1 pc : 3 ps', 'm3'),
(98, 'pek. pondasi batu kali ad, 1 pc : 5 ps', 'm3'),
(99, 'pek. lantai kerja t= 5 cm', 'm3'),
(100, 'pek. kolom pedestral 25/25, kâ€225', 'm3'),
(101, 'pek. foot plat beton, kâ€225 ( 100 x 100 cm )', 'm3'),
(102, 'pek. sloof 20/25, kâ€225', 'm3'),
(103, 'pek. kolom praktis 12/12, kâ€175', 'm3'),
(104, 'pek. kolom struktur 25/25, kâ€225', 'm3'),
(105, 'pek. balok beton 20/30, kâ€225', 'm3'),
(106, 'pek. balok beton 20/40, kâ€225', 'm3'),
(107, 'pek. balok lintel 12/12, kâ€175', 'm3'),
(108, 'pek. plat beton t=12 cm, kâ€225 ( wermes mâ€8 rangkap )', 'm3'),
(109, 'pek. lisplang beton t=10 cm, kâ€225', 'm3'),
(110, 'pek. tangga beton ,kâ€225', 'm3'),
(111, 'pek. bata merah ad. 1 pc : 3 ps', 'm2'),
(112, 'pek. bata merah ad. 1 pc : 5 ps', 'm2'),
(113, 'pek. plesteran ad. 1pc : 3ps + acian', 'm2'),
(114, 'pek. plesteran ad. 1pc : 5ps + acian', 'm2'),
(115, 'pek. ornamen sisik ikan bag depan bahan besi dia 10 mm', 'ls'),
(116, 'pas. ornamen variasi batik garutan bahan besi plat', 'ls'),
(117, 'pek. reiling tangga besi hollow 4/4 cm', 'm2'),
(118, 'pekerjaan kusen alumunium type p1', 'unit'),
(119, 'pekerjaan kusen alumunium type p2', 'unit'),
(120, 'pekerjaan kusen alumunium type p3', 'unit'),
(121, 'pekerjaan kusen alumunium type p4 ( frameless 4 x 2,6 m )', 'unit'),
(122, 'pekerjaan kusen alumunium type pj1', 'unit'),
(123, 'pekerjaan kusen alumunium type j1', 'unit'),
(124, 'pekerjaan kusen alumunium type j2', 'unit'),
(125, 'pekerjaan kusen alumunium type j3', 'unit'),
(126, 'pekerjaan kusen alumunium type bv1', 'unit'),
(127, 'pekerjaan kusen alumunium type bv2', 'unit'),
(128, 'pek. rangka atap baja ringan', 'm2'),
(129, 'pek. atap genteng metal roof koraltek', 'm2'),
(130, 'pek. bubung genteng metal roof koraltek', 'm'),
(131, 'pek. lisplank woodplank', 'm'),
(132, 'pek. ampig wood plank 20 cm', 'm'),
(133, 'pas. ornamen variasi ujung lisplank bahan besi', 'bh'),
(134, 'pek. rangka plapon besi hollow 4/4,2/4', 'm2'),
(135, 'pek. plapon gypsum board', 'm2'),
(136, 'pek. list plapon gypsum', 'm'),
(137, 'pek. rabat beton kâ€100', 'm3'),
(138, 'pek. lantai granit 60/60 , sek garuda', 'm2'),
(139, 'pek. lantai granit 60/60 , sek garuda ( tangga )', 'm2'),
(140, 'pek. lantai granit 60/60 , sek garuda ( teras )', 'm2'),
(141, 'pek. lantai kramik 20/20 km/wc, sek mulia', 'm2'),
(142, 'pek. dinding kramik 20/25 ( corak ),sek mulia t=1,5 m', 'm2'),
(143, 'pek. pengecatan dinding, sek sanlex', 'm2'),
(144, 'pek. pengecatan plafond, sek sanlex', 'm2'),
(145, 'pek. pengecatan lisplank woodplank, sek seiv', 'm2'),
(146, 'pas. pipa pvc 3/4 \"', 'm'),
(147, 'pas. jet washer', 'bh'),
(148, 'pas. shower', 'bh'),
(149, 'pas. kran air', 'bh'),
(150, 'pas. kloset duduk monoblock sek ina', 'bh'),
(151, 'pas. kloset jongkok', 'bh'),
(152, 'pas. ploor drain', 'm'),
(153, 'pas. pipa 3\"', 'm'),
(154, 'pas. pipa 4\"', 'm'),
(155, 'pek. septictank + rembesan', 'bh'),
(156, 'pengadaan air bersih ( sumur gali )', 'ls'),
(157, 'pas. pompa air', 'unit'),
(158, 'pek. pas. instalasi listrik', 'ttk'),
(159, 'pek. inst. titik stop kontak', 'ttk'),
(160, 'pek. saklat tunggal', 'bh'),
(161, 'pek. saklat seri', 'bh'),
(162, 'pek. stop kontak', 'bh'),
(163, 'pek. pemas. lampu pijar 10 watt', 'bh'),
(164, 'pek. pemas. lampu sl 23 watt', 'bh'),
(165, 'pek. pemas. lampu baret kotak', 'bh'),
(166, 'pek. pemas. mcb pengaman', 'bh'),
(167, 'biaya penyambungan daya 1300 watt', 'ls'),
(168, 'pek. urugan pasir bawah lantai t=3 cm', 'm3'),
(169, 'pek. balok beton15/20, kâ€225', 'm3'),
(170, 'pek. balok beton 20/25, kâ€225', 'm3'),
(171, 'pek. ring balok 15/20 kâ€175', 'm3'),
(172, 'pek. kanopi beton t=10 cm, kâ€225', 'm3'),
(173, 'pek. plat beton meja wastafel t=10 cm, kâ€225', 'm3'),
(174, 'pekerjaan kusen alumunium type j4', 'unit'),
(175, 'pek. atap genteng metal roof', 'm2'),
(176, 'pek. bubung genteng metal roof', 'm'),
(177, 'pek. talang jure', 'm'),
(178, 'pek. dinding kramik 20/25 ( corak ),sek mulia', 'm2'),
(179, 'pek. pengecatan wood lisplank, sek seiv', 'm2'),
(180, 'pas. wastapel + cermin', 'bh'),
(181, 'pas.torn air kap 500 lt', 'bh'),
(182, 'pek. menara air t= 3 m', 'unit'),
(183, 'biaya administrasi, dan dokumentasi', 'ls'),
(184, 'pas. bouplank', 'm'),
(185, 'biaya pangadaan listrik kerja dan air kerja', 'ls'),
(186, 'pek. buangan puing sisa material', 'ls'),
(187, 'pek. galian tanah pondasi', 'm3'),
(188, 'pek. urugan tanah kembali', 'm3'),
(189, 'pek. urugan pasir bawah pondasi & lantai', 'm3'),
(190, 'pek. urugan sirtu peninggian lantai', 'm3'),
(191, 'pek. aanstamping batu belah', 'm3'),
(192, 'pek. pondasi batu belah ad. 1pc : 5ps', 'm3'),
(193, 'pek. pondasi telapak', 'm3'),
(194, 'pek. kolom padestal 30/40 k-225', 'm3'),
(195, 'pek. sloof 15/25, k-225', 'm3'),
(196, 'pek. kolom struktur 30/40 k-225', 'm3'),
(197, 'pek. kolom praktis 12/12, k-175', 'm3'),
(198, 'pek. balok lintel 12/12 k-175', 'm3'),
(199, 'pek. balok 15/20 k-225 (readymix)', 'm3'),
(200, 'pek. balok beton 30/40, k-225 (readymix)', 'm3'),
(201, 'pek. plat beton, k-225 (readymix)', 'm3'),
(202, 'pek. topi beton', 'm3'),
(203, 'pek. rabat beton tumbuk, k-100', 'm3'),
(204, 'pek. dinding bata ad. 1pc : 5ps', 'm2'),
(205, 'pek. plesteran dinding ad. 1pc : 5ps + acian', 'm2'),
(206, 'pek. lantai granit dn 60x60 cm , sek garuda', 'm2'),
(207, 'pek. lantai keramik 20x20 cm kw i corak', 'm2'),
(208, 'pek. dinding keramik 20x25 cm kw i polos', 'm2'),
(209, 'pas. kusen dan daun pintu p1', 'bh'),
(210, 'pas. kusen dan daun pintu p2', 'bh'),
(211, 'pas. kusen dan daun pintu pvc', 'bh'),
(212, 'pas. kusen dan daun jendela j2', 'bh'),
(213, 'pas. kusen dan daun jendela j3', 'bh'),
(214, 'pas. kusen bv1', 'bh'),
(215, 'pas. glass block', 'bh'),
(216, 'pek. rangka plafond hollow', 'm2'),
(217, 'pek. penutup plafond gypsum', 'm2'),
(218, 'pek. list plafond', 'm'),
(219, 'pek. pengecatan dinding', 'm2'),
(220, 'pek. pengecatan plafond', 'm2'),
(221, 'pemasangan listrik baru ( 6000 va )', 'ls'),
(222, 'pek. saklar tunggal', 'ttk'),
(223, 'pek. saklar ganda', 'ttk'),
(224, 'pek. pemas. lampu xl 25 w', 'bh'),
(225, 'pek. pemas. lampu tl 40 w philips', 'bh'),
(226, 'pek. pemas. panel mcb pengaman', 'ls'),
(227, 'pengadaan air bersih', 'ls'),
(228, 'torn air kap. 500 ltr + accecories', 'unit'),
(229, 'pemas. pompa air', 'unit'),
(230, 'pemas. pipa pvc dia. 1/2\" + accessories', 'm'),
(231, 'kran', 'bh'),
(232, 'pas. septiktank', 'bh'),
(233, 'pemas. pipa pvc dia. 3\" + accessories', 'm'),
(234, 'pemas. pipa pvc dia. 4\" + accessories', 'm'),
(235, 'pemas. closet jongkok', 'bh'),
(236, 'pemas. washtafel lengkap', 'bh'),
(237, 'pemas. floor drain stainless', 'bh');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `pmbrthn_id` int(11) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `pmbrthn_judul` varchar(255) NOT NULL,
  `pmbrthn_informasi` text NOT NULL,
  `pmbrthn_tanggal` date NOT NULL,
  `pmbrthn_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'manpro', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pra_rkk`
--

CREATE TABLE `pra_rkk` (
  `prarkk_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `rsko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pra_rkk`
--

INSERT INTO `pra_rkk` (`prarkk_id`, `pryk_id`, `rsko_id`) VALUES
(75, 1, 2),
(76, 1, 3);

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
(1, 1, 1, '01/ABS/SPL/PGD/2018', 'Rumah Singgah Anak Jalanan', '2017-05-19', 798285000, 'Gedung', 'Kabupaten Garut', 180, '2017-05-19', '0000-00-00', 'Perencanaan'),
(2, 1, 1, '12/asa/sdd/cas/1231', 'asdasd', '2018-07-20', 678000000, 'Gedung', 'asdadas', 180, '2018-07-20', '0000-00-00', 'Perencanaan');

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
(33, 1, 6, NULL, 0),
(35, 1, 14, 3, 18150),
(39, 1, 18, 142, 14710),
(40, 1, 19, NULL, 0),
(41, 1, 20, 4, 39600),
(42, 1, 21, NULL, 0),
(43, 1, 22, NULL, 0),
(44, 1, 23, NULL, 0),
(45, 1, 24, NULL, 0),
(46, 1, 25, 7, 128905),
(47, 1, 26, 9, 481547),
(48, 1, 27, NULL, 0),
(49, 1, 28, NULL, 0),
(50, 1, 29, NULL, 0),
(51, 1, 30, NULL, 0),
(52, 1, 31, NULL, 0),
(53, 1, 32, NULL, 0),
(54, 1, 33, NULL, 0),
(55, 1, 34, NULL, 0),
(56, 1, 35, NULL, 0),
(57, 1, 36, NULL, 0),
(58, 1, 37, NULL, 0),
(59, 1, 38, NULL, 0),
(60, 1, 47, NULL, 0),
(61, 1, 48, NULL, 0),
(62, 1, 49, NULL, 0),
(63, 1, 50, NULL, 0),
(64, 1, 51, NULL, 0),
(65, 1, 52, NULL, 0),
(66, 1, 53, NULL, 0),
(67, 1, 54, NULL, 0),
(68, 1, 55, NULL, 0),
(69, 1, 56, NULL, 0),
(70, 1, 57, NULL, 0),
(71, 1, 59, NULL, 0),
(72, 1, 60, NULL, 0),
(73, 1, 61, NULL, 0),
(74, 1, 62, NULL, 0),
(75, 1, 63, NULL, 0),
(76, 1, 64, NULL, 0),
(77, 1, 65, NULL, 0),
(78, 1, 66, NULL, 0),
(79, 1, 67, NULL, 0),
(80, 1, 68, NULL, 0),
(81, 1, 69, NULL, 0),
(82, 1, 70, NULL, 0),
(83, 1, 71, NULL, 0),
(84, 1, 72, NULL, 0),
(85, 1, 73, NULL, 0),
(86, 1, 74, NULL, 0),
(87, 1, 75, NULL, 0),
(88, 1, 76, NULL, 0),
(89, 1, 77, NULL, 0),
(90, 1, 78, NULL, 0),
(91, 1, 79, NULL, 0),
(92, 1, 80, NULL, 0),
(93, 1, 81, NULL, 0),
(94, 1, 82, NULL, 0),
(95, 1, 83, NULL, 0),
(96, 1, 84, 5, 21780),
(97, 1, 85, NULL, 0),
(98, 1, 86, NULL, 0),
(99, 2, 42, NULL, 0),
(100, 2, 44, NULL, 0),
(101, 2, 45, 2, 54450),
(102, 2, 46, 13, 48143);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `realisasi_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `realisasi_minggu` int(11) NOT NULL,
  `realisasi_biaya_aktual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`realisasi_id`, `pryk_id`, `realisasi_minggu`, `realisasi_biaya_aktual`) VALUES
(3, 1, 1, 900000),
(4, 1, 2, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_jadwal`
--

CREATE TABLE `realisasi_jadwal` (
  `reajad_id` int(11) NOT NULL,
  `realisasi_id` int(11) NOT NULL,
  `jdwl_id` int(11) NOT NULL,
  `reajad_bobot_rencana` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi_jadwal`
--

INSERT INTO `realisasi_jadwal` (`reajad_id`, `realisasi_id`, `jdwl_id`, `reajad_bobot_rencana`) VALUES
(3, 3, 162, 10.58),
(4, 4, 163, 6.32);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_pekerjaan`
--

CREATE TABLE `realisasi_pekerjaan` (
  `reapek_id` int(11) NOT NULL,
  `realisasi_id` int(11) NOT NULL,
  `strkpek_id` int(11) NOT NULL,
  `reapek_volume` double NOT NULL,
  `reapek_harga` int(11) NOT NULL,
  `reapek_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi_pekerjaan`
--

INSERT INTO `realisasi_pekerjaan` (`reapek_id`, `realisasi_id`, `strkpek_id`, `reapek_volume`, `reapek_harga`, `reapek_bobot`) VALUES
(1, 3, 14, 0.5, 9075, 0.03),
(2, 3, 18, 10, 147100, 0.48),
(3, 3, 20, 0, 0, 0),
(4, 3, 21, 0, 0, 0),
(5, 3, 22, 0, 0, 0),
(6, 3, 23, 0, 0, 0),
(7, 3, 25, 0, 0, 0),
(8, 3, 26, 0, 0, 0),
(9, 3, 28, 0, 0, 0),
(10, 3, 29, 0, 0, 0),
(11, 3, 30, 0, 0, 0),
(12, 3, 31, 0, 0, 0),
(13, 3, 32, 0, 0, 0),
(14, 3, 33, 0, 0, 0),
(15, 3, 34, 0, 0, 0),
(16, 3, 35, 0, 0, 0),
(17, 3, 36, 0, 0, 0),
(18, 3, 37, 0, 0, 0),
(19, 3, 38, 0, 0, 0),
(20, 3, 48, 0, 0, 0),
(21, 3, 49, 0, 0, 0),
(22, 3, 50, 0, 0, 0),
(23, 3, 51, 0, 0, 0),
(24, 3, 52, 0, 0, 0),
(25, 3, 54, 0, 0, 0),
(26, 3, 55, 0, 0, 0),
(27, 3, 56, 0, 0, 0),
(28, 3, 57, 0, 0, 0),
(29, 3, 59, 0, 0, 0),
(30, 3, 60, 0, 0, 0),
(31, 3, 61, 0, 0, 0),
(32, 3, 63, 0, 0, 0),
(33, 3, 64, 0, 0, 0),
(34, 3, 65, 0, 0, 0),
(35, 3, 67, 0, 0, 0),
(36, 3, 68, 0, 0, 0),
(37, 3, 70, 0, 0, 0),
(38, 3, 71, 0, 0, 0),
(39, 3, 72, 0, 0, 0),
(40, 3, 73, 0, 0, 0),
(41, 3, 74, 0, 0, 0),
(42, 3, 75, 0, 0, 0),
(43, 3, 76, 0, 0, 0),
(44, 3, 77, 0, 0, 0),
(45, 3, 78, 0, 0, 0),
(46, 3, 80, 0, 0, 0),
(47, 3, 81, 0, 0, 0),
(48, 3, 82, 0, 0, 0),
(49, 3, 83, 0, 0, 0),
(50, 3, 84, 0, 0, 0),
(51, 3, 85, 0, 0, 0),
(52, 3, 86, 0, 0, 0),
(53, 4, 14, 0.5, 9075, 0.03),
(54, 4, 18, 210, 3089100, 10.04),
(55, 4, 20, 98.24, 3890304, 12.64),
(56, 4, 21, 0, 0, 0),
(57, 4, 22, 0, 0, 0),
(58, 4, 23, 0, 0, 0),
(59, 4, 25, 0, 0, 0),
(60, 4, 26, 0, 0, 0),
(61, 4, 28, 0, 0, 0),
(62, 4, 29, 0, 0, 0),
(63, 4, 30, 0, 0, 0),
(64, 4, 31, 0, 0, 0),
(65, 4, 32, 0, 0, 0),
(66, 4, 33, 0, 0, 0),
(67, 4, 34, 0, 0, 0),
(68, 4, 35, 0, 0, 0),
(69, 4, 36, 0, 0, 0),
(70, 4, 37, 0, 0, 0),
(71, 4, 38, 0, 0, 0),
(72, 4, 48, 0, 0, 0),
(73, 4, 49, 0, 0, 0),
(74, 4, 50, 0, 0, 0),
(75, 4, 51, 0, 0, 0),
(76, 4, 52, 0, 0, 0),
(77, 4, 54, 0, 0, 0),
(78, 4, 55, 0, 0, 0),
(79, 4, 56, 0, 0, 0),
(80, 4, 57, 0, 0, 0),
(81, 4, 59, 0, 0, 0),
(82, 4, 60, 0, 0, 0),
(83, 4, 61, 0, 0, 0),
(84, 4, 63, 0, 0, 0),
(85, 4, 64, 0, 0, 0),
(86, 4, 65, 0, 0, 0),
(87, 4, 67, 0, 0, 0),
(88, 4, 68, 0, 0, 0),
(89, 4, 70, 0, 0, 0),
(90, 4, 71, 0, 0, 0),
(91, 4, 72, 0, 0, 0),
(92, 4, 73, 0, 0, 0),
(93, 4, 74, 0, 0, 0),
(94, 4, 75, 0, 0, 0),
(95, 4, 76, 0, 0, 0),
(96, 4, 77, 0, 0, 0),
(97, 4, 78, 0, 0, 0),
(98, 4, 80, 0, 0, 0),
(99, 4, 81, 0, 0, 0),
(100, 4, 82, 0, 0, 0),
(101, 4, 83, 0, 0, 0),
(102, 4, 84, 0, 0, 0),
(103, 4, 85, 0, 0, 0),
(104, 4, 86, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `risiko`
--

CREATE TABLE `risiko` (
  `rsko_id` int(11) NOT NULL,
  `rsko_nama` varchar(255) NOT NULL,
  `pek_id` int(11) NOT NULL,
  `rsko_nilai_probabilitas` varchar(10) NOT NULL,
  `rsko_nilai_dampak` varchar(10) NOT NULL,
  `rsko_tingkat` varchar(25) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `rsko_pengendalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risiko`
--

INSERT INTO `risiko` (`rsko_id`, `rsko_nama`, `pek_id`, `rsko_nilai_probabilitas`, `rsko_nilai_dampak`, `rsko_tingkat`, `jbtn_id`, `rsko_pengendalian`) VALUES
(2, 'Terbentur batu akibat galian tanah berbatu', 32, '0,1', '0,4', 'Rendah', 42, 'Hasil penggalian harus dirapihkan'),
(3, 'Tangan terluka akibat perkakas', 46, '0,1', '0,2', 'Rendah', 43, 'Memakai alat pelindung sarung tangan');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_pekerjaan`
--

CREATE TABLE `struktur_pekerjaan` (
  `strkpek_id` int(11) NOT NULL,
  `pryk_id` int(11) NOT NULL,
  `pek_id` int(11) DEFAULT NULL,
  `pek_id_pendahulu` int(11) DEFAULT NULL,
  `strkpek_no` varchar(15) DEFAULT NULL,
  `strkpek_volume` double DEFAULT NULL,
  `strkpek_status` enum('top','sub') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_pekerjaan`
--

INSERT INTO `struktur_pekerjaan` (`strkpek_id`, `pryk_id`, `pek_id`, `pek_id_pendahulu`, `strkpek_no`, `strkpek_volume`, `strkpek_status`) VALUES
(6, 1, 1, NULL, '1.', NULL, 'top'),
(14, 1, 184, 6, '1.1.', 1, 'sub'),
(18, 1, 186, 6, '1.2.', 220, 'sub'),
(19, 1, 32, NULL, '2.', 0, 'top'),
(20, 1, 187, 19, '2.1.', 98.24, 'sub'),
(21, 1, 188, 19, '2.2.', 32.75, 'sub'),
(22, 1, 189, 19, '2.3.', 14.4, 'sub'),
(23, 1, 190, 19, '2.4.', 102.343, 'sub'),
(24, 1, 5, NULL, '3.', 0, 'top'),
(25, 1, 191, 24, '3.1.', 14.94, 'sub'),
(26, 1, 192, 24, '3.2.', 44.61, 'sub'),
(27, 1, 33, NULL, '4.', 0, 'top'),
(28, 1, 193, 27, '4.1.', 4.64, 'sub'),
(29, 1, 194, 27, '4.2.', 3.48, 'sub'),
(30, 1, 195, 27, '4.3.', 4.67, 'sub'),
(31, 1, 196, 27, '4.4.', 13.92, 'sub'),
(32, 1, 103, 27, '4.5.', 0.63, 'sub'),
(33, 1, 107, 27, '4.6.', 0.59, 'sub'),
(34, 1, 199, 27, '4.7.', 0.54, 'sub'),
(35, 1, 200, 27, '4.8.', 15.12, 'sub'),
(36, 1, 201, 27, '4.9.', 28.8, 'sub'),
(37, 1, 202, 27, '4.10.', 0.29, 'sub'),
(38, 1, 203, 27, '4.11.', 2160, 'sub'),
(42, 2, 2, NULL, '1.', NULL, 'top'),
(44, 2, 1, NULL, '2.', 0, 'top'),
(45, 2, 63, 42, '1.1.', 350, 'sub'),
(46, 2, 236, 44, '2.1.', 10, 'sub'),
(47, 1, 34, NULL, '5.', 0, 'top'),
(48, 1, 204, 47, '5.1.', 397.15, 'sub'),
(49, 1, 205, 47, '5.2.', 794.31, 'sub'),
(50, 1, 206, 47, '5.3.', 242.49, 'sub'),
(51, 1, 207, 47, '5.4.', 34.65, 'sub'),
(52, 1, 208, 47, '5.5.', 66, 'sub'),
(53, 1, 46, NULL, '6.', 0, 'top'),
(54, 1, 209, 53, '6.1.', 5, 'sub'),
(55, 1, 210, 53, '6.2.', 3, 'sub'),
(56, 1, 211, 53, '6.3.', 6, 'sub'),
(57, 1, 212, 53, '6.4.', 3, 'sub'),
(59, 1, 213, 53, '6.5.', 1, 'sub'),
(60, 1, 214, 53, '6.6.', 14, 'sub'),
(61, 1, 215, 53, '6.7.', 84, 'sub'),
(62, 1, 47, NULL, '7.', 0, 'top'),
(63, 1, 216, 62, '7.1.', 288, 'sub'),
(64, 1, 217, 62, '7.2.', 288, 'sub'),
(65, 1, 218, 62, '7.3.', 257, 'sub'),
(66, 1, 38, NULL, '8.', 0, 'top'),
(67, 1, 219, 66, '8.1.', 833.51, 'sub'),
(68, 1, 220, 66, '8.2.', 269.33, 'sub'),
(69, 1, 48, NULL, '9.', 0, 'top'),
(70, 1, 221, 69, '9.1.', 1, 'sub'),
(71, 1, 158, 69, '9.2.', 21, 'sub'),
(72, 1, 159, 69, '9.3.', 5, 'sub'),
(73, 1, 222, 69, '9.4.', 1, 'sub'),
(74, 1, 223, 69, '9.5.', 8, 'sub'),
(75, 1, 162, 69, '9.6.', 5, 'sub'),
(76, 1, 224, 69, '9.7.', 9, 'sub'),
(77, 1, 225, 69, '9.8.', 12, 'sub'),
(78, 1, 226, 69, '9.9.', 1, 'sub'),
(79, 1, 49, NULL, '10.', 0, 'top'),
(80, 1, 227, 79, '10.1.', 1, 'sub'),
(81, 1, 228, 79, '10.2.', 1, 'sub'),
(82, 1, 229, 79, '10.3.', 1, 'sub'),
(83, 1, 230, 79, '10.4.', 15, 'sub'),
(84, 1, 231, 79, '10.5.', 10, 'sub'),
(85, 1, 232, 79, '10.6.', 1, 'sub'),
(86, 1, 233, 79, '10.7.', 40, 'sub');

-- --------------------------------------------------------

--
-- Table structure for table `upah`
--

CREATE TABLE `upah` (
  `upah_id` int(11) NOT NULL,
  `jbtn_id` int(11) NOT NULL,
  `upah_satuan` varchar(5) NOT NULL,
  `upah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upah`
--

INSERT INTO `upah` (`upah_id`, `jbtn_id`, `upah_satuan`, `upah_harga`) VALUES
(1, 5, 'oh', 63000),
(2, 6, 'oh', 74000),
(3, 7, 'oh', 84000),
(4, 8, 'oh', 74000),
(5, 9, 'oh', 84000),
(6, 12, 'oh', 74000),
(7, 13, 'oh', 84000),
(8, 14, 'oh', 74000),
(9, 15, 'oh', 84000),
(10, 16, 'oh', 74000),
(11, 17, 'oh', 84000),
(12, 18, 'oh', 74000),
(13, 19, 'oh', 84000),
(14, 20, 'oh', 90000),
(15, 21, 'oh', 62000),
(16, 22, 'oh', 87000),
(17, 23, 'oh', 82000),
(18, 24, 'oh', 82000),
(19, 25, 'oh', 92000),
(20, 26, 'oh', 87000),
(21, 27, 'oh', 82000),
(22, 28, 'oh', 82000),
(23, 29, 'oh', 82000),
(24, 30, 'oh', 87000),
(25, 31, 'oh', 82000),
(26, 32, 'oh', 102000),
(27, 33, 'oh', 82000),
(28, 34, 'oh', 82000),
(29, 35, 'oh', 87000),
(30, 36, 'oh', 75000),
(31, 38, 'oh', 75000),
(32, 39, 'oh', 80000),
(33, 40, 'oh', 75000),
(34, 41, 'oh', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahsp`
--
ALTER TABLE `ahsp`
  ADD PRIMARY KEY (`ahsp_id`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`bhnbku_id`);

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
-- Indexes for table `jadwal_tenaga_kerja`
--
ALTER TABLE `jadwal_tenaga_kerja`
  ADD PRIMARY KEY (`jdwltenker_id`),
  ADD KEY `jdwl_id` (`jdwl_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

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
  ADD PRIMARY KEY (`kgtnbhnbku_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`),
  ADD KEY `bhnbku_id` (`bhnbku_id`);

--
-- Indexes for table `kegiatan_harian_pekerjaan`
--
ALTER TABLE `kegiatan_harian_pekerjaan`
  ADD PRIMARY KEY (`kgtnpek_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`),
  ADD KEY `strkpek_id` (`strkpek_id`);

--
-- Indexes for table `kegiatan_harian_risiko`
--
ALTER TABLE `kegiatan_harian_risiko`
  ADD PRIMARY KEY (`kgtnrsko_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`),
  ADD KEY `rsko_id` (`rsko_id`);

--
-- Indexes for table `kegiatan_harian_tenaga_kerja`
--
ALTER TABLE `kegiatan_harian_tenaga_kerja`
  ADD PRIMARY KEY (`kgtntenker_id`),
  ADD KEY `kgtnhari_id` (`kgtnhari_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

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
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`pek_id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`pmbrthn_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pgna_id`);

--
-- Indexes for table `pra_rkk`
--
ALTER TABLE `pra_rkk`
  ADD PRIMARY KEY (`prarkk_id`),
  ADD KEY `pryk_id` (`pryk_id`),
  ADD KEY `rsko_id` (`rsko_id`);

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
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`realisasi_id`),
  ADD KEY `pryk_id` (`pryk_id`);

--
-- Indexes for table `realisasi_jadwal`
--
ALTER TABLE `realisasi_jadwal`
  ADD PRIMARY KEY (`reajad_id`),
  ADD KEY `realisasi_id` (`realisasi_id`),
  ADD KEY `jdwl_id` (`jdwl_id`);

--
-- Indexes for table `realisasi_pekerjaan`
--
ALTER TABLE `realisasi_pekerjaan`
  ADD PRIMARY KEY (`reapek_id`),
  ADD KEY `realisasi_id` (`realisasi_id`),
  ADD KEY `strkpek_id` (`strkpek_id`);

--
-- Indexes for table `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`rsko_id`),
  ADD KEY `jbtn_id` (`jbtn_id`),
  ADD KEY `pek_id` (`pek_id`);

--
-- Indexes for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  ADD PRIMARY KEY (`strkpek_id`),
  ADD KEY `pryk_id` (`pryk_id`),
  ADD KEY `pek_id` (`pek_id`),
  ADD KEY `pek_id_pendahulu` (`pek_id_pendahulu`);

--
-- Indexes for table `upah`
--
ALTER TABLE `upah`
  ADD PRIMARY KEY (`upah_id`),
  ADD KEY `jbtn_id` (`jbtn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahsp`
--
ALTER TABLE `ahsp`
  MODIFY `ahsp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `bhnbku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT for table `detail_ahsp_bahan_baku`
--
ALTER TABLE `detail_ahsp_bahan_baku`
  MODIFY `detahspbb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `detail_ahsp_upah`
--
ALTER TABLE `detail_ahsp_upah`
  MODIFY `detahspupah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jbtn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jdwl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `jadwal_tenaga_kerja`
--
ALTER TABLE `jadwal_tenaga_kerja`
  MODIFY `jdwltenker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  MODIFY `kgtnhari_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_bahan_baku`
--
ALTER TABLE `kegiatan_harian_bahan_baku`
  MODIFY `kgtnbhnbku_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_pekerjaan`
--
ALTER TABLE `kegiatan_harian_pekerjaan`
  MODIFY `kgtnpek_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_risiko`
--
ALTER TABLE `kegiatan_harian_risiko`
  MODIFY `kgtnrsko_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_harian_tenaga_kerja`
--
ALTER TABLE `kegiatan_harian_tenaga_kerja`
  MODIFY `kgtntenker_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `klien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `pmbrthn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pgna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pra_rkk`
--
ALTER TABLE `pra_rkk`
  MODIFY `prarkk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `pryk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `rab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `realisasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `realisasi_jadwal`
--
ALTER TABLE `realisasi_jadwal`
  MODIFY `reajad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `realisasi_pekerjaan`
--
ALTER TABLE `realisasi_pekerjaan`
  MODIFY `reapek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `risiko`
--
ALTER TABLE `risiko`
  MODIFY `rsko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  MODIFY `strkpek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `upah`
--
ALTER TABLE `upah`
  MODIFY `upah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `jadwal_tenaga_kerja`
--
ALTER TABLE `jadwal_tenaga_kerja`
  ADD CONSTRAINT `jadwal_tenaga_kerja_ibfk_1` FOREIGN KEY (`jdwl_id`) REFERENCES `jadwal` (`jdwl_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_tenaga_kerja_ibfk_2` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`pgna_id`) REFERENCES `pengguna` (`pgna_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pra_rkk`
--
ALTER TABLE `pra_rkk`
  ADD CONSTRAINT `pra_rkk_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`peg_id`) REFERENCES `pegawai` (`peg_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`klien_id`) REFERENCES `klien` (`klien_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rab_ibfk_2` FOREIGN KEY (`strkpek_id`) REFERENCES `struktur_pekerjaan` (`strkpek_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rab_ibfk_3` FOREIGN KEY (`ahsp_id`) REFERENCES `ahsp` (`ahsp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_1` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `risiko_ibfk_2` FOREIGN KEY (`pek_id`) REFERENCES `pekerjaan` (`pek_id`) ON UPDATE CASCADE;

--
-- Constraints for table `struktur_pekerjaan`
--
ALTER TABLE `struktur_pekerjaan`
  ADD CONSTRAINT `struktur_pekerjaan_ibfk_1` FOREIGN KEY (`pek_id`) REFERENCES `pekerjaan` (`pek_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stuktur_pekerjaan_ibfk_1` FOREIGN KEY (`pryk_id`) REFERENCES `proyek` (`pryk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `upah`
--
ALTER TABLE `upah`
  ADD CONSTRAINT `upah_ibfk_1` FOREIGN KEY (`jbtn_id`) REFERENCES `jabatan` (`jbtn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
