$(function(){
	$( "#dialog-comment" ).dialog({
		height: 400,
		width: 600,
		resizable: false,
		closeOnEscape: false,
		modal: true,
		autoOpen: false,
		close: function(){
		}
	});
	$(":button[value='我要评论']").click(function(){
		var unlogin = $("#btnJoin").attr("unlogin");
		if(unlogin){
			$("#login").click();
		} else {
			$( "#dialog-comment" ).dialog("open");
		}
	}).css("cursor","pointer");
	
	$("#btnComment").click(function(){
		var title = $("#title").val();
		var content = $("#content").val();
		if(!title){
			showAlert("请填写标题！");
			return;
		} 
		if(title.length > 30){
			showAlert("标题长度不能超过30个汉字！");
			return;
		}
		if(!content){
			showAlert("请填写内容！");
			return;
		}
		if(content.length > 1000 || content.length < 5){
			showAlert("内容的字数要在5-1000字之间！");
			return;
		}
		title = encodeURIComponent(title);
		content = encodeURIComponent(content);
		var id = $("#id").val();
		var data = "title=" + title + "&content=" + content + "&activity_id=" + id;
		showWaiting();
		$.ajax({
			url:"../ActivityComment/updateComment",
			data: data,
			type:"POST",
			success: function(json){
				json = nehnre.parseJSON(json);
				showAlert(json.data.msg, function(){
					if(json.data.success){
						$("#btnComment").attr("disabled", true);
						location.href = location.href.replace(/#*$/ig,"");
						try{
							window.event.returnValue=false;  
						}catch(e){}
					}
				});
			}		
		});
	});
	
	$("#btnJoin").click(function(){
		var joined = $(this).attr("joined");
		var unlogin = $(this).attr("unlogin");
		var status = $(this).attr("status");
		var expirse = $(this).attr("expirse");
		var start_time = $(this).attr("start_time");
		var end_time = $(this).attr("end_time");
		var import_flag = $(this).attr("import_flag");
		if(unlogin){
			$("#login").click();
		} else if("导入" == import_flag && status == "基本注册"){
			showAlert("为了让您更好得参与活动，并且为了给您提供更优质的服务，请完善您的认证信息。<a href='javascript:;' onclick='reg()' style='text-decoration:underline;color:#ce0000'>立即完善</a>");
		} else if(status == "基本注册"){
			showAlert("很遗憾！您目前仅是注册会员，成为认证会员才能参加活动。<a  href='javascript:;' onclick='reg()' style='text-decoration:underline;color:#ce0000'>立即升级</a>");
		} else if(status == "待审核"){
			showAlert("尊敬的会员：您的认证资料目前正在审核中，暂时不能参加活动，我们将尽快处理，请耐心等待！等审核认证通过，我们将立即发送提示信息，敬请留意！");
		} else if(~~expirse < 0){
			showAlert("活动还没有开始，开始时间：{0}".format(start_time));
		} else if(~~expirse > 0){
			showAlert("活动已经结束，结束时间：{0}".format(end_time));
		} else if (joined){
			showAlert("您已经于{0}参加过此次活动了！".format(joined));
		} else {
			showWaiting();
			var id = $("#id").val();
			$.ajax({
				url:"join",
				data:"id=" + id,
				success:function(json){
					json = nehnre.parseJSON(json);
					showAlert(json.data.msg, function(){
						if(json.data.success){
							$("#btnJoin").unbind("click");
							location.href = location.href.replace(/#*$/ig,"");
							try{
								window.event.returnValue=false;  
							}catch(e){}
							
						}
					});
				}
			});
		}
	});

});	
function reg(){
	nehnre.storage.set("_href", location.href);
	location.href = "/Reg/chooseType";
	return false;
}
