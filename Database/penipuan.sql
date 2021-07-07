-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 06:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penipuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `email`) VALUES
(1, 'admin1', 'admin', 'Admin X', 'admin_x01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(2) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `jml_digit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `jml_digit`) VALUES
(1, 'Bank Negara Indonesia (BNI)', 10),
(2, 'Bank Central Asia (BCA)', 10),
(3, 'Bank Rakyat Indonesia (BRI)', 15),
(4, 'Bank Mandiri', 13),
(5, 'Bank Syariah Mandiri (BSM)', 10),
(7, 'Bank Muamalat', 10),
(8, 'Bank BNI Syariah', 10),
(9, 'Bank BRI Syariah', 10),
(10, 'Bank CIMB Niaga', 13),
(11, 'Bank BTN', 16),
(12, 'Lainnya', 16);

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id_bukti` int(5) NOT NULL,
  `id_lpr` int(5) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`id_bukti`, `id_lpr`, `foto`) VALUES
(24, 20, '20_BUKTI_1.jpg'),
(25, 20, '20_BUKTI_2.jpg'),
(39, 17, '17_BUKTI_1.jpg'),
(41, 18, '18_BUKTI_1.png'),
(42, 18, '18_BUKTI_2.png'),
(43, 18, '18_BUKTI_3.png'),
(44, 19, '19_BUKTI_1.jpg'),
(45, 19, '19_BUKTI_2.jpg'),
(46, 19, '19_BUKTI_3.png'),
(47, 21, '21_BUKTI_1.png'),
(48, 22, '22_BUKTI_1.png'),
(49, 23, '23_BUKTI_1.png'),
(50, 24, '24_BUKTI_1.png'),
(51, 25, '25_BUKTI_1.png'),
(52, 26, '26_BUKTI_1.png'),
(53, 26, '26_BUKTI_2.png'),
(54, 27, '27_BUKTI_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(5) NOT NULL,
  `id_plp` int(5) NOT NULL,
  `norek` varchar(16) NOT NULL,
  `jml_kerugian` varchar(50) NOT NULL,
  `media` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_laporan` date NOT NULL,
  `kronologi` text NOT NULL,
  `id_admin` int(2) DEFAULT NULL,
  `tgl_knfr` date DEFAULT NULL,
  `status_knfr` enum('Ditolak','Diterima') DEFAULT NULL,
  `pesan_knfr` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_plp`, `norek`, `jml_kerugian`, `media`, `tgl_transaksi`, `tgl_laporan`, `kronologi`, `id_admin`, `tgl_knfr`, `status_knfr`, `pesan_knfr`) VALUES
(17, 1, '8090004776', '7000000', 'instagram', '2020-12-13', '2020-12-13', 'penipu melakukan aksinya dengan menjual produk fiktif. saat selesai melakukan tranasaksi, barang tak kunjung dikirim. seluruh kontak penjual tidak dapat dihubungi,', 1, '2021-01-26', 'Ditolak', 'tidak ada kejelasan, dan sudah ada laporan yang terkonfirmasi untuk nomor rekening yang sama.'),
(18, 1, '8090004776', '7000000', 'ig ajah', '2020-12-13', '2020-12-13', 'Coba edit bisa2?', NULL, '2020-12-04', 'Ditolak', 'Text penolakan dalam detail'),
(19, 1, '8090004776', '8000000', 'bismillah', '2020-12-13', '2020-12-13', 'Coba edit bisaX?', NULL, '2020-12-13', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(20, 1, '8090004776', '1200000', 'Facebook', '2020-12-18', '2020-12-18', 'penipu melakukan aksinya dengan menjual produk fiktif. saat selesai melakukan tranasaksi, barang tak kunjung dikirim. seluruh kontak penjual tidak dapat dihubungi,', 1, '2020-12-18', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(21, 1, '8090004776', '1200000', 'Facebook', '2021-01-22', '2021-01-22', 'coba if', 1, '2021-01-22', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(22, 1, '8090004776', '1200000', 'Facebook', '2021-01-22', '2021-01-22', 'coba if 21', 1, '2021-01-22', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(23, 1, '0372568656', '100000', 'fb', '2021-01-22', '2021-01-22', '231', NULL, NULL, NULL, NULL),
(24, 1, '0372568656', '123', 'fb', '2021-01-22', '2021-01-22', '12321421', 1, '2021-01-22', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(25, 1, '0372568656', '100000', 'fb', '2021-01-16', '2021-01-22', 'cobayawak', 1, '2021-01-22', 'Ditolak', 'kamu sudah memiliki laporan yang telah diterima untuk nomor rekening ini!'),
(26, 3, '6440561991', '12500000', 'Facebook', '2021-01-26', '2021-01-26', 'penipuan berkedok jual murah butuh uang', 1, '2021-01-26', 'Diterima', 'Selamat! Laporan Anda telah diterima.'),
(27, 6, '5370103889', '7000', 'Media sosial', '2021-01-27', '2021-01-27', 'Penipu melakukan penipuan barang tidak dikirim', 1, '2021-01-27', 'Ditolak', 'Data bukti tidak cukup kuat');

-- --------------------------------------------------------

--
-- Table structure for table `no_rek`
--

CREATE TABLE `no_rek` (
  `no_rek` varchar(16) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `id_b` int(2) DEFAULT NULL,
  `status` enum('Terlapor','Penipu','Tidak Diketahui','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_rek`
--

INSERT INTO `no_rek` (`no_rek`, `nama_nasabah`, `id_b`, `status`) VALUES
('0111094585', 'Taufiqur Rachman Sutrisno', 2, 'Penipu'),
('0221551469', 'Bintang ', 2, 'Penipu'),
('0221564986', 'Demak Tampubolon', 2, 'Penipu'),
('0372568656', 'Bambang Muri Eko Han', 2, 'Penipu'),
('0372568656123', 'Bambang Muri Eko Han', 4, 'Terlapor'),
('0611900138', 'MUTIARA BERLINTAN BU', 2, 'Penipu'),
('1260471453', 'ENDRIANTO', 2, 'Penipu'),
('1461646935', 'Daniel Ivan', 2, 'Penipu'),
('1810175016', 'Ayi Restu Diputra', 2, 'Penipu'),
('2111283836', 'Ricky sugiarto', 2, 'Penipu'),
('2332364376', 'Dedi Setiadi', 2, 'Penipu'),
('2460371841', 'teguh budiarto', 2, 'Penipu'),
('3403463821', 'Iqro Syafaat', 2, 'Penipu'),
('4381391315', 'vino harlan', 2, 'Penipu'),
('4450801912', ' RAHMI HIDAYAH', 2, 'Penipu'),
('5150982105', 'Rudi Heryadi', 2, 'Penipu'),
('5270599275', 'Vincent Noble Biputra', 2, 'Penipu'),
('5370103889', 'HENDRY BUDIONO', 2, 'Penipu'),
('6070226870', 'Emy Susanti', 2, 'Penipu'),
('6440561991', 'Chandra Hartanto', 2, 'Penipu'),
('8090004776', 'Anthony S', 2, 'Penipu'),
('8110352124', 'ANDRI GINANJAR SAPUTRA', 2, 'Penipu'),
('8190018912', 'Rita Kusumawati', 2, 'Penipu'),
('8430052145', 'Adam', 2, 'Penipu'),
('8490051369', 'Ria Yunita Sari ', 2, 'Penipu'),
('8690509360', 'Soritua Hardianto Manurung', 2, 'Penipu');

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `id_user` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`id_user`, `username`, `password`, `nama_pelapor`, `email`) VALUES
(1, 'PCB1', '123', 'Andika Pratama', 'andikatama1998@gmail.com'),
(2, 'coba123', '12345', 'Riandy', 'cobacoba12@gmail.com'),
(3, 'tama123', 'andikatama', 'Andi Tama', 'tsubasaanditama@gmail.com'),
(4, 'coba12345', '123123', 'Anwar', 'cobajadi123@gmail.com'),
(5, 'ujicoba123', '123123', 'Andika', '32213@gmail.com'),
(6, 'coba123123123', '123123123', 'Andika', '2016470152@ftumj.ac.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_lpr` (`id_lpr`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_plp` (`id_plp`,`norek`),
  ADD KEY `fk_norek_laporan` (`norek`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `no_rek`
--
ALTER TABLE `no_rek`
  ADD PRIMARY KEY (`no_rek`),
  ADD KEY `id_b` (`id_b`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bukti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `fk_laporan_bukti` FOREIGN KEY (`id_lpr`) REFERENCES `laporan` (`id_laporan`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_admin_laporan` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_norek_laporan` FOREIGN KEY (`norek`) REFERENCES `no_rek` (`no_rek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengguna_laporan` FOREIGN KEY (`id_plp`) REFERENCES `pelapor` (`id_user`);

--
-- Constraints for table `no_rek`
--
ALTER TABLE `no_rek`
  ADD CONSTRAINT `fk_bank` FOREIGN KEY (`id_b`) REFERENCES `bank` (`id_bank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
