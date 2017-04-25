/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-25 18:37:09
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
  `weight` int(11) NOT NULL,
  `expiration_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_region
-- ----------------------------
INSERT INTO `yunzhi_home_region` VALUES ('1', '1', '0', '1493116157', '0', '0', '2017-04-25');
INSERT INTO `yunzhi_home_region` VALUES ('2', '4', '0', '1493116256', '0', '0', '2017-04-25');
INSERT INTO `yunzhi_home_region` VALUES ('3', '3', '1', '0', '0', '0', '0000-00-00');
INSERT INTO `yunzhi_home_region` VALUES ('4', '1', '0', '1493116176', '0', '0', '2017-04-25');
INSERT INTO `yunzhi_home_region` VALUES ('5', '1', '0', '1493116186', '0', '0', '2017-04-04');
INSERT INTO `yunzhi_home_region` VALUES ('6', '2', '0', '0', '0', '0', '0000-00-00');
