/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-23 17:10:26
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
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `topad_pic` varchar(200) DEFAULT NULL,
  `activity_pic` varchar(200) DEFAULT NULL,
  `detail_pic` varchar(200) DEFAULT NULL,
  `index_pic` varchar(200) DEFAULT NULL,
  `index_change_pic` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_activity
-- ----------------------------
INSERT INTO `kp_activity` VALUES ('34', '抽奖活动', '汽车坐垫抽奖活动', '上海科技网络游戏公司', '促销产品：汽车充气折叠靠垫\r\n促销类型：优惠券', '说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明\r\n说明说明说明说明说明说明说明说明说明说明', null, '2011-10-12', '2011-10-30', '4e9598e8c5dfc.jpg', '4e9598e8c6d9e.jpg', '4e9598e8c7d3b.jpg', '4e9598e8c94a8.jpg', null, '已发布', '0', '2011-10-12 21:40:56', '2011-10-12 00:00:00');
INSERT INTO `kp_activity` VALUES ('35', '抽奖活动', '汽车加油卡抽奖活动', '上海大众公司', '活动性质：公益\r\n活动类别：抽奖', '所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网\r\n所有解释权归立配网', null, '2011-10-12', '2011-10-14', '4e9599975b317.jpg', '4e9599975c2b6.jpg', '4e9599975d257.jpg', '4e9eb321a4593.jpg', null, '已发布', '0', '2011-10-12 21:43:51', '2011-10-19 19:23:13');
INSERT INTO `kp_activity` VALUES ('36', '抽奖活动', '活动标题', '主办方', '活动介绍', '活动说明', null, '2011-10-19', '2011-10-30', null, null, null, '4e9ee41a31590.jpg', null, '已发布', '0', '2011-10-19 22:52:10', '2011-10-19 00:00:00');
INSERT INTO `kp_activity` VALUES ('37', '抽奖活动', 'sdfsdf', 'sdf', 'sdfsd', 'sdfsd活动说', '<i><span style=\"background-color:#e56600;\">金金金金金222222222222222222金金金金金金<img src=\"/kindeditor/attached/image/20111022/20111022042219_87950.jpg\" alt=\"\" /></span></i>', '2011-10-19', '2011-11-04', null, null, null, '4ea245819f867.jpg', '4ea246c5a51c8.png', '已发布', '0', '2011-10-19 22:55:43', '2011-10-22 12:35:07');
INSERT INTO `kp_activity` VALUES ('38', '抽奖活动', '', '', '', '', '<span style=\"background-color:#e53333;\">asdasdasdas</span>', '0000-00-00', '0000-00-00', null, null, null, null, null, '预览', '0', '2011-10-22 12:38:54', '2011-10-22 12:38:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
INSERT INTO `kp_activity_comment` VALUES ('13', '1216', '37', '我的评论', '我的评论我的评论我的评论我的评论我的评论我的评论我的评论', '2011-10-22 19:36:52');

-- ----------------------------
-- Table structure for `kp_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `kp_admin_user`;
CREATE TABLE `kp_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_admin_user
-- ----------------------------
INSERT INTO `kp_admin_user` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '2011-10-09 02:15:18', '2011-10-09 02:15:18');

-- ----------------------------
-- Table structure for `kp_information_column`
-- ----------------------------
DROP TABLE IF EXISTS `kp_information_column`;
CREATE TABLE `kp_information_column` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `column` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `editor` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `publish_time` date DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text,
  `search_tags` varchar(100) DEFAULT NULL,
  `related_tags` varchar(100) DEFAULT NULL,
  `seq` int(10) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_information_column
