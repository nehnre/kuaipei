<?php
class SearchAction extends Action
{
	public function index(){
		$Vsearch = M("vsearch"); 
		$word = $_REQUEST["word"];
		if(!empty($word)){ 
			$where["tags"] =array("like", "%".$word."%"); 
			$where["title"] =array("like", "%".$word."%"); 
			$where["other"] =array("like", "%".$other."%"); 
			$where['_logic'] = "or";
			$map['_complex'] =$where; 
		} else {
			$tags = $_REQUEST["tags"];
			if(!empty($tags)){
				$map["tags"] = array('like',"%".$tags."%");;
			}		
		}
		
		
		$type = $_REQUEST["type"];
		if(!empty($type)){
			if("行业资讯" == $type){
				$map["type"] = array('neq',"立配活动");;
			} else {
				$map["type"] = $type;
			}
		}
		$count = $Vsearch -> where($map) -> count();
		import("ORG.Util.Page");
		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $Vsearch -> where($map) -> order('seq  desc,insert_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		$this -> assign('count', $count);
		$this -> display();
	}
}
?>