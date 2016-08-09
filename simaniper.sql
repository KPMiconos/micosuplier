-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2016 at 01:45 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaniper`
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
	SELECT nama_suplier,suplier.`id_suplier`,item_master.`id_item`,nama_item,satuan,tipe, SUM(gudang.`jumlah`)AS jumlah,
	 link_photo,item_master.deskripsi,detail_penerimaan.hargaSatuan 
	FROM detail_penerimaan LEFT JOIN gudang 
	ON detail_penerimaan.`id_purchasing`=gudang.`id_purchasing` AND
	detail_penerimaan.`id_item`=gudang.`id_item`
	INNER JOIN item_master ON item_master.`id_item`=detail_penerimaan.`id_item`
	INNER JOIN penerimaan_barang ON penerimaan_barang.`id_po`=detail_penerimaan.`id_purchasing`
	INNER JOIN suplier ON suplier.`id_suplier`=penerimaan_barang.`id_suplier`
	 WHERE nama_item LIKE CONCAT('%',cari_suplier,'%') GROUP BY detail_penerimaan.`id_item`;
	 
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cekStok` (`_id_item` INT(11))  BEGIN
	select id_purchasing,jumlah,id_item from gudang where id_item=_id_item;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteCustomer` (`_id_customer` VARCHAR(100))  BEGIN
	delete from customer where id_customer=_id_customer;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteService` (`_id_service` INT(11))  BEGIN
	delete from service where id_service=_id_service;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteSuplier` (`_id_suplier` INT(11))  BEGIN
	delete from suplier where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deletPetugas` (`_id_petugas` VARCHAR(100))  BEGIN
	delete from petugas where id_petugas=_id_petugas;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detail_pembelian` (`_id_pembelian` VARCHAR(100), `_id_produk` INT(11), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	insert into detail_pembelian (id_transaksi,id_produk,jumlah,harga) values(_id_pembelian,_id_produk,_jumlah,_harga);
	UPDATE produk SET jumalah=jumlah-_jumlah WHERE id_produk=_id_produk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filter_laporanPembelian` (`_tgl_awal` DATE, `_tgl_akhir` DATE)  BEGIN
	SELECT penerimaan_barang.`id_po` ,tanggal_receive,nama_item,satuan,jumlah,petugas.`nama` AS nama_petugas,kurir,nama_suplier
	FROM detail_penerimaan 
	INNER JOIN penerimaan_barang ON detail_penerimaan.`id_purchasing`=penerimaan_barang.`id_po`
	INNER JOIN item_master ON detail_penerimaan.`id_item`=item_master.`id_item`
	INNER JOIN petugas ON penerimaan_barang.`id_petugas`=petugas.`id_petugas`
	INNER JOIN suplier ON penerimaan_barang.`id_suplier`=suplier.`id_suplier`
	where penerimaan_barang.`tanggal_receive`>=_tgl_awal and penerimaan_barang.`tanggal_receive`<=_tgl_akhir;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filter_laporanPenjualan` (`_tgl_awal` DATE, `_tgl_akhir` DATE)  BEGIN
	SELECT penjualan.`id_transaksi`,tanggal,nama_item,satuan,jumlah,petugas.`nama` AS nama_petugas,kurir,penggunaan FROM detail_penjualan 
	INNER JOIN penjualan ON detail_penjualan.`id_transaksi`=penjualan.`id_transaksi`
	INNER JOIN item_master ON detail_penjualan.`id_produk`=item_master.`id_item`
	INNER JOIN petugas ON penjualan.`id_petugas`=petugas.`id_petugas`
	where penjualan.`tanggal`>=_tgl_awal and penjualan.`tanggal`<=_tgl_akhir;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_customer` (`_idCustomer` VARCHAR(100), `_id_institut` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` VARCHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(100))  BEGIN
	INSERT INTO `customer` (id_customer,id_institut,nama,jenkel,alamat,hp,email,tgl,jabatan) VALUES(_idCustomer,_id_institut,_nama,_jenkel,_alamat,_hp,_email,NOW(),_jabatan);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_defect` (`_id` VARCHAR(100), `_id_item` INT(11), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	insert into defect (id_purchasing,id_item,jumlah,hargaSatuan,keterangan) values(_id,_id_item,_jumlah,_harga,2);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_detailPenjualan` (`_id_pembelian` VARCHAR(100), `_id_produk` INT(11), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	INSERT INTO detail_penjualan (id_transaksi,id_produk,jumlah,harga) VALUES(_id_pembelian,_id_produk,_jumlah,_harga);
	UPDATE produk SET jumlah=jumlah-_jumlah WHERE id_produk=_id_produk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_detailPurchasing` (`_id_purchasing` VARCHAR(100), `_id_item` VARCHAR(100), `_jumlah` INT(11), `_hargaSatuan` INT(11))  BEGIN
	insert into detail_purchasing(id_purchasing,id_item,jumlah,hargaSatuan) values(_id_purchasing,_id_item,_jumlah,_hargaSatuan);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_detailServProduk` (`_id_pembelian` VARCHAR(100), `_id_produk` INT(11), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	INSERT INTO detail_penjualan (id_transaksi,id_produk,jumlah,harga) VALUES(_id_pembelian,_id_produk,_jumlah,_harga);
	UPDATE produk SET jumlah=jumlah-_jumlah WHERE id_produk=_id_produk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_gudang` (`_id_po` VARCHAR(200), `_id_item` VARCHAR(200), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	set@cekPO=(select jumlah from detail_purchasing where id_purchasing=_id_po and id_item=_id_item);
	if (_jumlah>=@cekPO) then
		insert into gudang (id_purchasing,id_item,jumlah,hargaSatuan) values(_id_po,_id_item,_jumlah,_harga);
		INSERT INTO detail_penerimaan (id_purchasing,id_item,jumlah,hargaSatuan) VALUES(_id_po,_id_item,_jumlah,_harga);
		set@count1=(SELECT SUM(jumlah)  FROM detail_purchasing WHERE id_purchasing=_id_po);
		set@count2=(select sum(jumlah) from gudang where id_purchasing=_id_po);
		if (@count1=@count2) then 
			update purchasing set `status`=3 where id_po=_id_po;
			UPDATE penerimaan_barang SET `status`=3 WHERE id_po=_id_po;
		end if;
	else
		INSERT INTO gudang (id_purchasing,id_item,jumlah,hargaSatuan,`status`) VALUES(_id_po,_id_item,_jumlah,_harga,(_jumlah-@cekPO));
		INSERT INTO detail_penenerimaan (id_purchasing,id_item,jumlah,hargaSatuan,`status`) VALUES(_id_po,_id_item,_jumlah,_harga,(_jumlah-@cekPO));
		INSERT INTO defect (id_purchasing,id_item,jumlah,hargaSatuan,tanggal,keterangan,`status`) 
		VALUES(_id_po,_id_item,(@cekPO-_jumlah),_harga,now(),1,1);
		UPDATE purchasing SET `status`=2 WHERE id_po=_id_po;
		UPDATE penerimaan_barang SET `status`=2 WHERE id_po=_id_po; 
	end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_institusi` (`_id_institut` VARCHAR(100), `_nama` VARCHAR(300), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200))  BEGIN
	INSERT INTO `institusi` (id_institusi,nama_institusi,alamat_institusi,telephone_institusi,email,tgl_registrasi) VALUES(_id_institut,_nama,_alamat,_hp,_email,NOW());
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_item` (`_nama_item` VARCHAR(200), `_tipe` VARCHAR(50), `_satuan` VARCHAR(50), `_deskripsi` TEXT, `_link_photo` VARCHAR(200))  BEGIN
	insert into item_master(nama_item,tipe,satuan,deskripsi,link_photo) values(_nama_item,_tipe,_satuan,_deskripsi,_link_photo);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_penerimaan` (`_id_rec` VARCHAR(100), `_id_po` VARCHAR(200), `_idPenerima` VARCHAR(200), `_tgl` DATE, `_idSuplier` INT(11), `_totalHarga` INT(11), `_kurir` VARCHAR(100))  BEGIN
	
	INSERT INTO penerimaan_barang (id_rec,id_po,id_petugas,tanggal_receive,id_suplier,totalHarga,kurir) 
	VALUES(_id_rec,_id_po,_idPenerima,_tgl,_idSuplier,_totalHarga,_kurir);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_penjualan` (`_id_transaksi` VARCHAR(100), `_email` VARCHAR(100), `_id_customer` INT(11), `_total` INT(11), `_tgl` DATETIME, `_kurir` VARCHAR(100))  BEGIN
	SET@id_petugas=(SELECT id_petugas FROM petugas WHERE email=_email);
	INSERT INTO penjualan (id_transaksi,id_petugas,id_customer,tanggal,total,kurir,penggunaan) 
	VALUES(_id_transaksi,@id_petugas,_id_customer,_tgl,_total,_kurir,1);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_petugas` (`_ktp` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` CHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(200), `_passwd` VARCHAR(200))  BEGIN
	INSERT INTO `petugas` (id_petugas,nama,jenkel,alamat,hp,email,jabatan,tgl,`password`) VALUES(_ktp,_nama,_jenkel,_alamat,_hp,_email,_jabatan,now(),md5(_passwd));
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_produk` (`_id_suplier` INT(11), `_nama_produk` VARCHAR(200), `_harga` INT(11), `_deskripsi` TEXT, `_image_link` VARCHAR(500), `_jmlh` INT(11))  BEGIN
	INSERT INTO `produk` (id_suplier,nama_produk,harga,deskripsi,image_link,tgl,jumlah) VALUES(_id_suplier,_nama_produk,_harga,_deskripsi,_image_link,now(),_jmlh);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_purchasing` (`_id_po` VARCHAR(100), `_id_suplier` INT(11), `_email` VARCHAR(200), `_tanggal_po` DATE, `_totalHarga` INT(11))  BEGIN
	set@idPetugas=(select id_petugas from petugas where email=_email);
	insert into purchasing (id_po,id_suplier,id_petugas,tanggal_po,totalHarga) values(_id_po,_id_suplier,@idPetugas,_tanggal_po,_totalHarga);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_return` (`_id_po` VARCHAR(100), `_id_item` VARCHAR(100), `_jumlah` INT(11), `_harga` INT(11))  BEGIN
	set @cek=(select id_purchasing from gudang where id_purchasing=_id_po);
	if @cek then
		update gudang set jumalah=(jumlah+_jumlah);
		update defect set `status`=0 where id_purchasing=_id_po and id_item=_id_item;
	else
		INSERT INTO gudang (id_purchasing,id_item,jumlah,hargaSatuan) VALUES(_id_po,_id_item,_jumlah,_harga);
		UPDATE defect SET `status`=0 WHERE id_purchasing=_id_po AND id_item=_id_item;
	end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_service` (`_email` VARCHAR(200), `_id_customer` VARCHAR(100), `_subject` VARCHAR(500), `_keluhan` TEXT, `_tgl_open` DATETIME, `_status` INT(11))  BEGIN
	set@idpetugas=(select id_petugas from petugas where email=_email);
	INSERT INTO `service` (id_petugas,id_customer,`subject`,keluhan,tgl_open,`status`) 
	VALUES(@idpetugas,_id_customer,_subject,_keluhan,_tgl_open,_status);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_servProduk` (`_id_transaksi` VARCHAR(100), `_teknisi` VARCHAR(100), `_id_customer` INT(11), `_total` INT(11), `_tgl` DATETIME, `_kurir` VARCHAR(100))  BEGIN
	
	INSERT INTO penjualan (id_transaksi,id_petugas,id_customer,tanggal,total,kurir,penggunaan) 
			VALUES(_id_transaksi,_teknisi,_id_customer,_tgl,_total,_kurir,2);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_solving` (`_id_service` INT(11), `_tgl_solved` DATE, `_teknisi` VARCHAR(200), `_penyelesaian` TEXT, `_status` INT(11))  BEGIN
	insert into solving(id_service,teknisi,penyelesaian,tgl_solved) values(_id_service,_teknisi,_penyelesaian,_tgl_solved);
	update `service` set `status`=_status where id_service=_id_service;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_input_suplier` (`_nama` VARCHAR(200), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_deskripsi` TEXT)  BEGIN
	INSERT INTO `suplier` (nama_suplier,alamat,hp,email,deskripsi,tgl) VALUES(_nama,_alamat,_hp,_email,_deskripsi,now());
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_laporan_pembelian` ()  BEGIN
	SELECT penerimaan_barang.`id_po` ,tanggal_receive,nama_item,satuan,jumlah,petugas.`nama` AS nama_petugas,kurir,nama_suplier
	FROM detail_penerimaan 
	INNER JOIN penerimaan_barang ON detail_penerimaan.`id_purchasing`=penerimaan_barang.`id_po`
	INNER JOIN item_master ON detail_penerimaan.`id_item`=item_master.`id_item`
	INNER JOIN petugas ON penerimaan_barang.`id_petugas`=petugas.`id_petugas`
	inner join suplier on penerimaan_barang.`id_suplier`=suplier.`id_suplier`
	WHERE penerimaan_barang.`tanggal_receive`>=now() AND penerimaan_barang.`tanggal_receive`<=now();
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_laporan_penjualan` ()  BEGIN
	select penjualan.`id_transaksi`,tanggal,nama_item,satuan,jumlah,petugas.`nama` as nama_petugas,kurir,penggunaan from detail_penjualan 
	inner join penjualan on detail_penjualan.`id_transaksi`=penjualan.`id_transaksi`
	inner join item_master on detail_penjualan.`id_produk`=item_master.`id_item`
	inner join petugas on penjualan.`id_petugas`=petugas.`id_petugas`
	WHERE penjualan.`tanggal`>=now() AND penjualan.`tanggal`<=now();
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listProduk_perSuplier` (`_id_suplier` INT(11))  BEGIN
	SELECT item_master.`id_item`,nama_item,satuan, SUM(gudang.`jumlah`)AS jumlah, link_photo,deskripsi,detail_penerimaan.hargaSatuan 
	FROM detail_penerimaan LEFT JOIN gudang 
	ON detail_penerimaan.`id_purchasing`=gudang.`id_purchasing` AND
	detail_penerimaan.`id_item`=gudang.`id_item`
	INNER JOIN item_master ON item_master.`id_item`=detail_penerimaan.`id_item`
	INNER JOIN penerimaan_barang ON penerimaan_barang.`id_po`=detail_penerimaan.`id_purchasing`
	WHERE id_suplier=_id_suplier GROUP BY detail_penerimaan.`id_item`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_customer` ()  BEGIN
	SELECT institusi.`nama_institusi`,id_customer,id_institusi,nama,jenkel,alamat,hp,customer.email,tgl,photo_link,jabatan
	 FROM customer INNER JOIN institusi ON customer.`id_institut`=institusi.`id_institusi`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_defect` ()  BEGIN
	SELECT id_purchasing,nama_item,item_master.`id_item`,jumlah,hargaSatuan,tipe,satuan,`status`
	FROM defect INNER JOIN item_master ON defect.`id_item`=item_master.`id_item`;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_institusi` ()  BEGIN
	select * from institusi;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_item` ()  BEGIN
	select * from item_master;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_pembelian` (`_id_customer` VARCHAR(100))  BEGIN
	/*select produk.id_produk,nama_produk,image_link,id_suplier,produk.`deskripsi`,produk.harga from produk inner join detail_pembelian on produk.`id_produk`=detail_pembelian.`id_produk` inner join pembelian on detail_pembelian.`id_transaksi`=pembelian.`id_transaksi` where pembelian.`id_customer`=_id_customer;
	 */
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_penerimaan` ()  BEGIN
	SELECT purchasing.`id_petugas`,id_po,petugas.`nama` AS nama_petugas,nama_suplier,tanggal_po,totalHarga,`status` FROM purchasing 
	INNER JOIN petugas ON purchasing.`id_petugas`=petugas.`id_petugas` 
	INNER JOIN suplier ON purchasing.`id_suplier`=suplier.`id_suplier` where `status`<>3;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_penjualan` ()  BEGIN
	
	select id_transaksi,petugas.`nama` as nama_petugas,customer.`nama` as nama_customer,tanggal,total,kurir from penjualan 
	inner join customer on penjualan.`id_customer`=customer.`id_customer` 
	inner join petugas on penjualan.`id_petugas`=petugas.`id_petugas`;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_petugas` ()  BEGIN
	SELECT * FROM petugas;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_produk` ()  BEGIN
	
	SELECT nama_suplier,suplier.`id_suplier`,item_master.`id_item`,nama_item,satuan,tipe, SUM(gudang.`jumlah`)AS jumlah,
	 link_photo,item_master.deskripsi,detail_penerimaan.hargaSatuan 
	FROM detail_penerimaan LEFT JOIN gudang 
	ON detail_penerimaan.`id_purchasing`=gudang.`id_purchasing` AND
	detail_penerimaan.`id_item`=gudang.`id_item`
	INNER JOIN item_master ON item_master.`id_item`=detail_penerimaan.`id_item`
	INNER JOIN penerimaan_barang ON penerimaan_barang.`id_po`=detail_penerimaan.`id_purchasing`
	inner join suplier on suplier.`id_suplier`=penerimaan_barang.`id_suplier`
	 GROUP BY  detail_penerimaan.`id_item`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_produkSuplier` (`_id_suplier` INT(11))  BEGIN
	select * from produk where id_suplier=_id_suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_purchasing` ()  BEGIN
	select purchasing.`id_petugas`,id_po,petugas.`nama` as nama_petugas,nama_suplier,tanggal_po,totalHarga,`status` from purchasing 
	inner join petugas on purchasing.`id_petugas`=petugas.`id_petugas` 
	inner join suplier on purchasing.`id_suplier`=suplier.`id_suplier`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_service` ()  BEGIN
	select id_service,`subject`,keluhan,tgl_open,`status`,customer.`nama` as nama_customer,petugas.`nama` as nama_petugas,service.`id_petugas`,service.`id_customer` from service inner join customer on service.`id_customer`=customer.`id_customer`
	inner join petugas on service.`id_petugas`=petugas.`id_petugas`;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_suplier` ()  BEGIN
	SELECT * FROM suplier;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_list_transaksiPerCustomer` (`_id_customer` VARCHAR(100))  BEGIN
	select penjualan.`id_transaksi`,tanggal,nama_item,jumlah,harga
	from detail_penjualan 
	inner join item_master on detail_penjualan.`id_produk`=item_master.`id_item`
	INNER JOIN penjualan on detail_penjualan.`id_transaksi`=penjualan.`id_transaksi`
	  where id_customer=_id_customer;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pengurangan_stok` (`_id_PO` VARCHAR(100), `_id_item` INT(11), `_jumlah` INT(11))  BEGIN
	update gudang set jumlah=(jumlah-_jumlah) where id_purchasing=_id_po and id_item=_id_item;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_returning_defect` (`_id` VARCHAR(100), `_id_item` INT(11), `_jumlah` INT(11))  BEGIN
	update defect set `status`=1,tanggal=now() where id_purchasing=_id and id_item=_id_item;
	set@cekGuna=(select keterangan from defect where id_purchasing=_id and id_item=_id_item);
	if(@cekGuna=1) then 
		update gudang set jumlah=jumlah+_jumlah, `status`=0 where id_purchasing=_id and id_item=_id_item;
		UPDATE detail_penerimaan SET jumlah=jumlah+_jumlah, `status`=0 WHERE id_purchasing=_id AND id_item=_id_item;
		update penerimaan_barang set `status`=3 where id_po=_id;
		UPDATE purchasing SET `status`=3 where id_po=_id;
		update defect set `status`=0 where id_purchasing=_id AND id_item=_id_item;
	else
		update gudang set jumlah=jumlah+_jumlah, `status`=0 WHERE id_purchasing=_id AND id_item=_id_item;
		UPDATE defect SET `status`=0 WHERE id_purchasing=_id AND id_item=_id_item;
	end if;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateCustomer` (`_institusi` VARCHAR(100), `_ktp` VARCHAR(100), `_nama` VARCHAR(200), `_jenkel` CHAR(3), `_alamat` VARCHAR(500), `_hp` VARCHAR(20), `_email` VARCHAR(200), `_jabatan` VARCHAR(200))  BEGIN
    
	 
	UPDATE customer SET id_institut=_institusi, nama=_nama, jenkel=_jenkel,alamat=_alamat, hp=_hp, email=_email,jabatan=_jabatan WHERE id_customer=_ktp;
	SELECT 0 AS cek;
	 
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewPO` (`_id_po` VARCHAR(200))  BEGIN
	select id_purchasing,nama_item,item_master.`id_item`,jumlah,hargaSatuan,tipe,satuan,id_suplier,id_petugas,totalHarga
	from detail_purchasing inner join purchasing on purchasing.`id_po`=detail_purchasing.`id_purchasing`
	inner join item_master on detail_purchasing.`id_item`=item_master.`id_item` 
	where id_purchasing=_id_po;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perCustomer` (`_id_customer` VARCHAR(100))  BEGIN
	SELECT institusi.`nama_institusi`,id_customer,id_institusi,nama,jenkel,alamat,hp,customer.email,tgl,photo_link,jabatan
	 FROM customer inner join institusi on customer.`id_institut`=institusi.`id_institusi` WHERE id_customer=_id_customer;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perPetugas` (`_id_pet` VARCHAR(200))  BEGIN
	select * from petugas where id_petugas=_id_pet;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perProduk` (`_id_produk` INT(11))  BEGIN
	SELECT * FROM produk WHERE id_produk=_id_produk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perService` (`_id_service` INT(11))  BEGIN
	set@solving=(select id_service from service where id_service=_id_service and `status`=3);
	if(@solving) then
	select service.id_service,petugas.`id_petugas`,service.`id_customer`,petugas.`nama` as nama_petugas, customer.`nama` as nama_customer,`subject`,keluhan,tgl_open,tgl_solved,teknisi,penyelesaian,`status` from service inner join solving on service.`id_service`=solving.`id_service`
	 inner join  customer on service.`id_customer`=customer.`id_customer`
	inner join petugas on service.`id_petugas`=petugas.`id_petugas` where service.`id_service`=_id_service;
	else
	select * from service where id_service=_id_service;
	end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_view_perSuplier` (`_id_suplier` INT(11))  BEGIN
	SELECT * FROM suplier WHERE id_suplier=_id_suplier;
    END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fc_tambah` (`_id_po` INT) RETURNS INT(11) BEGIN
	declare hasil int;
	set hasil = ( SELECT SUM(jumlah) FROM gudang WHERE id_purchasing=_id_po);
	return hasil;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(100) NOT NULL,
  `id_institut` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenkel` varchar(3) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `photo_link` varchar(500) NOT NULL DEFAULT 'default/users.png',
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `id_purchasing` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `tanggal` date NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan`
--

CREATE TABLE `detail_penerimaan` (
  `id_purchasing` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchasing`
--

CREATE TABLE `detail_purchasing` (
  `id_purchasing` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_purchasing` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `id_institusi` varchar(100) NOT NULL,
  `nama_institusi` varchar(300) NOT NULL,
  `alamat_institusi` varchar(500) NOT NULL,
  `telephone_institusi` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `link_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `id_rec` varchar(100) NOT NULL,
  `id_po` varchar(100) NOT NULL,
  `id_petugas` varchar(100) NOT NULL,
  `tanggal_receive` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `id_suplier` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_petugas` varchar(100) NOT NULL,
  `id_customer` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `penggunaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('330172906940005', 'MICONOS', 'L', 'Jl. Tasura, Perumahan Taman Cemara Blok G-16 Maguwoharjo, Depok, Sleman D. I. Yogyakarta', '+622744532764', 'admin@miconos.co.id', 'Teknis', '2016-07-20', '', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `produkservice`
--

CREATE TABLE `produkservice` (
  `id_service` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumalah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing`
--

CREATE TABLE `purchasing` (
  `id_po` varchar(100) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_petugas` varchar(100) NOT NULL,
  `tanggal_po` date NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tgl_open` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solving`
--

CREATE TABLE `solving` (
  `id_solving` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `teknisi` varchar(100) NOT NULL,
  `penyelesaian` text NOT NULL,
  `tgl_solved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_id_institute` (`id_institut`);

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD KEY `fk_id_po` (`id_purchasing`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  ADD KEY `fk_id_po` (`id_purchasing`),
  ADD KEY `fk_idItemgudang` (`id_item`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `FK_id_transaksi` (`id_transaksi`),
  ADD KEY `fk_id_produk` (`id_produk`);

--
-- Indexes for table `detail_purchasing`
--
ALTER TABLE `detail_purchasing`
  ADD KEY `fk_idpo` (`id_purchasing`),
  ADD KEY `fk_idItem` (`id_item`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD KEY `fk_id_po` (`id_purchasing`),
  ADD KEY `fk_idItemgudang` (`id_item`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id_institusi`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`id_rec`),
  ADD KEY `fk_idporeceive` (`id_po`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_idPetugas` (`id_petugas`),
  ADD KEY `FK_id_custom` (`id_customer`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `produkservice`
--
ALTER TABLE `produkservice`
  ADD KEY `fk_idServis` (`id_service`),
  ADD KEY `fk_idProduk` (`id_produk`);

--
-- Indexes for table `purchasing`
--
ALTER TABLE `purchasing`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `FK_id_custome` (`id_petugas`),
  ADD KEY `FK_id_customer` (`id_customer`);

--
-- Indexes for table `solving`
--
ALTER TABLE `solving`
  ADD PRIMARY KEY (`id_solving`),
  ADD KEY `fk_idTeknisi` (`teknisi`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solving`
--
ALTER TABLE `solving`
  MODIFY `id_solving` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_id_institute` FOREIGN KEY (`id_institut`) REFERENCES `institusi` (`id_institusi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_purchasing`
--
ALTER TABLE `detail_purchasing`
  ADD CONSTRAINT `fk_idItem` FOREIGN KEY (`id_item`) REFERENCES `item_master` (`id_item`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpo` FOREIGN KEY (`id_purchasing`) REFERENCES `purchasing` (`id_po`) ON UPDATE CASCADE;

--
-- Constraints for table `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `fk_idItemgudang` FOREIGN KEY (`id_item`) REFERENCES `item_master` (`id_item`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_po` FOREIGN KEY (`id_purchasing`) REFERENCES `purchasing` (`id_po`) ON UPDATE CASCADE;

--
-- Constraints for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD CONSTRAINT `fk_idporeceive` FOREIGN KEY (`id_po`) REFERENCES `purchasing` (`id_po`) ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_idPetugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_custom` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `produkservice`
--
ALTER TABLE `produkservice`
  ADD CONSTRAINT `fk_idServis` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `solving`
--
ALTER TABLE `solving`
  ADD CONSTRAINT `fk_idTeknisi` FOREIGN KEY (`teknisi`) REFERENCES `petugas` (`id_petugas`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
