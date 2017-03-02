/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-02 21:23:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_invite`;
CREATE TABLE `yunzhi_invite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `bed_id` int(10) DEFAULT NULL,
  `start_id` int(10) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `person_num` int(10) DEFAULT NULL,
  `pay` int(10) DEFAULT NULL,
  `unpay` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ispublic` tinyint(1) DEFAULT NULL,
  `ordertime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_invite
-- ----------------------------
INSERT INTO `yunzhi_invite` VALUES ('1', '1', '1', '1', '1', '1', '4', '1', '1', '1', '1', '1222');
INSERT INTO `yunzhi_invite` VALUES ('2', '1', '1', null, null, null, null, null, null, '1', null, null);
INSERT INTO `yunzhi_invite` VALUES ('3', '2', '1', null, null, null, null, null, null, '0', null, null);
