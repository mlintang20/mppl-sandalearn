-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 12:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandalearn_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `jawaban`, `id_soal`) VALUES
(1, 'ꦱꦥꦶ', 1),
(2, 'ꦒꦗꦃ', 1),
(3, 'ꦲꦸꦭꦺꦴ', 1),
(4, 'ꦗꦫꦤ꧀', 1),
(5, 'ꦏꦼꦧꦺꦴ', 2),
(6, 'ꦗꦫꦤ꧀', 2),
(7, 'ꦲꦸꦭꦺꦴ', 2),
(8, 'ꦱꦥꦶ', 2),
(9, 'ꦲꦸꦭꦺꦴ', 3),
(10, 'ꦱꦥꦶ', 3),
(11, 'ꦮꦼꦝꦸꦱ꧀', 3),
(12, 'ꦗꦫꦤ꧀', 3),
(13, 'ꦱꦥꦶ', 4),
(14, 'ꦒꦗꦃ', 4),
(15, 'ꦲꦸꦭꦺꦴ', 4),
(16, 'ꦗꦫꦤ꧀', 4),
(17, 'ꦏꦼꦧꦺꦴ', 5),
(18, 'ꦗꦫꦤ꧀', 5),
(19, 'ꦲꦸꦭꦺꦴ', 5),
(20, 'ꦱꦥꦶ', 5),
(21, 'ꦲꦸꦭꦺꦴ', 6),
(22, 'ꦱꦥꦶ', 6),
(23, 'ꦮꦼꦝꦸꦱ꧀', 6),
(24, 'ꦗꦫꦤ꧀', 6),
(25, 'ꦏ꧀ꦭꦼꦥꦺꦴꦤ꧀', 7),
(26, 'ꦮꦶꦁ​ꦏꦺꦴ', 7),
(27, 'ꦮꦗꦶꦏ꧀', 7),
(28, 'ꦥꦼꦕꦼꦭ꧀', 7),
(29, 'ꦮꦶꦁ​ꦏꦺꦴ', 8),
(30, 'ꦏꦸꦥꦠ꧀', 8),
(31, 'ꦮꦗꦶꦏ꧀', 8),
(32, 'ꦭꦺꦩ꧀ꦥꦺꦂ', 8),
(33, 'ꦊꦩ꧀ꦥꦼꦂ', 9),
(34, 'ꦭꦺꦩ꧀ꦥꦺꦂ', 9),
(35, 'ꦏ꧀ꦭꦼꦥꦺꦴꦤ꧀', 9),
(36, 'ꦮꦶꦁ​ꦏꦺꦴ', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `bahasa` varchar(5) NOT NULL,
  `media` varchar(6) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `bahasa`, `media`, `level`) VALUES
