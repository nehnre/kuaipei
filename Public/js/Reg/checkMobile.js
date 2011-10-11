$(function(){
	
	var importFlag = nehnre.queryString()["importFlag"];
	if(importFlag){
		$("#btnCheck").parent().hide();
	}
	
	//检测按钮
	$("#btnCheck").click(function(){
		if(!checkUserName()){
			return;
		}
		var user_name = $("#user_name").val();
		showWaiting();
		$.ajax({
			url: "checkUserName",
			data: "user_name={0}".format(user_name),
			cache: false,
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.info);
			},
			error: function(){
				showAlert("服务器出现错误，你的请求没有完成！");
			},
			complete: function(){
			}
		});
	});
	
	//注册按钮
	$("#btnSmsCheck").click(function(){
		var user_name = $("#user_name").val();
		if(!checkUserName()){
			return false;
		}
		
		var check_num = $("#check_num").val();
		if(!check_num){
			showAlert("请输入验证码");
			return false;
		}
		if(!/^\d{6}$/.test(check_num)){
			showAlert("验证码为六位数字");
			return false;
		}
		
		showWaiting();
		var data = "user_name={0}&check_num={1}".format(user_name, check_num);
		$.ajax({
			url:"checkSmsNum",
			data: data,
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.info, function(){
					if(json.status == 2){
						showWaiting();
						location.href = "index";
						try{
							window.event.returnValue=false;  
						}catch(e){}
					}
				});
			}
		});
	});
});


//检测用户名
function checkUserName(){
	var user_name = $("#user_name").val();
	user_name = $.trim(user_name);
	if(!user_name){
		showAlert("请先填写手机号！",function(){
			$("#user_name").focus();
		});
		return false;
	}
	if(!nehnre.reg.mobile.test(user_name)){
		showAlert("手机号不符合要求！",function(){
			$("#user_name").focus();
		});
		return false;
	}
	return true;
}
