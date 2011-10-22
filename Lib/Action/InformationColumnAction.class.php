<?php
class InformationColumnAction extends Action
{


	public function canclePublishInformationColumn(){
		$id = $_REQUEST["id"];
		$InformationColumn = M("information_column");
		$data["status"] = "未发布";
		$InformationColumn -> where("id=".$id) -> save($data);
		echo '<script>alert("取消成功！");location.href="listInformationColumn";try{window.event.returnValue=false; }catch(e){}</script>';
	}

    /**
    +----------------------------------------------------------
    * 进入新增或编辑页面
    +----------------------------------------------------------
    */
	public function editInformationColumn(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			$id = $_REQUEST["id"];
			if(!empty($id)){
				$InformationColumn = M("information_column");
				$result = $InformationColumn -> where("id=".$id) -> find();
				$this -> assign("result", $result);
			}
			$this->display();
		}
	}

	public function deleteInformationColumn(){
		$id = $_REQUEST["id"];
		$informationColumn = M("information_column");
		$informationColumn -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listInformationColumn";try{window.event.returnValue=false; }catch(e){}</script>';
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
    * 返回后台资讯列表
    +----------------------------------------------------------
    */
	public function listInformationColumn(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";try{window.event.returnValue=false; }catch(e){}</script>';
		}else{
			$informationColumn = M("information_column");
			
			$title = $_REQUEST["title"];
			if(!empty($title)){
				$condition["title"] = array("like", "%".$title."%"); 
			}
			
			$type = $_REQUEST["source"];
			if(!empty($type)){
				$condition["source"] = $type; 
			}
			
			$status = $_REQUEST["status"];
			if(!empty($status)){
				  $condition["status"] = $status; 
			} 
			$count = $informationColumn -> where($condition) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);
			$foot = $Page -> show();
			$list = $informationColumn -> where($condition) -> order('seq  desc,update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			$this -> display();
		}
		
	}
	

	public function publishInformationColumn(){
		$id = $_REQUEST["id"];
		$informationColumn = M("information_column");
		$data["status"] = "已发布";
		$data["update_time"] = date("Y-m-d");
        $data["publish_time"] = date("Y-m-d");
		$informationColumn -> where("id=".$id) -> save($data);
		echo '<script>alert("发布成功！");location.href="listInformationColumn";try{window.event.returnValue=false; }catch(e){}</script>';
	}
	
    /**
    +----------------------------------------------------------
    * 新增或保存一条资讯记录
    +----------------------------------------------------------
    */
	public function saveOrUpdateinformationColumn(){
		$id = $_REQUEST["id"];

		$informationColumn = M("information_column");
		$informationColumn -> create();

		if(empty($id)){
			$informationColumn -> insert_time = date("Y-m-d H:i:s");
			$informationColumn -> status = "未发布";
		}
		$informationColumn -> update_time = date("Y-m-d H:i:s");
		if(empty($id)){
			$id = $informationColumn -> add();
		} else {
			$informationColumn -> save();
		}
		//处理附件上传
		$moveFile = "moveFile";
		if(!empty($informationColumn -> picture)){
			$this -> $moveFile($informationColumn -> picture);
		}
		$this -> ajaxReturn(1,"提交成功",2);
	}
  /**
    +----------------------------------------------------------
    * 前台搜索
    +----------------------------------------------------------
    */

	public  function subsearchInformationColumn(){
			$informationColumn = M("information_column"); 
			$word = $_REQUEST["word"];
			if(!empty($word)){ 
                     $where["search_tags"] =array("like", "%".$word."%"); 
					 $where["title"] =array("like", "%".$word."%"); 
					 $where['_logic'] = "or";
			}
			 $map['_complex'] =$where; 
			 $map['status'] =array('eq',  "已发布");
			$count = $informationColumn -> where($map) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);
			$foot = $Page -> show();
			$list = $informationColumn -> where($map) -> order('seq  desc,update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			$this -> display();
	}


    /**
    +----------------------------------------------------------
    * 返回前台资讯列表
    +----------------------------------------------------------
    */
	public function supListInformationColumn(){
			$informationColumn = M("information_column");
		    $condition["status"] ="已发布"; 
			$flag = $_REQUEST["flag"];
			if(!empty($flag)){ 
				if($flag==1){
					$condition["column"] ="厂商动态"; 
				}else if($flag==2){
					$condition["column"] ="经销动态"; 
				}else if($flag==3){
					$condition["column"] ="汽配热点"; 
				}else if($flag==4){
					$condition["column"] ="汽配人物"; 
				}else if($flag==5){
					$condition["column"] ="维修资源库"; 
				}else if($flag==6){
					$condition["column"] ="一线维修"; 
				}
			}
			$count = $informationColumn -> where($condition) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);
			$foot = $Page -> show();
			$list = $informationColumn -> where($condition) -> order('seq  desc,update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			$this -> display();
		
	}

    /**
    +----------------------------------------------------------
    * 返回前台资讯详情
    +----------------------------------------------------------
    */
	public function supInformationColumnDetail(){
			$id = $_REQUEST["id"];
			if(!empty($id)){
				$InformationColumn = M("information_column");
				$result = $InformationColumn -> where("id=".$id) -> find();
				$this -> assign("result", $result);
			}
			$this->display();
		
	}
	
	
	private function post($data, $target) {
		$url_info = parse_url($target);
		$httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
		$httpheader .= "Host:" . $url_info['host'] . "\r\n";
		$httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
		$httpheader .= "Content-Length:" . strlen($data) . "\r\n";
		$httpheader .= "Connection:close\r\n\r\n";
		$httpheader .= $data;

		$fd = fsockopen($url_info['host'], 80);
		fwrite($fd, $httpheader);
		$gets = "";
		while(!feof($fd)) {
			$gets .= fread($fd, 128);
		}
		fclose($fd);
		return $gets;
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

	public function test(){
			$User = M("User");
			$condition["id"] = 22;
			$true_name = $User -> where($condition) -> field("true_name") -> find();
			$this -> ajaxReturn($true_name);
	}
	
}
?>