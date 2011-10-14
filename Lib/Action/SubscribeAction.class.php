<?php
class SubscribeAction extends Action
{
    public function index()
    {
		$email = $_REQUEST["subEmail"];
		if(empty($email)){
			$json["success"] = false;
			$json["msg"] = "email不能为空！";
		} else {
			$Subscribe = M("Subscribe");
			
			$Subscribe -> email = $email;
			$Subscribe -> insert_time = date("Y-m-d H:i:s");
			$Subscribe -> add();
			$json["success"] = true;
			$json["msg"] = "订阅成功！";
		}
		$this -> ajaxReturn($json);
    }
}