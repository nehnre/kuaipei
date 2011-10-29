<?php
class ExcelAction extends Action
{
    /**
    +----------------------------------------------------------
    * 导出用户信息
    +----------------------------------------------------------
    */
    public function userExcel()
    {
			if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		    }else{
				//输出头信息
				$filename = "export".date("YmdHis");
				header("Content-Type: text/plain");
				header("Content-Disposition: attachment; filename=$filename.csv;");
				header('Pragma: cache');
				header('Cache-Control: public, must-revalidate, max-age=0');
				//由于 Excel 无法直接识别 utf-8 的数据，所以需要转换一下
				echo auto_charset( "ID号,手机号,昵称,Email,验证码,用户类别1,用户类别2,真实姓名,性别,出生日期,职业,QQ,单位名称,MSN,状态,单位地址,省份,城市,邮编,联系电话,联系人,营业范围,注册OR导入,激活状态,注册时间,最后更新时间\n",'utf-8', 'gbk');

				$User = M('User');
				$result = $User -> field("id, user_name, nick_name, email, check_num, user_type1, user_type2, true_name, sex, birthday, profession, qq, company_name, msn, status, company_address, province, city, post_code, business_call, link_man, business_scope, import_flag, activite_flag, insert_time, update_time") -> findAll();
				foreach ($result  as $row) {
				$contents = $row['id'];
				$contents .= ',';
				$contents .= $row['user_name'];
				$contents .= ',';
				$contents .= $row['nick_name'];
				$contents .= ',';
				$contents .= $row['email'];
				$contents .= ',';
				$contents .= $row['check_num'];
				$contents .= ',';
				$contents .= $row['user_type1'];
				$contents .= ',';
				$contents .= $row['user_type2'];
				$contents .= ',';
				$contents .= $row['true_name'];
				$contents .= ',';
				$contents .= $row['sex'];
				$contents .= ',';
				$contents .= $row['birthday'];
				$contents .= ',';
				$contents .= $row['profession'];
				$contents .= ',';
				$contents .= $row['qq'];
				$contents .= ',';
				$contents .= $row['company_name'];
				$contents .= ',';
				$contents .= $row['msn'];
				$contents .= ',';
				$contents .= $row['status'];
				$contents .= ',';
				$contents .= $row['company_address'];
				$contents .= ',';
				$contents .= $row['province'];
				$contents .= ',';
				$contents .= $row['city'];
				$contents .= ',';
				$contents .= $row['post_code'];
				$contents .= ',';
				$contents .= $row['business_call'];
				$contents .= ',';
				$contents .= $row['link_man'];
				$contents .= ',';
				$contents .= $row['business_scope'];
				$contents .= ',';
				$contents .= $row['import_flag'];
				$contents .= ',';
				$contents .= $row['activite_flag'];
				$contents .= ',';
				$contents .= $row['insert_time'];
				$contents .= ',';
				$contents .= $row['update_time'];
				$contents .= "\n"; 
				echo auto_charset($contents,'utf-8', 'gbk');
				}
			}
			
    }

    /**
    +----------------------------------------------------------
    * 导出活动参加情况
    +----------------------------------------------------------
    */
    public function ActivityExcel()
    {
			
			if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		    }else{//输出头信息
				$filename = "export".date("YmdHis");
				header("Content-Type: text/plain");
				header("Content-Disposition: attachment; filename=$filename.csv;");
				header('Pragma: cache');
				header('Cache-Control: public, must-revalidate, max-age=0');
				//由于 Excel 无法直接识别 utf-8 的数据，所以需要转换一下
				echo auto_charset( "用户名,活动名称,参加时间\n",'utf-8', 'gbk');

				$vactivity_comment = M('vactivity_comment');
				$result = $vactivity_comment -> field("user_name, activity_title, insert_time") -> findAll();
				foreach ($result  as $row) {
				$contents = $row['user_name'];
				$contents .= ',';
				$contents .= $row['activity_title'];
				$contents .= ',';
				$contents .= $row['insert_time'];
				$contents .= "\n"; 
				echo auto_charset($contents,'utf-8', 'gbk');
				}
			}
    }

	   /**
    +----------------------------------------------------------
    * 导出订阅情况
    +----------------------------------------------------------
    */
    public function subscribeExcel()
    {
			if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		    }else{//输出头信息
				$filename = "export".date("YmdHis");
				header("Content-Type: text/plain");
				header("Content-Disposition: attachment; filename=$filename.csv;");
				header('Pragma: cache');
				header('Cache-Control: public, must-revalidate, max-age=0');
				//由于 Excel 无法直接识别 utf-8 的数据，所以需要转换一下
				echo auto_charset( "Email,订阅时间\n",'utf-8', 'gbk');

				$subscribe = M('subscribe');
				$result = $subscribe -> field("email, insert_time") -> findAll();
				foreach ($result  as $row) {
				$contents = $row['email'];
				$contents .= ',';
				$contents .= $row['insert_time'];
				$contents .= "\n"; 
				echo auto_charset($contents,'utf-8', 'gbk');
				}
			}
			
    }


    /**
    +----------------------------------------------------------
    * 测试
    +----------------------------------------------------------
    */
    public function test()
    {
		$User = M('User');
		$result = $User -> field("id, check_num, import_flag") -> findAll();
		 echo count($result);
			


    }
	
}