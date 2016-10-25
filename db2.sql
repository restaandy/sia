/*
SQLyog Professional v10.42 
MySQL - 5.6.17 : Database - siadem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`siadem` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `siadem`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

/*Table structure for table `nav` */

DROP TABLE IF EXISTS `nav`;

CREATE TABLE `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_nav` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `nav` */

insert  into `nav`(`id`,`nama_nav`,`parent`) values (1,'Home',0),(2,'Kategori',0),(3,'Tag',0),(4,'Coding',2),(5,'PHP',2),(6,'HTML',2),(7,'Pemrograman',3),(8,'Hacking',3),(9,'Array',5);

/*Table structure for table `obj_pegawai` */

DROP TABLE IF EXISTS `obj_pegawai`;

CREATE TABLE `obj_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `agama` enum('islam','kristen','katholik','budha','hindu','konghucu') DEFAULT NULL,
  `prov` tinyint(4) DEFAULT NULL,
  `kabkot` tinyint(4) DEFAULT NULL,
  `kec` int(7) DEFAULT NULL,
  `kel` int(7) DEFAULT NULL,
  `alamat_tmb` text,
  `no_telp` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `asal_pt` varchar(70) DEFAULT NULL,
  `gelar_dpn` varchar(15) DEFAULT NULL,
  `gelar_blk` varchar(15) DEFAULT NULL,
  `thn_lulus` int(7) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `foto` text,
  `status` enum('pns','gtt') DEFAULT NULL,
  `nomor_sk` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obj_pegawai` */

/*Table structure for table `obj_siswa` */

DROP TABLE IF EXISTS `obj_siswa`;

CREATE TABLE `obj_siswa` (
  `nin` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `foto` text,
  `agama` enum('islam','kristen','katholik','budha','hindu','konghucu','lain-lain') DEFAULT NULL,
  `prov` tinyint(4) DEFAULT NULL,
  `kabkot` tinyint(4) DEFAULT NULL,
  `kec` int(7) DEFAULT NULL,
  `kel` int(7) DEFAULT NULL,
  `almt_lain` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` text,
  `jenkel` enum('L','P') DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_telp_ortu` varchar(30) DEFAULT NULL,
  `alamat_ortu` text,
  `pekerjaan_ibu` varchar(70) DEFAULT NULL,
  `pekerjaan_ayah` varchar(70) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `status_masuk` enum('baru','pindahan') DEFAULT NULL,
  `akdm_stat` enum('aktif','lulus','do','pindah','wafat') DEFAULT NULL,
  `thn_masuk` year(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_login` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obj_siswa` */

/*Table structure for table `posting` */

DROP TABLE IF EXISTS `posting`;

CREATE TABLE `posting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` longtext,
  `id_kategori` int(11) DEFAULT NULL,
  `publish` enum('1','0') DEFAULT NULL,
  `date_post` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `posting` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
