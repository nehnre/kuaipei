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
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			 $this->display();
		}
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
<<<<<<< HEAD
		$password = $_REQUEST["password"];
		if(empty($password) || empty($condition["user_name"])){
			$json["success"] = false;
			$json["msg"] = "用户名密码不能为空！";
		} else {
			$condition["password"] = md5($password);
			$admin_user = M("admin_user");
			$result = $admin_user -> where($condition) -> find();
			if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "用户名和密码错误！";
			} else {
				Session::set("systemId", $result["id"]);
=======
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
				$json["msg"] = md5($condition["password"]);
			} else {
				Session::set("id", $result["id"]);
>>>>>>> 64be0874eb145a1c9f75e9c841501833663d7fd3
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
<<<<<<< HEAD

	
	public function test(){
		
		$condition["user_name"] = 'admin';
		//$condition["password"] = '111111';

			$condition["password"] = '9db06bcff9248837f86d1a6bcf41c9e7';
			$Admin_User = M("admin_user");
			$result = $Admin_User  -> where($condition) -> find();
			$this -> ajaxReturn($result);
	}

=======
>>>>>>> 64be0874eb145a1c9f75e9c841501833663d7fd3
	
}
?>