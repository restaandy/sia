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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jur_bidang` */

insert  into `jur_bidang`(`id`,`id_sekolah`,`bidang`,`keterangan`) values (1,1,'Teknik','Bidang teknik, teori dan praktek'),(2,1,'Kesehatan','kajian kesehatan orang');

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

/*Data for the table `jur_paket` */

insert  into `jur_paket`(`id`,`id_sekolah`,`id_bidang`,`id_program`,`paket`,`keterangan`) values (1,1,1,2,'TI S1','Teknik Informatika S1');

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

/*Data for the table `jur_program` */

insert  into `jur_program`(`id`,`id_sekolah`,`id_bidang`,`program`,`keterangan`) values (2,1,1,'Teknik Informatika','Peljaran komputer');

/*Table structure for table `kbm_belajar` */

DROP TABLE IF EXISTS `kbm_belajar`;

CREATE TABLE `kbm_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `no_induk` varchar(30) DEFAULT NULL,
  `id_mengajar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kbm_belajar` */

/*Table structure for table `kbm_mengajar` */

DROP TABLE IF EXISTS `kbm_mengajar`;

CREATE TABLE `kbm_mengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kbm_mengajar` */

/*Table structure for table `kbm_nilai` */

DROP TABLE IF EXISTS `kbm_nilai`;

CREATE TABLE `kbm_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `nilai_ke` tinyint(3) DEFAULT NULL,
  `nilai` tinyint(4) DEFAULT NULL,
  `ta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kbm_nilai` */

/*Table structure for table `kbm_sk` */

DROP TABLE IF EXISTS `kbm_sk`;

CREATE TABLE `kbm_sk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `standar_kompetensi` text,
  `kategori` enum('Teori','Praktek') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kbm_sk` */

/*Table structure for table `kbm_ta` */

DROP TABLE IF EXISTS `kbm_ta`;

CREATE TABLE `kbm_ta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `ta` varchar(20) DEFAULT NULL,
  `status_ta` tinyint(4) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kbm_ta` */

insert  into `kbm_ta`(`id`,`id_sekolah`,`ta`,`status_ta`,`keterangan`) values (1,1,'2016/2017',1,'Genap'),(2,1,'2016/2017',0,'Ganjil'),(3,2,'2016/2017',1,'Genap'),(4,2,'2016/2017',0,'Ganjil');

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

/*Data for the table `obj_guru` */

insert  into `obj_guru`(`id`,`id_sekolah`,`nip`,`nama_guru`,`username`,`password`,`tmp_lahir`,`tgl_lahir`,`jenkel`,`agama`,`prov`,`kabkot`,`kec`,`kel`,`alamat_tmb`,`no_telp`,`email`,`asal_pt`,`gelar_dpn`,`gelar_blk`,`thn_lulus`,`jurusan`,`jabatan`,`foto`,`status`,`nomor_sk`,`last_login`) values (1,1,'1','Aji Budianto',NULL,NULL,'Tegal','0000-00-00','L','islam',0,0,0,0,'																																								','09879','','','','',0,'','',NULL,'pns','',NULL),(2,1,'2','Farian Rahmanto',NULL,NULL,'Slawi','0000-00-00','L','islam',0,0,0,0,'					','','','','','',0,'','',NULL,'pns','',NULL),(3,2,'3','Purwanto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pns',NULL,NULL),(4,2,'4','Bambang Marsudi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pns',NULL,NULL);

/*Table structure for table `obj_kelas` */

DROP TABLE IF EXISTS `obj_kelas`;

CREATE TABLE `obj_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `tingkat` enum('X','XI','XII') DEFAULT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `obj_kelas` */

insert  into `obj_kelas`(`id`,`id_sekolah`,`tingkat`,`nama_kelas`) values (2,1,'X','RPL Dasar'),(3,1,'XI','RPL Lanjut'),(4,1,'XII','RPL Advance');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obj_mapel` */

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

insert  into `obj_siswa`(`no_induk`,`no_induk_sekolah`,`id_sekolah`,`nama`,`username`,`password`,`tgl_lahir`,`tmp_lahir`,`foto`,`agama`,`prov`,`kabkot`,`kec`,`kel`,`almt_tambahan`,`no_hp`,`email`,`jenkel`,`nama_ayah`,`nama_ibu`,`no_telp_ortu`,`alamat_ortu`,`pekerjaan_ibu`,`pekerjaan_ayah`,`asal_sekolah`,`status_masuk`,`akdm_stat`,`thn_masuk`,`last_login`,`ip_login`) values ('','3',2,'rrr','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('1','2',1,'aaa','11','32273ecf69fafee5cbf8c997f45e35d937e22558',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2015,NULL,NULL);

/*Table structure for table `tmpt_kabkot` */

DROP TABLE IF EXISTS `tmpt_kabkot`;

CREATE TABLE `tmpt_kabkot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` tinyint(4) DEFAULT NULL,
  `kabkot` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=498 DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_kabkot` */

