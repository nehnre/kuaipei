$(function(){

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