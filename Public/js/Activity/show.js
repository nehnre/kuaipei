$(function(){

	$( "#dialog-comment" ).dialog({
		height: 400,
		width: 600,
		resizable: false,
		closeOnEscape: false,
		modal: true,
		autoOpen: false,
		close: function(){
		}
	});
	$(":button[value='我要评论']").click(function(){
		var unlogin = $("#btnJoin").attr("unlogin");
		if(unlogin){
			$("#login").click();
		} else {
			$( "#dialog-comment" ).dialog("open");
		}
	}).css("cursor","pointer");
	
	$("#btnComment").click(function(){
		var title = $("#title").val();
		var content = $("#content").val();
		if(!title){
			showAlert("请填写标题！");
			return;
		} 
		if(title.length > 30){
			showAlert("标题长度不能超过30个汉字！");
			return;
		}
		if(!content){
			showAlert("请填写内容！");
			return;
		}
		if(content.length > 1000 || content.length < 5){
			showAlert("内容的字数要在5-1000字之间！");
			return;
		}
		title = encodeURIComponent(title);
		content = encodeURIComponent(content);
		var id = $("#id").val();
		var data = "title=" + title + "&content=" + content + "&activity_id=" + id;
		showWaiting();
		$.ajax({
			url:"../ActivityComment/updateComment",
			data: data,
			type:"POST",
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						$("#btnComment").attr("disabled", true);
						location.href = location.href.replace(/#*$/ig,"");
						try{
							window.event.returnValue=false;  
						}catch(e){}
					}
				});
			}		
		});
	});
	
	$("#btnJoin").click(function(){
		var joined = $(this).attr("joined");
		var unlogin = $(this).attr("unlogin");
		var status = $(this).attr("status");
		var expirse = $(this).attr("expirse");
		var start_time = $(this).attr("start_time");
		var end_time = $(this).attr("end_time");
		var import_flag = $(this).attr("import_flag");
		var check_sex = $(this).attr("check_sex");
		var check_birthday = $(this).attr("check_birthday");
		var start_birthday = $(this).attr("start_birthday");
		var end_birthday = $(this).attr("end_birthday");
		var check_repeat_num = $(this).attr("check_repeat_num");
		var repeat_num = $(this).attr("repeat_num");
		var check_total_num = $(this).attr("check_total_num");
		var total_num = $(this).attr("total_num");
		var check_province = $(this).attr("check_province");
		var province = $(this).attr("province");
		var check_user_type = $(this).attr("check_user_type");
		var user_type = $(this).attr("user_type");
		var url = $(this).attr("url");
		if(unlogin){
			$("#login").click();
		}else if(~~expirse < 0){
			showAlert("活动还没有开始，开始时间：{0}".format(start_time));
		} else if(~~expirse > 0){
			showAlert("活动已经结束，结束时间：{0}".format(end_time));
		}else if(check_province==1){
			showAlert("对不起，此活动只对{0}用户开放".format(province));
		}else if(check_user_type==1){
			showAlert("对不起，此活动只对{0}用户开放".format(user_type));
		}else if(check_sex==1){
			showAlert("对不起，您不符合参加此活动的条件");
		}else if(~~check_birthday<0||~~check_birthday>0){
			showAlert("对不起，您不符合参加此活动的条件");
		}else if(check_repeat_num==1){
			showAlert("请您{0}天后在参加此活动".format(check_repeat_num));
		}else if(check_total_num==1){
			showAlert("此活动参加人数已满");
		}else {
			showWaiting();
			var id = $("#id").val();
			$.ajax({
				url:"join",
				data:"id=" + id,
				success:function(json){
					json = nehnre.parseJSON(json);
					if(json.data.msg == "厂商活动"){
						if(url != ""){
							closeWaiting();
							window.open(url);
							
						}else{
							location.href = location.href.replace(/#*$/ig,"");
						}
					}else if(json.data.msg == "在线调查"){
						if(url != ""){
							closeWaiting();
							window.open("/Activity/showOnlineActivity?id="+id);
							
						}else{
							location.href = location.href.replace(/#*$/ig,"");
						}
					}else{
						showAlert(json.data.msg, function(){
							if(json.data.success){
								$("#btnJoin").unbind("click");
								if(url != ""){
									location.href = url.replace(/#*$/ig,"");
								}else{
									location.href = location.href.replace(/#*$/ig,"");
									
								}
								try{
									window.event.returnValue=false;  
								}catch(e){}
								
							}
						});
					}

				}
			});
		}
	});
	
	$(".activity_content .activity_buttons .items").each(function(i){
		$(this).click(function(){
			$(".activity_content .activity_buttons .items").css("color","#a5a5a5");
			$(this).css("color","#bf1d2d");
			var type =$("#type").val();
			if(i == 0){
				$("#tab_1").show();
				$("#tab_2").hide();
				$("#tab_3").hide();
				if(type=="在线调查"){
				  $(".activity_content").css("background","url(/Public/images/activity/activity_bg3.jpg)");
				}else{
                  $(".activity_content").css("background","url(/Public/images/activity/activity_bg.jpg)");
				}
				
				//$("activity_text").css("");
			}
			if(i == 1){
				$("#tab_1").hide();
				$("#tab_2").show();
				$("#tab_3").hide();
				$(".activity_content").css("background","url(/Public/images/activity/activity_bg1.jpg)");
			}
			if(i == 2){
				$("#tab_1").hide();
				$("#tab_2").hide();
				$("#tab_3").show();
				$(".activity_content").css("background","url(/Public/images/activity/activity_bg1.jpg)");
			}
		});
	});
	
	$(".firm_activity_content .activity_buttons .items").each(function(i){
		$(this).click(function(){
			$(".firm_activity_content .activity_buttons .items").css("color","#a5a5a5");
			$(this).css("color","#bf1d2d");
			if(i == 0){
				$("#tab_1").show();
				$("#tab_2").hide();
				$("#tab_3").hide();
				//$("activity_text").css("");
			}
			if(i == 1){
				$("#tab_1").hide();
				$("#tab_2").show();
				$("#tab_3").hide();
			}
			if(i == 2){
				$("#tab_1").hide();
				$("#tab_2").hide();
				$("#tab_3").show();
			}
		});
	});

});	
function reg(){
	nehnre.storage.set("_href", location.href);
	location.href = "/Reg/chooseType";
	return false;
}
