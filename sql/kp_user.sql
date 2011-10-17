/*
Navicat MySQL Data Transfer

Source Server         : host
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-17 21:26:36
*/

SET FOREIGN_KEY_CHECKS=0;
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
  `return_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_user
-- ----------------------------
INSERT INTO `kp_user` VALUES ('14', '13801629524', '96e79218965eb72c92a549dd5a330112', 'sdf', '', '558459', null, null, null, null, null, null, null, null, null, '待审核', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-09 02:15:18', '2011-10-09 02:15:29', null);
INSERT INTO `kp_user` VALUES ('17', '18722222222', '96e79218965eb72c92a549dd5a330112', 's', '', '716278', '车主', '私家车', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:20:51', '2011-10-10 20:33:13', null);
INSERT INTO `kp_user` VALUES ('18', '13801629525', '96e79218965eb72c92a549dd5a330112', 'werw', '', '274243', '修理厂', '综合修理厂(二类资质)', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:54:23', '2011-10-10 20:54:45', null);
INSERT INTO `kp_user` VALUES ('19', '18602123533', '96e79218965eb72c92a549dd5a330112', 'qer', '', '443844', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 20:56:43', '2011-10-10 21:19:56', null);
INSERT INTO `kp_user` VALUES ('20', '18602122222', '96e79218965eb72c92a549dd5a330112', 'qer', '', '967068', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 21:08:31', '2011-10-10 22:01:46', null);
INSERT INTO `kp_user` VALUES ('22', '13333333333', '96e79218965eb72c92a549dd5a330112', 'ry', '', '952676', '厂商', '外资', 'sss', null, null, null, null, '111', null, '待审核', '11', null, '上海', '11', '11', '11', '111', '3', 'thumb_4e9300307316e.jpg', 'thumb_4e930037c1b05.JPG', 'thumb_4e93003c5b371.JPG', null, null, null, null, null, null, null, '2011-10-10 22:14:33', '2011-10-10 22:25:03', null);
INSERT INTO `kp_user` VALUES ('23', '13111111111', '96e79218965eb72c92a549dd5a330112', 'try', '', '772967', '经销商', '代理', null, null, null, null, null, '111', null, '待审核', '111', null, '上海', '111', '11', '11', '11', '2', 'thumb_4e930439227e0.jpg', 'thumb_4e93043c259bb.jpg', 'thumb_4e93043fa1907.jpg', null, null, null, null, null, null, null, '2011-10-10 22:41:12', '2011-10-10 22:42:09', null);
INSERT INTO `kp_user` VALUES ('24', '13911111111', '96e79218965eb72c92a549dd5a330112', 'uytu', '', '271057', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:33:14', '2011-10-10 23:33:32', null);
INSERT INTO `kp_user` VALUES ('25', '13222222223', '96e79218965eb72c92a549dd5a330112', 'yuyu', '', '807189', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-10 23:45:01', '2011-10-10 23:45:17', null);
INSERT INTO `kp_user` VALUES ('26', '13811111333', '96e79218965eb72c92a549dd5a330112', 'yi', '', '353042', '车队', '货车', null, null, null, null, null, '222222', null, '待审核', '22222', null, '上海', '222222', '222', '2222', null, '1', null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-11 00:35:16', '2011-10-11 14:05:58', null);
INSERT INTO `kp_user` VALUES ('27', '12333333333', '1a100d2c0dab19c4430e7d73762b3423', 'iwww', '', '903018', '经销商', '代理', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-11 19:46:16', '2011-10-11 19:47:07', null);
INSERT INTO `kp_user` VALUES ('29', '18602123505', '96e79218965eb72c92a549dd5a330112', 'tyuy', '', '182177', '厂商', '外资', null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-11 22:54:24', '2011-10-11 22:58:03', null);
INSERT INTO `kp_user` VALUES ('30', '18989898989', '96e79218965eb72c92a549dd5a330112', '昵称昵称昵称', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:03:31', '2011-10-12 00:03:31', null);
INSERT INTO `kp_user` VALUES ('31', '12333333332', '96e79218965eb72c92a549dd5a330112', '昵称昵称昵称', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:05:56', '2011-10-12 00:05:56', null);
INSERT INTO `kp_user` VALUES ('32', '13111111112', '96e79218965eb72c92a549dd5a330112', '中国人', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:20:20', '2011-10-12 00:20:20', null);
INSERT INTO `kp_user` VALUES ('33', '19999999999', '96e79218965eb72c92a549dd5a330112', '中国人', null, null, null, null, null, null, null, null, null, null, null, '已审核', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:32:53', '2011-10-12 20:11:59', null);
INSERT INTO `kp_user` VALUES ('34', '18888888888', '96e79218965eb72c92a549dd5a330112', '111111', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 00:38:14', '2011-10-12 00:38:14', null);
INSERT INTO `kp_user` VALUES ('40', '19999999998', '96e79218965eb72c92a549dd5a330112', '1111', null, null, null, null, null, null, null, null, null, null, null, '基本注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2011-10-12 14:59:55', '2011-10-12 15:00:13', null);
INSERT INTO `kp_user` VALUES ('73', '13816504282', null, null, null, '965777', null, null, '马慧珏', null, null, null, null, '上海外经贸广告有限公司', null, '基本注册', '番禺路390号时代大厦2202室', '上海', '上海', '200051', '021-62940133', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:58:32', '2011-10-13 21:58:32', null);
INSERT INTO `kp_user` VALUES ('74', '13945135358', null, null, null, '955697', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:47', '2011-10-13 21:59:47', null);
INSERT INTO `kp_user` VALUES ('75', '13945135359', null, null, null, '180419', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48', null);
INSERT INTO `kp_user` VALUES ('76', '13945135360', null, null, null, '429837', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48', null);
INSERT INTO `kp_user` VALUES ('77', '13945135362', null, null, null, '377239', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48', null);
INSERT INTO `kp_user` VALUES ('78', '13945135363', null, null, null, '986349', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48', null);
INSERT INTO `kp_user` VALUES ('79', '13945135365', null, null, null, '877722', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:48', '2011-10-13 21:59:48', null);
INSERT INTO `kp_user` VALUES ('80', '13945135366', null, null, null, '667031', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:49', '2011-10-13 21:59:49', null);
INSERT INTO `kp_user` VALUES ('81', '13945135367', null, null, null, '637725', null, null, '刘士臣', null, null, null, null, '哈尔滨嘉钡汽配商行', null, '基本注册', '哈尔滨市南岗区理治街1-5号', '黑龙江', '哈尔滨', '', '0451-86136551', null, null, null, null, null, null, null, null, null, null, '导入', '未激活', null, '2011-10-13 21:59:49', '2011-10-13 21:59:49', null);
INSERT INTO `kp_user` VALUES ('88', '18602123502', '96e79218965eb72c92a549dd5a330112', '躐人', '11', null, '经销商', '分销商', '', null, '0000-00-00', '', '', '111', '', '已审核', '111', '河南省', '信阳市', '11', '11', '11', '11', '1', '', '', 'thumb_4e9854c558c63.jpg', '', '', '', '', '导入', '已激活', '2011-10-17 21:24:30', '2011-10-14 23:26:18', '2011-10-17 21:24:30', '');
