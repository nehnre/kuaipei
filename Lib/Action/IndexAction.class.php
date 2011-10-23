<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
		$Activity = M("Activity");
		$result = $Activity -> where("status='已发布'") -> order('insert_time desc') -> limit(21) -> select();
		$len = count($result);
		for($i=0;$i< $len/3;$i++){
			$temp[$i][0] = $result[$i*3];
			if($len > $i*3 + 1){
				$temp[$i][1] = $result[$i*3 + 1];
			}
			if($len > $i*3 + 2){
				$temp[$i][2] = $result[$i*3 + 2];
			}
		}
		$this -> assign("result", $temp);
		
		$Vuserlog = M("Vuserlog");
		$log = $Vuserlog -> where("") -> order('insert_time desc') -> limit(7) -> select();
		$this -> assign("log", $log);
		
		//显示活动相关信息
		$Information_column = M("information_column");
		$hot = $Information_column -> where("`column`='汽配热点'") -> order("seq desc, insert_time desc") -> limit(7) -> select();
		$this -> assign("hot", $hot);
		$people = $Information_column -> where("`column`='汽配人物'") -> order("seq desc, insert_time desc") -> limit(7) -> select();
		$this -> assign("people", $people);
		$resource = $Information_column -> where("`column`='维修资源库'") -> order("seq desc, insert_time desc") -> limit(7) -> select();
		$this -> assign("resource", $resource);
		
		
        $this->display();
    }

    /**
    +----------------------------------------------------------
    * 探针模式
    +----------------------------------------------------------
    */
    public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

}
?>