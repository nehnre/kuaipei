<?php
/*
����һ�����Գ���!!!
�밴��˵�����ú����µĲ���,��������tom.com���û�Ϊ�����úõ�.
*/
require("smtp.php");
##########################################
$smtpserver = "smtp.163.com";//SMTP������
$smtpserverport =25;//SMTP�������˿�
$smtpusermail = "nehnre@163.com";//SMTP���������û�����
$smtpemailto = "nehnre@yahoo.com.cn";//���͸�˭
$smtpuser = "nehnre";//SMTP���������û��ʺ�
$smtppass = "NieHonglei";//SMTP���������û�����
$mailsubject = "Test Subject";//�ʼ�����
$mailbody = "<h1>This is a test mail</h1>";//�ʼ�����
$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
$smtp->debug = TRUE;//�Ƿ���ʾ���͵ĵ�����Ϣ
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
?>