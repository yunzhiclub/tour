/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-04-08 18:12:43
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

-- ----------------------------
-- Table structure for `yunzhi_chosen`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_chosen`;
CREATE TABLE `yunzhi_chosen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '精选编号',
  `route_id` int(10) unsigned NOT NULL COMMENT '路线id',
  `weight` int(11) NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_chosen
-- ----------------------------
INSERT INTO `yunzhi_chosen` VALUES ('47', '1', '343', '1491467419', '1491057701', '1');
INSERT INTO `yunzhi_chosen` VALUES ('48', '2', '4', '1491058364', '1491058230', '1');
INSERT INTO `yunzhi_chosen` VALUES ('49', '2', '4', '1491058408', '1491058364', '1');
INSERT INTO `yunzhi_chosen` VALUES ('50', '2', '4', '1491058635', '1491058408', '1');
INSERT INTO `yunzhi_chosen` VALUES ('51', '2', '4', '1491058887', '1491058635', '1');
INSERT INTO `yunzhi_chosen` VALUES ('52', '2', '4', '1491059086', '1491058887', '1');
INSERT INTO `yunzhi_chosen` VALUES ('53', '2', '4', '1491059113', '1491059086', '1');
INSERT INTO `yunzhi_chosen` VALUES ('54', '2', '4', '1491059445', '1491059113', '1');
INSERT INTO `yunzhi_chosen` VALUES ('55', '1', '343', '1491467419', '1491467419', '0');

