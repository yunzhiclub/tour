/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-01 23:13:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_home_recommend
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_recommend`;
CREATE TABLE `yunzhi_home_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(10) unsigned NOT NULL,
  `weight` int(10) NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('14', '77', '343342', '1491057701', '1491057671', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('15', '77', '343342', '1491057766', '1491057701', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('16', '77', '4', '1491058272', '1491058258', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('17', '77', '4', '1491058386', '1491058272', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('18', '77', '4', '1491058936', '1491058386', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('19', '77', '4', '1491059061', '1491058936', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('20', '77', '4', '1491059062', '1491059061', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('21', '77', '4', '1491059135', '1491059062', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('22', '77', '4', '1491059550', '1491059135', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('23', '77', '4', '1491059550', '1491059550', '0');
