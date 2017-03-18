/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-13 21:02:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_route
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `name` varchar(40) DEFAULT NULL,
  `start_city_id` int(10) DEFAULT NULL COMMENT '出发城市',
  `destination_city_id` int(10) DEFAULT NULL COMMENT '目的城市',
  `hotel_id` int(10) DEFAULT NULL COMMENT '酒店ID',
  `begin_flight_id` int(10) DEFAULT NULL COMMENT '去时航班id',
  `back_flight_id` int(10) DEFAULT NULL COMMENT '返回航班id',
  `days` int(10) DEFAULT NULL COMMENT '路线总天数',
  `description` varchar(40) DEFAULT '' COMMENT '描述信息',
  `check_in_days` int(10) DEFAULT NULL COMMENT '入住天数',
  `check_in_rooms` int(10) DEFAULT NULL COMMENT '房间数',
  `starting_price` int(10) DEFAULT NULL COMMENT '路线起价',
  `standard_price` int(10) DEFAULT NULL COMMENT '标价',
  `deadline` int(10) DEFAULT NULL COMMENT '到期时间',
  `content` varchar(100) DEFAULT '' COMMENT '详细内容',
  `click` int(100) DEFAULT '0' COMMENT '点击次数',
  `service_phone` int(20) unsigned zerofill DEFAULT '00000000000000000000' COMMENT '客服电话',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `udpate_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', null, '1', '1', '1', '1', '1', '3', '这是一个路线比较简短的描述信息', '3', '3', '9688', '9000', '5', '这个是一个路线的内容的详细描述', '0', '00000000000000000000', '0', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('2', null, '1', '1', '1', '1', '1', '1', '路线的描述信息2', '2', '2', '9655', '9500', '5', '这是路线的详细描述2', '0', '00000000000000000000', '0', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('3', null, '1', '2', null, null, null, null, '', null, null, null, null, null, '', '0', '00000000000000000000', '0', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('4', null, '2', '2', null, null, null, null, '', null, null, null, null, null, '', '0', '00000000000000000000', '0', '0', '0');
