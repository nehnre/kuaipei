<?php
class RegAction extends Action
{	
	
    /**
    +----------------------------------------------------------
    * 返回认证页面
    +----------------------------------------------------------
    */
	public function authUser(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		if("厂商" == $result["user_type1"] || "经销商" == $result["user_type1"] || "修理厂" == $result["user_type1"]){
			$template = "./Tpl/default/Reg/authUserFactory.html";
		} else if("车队" == $result["user_type1"]){
			$template = "./Tpl/default/Reg/authUserCarTeam.html";
		} else if("车主" == $result["user_type1"]){
			$template = "./Tpl/default/Reg/authUserCarHost.html";
		} else {
			$this -> error("还没有<a href='chooseType'>选择分类</a>");
		}
		$this -> assign("result",$result);
		$this -> display($template);
	}
	
    /**
    +----------------------------------------------------------
    * 返回手机验证页面
    +----------------------------------------------------------
    */
    public function checkMobile()
    {
        $this->display();
    }
	
    /**
    +----------------------------------------------------------
    * 验证短信验证码
    +----------------------------------------------------------
    */
	public function checkSmsNum(){

		$user_name = $_GET["user_name"];
		$check_num = $_GET["check_num"];
		$User = M('User');
		$condition['user_name'] = $user_name;
		$result = $User -> where($condition) -> field("id, check_num, import_flag") -> find();
		if(!empty($result)){
			if("导入" == $result["import_flag"]){
				if($check_num == $result["check_num"]){
					Session::set("id", $result["id"]);
					Session::set("user_name", $result["user_name"]);
					$this -> ajaxReturn(2,"验证成功！",2);
				}
			}
		}
		
		if($check_num == Session::get($user_name)){
			$User -> user_name = $user_name;
			$User -> check_num = $check_num;
			$User -> update_time = date("Y-m-d H:i:s");
			$User -> insert_time = date("Y-m-d H:i:s");
			$User -> status = "基本注册";
			$id = $User -> add();
			
			Session::set("id", $id);
			Session::set("user_name", $user_name);
			$this -> ajaxReturn(2,"验证成功！",2);
		} else {
			
			$this -> ajaxReturn(1,"验证失败！",1);
		}
	}
	
    /**
    +----------------------------------------------------------
    * ajax校验用户名是否存在，如果存在则发送短信
    +----------------------------------------------------------
    */
	public function checkUserName(){
		$user_name = $_GET["user_name"];
		$User = M('User');
		$condition['user_name'] = $user_name;
		$result = $User -> where($condition) -> field("id, check_num, import_flag") -> find();
		if(!empty($result)){
			if("导入" == $result["import_flag"]){
				$check_num = $result["check_num"];
				Session::set($user_name, $check_num);
				$this -> ajaxReturn("",$check_num);
			} else {
				$this -> ajaxReturn("","用户名已经存在，不能注册");
			}
		} else {
			$check_num = rand(100000, 999999);
			Session::set($user_name,$check_num);
			$sendSms = "sendSms";
			//$this -> $sendSms($user_name, $check_num);
			$this -> ajaxReturn($status,$check_num,2);
		}
	}
	
    /**
    +----------------------------------------------------------
    * 返回认证页面
    +----------------------------------------------------------
    */
	public function chooseType(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		
		$this -> assign("result", $result);
		$this -> display();
	}
	
    /**
    +----------------------------------------------------------
    * 返回注册页面
    +----------------------------------------------------------
    */
    public function index()
    {
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		
		$id = Session::get("id");
		$User = M("User");
		$result = $User -> where("id=".$id) -> find();
		// $this -> ajaxReturn(1,$result,2);
		
		$this -> assign("result", $result);
        $this->display();
    }
	
    /**
    +----------------------------------------------------------
    * 保存注册基本信息
    +----------------------------------------------------------
    */
	public function insertUser(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		
		$User = M('User');
		$User -> create();
		
		$User -> insert_time = date("Y-m-d H:i:s");
		$User -> update_time = date("Y-m-d H:i:s");
		
		$id = $User -> add();
		
		Session::set("id",$id);
		Session::set("user_name",$user_name);
		$this -> ajaxReturn($id,"恭喜你，用户名不存在，可以注册",2);
	}
	
	
    /**
    +----------------------------------------------------------
    * 返回详细注册页面
    +----------------------------------------------------------
    */
    public function regMoreInfo()
    {
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
        $this->display();
    }	
	
	
	public function regMoreInfoTip(){
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
        $this->display();
	}

	
    /**
    +----------------------------------------------------------
    * 返回注册完成页面
    +----------------------------------------------------------
    */
    public function regTip()
    {
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
        $this->display();
    }	
	
