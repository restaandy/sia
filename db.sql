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

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`id`,`id_sekolah`,`nama_guru`) values (1,1,'Aji Budianto'),(2,1,'Farian Rahmanto'),(3,2,'Purwanto'),(4,2,'Bambang Marsudi');

/*Table structure for table `hasil_studi` */

DROP TABLE IF EXISTS `hasil_studi`;

CREATE TABLE `hasil_studi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kbm` int(11) DEFAULT NULL,
  `id_kategori_penilaian` int(11) DEFAULT NULL,
  `nilai` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hasil_studi` */

/*Table structure for table `kabkota` */

DROP TABLE IF EXISTS `kabkota`;

CREATE TABLE `kabkota` (
  `id` tinyint(4) DEFAULT NULL,
  `kabkota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kabkota` */

insert  into `kabkota`(`id`,`kabkota`) values (1,'Kabupaten Aceh Barat\r\n'),(1,'Kabupaten Aceh Barat Daya\r\n'),(1,'Kabupaten Aceh Besar\r\n'),(1,'Kabupaten Aceh Jaya\r\n'),(1,'Kabupaten Aceh Selatan\r\n'),(1,'Kabupaten Aceh Singkil\r\n'),(1,'Kabupaten Aceh Tamiang\r\n'),(1,'Kabupaten Aceh Tengah\r\n'),(1,'Kabupaten Aceh Tenggara\r\n'),(1,'Kabupaten Aceh Timur\r\n'),(1,'Kabupaten Aceh Utara\r\n'),(1,'Kabupaten Bener Meriah\r\n'),(1,'Kabupaten Bireuen\r\n'),(1,'Kabupaten Gayo Lues\r\n'),(1,'Kabupaten Nagan Raya\r\n'),(1,'Kabupaten Pidie\r\n'),(1,'Kabupaten Pidie Jaya\r\n'),(1,'Kabupaten Simeulue\r\n'),(1,'Kota Banda Aceh\r\n'),(1,'Kota Langsa\r\n'),(1,'Kota Lhokseumawe\r\n'),(1,'Kota Sabang\r\n'),(1,'Kota Subulussalam'),(2,'Kabupaten Asahan\r\n'),(2,'Kabupaten Batubara\r\n'),(2,'Kabupaten Dairi\r\n'),(2,'Kabupaten Deli Serdang\r\n'),(2,'Kabupaten Humbang Hasundutan\r\n'),(2,'Kabupaten Karo\r\n'),(2,'Kabupaten Labuhanbatu\r\n'),(2,'Kabupaten Labuhanbatu Selatan\r\n'),(2,'Kabupaten Labuhanbatu Utara\r\n'),(2,'Kabupaten Langkat\r\n'),(2,'Kabupaten Mandailing Natal\r\n'),(2,'Kabupaten Nias\r\n'),(2,'Kabupaten Nias Barat\r\n'),(2,'Kabupaten Nias Selatan\r\n'),(2,'Kabupaten Nias Utara\r\n'),(2,'Kabupaten Padang Lawas\r\n'),(2,'Kabupaten Padang Lawas Utara\r\n'),(2,'Kabupaten Pakpak Bharat\r\n'),(2,'Kabupaten Samosir\r\n'),(2,'Kabupaten Serdang Bedagai\r\n'),(2,'Kabupaten Simalungun\r\n'),(2,'Kabupaten Tapanuli Selatan\r\n'),(2,'Kabupaten Tapanuli Tengah\r\n'),(2,'Kabupaten Tapanuli Utara\r\n'),(2,'Kabupaten Toba Samosir\r\n'),(2,'Kota Binjai\r\n'),(2,'Kota Gunungsitoli\r\n'),(2,'Kota Medan\r\n'),(2,'Kota Padangsidempuan\r\n'),(2,'Kota Pematangsiantar\r\n'),(2,'Kota Sibolga\r\n'),(2,'Kota Tanjungbalai\r\n'),(2,'Kota Tebing Tinggi\r\n'),(2,''),(3,'Kabupaten Agam\r\n'),(3,'Kabupaten Dharmasraya\r\n'),(3,'Kabupaten Kepulauan Mentawai\r\n'),(3,'Kabupaten Lima Puluh Kota\r\n'),(3,'Kabupaten Padang Pariaman\r\n'),(3,'Kabupaten Pasaman\r\n'),(3,'Kabupaten Pasaman Barat\r\n'),(3,'Kabupaten Pesisir Selatan\r\n'),(3,'Kabupaten Sijunjung\r\n'),(3,'Kabupaten Solok\r\n'),(3,'Kabupaten Solok Selatan\r\n'),(3,'Kabupaten Tanah Datar\r\n'),(3,'Kota Bukittinggi\r\n'),(3,'Kota Padang\r\n'),(3,'Kota Padangpanjang\r\n'),(3,'Kota Pariaman\r\n'),(3,'Kota Payakumbuh\r\n'),(3,'Kota Sawahlunto\r\n'),(3,'Kota Solok'),(4,'Kabupaten Bintan\r\n'),(4,'Kabupaten Karimun\r\n'),(4,'Kabupaten Kepulauan Anambas\r\n'),(4,'Kabupaten Lingga\r\n'),(4,'Kabupaten Natuna\r\n'),(4,'Kota Batam\r\n'),(4,'Kota Tanjung Pinang'),(5,'Kabupaten Batanghari\r\n'),(5,'Kabupaten Bungo\r\n'),(5,'Kabupaten Kerinci\r\n'),(5,'Kabupaten Merangin\r\n'),(5,'Kabupaten Muaro Jambi\r\n'),(5,'Kabupaten Sarolangun\r\n'),(5,'Kabupaten Tanjung Jabung Barat\r\n'),(5,'Kabupaten Tanjung Jabung Timur\r\n'),(5,'Kabupaten Tebo\r\n'),(5,'Kota Jambi\r\n'),(5,'Kota Sungai Penuh'),(6,'Kabupaten Banyuasin\r\n'),(6,'Kabupaten Empat Lawang\r\n'),(6,'Kabupaten Lahat\r\n'),(6,'Kabupaten Muara Enim\r\n'),(6,'Kabupaten Musi Banyuasin\r\n'),(6,'Kabupaten Musi Rawas\r\n'),(6,'Kabupaten Ogan Ilir\r\n'),(6,'Kabupaten Ogan Komering Ilir\r\n'),(6,'Kabupaten Ogan Komering Ulu\r\n'),(6,'Kabupaten Ogan Komering Ulu Selatan\r\n'),(6,'Kabupaten Ogan Komering Ulu Timur\r\n'),(6,'Kota Lubuklinggau\r\n'),(6,'Kota Pagar Alam\r\n'),(6,'Kota Palembang\r\n'),(6,'Kota Prabumulih'),(7,'Kabupaten Bengkulu Selatan\r\n'),(7,'Kabupaten Bengkulu Tengah\r\n'),(7,'Kabupaten Bengkulu Utara\r\n'),(7,'Kabupaten Kaur\r\n'),(7,'Kabupaten Kepahiang\r\n'),(7,'Kabupaten Lebong\r\n'),(7,'Kabupaten Mukomuko\r\n'),(7,'Kabupaten Rejang Lebong\r\n'),(7,'Kabupaten Seluma\r\n'),(7,'Kota Bengkulu'),(8,'Kabupaten Lampung Barat\r\n'),(8,'Kabupaten Lampung Selatan\r\n'),(8,'Kabupaten Lampung Tengah\r\n'),(8,'Kabupaten Lampung Timur\r\n'),(8,'Kabupaten Lampung Utara\r\n'),(8,'Kabupaten Mesuji\r\n'),(8,'Kabupaten Pesawaran\r\n'),(8,'Kabupaten Pringsewu\r\n'),(8,'Kabupaten Tanggamus\r\n'),(8,'Kabupaten Tulang Bawang\r\n'),(8,'Kabupaten Tulang Bawang Barat\r\n'),(8,'Kabupaten Way Kanan\r\n'),(8,'Kota Bandar Lampung\r\n'),(8,'Kota Metro'),(9,'Kabupaten Bangka\r\n'),(9,'Kabupaten Bangka Barat\r\n'),(9,'Kabupaten Bangka Selatan\r\n'),(9,'Kabupaten Bangka Tengah\r\n'),(9,'Kabupaten Belitung\r\n'),(9,'Kabupaten Belitung Timur\r\n'),(9,'Kota Pangkal Pinang'),(10,'Kabupaten Bintan\r\n'),(10,'Kabupaten Karimun\r\n'),(10,'Kabupaten Kepulauan Anambas\r\n'),(10,'Kabupaten Lingga\r\n'),(10,'Kabupaten Natuna\r\n'),(10,'Kota Batam\r\n'),(10,'Kota Tanjung Pinang\r\n'),(10,'\r\n'),(10,'');

/*Table structure for table `kategori_penilaian` */

DROP TABLE IF EXISTS `kategori_penilaian`;

CREATE TABLE `kategori_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_penilaian` */

insert  into `kategori_penilaian`(`id`,`id_sekolah`,`kategori`) values (1,1,'UAS'),(2,2,'UAS');

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kecamatan` */

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `mapel` */

