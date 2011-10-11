<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="__PUBLIC__/css/reg.css" type="text/css" media="screen" /> 
	<style type="text/css" media="screen">@import url(__PUBLIC__/niceform/niceforms-default.css);</style>
	<link rel="stylesheet" href="__PUBLIC__/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" /> 
	<script language="javascript" type="text/javascript" src="__PUBLIC__/niceform/niceforms.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/core.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/queryString.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-1.6.2.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/dialog.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/passwordstrength.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/Reg/checkMobile.js"></script>
	<title>普通用户注册——快配网</title>
</head>
<body>
	<div>
				<div class="head">
			<img src="__PUBLIC__/images/logo.jpg" />
		</div>
		<div class="body" style="height:270px;">
			<div style="height:30px;"></div>
			<div class="bodycenter">
				<div class="regtitle">
					<div class="titletext mircroblod bold">验证手机</div>
				</div>
			</div>
			<div class="bodycenter">
				<div style="height:10px;"></div>
				<div class="container" style="height:160px">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center"><form class="niceform">
								<table width="70%" border="0" cellspacing="0" cellpadding="0" id="formtable">
									<tr>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td width="120px"><span class="red">*</span>　手机号：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="280">
														<input type="text" class="text_input input_normal" id="user_name" name="user_name" />
													</td>
													<td><input type="button" value="发送验证码" id="btnCheck"/></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td><span class="red">*</span>　验证码：</td>
										<td><input type="text" name="check_num" class="text_input input_normal"  id="check_num" size="25"  /></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="button" value=" 验 证 " id="btnSmsCheck"/>　<input type="button" onclick="location.href='/'" value="取消" id="btnCancle"/></td>
									</tr>
								</table></form>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="bodyright"></div>
		</div>
				<div class="bottom">
			<div class="bottomcontent">
				<div style="height:20px;"></div>
				<div class="ftbox">
					<h3>用户帮助</h3>
					<ul>
						<li><a href="#">快配使用</a></li>
						<li><a href="#">常见问题</a></li>
						<li><a href="#">邮箱白名单</a></li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>订阅更新</h3>
					<ul>
						<li><a href="#">邮件订阅</a></li>
						<li><a href="#">短信订阅</a></li>
						<li><a href="#">快配微博</a></li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>商务合作</h3>
					<ul>
						<li><a href="#">促销信息</a></li>
						<li><a href="#">快配代理</a></li>
						<li><a href="#">在线咨询</a></li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>公司信息</h3>
					<ul>
						<li><a href="#">关于快配</a></li>
						<li><a href="#">媒体报道</a></li>
						<li><a href="#">联系我们</a></li>
					</ul>
				</div>
				<div class="ftbox bottomlogo"><img src="__PUBLIC__/images/bottom_logo.jpg" /></div>
			</div>
			<div style="height:170px;"></div>
			<div class="bottominfo">Copyright © 2011 kuaipei.com All rights reserved 版权所有 上海外经贸广告有限公司（快配网） | 网站声明 | 网站地图 | 友情链接 | 沪IPC备08000001号</div>
		</div>  
	</div>
	<div id="waiting" title="正在和服务器交互">
	<table width="100%" border="0" cellspacing="15" cellpadding="0">
	  <tr>
	    <td width="150" align="center"><img src="__PUBLIC__/images/page_accept.png" /></td>
	    <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
	      <tr>
	        <td class="font_11"><strong>等待中... ...</strong></td>
          </tr>
	      <tr>
	        <td class="font_11">请您稍后，谢谢！</td>
          </tr>
        </table></td>
      </tr>
  </table>
</div>
<div id="saveok" title="系统提示">
	<table width="100%" border="0" cellspacing="15" cellpadding="0">
	  <tr>
	    <td align="center"><img src="__PUBLIC__/images/page_accept.png" width="128" height="128" /></td>
	    <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
	      <tr>
	        <td class="font_11"><strong id="savokcontent">恭喜您，操作成功！</strong></td>
          </tr>
	      <tr>
	        <td class="font_11">您可以点“确定”返回刚才操作页面！</td>
          </tr>
        </table></td>
      </tr>
  </table>
	<p align="center" class="link font_3"><a href="javascript:;" onclick="$('#saveok').dialog('close');"><img src="__PUBLIC__/images/icon_qd.jpg" width="113" height="31" border="0" /></a></p>
</div>
  	
</body>
</html>