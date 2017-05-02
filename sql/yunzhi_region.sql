/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-02 20:08:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_region`;
CREATE TABLE `yunzhi_region` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT '' COMMENT '地区名称',
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(2) unsigned zerofill DEFAULT '00',
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_region
-- ----------------------------
INSERT INTO `yunzhi_region` VALUES ('1', '大洋洲', '0', '00', '1491922423');
INSERT INTO `yunzhi_region` VALUES ('2', '欧洲', '0', '00', '0');
INSERT INTO `yunzhi_region` VALUES ('3', '美洲', '0', '00', '1489217724');
INSERT INTO `yunzhi_region` VALUES ('24', '大洋洲6', '1493725004', '01', '1493725009');
