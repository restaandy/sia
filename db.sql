/*
SQLyog Enterprise - MySQL GUI v8.18 
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jur_bidang` */

insert  into `jur_bidang`(`id`,`id_sekolah`,`bidang`,`keterangan`) values (3,1,'Teknik','-'),(4,1,'Kesehatan','-');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jur_paket` */

insert  into `jur_paket`(`id`,`id_sekolah`,`id_bidang`,`id_program`,`paket`,`keterangan`) values (2,1,3,3,'Pemrograman','-');

/*Table structure for table `jur_program` */

DROP TABLE IF EXISTS `jur_program`;

CREATE TABLE `jur_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jur_program` */

insert  into `jur_program`(`id`,`id_sekolah`,`id_bidang`,`program`,`keterangan`) values (3,1,3,'Teknik Informatika','-');

/*Table structure for table `kbm_belajar` */

DROP TABLE IF EXISTS `kbm_belajar`;

CREATE TABLE `kbm_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `no_induk` varchar(30) DEFAULT NULL,
  `id_mengajar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_belajar` */

insert  into `kbm_belajar`(`id`,`id_sekolah`,`no_induk`,`id_mengajar`) values (1,1,'0001',1);

/*Table structure for table `kbm_ekstra_siswa` */

DROP TABLE IF EXISTS `kbm_ekstra_siswa`;

CREATE TABLE `kbm_ekstra_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_ekstra` int(11) DEFAULT NULL,
  `no_induk` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_ekstra_siswa` */

insert  into `kbm_ekstra_siswa`(`id`,`id_sekolah`,`id_ekstra`,`no_induk`,`nilai`) values (1,1,1,'0001',NULL);

/*Table structure for table `kbm_mengajar` */

DROP TABLE IF EXISTS `kbm_mengajar`;

CREATE TABLE `kbm_mengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_ta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_mengajar` */

insert  into `kbm_mengajar`(`id`,`id_sekolah`,`id_pegawai`,`id_kelas`,`id_mapel`,`id_ta`) values (1,1,3,1,1,'2016/2017');

/*Table structure for table `kbm_nilai` */

DROP TABLE IF EXISTS `kbm_nilai`;

CREATE TABLE `kbm_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `no_induk` varchar(30) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `ta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_nilai` */

insert  into `kbm_nilai`(`id`,`id_sekolah`,`no_induk`,`id_sk`,`nilai`,`ta`) values (1,1,'0001',1,'78','2016/2017');

/*Table structure for table `kbm_nilai_sikap` */

DROP TABLE IF EXISTS `kbm_nilai_sikap`;

CREATE TABLE `kbm_nilai_sikap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_mengajar` int(11) DEFAULT NULL,
  `no_induk` varchar(50) DEFAULT NULL,
  `sikap` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kbm_nilai_sikap` */

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_sk` */

insert  into `kbm_sk`(`id`,`id_sekolah`,`id_mapel`,`standar_kompetensi`,`bobot`,`kategori`) values (1,1,1,'Paham Sintak',1,'Teori'),(2,1,1,'Paham Looping',1,'Teori'),(3,1,1,'Bisa Fungsi',1,'Teori'),(4,1,1,'Paham Semantik',1,'Praktek'),(5,1,1,'Bisa Looping',1,'Praktek'),(6,1,1,'Bisa Prosedur',1,'Praktek'),(7,1,1,'Ulangan Tengah Semester',2,'Uts'),(8,1,1,'Ulangan Akhir Semester',2,'Uas');

/*Table structure for table `kbm_subnilai` */

DROP TABLE IF EXISTS `kbm_subnilai`;

CREATE TABLE `kbm_subnilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sk` int(11) DEFAULT NULL,
  `no_induk` varchar(50) DEFAULT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `sub_nilai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_subnilai` */

insert  into `kbm_subnilai`(`id`,`id_sk`,`no_induk`,`ket`,`sub_nilai`) values (1,1,'0001','P1','78');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_ta` */

insert  into `kbm_ta`(`id`,`ta`,`tajaran`,`tahun`,`keterangan`,`status`) values (1,'2016/2017',20161,2016,'ganjil','aktif'),(2,'2016/2017',20162,2017,'genap','tdkaktif');

/*Table structure for table `obj_ekstra` */

DROP TABLE IF EXISTS `obj_ekstra`;

CREATE TABLE `obj_ekstra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_ekstra` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `obj_ekstra` */

insert  into `obj_ekstra`(`id`,`id_sekolah`,`nama_ekstra`,`deskripsi`) values (1,1,'Sepak Bola','Ekstrakulikuler sepak bola'),(2,1,'Karawitan','gamelan, kenong dll');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obj_guru` */

