<?php
class AdminAction extends Action
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
	
    /**
    +----------------------------------------------------------
    * 默认页面
    +----------------------------------------------------------
    */
    public function defaultPage()
    {
        $this->display();
    }

    public function loginInit()
    {
        $this->display();
    }

	public function adminLogin(){
		
		$condition["user_name"] = $_REQUEST["user_name"];
		$condition["password"] = $_REQUEST["password"];
		if(empty($condition["password"]) || empty($condition["user_name"])){
			$json["success"] = false;
			$json["msg"] = "用户名密码不能为空！";
		} else {
			$condition["password"] = md5($condition["password"]);
			$Admin_User = M("Admin_User");
			$result = $Admin_User -> where($condition) -> find();
			if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "用户名密码不正确！";
			} else {
				Session::set("id", $result["id"]);
				Session::set("user_name", $result["user_name"]);
				$json["success"] = true;
				$json["msg"] = "登录成功";
				
				//记录日志
				$Userlog = M("Userlog");
				$Userlog -> user_id = $result["id"];
				$Userlog -> table_name = "kp_admin_user";
				$Userlog -> table_id = $result["id"];
				$Userlog -> act_describ = "登录一次";
				$Userlog -> insert_time = date("Y-m-d H:i:s");
				$Userlog -> add();
			}
		}
		$this -> ajaxReturn($json);
	}
	
}
?>