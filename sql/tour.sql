/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-08 09:12:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yunzhi_bed`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_bed`;
CREATE TABLE `yunzhi_bed` (
  `id` int(11) NOT NULL DEFAULT '0',
  `invite_id` int(11) DEFAULT '0' COMMENT '邀约id',
  `customer_id` int(11) DEFAULT NULL COMMENT '用户id',
  `wechat_pay_id` int(11) DEFAULT NULL COMMENT '微信支付id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_bed
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_chosen`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_chosen`;
CREATE TABLE `yunzhi_chosen` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '精选编号',
  `route_id` int(10) DEFAULT NULL COMMENT '路线id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_chosen
-- ----------------------------
INSERT INTO `yunzhi_chosen` VALUES ('1', '1');
INSERT INTO `yunzhi_chosen` VALUES ('2', '2');

-- ----------------------------
-- Table structure for `yunzhi_collection`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_collection`;
CREATE TABLE `yunzhi_collection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `route_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_collection
-- ----------------------------
INSERT INTO `yunzhi_collection` VALUES ('1', '1', '2');

-- ----------------------------
-- Table structure for `yunzhi_config`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_config`;
CREATE TABLE `yunzhi_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统配置id',
  `title` varchar(30) DEFAULT '' COMMENT '系统配置名称',
  `content` varchar(60) DEFAULT '' COMMENT '系统配置内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_config
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_country`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_country`;
CREATE TABLE `yunzhi_country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `region_id` int(10) DEFAULT NULL COMMENT '地区id',
  `name` varchar(40) DEFAULT '' COMMENT '国家名称',
  `picture_url` varchar(80) DEFAULT '' COMMENT '图片URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_country
-- ----------------------------
INSERT INTO `yunzhi_country` VALUES ('1', '1', '德国', '127.0.0.1/public/');
INSERT INTO `yunzhi_country` VALUES ('2', '2', '英国', '127.0.0.1/public/');
INSERT INTO `yunzhi_country` VALUES ('3', '2', '意大利', '127.0.0.1/public/');

-- ----------------------------
-- Table structure for `yunzhi_customer`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_customer`;
CREATE TABLE `yunzhi_customer` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  `nick_name` varchar(20) DEFAULT '' COMMENT '昵称',
  `sex` int(11) unsigned DEFAULT NULL COMMENT '性别',
  `city` varchar(20) DEFAULT '' COMMENT '城市',
  `province` varchar(20) DEFAULT '' COMMENT '省份',
  `country` varchar(20) DEFAULT '' COMMENT '国家',
  `head_img_url` varchar(200) DEFAULT '' COMMENT '头像URL',
  `birthday` int(10) DEFAULT NULL COMMENT '出生日期',
  `phone` int(10) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(40) DEFAULT '',
  `card_img_front_url` varchar(200) DEFAULT '' COMMENT '身份证正面URL',
  `card_img_back_url` varchar(200) DEFAULT '' COMMENT '身份证反面URL',
  `idcard` int(10) DEFAULT NULL,
  PRIMARY KEY (`openid`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_customer
-- ----------------------------
INSERT INTO `yunzhi_customer` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '1', '', '天津', '中国', '20170304\\333b87ff9565d516fa4604542106c6a9e4a6db99.png', null, null, '', '', '', null);

-- ----------------------------
-- Table structure for `yunzhi_destination_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_destination_city`;
CREATE TABLE `yunzhi_destination_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL COMMENT '国家ID',
  `city_name` char(30) DEFAULT '' COMMENT '目的城市',
  `picture_url` varchar(60) DEFAULT '' COMMENT '图片URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_destination_city
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_evaluate`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_evaluate`;
CREATE TABLE `yunzhi_evaluate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `route_id` int(10) DEFAULT NULL,
  `star` int(10) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_evaluate
-- ----------------------------
INSERT INTO `yunzhi_evaluate` VALUES ('1', '1', '1', '5', '这是评价1');
INSERT INTO `yunzhi_evaluate` VALUES ('2', '1', '2', '4', '这是评价2');

-- ----------------------------
-- Table structure for `yunzhi_flight`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_flight`;
CREATE TABLE `yunzhi_flight` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` varchar(10) DEFAULT '' COMMENT '航班号',
  `type_name` varchar(10) DEFAULT '' COMMENT '仓型',
  `company` varchar(20) DEFAULT NULL COMMENT '航空公司',
  `up_time` date DEFAULT NULL COMMENT '起飞时间',
  `down_time` date DEFAULT NULL COMMENT '抵达时间',
  `up_city_id` int(11) DEFAULT NULL COMMENT '出发城市',
  `down_city_id` int(11) DEFAULT NULL COMMENT '到达城市',
  `price` int(11) unsigned DEFAULT NULL COMMENT '价格',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_flight
-- ----------------------------
INSERT INTO `yunzhi_flight` VALUES ('1', 'A23223', '经济舱', '中国航空 ', '2017-03-07', '2017-03-07', '2', '2', '3000', '3434', '38748346', '00');
INSERT INTO `yunzhi_flight` VALUES ('2', 'A31111', '二等舱', '中国航空', '2017-03-08', '2017-03-09', '1', '1', '800', '2323', '1488894736', '00');
INSERT INTO `yunzhi_flight` VALUES ('26', 'A4354354', '经济舱', '中国航空', '2017-03-07', '2017-03-07', '1', '1', '9000', '1488893920', '1488895426', '01');

-- ----------------------------
-- Table structure for `yunzhi_home_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_city`;
CREATE TABLE `yunzhi_home_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `country_id` int(10) unsigned DEFAULT NULL COMMENT '国家ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_city
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_home_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_recommend`;
CREATE TABLE `yunzhi_home_recommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) DEFAULT NULL,
  `expiretime` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('1', '1', '1', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('2', '1', '1', '2');
INSERT INTO `yunzhi_home_recommend` VALUES ('3', '2', '2', '3');

-- ----------------------------
-- Table structure for `yunzhi_home_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_region`;
CREATE TABLE `yunzhi_home_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `region_id` int(10) unsigned DEFAULT NULL COMMENT '地区id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_region
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_hotel`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_hotel`;
CREATE TABLE `yunzhi_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '酒店id',
  `title` varchar(20) DEFAULT '' COMMENT '名称',
  `dress` varchar(30) DEFAULT '' COMMENT '地址',
  `phone` tinyint(11) unsigned DEFAULT NULL COMMENT '电话',
  `star` smallint(10) unsigned DEFAULT NULL COMMENT '酒店星级',
  `img_url` tinyint(30) DEFAULT NULL COMMENT '图片url',
  `content` char(255) DEFAULT '' COMMENT '酒店介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_hotel
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_invite`;
CREATE TABLE `yunzhi_invite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) NOT NULL COMMENT '路线id',
  `customer_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `start_time_id` int(10) NOT NULL COMMENT '出发时间id',
  `number` int(10) NOT NULL COMMENT '订单号',
  `person_num` int(10) NOT NULL DEFAULT '0' COMMENT '邀约人数',
  `pay_num` int(10) NOT NULL DEFAULT '0' COMMENT '支付人数',
  `unpay_num` int(10) NOT NULL DEFAULT '0' COMMENT '未支付人数',
  `status` tinyint(10) NOT NULL DEFAULT '0' COMMENT '0状态是邀约未完成1完成',
  `is_public` tinyint(10) NOT NULL DEFAULT '1' COMMENT '0是不公开1是公开',
  `create_time` int(40) NOT NULL DEFAULT '0' COMMENT '订单生成时间',
  `deadline` int(40) NOT NULL DEFAULT '0' COMMENT '到期时间小与路线的结束时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_invite
-- ----------------------------
INSERT INTO `yunzhi_invite` VALUES ('1', '1', '1', '1', '1', '4', '1', '1', '1', '1', '1222', '0');
INSERT INTO `yunzhi_invite` VALUES ('2', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0');
INSERT INTO `yunzhi_invite` VALUES ('3', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `yunzhi_order`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_order`;
CREATE TABLE `yunzhi_order` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `invite_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_order
-- ----------------------------
INSERT INTO `yunzhi_order` VALUES ('1', '1', '1');
INSERT INTO `yunzhi_order` VALUES ('2', '1', '3');
INSERT INTO `yunzhi_order` VALUES ('3', '2', '2');

-- ----------------------------
-- Table structure for `yunzhi_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_region`;
CREATE TABLE `yunzhi_region` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regionname` varchar(40) DEFAULT '' COMMENT '地区名称',
  `pictureurl` varchar(80) DEFAULT '' COMMENT '图片url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_region
