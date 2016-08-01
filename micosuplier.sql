-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 09:17 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micosuplier`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cariCustomer` (`_keyword` VARCHAR(300))  BEGIN
	SELECT * FROM customer WHERE nama LIKE CONCAT('%',_keyword,'%') or id_customer like CONCAT('%',_keyword,'%') ;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cariPetugas` (`_keyword` VARCHAR(300))  BEGIN
	select * from petugas where nama like CONCAT('%',_keyword,'%') or id_petugas LIKE CONCAT('%',_keyword,'%');
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cariSuplier` (`_keyword` VARCHAR(300))  BEGIN
	SELECT * FROM suplier WHERE nama_suplier LIKE CONCAT('%',_keyword,'%') or id_suplier LIKE CONCAT('%',_keyword,'%');
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cari_suplierProduk` (`cari_suplier` VARCHAR(200))  BEGIN
	Select * from suplier inner join produk on suplier.id_suplier = produk.id_suplier where nama_produk like concat('%',cari_suplier,'%');
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteSuplier` (`_id_suplier` INT(11))  BEGIN
	delete from suplier where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deletPetugas` (`_id_petugas` VARCHAR(100))  BEGIN
	delete from petugas where id_petugas=_id_petugas;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detail_pembelian` (`_id_pembelian` VARCHAR(100), `_id_produk` INT(11), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	insert into detail_pembelian (id_transaksi,id_produk,jumlah,harga) values(_id_pembelian,_id_produk,_jumlah,_harga);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_customer` (`_id_istitut` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` VARCHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(100))  BEGIN
	insert into `customer` (id_customer,nama,jenkel,alamat,hp,email,tgl,jabatan) values(_id_institu,_nama,_jenkel,_alamat,_hp,_email,now(),_jabatan);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_institusi` (`_id_institut` VARCHAR(100), `_nama` VARCHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200))  BEGIN
	INSERT INTO `institusi` (id_istitusi,nama_istitusi,alamat_institusi,telephone_institusi,email,tgl_registrasi) VALUES(_id_institut,_nama,_alamat,_hp,_email,NOW());
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_petugas` (`_ktp` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` CHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(200), `_passwd` VARCHAR(200))  BEGIN
	INSERT INTO `petugas` (id_petugas,nama,jenkel,alamat,hp,email,jabatan,tgl,`password`) VALUES(_ktp,_nama,_jenkel,_alamat,_hp,_email,_jabatan,now(),md5(_passwd));
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_produk` (`_id_suplier` INT(11), `_nama_produk` VARCHAR(200), `_harga` INT(11), `_deskripsi` TEXT, `_image_link` VARCHAR(500), `_jmlh` INT(11))  BEGIN
	INSERT INTO `produk` (id_suplier,nama_produk,harga,deskripsi,image_link,tgl,jumlah) VALUES(_id_suplier,_nama_produk,_harga,_deskripsi,_image_link,now(),_jmlh);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_service` (`_email` VARCHAR(200), `_id_customer` INT(11), `_subject` VARCHAR(500), `_keluhan` TEXT, `_tgl_open` DATETIME, `_status` INT(11))  BEGIN
	set@idpetugas=(select id_petugas from petugas where email=_email);
	INSERT INTO `service` (id_petugas,id_customer,`subject`,keluhan,tgl_open,`status`) 
	VALUES(@idpetugas,_id_customer,_subject,_keluhan,_tgl_open,_status);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_solving` (`_id_service` INT(11), `_tgl_solved` DATETIME, `_teknisi` VARCHAR(200), `_penyelesaian` TEXT, `_status` INT(11))  BEGIN
	
	update `service` set tgl_solved=_tgl_solved,teknisi=_teknisi,penyelesaian=_penyelesaian,`status`=_status where id_service=_id_service;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_suplier` (`_nama` VARCHAR(200), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_deskripsi` TEXT)  BEGIN
	INSERT INTO `suplier` (nama_suplier,alamat,hp,email,deskripsi,tgl) VALUES(_nama,_alamat,_hp,_email,_deskripsi,now());
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listProduk_perSuplier` (`_id_suplier` INT(11))  BEGIN
	SELECT id_produk,produk.id_suplier,nama_suplier,nama_produk,harga,produk.deskripsi,image_link FROM suplier 
	INNER JOIN produk ON suplier.`id_suplier`=produk.`id_suplier` WHERE produk.id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_customer` ()  BEGIN
	select * from customer;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_institusi` ()  BEGIN
	select * from institusi;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_pembelian` (`_id_customer` INT(11))  BEGIN
	select produk.id_produk,nama_produk,image_link,id_suplier,produk.`deskripsi`,produk.harga from produk inner join detail_pembelian on produk.`id_produk`=detail_pembelian.`id_produk` inner join pembelian on detail_pembelian.`id_transaksi`=pembelian.`id_transaksi` where pembelian.`id_customer`=_id_customer;
	 
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_penjualan` ()  BEGIN
	select id_transaksi,pembelian.`id_petugas`,petugas.`nama` as nama_petugas,pembelian.`id_customer`,customer.nama as nama_customer,pembelian.`tanggal`,total from pembelian inner join petugas on pembelian.`id_petugas`=petugas.`id_petugas` 
	inner join customer on pembelian.`id_customer`=customer.`id_customer`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_petugas` ()  BEGIN
	SELECT * FROM petugas;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_produk` ()  BEGIN
	SELECT id_produk,produk.id_suplier,nama_suplier,nama_produk,harga,produk.deskripsi,image_link FROM suplier inner join produk on suplier.`id_suplier`=produk.`id_suplier`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_produkSuplier` (`_id_suplier` INT(11))  BEGIN
	select * from produk where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_service` ()  BEGIN
	select id_service,`subject`,keluhan,tgl_open,`status`,teknisi,penyelesaian,tgl_solved,customer.`nama` as nama_customer,petugas.`nama` as nama_petugas,service.`id_petugas`,service.`id_customer` from service inner join customer on service.`id_customer`=customer.`id_customer`
	inner join petugas on service.`teknisi`=petugas.`id_petugas`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_suplier` ()  BEGIN
	SELECT * FROM suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_unsolvedService` ()  BEGIN
	select * from service where `status` <> "3";
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (`_email` VARCHAR(200), `_passwd` VARCHAR(50))  BEGIN
	set@cek=(select 1 from petugas where email=_email and `password`=md5(_passwd));
	if @cek=1 then
		select 1 as A;
	else select 0 as A;
	end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pembelian` (`_id_transaksi` VARCHAR(100), `_email` VARCHAR(100), `_id_customer` INT(11), `_total` INT(11), `_tgl` DATETIME)  BEGIN
	set@id_petugas=(select id_petugas from petugas where email=_email);
	insert into pembelian (id_transaksi,id_petugas,id_customer,tanggal,total) values(_id_transaksi,@id_petugas,_id_customer,_tgl,_total);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updatePetugas` (`_ktp` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` CHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(200), `_passwd` VARCHAR(200))  BEGIN
    set@passwd=(select `password` from petugas where id_petugas=_ktp);
	if@passwd=(md5(_passwd)) then 
	 
	UPDATE petugas SET nama=_nama, jenkel=_jenkel,alamat=_alamat, hp=_hp, email=_email,jabatan=_jabatan WHERE id_petugas=_ktp;
	select 0 as cek;
	 else select -1 as cek; end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateSuplier` (`_id_suplier` INT(11), `_nama` VARCHAR(200), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_deskripsi` TEXT)  BEGIN
	update suplier set nama_suplier=_nama,alamat=_alamat,hp=_hp,email=_email,deskripsi=_deskripsi where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_uploadGmbrPetugas` (`_id_petugas` VARCHAR(200), `_nama_file` VARCHAR(200))  BEGIN
	update petugas set photo_link=_nama_file where id_petugas=_id_petugas;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_uploadGmbrSuplier` (`_id_suplier` INT(11), `_photo_link` VARCHAR(200))  BEGIN
	update suplier set photo_link=_photo_link where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perCustomer` (`_id_customer` INT(11))  BEGIN
	SELECT * FROM customer WHERE id_customer=_id_customer;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perPetugas` (`_id_pet` VARCHAR(200))  BEGIN
	select * from petugas where id_petugas=_id_pet;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perProduk` (`_id_produk` INT(11))  BEGIN
	SELECT * FROM produk WHERE id_produk=_id_produk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perService` (`_id_service` INT(11))  BEGIN
	
	select id_service,petugas.`id_petugas`,service.`id_customer`,petugas.`nama` as nama_petugas, customer.`nama` as nama_customer,`subject`,keluhan,tgl_open,tgl_solved,teknisi,penyelesaian,`status` from service inner join customer on service.`id_customer`=customer.`id_customer`
	inner join petugas on service.`id_petugas`=petugas.`id_petugas` where service.`id_service`=_id_service;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perSuplier` (`_id_suplier` INT(11))  BEGIN
	SELECT * FROM suplier WHERE id_suplier=_id_suplier;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(100) NOT NULL,
  `id_insti` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenkel` varchar(3) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `photo_link` varchar(500) NOT NULL DEFAULT 'default/users.png',
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `id_insti`, `nama`, `jenkel`, `alamat`, `hp`, `email`, `tgl`, `photo_link`, `jabatan`) VALUES
('1', '', 'ahmad', 'L', 'Gg.Makam', '085664497937', 'mustofa.ahmad13@mhs.if.its.ac.id', '2016-07-01', 'default/users.png', ''),
('2', '', 'Guruh', 'L', 'Gg.1 keputih', '08578376276', 'guruh13@mhs.if.its.ac.id', '2016-07-01', 'default/users.png', ''),
('3', '', 'Rio', 'L', 'Gg.kencana keputih', '08978376746', 'rio13@mhs.tf.its.ac.id', '2016-07-01', 'default/users.png', ''),
('4', '', 'Ahmad Zaenal Mustofa', 'L', 'Gg. Makam', '085664497937', 'mustofaahmad29@gmail.com', '2016-07-20', 'default/users.png', ''),
('5', '', 'Ananda', 'P', 'Jl.Kurangwareg', '325246246', 'ananda@gmail.com', '2016-07-26', 'default/users.png', ''),
('6', '', 'Ananda', 'P', 'Jl.Kurangwareg', '325246246', 'ananda@gmail.com', '2016-07-26', 'default/users.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_transaksi`, `id_produk`, `jumlah`, `harga`) VALUES
('1', 1, 1, NULL),
('1', 2, 1, NULL),
('2', 2, 2, NULL),
('2', 3, 2, NULL),
('2', 5, 2, NULL),
('0', 4, 4, 400000),
('0', 4, 4, 400000),
('0', 4, 4, 400000),
('0', 1, 2, 5000),
('0', 1, 2, 5000),
('0', 4, 1, 400000),
('0', 1, 2, 5000),
('TM1469505134', 4, 1, 400000),
('TM1469505134', 1, 2, 5000),
('TM1469505191', 4, 6, 400000),
('TM1469505191', 1, 2, 5000),
('TM1469505295', 4, 6, 400000),
('TM1469505295', 1, 2, 5000),
('TM1469505295', 6, 1, 300000),
('TM1469592830', 1, 1, 5000),
('TM1469592830', 2, 2, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `id_istitusi` varchar(100) NOT NULL,
  `nama_istitusi` varchar(300) NOT NULL,
  `alamat_institusi` varchar(500) NOT NULL,
  `telephone_institusi` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institusi`
--

INSERT INTO `institusi` (`id_istitusi`, `nama_istitusi`, `alamat_institusi`, `telephone_institusi`, `email`, `tgl_registrasi`) VALUES
('793520104102562', 'SMA', 'jl.Karang wungu km.6', '0203635262', 'sman@gmail.com', '2016-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_petugas` varchar(100) NOT NULL,
  `id_customer` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_transaksi`, `id_petugas`, `id_customer`, `tanggal`, `total`) VALUES
('1', '330172906940004', '1', '0000-00-00 00:00:00', 0),
('2', '330172906940004', '2', '2016-06-01 00:00:00', 0),
('TM1469502791', '330172906940005', '2', '2016-07-27 00:00:00', 1625000),
('TM1469503123', '330172906940005', '2', '2016-07-26 00:00:00', 1625000),
('TM1469503300', '330172906940005', '3', '2016-07-18 00:00:00', 410000),
('TM1469504998', '330172906940005', '2', '2016-07-20 00:00:00', 410000),
('TM1469505134', '330172906940005', '2', '2016-07-26 00:00:00', 410000),
('TM1469505191', '330172906940005', '3', '2016-07-12 00:00:00', 2410000),
('TM1469505295', '330172906940005', '5', '2016-07-13 00:00:00', 2710000),
('TM1469592830', '330172906940005', '2', '2016-07-27 00:00:00', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenkel` varchar(3) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `photo_link` varchar(500) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `jenkel`, `alamat`, `hp`, `email`, `jabatan`, `tgl`, `photo_link`, `password`) VALUES
('330172906940003', 'Avatar aang', 'L', 'Gg.kidul km 23', '081378376746', 'ang@miconos.co.id', 'Teknisi', '2016-07-01', 'file_1469545669.png', '827ccb0eea8a706c4c34a16891f84e7b'),
('330172906940004', 'Anjani', 'P', 'Gg.kencana wungu', '08978376746', 'anjani@miconos.co.id', 'customer service', '2016-07-01', '', '827ccb0eea8a706c4c34a16891f84e7b'),
('330172906940005', 'Ahmad Zaenal Mustofa', 'L', 'Gg. Makam', '085664497937', 'mustofaahmad29@gmail.com', 'Teknis', '2016-07-20', '', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_suplier` int(11) DEFAULT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `image_link` varchar(500) NOT NULL,
  `tgl` datetime NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_suplier`, `nama_produk`, `harga`, `deskripsi`, `image_link`, `tgl`, `barcode`, `jumlah`) VALUES
(1, 1, 'kabel lan', 5000, 'kualitas 4', 'http://localhost/micosuplier/image/lan.jpg', '2016-07-01 13:30:19', NULL, NULL),
(2, 1, 'kabel coaxial', 10000, 'kualitas 1', 'http://localhost/micosuplier/image/cax.jpg', '2016-07-01 13:30:50', NULL, NULL),
(3, 2, 'broadlink TC2 black', 400000, 'kualitas 1', 'http://localhost/micosuplier/image/tc2.jpg', '2016-07-01 13:31:55', NULL, NULL),
(4, 2, 'broadlink TC2 white', 400000, 'kualitas 1', 'http://localhost/micosuplier/image/tc2w.jpg', '2016-07-01 13:32:12', NULL, NULL),
(5, 2, 'broadlink smart plug', 300000, 'kualitas 1', 'http://localhost/micosuplier/image/plug.jpg', '2016-07-01 13:32:37', NULL, NULL),
(6, 2, 'kabel', 300000, 'kualitas 1', 'http://localhost/micosuplier/image/tc22.jpg', '2016-07-01 14:03:34', NULL, NULL),
(7, 2, 'TC', 4000, 'Saklar lampu otomstis', 'file_1469414311.jpg', '2016-07-25 09:38:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `id_petugas` varchar(100) NOT NULL,
  `id_customer` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_open` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `teknisi` varchar(100) DEFAULT NULL,
  `penyelesaian` text,
  `tgl_solved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `id_petugas`, `id_customer`, `subject`, `keluhan`, `tgl_open`, `status`, `teknisi`, `penyelesaian`, `tgl_solved`) VALUES
(1, '330172906940003', '1', 'device tidak berfungsi', 'baru pasang 1 bulan sudah ada yang rusak', '2016-07-02 00:00:00', 3, '330172906940003', NULL, NULL),
(2, '330172906940003', '2', 'aplikasi error', 'aplikasi tidakbisa mengontrol device', '2016-07-02 00:00:00', 3, '330172906940003', 'fixsed', '2016-07-30 00:00:00'),
(3, '330172906940005', '1', 'TC Mati', 'Tc banyak yang tidak berfungsi', '0000-00-00 00:00:00', 1, '330172906940005', NULL, NULL),
(4, '330172906940005', '1', 'RM pro Tidak konek', 'RM pro mati setelah rumah terkena petir', '2016-07-22 00:00:00', 1, '330172906940004', 'weee', '2016-07-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl` datetime NOT NULL,
  `photo_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `hp`, `email`, `deskripsi`, `tgl`, `photo_link`) VALUES
(1, 'Auto2000', 'jakal km.8 no 2', '0294656474', 'support@auto.co.id', 'Menjual berbagaimacam peralatan komputer', '2016-07-01 13:25:14', 'file_1469545512.png'),
(2, 'Broadlink', 'Gg.sanghai km.8', '0294656474', 'support@ibroadlink.com', 'Menjual berbagaimacam perangkat smart home', '2016-07-01 13:26:20', ''),
(3, 'Eco Ringnet', 'Jl.Karang Wetan Km.8 No.21, Wukir, gunung Anyar', '0202536372527', 'ringnet@gmail.com', 'Menjual produk Smart Home dan alat-alat kelistrikan', '2016-07-20 14:19:57', ''),
(5, 'lalapoh', 'Jl.Kenanga', '0208363727', 'lala@lala.co.id', 'barang-barang elektronik komputer dan perkakas elektronik. Harga bersahabat rekomended dan terpercaya\r\n', '2016-07-26 16:23:28', ''),
(6, 'lalapoh', 'Jl.Kenanga', '0208363727', 'lala@lala.co.id', 'menjual barang baranafnsa jdhfadkhfkabjfh akjfhkadbgfvad sfsdf dfsdfsgeqhr afaeg', '2016-07-26 16:28:12', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_id_institute` (`id_insti`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `FK_id_transaksi` (`id_transaksi`),
  ADD KEY `fk_id_produk` (`id_produk`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id_istitusi`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_idPetugas` (`id_petugas`),
  ADD KEY `FK_id_custom` (`id_customer`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_id_suplier` (`id_suplier`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `FK_id_custome` (`id_petugas`),
  ADD KEY `FK_id_customer` (`id_customer`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_id_institute` FOREIGN KEY (`id_insti`) REFERENCES `institusi` (`id_istitusi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_idPetugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_custom` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_id_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
