$(function(){
	
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
			if ($.browser.msie && $.browser.version < 7){
				$("select").hide();
			}
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
					$("select").show();
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
	b = b && notNull("company_name", "企业名称");
	b = b && checkCompanyAddress();
	b = b && notNull("province", "省份");
	b = b && notNull("city", "城市");
	b = b && checkPostCode();
	b = b && checkBusinessCall();
	b = b && notNull("company_scale", "企业规模");
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

function checkCompanyAddress(){
	var objCA =  $("#company_address");
	var companyAddress = objCA.val();
	if(!companyAddress){
		showAlert("请正确填写，系统将默认这是您的寄送地址。", function(){
			objCA.focus();
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
function checkBusinessCall(){
	var obj = $("#business_call");
	var val = obj.val();
	if(val && !nehnre.reg.phone.test(val)){
		showAlert("商务联系电话格式不正确！", function(){
			obj.focus();
		});
		return false;
	}
	return true;
}