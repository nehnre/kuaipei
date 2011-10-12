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
		$( "#dialog-comment" ).dialog("open");
	}).css("cursor","pointer");
	
	$("#btnJoin").click(function(){
		var joined = $(this).attr("joined");
		var unlogin = $(this).attr("unlogin");
		var status = $(this).attr("status");
		if(unlogin){
			$("#login").click();
		} else if(status != "已审核"){
			showAlert("你的状态是：{0}，活动只有审核用户可以参加！".format(status));
		} else if(joined){
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
