$(function(){
	$("#editPassWord").addClass("bold");
	//修改密码按钮
	$("#btnPassword").click(function(){
		if(newPassword()){
			showWaiting();
			submitForm();
		}
	});

});

//检测密码是否匹配
function newPassword(){
	var oldpassword = $("#oldpassword").val();
	var password = $("#newPassword").val();
	var passwordagain = $("#passwordagain").val();
	if(!oldpassword){
		showAlert("请输入原登录密码！",function(){
			$("#oldpassword").focus();
		});
		return false;
	}
	if(!password){
		showAlert("请输入新登录密码！",function(){
			$("#newPassword").focus();
		});
		return false;
	}
	if(password.length < 6 || password.length > 16){
		showAlert("密码长度要在6到16之间！",function(){
			$("#newPassword").focus();
		});
		return false;
	}
	
	if(password != passwordagain){
		showAlert("两次输入的密码不一致，请检查！",function(){
			$("#newPassword").focus();
		});
		return false;
	}
	
	return true;
}


function submitForm(){
	var data = $("form").serialize();
	var oldpassword = $("#oldpassword").val();
	$.ajax({
		url:"checkPassword",
		type:"POST",
		data: "oldpassword="+oldpassword,
		success: function(json){
           	json = nehnre.parseJSON(json);
			if(json.data.success){
					console.log(data);
					$.ajax({
						url:"updatePassword",
						type:"POST",
						data: data,
						success: function(json){
							showAlert("修改成功",function(){
								location.href = "/UserCenter";
							});
						},
						error: function(){
							showAlert("提交失败，可能服务器出现故障。");
						}
					});
			}else{
				showAlert(json.data.msg);
			}
		},
		error: function(){
			showAlert("提交失败，可能服务器出现故障。");
		}
	});

}