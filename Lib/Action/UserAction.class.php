<?php
// 本文档自动生成，仅供测试运行
class UserAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->display();
    }
	
	public function login(){
		
		$condition["user_name"] = $_REQUEST["user_name"];
		$condition["password"] = $_REQUEST["password"];
		if(empty($condition["password"]) || empty($condition["user_name"])){
			$json["success"] = false;
			$json["msg"] = "用户名密码不能为空！";
		} else {
			$condition["password"] = md5($condition["password"]);
			$User = M("User");
			$result = $User -> where($condition) -> find();
			if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "用户名或密码不正确！";
			} else {
				Session::set("id", $result["id"]);
				Session::set("nick_name", $result["nick_name"]);
				$json["success"] = true;
				$json["msg"] = "登录成功";
				
				//记录日志
				$Userlog = M("Userlog");
				$Userlog -> user_id = $result["id"];
				$Userlog -> table_name = "kp_user";
				$Userlog -> table_id = $result["id"];
				$Userlog -> act_describ = "登录一次";
				$Userlog -> insert_time = date("Y-m-d H:i:s");
				$Userlog -> add();
			}
		}
		$this -> ajaxReturn($json);
	}
	
	public function logout(){
		Session::clear();
		$backurl = $_REQUEST["backurl"];
		if(empty($backurl)){
			$backurl = "/";
		}
		echo("<script type='text/javascript'>location.href='".$backurl."';try{window.event.returnValue=false;}catch(e){}</script>");
	}
	

}
?>