$(function(){
	
		//工商营业执照上传
	new AjaxUpload('btnBL', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_bl:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_bl").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				
				$("#business_license").val(picname);
			}
		}	
	});	
	//车主驾驶证上传
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
	
	//汽车行驶证上传
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
	
	//所在位置地图上传
	new AjaxUpload('btnAP', {
		action: '../Upload/index',
		name: 'upload',
		responseType: 'json',
	    onSubmit: function(file, extension){
	    	return filterPic.apply(this, Array.prototype.slice.call(arguments,0));
        },
		onComplete : function(file, result){
			if(result && result.info && result.info instanceof Array) {
				if($("#tr_ap:visible").size() <= 0){
					bodyIncrease();				
				}
				var picname = "thumb_" + result.info[0].savename;
				$("#tr_ap").show().children().eq(1).html("<img src='/Temp/{0}' />".format(picname));
				$("#address_pic").val(picname);
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
	


	
	//提交按钮
	$("#btnSubmit").click(function(){
		var user_type1 =   $("#user_type1").val();
		var a = checkForm();
		if(a){
			if(user_type1=='厂商'||user_type1=='经销商'||user_type1=='修理厂'){
				a = checkUserFactoryForm();
			} else if(user_type1=='车队'){
				a = checkUserCarTeamForm();
			}else if(user_type1=='车主'){
				a = checUserCarHostForm();
			}
		}
		if(a){
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
					location.href = "userCenter";
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
		showMeg(val);
	});
	

	showMeg($("#user_type1").val());

});

function checkForm(){
	var b = true;
	b = b && notNull("user_type1", "一级分类")
	b = b && notNull("user_type2", "二级分类")
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
function  showMeg(val){
		if(val=='厂商'||val=='经销商'||val=='修理厂'){
			$(".chooseStyle2").hide();
			$(".chooseStyle3").hide();
			$(".chooseStyle1").show();
			$(".chooseStyle12").show();
			if($("#business_license").val()!=null&&$("#business_license").val().length>0){
					$("#tr_bl").show();
			}
			if($("#address_pic").val()!=null&&$("#address_pic").val().length>0){
				  $("#tr_ap").show();
			}
			$("#tr_dl").hide();
			$("#tr_vl").hide();
		}else if(val=='车队'){
			$(".chooseStyle1").hide();
			$(".chooseStyle3").hide();
			$(".chooseStyle2").show();
			$(".chooseStyle12").show();
			$("#tr_bl").hide();
			$("#tr_ap").hide();
			$("#tr_dl").hide();
			$("#tr_vl").hide();
		}else if(val=='车主'){
			$(".chooseStyle1").hide();
			$(".chooseStyle2").hide();
			$(".chooseStyle12").hide();
			$(".chooseStyle3").show();
			if($("#driving_license").val()!=null&&$("#driving_license").val().length>0){
				$("#tr_dl").show();
			}
			if($("#vehicle_license").val()!=null&&$("#vehicle_license").val().length>0){
				  $("#tr_vl").show();
			}
			$("#tr_bl").hide();
			$("#tr_ap").hide();
		}
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

function checUserCarHostForm(){
	var b = true;
	b = b && notNull("true_name", "真实姓名");
	b = b && notNull("birthday", "出生日期");
	b = b && checkBirthday();
	b = b && notNull("car_brand", "汽车品牌");
	b = b && notNull("car_model", "汽车型号");
	b = b && notNull("driving_license", "车主驾驶证");
	b = b && notNull("vehicle_license", "汽车行驶证");
	b = b && notNull("business_card", "名片");
	return b;
}

function checkUserCarTeamForm(){
	var b = true;
	b = b && notNull("company_name", "企业名称");
	b = b && notNull("company_address", "企业地址");
	b = b && notNull("post_code", "邮编");
	b = b && notNull("business_call", "商务联系电话");
	b = b && notNull("link_man", "联系人");
	b = b && notNull("company_scale", "企业规模");
	b = b && notNull("business_card", "名片");
	return b;
}
function checkUserFactoryForm(){
	var b = true;
	b = b && notNull("business_card", "名片");
	b = b && notNull("company_name", "企业名称");
	b = b && notNull("company_address", "企业地址");
	b = b && notNull("post_code", "邮编");
	b = b && notNull("business_call", "商务联系电话");
	b = b && notNull("link_man", "联系人");
	b = b && notNull("business_scope", "营业范围");
	b = b && notNull("company_scale", "企业规模");
	return b;
}
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