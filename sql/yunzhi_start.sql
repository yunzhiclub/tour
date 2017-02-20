/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-20 19:59:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_start`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start`;
CREATE TABLE `yunzhi_start` (
  `id` int(10) NOT NULL,
  `name` varchar(40) DEFAULT '' COMMENT '城市名称',
  `country_id` int(10) DEFAULT NULL COMMENT '国家的id',
  `pictureurl` varchar(80) DEFAULT NULL COMMENT '图片url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start
-- ----------------------------
INSERT INTO `yunzhi_start` VALUES ('1', '天津', '1', '127.0.0.1/tour/public');
INSERT INTO `yunzhi_start` VALUES ('2', '北京', '1', '127.0.0.1/tour/public');
