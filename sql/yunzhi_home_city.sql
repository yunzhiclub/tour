/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-23 00:51:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_home_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_city`;
CREATE TABLE `yunzhi_home_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `country_id` int(10) unsigned NOT NULL COMMENT '国家ID',
  `weight` int(1) NOT NULL,
  `expiration_time` date NOT NULL COMMENT '过期时间',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `destination_city_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_city
-- ----------------------------
INSERT INTO `yunzhi_home_city` VALUES ('1', '1', '6', '2017-04-15', '1492878698', '15', '0', '2');
INSERT INTO `yunzhi_home_city` VALUES ('2', '1', '2', '2017-03-15', '1492664408', '0', '1', '2');
INSERT INTO `yunzhi_home_city` VALUES ('3', '0', '16', '2017-04-01', '1492661131', '1492659531', '0', '1');
INSERT INTO `yunzhi_home_city` VALUES ('4', '0', '9', '2017-03-23', '1492782133', '1492664421', '1', '7');
INSERT INTO `yunzhi_home_city` VALUES ('5', '0', '6', '2017-04-06', '1492878889', '1492878889', '0', '1');
