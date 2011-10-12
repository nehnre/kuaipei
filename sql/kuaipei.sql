/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-11 22:21:37
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity
-- ----------------------------
INSERT INTO `kp_activity` VALUES ('7', '抽奖活动', '333', '33', '333', '333', '2011-10-15', '2011-10-23', null, null, null, null, '待审核', '0', '2011-10-09 00:50:43', '2011-10-09 00:50:43');
INSERT INTO `kp_activity` VALUES ('8', '抽奖活动', '444444', '444444444', '44444444444', '4444444444', '2011-10-27', '2011-10-30', null, null, null, null, '待审核', '0', '2011-10-09 00:55:25', '2011-10-09 00:55:25');
INSERT INTO `kp_activity` VALUES ('9', '抽奖活动', '8', '8', '888', '888', '2011-11-04', '2011-11-06', null, null, null, null, '待审核', '0', '2011-10-09 00:55:56', '2011-10-09 00:55:56');
INSERT INTO `kp_activity` VALUES ('10', '抽奖活动', '34', '44', '32423', '234', '2011-10-22', '2011-10-29', null, null, null, null, '待审核', '0', '2011-10-09 00:57:48', '2011-10-09 00:58:39');
INSERT INTO `kp_activity` VALUES ('11', '抽奖活动', '火车头买卖活动', '上海火车站', '开始：时间不定\r\n结束：任何人可以\r\n这样做可以吗？', '不能说话\r\n只能购买\r\n谱牒不算数，是这是规定\r\n不能说话', '2011-10-09', '2011-10-11', '4e909023c0021.jpg', '4e909023c0dfa.jpg', '4e909023c1f5f.jpg', '4e909023c2eb4.jpg', '待审核', '0', '2011-10-09 00:58:14', '2011-10-09 02:07:35');
INSERT INTO `kp_activity` VALUES ('12', '抽奖活动', '汽车坐垫抽奖活动', '上海科技网络游戏公司', '促销产品：汽车充气折叠靠垫\r\n促销类型：优惠券', '说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说3333\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明', '2011-10-09', '2011-10-11', '4e90825ca459c.jpg', '4e90825ca4aa3.jpg', '4e90825ca4f42.jpg', '4e90825ca578d.jpg', '待审核', '0', '2011-10-09 01:03:24', '2011-10-09 01:55:21');
INSERT INTO `kp_activity` VALUES ('13', '抽奖活动', '111111', '111111', '111111', '1111', '2010-01-01', '2010-01-02', '4e93066e96d88.jpg', '4e93066e97fb7.jpg', '4e93066e98f5d.jpg', '4e93066e9a14f.jpg', '待审核', '0', '2011-10-10 22:51:26', '2011-10-11 20:43:05');