insert  into `mapel`(`id`,`id_sekolah`,`nama_mapel`) values (1,1,'TKJ'),(2,1,'RPLD'),(3,2,'TKJ'),(4,2,'RPLD');

/*Table structure for table `murid` */

DROP TABLE IF EXISTS `murid`;

CREATE TABLE `murid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_murid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `murid` */

insert  into `murid`(`id`,`id_sekolah`,`nama_murid`) values (1,1,'Sri Minggat'),(2,1,'Paijo Pujo'),(3,2,'Slamet Wijayanto'),(4,2,'Komar Marudin');

/*Table structure for table `ngajar` */

DROP TABLE IF EXISTS `ngajar`;

CREATE TABLE `ngajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ngajar` */

/*Table structure for table `provinsi` */

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `provinsi` */

insert  into `provinsi`(`id`,`provinsi`) values (1,'ACEH'),(2,'SUMATERA UTARA'),(3,'SUMATERA BARAT'),(4,'RIAU'),(5,'JAMBI'),(6,'SUMATERA SELATAN'),(7,'BENGKULU'),(8,'LAMPUNG'),(9,'KEP. BANGKA BELITUNG'),(10,'KEP. RIAU'),(11,'DKI JAKARTA'),(12,'JAWA BARAT'),(13,'JAWA TENGAH'),(14,'BANTEN'),(15,'JAWA TIMUR'),(16,'YOGYAKARTA'),(17,'BALI'),(18,'NUSA TENGGARA BARAT'),(19,'NUSA TENGGARA TIMUR'),(20,'KALIMANTAN BARAT'),(21,'KALIMANTAN TENGAH'),(22,'KALIMANTAN SELATAN'),(23,'KALIMANTAN TIMUR'),(24,'KALIMANTAN UTARA'),(25,'SULAWESI UTARA'),(26,'SULAWESI TENGAH'),(27,'SULAWESI SELATAN'),(28,'SULAWESI TENGGARA'),(29,'GORONTALO'),(30,'SULAWESI BARAT'),(31,'MALUKU'),(32,'MALUKU UTARA'),(33,'PAPUA'),(34,'PAPUA BARAT');

/*Table structure for table `sekolah` */

DROP TABLE IF EXISTS `sekolah`;

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `provinsi` tinyint(3) DEFAULT NULL,
  `kabkota` tinyint(3) DEFAULT NULL,
  `kec` tinyint(3) DEFAULT NULL,
  `alamatlengkap` text,
  `visimisi` varchar(100) DEFAULT NULL,
  `bergabung` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sekolah` */

/*Table structure for table `tahun_ajaran` */

DROP TABLE IF EXISTS `tahun_ajaran`;

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `ta` varchar(20) DEFAULT NULL,
  `status_ta` tinyint(4) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tahun_ajaran` */

insert  into `tahun_ajaran`(`id`,`id_sekolah`,`ta`,`status_ta`,`keterangan`) values (1,1,'2016/2017',1,'Genap'),(2,1,'2016/2017',0,'Ganjil'),(3,2,'2016/2017',1,'Genap'),(4,2,'2016/2017',0,'Ganjil');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
