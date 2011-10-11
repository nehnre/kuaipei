<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="__PUBLIC__/css/common.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="__PUBLIC__/css/index.css" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="__PUBLIC__/css/ad.css" type="text/css" media="screen" /> 
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/core.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.6.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/ad2.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" /> 
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/js/base/dialog.js"></script>
	<title>欢迎光临——快配网</title>
	
	<script type="text/javascript">
		var _scroll_lock = false;
		$(function(){
			
			$(".btn_goleft").click(function(){
				var marginLeft = $("#brand_id").css("margin-left");
				marginLeft = marginLeft.replace(/px$/g,"");
				marginLeft = ~~ marginLeft;
				var picCount = $("#brand_id").children().size();
				if(picCount > 6){
					if(marginLeft > -((picCount - 6) * 125)){
						if(!_scroll_lock){
							_scroll_lock = true;
						} else {
							return false;
						}
						$("#brand_id").animate({ marginLeft: marginLeft - 125}, 200, function(){
							_scroll_lock = false;
						});
					}
				}
			});
			$(".btn_goright").click(function(){
				var marginLeft = $("#brand_id").css("margin-left");
				marginLeft = marginLeft.replace(/px$/g,"");
				marginLeft = ~~ marginLeft;
				if(marginLeft < 0){
					if(!_scroll_lock){
						_scroll_lock = true;
					} else {
						return false;
					}
					$("#brand_id").animate({ marginLeft: marginLeft + 125}, 200, function(){
						_scroll_lock = false;
					});
				}
			});
			
			$(".promotion .tab").children().mouseover(function(){
				$(".promotion .item1").removeClass("item1").addClass("item");
				$(this).removeClass("item").addClass("item1");
			});
			
		});	
	</script>	