-- ----------------------------
-- Table structure for `kp_activity_comment`
-- ----------------------------
DROP TABLE IF EXISTS `kp_activity_comment`;
CREATE TABLE `kp_activity_comment` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `kp_user`
-- ----------------------------
DROP TABLE IF EXISTS `kp_user`;
CREATE TABLE `kp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
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
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_user
-- ----------------------------
INSERT INTO `kp_user` VALUES ('4', '18602123502', '222222', 'nehnre@yahoo.com.cn', '122164', '厂商', '合资', '111111', '1', '1991-10-02', '工程师', '278729228', '万达信息', 'nehnre@yahoo.com.cn', '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-02 23:00:05', '2011-10-03 00:58:34');
INSERT INTO `kp_user` VALUES ('5', '13444444444', '333333', 'nehnre@yahoo.com.cn', '610067', '修理厂', '美容养护', '聂红雷', '1', '1984-09-11', '软件工程师', '278729228', 'sgst', 'niehonglei@gmail.com', '待审核', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-03 01:02:53', '2011-10-03 01:04:07');
INSERT INTO `kp_user` VALUES ('6', '18602123503', '111111', 'nehnre@yahoo.com.cn', '496496', '厂商', '外资', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-03 01:10:41', '2011-10-03 01:41:55');
INSERT INTO `kp_user` VALUES ('7', 'te1st', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-03 23:47:04', '2011-10-03 23:47:09');
INSERT INTO `kp_user` VALUES ('8', '18602123501', null, null, '163363', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-03 07:08:26', '2011-10-03 07:08:26');
INSERT INTO `kp_user` VALUES ('9', '18602123509', '88888888', 'ne@s.s', '271908', null, null, null, null, null, null, null, '1111111', null, null, null, '', '11111', '111', '1111', '111', '2', 'thumb_4e89cc865f4e0.jpg', 'thumb_4e89cc896a0d8.jpg', 'thumb_4e89cc8ce645d.jpg', null, null, null, null, null, '2011-10-03 21:37:52', '2011-10-03 21:38:16');
INSERT INTO `kp_user` VALUES ('10', '18702123502', '333333', 'nehnre@yahoo.com.cn', '872833', '厂商', '外资', null, null, null, null, null, '33', null, null, null, '上海', '333333', '3333', '33', '33', '1', 'thumb_4e89d8875483c.jpg', 'thumb_4e89d88c2c3b4.jpg', 'thumb_4e89d890b0cc9.jpg', null, null, null, null, null, '2011-10-03 23:47:11', '2011-10-03 23:53:53');
INSERT INTO `kp_user` VALUES ('11', '18922222222', '111111', 'nehnre@yahoo.com.cn', '667636', '经销商', '分销商', null, null, null, null, null, '111111', null, '待审核', '企业地址', '广州', '111111', '111111', '111', '111', '1', 'thumb_4e8d5a10ed3c5.jpg', 'thumb_4e8d5a13ef125.jpg', 'thumb_4e8d5a1647ebb.jpg', null, null, null, null, '导入', '2011-10-04 00:26:33', '2011-10-06 19:33:09');
INSERT INTO `kp_user` VALUES ('12', '18603123502', '111111', '', '916448', '车主', '商用车', '聂红雷', '1', '1984-09-11', null, null, null, null, '待审核', null, null, null, null, null, null, null, null, null, 'thumb_4e89eda72088a.jpg', 'ddd', 'ddd', null, null, null, '2011-10-04 01:13:59', '2011-10-04 01:15:29');
INSERT INTO `kp_user` VALUES ('13', '18900000000', '111111', 'nehnre@yahoo.com.cn', '463592', '经销商', '代理', null, null, null, null, null, null, null, '待审核', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-06 19:33:57', '2011-10-06 20:11:23');
INSERT INTO `kp_user` VALUES ('14', '13801629524', '96e79218965eb72c92a549dd5a330112', '', '558459', null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-09 02:15:18', '2011-10-09 02:15:29');
INSERT INTO `kp_user` VALUES ('15', '18202123501', null, null, '922189', null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 19:55:39', '2011-10-10 19:55:39');
INSERT INTO `kp_user` VALUES ('16', '13222222222', null, null, '303933', null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:19:24', '2011-10-10 20:19:24');
INSERT INTO `kp_user` VALUES ('17', '18722222222', '96e79218965eb72c92a549dd5a330112', '', '716278', '车主', '私家车', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:20:51', '2011-10-10 20:33:13');
INSERT INTO `kp_user` VALUES ('18', '13801629525', '96e79218965eb72c92a549dd5a330112', '', '274243', '修理厂', '综合修理厂(二类资质)', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:54:23', '2011-10-10 20:54:45');
INSERT INTO `kp_user` VALUES ('19', '18602123533', '96e79218965eb72c92a549dd5a330112', '', '443844', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:56:43', '2011-10-10 21:19:56');
INSERT INTO `kp_user` VALUES ('20', '18602122222', '96e79218965eb72c92a549dd5a330112', '', '967068', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 21:08:31', '2011-10-10 22:01:46');
INSERT INTO `kp_user` VALUES ('21', '13801629583', null, null, '128317', null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 21:58:21', '2011-10-10 21:58:21');
INSERT INTO `kp_user` VALUES ('22', '13333333333', '96e79218965eb72c92a549dd5a330112', '', '952676', '厂商', '外资', null, null, null, null, null, '111', null, '待审核', '11', '上海', '11', '11', '11', '111', '3', 'thumb_4e9300307316e.jpg', 'thumb_4e930037c1b05.JPG', 'thumb_4e93003c5b371.JPG', null, null, null, null, null, '2011-10-10 22:14:33', '2011-10-10 22:25:03');
INSERT INTO `kp_user` VALUES ('23', '13111111111', '96e79218965eb72c92a549dd5a330112', '', '772967', '经销商', '代理', null, null, null, null, null, '111', null, '待审核', '111', '上海', '111', '11', '11', '11', '2', 'thumb_4e930439227e0.jpg', 'thumb_4e93043c259bb.jpg', 'thumb_4e93043fa1907.jpg', null, null, null, null, null, '2011-10-10 22:41:12', '2011-10-10 22:42:09');
INSERT INTO `kp_user` VALUES ('24', '13911111111', '96e79218965eb72c92a549dd5a330112', '', '271057', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:33:14', '2011-10-10 23:33:32');
INSERT INTO `kp_user` VALUES ('25', '13222222223', '96e79218965eb72c92a549dd5a330112', '', '807189', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:45:01', '2011-10-10 23:45:17');
INSERT INTO `kp_user` VALUES ('26', '13811111333', '96e79218965eb72c92a549dd5a330112', '', '353042', '车队', '货车', null, null, null, null, null, '222222', null, '待审核', '22222', '上海', '222222', '222', '2222', null, '1', null, null, null, null, null, null, null, '导入', '2011-10-11 00:35:16', '2011-10-11 14:05:58');
INSERT INTO `kp_user` VALUES ('27', '12333333333', '1a100d2c0dab19c4430e7d73762b3423', '', '903018', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-11 19:46:16', '2011-10-11 19:47:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_userlog
-- ----------------------------
INSERT INTO `kp_userlog` VALUES ('1', '14', 'kp_user', '14', '登录一次', '2011-10-09 03:28:40');
INSERT INTO `kp_userlog` VALUES ('2', '14', 'kp_user', '14', '登录一次', '2011-10-09 04:07:31');
INSERT INTO `kp_userlog` VALUES ('3', '14', 'kp_activity', '12', '参加活动一次', '2011-10-09 04:14:19');
INSERT INTO `kp_userlog` VALUES ('4', '14', 'kp_user', '14', '登录一次', '2011-10-09 04:16:27');
INSERT INTO `kp_userlog` VALUES ('5', '14', 'kp_user', '14', '登录一次', '2011-10-09 04:17:36');
INSERT INTO `kp_userlog` VALUES ('6', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:25:22');
INSERT INTO `kp_userlog` VALUES ('7', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:28:16');
INSERT INTO `kp_userlog` VALUES ('8', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:31:33');
INSERT INTO `kp_userlog` VALUES ('9', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:32:49');
INSERT INTO `kp_userlog` VALUES ('10', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:35:37');
INSERT INTO `kp_userlog` VALUES ('11', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:38:07');
INSERT INTO `kp_userlog` VALUES ('12', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:38:51');
INSERT INTO `kp_userlog` VALUES ('13', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:39:03');
INSERT INTO `kp_userlog` VALUES ('14', '22', 'kp_user', '22', '登录一次', '2011-10-10 22:39:43');
INSERT INTO `kp_userlog` VALUES ('15', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:42:29');
INSERT INTO `kp_userlog` VALUES ('16', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:42:53');
INSERT INTO `kp_userlog` VALUES ('17', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:44:01');
INSERT INTO `kp_userlog` VALUES ('18', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:45:10');
INSERT INTO `kp_userlog` VALUES ('19', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:47:01');
INSERT INTO `kp_userlog` VALUES ('20', '23', 'kp_user', '23', '登录一次', '2011-10-10 22:47:28');
INSERT INTO `kp_userlog` VALUES ('21', '23', 'kp_user', '23', '登录一次', '2011-10-10 23:44:32');
INSERT INTO `kp_userlog` VALUES ('22', '23', 'kp_user', '23', '登录一次', '2011-10-11 00:15:01');
INSERT INTO `kp_userlog` VALUES ('23', '26', 'kp_user', '26', '登录一次', '2011-10-11 14:04:56');

-- ----------------------------
-- View structure for `kp_vuserlog`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vuserlog`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vuserlog` AS select `t2`.`id` AS `id`,`t1`.`user_name` AS `user_name`,`t2`.`act_describ` AS `act_describ`,`t2`.`insert_time` AS `insert_time` from (`kp_user` `t1` join `kp_userlog` `t2`) where (`t1`.`id` = `t2`.`user_id`);
