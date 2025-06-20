-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'seda155', 'seda15', 'seda');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_foto` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `tgl_upload`, `nama_foto`, `keterangan`, `foto`) VALUES
(1, '2024-12-11', 'Kharisma Kupang', 'Toko Kharisma', 'upload/AF1QipMB084NlYdewAU30IfhAsY0NLQNq_Ot9JJWzXbu=s512.jpeg'),
(2, '2024-12-11', 'Filosofi Laptop Kupang', 'Bagi teman-teman yang ingin servis Laptop,Notebook,Printer dan Hp yuk mampir ke Sherfich test Pelayanannya ramah dan cepat,disini juga terdapat berbagai macam Laptop,notebook dan printer yang baru maupun second serta tersedia aksesoris Laptop lainnya dengan Harga terjangkau', 'upload/AF1QipMJHyKYnFe8eut5JKS9b9dDdWjLvXRi-XqlfJ5N=w473-h298-k-no.jpeg'),
(3, '2024-12-11', 'Pasundan Computer Kupang', 'Pelayanan baik, proses transaksi juga cepat, harga juga sedikit lebih murah dari toko lain (setelah dibandingkan dengan harga di beberapa toko di kota Kupang)\r\n\r\nSemoga bisa tambah jenis dan unit laptop biar lebih bervariasi.', 'upload/AF1QipPUkDaTzAe-YvkXsMnjW4R6IR274YntrEAzYDr0=w408-h552-k-no.jpeg'),
(4, '2024-12-11', 'Citra Utama Komputer Kupang', 'Recommended untuk belanja Laptop dan Barang Elektronik kebutuhan Kantor. Harga murah dan kualitas terjamin. ', 'upload/AF1QipO-Sd9HC3I67FTrjnt_1Yvy2VmddNuzHxZUX3jC=w408-h882-k-no.jpeg'),
(5, '2024-12-11', 'Timorese Computer Kupang', 'Tempat mencari laptop,notebook,merk asus', 'upload/AF1QipOOpQzgShz6UnUEthb5rkyiqfmeIjiN6YvNCF1I=w408-h306-k-no.jpeg'),
(6, '2025-01-24', 'bidcab', 'toko laptop', 'upload/bidcab.jpg'),
(7, '0000-00-00', 'iBox Lippo Plaza Kupang', 'jual laptop macbook', 'upload/lippo.jpg'),
(8, '2023-02-01', 'Boby Computer', 'toko laptop', 'upload/bobi.jpg'),
(9, '2024-02-24', 'Rumah Laptop Injeksi ', 'toko laptop dan service', 'upload/injeksi.jpg'),
(10, '2025-01-24', 'Jl Computer', 'toko laptop', 'upload/jl.jpg'),
(11, '2024-02-24', 'Palapa Komputer', 'toko laptop', 'upload/palapa.jpg'),
(12, '2025-01-24', 'SCA Komputer', 'toko laptop', 'upload/sca.jpg'),
(13, '2025-02-20', 'Toko Unistar', 'toko laptop', 'upload/unistar.jpg'),
(14, '2024-01-20', 'Acer Exclusive Store Kupang', 'toko acer', 'upload/acer.jpg'),
(15, '2024-04-02', 'JENI COMPUTER', 'toko laptop murah dan service', 'upload/jeni.jpg'),
(16, '2024-01-23', 'Toko Edison Cabang Kupang Sudirman', 'toko laptop', 'upload/edison.jpg'),
(17, '2024-02-11', 'AS TECT', 'JUAL LAPTOP BEKAS/SEKEN/SECOND ', 'upload/Astec.jpg'),
(18, '2025-02-23', 'DMC COMPUTER', 'toko laptop dan service', 'upload/dmc.jpg'),
(19, '2024-03-23', 'Berdikari Computer Store', 'toko laptop', 'upload/bendikari.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id_laptop`, `id_toko`, `nama`, `deskripsi`, `foto1`) VALUES
(5, 1, 'ASUS Vivobook Pro 15 OLED (N6506)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ Ultra 9 185H processor\r\nUp to NVIDIA® GeForce® RTX™ 4060 Laptop GPU\r\nDedicated Neural processing unit\r\nUp to DDR5 24GB 5600MHz\r\nUp to 2TB PCIe® 4.0 SSD\r\nUp to 125 W CPU+GPU TDP\r\nASUS AiSense Camera', 'uploads/foto_6793a52e8a3401.33408231.png'),
(6, 1, 'ASUS Vivobook Pro 16X OLED (K6604)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps', 'uploads/foto_6793a5ffa3bc18.92999858.jpg'),
(7, 1, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nIntel® Evo™ certified laptop\r\nUp to Intel® Core™ Ultra processor\r\nThin and light:1.2kg, 14.9mm\r\n75wh battery capacity\r\nUp to 14\" 120Hz 3K OLED HDR display\r\nUp to 32 GB memory\r\nUp to 1 TB SSD', 'uploads/foto_6793a6ca2f1b53.54294556.jpg'),
(8, 2, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a7ec3ddcc9.37173437.jpg'),
(9, 2, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nIntel® Evo™ certified laptop\r\nUp to Intel® Core™ Ultra processor\r\nThin and light:1.2kg, 14.9mm\r\n75wh battery capacity\r\nUp to 14\" 120Hz 3K OLED HDR display\r\nUp to 32 GB memory\r\nUp to 1 TB SSD\r\n', 'uploads/foto_6793a817c38729.12531894.jpg'),
(10, 3, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nIntel® Evo™ certified laptop\r\nUp to Intel® Core™ Ultra processor\r\nThin and light:1.2kg, 14.9mm\r\n75wh battery capacity\r\nUp to 14\" 120Hz 3K OLED HDR display\r\nUp to 32 GB memory\r\nUp to 1 TB SSD\r\n', 'uploads/foto_6793a86b344d69.81825755.jpg'),
(11, 3, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a885bc2d42.12340810.jpg'),
(12, 4, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a897bcb468.73519856.jpg'),
(13, 5, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8a7e06302.98217656.jpg'),
(14, 6, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8b649e936.78331365.jpg'),
(15, 7, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8c48a9d53.41478278.jpg'),
(16, 8, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8d2d1b572.51602259.jpg'),
(17, 9, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8e04877d2.13372533.jpg'),
(18, 10, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8eff39fa9.74242315.jpg'),
(19, 11, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a8fe570ca2.00851615.jpg'),
(20, 12, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a90d5c0d98.15355458.jpg'),
(21, 13, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a91c45c023.40105404.jpg'),
(22, 14, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a92b00ebd9.99856372.jpg'),
(23, 15, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a93a30ee66.49342868.jpg'),
(24, 16, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a951383ad1.02394624.jpg'),
(25, 17, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a95f5fb1e0.31974177.jpg'),
(26, 18, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a9742a09f1.61673225.jpg'),
(27, 19, 'ASUS Zenbook 14 OLED (UX3405)', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to Intel® Core™ i9 HX55 processor\r\nUp to NVIDIA® GeForce RTX 4070 GPU\r\nUp to 3.2K 120 Hz OLED display\r\nUp to 64 GB DDR5 with dual SO-DIMM\r\nUp to 2 TB SSD with one M.2 Slot\r\nASUS IceCool Pro thermal technology\r\nDual Thunderbolt™ 4 for up to 40Mbps\r\n', 'uploads/foto_6793a985c99b33.38325482.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `kecamatan` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama`, `deskripsi`, `kecamatan`, `lat`, `lng`) VALUES
(1, 'Oeboboqqq', 'Terdapat Di Keluarahan Oebobo', 'Oebobo', '-10.1670558', '123.6010708'),
(2, 'Fatululi', 'Di Kelurahan Fatululi', 'Oebobo', '-10.1586905', '123.6038272'),
(3, 'Oebobo', 'Di Kelurahan Oebobo', 'Oebobo', '-10.1739841', '123.5980947'),
(4, 'Oetete', 'Di Kelurahan Oetete', 'Oebobo', '-10.1639649', '123.5807844'),
(5, 'Liliba', 'Di Kelurahan Liliba', 'Oebobo', '-10.1665604', '123.644217'),
(6, 'Kuanino', 'Jl. Jenderal Sudirman No.10, Nunleu, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', ' Kec. Kota Raja', '-10.169770340219326', '123.58642242869485'),
(7, 'fatululi', 'Jl. Veteran, Fatululi, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.', ' Kec. Klp. Lima', '-10.15925421697097', ' 123.61147835426769'),
(8, 'Kompleks Ruko, Flobamora Mall', 'Kompleks Ruko, Flobamora Mall, Jl. W.J. Lalamentik No.67, Oebufu, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Kec. Oebobo', '-10.174330647654138', '123.61314688495564'),
(9, 'pohon duri', 'Pohon Duri, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim. 85228', 'Kec. Klp. Lima', '-10.149188710002498', '123.64064906961154'),
(10, 'Depan Lapas Kelas IIA, Jl. Jupiter', ' Oesapa Sel., Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim. 85228', ' Kec. Klp. Lima', '-10.15813210141557', ' 123.65375348125202'),
(11, 'oebobo', 'Jl. Palapa No.19c, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Kec. Oebobo', '-10.172359866781854', ' 123.60011362358031'),
(12, 'Samping Makro Meubel, Jl. Cak Doko No.21', 'Samping Makro Meubel, Jl. Cak Doko No.21, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', ' Kec. Oebobo', '-10.166013863221206', '123.59572336775989'),
(13, 'Jl. W.J. Lalamentik No.73', 'Jl. W.J. Lalamentik No.73, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', 'Kec. Oebobo', '-10.168186081886809', '123.60577866776006'),
(14, 'Jl. W.J. Lalamentik No.27', 'Jl. W.J. Lalamentik No.27, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', ' Kec. Oebobo', '-10.166743164605485', '123.60103987542905'),
(15, 'Jl. Frans Seda No.88F', 'Jl. Frans Seda No.88F, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', ' Kec. Oebobo', '-10.165148600216675', ' 123.60837236590807'),
(16, 'Jl. Jendral Sudirman No. 171', 'Jl. Jendral Sudirman No. 171, Kuanino, Kecamatan Kota Raja, Kuanino, Kota Raja, Kupang City, East Nusa Tenggara 85119', 'Kecamatan Kota Raja', '-10.175863647666802', ' 123.59444093522069'),
(17, 'fatululi', 'Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', ' Kec. Oebobo', '-10.154493808589349', ' 123.60873686263267'),
(18, 'fatululi', 'RJR5+3RX, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Kec. Oebobo', '-10.157873239941875', '123.60916601607121'),
(19, 'Jl. W.J. Lalamentik No.81', 'Jl. W.J. Lalamentik No.81, 85111, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85142', ' Kec. Oebobo', '-10.167673388867504', '123.60624777268899');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_galeri` int(11) NOT NULL,
  `nama_toko` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` text NOT NULL,
  `jam_operasional` text NOT NULL,
  `kategori_produk` text NOT NULL,
  `mark_tersedia` text NOT NULL,
  `rating` text NOT NULL,
  `layanan_ekstra` text NOT NULL,
  `status_aktif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_lokasi`, `id_galeri`, `nama_toko`, `alamat`, `no_telpon`, `jam_operasional`, `kategori_produk`, `mark_tersedia`, `rating`, `layanan_ekstra`, `status_aktif`) VALUES
(1, 2, 3, 'Kharisma Komputer Kupang', 'Jl. W.J. Lalamentik No.27, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', '08113834561', 'Rabu,10.00–18.00', 'Toko Laptop', 'https://kharismaonline.com/', '222', 'Tersedia barang elektronik seperti komputer printer dan aksesoris nya. Bisa juga modif printer ke tinta inject disni', '1'),
(2, 2, 3, 'Pasundan Computer Kupang', 'Lontar Permai, Jl. R. W. Monginsidi Ruko No.2 Blok C, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', '081222018998', 'Kamis,09.00–21.00', 'Toko Laptop', '-', '5 Dari 5', 'Tersedia barang elektronik seperti komputer printer dan aksesoris nya. Bisa juga modif printer ke tinta inject disni', '1'),
(3, 3, 4, 'Citra Utama Computer', 'Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '08113813002', 'Kamis,08.00–14.00,17.00–19.00', 'Toko Laptop', '-', '5 Dari 5', 'Tersedia barang elektronik seperti komputer printer dan aksesoris nya. Bisa juga modif printer ke tinta inject disni', '1'),
(4, 4, 5, 'Timorese Computer Kupang', 'Jl. Tompello No.23E2, Oetete, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '0380821751', 'Kamis,09.00–20.00', 'Toko Laptop', '-', '5 Dari 5', 'Tersedia barang elektronik seperti komputer printer dan aksesoris nya. Bisa juga modif printer ke tinta inject disni', '1'),
(5, 5, 2, 'Filosofi Laptop Kupang', 'Jl. Fatutuan No.28, Liliba, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '082146049489', 'Kamis,09.00–18.30', 'Toko Laptop', 'http://www.filosi.co.id/', '5 Dari 5', 'Tersedia barang elektronik seperti komputer printer dan aksesoris nya. Bisa juga modif printer ke tinta inject disni', '1'),
(6, 6, 6, 'mulya karya bidcab', 'Jl. Jenderal Sudirman No.10, Nunleu, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', '0380831527', '09.00-18.00', 'laptop,accesoris,service', 'asus,hp,acer', '5', 'ada Hp dan Lainya', '1'),
(7, 7, 7, 'iBox Lippo Plaza Kupang', 'Jl. Veteran, Fatululi, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.', '085205040951', '09.00-18.00', 'laptop,accesoris,service', 'macbook', '5', 'ada Hp dan Lainya', '1'),
(8, 8, 8, 'Boby Computer', 'Kompleks Ruko, Flobamora Mall, Jl. W.J. Lalamentik No.67, Oebufu, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '082146997771', 'Senin,08.00–20.00', 'laptop,accesoris', 'asus,hp,acer', '5', 'banyak service', '1'),
(9, 9, 9, 'Rumah Laptop Injeksi Pusat Laptop Murah NTT', 'Pohon Duri, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim. 85228', '081358011681', '09.00-18.00', 'laptop,accesoris,service', 'asus,hp,acer', '4', 'ada Hp dan Lainya', '1'),
(10, 10, 10, 'Jl Computer', 'Depan Lapas Kelas IIA, Jl. Jupiter, Oesapa Sel., Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim. 85228', '082235123545', 'Senin,08.00–20.00', 'laptop,accesoris,service', 'asus,hp,acer', '3', 'banyak service', '1'),
(11, 11, 11, 'Palapa Komputer', 'Jl. Palapa No.19c, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '0380821991', 'Senin,08.00–20.00', 'laptop,accesoris', 'asus,hp,acer', '5', 'banyak service', '1'),
(12, 12, 12, 'SCA Komputer', 'Samping Makro Meubel, Jl. Cak Doko No.21, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '085237986789', '09.00-18.00', 'laptop,accesoris,service', 'asus,hp,acer', '5', 'banyak service', '1'),
(13, 13, 13, 'Toko Unistar', 'Jl. W.J. Lalamentik No.73, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', '081338151234', '09.00-18.00', 'laptop,accesoris,service', 'asus,hp,acer', '5', 'ada Hp dan Lainya', '1'),
(14, 14, 14, 'Acer Exclusive Store Kupang', 'Jl. W.J. Lalamentik No.27, Oebobo, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', '08113834561', '09.00-18.00', 'laptop', 'acer', '5', 'banyak', '1'),
(15, 15, 15, 'TOKO JENNI COMPUTER', 'Jl. Frans Seda No.88F, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', '081339492567', 'Senin,08.00–20.00', 'laptop,accesoris,service', 'asus,hp,acer', '4', 'banyak service', '1'),
(16, 16, 16, 'Toko Edison Cabang Kupang Sudirman', 'Jl. Jendral Sudirman No. 171, Kuanino, Kecamatan Kota Raja, Kuanino, Kota Raja, Kupang City, East Nusa Tenggara 85119', '03808431482', '09.00-18.00', 'laptop,accesoris,service', 'asus,hp,acer', '5', 'banyak service', '1'),
(17, 17, 17, 'AS Tech', 'Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '0812378684785', '09.00-18.00', 'laptop,accesoris', 'asus,hp,acer', '5', 'banyak service', '1'),
(18, 18, 18, 'DMC COMPUTER', 'RJR5+3RX, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', '08754775431', '09.00-18.00', 'laptop', 'asus,hp,acer', '5', 'ada Hp dan Lainya', '1'),
(19, 19, 19, 'Berdikari Computer Store', 'Jl. W.J. Lalamentik No.81, 85111, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85142', '0812378684785', '09.00-18.00', 'laptop,accesoris', 'asus,hp,acer', '5', 'ada Hp dan Lainya', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_galeri` (`id_galeri`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
