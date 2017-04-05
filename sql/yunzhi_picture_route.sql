/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-02 20:10:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_picture_route
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture_route`;
CREATE TABLE `yunzhi_picture_route` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(11) unsigned NOT NULL,
  `picture_id` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_route
-- ----------------------------
INSERT INTO `yunzhi_picture_route` VALUES ('1', '82', '144', '0', '1491100773', '1491100773');
INSERT INTO `yunzhi_picture_route` VALUES ('2', '82', '145', '0', '1491100773', '1491100773');
INSERT INTO `yunzhi_picture_route` VALUES ('3', '82', '146', '0', '1491102020', '1491102020');
INSERT INTO `yunzhi_picture_route` VALUES ('4', '82', '149', '0', '1491134041', '1491134041');
