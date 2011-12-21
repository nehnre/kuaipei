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
		      echo '<script>location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			$condition["id"] = Session::get("systemId");
			$admin_user = M("admin_user");
			$result = $admin_user -> where($condition) -> find();
			if($result["user_name"] == 'editor'){
				    $menu = ',资讯管理,图片资讯';
					$this -> assign("menu", $menu);
			}else if($result["user_name"] == 'publisher'){
				    $menu = ',活动管理,评论管理,资讯管理,图片资讯';
					$this -> assign("menu", $menu);	
			}else if($result["user_name"] == 'admin'){
				    $menu = ',系统管理,活动管理,用户管理,评论管理,资讯管理,短消息管理,图片资讯,导出数据,日志查看';
					$this -> assign("menu", $menu);
			}
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

   public  function checkAdminUser(){
   		if(!Session::is_set("systemId")){
			$json["success"] = false;
			$json["msg"] = "请您先登录";
		}else{
			$condition["id"] = Session::get("systemId");
			$admin_user = M("admin_user");
			$result = $admin_user -> where($condition) -> find();
			$json["success"] = true;
			$json["user_name"] = $result["user_name"];
		}
		$this -> ajaxReturn($json);
   }
	public function adminLogin(){
		
		$condition["user_name"] = $_REQUEST["user_name"];
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

	
	
	public function messageRemain(){
		$file_contents = file_get_contents('http://60.28.195.138/submitdata/service.asmx/Sm_GetRemain?sname=dlshzy03&spwd=87654321&scorpid=&sprdid=1012818') ;
        $xml = simplexml_load_string($file_contents);
		$State = $xml->State;
        $Remain = $xml->Remain;
		$this -> assign("State", $State);
		$this -> assign("Remain", $Remain);
        $this->display();
	}

   public function logout(){
		Session::clear();
		echo("<script type='text/javascript'>location.href='/Admin/loginInit';try{window.event.returnValue=false;}catch(e){}</script>");
	}

	
}
?>