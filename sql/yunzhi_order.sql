/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-14 16:08:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_order
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_order`;
CREATE TABLE `yunzhi_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `invite_id` int(10) unsigned NOT NULL COMMENT '邀约id',
  `number` varchar(18) NOT NULL DEFAULT '' COMMENT '订单编号',
  `is_delete` tinyint(2) unsigned zerofill NOT NULL DEFAULT '00' COMMENT '是否删除',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_order
-- ----------------------------
INSERT INTO `yunzhi_order` VALUES ('1', '1', '1', 'D1233211234567', '00', '0', '0');
INSERT INTO `yunzhi_order` VALUES ('2', '2', '2', 'D1233211234568', '00', '0', '0');
INSERT INTO `yunzhi_order` VALUES ('3', '3', '2', 'D1233211234569', '00', '0', '0');
INSERT INTO `yunzhi_order` VALUES ('7', '1', '12', '201704145720599999', '00', '1492157205', '1492157205');
INSERT INTO `yunzhi_order` VALUES ('8', '1', '13', '201704145726799999', '00', '1492157266', '1492157266');
