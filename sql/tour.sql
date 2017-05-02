/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-02 15:31:45
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
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_bed
-- ----------------------------
INSERT INTO `yunzhi_bed` VALUES ('10', '1', '1', null, '1', '0', null, '1000', '1489834128', '1492695281', '1');
INSERT INTO `yunzhi_bed` VALUES ('11', '1', '1', null, '0', '0', null, '1000', '1489834128', '1492609191', '2');
INSERT INTO `yunzhi_bed` VALUES ('12', '1', '1', null, '1', '0', null, '1000', '1489834128', '1492693205', '3');
INSERT INTO `yunzhi_bed` VALUES ('13', '1', '4', null, '1', '0', null, '500', '1489834128', '1489834128', '4');
INSERT INTO `yunzhi_bed` VALUES ('14', '1', '5', null, '1', '0', null, '500', '1489834128', '1489834128', '5');
INSERT INTO `yunzhi_bed` VALUES ('15', '1', '6', null, '1', '0', null, '1000', '1489834128', '1489834128', '6');
INSERT INTO `yunzhi_bed` VALUES ('16', '5', null, null, '1', '2', null, '3412', '1492501376', '1492501376', null);
INSERT INTO `yunzhi_bed` VALUES ('17', '6', '1', null, '1', '1', null, '34128', '1492673104', '1492673104', '7');
INSERT INTO `yunzhi_bed` VALUES ('18', '6', null, null, '1', '1', null, '0', '1492673104', '1492673104', null);
INSERT INTO `yunzhi_bed` VALUES ('19', '6', null, null, '1', '1', null, '0', '1492673104', '1492673104', null);
INSERT INTO `yunzhi_bed` VALUES ('20', '6', null, null, '1', '1', null, '0', '1492673104', '1492673104', null);
INSERT INTO `yunzhi_bed` VALUES ('21', '6', null, null, '1', '1', null, '0', '1492673104', '1492673104', null);
INSERT INTO `yunzhi_bed` VALUES ('22', '6', null, null, '1', '1', null, '0', '1492673104', '1492673104', null);
INSERT INTO `yunzhi_bed` VALUES ('23', '7', '1', null, '0', '2', null, '34128', '1492674372', '1492674372', '8');
INSERT INTO `yunzhi_bed` VALUES ('24', '7', null, null, '1', '1', null, '0', '1492674372', '1492674372', null);
INSERT INTO `yunzhi_bed` VALUES ('25', '7', null, null, '1', '1', null, '0', '1492674372', '1492674372', null);
INSERT INTO `yunzhi_bed` VALUES ('26', '7', null, null, '1', '1', null, '0', '1492674372', '1492674372', null);
INSERT INTO `yunzhi_bed` VALUES ('27', '7', null, null, '1', '1', null, '0', '1492674372', '1492674372', null);
INSERT INTO `yunzhi_bed` VALUES ('28', '7', null, null, '1', '1', null, '0', '1492674372', '1492674372', null);
INSERT INTO `yunzhi_bed` VALUES ('29', '8', '1', null, '0', '1', null, '34128', '1492678186', '1492678186', '9');
INSERT INTO `yunzhi_bed` VALUES ('30', '8', null, null, '1', '1', null, '0', '1492678186', '1492678186', null);
INSERT INTO `yunzhi_bed` VALUES ('31', '8', null, null, '1', '1', null, '0', '1492678186', '1492678186', null);
INSERT INTO `yunzhi_bed` VALUES ('32', '8', null, null, '1', '1', null, '0', '1492678186', '1492678186', null);
INSERT INTO `yunzhi_bed` VALUES ('33', '8', null, null, '1', '1', null, '0', '1492678186', '1492678186', null);
INSERT INTO `yunzhi_bed` VALUES ('34', '8', null, null, '1', '1', null, '0', '1492678186', '1492678186', null);
INSERT INTO `yunzhi_bed` VALUES ('35', '9', '1', null, '0', '2', null, '31000', '1492693138', '1492693138', '10');
INSERT INTO `yunzhi_bed` VALUES ('36', '9', null, null, '0', '2', null, '3128', '1492693138', '1492693138', null);
INSERT INTO `yunzhi_bed` VALUES ('37', '9', null, null, '1', '1', null, '0', '1492693138', '1492693138', null);
INSERT INTO `yunzhi_bed` VALUES ('38', '9', null, null, '1', '1', null, '0', '1492693138', '1492693138', null);
INSERT INTO `yunzhi_bed` VALUES ('39', '9', null, null, '1', '1', null, '0', '1492693138', '1492693138', null);
INSERT INTO `yunzhi_bed` VALUES ('40', '9', null, null, '1', '1', null, '0', '1492693138', '1492693138', null);
INSERT INTO `yunzhi_bed` VALUES ('41', '10', '1', null, null, '1', null, null, null, null, null);
INSERT INTO `yunzhi_bed` VALUES ('42', '10', '1', null, '1', '1', null, '76194', '1493127712', '1493127712', '11');
INSERT INTO `yunzhi_bed` VALUES ('43', '10', null, null, '1', '1', null, '0', '1493127712', '1493127712', null);
INSERT INTO `yunzhi_bed` VALUES ('44', '10', null, null, '1', '1', null, '0', '1493127712', '1493127712', null);
INSERT INTO `yunzhi_bed` VALUES ('45', '10', null, null, '1', '1', null, '0', '1493127712', '1493127712', null);
INSERT INTO `yunzhi_bed` VALUES ('46', '10', null, null, '1', '1', null, '0', '1493127712', '1493127712', null);
INSERT INTO `yunzhi_bed` VALUES ('47', '10', null, null, '1', '1', null, '0', '1493127712', '1493127712', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

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
INSERT INTO `yunzhi_chosen` VALUES ('55', '1', '343', '1491828051', '1491467419', '1');
INSERT INTO `yunzhi_chosen` VALUES ('56', '82', '1', '1491827868', '1491826232', '1');
INSERT INTO `yunzhi_chosen` VALUES ('57', '82', '2', '1491827868', '1491827868', '0');
INSERT INTO `yunzhi_chosen` VALUES ('58', '1', '2', '1491828092', '1491828051', '1');
INSERT INTO `yunzhi_chosen` VALUES ('59', '1', '2', '1491828093', '1491828092', '1');
INSERT INTO `yunzhi_chosen` VALUES ('60', '1', '2', '1491828192', '1491828093', '1');
INSERT INTO `yunzhi_chosen` VALUES ('61', '1', '2', '1491828214', '1491828192', '1');
INSERT INTO `yunzhi_chosen` VALUES ('62', '1', '2', '1491828336', '1491828214', '1');
INSERT INTO `yunzhi_chosen` VALUES ('63', '1', '2', '1491828356', '1491828336', '1');
INSERT INTO `yunzhi_chosen` VALUES ('64', '1', '2', '1491828376', '1491828356', '1');
INSERT INTO `yunzhi_chosen` VALUES ('65', '1', '2', '1491828404', '1491828376', '1');
INSERT INTO `yunzhi_chosen` VALUES ('66', '1', '2', '1491828421', '1491828404', '1');
INSERT INTO `yunzhi_chosen` VALUES ('67', '1', '2', '1491828451', '1491828421', '1');
INSERT INTO `yunzhi_chosen` VALUES ('68', '1', '2', '1491828451', '1491828451', '0');
INSERT INTO `yunzhi_chosen` VALUES ('69', '96', '100', '1492435847', '1492435847', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_collection
-- ----------------------------
INSERT INTO `yunzhi_collection` VALUES ('1', '1', '2', '0');
INSERT INTO `yunzhi_collection` VALUES ('2', '2', '1', '0');
INSERT INTO `yunzhi_collection` VALUES ('3', '1', '1', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_country
-- ----------------------------
INSERT INTO `yunzhi_country` VALUES ('1', '1', '中国', '127.0.0.1/public/', '0', '1489463530', '0');
INSERT INTO `yunzhi_country` VALUES ('2', '2', '英国', '127.0.0.1/public/', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('3', '3', '美国', '127.0.0.1/public/', '0', '1489495307', '0');
INSERT INTO `yunzhi_country` VALUES ('4', '4', '斐济', '', '1489412789', '1489476824', '0');
INSERT INTO `yunzhi_country` VALUES ('5', '4', '澳大利亚', '', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('7', '3', '墨西哥', '', '1489495709', '1489495709', '0');
INSERT INTO `yunzhi_country` VALUES ('8', '1', '泰国', '', '1489997911', '1489998611', '0');
INSERT INTO `yunzhi_country` VALUES ('9', '1', '日本', '', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('10', '2', '法国', '', '0', '0', '0');
INSERT INTO `yunzhi_country` VALUES ('11', '2', '德国', '', '0', '0', '0');

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
INSERT INTO `yunzhi_customer` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰233', '0', '天津', '天津', '中国', '20170304\\333b87ff9565d516fa4604542106c6a9e4a6db99.png', '19970621', '17602220356', '55185294@qq.com', '', '', '140502199806219966', '1490098673', '0', '0', '0', '');
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
INSERT INTO `yunzhi_destination_city` VALUES ('1', '10', '巴黎', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('2', '2', '伦敦', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('3', '11', '柏林', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('4', '1', '上海', null, '1489235698', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('5', '2', '阿道夫阿斯蒂芬', null, '1489235711', '00');
INSERT INTO `yunzhi_destination_city` VALUES ('6', '1', '三亚', null, null, '00');
INSERT INTO `yunzhi_destination_city` VALUES ('7', '3', '加利福尼亚', '1489230764', '1489393582', '01');
INSERT INTO `yunzhi_destination_city` VALUES ('8', '1', '西藏', '1489237122', '1489393570', '01');
INSERT INTO `yunzhi_destination_city` VALUES ('9', '1', '丽江', '1489401153', '1489401153', '00');

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
  `country_id` int(10) unsigned NOT NULL COMMENT '国家ID',
  `weight` int(1) NOT NULL,
  `expiration_time` date NOT NULL COMMENT '过期时间',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `destination_city_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_city
-- ----------------------------
INSERT INTO `yunzhi_home_city` VALUES ('1', '1', '6', '2017-04-15', '1492878698', '15', '0', '2');
INSERT INTO `yunzhi_home_city` VALUES ('2', '1', '2', '2017-03-15', '1492664408', '0', '1', '2');
INSERT INTO `yunzhi_home_city` VALUES ('3', '0', '16', '2017-04-01', '1492661131', '1492659531', '0', '1');
INSERT INTO `yunzhi_home_city` VALUES ('4', '0', '9', '2017-03-23', '1492782133', '1492664421', '1', '7');
INSERT INTO `yunzhi_home_city` VALUES ('5', '0', '6', '2017-04-06', '1492878889', '1492878889', '0', '1');

-- ----------------------------
-- Table structure for `yunzhi_home_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_recommend`;
CREATE TABLE `yunzhi_home_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(10) unsigned NOT NULL,
  `weight` int(10) NOT NULL,
  `expiration_time` date DEFAULT NULL COMMENT '过期时间',
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_recommend
-- ----------------------------
INSERT INTO `yunzhi_home_recommend` VALUES ('1', '2', '66', '2017-04-22', '1492876762', '1491057671', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('2', '1', '343342', '0000-00-00', '1492605684', '1491057701', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('3', '1', '4', '0000-00-00', '1492605663', '1491058258', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('17', '1', '4', '0000-00-00', '1491058386', '1491058272', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('18', '1', '4', '0000-00-00', '1491058936', '1491058386', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('19', '1', '4', '0000-00-00', '1491059061', '1491058936', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('20', '1', '4', '0000-00-00', '1491059062', '1491059061', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('21', '1', '4', '0000-00-00', '1491059135', '1491059062', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('22', '1', '4', '0000-00-00', '1491059550', '1491059135', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('23', '1', '4', '0000-00-00', '1491467419', '1491059550', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('24', '1', '4', '0000-00-00', '1491831279', '1491467419', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('25', '1', '4', '0000-00-00', '1491831279', '1491831279', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('26', '87', '2', '0000-00-00', '1491831923', '1491831755', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('27', '87', '2', '0000-00-00', '1491831923', '1491831923', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('28', '0', '6', '2017-03-31', '1492778503', '1492601020', '1');
INSERT INTO `yunzhi_home_recommend` VALUES ('29', '1', '1', '2017-04-05', '1492601130', '1492601130', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('30', '1', '1', '2017-04-05', '1492601137', '1492601137', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('31', '87', '5', '2017-04-18', '1492601155', '1492601155', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('32', '87', '9', '2017-04-29', '1492601179', '1492601179', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('33', '1', '9', '2017-04-13', '1492601206', '1492601206', '0');
INSERT INTO `yunzhi_home_recommend` VALUES ('34', '1', '0', '2017-04-07', '1492601231', '1492601231', '0');

-- ----------------------------
-- Table structure for `yunzhi_home_region`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_home_region`;
CREATE TABLE `yunzhi_home_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `region_id` int(10) unsigned NOT NULL COMMENT '地区id',
  `weight` int(10) NOT NULL,
  `expiration_time` date NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_home_region
-- ----------------------------
INSERT INTO `yunzhi_home_region` VALUES ('1', '2', '5', '2017-04-07', '1492876123', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('2', '6', '8', '0000-00-00', '0', '0', '0');
INSERT INTO `yunzhi_home_region` VALUES ('3', '2', '1', '2017-04-06', '1492791120', '1492791120', '0');
INSERT INTO `yunzhi_home_region` VALUES ('4', '1', '6', '2017-04-21', '1492876373', '1492873851', '1');
INSERT INTO `yunzhi_home_region` VALUES ('5', '1', '666', '2017-04-07', '1492879208', '1492879208', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
INSERT INTO `yunzhi_invite` VALUES ('10', '2', '1', '1492704000', '1492963200', 'y20170425277131', '6', '1', '5', '0', '1', '1493127712', '2147483647', '1493127712');

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
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '订单状态0未支付1已支付2未评价',
  `is_public` tinyint(2) unsigned DEFAULT '0' COMMENT '订单类型是否公开0不公开1公开',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `客户id` (`customer_id`),
  CONSTRAINT `客户id` FOREIGN KEY (`customer_id`) REFERENCES `yunzhi_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_order
-- ----------------------------
INSERT INTO `yunzhi_order` VALUES ('1', '1', '1', 'D1233211234567', null, '0', '0', null, null);
INSERT INTO `yunzhi_order` VALUES ('2', '2', '2', 'D1233211234568', null, '0', '0', null, null);
INSERT INTO `yunzhi_order` VALUES ('3', '3', '2', 'D1233211234569', null, '0', '0', null, null);
INSERT INTO `yunzhi_order` VALUES ('5', '6', '1', '33', null, '0', '0', null, null);
INSERT INTO `yunzhi_order` VALUES ('6', '5', '1', '22', null, '0', '0', null, null);
INSERT INTO `yunzhi_order` VALUES ('7', '1', '6', '201704207310499999', '0', '0', '0', '1492673104', '1492673104');
INSERT INTO `yunzhi_order` VALUES ('8', '1', '7', '201704207437299999', '0', '0', '0', '1492674372', '1492674372');
INSERT INTO `yunzhi_order` VALUES ('9', '1', '8', '201704207818699999', '0', '1', '0', '1492678186', '1492678186');
INSERT INTO `yunzhi_order` VALUES ('10', '1', '9', '201704209313899999', '0', '2', '0', '1492693138', '1492693138');
INSERT INTO `yunzhi_order` VALUES ('11', '1', '10', '2017042527713001', '0', '3', '0', '1493127712', '1493127712');

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
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture
-- ----------------------------
INSERT INTO `yunzhi_picture` VALUES ('144', 'FlPFXG4zFRVpf3daMdxQDhUqvTqw.png', '/tour/public/upload/20170410/d4bae866e9724c8a63421bb8adac7255.png', '0', '1491827851', '1491827851');
INSERT INTO `yunzhi_picture` VALUES ('145', 'FmrKxdOsXUs-WsOEO-G14qdFVm0n.png', '/tour/public/upload/20170410/5089bcc7e8e0f5825f9f07905e8204f2.png', '0', '1491827852', '1491827852');
INSERT INTO `yunzhi_picture` VALUES ('146', 'FkPKlmk9Djx3HGo_kb0Tcz5qZNVq.png', '/tour/public/upload/20170410/c74a442ef84bad0c1ae9bdc2c3a37413.png', '0', '1491828041', '1491828041');
INSERT INTO `yunzhi_picture` VALUES ('147', 'FruQKvlvCQHAcrMnw5evabPl6RAJ.png', '/tour/public/upload/20170410/3c6611f47768f047123811c269ecc533.png', '0', '1491828042', '1491828042');
INSERT INTO `yunzhi_picture` VALUES ('148', 'mid2.png', '/tour/public/upload/20170410/a2a87042b9ab2c05ba61bcef36e0cbbb.png', '0', '1491828399', '1491828399');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_picture_route
-- ----------------------------
INSERT INTO `yunzhi_picture_route` VALUES ('6', '82', '144', '0', '1491827868', '1491827868');
INSERT INTO `yunzhi_picture_route` VALUES ('7', '82', '145', '0', '1491827868', '1491827868');
INSERT INTO `yunzhi_picture_route` VALUES ('8', '1', '146', '0', '1491828051', '1491828051');
INSERT INTO `yunzhi_picture_route` VALUES ('9', '1', '147', '0', '1491828051', '1491828051');
INSERT INTO `yunzhi_picture_route` VALUES ('10', '1', '148', '0', '1491828404', '1491828404');

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
INSERT INTO `yunzhi_region` VALUES ('3', '美洲', '0', '00', '1489217724');
INSERT INTO `yunzhi_region` VALUES ('4', '澳洲', '0', '00', '0');
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
  `end_time` int(11) unsigned NOT NULL COMMENT '出发日期——止',
  `content` text NOT NULL COMMENT '详细内容',
  `click` int(11) DEFAULT '0' COMMENT '点击次数',
  `service_phone` varchar(40) DEFAULT '' COMMENT '客服电话',
  `is_delete` tinyint(1) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `start_time` int(11) unsigned NOT NULL COMMENT '开始日期',
  `begin_time` int(11) unsigned NOT NULL COMMENT '出发日期——起',
  `deadline` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '法国+瑞士+意大利+德国11日9晚跟团游', '1', '1', '1', '28', '28', '2', '赠送荷兰+库肯霍夫公园+双宫入内+滴滴湖', '2', '4', '7799', '7799', '8000', '1492963200', '                                                                                                                                                                                                                                                                                                                                                                                                                                                <p></p><ul><li>★ 【优质保证】：全程往返优质航空，南进北出，不走回头路</li><li>★ 【深度游览】：罗马，威尼斯，佛罗伦萨的宁静悠远，精心设计</li><li>★ 【精心赠送】：令人魂牵梦萦的库肯霍夫公园，赏荷兰风光</li></ul>                                    ', '0', '022-232332', '0', '1492779823', '1492779823', '1492704000', '1492704000', '1492779728');
INSERT INTO `yunzhi_route` VALUES ('2', '法国+意大利+瑞士10日8晚跟团游', '1', '2', '1', '28', '28', '3', '一价全含+勃朗峰+金色山口车+双宫+双游船', '3', '3', '12699', '12699', '18000', '1492963200', '                                                                                                                                                                                                                        <p></p><ul><li>★ 【春季抢购】全程四人WIFI+可异地按指纹+出签率高</li><li>★ 【行程升级】全程三星-四星酒店+勃朗峰+双宫入内讲解+塞纳河游船</li><li>★ 【法国深度】：威尼斯本岛+威尼斯彩虹岛布尔诺 +黄金大运河</li></ul>                                                                                                                                                <p><br></p>                                    ', '0', '022-3242342', '0', '1492779728', '1492779728', '1492704000', '1492704000', '1492779728');
INSERT INTO `yunzhi_route` VALUES ('3', '测试', '1', '3', '1', '28', '28', '3', '1223', '3', '1', '1', '1', '1', '1493049600', '                                                                        <p>11</p>                                    ', '0', '1', '0', '1493038955', '1493038955', '1493913600', '1492963200', '1492876800');
INSERT INTO `yunzhi_route` VALUES ('4', '测试1', '1', '6', '1', '28', '28', '2', '测试', '2', '1', '1222', '1111', '2222', '1492963200', '', '0', '022-232332', '0', '0', '1492779823', '1492779823', '1492779823', '1492779823');

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
  `date` int(11) NOT NULL COMMENT '时间',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start_time
-- ----------------------------
INSERT INTO `yunzhi_start_time` VALUES ('262', '83', '2', '1492704000', '1492779615', '1492777913', '1');
INSERT INTO `yunzhi_start_time` VALUES ('263', '83', '23', '1492790400', '1492779615', '1492777913', '1');
INSERT INTO `yunzhi_start_time` VALUES ('264', '83', '2', '1492704000', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('265', '83', '23', '1492790400', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('266', '83', '11', '1492876800', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('267', '83', '1', '1492963200', '1492779832', '1492779615', '1');
INSERT INTO `yunzhi_start_time` VALUES ('268', '82', '23', '1492704000', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('269', '82', '23', '1492790400', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('270', '82', '23', '1492876800', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('271', '82', '2323', '1492963200', '1492779728', '1492779728', '0');
INSERT INTO `yunzhi_start_time` VALUES ('272', '1', '10000', '1492704000', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('273', '1', '10000', '1492790400', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('274', '1', '11000', '1492876800', '1492779823', '1492779823', '0');
INSERT INTO `yunzhi_start_time` VALUES ('275', '1', '11000', '1492963200', '1492779823', '1492779823', '0');

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
INSERT INTO `yunzhi_user` VALUES ('1', 'admin', '69bfbc2e8df54af9fe751b3dfa4d2e9964ffa496', 'admin', '0', '13752603780', '1093609364@qq.com', '0', '65535', '0');

-- ----------------------------
-- View structure for `yunzhi_destination_city_route_hotel_flight_view`
-- ----------------------------
DROP VIEW IF EXISTS `yunzhi_destination_city_route_hotel_flight_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yunzhi_destination_city_route_hotel_flight_view` AS select `yunzhi_route`.`id` AS `id`,`yunzhi_route`.`name` AS `route_name`,`yunzhi_route`.`destination_city_id` AS `route_destination_city_id`,`yunzhi_route`.`hotel_id` AS `route_hotel_id`,`yunzhi_route`.`begin_flight_id` AS `route_begin_flight_id`,`yunzhi_route`.`back_flight_id` AS `route_back_flight_id`,`yunzhi_route`.`days` AS `route_days`,`yunzhi_route`.`description` AS `route_description`,`yunzhi_route`.`check_in_days` AS `route_check_in_days`,`yunzhi_route`.`check_in_rooms` AS `route_check_in_rooms`,`yunzhi_route`.`standard_price` AS `route_standard_price`,`yunzhi_route`.`deadline` AS `route_deadline`,`yunzhi_route`.`click` AS `route_click`,`yunzhi_route`.`is_delete` AS `route_is_delete`,`yunzhi_route`.`create_time` AS `route_create_time`,`yunzhi_hotel`.`dress` AS `hotel_dress`,`yunzhi_hotel`.`phone` AS `hotel_phone`,`yunzhi_hotel`.`star` AS `hotel_star`,`yunzhi_hotel`.`content` AS `hotel_content`,`yunzhi_hotel`.`is_delete` AS `hotel_is_delete`,`yunzhi_flight`.`number` AS `flight_number`,`yunzhi_flight`.`company` AS `flight_company`,`yunzhi_flight`.`up_time` AS `flight_up_time`,`yunzhi_flight`.`down_time` AS `flight_down_time`,`yunzhi_flight`.`up_city_id` AS `flight_up_city_id`,`yunzhi_flight`.`down_city_id` AS `flight_down_city_id`,`yunzhi_destination_city`.`country_id` AS `destination_city_country_id`,`yunzhi_destination_city`.`name` AS `destination_city_name`,`yunzhi_start_city`.`name` AS `start_city_name`,`yunzhi_route`.`start_city_id` AS `route_start_city_id`,`yunzhi_route`.`starting_price` AS `route_starting_price`,`yunzhi_route`.`service_phone` AS `route_service_phone`,`yunzhi_route`.`actual_price` AS `actual_price`,`yunzhi_route`.`content` AS `content`,`yunzhi_hotel`.`name` AS `hotel_name`,`yunzhi_route`.`start_time` AS `start_time` from ((((`yunzhi_route` left join `yunzhi_hotel` on((`yunzhi_hotel`.`id` = `yunzhi_route`.`hotel_id`))) left join `yunzhi_flight` on(((`yunzhi_flight`.`id` = `yunzhi_route`.`begin_flight_id`) and (`yunzhi_route`.`back_flight_id` = `yunzhi_flight`.`id`)))) left join `yunzhi_start_city` on((`yunzhi_start_city`.`id` = `yunzhi_route`.`start_city_id`))) left join `yunzhi_destination_city` on((`yunzhi_destination_city`.`id` = `yunzhi_route`.`destination_city_id`))) ;

-- ----------------------------
-- View structure for `yunzhi_invite_route_startcity_destcity_customer_view`
-- ----------------------------
DROP VIEW IF EXISTS `yunzhi_invite_route_startcity_destcity_customer_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yunzhi_invite_route_startcity_destcity_customer_view` AS select `yunzhi_invite`.`id` AS `id`,`yunzhi_invite`.`route_id` AS `route_id`,`yunzhi_invite`.`customer_id` AS `customer_id`,`yunzhi_invite`.`number` AS `number`,`yunzhi_invite`.`person_num` AS `person_num`,`yunzhi_invite`.`pay_num` AS `pay_num`,`yunzhi_invite`.`unpay_num` AS `unpay_num`,`yunzhi_invite`.`status` AS `status`,`yunzhi_invite`.`is_public` AS `is_public`,`yunzhi_invite`.`deadline` AS `deadline`,`yunzhi_customer`.`openid` AS `customer_openid`,`yunzhi_customer`.`nick_name` AS `customer_nick_name`,`yunzhi_customer`.`sex` AS `customer_sex`,`yunzhi_customer`.`city` AS `customer_city`,`yunzhi_customer`.`province` AS `customer_province`,`yunzhi_customer`.`country` AS `customer_country`,`yunzhi_customer`.`head_img_url` AS `customer_head_img_url`,`yunzhi_customer`.`birthday` AS `customer_birthday`,`yunzhi_customer`.`phone` AS `customer_phone`,`yunzhi_customer`.`email` AS `customer_email`,`yunzhi_route`.`name` AS `route_name`,`yunzhi_route`.`start_city_id` AS `start_city_id`,`yunzhi_route`.`destination_city_id` AS `destination_city_id`,`yunzhi_route`.`days` AS `route_days`,`yunzhi_route`.`description` AS `route_description`,`yunzhi_route`.`check_in_days` AS `route_check_in_days`,`yunzhi_route`.`check_in_rooms` AS `route_check_in_rooms`,`yunzhi_route`.`deadline` AS `route_deadline`,`yunzhi_route`.`content` AS `route_content`,`yunzhi_route`.`click` AS `route_click`,`yunzhi_route`.`service_phone` AS `route_service_phone`,`yunzhi_route`.`start_time` AS `route_start_time`,`yunzhi_destination_city`.`name` AS `destination_city_name`,`yunzhi_start_city`.`name` AS `start_city_name`,`yunzhi_customer`.`head_img_url_wechat` AS `customer_head_img_url_wechat`,`yunzhi_invite`.`set_out_time` AS `set_out_time`,`yunzhi_invite`.`back_time` AS `back_time` from ((((`yunzhi_invite` left join `yunzhi_customer` on((`yunzhi_invite`.`customer_id` = `yunzhi_customer`.`id`))) left join `yunzhi_route` on((`yunzhi_invite`.`route_id` = `yunzhi_route`.`id`))) left join `yunzhi_destination_city` on((`yunzhi_route`.`destination_city_id` = `yunzhi_destination_city`.`id`))) left join `yunzhi_start_city` on((`yunzhi_route`.`start_city_id` = `yunzhi_start_city`.`id`))) ;
