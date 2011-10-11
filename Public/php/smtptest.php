<?php
/*
这是一个测试程序!!!
请按照说明设置好以下的参数,以下是以tom.com的用户为例设置好的.
*/
require("smtp.php");
##########################################
$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "nehnre@163.com";//SMTP服务器的用户邮箱
$smtpemailto = "nehnre@yahoo.com.cn";//发送给谁
$smtpuser = "nehnre";//SMTP服务器的用户帐号
$smtppass = "NieHonglei";//SMTP服务器的用户密码
$mailsubject = "Test Subject";//邮件主题
$mailbody = "<h1>This is a test mail</h1>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = TRUE;//是否显示发送的调试信息
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
?>