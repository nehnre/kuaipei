<?php
class SearchAction extends Action
{
	public function index(){
		$Vsearch = M("vsearch"); 
		$word = $_REQUEST["word"];
		if(!empty($word)){ 
			$where["tags"] =array("like", "%".$word."%"); 
			$where["title"] =array("like", "%".$word."%"); 
			$where['_logic'] = "or";
			$map['_complex'] =$where; 
		}
		
		$type = $_REQUEST["type"];
		if(!empty($type)){
			$map["type"] = $type;
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