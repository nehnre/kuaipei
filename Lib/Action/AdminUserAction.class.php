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
			$User = M("User");
			$result = $User -> where("id=".$id) -> find();
			$this -> assign("result", $result);
		}
        $this->display();
	}

	public function deleteAdminUser(){
		$id = $_REQUEST["id"];
		$User = M("User");
		$User -> where("id=".$id) -> delete();
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
		$User = M("User");

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

		$count = $User -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $User -> where($condition) -> order('update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
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
		$User = M("User");
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		$User -> save();
		//处理附件上传
		$moveFile = "moveFile";
		if(!empty($User -> business_license)){
			$info = $this -> $moveFile($User -> business_license);
			echo '111';
			echo $info;
		}
		if(!empty($User -> address_pic)){
			$this -> $moveFile($User -> address_pic);
		}
		if(!empty($User -> business_card)){
			$this -> $moveFile($User -> business_card);
		}
		if(!empty($User -> driving_license)){
			$this -> $moveFile($User -> driving_license);
		}
		if(!empty($User -> vehicle_license)){
			$this -> $moveFile($User -> vehicle_license);
		}
		$deletePastdueFile = "deletePastdueFile";
		$this -> $deletePastdueFile();
		//$this -> ajaxReturn($id);
		echo '<script>alert("保存成功！");location.href="listUser";try{window.event.returnValue=false; }catch(e){}</script>';
	}

		/**************私有方法**************/
	private function deletePastdueFile()
    {
		$dirtemp = preg_replace ("[Lib.*$]","",dirname(__FILE__))."/Temp/";
		$handle = opendir($dirtemp);
		$info = "";
		while (false !== ($file = readdir($handle))) {
			if(!is_dir($file)){
				if((time() - filemtime($dirtemp.$file)) > (20 * 60)){
					unlink($dirtemp.$file);
				}
			}
		}
    }
	
	private function moveFile($filename)
    {
		if(!empty($filename)){
			$dirbase = preg_replace ("[Lib.*$]","",dirname(__FILE__));
			$dirtemp = $dirbase."/Temp/";
			$dirupload = $dirbase."/Public/Upload/";
			$info = copy($dirtemp.$filename, $dirupload.$filename);
			return $dirupload ;
		}else{
				return '2' ;
		}
    }
	    /**
    +----------------------------------------------------------
    * 审核一条用户记录
    +----------------------------------------------------------
    */
 public function checkAdminUser(){
		$id = $_REQUEST["id"];
		$User = M("User");
		$data["status"] = "已审核";
		$data["update_time"]  = date("Y-m-d H:i:s");
		$condition["id"] = $id ;
		$result = $User -> where($condition)->save($data);
	   if($result !== false){
             $json["success"] = true;
		     $json["msg"] = "审核成功！";
       }else{
             $json["success"] = false;
		     $json["msg"] = "审核失败！";
       }
		$this -> ajaxReturn($json);
	}
	
	
}
?>