insert  into `tmpt_kabkot`(`id`,`id_provinsi`,`kabkot`) values (1,1,'Kabupaten Aceh Barat\r\n'),(2,1,'Kabupaten Aceh Barat Daya\r\n'),(3,1,'Kabupaten Aceh Besar\r\n'),(4,1,'Kabupaten Aceh Jaya\r\n'),(5,1,'Kabupaten Aceh Selatan\r\n'),(6,1,'Kabupaten Aceh Singkil\r\n'),(7,1,'Kabupaten Aceh Tamiang\r\n'),(8,1,'Kabupaten Aceh Tengah\r\n'),(9,1,'Kabupaten Aceh Tenggara\r\n'),(10,1,'Kabupaten Aceh Timur\r\n'),(11,1,'Kabupaten Aceh Utara\r\n'),(12,1,'Kabupaten Bener Meriah\r\n'),(13,1,'Kabupaten Bireuen\r\n'),(14,1,'Kabupaten Gayo Lues\r\n'),(15,1,'Kabupaten Nagan Raya\r\n'),(16,1,'Kabupaten Pidie\r\n'),(17,1,'Kabupaten Pidie Jaya\r\n'),(18,1,'Kabupaten Simeulue\r\n'),(19,1,'Kota Banda Aceh\r\n'),(20,1,'Kota Langsa\r\n'),(21,1,'Kota Lhokseumawe\r\n'),(22,1,'Kota Sabang\r\n'),(23,1,'Kota Subulussalam'),(24,2,'Kabupaten Asahan\r\n'),(25,2,'Kabupaten Batubara\r\n'),(26,2,'Kabupaten Dairi\r\n'),(27,2,'Kabupaten Deli Serdang\r\n'),(28,2,'Kabupaten Humbang Hasundutan\r\n'),(29,2,'Kabupaten Karo\r\n'),(30,2,'Kabupaten Labuhanbatu\r\n'),(31,2,'Kabupaten Labuhanbatu Selatan\r\n'),(32,2,'Kabupaten Labuhanbatu Utara\r\n'),(33,2,'Kabupaten Langkat\r\n'),(34,2,'Kabupaten Mandailing Natal\r\n'),(35,2,'Kabupaten Nias\r\n'),(36,2,'Kabupaten Nias Barat\r\n'),(37,2,'Kabupaten Nias Selatan\r\n'),(38,2,'Kabupaten Nias Utara\r\n'),(39,2,'Kabupaten Padang Lawas\r\n'),(40,2,'Kabupaten Padang Lawas Utara\r\n'),(41,2,'Kabupaten Pakpak Bharat\r\n'),(42,2,'Kabupaten Samosir\r\n'),(43,2,'Kabupaten Serdang Bedagai\r\n'),(44,2,'Kabupaten Simalungun\r\n'),(45,2,'Kabupaten Tapanuli Selatan\r\n'),(46,2,'Kabupaten Tapanuli Tengah\r\n'),(47,2,'Kabupaten Tapanuli Utara\r\n'),(48,2,'Kabupaten Toba Samosir\r\n'),(49,2,'Kota Binjai\r\n'),(50,2,'Kota Gunungsitoli\r\n'),(51,2,'Kota Medan\r\n'),(52,2,'Kota Padangsidempuan\r\n'),(53,2,'Kota Pematangsiantar\r\n'),(54,2,'Kota Sibolga\r\n'),(55,2,'Kota Tanjungbalai\r\n'),(56,2,'Kota Tebing Tinggi\r\n'),(57,3,'Kabupaten Agam\r\n'),(58,3,'Kabupaten Dharmasraya\r\n'),(59,3,'Kabupaten Kepulauan Mentawai\r\n'),(60,3,'Kabupaten Lima Puluh Kota\r\n'),(61,3,'Kabupaten Padang Pariaman\r\n'),(62,3,'Kabupaten Pasaman\r\n'),(63,3,'Kabupaten Pasaman Barat\r\n'),(64,3,'Kabupaten Pesisir Selatan\r\n'),(65,3,'Kabupaten Sijunjung\r\n'),(66,3,'Kabupaten Solok\r\n'),(67,3,'Kabupaten Solok Selatan\r\n'),(68,3,'Kabupaten Tanah Datar\r\n'),(69,3,'Kota Bukittinggi\r\n'),(70,3,'Kota Padang\r\n'),(71,3,'Kota Padangpanjang\r\n'),(72,3,'Kota Pariaman\r\n'),(73,3,'Kota Payakumbuh\r\n'),(74,3,'Kota Sawahlunto\r\n'),(75,3,'Kota Solok'),(76,4,'Kabupaten Bintan\r\n'),(77,4,'Kabupaten Karimun\r\n'),(78,4,'Kabupaten Kepulauan Anambas\r\n'),(79,4,'Kabupaten Lingga\r\n'),(80,4,'Kabupaten Natuna\r\n'),(81,4,'Kota Batam\r\n'),(82,4,'Kota Tanjung Pinang'),(83,5,'Kabupaten Batanghari\r\n'),(84,5,'Kabupaten Bungo\r\n'),(85,5,'Kabupaten Kerinci\r\n'),(86,5,'Kabupaten Merangin\r\n'),(87,5,'Kabupaten Muaro Jambi\r\n'),(88,5,'Kabupaten Sarolangun\r\n'),(89,5,'Kabupaten Tanjung Jabung Barat\r\n'),(90,5,'Kabupaten Tanjung Jabung Timur\r\n'),(91,5,'Kabupaten Tebo\r\n'),(92,5,'Kota Jambi\r\n'),(93,5,'Kota Sungai Penuh'),(94,6,'Kabupaten Banyuasin\r\n'),(95,6,'Kabupaten Empat Lawang\r\n'),(96,6,'Kabupaten Lahat\r\n'),(97,6,'Kabupaten Muara Enim\r\n'),(98,6,'Kabupaten Musi Banyuasin\r\n'),(99,6,'Kabupaten Musi Rawas\r\n'),(100,6,'Kabupaten Ogan Ilir\r\n'),(101,6,'Kabupaten Ogan Komering Ilir\r\n'),(102,6,'Kabupaten Ogan Komering Ulu\r\n'),(103,6,'Kabupaten Ogan Komering Ulu Selatan\r\n'),(104,6,'Kabupaten Ogan Komering Ulu Timur\r\n'),(105,6,'Kota Lubuklinggau\r\n'),(106,6,'Kota Pagar Alam\r\n'),(107,6,'Kota Palembang\r\n'),(108,6,'Kota Prabumulih'),(109,7,'Kabupaten Bengkulu Selatan\r\n'),(110,7,'Kabupaten Bengkulu Tengah\r\n'),(111,7,'Kabupaten Bengkulu Utara\r\n'),(112,7,'Kabupaten Kaur\r\n'),(113,7,'Kabupaten Kepahiang\r\n'),(114,7,'Kabupaten Lebong\r\n'),(115,7,'Kabupaten Mukomuko\r\n'),(116,7,'Kabupaten Rejang Lebong\r\n'),(117,7,'Kabupaten Seluma\r\n'),(118,7,'Kota Bengkulu'),(119,8,'Kabupaten Lampung Barat\r\n'),(120,8,'Kabupaten Lampung Selatan\r\n'),(121,8,'Kabupaten Lampung Tengah\r\n'),(122,8,'Kabupaten Lampung Timur\r\n'),(123,8,'Kabupaten Lampung Utara\r\n'),(124,8,'Kabupaten Mesuji\r\n'),(125,8,'Kabupaten Pesawaran\r\n'),(126,8,'Kabupaten Pringsewu\r\n'),(127,8,'Kabupaten Tanggamus\r\n'),(128,8,'Kabupaten Tulang Bawang\r\n'),(129,8,'Kabupaten Tulang Bawang Barat\r\n'),(130,8,'Kabupaten Way Kanan\r\n'),(131,8,'Kota Bandar Lampung\r\n'),(132,8,'Kota Metro'),(133,9,'Kabupaten Bangka\r\n'),(134,9,'Kabupaten Bangka Barat\r\n'),(135,9,'Kabupaten Bangka Selatan\r\n'),(136,9,'Kabupaten Bangka Tengah\r\n'),(137,9,'Kabupaten Belitung\r\n'),(138,9,'Kabupaten Belitung Timur\r\n'),(139,9,'Kota Pangkal Pinang'),(140,10,'Kabupaten Bintan\r\n'),(141,10,'Kabupaten Karimun\r\n'),(142,10,'Kabupaten Kepulauan Anambas\r\n'),(143,10,'Kabupaten Lingga\r\n'),(144,10,'Kabupaten Natuna\r\n'),(145,10,'Kota Batam\r\n'),(146,10,'Kota Tanjung Pinang\r\n'),(147,11,'Kabupaten Kepulauan Seribu\r\n'),(148,11,'Kota Jakarta Barat\r\n'),(149,11,'Kota Jakarta Pusat\r\n'),(150,11,'Kota Jakarta Selatan\r\n'),(151,11,'Kota Jakarta Timur\r\n'),(152,11,'Kota Jakarta Utara'),(153,12,'Kabupaten Bandung\r\n'),(154,12,'Kabupaten Bandung Barat\r\n'),(155,12,'Kabupaten Bekasi\r\n'),(156,12,'Kabupaten Bogor\r\n'),(157,12,'Kabupaten Ciamis\r\n'),(158,12,'Kabupaten Cianjur\r\n'),(159,12,'Kabupaten Cirebon\r\n'),(160,12,'Kabupaten Garut\r\n'),(161,12,'Kabupaten Indramayu\r\n'),(162,12,'Kabupaten Karawang\r\n'),(163,12,'Kabupaten Kuningan\r\n'),(164,12,'Kabupaten Majalengka\r\n'),(165,12,'Kabupaten Purwakarta\r\n'),(166,12,'Kabupaten Subang\r\n'),(167,12,'Kabupaten Sukabumi\r\n'),(168,12,'Kabupaten Sumedang\r\n'),(169,12,'Kabupaten Tasikmalaya\r\n'),(170,12,'Kota Bandung\r\n'),(171,12,'Kota Banjar\r\n'),(172,12,'Kota Bekasi\r\n'),(173,12,'Kota Bogor\r\n'),(174,12,'Kota Cimahi\r\n'),(175,12,'Kota Cirebon\r\n'),(176,12,'Kota Depok\r\n'),(177,12,'Kota Sukabumi\r\n'),(178,12,'Kota Tasikmalaya'),(179,13,'Kabupaten Banjarnegara\r\n'),(180,13,'Kabupaten Banyumas\r\n'),(181,13,'Kabupaten Batang\r\n'),(182,13,'Kabupaten Blora\r\n'),(183,13,'Kabupaten Boyolali\r\n'),(184,13,'Kabupaten Brebes\r\n'),(185,13,'Kabupaten Cilacap\r\n'),(186,13,'Kabupaten Demak\r\n'),(187,13,'Kabupaten Grobogan\r\n'),(188,13,'Kabupaten Jepara\r\n'),(189,13,'Kabupaten Karanganyar\r\n'),(190,13,'Kabupaten Kebumen\r\n'),(191,13,'Kabupaten Kendal\r\n'),(192,13,'Kabupaten Klaten\r\n'),(193,13,'Kabupaten Kudus\r\n'),(194,13,'Kabupaten Magelang\r\n'),(195,13,'Kabupaten Pati\r\n'),(196,13,'Kabupaten Pekalongan\r\n'),(197,13,'Kabupaten Pemalang\r\n'),(198,13,'Kabupaten Purbalingga\r\n'),(199,13,'Kabupaten Purworejo\r\n'),(200,13,'Kabupaten Rembang\r\n'),(201,13,'Kabupaten Semarang\r\n'),(202,13,'Kabupaten Sragen\r\n'),(203,13,'Kabupaten Sukoharjo\r\n'),(204,13,'Kabupaten Tegal\r\n'),(205,13,'Kabupaten Temanggung\r\n'),(206,13,'Kabupaten Wonogiri\r\n'),(207,13,'Kabupaten Wonosobo\r\n'),(208,13,'Kota Magelang\r\n'),(209,13,'Kota Pekalongan\r\n'),(210,13,'Kota Salatiga\r\n'),(211,13,'Kota Semarang\r\n'),(212,13,'Kota Surakarta\r\n'),(213,13,'Kota Tegal'),(214,14,'Kabupaten Tangerang\r\n'),(215,14,'Kabupaten Serang\r\n'),(216,14,'Kabupaten Lebak\r\n'),(217,14,'Kabupaten Pandeglang\r\n'),(218,14,'Kota Tangerang\r\n'),(219,14,'Kota Serang\r\n'),(220,14,'Kota Cilegon\r\n'),(221,14,'Kota Tangerang Selatan'),(222,15,'Kabupaten Bangkalan\r\n'),(223,15,'Kabupaten Banyuwangi\r\n'),(224,15,'Kabupaten Blitar\r\n'),(225,15,'Kabupaten Bojonegoro\r\n'),(226,15,'Kabupaten Bondowoso\r\n'),(227,15,'Kabupaten Gresik\r\n'),(228,15,'Kabupaten Jember\r\n'),(229,15,'Kabupaten Jombang\r\n'),(230,15,'Kabupaten Kediri\r\n'),(231,15,'Kabupaten Lamongan\r\n'),(232,15,'Kabupaten Lumajang\r\n'),(233,15,'Kabupaten Madiun\r\n'),(234,15,'Kabupaten Magetan\r\n'),(235,15,'Kabupaten Malang\r\n'),(236,15,'Kabupaten Mojokerto\r\n'),(237,15,'Kabupaten Nganjuk\r\n'),(238,15,'Kabupaten Ngawi\r\n'),(239,15,'Kabupaten Pacitan\r\n'),(240,15,'Kabupaten Pamekasan\r\n'),(241,15,'Kabupaten Pasuruan\r\n'),(242,15,'Kabupaten Ponorogo\r\n'),(243,15,'Kabupaten Probolinggo\r\n'),(244,15,'Kabupaten Sampang\r\n'),(245,15,'Kabupaten Sidoarjo\r\n'),(246,15,'Kabupaten Situbondo\r\n'),(247,15,'Kabupaten Sumenep\r\n'),(248,15,'Kabupaten Trenggalek\r\n'),(249,15,'Kabupaten Tuban\r\n'),(250,15,'Kabupaten Tulungagung\r\n'),(251,15,'Kota Batu\r\n'),(252,15,'Kota Blitar\r\n'),(253,15,'Kota Kediri\r\n'),(254,15,'Kota Madiun\r\n'),(255,15,'Kota Malang\r\n'),(256,15,'Kota Mojokerto\r\n'),(257,15,'Kota Pasuruan\r\n'),(258,15,'Kota Probolinggo\r\n'),(259,15,'Kota Surabaya'),(260,16,'Kabupaten Bantul\r\n'),(261,16,'Kabupaten Gunung Kidul\r\n'),(262,16,'Kabupaten Kulon Progo\r\n'),(263,16,'Kabupaten Sleman\r\n'),(264,16,'Kota Yogyakarta'),(265,17,'Kabupaten Badung\r\n'),(266,17,'Kabupaten Bangli\r\n'),(267,17,'Kabupaten Buleleng\r\n'),(268,17,'Kabupaten Gianyar\r\n'),(269,17,'Kabupaten Jembrana\r\n'),(270,17,'Kabupaten Karangasem\r\n'),(271,17,'Kabupaten Klungkung\r\n'),(272,17,'Kabupaten Tabanan\r\n'),(273,17,'Kota Denpasar'),(274,18,'Kabupaten Bima\r\n'),(275,18,'Kabupaten Dompu\r\n'),(276,18,'Kabupaten Lombok Barat\r\n'),(277,18,'Kabupaten Lombok Tengah\r\n'),(278,18,'Kabupaten Lombok Timur\r\n'),(279,18,'Kabupaten Lombok Utara\r\n'),(280,18,'Kabupaten Sumbawa\r\n'),(281,18,'Kabupaten Sumbawa Barat\r\n'),(282,18,'Kota Bima\r\n'),(283,18,'Kota Mataram'),(284,19,'Kabupaten Alor\r\n'),(285,19,'Kabupaten Belu\r\n'),(286,19,'Kabupaten Ende\r\n'),(287,19,'Kabupaten Flores Timur\r\n'),(288,19,'Kabupaten Kupang\r\n'),(289,19,'Kabupaten Lembata\r\n'),(290,19,'Kabupaten Manggarai\r\n'),(291,19,'Kabupaten Manggarai Barat\r\n'),(292,19,'Kabupaten Manggarai Timur\r\n'),(293,19,'Kabupaten Ngada\r\n'),(294,19,'Kabupaten Nagekeo\r\n'),(295,19,'Kabupaten Rote Ndao\r\n'),(296,19,'Kabupaten Sabu Raijua\r\n'),(297,19,'Kabupaten Sikka\r\n'),(298,19,'Kabupaten Sumba Barat\r\n'),(299,19,'Kabupaten Sumba Barat Daya\r\n'),(300,19,'Kabupaten Sumba Tengah\r\n'),(301,19,'Kabupaten Sumba Timur\r\n'),(302,19,'Kabupaten Timor Tengah Selatan\r\n'),(303,19,'Kabupaten Timor Tengah Utara\r\n'),(304,19,'Kota Kupang'),(305,20,'Kabupaten Bengkayang\r\n'),(306,20,'Kabupaten Kapuas Hulu\r\n'),(307,20,'Kabupaten Kayong Utara\r\n'),(308,20,'Kabupaten Ketapang\r\n'),(309,20,'Kabupaten Kubu Raya\r\n'),(310,20,'Kabupaten Landak\r\n'),(311,20,'Kabupaten Melawi\r\n'),(312,20,'Kabupaten Pontianak\r\n'),(313,20,'Kabupaten Sambas\r\n'),(314,20,'Kabupaten Sanggau\r\n'),(315,20,'Kabupaten Sekadau\r\n'),(316,20,'Kabupaten Sintang\r\n'),(317,20,'Kota Pontianak\r\n'),(318,20,'Kota Singkawang'),(319,21,'Kabupaten Barito Selatan\r\n'),(320,21,'Kabupaten Barito Timur\r\n'),(321,21,'Kabupaten Barito Utara\r\n'),(322,21,'Kabupaten Gunung Mas\r\n'),(323,21,'Kabupaten Kapuas\r\n'),(324,21,'Kabupaten Katingan\r\n'),(325,21,'Kabupaten Kotawaringin Barat\r\n'),(326,21,'Kabupaten Kotawaringin Timur\r\n'),(327,21,'Kabupaten Lamandau\r\n'),(328,21,'Kabupaten Murung Raya\r\n'),(329,21,'Kabupaten Pulang Pisau\r\n'),(330,21,'Kabupaten Sukamara\r\n'),(331,21,'Kabupaten Seruyan\r\n'),(332,21,'Kota Palangka Raya'),(333,22,'Kabupaten Balangan\r\n'),(334,22,'Kabupaten Banjar\r\n'),(335,22,'Kabupaten Barito Kuala\r\n'),(336,22,'Kabupaten Hulu Sungai Selatan\r\n'),(337,22,'Kabupaten Hulu Sungai Tengah\r\n'),(338,22,'Kabupaten Hulu Sungai Utara\r\n'),(339,22,'Kabupaten Kotabaru\r\n'),(340,22,'Kabupaten Tabalong\r\n'),(341,22,'Kabupaten Tanah Bumbu\r\n'),(342,22,'Kabupaten Tanah Laut\r\n'),(343,22,'Kabupaten Tapin\r\n'),(344,22,'Kota Banjarbaru\r\n'),(345,22,'Kota Banjarmasin'),(346,23,'Kabupaten Berau\r\n'),(347,23,'Kabupaten Bulungan\r\n'),(348,23,'Kabupaten Kutai Barat\r\n'),(349,23,'Kabupaten Kutai Kartanegara\r\n'),(350,23,'Kabupaten Kutai Timur\r\n'),(351,23,'Kabupaten Malinau\r\n'),(352,23,'Kabupaten Nunukan\r\n'),(353,23,'Kabupaten Paser\r\n'),(354,23,'Kabupaten Penajam Paser Utara\r\n'),(355,23,'Kabupaten Tana Tidung\r\n'),(356,23,'Kota Balikpapan\r\n'),(357,23,'Kota Bontang\r\n'),(358,23,'Kota Samarinda\r\n'),(359,23,'Kota Tarakan'),(360,25,'Kabupaten Bolaang Mongondow\r\n'),(361,25,'Kabupaten Bolaang Mongondow Selatan\r\n'),(362,25,'Kabupaten Bolaang Mongondow Timur\r\n'),(363,25,'Kabupaten Bolaang Mongondow Utara\r\n'),(364,25,'Kabupaten Kepulauan Sangihe\r\n'),(365,25,'Kabupaten Kepulauan Siau Tagulandang Biaro\r\n'),(366,25,'Kabupaten Kepulauan Talaud\r\n'),(367,25,'Kabupaten Minahasa\r\n'),(368,25,'Kabupaten Minahasa Selatan\r\n'),(369,25,'Kabupaten Minahasa Tenggara\r\n'),(370,25,'Kabupaten Minahasa Utara\r\n'),(371,25,'Kota Bitung\r\n'),(372,25,'Kota Kotamobagu\r\n'),(373,25,'Kota Manado\r\n'),(374,25,'Kota Tomohon'),(375,27,'Kabupaten Bantaeng\r\n'),(376,27,'Kabupaten Barru\r\n'),(377,27,'Kabupaten Bone\r\n'),(378,27,'Kabupaten Bulukumba\r\n'),(379,27,'Kabupaten Enrekang\r\n'),(380,27,'Kabupaten Gowa\r\n'),(381,27,'Kabupaten Jeneponto\r\n'),(382,27,'Kabupaten Kepulauan Selayar\r\n'),(383,27,'Kabupaten Luwu\r\n'),(384,27,'Kabupaten Luwu Timur\r\n'),(385,27,'Kabupaten Luwu Utara\r\n'),(386,27,'Kabupaten Maros\r\n'),(387,27,'Kabupaten Pangkajene dan Kepulauan\r\n'),(388,27,'Kabupaten Pinrang\r\n'),(389,27,'Kabupaten Sidenreng Rappang\r\n'),(390,27,'Kabupaten Sinjai\r\n'),(391,27,'Kabupaten Soppeng\r\n'),(392,27,'Kabupaten Takalar\r\n'),(393,27,'Kabupaten Tana Toraja\r\n'),(394,27,'Kabupaten Toraja Utara\r\n'),(395,27,'Kabupaten Wajo\r\n'),(396,27,'Kota Makassar\r\n'),(397,27,'Kota Palopo\r\n'),(398,27,'Kota Parepare'),(399,26,'Kabupaten Banggai\r\n'),(400,26,'Kabupaten Banggai Kepulauan\r\n'),(401,26,'Kabupaten Buol\r\n'),(402,26,'Kabupaten Donggala\r\n'),(403,26,'Kabupaten Morowali\r\n'),(404,26,'Kabupaten Parigi Moutong\r\n'),(405,26,'Kabupaten Poso\r\n'),(406,26,'Kabupaten Tojo Una-Una\r\n'),(407,26,'Kabupaten Toli-Toli\r\n'),(408,26,'Kabupaten Sigi\r\n'),(409,26,'Kota Palu'),(410,28,'Kabupaten Bombana\r\n'),(411,28,'Kabupaten Buton\r\n'),(412,28,'Kabupaten Buton Utara\r\n'),(413,28,'Kabupaten Kolaka\r\n'),(414,28,'Kabupaten Kolaka Utara\r\n'),(415,28,'Kabupaten Konawe\r\n'),(416,28,'Kabupaten Konawe Selatan\r\n'),(417,28,'Kabupaten Konawe Utara\r\n'),(418,28,'Kabupaten Muna\r\n'),(419,28,'Kabupaten Wakatobi\r\n'),(420,28,'Kota Bau-Bau\r\n'),(421,28,'Kota Kendari'),(422,29,'Kabupaten Boalemo\r\n'),(423,29,'Kabupaten Bone Bolango\r\n'),(424,29,'Kabupaten Gorontalo\r\n'),(425,29,'Kabupaten Gorontalo Utara\r\n'),(426,29,'Kabupaten Pohuwato\r\n'),(427,29,'Kota Gorontalo\r\n'),(428,30,'Kabupaten Majene\r\n'),(429,30,'Kabupaten Mamasa\r\n'),(430,30,'Kabupaten Mamuju\r\n'),(431,30,'Kabupaten Mamuju Utara\r\n'),(432,30,'Kabupaten Polewali Mandar'),(433,31,'Kabupaten Buru\r\n'),(434,31,'Kabupaten Buru Selatan\r\n'),(435,31,'Kabupaten Kepulauan Aru\r\n'),(436,31,'Kabupaten Maluku Barat Daya\r\n'),(437,31,'Kabupaten Maluku Tengah\r\n'),(438,31,'Kabupaten Maluku Tenggara\r\n'),(439,31,'Kabupaten Maluku Tenggara Barat\r\n'),(440,31,'Kabupaten Seram Bagian Barat\r\n'),(441,31,'Kabupaten Seram Bagian Timur\r\n'),(442,31,'Kota Ambon\r\n'),(443,31,'Kota Tual'),(444,32,'Kabupaten Halmahera Barat\r\n'),(445,32,'Kabupaten Halmahera Tengah\r\n'),(446,32,'Kabupaten Halmahera Utara\r\n'),(447,32,'Kabupaten Halmahera Selatan\r\n'),(448,32,'Kabupaten Kepulauan Sula\r\n'),(449,32,'Kabupaten Halmahera Timur\r\n'),(450,32,'Kabupaten Pulau Morotai\r\n'),(451,32,'Kota Ternate\r\n'),(452,32,'Kota Tidore Kepulauan'),(453,33,'Kabupaten Asmat\r\n'),(454,33,'Kabupaten Biak Numfor\r\n'),(455,33,'Kabupaten Boven Digoel\r\n'),(456,33,'Kabupaten Deiyai\r\n'),(457,33,'Kabupaten Dogiyai\r\n'),(458,33,'Kabupaten Intan Jaya\r\n'),(459,33,'Kabupaten Jayapura\r\n'),(460,33,'Kabupaten Jayawijaya\r\n'),(461,33,'Kabupaten Keerom\r\n'),(462,33,'Kabupaten Kepulauan Yapen\r\n'),(463,33,'Kabupaten Lanny Jaya\r\n'),(464,33,'Kabupaten Mamberamo Raya\r\n'),(465,33,'Kabupaten Mamberamo Tengah\r\n'),(466,33,'Kabupaten Mappi\r\n'),(467,33,'Kabupaten Merauke\r\n'),(468,33,'Kabupaten Mimika\r\n'),(469,33,'Kabupaten Nabire\r\n'),(470,33,'Kabupaten Nduga\r\n'),(471,33,'Kabupaten Paniai\r\n'),(472,33,'Kabupaten Pegunungan Bintang\r\n'),(473,33,'Kabupaten Puncak\r\n'),(474,33,'Kabupaten Puncak Jaya\r\n'),(475,33,'Kabupaten Sarmi\r\n'),(476,33,'Kabupaten Supiori\r\n'),(477,33,'Kabupaten Tolikara\r\n'),(478,33,'Kabupaten Waropen\r\n'),(479,33,'Kabupaten Yahukimo\r\n'),(480,33,'Kabupaten Yalimo\r\n'),(481,33,'Kota Jayapura'),(482,34,'Kabupaten Fakfak\r\n'),(483,34,'Kabupaten Kaimana\r\n'),(484,34,'Kabupaten Manokwari\r\n'),(485,34,'Kabupaten Maybrat\r\n'),(486,34,'Kabupaten Raja Ampat\r\n'),(487,34,'Kabupaten Sorong\r\n'),(488,34,'Kabupaten Sorong Selatan\r\n'),(489,34,'Kabupaten Tambrauw\r\n'),(490,34,'Kabupaten Teluk Bintuni\r\n'),(491,34,'Kabupaten Teluk Wondama\r\n'),(492,34,'Kota Sorong'),(493,24,'Kabupaten Bulungan\r\n'),(494,24,'Kabupaten Malinau\r\n'),(495,24,'Kabupaten Nunukan\r\n'),(496,24,'Kabupaten Tana Tidung\r\n'),(497,24,'Kabupaten Tarakan');