<body>
		
	<div id="dialog-login" title="登录窗口" style="display:none">
		<div style="margin-top:5px;padding-left:10px;">用户名：<input type="text" style="width:150px;" name="user_name" id="user_name"/></div>
		<div style="margin-top:5px;padding-left:10px;">密　码：<input type="password" style="width:150px;" name="password" id="password"/></div>
		<div style="text-align:center;margin-top:5px;"><input type="button" value=" 登 录 " id="btnLogin"/></div>
	</div>
	<div class="head">
		<div class="align_center index_top">
			<div style="position:relative; margin-bottom:-2px;">
				<img src="__PUBLIC__/images/logo.jpg" />
				<div class="menu_container">
					<div class="top_menu menu_index1"></div>
					<div class="top_menu menu_promotion"></div>
					<div class="top_menu menu_news"></div>
					<div class="top_menu menu_help"></div>
					<div class="top_menu menu_activity"></div>
				</div>
				<div class="subscription">
					<div class="red bold" style="height:18px">及时参加配件促销！</div>
					<div style="height:22px;"><input type="text" value="输入Email订阅促销信息" style="width:150px;color:gray;" name="subEmail" id="subEmain"/> <input type="button" value=" 订 阅 " style="height:20px; width:45px;"/></div>
				</div>
				<div class="btn_reg gray">
					<?php if(empty($_SESSION['user_name'])): ?><a href="javascript:;" id="login" class="gray">登录</a> | <a href="/Reg/checkMobile" class="gray">注册</a>
					<?php else: ?>
					欢迎你，<?php echo ($_SESSION['user_name']); ?> | <a href="javascript:;" id="logout" class="gray">退出</a><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$(".top_menu").each(function(){
				$(this).click(function(){
					var _href = $(this).attr("href");
					if(_href){
						location.href = _href;
					}
				});
			});
			
			$("#subEmain").click(function(){
				var val = $(this).val();
				if("输入Email订阅促销信息" == val){
					$(this).val("");
					$(this).css("color","black");
				}
			}).blur(function(){
				var val = $.trim($(this).val());
				if(!val || "输入Email订阅促销信息" == val){
					$(this).val("输入Email订阅促销信息");
					$(this).css("color","gray");
				}
			});
			$( "#dialog-login" ).dialog({
				height: 140,
				resizable: false,
				closeOnEscape: false,
				modal: true,
				autoOpen: false,
				close: function(){
					$("#user_name").val("");
					$("#password").val("");
				}
			});
			$("#login").click(function(){
				$( "#dialog-login" ).dialog("open");
			});
			$("#btnLogin").click(function(){
				var userName = $("#user_name").val();
				var password = $("#password").val();
				if(!userName || !password){
					showAlert("用户名密码不能为空!");
					return;
				}
				showWaiting();
				$.ajax({
					url:"/User/login",
					data:"user_name=" + userName + "&password=" + password,
					type:"post",
					success:function(json){
						json = nehnre.parseJSON(json);
						showAlert(json.data.msg, function(){
							if(json.data.success){
								location.href = location.href.replace(/#*$/ig,"");
								try{window.event.returnValue=false;}catch(e){}}});
					}
				});
			});
			$("#logout").click(function(){
				location.href = "/User/logout?backurl=" + encodeURIComponent(location.href);
				try{window.event.returnValue=false;}catch(e){}});});
	</script>
	<div class="body">
		<div class="align_center index_body">
			<div class="roll_pic" id="roll_pic" style="display:none;"> 
				<img src="__PUBLIC__/adpics/s1.jpg" width="990" height="240"/>
				<img src="__PUBLIC__/adpics/s2.jpg" width="990" height="240"/>
				<img src="__PUBLIC__/adpics/s3.jpg" width="990" height="240"/>
				<img src="__PUBLIC__/adpics/s4.jpg" width="990" height="240"/>
				<img src="__PUBLIC__/adpics/s5.jpg" width="990" height="240"/>
				<div class="ico_c"></div>
			</div>
            
            <div class="ad" >
				<ul class="slider" >
					<img src="__PUBLIC__/adpics/s1.jpg" width="990" height="240"/>
					<img src="__PUBLIC__/adpics/s2.jpg" width="990" height="240"/>
					<img src="__PUBLIC__/adpics/s3.jpg" width="990" height="240"/>
					<img src="__PUBLIC__/adpics/s4.jpg" width="990" height="240"/>
					<img src="__PUBLIC__/adpics/s5.jpg" width="990" height="240"/>
			    </ul>
			    <ul class="num" >
				    <li>1</li>
				    <li>2</li>
				    <li>3</li>
				    <li>4</li>
				    <li>5</li>
			    </ul>
		    </div>
            
			<div class="roll_brand">
				<div class="icon_round"></div>
				<div class="character">厂商专区</div>
				<div class="btn_goleft"></div>
				<div class="pic_brand">
					<div id="brand_id" style="display:none">
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					<div class="brand"><img src="__PUBLIC__/images/brand/b1.jpg"/></div>
					</div>
                    <table cellspacing="1" align="center" border="0" style="margin-top:7px;">
                    <tr>
                        <td align="center" width="25px" style="display:none;">
                            <img src="Styles/images/left_arrow.gif" border="0" onmouseout="StopScroll();" onmouseover="Left();" style="cursor: pointer;" alt="" />
                        </td>
                        <td>
                            <div id="marquees" style="display:none;">
                            </div>
                            <div id="templayer" style="left: 0px; visibility: hidden; position: absolute; top: 0px"></div>

                             <div id="www_qpsh_com" style="overflow:hidden;width:750px;">
                                <table align="left" cellpadding="0" border="0">
                                    <tr>
                                        <td id="www_qpsh_com1" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                    <td style="padding-left:10px; text-align:center;">
                                                        <img src="__PUBLIC__/images/brand/b1.jpg"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td id="www_qpsh_com2" valign="top"></td>
                                    </tr>
                                </table>
                           </div>
                        </td>
                        <td align="center" width="25px" style="display:none;">
                            <img src="Styles/images/right_arrow.gif" border="0" onmouseout="StopScroll();" onmouseover="Right();" style="cursor: pointer;" alt=""/>
                        </td>
                    </tr>
                </table>
				</div>
				<div class="btn_goright"></div>
			</div>
			<div class="search">
				<div class="search_text gray">请输入要查询的内容</div>
				<div class="search_form">
					<div class="search_input"><input type="text" /></div>
					<div class="search_btn"><input type="button" value=" 搜     索 "/></div>
				</div>
				<div class="search_hot">
					<a href="#" class="gray">3M</a> <a href="#" class="gray">刹车片</a> <a href="#" class="gray">机油</a> <a href="#" class="gray">导航仪</a>
					 <a href="#" class="gray">WINX</a>
				</div>
			</div>
			<div class="category">
				<div class="category_fenlei">分类</div>
				<div class="category_fenlei_content">
					<a href="#" class="black">热门促销</a><span class="red">(10)</span>
					<a href="#" class="black">本月促销</a><span class="red">(10)</span>
					<a href="#" class="black">往期促销</a><span class="red">(10)</span>
					<a href="#" class="black">易耗配件</a><span class="red">(10)</span>
					<a href="#" class="black">机修促销</a><span class="red">(10)</span>
					<a href="#" class="black">汽车用品</a><span class="red">(10)</span>
				</div>
				<div class="category_news">资讯</div>
				<div class="category_news_content">
					<a href="#" class="black">汽配资讯</a>
					<a href="#" class="black">产品报告</a>
					<a href="#" class="black">厂商动态</a>
					<a href="#" class="black">经销动态</a>
					<a href="#" class="black">一线维修</a>
					<a href="#" class="black">汽配人物</a>
				</div>
			</div>
			<div class="clear"></div>
			<div class="layer1">
				<div class="left">
					<div class="seckill">
						<div class="left_title"><span>立</span>即秒杀<a href="#" class="gray">更多 ></a></div>
						<div class="seckill_content">
							<div class="seckill_pic">
								<div class="seckill_item">
									<div><img src="__PUBLIC__/images/seckill/sk1.jpg" /></div>
									<div class="introduce">忙忙碌碌·第一辑</div>
									<div class="price"><span class="red">￥23.6</span> <span class="original_price">￥50.0</span></div>
								</div>
								<div class="seckill_item">
									<div><img src="__PUBLIC__/images/seckill/sk2.jpg" /></div>
									<div class="introduce">宏基笔记本电脑 i7-2350M win7 2G独显</div>
									<div class="price"><span class="red">￥3999.0</span> <span class="original_price">￥4890</span></div>
								</div>
								<div class="seckill_item">
									<div><img src="__PUBLIC__/images/seckill/sk3.jpg" /></div>
									<div class="introduce">苹果Ipad2 16G平板电脑</div>
									<div class="price"><span class="red">3399.0</span> <span class="original_price">￥3698.0</span></div>
								</div>
								<div class="seckill_item">
									<div><img src="__PUBLIC__/images/seckill/sk4.jpg" /></div>
									<div class="introduce">卡西欧时常男表</div>
									<div class="price"><span class="red">￥499.0</span> <span class="original_price">￥899.0</span></div>
								</div>
							</div>
						</div>
						<div class="left_bottom"></div>
					</div>
					<div class="promotion">
						<div class="left_title">
							<div class="title"><span>最</span>新促销</div>
							<div class="tab">
								<div class="item1">
									<div class="text">全部</div>
								</div>
								<div class="item">
									<div class="text">轮胎</div>
								</div>
								<div class="item">
									<div class="text">刹车片</div>
								</div>
								<div class="item">
									<div class="text">机油</div>
								</div>
								<div class="item">
									<div class="text">导航仪</div>
								</div>
								<div class="item">
									<div class="text">轮毂</div>
								</div>
							</div>
							<a href="#" class="gray">更多 ></a>
						</div>
						<div class="promotion_content">
							<div class="row">
								<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="item">
									<div class="img"><img src="__PUBLIC__/Uploads/<?php echo ($vo["index_pic"]); ?>" /></div>
									<div class="red bold text"><?php echo ($vo["sponsor"]); ?></div>
									<div class="gray bold text"><?php echo ($vo["title"]); ?></div>
									<div class="button">
										<div><?php echo ($vo["start_time"]); ?></div>
										<a href="/Activity/show?id=<?php echo ($vo["id"]); ?>" style="color:white">点击查看</a>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
						<div class="left_bottom"></div>
					</div>
				</div>
				<div class="right">
					<div class="trends">
						<div class="right_title">用户互动</div>
						<div class="trends_content">
							<div class="content">
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<div class="row">
									<div class="nick_name">[李小小]</div>
									<div class="action">参加了XXX促销活动</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="right_bottom"></div>
					</div>
					<div class="clear"></div>
					<div class="ads">
						<div><img src="__PUBLIC__/images/ad1.jpg" /></div>
						<div><img src="__PUBLIC__/images/ad2.jpg" /></div>
						<div><img src="__PUBLIC__/images/ad3.jpg" /></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="layer2">
				<img src="__PUBLIC__/images/layer2/ad1.jpg" />
			</div>
			<div class="clear"></div>
			<div class="layer3">
				<div class="left">
					<div class="title"><span>汽</span>配热点<a href="#" class="gray">更多 ></a></div>
					<div class="content">
						<div class="pic_news">
							<div class="pic"><img src="__PUBLIC__/images/layer3/pic_news.jpg" /></div>
							<div class="news">
								<div class="news_title bold">汽车灯具，安全行车的“眼睛”</div>
								<div class="news_abstract">汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛
								汽车灯具，安全行车的眼睛汽车灯具的眼睛...</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="news_list">
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
				<div class="center">
					<div class="title"><span>汽</span>配人物<a href="#" class="gray">更多 ></a></div>
					<div class="content">
						<div class="pic_news">
							<div class="pic"><img src="__PUBLIC__/images/layer3/pic_news.jpg" /></div>
							<div class="news">
								<div class="news_title bold">汽车灯具，安全行车的“眼睛”</div>
								<div class="news_abstract">汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛汽车灯具，安全行车的眼睛
								汽车灯具，安全行车的眼睛汽车灯具的眼睛...</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="news_list">
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div>汽车灯具，安全行车的“眼睛”</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
				<div class="right">
					<div class="title"><span>维</span>修资源库<a href="#" class="gray" style="margin-left:40px;">更多 ></a></div>
					<div class="content">
						<div class="news_list">
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
							<div class="line"></div>
							<div>汽车灯具，安全行车的“眼睛”</div>
						</div>
					</div>
					<div class="right_bottom"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="foot">
		<div class="foot_width align_center">
			<div class="layer4">
				<img src="__PUBLIC__/images/layer4/ad1.jpg" />
			</div>
			<div class="clear"></div>
			<div class="foot_help">
				<div class="item">
					<div class="title bold">用户帮助</div>
					<div class="list">立配使用</div>
					<div class="list">常见问题</div>
					<div class="list">邮箱白名单</div>
				</div>
				<div class="line"></div>
				<div class="item">
					<div class="title bold">订阅更新</div>
					<div class="list">邮件订阅</div>
					<div class="list">短信订阅</div>
					<div class="list">立配微博</div>
				</div>
				<div class="line"></div>
				<div class="item">
					<div class="title bold">商务合作</div>
					<div class="list">立配使用</div>
					<div class="list">常见问题</div>
					<div class="list">邮箱白名单</div>
				</div>
				<div class="line"></div>
				<div class="item">
					<div class="title bold">用户帮助</div>
					<div class="list">立配使用</div>
					<div class="list">常见问题</div>
					<div class="list">邮箱白名单</div>
				</div>
				<div class="line"></div>
				<div class="contact">
					<div class="logo"><img src="__PUBLIC__/images/foot_logo.jpg" /></div>
					<div class="phone_num bold">热线电话：4008-005-7788</div>
				</div>
			</div>
			<div class="foot_right">
				Copyright &copy; 2011 l-pei.com All rights reserved 版权所有 上海外经贸广告有限公司（快配网） | 网站声明 | 网站地图 | 友情链接 | 沪IPC备08000001号
			</div>
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
  
    <script type="text/javascript" language="javascript">
        var speed = 10//速度数值越大速度越慢
        www_qpsh_com2.innerHTML = www_qpsh_com1.innerHTML
        function Marquee() {
            if (www_qpsh_com2.offsetWidth - www_qpsh_com.scrollLeft <= 0)
                www_qpsh_com.scrollLeft -= www_qpsh_com1.offsetWidth
            else {
                www_qpsh_com.scrollLeft++
            }
        }

        var MyMar = setInterval(Marquee, speed)
        www_qpsh_com.onmouseover = function () { clearInterval(MyMar) }
        www_qpsh_com.onmouseout = function () { MyMar = setInterval(Marquee, speed) }
