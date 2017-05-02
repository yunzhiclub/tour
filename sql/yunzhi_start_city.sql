/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-02 20:08:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_start_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_city`;
CREATE TABLE `yunzhi_start_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '城市名称',
  `country_id` int(10) NOT NULL COMMENT '国家的id',
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_city
-- ----------------------------
INSERT INTO `yunzhi_start_city` VALUES ('1', '天津', '1', '0', '0', '00000000000');
INSERT INTO `yunzhi_start_city` VALUES ('2', '北京', '2', '0', '0', '00000000000');
INSERT INTO `yunzhi_start_city` VALUES ('5', '上海', '0', '1', '0', '00000000000');
