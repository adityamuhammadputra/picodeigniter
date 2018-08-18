-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 01:49 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cari_barengan`
--

CREATE TABLE `tbl_cari_barengan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cari_barengan`
--

INSERT INTO `tbl_cari_barengan` (`id`, `username`, `tanggal`, `kategori`, `tujuan`, `asal`, `tanggal_berangkat`, `tanggal_pulang`, `deskripsi`) VALUES
(42, 'admin', '2017-03-27 04:26:55', 'Gunung', 'Gunung salak', 'Bogor', '2017-03-02', '2017-03-09', ' coba'),
(51, 'admin', '2017-03-30 16:19:02', 'Air Terjun', 'coba', 'padang', '2017-03-03', '2017-03-11', 'cari barengan yuhuuuu'),
(52, 'admin', '2017-03-30 16:19:43', 'Explore', 'Lombok', 'jambi', '2017-03-11', '2017-03-11', 'cek'),
(53, 'admin', '2017-03-31 13:21:08', 'Panjat tebing', 'keraton', 'Cirebon', '2017-03-04', '2017-03-11', 'coba cari barengan'),
(54, 'usercobaa', '2017-03-31 16:40:54', 'Air Terjun', 'Gunung salak', 'Bogor', '2017-03-04', '2017-03-10', 'cobAAAAA'),
(55, 'admin', '2017-04-02 08:44:20', 'Air Terjun', 'Lombok', 'padang', '2017-04-07', '2017-04-15', 'masukan deskripsi'),
(56, 'useracul', '2017-04-06 18:11:06', 'Goa', 'Goa Walet', 'Kalimantan', '2017-04-07', '2017-04-29', 'Saya dari kalimantan, yuk ah bareng nenn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id`, `username`, `foto`, `tanggal`) VALUES
(14, 'admin', '20170409170616.jpg', '2017-04-09 17:06:16'),
(15, 'admin', '20170409170918.jpg', '2017-04-09 17:09:18'),
(16, 'admin', '20170416095350.jpg', '2017-04-16 09:53:50'),
(17, 'admin', '20170416100734.jpg', '2017-04-16 10:07:34'),
(18, 'admin', '20170416102941.png', '2017-04-16 10:29:41'),
(20, 'user', '20170417093455.PNG', '2017-04-17 09:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_wisata`
--

CREATE TABLE `tbl_info_wisata` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info_wisata`
--

INSERT INTO `tbl_info_wisata` (`id`, `username`, `tanggal`, `id_kategori`, `judul`, `foto`, `deskripsi`) VALUES
(8, 'admin', '2017-04-05 00:00:00', 'Pantai', 'Pelabuhan Pink', '20170328193717.jpg', ' (ketinggian puncak 2.930 m dpl, per 2010) adalah gunung berapi di bagian tengah Pulau Jawa dan merupakan salah satu gunung api teraktif di Indonesia. Lereng sisi selatan berada dalam administrasi Kabupaten Sleman, Daerah Istimewa Yogyakarta, dan sisanya berada dalam wilayah Provinsi Jawa Tengah, yaitu Kabupaten Magelang di sisi barat, Kabupaten Boyolali di sisi utara dan timur, serta Kabupaten Klaten di sisi tenggara. Kawasan hutan di sekitar puncaknya menjadi kawasan Taman Nasional Gunung Merapi sejak tahun 2004. Gunung ini sangat berbahaya karena menurut catatan modern mengalami erupsi (puncak keaktifan) setiap dua sampai lima tahun sekali dan dikelilingi oleh permukiman yang sangat padat. Sejak tahun 1548, gunung ini sudah meletus sebanyak 68 kali.[butuh rujukan] Kota Magelang dan Kota Yogyakarta adalah kota besar terdekat, berjarak di bawah 30 km dari puncaknya. Di lerengnya masih terdapat permukiman sampai ketinggian 1700 m dan hanya berjarak empat kilometer dari puncak. Oleh karena tingkat kepentingannya ini, Merapi menjadi salah satu dari enam belas gunung api dunia yang termasuk dalam proyek Gunung Api Dekade ini. '),
(15, 'useracul', '2017-04-06 18:17:48', 'Goa', 'Goa Walet', '20170406181748.jpg', ' dicari pendaki gunung ketika berkemah. Bila berkunjung ke Gunung Ciremai,  Kuningan, Jawa Barat, Goa Walet adalah tempat yang tepat. Goa Walet adalah daerah berupa cekungan yang di salah satu sisinya terdapat gua berstalaktit dan stalagmit. Daerah yang memiliki luas sekira 0,3 Ha ini berada pada ketinggian 2.950 meter di atas permukaan laut atau hanya 300 meter dari puncak Gunung Ciremai. Tempat ini bisa menjadi pilihan berkemah bagi pendaki yang naik melalui jalur Patulungan atau jalur Apuy. Puluhan tenda dapat didirikan di area tersebut, beberapa juga bisa masuk ke dalam gua. Dari dalam gua, pendaki bisa memanfaatkan tetesan air dari dalam goa yang dapat ditampung untuk kegiatan mencuci dan memasak. Namun demikian, untuk sampai ke Goa Walet memang tidak mudah. Penulis melakukan perjalanan melalui jalur Palutungan sebelumnya harus melalui delapan pos, yaitu Palutungan, Cigowong, Kuta, Pangguyangan Badak, Arban, Tanjakan Asoy, Pasanggrahan, dan Sanghiyang Ropoh.'),
(16, 'admin', '2017-04-16 07:50:22', 'Gunung', 'Gunung Semeru', '20170416075022.jpg', ' Gunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut (mdpl). Gunung Semeru juga merupakan gunung berapi tertinggi ketiga di Indonesia setelah Gunung Kerinci di Sumatera dan Gunung Rinjani di Nusa Tenggara Barat[1]. Kawah di puncak Gunung Semeru dikenal dengan nama Jonggring Saloko. Gunung Semeru secara administratif termasuk dalam wilayah dua kabupaten, yakni Kabupaten Malang dan Kabupaten Lumajang, Provinsi Jawa Timur. Gunung ini termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.\r\n\r\nSemeru mempunyai kawasan hutan Dipterokarp Bukit, hutan Dipterokarp Atas, hutan Montane, dan Hutan Ericaceous atau hutan gunung.\r\n\r\n\r\nPada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang.\r\nPada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang.\r\nPada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang.\r\n\r\nGunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut (mdpl). Gunung Semeru juga merupakan gunung berapi tertinggi ketiga di Indonesia setelah Gunung Kerinci di Sumatera dan Gunung Rinjani di Nusa Tenggara Barat[1]. Kawah di puncak Gunung Semeru dikenal dengan nama Jonggring Saloko. Gunung Semeru secara administratif termasuk dalam wilayah dua kabupaten, yakni Kabupaten Malang dan Kabupaten Lumajang, Provinsi Jawa Timur. Gunung ini termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru. Semeru mempunyai kawasan hutan Dipterokarp Bukit, hutan Dipterokarp Atas, hutan Montane, dan Hutan Ericaceous atau hutan gunung. Pada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang. Pada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang. Pada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Disebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komen`
--

CREATE TABLE `tbl_komen` (
  `id` int(11) NOT NULL,
  `id_post` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `type_post` enum('post','caribarengan') NOT NULL,
  `komen` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komen`
--

INSERT INTO `tbl_komen` (`id`, `id_post`, `username`, `type_post`, `komen`, `date`) VALUES
(13, 166, 'admin', 'post', 'as', '2017-04-17 08:42:21'),
(14, 167, 'admin', 'post', 'ad', '2017-04-17 08:42:35'),
(15, 169, 'admin', 'post', 'aa', '2017-04-17 08:49:50'),
(16, 170, 'admin', 'post', 'a', '2017-04-17 08:51:13'),
(17, 171, 'admin', 'post', 'as', '2017-04-17 08:56:06'),
(18, 171, 'admin', 'post', 'ass', '2017-04-17 08:56:10'),
(19, 171, 'admin', 'post', '', '2017-04-17 08:56:11'),
(20, 171, 'admin', 'post', 'asss', '2017-04-17 08:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `post` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `username`, `post`, `tanggal`) VALUES
(140, 'user2', ' dsadsa', '0000-00-00 00:00:00'),
(156, 'usercoba', ' Coba', '2017-03-27 08:41:11'),
(166, 'admin', ' as', '2017-04-17 08:42:16'),
(167, 'admin', ' ad', '2017-04-17 08:42:25'),
(169, 'admin', ' aa', '2017-04-17 08:49:35'),
(170, 'admin', ' a', '2017-04-17 08:51:11'),
(171, 'admin', 'ass', '2017-04-17 08:56:03'),
(172, 'user', 'Ini user\r\n', '2017-04-17 11:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rumah_singgah`
--

CREATE TABLE `tbl_rumah_singgah` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kategori_kontak` varchar(20) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rumah_singgah`
--

INSERT INTO `tbl_rumah_singgah` (`id`, `username`, `tanggal`, `lokasi`, `kategori_kontak`, `kontak`, `deskripsi`) VALUES
(23, 'usercobaa', '2017-03-31 16:44:13', 'jampang', 'Sms / Call', '085778888684', 'FDSF'),
(24, 'usercobaa', '2017-03-31 16:45:33', 'Jakarta', 'id Line', '085778888684', 'COBAAAAAAA'),
(25, 'admin', '2017-03-31 16:47:12', 'Bogor', 'Sms / Call', '085778888684', 'saya dari bogor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  `hobby` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kategori_kontak` varchar(20) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'tidak_aktif',
  `about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `nama`, `tempat`, `tgl_lahir`, `alamat`, `hubungan`, `hobby`, `pekerjaan`, `kategori_kontak`, `kontak`, `kota`, `provinsi`, `foto`, `level`, `status`, `about`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'Muhammad Aditya Putra', 'Bogor', '1996-08-10', 'Kp. Cinagara Rt. 02/05 Kec. Caringin', 'Berpacaran', 'berenang, ngopi, makan tidur dasar jomblo huft', 'Mahasiswa', 'Sms / Call', '085778888584', 'Bogor', 'Jawabarat', '20170328190756.jpg', 'admin', 'aktif', '      Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih. Nama Saya Muhammad Aditya Putra. Ini About Me saya makasih.                   '),
(2, 'user', '', 'ee11cbb19052e40b07aac0ca060c23ee', 'Percobaan User', 'Bogor', '1996-08-10', 'Kp. Cinagara 02/05 kec. caringin', 'Nikah', 'Ngops Nikmat Sekali', 'Mahasiswa', 'Pin BBM', '5369CABE', 'Bogor', 'Jawabarat', '20170329155418.jpg', 'user', 'aktif', 'yooooo sususuus          '),
(6, 'admin2', 'adityamuhammadputra@yahoo.com', 'c84258e9c39059a89ab77d846ddab909', 'Syakir', 'Bogor', '2017-03-01', '', '', 'bobo', 'Mahasiswa', '', '', 'Bogor', 'Jawabarat', 'syakir.jpg', 'admin', 'aktif', ''),
(25, 'user10', 'adityamuhammadputra@gmail.com', '990d67a9f94696b1abe2dccf06900322', '', '', '', '', '', '', '', '', '', '', '', '', 'user', 'aktif', ''),
(26, 'usercobaa', 'adityamuhammadputra@gmail.com', 'c5e538b2dbf4a3387f48c3fc08b8c7ab', 'Ini User Cobaaa', 'Bogor', '2017-03-07', 'desa Cinagara, Caringin Bogor', 'Berpacaran', 'main main', 'mahasiswa', 'Whatsup', '085778888684', 'bogor', 'Jawabarat', '20170331163938.jpg', 'user', 'tidak_aktif', 'main lah utamakan'),
(27, 'useracul', 'adityamuhammadputra@yahoo.com', '6bad2f4bf76846857088304911cb908d', 'Syamsul G', 'Bogor', '2017-08-17', 'Kp. Cinagara 02/05 kec. caringin', 'Nikah', 'berenang, ngopi, makan tidur dasar jomblo huft', 'ob', 'Sms / Call', '085778888684', 'bogor', 'Jawabarat', '20170406180938.jpg', 'user', 'tidak_aktif', 'Nama komet, saya hobi ngopi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cari_barengan`
--
ALTER TABLE `tbl_cari_barengan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_wisata`
--
ALTER TABLE `tbl_info_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rumah_singgah`
--
ALTER TABLE `tbl_rumah_singgah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cari_barengan`
--
ALTER TABLE `tbl_cari_barengan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_info_wisata`
--
ALTER TABLE `tbl_info_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `tbl_rumah_singgah`
--
ALTER TABLE `tbl_rumah_singgah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
