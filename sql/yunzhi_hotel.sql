/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-13 21:02:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_hotel
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_hotel`;
CREATE TABLE `yunzhi_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '酒店id',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `dress` varchar(40) NOT NULL DEFAULT '' COMMENT '地址',
  `phone` varchar(30) NOT NULL COMMENT '电话',
  `star` tinyint(1) unsigned NOT NULL COMMENT '酒店星级',
  `content` text NOT NULL COMMENT '酒店介绍',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_hotel
-- ----------------------------
INSERT INTO `yunzhi_hotel` VALUES ('1', '洛克酒店', '天津市河西区大润发旁边', '022-122345', '5', '                                    <p>                                    </p><p>这一拥有一流的卫生条件，态度服务，等等等</p>\r\n                                <p><br></p><p></p>\r\n                                <p><br></p>', '0', '0', '1489410001');
