$(function(){
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
		if(checkForm()){
			var data = $("#myForm").serialize();
			if ($.browser.msie && $.browser.version < 7){
				$("select").hide();
			}
			showWaiting();
			$.ajax({
				url: "updateUser",
				data: data,
				type: "POST",
				success: function(json){
					location.href = "authUser";
				},
				error: function(){
					showAlert("保存失败！", function(){
						$("select").show();
					});
				}
			});
		}
	});
	
	//一级分类选择事件
	var usertype = [{
		name:"厂商",
		children:[{
			name:"外资"
		},{
			name:"合资"
		},{
			name:"民营"
		},{
			name:"国有"
		}]
	},{
		name:"经销商",
		children:[{
			name:"代理"
		},{
			name:"分销商"
		}]
	},{
		name:"修理厂",
		children:[{
			name:"综合修理厂(一类资质)"
		},{
			name:"综合修理厂(二类资质)"
		},{
			name:"综合修理厂(三类资质)"
		},{
			name:"快修店"
		},{
			name:"专项修理"
		},{
			name:"轮胎店"
		},{
			name:"美容养护"
		},{
			name:"4S店"
		}]
	},{
		name:"车主",
		children:[{
			name:"商用车"
		},{
			name:"私家车"
		}]
	},{
		name:"车队",
		children:[{
			name:"货车"
		},{
			name:"客车"
		}]
	},{
		name:"其他",
		children:[{
			name:"其他"
		}]
	}];
	$("#user_type1").change(function(){
		var val = $(this).val();
		$.each(usertype, function(){
			if(val == this.name){
				$("#user_type2").html("<option value=''>请选择</option>");
				$.each(this.children, function(i){
					$("#user_type2").append("<option value='{0}'>{0}</option>".format(this.name));
				});
			}
		});
	});
	/*
	(function(){
		if($("#optionsDiv0").size() <= 0 || $("#optionsDiv1").size() <= 0){
			setTimeout(arguments.callee, 200);
		} else {
			$("#optionsDiv0").find("a").click(function(){
				var html = $(this).html();
				clearUsertype2();
				$.each(usertype, function(){
					if(html == this.name){
						$.each(this.children, function(i){
							$("#optionsDiv1").children().last().after("<p><a href=\"javascript:showOptions(1); selectMe('user_type2',{0},1);\">{1}</a></p>".format(i + 1, this.name));
							$("#user_type2").append("<option value='{0}'>{0}</option>".format(this.name));
						});
					}
				});
			});
		}
	})();
	*/
});

function checkForm(){
	var b = true;
	b = b && notNull("user_type1", "一级分类");
	b = b && notNull("user_type2", "二级分类");
	b = b && notNull("true_name", "真实姓名");
	b = b && checkBirthday();
	b = b && checkQq();
	b = b && checkMsn();
	b = b && checkEmail();
	return b;
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

function clearUsertype2(){
	$("#optionsDiv1").html("<p><a href=\"javascript:showOptions(1); selectMe('user_type2',0,1);\">请选择</a></p>");
	$("#mySelectText1").html("请选择");
	$("#user_type2").html("<option value=''>请选择</option>");
}


function checkBirthday(){
	var val = $("#birthday").val();
	if(val && !nehnre.reg.birthday.test(val)){
		showAlert("请输入正确的日期格式<br>如：1984-09-11", function(){
			$("#birthday").focus();
		});
		return false;
	}
	return true;
}

function checkQq(){
	var obj = $("#qq");
	var val = obj.val();
	if(val && !nehnre.reg.qq.test(val)){
		showAlert("QQ必须为5到10位数字", function(){
			obj.focus();
		});
		return false;
	}
	return true;
}
function checkMsn(){
	var obj = $("#msn");
	var val = obj.val();
	if(val && !nehnre.reg.email.test(val)){
		showAlert("MSN格式不正确，必须为Email格式", function(){
			obj.focus();
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