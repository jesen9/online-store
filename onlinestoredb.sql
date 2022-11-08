-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 04:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `admin_gender`, `admin_address`, `admin_phone`, `admin_email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jason Lionardi', 'Male', 'Elmore Street No. 6', '081290140997', 'jasonlionardi@yahoo.com'),
(2, 'Hambir', 'ceb112e1518a9ebb8c03381d6a8859e8', '鄧嬿朱', 'Female', 'Constitución, 4\r\n36960 Sanxenxo', '+34669 250 455', 'DengYanShu@jourrapide.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Accessories'),
(2, 'Necessities'),
(5, 'Premium'),
(6, 'Electronics'),
(7, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `courier`, `tarif`) VALUES
(1, 'JNE', 20000),
(2, 'J&T', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telepon_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'berurewkukhxgbtgbe@miucce.online', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'Bambang Miucce', '0123456789', '                                    Jalan Kemana mana'),
(2, 'qrvczotktlymwqsfjg@upived.com', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 'Mawar Upived', '0987654321', 'Jalan 123'),
(3, 'johndoe@gmail.com', '7ba0b9f392045f0f100648ddca5b8e19', 'John Doe', '+123456789', 'Elmore Street'),
(6, 'jasonlionardi@yahoo.com', '0a56ae7889eafa7b2a028c0ec712cf49', 'Jason Lionardi', '081290140997', 'Jl. Angke Jaya IX'),
(7, 'loremipsum@mail.com', 'd2e16e6ef52a45b7468f1da56bba1953', 'Lorem Ipsum', '9427598328', '                                                                                                            Christmas Rd.                                                                                                            '),
(8, 'CindyJJustice@armyspy.com', '4e4d6c332b6fe62a63afe56171fd3725', 'Cindy J. Justice', '+1612-228-7337', '4779 Lodgeville Road\r\nSaint Paul, MN 55114'),
(9, 'Dingdowas@armyspy.com', 'e9f5713dec55d727bb35392cec6190ce', '米丸 昭夫', '(021) 5020-766', '71 Murvale Drive\r\nShelly Park\r\nManukau 2014'),
(10, 'MaPeiRong@rhyta.com', 'f3c2cefc1f3b082a56f52902484ca511', '馬佩蓉', '(02) 6146 8070', '90 Frencham Street\r\nBURAJA NSW 2646'),
(11, 'SveinfridurAgnarsdottir@armyspy.com', '529ca8050a00180790cf88b63468826a', 'Sveinfríður Agnarsdóttir', '079 2706 3186', '54 Bootham Terrace\r\nRATTAR\r\nKW14 8DQ'),
(12, 'KarinaKarataev@armyspy.com', '087c0240f9b3e816d50ad96a20f432e3', 'Karina Karataev', '+44079 6822 4087', '99 Redcliffe Way\r\nWOODTHORPE\r\nLE12 8HY ');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 25, 'Bambang', 'BCA', 201025000, '2020-11-20', '2020112013050120191107_141505.jpg'),
(3, 27, 'Bambang', 'BCA', 100025000, '2020-11-20', '2020112015580820191106_111015.jpg'),
(4, 26, 'Bambang', 'BCA', 1020000, '2020-11-20', '2020112016314220191108_114052.jpg'),
(5, 28, 'Bambang', 'BCA', 1025000, '2020-11-20', '2020112016320020191105_092203.jpg'),
(6, 29, 'Bambang', 'BCA', 20000, '2020-11-20', '2020112016354220191105_092203.jpg'),
(8, 18, 'Mawar Upived', 'Mandiri', 1025000, '2020-11-20', '2020112017030820191105_092203.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(255) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `courier`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(18, 2, 2, '2020-11-20', 1025000, '', 0, '', 'Payment receipt sent', ''),
(19, 2, 0, '2020-11-20', 1000000, '', 0, '', 'Pending', ''),
(20, 2, 2, '2020-11-20', 100025000, '', 0, '', 'Pending', ''),
(21, 2, 1, '2020-11-20', 101020000, '', 0, '', 'Pending', ''),
(22, 2, 2, '2020-11-20', 1025000, '', 0, '', 'Pending', ''),
(23, 2, 2, '2020-11-20', 302025000, '', 0, '', 'Pending', ''),
(24, 2, 2, '2020-11-20', 102025000, 'Cirebon', 25000, '', 'Pending', ''),
(25, 1, 2, '2020-11-20', 201025000, 'Cirebon', 25000, 'Jonggol', 'Shipped', '984750230512'),
(26, 1, 1, '2020-11-20', 1020000, 'Demak', 20000, 'idk lol', 'Paid', '945927332'),
(27, 1, 2, '2020-11-20', 100025000, 'Cirebon', 25000, '', 'Paid', '09857309874028935'),
(28, 1, 2, '2020-11-20', 1025000, 'Cirebon', 25000, 'hohoho', 'Shipped', '27456917359'),
(29, 1, 1, '2020-11-20', 20000, 'Demak', 20000, 'haha', 'Cancelled', '98649238123'),
(31, 2, 2, '2020-11-20', 100025000, 'Cirebon', 25000, 'hhsdf', 'Pending', ''),
(32, 2, 1, '2020-11-20', 1020000, 'Demak', 20000, 'Jakarta', 'Pending', ''),
(33, 2, 1, '2020-11-20', 101020000, 'Demak', 20000, 'nowhere', 'Pending', ''),
(34, 2, 2, '2020-11-20', 100025000, 'Cirebon', 25000, 'kemana ajalah', 'Pending', ''),
(35, 1, 2, '2020-11-22', 51025000, 'J&T', 25000, '', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(3, 14, 8, 3, '', 0, 0, 0, 0),
(4, 14, 9, 2, '', 0, 0, 0, 0),
(5, 14, 10, 3, '', 0, 0, 0, 0),
(6, 15, 8, 3, '', 0, 0, 0, 0),
(7, 15, 9, 2, '', 0, 0, 0, 0),
(8, 15, 10, 3, '', 0, 0, 0, 0),
(9, 16, 8, 3, '', 0, 0, 0, 0),
(10, 16, 9, 2, '', 0, 0, 0, 0),
(11, 16, 10, 3, '', 0, 0, 0, 0),
(12, 18, 9, 1, '', 0, 0, 0, 0),
(13, 19, 9, 1, '', 0, 0, 0, 0),
(14, 19, 8, 1, '', 0, 0, 0, 0),
(15, 20, 8, 1, '', 0, 0, 0, 0),
(16, 20, 10, 1, '', 0, 0, 0, 0),
(17, 21, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(18, 21, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(19, 21, 8, 1, 'Kumpulan Hooman', 0, 350000, 350000, 0),
(20, 22, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(21, 23, 9, 2, 'Mobil2 PM Jepang', 1000000, 1000000, 2000000, 2000000),
(22, 23, 10, 3, 'Sika Deer', 100000000, 10000, 30000, 300000000),
(23, 23, 8, 1, 'Kumpulan Hooman', 0, 350000, 350000, 0),
(24, 24, 9, 2, 'Mobil2 PM Jepang', 1000000, 1000000, 2000000, 2000000),
(25, 24, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(26, 25, 8, 1, 'Kumpulan Hooman', 0, 350000, 350000, 0),
(27, 25, 10, 2, 'Sika Deer', 100000000, 10000, 20000, 200000000),
(28, 25, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(29, 26, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(30, 27, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(31, 28, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(32, 29, 8, 1, 'Kumpulan Hooman', 0, 350000, 350000, 0),
(33, 30, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(34, 30, 10, 3, 'Sika Deer', 100000000, 10000, 30000, 300000000),
(35, 31, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(36, 32, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(37, 33, 9, 1, 'Mobil2 PM Jepang', 1000000, 1000000, 1000000, 1000000),
(38, 33, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(39, 34, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(40, 34, 8, 1, 'Kumpulan Hooman', 0, 350000, 350000, 0),
(41, 0, 9, 1, 'Japanese Cars', 1000000, 1000000, 1000000, 1000000),
(42, 0, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(43, 0, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(44, 0, 9, 1, 'Japanese Cars', 1000000, 1000000, 1000000, 1000000),
(45, 0, 14, 1, 'Z Fold 2', 35000000, 282, 282, 35000000),
(46, 0, 10, 1, 'Sika Deer', 100000000, 10000, 10000, 100000000),
(47, 0, 14, 1, 'Z Fold 2', 35000000, 282, 282, 35000000),
(48, 0, 9, 1, 'Japanese Cars', 1000000, 1000000, 1000000, 1000000),
(49, 35, 9, 1, 'Japanese Cars', 1000000, 1000000, 1000000, 1000000),
(50, 35, 14, 1, 'Z Fold 2', 35000000, 282, 282, 35000000),
(51, 35, 18, 1, 'Surface Pro 7', 15000000, 790, 790, 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(9, 1, 'Japanese Cars', 1000000, 1000000, '20191107_120727 (2).jpg', 'Don\'t even think about it.        ', 11),
(10, 1, 'Sika Deer', 100000000, 10000, '20191106_103835 (2).jpg', 'Rare Japanese deers, only found in Itsukushima, Japan.', 7),
(11, 2, 'Shoes', 3000000, 500, 'Allbirds_WL_RN_SF_PDP_Natural_Grey_BTY_ecd11f8e-88f8-4342-b0d6-979d95b1f22d.jpg', '            Normal shoes for normal human activities like running and walking.        ', 20),
(14, 2, 'Z Fold 2', 35000000, 282, 'galaxy-z-fold2_highlights_kv_full_m (2).jpg', 'The first of its kind. You can\'t afford it.', 97),
(15, 1, 'Tissot Watch', 8000000, 50, 'messageImage_1605955300261.jpg', 'Brushed metal finish, sapphire watch cover, unrivaled durability.', 10000),
(16, 2, 'Dird', 5000000, 10, '20191104_211615 (2).jpg', 'A dog and bird hybrid. Very rare. Keeps you company when you\'re lonely.', 5),
(18, 2, 'Surface Pro 7', 15000000, 790, 'Surface_Home_Mosic_Fall_20_Pro_7_en-us_V1 (2).jpg', 'Ultra-light and versatile. At your desk, on the couch, or in the yard, get more done your way with Surface Pro 7, featuring a laptop-class Intel® Core™ processor, all-day battery,¹ and HD cameras.', 999),
(19, 2, 'Galaxy Note 9', 12000000, 201, 'messageImage_1606014416404 (2).jpg', 'The Galaxy Note9 surpasses the high expectations of the people who demand more from their phones. This super powerful phone lets you focus on what matters most in today’s always-on, mobile world.', 10000),
(23, 1, 'Power Bank', 700000, 300, 'messageImage_1606016955887.jpg', 'Charges your electronic devices', 1000),
(27, 2, 'Tissue', 10000, 100, 'messageImage_1606027336915 (2).jpg', 'Made with paper', 100000),
(28, 7, 'Badminton Racket', 200000, 50, 'messageImage_1606050283265.jpg', '\r\nB6500i - This beginner\'s racquet comprised of its aluminium frame and steel shaft provides a robust racquet for recreational players.\r\n\r\n> Flex: Stiff\r\n> Weight / Grip: U (Av 98g) G4\r\n> Stringing: U 16-20lbs\r\n> Frame: Aluminium\r\n> Shaft Tech Steel', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `staff_username` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_gender` varchar(255) NOT NULL,
  `staff_address` text NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `staff_username`, `staff_name`, `staff_gender`, `staff_address`, `staff_phone`, `staff_email`, `staff_password`) VALUES
(1, 'janedoe', 'Jane Doe', 'Female', 'Elmore Street No. 5                ', '+123456789', 'janedoe@mail.com', 'a8c0d2a9d332574951a8e4a0af7d516f'),
(3, 'prave1990', '高品 良子', 'Female', '            Spresstrasse 41\r\n33649 Bielefeld Holtkamp         ', '+490521 12 55 42', 'Prave1990@dayrep.com', '1cbdf59e25a4eab387b3a4f65ab69f35'),
(4, 'Exas1960', 'Maximilian Vogt', 'Male', 'Borstelmannsweg 25\r\n92655 Grafenwöhr', '+4909605 11 60 76', 'MaximilianVogt@dayrep.com', '42a50bb412e1f17352a1cd28a4d62143'),
(5, 'Reet1976', 'Raoul Guilmette', 'Male', '36, rue Cazade\r\n93700 DRANCY ', '+3301.30.25.93.59', 'RaoulGuilmette@jourrapide.com', '5f3b91d06c7aa51e3b677454be465fd5'),
(6, 'kellykc', 'Kelly Christina', 'Female', 'Jl. Arwana 5 No. 12', '084983459823', 'kelly.christina@binus.ac.id', 'ae074a5692dfb7c26aae5147e52ceb40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
