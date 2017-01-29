/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-25 21:27:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_config`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_config`;
CREATE TABLE `yunzhi_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统配置id',
  `title` varchar(30) DEFAULT '' COMMENT '系统配置名称',
  `content` varchar(60) DEFAULT '' COMMENT '系统配置内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_config
-- ----------------------------
