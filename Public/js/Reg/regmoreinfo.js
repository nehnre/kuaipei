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
			showWaiting();
			$.ajax({
				url: "updateUser",
				data: data,
				type: "POST",
				success: function(){
					location.href = "regmoreinfook";
				},
				error: function(){
					showAlert("保存失败！");
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
		name:"车队",
		children:[{
			name:"货车"
		},{
			name:"客车"
		}]
	},{
		name:"车主",
		children:[{
			name:"商用车"
		},{
			name:"私家车"
		}]
	}];
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
							$("#optionsDiv1").children().last().after("<p><a href=\"javascript:showOptions(1); selectMe('usertype2',{0},1);\">{1}</a></p>".format(i + 1, this.name));
							$("#user_type2").append("<option value='{0}'>{0}</option>".format(this.name));
						});
					}
				});
			});
		}
	})();
	
});


//过滤不符合要求的文件
function filterPic(file, extension){
	if(extension){
		extension = extension.toLowerCase();
		if(extension == "jpg" || extension == "gif" || extension == "jpeg" || extension == "png"){
			return true;
		}
	}
	showAlert("你上传的文件格式不正确！");
	return false;
}

function bodyIncrease(inc){
	if(!inc) inc = 200;
	var bodyHeight = $(".body").css("height");
	bodyHeight = bodyHeight.replace(/px$/ig,"");
	$(".body").css("height", ~~bodyHeight + inc);
	$(".bodycenter").eq(1).css("height", ~~bodyHeight + inc);
	var container = $(".container").css("height");
	
	container = container.replace(/px$/ig,"");
	$(".container").css("height", ~~container + inc);
}

function checkForm(){
	var b = true;
	b = b && notNull("user_type1", "一级分类")
	b = b && notNull("user_type2", "二级分类")
	b = b && notNull("true_name", "姓名");
	b = b && notNull("birthday", "出生日期");
	b = b && checkBirthday();
	return b;
}

function notNull(id, msg){
	var val = $("#" + id).val();
	if(!$.trim(val)){
		showAlert(msg + "不能为空！", function(){
			$("#" + id).focus();
		});
		return false;
	}
	return true;
}

function checkBirthday(){
	var val = $("#birthday").val();
	if(!nehnre.reg.birthday.test(val)){
		showAlert("请输入正确的日期格式<br>如：1984-09-11", function(){
			$("#birthday").focus();
		});
		return false;
	}
	return true;
}

function clearUsertype2(){
	$("#optionsDiv1").html("<p><a href=\"javascript:showOptions(1); selectMe('usertype2',0,1);\">请选择</a></p>");
	$("#mySelectText1").html("请选择");
	$("#user_type2").html("<option value=''>请选择</option>");
}