$(function(){
	 $("#baisc").find("span").addClass("red");
		$("#perfect").click(function(){
		$.ajax({
			url:"/UserCenter/checkStatus",
			type:"POST",
			success: function(json){
				json = nehnre.parseJSON(json);
				if(json.data.success){
								location.href = "/UserCenter/perfectUser";
				}else{
					showAlert(json.data.msg);
				}
			},
			error: function(){
				showAlert("提交失败，可能服务器出现故障。");
			}
		});

	 });
	$( "#birthday" ).datepicker({
		maxDate:new Date(),
		monthNames:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']	,
		showMonthAfterYear: true,
		dayNamesMin:['日', '一', '二', '三', '四', '五', '六'],
		firstDay:1,
		selectOtherMonths :true,
		showOtherMonths :true,
		dateFormat: 'yy-mm-dd',
		prevText:'上一月',
		nextText:'下一月',
		changeYear:true,
		defaultDate: '-20y'
	});
	//提交按钮
	$("#btnSubmit").click(function(){
		var a = checkForm();
		if(a){
					var data = $("#myForm").serialize();
					if ($.browser.msie && $.browser.version < 7){
						$("select").hide();
					}
					showWaiting();
					$.ajax({
						url: "/UserCenter/updateUser",
						data: data,
						type: "POST",
						success: function(json){
							location.href = "UserCenter";
						},
						error: function(){
							showAlert("保存失败！", function(){
								$("select").show();
							});
						}
					});
		}
	});
});	


function checkForm(){
	var b = true;
	b = b && notNull("nick_name", "昵称");
	b = b && notNull("true_name", "真实姓名");
	b = b&&checkPostCode();
	b = b&&checkBirthday();
	b = b&&checkEmail();
	return b;
}

function checkBirthday(){
	var val = $("#birthday").val();
	if(val &&!nehnre.reg.birthday.test(val)){
		showAlert("请输入正确的日期格式<br>如：1984-09-11", function(){
			$("#birthday").focus();
		});
		return false;
	}
	return true;
}
function checkEmail(){
	var val = $("#email").val();
	if(val &&!nehnre.reg.email.test(val)){
		showAlert("Email格式不正确！", function(){
			$("#email").focus();
		});
		return false;
	}
	return true;
}

function checkPostCode(){
	var obj = $("#post_code");
	var val = obj.val();
	if(val && !nehnre.reg.post.test(val)){
		showAlert("邮政编码格式不正确，必须为六位数字！", function(){
			obj.focus();
		});
		return false;
	}
	return true;
}

function notNull(id, msg){
	var val = $("#" + id).val();
	if(!$.trim(val)){
		if ($.browser.msie && $.browser.version < 7){
			$("select").hide();
		}
		showAlert(msg + "不能为空！", function(){
			$("#" + id).focus();
			$("select").show();
		});
		return false;
	}
	return true;
}

function bodyIncrease(){
	// if(!inc) inc = 200;
	// var bodyHeight = $(".body").css("height");
	// bodyHeight = bodyHeight.replace(/px$/ig,"");
	// $(".body").css("height", ~~bodyHeight + inc);
	// $(".bodycenter").eq(1).css("height", ~~bodyHeight + inc);
	// var container = $(".container").css("height");
	
	// container = container.replace(/px$/ig,"");
	// $(".container").css("height", ~~container + inc);
}