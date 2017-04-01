/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-01 23:13:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_chosen
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_chosen`;
CREATE TABLE `yunzhi_chosen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '精选编号',
  `route_id` int(10) unsigned NOT NULL COMMENT '路线id',
  `weight` int(11) NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_chosen
-- ----------------------------
INSERT INTO `yunzhi_chosen` VALUES ('47', '77', '343', '1491057766', '1491057701', '1');
INSERT INTO `yunzhi_chosen` VALUES ('48', '80', '4', '1491058364', '1491058230', '1');
INSERT INTO `yunzhi_chosen` VALUES ('49', '80', '4', '1491058408', '1491058364', '1');
INSERT INTO `yunzhi_chosen` VALUES ('50', '80', '4', '1491058635', '1491058408', '1');
INSERT INTO `yunzhi_chosen` VALUES ('51', '80', '4', '1491058887', '1491058635', '1');
INSERT INTO `yunzhi_chosen` VALUES ('52', '80', '4', '1491059086', '1491058887', '1');
INSERT INTO `yunzhi_chosen` VALUES ('53', '80', '4', '1491059113', '1491059086', '1');
INSERT INTO `yunzhi_chosen` VALUES ('54', '80', '4', '1491059445', '1491059113', '1');