-- ----------------------------
-- Table structure for `yunzhi_collection`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_collection`;
CREATE TABLE `yunzhi_collection` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `route_id` int(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1(过期)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_collection
-- ----------------------------
INSERT INTO `yunzhi_collection` VALUES ('1', '1', '2', '0');
INSERT INTO `yunzhi_collection` VALUES ('2', '2', '1', '0');

-- ----------------------------
-- Table structure for `yunzhi_config`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_config`;
CREATE TABLE `yunzhi_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统配置id',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '系统配置名称',
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1已删除',
  `content` varchar(60) NOT NULL DEFAULT '' COMMENT '系统配置内容',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_config
-- ----------------------------
INSERT INTO `yunzhi_config` VALUES ('1', '1', '0', '1', '0', '0');
INSERT INTO `yunzhi_config` VALUES ('5', '5555', '0', '                                <p>是多少深蹲是</p>\r\n             ', '1489462468', '1489401554');

-- ----------------------------
-- Table structure for `yunzhi_country`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_country`;
CREATE TABLE `yunzhi_country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `region_id` int(10) NOT NULL COMMENT '地区id',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '国家名称',
  `picture_url` varchar(80) NOT NULL DEFAULT '' COMMENT '图片URL',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1为删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_country
-- ----------------------------
INSERT INTO `yunzhi_country` VALUES ('1', '1', '中国', '127.0.0.1/public/', '0', '1489463530', '0');
INSERT INTO `yunzhi_country` VALUES ('2', '2', '英国', '127.0.0.1/public/', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('3', '3', '美国', '127.0.0.1/public/', '0', '1489495307', '0');
INSERT INTO `yunzhi_country` VALUES ('4', '4', '斐济', '', '1489412789', '1489476824', '0');
INSERT INTO `yunzhi_country` VALUES ('6', '6', '澳大利亚', '', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('7', '3', '墨西哥', '', '1489495709', '1489495709', '0');
INSERT INTO `yunzhi_country` VALUES ('8', '6', 'shahala', '', '1489997911', '1489998611', '1');

-- ----------------------------
-- Table structure for `yunzhi_customer`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_customer`;
CREATE TABLE `yunzhi_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `openid` varchar(50) NOT NULL COMMENT 'openid',
  `nick_name` varchar(20) DEFAULT '' COMMENT '昵称',
  `sex` int(11) unsigned DEFAULT NULL COMMENT '性别',
  `city` varchar(20) DEFAULT '' COMMENT '城市',
  `province` varchar(20) DEFAULT '' COMMENT '省份',
  `country` varchar(20) DEFAULT '' COMMENT '国家',
  `head_img_url` varchar(200) DEFAULT '' COMMENT '头像URL',
  `birthday` int(10) DEFAULT NULL COMMENT '出生日期',
  `phone` bigint(11) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(40) DEFAULT '',
  `card_img_front_url` varchar(200) DEFAULT '' COMMENT '身份证正面URL',
  `card_img_back_url` varchar(200) DEFAULT '' COMMENT '身份证反面URL',
  `idcard` varchar(40) DEFAULT NULL,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '0',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1(删除)',
  `head_img_url_wechat` varchar(200) DEFAULT '' COMMENT '微信上服务器用户头像的url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_customer
-- ----------------------------
INSERT INTO `yunzhi_customer` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '0', '天津', '天津', '中国', '20170304\\333b87ff9565d516fa4604542106c6a9e4a6db99.png', '19970621', '17602220356', '55185294@qq.com', '', '', '140502199806219966', '1490098673', '0', '0', '0', '');
INSERT INTO `yunzhi_customer` VALUES ('2', 'sjfksajdfjiihiohfadsfsjanbvkj', '张三', '1', '北京', '北京', '中国', '', '1992', '13599996666', 'wangyi@vip.com', '', '', '140xxxxxxxxxxxxxxxxx', '1490098812', '0', '1', '0', '');
INSERT INTO `yunzhi_customer` VALUES ('3', '', '李四', null, '', '', '', '', null, null, '', '', '', null, '0', '0', '0', '0', '');
INSERT INTO `yunzhi_customer` VALUES ('4', '', '王五', null, '', '', '', '', null, null, '', '', '', null, '0', '0', '0', '0', '');
INSERT INTO `yunzhi_customer` VALUES ('5', '', '赵六', null, '', '', '', '', null, null, '', '', '', null, '0', '0', '0', '0', '');
INSERT INTO `yunzhi_customer` VALUES ('6', '', '田七', null, '', '', '', '', null, null, '', '', '', null, '0', '0', '0', '0', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
INSERT INTO `yunzhi_destination_city` VALUES ('8', '1', '', '1489237122', '1489393570', '01');
INSERT INTO `yunzhi_destination_city` VALUES ('9', '1', '555', '1489401153', '1489401153', '00');

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
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned zerofill NOT NULL,
  `create_time` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_evaluate
-- ----------------------------
INSERT INTO `yunzhi_evaluate` VALUES ('1', '1', '1', '5', '这是评价1', '0', '01489501499', '00000000000');
INSERT INTO `yunzhi_evaluate` VALUES ('2', '2', '1', '4', '这是评价2', '0', '01489501493', '00000000000');

-- ----------------------------
-- Table structure for `yunzhi_flight`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_flight`;
CREATE TABLE `yunzhi_flight` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` varchar(10) DEFAULT '' COMMENT '航班号',
  `company` varchar(20) DEFAULT NULL COMMENT '航空公司',
  `up_time` time DEFAULT NULL COMMENT '起飞时间',
  `down_time` time DEFAULT NULL COMMENT '抵达时间',
  `up_city_id` int(11) DEFAULT NULL COMMENT '出发城市',
  `down_city_id` int(11) DEFAULT NULL COMMENT '到达城市',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_flight
-- ----------------------------
INSERT INTO `yunzhi_flight` VALUES ('28', 'AF001', '中国航空', '02:44:00', '04:06:00', '2', '1', '1488957300', '1489018193', '00');
INSERT INTO `yunzhi_flight` VALUES ('29', 'tes', 'ff', '01:06:00', '23:06:00', '1', '1', '1489018860', '1489019657', '01');
INSERT INTO `yunzhi_flight` VALUES ('30', 'A31111', '中国航空', '05:05:00', '05:05:00', '1', '1', '1489019628', '1489019628', '00');

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(10) unsigned NOT NULL,
  `weight` int(10) NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('14', '1', '343342', '1491057701', '1491057671', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('15', '1', '343342', '1491057766', '1491057701', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('16', '1', '4', '1491058272', '1491058258', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('17', '1', '4', '1491058386', '1491058272', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('18', '1', '4', '1491058936', '1491058386', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('19', '1', '4', '1491059061', '1491058936', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('20', '1', '4', '1491059062', '1491059061', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('21', '1', '4', '1491059135', '1491059062', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('22', '1', '4', '1491059550', '1491059135', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('23', '1', '4', '1491467419', '1491059550', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('24', '1', '4', '1491467419', '1491467419', '0');

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
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `dress` varchar(40) NOT NULL DEFAULT '' COMMENT '地址',
  `phone` varchar(30) NOT NULL COMMENT '电话',
  `star` tinyint(1) unsigned NOT NULL COMMENT '酒店星级',
  `content` text NOT NULL COMMENT '酒店介绍',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_hotel
-- ----------------------------
INSERT INTO `yunzhi_hotel` VALUES ('1', '洛克酒店', '天津市河西区大润发旁边', '022-122345', '4', '                                    <p>                                    <p>                                    <p>                                    </p><p>这一拥有一流的卫生条件，态度服务，等等等</p>\r\n                                <p><br></p><p></p>\r\n                                <p><br></p></p>\r\n                                </p>\r\n                                ', '0', '0', '1490428035');

-- ----------------------------
-- Table structure for `yunzhi_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_invite`;
CREATE TABLE `yunzhi_invite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) NOT NULL COMMENT '路线id',
  `customer_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `start_time_id` int(10) NOT NULL COMMENT '出发时间id',
  `number` varchar(30) NOT NULL COMMENT '订单号',
  `person_num` int(10) NOT NULL DEFAULT '0' COMMENT '邀约人数',
  `pay_num` int(10) NOT NULL DEFAULT '0' COMMENT '支付人数',
  `unpay_num` int(10) NOT NULL DEFAULT '0' COMMENT '未支付人数',
  `status` tinyint(10) NOT NULL DEFAULT '0' COMMENT '0状态是邀约未完成1完成',
  `is_public` tinyint(10) NOT NULL DEFAULT '1' COMMENT '0是不公开1是公开',
  `create_time` int(40) NOT NULL DEFAULT '0' COMMENT '订单生成时间',
  `deadline` int(40) NOT NULL DEFAULT '0' COMMENT '到期时间小与路线的结束时间',
  `update_time` int(40) NOT NULL COMMENT '订单更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_invite
-- ----------------------------
INSERT INTO `yunzhi_invite` VALUES ('1', '1', '1', '1', 'Y123121', '4', '1', '1', '1', '1', '1222', '0', '0');
INSERT INTO `yunzhi_invite` VALUES ('2', '1', '1', '0', 'Y123122', '0', '0', '0', '1', '0', '0', '0', '0');
INSERT INTO `yunzhi_invite` VALUES ('3', '2', '1', '0', 'Y123123', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `yunzhi_invite` VALUES ('4', '1', '1', '1', 'Y123124', '0', '0', '0', '0', '1', '1489831509', '234343234', '1489831509');

-- ----------------------------
-- Table structure for `yunzhi_order`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_order`;
CREATE TABLE `yunzhi_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `invite_id` int(10) unsigned DEFAULT NULL COMMENT '邀约id',
  `number` varchar(18) DEFAULT '' COMMENT '订单编号',
  `is_delete` tinyint(2) unsigned DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_order
-- ----------------------------
INSERT INTO `yunzhi_order` VALUES ('1', '1', '1', 'D1233211234567', null);
INSERT INTO `yunzhi_order` VALUES ('2', '2', '2', 'D1233211234568', null);
INSERT INTO `yunzhi_order` VALUES ('3', '3', '2', 'D1233211234569', null);
INSERT INTO `yunzhi_order` VALUES ('5', '6', '1', '33', null);
INSERT INTO `yunzhi_order` VALUES ('6', '5', '1', '22', null);

-- ----------------------------
-- Table structure for `yunzhi_picture`
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

-- ----------------------------
-- Table structure for `yunzhi_picture_destination_city`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture_destination_city`;
CREATE TABLE `yunzhi_picture_destination_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `destination_city_id` int(11) unsigned NOT NULL,
  `picture_id` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned zerofill NOT NULL,
  `create_time` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_destination_city
-- ----------------------------
INSERT INTO `yunzhi_picture_destination_city` VALUES ('1', '1', '1', '0', '00000000001', '00000000001');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('2', '21', '192', '0', '01490017760', '01490017760');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('3', '24', '193', '0', '01490018276', '01490018276');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('4', '24', '194', '0', '01490018276', '01490018276');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('5', '45', '250', '0', '01490024479', '01490024479');
INSERT INTO `yunzhi_picture_destination_city` VALUES ('6', '45', '251', '0', '01490024479', '01490024479');

-- ----------------------------
-- Table structure for `yunzhi_picture_hotel`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture_hotel`;
CREATE TABLE `yunzhi_picture_hotel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) unsigned NOT NULL,
  `picture_id` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_hotel
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_picture_route`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_picture_route`;
CREATE TABLE `yunzhi_picture_route` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(11) unsigned NOT NULL,
  `picture_id` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_route
-- ----------------------------
INSERT INTO `yunzhi_picture_route` VALUES ('1', '82', '144', '0', '1491100773', '1491100773');
INSERT INTO `yunzhi_picture_route` VALUES ('2', '82', '145', '0', '1491100773', '1491100773');
INSERT INTO `yunzhi_picture_route` VALUES ('3', '82', '146', '0', '1491102020', '1491102020');
INSERT INTO `yunzhi_picture_route` VALUES ('4', '82', '149', '0', '1491134041', '1491134041');

-- ----------------------------
-- Table structure for `yunzhi_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_region`;
CREATE TABLE `yunzhi_region` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT '' COMMENT '地区名称',
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(2) unsigned zerofill DEFAULT '00',
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_region
-- ----------------------------
INSERT INTO `yunzhi_region` VALUES ('1', '亚洲', '0', '00', '0');
INSERT INTO `yunzhi_region` VALUES ('2', '欧洲', '0', '00', '0');
INSERT INTO `yunzhi_region` VALUES ('3', '美洲', '0', '01', '1489217724');
INSERT INTO `yunzhi_region` VALUES ('9', '大洋洲', '0', '00', '0');

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
  `deadline` date NOT NULL COMMENT '出发日期——止',
  `content` text NOT NULL COMMENT '详细内容',
  `click` int(11) DEFAULT '0' COMMENT '点击次数',
  `service_phone` varchar(40) DEFAULT '' COMMENT '客服电话',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `start_time` date NOT NULL COMMENT '开始日期',
  `begin_time` date NOT NULL COMMENT '出发日期——起',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '欧洲七日游', '2', '1', '1', '28', '28', '3', '这是一个测试', '3', '2', '324324', '1132332', '453454', '2017-04-06', '                                                                                                            <p>这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试</p>                                    <p>这是123</p><p>一个测试这是一个测试这是一个测试这是一个测试</p><p>这是一个测试这是一个测试<br></p><p><br></p>                                                                                                            ', '0', '022-23233223', '0', '1491643359', '1491643359', '2016-04-01', '2017-04-02');
INSERT INTO `yunzhi_route` VALUES ('2', '美国七日游', '1', '1', '1', '28', '28', '5', '这是第二个测试', '3', '3', '3', '0', '3434', '2017-04-01', '                                    <p>这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试这是一个测试</p>                                    <p>这是一个测试</p><p>这是一个测试</p><p>这是一个测试</p><p>这是一个测试这是一个测试这是一个测试<br></p><p>这是一个测试这是一个测试这是一个测试<br></p><p>这是一个测试</p><p><br></p>', '0', '00000000000000000022', '1', '1491059113', '1491059445', '2017-04-01', '2017-04-01');
INSERT INTO `yunzhi_route` VALUES ('82', '1', '1', '1', '1', '28', '28', '1', '1', '1', '1', '1', '111', '5', '2017-04-08', '                                                                                                            <p>1</p>                                                                        ', '0', '022-3242342', '0', '1491643384', '1491643384', '2017-04-08', '2017-04-08');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_city
-- ----------------------------
INSERT INTO `yunzhi_start_city` VALUES ('1', '天津', '1', '0', '0', '00000000000');
INSERT INTO `yunzhi_start_city` VALUES ('2', '北京', '2', '0', '0', '00000000000');
INSERT INTO `yunzhi_start_city` VALUES ('5', '上海', '0', '1', '0', '00000000000');

-- ----------------------------
-- Table structure for `yunzhi_start_time`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start_time`;
CREATE TABLE `yunzhi_start_time` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '出发时间id',
  `route_id` int(10) unsigned NOT NULL COMMENT '路线id',
  `price` int(10) unsigned NOT NULL COMMENT '应付金额',
  `date` date NOT NULL COMMENT '时间',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_time
