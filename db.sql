/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.6.17 : Database - belajarinteraktif
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`belajarinteraktif` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `belajarinteraktif`;

/*Table structure for table `bahan_ajar` */

DROP TABLE IF EXISTS `bahan_ajar`;

CREATE TABLE `bahan_ajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_hal_subtema` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `link_media` text,
  `link_file` text,
  `keterangan` text,
  `id_jenjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bahan_ajar` */

/*Table structure for table `ebuku` */

DROP TABLE IF EXISTS `ebuku`;

CREATE TABLE `ebuku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` enum('guru','siswa') DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `nama_buku` varchar(100) DEFAULT NULL,
  `cover_buku` text,
  `link_buku` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ebuku` */

/*Table structure for table `hal_subtema` */

DROP TABLE IF EXISTS `hal_subtema`;

CREATE TABLE `hal_subtema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `id_subtema` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kbm` text,
  `kompetensi` text,
  `id_jenjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hal_subtema` */

insert  into `hal_subtema`(`id`,`id_tema`,`id_subtema`,`nama`,`kbm`,`kompetensi`,`id_jenjang`) values (1,1,1,'Pelajaran 1','<p><strong>Hallo KBm</strong></p>','<p><strong>Hallo Kompetensi fgh</strong></p>',1),(2,1,1,'Pelajaran 2','<p>hallo bro</p>','<p>hallo sis</p>',1);

/*Table structure for table `jenjang` */

DROP TABLE IF EXISTS `jenjang`;

CREATE TABLE `jenjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(100) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jenjang` */

insert  into `jenjang`(`id`,`jenjang`,`keterangan`,`foto`) values (1,'Kelas 6 SD Semester 1','Materi dan Praktek','win32_disk_imager.png'),(2,'Kelas 6 SD Semester 2','Materi dan Praktek','tahap_tahap_install_raspberry_pi.png');

/*Table structure for table `subtema` */

DROP TABLE IF EXISTS `subtema`;

CREATE TABLE `subtema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `subtema` varchar(100) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `subtema` */

insert  into `subtema`(`id`,`id_tema`,`subtema`,`id_jenjang`) values (1,1,'Sub Tema 1',1),(2,1,'Sub Tema 2',1);

/*Table structure for table `tema` */

DROP TABLE IF EXISTS `tema`;

CREATE TABLE `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tema` */

insert  into `tema`(`id`,`tema`,`id_jenjang`) values (1,'Selamatkan Makhluk Hidup',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
