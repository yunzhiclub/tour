/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-09 21:50:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_start_city
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_city`;
CREATE TABLE `yunzhi_start_city` (
  `id` int(10) NOT NULL,
  `name` varchar(40) DEFAULT '' COMMENT '城市名称',
  `country_id` int(10) DEFAULT NULL COMMENT '国家的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_city
-- ----------------------------
INSERT INTO `yunzhi_start_city` VALUES ('1', '天津', '1');
