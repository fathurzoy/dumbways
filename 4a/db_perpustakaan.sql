/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.17-MariaDB : Database - db_perpustakaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_perpustakaan`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `books` */

insert  into `books`(`id`,`name`,`stok`,`image`,`deskripsi`,`category_id`) values 
(1,'Ngomong Inggris',10,'belajar_bahasainggris.jpg','Buku ini tentang bagaimana lancar berbahasa inggris',1),
(2,'Novel Memory',8,'novel_memory.jpg','Buku ini tentang novel memory',3),
(3,'Pemrograman Javascript',9,'pemrograman_javascript.jpg','Buku ini tentang pembelajaran mengenai pemrograman javascript',2),
(4,'Kumpulan Cerpen',1,'cerpen_kumpulancerpen.jpg','Buku ini berisi kumpulan cerpen yang menarik',5),
(5,'Management Waktu',7,'management_waktu.jpg','Buku ini tentang memanagement waktu kita',4),
(8,'Cerpen Malaikat Jatuhh',3,'604c9e952987d.jpg','Buku tentang malaikat jatuh',5),
(9,'Komik Conan',12,'komik_conan.jpg','Ini adalah komik conan',6);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`) values 
(1,'belajar'),
(2,'pemrograman'),
(3,'novel'),
(4,'management'),
(5,'cerpen'),
(6,'komik');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