(1, 'jawa', 'gambar', 1),
(2, 'jawa', 'audio', 1),
(3, 'jawa', 'gambar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` varchar(26) NOT NULL,
  `id_kuis` int(11) NOT NULL,
  `waktu_selesai` timestamp NOT NULL DEFAULT current_timestamp(),
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `id_kuis`, `waktu_selesai`, `skor`) VALUES
('052gb77uh2scha1sah9g22aqeh', 2, '2022-12-17 10:44:50', 0),
('0f82oheh2iduirkp6qe0otk4el', 2, '2022-12-17 11:05:32', 100),
('13685vuksojq6b96p9qk6p2r36', 1, '2022-12-17 09:15:15', 200),
('1i52343cncn3oevp9pu4t9jnc7', 1, '2022-12-17 09:11:30', 200),
('3briau7jje2bo2oa6fj05qb4ea', 1, '2022-12-17 09:15:35', 100),
('3e2nhrvnako2jei7ep6vitht9p', 2, '2022-12-17 11:00:47', 100),
('412lr6vguqh576inh70jdmf2de', 2, '2022-12-17 10:33:50', 0),
('5jkmqd1v97r3c2tjaaon2dnpkl', 2, '2022-12-17 10:34:06', 0),
('5rp5b4h3huu87ha8hheue5ush7', 2, '2022-12-17 11:07:15', 100),
('72e6dakog07m9haka8gesvp5qf', 1, '2022-12-17 09:00:13', 200),
('7lqqv9jc6cedl06t1cfg2hi5lq', 1, '2022-12-17 09:02:42', 300),
('7qptevj71pv9vf9noa8tie8kpr', 2, '2022-12-17 10:45:51', 0),
('80mbi97cge8mmgtuc2i825v2kg', 2, '2022-12-17 10:38:17', 0),
('8rnm6ujtipu1urodq6u1oiv75l', 2, '2022-12-17 11:01:05', 100),
('8ta65cs7fe5692l678flb9gm61', 2, '2022-12-17 10:59:02', 100),
('9r0ae8i24lq1dhkst9drggsohk', 2, '2022-12-17 08:41:29', 0),
('ahffi391v0g8c8qf355l9277qn', 1, '2022-12-17 08:50:04', 200),
('csuivht1njvv68llc5mmlgp1db', 3, '2022-12-17 11:08:32', 0),
('dt26bs12r0p3kg8km7i1cln40u', 2, '2022-12-17 10:47:23', 0),
('e80b195ailr1tbpftdluiqpcam', 2, '2022-12-17 10:38:11', 0),
('g4otplqdij3bar99nvisprml6u', 2, '2022-12-17 10:52:47', 0),
('hd4r8a1tj1qegsl0gdrhik9047', 1, '2022-12-17 08:48:12', 200),
('i97qlrbhsk8fb7ek2p9e0gimt1', 2, '2022-12-17 10:51:42', 0),
('iess2fqifmc0vv5bbqu8cttb05', 3, '2022-12-17 10:41:14', 0),
('jqbmp8lltecop6cdf1mnkdo400', 1, '2022-12-17 08:51:40', 200),
('ksqj1jhi2gv876jdhccqpjfj90', 1, '2022-12-17 10:31:27', 200),
('lj78865epu2nhkrl41hs7uvi3u', 2, '2022-12-17 08:47:50', 0),
('mf481tkkkuptefc2dncj7ip6po', 1, '2022-12-17 10:49:37', 300),
('mhopm05ijuftg73odpoes0c35m', 1, '2022-12-17 08:49:14', 200),
('nm5hebkc8cbtdgt4iqs1t4kup2', 2, '2022-12-17 10:46:17', 0),
('o77a2r10gfqecr5dp0n159svtv', 2, '2022-12-17 10:51:57', 0),
('omgllitmvnn9s9js783o13u5tp', 2, '2022-12-17 10:53:22', 0),
('op32jha44j1hpa0kohhvj76oc7', 1, '2022-12-17 09:14:13', 200),
('p92bf9kfb48qt90pson1fk8eq4', 1, '2022-12-17 08:57:18', 200),
('posmnv9v4qrkl6f4pvjofgvd75', 1, '2022-12-17 08:53:07', 200),
('pv9r55kleics3hu4nnubn9mpd7', 1, '2022-12-17 09:59:40', 200),
('t1o8l0gu54mn0g5qagap9a9hp3', 1, '2022-12-17 09:13:24', 200),
('t3afk3cl39li459eoe9phkuviv', 2, '2022-12-17 11:00:03', 100),
('v70ttgldfi8i96hmmhah2m5k76', 2, '2022-12-17 10:44:27', 0),
('vb7999o6u505dng0krprvi9mi8', 2, '2022-12-17 10:56:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_kuis` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `id_kunci` int(11) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `detail_pembahasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_kuis`, `pertanyaan`, `id_kunci`, `attachment`, `detail_pembahasan`) VALUES
(1, 1, 'Kanthi nggunakake aksara Jawa, gambar ing dhuwur iki jenenge', 4, 'kuda.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama hewan yang ada pada gambar. Jawaban yang benar adalah D. JARAN karena gambar tersebut merupakan gambar KUDA (JARAN)'),
(2, 1, 'Kanthi nggunakake aksara Jawa, gambar ing dhuwur iki jenenge', 5, 'kerbau.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama hewan yang ada pada gambar. Jawaban yang benar adalah A. KEBO karena gambar tersebut merupakan gambar KERBAU (KEBO)'),
(3, 1, 'Kanthi nggunakake aksara Jawa, gambar ing dhuwur iki jenenge', 11, 'kambing.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama hewan yang ada pada gambar. Jawaban yang benar adalah C. WEDHUS karena gambar tersebut merupakan gambar KAMBING (WEDHUS)'),
(4, 2, 'Rungokno lan tulisen tembung ing dhuwur nganggo aksara jawa', 16, 'kuda.mp3', 'Pada soal ini hewan yang diucapkan adalah kuda atau dalam bahasa jawa adalah Jaran. Maka jawaban yang benar adalah D. ꦗꦫꦤ꧀   atau dalam tulisan latin ja-ra-n'),
(5, 2, 'Rungokno lan tulisen tembung ing dhuwur nganggo aksara jawa', 17, 'kerbau.mp3', 'Pada soal ini hewan yang diucapkan adalah kerbau atau dalam bahasa jawa adalah kebo. Maka jawaban yang benar adalah A. ꦏꦼꦧꦺꦴ   atau dalam tulisan latin Ke-bo'),
(6, 2, 'Rungokno lan tulisen tembung ing dhuwur nganggo aksara jawa', 23, 'kambing.mp3', 'Pada soal ini hewan yang diucapkan adalah kambing atau dalam bahasa jawa adalah wedhus . Maka jawaban yang benar adalah C. ꦮꦼꦝꦸꦱ꧀  atau dalam tulisan latin We-dhus'),
(7, 3, 'Panganan sing digawe saka sayur mayor digodhog banjur disiram sambel kacang yaiku', 28, 'pecel.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama makanan. Jawaban yang benar adalah D. PECEL karena gambar tersebut merupakan gambar PECEL'),
(8, 3, 'Panganan sing digawe saka beras dibuntel janur wujude pesagi yaiku', 30, 'kupat.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama makanan yang ada pada gambar. Jawaban yang benar adalah B. KUPAT karena gambar tersebut merupakan gambar KETUPAT'),
(9, 3, 'Panganan sing digawe saka ketan, isine abon utawa srundeng, dibuntel godhong gedhang, lan didang yaiku', 33, 'lemper.png', 'Pada soal ini kamu diminta untuk memilih jawaban yang tepat tentang nama makanan yang ada pada gambar. Jawaban yang benar adalah A. LEMPER karena gambar tersebut merupakan gambar LEMPER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `fk_id_soal` (`id_soal`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`),
  ADD KEY `id_kuis` (`id_kuis`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_id_kuis` (`id_kuis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Constraints for table `sesi`
--
ALTER TABLE `sesi`
  ADD CONSTRAINT `sesi_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