/*Table structure for table `obj_jabatan` */

DROP TABLE IF EXISTS `obj_jabatan`;

CREATE TABLE `obj_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jabatan` enum('guru','wali','kepsek','bk') DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `obj_jabatan` */

insert  into `obj_jabatan`(`id`,`id_sekolah`,`id_pegawai`,`jabatan`,`id_kelas`) values (1,1,3,'guru',0),(2,1,5,'bk',0),(3,1,4,'wali',1);

/*Table structure for table `obj_kelas` */

DROP TABLE IF EXISTS `obj_kelas`;

CREATE TABLE `obj_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `tingkat` enum('X','XI','XII') DEFAULT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `obj_kelas` */

insert  into `obj_kelas`(`id`,`id_sekolah`,`tingkat`,`nama_kelas`) values (1,1,'X','RPL A');

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

/*Data for the table `obj_mapel` */

insert  into `obj_mapel`(`id`,`id_sekolah`,`id_bidang`,`id_program`,`id_paket`,`nama_mapel`,`komp_inti`,`komp_dasar`,`status_mapel`) values (1,1,3,3,2,'Pemrograman Dasar','Bisa membuat program sederhana','Menguasai sintak pemrograman','wajib');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `obj_pegawai` */

insert  into `obj_pegawai`(`id`,`id_sekolah`,`nip`,`nama_pegawai`,`username`,`password`,`tmp_lahir`,`tgl_lahir`,`jenkel`,`agama`,`prov`,`kabkot`,`kec`,`kel`,`alamat_tmb`,`no_telp`,`email`,`asal_pt`,`gelar_dpn`,`gelar_blk`,`thn_lulus`,`jurusan`,`jabatan`,`foto`,`status`,`nomor_sk`,`last_login`) values (3,1,'0001','Waluyo','0001','da5860dacd52a671366209f3fc08f140035ed81b',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'waluyo@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pns',NULL,NULL),(4,1,'0002','Aji Budi','0002','a71e47701af2e35db08b2b03db0ce504d5b5384d',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ajibudi@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pns',NULL,NULL),(5,1,'0003','wahyu','0003','945fb35f2985533a2c3bb91f6c7cf0effd58ff7b',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wahyu@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pns',NULL,NULL);

/*Table structure for table `obj_perwalian` */

DROP TABLE IF EXISTS `obj_perwalian`;

CREATE TABLE `obj_perwalian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `no_induk` varchar(50) DEFAULT NULL,
  `ta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obj_perwalian` */

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

/*Data for the table `obj_sekolah` */

insert  into `obj_sekolah`(`id`,`nama_sekolah`,`username`,`password`,`prov`,`kabkota`,`kec`,`kel`,`almt_tambahan`,`telp`,`website`,`email`,`visi`,`misi`,`bergabung`,`status_sistem`,`last_login`) values (1,'SMK N 1 Slawi','smea','3a496598e5964f98d618e854606ae86f36ba5133',NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,NULL);

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

/*Data for the table `obj_siswa` */

insert  into `obj_siswa`(`no_induk`,`no_induk_sekolah`,`id_sekolah`,`nama`,`username`,`password`,`tgl_lahir`,`tmp_lahir`,`foto`,`agama`,`prov`,`kabkot`,`kec`,`kel`,`almt_tambahan`,`no_hp`,`email`,`jenkel`,`nama_ayah`,`nama_ibu`,`no_telp_ortu`,`alamat_ortu`,`pekerjaan_ibu`,`pekerjaan_ayah`,`asal_sekolah`,`status_masuk`,`akdm_stat`,`thn_masuk`,`last_login`,`ip_login`) values ('0001','0001',1,'Andy Resta','00010001','da5860dacd52a671366209f3fc08f140035ed81b',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'baru','aktif',2016,NULL,NULL);

/*Table structure for table `tmpt_kabkot` */

DROP TABLE IF EXISTS `tmpt_kabkot`;

CREATE TABLE `tmpt_kabkot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` tinyint(4) DEFAULT NULL,
  `kabkot` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_kabkot` */

/*Table structure for table `tmpt_kec` */

DROP TABLE IF EXISTS `tmpt_kec`;

CREATE TABLE `tmpt_kec` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(7) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_kec` */

/*Table structure for table `tmpt_keldesa` */

DROP TABLE IF EXISTS `tmpt_keldesa`;

CREATE TABLE `tmpt_keldesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` int(7) DEFAULT NULL,
  `keldesa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_keldesa` */

/*Table structure for table `tmpt_prov` */

DROP TABLE IF EXISTS `tmpt_prov`;

CREATE TABLE `tmpt_prov` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_prov` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
