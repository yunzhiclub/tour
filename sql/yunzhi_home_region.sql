/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-17 21:36:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_home_region
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_region`;
CREATE TABLE `yunzhi_home_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `region_id` int(10) unsigned NOT NULL COMMENT '地区id',
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_region
-- ----------------------------
INSERT INTO `yunzhi_home_region` VALUES ('1', '1', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('2', '2', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('3', '3', '1', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('4', '4', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('5', '5', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('6', '6', '0', '0', '0');
