/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-09 21:52:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_region
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_region`;
CREATE TABLE `yunzhi_region` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regionname` varchar(40) DEFAULT '' COMMENT '地区名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_region
-- ----------------------------
INSERT INTO `yunzhi_region` VALUES ('1', '亚洲');
INSERT INTO `yunzhi_region` VALUES ('2', '欧洲');
