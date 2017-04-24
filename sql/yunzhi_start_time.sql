/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-21 21:18:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_start_time
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_time`;
CREATE TABLE `yunzhi_start_time` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '出发时间id',
  `route_id` int(10) unsigned NOT NULL COMMENT '路线id',
  `price` int(10) unsigned NOT NULL COMMENT '应付金额',
  `date` int(11) NOT NULL COMMENT '时间',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_time
-- ----------------------------
INSERT INTO `yunzhi_start_time` VALUES ('262', '83', '2', '1492704000', '1492779615', '1492777913', '1');
INSERT INTO `yunzhi_start_time` VALUES ('263', '83', '23', '1492790400', '1492779615', '1492777913', '1');
INSERT INTO `yunzhi_start_time` VALUES ('264', '83', '2', '1492704000', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('265', '83', '23', '1492790400', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('266', '83', '11', '1492876800', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('267', '83', '1', '1492963200', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('268', '82', '23', '1492704000', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('269', '82', '23', '1492790400', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('270', '82', '23', '1492876800', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('271', '82', '2323', '1492963200', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('272', '1', '10000', '1492704000', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('273', '1', '10000', '1492790400', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('274', '1', '11000', '1492876800', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('275', '1', '11000', '1492963200', '1492779823', '1492779823', '0');