/*Table structure for table `tmpt_kec` */

DROP TABLE IF EXISTS `tmpt_kec`;

CREATE TABLE `tmpt_kec` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(7) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_kec` */

insert  into `tmpt_kec`(`id`,`id_kabkot`,`kecamatan`) values (1,213,'Margadana'),(2,213,'Tegal Barat'),(3,213,'Tegal Selatan'),(4,213,'Tegal Timur'),(5,204,'Kramat'),(6,204,'Warureja'),(7,204,'Suradadi'),(8,204,'Tarub'),(9,204,'Talang'),(10,204,'Dukuhturi'),(11,204,'Adiwerna'),(12,204,'Dukuhwaru'),(13,204,'Slawi'),(14,204,'Pangkah'),(15,204,'Kedungbanteng'),(16,204,'Jatinegara'),(17,204,'Lebaksiu'),(18,204,'Balapulang'),(19,204,'Pagerbarang'),(20,204,'Margasari'),(21,204,'Bumijawa'),(22,204,'Bojong');

/*Table structure for table `tmpt_keldesa` */

DROP TABLE IF EXISTS `tmpt_keldesa`;

CREATE TABLE `tmpt_keldesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` int(7) DEFAULT NULL,
  `keldesa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_keldesa` */

insert  into `tmpt_keldesa`(`id`,`id_kec`,`keldesa`) values (1,5,'Babakan'),(2,5,'Bangungalih'),(3,5,'Bongkok'),(4,5,'Dinuk'),(5,5,'Jatilawang'),(6,5,'Kemantran'),(7,5,'Kemuning'),(8,5,'Kepunduhan'),(9,5,'Kertaharja'),(10,5,'Kertayasa'),(11,5,'Ketileng'),(12,5,'Kramat'),(13,5,'Maribaya'),(14,5,'Mejasem Barat'),(15,5,'Mejasem Timur'),(16,5,'Munjungagung'),(17,5,'Padaharja'),(18,5,'Plumbungan'),(19,5,'Tanjungharja'),(20,5,'Dampyak');

/*Table structure for table `tmpt_prov` */

DROP TABLE IF EXISTS `tmpt_prov`;

CREATE TABLE `tmpt_prov` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tmpt_prov` */