</script>

<script language="javascript" type="text/javascript">
    <!--
    var sh;
    marqueesWidth = 710;  /*710;*/
    preLeft = 0; currentLeft = 0; stopscroll = false; getlimit = 0; preTop = 0; currentTop = 0;

    function scrollLeft() {
        if (stopscroll == true) return;
        preLeft = marquees.scrollLeft;
        marquees.scrollLeft += 2;
        if (preLeft == marquees.scrollLeft) {
            //marquees.scrollLeft=templayer.offsetWidth-marqueesWidth+1;
        }
    }

    function scrollRight() {
        if (stopscroll == true) return;

        preLeft = marquees.scrollLeft;
        marquees.scrollLeft -= 2;
        if (preLeft == marquees.scrollLeft) {
            if (!getlimit) {
                marquees.scrollLeft = templayer.offsetWidth * 2;
                getlimit = marquees.scrollLeft;
            }
            marquees.scrollLeft -= 1;
        }
    }

    function Left() {
        stopscroll = false;
        sh = setInterval("scrollLeft()", 20);
    }

    function Right() {
        stopscroll = false;
        sh = setInterval("scrollRight()", 20);
    }

    function StopScroll() {
        stopscroll = true;
        clearInterval(sh);
    }



    function SelectType(value) {
        document.all.sendForm.page.value = 1;
        document.all.sendForm.type.value = value;
        document.all.sendForm.submit();
    }

    function init() {
        with (marquees) {
            style.width = marqueesWidth;
            style.overflowX = "hidden";
            style.overflowY = "visible";
            style.align = "center";
            noWrap = true;
        }
    }
    init();
    //-->
    </script>
</body>
</html>