-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 05:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_balasan_komentar`
--

CREATE TABLE `tb_balasan_komentar` (
  `id_balasan` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balasan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_balasan_komentar`
--

INSERT INTO `tb_balasan_komentar` (`id_balasan`, `id_komentar`, `user_id`, `balasan`, `created_at`) VALUES
(1, 1, 1, 'insyaallah awal bulan depan cuy!', '2023-12-17 11:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `ukuran` enum('S','M','L','XL') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`, `ukuran`) VALUES
(18, 'Blouse orlinaaaa', '• Blouse detail batik print klasik untuk kesan timeless• Warna biru• Kerah bulat tinggi• Unlined• Regular fit• Resleting belakang• Material katun tidak transparan, ringan dan tidak stretch', 'Batik Wanita', 245000, 5, 'Picture1.png', 'S'),
(19, 'Blouse Batik Jatiyawan', '- Bahan 100% katun\r\n- Terdapat Furing didalamnya\r\n- Resleting depan\r\n- Tidak transparan & tidak stretch\r\n- Jahitan Kuat dan Profesional\r\n- Desaind batik bermotif (menyambung)\r\n', 'Batik Wanita', 215000, 7, 'Picture2.png', 'S'),
(20, 'Blouse Batik Talenta', '- Blouse batik print bergaya classy untuk tampilan yang smart\r\n- Warna hijau\r\n- Kerah mandarin\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- 2 kantong samping\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 173cm, lingkar dada 83cm, mengenakan ukuran S\r\n', 'Batik Wanita', 185000, 6, 'Picture3.png', 'S'),
(21, 'Blouse Batik Hadinata Abimanyu', '- Batik Print\r\n- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang\r\n- Kerah A simetris\r\n- Resleting Belakang\r\n- Tanpa Furing\r\n- Lengan 3/4\r\n- Warna Cream\r\n- Model menggunakan size S TB 170 – 172\r\n', 'Batik Wanita', 175000, 5, 'Picture4.png', 'S'),
(22, 'Blouse Batik Mega Chito', '- Bahan 100% katun\r\n- Terdapat Furing didalamnya\r\n- Resleting depan\r\n- Tidak transparan & tidak stretch\r\n- Jahitan Kuat dan Profesional\r\n- Desaind batik bermotif (menyambung)\r\n- Foto asli milik toko kami, dilarang mengambil tanpa se-izin kami\r\n', 'Batik Wanita', 185000, 6, 'Picture5.png', 'S'),
(23, 'Kemeja Batik Unique Motives', '- Item Type : Shirt\r\n- Gender : Man\r\n- Material : Cotton\r\n- Occasion : Formal, Cassual\r\n- Long Sleeve\r\n- Front Button Opening\r\n- Batik Motives\r\n- Traditional Shirt\r\n- Include Hard Box Exclusive Hamlin\r\n', 'Batik Pria', 205000, 8, 'Picture6.png', 'S'),
(24, 'Kemeja Batik Ranawijaya', '- Kemeja desain klasik dengan aksen batik print yang elegan\r\n- Warna dasar navy\r\n- 1 kantong depan\r\n- Detail kerah\r\n- Slim fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 185cm, mengenakan ukuran M\r\n', 'Batik Pria', 215000, 8, 'Picture7.png', 'S'),
(25, 'Kemeja Batik Mahesa', '- Kemeja batik print bergaya modern classic dengan motif statementable\r\n- Warna merah\r\n- Lengan panjang\r\n- Kerah kaku (gagah stylish)\r\n- Kancing depan tertutup rapi\r\n- Lengan kancing hidup (1 kancing)\r\n- Potongan bawah baju oval (modis)\r\n- Motif jahitan menyambung dengan rapi\r\n- Bahan katun polgan\r\n- 1 kantong depan (tidak merusak desaind batik)\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Jahitan professional standart internasional (pundak, bawah ketiak, perut, lengan) terukur rapi\r\n- Ukuran setiap produk berbeda, lihat detail ukuran sebelum membeli\r\n- Tinggi model 184cm, lingkar dada 97cm, mengenakan ukuran M\r\n', 'Batik Pria', 150000, 5, 'Picture8.png', 'S'),
(26, 'Kemeja Batik Hadinata', '- Batik Print\r\n- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang\r\n- Cutting Reguler Fit\r\n- Forward Point Collar ( Kerah Kemeja)\r\n- Hidden Button\r\n- Lengan Panjang\r\n- Tanpa Furing\r\n- Warna Coklat\r\n- Model menggunakan size M TB 182\r\n', 'Batik Pria', 175000, 7, 'Picture9.png', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `subtotal` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `Alamat` varchar(60) NOT NULL,
  `pengiriman` varchar(77) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `subtotal`, `nama`, `no_tlp`, `Alamat`, `pengiriman`, `tgl_pesan`, `batas_bayar`, `username`) VALUES
(15, '201000', 'Tiara N', '089123748765', 'Jln.Haur teuBeutian', 'Reguler', '2023-12-16 00:00:24', '2023-12-17 00:00:24', 'tiara'),
(16, '191000', 'Tiara N', '089123748765', 'Jln.Haur teuBeutian', 'Reguler', '2023-12-17 19:01:33', '2023-12-18 19:01:33', 'tiara'),
(17, '204000', 'Yosi', '085678397813', 'Jln. Babakan Tak Goyyang', 'Kargo', '2023-12-17 22:52:54', '2023-12-18 22:52:54', 'yosi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `user_id`, `komentar`, `created_at`) VALUES
(1, 2, 'Min bagaimana cara pengajukan return??', '2023-12-17 11:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `pembayaran` varchar(55) NOT NULL,
  `harga` int(10) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `pembayaran`, `harga`, `bukti_bayar`, `status`) VALUES
(15, 15, 20, 'Blouse Batik Talenta', 1, 'BNI-09235237', 185000, 'perpus2.jpg', '4'),
(16, 16, 21, 'Blouse Batik Hadinata Abimanyu', 1, 'Dana-08634563067', 175000, 'code.png', '3'),
(17, 17, 22, 'Blouse Batik Mega Chito', 1, 'BTN-79587429', 185000, 'profil.jpg', '0');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'User', 'user', '123', 2),
(3, 'junto', 'junto', '123', 2),
(4, 'Akmal', 'akml', '1234', 2),
(5, 'Tiara', 'tiara', '123', 2),
(6, 'Yosi Nurkhofifah', 'yosi', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_balasan_komentar`
--
ALTER TABLE `tb_balasan_komentar`
  ADD PRIMARY KEY (`id_balasan`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_balasan_komentar`
--
ALTER TABLE `tb_balasan_komentar`
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_balasan_komentar`
--
ALTER TABLE `tb_balasan_komentar`
  ADD CONSTRAINT `fk_tb_balasan_komentar_tb_komentar` FOREIGN KEY (`id_komentar`) REFERENCES `tb_komentar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
