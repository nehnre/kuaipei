/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-15 19:20:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `kp_activity`
-- ----------------------------
DROP TABLE IF EXISTS `kp_activity`;
CREATE TABLE `kp_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `sponsor` varchar(200) DEFAULT NULL,
  `introduce` varchar(800) DEFAULT NULL,
  `describ_text` varchar(800) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `topad_pic` varchar(200) DEFAULT NULL,
  `activity_pic` varchar(200) DEFAULT NULL,
  `detail_pic` varchar(200) DEFAULT NULL,
  `index_pic` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity
-- ----------------------------
INSERT INTO `kp_activity` VALUES ('33', '抽奖活动', '汽车坐垫抽奖活动', '上海科技网络游戏公司', '促销产品：汽车充气折叠靠垫\r\n促销类型：优惠券', '说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明', '2011-10-12', '2011-10-30', '4e9598d316aba.jpg', '4e9598d31766c.jpg', '4e9598d318228.jpg', '4e9598d3195ae.jpg', '预览', '0', '2011-10-12 21:40:35', '2011-10-12 21:40:35');
INSERT INTO `kp_activity` VALUES ('34', '抽奖活动', '汽车坐垫抽奖活动', '上海科技网络游戏公司', '促销产品：汽车充气折叠靠垫\r\n促销类型：优惠券', '说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明', '2011-10-12', '2011-10-30', '4e9598e8c5dfc.jpg', '4e9598e8c6d9e.jpg', '4e9598e8c7d3b.jpg', '4e9598e8c94a8.jpg', '已发布', '0', '2011-10-12 21:40:56', '2011-10-12 00:00:00');
INSERT INTO `kp_activity` VALUES ('35', '抽奖活动', '汽车加油卡抽奖活动', '上海大众公司', '活动性质：公益\r\n活动类别：抽奖', '所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网', '2011-10-12', '2011-10-14', '4e9599975b317.jpg', '4e9599975c2b6.jpg', '4e9599975d257.jpg', '4e9599975e9c4.jpg', '已发布', '0', '2011-10-12 21:43:51', '2011-10-12 00:00:00');

-- ----------------------------
-- Table structure for `kp_activity_comment`
-- ----------------------------
DROP TABLE IF EXISTS `kp_activity_comment`;
CREATE TABLE `kp_activity_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity_comment
-- ----------------------------
INSERT INTO `kp_activity_comment` VALUES ('5', '33', '34', '这次活动很好', '使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 使用背带的好处 ', '2011-10-12 22:46:54');
INSERT INTO `kp_activity_comment` VALUES ('6', '33', '34', '1111111', '1111111111', '2011-10-12 23:19:35');
INSERT INTO `kp_activity_comment` VALUES ('7', '33', '34', '说话', '说话 说话说话 ', '2011-10-12 23:37:41');
INSERT INTO `kp_activity_comment` VALUES ('8', '33', '34', '可想而知', '工工工工工工', '2011-10-12 23:38:14');
INSERT INTO `kp_activity_comment` VALUES ('9', '33', '35', '1111111', '1111111111111', '2011-10-12 23:43:05');
INSERT INTO `kp_activity_comment` VALUES ('10', '86', '34', 'teee', 'ssssssssssss', '2011-10-14 19:23:24');
INSERT INTO `kp_activity_comment` VALUES ('11', '86', '34', 'sdsssssssssssss', 'ssssssssssssss', '2011-10-14 19:23:59');
INSERT INTO `kp_activity_comment` VALUES ('12', '86', '34', 'sdfsd', 'fsfsdfsdf', '2011-10-14 19:24:43');

