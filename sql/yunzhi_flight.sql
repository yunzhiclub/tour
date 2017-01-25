/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-25 21:27:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_flight`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_flight`;
CREATE TABLE `yunzhi_flight` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` varchar(10) DEFAULT '' COMMENT '航班号',
  `type_name` varchar(10) DEFAULT '' COMMENT '仓型',
  `company` varchar(20) DEFAULT NULL COMMENT '航空公司',
  `up_time` int(11) unsigned DEFAULT NULL COMMENT '起飞时间',
  `down_time` int(11) unsigned DEFAULT NULL COMMENT '抵达时间',
  `up_city` varchar(10) DEFAULT NULL COMMENT '出发城市',
  `down_city` varchar(10) DEFAULT NULL COMMENT '到达城市',
  `status` varchar(10) DEFAULT '' COMMENT '状态',
  `price` int(11) unsigned DEFAULT NULL COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_flight
-- ----------------------------
