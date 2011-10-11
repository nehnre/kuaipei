$(function(){
	
	
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

function clearUsertype2(){
	$("#optionsDiv1").html("<p><a href=\"javascript:showOptions(1); selectMe('user_type2',0,1);\">请选择</a></p>");
	$("#mySelectText1").html("请选择");
	$("#user_type2").html("<option value=''>请选择</option>");
}