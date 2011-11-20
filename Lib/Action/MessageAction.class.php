<?php
class MessageAction extends Action{

  //逻辑删除发件箱
	public function deleteOutbox(){
		$id = $_REQUEST["id"];
		$Message = M("Message");
		$data["send_status"] = "删除";
		$data["id"] =  $id;
		$Message -> save($data);
		echo '<script>alert("删除成功！");location.href="/Message/adminMessageList";</script>';
	}

  //逻辑删除收件箱
	public function deleteMessage(){
		$id = $_REQUEST["id"];
		$Message = M("Message");
		$data["receve_status"] = "删除";
		$data["id"] =  $id;
		$Message -> save($data);
		echo '<script>alert("删除成功！");location.href="/Message/";</script>';
	}

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
		//返回用户短消息列表
	public function outbox(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
		$user_id = Session::get("id");
		
		$vmessage = M("vmessage");
		$condition["sender_id"] = $user_id;
		$condition["send_status"] = "普通";
		
		
		$count = $vmessage -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $vmessage -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); 
		
		$this -> assign('foot',$foot);
		$this -> assign("list", $list);
		$this -> display();
	}

			//返回用户短消息列表
	public function messageDetail(){
		if(!Session::is_set("id")){
			header("Content-type: text/html; charset=utf-8");
			echo '<script>location.href="/";try{window.event.returnValue=false; }catch(e){}</script>';
			return;
		}
	    $id = $_REQUEST["id"];
		if(!empty($id)){
				$vmessage = M("vmessage");
				$result = $vmessage -> where("id=".$id) -> find();
				$user_id =  Session::get("id");
				if($result["sender_id"] !=  $user_id){
					$Message = M("Message");
					$data["read_status"] = "已读";
					$data["id"] =  $id;
					$Message -> save($data);
				}
				$this -> assign("result", $result);
		}
			$this->display();
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

	
	//后台用户列表
	public function adminMessageList(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="/Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
			  return;
		}else{
			$vmessage = M("vmessage");

			$title = $_REQUEST["title"];
			if(!empty($title)){
				$condition["title"] = array("like", "%".$title."%"); 
			}

			$sender_name = $_REQUEST["sender_name"];
			if(!empty($sender_name)){
				$condition["sender_name"] = array("like", "%".$sender_name."%"); 
			}

			$recever_name = $_REQUEST["recever_name"];
			if(!empty($recever_name)){
				$condition["recever_name"] = array("like", "%".$recever_name."%"); 
			}
			$condition["send_status"] = "普通";

			$count = $vmessage -> where($condition) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);
			$foot = $Page -> show();
			$list = $vmessage -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			
			$this -> display();
		
		}

	}

	public function findContent(){
		$id =$_GET['id'];
		$condition["id"]  =$id;
		$message = M("message");
		$result = $message -> where($condition) -> find();
		if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "未查到该记录详情，可能由于网络或数据库原因";
		}else{
				$json["success"] = true;
				$json["msg"] = $result["content"];
		 }

		 $this -> ajaxReturn($json);
	}

  //后台删除发件箱（非逻辑删除，暂时未用）
	public function deleteAdminMessage(){
		$id = $_REQUEST["id"];
		$message = M("message");
		$message -> where("id=".$id) -> delete();
		header("Content-type: text/html; charset=utf-8");
		echo '<script>alert("删除成功！");location.href="adminMessageList";try{window.event.returnValue=false; }catch(e){}</script>';
	}

	public function addMessageInit(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="/Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
			  return;
		}else{
			 	$this -> display();
		}
	}

	//发送短消息
	public function sendAdminMessage(){
		if(!Session::is_set("systemId")){
			 $json["success"] = false;
			 $json["msg"] = "您还没有登录";
			 return;
		}
		$user_id = Session::get("systemId");
		$user_name = $_REQUEST["user_name"];
		$choose_type = $_REQUEST["choose_type"];
		$user_status = $_REQUEST["user_status"];
		$user_type = $_REQUEST["user_type"];
		if($choose_type =="用户名" && !empty($user_name)){
			$user_names = explode(",",str_replace("，","," ,$user_name));
			$meg ="";
			foreach($user_names as $tag){
				$User = M('User');
				$condition['user_name'] = $tag;
				$result = $User -> where($condition) -> field("id") -> find();
				if(!empty($result)){
					$saveMessage = "saveMessage";
					$this -> $saveMessage($user_id,$result["id"]);
				}else{
				  $meg .=$tag."不存在；";
				}
			}
			$json["success"] = true;
			$json["msg"] = $meg;
		}else if($choose_type =="用户状态" && !empty($user_status)){
			$User = M('User');
			$condition['status'] = $user_status;
			$result = $User -> where($condition) -> field("id") -> findAll();
			$meg = 0 ;
			foreach($result as $tag){
				if(!empty($tag)){
					$saveMessage = "saveMessage";
					$this -> $saveMessage($user_id,$tag["id"]);
					$meg++;
				}
			}
			$json["success"] = true;
			$json["msg"] ="总共成功发送".$meg."个用户";
		}else if($choose_type =="用户分类" && !empty($user_type)){
			$User = M('User');
			$condition['user_type1'] = $user_type;
			$result = $User -> where($condition) -> field("id") -> findAll();
			$meg = 0 ;
			foreach($result as $tag){
				if(!empty($tag)){
					$saveMessage = "saveMessage";
					$this -> $saveMessage($user_id,$tag["id"]);
					$meg++;
				}
			}
			$json["success"] = true;
			$json["msg"] ="总共成功发送".$meg."个用户";
		}else{
			$json["success"] = false;
			$json["msg"] ="发送失败";
		}
		
		$this -> ajaxReturn($json);
	}
	
	private function saveMessage($user_id ,$id){
			//保存消息
			$Message = M("Message");
			$Message -> create();
			$Message -> insert_time = date("Y-m-d H:i:s");
			
			//保存发送人，接收人，状态等信息
			$Message -> sender_id = $user_id;
			$Message -> recever_id = $id;
			$Message -> msg_id = $msg_id;
			$Message -> send_status = "普通";
			$Message -> receve_status = "普通";
			$Message -> read_status = "未读";
			$Message -> add();
	}
	
	
}
?>