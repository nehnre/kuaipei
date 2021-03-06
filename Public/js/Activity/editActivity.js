$(function(){
	KE.show({
		id:"detail_text"
	});
	KE.show({
		id:"related_product"
	});
	KE.show({
		id:"product_story"
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
		changeYear:true
	};
	
	var dataConfigForBir ={
		maxDate:new Date(),
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
		defaultDate: '-20y'
	};
	
	$( "#start_time" ).datepicker(dataConfig).attr("readonly", true).css("cursor", "pointer");
	
	$( "#end_time" ).datepicker(dataConfig).attr("readonly", true).css("cursor", "pointer");
	
	$( "#start_birthday" ).datepicker(dataConfigForBir).attr("readonly", true).css("cursor", "pointer");
	
	$( "#end_birthday" ).datepicker(dataConfigForBir).attr("readonly", true).css("cursor", "pointer");
	
	$("#btnCancle").click(function(){
		location.href = "listActivity";
		try{window.event.returnValue=false;}catch(e){}
		
	});
	
	$("#btnOnlinePreview").click(function(){
		var url = $("#url").val();
		var url_height = $("#url_height").val();
		if(url !=""&&url_height !=""){
			$("#myForm").attr("action","showOnlineActivity");
			$("#myForm").attr("target", "_blank");
			$("#myForm").submit();
		}else{
			if(url==""){
				showAlert("活动链接为空！",function(){
					$("#url").focus();
				});
				return false;
			}else{
				showAlert("活动链接高度为空！",function(){
					$("#url_height").focus();
				});
				return false;
			}
		}
	});
	
	$("#btnPreview").click(function(){
		$("#myForm").attr("action","preview?_=" + new Date().getTime());
		$("#myForm").attr("target", "_blank");
		$("#detail_text").val(KE.html("detail_text"));
		$("#myForm").submit();
		$("#myForm").attr("action","saveOrUpdateActivity");
		$("#myForm").attr("target", "_self");
	});
});
