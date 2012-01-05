/*
Navicat MySQL Data Transfer

Source Server         : host
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-01-05 21:29:12
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
  `detail_text` text,
  `related_product` text,
  `related_product_pic` varchar(200) DEFAULT NULL,
  `product_story` text,
  `product_story_pic` varchar(200) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `topad_pic` varchar(200) DEFAULT NULL,
  `activity_pic` varchar(200) DEFAULT NULL,
  `detail_pic` varchar(200) DEFAULT NULL,
  `index_pic` varchar(200) DEFAULT NULL,
  `index_change_pic` varchar(200) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `start_birthday` date DEFAULT NULL,
  `end_birthday` date DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `repeat_num` int(11) DEFAULT NULL,
  `total_num` int(11) DEFAULT NULL,
  `province` varchar(1000) DEFAULT NULL,
  `city` varchar(1000) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `url_height` int(11) DEFAULT NULL,
  `activity_call` varchar(200) DEFAULT NULL,
  `user_status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity
-- ----------------------------
INSERT INTO `kp_activity` VALUES ('34', '免费试用', '汽车坐垫抽奖活动', '上海科技网络游戏公司', '促销产品：汽车充气折叠靠垫\r\n促销类型：优惠券', '说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明', '', '', null, '', null, '2011-10-12', '2011-10-30', '4e9598e8c5dfc.jpg', '4e9598e8c6d9e.jpg', '4e9598e8c7d3b.jpg', '4e9598e8c94a8.jpg', null, '我们,的家', '已发布', '0', '2011-10-12 21:40:56', '10', '2011-12-20 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `kp_activity` VALUES ('35', '免费试用', '汽车加油卡抽奖活动', '上海大众公司', '活动性质：公益\r\n活动类别：抽奖', '所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网', '', '', null, '', null, '2011-10-12', '2011-10-14', '4e9599975b317.jpg', '4e9599975c2b6.jpg', '4e9599975d257.jpg', '4e9eb321a4593.jpg', null, '志向,远大', '已发布', '0', '2011-10-12 21:43:51', '0', '2011-12-20 00:00:00', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `kp_activity` VALUES ('36', '抽奖活动', '活动标题', '主办方', '活动介绍', '活动说明', 'sdfsdf', '<span class=\"Apple-style-span\" style=\"font-family:宋体;line-height:normal;\"><span style=\"background-color:#e53333;\">相关产</span>品</span>', null, '<span class=\"Apple-style-span\" style=\"font-family:宋体;line-height:normal;\">牌故事</span>', null, '2011-10-19', '2011-10-30', null, null, null, '4e9ee41a31590.jpg', null, null, '已发布', '0', '2011-10-19 22:52:10', null, '2011-10-31 21:48:56', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `kp_activity` VALUES ('37', '在线调查', 'sdfsdf', 'sdf', 'sdfsd', 'sdfsd活动说', '<i><span style=\"background-color:#e56600;\">金金金金金222222222222222222金金金金金金<img src=\"/kindeditor/attached/image/20111022/20111022042219_87950.jpg\" alt=\"\" /></span></i>', '', null, '', null, '2011-12-07', '2011-12-22', null, null, null, '4ea245819f867.jpg', '4ea246c5a51c8.png', '中国,哈哈,我们', '已发布', '0', '2011-10-19 22:55:43', null, '2011-12-21 22:00:12', '1,2', '0000-00-00', '0000-00-00', null, '3', '0', null, null, null, null, null, null);
INSERT INTO `kp_activity` VALUES ('39', '在线调查', '1', '1', '1', '1', '1', '1', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:56:47', '0', '2011-12-02 16:30:54', null, null, null, null, null, null, null, null, 'http://www.diaochapai.com/survey/cec55509-31e2-40fd-bb78-b17965484c19', '1110', null, null);
INSERT INTO `kp_activity` VALUES ('40', '厂商活动', 'test1', 'test1', 'test1', 'test1', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:56:58', '0', '2011-12-05 16:46:46', null, null, null, null, null, null, null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('41', '厂商活动', '3', '', '', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:57:10', '0', '2011-12-05 00:00:00', null, null, null, null, null, null, null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('42', '厂商活动', '333', '', '', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:57:20', '0', '2011-12-05 00:00:00', null, null, null, null, null, null, null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('43', '厂商活动', '444', '', '', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:57:26', '0', '2011-12-05 00:00:00', null, null, null, null, null, null, null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('44', '厂商活动', '233223', '', '', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:57:36', '0', '2011-12-05 00:00:00', null, '0000-00-00', '0000-00-00', null, '0', '0', null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('45', '厂商活动', '2323323424', '', '', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-15 14:57:43', '0', '2011-12-05 16:39:22', null, null, null, null, null, null, null, null, 'http://kuaipei/Activity/show?id=39', '0', null, null);
INSERT INTO `kp_activity` VALUES ('46', '厂商活动', 'eeee', 'ee', 'werwwr', '', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-11-18 15:15:41', '0', '2011-12-05 00:00:00', null, '1991-11-07', '1991-11-06', null, '0', '0', null, null, '', '0', null, null);
INSERT INTO `kp_activity` VALUES ('47', '免费试用', 'eee', 'ee', 'e', 'e', 'ee', 'eeeeeeeeeee', null, 'eeeeeeeeeeeee', null, '2011-12-07', '2011-12-20', null, null, null, null, null, '', '已发布', '0', '2011-11-22 13:29:21', '0', '2011-12-07 14:38:28', null, '2011-11-23', '2011-11-30', null, '3', '1', null, null, '', '0', '', null);
INSERT INTO `kp_activity` VALUES ('48', '厂商活动', '曼牌-空调滤清器CU-19-003曼牌-空调滤清器CU-19-003', '曼牌-空调滤清器CU-19-003曼牌-空调滤清器CU-19-003', 'rr', '', '<strong> <p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;font-size:small;\">1、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">剪下两个</span><span lang=\"DE\"><span style=\"font-family:Arial;\">LuK</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">双质量飞轮离合器套装</span><span lang=\"DE\"><span style=\"font-family:Arial;\">25</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">周年标贴（须连同包装盒一同剪下），寄回舍弗勒贸易（上海）有限公司汽车售后市场部</span></span></strong></p>\r\n<span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\"> <p><a href=\"http://www.snscar.cn/data/attachment/portal/201111/01/212640ylw33k5nzpql2hny.png\" target=\"_blank\"></a></p>\r\n<p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;\">2、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">请在邮寄时，使用正楷完整填写寄件人信息，包括维修厂名称、维修厂地址、联系人、电话，以便赠品准确发送。</span></strong></p>\r\n</span></span></strong>', '<span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\"><strong> <p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;font-size:small;\">1、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">剪下两个</span><span lang=\"DE\"><span style=\"font-family:Arial;\">LuK</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">双质量飞轮离合器套装</span><span lang=\"DE\"><span style=\"font-family:Arial;\">25</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">周年标贴（须连同包装盒一同剪下），寄回舍弗勒贸易（上海）有限公司汽车售后市场部</span></span></strong></p>\r\n<span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\"> <p><a href=\"http://www.snscar.cn/data/attachment/portal/201111/01/212640ylw33k5nzpql2hny.png\" target=\"_blank\"></a></p>\r\n<p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;\">2、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">请在邮寄时，使用正楷完整填写寄件人信息，包括维修厂名称、维修厂地址、联系人、电话，以便赠品准确发送。</span></strong></p>\r\n</span></span></strong></span></span>', '4edede335a964.jpg', '<span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\"><strong> <p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;font-size:small;\">1、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">剪下两个</span><span lang=\"DE\"><span style=\"font-family:Arial;\">LuK</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">双质量飞轮离合器套装</span><span lang=\"DE\"><span style=\"font-family:Arial;\">25</span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">周年标贴（须连同包装盒一同剪下），寄回舍弗勒贸易（上海）有限公司汽车售后市场部</span></span></strong></p>\r\n<span style=\"font-size:small;\"><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\"> <p><a href=\"http://www.snscar.cn/data/attachment/portal/201111/01/212640ylw33k5nzpql2hny.png\" target=\"_blank\"></a></p>\r\n<p style=\"text-justify:inter-ideograph;text-align:justify;text-indent:-18pt;margin:0cm 0cm 0pt 18pt;mso-pagination:none;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt;\" class=\"MsoNormal\"><strong><span style=\"mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;\" lang=\"DE\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:Arial;\">2、</span><span style=\"font:7pt \'Times New Roman\';\"> </span></span></span><span style=\"font-family:宋体;mso-ascii-font-family:Arial;mso-hansi-font-family:Arial;\" lang=\"DE\">请在邮寄时，使用正楷完整填写寄件人信息，包括维修厂名称、维修厂地址、联系人、电话，以便赠品准确发送。</span></strong></p>\r\n</span></span></strong></span></span>', null, '2011-11-28', '2011-11-28', null, '4eddd850cd59f.jpg', null, '4ef2ac198ed9b.jpg', '4eddd80d66d33.jpg', '', '已发布', '0', '2011-11-22 16:12:24', '0', '2011-12-22 12:03:37', null, '0000-00-00', '0000-00-00', null, '0', '0', null, null, '22', '0', '021-39576523', null);
INSERT INTO `kp_activity` VALUES ('49', '免费试用', 'eeeeeeeeeeeeeeee', '33333', '3333', '333', '', '', null, '', null, '0000-00-00', '0000-00-00', null, null, null, null, null, '', '已发布', '0', '2011-12-06 22:26:01', '0', '2012-01-05 16:52:18', null, '0000-00-00', '0000-00-00', null, '0', '0', null, null, '', '0', '', '已审核');
