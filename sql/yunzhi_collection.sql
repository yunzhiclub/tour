/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-27 16:01:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_collection`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_collection`;
CREATE TABLE `yunzhi_collection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `route_id` int(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1(过期)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_collection
-- ----------------------------
INSERT INTO `yunzhi_collection` VALUES ('1', '1', '2', '0');
INSERT INTO `yunzhi_collection` VALUES ('2', '2', '1', '0');
