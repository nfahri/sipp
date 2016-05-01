-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for sipp
CREATE DATABASE IF NOT EXISTS `sipp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sipp`;


-- Dumping structure for table sipp.data_pc
CREATE TABLE IF NOT EXISTS `data_pc` (
  `dp_id_pc_pk` int(11) NOT NULL AUTO_INCREMENT,
  `dp_id_lab_fk` int(11) NOT NULL,
  `dp_cpu` varchar(10) NOT NULL,
  `dp_ram` varchar(10) NOT NULL,
  `dp_memori` varchar(10) NOT NULL,
  `dp_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`dp_id_pc_pk`),
  KEY `fk_data_pc_id_lab` (`dp_id_lab_fk`),
  CONSTRAINT `fk_data_pc_id_lab` FOREIGN KEY (`dp_id_lab_fk`) REFERENCES `lab` (`lab_id_lab_pk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.data_pc: ~2 rows (approximately)
/*!40000 ALTER TABLE `data_pc` DISABLE KEYS */;
INSERT INTO `data_pc` (`dp_id_pc_pk`, `dp_id_lab_fk`, `dp_cpu`, `dp_ram`, `dp_memori`, `dp_status`) VALUES
	(1, 1, 'CoreI7', '2048', '1024', 1),
	(2, 1, 'CoreI3', '4096', '1024', 1),
	(3, 2, 'CoreI7', '4096', '1024', 1);
/*!40000 ALTER TABLE `data_pc` ENABLE KEYS */;


-- Dumping structure for table sipp.kepala_lab
CREATE TABLE IF NOT EXISTS `kepala_lab` (
  `kl_id_kepala_lab_pk` int(11) NOT NULL AUTO_INCREMENT,
  `kl_nama_kepala_lab` varchar(50) NOT NULL,
  `kl_nomor_tlp` varchar(14) NOT NULL,
  `kl_email` varchar(30) NOT NULL,
  PRIMARY KEY (`kl_id_kepala_lab_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.kepala_lab: ~0 rows (approximately)
/*!40000 ALTER TABLE `kepala_lab` DISABLE KEYS */;
INSERT INTO `kepala_lab` (`kl_id_kepala_lab_pk`, `kl_nama_kepala_lab`, `kl_nomor_tlp`, `kl_email`) VALUES
	(1, 'Riyanarto', '085', 'riyanarto@'),
	(2, 'Baskoro', '085', 'bask@');
/*!40000 ALTER TABLE `kepala_lab` ENABLE KEYS */;


-- Dumping structure for table sipp.lab
CREATE TABLE IF NOT EXISTS `lab` (
  `lab_id_lab_pk` int(11) NOT NULL AUTO_INCREMENT,
  `lab_id_kepala_lab_fk` int(11) NOT NULL,
  `lab_nama_lab` varchar(50) NOT NULL,
  PRIMARY KEY (`lab_id_lab_pk`),
  KEY `fk_lab_id_kepala_lab` (`lab_id_kepala_lab_fk`),
  CONSTRAINT `fk_lab_id_kepala_lab` FOREIGN KEY (`lab_id_kepala_lab_fk`) REFERENCES `kepala_lab` (`kl_id_kepala_lab_pk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.lab: ~2 rows (approximately)
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
INSERT INTO `lab` (`lab_id_lab_pk`, `lab_id_kepala_lab_fk`, `lab_nama_lab`) VALUES
	(1, 1, 'MI'),
	(2, 2, 'AJK');
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;


-- Dumping structure for table sipp.peminjaman_pc
CREATE TABLE IF NOT EXISTS `peminjaman_pc` (
  `pp_id_peminjaman_pk` int(11) NOT NULL AUTO_INCREMENT,
  `pp_id_pc_fk` int(11) NOT NULL DEFAULT '0',
  `pp_nama_peminjam` varchar(50) NOT NULL DEFAULT '0',
  `pp_nrp_peminjam` varchar(10) NOT NULL DEFAULT '0',
  `pp_no_telp` varchar(14) NOT NULL DEFAULT '0',
  `pp_keperluan` varchar(50) NOT NULL DEFAULT '0',
  `pp_keterangan_tambahan` text,
  `pp_tanggal_mulai` date NOT NULL DEFAULT '0000-00-00',
  `pp_tanggal_selesai` date NOT NULL DEFAULT '0000-00-00',
  `pp_konfirmasi` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pp_id_peminjaman_pk`),
  KEY `fk_peminjaman_pc_id_pc` (`pp_id_pc_fk`),
  CONSTRAINT `fk_peminjaman_pc_id_pc` FOREIGN KEY (`pp_id_pc_fk`) REFERENCES `data_pc` (`dp_id_pc_pk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.peminjaman_pc: ~1 rows (approximately)
/*!40000 ALTER TABLE `peminjaman_pc` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminjaman_pc` ENABLE KEYS */;


-- Dumping structure for table sipp.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `pg_id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `pg_id_lab_fk` int(11) NOT NULL,
  `pg_level_akses` tinyint(4) NOT NULL,
  `pg_username` varchar(15) NOT NULL,
  `pg_password` varchar(50) NOT NULL,
  PRIMARY KEY (`pg_id_pengguna`),
  KEY `fk_pengguna_id_lab` (`pg_id_lab_fk`),
  CONSTRAINT `fk_pengguna_id_lab` FOREIGN KEY (`pg_id_lab_fk`) REFERENCES `lab` (`lab_id_lab_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.pengguna: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`pg_id_pengguna`, `pg_id_lab_fk`, `pg_level_akses`, `pg_username`, `pg_password`) VALUES
	(1, 1, 2, 'fakh', 'fakh');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;


-- Dumping structure for table sipp.test
CREATE TABLE IF NOT EXISTS `test` (
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sipp.test: ~0 rows (approximately)
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`tanggal`) VALUES
	('2016-04-27');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
