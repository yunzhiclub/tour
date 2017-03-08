/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-08 19:16:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_flight
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_flight`;
CREATE TABLE `yunzhi_flight` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` varchar(10) DEFAULT '' COMMENT '航班号',
  `type_name` varchar(10) DEFAULT '' COMMENT '仓型',
  `company` varchar(20) DEFAULT NULL COMMENT '航空公司',
  `up_time` time DEFAULT NULL COMMENT '起飞时间',
  `down_time` time DEFAULT NULL COMMENT '抵达时间',
  `up_city_id` int(11) DEFAULT NULL COMMENT '出发城市',
  `down_city_id` int(11) DEFAULT NULL COMMENT '到达城市',
  `price` int(11) unsigned DEFAULT NULL COMMENT '价格',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_flight
-- ----------------------------
INSERT INTO `yunzhi_flight` VALUES ('28', 'AF001', '经济舱', '中国航空', '02:44:00', '04:06:00', '2', '1', '9000', '1488957300', '1488957300', '00');
