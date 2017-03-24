/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-23 16:57:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_bed`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_bed`;
CREATE TABLE `yunzhi_bed` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invite_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '邀约id',
  `customer_id` int(11) DEFAULT NULL COMMENT '用户id',
  `wechat_pay_id` int(11) DEFAULT NULL COMMENT '微信支付id',
  `sex` int(11) unsigned DEFAULT NULL COMMENT '床上人的性别',
  `old` int(11) unsigned DEFAULT '1' COMMENT '年龄段 0-10岁用1表示 11-20用2表示 以此类比',
  `type` int(11) unsigned DEFAULT NULL COMMENT '用来确定和同旅行的人分配房间所用',
  `money` int(11) unsigned DEFAULT NULL COMMENT '该床位应付金额',
  `create_time` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT NULL COMMENT '更新时间',
  `order_id` int(11) unsigned DEFAULT NULL,
  `number` varchar(18) DEFAULT '' COMMENT '床位编号',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_bed
-- ----------------------------
INSERT INTO `yunzhi_bed` VALUES ('10', '1', '1', null, '1', '0', null, '1000', '1489834128', '1489834128', '1', '123');
INSERT INTO `yunzhi_bed` VALUES ('11', '1', '2', null, '0', '0', null, '1000', '1489834128', '1489834128', '2', '1234');
INSERT INTO `yunzhi_bed` VALUES ('12', '1', '3', null, '1', '0', null, '1000', '1489834128', '1489834128', '3', '1123');
INSERT INTO `yunzhi_bed` VALUES ('13', '1', '4', null, '1', '0', null, '500', '1489834128', '1489834128', '4', '1223');
INSERT INTO `yunzhi_bed` VALUES ('14', '1', '5', null, '1', '0', null, '500', '1489834128', '1489834128', '5', '1233');
INSERT INTO `yunzhi_bed` VALUES ('15', '1', '6', null, '1', '0', null, '1000', '1489834128', '1489834128', '6', '1244');
