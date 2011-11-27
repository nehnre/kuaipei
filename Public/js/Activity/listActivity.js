$(function(){

	$( "#limit" ).dialog({
		height: 500,
		width:700,
		resizable: false,
		modal: true,
		autoOpen: false
	});


	

});
function limit(id){
	$("#limitContent").attr("src","/Activity/limitActivity?id="+id);
	$("#limit").dialog("open");
}


