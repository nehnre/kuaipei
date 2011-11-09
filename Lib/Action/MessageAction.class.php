<?php
class MessageAction extends Action{

	//判断用户是否存在
	public function checkUser(){
		if(!Session::is_set("id")){
			$json["success"] = "false";
			$json["msg"] = "您还没有登录";
			return;
		}
		
		$user_name = $_GET["user_name"];
		$User = M('User');
		$condition['user_name'] = $user_name;
		$result = $User -> where($condition) -> count();
		if($result > 0){
			$json["success"] = "true";
			$json["msg"] = "该用户存在";
		} else {
			$json["success"] = "false";
			$json["msg"] = "您填写的用户不存在，请重新填写！";
		}
		$this -> ajaxReturn($json);
	}

	//返回用户短消息列表
	public function index(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$user_id = Session::get("id");
		
		$vmessage = M("vmessage");
		$condition["recever_id"] = $user_id;
		$condition["receve_status"] = "普通";
		
		
		$count = $vmessage -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $vmessage -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); 
		
		$this -> assign('foot',$foot);
		$this -> assign("list", $list);
		$this -> display();
	}
	
	//新增短消息
	public function newMessage(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$this -> display();
	}
	
	//发送短消息
	public function sendMessage(){
		if(!Session::is_set("id")){
			$json["success"] = false;
			$json["msg"] = "您还没有登录";
			return;
		}
		$user_id = Session::get("id");
		
		$user_name = $_REQUEST["user_name"];
		$User = M('User');
		$condition['user_name'] = $user_name;
		$result = $User -> where($condition) -> field("id") -> find();
		
		if(!empty($result)){
		
			if($user_id != $result["id"]){
				//保存消息
				$Message = M("Message");
				$Message -> create();
				$Message -> insert_time = date("Y-m-d H:i:s");
				
				//保存发送人，接收人，状态等信息
				$Message -> sender_id = $user_id;
				$Message -> recever_id = $result["id"];
				$Message -> msg_id = $msg_id;
				$Message -> send_status = "普通";
				$Message -> receve_status = "普通";
				$Message -> read_status = "未读";
				$Message -> add();
				
				$json["success"] = true;
				$json["msg"] = "发送成功！";
			} else {
				$json["success"] = false;
				$json["msg"] = "不要自己给自己发消息！";
			}
		} else {
			$json["success"] = false;
			$json["msg"] = "你填写的用户不存在，发送失败！";
		}
		$this -> ajaxReturn($json);
	}
	
	
}
?>