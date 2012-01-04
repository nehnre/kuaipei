<?php
class AdminLogAction extends Action
{
    
	public function listUserLog(){
		$Vuserdetaillog = M("Vuserdetaillog");
		
		$user_name = $_REQUEST["user_name"];
		if(!empty($user_name)){
			$condition["user_name"] = array("like", "%".$user_name."%"); 
		}
		
		$act_describ = $_REQUEST["act_describ"];
		if(!empty($act_describ)){
			$condition["act_describ"] = array(array("like", "%".$act_describ."%"),array("neq", "删除操作")); 
		}else{
			$condition["act_describ"] = array("neq", "删除操作");
		}
		$count = $Vuserdetaillog -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $Vuserdetaillog -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		$this -> display();
	}
	public function deleteUserLog(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			$id = $_REQUEST["id"];
			$Userlog = M("Userlog");
			$Userlog -> where("id=".$id) -> delete();
			//记录日志
			$Userlog -> user_id = Session::get("systemId");
			$Userlog -> table_name = "kp_userlog";
			$Userlog -> table_id = $id;
			$Userlog -> act_describ = "删除操作";
			$Userlog -> insert_time = date("Y-m-d H:i:s");
			$Userlog -> ip = $_SERVER['REMOTE_ADDR'];
			$Userlog -> add();
			
			header("Content-type: text/html; charset=utf-8");
			echo '<script>alert("删除成功！");location.href="listUserLog";try{window.event.returnValue=false; }catch(e){}</script>';
		}
	}
	
	public function test(){
		
			$sendSms = "sendSms";
			$result = $this -> $sendSms();
			//$this -> ajaxReturn($result);
			echo $gets;
	}


	
}
?>