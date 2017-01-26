/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-25 21:28:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_route`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `starting` varchar(18) DEFAULT '' COMMENT '出发地',
  `destination` varchar(18) DEFAULT '' COMMENT '目的地',
  `begintime` int(10) unsigned DEFAULT NULL COMMENT '出发时间',
  `backtime` int(10) unsigned DEFAULT NULL COMMENT '返程时间',
  `hotel_id` int(10) unsigned DEFAULT NULL COMMENT '酒店id',
  `room_type` tinyint(20) unsigned DEFAULT NULL COMMENT '房间类型',
  `description` varchar(255) DEFAULT '' COMMENT '房间描述信息 文本',
  `checkindays` tinyint(30) unsigned DEFAULT NULL COMMENT '入住天数',
  `checkinrooms` tinyint(10) unsigned DEFAULT NULL COMMENT '入住房间数',
  `beginflight_id` int(10) unsigned DEFAULT NULL COMMENT '出发航班id',
  `backflight_id` int(10) unsigned DEFAULT NULL COMMENT '返程航班id',
  `startingprice` int(10) unsigned DEFAULT NULL COMMENT '起价',
  `standardprice` int(10) unsigned DEFAULT NULL COMMENT '标价',
  `price` int(10) unsigned DEFAULT NULL COMMENT '实际价格',
  `slidershow_id` int(10) unsigned DEFAULT NULL COMMENT '幻灯片id',
  `content` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '客服id',
  `deadline` int(10) unsigned DEFAULT NULL COMMENT '到期时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
