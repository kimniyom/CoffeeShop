/*
SQLyog Ultimate v9.02 
MySQL - 5.6.21 : Database - coffeeshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`coffeeshop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `coffeeshop`;

/*Table structure for table `tb_employee` */

DROP TABLE IF EXISTS `tb_employee`;

CREATE TABLE `tb_employee` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 = พนักงาน 1 = เจ้าของร้าน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_employee` */

/*Table structure for table `tb_photo` */

DROP TABLE IF EXISTS `tb_photo`;

CREATE TABLE `tb_photo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `tb_photo` */

insert  into `tb_photo`(`id`,`image_name`,`updated_at`,`created_at`) values (42,'aBZjLbEOoQ43ISzWf7hyBvX4z0bRjfMF.jpg','2016-02-24 17:01:46','2016-02-24 17:01:46'),(44,'GQ5VmxcDAjQRjMSjkvOkAOFXxD7lpUgO.jpg','2016-02-24 22:44:29','2016-02-24 22:44:29'),(45,'lUP2ujyXSuIWydCAnUIpNC8Uwnypyr5g.jpg','2016-02-24 22:44:30','2016-02-24 22:44:30'),(46,'0x4oBRpA4PSMjOPjuw1GRjDM2a6bYhCa.jpg','2016-02-24 22:44:30','2016-02-24 22:44:30'),(47,'OqWmSWkB4fMHcX4GDeeLqgx0a32GKZQP.jpg','2016-02-24 23:31:31','2016-02-24 23:31:31');

/*Table structure for table `tb_product` */

DROP TABLE IF EXISTS `tb_product`;

CREATE TABLE `tb_product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) DEFAULT NULL COMMENT 'สินค้า',
  `price` int(3) DEFAULT '0' COMMENT 'ราคา',
  `create_date` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  `update_date` date DEFAULT NULL COMMENT 'วันที่แก้ไข',
  `type` int(5) DEFAULT NULL COMMENT 'ประเภทสินค้า',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `type` FOREIGN KEY (`type`) REFERENCES `tb_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_product` */

/*Table structure for table `tb_sale` */

DROP TABLE IF EXISTS `tb_sale`;

CREATE TABLE `tb_sale` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product` int(5) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `employee` int(3) DEFAULT NULL COMMENT 'รหัสพนักงานขาย',
  `shop_id` varchar(20) DEFAULT NULL COMMENT 'รหัสร้าน',
  `date_sale` date DEFAULT NULL COMMENT 'วันที่ขาย',
  PRIMARY KEY (`id`),
  KEY `product` (`product`) USING BTREE,
  KEY `employee` (`employee`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_sale` */

/*Table structure for table `tb_shop` */

DROP TABLE IF EXISTS `tb_shop`;

CREATE TABLE `tb_shop` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(20) DEFAULT NULL COMMENT 'รหัสร้าน',
  `shop_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อร้าน',
  `shop_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ร้าน',
  `shop_contact` varchar(255) DEFAULT NULL COMMENT 'ติดต่อ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_shop` */

/*Table structure for table `tb_type` */

DROP TABLE IF EXISTS `tb_type`;

CREATE TABLE `tb_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL COMMENT 'ประเภท',
  `active` int(1) DEFAULT '0' COMMENT 'สถานนะ',
  `images` int(3) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_type` */

insert  into `tb_type`(`id`,`type_name`,`active`,`images`,`updated_at`,`created_at`) values (1,'Coffee',0,44,'2016-02-24 23:23:15','2016-02-24 23:23:15'),(2,'Bakery',0,46,'2016-02-24 23:23:02','2016-02-24 23:23:02'),(3,'FastFood',0,45,'2016-02-24 23:23:24','2016-02-24 23:23:24'),(4,'น้ำผลไม้',0,43,'2016-02-24 23:31:18','2016-02-24 23:31:18'),(5,'น้ำผลไม้',0,47,'2016-02-24 23:32:00','2016-02-24 23:32:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
