<?php
class ActivityCommentAction extends Action
{
   /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->ajaxReturn("test");
    }
	public function updateComment(){
		if(!Session::is_set("id")){
			$json["success"] = false;
			$json["msg"] = "还没有登录";
		} else {
			$ActivityComment = M("activity_comment");
			$ActivityComment -> title = $_REQUEST["title"];
			$ActivityComment -> content = $_REQUEST["content"];
			$ActivityComment -> activity_id = $_REQUEST["activity_id"];
			$ActivityComment -> insert_time = date("Y-m-d H:i:s");
			$ActivityComment -> user_id = Session::get("id");
			$ActivityComment -> ip = $_SERVER['REMOTE_ADDR'];
			$ActivityComment -> add();
			$json["success"] = true;
			$json["msg"] = "评论成功";
		}
		$this -> ajaxReturn($json);
	}
}
?>