var alertcallback;
$(function(){
	waitingDialog();
	saveokDialog();
});

function waitingDialog(){
	
	$( "#waiting" ).dialog({
		height: 240,
		width:490,
		resizable: false,
		closeOnEscape: false,
		modal: true,
		autoOpen: false,
		dialogClass: 'hidden'
	});	
}

function saveokDialog(){
	$( "#saveok" ).dialog({
		height: 240,
		width:490,
		resizable: false,
		closeOnEscape: false,
		modal: true,
		autoOpen: false,
		close: function(){
			$("#savokcontent").html("操作成功");
			if(alertcallback){
				alertcallback();
				alertcallback = undefined;
			}
		},
		open: function(){
			$( "#waiting" ).dialog("close");
		}
	});	
}
function showWaiting(){
	$( "#waiting" ).dialog("open");
}
function closeWaiting(){
	$( "#waiting" ).dialog("close");
}
function showAlert(content,callback){
	if(content){
		$("#savokcontent").html(content);
	}
	if(callback){
		alertcallback = callback;
	}
	$("#saveok").dialog("open");
}
function closeAlert(){
	$("#saveok").dialog("close");
}

