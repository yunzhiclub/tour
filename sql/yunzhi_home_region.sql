/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-23 00:51:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_home_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_region`;
CREATE TABLE `yunzhi_home_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `region_id` int(10) unsigned NOT NULL COMMENT '地区id',
  `weight` int(10) NOT NULL,
  `expiration_time` date NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_region
-- ----------------------------
INSERT INTO `yunzhi_home_region` VALUES ('1', '2', '5', '2017-04-07', '1492876123', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('2', '6', '8', '0000-00-00', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('3', '2', '1', '2017-04-06', '1492791120', '1492791120', '0');
INSERT INTO `yunzhi_home_region` VALUES ('4', '1', '6', '2017-04-21', '1492876373', '1492873851', '1');
INSERT INTO `yunzhi_home_region` VALUES ('5', '1', '666', '2017-04-07', '1492879208', '1492879208', '0');
