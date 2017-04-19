/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-17 21:36:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_home_city
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_city`;
CREATE TABLE `yunzhi_home_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `country_id` int(10) unsigned NOT NULL COMMENT '国家ID',
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_city
-- ----------------------------
INSERT INTO `yunzhi_home_city` VALUES ('1', '1', '0', '0', '0');
INSERT INTO `yunzhi_home_city` VALUES ('2', '2', '1', '0', '0');
INSERT INTO `yunzhi_home_city` VALUES ('3', '3', '0', '0', '0');
INSERT INTO `yunzhi_home_city` VALUES ('4', '4', '0', '0', '0');
INSERT INTO `yunzhi_home_city` VALUES ('5', '5', '0', '0', '0');
