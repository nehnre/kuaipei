<?php
class UploadAction extends Action
{
    /**
    +----------------------------------------------------------
    * 返回注册页面
    +----------------------------------------------------------
    */
    public function index()
    {
		import("ORG.Net.UploadFile");
		$upload = new UploadFile(); // 实例化上传类
		$upload->maxSize  = 3145728 ; // 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
		$upload->savePath =  './Temp/'; // 设置附件上传目录
		$upload->saveRule = 'uniqid';
		$upload->thumb = true;
		$upload->thumbMaxWidth = "200";
		$upload->thumbMaxHeight = "200";
		if(!$upload->upload()) { // 上传错误提示错误信息
			$info = $upload->getErrorMsg();
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$this -> ajaxReturn(1,$info ,1);
    }
    /**
    +----------------------------------------------------------
    * 删除过时文件
    +----------------------------------------------------------
    */
    public function deletePastdueFile()
    {
		$dirtemp = preg_replace ("[Lib.*$]","",dirname(__FILE__))."/Temp/";
		$handle = opendir($dirtemp);
		$info = "";
		while (false !== ($file =readdir($handle))) {
			if(!is_dir($file)){
				if(time() - filemtime($file) > 20 * 60 * 1000){
					unlink($dirtemp.$file);
					$info = $info.$file;
				}
			}
		}
		$this -> ajaxReturn(1,$info ,1);
    }
	
    /**
    +----------------------------------------------------------
    * 测试
    +----------------------------------------------------------
    */
    public function test()
    {
		$dirbase = preg_replace ("[Lib.*$]","",dirname(__FILE__));
		$dirtemp = $dirbase."/Temp/";
		$dirupload = $dirbase."/Public/Upload/";
		$info = copy($dirtemp."thumb_4e6caf9c74e58.jpg", $dirupload."thumb_4e6caf9c74e58.jpg");
		$this -> ajaxReturn(1,$info ,1);
    }
	
}