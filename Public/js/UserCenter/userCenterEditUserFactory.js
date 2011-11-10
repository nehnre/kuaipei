$(function(){
	$("#perfect").next().addClass("red");
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
		var a = checkForm();
		if(a){
				$.ajax({
					url:"/UserCenter/checkStatus",
					type:"POST",
					success: function(json){
						json = nehnre.parseJSON(json);
						if(json.data.success){
								console.log(data);
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
										showAlert("保存成功！", function(){
									        	location.href = "/UserCenter/perfectUser";
										});
									},
									error: function(){
										showAlert("保存失败！", function(){
											$("select").show();
										});
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
	});
	

});

function checkForm(){
	var b = true;
	b = b && notNull("business_card", "名片");
	b = b && notNull("company_name", "企业名称");
	b = b && notNull("company_address", "企业地址");
	b = b && notNull("province", "省份");
	b = b && notNull("city", "城市");
	b = b && checkPostCode();
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


function checkPostCode(){
	var obj = $("#post_code");
	var val = obj.val();
	if(val && !nehnre.reg.email.test(val)){
		showAlert("邮政编码格式不正确，必须为六位数字！", function(){
			obj.focus();
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