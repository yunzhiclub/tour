/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-06 21:26:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_customer`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_customer`;
CREATE TABLE `yunzhi_customer` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  `nick_name` varchar(20) DEFAULT '' COMMENT '昵称',
  `sex` int(11) unsigned DEFAULT NULL COMMENT '性别',
  `city` varchar(20) DEFAULT '' COMMENT '城市',
  `province` varchar(20) DEFAULT '' COMMENT '省份',
  `country` varchar(20) DEFAULT '' COMMENT '国家',
  `head_img_url` varchar(200) DEFAULT '' COMMENT '头像URL',
  `birthday` int(10) DEFAULT NULL COMMENT '出生日期',
  `phone` int(10) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(40) DEFAULT '',
  `card_img_front_url` varchar(200) DEFAULT '' COMMENT '身份证正面URL',
  `card_img_back_url` varchar(200) DEFAULT '' COMMENT '身份证反面URL',
  `idcard` int(10) DEFAULT NULL,
  PRIMARY KEY (`openid`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_customer
-- ----------------------------
INSERT INTO `yunzhi_customer` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '1', '', '天津', '中国', '20170304\\333b87ff9565d516fa4604542106c6a9e4a6db99.png', null, null, '', '', '', null);
