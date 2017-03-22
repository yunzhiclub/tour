/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-20 23:41:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_picture_destination_city
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture_destination_city`;
CREATE TABLE `yunzhi_picture_destination_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `destination_city_id` int(11) unsigned NOT NULL,
  `picture_id` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned zerofill NOT NULL,
  `create_time` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_destination_city
-- ----------------------------
INSERT INTO `yunzhi_picture_destination_city` VALUES ('1', '1', '1', '0', '00000000001', '00000000001');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('2', '21', '192', '0', '01490017760', '01490017760');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('3', '24', '193', '0', '01490018276', '01490018276');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('4', '24', '194', '0', '01490018276', '01490018276');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('5', '45', '250', '0', '01490024479', '01490024479');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('6', '45', '251', '0', '01490024479', '01490024479');
