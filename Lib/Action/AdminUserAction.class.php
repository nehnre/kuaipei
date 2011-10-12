<?php
class AdminUserAction extends Action
{
    /**
    +----------------------------------------------------------
    * 进入新增或编辑页面
    +----------------------------------------------------------
    */
	public function editAdminUser(){
		$id = $_REQUEST["id"];
		if(!empty($id)){
			$Activity = M("User");
			$result = $Activity -> where("id=".$id) -> find();
			$this -> assign("result", $result);
		}
        $this->display();
	}

	public function deleteAdminUser(){
		$id = $_REQUEST["id"];
		$Activity = M("User");
		$Activity -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listUser";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	
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
    * 返回用户列表
    +----------------------------------------------------------
    */
	public function listUser(){
		$Activity = M("User");

		$user_name = $_REQUEST["user_name"];
		if(!empty($user_name)){
			$condition["user_name"] = array("like", "%".$user_name."%"); 
		}

		$user_type1 = $_REQUEST["user_type1"];
		if(!empty($user_type1)){
			$condition["user_type1"] = $user_type1; 
		}

		$user_type2 = $_REQUEST["user_type2"];
		if(!empty($user_type2)){
			$condition["user_type2"] = $user_type2; 
		}

		$status = $_REQUEST["status"];
		if(!empty($status)){
			$condition["status"] = $status; 
		}

		$count = $Activity -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $Activity -> where($condition) -> order('update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		$this -> display();
	}
	
    /**
    +----------------------------------------------------------
    * 保存一条用户记录
    +----------------------------------------------------------
    */
	public function saveAdminUser(){
		$id = $_REQUEST["id"];
		
		$Activity = M("User");
		$Activity -> create();
		$Activity -> update_time = date("Y-m-d H:i:s");
		$Activity -> save();
		//$this -> ajaxReturn($id);
		echo '<script>alert("保存成功！");location.href="listUser";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	    /**
    +----------------------------------------------------------
    * 审核一条用户记录
    +----------------------------------------------------------
    */
 public function checkAdminUser(){
		$id = $_REQUEST["id"];

		$Activity = M("User");
		$Activity -> create();
		//$Activity -> status ="已审核";
		$Activity -> update_time = date("Y-m-d H:i:s");
		$Activity -> save();
		//$this -> ajaxReturn($id);
		$json["success"] = true;
		$json["msg"] = "审核成功！";
		$this -> ajaxReturn($json);
	}
	

	public function test(){
		$Activity = M("Activity");
		$result = $Activity -> where("id=12") -> find();
		$this -> ajaxReturn(split("\n",str_replace("\r","",$result["introduce"])));
	}
	
}
?>