-- ----------------------------
-- Table structure for `kp_subscribe`
-- ----------------------------
DROP TABLE IF EXISTS `kp_subscribe`;
CREATE TABLE `kp_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_subscribe
-- ----------------------------
INSERT INTO `kp_subscribe` VALUES ('1', 'nehnre@yahoo.com.cn', '2011-10-14 20:22:33');

-- ----------------------------
-- Table structure for `kp_user`
-- ----------------------------
DROP TABLE IF EXISTS `kp_user`;
CREATE TABLE `kp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nick_name` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `check_num` varchar(6) DEFAULT NULL,
  `user_type1` varchar(100) DEFAULT NULL,
  `user_type2` varchar(100) DEFAULT NULL,
  `true_name` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `msn` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `company_address` varchar(200) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `post_code` varchar(50) DEFAULT NULL,
  `business_call` varchar(50) DEFAULT NULL,
  `link_man` varchar(50) DEFAULT NULL,
  `business_scope` varchar(100) DEFAULT NULL,
  `company_scale` varchar(50) DEFAULT NULL,
  `business_license` varchar(200) DEFAULT NULL,
  `address_pic` varchar(200) DEFAULT NULL,
  `business_card` varchar(200) DEFAULT NULL,
  `car_brand` varchar(50) DEFAULT NULL,
  `car_model` varchar(100) DEFAULT NULL,
  `driving_license` varchar(200) DEFAULT NULL,
  `vehicle_license` varchar(200) DEFAULT NULL,
  `import_flag` varchar(50) DEFAULT NULL,
  `activite_flag` varchar(50) DEFAULT NULL,
  `audit_time` datetime DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_user
-- ----------------------------
INSERT INTO `kp_user` VALUES ('14', '13801629524', '96e79218965eb72c92a549dd5a330112', 'sdf', '', '558459', null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-09 02:15:18', '2011-10-09 02:15:29');
INSERT INTO `kp_user` VALUES ('17', '18722222222', '96e79218965eb72c92a549dd5a330112', 's', '', '716278', '车主', '私家车', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:20:51', '2011-10-10 20:33:13');
INSERT INTO `kp_user` VALUES ('18', '13801629525', '96e79218965eb72c92a549dd5a330112', 'werw', '', '274243', '修理厂', '综合修理厂(二类资质)', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:54:23', '2011-10-10 20:54:45');
INSERT INTO `kp_user` VALUES ('19', '18602123533', '96e79218965eb72c92a549dd5a330112', 'qer', '', '443844', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:56:43', '2011-10-10 21:19:56');
INSERT INTO `kp_user` VALUES ('20', '18602122222', '96e79218965eb72c92a549dd5a330112', 'qer', '', '967068', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 21:08:31', '2011-10-10 22:01:46');
INSERT INTO `kp_user` VALUES ('22', '13333333333', '96e79218965eb72c92a549dd5a330112', 'ry', '', '952676', '厂商', '外资', 'sss', null, null, null, null, '111', null, '待审核', '11', null, '上海', '11', '11', '11', '111', '3', 'thumb_4e9300307316e.jpg', 'thumb_4e930037c1b05.JPG', 'thumb_4e93003c5b371.JPG', null, null, null, null, null, null, null, '2011-10-10 22:14:33', '2011-10-10 22:25:03');
INSERT INTO `kp_user` VALUES ('23', '13111111111', '96e79218965eb72c92a549dd5a330112', 'try', '', '772967', '经销商', '代理', null, null, null, null, null, '111', null, '待审核', '111', null, '上海', '111', '11', '11', '11', '2', 'thumb_4e930439227e0.jpg', 'thumb_4e93043c259bb.jpg', 'thumb_4e93043fa1907.jpg', null, null, null, null, null, null, null, '2011-10-10 22:41:12', '2011-10-10 22:42:09');
INSERT INTO `kp_user` VALUES ('24', '13911111111', '96e79218965eb72c92a549dd5a330112', 'uytu', '', '271057', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:33:14', '2011-10-10 23:33:32');
INSERT INTO `kp_user` VALUES ('25', '13222222223', '96e79218965eb72c92a549dd5a330112', 'yuyu', '', '807189', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:45:01', '2011-10-10 23:45:17');
INSERT INTO `kp_user` VALUES ('26', '13811111333', '96e79218965eb72c92a549dd5a330112', 'yi', '', '353042', '车队', '货车', null, null, null, null, null, '222222', null, '待审核', '22222', null, '上海', '222222', '222', '2222', null, '1', null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-11 00:35:16', '2011-10-11 14:05:58');
INSERT INTO `kp_user` VALUES ('27', '12333333333', '1a100d2c0dab19c4430e7d73762b3423', 'iwww', '', '903018', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-11 19:46:16', '2011-10-11 19:47:07');
INSERT INTO `kp_user` VALUES ('29', '18602123505', '96e79218965eb72c92a549dd5a330112', 'tyuy', '', '182177', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-11 22:54:24', '2011-10-11 22:58:03');
INSERT INTO `kp_user` VALUES ('30', '18989898989', '96e79218965eb72c92a549dd5a330112', '昵称昵称昵称', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:03:31', '2011-10-12 00:03:31');
INSERT INTO `kp_user` VALUES ('31', '12333333332', '96e79218965eb72c92a549dd5a330112', '昵称昵称昵称', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:05:56', '2011-10-12 00:05:56');
INSERT INTO `kp_user` VALUES ('32', '13111111112', '96e79218965eb72c92a549dd5a330112', '中国人', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:20:20', '2011-10-12 00:20:20');
INSERT INTO `kp_user` VALUES ('33', '19999999999', '96e79218965eb72c92a549dd5a330112', '中国人', null, null, null, null, null, null, null, null, null, null, null, '已审核', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:32:53', '2011-10-12 20:11:59');
INSERT INTO `kp_user` VALUES ('34', '18888888888', '96e79218965eb72c92a549dd5a330112', '111111', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:38:14', '2011-10-12 00:38:14');
INSERT INTO `kp_user` VALUES ('40', '19999999998', '96e79218965eb72c92a549dd5a330112', '1111', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 14:59:55', '2011-10-12 15:00:13');
INSERT INTO `kp_user` VALUES ('73', '13816504282', null, null, null, '965777', null, null, '马慧珏', null, null, null, null, '上海外经贸广告有限公司', null, '基本注册', '番禺路390号时代大厦2202室', '上海', '上海', '200051', '021-62940133', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:58:32', '2011-10-13 21:58:32');
INSERT INTO `kp_user` VALUES ('74', '13945135358', null, null, null, '955697', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:47', '2011-10-13 21:59:47');
INSERT INTO `kp_user` VALUES ('75', '13945135359', null, null, null, '180419', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48');
INSERT INTO `kp_user` VALUES ('76', '13945135360', null, null, null, '429837', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48');
INSERT INTO `kp_user` VALUES ('77', '13945135362', null, null, null, '377239', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48');
INSERT INTO `kp_user` VALUES ('78', '13945135363', null, null, null, '986349', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48');
INSERT INTO `kp_user` VALUES ('79', '13945135365', null, null, null, '877722', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48');
INSERT INTO `kp_user` VALUES ('80', '13945135366', null, null, null, '667031', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:49', '2011-10-13 21:59:49');
INSERT INTO `kp_user` VALUES ('81', '13945135367', null, null, null, '637725', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:49', '2011-10-13 21:59:49');
INSERT INTO `kp_user` VALUES ('88', '18602123502', '96e79218965eb72c92a549dd5a330112', '躐人', '11', null, '车队', '货车', null, null, null, null, null, '111', null, '已审核', '111', '河南省', '信阳市', '11', '11', '11', '11', '1', '', '', 'thumb_4e9854c558c63.jpg', null, null, null, null, '导入', '已激活', null, '2011-10-14 23:26:18', '2011-10-15 02:21:38');

-- ----------------------------
-- Table structure for `kp_userlog`
-- ----------------------------
DROP TABLE IF EXISTS `kp_userlog`;
CREATE TABLE `kp_userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `act_describ` varchar(200) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_userlog
-- ----------------------------
INSERT INTO `kp_userlog` VALUES ('43', '88', 'kp_activity', '34', '参加抽奖活动一次', '2011-10-15 01:57:51');
INSERT INTO `kp_userlog` VALUES ('44', '88', 'kp_user', '88', '登录一次', '2011-10-15 02:12:38');

-- ----------------------------
-- View structure for `kp_vactivity_comment`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vactivity_comment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vactivity_comment` AS select `t2`.`id` AS `id`,`t1`.`nick_name` AS `nick_name`,`t2`.`title` AS `title`,`t2`.`content` AS `content`,`t2`.`insert_time` AS `insert_time`,`t2`.`activity_id` AS `activity_id` from (`kp_user` `t1` join `kp_activity_comment` `t2`) where (`t1`.`id` = `t2`.`user_id`);

-- ----------------------------
-- View structure for `kp_vuserlog`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vuserlog`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vuserlog` AS select `t2`.`id` AS `id`,`t1`.`nick_name` AS `nick_name`,`t3`.`sponsor` AS `sponsor`,`t2`.`insert_time` AS `insert_time` from ((`kp_user` `t1` join `kp_userlog` `t2`) join `kp_activity` `t3`) where ((`t1`.`id` = `t2`.`user_id`) and (`t2`.`table_name` = 'kp_activity') and (`t3`.`id` = `t2`.`table_id`));