-- ----------------------------
INSERT INTO `yunzhi_region` VALUES ('1', '亚洲', '127.0.0.1/public');
INSERT INTO `yunzhi_region` VALUES ('2', '欧洲', '127.0.0.1/public');

-- ----------------------------
-- Table structure for `yunzhi_role`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_role`;
CREATE TABLE `yunzhi_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `type` varchar(30) DEFAULT '' COMMENT '角色类型',
  `title` varchar(30) DEFAULT '' COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_role
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_room`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_room`;
CREATE TABLE `yunzhi_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '房间id',
  `type` tinyint(20) unsigned DEFAULT NULL COMMENT '房间类型',
  `title` varchar(20) DEFAULT '' COMMENT '房型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_room
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_route`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `start_city_id` int(10) DEFAULT NULL COMMENT '出发城市',
  `destination_city_id` int(10) DEFAULT NULL COMMENT '目的城市',
  `hotel_id` int(10) DEFAULT NULL COMMENT '酒店ID',
  `begin_flight_id` int(10) DEFAULT NULL COMMENT '去时航班id',
  `back_flight_id` int(10) DEFAULT NULL COMMENT '返回航班id',
  `days` int(10) DEFAULT NULL COMMENT '路线总天数',
  `description` varchar(40) DEFAULT '' COMMENT '描述信息',
  `check_in_days` int(10) DEFAULT NULL COMMENT '入住天数',
  `check_in_rooms` int(10) DEFAULT NULL COMMENT '房间数',
  `starting_price` int(10) DEFAULT NULL COMMENT '路线起价',
  `standard_price` int(10) DEFAULT NULL COMMENT '标价',
  `picture_id` int(10) DEFAULT NULL COMMENT '幻灯片id',
  `deadline` int(10) DEFAULT NULL COMMENT '到期时间',
  `content` varchar(100) DEFAULT '' COMMENT '详细内容',
  `click` int(100) DEFAULT '0' COMMENT '点击次数',
  `service_phone` int(20) DEFAULT '0' COMMENT '客服电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '1', '1', '1', '1', '1', '3', '这是一个路线比较简短的描述信息', '3', '3', '9688', '9000', '1', '5', '这个是一个路线的内容的详细描述', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('2', '1', '1', '1', '1', '1', '1', '路线的描述信息2', '2', '2', '9655', '9500', '1', '5', '这是路线的详细描述2', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('3', '1', '2', null, null, null, null, '', null, null, null, null, null, null, '', '0', '0');
