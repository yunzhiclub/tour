/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-25 18:37:01
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
  `expiration_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('14', '1', '343342', '1491057701', '1491057671', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('15', '1', '343342', '1491057766', '1491057701', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('16', '1', '4', '1491058272', '1491058258', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('17', '1', '4', '1491058386', '1491058272', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('18', '1', '4', '1491058936', '1491058386', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('19', '1', '4', '1491059061', '1491058936', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('20', '1', '4', '1491059062', '1491059061', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('21', '1', '4', '1491059135', '1491059062', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('22', '1', '4', '1491059550', '1491059135', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('23', '1', '4', '1491467419', '1491059550', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('24', '1', '4', '1491828051', '1491467419', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('25', '1', '4', '1491828092', '1491828051', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('26', '1', '4', '1491828093', '1491828092', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('27', '1', '4', '1491828192', '1491828093', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('28', '1', '4', '1491828214', '1491828192', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('29', '1', '4', '1491828336', '1491828214', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('30', '1', '4', '1491828356', '1491828336', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('31', '1', '4', '1491828376', '1491828356', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('32', '1', '4', '1491828404', '1491828376', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('33', '1', '4', '1491828421', '1491828404', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('34', '1', '4', '1491828451', '1491828421', '1', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('35', '1', '4', '1491828451', '1491828451', '0', '0000-00-00');
INSERT INTO `yunzhi_home_recommend` VALUES ('36', '1', '100', '1492435847', '1492435847', '0', '0000-00-00');
