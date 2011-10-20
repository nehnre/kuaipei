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
			$condition["email"] = $email;
			$result = $Subscribe -> where($condition) -> count();
			$json["result"] = $result;
			if($result <= 0){
				$Subscribe -> email = $email;
				$Subscribe -> insert_time = date("Y-m-d H:i:s");
				$Subscribe -> add();
				$json["success"] = true;
				$json["msg"] = "订阅成功！";
			} else {
				$json["success"] = false;
				$json["msg"] = "你已经订阅过本站资讯！";
			}
		}
		$this -> ajaxReturn($json);
    }
}