INSERT INTO `yunzhi_route` VALUES ('4', '2', '2', null, null, null, null, '', null, null, null, null, null, null, '', '0', '0');

-- ----------------------------
-- Table structure for `yunzhi_start_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_city`;
CREATE TABLE `yunzhi_start_city` (
  `id` int(10) NOT NULL,
  `name` varchar(40) DEFAULT '' COMMENT '城市名称',
  `country_id` int(10) DEFAULT NULL COMMENT '国家的id',
  `pictureurl` varchar(80) DEFAULT NULL COMMENT '图片url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_city
-- ----------------------------
INSERT INTO `yunzhi_start_city` VALUES ('1', '天津', '1', '127.0.0.1/tour/public');
INSERT INTO `yunzhi_start_city` VALUES ('2', '北京', '1', '127.0.0.1/tour/public');

-- ----------------------------
-- Table structure for `yunzhi_start_time`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_time`;
CREATE TABLE `yunzhi_start_time` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '出发时间id',
  `route_id` int(10) DEFAULT NULL COMMENT '路线id',
  `money` int(10) DEFAULT NULL COMMENT '应付金额',
  `date` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_time
-- ----------------------------
INSERT INTO `yunzhi_start_time` VALUES ('1', '1', '5999', '1');
INSERT INTO `yunzhi_start_time` VALUES ('2', '1', '58888', '2');
INSERT INTO `yunzhi_start_time` VALUES ('3', '2', '55555', '2');

-- ----------------------------
-- Table structure for `yunzhi_user`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_user`;
CREATE TABLE `yunzhi_user` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  `nickname` varchar(20) DEFAULT '' COMMENT '昵称',
  `sex` int(11) unsigned DEFAULT NULL,
  `city` varchar(20) DEFAULT '',
  `province` varchar(20) DEFAULT '',
  `country` varchar(20) DEFAULT '',
  `headimgurl` varchar(200) DEFAULT '',
  `date` int(10) DEFAULT NULL COMMENT '出生日期',
  `phone` int(10) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(40) DEFAULT '',
  `cardimgfonturl` varchar(200) DEFAULT '' COMMENT '身份证正面',
  `cardimgversourl` varchar(200) DEFAULT '' COMMENT '身份证反面',
  `idcard` int(10) DEFAULT NULL,
  PRIMARY KEY (`openid`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_user
-- ----------------------------
INSERT INTO `yunzhi_user` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '1', '', '天津', '中国', 'http://wx.qlogo.cn/mmopen/QNa3GHaSEXJEQgUS2yro9XSXUAWgbia4q89UwsfXT9gz6uYGBM4d1sawbwQIn6wJlJpb7T8LhR6piaCic5r7TLbS8Yib2eI0xb27/0', null, null, '', '', '', null);
