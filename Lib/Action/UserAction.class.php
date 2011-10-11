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
	
	public function importUser(){
		
	}
	
	private function import(){
		require("./Public/php/csvdatafile.php");
		$filename = "h:/test.csv"; 
		$rename_filename = "h:/test1.csv"; 

		$utf8_fopen_read = "utf8_fopen_read";
		$contents = $this -> $utf8_fopen_read($filename);
		
		// // format content for special chars 
		$contents = @addslashes($contents); 
		$contents = @str_replace('\,', '\ ,', $contents); 
		$contents = @stripslashes($contents); 

		// // Write to new file 
		$handle = @fopen($rename_filename, "w"); 
		@fwrite($handle, $contents); 
		@fclose($handle); 

		$fd = @fopen($rename_filename, "rb"); 
		$first_line = str_replace(' ,',',',str_replace('"','',trim(@fgets($fd, 1000)))) ; 
		@fclose($fd); 
		$pass = true;
		if($first_line != "学生编号,学号,学生姓名") { 
			$pass = false; 
		} 
		
		if($pass){ 
			$csv = new csvDataFile($rename_filename); 
			while($csv->next_Row()) { 
				$userid = trim($csv->f('学生编号')); 
				$classno = trim($csv->f('学号')); 
				$username = trim($csv->f('学生姓名')); 
			} 
		} 
	}
	
	function utf8_fopen_read($fileName) { 
		$fc = iconv('gbk', 'utf-8', file_get_contents($fileName)); 
		return $fc; 
	} 
}
?>