<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="__PUBLIC__/css/reg.css" type="text/css" media="screen" /> 
	<style type="text/css" media="screen">@import url(__PUBLIC__/niceform/niceforms-default.css);</style>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/niceform/niceforms.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/core.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-1.6.2.min.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" /> 
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/dialog.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/ajaxupload.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/Reg/authUserCarTeam.js"></script>
	<title>升级用户注册——快配网</title>
</head>
<body>
	<div>
				<div class="head">
			<img src="__PUBLIC__/images/logo.jpg" />
		</div>
		<div class="body" style="height:500px">
			<div style="height:30px;"></div>
			<div class="bodycenter">
				<div class="regtitle">
					<div class="titletext mircroblod bold">升级用户注册</div>
				</div>
			</div>
			<div class="bodycenter" style="height:500px">
				<div style="height:10px;"></div>
				<div class="container" style="height:400px">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center"><form class="niceform" id="myForm">
								<table width="80%" border="0" cellspacing="0" cellpadding="0" id="formtable">
									<tr>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td colspan="2" class="red"><span class="bold">提示：</span>有*必填 无*选填</td>
									</tr>
									<tr>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　企业名称：</td>
										<td><input type="text" id="company_name" name="company_name"  class="text_input input_normal" value="<?php echo ($result["company_name"]); ?>" size="20" style="width:250px"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　企业地址：</td>
										<td><input type="text" id="company_address" name="company_address"  class="text_input input_normal" value="<?php echo ($result["company_address"]); ?>" size="40"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　所在地区：</td>
										<td>
											<select name="city" size="1" class="width_160" id="city">
												<option value="">请选择</option>
												<option value="上海">上海</option>
												<option value="广州">广州</option>
												<option value="北京">北京</option>
											</select>
											<script type="text/javascript">
												$("#city").val("<?php echo ($result["city"]); ?>");
											</script>
										</td>
									</tr>
									<tr>
										<td><span class="red">*</span>　邮　　编：</td>
										<td><input type="text" id="post_code" name="post_code"  class="text_input input_normal" value="<?php echo ($result["post_code"]); ?>" size="20"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　商务联系电话：</td>
										<td><input type="text" id="business_call" name="business_call"  class="text_input input_normal" size="20" value="<?php echo ($result["business_call"]); ?>"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　联系人(负责人)：</td>
										<td><input type="text" id="link_man" name="link_man"  class="text_input input_normal" value="<?php echo ($result["link_man"]); ?>" size="20"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　企业规模：</td>
										<td>
											<select name="company_scale" size="1" class="width_187" id="company_scale">
												<option value="1">10人以下</option>
												<option value="2">10-100人</option>
												<option value="3">100人以上</option>
											</select>
											<script type="text/javascript">
												$("#company_scale").val("<?php echo ($reuslt["company_scale"]); ?>");
											</script>
										</td>
									</tr>
									<tr>
										<td><span class="red">*</span>　名片：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="270">
														<input type="text"  size="20" readonly="readonly" class="text_input input_normal" />
													</td>
													<td width="80"><input type="button" id="btnBC" value="浏览" /></td>
													<td class="gray"> 提示：上传图片，限定2MB大小，JPG格式<input type="hidden" value="<?php echo ($result["business_card"]); ?> name="business_card" id="business_card" /></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr id="tr_bc" style="display:none;height:200px">
										<td></td>
										<td>
											<?php if(!empty($result['business_card'])): ?><img src="/Public/Upload/<?php echo ($result["business_card"]); ?>" />
												<script type="text/javascript">
													bodyIncrease();	
													$("#tr_bc").show();
												</script><?php endif; ?>
										</td>
									</tr>	
									<tr>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="button" id="btnSubmit" value="　提交认证　"/>　<input type="button" value="　取　消　"/></td>
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