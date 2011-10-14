<?php
class UserCenterAction extends Action
{	
	
    /**
    +----------------------------------------------------------
    * 返回认证页面
    +----------------------------------------------------------
    */
	public function userCenterEdit(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		$this -> assign("result",$result);
		$this->display();
	}

	    /**
    +----------------------------------------------------------
    * 返回认证页面
    +----------------------------------------------------------
    */
	public function userCenterDetail(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		$this -> assign("result",$result);
		$this->display();
	}

    /**
    +----------------------------------------------------------
    * 保存基本信息
    +----------------------------------------------------------
    */
	public function updateUser(){
	
		if(!Session::is_set("id") && !$if_insert){
			$this->error("没有登录！");
		}
		
		$User = M('User');
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		$User -> id = Session::get("id");
		$User -> save();
		
		//处理附件上传
		$moveFile = "moveFile";
		if(!empty($User -> business_license)){
			$this -> $moveFile($User -> business_license);
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
		
		$this -> ajaxReturn(1,"更新成功",2);
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
		}
    }
	
	
	private function post($data, $target) {
		$url_info = parse_url($target);
		$httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
		$httpheader .= "Host:" . $url_info['host'] . "\r\n";
		$httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
		$httpheader .= "Content-Length:" . strlen($data) . "\r\n";
		$httpheader .= "Connection:close\r\n\r\n";
		$httpheader .= $data;

		$fd = fsockopen($url_info['host'], 6003);
		fwrite($fd, $httpheader);
		$gets = "";
		while(!feof($fd)) {
			$gets .= fread($fd, 128);
		}
		fclose($fd);
		return $gets;
	}

	

	
}
?>