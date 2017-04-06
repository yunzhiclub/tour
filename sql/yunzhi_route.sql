/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-01 23:13:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yunzhi_route
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `name` varchar(40) NOT NULL,
  `start_city_id` int(10) NOT NULL COMMENT '出发城市',
  `destination_city_id` int(10) NOT NULL COMMENT '目的城市',
  `hotel_id` int(10) NOT NULL COMMENT '酒店ID',
  `begin_flight_id` int(10) NOT NULL COMMENT '去时航班id',
  `back_flight_id` int(10) NOT NULL COMMENT '返回航班id',
  `days` int(10) NOT NULL COMMENT '路线总天数',
  `description` varchar(40) NOT NULL DEFAULT '' COMMENT '描述信息',
  `check_in_days` int(10) NOT NULL COMMENT '入住天数',
  `check_in_rooms` int(10) NOT NULL COMMENT '房间数',
  `starting_price` int(10) NOT NULL COMMENT '路线起价',
  `standard_price` int(10) NOT NULL COMMENT '标价',
  `deadline` date NOT NULL COMMENT '出发日期——止',
  `content` text NOT NULL COMMENT '详细内容',
  `click` int(100) DEFAULT '0' COMMENT '点击次数',
  `service_phone` int(20) unsigned zerofill DEFAULT '00000000000000000000' COMMENT '客服电话',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `start_time` date NOT NULL COMMENT '开始日期',
  `begin_time` date NOT NULL COMMENT '出发日期——起',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('77', '欧洲七日游', '2', '1', '3', '28', '28', '3', '这是一个测试', '3', '2', '324324', '453454', '2017-04-03', '                                    <p>这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试</p>                                    <p>这是一个测试</p><p>这是一个测试这是一个测试这是一个测试<br></p><p>这是一个测试这是一个测试<br></p><p><br></p>                                    ', '0', '00000000000000000022', '0', '1491059550', '1491059550', '2016-04-01', '2017-04-01');
INSERT INTO `yunzhi_route` VALUES ('80', '美国七日游', '1', '1', '1', '28', '28', '5', '这是第二个测试', '3', '3', '3', '3434', '2017-04-01', '                                    <p>这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试</p>                                    <p>这是一个测试</p><p>这是一个测试</p><p>这是一个测试</p><p>这是一个测试这是一个测试这是一个测试<br></p><p>这是一个测试这是一个测试这是一个测试<br></p><p>这是一个测试</p><p><br></p>', '0', '00000000000000000022', '1', '1491059113', '1491059445', '2017-04-01', '2017-04-01');
