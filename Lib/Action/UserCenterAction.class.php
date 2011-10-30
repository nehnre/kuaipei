<?php
class UserCenterAction extends Action
{	
	
	
	public function  userActivity() {
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$condition["user_id"]  = Session::get("id");
		$Vuserlog = M("vuserlog");
		$count = $Vuserlog -> where($condition) -> count();
		import("ORG.Util.Page");
		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $Vuserlog -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		$this -> display();

	}

	public function  checkPassword() {
		if(!Session::is_set("id")){
			$json["success"] = false;
			$json["msg"] = "没有登录";
		}else{
			$condition["id"]  = Session::get("id");
			$condition["password"] = $_REQUEST["oldpassword"];
			$condition["password"] = md5($condition["password"]);
			$User = M("User");
			$result = $User -> where($condition) -> find();
			if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "原密码不正确！";
			}else{
				$json["success"] = true;
			}
		}
			$this -> ajaxReturn($json);
	}


	public function checkCheckNum(){
		    $user_name = $_GET["user_name"];

			$check_num = rand(100000, 999999);
			Session::set("check_num",$check_num);
			$sendSms = "sendSms";
			$result = $this -> $sendSms($user_name, "您的手机验证码为".$check_num."，请及时修改密码。");
			$json["msg"] = "验证码发送成功！";
			$json["success"] = true;
		    $this -> ajaxReturn($json);
	}


	
	private function post($data, $target) {
		$url_info = parse_url($target);
		$httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
		$httpheader .= "Host:" . $url_info['host'] . "\r\n";
		$httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
		$httpheader .= "Content-Length:" . strlen($data) . "\r\n";
		$httpheader .= "Connection:close\r\n\r\n";
		$httpheader .= $data;

		$fd = fsockopen($url_info['host'], 80);
		fwrite($fd, $httpheader);
		$gets = "";
		while(!feof($fd)) {
			$gets .= fread($fd, 128);
		}
		fclose($fd);
		return $gets;
	}

   private function sendSms($mobile, $content){
		$target = "http://60.28.195.138/submitdata/service.asmx/g_Submit";
		$post_data = "sname=dlshzy03&spwd=87654321&scorpid=&sprdid=1012818&sdst=" . $mobile . "&smsg=".rawurlencode($content);
		$post = "post";
		$gets = $this -> $post($post_data, $target);
		return $gets;
	}



	public function editPassword(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$condition["id"]  = Session::get("id");
		$User = M("User");
		$result = $User -> where($condition) -> find();
		$this -> assign("result",$result);
		$this->display();
	}

	public function updatePassword(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		$check_num = $_REQUEST["check_num"];
		$User = M('User');
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		//处理密码
		$password = $_REQUEST["newPassword"];
		if(!empty($password)){
			$User -> password = md5($password); 
		} 
		if($check_num == Session::get("check_num")){	
			Session::set("check_num","");
	     	$User -> id = Session::get("id");
	     	$User -> save();
			$json["msg"] = "修改成功！";
			$json["success"] = true;
		} else {
			$json["msg"] = "验证码错误！";
			$json["success"] = false;
		}
		  $this -> ajaxReturn($json);
		
	}



	public function index(){
		$flag = $_REQUEST["flag"];
		if(!Session::is_set("id")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			  return;
		}
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		$this -> assign("result",$result);
		if($result['status'] == '基本注册'||$result['status'] == '已退回'){
			if($flag=='1'){
				$template = "./Tpl/default/UserCenter/userCenterEditBasic.html";
			}else if($flag=='2'){
				$template = "./Tpl/default/UserCenter/userCenterEditPerfect.html";
			}else if($flag=='3'){
				if("厂商" == $result["user_type1"] || "经销商" == $result["user_type1"] || "修理厂" == $result["user_type1"]){
					$template = "./Tpl/default/UserCenter/userCenterEditUserFactory.html";
				} else if("车队" == $result["user_type1"] || "其他"  == $result["user_type1"]){
					$template = "./Tpl/default/UserCenter/userCenterEditUserCarTeam.html";
				} else if("车主" == $result["user_type1"]){
					$template = "./Tpl/default/UserCenter/userCenterEditUserCarHost.html";
				} else {
					$this -> error("还没有<a href='chooseType'>选择分类</a>");
				}
			}else{
				$template = "./Tpl/default/UserCenter/userCenterDetail.html";
			}
		}else{
			$template = "./Tpl/default/UserCenter/userCenterDetail.html";
		}
	    $this->display($template );
	}

    /**
    +----------------------------------------------------------
    * 保存基本信息
    +----------------------------------------------------------
    */
	public function updateUser(){
	
		if(!Session::is_set("id") && !$if_insert){
			$this->error("没有登录！");
		}
		
		$User = M('User');
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		$User -> id = Session::get("id");
		$User -> save();
		
		//处理附件上传
		$moveFile = "moveFile";
		if(!empty($User -> business_license)){
			$this -> $moveFile($User -> business_license);
		}
		if(!empty($User -> address_pic)){
			$this -> $moveFile($User -> address_pic);
		}
		if(!empty($User -> business_card)){
			$this -> $moveFile($User -> business_card);
		}
		if(!empty($User -> driving_license)){
			$this -> $moveFile($User -> driving_license);
		}
		if(!empty($User -> vehicle_license)){
			$this -> $moveFile($User -> vehicle_license);
		}
		// $deletePastdueFile = "deletePastdueFile";
		// $this -> $deletePastdueFile();
		
		$this -> ajaxReturn(1,"更新成功",2);
	}
	
	/**************私有方法**************/
	
	private function deletePastdueFile()
    {
		$dirtemp = preg_replace ("[Lib.*$]","",dirname(__FILE__))."/Temp/";
		$handle = opendir($dirtemp);
		$info = "";
		while (false !== ($file = readdir($handle))) {
			if(!is_dir($file)){
				if((time() - filemtime($dirtemp.$file)) > (20 * 60)){
					unlink($dirtemp.$file);
				}
			}
		}
    }
	
	private function moveFile($filename)
    {
		if(!empty($filename)){
			$dirbase = preg_replace ("[Lib.*$]","",dirname(__FILE__));
			$dirtemp = $dirbase."/Temp/";
			$dirupload = $dirbase."/Public/Upload/";
			$info = copy($dirtemp.$filename, $dirupload.$filename);
		}
    }
	

		public function test(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$condition["id"]  = Session::get("id");
		$User = M("User");
		$result = $User -> where($condition) -> find();
		$this -> assign("result",$result);
		$this->display();
	}


	
}
?>