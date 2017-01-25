/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-25 21:28:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_user`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_user`;
CREATE TABLE `yunzhi_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `openid` varchar(28) DEFAULT '' COMMENT '微信openid',
  `username` varchar(30) DEFAULT '' COMMENT '用户名',
  `user_name` varchar(30) DEFAULT NULL COMMENT '用户姓名',
  `role_id` int(10) unsigned DEFAULT NULL COMMENT '用户姓名',
  `phone` tinyint(11) unsigned DEFAULT NULL COMMENT '电话号码',
  `email` varchar(30) DEFAULT '' COMMENT '邮箱',
  `idcardnum` tinyint(18) unsigned DEFAULT NULL COMMENT '身份证号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_user
-- ----------------------------
