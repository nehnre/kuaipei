/*
Navicat MySQL Data Transfer

Source Server         : host
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-21 14:57:24
*/

SET FOREIGN_KEY_CHECKS=0;
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
  `inster_time` date DEFAULT NULL,
  `update_time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp_information_column
-- ----------------------------
INSERT INTO `kp_information_column` VALUES ('7', '经销动态', 'e', 'ee', 'e', 'ee', '已发布', '2011-10-20', null, '', null, null, '5', null, '2011-10-20');
INSERT INTO `kp_information_column` VALUES ('9', '厂商动态', '22', '22', '22', '22', '未发布', null, '', '2222222222', '1', '1', '3', null, '2011-10-20');
INSERT INTO `kp_information_column` VALUES ('12', '经销动态', '原价28元DHC试用装6件套原价28元DHC试用装6件套原价28元DHC试用装6件套', '333333333', '333', '33', '已发布', '2011-10-20', 'thumb_4ea01cf041762.jpg', '@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E1.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@E4@B8@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@BF@AE@E6@94@B9@E2@80@9D@E7@9A@84@E6@9D@83@E9@99@90@E3@80@82@E5@9B@A0@E8@AE@A4@E5@AE@9A@E7@A8@8B@E5@BA@8F@E7@9A@84@E4@BF@AE@E6@94@B9@EF@BC@8C@E7@8E@B0@E7@94@B1@E5@90@84@E5@8C@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E8@B4@9F@E8@B4@A3@E5@8F@97@E7@90@86@E9@AB@98@E8@BD@AC@E9@A1@B9@E7@9B@AE@EF@BC@8C@E4@B8@BA@E6@96@B9@E4@BE@BF@E7@AE@A1@E7@90@86@E5@92@8C@E5@AF@B9@E4@BC@81@E4@B8@9A@E8@B4@9F@E8@B4@A3@EF@BC@8C@E9@9C@80@E4@B8@BA@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@BF@AE@E6@94@B9@E2@80@9D@E6@9D@83@E9@99@90@E3@80@82@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3C@3Fxml@3Anamespace@20prefix@20@3D@20o@20ns@20@3D@20@22urn@3Aschemas-microsoft-com@3Aoffice@3Aoffice@22@20@2F@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fspan@3E@3C@2Fp@3E@0A@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E2.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@E5@90@8C@E6@97@B6@E5@9C@A8@E5@88@97@E8@A1@A8@E4@B8@AD@E5@A2@9E@E5@8A@A0@E2@80@9C@E5@88@9D@E5@AE@A1@E4@B8@8D@E9@80@9A@E8@BF@87@E2@80@9D@EF@BC@8C@E7@94@A8@E6@9D@A5@E5@88@86@E7@B1@BB@E5@8C@BA@E5@8E@BF@E7@A7@91@E5@A7@94@E5@AE@A1@E6@A0@B8@E7@8E@AF@E8@8A@82@E4@B8@8D@E9@80@9A@E8@BF@87@E7@9A@84@E9@A1@B9@E7@9B@AE@E3@80@82@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fspan@3E@3C@2Fp@3E@0A@3Cp@20style@3D@22text-align@3Aleft@3Bline-height@3A150@25@3Btext-indent@3A-21pt@3Bmargin@3A15.6pt@200cm@200pt@2021pt@3Bmso-para-margin-top@3A1.0gd@3Bmso-para-margin-right@3A0cm@3Bmso-para-margin-bottom@3A.0001pt@3Bmso-para-margin-left@3A21.0pt@3Bmso-char-indent-count@3A0@3Bmso-list@3Al0@20level1@20lfo1@3B@22@20class@3D@22a@22@20align@3D@22left@22@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3Bmso-fareast-font-family@3A\'Times@20New@20Roman\'@3B@22@20lang@3D@22EN-US@22@3E@3Cspan@20style@3D@22mso-list@3AIgnore@3B@22@3E@3Cspan@20style@3D@22font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E3.@3C@2Fspan@3E@3Cspan@20style@3D@22font@3A7pt@20\'Times@20New@20Roman\'@3B@22@3E@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@26nbsp@3B@20@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bfont-family@3A@E5@AE@8B@E4@BD@93@3Bmso-bidi-font-size@3A10.5pt@3Bmso-ascii-font-family@3A\'Times@20New@20Roman\'@3Bmso-hansi-font-family@3A\'Times@20New@20Roman\'@3B@22@3E@3Cspan@20style@3D@22font-size@3Asmall@3B@22@3E@E8@BD@AC@E5@8C@96@E4@B8@AD@E5@BF@83@E4@B8@9A@E5@8A@A1@E9@83@A8@E9@97@A8@E5@9C@A8@E5@AE@A1@E6@A0@B8@E8@BF@87@E7@A8@8B@E4@B8@AD@E5@A2@9E@E5@8A@A0@E2@80@9C@E9@80@80@E5@9B@9E@E4@B8@8A@E7@BA@A7@E9@83@A8@E9@97@A8@E2@80@9D@E7@9A@84@E5@8A@9F@E8@83@BD@EF@BC@8C@E8@AF@A5@E7@B1@BB@E9@A1@B9@E7@9B@AE@E7@94@A8@E4@B8@8D@E5@90@8C@E9@A2@9C@E8@89@B2@E8@A1@A8@E7@A4@BA@E3@80@82@3C@2Fspan@3E@3C@2Fspan@3E@3C@2Fb@3E@3Cb@20style@3D@22mso-bidi-font-weight@3Anormal@3B@22@3E@3Cspan@20style@3D@22line-height@3A150@25@3Bmso-bidi-font-size@3A10.5pt@3B@22@20lang@3D@22EN-US@22@3E@3Co@3Ap@3E@3C@2Fo@3Ap@3E@3C@2Fspan@3E@3C@2Fb@3E@3C@2Fp@3E', '333', '33', '1', null, '2011-10-20');
INSERT INTO `kp_information_column` VALUES ('13', '厂商动态', '3333', '333333', '3', '333', '未发布', null, 'thumb_4ea0230050ac7.jpg', '33333333', '333', '3', '4', null, '2011-10-20');
INSERT INTO `kp_information_column` VALUES ('14', '经销动态', '4444', '44', '44', '44', '已发布', '2011-10-20', 'thumb_4ea0234be58fe.jpg', '<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">1.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">为区县科委增加“退回修改”的权限。因认定程序的修改，现由各区区县科委负责受理高转项目，为方便管理和对企业负责，需为区县科委增加“退回修改”权限。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><?xml:namespace prefix = o ns = \"urn:schemas-microsoft-com:office:office\" /><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">2.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">同时在列表中增加“初审不通过”，用来分类区县科委审核环节不通过的项目。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">3.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">转化中心业务部门在审核过程中增加“退回上级部门”的功能，该类项目用不同颜色表示。</span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></p>', '444', '444', '444', null, '2011-10-21');
INSERT INTO `kp_information_column` VALUES ('15', '厂商动态', '标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题', '标题标题', '标题', '标题', '已发布', '2011-10-21', '', '<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">1.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">为区县科委增加“退回修改”的权限。因认定程序的修改，现由各区区县科委负责受理高转项目，为方便管理和对企业负责，需为区县科委增加“退回修改”权限。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><?xml:namespace prefix = o ns = \"urn:schemas-microsoft-com:office:office\" /><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">2.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><span style=\"font-size:small;\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\">同时在列表中增加“初审不通过”，用来分类区县科委审核环节不通过的项目。</span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></span></p>\r\n<p style=\"text-align:left;line-height:150%;text-indent:-21pt;margin:15.6pt 0cm 0pt 21pt;mso-para-margin-top:1.0gd;mso-para-margin-right:0cm;mso-para-margin-bottom:.0001pt;mso-para-margin-left:21.0pt;mso-char-indent-count:0;mso-list:l0 level1 lfo1;\" class=\"a\" align=\"left\"><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;mso-fareast-font-family:\'Times New Roman\';\" lang=\"EN-US\"><span style=\"mso-list:Ignore;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">3.</span><span style=\"font:7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;font-family:宋体;mso-bidi-font-size:10.5pt;mso-ascii-font-family:\'Times New Roman\';mso-hansi-font-family:\'Times New Roman\';\"><span style=\"font-size:small;\">转化中心业务部门在审核过程中增加“退回上级部门”的功能，该类项目用不同颜色表示。</span></span></b><b style=\"mso-bidi-font-weight:normal;\"><span style=\"line-height:150%;mso-bidi-font-size:10.5pt;\" lang=\"EN-US\"><o:p></o:p></span></b></p>', '222', '', '2', null, '2011-10-21');
INSERT INTO `kp_information_column` VALUES ('16', '经销动态', '来源来源来源来源', '来源来源来源来源', '来源', '来源', '已发布', '2011-10-21', '', '来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源来源', '来源', '', '4', null, '2011-10-21');
INSERT INTO `kp_information_column` VALUES ('18', '汽配热点', '标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题标题', '33', '', '', '未发布', null, '', '33', '33', '', '33', null, '2011-10-21');