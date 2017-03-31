/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-20 16:36:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_country`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_country`;
CREATE TABLE `yunzhi_country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `region_id` int(10) NOT NULL COMMENT '地区id',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '国家名称',
  `picture_url` varchar(80) NOT NULL DEFAULT '' COMMENT '图片URL',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1为删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_country
-- ----------------------------
INSERT INTO `yunzhi_country` VALUES ('1', '1', '中国', '127.0.0.1/public/', '0', '1489463530', '0');
INSERT INTO `yunzhi_country` VALUES ('2', '2', '英国', '127.0.0.1/public/', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('3', '3', '美国', '127.0.0.1/public/', '0', '1489495307', '0');
INSERT INTO `yunzhi_country` VALUES ('4', '4', '斐济', '', '1489412789', '1489476824', '0');
INSERT INTO `yunzhi_country` VALUES ('6', '6', '澳大利亚', '', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('7', '3', '墨西哥', '', '1489495709', '1489495709', '0');
INSERT INTO `yunzhi_country` VALUES ('8', '6', 'shahala', '', '1489997911', '1489998611', '1');
