<?php
class ActivityAction extends Action
{


	public function canclePublishActivity(){
		$id = $_REQUEST["id"];
		$Activity = M("Activity");
		$data["status"] = "未发布";
		$data["update_time"] = date("Y-m-d");
		$Activity -> where("id=".$id) -> save($data);
		echo '<script>alert("取消成功！");location.href="listActivity";try{window.event.returnValue=false; }catch(e){}</script>';
	}

    /**
    +----------------------------------------------------------
    * 进入新增或编辑页面
    +----------------------------------------------------------
    */
	public function editActivity(){
		$id = $_REQUEST["id"];
		if(!empty($id)){
			$Activity = M("Activity");
			$result = $Activity -> where("id=".$id) -> find();
			$this -> assign("result", $result);
		}
        $this->display();
	}

	public function deleteActivity(){
		$id = $_REQUEST["id"];
		$Activity = M("Activity");
		$Activity -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listActivity";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	
	public function join(){
		
		if(!Session::is_set("id")){
			$json["success"] = false;
			$json["msg"] = "没有登录";
		} else {
			//记录日志
			$user_id = Session::get("id");
			$id = $_REQUEST["id"];
			$Userlog = M("Userlog");
			$Userlog -> user_id = $user_id;
			$Userlog -> table_name = "kp_activity";
			$Userlog -> table_id = $id;
			$Userlog -> act_describ = "参加抽奖活动一次";
			$Userlog -> insert_time = date("Y-m-d H:i:s");
			$Userlog -> add();
			$json["success"] = true;
			$json["msg"] = "感谢您参加本次抽奖活动，抽奖结果将会由网站工作人员与您联系！";
		}
		$this -> ajaxReturn($json);
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
    * 返回活动列表
    +----------------------------------------------------------
    */
	public function listActivity(){
		$Activity = M("Activity");
		
		$title = $_REQUEST["title"];
		if(!empty($title)){
			$condition["title"] = array("like", "%".$title."%"); 
		}
		
		$type = $_REQUEST["type"];
		if(!empty($type)){
			$condition["type"] = $type; 
		}
		
		$status = $_REQUEST["status"];
		if(!empty($status)){
			if($status == "未发布" || $status == "已审核" ){
				$condition["status"] = $status; 
			} else {
				$condition["status"] = array(array("neq", "未发布"),array("neq","预览")); 
				if($status == "未开始"){
					$condition["start_time"] = array("gt", date("Y-m-d")); 
				} else if($status == "进行中"){
					$condition["start_time"] = array("lt", date("Y-m-d")); 
					$condition["end_time"] = array("gt", date("Y-m-d")); 
				} else if($status == "已结束"){
					$condition["end_time"] = array("lt", date("Y-m-d")); 
				}
			}
		} else {
			$condition["status"] = array("neq", "预览");
		}
		
		$sponsor = $_REQUEST["sponsor"];
		if(!empty($sponsor)){
			$condition["sponsor"] = array("like", "%".$sponsor."%"); 
		}
		
		$count = $Activity -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $Activity -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		$this -> display();
	}
	
	public function preview(){
		$Activity = M("Activity");
		$Activity -> where("status='预览'") -> delete();
	
		$saveForm = "saveForm";
		$id = $this -> $saveForm(true);
		$condition["id"] = $id;
		$result = $Activity -> where($condition) -> find();
		
		$introduce = split("\n",str_replace("\r","",$result["introduce"]));
		$describ_text = split("\n",str_replace("\r","",$result["describ_text"]));
		$this -> assign("result", $result);
		$this -> assign("introduce", $introduce);
		$this -> assign("describ_text", $describ_text);
		$this -> assign("preview", true);
		$this -> display("./Tpl/default/Activity/show.html");
	}

	public function publishActivity(){
		$id = $_REQUEST["id"];
		$Activity = M("Activity");
		$data["status"] = "已发布";
		$data["update_time"] = date("Y-m-d");
		$Activity -> where("id=".$id) -> save($data);
		echo '<script>alert("发布成功！");location.href="listActivity";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	
    /**
    +----------------------------------------------------------
    * 新增或保存一条活动记录
    +----------------------------------------------------------
    */
	public function saveOrUpdateActivity(){
		$saveForm = "saveForm";
		$this -> $saveForm(false);
		echo '<script type="text/javascript">alert("保存成功！");location.href="listActivity";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	
	public function show(){
		$id = $_REQUEST["id"];
		$Activity = M("Activity");
		$condition["id"] = $id;
		$condition["status"] = "已发布";
		
		$result = $Activity -> where($condition) -> find();
		if(empty($result)){
			$this -> error("没有这项活动或者活动还未被审核！");
		}
		
		$user_id = Session::get("id");
		if(!empty($user_id)){
			$Userlog = M("Userlog");
			unset($condition);
			$condition["user_id"] = $user_id;
			$condition["table_name"] = "kp_activity";
			$condition["table_id"] = $id;
			$log = $Userlog -> where($condition) -> find();
			if(!empty($log)){
				$this -> assign("joined", $log["insert_time"]);
			}
		} else {
			$this -> assign("unlogin", true);
		}
		$introduce = split("\n",str_replace("\r","",$result["introduce"]));
		$describ_text = split("\n",str_replace("\r","",$result["describ_text"]));
		$this -> assign("result", $result);
		$this -> assign("introduce", $introduce);
		$this -> assign("describ_text", $describ_text);
		
		/*获取过期信息*/
		$expires = 0;
		if($result["start_time"] > date("Y-m-d")){
			//还没到开始时间
			$expirse = -1;
		}
		if($result["end_time"] < date("Y-m-d")){
			//已经结束
			$expirse = 1;
		}
		$this -> assign("expirse", $expirse);
		
		/*获取评论信息*/
		$VActivityComment = M("vactivity_comment");
		unset($condition);
		$condition["activity_id"] = $id;
		$count = $VActivityComment -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $VActivityComment -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		
		/*获取用户信息*/
		$User = M("User");
		$loginUser = $User -> where("id=".$user_id) -> find();
		$this -> assign("user", $loginUser);
		
		$this -> display();
	}
	private function saveForm($preview){

		$id = $_REQUEST["id"];
		$error = $_FILES["photo"]["error"];
		foreach($error as $e){
			if($e == 0){
				$uploadFlag = true;
			}
		}
		$Activity = M("Activity");
		$Activity -> create();
		
		
		
		if($uploadFlag){
			import("ORG.Net.UploadFile");
			$upload = new UploadFile(); // 实例化上传类
			$upload -> maxSize  = 3 * 1024 * 1024 ; // 设置附件上传大小
			$upload -> allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload -> saveRule = 'uniqid';
			$upload -> savePath =  './Public/Uploads/'; // 设置附件上传目录
			if(!$upload->upload()) { // 上传错误提示错误信息
				$this -> error($upload -> getErrorMsg());
			}else{ // 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			
			$n = 0;
			if($error[0] == 0){
				$Activity -> topad_pic = $info[$n]["savename"];
				$n = $n + 1;
			}
			if($error[1] == 0){
				$Activity -> activity_pic = $info[$n]["savename"];
				$n = $n + 1;
			}
			if($error[2] == 0){
				$Activity -> detail_pic = $info[$n]["savename"];
				$n = $n + 1;
			}
			if($error[3] == 0){
				$Activity -> index_pic = $info[$n]["savename"];
				$n = $n + 1;
			}
		}
		if(empty($id)){
			$Activity -> insert_time = date("Y-m-d H:i:s");
			
			//判断是否为预览
			if($preview){
				$Activity -> status = "预览";
			} else {
				$Activity -> status = "未发布";
			}
			$Activity -> create_user_id = 0;
		}
		$Activity -> update_time = date("Y-m-d H:i:s");
		if(empty($id)){
			$id = $Activity -> add();
		} else {
			$Activity -> save();
		}
		return $id;		
	}
	
	public function test(){
		$VActivityComment = M("vactivity_comment");
		$condition["activity_id"] = 34;
		$count = $VActivityComment -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $VActivityComment -> where($condition) -> order('insert_time') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		$this -> ajaxReturn($count);
	}
	
}
?>