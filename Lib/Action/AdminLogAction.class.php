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
			$condition["act_describ"] = array("like", "%".$act_describ."%"); 
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

	public function test(){
		
			$sendSms = "sendSms";
			$result = $this -> $sendSms();
			//$this -> ajaxReturn($result);
			echo $gets;
	}


	
}
?>