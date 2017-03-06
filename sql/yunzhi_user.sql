/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-02 21:23:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_user`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_user`;
CREATE TABLE `yunzhi_user` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  `nickname` varchar(20) DEFAULT '' COMMENT '昵称',
  `sex` int(11) unsigned DEFAULT NULL,
  `city` varchar(20) DEFAULT '',
  `province` varchar(20) DEFAULT '',
  `country` varchar(20) DEFAULT '',
  `headimgurl` varchar(200) DEFAULT '',
  `date` int(10) DEFAULT NULL COMMENT '出生日期',
  `phone` int(10) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(40) DEFAULT '',
  `cardimgfonturl` varchar(200) DEFAULT '' COMMENT '身份证正面',
  `cardimgversourl` varchar(200) DEFAULT '' COMMENT '身份证反面',
  `idcard` int(10) DEFAULT NULL,
  PRIMARY KEY (`openid`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_user
-- ----------------------------
INSERT INTO `yunzhi_user` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '1', '', '天津', '中国', 'http://wx.qlogo.cn/mmopen/QNa3GHaSEXJEQgUS2yro9XSXUAWgbia4q89UwsfXT9gz6uYGBM4d1sawbwQIn6wJlJpb7T8LhR6piaCic5r7TLbS8Yib2eI0xb27/0', null, null, '', '', '', null);
