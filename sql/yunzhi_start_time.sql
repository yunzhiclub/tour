/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-01 23:12:49
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
  `date` date NOT NULL COMMENT '时间',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_time
-- ----------------------------
INSERT INTO `yunzhi_start_time` VALUES ('180', '77', '45345', '2017-04-01', '1491059550', '1491059550', '0');
INSERT INTO `yunzhi_start_time` VALUES ('181', '77', '4234', '2017-04-02', '1491059550', '1491059550', '0');
INSERT INTO `yunzhi_start_time` VALUES ('182', '77', '432432', '2017-04-03', '1491059550', '1491059550', '0');