-- ----------------------------
INSERT INTO `yunzhi_start_time` VALUES ('180', '1', '45345', '2017-04-01', '1491467419', '1491059550', '1');
INSERT INTO `yunzhi_start_time` VALUES ('181', '1', '4234', '2017-04-02', '1491467419', '1491059550', '1');
INSERT INTO `yunzhi_start_time` VALUES ('182', '1', '432432', '2017-04-03', '1491467419', '1491059550', '1');
INSERT INTO `yunzhi_start_time` VALUES ('183', '1', '45345', '2017-04-02', '1491467419', '1491467419', '0');
INSERT INTO `yunzhi_start_time` VALUES ('184', '1', '4234', '2017-04-03', '1491467419', '1491467419', '0');
INSERT INTO `yunzhi_start_time` VALUES ('185', '1', '432432', '2017-04-04', '1491467419', '1491467419', '0');
INSERT INTO `yunzhi_start_time` VALUES ('186', '1', '12345', '2017-04-05', '1491467419', '1491467419', '0');
INSERT INTO `yunzhi_start_time` VALUES ('187', '1', '112233', '2017-04-06', '1491467419', '1491467419', '0');

-- ----------------------------
-- Table structure for `yunzhi_test`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_test`;
CREATE TABLE `yunzhi_test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '测试用',
  `name` varchar(30) DEFAULT NULL COMMENT '测试用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_test
-- ----------------------------

-- ----------------------------
-- Table structure for `yunzhi_user`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_user`;
CREATE TABLE `yunzhi_user` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0正常 1冻结',
  `phonenumber` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `is_delete` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1已删除',
  `update_time` smallint(6) unsigned NOT NULL,
  `create_time` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

-- ----------------------------
-- Records of yunzhi_user
-- ----------------------------
INSERT INTO `yunzhi_user` VALUES ('1', 'admin', '59129aacfb6cebbe2c52f30ef3424209f7252e82', 'admin', '0', '13752603780', '1093609364@qq.com', '0', '65535', '0');

-- ----------------------------
-- View structure for `yunzhi_destination_city_route_hotel_view`
-- ----------------------------
DROP VIEW IF EXISTS `yunzhi_destination_city_route_hotel_view`;