-- ----------------------------
INSERT INTO `kp_information_column` VALUES ('7', '汽配热点', 'e', 'ee', 'e', 'ee', '已发布', '2011-10-20', null, '', null, null, '5', '2011-10-20 00:00:00', '2011-10-20 00:00:00');
INSERT INTO `kp_information_column` VALUES ('9', '汽配热点', '22', '22', '22', '22', '已发布', '2011-10-22', '', '2222222222', '1', '1', '3', '2011-10-20 00:00:00', '2011-10-22 00:00:00');
INSERT INTO `kp_information_column` VALUES ('12', '汽配热点', '原价28元DHC试用装6件套原价28元DHC试用装6件套原价28元DHC试用装6件套', '333333333', '333', '33', '已发布', '2011-10-20', 'thumb_4ea01cf041762.jpg', '@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E1.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@E4@B8@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@BF@AE@E6@94@B9@E2@80@9D@E7@9A@84@E6@9D@83@E9@99@90@E3@80@82@E5@9B@A0@E8@AE@A4@E5@AE@9A@E7@A8@8B@E5@BA@8F@E7@9A@84@E4@BF@AE@E6@94@B9@EF@BC@8C@E7@8E@B0@E7@94@B1@E5@90@84@E5@8C@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E8@B4@9F@E8@B4@A3@E5@8F@97@E7@90@86@E9@AB@98@E8@BD@AC@E9@A1@B9@E7@9B@AE@EF@BC@8C@E4@B8@BA@E6@96@B9@E4@BE@BF@E7@AE@A1@E7@90@86@E5@92@8C@E5@AF@B9@E4@BC@81@E4@B8@9A@E8@B4@9F@E8@B4@A3@EF@BC@8C@E9@9C@80@E4@B8@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@BF@AE@E6@94@B9@E2@80@9D@E6@9D@83@E9@99@90@E3@80@82@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3C@3Fxml@3Anamespace@20prefix@20@3D@20o@20ns@20@3D@20@22urn@3Aschemas-microsoft-com@3Aoffice@3Aoffice@22@20@2F@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fspan@3E@3C@2Fp@3E@0A@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E2.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@E5@90@8C@E6@97@B6@E5@9C@A8@E5@88@97@E8@A1@A8@E4@B8@AD@E5@A2@9E@E5@8A@A0@E2@80@9C@E5@88@9D@E5@AE@A1@E4@B8@8D@E9@80@9A@E8@BF@87@E2@80@9D@EF@BC@8C@E7@94@A8@E6@9D@A5@E5@88@86@E7@B1@BB@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@AE@A1@E6@A0@B8@E7@8E@AF@E8@8A@82@E4@B8@8D@E9@80@9A@E8@BF@87@E7@9A@84@E9@A1@B9@E7@9B@AE@E3@80@82@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fspan@3E@3C@2Fp@3E@0A@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E3.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@E8@BD@AC@E5@8C@96@E4@B8@AD@E5@BF@83@E4@B8@9A@E5@8A@A1@E9@83@A8@E9@97@A8@E5@9C@A8@E5@AE@A1@E6@A0@B8@E8@BF@87@E7@A8@8B@E4@B8@AD@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@B8@8A@E7@BA@A7@E9@83@A8@E9@97@A8@E2@80@9D@E7@9A@84@E5@8A@9F@E8@83@BD@EF@BC@8C@E8@AF@A5@E7@B1@BB@E9@A1@B9@E7@9B@AE@E7@94@A8@E4@B8@8D@E5@90@8C@E9@A2@9C@E8@89@B2@E8@A1@A8@E7@A4@BA@E3@80@82@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fp@3E', '333', '33', '1', '2011-10-20 00:00:00', '2011-10-20 00:00:00');
INSERT INTO `kp_information_column` VALUES ('13', '汽配热点', '3333', '333333', '3', '333', '已发布', '2011-10-22', 'thumb_4ea0230050ac7.jpg', '33333333', '333', '3', '4', '2011-10-20 00:00:00', '2011-10-22 00:00:00');
INSERT INTO `kp_information_column` VALUES ('14', '汽配热点', '4444', '44', '44', '44', '已发布', '2011-10-20', 'thumb_4ea0234be58fe.jpg', '<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">1.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">为区县科委增加“退回修改”的权限。因认定程序的修改，现由各区区县科委负责受理高转项目，为方便管理和对企业负责，需为区县科委增加“退回修改”权限。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><!--?xml:namespace prefix = o ns = \"urn:schemas-microsoft-com:office:office\" /--><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">2.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">同时在列表中增加“初审不通过”，用来分类区县科委审核环节不通过的项目。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">3.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">转化中心业务部门在审核过程中增加“退回上级部门”的功能，该类项目用不同颜色表示。</span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></p>', '444', '444', '2', '2011-10-20 00:00:00', '2011-10-21 00:00:00');
INSERT INTO `kp_information_column` VALUES ('15', '汽配热点', '标题标题标题标题标题标题标题标', '标题标题', '标题', '标题', '已发布', '2011-10-21', '', '<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">1.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">为区县科委增加“退回修改”的权限。因认定程序的修改，现由各区区县科委负责受理高转项目，为方便管理和对企业负责，需为区县科委增加“退回修改”权限。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><!--?xml:namespace prefix = o ns = \"urn:schemas-microsoft-com:office:office\" /--><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">2.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">同时在列表中增加“初审不通过”，用来分类区县科委审核环节不通过的项目。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">3.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">转化中心业务部门在审核过程中增加“退回上级部门”的功能，该类项目用不同颜色表示。</span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></p>', '222', '', '2', '2011-10-20 00:00:00', '2011-10-23 00:00:00');
INSERT INTO `kp_information_column` VALUES ('16', '汽配热点', '来源来源来源来源', '来源来源来源来源', '来源', '来源', '已发布', '2011-10-21', '', '来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源', '来源', '', '4', '2011-10-20 00:00:00', '2011-10-21 00:00:00');
INSERT INTO `kp_information_column` VALUES ('18', '汽配热点', '标题标题标题标题标题标', '33', '', '', '已发布', '2011-10-22', 'thumb_4ea38dc37d64c.jpg', '<span style=\"background-color:#e56600;\"><span style=\"color:#ee33ee;\">33标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题</span>标题<b>标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题</b>标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标</span>题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标标题标题标题标题标题标题标题标题标题标题标', '33', '', '33', '2011-10-20 00:00:00', '2011-10-23 14:38:59');
INSERT INTO `kp_information_column` VALUES ('19', '汽配热点', '111', '11', '', '', '已发布', '2011-10-23', '', '11', '1111', '', '0', '2011-10-20 00:00:00', '2011-10-23 00:00:00');
INSERT INTO `kp_information_column` VALUES ('20', '汽配人物', '汽配人物的整改', '立配网', '', '', '已发布', '2011-10-23', '', '<p>汽配<img src=\"/kindeditor/attached/image/20111023/20111023052434_52528.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p>汽配人物的整改汽配人物的整改汽</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改汽配人物的整改</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '人物', '', '0', '2011-10-23 00:00:00', '2011-10-23 00:00:00');
INSERT INTO `kp_information_column` VALUES ('21', '汽配人物', '人物列表', '立配网', '', '', '已发布', '2011-10-23', 'thumb_4ea3a71b67860.jpg', '<span class=\"Apple-style-span\" style=\"font-family:Simsun;line-height:normal;font-size:medium;\"><div style=\"margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;background-color:#ffffff;color:#000000;font:normal normal normal 12px/1.5 \'sans serif\', tahoma, verdana, helvetica;\">人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n</span><div>人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n<div>人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n<div>人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n<div>人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n<div>人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;人物说明，人物说明，人物说明&nbsp;<div>人物说明，人物说明，人物说明&nbsp;</div>\r\n</div>\r\n<span class=\"Apple-style-span\" style=\"font-family:Simsun;line-height:normal;font-size:medium;\"> </span>', '人物说明', '', '0', '2011-10-23 00:00:00', '2011-10-23 13:38:03');
INSERT INTO `kp_information_column` VALUES ('22', '维修资源库', '维修资源库', '立配网', '', '', '已发布', '2011-10-23', '', '维修资源库维修资源库维修资源库维修资源库', '维修资源库', '', '0', '2011-10-23 14:49:02', '2011-10-23 00:00:00');

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
  `activite_time` datetime DEFAULT NULL,
  `audit_time` datetime DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1217 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_user
-- ----------------------------
INSERT INTO `kp_user` VALUES ('1216', '18602123502', '1a100d2c0dab19c4430e7d73762b3423', 'nehnre', 'nehnre@yahoo.com.cn', null, '其他', '其他', '聂红雷', '1', '1991-10-01', '', '', '1', '', '待审核', '1', '天津市', '天津市', '', '', '', '', '1', '', '', 'thumb_4ea02e6ae2bf1.jpg', null, null, null, null, '', '', null, null, '2011-10-20 21:40:35', '2011-10-20 22:24:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_userlog
-- ----------------------------
INSERT INTO `kp_userlog` VALUES ('43', '88', 'kp_activity', '34', '参加抽奖活动一次', '2011-10-15 01:57:51');
INSERT INTO `kp_userlog` VALUES ('44', '88', 'kp_user', '88', '登录一次', '2011-10-15 02:12:38');
INSERT INTO `kp_userlog` VALUES ('45', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 09:22:37');
INSERT INTO `kp_userlog` VALUES ('46', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 09:24:44');
INSERT INTO `kp_userlog` VALUES ('47', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 09:26:10');
INSERT INTO `kp_userlog` VALUES ('48', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 09:26:49');
INSERT INTO `kp_userlog` VALUES ('49', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 09:27:32');
INSERT INTO `kp_userlog` VALUES ('50', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 16:57:19');
INSERT INTO `kp_userlog` VALUES ('51', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 17:00:39');
INSERT INTO `kp_userlog` VALUES ('52', '85', 'kp_user', '85', '登录一次', '2011-10-18 17:02:56');
INSERT INTO `kp_userlog` VALUES ('53', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 19:58:37');
INSERT INTO `kp_userlog` VALUES ('54', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 20:08:10');
INSERT INTO `kp_userlog` VALUES ('55', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 20:15:27');
INSERT INTO `kp_userlog` VALUES ('56', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 20:55:44');
INSERT INTO `kp_userlog` VALUES ('57', '1', 'kp_admin_user', '1', '登录一次', '2011-10-18 20:55:57');
INSERT INTO `kp_userlog` VALUES ('58', '1215', 'kp_user', '1215', '登录一次', '2011-10-18 21:14:02');
INSERT INTO `kp_userlog` VALUES ('59', '1215', 'kp_user', '1215', '登录一次', '2011-10-18 22:13:20');
INSERT INTO `kp_userlog` VALUES ('60', '1215', 'kp_user', '1215', '登录一次', '2011-10-18 23:05:29');
INSERT INTO `kp_userlog` VALUES ('61', '1215', 'kp_user', '1215', '登录一次', '2011-10-18 23:07:23');
INSERT INTO `kp_userlog` VALUES ('62', '1215', 'kp_user', '1215', '登录一次', '2011-10-19 13:15:49');
INSERT INTO `kp_userlog` VALUES ('63', '1', 'kp_admin_user', '1', '登录一次', '2011-10-19 19:22:45');
INSERT INTO `kp_userlog` VALUES ('64', '1215', 'kp_user', '1215', '登录一次', '2011-10-19 20:49:58');
INSERT INTO `kp_userlog` VALUES ('65', '1', 'kp_admin_user', '1', '登录一次', '2011-10-21 15:13:04');
INSERT INTO `kp_userlog` VALUES ('66', '1', 'kp_admin_user', '1', '登录一次', '2011-10-21 23:29:11');
INSERT INTO `kp_userlog` VALUES ('67', '1216', 'kp_user', '1216', '登录一次', '2011-10-21 23:32:47');
INSERT INTO `kp_userlog` VALUES ('68', '1216', 'kp_user', '1216', '登录一次', '2011-10-21 23:35:46');
INSERT INTO `kp_userlog` VALUES ('69', '1', 'kp_admin_user', '1', '登录一次', '2011-10-22 00:14:08');
INSERT INTO `kp_userlog` VALUES ('70', '1', 'kp_admin_user', '1', '登录一次', '2011-10-22 11:18:25');
INSERT INTO `kp_userlog` VALUES ('71', '1', 'kp_admin_user', '1', '登录一次', '2011-10-22 12:12:34');
INSERT INTO `kp_userlog` VALUES ('72', '1216', 'kp_user', '1216', '登录一次', '2011-10-22 14:28:07');
INSERT INTO `kp_userlog` VALUES ('73', '1', 'kp_admin_user', '1', '登录一次', '2011-10-22 19:34:13');
INSERT INTO `kp_userlog` VALUES ('74', '1216', 'kp_user', '1216', '登录一次', '2011-10-22 19:36:30');
INSERT INTO `kp_userlog` VALUES ('75', '1', 'kp_admin_user', '1', '登录一次', '2011-10-22 23:08:19');
INSERT INTO `kp_userlog` VALUES ('76', '1', 'kp_admin_user', '1', '登录一次', '2011-10-23 11:40:51');

-- ----------------------------
-- View structure for `kp_vactivity_comment`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vactivity_comment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vactivity_comment` AS select `t2`.`id` AS `id`,`t1`.`nick_name` AS `nick_name`,`t2`.`title` AS `title`,`t2`.`content` AS `content`,`t2`.`insert_time` AS `insert_time`,`t2`.`activity_id` AS `activity_id`,`t1`.`user_name` AS `user_name`,`t3`.`title` AS `activity_title` from ((`kp_user` `t1` join `kp_activity_comment` `t2`) join `kp_activity` `t3`) where ((`t1`.`id` = `t2`.`user_id`) and (`t2`.`activity_id` = `t3`.`id`));

-- ----------------------------
-- View structure for `kp_vsearch`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vsearch`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vsearch` AS (select `t`.`title` AS `title`,'立配活动' AS `type`,`t`.`insert_time` AS `insert_time`,concat('/Activity/show?id=',`t`.`id`) AS `link`,'' AS `tags`,0 AS `seq` from `kp_activity` `t` where (`t`.`status` = '已发布')) union all (select `t`.`title` AS `title`,`t`.`column` AS `type`,`t`.`insert_time` AS `insert_time`,concat('/InformationColumn/supInformationColumnDetail?id=',`t`.`id`) AS `link`,`t`.`search_tags` AS `tags`,`t`.`seq` AS `seq` from `kp_information_column` `t`);

-- ----------------------------
-- View structure for `kp_vuserlog`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vuserlog`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vuserlog` AS select `t2`.`id` AS `id`,`t1`.`nick_name` AS `nick_name`,`t3`.`sponsor` AS `sponsor`,`t2`.`insert_time` AS `insert_time` from ((`kp_user` `t1` join `kp_userlog` `t2`) join `kp_activity` `t3`) where ((`t1`.`id` = `t2`.`user_id`) and (`t2`.`table_name` = 'kp_activity') and (`t3`.`id` = `t2`.`table_id`));
