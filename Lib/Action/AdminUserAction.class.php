<?php
class AdminUserAction extends Action
{
    /**
    +----------------------------------------------------------
    * 进入新增或编辑页面
    +----------------------------------------------------------
    */
	public function editAdminUser(){
		$id = $_REQUEST["id"];
		if(!empty($id)){
			$User = M("User");
			$result = $User -> where("id=".$id) -> find();
			$this -> assign("result", $result);
		}
        $this->display();
	}

	public function deleteAdminUser(){
		$id = $_REQUEST["id"];
		$User = M("User");
		$User -> where("id=".$id) -> delete();
		echo '<script>alert("删除成功！");location.href="listUser";try{window.event.returnValue=false; }catch(e){}</script>';
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
    * 返回用户列表
    +----------------------------------------------------------
    */
	public function listUser(){
		$User = M("User");

		$user_name = $_REQUEST["user_name"];
		if(!empty($user_name)){
			$condition["user_name"] = array("like", "%".$user_name."%"); 
		}

		$user_type1 = $_REQUEST["user_type1"];
		if(!empty($user_type1)){
			$condition["user_type1"] = $user_type1; 
		}

		$user_type2 = $_REQUEST["user_type2"];
		if(!empty($user_type2)){
			$condition["user_type2"] = $user_type2; 
		}

		$status = $_REQUEST["status"];
		if(!empty($status)){
			$condition["status"] = $status; 
		}

		$count = $User -> where($condition) -> count();
		import("ORG.Util.Page");
 		$Page = new Page($count, 10);
		$foot = $Page -> show();
		$list = $User -> where($condition) -> order('update_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select(); // 查询数据
		
		$this->assign('list',$list); 
		$this->assign('foot',$foot);
		
		$this -> display();
	}
	
    /**
    +----------------------------------------------------------
    * 保存一条用户记录
    +----------------------------------------------------------
    */
	public function saveAdminUser(){
		$id = $_REQUEST["id"];
		$User = M("User");
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		$User -> save();
		//处理附件上传
		$moveFile = "moveFile";
		if(!empty($User -> business_license)){
			$info = $this -> $moveFile($User -> business_license);
			echo '111';
			echo $info;
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
		//$this -> ajaxReturn($id);
		echo '<script>alert("保存成功！");location.href="listUser";try{window.event.returnValue=false; }catch(e){}</script>';
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
			return $dirupload ;
		}else{
				return '2' ;
		}
    }
	    /**
    +----------------------------------------------------------
    * 审核一条用户记录
    +----------------------------------------------------------
    */
	public function checkAdminUser(){
		$id = $_REQUEST["id"];
		$User = M("User");
		$data["status"] = "已审核";
		$data["update_time"]  = date("Y-m-d H:i:s");
		$condition["id"] = $id ;
		$result = $User -> where($condition)->save($data);
	   if($result !== false){
             $json["success"] = true;
		     $json["msg"] = "审核成功！";
       }else{
             $json["success"] = false;
		     $json["msg"] = "审核失败！";
       }
		$this -> ajaxReturn($json);
	}
	
	public function importUser(){
		$this -> display();
	}
	
	public function importUserSave(){
	
		/*上传csv文件*/
		import("ORG.Net.UploadFile");
		$upload = new UploadFile(); // 实例化上传类
		$upload -> maxSize  = 3 * 1024 * 1024 ; // 设置附件上传大小
		$upload -> allowExts  = array('csv'); // 设置附件上传类型
		$upload -> saveRule = 'uniqid';
		$upload -> savePath =  './Public/CsvDir/'; // 设置附件上传目录
		if(!$upload->upload()) { // 上传错误提示错误信息
			$this -> error($upload -> getErrorMsg());
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		
		
		/*解析文件并存入数据库*/
		$judgeImport = "judgeImport";
		$judgeResult = $this -> $judgeImport($info[0]["savename"]);
		echo "<div>正在导入，请不要关闭页面...</div>";
		if($judgeResult["pass"]){
			$csv = new csvDataFile($judgeResult["rename_filename"]); 
			$n = 0;
			$sendSms = "sendSms";
			while($csv->next_Row()) { 
				++ $n;
				$User = M("User");
				$User -> user_name = trim($csv->f('手机号码')); 
				$User -> true_name = trim($csv->f('姓名')); 
				$User -> company_name = trim($csv->f('企业名称'));
				$User -> company_address = trim($csv->f('联系地址'));
				
				if(empty($User -> user_name)){
					echo '<div style="color:red">第'. $n .'个用户导入失败，原因：手机号为空</div>';
					flush();
					continue;
				}
				if(empty($User -> true_name)){
					echo '<div style="color:red">用户【'.$User -> user_name.'】导入失败，原因：姓名为空</div>';
					flush();
					continue;
				}
				if(empty($User -> company_name)){
					echo '<div style="color:red">用户【'.$User -> user_name.'】导入失败，原因：企业名称为空</div>';
					flush();
					continue;
				}
				if(empty($User -> company_address)){
					echo '<div style="color:red">用户【'.$User -> user_name.'】导入失败，原因：联系地址为空</div>';
					flush();
					continue;
				}
				
				{
					$User1 = M("User");
					$condition["user_name"] = $User -> user_name;
					$count = $User1 -> where($condition) -> count();
					if($count > 0){
						echo '<div style="color:red">用户【'.$User -> user_name.'】导入失败，原因：用户已存在</div>';
						flush();
						continue;
					}
				}
				
				$User -> province = trim($csv->f('省')); 
				$User -> city = trim($csv->f('市')); 
				$User -> post_code = trim($csv->f('邮政编码'));
				$User -> business_call = trim($csv->f('固定电话'));
				$User -> import_flag = "导入";
				$User -> activite_flag = "未激活";
				$User -> status = "基本注册";
				$User -> check_num = rand(100000, 999999);
				$User -> insert_time = date("Y-m-d H:i:s");
				$User -> update_time = date("Y-m-d H:i:s");
				$User -> add();
				/*短信发送激活码*/
				
				$this -> $sendSms($user_name, "尊敬的".$User -> check_num."您已成为立配网认证会员！您的账户名为” + username + “，激活码为” + active1 + ”，上www.L-pei.com激活为认证会员即送好礼。");
			
				/*短信发送激活码*/
				echo '<div>用户' . $User -> user_name . '导入成功</div>';
				flush();
			} 
		} else {
			echo '<div style="color:red">文件格式不正确</div>';
			flush();
		}
		echo '<div>导入完毕！</div>';
	}
	
	private function judgeImport($name){
		require("./Public/php/csvdatafile.php");
		$dirbase = preg_replace ("[Lib.*$]","",dirname(__FILE__));
		$csvDir = $dirbase."/Public/CsvDir/";
		
		$filename = $csvDir.$name; 
		$rename_filename = $csvDir.preg_replace("[\\.csv$]","_utf8.csv", $name); 
		
		$utf8_fopen_read = "utf8_fopen_read";
		$contents = iconv('gbk', 'utf-8', file_get_contents($filename)); 
		// // format content for special chars 
		$contents = @addslashes($contents); 
		$contents = @str_replace('\,', '\ ,', $contents); 
		$contents = @stripslashes($contents); 

		// // Write to new file 
		$handle = @fopen($rename_filename, "w"); 
		@fwrite($handle, $contents); 
		@fclose($handle); 

		$fd = @fopen($rename_filename, "rb"); 
		$first_line = str_replace(' ,',',',str_replace('"','',trim(@fgets($fd, 1000)))) ; 
		@fclose($fd); 
		$pass = true;
		if($first_line != "手机号码,姓名,企业名称,联系地址,省,市,邮政编码,Email,固定电话") { 
			$pass = false; 
		} 
		
		$json["pass"] = $pass;
		$json["rename_filename"] = $rename_filename;
		return $json;
	}
	
	private function utf8_fopen_read($fileName) { 
		$fc = iconv('gbk', 'utf-8', file_get_contents($fileName)); 
		return $fc; 
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
	
	private function sendSms($mobile, $content){
		$target = "http://60.28.195.138/submitdata/service.asmx/g_Submit";
		$post_data = "sname=dlshzy03&spwd=87654321&scorpid=&sprdid=1012818&sdst=" . $mobile . "&smsg=".rawurlencode($content);
		$post = "post";
		$gets = $this -> $post($post_data, $target);
		return $gets;
	}
	
}
?>