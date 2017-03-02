/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-25 11:48:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_home_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_city`;
CREATE TABLE `yunzhi_home_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `country_id` int(10) unsigned DEFAULT NULL COMMENT '国家ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_city
-- ----------------------------
