/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-18 19:12:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_bed`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_bed`;
CREATE TABLE `yunzhi_bed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invite_id` int(11) unsigned zerofill NOT NULL DEFAULT '00000000000' COMMENT '邀约id',
  `customer_id` int(11) DEFAULT NULL COMMENT '用户id',
  `wechat_pay_id` int(11) DEFAULT NULL COMMENT '微信支付id',
  `sex` int(11) unsigned DEFAULT NULL COMMENT '床上人的性别',
  `old` int(11) unsigned DEFAULT '1' COMMENT '年龄段 0-10岁用1表示 11-20用2表示 以此类比',
  `type` int(11) unsigned DEFAULT NULL COMMENT '用来确定和同旅行的人分配房间所用',
  `money` int(11) unsigned DEFAULT NULL COMMENT '该床位应付金额',
  `create_time` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`,`invite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_bed
-- ----------------------------
INSERT INTO `yunzhi_bed` VALUES ('10', '00000000018', '1', null, '1', '0', null, '1000', '1489834128', '1489834128');
INSERT INTO `yunzhi_bed` VALUES ('11', '00000000018', null, null, '0', '0', null, '1000', '1489834128', '1489834128');
INSERT INTO `yunzhi_bed` VALUES ('12', '00000000018', null, null, '1', '0', null, '1000', '1489834128', '1489834128');
INSERT INTO `yunzhi_bed` VALUES ('13', '00000000018', null, null, '1', '0', null, '500', '1489834128', '1489834128');
INSERT INTO `yunzhi_bed` VALUES ('14', '00000000018', null, null, '1', '0', null, '500', '1489834128', '1489834128');
INSERT INTO `yunzhi_bed` VALUES ('15', '00000000018', null, null, '1', '0', null, '1000', '1489834128', '1489834128');
