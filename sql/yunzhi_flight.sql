/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-09 09:23:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_flight
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_flight`;
CREATE TABLE `yunzhi_flight` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` varchar(10) DEFAULT '' COMMENT '航班号',
  `type_name` tinyint(2) unsigned NOT NULL COMMENT '0，头等舱，1，公务舱，2，经济舱',
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_flight
-- ----------------------------
INSERT INTO `yunzhi_flight` VALUES ('28', 'AF001', '0', '中国航空', '02:44:00', '04:06:00', '2', '1', '9000', '1488957300', '1489018193', '00');
INSERT INTO `yunzhi_flight` VALUES ('29', 'tes', '1', 'ff', '01:06:00', '23:06:00', '1', '1', '333', '1489018860', '1489019657', '01');
INSERT INTO `yunzhi_flight` VALUES ('30', 'A31111', '1', '中国航空', '05:05:00', '05:05:00', '1', '1', '8000', '1489019628', '1489019628', '00');
