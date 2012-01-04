-- ----------------------------
-- View structure for `kp_vuserdetaillog`
-- ----------------------------
DROP VIEW IF EXISTS `kp_vuserdetaillog`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kp_vuserdetaillog` AS select `t1`.`id` AS `id`,`t2`.`user_name` AS `user_name`,`t1`.`act_describ` AS `act_describ`,`t1`.`ip` AS `ip`,`t1`.`insert_time` AS `insert_time` from (`kp_admin_user` `t2` left join `kp_userlog` `t1` on((`t1`.`user_id` = `t2`.`id`))) union select `t3`.`id` AS `id`,`t4`.`user_name` AS `user_name`,`t3`.`act_describ` AS `act_describ`,`t3`.`ip` AS `ip`,`t3`.`insert_time` AS `insert_time` from (`kp_user` `t4` left join `kp_userlog` `t3` on((`t3`.`user_id` = `t4`.`id`)));