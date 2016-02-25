/*
Navicat MySQL Data Transfer

Source Server         : Server_xampp
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : coffeeshop

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-02-25 09:43:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_employee`
-- ----------------------------
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

-- ----------------------------
-- Records of tb_employee
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_photo`
-- ----------------------------
DROP TABLE IF EXISTS `tb_photo`;
CREATE TABLE `tb_photo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_photo
-- ----------------------------
INSERT INTO `tb_photo` VALUES ('20', 'bwO1FZHe9yHsNjhhaFJE7z1msIq27b5I4DQpjUtzLUwmJZZC1hekUe8Fq8tZlKxO8i7Fg47kkcXC.jpg', '2016-02-24 15:17:00', '2016-02-24 15:17:00');
INSERT INTO `tb_photo` VALUES ('21', 'S86IrKFfVmdXK8tTUx0dLd8gqP1Fhkd4131221hr871400.jpg', '2016-02-24 15:17:20', '2016-02-24 15:17:20');
INSERT INTO `tb_photo` VALUES ('22', 'KPZIsjU2f5b5FkjK0YLxlU0A3WsnNoN434587_134135849943671_2058005_n.jpg', '2016-02-24 15:18:17', '2016-02-24 15:18:17');
INSERT INTO `tb_photo` VALUES ('27', 'PBpza7ovUCcIRvvjZKdr4cEbee3X1r1Z4DQpjUtzLUwmJZZC1hekUe8Fq8tZlKxO8i7Fg47kkcXC.jpg', '2016-02-24 15:19:35', '2016-02-24 15:19:35');
INSERT INTO `tb_photo` VALUES ('30', 'SBy6VOnjT1c4NDhPmCyYx9KECLbXzNkN4DQpjUtzLUwmJZZC1hekUe8Fq8tZlKxTkoJU3H6XY2n9.jpg', '2016-02-24 15:19:53', '2016-02-24 15:19:53');
INSERT INTO `tb_photo` VALUES ('31', 'fAAn2GhdR52uX1ifE7VIP9ZzZJ6ojMm41.jpg', '2016-02-24 15:20:05', '2016-02-24 15:20:05');
INSERT INTO `tb_photo` VALUES ('34', 'nCWyRqT1kzDeSG0V8layHtihDcvgbvqd4DQpjUtzLUwmJZZC1hekUe8Fq8tZlKxO8i7Fg47kkcXC.jpg', '2016-02-24 15:20:05', '2016-02-24 15:20:05');
INSERT INTO `tb_photo` VALUES ('42', 'aBZjLbEOoQ43ISzWf7hyBvX4z0bRjfMF.jpg', '2016-02-24 17:01:46', '2016-02-24 17:01:46');
INSERT INTO `tb_photo` VALUES ('44', 'GQ5VmxcDAjQRjMSjkvOkAOFXxD7lpUgO.jpg', '2016-02-24 22:44:29', '2016-02-24 22:44:29');
INSERT INTO `tb_photo` VALUES ('45', 'lUP2ujyXSuIWydCAnUIpNC8Uwnypyr5g.jpg', '2016-02-24 22:44:30', '2016-02-24 22:44:30');
INSERT INTO `tb_photo` VALUES ('46', '0x4oBRpA4PSMjOPjuw1GRjDM2a6bYhCa.jpg', '2016-02-24 22:44:30', '2016-02-24 22:44:30');
INSERT INTO `tb_photo` VALUES ('47', 'OqWmSWkB4fMHcX4GDeeLqgx0a32GKZQP.jpg', '2016-02-24 23:31:31', '2016-02-24 23:31:31');

-- ----------------------------
-- Table structure for `tb_product`
-- ----------------------------
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

-- ----------------------------
-- Records of tb_product
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_sale`
-- ----------------------------
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

-- ----------------------------
-- Records of tb_sale
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_shop`
-- ----------------------------
DROP TABLE IF EXISTS `tb_shop`;
CREATE TABLE `tb_shop` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(20) DEFAULT NULL COMMENT 'รหัสร้าน',
  `shop_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อร้าน',
  `shop_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ร้าน',
  `shop_contact` varchar(255) DEFAULT NULL COMMENT 'ติดต่อ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_type`
-- ----------------------------
DROP TABLE IF EXISTS `tb_type`;
CREATE TABLE `tb_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL COMMENT 'ประเภท',
  `active` int(1) DEFAULT '0' COMMENT 'สถานนะ',
  `images` int(3) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_type
-- ----------------------------
INSERT INTO `tb_type` VALUES ('1', 'Coffee', '0', '44', '2016-02-24 23:23:15', '2016-02-24 23:23:15');
INSERT INTO `tb_type` VALUES ('2', 'Bakery', '0', '46', '2016-02-24 23:23:02', '2016-02-24 23:23:02');
INSERT INTO `tb_type` VALUES ('3', 'FastFood', '0', '45', '2016-02-24 23:23:24', '2016-02-24 23:23:24');
INSERT INTO `tb_type` VALUES ('4', 'น้ำผลไม้', '0', '43', '2016-02-24 23:31:18', '2016-02-24 23:31:18');
INSERT INTO `tb_type` VALUES ('5', 'น้ำผลไม้', '0', '47', '2016-02-24 23:32:00', '2016-02-24 23:32:00');
