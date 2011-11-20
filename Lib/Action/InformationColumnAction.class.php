<?php
class InformationColumnAction extends Action 
{


	public function canclePublishInformationColumn(){
		$id = $_REQUEST["id"];
		$p = $_REQUEST["p"];
		$InformationColumn = M("information_column");
		$data["status"] = "未发布";
		$InformationColumn -> where("id=".$id) -> save($data);
		if(!empty($p)){
				echo '<script>alert("取消成功！");location.href="listInformationColumn?p='.$p.'";</script>';
		}else{
		        echo '<script>alert("取消成功！");location.href="listInformationColumn";</script>';
		}
		
	}

    /**
    +----------------------------------------------------------
    * 进入新增或编辑页面
    +----------------------------------------------------------
    */
	public function editInformationColumn(){
		if(!Session::is_set("systemId")){
			  header("Content-type: text/html; charset=utf-8");
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";</script>';
		}else{
			$id = $_REQUEST["id"];
			if(!empty($id)){
				$InformationColumn = M("information_column");
				$result = $InformationColumn -> where("id=".$id) -> find();
				$getTags = "getTags";
				$search_tags = $this -> $getTags("kp_information_column", $id);
				if(!empty($search_tags)){
					$result["search_tags"] = $search_tags;
				}
				$this -> assign("result", $result);
			}
			$this->display();
		}
	}

	public function deleteInformationColumn(){
		$id = $_REQUEST["id"];
		$informationColumn = M("information_column");
		$informationColumn -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listInformationColumn";</script>';
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
		      echo '<script>alert("您还没有登录！");location.href="Admin/loginInit";</script>';
		}else{
			$informationColumn = M("information_column");
			
			$title = $_REQUEST["title"];
			if(!empty($title)){
				$condition["title"] = array("like", "%".$title."%"); 
			}
			
			$source = $_REQUEST["source"];
			if(!empty($source)){
				$condition["source"] = $source; 
			}

			$column = $_REQUEST["column"];
			if(!empty($column)){
				$condition["column"] = $column; 
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
		$id = $_REQUEST["informationColumnId"];
		$userPublishTime = $_REQUEST["userPublishTime"];
		if(!empty($id)){
			$informationColumn = M("information_column");
			$data["status"] = "已发布";
			$data["update_time"] = date("Y-m-d H:i:s");
			$data["publish_time"] = date("Y-m-d H:i:s");
			if(!empty($userPublishTime)){
				$data["user_publish_time"] = date("Y-m-d H:i:s",strtotime($userPublishTime));
			}else{
				$data["user_publish_time"] = date("Y-m-d H:i:s");
			}
			$informationColumn -> where("id=".$id) -> save($data);
			$json["msg"] = "发布成功！";
			$json["success"] = true;
		}else{
			$json["msg"] = "发布失败！";
			$json["success"] = false;
		}
		$this -> ajaxReturn($json);
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
		
		
		//处理TAGS
		$clearTags = "clearTags";
		$this -> $clearTags("kp_information_column", $id);
		
		$tags = $_REQUEST["search_tags"];
		if(!empty($tags)){
			$saveTags = "saveTags";
			$this -> $saveTags($tags, "kp_information_column", $id);
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
					$condition["column"] ="厂商报道"; 
				}else if($flag==2){
					$condition["column"] ="汽配热点"; 
				}else if($flag==3){
					$condition["column"] ="配件营销"; 
				}else if($flag==4){
					$condition["column"] ="汽配人物"; 
				}else if($flag==5){
					$condition["column"] ="最新商情"; 
				}else if($flag==6){
					$condition["column"] ="配件一览"; 
				}
			}
			$count = $informationColumn -> where($condition) -> count();
			import("ORG.Util.Page");
			$Page = new Page($count, 10);

            //s$pagep = new PhptdPage($count,10); // 实例化分页类
			//$foot = $pagep->showPage($setPage);
			$foot = $Page -> show();
			$list = $informationColumn -> where($condition) -> order('user_publish_time desc,update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
			$this->assign('list',$list); 
			$this->assign('foot',$foot);
			
			
			unset($condition);
		    $condition["status"] ="已发布"; 
			$top16 = $informationColumn -> where($condition) -> order('seq  desc,update_time desc') -> limit(15) -> select();
			$this->assign('top16',$top16);
			
			//显示滚动图片信息
			$pic_news = M("pic_news");
			unset($condition);
			$condition["status"] = "已发布";
			$condition["type"] = "活动资讯";
			$picNews = $pic_news -> where($condition) -> order("insert_time desc") -> limit(5) -> select();
			$this -> assign("picNews", $picNews);
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
				$condition["id"] = $id;
				$condition["status"] = "已发布";
				$result = $InformationColumn -> where($condition) -> find();
				if(!empty($result)){
					$this -> assign("result", $result);
					$search_tags  = $result['search_tags'];
					if(!empty($search_tags)){
                        $i = 0;
						$arrTags = explode(",",str_replace("，","," ,$search_tags));
						foreach($arrTags as $tag){
							$tag = trim($tag);
							$array[$i ] =array("like", "%".$tag."%"); 
							$i ++;
						}
						$array[$i] = 'or';
					}
				    $map['search_tags'] =$array;
					$map['id']  = array(array('neq',$result['id'])); 
					$InformationColumn1 = M("information_column");
		            $list = $InformationColumn1 -> where($map) -> order('seq  desc,insert_time desc') -> limit(5) -> select();
		            $this -> assign("list", $list);

					$this->display();
				} else {
					$this -> error("文章不存在或未发布！");
				}
			} else {
				$this -> error("参数错误！");
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
			
			//显示滚动图片信息
			$pic_news = M("pic_news");
			unset($condition);
			$condition["status"] = "已发布";
			$condition["type"] = "活动资讯";
			$picNews = $pic_news -> where($condition) -> order("insert_time desc") -> limit(5) -> select();
			$this -> assign("picNews", $picNews);
			$this -> display();
	}
	
	private function clearTags($table_name, $table_id){
		if(!empty($table_name) && !empty($table_id)){
			$table_tags = M("table_tags");
			$condition["table_name"] = $table_name;
			$condition["table_id"] = $table_id;
			$table_tags -> where($condition) -> delete();
		}
	}
	
	private function getTags($table_name, $table_id){
		$value = "";
		if(!empty($table_name) && !empty($table_id)){
			$condition["table_name"] = $table_name;
			$condition["table_id"] = $table_id;
			$vtable_tags = M("vtable_tags");
			$results = $vtable_tags -> where($condition) -> select();
			foreach($results as $result){
				if(!empty($value)){
					$value = $value . ",";
				}
				$value = $value . $result["tag_name"];
				//echo json_encode($value);

			}
		}
		return $value;
	}
	
	private function saveTags($tags1, $table_name, $table_id){
		if(!empty($tags1)){
			$arrTags = split(",",str_replace("，","," ,$tags1));
			$table_tags = M("table_tags");
			$tags = M("tags");
			foreach($arrTags as $tag){
				$tag = trim($tag);
				$condition["tag_name"] = $tag;
				$t = $tags -> where($condition) -> find();
				if(empty($t)){
					$tags -> id = "";
					$tags -> tag_name = $tag;
					$tags -> insert_time = date("Y-m-d H:i:s");
					$tags_id = $tags -> add();
				} else {
					$tags_id = $t["id"];
				}
				$table_tags -> tags_id = $tags_id;
				$table_tags -> table_name = $table_name;
				$table_tags -> table_id = $table_id;
				$table_tags -> add();
			}
		}
	}	
}
?>