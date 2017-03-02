/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-02 21:23:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_route`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `start_city_id` int(10) DEFAULT NULL COMMENT '出发城市',
  `destination_city_id` int(10) DEFAULT NULL COMMENT '目的城市',
  `hotel_id` int(10) DEFAULT NULL COMMENT '酒店ID',
  `beginflight_id` int(10) DEFAULT NULL COMMENT '去时航班',
  `backflight_id` int(10) DEFAULT NULL COMMENT '返回航班',
  `begintime` int(10) DEFAULT NULL COMMENT '开始时间',
  `day` int(10) DEFAULT NULL COMMENT '天数',
  `description` varchar(40) DEFAULT '' COMMENT '描述信息',
  `checkindays` int(10) DEFAULT NULL COMMENT '入住天数',
  `checkinrooms` int(10) DEFAULT NULL COMMENT '房间数',
  `startingprice` int(10) DEFAULT NULL COMMENT '起价',
  `price` int(10) DEFAULT NULL COMMENT '实际价格',
  `slidershow` int(10) DEFAULT NULL COMMENT '幻灯片',
  `deadline` int(10) DEFAULT NULL COMMENT '到期时间',
  `content` varchar(100) DEFAULT '' COMMENT '详细内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '1', '1', '1', '1', '1', '1', '3', '这是一个路线比较简短的描述信息', '3', '3', '9688', '9000', '1', '5', '这个是一个路线的内容的详细描述');
INSERT INTO `yunzhi_route` VALUES ('2', '1', '1', '1', '1', '1', '1', '1', '路线的描述信息2', '2', '2', '9655', '9500', '1', '5', '这是路线的详细描述2');
INSERT INTO `yunzhi_route` VALUES ('3', '1', '2', null, null, null, null, null, '', null, null, null, null, null, null, '');
INSERT INTO `yunzhi_route` VALUES ('4', '2', '2', null, null, null, null, null, '', null, null, null, null, null, null, '');
