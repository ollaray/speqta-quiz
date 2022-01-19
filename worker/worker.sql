/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.31 : Database - worker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`worker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `worker`;

/*Table structure for table `url_tbl` */

DROP TABLE IF EXISTS `url_tbl`;

CREATE TABLE `url_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(30) NOT NULL DEFAULT '',
  `response` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `url_tbl` */

insert  into `url_tbl`(`id`,`url`,`status`,`response`) values 
(1,'https://www.google.com/','DONE','0'),
(2,'https://edition.cnn.com/','DONE','0'),
(3,'https://intl.startrek.com/','DONE','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