insert  into `tmpt_prov`(`id`,`provinsi`) values (1,'ACEH'),(2,'SUMATERA UTARA'),(3,'SUMATERA BARAT'),(4,'RIAU'),(5,'JAMBI'),(6,'SUMATERA SELATAN'),(7,'BENGKULU'),(8,'LAMPUNG'),(9,'KEP. BANGKA BELITUNG'),(10,'KEP. RIAU'),(11,'DKI JAKARTA'),(12,'JAWA BARAT'),(13,'JAWA TENGAH'),(14,'BANTEN'),(15,'JAWA TIMUR'),(16,'YOGYAKARTA'),(17,'BALI'),(18,'NUSA TENGGARA BARAT'),(19,'NUSA TENGGARA TIMUR'),(20,'KALIMANTAN BARAT'),(21,'KALIMANTAN TENGAH'),(22,'KALIMANTAN SELATAN'),(23,'KALIMANTAN TIMUR'),(24,'KALIMANTAN UTARA'),(25,'SULAWESI UTARA'),(26,'SULAWESI TENGAH'),(27,'SULAWESI SELATAN'),(28,'SULAWESI TENGGARA'),(29,'GORONTALO'),(30,'SULAWESI BARAT'),(31,'MALUKU'),(32,'MALUKU UTARA'),(33,'PAPUA'),(34,'PAPUA BARAT');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
