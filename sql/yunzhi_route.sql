/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-04-21 16:11:12
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
  `actual_price` int(10) unsigned NOT NULL,
  `standard_price` int(10) NOT NULL COMMENT '标价',
  `deadline` int(11) unsigned NOT NULL COMMENT '出发日期——止',
  `content` text NOT NULL COMMENT '详细内容',
  `click` int(11) DEFAULT '0' COMMENT '点击次数',
  `service_phone` varchar(40) DEFAULT '' COMMENT '客服电话',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `start_time` int(11) unsigned NOT NULL COMMENT '开始日期',
  `begin_time` int(11) unsigned NOT NULL COMMENT '出发日期——起',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '法国+瑞士+意大利+德国11日9晚跟团游', '1', '1', '1', '28', '28', '11', '赠送荷兰+库肯霍夫公园+双宫入内+滴滴湖', '10', '4', '7799', '7799', '8000', '20170406', '                                                                                                                                                                                                                                                                                                                                                                                                            <p></p><ul><li>★ 【优质保证】：全程往返优质航空，南进北出，不走回头路</li><li>★ 【深度游览】：罗马，威尼斯，佛罗伦萨的宁静悠远，精心设计</li><li>★ 【精心赠送】：令人魂牵梦萦的库肯霍夫公园，赏荷兰风光</li></ul>', '0', '022-232332', '0', '1491828544', '1491828544', '20160401', '20170402');
INSERT INTO `yunzhi_route` VALUES ('82', '法国+意大利+瑞士10日8晚跟团游', '1', '1', '1', '28', '28', '10', '一价全含+勃朗峰+金色山口车+双宫+双游船', '9', '3', '12699', '12699', '18000', '20170415', '                                                                                                                                                                                    <p></p><ul><li>★ 【春季抢购】全程四人WIFI+可异地按指纹+出签率高</li><li>★ 【行程升级】全程三星-四星酒店+勃朗峰+双宫入内讲解+塞纳河游船</li><li>★ 【法国深度】：威尼斯本岛+威尼斯彩虹岛布尔诺 +黄金大运河</li></ul>                                                                                                                                                <p><br></p>', '0', '022-3242342', '0', '1491827868', '1491827868', '20170408', '20170408');
