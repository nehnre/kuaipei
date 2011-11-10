$(function(){
	$(".menu_container div").each(function(){
		var className = $(this).attr("class");
		className = className.replace(/1$/ig, "");
		$(this).attr("class", className);
	});
	$(".menu_usercenter").removeClass("menu_usercenter").addClass("menu_usercenter1");
	
	$("#btnCancleMessage").click(function(){
		var _href = $(this).attr("href");
		if(_href){
			location.href = _href;
		}
	});
	
	//发送消息
	$("#btnSendMessage").click(function(){
		if(checkUserName() && checkTitle() && checkContent()){
			var data = $("#myForm").serialize();
			showWaiting();
			$.ajax({
				url:"sendMessage",
				data: data,
				type: "post",
				success: function(json){
					json = nehnre.parseJSON(json);
					showAlert(json.data.msg, function(){
						if(json.data.success){
							showWaiting();
							location.href = "./";
						}
					});
				}
			});
		}
	});
});

//检测用户名
function checkUserName(){
	var user_name = $("#user_name").val();
	user_name = $.trim(user_name);
	if(!user_name){
		showAlert("请先填写用户名！",function(){
			$("#user_name").focus();
		});
		return false;
	}
	if(!nehnre.reg.mobile.test(user_name)){
		showAlert("用户名不符合要求（必须为13位的手机号）！",function(){
			$("#user_name").focus();
		});
		return false;
	}
	return true;
}

//检测标题
function checkTitle(){
	var title = $("#title").val();
	title = $.trim(title);
	if(!title){
		showAlert("标题为必填项！", function(){
			$("#title").focus();
		});
		return false;
	}
	if(title.length > 50){
		showAlert("标题长度不要超过50个字符！", function(){
			$("#title").focus();
		});
		return false;
	}
	return true;
}

//检测内容
function checkContent(){
	var content = $("#content").val();
	content = $.trim(content);
	if(!content){
		showAlert("内容为必填项！", function(){
			$("#content").focus();
		});
		return false;
	}
	if(content.length > 200){
		showAlert("标题长度不要超过200个字符！", function(){
			$("#content").focus();
		});
		return false;
	}
	return true;
}