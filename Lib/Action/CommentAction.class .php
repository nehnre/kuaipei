<?php
class CommentAction extends Action
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
	public function updateComment(){
		if(!Session::is_set("id")){
			$json["success"] = false;
			$json["msg"] = "还没有登录";
		} else {
			$ActivityComment = M("activity_comment");
			$ActivityComment -> title = $_REQUEST["title"];
			$ActivityComment -> content = $_REQUEST["content"];
			$ActivityComment -> insert_time = date("Y-m-d H:i:s");
			$ActivityComment -> user_id = Session::get("id");
			$ActivityComment -> add();
			$json["success"] = true;
			$json["msg"] = "评论成功";
		}
		$this -> ajaxReturn($json);
	}
}
?>