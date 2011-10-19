$(function(){
	$( "#content" ).dialog({
		height: 360,
		width:700,
		resizable: false,
		modal: true,
		autoOpen: false
	});	
});

function show(id){

		$.ajax({
			url: "findContent",
			data: "id="+id,
			cache: false,
			success: function(json){
				json = nehnre.parseJSON(json);
				if(json.data.success){
                        $( "#content" ).empty();
                        $( "#content" ).append(json.data.msg);
						$( "#content" ).dialog("open");
				}
			},
			error: function(){
				showAlert("服务器出现错误，你的请求没有完成！");
			},
			complete: function(){
			}
		});

}








