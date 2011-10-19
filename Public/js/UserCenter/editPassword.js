$(function(){
	
	//修改密码按钮
	$("#btnPassword").click(function(){
		if(checkPassword()){
			showWaiting();
			submitForm();
		}
	});

	//检测按钮
	$("#btnCheck").click(function(){
		var user_name = $("#user_name").val();
		//showWaiting();
		$.ajax({
			url: "checkCheckNum",
			data: "user_name={0}".format(user_name),
			cache: false,
			success: function(json){
				//alert(json);
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						(function(){
							if(!window._second && window._second != 0){
								_second = 60;
							}
							if(_second > 0){
								$("#btnCheck").val("发送验证码({0})".format(_second)).attr("disabled",true);
								_second --;
								setTimeout(arguments.callee,1000);
							} else {
								$("#btnCheck").val("再次发送").attr("disabled",false);
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

});

//检测密码是否匹配
function checkPassword(){
	var oldpassword = $("#oldpassword").val();
	var password = $("#password").val();
	var passwordagain = $("#passwordagain").val();
	var check_num = $("#check_num").val();
	if(!check_num){
	    showAlert("请输入验证码");
		return false;
	}
	if(!/^\d{6}$/.test(check_num)){
	    showAlert("验证码为六位数字");
		return false;
	}
	if(!password){
		showAlert("请输入新登录密码！",function(){
			$("#password").focus();
		});
		return false;
	}
	if(password.length < 6 || password.length > 16){
		showAlert("密码长度要在6到16之间！",function(){
			$("#password").focus();
		});
		return false;
	}
	
	if(password != passwordagain){
		showAlert("两次输入的密码不一致，请检查！",function(){
			$("#password").focus();
		});
		return false;
	}
	
	return true;
}


function submitForm(){
	var data = $("form").serialize();
	$.ajax({
						url:"updatePassword",
						type:"POST",
						data: data,
						success: function(json){
							//alert(json);
							json = nehnre.parseJSON(json);
							showAlert(json.data.msg, function(){
								if(json.data.success){
                                         location.href = "/UserCenter";
								}
							});
						},
						error: function(){
							showAlert("提交失败，可能服务器出现故障。");
						}
	});
}