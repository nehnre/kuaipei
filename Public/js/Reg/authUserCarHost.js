$(function(){
	
	//工商营业执照上传
	new AjaxUpload('btnDL', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_dl:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_dl").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				
				$("#driving_license").val(picname);
			}
		}	
	});	
	
	//所在位置地图上传
	new AjaxUpload('btnVL', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_vl:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_vl").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				$("#vehicle_license").val(picname);
			}
		}	
	});
	
	//名片上传
	new AjaxUpload('btnBC', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_bc:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_bc").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				$("#business_card").val(picname);
			}
		}	
	});
	
	$("#btnSubmit").click(function(){
		if(checkForm()){
			var data = $("#myForm").serialize();
			data += "&auth=true";
			showWaiting();
			$.ajax({
				url: "updateUser",
				data: data,
				type: "POST",
				success: function(){
					location.href = "regMoreInfoTip";
				},
				error: function(){
					showAlert("保存失败！");
				}
			});
		}
	});
	
	
	$("#btnCancle").click(function(){
		location.href = "/";
		try{window.event.returnValue=false;}catch(e){}
	});
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
	// if(!inc) inc = 200;
	// var bodyHeight = $(".body").css("height");
	// bodyHeight = bodyHeight.replace(/px$/ig,"");
	// $(".body").css("height", ~~bodyHeight + inc);
	// $(".bodycenter").eq(1).css("height", ~~bodyHeight + inc);
	// var container = $(".container").css("height");
	
	// container = container.replace(/px$/ig,"");
	// $(".container").css("height", ~~container + inc);
}

function checkForm(){
	var b = true;
	b = b && notNull("business_card", "名片");
	b = b && notNull("true_name", "真实姓名");
	b = b && checkEmail();
	b = b && notNull("birthday", "出生日期");
	b = b && checkBirthday();
	b = b && notNull("car_brand", "汽车品牌");
	b = b && notNull("car_model", "汽车型号");
	b = b && notNull("driving_license", "车主驾驶证");
	b = b && notNull("vehicle_license", "汽车行驶证");
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