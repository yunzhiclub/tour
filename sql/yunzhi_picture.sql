/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-20 14:22:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_picture
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture`;
CREATE TABLE `yunzhi_picture` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `path` char(255) NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture
-- ----------------------------
INSERT INTO `yunzhi_picture` VALUES ('142', 'FlPFXG4zFRVpf3daMdxQDhUqvTqw.png', '/tour/public/upload/20170320/c11a851ad3adb230a6ea2fbb708a6c8f.png', '1', '1489989989', '1489989987');
