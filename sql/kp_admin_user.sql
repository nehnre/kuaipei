/*
Navicat MySQL Data Transfer

Source Server         : host
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : kuaipei

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-10-16 17:12:40
*/

SET FOREIGN_KEY_CHECKS=0;
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
INSERT INTO `kp_admin_user` VALUES ('1', 'admin', '9db06bcff9248837f86d1a6bcf41c9e7', '2011-10-09 02:15:18', '2011-10-09 02:15:18');