    /**
    +----------------------------------------------------------
    * 保存注册基本信息
    +----------------------------------------------------------
    */
	public function updateUser(){
	
		if(!Session::is_set("id")){
			$this->error("没有登录！");
		}
		
		$User = M('User');
		$User -> create();
		$User -> update_time = date("Y-m-d H:i:s");
		$User -> id = Session::get("id");
		
		//处理认证
		$auth = $_REQUEST["auth"];
		if(!empty($auth)){
			$User -> status = "待审核";
		}
		
		$password = $_REQUEST["password"];
		if(!empty($password)){
			$User -> password = md5($password); 
		}
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
	
	private function sendSms($mobile, $content){
		$target = "http://219.146.191.154:6003/submitdata/Service.asmx/g_Submit";
		$post_data = "sname=shej9233&spwd=123456&scorpid=&sprdid=1012812&sdst=" . $mobile . "&smsg=".rawurlencode($content);
		$post = "post";
		$gets = $this -> $post($post_data, $target);
		return $gets;
	}
	
	public function sendMail(){
		require("./Public/php/smtp.php");
		##########################################
		$smtpserver = "mail.l-pei.com";//SMTP服务器
		$smtpserverport =25;//SMTP服务器端口
		$smtpusermail = "service1@l-pei.com";//SMTP服务器的用户邮箱
		$smtpemailto = "nehnre@yahoo.com.cn";//发送给谁
		$smtpuser = "service1";//SMTP服务器的用户帐号
		$smtppass = "lpei2011";//SMTP服务器的用户密码
		$mailsubject = "Test Subject";//邮件主题
		$mailbody = "<h1>This is a test mail</h1>";//邮件内容
		$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
		##########################################
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false;//是否显示发送的调试信息
		$result = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
		$this -> ajaxReturn($result);
		
	}
	
	public function test(){
		require("./Public/php/csvdatafile.php");
		$filename = "h:/test.csv"; 
		$filename1 = "h:/test1.csv"; 

		// Read file source 
		// $handle = fopen($filename, "r"); 
		// $contents = fread($handle, filesize($filename)); 
		// fclose($handle);
		// $utf8_fopen_read = "utf8_fopen_read";
		// $handle = $this -> $utf8_fopen_read($filename);
		// $contents = fread($handle, filesize($filename)); 
		// fclose($handle);
		$loadFile = "loadFile";
		$contents = $this -> $loadFile($filename,"gb2312");
		echo $contents;
		// // format content for special chars 
		$contents = @addslashes($contents); 
		$contents = @str_replace('\,', '\ ,', $contents); 
		$contents = @stripslashes($contents); 

		// // Write to new file 
		$handle = @fopen($filename1, "w"); 
		@fwrite($handle, $contents); 
		@fclose($handle); 

		$fd = @fopen($filename1, "rb"); 
		$first_line = str_replace(' ,',',',str_replace('"','',trim(@fgets($fd, 1000)))) ; 
		@fclose($fd); 
		$pass = true;
		if($first_line != "学生编号,学号,学生姓名") { 
			$pass = false; 
		} 
		
		if($pass){ 
			$csv = new csvDataFile($filename1); 
			while($csv->next_Row()) { 
				$userid = trim($csv->f('学生编号')); 
				$classno = trim($csv->f('学号')); 
				$username = trim($csv->f('学生姓名')); 
				echo $username.'<br />';
			} 
		} 
		// $this -> ajaxReturn($handle);
	}
	
	function utf8_fopen_read($fileName) { 
		$fc = iconv('gbk', 'utf-8', file_get_contents($fileName)); 
		$handle=fopen("php://memory", "rw"); 
		fwrite($handle, $fc); 
		fseek($handle, 0); 
		return $handle; 
	} 
	
	public function loadFile($sFilename, $sCharset = 'UTF-8')
	{
		if (floatval(phpversion()) >= 4.3) {
			$sData = file_get_contents($sFilename);
		} else {
			if (!file_exists($sFilename)) return -3;
			$rHandle = fopen($sFilename, 'r');
			if (!$rHandle) return -2;

			$sData = '';
			while(!feof($rHandle))
				$sData .= fread($rHandle, filesize($sFilename));
			fclose($rHandle);
		}
		if ($sEncoding = mb_detect_encoding($sData, 'auto', true) != $sCharset)
			$sData = mb_convert_encoding($sData, $sCharset, $sEncoding);
		return $sData;
	}
}
?>