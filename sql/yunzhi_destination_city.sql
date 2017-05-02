/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-02 20:08:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_destination_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_destination_city`;
CREATE TABLE `yunzhi_destination_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL COMMENT '国家ID',
  `name` char(30) DEFAULT '' COMMENT '目的城市',
  `create_time` int(11) unsigned DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  `is_delete` tinyint(2) unsigned zerofill DEFAULT '00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_destination_city
-- ----------------------------
INSERT INTO `yunzhi_destination_city` VALUES ('1', '3', '巴黎', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('2', '2', '伦敦', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('3', '1', '柏林', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('4', '1', '啊啊', null, '1489235698', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('5', '2', '阿道夫阿斯蒂芬', null, '1489235711', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('6', '1', '是', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('7', '3', '大师傅啊', '1489230764', '1489393582', '01');
INSERT INTO `yunzhi_destination_city` VALUES ('9', '1', 'shahala', '1489401153', '1491984538', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('10', '1', '天津', '1491922288', '1491922288', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('14', '1', '啊哈哈', '1492508339', '1492508344', '01');
