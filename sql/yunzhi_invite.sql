/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-22 16:13:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_invite`;
CREATE TABLE `yunzhi_invite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(10) unsigned NOT NULL COMMENT '路线id',
  `customer_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `set_out_time` int(10) NOT NULL COMMENT '出发时间',
  `back_time` int(11) DEFAULT NULL COMMENT '返程时间',
  `number` varchar(30) DEFAULT NULL COMMENT '订单号',
  `person_num` int(10) unsigned DEFAULT '0' COMMENT '邀约人数',
  `pay_num` int(10) unsigned DEFAULT '0' COMMENT '支付人数',
  `unpay_num` int(10) unsigned DEFAULT '0' COMMENT '未支付人数',
  `status` tinyint(10) unsigned DEFAULT '0' COMMENT '0状态是邀约未完成1完成',
  `is_public` tinyint(10) unsigned DEFAULT '1' COMMENT '0是不公开1是公开',
  `create_time` int(11) DEFAULT '0' COMMENT '订单生成时间',
  `deadline` int(11) DEFAULT '0' COMMENT '到期时间小与路线的结束时间',
  `update_time` int(11) DEFAULT NULL COMMENT '订单更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_invite
-- ----------------------------
INSERT INTO `yunzhi_invite` VALUES ('1', '1', '1', '1', null, 'Y123121', '4', '5', '0', '1', '1', '1222', '2147483647', '1492695281');
INSERT INTO `yunzhi_invite` VALUES ('2', '1', '1', '0', null, 'Y123122', '0', '0', '0', '1', '0', '0', '2147483647', '0');
INSERT INTO `yunzhi_invite` VALUES ('3', '2', '1', '0', null, 'Y123123', '0', '0', '0', '0', '0', '0', '2147483647', '0');
INSERT INTO `yunzhi_invite` VALUES ('4', '3', '1', '1', null, 'Y123124', '0', '0', '0', '0', '1', '1489831509', '234343234', '1489831509');
INSERT INTO `yunzhi_invite` VALUES ('5', '1', '1', '0', null, '', '0', '0', '0', '0', '1', '1492501376', '2147483647', '1492501376');
INSERT INTO `yunzhi_invite` VALUES ('6', '3', '1', '0', null, null, '6', '1', '5', '0', '0', '1492673104', '2147483647', '1492673104');
INSERT INTO `yunzhi_invite` VALUES ('7', '3', '1', '0', null, 'y20170420743721', '6', '1', '5', '0', '1', '1492674372', '2147483647', '1492674372');
INSERT INTO `yunzhi_invite` VALUES ('8', '3', '1', '0', null, 'y20170420781861', '6', '1', '5', '0', '1', '1492678186', '2147483647', '1492678186');
INSERT INTO `yunzhi_invite` VALUES ('9', '3', '1', '0', null, 'y20170420931381', '6', '1', '5', '0', '1', '1492693138', '2147483647', '1492693138');
