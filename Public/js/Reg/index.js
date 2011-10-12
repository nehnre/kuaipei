$(function(){
	
	//注册按钮
	$("#btnReg").click(function(){
		if(checkPassword() && checkNickName() && checkAgree()){
			var id = $("#id").val();
			showWaiting();
			submitForm();
		}
	});
	
	$( "#agreement" ).dialog({
		height: 360,
		width:700,
		resizable: false,
		modal: true,
		autoOpen: false
	});	
	
	$("#btnAgreement").click(function(){
		$( "#agreement" ).dialog("open");
	});
});

//检测密码是否匹配
function checkPassword(){
	var password = $("#password").val();
	var passwordagain = $("#passwordagain").val();
	if(!password){
		showAlert("请输入密码！",function(){
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

//检测email
function checkEmail(){
	var email = $("#email").val();
	if(email && !nehnre.reg.email.test(email)){
		showAlert("电子邮件格式不正确！",function(){
			$("#email").focus();
		});
		return false;
	}
	return true;
}

function checkNickName(){
	var nickName = $("#nick_name").val();
	if(!nickName){
		showAlert("昵称不能为空！", function(){
			$("#nick_name").focus();
		});
		return false;
	}
	if(nickName.length > 6){
		showAlert("昵称长度不能超过六个汉字！", function(){
			$("#nick_name").focus();
		});
		return false;
	}
	return true;
}

//检测协议
function checkAgree(){
	if(!$("#agree").attr("checked")){
		showAlert("你必须同意协议才能继续！");
		return false;
	}
	return true;
}

function submitForm(){
	var data = $("form").serialize();
	console.log(data);
	$.ajax({
		url:"updateUser",
		type:"POST",
		data: data,
		success: function(json){
			location.href = "regTip";
			//showAlert(json);
		},
		error: function(){
			showAlert("提交失败，可能服务器出现故障。");
		}
	});
}