<?php
class PicNewsAction extends Action
{

	public function canclePublishPicNews(){
		$id = $_REQUEST["id"];
		$pic_news = M("pic_news");
		$data["status"] = "未发布";
		$data["update_time"] = date("Y-m-d");
		$pic_news -> where("id=".$id) -> save($data);
		echo '<script>alert("取消成功！");location.href="listPicNews";</script>';
	}
	
	public function deletePicNews(){
		$id = $_REQUEST["id"];
		$pic_news = M("pic_news");
		$pic_news -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listPicNews";</script>';
	}

	public function editPicNews(){
		$id = $_REQUEST["id"];
		if(!empty($id)){
			$pic_news = M("pic_news");
			$result = $pic_news -> where("id=".$id) -> find();
			$this -> assign("result", $result);
		}
        $this->display();
	}
	
    public function index()
    {
        $this->display();
    }
	
    public function listPicNews()
    {
		$pic_news = M("pic_news");
		
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
			$condition["status"] = $status; 
		}
		
		
		$count = $pic_news -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $pic_news -> where($condition) -> order('insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		$this -> display();
    }

	public function publishPicNews(){
		$id = $_REQUEST["id"];
		$pic_news = M("pic_news");
		$data["status"] = "已发布";
		$data["update_time"] = date("Y-m-d");
		$pic_news -> where("id=".$id) -> save($data);
		echo '<script>alert("发布成功！");location.href="listPicNews";</script>';
	}
	
	
	public function saveOrUpdatePicNews(){

		$id = $_REQUEST["id"];
		$error = $_FILES["photo"]["error"];
		foreach($error as $e){
			if($e == 0){
				$uploadFlag = true;
			}
		}
		$pic_news = M("pic_news");
		$pic_news -> create();
		
		
		
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
				$pic_news -> pic = $info[$n]["savename"];
				$n = $n + 1;
			}
		}
		$pic_news -> update_time = date("Y-m-d H:i:s");
		if(empty($id)){
			$pic_news -> insert_time = date("Y-m-d H:i:s");
			$pic_news -> status = '未发布';
			$id = $pic_news -> add();
		} else {
			$pic_news -> save();
		}
		echo '<script type="text/javascript">alert("操作成功！");location.href="listPicNews"</script>';
	}
}