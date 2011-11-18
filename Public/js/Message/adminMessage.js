$(function(){
	$( "#messageContent" ).dialog({
		height: 360,
		width:700,
		resizable: false,
		modal: true,
		autoOpen: false
	});	

	//发送消息
	$("#btnSendMessage").click(function(){
		if(checkUserName() && checkTitle() && checkContent()){
			var data = $("#myForm").serialize();
			showWaiting();
			$.ajax({
				url:"sendAdminMessage",
				data: data,
				type: "post",
				success: function(json){
					json = nehnre.parseJSON(json);
					showAlert(json.data.msg, function(){
						if(json.data.success){
							showWaiting();
							location.href = "./adminMessageList";
						}
					});
				}
			});
		}
	});
	
	
	//选择用户类型
	$("#choose_type").change(function(){
	    var choose_type = $("#choose_type").val();
		if(choose_type =='用户名'){
			$('#user_name').show();
			$('#user_name_text').show();
			$('#user_type').val('');
			$('#user_status').hide();
			$('#user_type').hide();
			$('#user_status').val('');
			$('#user_type').val('');
            $('#user_status_text').hide();
			$('#user_type_text').hide();
		}else if(choose_type =='用户状态'){
			$('#user_name').hide();
			$('#user_name').val('');
			$('#user_status').show();
			$('#user_status_text').show();
			$('#user_type').hide();
			$('#user_type').val('');
			$('#user_type_text').hide();
			$('#user_name_text').hide();
		}else if(choose_type =='用户分类'){
			$('#user_name').hide();
			$('#user_name').val('');
			$('#user_status').hide();
			$('#user_status').val('');
			$('#user_type').show();
			$('#user_type_text').show();
			$('#user_name_text').hide();
			$('#user_status_text').hide();
		}

	});

});


function show(id){
        showWaiting();
		$.ajax({
			url: "findContent",
			data: "id="+id,
			cache: false,
			success: function(json){
				json = nehnre.parseJSON(json);
				if(json.data.success){
                        $( "#messageContent" ).empty();
                        $( "#messageContent" ).append(json.data.msg);
						$( "#messageContent" ).dialog("open");
				}
			},
			error: function(){
				showAlert("服务器出现错误，你的请求没有完成！");
			},
			complete: function(){
			}
		});

}

//检测用户名
function checkUserName(){
	var choose_type = $("#choose_type").val();
	if(choose_type =='用户名'){
		var user_name = $("#user_name").val();
		if(!user_name){
			showAlert("请填写用户名",function(){
				$("#user_name").focus();
			});
			return false;
		}
	}else if(choose_type =='用户状态'){
		var user_status = $("#user_status").val();
		if(!user_status){
			showAlert("请选择用户状态",function(){
				$("#user_status").focus();
			});
			return false;
		}
	}else if(choose_type =='用户分类'){
		var user_type = $("#user_type").val();
		if(!user_type){
			showAlert("请选择用户分类",function(){
				$("#user_type").focus();
			});
			return false;
		}
	}
	return true;
}

//检测标题
function checkTitle(){
	var title = $("#title").val();
	title = $.trim(title);
	if(!title){
		showAlert("标题为必填项！", function(){
			$("#title").focus();
		});
		return false;
	}
	if(title.length > 50){
		showAlert("标题长度不要超过50个字符！", function(){
			$("#title").focus();
		});
		return false;
	}
	return true;
}

//检测内容
function checkContent(){
	var content = $("#content").val();
	content = $.trim(content);
	if(!content){
		showAlert("内容为必填项！", function(){
			$("#content").focus();
		});
		return false;
	}
	if(content.length > 200){
		showAlert("标题长度不要超过200个字符！", function(){
			$("#content").focus();
		});
		return false;
	}
	return true;
}







