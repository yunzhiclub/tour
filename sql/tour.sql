/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tour

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-22 18:53:07
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `user_id` int(10) DEFAULT NULL,
  `route_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_collection
-- ----------------------------
INSERT INTO `yunzhi_collection` VALUES ('1', '1', '2');

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
-- Table structure for `yunzhi_destinationcity`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_destinationcity`;
CREATE TABLE `yunzhi_destinationcity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL COMMENT '国家id',
  `name` varchar(40) DEFAULT '' COMMENT '城市名称',
  `pictureurl` varchar(80) DEFAULT '' COMMENT '图片url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_destinationcity
-- ----------------------------
INSERT INTO `yunzhi_destinationcity` VALUES ('1', '2', '伦敦', 'http://public');
INSERT INTO `yunzhi_destinationcity` VALUES ('2', '2', '弗洛伦撒', 'http://public');

-- ----------------------------
-- Table structure for `yunzhi_evaluate`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_evaluate`;
CREATE TABLE `yunzhi_evaluate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
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
-- Table structure for `yunzhi_homerecommend`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_homerecommend`;
CREATE TABLE `yunzhi_homerecommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) DEFAULT NULL,
  `expiretime` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_homerecommend
-- ----------------------------
INSERT INTO `yunzhi_homerecommend` VALUES ('1', '1', '1', '1');
INSERT INTO `yunzhi_homerecommend` VALUES ('2', '1', '1', '2');
INSERT INTO `yunzhi_homerecommend` VALUES ('3', '2', '2', '3');

-- ----------------------------
-- Table structure for `yunzhi_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_invite`;
CREATE TABLE `yunzhi_invite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `bed_id` int(10) DEFAULT NULL,
  `start_id` int(10) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `person_num` int(10) DEFAULT NULL,
  `pay` int(10) DEFAULT NULL,
  `unpay` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ispublic` tinyint(1) DEFAULT NULL,
  `ordertime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_invite
-- ----------------------------
INSERT INTO `yunzhi_invite` VALUES ('1', '1', '1', '1', '1', '1', '4', '1', '1', '1', '1', '1222');
INSERT INTO `yunzhi_invite` VALUES ('2', '1', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `yunzhi_invite` VALUES ('3', '2', null, null, null, null, null, null, null, null, null, null);

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
-- Table structure for `yunzhi_route`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_route`;
CREATE TABLE `yunzhi_route` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '路线id',
  `start_id` int(10) DEFAULT NULL COMMENT '出发城市',
  `destinationcity_id` int(10) DEFAULT NULL COMMENT '目的城市',
  `hotel_id` int(10) DEFAULT NULL COMMENT '酒店ID',
  `beginflight_id` int(10) DEFAULT NULL COMMENT '去时航班',
  `backflight_id` int(10) DEFAULT NULL COMMENT '返回航班',
  `begintime` int(10) DEFAULT NULL COMMENT '开始时间',
  `day` int(10) DEFAULT NULL COMMENT '天数',
  `description` varchar(40) DEFAULT '' COMMENT '描述信息',
  `checkindays` int(10) DEFAULT NULL COMMENT '入住天数',
  `checkinrooms` int(10) DEFAULT NULL COMMENT '房间数',
  `startingprice` int(10) DEFAULT NULL COMMENT '起价',
  `price` int(10) DEFAULT NULL COMMENT '实际价格',
  `slidershow` int(10) DEFAULT NULL COMMENT '幻灯片',
  `deadline` int(10) DEFAULT NULL COMMENT '到期时间',
  `content` varchar(100) DEFAULT '' COMMENT '详细内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_route
-- ----------------------------
INSERT INTO `yunzhi_route` VALUES ('1', '1', '1', '1', '1', '1', '1', '3', '这是一个路线比较简短的描述信息', '3', '3', '9688', '9000', '1', '5', '这个是一个路线的内容的详细描述');
INSERT INTO `yunzhi_route` VALUES ('2', '1', '1', '1', '1', '1', '1', '1', '路线的描述信息2', '2', '2', '9655', '9500', '1', '5', '这是路线的详细描述2');
INSERT INTO `yunzhi_route` VALUES ('3', '1', '2', null, null, null, null, null, '', null, null, null, null, null, null, '');
INSERT INTO `yunzhi_route` VALUES ('4', '2', '2', null, null, null, null, null, '', null, null, null, null, null, null, '');

-- ----------------------------
-- Table structure for `yunzhi_start`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_start`;
CREATE TABLE `yunzhi_start` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT '' COMMENT '城市名称',
  `pictureurl` varchar(80) DEFAULT NULL COMMENT '图片url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_start
-- ----------------------------
INSERT INTO `yunzhi_start` VALUES ('1', '天津', '127.0.0.1/tour/public');
INSERT INTO `yunzhi_start` VALUES ('2', '北京', '127.0.0.1/tour/public');

-- ----------------------------
-- Table structure for `yunzhi_starttime`
-- ----------------------------
DROP TABLE IF EXISTS `yunzhi_starttime`;
CREATE TABLE `yunzhi_starttime` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '出发时间id',
  `route_id` int(10) DEFAULT NULL COMMENT '路线id',
  `money` int(10) DEFAULT NULL COMMENT '应付金额',
  `date` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_starttime
-- ----------------------------
INSERT INTO `yunzhi_starttime` VALUES ('1', '1', '5999', '1');
INSERT INTO `yunzhi_starttime` VALUES ('2', '1', '58888', '2');
INSERT INTO `yunzhi_starttime` VALUES ('3', '2', '55555', '2');

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
  `carimgfonturl` varchar(200) DEFAULT '' COMMENT '身份证正面',
  `carimgversourl` varchar(200) DEFAULT '' COMMENT '身份证反面',
  PRIMARY KEY (`openid`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yunzhi_user
-- ----------------------------
INSERT INTO `yunzhi_user` VALUES ('1', 'oYIbNwFiyIJK25Ifro0LKww03N2g', '成杰', '1', '', '天津', '中国', 'http://wx.qlogo.cn/mmopen/QNa3GHaSEXJEQgUS2yro9XSXUAWgbia4q89UwsfXT9gz6uYGBM4d1sawbwQIn6wJlJpb7T8LhR6piaCic5r7TLbS8Yib2eI0xb27/0', null, null, '', '', '');
