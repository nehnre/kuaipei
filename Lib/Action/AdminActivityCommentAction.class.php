<?php
class AdminActivityCommentAction extends Action
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
	
	
    /**
    +----------------------------------------------------------
    * 返回用户列表
    +----------------------------------------------------------
    */
	public function listActivityComment(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="/Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			$vactivity_comment = M("vactivity_comment");

			$user_name = $_REQUEST["user_name"];
			if(!empty($user_name)){
				$condition["user_name"] = array("like", "%".$user_name."%"); 
			}

			$activity_title = $_REQUEST["activity_title"];
			if(!empty($activity_title)){
				$condition["activity_title"] = array("like", "%".$activity_title."%"); 
			}

			$content = $_REQUEST["content"];
			if(!empty($content)){
				$condition["content"] = array("like", "%".$content."%"); 
			}

			$count = $vactivity_comment -> where($condition) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);
			$foot = $Page -> show();
			$list = $vactivity_comment -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			
			$this -> display();
		
		}

	}

	public function findContent(){
		$id =$_GET['id'];
		$condition["id"]  =$id;
		$vactivity_comment = M("vactivity_comment");
		$result = $vactivity_comment -> where($condition) -> find();
		if(empty($result)){
				$json["success"] = false;
				$json["msg"] = "原密码不正确！";
		}else{
				$json["success"] = true;
				$json["msg"] = $result["content"];
		 }

		 $this -> ajaxReturn($json);
	}

	public function deleteActivityComment(){
		$id = $_REQUEST["id"];
		$activity_comment = M("activity_comment");
		$activity_comment -> where("id=".$id) -> delete();
		header("Content-type: text/html; charset=utf-8");
		echo '<script>alert("删除成功！");location.href="listActivityComment";try{window.event.returnValue=false; }catch(e){}</script>';
	}

	public function test(){
		Session::clear();
	}
	
}
?>