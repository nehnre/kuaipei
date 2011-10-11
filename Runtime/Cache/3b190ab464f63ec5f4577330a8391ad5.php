<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="__PUBLIC__/css/reg.css" type="text/css" media="screen" /> 
	<style type="text/css" media="screen">@import url(__PUBLIC__/niceform/niceforms-default.css);</style>
	<link rel="stylesheet" href="__PUBLIC__/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" /> 
	<script language="javascript" type="text/javascript" src="__PUBLIC__/niceform/niceforms.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/core.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-1.6.2.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/dialog.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/ajaxupload.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/Reg/authUserCarHost.js"></script>
	<title>升级用户注册——快配网</title>
</head>
<body>
	<div>
				<div class="head">
			<img src="__PUBLIC__/images/logo.jpg" />
		</div>
		<div class="body" style="height:600px">
			<div style="height:30px;"></div>
			<div class="bodycenter">
				<div class="regtitle">
					<div class="titletext mircroblod bold">升级用户注册</div>
				</div>
			</div>
			<div class="bodycenter" style="height:600px">
				<div style="height:10px;"></div>
				<div class="container" style="height:500px">
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
										<td><span class="red">*</span>　真实姓名：</td>
										<td><input type="text" id="true_name" name="true_name" value="<?php echo ($true_name); ?>" class="text_input input_normal" size="20"/></td>
									</tr>
									<tr>
										<td><span class="red" style="color:#f6f6f6">*</span>　性　　别：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="60">
														<input type="radio" value="1" id="sex1" name="sex"/>
														<label for="sex1">男</label>
													</td>
													<td>
														<input type="radio" value="2" id="sex2" name="sex"/>
														<label for="sex2">女</label>
													</td>
												</tr>
												<script type="text/javascript">
													$(":radio[name='sex']").each(function(){
														if($(this).val() == "<?php echo ($result["sex"]); ?>"){
															$(this).attr("checked", true);
														}
													});
												</script>
											</table>
										</td>
									</tr>
									<tr>
										<td width="120px"><span class="red">*</span>　出生日期：</td>
										<td><input type="text" id="birthday" name="birthday" value="<?php echo ($result["birthday"]); ?>" class="text_input input_normal" size="20"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　汽车品牌：</td>
										<td><input type="text" id="car_brand" name="car_brand" value="<?php echo ($result["car_brand"]); ?>" class="text_input input_normal" size="20"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　汽车型号：</td>
										<td><input type="text" id="car_model" name="car_model" value="<?php echo ($result["car_model"]); ?>" class="text_input input_normal"  size="20"/></td>
									</tr>
									<tr>
										<td><span class="red">*</span>　车主驾驶证：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="270">
														<input type="text"  size="20" readonly="readonly" class="text_input input_normal"/>
													</td>
													<td width="80"><input type="button" id="btnDL" name="btnDL" value="浏览" /></td>
													<td class="gray"> 提示：上传图片，限定2MB大小，JPG格式<input type="hidden" value="<?php echo ($result["driving_license"]); ?>" name="driving_license" id="driving_license" /></td>
												</tr>											
											</table>
										</td>
									</tr>
									<tr id="tr_dl" style="display:none;height:200px">
										<td></td>
										<td>
											<?php if(!empty($result['driving_license'])): ?><img src="/Public/Upload/<?php echo ($result["driving_license"]); ?>" />
												<script type="text/javascript">
													bodyIncrease();	
													$("#tr_dl").show();
												</script><?php endif; ?>
										</td>
									</tr>	
									<tr>
										<td><span class="red">*</span>　汽车行驶证：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="270">
														<input type="text"  size="20" readonly="readonly" class="text_input input_normal"/>
													</td>
													<td width="80"><input type="button" id="btnVL" value="浏览" /></td>
													<td class="gray"> 提示：上传图片，限定2MB大小，JPG格式<input type="hidden" value="" name="vehicle_license" id="vehicle_license" /></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr id="tr_vl" style="display:none;height:200px">
										<td></td>
										<td>
											<?php if(!empty($result['vehicle_license'])): ?><img src="/Public/Upload/<?php echo ($result["vehicle_license"]); ?>" />
												<script type="text/javascript">
													bodyIncrease();	
													$("#tr_vl").show();
												</script><?php endif; ?>
										</td>
									</tr>	
									<tr>
										<td><span class="red">*</span>　名　　片：</td>
										<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="270">
														<input type="text"  size="20" readonly="readonly" class="text_input input_normal"/>
													</td>
													<td width="80"><input type="button" id="btnBC" value="浏览" /></td>
													<td class="gray"> 提示：上传图片，限定2MB大小，JPG格式<input type="hidden" name="business_card" id="business_card" /></td>
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