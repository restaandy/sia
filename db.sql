/*
SQLyog Professional v10.42 
MySQL - 5.6.17 : Database - sia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sia`;

/*Table structure for table `jur_bidang` */

DROP TABLE IF EXISTS `jur_bidang`;

CREATE TABLE `jur_bidang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `jur_paket` */

DROP TABLE IF EXISTS `jur_paket`;

CREATE TABLE `jur_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `jur_program` */

DROP TABLE IF EXISTS `jur_program`;

CREATE TABLE `jur_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_belajar` */

DROP TABLE IF EXISTS `kbm_belajar`;

CREATE TABLE `kbm_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `no_induk` varchar(30) DEFAULT NULL,
  `id_mengajar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_mengajar` */

DROP TABLE IF EXISTS `kbm_mengajar`;

CREATE TABLE `kbm_mengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_nilai` */

DROP TABLE IF EXISTS `kbm_nilai`;

CREATE TABLE `kbm_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `no_induk` varchar(30) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `ta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_sk` */

DROP TABLE IF EXISTS `kbm_sk`;

CREATE TABLE `kbm_sk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `standar_kompetensi` text,
  `bobot` tinyint(4) DEFAULT NULL,
  `kategori` enum('Teori','Praktek','Uts','Uas') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_subnilai` */

DROP TABLE IF EXISTS `kbm_subnilai`;

CREATE TABLE `kbm_subnilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sk` int(11) DEFAULT NULL,
  `no_induk` varchar(50) DEFAULT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `sub_nilai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Table structure for table `kbm_ta` */

DROP TABLE IF EXISTS `kbm_ta`;

CREATE TABLE `kbm_ta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(20) DEFAULT NULL,
  `tajaran` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `keterangan` enum('ganjil','genap') DEFAULT NULL,
  `status` enum('aktif','tdkaktif') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_guru` */

DROP TABLE IF EXISTS `obj_guru`;

CREATE TABLE `obj_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_jabatan` */

DROP TABLE IF EXISTS `obj_jabatan`;

CREATE TABLE `obj_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jabatan` enum('guru','wali','kepsek') DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_kelas` */

DROP TABLE IF EXISTS `obj_kelas`;

CREATE TABLE `obj_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `tingkat` enum('X','XI','XII') DEFAULT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_mapel` */

DROP TABLE IF EXISTS `obj_mapel`;

CREATE TABLE `obj_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  `komp_inti` text,
  `komp_dasar` text,
  `status_mapel` enum('wajib','minat') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_pegawai` */

DROP TABLE IF EXISTS `obj_pegawai`;

CREATE TABLE `obj_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_sekolah` */

DROP TABLE IF EXISTS `obj_sekolah`;

CREATE TABLE `obj_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `prov` tinyint(4) DEFAULT NULL,
  `kabkota` tinyint(4) DEFAULT NULL,
  `kec` int(7) DEFAULT NULL,
  `kel` int(7) DEFAULT NULL,
  `almt_tambahan` text,
  `telp` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `visi` text,
  `misi` text,
  `bergabung` date DEFAULT NULL,
  `status_sistem` char(1) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `obj_siswa` */

DROP TABLE IF EXISTS `obj_siswa`;

CREATE TABLE `obj_siswa` (
  `no_induk` varchar(30) NOT NULL,
  `no_induk_sekolah` varchar(20) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `foto` text,
  `agama` enum('islam','kristen','katholik','budha','hindu','konghucu','lain-lain') DEFAULT NULL,
  `prov` tinyint(4) DEFAULT NULL,
  `kabkot` tinyint(4) DEFAULT NULL,
  `kec` int(7) DEFAULT NULL,
  `kel` int(7) DEFAULT NULL,
  `almt_tambahan` text,
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
  PRIMARY KEY (`no_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmpt_kabkot` */

DROP TABLE IF EXISTS `tmpt_kabkot`;

CREATE TABLE `tmpt_kabkot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` tinyint(4) DEFAULT NULL,
  `kabkot` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=498 DEFAULT CHARSET=latin1;

/*Table structure for table `tmpt_kec` */

DROP TABLE IF EXISTS `tmpt_kec`;

CREATE TABLE `tmpt_kec` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(7) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Table structure for table `tmpt_keldesa` */

DROP TABLE IF EXISTS `tmpt_keldesa`;

CREATE TABLE `tmpt_keldesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` int(7) DEFAULT NULL,
  `keldesa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Table structure for table `tmpt_prov` */

DROP TABLE IF EXISTS `tmpt_prov`;

CREATE TABLE `tmpt_prov` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
