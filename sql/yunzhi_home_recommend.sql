/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-23 00:50:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_home_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_recommend`;
CREATE TABLE `yunzhi_home_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(10) unsigned NOT NULL,
  `weight` int(10) NOT NULL,
  `expiration_time` date DEFAULT NULL COMMENT '过期时间',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('1', '2', '66', '2017-04-22', '1492876762', '1491057671', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('2', '1', '343342', '0000-00-00', '1492605684', '1491057701', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('3', '1', '4', '0000-00-00', '1492605663', '1491058258', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('17', '1', '4', '0000-00-00', '1491058386', '1491058272', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('18', '1', '4', '0000-00-00', '1491058936', '1491058386', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('19', '1', '4', '0000-00-00', '1491059061', '1491058936', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('20', '1', '4', '0000-00-00', '1491059062', '1491059061', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('21', '1', '4', '0000-00-00', '1491059135', '1491059062', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('22', '1', '4', '0000-00-00', '1491059550', '1491059135', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('23', '1', '4', '0000-00-00', '1491467419', '1491059550', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('24', '1', '4', '0000-00-00', '1491831279', '1491467419', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('25', '1', '4', '0000-00-00', '1491831279', '1491831279', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('26', '87', '2', '0000-00-00', '1491831923', '1491831755', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('27', '87', '2', '0000-00-00', '1491831923', '1491831923', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('28', '0', '6', '2017-03-31', '1492778503', '1492601020', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('29', '1', '1', '2017-04-05', '1492601130', '1492601130', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('30', '1', '1', '2017-04-05', '1492601137', '1492601137', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('31', '87', '5', '2017-04-18', '1492601155', '1492601155', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('32', '87', '9', '2017-04-29', '1492601179', '1492601179', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('33', '1', '9', '2017-04-13', '1492601206', '1492601206', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('34', '1', '0', '2017-04-07', '1492601231', '1492601231', '0');
