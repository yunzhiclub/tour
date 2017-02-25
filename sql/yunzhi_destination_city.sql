/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-24 20:40:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_destination_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_destination_city`;
CREATE TABLE `yunzhi_destination_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL COMMENT '国家ID',
  `city_name` char(30) DEFAULT '' COMMENT '目的城市',
  `picture_url` varchar(60) DEFAULT '' COMMENT '图片URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_destination_city
-- ----------------------------
