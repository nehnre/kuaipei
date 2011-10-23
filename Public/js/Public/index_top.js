$(function(){
	$(".top_menu").each(function(){
		$(this).click(function(){
			var _href = $(this).attr("href");
			if(_href){
				var flag = $(this).attr("flag");
				if("true" == flag){
					var objLogin = $("#login");
					if(objLogin.size() > 0){
						objLogin.click();
						return;
					}
				}
				location.href = _href;
				try{window.event.returnValue=false;}catch(e){}
			}
		});
	});
	
	$("#subEmail").click(function(){
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
	
	$("#btnSubEmail").click(function(){
		var val = $("#subEmail").val();
		if(!val || "输入Email订阅促销信息" == val){
			showAlert("请输入Email！",function(){
				$("#subEmail").focus();
			});
			return;
		}
		if(!nehnre.reg.email.test(val)){
			showAlert("Email格式不正确！",function(){
				$("#subEmail").focus();
			});
			return;
		}
		showWaiting();
		$.ajax({
			url:"/Subscribe/index",
			type:"post",
			data: "subEmail=" + val,
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						$("#subEmail").val("").blur();
					}
				});
			}
		});
		
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
						showWaiting();
						location.href = location.href.replace(/#*$/ig,"");
						try{window.event.returnValue=false;}catch(e){}
					}
				});
			}
		});
	});
	$("#logout").click(function(){
		location.href = "/User/logout?backurl=" + encodeURIComponent(location.href);
		try{window.event.returnValue=false;}catch(e){}
	});
	
	

	$( "#dialog-findPassword" ).dialog({
		width: 500,
		height: 300,
		resizable: false,
		closeOnEscape: false,
		modal: true,
		autoOpen: false,
		close: function(){
			$("#user_name").val("");
			$("#password").val("");
		}
	});	
	$("#findPassword").click(function(){
		$( "#dialog-findPassword" ).dialog("open");
	});
	$("#btnSend").click(function(){
		if(!checkUserName()){
			return;
		}
		var user_name = $("#f_user_name").val();
		showWaiting();
		$.ajax({
			url: "/Reg/findPassCheck",
			data: "user_name={0}".format(user_name),
			cache: false,
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						(function(){
							if(!window._second && window._second != 0){
								_second = 60;
							}
							if(_second > 0){
								$("#btnSend").val("发送验证码({0})".format(_second)).attr("disabled",true);
								_second --;
								setTimeout(arguments.callee,1000);
							} else {
								$("#btnSend").val("再次发送").attr("disabled",false);
							}
						})();
					}
				});
			},
			error: function(){
				showAlert("服务器出现错误，你的请求没有完成！");
			},
			complete: function(){
			}
		});
	});
	$("#btnSet").click(function(){
		if(!checkUserName()){
			return;
		}
		if(!checkCheckNum()){
			return;
		}
		if(!checkPassword()){
			return;
		}
		var user_name = $("#f_user_name").val();
		var password = $("#f_password").val();
		var check_num = $("#check_num").val();
		var data = "user_name=" + user_name + "&password=" + password + "&check_num=" + check_num;
		showWaiting();
		$.ajax({
			url:"/Reg/changePassword",
			cache: false,
			data: data,
			success:function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						$( "#dialog-findPassword" ).dialog("close");
						clearFindPassword();
					}
				});
			}
			
		});
	});

});	
//检测用户名
function checkUserName(){
	var user_name = $("#f_user_name").val();
	user_name = $.trim(user_name);
	if(!user_name){
		showAlert("请先填写手机号！",function(){
			$("#f_user_name").focus();
		});
		return false;
	}
	if(!nehnre.reg.mobile.test(user_name)){
		showAlert("手机号不符合要求！",function(){
			$("#f_user_name").focus();
		});
		return false;
	}
	return true;
}

function checkCheckNum(){
	var check_num = $("#check_num").val();
	if(!check_num){
		showAlert("请输入验证码");
		return false;
	}
	if(!/^\d{6}$/.test(check_num)){
		showAlert("验证码为六位数字");
		return false;
	}
	return true;
}


//检测密码是否匹配
function checkPassword(){
	var password = $("#f_password").val();
	var passwordagain = $("#passwordagain").val();
	if(!password){
		showAlert("请输入密码！",function(){
			$("#f_password").focus();
		});
		return false;
	}
	if(password.length < 6 || password.length > 16){
		showAlert("密码长度要在6到16之间！",function(){
			$("#f_password").focus();
		});
		return false;
	}
	
	if(password != passwordagain){
		showAlert("两次输入的密码不一致，请检查！",function(){
			$("#f_password").focus();
		});
		return false;
	}
	
	return true;
}

function clearFindPassword(){
	$("#f_user_name").val("");
	$("#f_password").val("");
	$("#passwordagain").val("");
	$("#check_num").val("");
}