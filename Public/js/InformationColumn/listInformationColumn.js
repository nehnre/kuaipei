$(function(){
	
   $( "#AddpublishTime" ).dialog({
		height: 160,
		width:400,
		resizable: false,
		modal: true,
		autoOpen: false
	});	

	var dataConfig = {
		minDate:new Date(),
		monthNames:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']	,
		showMonthAfterYear: true,
		dayNamesMin:['日', '一', '二', '三', '四', '五', '六'],
		firstDay:1,
		selectOtherMonths :true,
		showOtherMonths :true,
		dateFormat: 'yy-mm-dd',
		prevText:'上一月',
		nextText:'下一月',
		changeYear:true,
		showOn:"button"
		
	};
	$( "#userPublishTime" ).datepicker(dataConfig).attr("readonly", true).css("cursor", "pointer");
    $("#btnInformationColumn").click(function(){
			var data = $("#myForm").serialize();
			console.log(data);
			$.ajax({
				url:"publishInformationColumn",
				data:data,
				type: "POST",
				success:function(json){
					json = nehnre.parseJSON(json);
					if(json.data.success){
						$( "#AddpublishTime" ).dialog("close");
						showAlert(json.data.msg, function(){
							location.href="listInformationColumn";
						});
					}else{
						showAlert(json.data.msg, function(){
							location.href="listInformationColumn";
						});
					}
				}
			});
    });
});

function show(id){
	$("#informationColumnId").val(id);
	$( "#AddpublishTime" ).dialog("open");
}





