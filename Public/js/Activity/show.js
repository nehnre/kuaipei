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
		if(unlogin){
			$("#login").click();
		} else if(status != "已审核"){
			showAlert("你的状态是：{0}，活动只有审核用户可以参加！".format(status));
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
