/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-09 21:53:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_hotel
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_hotel`;
CREATE TABLE `yunzhi_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '酒店id',
  `title` varchar(20) DEFAULT '' COMMENT '名称',
  `dress` varchar(30) DEFAULT '' COMMENT '地址',
  `phone` tinyint(11) unsigned DEFAULT NULL COMMENT '电话',
  `star` smallint(10) unsigned DEFAULT NULL COMMENT '酒店星级',
  `content` char(255) DEFAULT '' COMMENT '酒店介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_hotel
-- ----------------------------
